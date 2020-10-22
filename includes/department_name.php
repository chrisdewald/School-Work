<?php
echo "Write a query to get the department name for all employees. Include the
employee’s first name, last name, and department name in your output. 
Sort the list by department name in ascending order, then by employee 
last name in ascending order 
and employee first name in ascending order (this query uses multiple tables)";
echo "<br>";
echo "SELECT E.first_name, E.last_name, E.department_id 
FROM employees E JOIN employees S ON E.department_id = S.department_id 
ORDER BY DEPARTMENT_ID ASC, LAST_NAME ASC, FIRST_NAME ASC";
echo "<br>";
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>First Name</th><th>Last Name</th><th>Department ID</th></tr>";

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
$dbname = "company";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT E.first_name, E.last_name, E.department_id 
    FROM employees E JOIN employees S ON E.department_id = S.department_id 
    ORDER BY DEPARTMENT_ID ASC, LAST_NAME ASC, FIRST_NAME ASC");
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