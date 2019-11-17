<?php
session_start();

require("server.php");


//var_dump($_POST);
$current_password = $_POST["current_password"];
$new_password = $_POST["new_password"];
$confirm_password = $_POST["confirm_password"];
$user = $_SESSION['username'];

if ($new_password != $confirm_password){
    echo 'New passwords did not match <br />';
    die();
}

try{
    $sql = "UPDATE `table` SET `passwd` = ? WHERE `passwd` = ? AND `username` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$new_password, $current_password, $user]);
    echo 'your password has been chanced<br />';
}
catch(PDOException $e) {
    $e->getMessage();
}

?>