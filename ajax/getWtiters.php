<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("myServer", "root", "", "db_name");

$result = $conn->query("SELECT Name, Email, Area, Sample  FROM Customers");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Name":"'  . $rs["Name"] . '",';
    $outp .= '"Email":"'   . $rs["Email"]        . '",';
    $outp .= '"Area":"'   . $rs["Area"]        . '",';
    $outp .= '"Sample":"'. $rs["Sample"]     . '"}'; 
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>

<!-- output similar to http://www.w3schools.com/angular/customers_mysql.php  -->