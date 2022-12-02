<?php 
include("vendor/autoload.php") ;
use Database\MySQL ;
use Helpers\Usertable ;

$id = $_GET['id'] ;

$table = new Usertable(new MySQL()) ;
$show = $table->detailPost($id) ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($show as $user) : ?>
    <p><?= $user->text ?></p>
    <?php endforeach ?>
</body>
</html>