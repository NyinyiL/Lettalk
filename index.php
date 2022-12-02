<?php 

include("vendor/autoload.php") ;

use Database\MySQL ;
use Helpers\Usertable ;
use Helpers\Auth ;

$auth = Auth::check() ;

$table = new Usertable(new MySQL()) ;
$posts = $table->showPosts() ;
$walls = $table->wallPhoto() ;
$row = $table->like() ;


?>
<!-- ========================= ============================== -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just Talk</title>
    <link rel="stylesheet" href="css/talk.css">
    <link rel = "stylesheet" href = "fontawesome/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.2/css/all.css" integrity="sha384-fZCoUih8XsaUZnNDOiLqnby1tMJ0sE7oBbNk2Xxf5x8Z4SvNQ9j83vFMa/erbVrV" crossorigin="anonymous"/>
</head>

<body>
    <!-- ===== Start Nav ===== -->
    <section class="navigation">
        <div class="nav">
            <div class="nav-logo padd-15">
                <div class="nav-img">
                    <!-- <img src="https://play-lh.googleusercontent.com/-u-oG-Ni_pco9h7zc3CQl-lFkKJjztO3RGZMjnbaDiznnbXoMQZYUjITHN0BVxYHBg" alt="" width = "30px" height = "30px"> -->
                    Logo
                </div>
                <div class="nav-wall">
                    <a href="profile.php">
                        <img src= "photo/<?= $auth->photo ?>"
                            alt="" width="50px" height="50px">
                        <!-- hello -->
                    </a>
                </div>
            </div>
            <div class="nav-link mr-10">
                <ul>
                    <?php if($auth) : ?>
                    <li><a href="profile.php"><?= $auth->name ?></a></li>
                    <?php endif ?>
                    <li><a href="index.php"><span class="active">Home</span></a></li>
                    <!-- <li><a href="category.php">Category</a></li> -->
                    <!-- <li><a href="">Post</a></li> -->
                    <!-- <li><a href="documantation.html">Documantation</a></li> -->
                    <?php if($auth) : ?>
                        <li><a href="login.php">Logout</a></li>
                    <?php else : ?>
                    <li><a href="login.php">Login</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </section>
    <!-- ===== Start Nav ===== -->

    <!-- ===== Hero Section ===== -->
    <section class="hero">
        <div class="container">
            <div class="hero-card padd-15 mt-10">
                <div class="post-card mt-50">
                    <div class="row">
                        <!-- ===== card start ====== -->
                        <?php foreach($posts as $post) : ?>
                        <div class="card padd-15">
                            <div class="main-card padd-15">
                                <div class="sub-card">
                                    <div class="card-profile-img mt-10 mb-10">
                                        <a href="">
                                            <?php foreach($walls as $wall) : ?>
                                                <?php if($wall->id == $post->register_users_id) : ?>
                                            <img src="photo/<?= $wall->photo ?>" width = "50" height = "50">
                                            <?php endif ?>
                                            <?php endforeach ?>
                                        </a>
                                    </div>
                                    <div class="card-post">
                                        <div class="card-name">
                                            <p class="profile-name"><?= ucwords($post->name) ?></p>
                                            <p class="post-date"><?= $post->created_at ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="line-through"></div>
                                <div class="card-body">
                                    <p class = "text"><?= $post->text ?></p>
                                    <?php if(!$post->photo == null) : ?>
                                        <!--  -->
                                    <? else : ?>
                                    <img src = "photo/<?= $post->photo ?>" width = "200" height ="200">
                                    <?php endif ?>
                                </div>
                                <div class="line-through"></div>
                                <div class="like-comment-share">
                                    <div class="like">  
                                        <button class = "btn">like</button>
                                    </div>
                                    <div class="comment">
                                        <button class = "btn">unlike</button>
                                    </div>
                                    <div class="share">
                                        <?php if($auth->id == $post->register_users_id) : ?>
                                        <button class = "btn"><a href = "dele-post.php?id=<?= $post->id ?>">delete</a></button>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        <!-- ===== card end -->
                        <!-- ===== card start ====== -->
                        
                        <!-- ===== card end -->
                        <!-- ===== card start ====== -->
                       
                        <!-- ===== card end -->
                        <!-- ===== card start ====== -->
                        
                        <!-- ===== card end -->
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- ===== Hero Section ===== -->


<script src="js/talk.js"></script>
</body>

</html>


