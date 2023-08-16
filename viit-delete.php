<?php
if (isset($_GET["BUS_NUMBER"]))
{
    $BUS_NUMBER=$_GET["BUS_NUMBER"];
    $servername = "localhost";
$username = "root";
$password = "";
$database = "transport-project";

// creating a connection
$connection = new mysqli($servername, $username, $password, $database);
$sql="DELETE FROM viit WHERE BUS_NUMBER='$BUS_NUMBER'";
$connection->query($sql);

}
header("location: /Transport-project/viitcontent.php");
exit;
?>