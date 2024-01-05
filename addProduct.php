<?php
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];


$servername = "localhost";
$username = "root";
$password = "";
$bdName="magasin";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$bdName", $username, $password);



  
  $stmt = $conn->prepare("insert into products(title,description,price,quantity) values('$title','$description','$price','$quantity')");
  $stmt->execute();
  header('location:index.php');
} 

catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>

