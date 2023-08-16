<?php
$hostname="localhost"; //local server name default localhost
$username="root";  //mysql username default is root.
$password="";       //blank if no password is set for mysql.
$database="transport-project";  //database name which you created
$conn= new mysqli($hostname,$username,$password,$database);
if(! $conn)
{
die('Connection Failed'.mysql_error());
}


?>