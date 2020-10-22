<?php
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Customer Code</th><th>Customer Balance</th><th>Total Purchased</th><th>Number of Purchases</th><th>Average Amount Purchased</th></tr>";
 echo "Write a query to compute the average purchase amount per product made by each customer. Include the customer code, customer balance, total purchases, number of purchases, and average purchase amount.";
 echo "<br>";
 echo "SELECT INVOICE.CUS_CODE, CUSTOMER.CUS_BALANCE, Sum(LINE.LINE_UNITS*LINE.LINE_PRICE) AS 'Total Purchases', Count(*) AS 'Number of Purchases', AVG(LINE.LINE_UNITS*LINE.LINE_PRICE) AS 'Average Purchase Amount' FROM  CUSTOMER, INVOICE, LINE WHERE  INVOICE.INV_NUMBER = LINE.INV_NUMBER AND  CUSTOMER.CUS_CODE = INVOICE.CUS_CODE GROUP BY  INVOICE.CUS_CODE, CUSTOMER.CUS_BALANCE";
 

class TableRow3 extends RecursiveIteratorIterator { 
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
    $stmt = $conn->prepare("SELECT INVOICE.CUS_CODE, CUSTOMER.CUS_BALANCE, Sum(LINE.LINE_UNITS*LINE.LINE_PRICE) AS 'Total Purchases', Count(*) AS 'Number of Purchases', AVG(LINE.LINE_UNITS*LINE.LINE_PRICE) AS 'Average Purchase Amount' FROM  CUSTOMER, INVOICE, LINE WHERE  INVOICE.INV_NUMBER = LINE.INV_NUMBER AND  CUSTOMER.CUS_CODE = INVOICE.CUS_CODE GROUP BY  INVOICE.CUS_CODE, CUSTOMER.CUS_BALANCE");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRow3(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>