<?php 

include("vendor/autoload.php") ;

use Database\MySQL ;
use Helpers\Usertable ;
use Helpers\HTTP ;
use Helpers\Auth ;

$auth = Auth::check() ;
$table = new Usertable(new MySQL()) ;

$summary = $_POST['bio'] ;

if($table) {
    $table->bioUpdate($auth->id, $summary) ;
    $auth->bio = $summary ;
    HTTP::redirect('profile.php') ;
} else {
    HTTP::redirect('profile.php') ;
}
