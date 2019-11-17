<?php
 
 if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email'])){
    $name = mysql_escape_string($_POST['name']);
    $email = mysql_escape_string($_POST['email']);
}

if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
    // Return Error - Invalid Email
    $msg = 'The email you have entered is invalid, please try again.';
}else{
    // Return Success - Valid Email
    $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
}
$vkey = md5( rand(0,1000) );
$password = rand(10,50);

$to      = $email; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$name.'
Password: '.$password.'
------------------------
 
Please click this link to activate your account:
http://www.yourwebsite.com/verify.php?email='.$email.'&vkey='.$vkey.'
 
'; // Our message above including the link
                     
$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
?>