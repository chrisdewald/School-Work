<?php
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Customer Code</th><th>Invoice Number</th><th>Invoice Total</th></tr>";
 echo "Write a query to show the customer code, invoice numbers and invoice totals, grouping by customer code then invoice number";
 echo "<br>";
 echo "SELECT CUS_CODE, LINE.INV_NUMBER AS INV_NUMVER, Sum(LINE.LINE_UNITS*LINE.LINE_PRICE) AS INV_TOT FROM INVOICE, LINE WHERE INVOICE.INV_NUMBER = LINE.INV_NUMBER GROUP BY CUS_CODE, LINE.INV_NUMBER";
 

class TableRow5 extends RecursiveIteratorIterator { 
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
    $stmt = $conn->prepare("SELECT CUS_CODE, LINE.INV_NUMBER AS INV_NUMVER, Sum(LINE.LINE_UNITS*LINE.LINE_PRICE) AS INV_TOT FROM INVOICE, LINE WHERE INVOICE.INV_NUMBER = LINE.INV_NUMBER GROUP BY  CUS_CODE, LINE.INV_NUMBER");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRow5(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>