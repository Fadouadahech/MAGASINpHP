
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERFUME UNIVERS</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        table {
            font-family: 'Arial', sans-serif;
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 12px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .add {
            display: inline-block;
            background-color: green;
            color: aliceblue;
            padding: 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .add:hover {
            background-color: darkgreen;
        }

        .actions a {
            display: inline-block;
            margin-right: 10px;
            text-decoration: none;
            color: #333;
            padding: 5px 10px;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .actions a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <h4>PERFUME'S LIST</h4>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $bdName = "magasin";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$bdName", $username, $password);
        $stmt = $conn->prepare("SELECT * FROM products");
        $stmt->execute();
        $products = $stmt->fetchAll();
    ?>

    <table>
        <tr>
            <th>Code</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>

        <?php
        foreach ($products as $product) {
            echo "<tr>";
            echo "<td>{$product['code']}</td>";
            echo "<td>{$product['title']}</td>";
            echo "<td>{$product['description']}</td>";
            echo "<td>{$product['price']}</td>";
            echo "<td>{$product['quantity']}</td>";
            echo "<td class='actions'>
                    <a href='delete.php?code={$product['code']}'>Delete</a>
                    <a href='update.php?code={$product['code']}'>Update</a>
                  </td>";
            echo "</tr>";
        }
        ?>

    </table>

    <a class="add" href="add.html">Add new product</a>

    <?php
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>

</body>
</html>
