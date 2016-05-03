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
	public function findpage($type) {
		try{
			$sql = 'select * from manage_text where id=7';
			$stmt = $this->dbAdapter->query($sql);
			$results = $stmt->fetchAll();
			//print_r($results)
			if($type=="iphone"){
				$data=array("step_1_above_text"=>$results[0]->step_1_above_text,"step_1_below_text"=>$results[0]->step_1_below_text,"step_3_image1"=>$results[0]->step_3_image1,"step_3_image2"=>$results[0]->step_3_image2,"step_3_image3"=>$results[0]->step_3_image3,"step_3_1_image1"=>$results[0]->step_3_1_image1,"step_3_1_image2"=>$results[0]->step_3_1_image2);
			
			}if($type=="android"){
				
				$data=array("step_2_above_text"=>$results[0]->step_2_above_text,"step_2_below_text"=>$results[0]->step_2_below_text,"step_3_a_image1"=>$results[0]->step_3_a_image1,"step_3_a_image2"=>$results[0]->step_3_a_image2,"step_3_a_image3"=>$results[0]->step_3_a_image3,"step_3_1_a_image1"=>$results[0]->step_3_1_a_image1,"step_3_1_a_image2"=>$results[0]->step_3_1_a_image2);
				
			}
			return $data;
			}catch(Exception $e){
			throw $e;
			}	
    }
	
	
	public function findotpuser($otp,$ctn,$imei) {
		try{
			
		
		$sql = "select * from manage_otp where otp_number='".$otp."' and ctn='".$ctn."' and imei='".$imei."'";
		$stmt = $this->dbAdapter->query($sql);
		$results = $stmt->fetchAll();
			
			if(count($results)>0){
				
					$time = strtotime(date($results[0]->otp_send_time));
					$otp_check= date("Y/m/d H:i:s",strtotime("+15 minutes", $time));
					$dataee= strtotime($otp_check);
					$current_date=strtotime(date("Y/m/d H:i:s"));
			
				if($results[0]->status!=1){ // check user already use token or not
					if($dataee>=$current_date){  /// check token number is expire or not
					$data21=array('status'=>1);
					$id=$this->dbAdapter->update('manage_otp',$data21,'otp_number='.$otp.' and ctn='.$ctn." and imei='".$imei."'");
					return "updated";
					}else{
					return "token Expired";
					}
					}else{
					return "Already Verified";
				}
				}else{
				return "Invalid OTP Number";
				}
		}catch(Exception $e){
			throw $e;
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
	
}

