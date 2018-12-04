<?php
 
require '../XXX.php';
$sql = "SELECT * FROM products WHERE upvotes >=50 ORDER BY RAND() LIMIT 5";
$send = mysqli_query($conn, $sql);
$array = [];
while ($row = mysqli_fetch_assoc($send)) {
    array_push($array, $row["name"], $row["thumbnail"], $row["tagline"], $row["upvotes"], $row["url"]);
}
echo json_encode($array);
?>