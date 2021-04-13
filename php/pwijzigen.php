<?php

include 'database.php';


$table = "<table><tr><th>productcode</th><th>leverancier</th><th>telefoon</th></tr>";

// Set up DB connection
$conn = new MySqli('localhost', 'root', '', 'hengelsport');
// Excecute the query
$result = $conn->query("SELECT a.productcode, l.leverancier, l.telefoon
FROM artikel AS a
INNER JOIN leverancier AS l
ON a.lev_code = l.lev_code");
// For each row, add the results to a table string using concatenate (.=)
while ($row = $result->fetch_assoc())
{
    $table .= "<tr>";
    $table .= "<td>{$row['productcode']}</td>";
    $table .= "<td>{$row['leverancier']}</td>";
    $table .= "<td>{$row['telefoon']}</td>";
    $table .= "</tr>";
}

$table .= "</table";
print $table;