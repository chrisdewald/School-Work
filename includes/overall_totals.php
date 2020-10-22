<?php
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Total Number of Invoices</th><th>Total Sales</th><th>Smallest Amount of Customer Purchases</th><th>Largest Amount of Customer Purchases</th><th>Average Amount</th></tr>";
 echo "Write a query to generate the total number of invoices, the invoice total for all of the invoices, the smallest of the customer purchase amounts, the largest of the customer purchase amounts, and the average of all of the customer purchase amounts";
 echo "<br>";
 echo "SELECT  Count(INV_NUMBER) AS 'Total Invoices', Sum(INV_TOT) AS 'Total Sales', Min(INV_TOT) AS 'Smallest Amount of Customer Purchases', Max(INV_TOT) AS 'Largest Amount of Customer Purchases', Avg(INV_TOT) AS 'Average Amount' FROM (SELECT CUS_CODE, L.INV_NUMBER AS INV_NUMBER, Sum(L.LINE_UNITS*L.LINE_PRICE) AS INV_TOT FROM INVOICE I, LINE L WHERE I.INV_NUMBER = L.INV_NUMBER GROUP BY CUS_CODE, L.INV_NUMBER) IL";
 

class TableRow7 extends RecursiveIteratorIterator { 
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
    $stmt = $conn->prepare("SELECT  Count(INV_NUMBER) AS 'Total Invoices', Sum(INV_TOT) AS 'Total Sales', Min(INV_TOT) AS 'Smallest Amount of Customer Purchases', Max(INV_TOT) AS 'Largest Amount of Customer Purchases', Avg(INV_TOT) AS 'Average Amount' FROM (SELECT CUS_CODE, L.INV_NUMBER AS INV_NUMBER, Sum(L.LINE_UNITS*L.LINE_PRICE) AS INV_TOT FROM INVOICE I, LINE L WHERE I.INV_NUMBER = L.INV_NUMBER GROUP BY CUS_CODE, L.INV_NUMBER) IL");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRow7(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>