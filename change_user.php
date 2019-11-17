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

<html>
    <head>
        <title>Change Username</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <form class="f1" action="changed_user.php" method="POST">
            <div style="width:500px;">
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
            <h1>Change Username</h1>
            <label>Current password</label>
            <input type="password" name="password" class="txtField" required/><br />
            <label>New username</label>
            <input type="text" name="nuser" class="txtField" required/><br />
            <label>Confirm username</label>
            <input type="text" name="cuser" class="txtField" required /><br />
            <input type="submit" name="submit" value="Submit" class="btnSubmit">
            </div>
        </form>
    </body>
</html>