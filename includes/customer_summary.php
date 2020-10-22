<?php
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Customer Code</th><th>Customer Balance</th><th>Total Purchased</th></tr>";
 echo "Write a query to output the customer code, customer balance, the sum of the line_units * line_price and summarize or group by customer code and customer balance";
 echo "<br>";
 echo "SELECT  INVOICE.CUS_CODE, CUSTOMER.CUS_BALANCE,    Sum(LINE.LINE_UNITS*LINE.LINE_PRICE) AS 'Total Purchases' FROM  CUSTOMER, INVOICE, LINE WHERE  INVOICE.INV_NUMBER = LINE.INV_NUMBER AND  CUSTOMER.CUS_CODE = INVOICE.CUS_CODE GROUP BY  INVOICE.CUS_CODE, CUSTOMER.CUS_BALANCE";
 

class TableRow1 extends RecursiveIteratorIterator { 
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
    $stmt = $conn->prepare("SELECT  INVOICE.CUS_CODE, CUSTOMER.CUS_BALANCE,    Sum(LINE.LINE_UNITS*LINE.LINE_PRICE) AS 'Total Purchases' FROM  CUSTOMER, INVOICE, LINE WHERE  INVOICE.INV_NUMBER = LINE.INV_NUMBER AND  CUSTOMER.CUS_CODE = INVOICE.CUS_CODE GROUP BY  INVOICE.CUS_CODE, CUSTOMER.CUS_BALANCE");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRow1(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>