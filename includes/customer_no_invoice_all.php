<?php
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Total Balance</th><th>Minimum Balance</th><th>Maximum Balance</th><th>Average Balance</th></tr>";
 echo "Write a query to find the customer balance summary (total, min, max, avg) for all customers who have not made purchases during the current invoicing period";
 echo "<br>";
 echo "SELECT SUM(CUS_BALANCE) AS 'Total Balance', MIN(CUS_BALANCE) AS 'Minimum Balance', MAX(CUS_BALANCE) AS 'Maximum Balance', AVG(CUS_BALANCE) AS 'Average Balance' FROM (SELECT CUS_CODE, CUS_BALANCE FROM CUSTOMER WHERE CUSTOMER.CUS_CODE NOT IN (SELECT DISTINCT CUS_CODE FROM INVOICE)) AS C";
 

class TableRow11 extends RecursiveIteratorIterator { 
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
    $stmt = $conn->prepare("SELECT SUM(CUS_BALANCE) AS 'Total Balance', MIN(CUS_BALANCE) AS 'Minimum Balance', MAX(CUS_BALANCE) AS 'Maximum Balance', AVG(CUS_BALANCE) AS 'Average Balance' FROM (SELECT CUS_CODE, CUS_BALANCE FROM CUSTOMER WHERE CUSTOMER.CUS_CODE NOT IN (SELECT DISTINCT CUS_CODE FROM INVOICE)) AS C");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRow11(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>