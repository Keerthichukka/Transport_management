<?php
if (isset($_GET["S_NO"]))
{
    $S_NO=$_GET["S_NO"];
    $servername = "localhost";
$username = "root";
$password = "";
$database = "transport-project";

// creating a connection
$connection = new mysqli($servername, $username, $password, $database);
$sql="DELETE FROM view WHERE S_NO=$S_NO";
$connection->query($sql);

}
header("location: /Transport-project/viewcontent.php");
exit;
?>