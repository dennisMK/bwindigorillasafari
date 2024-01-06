<?php
//error_reporting(0);
require 'config/config.php';
spl_autoload_register(function($class) {
        require LIBS. $class.".php";
});


$check =new Bootstrap();
$check->init();


