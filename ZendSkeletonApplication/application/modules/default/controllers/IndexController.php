<?php
class IndexController extends Zend_Controller_Action
{
public $flashMessenger;
public $session;

    public function init(){
        /* Initialize action controller here */
		$this->flashMessenger = $this->_helper->FlashMessenger;
		$this->session = new Zend_Session_Namespace('login');
		
    }
		  public function indexAction(){
			   
			  // $this->_helper->layout->setLayout('iframe');
			   //$target = array('target' => 'content');
			   
			   if(!empty($this->session->userid)){
					if($this->session->role==3){
					  $this->redirect('/index/selectos');
					}elseif($this->session->role==2){
					$this->redirect('/user/index');
					}
				   $this->redirect('/index/selectos');
			       }else{
		  	  	  $this->redirect('/index/login');
				  
			   }
			   
	      }
		  
		   public function index1Action(){			    
			   $userdata=new Application_Model_User();
			   $resultrow=$userdata->findrow();
			   $this->view->resultrow = $resultrow;
			  }
		  
          public function addAction(){
		  try{
		     $userModel=new Application_Model_User();
			 $findr=$userModel->findrecords();
			 $info=$_REQUEST['info'];
			 $file_ma=$_FILES["step_3_image1"]["tmp_name"];
			 
			 ////////////////// Iphone///////////////////////////////////////////////////////
			 if(isset($_FILES['step_3_image1'])){
			  $errors= array();
			  $file_sizestep_3_image1 =$_FILES['step_3_image1']['size'];
			  $file_tmp =$_FILES['step_3_image1']['tmp_name'];
			  $file_type=$_FILES['step_3_image1']['type'];
		      $file_ext=explode('.',$_FILES['step_3_image1']['name']);
			  $expensions= array("jpeg","jpg","png");
//        	   if(in_array($file_ext[1],$expensions)=== false){
//				  $errors="extension not allowed, please choose a JPEG or PNG file.";
//				  $this->flashMessenger->addMessage($errors);
//			   }			   
			   if($file_sizestep_3_image1>0){
					 $step_3_image1 = uniqid().'_'.$_FILES['step_3_image1']['name'];
					 unlink(UPLOAD_DIRECTORY."/".$findr[0]->step_3_image1);
				  move_uploaded_file($file_tmp,UPLOAD_DIRECTORY."/".$step_3_image1);
			   }
			}
			
			/////////////////////////////  step_3_image2//////////////////////////////
			
			 if(isset($_FILES['step_3_image2'])){
			  $errors= array();
			 
			  $file_sizestep_3_image2 =$_FILES['step_3_image2']['size'];
			  $file_tmp =$_FILES['step_3_image2']['tmp_name'];
			  $file_type=$_FILES['step_3_image2']['type'];
		      $file_ext=explode('.',$_FILES['step_3_image2']['name']);
			  $expensions= array("jpeg","jpg","png");
//        	   if(in_array($file_ext[1],$expensions)=== false){
//				  $errors="extension not allowed, please choose a JPEG or PNG file.";
//				  $this->flashMessenger->addMessage($errors);
//			   }			   
			   if($file_sizestep_3_image2>0){
				  $step_3_image2 = uniqid().'_'.$_FILES['step_3_image2']['name'];
				  unlink(UPLOAD_DIRECTORY."/".$findr[0]->step_3_image2);
				  move_uploaded_file($file_tmp,UPLOAD_DIRECTORY."/".$step_3_image2);
			   }
			}
			//////////////////////// step_3_image3///////////////////////////////
			
			if(isset($_FILES['step_3_image3'])){
			  $errors= array();
			 
			  $file_sizestep_3_image3=$_FILES['step_3_image3']['size'];
			  $file_tmp =$_FILES['step_3_image3']['tmp_name'];
			  $file_type=$_FILES['step_3_image3']['type'];
		      $file_ext=explode('.',$_FILES['step_3_image3']['name']);
			  $expensions= array("jpeg","jpg","png");
//        	   if(in_array($file_ext[1],$expensions)=== false){
//				  $errors="extension not allowed, please choose a JPEG or PNG file.";
//				  $this->flashMessenger->addMessage($errors);
//			   }			   
			   if($file_sizestep_3_image3>0){
					 $step_3_image3 = uniqid().'_'.$_FILES['step_3_image3']['name'];
					 unlink(UPLOAD_DIRECTORY."/".$findr[0]->step_3_image3);
				  move_uploaded_file($file_tmp,UPLOAD_DIRECTORY."/".$step_3_image3);
			   }
			}
			/////////////////////////////step_3_1_image1//////////////////////////////////
			
			if(isset($_FILES['step_3_1_image1'])){
			  $errors= array();
			  
			  $file_sizestep_3_1_image1 =$_FILES['step_3_1_image1']['size'];
			  $file_tmp =$_FILES['step_3_1_image1']['tmp_name'];
			  $file_type=$_FILES['step_3_1_image1']['type'];
		      $file_ext=explode('.',$_FILES['step_3_1_image1']['name']);
			  $expensions= array("jpeg","jpg","png");
   
			 if($file_sizestep_3_1_image1>0){
					$step_3_1_image1 = uniqid().'_'.$_FILES['step_3_1_image1']['name'];
					unlink(UPLOAD_DIRECTORY."/".$findr[0]->step_3_1_image1);
				  move_uploaded_file($file_tmp,UPLOAD_DIRECTORY."/".$step_3_1_image1);
			   }
			}
			
				/////////////////////////////step_3_1_image2//////////////////////////////////
			   if(isset($_FILES['step_3_1_image2'])){
			  $errors= array();
			  $file_sizestep_3_1_image2 =$_FILES['step_3_1_image2']['size'];
			
			  $file_tmp =$_FILES['step_3_1_image2']['tmp_name'];
			  $file_type=$_FILES['step_3_1_image2']['type'];
		      $file_ext=explode('.',$_FILES['step_3_1_image2']['name']);
			  $expensions= array("jpeg","jpg","png");
//        	   if(in_array($file_ext[1],$expensions)=== false){
//				  $errors="extension not allowed, please choose a JPEG or PNG file.";
//				  $this->flashMessenger->addMessage($errors);
//			   }			   
			    if($file_sizestep_3_1_image2>0){
					$step_3_1_image2 =uniqid().'_'.$_FILES['step_3_1_image2']['name'];
					unlink(UPLOAD_DIRECTORY."/".$findr[0]->step_3_1_image2);
				  move_uploaded_file($file_tmp,UPLOAD_DIRECTORY."/".$step_3_1_image2);
			   }
			}
			
			/////////////////////////////// Android////////////////////////////////////////////
			
			 if(isset($_FILES['step_3_a_image1'])){
			  $errors= array();
			  $file_sizestep_3_a_image1 =$_FILES['step_3_a_image1']['size'];
			  $file_tmp =$_FILES['step_3_a_image1']['tmp_name'];
			  $file_type=$_FILES['step_3_a_image1']['type'];
		      $file_ext=explode('.',$_FILES['step_3_a_image1']['name']);
			  $expensions= array("jpeg","jpg","png");
		   
			   if($file_sizestep_3_a_image1>0){
					 $step_3_a_image1 = uniqid().'_'.$_FILES['step_3_a_image1']['name'];
					 unlink(UPLOAD_DIRECTORY."/".$findr[0]->step_3_a_image1);
				  move_uploaded_file($file_tmp,UPLOAD_DIRECTORY."/".$step_3_a_image1);
			   }
			}
			
			/////////////////////////////  step_3_image2//////////////////////////////
			
			 if(isset($_FILES['step_3_a_image2'])){
			  $errors= array();
			 
			  $file_sizestep_3_a_image2 =$_FILES['step_3_a_image2']['size'];
			  $file_tmp =$_FILES['step_3_a_image2']['tmp_name'];
			  $file_type=$_FILES['step_3_a_image2']['type'];
		      $file_ext=explode('.',$_FILES['step_3_a_image2']['name']);
			  $expensions= array("jpeg","jpg","png");
		   
			   if($file_sizestep_3_a_image2>0){
				  $step_3_a_image2 = uniqid().'_'.$_FILES['step_3_a_image2']['name'];
				  unlink(UPLOAD_DIRECTORY."/".$findr[0]->step_3_a_image2);
				  move_uploaded_file($file_tmp,UPLOAD_DIRECTORY."/".$step_3_a_image2);
			   }
			}
			//////////////////////// step_3_image3///////////////////////////////
			
			if(isset($_FILES['step_3_a_image3'])){
			  $errors= array();
			 
			  $file_sizestep_3_a_image3=$_FILES['step_3_a_image3']['size'];
			  $file_tmp =$_FILES['step_3_a_image3']['tmp_name'];
			  $file_type=$_FILES['step_3_a_image3']['type'];
		      $file_ext=explode('.',$_FILES['step_3_a_image3']['name']);
			  $expensions= array("jpeg","jpg","png");
//        	   if(in_array($file_ext[1],$expensions)=== false){
//				  $errors="extension not allowed, please choose a JPEG or PNG file.";
//				  $this->flashMessenger->addMessage($errors);
//			   }			   
			   if($file_sizestep_3_a_image3>0){
					 $step_3_a_image3 = uniqid().'_'.$_FILES['step_3_a_image3']['name'];
					 unlink(UPLOAD_DIRECTORY."/".$findr[0]->step_3_a_image3);
				  move_uploaded_file($file_tmp,UPLOAD_DIRECTORY."/".$step_3_a_image3);
			   }
			}
			/////////////////////////////step_3_1_image1//////////////////////////////////
			
			if(isset($_FILES['step_3_1_a_image1'])){
			  $errors= array();
			  
			  $file_sizestep_3_1_a_image1 =$_FILES['step_3_1_a_image1']['size'];
			  $file_tmp =$_FILES['step_3_1_a_image1']['tmp_name'];
			  $file_type=$_FILES['step_3_1_a_image1']['type'];
		      $file_ext=explode('.',$_FILES['step_3_1_a_image1']['name']);
			  $expensions= array("jpeg","jpg","png");
//        	   if(in_array($file_ext[1],$expensions)=== false){
//				  $errors="extension not allowed, please choose a JPEG or PNG file.";
//				  $this->flashMessenger->addMessage($errors);
//			   }			   
			 if($file_sizestep_3_1_a_image1>0){
					$step_3_1_a_image1 = uniqid().'_'.$_FILES['step_3_1_a_image1']['name'];
					 unlink(UPLOAD_DIRECTORY."/".$findr[0]->step_3_1_a_image1);
				  move_uploaded_file($file_tmp,UPLOAD_DIRECTORY."/".$step_3_1_a_image1);
			   }
			}
			
				/////////////////////////////step_3_1_image2//////////////////////////////////
			   if(isset($_FILES['step_3_1_a_image2'])){
			  $errors= array();
			  $file_sizestep_3_1_a_image2 =$_FILES['step_3_1_a_image2']['size'];
			  $file_tmp =$_FILES['step_3_1_a_image2']['tmp_name'];
			  $file_type=$_FILES['step_3_1_a_image2']['type'];
		      $file_ext=explode('.',$_FILES['step_3_1_a_image2']['name']);
			  $expensions= array("jpeg","jpg","png");

			    if($file_sizestep_3_1_a_image2>0){
					$step_3_1_a_image2 =uniqid().'_'.$_FILES['step_3_1_a_image2']['name'];
					unlink(UPLOAD_DIRECTORY."/".$findr[0]->step_3_1_a_image2);
				  move_uploaded_file($file_tmp,UPLOAD_DIRECTORY."/".$step_3_1_a_image2);
			   }
			}
			
			
			
		  
		  ///////////////////////////////////////////////////////////////////

			if(!empty($step_3_image1)) {
			   $info['step_3_image1']=$step_3_image1;
			 }
			  if(!empty($step_3_image2)) {
			   $info['step_3_image2']=$step_3_image2;
			 }
			 if(!empty($step_3_image3)) {
			   $info['step_3_image3']=$step_3_image3;
			 }
			  if(!empty($step_3_1_image1)) {
			   $info['step_3_1_image1']=$step_3_1_image1;
			 }
			 if(!empty($step_3_1_image2)) {
			   $info['step_3_1_image2']=$step_3_1_image2;
			 }
			 
			 //////
			 
			 if(!empty($step_3_a_image1)) {
			   $info['step_3_a_image1']=$step_3_a_image1;
			 }
			 
			 if(!empty($step_3_a_image2)) {
			   $info['step_3_a_image2']=$step_3_a_image2;
			 }
			 
			  if(!empty($step_3_a_image3)) {
			   $info['step_3_a_image3']=$step_3_a_image3;
			 }
			 
			 if(!empty($step_3_1_a_image1)) {
			   $info['step_3_1_a_image1']=$step_3_1_a_image1;
			 }
			 
			  if(!empty($step_3_1_a_image2)) {
			   $info['step_3_1_a_image2']=$step_3_1_a_image2;
			 }
			 
			 
			 
			
	
			$user_id=$userModel->add($info);
			if(is_numeric($user_id)){
			$this->flashMessenger->addMessage('Inserted');
			}else{
				$this->flashMessenger->addMessage('Error in insertion');
			}			
		  }catch(Exception $e){
		  if(!empty($flashMessenger)){
				$this->_helper->layout->getView()->message = $flashMessenger[0];}
			}
				$this->redirect('/index/index');
	
    }
	
