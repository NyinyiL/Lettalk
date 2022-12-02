<?php 

include("vendor/autoload.php") ;

use Database\MySQL ;
use Helpers\Usertable ;
use Helpers\HTTP ;

$id = $_POST['register_users_id'] ;
$location = $_POST['location'] ;

$table = new Usertable(new MySQL()) ;

$talent = $table->singelLocation($id, $location) ;
HTTP::redirect('profile.php') ;


// if($table) {
//     $talent = $table->singelHobby($id, $hobby) ;
//     HTTP::redirect('profile.php') ;
// } else {
//     HTTP::redirect('profile.php') ;
// }


















