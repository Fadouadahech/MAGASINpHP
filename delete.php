<?php 

$code = $_GET['code'];

$servername = "localhost";
$username = "root";
$password = "";
$bdName="magasin";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$bdName", $username, $password);
  $stmt = $conn->prepare("delete from products where code='$code'");
  $stmt->execute();
  header('location:index.php'); 
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>