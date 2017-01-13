<?php
require_once 'mycontroller.php';

class Facade extends MyController
{
    public function __construct()
    { 
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('facade');
    }
}