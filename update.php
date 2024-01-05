User
<?php 

$code = $_GET['code'];

$servername = "localhost";
$username = "root";
$password = "";
$bdName="magasin";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$bdName", $username, $password);
  $stmt = $conn->prepare("SELECT * FROM products where code='$code' ");
  $stmt->execute();
  $product = $stmt->fetchAll();
?>
<div style="text-align: center;">
<form action="update.php" method="post">
     <label for="title">title</label>
     <input type="text" name="title" value=<?php echo $product[0]["title"] ?>>
     <br><br>
     <label for="description">Description</label>
     <br>
     <textarea name="description" id="" cols="30" rows="3">
     <?php echo $product[0]["description"] ?>
     </textarea>
    
     <br><br>
     <label for="price">price</label>
     <input type="text" name="price" value=<?php echo $product[0]["price"] ?>>
     <br><br>
     <label for="quantity">quantity</label>
     <input type="text" name="quantity" value=<?php echo $product[0]["quantity"] ?>>
     <br><br>
     <input type="hidden" name="code" value=<?php echo $product[0]["code"] ?>>
     <input type="submit" value="update">
    </form>
    </div>
<?php

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  } 
?>