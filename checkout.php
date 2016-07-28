<?php
define("DB_SERVER", "localhost"); //Define your server name, usually localhost
define("DB_NAME","prabhq8n_rsed"); //Define your Database Name
define ("DB_USER", "prabhq8n_rsed"); //Define Database user
define ("DB_PASSWORD", "Alfa@1212"); //Define your database password 
    require_once("config.php");
require_once("system/library/image.php");
require_once("system/library/mail.php");

require_once("system/library/language.php");
require_once("system/engine/registry.php");

$query = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD);
if (!$query)
{
die("Failed to connect to database server!<br>".mysql_error());
}
mysql_select_db(DB_NAME, $query) or die("Failed to select database<br>".mysql_error());

	if($_REQUEST['route']=='confirmorder'){
			$order_data = array();
			$return_arry=array();
		
			//$query = mysql_query("SELECT * FROM " . DB_PREFIX . "setting WHERE store_id = ' 0' AND `code` = ' config '");
			//$obj = mysql_fetch_array($query);
			
			$cart_products=json_decode($_REQUEST['all_arraylist']);
			if(count($cart_products)>0 && $cart_products!=""){
			$params['customer_id']=$_REQUEST['user_id'];
			$params['firstname']=$_REQUEST['user_name'];
			$params['mobile_no']=$_REQUEST['mobile_no'];
			$params['email']=$_REQUEST['email'];
			$params['address']=$_REQUEST['address'];
			$params['block_area']=$_REQUEST['block_area'];
			$params['block_number']=$_REQUEST['block_number'];
		
            if(isset($params['customer_id']) && $params['customer_id'] != ''){
                $customer_detail1 = mysql_query("SELECT customer_id,customer_group_id,firstname,lastname,email,telephone,fax FROM oc_customer WHERE customer_id = '".$params['customer_id']."' AND status = '1'");
				$customer_detail = mysql_fetch_array($customer_detail1);
               //print_r($customer_detail);die;
                if(!empty($customer_detail)){
                    $order_data['customer_id'] = (int)$customer_detail['customer_id'];
                    $order_data['customer_group_id'] = (int)$customer_detail['customer_group_id'];
                    $order_data['firstname'] = addslashes($customer_detail['firstname']);
                    $order_data['lastname'] = addslashes($customer_detail['lastname']);
                    $order_data['email'] = addslashes($customer_detail['email']);
                    $order_data['telephone'] = addslashes($customer_detail['telephone']);
                    $order_data['fax'] = addslashes($customer_detail['fax']);
                }
            }
			$payment_method['title']="Cash On Delivery";
			$order_data['invoice_prefix'] = 'INV-PRB/16-001';
            $order_data['store_id'] = 0;
            $order_data['store_name'] = 'Prabhuji Online';
			$order_data['store_url'] = 'http://www.prabhujionline.com/';
			 if(!isset($order_data['customer_id'])){
                $order_data['customer_id'] = 0;
                $order_data['customer_group_id'] = 0;
                $order_data['firstname'] = addslashes($params['firstname']);
                $order_data['email'] = addslashes($params['mobile_no']);
                $order_data['telephone'] = addslashes($params['mobile_no']);
                $order_data['fax'] = '';
            }
			
			 $order_data['payment_firstname']    = addslashes($payment_address['payment_firstname']);
            $order_data['payment_lastname']     = '';
            $order_data['payment_company']      = '';
            $order_data['payment_address_1']    = addslashes($params['address']);
            $order_data['payment_address_2']    = '';   
            $order_data['payment_city']         = addslashes($params['block_area']);
            $order_data['payment_postcode']     = addslashes($params['block_number']);
            $order_data['payment_country']      = '';
            $order_data['payment_country_id']   = '';
            $order_data['payment_zone']         = '';
            $order_data['payment_zone_id']      = '';
           
            $order_data['payment_method']       = addslashes($payment_method['title']);
            $order_data['payment_code']         = 'cod';
           
           
            $order_data['shipping_firstname']    = addslashes($payment_address['payment_firstname']);
            $order_data['shipping_lastname']     = '';
            $order_data['shipping_company']      = '';
            $order_data['shipping_address_1']    = addslashes($params['address']);
            $order_data['shipping_address_2']    = '';
            $order_data['shipping_city']         = addslashes($params['block_area']);
            $order_data['shipping_postcode']     = addslashes($params['block_number']);
            $order_data['shipping_country']      = '';
            $order_data['shipping_country_id']   ='';
            $order_data['shipping_zone']         = '';
            $order_data['shipping_zone_id']      = '';
           
            $order_data['shipping_method']       = 'Free Shipping';
            $order_data['shipping_code']         = 'free.free';
           
            $order_data['language_id']         = 1;
              $query = "INSERT INTO oc_order SET ";
            foreach($order_data as $key => $value){
                $query .= $key." = '".$value."', ";
            }
            $query .= "date_added = NOW(),";
            $query .= "date_modified = NOW()";
		    mysql_query($query);
		  $order_id=mysql_insert_id();
		  
		       $order_data['products'] = array();
			
            foreach ($cart_products as $product) {
                $option_data = array();

                foreach ($product['option'] as $option) {
                    $option_data[] = array(
                        'product_option_id'       => '',
                        'product_option_value_id' => '',
                        'option_id'               => '',
                        'option_value_id'         => '',
                        'name'                    => '',
                        'value'                   => '',
                        'type'                    => ''
                    );
                }
				$product_totl=$product['price']*$product['quantity'];
               
                $tax = '';
               
                $order_data['products'][] = array(
                    'product_id' => $product['product_id'],
                    'name'       => $product['title'],
                    'model'      => '',
                    'option'     => '',
                    'download'   => '',
                    'quantity'   => $product['quantity'],
                    'subtract'   => '',
                    'price'      => $product['price'],
                    'total'      => $product_totl,
                    'tax'        => '',
                    'reward'     => ''
                );
            }
			$order_product_id=$product['product_id'];
			
			   foreach ($order_data['products'] as $product) {
               
                /*$vendor_sql = $this->getonerow("SELECT v.vendor_id,v.commission_id,c.commission_type,c.commission FROM `oc_vendors` v INNER JOIN oc_vendor vp ON (v.vendor_id = vp.vendor) INNER JOIN oc_commission c ON (c.commission_id = v.commission_id) WHERE `vproduct_id` = '" . (int)$product['product_id'] . "'");
               
                if($vendor_sql['commission_type'] == 0){
                    $commission = $product['total'] * $vendor_sql['commission'] / 100;
                    $vendor_total = $product['total'] - $commission;
                } elseif($vendor_sql['commission_type'] > 0){
                    $commission = $vendor_sql['commission'];
                    $vendor_total = $product['total'] - $commission;
                } else{
                    $commission = 0;
                    $vendor_total = 0;
                }*/
               
                $order_product_id = mysql_query("INSERT INTO oc_order_product SET order_id = '" . (int)$order_id . "', product_id = '" . (int)$product['product_id'] . "', name = '" . addslashes($product['name']) . "', model = '" . addslashes($product['model']) . "', quantity = '" . (int)$product['quantity'] . "', price = '" . (float)$product['price'] . "', total = '" . (float)$product['total'] . "', tax = '" . (float)$product['tax'] . "', reward = '" . (int)$product['reward'] . "'");
               
                //,vendor_id = '".$vendor_sql['vendor_id']."',commission = '".$commission."',vendor_total = '".$vendor_total."'

                foreach ($product['option'] as $option) {
                    $this->insert("INSERT INTO oc_order_option SET order_id = '" . (int)$order_id . "', order_product_id = '" . (int)$order_product_id . "', product_option_id = '" . (int)$option['product_option_id'] . "', product_option_value_id = '" . (int)$option['product_option_value_id'] . "', name = '" . addslashes($option['name']) . "', `value` = '" . addslashes($option['value']) . "', `type` = '" . addslashes($option['type']) . "'");
                }
            }
			$ordertotal=$_REQUEST['total_amount'];
			
			mysql_query("INSERT INTO oc_order_total SET order_id = '" . (int)$order_id . "', code = 'total', title = 'Total', `value` = '" . (float)$ordertotal . "', sort_order = '1");
			
			$oder_total_update = "UPDATE oc_order SET total = '".$ordertotal."' WHERE order_id = '".$order_id."'";
            mysql_query($oder_total_update);
			$return_arry=="Order Successfully Placed";
			echo json_encode($return_arry);
			}else{
				$return_arry['message']=="Products Details Not found";
				$return_arry['error']=="Failed";
			echo json_encode("Products Details Not found");
				}
			
			
			die;
		}
?>

