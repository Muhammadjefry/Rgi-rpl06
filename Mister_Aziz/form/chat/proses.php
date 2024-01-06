<?php 
require_once('functions.php');
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "chat";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
    }
    $no1 = $_POST['pesan'];
    $no2 = userid();
  
    $sql = "INSERT INTO chat1 (user,pesan)
    VALUES ($no2,'$no1')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();



?>