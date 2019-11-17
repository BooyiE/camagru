<?php
    require "server.php";

<<<<<<< HEAD
    //  $username       = $_POST['username'];
    //  $email          = $_POST['email'];
    //  $password       = $_POST['password'];
    $vkey = $_GET['vkey'];

     try{

        //echo $vkey;
        //die(); 
         $sql = "UPDATE `table` SET verified = 1 WHERE vkey = ?";
         $stminsert=$conn->prepare($sql);
         //$arr = array();
         if($stminsert->execute([$vkey]) === TRUE)
         {
             $headers = 'FROM: buyi';
             $message = " Congratulations $username, you are now registered!! 
             Please click on the link below to login
             <a href='http://127.0.0.1:8080/camagru/verify.php?email=$email'>Click here</a>";
             mail($email, "Verify Camagru account", "$message", "$headers");
             echo "Email Verified! Please click on the link below to login
             <a href='http://127.0.0.1:8080/camagru/login.php?email=$email'>Click here</a>";
        $alert = "You have been registered! Please verify your email!";    
            //  $conn->commit();
         }else{       
             echo "data not in";
         }
     }
     catch (PDOException $e)
     {
         echo $sql . "\n" . $e->getMessage();
     } 
     catch (PDOException $e)
     {
         echo $e->getMessage();
     }
=======
    
    if(isset($_GET['vkey'])){
        $vkey = $_GET['vkey'];
        
        $sql = "UPDATE `table` SET verified = 1 WHERE vkey = ?";
        $stmt=$conn->prepare($sql);
        
        if($stmt->execute([$vkey]) === TRUE)
        {
            echo "Email Verified!, Go to login page";
        }else{       
            echo "failed to verify account";
        }
    }
>>>>>>> 2957e1e6a6416ed97bbe2e990ffaa7dd0826e333
 
?>