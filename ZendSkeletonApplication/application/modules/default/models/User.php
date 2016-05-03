<?php

class Application_Model_User
{

    private $dbAdapter;
    private $session;

    public function __construct() {
        $this->dbAdapter = Zend_Registry::get('db');
        $this->session = new Zend_Session_Namespace('user');
    }

    /**
     * Function getUserInfo
     * @var void
     * @return array
     */
    public function add($data) {
		try{
			return $id=$this->dbAdapter->update('manage_text',$data,'id = 7');
			//return $id = $this->dbAdapter->lastInsertId();
			}catch(Exception $e){
			throw $e;
			}	
    }
	
	 public function chooseupdate($data) {
		try{
			return $id=$this->dbAdapter->update('manage_choosedevice',$data,'id = 1');
			//return $id = $this->dbAdapter->lastInsertId();
			}catch(Exception $e){
			throw $e;
			}	
    }
	
	
	
	public function findhandchoose() {
		try{
			$sql = 'select * from manage_choosedevice where id=1';
			$stmt = $this->dbAdapter->query($sql);
			$results = $stmt->fetchAll();
			return $results;
			}catch(Exception $e){
			throw $e;
			}	
    }
	
	public function finduserinfo($id) {
		try{
			$sql = 'select * from users where id='.$id;
			$stmt = $this->dbAdapter->query($sql);
			$results = $stmt->fetchAll();
			return $results;
			}catch(Exception $e){
			throw $e;
			}	
    }
	
	
	public function findstep2text() {
		try{
			$sql = 'select * from manage_choosedevice where id=1';
			$stmt = $this->dbAdapter->query($sql);
			$results = $stmt->fetchAll();
			return $results[0]->text_otp_page;
			}catch(Exception $e){
			throw $e;
			}	
    }
	
	
	public function findotpexist($otp_number) {
		try{
			$sql = 'select * from manage_otp where otp_number='.$otp_number.' and status=0';
			$stmt = $this->dbAdapter->query($sql);
			$results = $stmt->fetchAll();
			if(count($results)>0)
		     {
				$otp_number= mt_rand(100000, 999999);
				$this->findotpexist($otp_number);
			 }
			return $otp_number;
			}catch(Exception $e){
			throw $e;
			}	
    }
	
	
	public function findrow() {
		try{
			$sql = 'select * from manage_text where id=7';
			$stmt = $this->dbAdapter->query($sql);
			$results = $stmt->fetchAll();
			return $results;
			}catch(Exception $e){
			throw $e;
			}	
    }
	public function findrowchoose() {
		try{
			$sql = 'select * from manage_choosedevice where id=1';
			$stmt = $this->dbAdapter->query($sql);
			$results = $stmt->fetchAll();
			return $results;
			}catch(Exception $e){
			throw $e;
			}	
    }
	
		public function findmsgcredentials() {
		try{
			$sql = 'select * from manage_sms_gateway where id=1';
			$stmt = $this->dbAdapter->query($sql);
			$results = $stmt->fetchAll();
			return $results;
		
			}catch(Exception $e){
			throw $e;
			}	
    }
	
	
	public function findrecords() {
		try{
			$sql = 'select * from manage_text where id=7';
			$stmt = $this->dbAdapter->query($sql);
			$results = $stmt->fetchAll();
			return $results;
			}catch(Exception $e){
			throw $e;
			}	
    }
	
	
	
