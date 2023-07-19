<?php
 require_once('./connect_db.php');

 if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET'){
     if(isset($_GET['id'])){
         global $con;
         $stmt = $con->prepare('DELETE FROM students WHERE id=?');
         $stmt->execute(array($_GET['id']));

        header('location:index.php');
     }
 } 
    