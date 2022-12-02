<?php 

include("vendor/autoload.php") ;

use Database\MySQL ;
use Helpers\Usertable ;
use Helpers\HTTP ;

$data = [
    "name" => $_POST['name'] ?? 'Unknow' ,
    "email" => $_POST['email'] ?? 'Unknow' ,
    "password" => md5($_POST['password']),
    "comfirm_password" => md5($_POST['comfirm_password']) ,
] ;

$table = new Usertable(new MySQL()) ;

if($table) {
    $table->register($data) ;
    HTTP::redirect('/login.php') ;
} else {
    HTTP::redirect('/register.php') ;
}