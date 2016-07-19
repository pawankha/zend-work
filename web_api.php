<?php

class ControllerFeedWebApi extends Controller {

	# Use print_r($json) instead json_encode($json)
	private $debug = false;

	public function categories() {
		$this->init();
		$this->load->model('catalog/category');
		$json = array('success' => true);

		# -- $_GET params ------------------------------
		
		if (isset($this->request->get['parent'])) {
			$parent = $this->request->get['parent'];
		} else {
			$parent = 0;
		}

		if (isset($this->request->get['level'])) {
			$level = $this->request->get['level'];
		} else {
			$level = 1;
		}

		# -- End $_GET params --------------------------


		$json['categories'] = $this->getCategoriesTree($parent, $level);

		if ($this->debug) {
			echo '<pre>';
			print_r($json);
		} else {
			$this->response->setOutput(json_encode($json));
		}
	}

	public function category() {
		$this->init();
		$this->load->model('catalog/category');
		$this->load->model('tool/image');

		$json = array('success' => true);

		# -- $_GET params ------------------------------
		
		if (isset($this->request->get['id'])) {
			$category_id = $this->request->get['id'];
		} else {
			$category_id = 0;
		}

		# -- End $_GET params --------------------------

		$category = $this->model_catalog_category->getCategory($category_id);
		
		$json['category'] = array(
			'id'                    => $category['category_id'],
			'name'                  => $category['name'],
			'description'           => $category['description'],
			'href'                  => $this->url->link('product/category', 'category_id=' . $category['category_id'])
		);

		if ($this->debug) {
			echo '<pre>';
			print_r($json);
		} else {
			$this->response->setOutput(json_encode($json));
		}
	}


