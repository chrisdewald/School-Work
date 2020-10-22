<?php
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Product Description</th><th>Quantity on Hand</th><th>Product Price</th><th>Quantity on Hand X Price</th></tr>";
 echo "Write a query to produce the summary of the value of products currently in inventory. Note that the value of each product is produced by the multiplication of the units currently in inventory and the unit price. Output the product description, quantiy on hand, price and subtotal (quantity on hand * price). Order by subtotal in descending order";
 echo "<br>";
 echo "SELECT P_DESCRIPT, P_QOH, P_PRICE, P_QOH*P_PRICE AS Subtotal FROM  PRODUCT ORDER BY Subtotal DESC";
 

class TableRow12 extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saleco";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT P_DESCRIPT, P_QOH, P_PRICE, P_QOH*P_PRICE AS Subtotal FROM  PRODUCT ORDER BY Subtotal DESC");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRow12(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>