<?php 

namespace modulus\main\home\controller;
use modulus\main\home\model\homeModel;
use core\controller;

class homeController extends controller
{
    public $home;
    
    public function __construct()
    {
        $this->home = new homeModel();
    }

    public function index()
    {
        $this->layout('main', 'main', 'home', 'home', []);
    }
}

