<?php
include("vendor/autoload.php") ;
use Helpers\Auth ;
use Helpers\Usertable ;
use Database\MySQL ;
$auth = Auth::check() ;

$table = new Usertable(new MySQL()) ;
$talent = $table->talentShow() ;
$posts = $table->showPosts() ;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just Talk</title>
    <link rel="stylesheet" href="css/talk.css">
    <link rel="stylesheet" href="css/new.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">

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
                    <a href="profile.html">
                        <img src="photo/<?= $auth->photo ?>"
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
                    <!-- <li><a href="">Documantation</a></li> -->
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ===== Start Nav ===== -->

    <!-- ===== Start main ===== -->
    <section class="main-profile">
        <div class="container">
            <div class="profile-row">
            <div class="profile-picture">
                    <img src="photo/<?= $auth->photo ?>" alt="" >
                    <i class = "fa fa-camera i-pic" onclick="users_pic()"></i>
                </div>
                <form action="usres_pic.php" method = "post" enctype="multipart/form-data">
                <div class="users_main_pic">
                        <input type = "file" name = "photo" class = "profile_pic">
                        <button>Upload</button>
                </div>
                </form>
                <div class="bio">
                    <div class="bio-text">
                                <p><?= $auth->bio ?></p>
                    </div>
                    <div class="bio-edit"> 
                        <button class="edit edit-btn">Add</button>
                        <!-- <button class="update-bio edit-btn">Update</button> -->
                        <!-- <a href = "" id = "edit">Edit</a> -->
                    </div>
                </div>
                <div class="profile-line-through"></div>
                <div class="hobby">
                    <ul>
                        <?php foreach($talent as $all) : ?>
                            <?php if($auth->id == $all->register_users_id) : ?>
                                <li><?= $all->hobby ?></li>
                                <li><?= $all->education ?></li>
                                <li><?= $all->job ?></li>
                                <li><?= $all->location ?></li>
                                <li><?= $all->sport ?></li>
                                <li><?= $all->tips ?></li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                    <div class="hobby-edit">
                        <button class="hobby-edit edit-btn edit" id = "hobby-edit-btn">Edit</button>
                        <button class="hobby-add edit-btn edit" id = "hobby-edit-btn">Add</button>
                    </div>
                </div>

                <!-- bio post -->
                <!-- <div class="bi-post">
                    <div class="bi-text">
                        <h3>Bio Text</h3>
                        <div class="bio-form">
                            <form action="bio-post.php" method="post">
                                <div class="username">
                                    <input type="hidden" name = "register_users_id" value = "<?= $auth->id ?>" class="form" placeholder="Bio Text Here.....">
                                    <input type="text" name = "summary" class="form" placeholder="Bio Text Here.....">
                                </div>
                                <div class="submit">
                                    <button class="btn">Bio Post</button>
                                    <a href="profile.php">Disscard post</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->

                <!-- bio update -->
                <div class="bio-update bi-post">
                    <div class="bi-text">
                        <h3>Bio Update Text</h3>
                        <div class="bio-form">
                            <form action="bio-update.php" method="post">
                                <div class="username">
                                    <input type="text" class="form" name = "bio" placeholder="Bio Text Here.....">
                                </div>
                                <div class="submit">
                                    <button class="bio-update-post btn">Update Bio</button>
                                    <a href="profile.php">Disscard post</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- hobby -->
                <div class="hobby-click">
                    <div class="hobby-text">
                        <h3>Share About your story</h3>
                        <div class="hobby-form">
                            <form action="talent_section.php" method = "post">
                                <div class="hobby-display">
                                    <div class="hobby-left">
                                        <div class="username">
                                            <input type="hidden" name = "register_users_id" value = "<?= $auth->id ?>" class="form" placeholder="Hobby Text Here....">
                                            <input type="text" name = "hobby" class="form" placeholder="Hobby Text Here....">
                                        </div>
                                        <div class="username">
                                            <input type="text" name = "education" class="form" placeholder="Education Text Here....">
                                        </div>
                                        <div class="username">
                                            <input type="text" name = "job" class="form" placeholder="Your Carrer Job Text Here....">
                                        </div>
                                    </div>
                                    <div class="hobby-right">
                                        <div class="username">
                                            <input type="text" name = "location" class="form" placeholder="Location Text Here....">
                                        </div>
                                        <div class="username">
                                            <input type="text" name = "sport" class="form" placeholder="Your Interested Sport Text Here....">
                                        </div>
                                        <div class="username">
                                            <input type="text" name = "tips" class="form" placeholder="Other Tips Text Here....">
                                        </div>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <div class="submit">
                                        <button class="btn">Story Post</button>
                                    </div>
                                </div>
                            </form>
                            <div class="hobby-linethrough"></div>
                            <div class="hobby-link">
                                <a href = ""><button class = "hobby-btn"> Post</button></a>
                                <button class = "hobby-show hobby-btn">Single Stroy Post</button>
                            </div>
                            <div class="hobby-single-story-post">
                                <div class="hobby-single">
                                    <h2>Choose your post what you want</h2>
                                    <div class="summary-text">
                                        <p>Click botton and fill your desired for the given textarea and show to the others users for marketing yourself, we hope enjoy with our app </p>
                                    </div>
                                    <!-- single post hobby -->
                                    <div class="single-form">
                                        <form action="singel_hobby.php" method = "post">
                                        <input type = "hidden" name = "register_users_id" value = "<?= $auth->id ?>" class = "single-form-input" placeholder="Hobby Text Here.....">
                                        <input type = "text" name = "hobby" class = "single-form-input" placeholder="Hobby Text Here.....">
                                        <div class="single-form-add">
                                            <button class = "hoby-btn">Add Hobby</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- single post education -->
                                    <div class="education-form">
                                        <form action="singel_education.php" method = "post">
                                        <input type = "hidden" name = "register_users_id" value = "<?= $auth->id ?>" class = "single-form-input">
                                        <input type = "text" name = "education" class = "single-form-input" placeholder="Education Text Here.....">
                                        <div class="education-form-add">
                                            <button class = "hoby-btn">Add Education</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- sinngle post Job -->
                                    <div class="job-form">
                                        <form action="singel_job.php" method = "post">
                                        <input type = "hidden" class = "single-form-input" name = "register_users_id" value = "<?= $auth->id ?>">
                                        <input type = "text" name = "job" class = "single-form-input" placeholder="Your Carrer Job Text Here.....">
                                        <div class="job-form-add">
                                            <button class = "hoby-btn">Add Job</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- single post Location -->
                                    <div class="location-form">
                                        <form action="singel_location.php" method = "post">
                                        <input type = "hidden" class = "single-form-input" name = "register_users_id" value = "<?= $auth->id ?>">
                                        <input type = "text" name = "location" class = "single-form-input" placeholder="Hobby Text Here.....">
                                        <div class="location-form-add">
                                            <button class = "hoby-btn">Add Location</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- single post sport -->
                                    <div class="sport-form">
                                        <form action="singel_sport.php" method = "post">
                                        <input type = "hidden" class = "single-form-input" name = "register_users_id" value = "<?= $auth->id ?>">
                                        <input type = "text" name = "sport" class = "single-form-input" placeholder="Your Intrested Sport Text Here.....">
                                        <div class="sport-form-add">
                                            <button class = "hoby-btn">Add Sport</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- single post tip -->
                                    <div class="tips-form">
                                        <form action="singel_tips.php" method = "post">
                                        <input type = "hidden" class = "single-form-input" name = "register_users_id" value = "<?= $auth->id ?>">
                                        <input type = "text" name = "tips" class = "single-form-input" placeholder="Other Tips Text Here.....">
                                        <div class="tips-form-add">
                                            <button class = "hoby-btn">Add Others Tips</button>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="hobby-post-form">
                                        <button class = "hobby-sign single-btn">Hobby</button>
                                        <button class = "education single-btn">Education</button>
                                        <button class = "job single-btn">Job At</button>
                                        <button class = "location single-btn">Location</button>
                                        <button class = "sport single-btn">Sport</button>
                                        <button class = "tips single-btn">Tips</button>
                                        <button class = "other">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="profile-line-through"></div> -->
            </div>
        </div>
    </section>
    <!-- ===== End main ===== -->

    <!-- ===== Add post ===== -->
    <section class="post">
        <div class="container">
            <div class="post-row">
                <div class="add-post">
                    <button class="add">Add Post</button>
                </div>
                <!-- start add post form -->
                <div class="add-post-js">
                    <div class="add-post-content">
                        <h3>What's on your mind . . .</h3>
                        <div class="post-form">
                            <form action="add_post.php" method="post" enctype = "multipart/form-data">
                                <div class="post-input">
                                    <textarea name="text" id="" cols="4" rows="4" class="form-control"
                                        placeholder="text here ....."></textarea>
                                    <input type = "file" name = "photo" class="form-control" placeholder="picture here .....">
                                </div>
                                <div class="post-input">
                                    <div class="upload-and-discard">
                                        <div class="submit">
                                            <button class="btn"> Upload Post</button>
                                        </div>
                                        <div class="submit">
                                            <button class="btn btn-two"> Discard Post</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end add post form  -->
                <div class="delete-post">
                    <a href="">Delete Post</a>
                </div>
                <div class="check-activity">
                    <button class="account-activity">account activity</button>
                </div>
                <!-- Activity section -->
                <div class="activity">
                    <div class="activity-main">
                        <h3>Check Your Acccount Activity . . .</h3>
                        <div class="activity-items">
                            <div class="activity-list">
                                <div class="sub-activity">
                                    <h4>Check your Active</h4>
                                    <ul>
                                        <li><a href="">check this month active</a></li>
                                        <li><a href="">check data usage for active</a></li>
                                        <li><a href="">clear cache storage</a></li>
                                    </ul>
                                </div>
                                <div class="sub-activity">
                                    <h4>Check your Active</h4>
                                    <ul>
                                        <li><a href="">check this month active</a></li>
                                        <li><a href="">check data usage for active</a></li>
                                        <li><a href="">clear cache storage</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="activity-list">
                                <div class="sub-activity">
                                    <h4>Check your Active</h4>
                                    <ul>
                                        <li><a href="">check this month active</a></li>
                                        <li><a href="">check data usage for active</a></li>
                                        <li><a href="">clear cache storage</a></li>
                                    </ul>
                                </div>
                                <div class="sub-activity">
                                    <h4>Check your Active</h4>
                                    <ul>
                                        <li><a href="">check this month active</a></li>
                                        <li><a href="">check data usage for active</a></li>
                                        <li><a href="">clear cache storage</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <p><span>Note : </span>please contact us if you have something problems from this app we have <a
                                href="">support team</a> for you everytime.</p>
                    </div>
                </div>
                <!-- Activity section -->

                <!-- setting section -->
                <div class="setting">
                    <button class="setting">setting</button>
                </div>
                <div class="setting-section">
                    <!-- <h3>Setting.....</h3> -->
                    <div class="setting-items">
                        <h3>Setting.....</h3>
                        <div class="setting-flex">
                            <!-- left size of setting -->
                            <div class="setting-left-side">
                                <div class="setting-account">
                                    <h4>Account Setting</h4>
                                    <ul>
                                        <li><a href="">account privacy</a></li>
                                        <li><a href="">about account</a></li>
                                        <li><a href="">change username and password</a></li>
                                    </ul>
                                </div>
                                <div class="setting-account">
                                    <h4>User setting</h4>
                                    <ul>
                                        <li><a href="">user backup</a></li>
                                        <li><a href="">email connect</a></li>
                                        <li><a href="">user usage</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- right size of setting -->
                            <div class="setting-right-side">
                                <div class="setting-account">
                                    <h4>Post Setting</h4>
                                    <ul>
                                        <li><a href="">previsous posts</a></li>
                                        <li><a href="">recent delete post</a></li>
                                        <li><a href="">post theme</a></li>
                                    </ul>
                                </div>
                                <div class="setting-account">
                                    <h4>Login Setting</h4>
                                    <ul>
                                        <li><a href="">refresh login</a></li>
                                        <li><a href="">logout account</a></li>
                                        <li><a href="">login with other app</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <p><span>Note : </span>please contact us if you have something problems from this app we have <a
                                href="">support team</a> for you everytime.</p>
                    </div>
                </div>
                <!-- setting section -->
                <div class="support">
                    <a href="">Support</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== Add post ===== -->
    <!-- ===== own post ===== -->
    <section class="hero">
        <div class="container">
            <div class="hero-card padd-15 mt-10">
                <div class="post-card mt-50">
                    <div class="row">
                        <!-- ===== card start ====== -->
                        <?php foreach($posts as $post) : ?>
                            <?php if($auth->id == $post->register_users_id) : ?>
                        <div class="card padd-15">
                            <div class="main-card padd-15">
                                <div class="sub-card">
                                    <div class="card-profile-img mt-10 mb-10">
                                        <a href="">
                                            <img src="photo/<?= $auth->photo ?>"
                                                alt="" width="50px" height="50px">
                                        </a>
                                    </div>
                                    <i class = "fa fa-gear post-gear" onclick="gear_fun(this)"></i>
                                    <div class="card-post">
                                        <div class="card-name">
                                            <p class="profile-name"><?= ucwords($auth->name) ?></p>
                                            <p class="post-date"><?= $auth->created_at ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-gear-show">
                                    <ul>
                                        <li><a href = "delete-post.php?id=<?= $post->id ?>">delete post</a></li>
                                        <input type = "hidden" name = "id" value = "<?= $auth->id ?>">
                                        <li><a href = "">report post</a></li>
                                        <li><a href = "detail-post.php?id=<?= $post->id ?>">post detail</a></li>
                                        <li><a href = "">save post</a></li>
                                    </ul>
                                </div>
                                <div class="line-through"></div>
                                <div class="card-body">
                                    <p class="text"><?= $post->text ?></p> 
                                    <?php if(!$post->photo == null) : ?>
                                        <!--  -->
                                    <? else : ?>
                                    <img src = "photo/<?= $post->photo ?>" width = "200" height ="200">
                                    <?php endif ?>
                                </div>
                                <div class="line-through"></div>
                                <div class="like-comment-share">
                                    <div class="like">
                                        <button class="btn">like</button>
                                    </div>
                                    <div class="comment">
                                        <button class="btn">unlike</button>
                                    </div>
                                    <div class="share">
                                        <button class="btn"><a href = "delete-post.php?id=<?= $post->id ?>">delete</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ===== own post ===== -->

    <script>
        function gear_fun(one) {
            document.querySelector(".post-gear-show").style.display = "flex" ;
        }
    </script>
    <script>
        function users_pic() {
            document.querySelector(".users_main_pic").style.display = "flex" ;
        }
    </script>





    <script src="js/talk.js"></script>
</body>

</html>