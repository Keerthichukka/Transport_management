<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>VIEW transport</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
	</head>
    

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
  
    
    <table class="table" style="width:100%;  text-align: center;">
    <thread>
    <tr>
  	
    <th style="width:10%">BUS NUMBER</th>
    <th>EXPECTED INCOME</th>
    <th>TOTAL INCOME</th>
    <th>RECURRING EXPENDIATURE</th>
    <th>CORRECTIVE MAINTAINANCE</th>
    <th>PREVENTIVE MAINTAINANCE</th>
    <th>EMPLOYEES SALARY</th>
    <th>TAXES</th>
    <th style="width:10%;">PROFIT</th>
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
     

     $sql="SELECT * From school";
     $result= $connection->query($sql);
     if(!$result){
      die("Invalid query: ".$connection->error);
     }
     while($row=$result->fetch_assoc())
{
    
    
        echo "
        <tr>
   
    <td> <a href='school-pdf.php?BUS_NUMBER=$row[BUS_NUMBER]'><button id='bottone1' style='height:50px; padding:5px; font-size:12px;'><strong>$row[BUS_NUMBER]</strong></button></a></td>
    <td>$row[EXPECTED_INCOME]</td>
    <td>$row[TOTAL_INCOME]</td>
    <td>$row[RECURRING_EXPENDIATURE]</td>
    <td>$row[CORRECTIVE_MAINTAINANCE]</td>
    <td>$row[PREVENTIVE_MAINTAINANCE]</td>
    <td>$row[EMPLOYEES_SALARY]</td>
    <td>$row[TAXES]</td>
    <td>$row[PROFIT]</td>
    <td>
    <a class='btn btn-primary btn-sm' href='/Transport-project/school-edit-expenses.php?BUS_NUMBER=$row[BUS_NUMBER]'>Edit</a>
  
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