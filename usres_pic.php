<?php 

include("vendor/autoload.php") ;

use Database\MySQL ;
use Helpers\Usertable ;
use Helpers\HTTP ;
use Helpers\Auth ;

$auth = Auth::check() ;

$table = new Usertable(new MySQL()) ;

$name = $_FILES['photo']['name'] ?? null ;
$tmp = $_FILES['photo']['tmp_name'] ?? null ;
$error = $_FILES['photo']['error'] ?? null ;
$type = $_FILES['photo']['type'] ?? null ;

if($error) {
    HTTP::redirect('profile.php') ;
}

if($type === "image/jpeg" or $type === "image/png") {
    $table->updatePhoto($auth->id, $name) ;
    move_uploaded_file($tmp, "photo/$name") ;
    $auth->photo = $name ;
    HTTP::redirect('profile.php') ;
} else {
    HTTP::redirect('profile.php') ;
}