	//////////////////////////// choose device image manage //////////////////
	
	   public function chooseupdateAction(){
		  try{
		  	 $info=$_REQUEST['info'];
			 			 			 
			 		 
			  if(isset($_FILES['image_1'])){
			  $errors= array();
			  $file_sizeimage_1 =$_FILES['image_1']['size'];
			  $file_tmp =$_FILES['image_1']['tmp_name'];
			  $file_type=$_FILES['image_1']['type'];
		      $file_ext=explode('.',$_FILES['image_1']['name']);
			  $expensions= array("jpeg","jpg","png");
//        	   if(in_array($file_ext[1],$expensions)=== false){
//				  $errors="extension not allowed, please choose a JPEG or PNG file.";
//				  $this->flashMessenger->addMessage($errors);
//			   }			   
			   if($file_sizeimage_1>0){
					 $image_1 = uniqid().'_'.$_FILES['image_1']['name'];
					 move_uploaded_file($file_tmp,UPLOAD_DIRECTORY."/".$image_1);
			   }
			}
			
			/////////////////////////////  step_3_image2//////////////////////////////
			
			 if(isset($_FILES['image_2'])){
			  $errors= array();
			 
			  $file_sizeimage_2 =$_FILES['image_2']['size'];
			  $file_tmp =$_FILES['image_2']['tmp_name'];
			  $file_type=$_FILES['image_2']['type'];
		      $file_ext=explode('.',$_FILES['image_2']['name']);
			  $expensions= array("jpeg","jpg","png");
//        	   if(in_array($file_ext[1],$expensions)=== false){
//				  $errors="extension not allowed, please choose a JPEG or PNG file.";
//				  $this->flashMessenger->addMessage($errors);
//			   }			   
			   if($file_sizeimage_2>0){
				  $image_2 = uniqid().'_'.$_FILES['image_2']['name'];
				  move_uploaded_file($file_tmp,UPLOAD_DIRECTORY."/".$image_2);
			   }
			}
			

			if(!empty($image_1)) {
			   $info['image_1']=$image_1;
			 }
			  if(!empty($image_2)) {
			   $info['image_2']=$image_2;
			 }
			 
			
			$userModel=new Application_Model_User();
			$user_id=$userModel->chooseupdate($info);
			if(is_numeric($user_id)){
			$this->flashMessenger->addMessage('Inserted');
			}else{
				$this->flashMessenger->addMessage('Error in insertion');
			}			
		  }catch(Exception $e){
		  if(!empty($flashMessenger)){
				$this->_helper->layout->getView()->message = $flashMessenger[0];}
			}
				$this->redirect('/index/choosedevice');
	
    }
	
