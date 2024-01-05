<?php
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$code = $_POST['code'];

$servername = "localhost";
$username = "root";
$password = "";
$bdName="magasin";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$bdName", $username, $password);
    $stmt = $conn->prepare("update products set title='$title', description='$description', price='$price',quantity='$quantity' where code='$code'  ");
    $stmt->execute();
    header('location:index.php');
  } 
  
  catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  ?>