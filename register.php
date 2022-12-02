<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just Talk</title>
    <link rel="stylesheet" href="css/talk.css">
</head>

<body>
    <section class="register">
        <div class="register-row">
            <div class="register-form">
                <form action="create.php" method = "post">
                    <h3>Register</h3>
                    <div class="center">
                        <div class="username">
                            <input type = "text" name = "name" class = "form" placeholder = "Username" required>
                        </div>
                        <div class="username">
                            <input type = "email" name = "email" class = "form" placeholder = "Email" required>
                        </div>
                        <div class="username">
                            <input type = "password" name = "password" class = "form" id = "password" placeholder = "Password" required>
                        </div>
                        <div class="username">
                            <input type = "password" name = "comfirm_password" class = "form" id = "cmf-password" placeholder = "Comfirm Password" required>
                        </div>
                        <div class="submit">
                            <button class = "btn" id = "button"> Register</button>
                        </div>
                        <div class="submit">
                            <a href = "login.php">Already have an account?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    
<script>
    document.querySelector("#button").onclick = function () {
    var password = document.querySelector("#password").value,
        cmpassword = document.querySelector("#cmf-password").value ;

        if(password == "") {
            alert("Field cannot be empty") ;
        }
        else if(password != cmpassword) {
            alert("Password does not match") ;
            return false ;
        }
        else if(password == cmpassword) {
            alert("Password Match") ;
        }
        return true ;
}
</script>
<script src="js/talk.js"></script>
</body>

</html>