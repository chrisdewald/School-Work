<?php
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Invoice Number</th><th>Invoice Total</th></tr>";
 echo "Write a query to output the total purchases per invoice and invoice number, grouping by invoice number and totaling the sum of the product purchases in the line table that corresponds to the invoice number";
 echo "<br>";
 echo "SELECT LINE.INV_NUMBER, Sum(LINE.LINE_UNITS*LINE.LINE_PRICE) AS 'Invoice Total' FROM LINE GROUP BY LINE.INV_NUMBER";
 

class TableRow4 extends RecursiveIteratorIterator { 
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
    $stmt = $conn->prepare("SELECT LINE.INV_NUMBER, Sum(LINE.LINE_UNITS*LINE.LINE_PRICE) AS 'Invoice Total' FROM LINE GROUP BY LINE.INV_NUMBER");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRow4(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>