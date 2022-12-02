<?php 

include("vendor/autoload.php") ;

use Database\MySQL ;
use Helpers\Usertable ;
use Helpers\HTTP ;

$table = new Usertable(new MySQL()) ;

$data = [
    'register_users_id' => $_POST['register_users_id'] ,
    'summary' => $_POST['summary'] ,
] ;

if($table) {
    $table->bioInsert($data) ;
    HTTP::redirect('profile.php') ;
} else {
    HTTP::redirect('profile.php') ;
}
