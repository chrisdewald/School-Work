<?php
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Customer Code</th><th>Number of Purchases</th><th>Total Purchases</th></tr>";
 echo "Write a query to produce the number of invoices and the total purchase amounts by customer showing customer code, number of purchases, and total customer purchases";
 echo "<br>";
 echo "SELECT CUS_CODE, COUNT(INV_NUMBER) AS 'Number of Invoices', Sum(INV_TOT) AS 'Total Customer Purchases' FROM (SELECT  CUS_CODE, L.INV_NUMBER AS INV_NUMBER, Sum(L.LINE_UNITS*L.LINE_PRICE) AS INV_TOT FROM INVOICE I, LINE L WHERE I.INV_NUMBER = L.INV_NUMBER GROUP BY CUS_CODE, L.INV_NUMBER) AS IL GROUP BY CUS_CODE";
 

class TableRow6 extends RecursiveIteratorIterator { 
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
    $stmt = $conn->prepare("SELECT CUS_CODE, COUNT(INV_NUMBER) AS 'Number of Invoices', Sum(INV_TOT) AS 'Total Customer Purchases' FROM (SELECT  CUS_CODE, L.INV_NUMBER AS INV_NUMBER, Sum(L.LINE_UNITS*L.LINE_PRICE) AS INV_TOT FROM INVOICE I, LINE L WHERE I.INV_NUMBER = L.INV_NUMBER GROUP BY CUS_CODE, L.INV_NUMBER) AS IL GROUP BY CUS_CODE");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRow6(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>