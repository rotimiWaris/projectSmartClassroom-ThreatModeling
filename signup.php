<?php
//include auth_session.php file on all user panel pages
session_start();

if (isset($_SESSION["users_id"])) {
    
    $mysqli = require __DIR__ . "/db.php";
    
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["users_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    if (isset($user)) {
        header ("Location: dashboard.php");
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smart Classroom Threat Modelling Framework - SignUp or Login</title>
    <meta name="description" content="">
    <link rel="icon" href="img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
<?php

    $is_invalid = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        $host = "localhost";
        $dbname = "LoginSystem";
        $username = "root";
        $password = "";

        $mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
        
        $sql = sprintf("SELECT * FROM users
                        WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));
        
        $result = $mysqli->query($sql);
        
        $user = $result->fetch_assoc();
        
        if ($user) {
            
            if (password_verify($_POST["password"], $user["password_hash"])) {
                
                session_start();
                
                session_regenerate_id();
                
                $_SESSION["users_id"] = $user["id"];
                
                header("Location: dashboard.php");
                exit;
            }
        }
        
        $is_invalid = true;
    }

?>

<div class="wrapper">
      <div class="title-text">
        <div class="title login">Login</div>
        <div class="title signup">Signup</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          <form method="POST" action="signup.php" class="login">
          <?php if ($is_invalid): ?>
                <p style="text-align: center; color: red">Invalid login</p>
            <?php endif; ?>
            <div class="field">
              <input type="text" name="email" id="email" placeholder="Email Address" required>
            </div>
            <div class="field">
              <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <!-- <div class="pass-link"><a href="#">Forgot password?</a></div> -->
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" name="signin" id="signin" value="Login">
            </div>
            <div class="signup-link">Not a member? <a href="">Signup now</a><br><a href="adminsignin.php" class="signup-link">Admin login</a></div>
          </form>
          <form method="POST" action="registration.php" id="register-form" class="signup" novalidate>
            <div class="field">
              <input type="text" name="name" id="name" placeholder="Your Username"/>
            </div>
            <div class="field">
              <input type="email" name="email" id="email" placeholder="Email Address"/>
            </div>
            <div class="field">
              <input type="password" name="pass" id="pass" placeholder="Password"/>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" name="signup" id="signup" value="Signup">
            </div>
          </form>
        </div>
      </div>
    </div>

</body>
<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
<script src="js/validation.js" defer></script>
<script>
     const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });
</script>
</html>