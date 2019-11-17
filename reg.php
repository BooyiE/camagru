<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require 'server.php';

$error_msg= [];

if(isset($_POST['submit'])){
    $username =  filter_var($_POST['username'],FILTER_SANITIZE_SPECIAL_CHARS);
    $email = $_POST["email"];
    $password_1 = $_POST["password"];
    $password_2 = $_POST["confirm_password"];
    $password = md5($password_1);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    if (empty($username)) {
        die("You have entered invalid username");
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("You have entered invalid Email");
    }
    
    if(empty($password_1)){
        die("You have entered invalid Password");
    }

    if( strlen($password_1) < 6){
        die("Your Passwords is less than 6 characters");
    }
    
    if( $password_1 != $password_2){
        die("Your Passwords do not match");
    }


    
    if (count($error_msg) == 0) {
        $stmt = $conn->prepare("SELECT * FROM `table` WHERE `username` = :uname or `email` = :mail");
        $stmt->bindparam(':uname', $username);
        $stmt->bindparam(':mail', $email);
        $stmt->execute();
        
        $hold = $stmt->fetchAll();
        
        $vkey = uniqid(); 
        if ($stmt->rowCount() > 0)
        {
            die("$username is already taken");
        } else {
            $stmt = $conn->prepare("INSERT INTO `table` (username, email, passwd, vkey, verified) VALUES (?,?,?,?,?)");
            $arr = array($username, $email, $password, $vkey, 0);
            if (strlen($username) > 25)
                echo "error, username too long";
            else if (strlen($email) > 100)
            echo "error, email too long";
            else if (strlen($password) > 250)
                echo "error, password too long";
            else if($stmt->execute($arr) === TRUE)
            {
                $msg = "First line of text\nSecond line of text";
            
                 //echo"sent";
                 $headers = 'FROM: buyi';
                $message = "Click the link below to verify your account!
                <a href='http://127.0.0.1:8080/camagru/email_ver.php?vkey=$vkey'>verifying account</a>";
                mail($email, "Verifying Camagru account", "$message", "$headers");
                echo "Email sent, check your email";                
            } else {
                echo "failed to add user";
            }
        }
    }
}
?>