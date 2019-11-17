<?php

  require("server.php");
  session_start();
  $user = $_SESSION['username'];

  if (isset($user)){
    $sql = "SELECT * FROM images WHERE username = ? ORDER BY upload_date DESC LIMIT 6";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user]);
    $images = $stmt->fetchAll();
  } else {
    header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<<<<<<< HEAD
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

<?php

  require("server.php");
  session_start();
  $user = $_SESSION['username'];

  if (isset($user)){
    $sql = "SELECT * FROM images WHERE username = ? ORDER BY upload_date DESC LIMIT 6";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user]);
    $images = $stmt->fetchAll();
  } else {
    header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
=======
>>>>>>> 2957e1e6a6416ed97bbe2e990ffaa7dd0826e333
    <head>
        <title>Camera</title>
        <link rel="stylesheet" href="style.css">
        
    <body>
      <div class="navbar">
          <h1>Camera</h1>
      </div>
      <div class="top-container">
          <video id="video" width="400" height="300">No streaming available...</video>
          <button id="photo-button" class="btn btn-dark">Take Photo</button>         
          <canvas id="canvas" height="300" width="400"></canvas>
          <input type="submit" id="clear-button" class="btn btn-light" value="Delete">
          <form action="savepic.php" method="POST">
            <input type="hidden" name="img" id="img" required>
            <button id="photo-button" class="btn btn-dark" name="submit">Save Photo</button>
          </form>
      </div>
    <div>
        <img src="./stickers/images.jpeg" id="emojis" alt="emojis" onclick="addSticker('emojis', 0)">
        <img src="./stickers/download (1).jpeg" id="inlove" alt="inlove" onclick="addSticker('inlove', 50)">
        <img src="./stickers/download (2).jpeg" id="feelings" alt="feelings" onclick="addSticker('feelings', 100)">
        <img src="./stickers/download (3).jpeg" id="adorable" alt="adorable" onclick="addSticker('adorable', 150)">
    </div><br /><hr /><br />
      <div class="bottom-container">
          <div id="photos">
            <?php
              if($images){
                foreach ($images as $image) {
                  echo '<img src="images/'.$image['picture'].'">';
                }
              }
            ?>
          </div>
      </div>
    </body>
    <script src="cam.js"></script>
    </head>
</html>