	public function products() {
		$this->init();
		$this->load->model('catalog/product');
		$this->load->model('tool/image');
		$json = array('success' => true, 'products' => array());


		# -- $_GET params ------------------------------
		
		if (isset($this->request->get['category'])) {
			$category_id = $this->request->get['category'];
		} else {
			$category_id = 0;
		}

		# -- End $_GET params --------------------------

		$products = $this->model_catalog_product->getProducts(array(
			'filter_category_id'	=> $category_id
		));

		foreach ($products as $product) {

			if ($product['image']) {
				$image = $this->model_tool_image->resize($product['image'], $this->config->get('config_image_product_width'), $this->config->get('config_image_product_height'));
			} else {
				$image = false;
			}

			if ((float)$product['special']) {
				$special = $this->currency->format($this->tax->calculate($product['special'], $product['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$special = false;
			}

			$json['products'][] = array(
				'id'                    => $product['product_id'],
				'name'                  => $product['name'],
				'description'           => $product['description'],
				'pirce'                 => $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax'))),
				'href'                  => $this->url->link('product/product', 'product_id=' . $product['product_id']),
				'thumb'                 => $image,
				'special'               => $special,
				'rating'                => $product['rating']
			);
		}

		if ($this->debug) {
			echo '<pre>';
			print_r($json);
		} else {
			$this->response->setOutput(json_encode($json));
		}
	}

	public function product() {
		$this->init();
		$this->load->model('catalog/product');
		$this->load->model('tool/image');
		$json = array('success' => true);
		# -- $_GET params ------------------------------		
		if (isset($this->request->get['id'])) {
			$product_id = $this->request->get['id'];
		} else {
			$product_id = 0;
		}

		# -- End $_GET params --------------------------

		$product = $this->model_catalog_product->getProduct($product_id);

		# product image
		if ($product['image']) {
			$image = $this->model_tool_image->resize($product['image'], $this->config->get('config_image_popup_width'), $this->config->get('config_image_popup_height'));
		} else {
			$image = '';
		}

		#additional images
		$additional_images = $this->model_catalog_product->getProductImages($product['product_id']);
		$images = array();

		foreach ($additional_images as $additional_image) {
			$images[] = $this->model_tool_image->resize($additional_image, $this->config->get('config_image_additional_width'), $this->config->get('config_image_additional_height'));
		}

		#specal
		if ((float)$product['special']) {
			$special = $this->currency->format($this->tax->calculate($product['special'], $product['tax_class_id'], $this->config->get('config_tax')));
		} else {
			$special = false;
		}

		#discounts
		$discounts = array();
		$data_discounts =  $this->model_catalog_product->getProductDiscounts($product['product_id']);

		foreach ($data_discounts as $discount) {
			$discounts[] = array(
				'quantity' => $discount['quantity'],
				'price'    => $this->currency->format($this->tax->calculate($discount['price'], $product['tax_class_id'], $this->config->get('config_tax')))
			);
		}

		#options
		$options = array();

		foreach ($this->model_catalog_product->getProductOptions($product['product_id']) as $option) { 
			if ($option['type'] == 'select' || $option['type'] == 'radio' || $option['type'] == 'checkbox' || $option['type'] == 'image') { 
				$option_value_data = array();
				
				foreach ($option['option_value'] as $option_value) {
					if (!$option_value['subtract'] || ($option_value['quantity'] > 0)) {
						if ((($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) && (float)$option_value['price']) {
							$price = $this->currency->format($this->tax->calculate($option_value['price'], $product['tax_class_id'], $this->config->get('config_tax')));
						} else {
							$price = false;
						}
						
						$option_value_data[] = array(
							'product_option_value_id' => $option_value['product_option_value_id'],
							'option_value_id'         => $option_value['option_value_id'],
							'name'                    => $option_value['name'],
							'image'                   => $this->model_tool_image->resize($option_value['image'], 50, 50),
							'price'                   => $price,
							'price_prefix'            => $option_value['price_prefix']
						);
					}
				}
				
				$options[] = array(
					'product_option_id' => $option['product_option_id'],
					'option_id'         => $option['option_id'],
					'name'              => $option['name'],
					'type'              => $option['type'],
					'option_value'      => $option_value_data,
					'required'          => $option['required']
				);					
			} elseif ($option['type'] == 'text' || $option['type'] == 'textarea' || $option['type'] == 'file' || $option['type'] == 'date' || $option['type'] == 'datetime' || $option['type'] == 'time') {
				$options[] = array(
					'product_option_id' => $option['product_option_id'],
					'option_id'         => $option['option_id'],
					'name'              => $option['name'],
					'type'              => $option['type'],
					'option_value'      => $option['option_value'],
					'required'          => $option['required']
				);						
			}
		}

		#minimum
		if ($product['minimum']) {
			$minimum = $product['minimum'];
		} else {
			$minimum = 1;
		}

		$json['product'] = array(
			'id'                            => $product['product_id'],
			'seo_h1'                        => $product['seo_h1'],
			'name'                          => $product['name'],
			'manufacturer'                  => $product['manufacturer'],
			'model'                         => $product['model'],
			'reward'                        => $product['reward'],
			'points'                        => $product['points'],
			'image'                         => $image,
			'images'                        => $images,
			'price'                         => $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax'))),
			'special'                       => $special,
			'discounts'                     => $discounts,
			'options'                       => $options,
			'minimum'                       => $minimum,
			'rating'                        => (int)$product['rating'],
			'description'                   => html_entity_decode($product['description'], ENT_QUOTES, 'UTF-8'),
			'attribute_groups'              => $this->model_catalog_product->getProductAttributes($product['product_id'])
		);


		if ($this->debug) {
			echo '<pre>';
			print_r($json);
		} else {
			$this->response->setOutput(json_encode($json));
		}
	}


	/**
	 * Generation of category tree
	 * 
	 * @param  int    $parent  Prarent category id
	 * @param  int    $level   Depth level
	 * @return array           Tree
	 */
	private function getCategoriesTree($parent = 0, $level = 1) {
		$this->load->model('catalog/category');
		$this->load->model('tool/image');		
		$result = array();
		$categories = $this->model_catalog_category->getCategories($parent);
		if ($categories && $level > 0) {
			$level--;
			foreach ($categories as $category) {
				if ($category['image']) {
					$image = $this->model_tool_image->resize($category['image'], $this->config->get('config_image_category_width'), $this->config->get('config_image_category_height'));
				} else {
					$image = false;
				}

				$result[] = array(
					'category_id'   => $category['category_id'],
					'parent_id'     => $category['parent_id'],
					'name'          => $category['name'],
					'image'         => $image,
					'href'          => $this->url->link('product/category', 'category_id=' . $category['category_id']),
					'categories'    => $this->getCategoriesTree($category['category_id'], $level)
				);
			}

			return $result;
		}
	}

	/**
	 * 
	 */
	private function init() {
		$this->response->addHeader('Content-Type: application/json');
	}

	/**
	 * Error message responser
	 *
	 * @param string $message  Error message
	 */
	private function error($code = 0, $message = '') {

		# setOutput() is not called, set headers manually
		header('Content-Type: application/json');
		$json = array(
			'success'       => false,
			'code'          => $code,
			'message'       => $message
		);
			if ($this->debug) {
			echo '<pre>';
			print_r($json);
			} else {
			echo json_encode($json);
			}
			exit();
	}
	private function bannerimg() {
		$this->load->model('design/banner');
		$banner_id=$this->request->get['banner_id'];
		$results = $this->model_design_banner->getBanner($banner_id);
		print_r($results);die;
	}
	
public function getCategoriesPutaItem() {
	header('Content-Type: application/json');
	$this->load->model('design/banner');
	$this->load->model('catalog/category');
	$this->load->model('tool/image');
	$category_id = array_shift($this->path);
	$output = '';
	$results['success'] = $this->model_catalog_category->getCategories(131);
	//$results1 = $this->model_catalog_category->getCategories(79);
	//$json=array_merge($results,$results1);
	//print_r($results);die;
	echo json_encode($results);
	die;
	}
	public function getCategoriesOthers() {
		header('Content-Type: application/json');
		$this->load->model('design/banner');
		$this->load->model('catalog/category');
		$this->load->model('tool/image');
		$category_id = array_shift($this->path);
		$output = '';
		$results = $this->model_catalog_category->getCategories(141);
		//$results1 = $this->model_catalog_category->getCategories(79);
		//$json=array_merge($results,$results1);
		echo json_encode($results);
		die;
	}
	public function getCategories1($current_path = '') {
		header('Content-Type: application/json');
		$this->load->model('design/banner');
		$this->load->model('catalog/category');
		$this->load->model('tool/image');
		$category_id = array_shift($this->path);
		$output = '';
		$results = $this->model_catalog_category->getCategories(169);
		$results1 = $this->model_catalog_category->getCategories(79);
		$json['success']=array_merge($results,$results1);
		
		echo json_encode($json);
		die;
}

/******************************** Getting The Slider Images*******************************************************/
public function getSlidersByGroupId( ){
		$groupID=26;
		$languageID=1;
		
		$query = ' SELECT * FROM '. DB_PREFIX . "pavosliderlayers   ";
		$query .= ' WHERE group_id='.(int)$groupID .' AND `language_id`='.(int)$languageID.' AND `status` = 1 ORDER BY position ASC';

		$query = $this->db->query( $query );
		for($i=0;$i<=count($query);$i++){
		$query->rows[$i]['image']=$this->config->get('config_ssl') . 'image/' . $query->rows[$i]['image'];
		}
		//print_r($query->rows);die;
		$json['data']= $query->rows;
		$this->response->setOutput(json_encode($json));
		//print_r($query->rows);die;
		//return $query->rows;

	}
	
	/******************************** Getting The Slider Images *******************************************************/
	
	
/******************************** Getting The Login Check*******************************************************/
public function login($override = false) {
		global $loader, $registry;
		header('Content-type: application/json');
		$this->config = $registry->get('config');
		$this->db = $registry->get('db');
		$this->request = $registry->get('request');
		$this->session = $registry->get('session');
		if(isset($this->request->post['email'])){
		$email=$this->request->post['email'];
		}else{
		$email=$this->request->get['email'];
		}
		if(isset($this->request->post['password'])){
		$password=$this->request->post['password'];
		}else{
			$password=$this->request->get['password'];
		}
		$json = array('success' => true);
		if ($override) {
		
			$customer_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "' AND status = '1'");
		} else {
		
			$customer_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "' AND (password = SHA1(CONCAT(salt, SHA1(CONCAT(salt, SHA1('" . $this->db->escape($password) . "'))))) OR password = '" . $this->db->escape(md5($password)) . "') AND status = '1' AND approved = '1'");
		}
		if ($customer_query->num_rows) {
			$this->customer_id = $customer_query->row['customer_id'];
			$this->firstname = $customer_query->row['firstname'];
			$this->lastname = $customer_query->row['lastname'];
			$this->email = $customer_query->row['email'];
			$this->telephone = $customer_query->row['telephone'];
			$this->fax = $customer_query->row['fax'];
			$this->newsletter = $customer_query->row['newsletter'];
			$this->customer_group_id = $customer_query->row['customer_group_id'];
			$this->address_id = $customer_query->row['address_id'];
			 $stud_arr['customer_id']=$customer_query->row['customer_id'];
			$stud_arr['firstname']=$customer_query->row['firstname'];
			$stud_arr['lastname']=$customer_query->row['lastname'];
			$stud_arr['email']=$customer_query->row['email'];
			$stud_arr['telephone']=$customer_query->row['telephone'];
			$stud_arr['customer_group_id']=$customer_query->row['customer_group_id'];
			$stud_arr['address_id']=$customer_query->row['address_id'];
			$stud_arr['msg']='Login successfully';
			$stud_arr['RESULT']='successfully Done!';
			echo json_encode($stud_arr);
			die();
		
			//$this->db->query("UPDATE " . DB_PREFIX . "customer SET ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "' WHERE customer_id = '" . (int)$this->customer_id . "'");
			//echo  $json=array('success'=>json_encode($customer_query->row));
			//die;
			}else {
			$stud_arr['msg']='Username or Password Not Match';
        $stud_arr['RESULT']='errors';
        echo json_encode($stud_arr);
        die();
		
		
		}
	}
	/******************************** Getting The Login Check*******************************************************/
	
		public function allCatDrop() {
				$this->load->model('catalog/category');

				$this->load->model('catalog/product');
				
				$categoriesArr = array();

				$categories = $this->model_catalog_category->getCategories(0); 
			if($categories){
				foreach ($categories as $categry) { 
						
					$categoriesArr[] = array(
						'success' => '1',
						'category_id' => $categry['category_id'],
						'name'        => $categry['name'],
					);	
				}
			}else{
				$categoriesArr = array(
						'success' => '0'
						);
			} 
				$test1= json_encode($categoriesArr);
				echo $test2=str_replace('\/','/', $test1); 
			
		}
		
			public function allCatt() {
				$this->load->model('catalog/category');

				$this->load->model('catalog/product');
				
				$this->load->model('tool/image'); 

				$response = array();
				
				$abc = array();
				
				if(isset($this->request->get['catid'])){
					$catid = $this->request->get['catid'];
				}else{
					$catid =  0;
				}

				$categories = $this->model_catalog_category->getCategories($catid);
			if($categories){
				foreach ($categories as $category) {
					$children_data = array();

					$children = $this->model_catalog_category->getCategories($category['category_id']);

					foreach ($children as $child) {
						if ($child['image']) {
							$image = $this->model_tool_image->resize($child['image'], $this->config->get('config_image_category_width'), $this->config->get('config_image_category_height'));
						} else {
							$image = $this->model_tool_image->resize('data/demo/no-image.jpg', $this->config->get('config_image_product_width'), $this->config->get('config_image_product_height'));
						}
						$children_data[] = array(
							'category_id' => $child['category_id'],
							'name'        => $child['name'],
							'image'        => $image,
						);		
					}
					
					$response['item'][] = array(
						'category_ID' => $category['category_id'],
						'name'        => $category['name'],
						'children'    => $children_data,
					);	
				}
				$response['Message'] = 'Success';
				//$response['categories'] = $cate;
			}else{
				$response = array(
						'Message' => 'Failure'
						);
			}
				$abc['category'] =  $response;
				$test1= json_encode($response);
				echo $test2=str_replace('\/','/', $test1); 
		}
		
		
		    public function addcustomer() {
			$this->load->model('account/customer');
			$json = array('success' => true, 'result' => array());
             # -- $_GET params ------------------------------
			if (isset($this->request->get['firstname'])) {
            $data['firstname'] = $this->request->get['firstname'];
			}else{
			$data['firstname'] = $this->request->post['firstname'];
			}
			if (isset($this->request->get['lastname'])) {
            $data['lastname'] = $this->request->get['lastname'];
			}else{
			$data['lastname'] = $this->request->post['lastname'];
			}
			if (isset($this->request->get['email'])) {
            $data['email'] = $this->request->get['email'];
			}else{
			$data['email'] = $this->request->post['email'];
			}
			if (isset($this->request->get['password'])) {
            $data['password'] = $this->request->get['password'];
			}else{
			$data['password'] = $this->request->post['password'];
			}
			$data['telephone'] = '';
			$data['fax'] = '';
			$data['company'] = '';
			$data['company_id'] = '';
			$data['tax_id'] = '';
			$data['address_1'] = '';
			$data['address_2'] = '';
			$data['city'] = '';
			$data['postcode'] = '';
			$data['country_id'] = '';
			$data['zone_id'] = '';
        # -- End $_GET params --------------------------
			$customer_check = $this->model_account_customer->getCustomerByEmail($data['email']);
			if(count($customer_check)>0)
			{
			$json['result']="Email Already Exist";
			$json["success"] = 'false';
			$this->response->setOutput(json_encode($json));
			}else{
			
			if ($data) {
				$this->model_account_customer->addCustomer($data);
				$customer = $this->model_account_customer->getCustomerByEmail($data['email']);
				$json['result'] = $customer['customer_id'];
			}
			
			$this->response->setOutput(json_encode($json));
			}
    }

}
