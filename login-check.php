<?php 

session_start() ;

include("vendor/autoload.php") ;

use Database\MySQL ;
use Helpers\Usertable ;
use Helpers\HTTP ;

$name = $_POST['name'] ;
$email = $_POST['email'] ;

$login = new Usertable(new MySQL()) ;
$user = $login->findByNameAndEmail($name, $email) ;

if($user) {
    $_SESSION['user'] = $user ;
    HTTP::redirect('index.php') ;
} else {
    HTTP::redirect('login.php') ;
}