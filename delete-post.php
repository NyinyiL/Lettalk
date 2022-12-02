<?php 

include("vendor/autoload.php") ;

use Database\MySQL ;
use Helpers\Usertable ;
use Helpers\HTTP ;

$table = new Usertable(new MySQL()) ;

$id = $_GET['id'] ;
$table->deletePost($id) ;

HTTP::redirect('profile.php') ;