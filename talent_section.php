<?php 

include("vendor/autoload.php") ;

use Database\MySQL ;
use Helpers\Usertable ;
use Helpers\HTTP ;


$table = new Usertable(new MySQL()) ;

$data = [
    ':register_users_id' => $_POST['register_users_id'] ,
    ':hobby' => $_POST['hobby'] ,
    ':education' => $_POST['education'] ,
    ':job' => $_POST['job'] ,
    ':location' => $_POST['location'] ,
    ':sport' => $_POST['sport'] ,
    ':tips' => $_POST['tips'] ,
] ;

if($table) {
    $table->talentInsert($data) ;
    HTTP::redirect('profile.php') ;
} else {
    HTTP::redirect('profile.php') ;
}