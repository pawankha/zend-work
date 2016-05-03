<?php
class IndexController extends Zend_Controller_Action
{
public $flashMessenger;

    public function init(){
        /* Initialize action controller here */
		$this->flashMessenger = $this->_helper->FlashMessenger;
    }
		  public function indexAction(){
			   $userdata=new Application_Model_User();
			   $resultrow=$userdata->findrow();
			  $this->view->resultrow = $resultrow;
			   
	      }
          public function addAction(){
		  try{
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
//        	   if(in_array($file_ext[1],$expensions)=== false){
//				  $errors="extension not allowed, please choose a JPEG or PNG file.";
//				  $this->flashMessenger->addMessage($errors);
//			   }			   
			 if($file_sizestep_3_1_image1>0){
					$step_3_1_image1 = uniqid().'_'.$_FILES['step_3_1_image1']['name'];
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
//        	   if(in_array($file_ext[1],$expensions)=== false){
//				  $errors="extension not allowed, please choose a JPEG or PNG file.";
//				  $this->flashMessenger->addMessage($errors);
//			   }			   
			   if($file_sizestep_3_a_image1>0){
					 $step_3_a_image1 = uniqid().'_'.$_FILES['step_3_a_image1']['name'];
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
//        	   if(in_array($file_ext[1],$expensions)=== false){
//				  $errors="extension not allowed, please choose a JPEG or PNG file.";
//				  $this->flashMessenger->addMessage($errors);
//			   }			   
			   if($file_sizestep_3_a_image2>0){
				  $step_3_a_image2 = uniqid().'_'.$_FILES['step_3_a_image2']['name'];
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
//        	   if(in_array($file_ext[1],$expensions)=== false){
//				  $errors="extension not allowed, please choose a JPEG or PNG file.";
//				  $this->flashMessenger->addMessage($errors);
//			   }			   
			    if($file_sizestep_3_1_a_image2>0){
					$step_3_1_a_image2 =uniqid().'_'.$_FILES['step_3_1_a_image2']['name'];
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
			 
			 
			 
			
			$userModel=new Application_Model_User();
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
	
     public function showAction()
    {
	 $userModel=new Application_Model_List();
	 $data=$userModel->finddata();
	 //print_r($data);die;
      $this->view->listing = $data;
	  $this->view->message = $this->flashMessenger->getMessages();
        
    }
	
	 public function fronthandAction(){       
    }
	
	 public function sendotpAction(){
	 $sendotpid=$this->getParam('id');
	 if(!empty($sendotpid)){	 
	 if($sendotpid=='iphone'){
		  $link="http://www.iphone.com";
	 }if($sendotpid=='android'){
		  $link="http://www.android.com";
	 }
	 $snddata=array('id'=>$sendotpid,'link'=>$link);
	 $this->view->sendotp = $snddata;
	 }else{
		  $this->redirect('/index/index');
	 }}
	
  
	 public function sendmsgAction(){
		  
		  $otp_number= mt_rand(100000, 999999);
		  
		  $path= get_include_path();
		  $lbpath=explode(':',get_include_path());
		  
		  $secret = '6LeRFh0TAAAAANyfpBbyuAfVE9ft0E7pnvYxwVR-';
         $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.		$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success){
		
		//echo  $otp_date = date('m/d/Y h:i:s a', time());die;
		 $otp_date=date('Y-m-d H:i:s',time());
		
		 if(empty($_POST['ctn']) and  empty($_POST['email'])){
		 $types=$_POST['type'];
		 $this->_helper->flashMessenger('/index/sendotp/id/'.$types)->addMessage('Please add email id or mobile no', 'success');
	 	 $this->redirect('/index/sendotp/id/'.$types);
               
		  }else{
			  
			   require_once(APPLICATION_PATH_SMS.'/IntelliSMS_PHPSDK/SendScripts/IntelliSMS.php');
		  $objIntelliSMS = new IntelliSMS();
		  $objIntelliSMS->Username = 'blackbelt';
		  $objIntelliSMS->Password = 'blackbelt123';
		  $body="One time OTP for Verification:-".$otp_number;
		  $subject="One Time OTP for Your". $_POST['type']." Apps";
		  $SendStatusCollection = $objIntelliSMS->SendMessage ( $_POST['ctn'], $body, '44771023456' );
		  //Prepare email
			   		
//			       $config = array('auth' => 'login',
//                    'username' => 'myusername',
//                    'password' => 'password');
//			       $transport = new Zend_Mail_Transport_Smtp('mail.server.com', $config);
//				   $mail = new Zend_Mail();
//				   $mail->setBodyText('This is the text of the mail.');
//				   $mail->setFrom('sender@test.com', 'Some Sender');
//				   $mail->addTo('recipient@test.com', 'Some Recipient');
//				   $mail->setSubject('TestSubject');
//				   $mail->send($transport);

			   //
$data=array('ctn'=>$_POST['ctn'],'email'=>$_POST['email'],'imei'=>$_POST['imei'],'type'=>$_POST['type'],'otp_number'=>$otp_number,'otp_send_time'=>$otp_date);
			   $userModel=new Application_Model_User();
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
		}
		else{
		  
		  
		   $this->_helper->flashMessenger('/index/sendotp/id/'.$_POST['type'])->addMessage('You are robot', 'error');
	 	   $this->redirect('/index/sendotp/id/'.$_POST['type']);
		   //$this->redirect('/index/fronthand/');
		}
	}
	
	
    public function registrationAction(){}
	
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
	
	 public function validateoptAction(){
		  
		   $otp=$this->getParam('otp');
		   $ctn=$this->getParam('ctn');
		   $imei=$this->getParam('imei');
		   if(!empty($otp) and !empty($ctn) and !empty($imei)){
		   $userModel=new Application_Model_User();
		echo   $data=$userModel->findotpuser($otp,$ctn,$imei);
		  die;
		   }else{
			    $this->redirect('/index/index/');
		   }		  
		  } 
	 
	
	


}

