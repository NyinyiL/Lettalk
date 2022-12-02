<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "css/talk.css">
    <link rel="stylesheet" href="new.css">
</head>
<body>
    <section class="login">
        <div class="login-container">
            <div class="login-form">
                <form action = "login-check.php" method = "post">
                    <h3 class = "title-item">Login</h3>
                    <div class="username">
                        <input type = "text" name = "name" class = "form" placeholder = "Username">
                    </div>
                    <div class="password">
                        <input type = "email" name = "email" class = "form" placeholder = "Email">
                    </div>
                    <div class="submit">
                        <button class = "btn"> Sign In</button>
                    </div>
                    <div class="submit">
                        <a href = "register.php" class = "">Create Account</a>
                    </div>
                </form>
                <div class="line-through-login"></div>
                <div class="login-account">
                    <div class="google">
                        <a href = "" >Sign In with google</a>
                    </div>
                    <div class="facebook">
                        <a href = "" >Sign In with facebook</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</body>
</html>