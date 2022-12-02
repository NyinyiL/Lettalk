<?php 

include("vendor/autoload.php") ;
use Database\MySQL ;
use Helpers\Usertable ;

$table = new Usertable(new MySQL()) ;
$all = $table->showTest() ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/tak.css">
</head>
<body>
    <h3 class="hello">hello</h3>

    <form action="test-one.php" method = "post" enctype = "multipart/form-data">
        <input type = "text" name = "text" >
        <input type = "file" name = "photo">
        <button>Click</button>
    </form>

    <?php foreach($all as $user) : ?>
        <p><?= $user->text ?></p>
        <p><img src = "photo/<?= $user->photo ?>" width = "200" height = "200"></p>
    <?php endforeach ?>
</body>
</html>