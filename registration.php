<?php
    //require('reg.php');
<<<<<<< HEAD
=======
    // require('con.php');
>>>>>>> 2957e1e6a6416ed97bbe2e990ffaa7dd0826e333
    require('server.php');

?>
<!DOCTYPE html>
<html>
       <head>
           <title>Registration</title>
           <link rel="stylesheet" type="text/css" href="style.css">
       </head>
<body>
    <div class="header">
        <h2>Register</h2>
    </div>
    <form action="reg.php" method="post" >
        <!-- display validation errors-->
        <div style="
            padding: 20px;
            background-color: #f44336; /* Red */
            color: white;
            margin-bottom: 15px;">
            
            <?php
            foreach($error_msg as $err){
                
                echo "<p>.$err.</p>";
            }
         ?>
            
        </div>
        <div class="input-details">
            <label>Username :</label>
            <input type="text" name="username" placeholder = "Enter username....."required>
        </div>
        <div class="input-details">
            <label>Email :</label>
            <input type="email" name="email" placeholder = "Enter email....."required>
        </div>
        <div class="input-details">
            <label>Password :</label>
            <input type="password" name="password" placeholder = "Enter password_1....."required>
            </div>
            <div class="input-details">
            <label>Password :</label>
            <input type="password" name="confirm_password" placeholder = "Enter password_2....."required>
            </div>
            
        <div class="input-details">
            <button class="submit" name="submit" value="submit">register</button>
            <p style='color: red'>
               <?php
                   if (!empty($_SESSION['error'])){
                       echo $_SESSION['error'];
                       $_SESSION['error'] = '';
                   }
               ?> </p>
               </div>
            <p> already a member? <a href="login.php">sign in</a>
            </p> 
    </form>
    
</body>
</html>