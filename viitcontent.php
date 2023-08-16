<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>VIIT transport</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
	</head>
    
<body>
	
	<div class="view1" >
<style>
th, td {
  border:1px solid black;
}
table td:first-child{
  font-size:18px;
}
table{
  font-family:Arial,sans-serif;
  font-size:16px;
}
#bottone1 {
 padding-left: 33px;
 padding-right: 33px;
 padding-bottom: 16px;
 padding-top: 16px;
 border-radius: 9px;
 background: #d5f365;
 border: none;
 font-family: inherit;
 text-align: center;
 cursor: pointer;
 transition: 0.4s;
}

#bottone1:hover {
 box-shadow: 7px 5px 56px -14px #C3D900;
}

#bottone1:active {
 transform: scale(0.97);
 box-shadow: 7px 5px 56px -10px #C3D900;
}
</style>
<body>

<div class="container my-5">
  
    <a class="btn btn-primary" href="/Transport-project/viit-create.php" role="button">New bus</a>
    <br>
    <table class="table" style="width:100%;  text-align: center;">
    <thread>
    <tr>
  
    <th style="width:15%">BUS NUMBER</th>
    <th>BOARDING TIME</th>
    <th style="width:10%">BUS DRIVER</th>
    <th>CONTACT NUMBER</th>
    <th>STOPS</th>
    <th>NO OF PASSENGERS </th>
    <th>MILEAGE</th>
    <th>PERMIT DUE DATE</th>
    <TH>INSURANCE DUE DATE</TH>
    <TH>STARTING POINT</TH>
    <TH>FEE</TH>
    <th>Action</th>
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
     $sql="SELECT * From viit";
     $result= $connection->query($sql);
     if(!$result){
      die("Invalid query: ".$connection->error);
     }
     while($row=$result->fetch_assoc())
     {
        echo "
        <tr>
   
    <td> <a href='bus.php?BUS_NUMBER=$row[BUS_NUMBER]'><button id='bottone1' style='height:50px; padding:5px; font-size:12px;'><strong>$row[BUS_NUMBER]</strong></button></a></td>
    
    <td>$row[BOARDING_TIME]</td>
    <td>$row[BUS_DRIVER]</td>
    <td>$row[CONTACT_NUMBER]</td>
    <td>$row[STOPS]</td>
    <td>$row[NO_OF_PASSENGERS]</td>
    <td>$row[MILEAGE]</td>
    <td>$row[PERMIT_DUE_DATE]</td>
    <td>$row[INSURANCE_DUE_DATE]</td>
    <td>$row[STARTING_POINT]</td>
    <td>$row[FEE]</td>
    <td>
    <a class='btn btn-primary btn-sm' href='/Transport-project/viit-edit.php?BUS_NUMBER=$row[BUS_NUMBER]'>Edit</a>
    <a class='btn btn-danger btn-sm' href='/Transport-project/viit-delete.php?BUS_NUMBER=$row[BUS_NUMBER]'>Delete</a>
    </td>
    </tr>
        ";
     }
     ?>
 
    <tr>
</div>


    </tbody>
  
</table>


<script src="4019.js">
       </script>`

</body>
</html>