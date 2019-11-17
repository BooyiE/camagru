<?php
   require "server.php";
   function upload_image($username, $picture)
   {
       global $conn;
       $sql = "INSERT INTO images (username, picture) VALUES (?,?)";
       $stmt= $conn->prepare($sql);
       try{
           $stmt->execute([$username, $picture]);
           echo "picture successfully added";
       }
       catch(Exception $ex) {
           die($ex->getMessage());
       }
   }
   function delete_image($pic_id)
   {
       global $conn;
       $sql = "DELETE FROM images WHERE id = ?";
       $stmt= $conn->prepare($sql);
       try{
           $stmt->execute([$pic_id]);
           echo "picture deleted";
       }
       catch(Exception $ex){
           die($ex->getMessage());
       }
   }
   function getAllImages()
   {
       global $conn;
       $sql = "SELECT * FROM images ORDER BY upload_date";
       $stmt= $conn->prepare($sql);
       try{
           $stmt->execute();
           $images = $stmt->fetchAll();
           return $images;
       }
       catch(Exception $ex){
           die($ex->getMessage());
       }
   }
   ?>