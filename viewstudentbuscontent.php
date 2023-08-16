<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>VIEW transport</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
	</head>
<body>
	
	<div class="view1" >
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>

<div class="container my-5">
  
    <table class="table" style="width:100%;  text-align: center;">
    <thread>
    <tr>
  	<th>S.NO</th>
    <th style="width:10%">BUS NUMBER</th>
    <th>STOPS</th>
 
    <TH>FEE</th>
  </tr>
</thread>
<tbody>
    <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $database = "transport-project";
 
     // creating a connection
     $connection = new mysqli($servername, $username, $password, $database);
     if($connection->connect_error)
     {
        die("connection failed:".$connection->connect_error);
     }
     $sql="SELECT * From view";
     $result= $connection->query($sql);
     if(!$result){
      die("Invalid query: ".$connection->error);
     }
     while($row=$result->fetch_assoc())
     {
        echo "
        <tr>
    <td>$row[S_NO]</td>
    <td>$row[BUS_NUMBER]</td>
    <td>$row[STOPS]</td>
    <td>$row[FEE]</td>
    </tr>
        ";
     }
     ?>
 
    <tr>
</div>


    </tbody>
  
</table>



</body>
</html>