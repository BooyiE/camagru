<?php

session_start();

if (!isset($_SESSION["username"]))
{
    header("Location: login.php");
}
?>

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
<li><a href="change_user.php">change username</a></li>
<li><a href="changepass.php">Change Password</a></li>
<li><a href="cam.php">Camera</a></li>
<!-- <li><a href="upload.php">upload_Images</a></li> -->
<li><a href="gallery.php">Gallery</a></li>
<li style="float:right"><a class="active" href="logout.php">Logout</a></li>
</ul>

</body>
</html>


<!DOCTYPE html>
<html>
       <head>
           <title>Home Page</title>
           <link rel="stylesheet" href="style.css">
       </head>
<body>
    <div class="header">
        <h2>Welcome to Home Page</h2>
    </div>
    
    <div class="content">
    <?php if (isset($_SESSION['success'])); ?>
    <div class="error success">
    <h3>
        <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        ?>
    </h3>
    </div>
    <?php if (isset($_SESSION['username'])); ?>
         <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong>
    <!-- </p>
        <p><a href="logout.php?logout='1'" style="color: red;">logout</a></p> -->
    </div>
    </body>
</html>
