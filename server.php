<?php
<<<<<<< HEAD

require("config/database.php");
=======
    $dbusername = "root";
    $dbpass = "123456";
    $host = "localhost";
>>>>>>> 2957e1e6a6416ed97bbe2e990ffaa7dd0826e333

    try {
        $conn = new PDO("mysql:host=$host;dbname=camagru", $dbusername, $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>
      
   