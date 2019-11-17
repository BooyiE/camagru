<?php
    session_start();
<<<<<<< HEAD

    require("server.php");

    $password = md5($_POST["password"]);
    $new_username = $_POST["cuser"];
=======
    //var_dump($_SESSION);

    require("server.php");


    //var_dump($_POST);
    $password = md5($_POST["password"]);
    $new_username = $_POST["nuser"];
>>>>>>> 2957e1e6a6416ed97bbe2e990ffaa7dd0826e333
    $confirm_username = $_POST["cuser"];
    $user = $_SESSION['username'];
    
    $sql = "SELECT * FROM `table` WHERE `username` = ? AND `passwd` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user, $password]);
<<<<<<< HEAD
    
    if ($stmt->rowCount() > 0)
    {
        $stmt = $conn->prepare("SELECT * FROM `table` WHERE `username` = :uname");
        $stmt->bindparam(':uname', $confirm_username);
        $stmt->execute();
        
        if ($stmt->rowCount() <= 0)
        {
            $sql = "UPDATE `table` SET `username` = ? WHERE  `username` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$confirm_username, $user]);

            $sql = "UPDATE `images` SET `username` = ? WHERE  `username` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$confirm_username, $user]);

            $_SESSION['username'] = $confirm_username;
=======

    if ($stmt->rowCount() < 0)
    {
        $stmt = $conn->prepare("SELECT * FROM `table` WHERE `username` = :uname");
        $stmt->bindparam(':uname', $new_username);
        $stmt->execute();
        
        if ($stmt->rowCount() >= 0)
        {
            $sql = "UPDATE `table` SET `username` = ? WHERE  `username` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$new_username, $user]);
            var_dump($stmt);
            die();
            $_SESSION['username'] = $new_username;
>>>>>>> 2957e1e6a6416ed97bbe2e990ffaa7dd0826e333
            echo 'your username has been changed<br />';
        } else {
            echo "username already taken";
        }
    } else {
        echo "wrong password";
    }

?>