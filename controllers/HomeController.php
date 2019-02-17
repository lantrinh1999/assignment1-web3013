<?php
require_once './models/Product.php';
require_once './models/Category.php';
class HomeController
{
    public function index(){

        include_once './views/homepage.php';
    }

}

?>