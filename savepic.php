<?php

$dataimg = $_POST["img"];
// var_dump($_POST);
// include_once('con.php');
session_start();
require("server.php");
// function base64_to_jpeg($base64_string, $output_file) {.
    // open the output file for writing
    # create file name
    if(!empty($dataimg)){
    $file_name = $_SESSION['username'].date("Y_m_d_h_").time().'.png';
    $path = 'images/'.$file_name;
    $ifp = fopen( $path, 'wb' ); 

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode( ',', $dataimg );

    // we could add validation here with ensuring count( $data ) > 1
    fwrite( $ifp, base64_decode( $data[ 1 ] ) );

    // clean up the file resource
    fclose( $ifp ); 
    // Connect to the database.
    echo "Saving the picture to the database";
    
    $sql = 'INSERT INTO images (username, picture)
    VALUES (?, ?)';
    $stmt = $conn->prepare($sql);

    $stmt->execute([$_SESSION['username'], $file_name]);
    }
    header("location: cam.php")

?>