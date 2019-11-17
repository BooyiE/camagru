<?php
require_once('server.php');

if(isset($_POST['reset'])) 
{
	$new_password = md5($_POST["new password"]);
	$confirm_password = md5($_POST["confirm password"]);
    $id = $_SESSION['userid'];
    if ($new_password == $confirm_password)
    {
       $sql = "UPDATE FROM `table` WHERE `passwd` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $password);
        $stmt->bindParam(1, $id);
        $result = $stmt->execute([$new_password, $id]);
    }
}
else{
    echo "Passwords does not match";
}

$headers = 'FROM: buyi';
$message = "Click the link below to reset your password
<a href='http://127.0.0.1:8080/camagru/new_pass.php'>Reset password</a>";
mail($email, "New password", "$message", "$headers");
echo "email sent";

?>