<?php defined('SYSPATH') or die('No direct script access.');

class Controller_AMF extends Controller {
 
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
        
        if (Request::is_amf())
        {
            $this->response->body($handle);
        }
    }
}