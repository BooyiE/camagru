<?php
  require("../server.php");

  try {
      $dbh = new PDO("mysql:host=$host", $dbusername, $dbpass);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "CREATE DATABASE IF NOT EXISTS Camagru";
      $dbh->exec($sql);
      echo "database created successfully<br>";
  } catch (PDOException $e) {
      echo "ERROR CREATING DB: \n".$e->getMessage();
      exit(1);
  }

  try {
    $conn = new PDO("mysql:host=$host;dbname=camagru", $dbusername, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS `comments` (
      `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `username` varchar(200) DEFAULT NULL,
      `image_id` int(11) NOT NULL,
      `comments` varchar(200) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    $conn->exec($sql);
    echo "comments table created successfully<br>";
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit(1);
  }

  try {
    $conn = new PDO("mysql:host=$host;dbname=camagru", $dbusername, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS `images` (
      `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `username` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `picture` varchar(100) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    $conn->exec($sql);
    echo "images table created successfully<br>";
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit(1);
  }

  try {
    $conn = new PDO("mysql:host=$host;dbname=camagru", $dbusername, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS `likes` (
      `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `username` varchar(200) NOT NULL,
      `image_id` int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    $conn->exec($sql);
    echo "likes table created successfully<br>";
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit(1);
  }

  try {
    $conn = new PDO("mysql:host=$host;dbname=camagru", $dbusername, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS `table` (
      `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `username` varchar(25) NOT NULL,
      `email` varchar(100) NOT NULL,
      `passwd` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
      `vkey` varchar(100) NOT NULL,
      `verified` varchar(20) NOT NULL DEFAULT '0',
      `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    $conn->exec($sql);
    echo "table table created successfully<br>";
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit(1);
  }

//   try {
//     $conn = new PDO("mysql:host=$host;dbname=camagru", $dbusername, $dbpass);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $sql = "CREATE TABLE IF NOT EXISTS `uploads` (
//       `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
//       `image` varchar(100) NOT NULL,
//       `image_text` text NOT NULL
//     ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
//     $conn->exec($sql);
//     echo "uploads table created successfully<br>";
//   } catch (PDOException $e) {
//     echo $e->getMessage();
//     exit(1);
//   }
?>