	public function findpage($type) {
		try{
			$sql = 'select * from manage_text where id=7';
			$stmt = $this->dbAdapter->query($sql);
			$results = $stmt->fetchAll();

			if($type=="iphone"){
				$data=array("step_1_above_text"=>$results[0]->step_1_above_text,"step_1_below_text"=>$results[0]->step_1_below_text,"step_3_image1"=>$results[0]->step_3_image1,"step_3_image2"=>$results[0]->step_3_image2,"step_3_image3"=>$results[0]->step_3_image3,"step_3_1_image1"=>$results[0]->step_3_1_image1,"step_3_1_image2"=>$results[0]->step_3_1_image2,"type"=>'iphone');
			
			}if($type=="android"){
				
				$data=array("step_2_above_text"=>$results[0]->step_2_above_text,"step_2_below_text"=>$results[0]->step_2_below_text,"step_3_a_image1"=>$results[0]->step_3_a_image1,"step_3_a_image2"=>$results[0]->step_3_a_image2,"step_3_a_image3"=>$results[0]->step_3_a_image3,"step_3_1_a_image1"=>$results[0]->step_3_1_a_image1,"step_3_1_a_image2"=>$results[0]->step_3_1_a_image2,"type"=>'android');
				
			}
				
			return $data;
			}catch(Exception $e){
			throw $e;
			}	
    }
	
	
	public function findotpuser($otp) {
		try{
			
		
		$sql = "select * from manage_otp where otp_number='".$otp."'";
		$stmt = $this->dbAdapter->query($sql);
		$results = $stmt->fetchAll();
		
		$sql1 = "select * from manage_choosedevice where id=1";
		$stmt1 = $this->dbAdapter->query($sql1);
		$results1 = $stmt1->fetchAll();
		$exp_time=$results1[0]->otp_expire_time;
		if($exp_time>0)
		{
			$exp_time=$exp_time;
			
		}else{
			$exp_time=0;
			
		}
	
			if(count($results)>0){
				
					$time = strtotime(date($results[0]->otp_send_time));
					$otp_check= date("Y/m/d H:i:s",strtotime("+".$exp_time." minutes", $time));
					
					$dataee= strtotime($otp_check);
					$current_date=strtotime(date("Y/m/d H:i:s"));
			
				if($results[0]->status!=1){ // check user already use token or not
					if($dataee>=$current_date){  /// check token number is expire or not
					$data21=array('status'=>1);
					$id=$this->dbAdapter->update('manage_otp',$data21,'otp_number='.$otp);
					$jsondata=array('status'=>1,'message'=>'Success');
				    return $phpNative = Zend_Json::encode($jsondata, Zend_Json::TYPE_OBJECT);
					//print_r($phpNative);die;
					}else{
						$jsondata=array('status'=>0,'message'=>'Token Expired');
				       return $phpNative = Zend_Json::encode($jsondata, Zend_Json::TYPE_OBJECT);
					
					}
					}else{
					  $jsondata=array('status'=>1,'message'=>'Already Verified');
				       return $phpNative = Zend_Json::encode($jsondata, Zend_Json::TYPE_OBJECT);
					
				}
				}else{
					$jsondata=array('status'=>0,'message'=>'Invalid OTP Number');
				    return $phpNative = Zend_Json::encode($jsondata, Zend_Json::TYPE_OBJECT);
				return "Invalid OTP Number";
				}
		}catch(Exception $e){
			//throw $e;
		               $jsondata=array('status'=>0,'message'=>$e);
				       return $phpNative = Zend_Json::encode($jsondata, Zend_Json::TYPE_OBJECT);
			}	
    }
	
	
	public function otpadd($data) {
		try{
			$this->dbAdapter->insert('manage_otp',$data);
			return $id = $this->dbAdapter->lastInsertId();
			}catch(Exception $e){
			throw $e;
			}	
    }
	
	public function updatemessage($data) {
		try{
			return $id=$this->dbAdapter->update('manage_sms_gateway',$data,'id = 1');
			//return $id = $this->dbAdapter->lastInsertId();
			}catch(Exception $e){
			throw $e;
			}	
    }
	
	 public function showrecords() {
		
		
			$sql = 'select * from manage_otp';
			$stmt = $this->dbAdapter->query($sql);
			$results = $stmt->fetchAll();
			return $results;

		
    }
	public function loggedincheck($username,$password)
	{
		$sql = 'select * from users where user_name="'.$username.'" and password="'.$password.'"';
		$stmt = $this->dbAdapter->query($sql);
		$results = $stmt->fetchAll();
		//print_r($results);die;
		return $results;
		
		
	}
	
	
	
}

