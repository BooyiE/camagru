<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require 'server.php';

// Stores all error messages
$error_msg= [];

// if(isset($_POST['submit'])){
    $username = $_POST["username"];
    // $email = $_POST["email"];
    $password_1 = md5($_POST["password"]);
    // $password_2 = $_POST["confirm_password"];
    // $password = $password_1;
    // $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if (empty($username)) {
        array_push($error_msg,"You have entered invalid username");
    }
//    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // array_push($error_msg,"You have entered invalid Email");
    // }
    if(empty($password_1)){
        array_push($error_msg,"You have entered invalid Password");
    }
  //  echo "check point";
    
    if (count($error_msg) == 0) {
        $stmt = $conn->prepare("SELECT passwd FROM `table` WHERE username=?");
        // $stmt->bindparam(':uname', $username);
        // $stmt->bindparam(':mail', $email);
        $stmt->execute([$username]);
        //  $stmt->bindparam(3, $password_1);
        $hold = $stmt->fetchAll();
       // var_dump($hold);
        if ($stmt->rowCount() > 0){
           // die("entered here");
           // var_dump($stmt);
            if ($password_1 == $hold[0]["passwd"]){
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $username;
                echo "you are in";
                //var_dump($_SESSION);
                header("Location:login.php");
            }else{
                echo 'the password is incorrect';
            }
        //   die(); 
       }else{
            echo "You are not registered, please register";
        // die();  
      }
    }
// }
?>