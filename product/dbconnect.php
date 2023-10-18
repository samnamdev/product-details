<?php
$servername="localhost";
$username="root";
$password="";
$database="factory";

$conn=mysqli_connect("$servername","$username","$password","$database");

if (!$conn) {
    die ("connection was not successfull");
}
// else {
//     echo "Connected";
// }
?>

