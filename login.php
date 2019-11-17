<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
    background-color: #4CAF50;
}
</style>
</head>
<body>

<ul>
<li class="active" ><a href="gallery.php">Gallery</a></li>
</ul>

</body>
</html>

<?php
    session_start();
    if (isset($_SESSION["username"]))
    {
        header("Location:home.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
            <link rel="stylesheet" type="text/css" href="style.css">
        <title>login</title>
    </head>
<body class="log">
    <div class="header">
        <h2>Login</h2>
    </div>
    <form action="login_bacground.php" method="POST" >
    <!-- display validation errors -->
    <?php include ('errors.php'); ?>
        <div class="input-details">
            <label>Username :</label>
            <input type="text" name="username" placeholder = "Enter username....."required>
        </div>
        <div class="input-details">
            <label>Password :</label>
            <input type="password" name="password" placeholder = "Enter password....."required>
        </div>
     <?php
        if(empty($password_1)){
        array_push($error_msg,"You have entered invalid Password");
        }
    ?> 
        <div class="input-details">
            <button class="submit" name="login" class="button">login</button>
            <!-- <p><a href="login.php?login='1'" style="color: red;">login</a></p> -->
            </div>
            <div class="input-details">
                forgot your password? <a href="forgot_password.php">Reset password</a>

            <p> 
                Not a member? <a href="registration.php">register</a>
            </p>
    </form>
</body>
</html>