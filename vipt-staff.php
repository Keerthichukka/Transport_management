
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>VIPT transport</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
	</head>
  
    <style>
#search-input {
  padding: 8px;
  border: none;
  border-radius: 4px;
  margin-right: 8px;
}
#search-button {
  padding: 8px;
  border: none;
  border-radius: 4px;
  background-color: #007bff;
  color: white;
  cursor: pointer;
}
.abc
{
float: right;
padding-right: 107px;
padding-bottom: 20px;
}
.my{
  background-color: #D2D9C1;
  width: 180px;
  height: 45px;
}
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
</style>
    </head>


<body>
<div class="abc">
<input type="text" id="roll-number-input" class="my" placeholder="EMPLOYEE ID">
<input type="text" id="bus-number-input"class="my" placeholder="BUS NUMBER">

<input type="text" id="branch-input" class="my" placeholder="Branch">
<button id="search-button" onclick="performSearch()">Search</button>
</div>
<script>
function performSearch() {
  var rollNumberInput, busNumberInput, branchInput, rollNumberFilter, busNumberFilter,  branchFilter, table, tr, td, i, match;
  rollNumberInput = document.getElementById("roll-number-input");
  busNumberInput = document.getElementById("bus-number-input");
  
  branchInput = document.getElementById("branch-input");
  rollNumberFilter = rollNumberInput.value.toUpperCase();
  busNumberFilter = busNumberInput.value.toUpperCase();

  branchFilter = branchInput.value.toUpperCase();
  table = document.getElementsByTagName("table")[0];
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
    tdRollNumber = tr[i].getElementsByTagName("td")[1];
    tdBusNumber = tr[i].getElementsByTagName("td")[8];
   
    tdBranch = tr[i].getElementsByTagName("td")[2];
    match = true;
    if (rollNumberFilter) {
      if (tdRollNumber) {
        if (tdRollNumber.textContent.toUpperCase().indexOf(rollNumberFilter) == -1) {
          match = false;
        }
      }
    }
    if (busNumberFilter) {
      if (tdBusNumber) {
        if (tdBusNumber.textContent.toUpperCase().indexOf(busNumberFilter) == -1) {
          match = false;
        }
      }
    }
    
    if (branchFilter) {
      if (tdBranch) {
        if (tdBranch.textContent.toUpperCase().indexOf(branchFilter) == -1) {
          match = false;
        }
      }
    }
    if (match) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}
</script>
<div class="container my-5">
    <table class="table" style="width:100%;  text-align: center;">
    <thread>
    <tr>
     
    <th>NAME</th>
    <th >EMPLOYEE ID</th>
    <th>BRANCH</th>
    <th >GENDER</th>
    <th>COLLEGE NAME</th>
    <th>YEAR OF ENROLLMENT</th>
    <th>MOBILE NUMBER </th>
    <th>CURRENT YEAR</th>
    <th>BUS NUMBER</th>
    <TH>ADDRESS</TH>
    <TH>PICK UP POINT</TH>
    <TH>FEE</TH>
    

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
     $sql="SELECT COUNT(*) as total_students from staff where college_name='vipt' ";
     $result=$connection->query($sql);
     if($result->num_rows>0){
      $row=$result->fetch_assoc();
      echo"<h1>Total students:  " .$row["total_students"]."</h1>";
      }
     $sql="SELECT * From staff where college_name='vipt'";
     $result= $connection->query($sql);
     if(!$result){
      die("Invalid query: ".$connection->error);
     }
     while($row=$result->fetch_assoc())
     {
        echo "
        <tr>
       
    <td>$row[name]</td>
   
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
    <td><a class='btn btn-primary btn-sm' href='/Transport-project/edit-fee.php?roll_number=$row[roll_number]'>Edit</a>
    <a class='btn btn-danger btn-sm' href='/Transport-project/staff-delete.php?roll_number=$row[roll_number]'>Delete</a></td>
   
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