	//////////////////////////// choose device image manage closed//////////////////
	
     public function showAction()
    {
	 $userModel=new Application_Model_List();
	 $data=$userModel->finddata();
	 //print_r($data);die;
      $this->view->listing = $data;
	  $this->view->message = $this->flashMessenger->getMessages();
        
    }
	
	 public function fronthandAction(){
		  
		        $userdata=new Application_Model_User();
			    $resultrow=$userdata->findhandchoose();
			    $this->view->resultrow = $resultrow;
    }
	
	 public function sendotpAction(){
	 $userdata=new Application_Model_User();
     $resultrow=$userdata->findstep2text();
	 
	 
				
	 $sendotpid=$this->getParam('id');
	 if(!empty($sendotpid)){	 
	 if($sendotpid=='iphone'){
		  $link="http://www.iphone.com";
	 }if($sendotpid=='android'){
		  $link="http://www.android.com";
	 }
	 $snddata=array('id'=>$sendotpid,'link'=>$link,'txtshow'=>$resultrow);
	 $this->view->sendotp = $snddata;
	 }else{
		  $this->redirect('/index/index');
	 }}
	
  
	 public function sendmsgAction(){
		  
		  $otp_number= mt_rand(100000, 999999);
		 $userModel=new Application_Model_User();
		 $otp_number=$userModel->findotpexist($otp_number);
	 
		  $path= get_include_path();
		  $lbpath=explode(':',get_include_path());
		  
//		  $secret = '6LfNFx0TAAAAAH65tp8ycevX1GhkEderT2vVDe_2';
//         $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.		$_POST['g-recaptcha-response']);
//        $responseData = json_decode($verifyResponse);
//        if($responseData->success){
		
		//echo  $otp_date = date('m/d/Y h:i:s a', time());die;
		 $otp_date=date('Y-m-d H:i:s',time());
		 $types=$_POST['type'];
		 if($types=='iphone'){
		  $link="Please select the link to begin downloading your diagnostics application,  One time OTP for Verification:-".$otp_number." App Download Link:- http://bit.ly/1PiFMI9";
		   }if($types=='android'){
		  $link="Please select the link to begin downloading your diagnostics application,  One time OTP for Verification:-".$otp_number." App Download Link:- http://bit.ly/20UCTFi

";
		   }
		 if(empty($_POST['ctn']) and  empty($_POST['email'])){
		
		 $this->_helper->flashMessenger('/index/sendotp/id/'.$types)->addMessage('Please add email id or mobile no', 'success');
	 	 $this->redirect('/index/sendotp/id/'.$types);
               
		  }else{
			  
			   require_once(APPLICATION_PATH_SMS.'/IntelliSMS_PHPSDK/SendScripts/IntelliSMS.php');
		  $objIntelliSMS = new IntelliSMS();
		  $objIntelliSMS->Username = 'trueconnectivity';
		  $objIntelliSMS->Password = 'YSwuVNhgfYUdwK2k';
		  $body=$link;
		  $subject="One Time OTP for Your". $_POST['type']." Apps";
		  $SendStatusCollection = $objIntelliSMS->SendMessage ( $_POST['ctn'], $body, '44771023456' );
		  //Prepare email
			   try{
			       $config = array('auth' => 'login',
                    'username' => 'myusername',
                    'password' => 'password');
			       $transport = new Zend_Mail_Transport_Smtp('mail.server.com', $config);
				   $mail = new Zend_Mail();
				   $mail->setBodyText('This is the text of the mail.');
				   $mail->setFrom('sender@test.com', 'Some Sender');
				   $mail->addTo('recipient@test.com', 'Some Recipient');
				   $mail->setSubject('TestSubject');
				   $mail->send($transport);
			   }catch(Exception $e) {
								
			   }

			   //
			   if(!empty($_POST['imei'])){
					$imei=$_POST['imei'];
			   }else{
					$imei="";					
			   }
$data=array('ctn'=>$_POST['ctn'],'email'=>$_POST['email'],'imei'=>$imei,'type'=>$_POST['type'],'otp_number'=>$otp_number,'otp_send_time'=>$otp_date);
			   
		  	   $user_id=$userModel->otpadd($data);
			   if(is_numeric($user_id)){
					//$this->flashMessenger->addMessage('OTP Send Successfully');
					// $this->redirect('/index/finalpage/type/'.$_POST['type']);
			 $this->_helper->flashMessenger('/index/finalpage/type/'.$_POST['type'])->addMessage('OTP Send Successfully');
	 	   $this->redirect('/index/finalpage/type/'.$_POST['type']);
		   
			   }else{
					$this->_helper->flashMessenger('/index/finalpage/type/'.$_POST['type'])->addMessage('Error In sending OTP');
		  	 	   $this->redirect('/index/finalpage/type/'.$_POST['type']);
					
			 }
			 
		  
		  }
	//	}
	//	else{
	//	  
	//	  
	//	   $this->_helper->flashMessenger('/index/sendotp/id/'.$_POST['type'])->addMessage('You are robot', 'error');
	// 	   $this->redirect('/index/sendotp/id/'.$_POST['type']);
	//	   //$this->redirect('/index/fronthand/');
	//	}
	}
	
	
    public function registrationAction(){}
	
	
	
