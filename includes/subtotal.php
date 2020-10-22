<?php
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Customer Code</th><th>Inovoice Number</th><th>Product Description</th>
 <th>Line Units</th><th> Line Price</th><th> Subtotal</th></tr>";
 echo "Repeat the query above but add a calculated field that is a subtotal column that calculates line_units * line_price";
 echo "<br>";
 echo "SELECT INVOICE.CUS_CODE, INVOICE.INV_NUMBER, PRODUCT.P_DESCRIPT, LINE.LINE_UNITS AS [Units Bought], LINE.LINE_PRICE AS [Unit Price], LINE.LINE_UNITS*LINE.LINE_PRICE AS Subtotal FROM CUSTOMER, INVOICE, LINE, PRODUCT WHERE CUSTOMER.CUS_CODE = INVOICE.CUS_CODE AND INVOICE.INV_NUMBER = LINE.INV_NUMBER AND PRODUCT.P_CODE = LINE.P_CODE ORDER BY INVOICE.CUS_CODE, INVOICE.INV_NUMBER, PRODUCT.P_DESCRIPT";
 

class TableRow extends RecursiveIteratorIterator { 
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
    $stmt = $conn->prepare("SELECT INVOICE.CUS_CODE, INVOICE.INV_NUMBER, PRODUCT.P_DESCRIPT, LINE.LINE_UNITS, LINE.LINE_PRICE, LINE.LINE_UNITS*LINE.LINE_PRICE AS Subtotal FROM CUSTOMER, INVOICE, LINE, PRODUCT WHERE CUSTOMER.CUS_CODE = INVOICE.CUS_CODE AND INVOICE.INV_NUMBER = LINE.INV_NUMBER AND PRODUCT.P_CODE = LINE.P_CODE ORDER BY INVOICE.CUS_CODE, INVOICE.INV_NUMBER, PRODUCT.P_DESCRIPT");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRow(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>