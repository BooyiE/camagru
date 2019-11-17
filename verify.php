<?php

require_once('server.php');

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$email = $_GET['email'];
echo $email;
$verifi = "UPDATE `table` SET verified=1 WHERE email = '$email'";
echo $verifi;
$conn->exec($verifi);
header("Location:login.php");

?>