	public function deviceAction(){}
	
	public function finalpageAction(){
	 $type=$this->getParam('type');
	  $userModel=new Application_Model_User();
	  $data=$userModel->findpage($type);
	  // $this->view->finalpage = $data;
	   $this->view->assign('data', $data);
	 
	}
	
	
	 public function manageAction(){
	 $this->view->message = $this->flashMessenger->getMessages();       
    }
	
	 public function choosedeviceAction(){
		  
		    $userdata=new Application_Model_User();
			   $resultrow=$userdata->findrowchoose();
			  $this->view->resultrow = $resultrow;
	     
    }
	
	 public function validateoptAction(){
		  
		   $otp=$this->getParam('otp');
		   if(!empty($otp)){
		   $userModel=new Application_Model_User();
		echo   $data=$userModel->findotpuser($otp);
		  die;
		   }else{
			    $this->redirect('/index/index/');
		   }		  
		  }
		  
	 public function smsAction(){
	  $userdata=new Application_Model_User();
	  $resultrow=$userdata->findmsgcredentials();
	  $this->view->resultrow = $resultrow;
	}
	
	public function emailAction(){
	  $userdata=new Application_Model_User();
	  $resultrow=$userdata->findmsgcredentials();
	  $this->view->resultrow = $resultrow;
	}
	
