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
<title>Page Title</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="b1">
	

<form class="f1" action="forgot.php" method="POST">
<h1>Forgot Password?</h1>
	<?php if(!empty($success_message)) { ?>
	<div class="success_message"><?php echo $success_message; ?></div>
	<?php } ?>

	<div id="validation-message">
		<?php if(!empty($error_message)) { ?>
	<?php echo $error_message; ?>
	<?php } ?>
	</div>

	<div class="field-group">
		<div><label  for="username">Username</label></div>
		<div><input class="row" type="text" name="user-login-name" id="user-login-name" class="input-field"></div>
	</div>
		</br>
		</br>
	<div class="field-group">
		<div><label  for="email">Email</label></div>
		<div><input class="row"  type="text" name="user-email" id="user-email" class="input-field"></div>
	</div>
	
	<div class="field-group">
		<div><input type="submit" name="forgot-password" id="forgot-password" value="Submit" class="form-submit-button"></div>
	</div>	
</form>

</body>
</html>

