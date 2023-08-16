<?php
if (isset($_GET["roll_number"]))
{
    $roll_number=$_GET["roll_number"];
    $servername = "localhost";
$username = "root";
$password = "";
$database = "transport-project";

// creating a connection
$connection = new mysqli($servername, $username, $password, $database);
$sql="DELETE FROM student WHERE roll_number='$roll_number'";
$connection->query($sql);

}
header("location: /Transport-project/student.php");
exit;
?>