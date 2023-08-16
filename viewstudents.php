
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
    <td>NAME</td>
    <td>USER CATEGORY</td>
    <td>ROLL NUMBER</td>
    <td>BRANCH</td>
    <td>GENDER</td>
    <td>COLLEGE NAME</td>
    <td>YEAR OF ENROLLMENT</td>
    <td>MOBILE NUMBER</td>
    <td>CURRENT YEAR</td>
    <td>BUS NUMBER</td>
    <td>ADDRESS</td>
    <td>PICK UP POINT</td>
    <td>FEE</td>
  	
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
     $sql="SELECT * From register";
     $result= $connection->query($sql);
     if(!$result){
      die("Invalid query: ".$connection->error);
     }
     while($row=$result->fetch_assoc())
     {
        echo "
        <tr>
    <td>$row[name]</td>
    <td>$row[user_category]</td>
    <td>$row[roll_number]</td>
    <td>$row[branch]</td>
    <td>$row[gender]</td>
    <td>$row[college_name]</td>
    <td>$row[year_of_enrollment]</td>
    <td>$row[mobile_number]</td>
    <td>$row[current_year]</td>
    <td>$row[bus_number]</td>
    <td>$row[address]</td>
    <td>$row[pick_up_point]</td>
    <td>$row[fee]</td>
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