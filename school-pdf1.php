<style>
    th {
  border:1px solid black;
}
td{
    border:1px solid black;
    width: 40%;

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
</style>
<body>
<button class="button1" onclick="printBusPass()"><span></span><span></span><span></span><span></span>Print</button>
<div class="container my-5" id="printable-table">
    <?php
// Step 1: Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transport-project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Retrieve data from the database
if (isset($_GET['BUS_NUMBER'])) {
    $bus_number = mysqli_real_escape_string($conn, $_GET['BUS_NUMBER']);
    $sql = "SELECT * FROM school_pdf WHERE bus_number = '$bus_number'";
    $result = mysqli_query($conn, $sql);
}

// Step 3: Display the data
if (isset($result) && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "<h2>Bus Income Details - Bus Number: " . $row["bus_number"] . "</h2>";
    echo "<form method='GET'>";
    echo "<label for='month'>Month:</label>";
    echo "<select name='month' id='month'>";
    echo "<option value='0'></option>";
    echo "<option value='1'>January</option>";
    echo "<option value='2'>February</option>";
    echo "<option value='3'>March</option>";
    echo "<option value='4'>April</option>";
    echo "<option value='5'>May</option>";
    echo "<option value='6'>June</option>";
    echo "<option value='7'>July</option>";
    echo "<option value='8'>August</option>";
    echo "<option value='9'>September</option>";
    echo "<option value='10'>October</option>";
    echo "<option value='11'>November</option>";
    echo "<option value='12'>December</option>";
    echo "</select>";

    echo "<label for='year'>Year:</label>";
    echo "<input type='number' name='year' id='year' min='1900' max='6000' step='1'>";

    echo "<label for='date'>Date:</label>";
    echo "<input type='date' name='date' id='date' value='".date("Y-m-d")."'>";

    echo "<input type='hidden' name='BUS_NUMBER' value='".$bus_number."'>";
    echo "<input type='submit' name='submit' value='Search'>";
    echo "</form>";

    if (isset($_GET['month']) && isset($_GET['year']) && isset($_GET['date'])) {
        $month = mysqli_real_escape_string($conn, $_GET['month']);
        $year = mysqli_real_escape_string($conn, $_GET['year']);
        $date = mysqli_real_escape_string($conn, $_GET['date']);

        $sql = "SELECT * FROM school_pdf WHERE bus_number = '$bus_number' AND MONTH(date) = '$month' or YEAR(date) = '$year' or date = '$date'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
         echo"   <table border=1 cellspacing=0 class='table' style='width:100%;font-size: 13px;  text-align: center;'>
            <thread>
           
            <td  style=' font-weight: bold;width:20px;'>DATE</td>
            <td style=' font-weight: bold;'>RECURRING EXPENDIATURE</td>
            <td style=' font-weight: bold;'>PURPOSE</td>
            <td  style=' font-weight: bold;'>CORRECTIVE MAINTAINANCE</td>
            <td style=' font-weight: bold;'>PURPOSE</td>
            <td  style=' font-weight: bold;'>PREVENTIVE MAINTAINANCE</td>
            <td style='font-weight: bold;'>PURPOSE</td>
            <td  style='font-weight: bold; width:30%;'>EMPLOYEES SALARY</td>
            <td style=' font-weight: bold;'>PURPOSE</td>
            <td  style='font-weight: bold;'>TAX</td>
            <td style=' font-weight: bold;'>PURPOSE</td>
            <td  style=' font-weight: bold;'>AMONUT</td>
          </tr></thread>";
          
            while ($row = mysqli_fetch_assoc($result)) {
               
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
            echo "</table>";
        } else {
            echo "No results found.";
       
        }}}?>
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