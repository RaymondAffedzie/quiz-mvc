<?php 

defined('ROOTPATH') OR exit('Access Denied!');

spl_autoload_register(function($classname){

	$classname = explode("\\", $classname);
    $classname = end($classname);
    
    // Check if the class is part of PHPMailer
    if (file_exists("../app/PHPMailer/src/{$classname}.php")) {
        require "../app/PHPMailer/src/{$classname}.php";
    } else {
        require "../app/models/".ucfirst($classname).".php";
    }
   

});

require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'App.php';