	public function showrecordsAction(){
	  $userdata=new Application_Model_User();
	  $resultrow=$userdata->showrecords();
	  $this->view->resultrow = $resultrow;
	}
	
	
	
	 public function updatemessageAction(){
		  try{
		  	 $info=$_REQUEST['info'];
			 $userModel=new Application_Model_User();
			 $user_id=$userModel->updatemessage($info);
			 if(is_numeric($user_id)){
			 $this->flashMessenger->addMessage('Inserted');
			  }else{
				$this->flashMessenger->addMessage('Error in insertion');
			 }			
		    }catch(Exception $e){
		  if(!empty($flashMessenger)){
				$this->_helper->layout->getView()->message = $flashMessenger[0];}
			}
				$this->redirect('/index/sms');
	
    }
	
	
	public function updateemailAction(){
		  try{
		  	 $info=$_REQUEST['info'];
			
			$userModel=new Application_Model_User();
			$user_id=$userModel->updatemessage($info);
			if(is_numeric($user_id)){
			$this->flashMessenger->addMessage('Inserted');
			}else{
				$this->flashMessenger->addMessage('Error in insertion');
			}			
		  }catch(Exception $e){
		  if(!empty($flashMessenger)){
				$this->_helper->layout->getView()->message = $flashMessenger[0];}
			}
				$this->redirect('/index/email');
	
    }
	
