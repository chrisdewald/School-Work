<?php
echo "Write a query to get all unique first names that start with the letter P 
from the employees table. Output the names in upper case. 
Sort the results in ascending order.";
echo "<br>";
echo "SELECT UPPER(FIRST_NAME) FROM employees WHERE FIRST_NAME LIKE 'P%' 
ORDER BY FIRST_NAME ASC";
echo "<br>";
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Names that Start with P</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
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
$dbname = "company";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT UPPER(FIRST_NAME) FROM employees 
    WHERE FIRST_NAME LIKE 'P%' ORDER BY FIRST_NAME ASC");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>