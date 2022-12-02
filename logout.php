<?php 
include("vendor/autoload.php") ;
session_start() ;

use Helpers\HTTP ;
unset($_SESSION['user']) ;
HTTP::redirect('login.php') ;
