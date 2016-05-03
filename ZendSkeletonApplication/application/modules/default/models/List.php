<?php

class Application_Model_List
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
    public function finddata() {
		
		
			$sql = 'select * from manage_text';
			$stmt = $this->dbAdapter->query($sql);
			$results = $stmt->fetchAll();
			return $results;
			
	
		
		//	try{
		//	//$this->dbAdapter->insert('manage_text',$data);
		//	
		//	//return $this->fetchAll($this->select('manage_text'));
		//    $sql = 'SELECT * FROM manage_text';
		//    $result = $db->fetchAll($sql);
		//	}catch(Exception $e){
		//	throw $e;
		//	}
		//	
		//	$id = $this->dbAdapter->lastInsertId();
		//	return $id = $this->dbAdapter->lastInsertId();
		
    }
}

