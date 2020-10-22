<?php
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Total Balance</th><th>Minimum Balance</th><th>Maximum Balance</th><th>Average Balance</th></tr>";
 echo "Write a query to find the customer balance characteristics (total, minimum, maximum, average) for all customers, including the total of the outstanding balances";
 echo "<br>";
 echo "SELECT Sum(CUS_BALANCE) AS 'Total Balance', Min(CUS_BALANCE) AS 'Minimum Balance', Max(CUS_BALANCE) AS 'Maximum Balance', Avg(CUS_BALANCE) AS 'Average Balance' FROM CUSTOMER";
 

class TableRow10 extends RecursiveIteratorIterator { 
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
    $stmt = $conn->prepare("SELECT Sum(CUS_BALANCE) AS 'Total Balance', Min(CUS_BALANCE) AS 'Minimum Balance', Max(CUS_BALANCE) AS 'Maximum Balance', Avg(CUS_BALANCE) AS 'Average Balance' FROM CUSTOMER");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRow10(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>