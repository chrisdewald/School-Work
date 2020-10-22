<?php
echo "Write a query to get the first 3 
characters of all last names from the 
employees table and sort them in ascending order";
echo "<br>";
echo "SELECT Substring(first_name, 1, 3) FROM employees ORDER BY FIRST_NAME ASC";
echo "<br>";
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>First 3 Characters of Employees Names</th></tr>";

class TableRow2 extends RecursiveIteratorIterator { 
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
    $stmt = $conn->prepare("SELECT Substring(first_name, 1, 3) FROM employees ORDER BY FIRST_NAME ASC");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRow2(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>