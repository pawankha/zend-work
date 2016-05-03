<?php

class Gwb_Router extends Zend_Controller_Router_Route {
    
    private $table;
    
    private $column;

    public static function getInstance(Zend_Config $config) {
        $defs = ($config->defaults instanceof Zend_Config) ? $config->defaults->toArray() : array();
        return new self($config->route, $defs);
    }

    public function __construct($route, $defaults = array()) {
        $this->_route = trim($route, $this->_urlDelimiter);
        $this->_defaults = (array) $defaults;
    }

    public function match($path, $partial = false) {
        if ($path instanceof Zend_Controller_Request_Http) {
            $path = $path->getPathInfo();
        }
        
        
        
        $path = trim($path, $this->_urlDelimiter);
        $pathBits = explode($this->_urlDelimiter, $path);
        
//        if (count($pathBits) != 1) {
//            return false;
//        }
        if($pathBits[1])
            $slg = $pathBits[1];
        else 
            $slg = $pathBits[0];
        //print_r($pathBits);
        //echo 'SELECT '.$this->column.' FROM '.$this->table.' WHERE '.$this->column;
        // check database for category
        $result = Zend_Registry::get('db')->fetchRow('SELECT '.$this->column.' FROM '.$this->table.' WHERE '.$this->column.' = ?', $slg);
        if ($result) {
            // user found
        
            $values = $this->_defaults + (array)$result;

            return $values;
        }

        return false;
    }

    public function assemble($data = array(), $reset = false, $encode = false) {
        return $data['slug'];
    }
    
    public function setTable($table){
        $this->table = $table;
    }
    
    public function setColumn($col){
        $this->column = $col;
    }
    
}