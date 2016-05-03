<?php
class Default_Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
    protected function _initAppAutoload() {
        $autoloader = new Zend_Application_Module_Autoloader(array(
                    'namespace' => 'Application',
                    'basePath' => dirname(__FILE__),
                ));
        return $autoloader;
    }

    protected function _initView() {
        $viewResource = new Zend_Application_Resource_View();
        $view = $viewResource->init();
        $view->setEncoding('UTF-8');
        $view->doctype('XHTML1_STRICT');
        $view->headMeta()->appendHttpEquiv(
                'Content-Type', 'text/html;charset=utf-8'
        );
        
        $view->headTitle('Zend Project')->setSeparator(' :: ');
        return $view;
    }


    protected function _initConfig() {
        $config = null;
        if (is_readable(APPLICATION_PATH . '/configs/database.ini')) {
            $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/database.ini');
            Zend_Registry::set('config', $config);
        }
        return $config;
    }

    protected function _initDatabase() {
        $db = null;
        $this->bootstrap('config');
        $config = $this->getResource('config');
        if (!empty($config)) {
            $db = Zend_Db::factory($config->database);
            $db->setFetchMode(Zend_Db::FETCH_OBJ);
            Zend_Registry::set('db', $db);
            Zend_Db_Table_Abstract::setDefaultAdapter($db);
        }

        if (APPLICATION_ENV == 'development' and $db) {
            $profiler = new Zend_Db_Profiler_Firebug('All DB Queries');
            $profiler->setEnabled(true);
            $db->setProfiler($profiler);
            $this->bootstrap('request');
            $response = new Zend_Controller_Response_Http();
            $channel = Zend_Wildfire_Channel_HttpHeaders::getInstance();
            $this->bootstrap('request');
            $request = $this->getResource('request');
            $channel->setRequest($request);
            $channel->setResponse($response);

            // Start output buffering
            ob_start();
        }
        return $db;
    }

    protected function _initRequest() {
        if (PHP_SAPI == 'cli') {
            return;
        }
        $this->bootstrap('session');
        /**
         * Ensure the front controller is initialized
         */
        $this->bootstrap('FrontController');

        // Retrieve the front controller from the bootstrap registry
        $front = $this->getResource('FrontController');
        $this->bootstrap('config');
        $config = $this->getResource('config');
        $front->setParam('config', $config);

        $request = new Zend_Controller_Request_Http();
        $request->setBaseUrl('/');
        $front->setRequest($request);

        /**
         * Ensure the request is stored in the bootstrap registry
         */
        return $request;
    }

    protected function _initSession() {
        if (PHP_SAPI == 'cli') {
            require_once 'Zend/Session.php';
            Zend_Session::$_unitTestEnabled = true;
            return;
        }
        Zend_Session::start();
        return null;
    }
    
}