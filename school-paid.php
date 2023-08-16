
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>VIEW transport</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
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
</style>
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
</style>
<body>
  <div class="abc">
<input type="text" id="roll-number-input" class="my" placeholder="Roll number">
<input type="text" id="bus-number-input" class="my" placeholder="Bus number">
<input type="text" id="year-input" class="my" placeholder="Year">
<input type="text" id="branch-input" class="my" placeholder="Branch">
<button id="search-button" onclick="performSearch()">Search</button>
</div>
<script>
function performSearch() {
  var rollNumberInput, busNumberInput, yearInput, branchInput, rollNumberFilter, busNumberFilter, yearFilter, branchFilter, table, tr, td, i, match;
  rollNumberInput = document.getElementById("roll-number-input");
  busNumberInput = document.getElementById("bus-number-input");
  yearInput = document.getElementById("year-input");
  branchInput = document.getElementById("branch-input");
  rollNumberFilter = rollNumberInput.value.toUpperCase();
  busNumberFilter = busNumberInput.value.toUpperCase();
  yearFilter = yearInput.value.toUpperCase();
  branchFilter = branchInput.value.toUpperCase();
  table = document.getElementsByTagName("table")[0];
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
    tdRollNumber = tr[i].getElementsByTagName("td")[1];
    tdBusNumber = tr[i].getElementsByTagName("td")[8];
    tdYear = tr[i].getElementsByTagName("td")[5];
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
    if (yearFilter) {
      if (tdYear) {
        if (tdYear.textContent.toUpperCase().indexOf(yearFilter) == -1) {
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
    <th >ROLL NUMBER</th>
    <th>CLASS</th>
    <th >GENDER</th>
    <th>SCHOOL NAME</th>
    <th>YEAR OF ENROLLMENT</th>
    <th>MOBILE NUMBER </th>
  
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
    
            if ($_SERVER['REQUEST_METHOD']=='GET')
{
    if (!isset($_GET["bus_number"]))
    {
    
       header("location:/transport-project/school-bus.php");
        exit;
    }
    $BUS_NUMBER=$_GET["bus_number"];
     $sql="SELECT COUNT(*) as total_students from school_register where fee >0 and BUS_NUMBER='$BUS_NUMBER' and user_category='student'";
     $result=$connection->query($sql);
     if($result->num_rows>0){
      $row=$result->fetch_assoc();
      echo"<h1>Total students:  " .$row["total_students"]."</h1>";
      }
      // Display the names of the students who have not paid the full amount
      
     $sql="SELECT * From school_register where BUS_NUMBER='$BUS_NUMBER' and user_category='student'";
     $result= $connection->query($sql);
     if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          if ($row["fee"] >0) { //assuming the total amount is 1000
          
         
        echo "
        <tr>
        
    <td>$row[name]</td>
   
    <td>$row[roll_number]</td>
    <td>$row[class]</td>
    <td>$row[gender]</td>
    <td>$row[school_name]</td>
    <td>$row[year_of_enrollment]</td>
    <td>$row[mobile_number]</td>
   
    <td>$row[bus_number]</td>
    <td>$row[address]</td>
    <td>$row[pick_up_point]</td>
    <td>$row[fee]</td>
    <td><a class='btn btn-primary btn-sm' href='/Transport-project/school-edit-fee1.php?roll_number=$row[roll_number]'>Edit</a></td>
    </tr>
        ";
     }
    }
  } else {
    echo "No results found.";
  }}
     ?>
 
    <tr>
</div>


    </tbody>
  
</table>



</body>
</html>
