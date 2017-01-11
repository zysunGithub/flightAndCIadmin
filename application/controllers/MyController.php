<?php
/**
 * Class MyController
 * @package controllers
 * 目的是每次创建控制器的时候都验证一下session是否过期
 */
class MyController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->helper('url');

        
        if(!isset($username) && !strstr(current_url(),'login')) {
            $address = $_SERVER["REQUEST_URI"];
            redirect("/login?return_url={$address}");
        }
    }
}