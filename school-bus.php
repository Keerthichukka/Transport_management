<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>VIEW transport</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>





button {
 position: relative;
 padding: 1em 1.8em;
 outline: none;
 border: 1px solid #303030;
 background: white;
 color: #ae00ff;
 text-transform: uppercase;
 letter-spacing: 2px;
 font-size: 15px;
 overflow: hidden;
 transition: 0.2s;
 border-radius: 20px;
 cursor: pointer;
 font-weight: bold;
}

button:hover {
 box-shadow: 0 0 10px #ae00ff, 0 0 25px #001eff, 0 0 50px #ae00ff;
 transition-delay: 0.6s;
}

button span {
 position: absolute;
}

button span:nth-child(1) {
 top: 0;
 left: -100%;
 width: 100%;
 height: 2px;
 background: linear-gradient(90deg, transparent, #ae00ff);
}

button:hover span:nth-child(1) {
 left: 100%;
 transition: 0.7s;
}

button span:nth-child(3) {
 bottom: 0;
 right: -100%;
 width: 100%;
 height: 2px;
 background: linear-gradient(90deg, transparent, #001eff);
}

button:hover span:nth-child(3) {
 right: 100%;
 transition: 0.7s;
 transition-delay: 0.35s;
}

button span:nth-child(2) {
 top: -100%;
 right: 0;
 width: 2px;
 height: 100%;
 background: linear-gradient(180deg, transparent, #ae00ff);
}

button:hover span:nth-child(2) {
 top: 100%;
 transition: 0.7s;
 transition-delay: 0.17s;
}

button span:nth-child(4) {
 bottom: -100%;
 left: 0;
 width: 2px;
 height: 100%;
 background: linear-gradient(360deg, transparent, #001eff);
}

button:hover span:nth-child(4) {
 bottom: 100%;
 transition: 0.7s;
 transition-delay: 0.52s;
}

button:active {
 background: #ae00af;
 background: linear-gradient(to top right, #ae00af, #001eff);
 color: #bfbfbf;
 box-shadow: 0 0 8px #ae00ff, 0 0 8px #001eff, 0 0 8px #ae00ff;
 transition: 0.1s;
}

button:active span:nth-child(1) 
span:nth-child(2) 
span:nth-child(2) 
span:nth-child(2) {
 transition: none;
 transition-delay: none;
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
th {
  border:1px solid black;
}
td{
    border:1px solid black;
    width: 40%;

}



</style>
	</head>

<body>
  <div class="abc">
  <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "transport-project";

            // creating a connection
            $connection = new mysqli($servername, $username, $password, $database);
            if ($_SERVER['REQUEST_METHOD']=='GET')
{
    if (!isset($_GET["BUS_NUMBER"]))
    {
    
       header("location:/transport-project/bus.php");
        exit;
    }
    $BUS_NUMBER=$_GET["BUS_NUMBER"];
 echo" &nbsp&nbsp&nbsp
  <a href='http://localhost/Transport-project/school-paid.php?bus_number=$BUS_NUMBER ' ><button id='bottone1' style='height:50px; padding:5px; font-size:12px;'>PAID</button></a>
  &nbsp&nbsp&nbsp
  &nbsp&nbsp&nbsp
  <a href='http://localhost/Transport-project/school-notpaid.php?bus_number=$BUS_NUMBER'><button id='bottone1' style='height:50px; padding:5px; font-size:12px;'>DUES</button></a>
  &nbsp&nbsp&nbsp";
}?>
  <BR>
    <button class="button1" STYLE="FLOAT:RIGHT;" onclick="printBusPass()"><span></span><span></span><span></span><span></span>Print</button>
    <div class="container my-5" id="printable-table"> <!-- Add ID to container -->

    <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "transport-project";

            // creating a connection
            $connection = new mysqli($servername, $username, $password, $database);
            if ($_SERVER['REQUEST_METHOD']=='GET')
{
    if (!isset($_GET["BUS_NUMBER"]))
    {
    
       header("location:/transport-project/school-income.php");
        exit;
    }
    $BUS_NUMBER=$_GET["BUS_NUMBER"];
    $sql="SELECT COUNT(*) as total_students from school_register where bus_number='$BUS_NUMBER' and user_category='student'";
    $result=$connection->query($sql);
    if($result->num_rows>0){
     $row=$result->fetch_assoc();
     echo"<h6>Total student:  " .$row["total_students"]."</h6>";
     }
     $sql="SELECT COUNT(*) as total_students from school_register where bus_number='$BUS_NUMBER' and user_category='staff'";
     $result=$connection->query($sql);
     if($result->num_rows>0){
      $row1=$result->fetch_assoc();
      echo"<h6>Total staff:  " .$row1["total_students"]."</h6>";
      }
    }
     ?>
      <table class="table" style="width:50%;font-size: 13px;  text-align: center; float:left;">
        <thread>
          <tr>
            <th  style=" font-weight: bold;">NAME</th>
            <th style=" font-weight: bold;">ROLL NUMBER</th>
            <th  style=" font-weight: bold;">CLASS</th>
           
            
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
            if ($_SERVER['REQUEST_METHOD']=='GET')
{
    if (!isset($_GET["BUS_NUMBER"]))
    {
    
       header("location:/transport-project/schoolcontent.php");
        exit;
    }
   
            $sql="SELECT * FROM `school_register` where bus_number='$BUS_NUMBER' and user_category='student'";
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
                <td>$row[class]</td>
               
                
              </tr>
              ";
            }
        }

          ?>

        </tbody>

      </table>

      <table class="table" style="width:40%;font-size: 13px;  text-align: center;float:right;">
        <threa >
          <tr>
            <td  style=" font-weight: bold; width:50px;">NAME</td>
            <td style=" font-weight: bold;">EMPLOYEE ID</td>
         
        
            
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
            if ($_SERVER['REQUEST_METHOD']=='GET')
{
    if (!isset($_GET["BUS_NUMBER"]))
    {
    
       header("location:/transport-project/schoolcontent.php");
        exit;
    }
    $BUS_NUMBER=$_GET["BUS_NUMBER"];
   
            $sql="SELECT * FROM `school_register` where bus_number='$BUS_NUMBER' and user_category='staff' ";
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
               
                
              </tr>
              ";
            }
        }

          ?>

        </tbody>

      </table>
    </div>

    <script>
      function printBusPass() {
        var printContents = document.getElementById("printable-table").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
      }
    </script>
  </div>
</body>

</html>