<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>VIEW transport</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>


.abc
{
float: right;
padding-right: 107px;
padding-bottom: 20px;
}
table {
    width: 100%; /* set the width to 100% */
  }
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

th {
  border:1px solid black;
}
td{
    border:1px solid black;
    width: 40%;

}

.abcd
{
float: right;
padding-right: 107px;
padding-bottom: 20px;
}

</style>
	</head>


<body>

  <br>
  <div class="abc">
    <button class="button1" onclick="printBusPass()"><span></span><span></span><span></span><span></span>Print</button>
    <div class="container my-5" id="printable-table"> <!-- Add ID to container -->
  
      <table class="table" style="width:100%;font-size: 13px;  text-align: center;">
        <thread>
          <tr>
            <td  style=" font-weight: bold;width:20px;">DATE</td>
            <td style=" font-weight: bold;">RECURRING EXPENDIATURE</td>
            <td style=" font-weight: bold;">PURPOSE</td>
            <td  style=" font-weight: bold;">CORRECTIVE MAINTAINANCE</td>
            <td style=" font-weight: bold;">PURPOSE</td>
            <td  style=" font-weight: bold;">PREVENTIVE MAINTAINANCE</td>
            <td style=" font-weight: bold;">PURPOSE</td>
            <td  style=" font-weight: bold; width:30%;">EMPLOYEES SALARY</td>
            <td style=" font-weight: bold;">PURPOSE</td>
            <td  style=" font-weight: bold;">TAX</td>
            <td style=" font-weight: bold;">PURPOSE</td>
            <td  style=" font-weight: bold;">AMONUT</td>
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
    
       header("location:/transport-project/income.php");
        exit;
    }
    $BUS_NUMBER=$_GET["BUS_NUMBER"];
    $sql="SELECT * FROM `pdf` where bus_number='$BUS_NUMBER' ";
    $result= $connection->query($sql);
            if(!$result){
              die("Invalid query: ".$connection->error);
            }
          $row=$result->fetch_assoc();
           
    echo "<a href='pdf1.php?BUS_NUMBER=$row[bus_number]'><button id='bottone1' style='height:50px; padding:5px; float:right;font-size:12px;'><strong>search</strong></button></a><br>";
    
           
            $sql="SELECT * FROM `pdf` where bus_number='$BUS_NUMBER' ";
            $result= $connection->query($sql);
            if(!$result){
              die("Invalid query: ".$connection->error);
            }
            while($row=$result->fetch_assoc())
            {
              echo "
              <tr>
                <td>$row[date]</td>
                <td>$row[RE]</td>
                <td>$row[col1]</td>
                <td>$row[CM]</td>
                <td>$row[col2]</td>
                <td>$row[PM]</td>
                <td>$row[col3]</td>
                <td>$row[ES]</td>
                <td>$row[col4]</td>
                <td>$row[TAX]</td>
                <td>$row[col5]</td>
                <td>$row[amount]</td>
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