	public function loginAction(){}
	public function searchrecordsAction(){}
	
	public function sendotpmobileAction(){
		  if(!empty($this->session->userid)){
			   $userdata=new Application_Model_User();
			   $resultrow=$userdata->findstep2text();
			   $sendotpid=$this->getParam('id');
			   if(!empty($sendotpid)){	 
			    if($sendotpid=='iphone'){
				   $link="http://www.iphone.com";
			    }if($sendotpid=='android'){
				   $link="http://www.android.com";
			    }
					$snddata=array('id'=>$sendotpid,'link'=>$link,'txtshow'=>$resultrow);
					$this->view->sendotp = $snddata;
					}else{
				    $this->redirect('/index/index');
			       }
				}else{
				   $this->_helper->flashMessenger('/index/login'.$types)->addMessage('Please Login.', 'success');
				   $this->redirect('/index/login');
			   }
	}
	

	public function selectosAction(){
	if(!empty($this->session->userid)){
	 $userdata=new Application_Model_User();
     $resultrow=$userdata->findhandchoose();
	 $this->view->resultrow = $resultrow;
	 $userid=$this->session->userid;
	 $userinfo=$userdata->finduserinfo($userid);
	 
	 $snddata=array('resultrow1'=>$resultrow,'userinfo'=>$userinfo);
	 $this->view->resultrow =$snddata;	 
	}else{
	  $this->_helper->flashMessenger('/index/login')->addMessage('Please Login.', 'success');
	  $this->redirect('/index/login');
	}
	}
	public function logincheckAction(){
	 
	
	 $userModel=new Application_Model_User();
	 $username = $this->_request->getPost('user_name');
	 $password = $this->_request->getPost('password');
	if($username !="" && $password !=""){
			   $password=md5($password);
	 		   $data=$userModel->loggedincheck($username,$password);
			  if(!empty($data)){
					$this->session->userid=$data[0]->id;
					if($data[0]->role==3){
					$this->redirect('/index/selectos');
					$this->session->role=$data[0]->role;
					$this->session->type='Site User';
	 				}elseif($data[0]->role==2){
					$this->session->role=$data[0]->role;
					$this->session->type='Site Admin';
					$this->redirect('/user');
					}
			   }else{
					$this->_helper->flashMessenger('/index/login'.$types)->addMessage('Wrong username or password. Please try again.', 'success');
			        $this->redirect('/index/login');
					}
			   }
		  else{
			   $this->_helper->flashMessenger('/index/login'.$types)->addMessage('Username or password Not be blank.', 'success');
			   $this->redirect('/index/login');
			   } 
	 }
	 
	   public function logoutAction()
    {
        # clear everything - session is cleared also!
        Zend_Session::namespaceUnset('login');
        $this->_redirect('index/login');
    }   
	 
	
	


}

