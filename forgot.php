<?php
require_once('server.php');
//var_dump($_POST);

if(isset($_POST) & !empty($_POST)){

	$username = $_POST["user-login-name"];
	$email = $_POST["user-email"];

    try{
        $sql = "SELECT * FROM `table` WHERE `username` = ? AND `email` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $email]);
        $results = $stmt->fetch();
    }
    catch(PDOException $e) {
        $e->getMessage();
    }

    if (!$results){
        echo 'Username/email is invalid <br />';
    } else {

        $vkey = uniqid();

        try{
            $sql = "UPDATE `table` SET `vkey` = ? WHERE `username` = ? AND `email` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$vkey, $username, $email]);
        }
        catch(PDOException $e) {
            $e->getMessage();
        }

        $headers = 'FROM: buyi';
        $message = "Click the link below to verify your password
        <a href='http://127.0.0.1:8080/camagru/new_pass.php?vkey=$vkey'>Reset password</a>";
        mail($email, "Reset password", "$message", "$headers");
        echo "email sent";
    }
}
?>