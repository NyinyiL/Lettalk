<?php 

include("vendor/autoload.php") ;

use Database\MySQL ;
use Helpers\Usertable ;
use Helpers\HTTP ;
use Helpers\Auth ;


$auth = Auth::check() ;
$table = new Usertable(new MySQL()) ;

$id = $auth->id ;
$text = $_POST['text'] ;
$photo = $_FILES['photo']['name'] ?? null ;
$error = $_FILES['photo']['error'] ?? null ;
$type = $_FILES['photo']['type'] ?? null ;
$tmp = $_FILES['photo']['tmp_name'] ?? null ;

if(!$photo) {
    $photo = null ;
    $table->postInsert($id, $text, $photo) ;
    move_uploaded_file($tmp, "photo/$photo");
    HTTP::redirect('profile.php') ;  
} else {
    $table->postInsert($id, $text, $photo) ;
    move_uploaded_file($tmp, "photo/$photo");
    HTTP::redirect('profile.php') ; 
}