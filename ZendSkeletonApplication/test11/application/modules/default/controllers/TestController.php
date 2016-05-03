<?php

class TestController extends Zend_Controller_Action
{

public $flashMessenger;
    public function init()
    {
        /* Initialize action controller here */
					
					
		$this->flashMessenger = $this->_helper->FlashMessenger;

    }

    public function indexAction()
    {
         echo "Test Controller";
         
        // action body
    }
    
    public function testAction()
    {
        echo "Test action";
        // action body
    } 


	 public function managepostAction()
    {
			try{
			$data=array('name'=>$_POST['name'],'email'=>$_POST['email'],'password'=>$_POST['password'],'mobile'=>$_POST['mobile'],'gender'=>$_POST['gender']);
			$userModel=new Application_Model_User();
			$user_id=$userModel->add($data);
			if(is_numeric($user_id))
			{
			echo $user_id;
			    
				$this->flashMessenger->addMessage('Inserted');
				
			
			}
			else
			{
			//echo "Error in insertion";
			$this->flashMessenger->addMessage('Error in insertion');
			
			}
			}catch(Exception $e){
			if(!empty($flashMessenger)){
				$this->_helper->layout->getView()->message = $flashMessenger[0];}
			}
			$this->redirect('/index/manage');
			
			
			die;
			
			
	
        
    }
}

