<?php
    include_once('server.php');

    if (isset($_POST['submit'])){
        $new_password = md5($_POST["new_password"]);
        $confirm_password = md5($_POST["confirm_password"]);
        $vkey = $_POST["vkey"];

        if ($new_password == $confirm_password)
        {
            $sql = "UPDATE `table` SET passwd = ? WHERE `vkey` = ?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([$new_password, $vkey]);
            header("Location:login.php");
        } else {
            echo "failed";
        }
     } 
    // else {
    //     echo "failed";
    // }
?>

<html>
    <head>
        <title>Reset Password</title>
        <link rel="stylesheet" type="text/css" href="styles.css" />
    </head>
    <body>
        <form action="new_pass.php" method="POST">
            <div style="width:500px;">
                <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
                <label>New Password</label>
                <input type="password" name="new_password" class="txtField" required/><br />
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="txtField" required /><br />
                <input type="hidden" name="vkey" value="<?= $_GET['vkey']; ?>" />
                <input type="submit" name="submit" value="Submit" class="btnSubmit">
            </div>
        </form>
    </body>
    </html>