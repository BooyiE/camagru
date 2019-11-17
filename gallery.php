<<<<<<< HEAD
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

=======
>>>>>>> 2957e1e6a6416ed97bbe2e990ffaa7dd0826e333
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    require("server.php");

    if (isset($_SESSION['username']))
    {
        $user = $_SESSION['username'];
    } else {
        $user = "";
    }

    # handles paging
    if (isset($_GET['page'])) {
        $curpage = $_GET['page'];
    } else {
        $curpage = 0;
    }

    $result;
    $lyk;
    $pageNum;
    $curpager = $curpage;

    # Get number of images
    $sql = "SELECT COUNT(*) FROM `images`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $img_count = $stmt->fetchColumn();
    
    # Get 6 images from database
    if ($curpage < $img_count && $curpage != -6) {
        $results = $conn->query("SELECT * FROM `images` ORDER BY upload_date DESC LIMIT 6 OFFSET $curpage", PDO::FETCH_ASSOC)->fetchAll();
    }else if($curpage == -6){
        if ($img_count == 0){
            $curpage = 0;
        }elseif ($img_count % 6 == 0){
            $curpage = $img_count - 6;
        }else{
            $curpage = $img_count - $img_count % 6;
        }
        $results = $conn->query("SELECT * FROM `images` ORDER BY upload_date DESC LIMIT 6 OFFSET $curpage", PDO::FETCH_ASSOC)->fetchAll();
    }
    else
    {
        $curpage = 0;
        $results = $conn->query("SELECT * FROM `images` ORDER BY upload_date DESC LIMIT 6 OFFSET $curpage", PDO::FETCH_ASSOC)->fetchAll();
    }

    if ($curpager == 0){
        $pageNum = 1;
    } else {
        $pageNum = intdiv($curpage, 6) + 1;
    }

    $comment = '';

    # Comments uploads
    if (isset($_POST['comment'])){
        $comment = $_POST['user_comment'];

        $sql = 'INSERT INTO comments(username, image_id, comments)
        VALUES(?, ?, ?)';
        $stmt= $conn->prepare($sql);
        
<<<<<<< HEAD
        if($stmt->execute([$_POST['username'],$_POST['image_id'], filter_var($_POST['user_comment'],FILTER_SANITIZE_SPECIAL_CHARS) ]) === TRUE)
=======
        
        if($stmt->execute([$_POST['username'],$_POST['image_id'], $_POST['user_comment']]) === TRUE)
>>>>>>> 2957e1e6a6416ed97bbe2e990ffaa7dd0826e333
        {
            $sql = "SELECT username FROM images WHERE id = ?";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$_POST['image_id']]);
            $res = $stmt->fetch();
            $name  = $res['username'];

            $sql = "SELECT email FROM `table` WHERE username = ?";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$name]);
            $res = $stmt->fetch();
            $email  = $res['email'];

            $headers = 'FROM: buyi';
            $message = "$user has commented on your picture: $comment";
            mail($email, "Verifying Camagru account", "$message", "$headers");                
        } else {
            echo "failed to add user";
        }
    }

    # Handles picture delete
    if (isset($_GET['delete'])){
        $sql = "DELETE FROM images WHERE username = ? AND id = ?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$user,$_GET['image_id']]);
<<<<<<< HEAD

        $sql = "DELETE FROM likes WHERE image_id = ?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$_GET['image_id']]);

        $sql = "DELETE FROM comments WHERE image_id = ?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$_GET['image_id']]);
=======
>>>>>>> 2957e1e6a6416ed97bbe2e990ffaa7dd0826e333
        echo "Picture deleted";
    }

    # Handles all the likes uplaods
    if (isset($_GET['like'])){
        $sql = "SELECT * FROM likes WHERE username = ? AND image_id = ?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$user,$_GET['image_id']]);
        $liked = $stmt->fetch();      

        if (!$liked){
            $sql = 'INSERT INTO likes(username, image_id)
            VALUES(?, ?)';
            $stmt= $conn->prepare($sql);

            if($stmt->execute([$user,$_GET['image_id']]) === TRUE)
            {
                $sql = "SELECT username FROM images WHERE id = ?";
                $stmt= $conn->prepare($sql);
                $stmt->execute([$_GET['image_id']]);
                $res = $stmt->fetch();
                $name  = $res['username'];

                $sql = "SELECT email FROM `table` WHERE username = ?";
                $stmt= $conn->prepare($sql);
                $stmt->execute([$name]);
                $res = $stmt->fetch();
                $email  = $res['email'];

                $headers = 'FROM: buyi';
                $message = "$user has liked your picture";
                mail($email, "Verifying Camagru account", "$message", "$headers");                
            } else {
                echo "failed to add user";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
    <?php
        foreach($results as $result){
            $pic_name = $result['picture'];
            $username = $result['username'];
            $image_id = $result['id'];

            $sql_like = 'SELECT * FROM likes WHERE image_id = ?';
            $stmt = $conn->prepare($sql_like);
            $stmt->execute([$result['id']]);
            $likes = $stmt->rowCount();

            $sql = 'SELECT * FROM comments WHERE image_id = ?';
            $stmt =$conn->prepare($sql);
            $stmt->execute([$result['id']]);
            $comm = $stmt->fetchAll();

            echo "<div width = 400 height=300> <img src='images/$pic_name' alt='post'> <div>";
<<<<<<< HEAD
        if (isset($user) && $user != ""){
=======
        if ($user != ""){
>>>>>>> 2957e1e6a6416ed97bbe2e990ffaa7dd0826e333
            foreach($comm as $res){
                $cmnt = $res['comments'];
                echo "<p>$cmnt</p>";
            }
            echo"
            <form method='post' action='gallery.php'>
                <input type='text' name='user_comment'>
                <input type='text'  value='$username' hidden name='username'>
                <input type='text'  value='$image_id' hidden name='image_id'>
                <input type='submit' name='comment' value='comment'>
            </form>
            <a href='gallery.php?like&username=$username&image_id=$image_id'>
<<<<<<< HEAD
            <button id='like'>$likes Like</button></a>";

            if ($username === $_SESSION['username'])
            {
                echo "<a href='gallery.php?delete&image_id=$image_id'>";
                echo "<button id='delete'>Delete Picture</button></a>";
            }
        }

=======
            <button id='like'>$likes Like</button></a>
            <a href='gallery.php?delete&image_id=$image_id'>
            <button id='delete'>Delete Picture</button></a>";
        }
>>>>>>> 2957e1e6a6416ed97bbe2e990ffaa7dd0826e333
        }
    ?><br/><br/>
    <div class='footer' style='background:  black; padding: 5px; height :auto; overflow: hidden; width: 100%;'>
        <center><p style='display:inline; color:white;'> &copy bphofuya </p></center>
    </div>

    <div class="page" style="text-align: center; margin-top: 10px; ">
        <a class="page-link" style="color: black; display: inline;" href="?page=<?php echo $curpage-6?>">&laquo;</a>
        <?php echo "Page ".$pageNum;?>
        <a class="page-link" style="color: black; display: inline;" href="?page=<?php echo $curpage+6?>"> &raquo;</a>
    </div>
</body>
</html>