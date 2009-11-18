<?php defined('SYSPATH') or die('No direct script access.');

ini_set('include_path',ini_get('include_path').PATH_SEPARATOR.MODPATH.'zendamf-for-kohana/vendor/');
require 'Zend/Amf/Server.php';

class Controller_Amf extends Controller {
 
    public $server;
    
    public function before()
    {
        parent::before();
        
        $this->server = new Zend_Amf_Server();
        $this->server->setProduction(FALSE);
        
    }
    
    public function action_index()
    {
        // Can override to add custom setClass()
        
    }
    
    public function after()
    {
        parent::after();
        
        $handle = $this->server->handle();
        
        // fixes bug with content-type headers
        if (Request::is_amf())
            $this->request->response = $handle;
        else
            echo $handle;
    }
}