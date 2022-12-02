<?php 

include("vendor/autoload.php") ;

use Database\MySQL ;
use Helpers\Usertable ;
use Helpers\HTTP ;
use Helpers\Auth ;

$table = new Usertable(new MySQL()) ;

$text = $_POST['text'] ;
$photo = $_FILES['photo']['name']?? null ;
$type = $_FILES['photo']['type'] ?? null ;
$tmp = $_FILES['photo']['tmp_name'] ?? null;
$error = $_FILES['photo']['error'] ?? null;

if(!$photo){
    $photo = null ;
    $table->testInsert($text, $photo) ;
    move_uploaded_file($tmp , "photo/$photo") ;
    HTTP::redirect('test.php') ;
} else {
    $table->testInsert($text, $photo) ;
    move_uploaded_file($tmp , "photo/$photo") ;
    HTTP::redirect('test.php') ;
}