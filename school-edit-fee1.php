<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "transport-project";

// creating a connection
$connection = new mysqli($servername, $username, $password, $database);
$bus_number="";
$fee="";
$errorMessage="";
$successMessage="";
  

if ($_SERVER['REQUEST_METHOD']=='GET')
{
    if (!isset($_GET["roll_number"]))
    {
      
       header("location:/transport-project/school_student.php");
        exit;
    }
    $roll_number=$_GET["roll_number"];
    $sql="SELECT * FROM school_register WHERE roll_number='$roll_number'";
    $result=$connection->query($sql);
  
    $row=$result->fetch_assoc();
    if (!$row)
    {
        header("location:/transport-project/school_student.php");
        exit;
    }
    
}
else {
    # code...
    
        $fee=$_POST['fee'];
        do{
            if(empty($fee))
            {
               $errorMessage="All the fileds are required";
               break;
            }
            
            $roll_number=$_GET["roll_number"];
            
            $sql=("UPDATE school_register SET fee='$fee' WHERE roll_number='$roll_number'")or
    die($mysqli->error);   
            $result=$connection->query($sql);
            if (!$result)
            {
                $errorMessage="Invalid query: ".$connection->error;
                break;
            }
            
           
            $sql = "SELECT BUS_NUMBER, TOTAL_INCOME ,PROFIT FROM school";

$result = mysqli_query($connection, $sql);

// Loop through the result set
while ($row = mysqli_fetch_assoc($result)) {

    // Get the total fee of the bus from the student table
    $bus_id = $row["BUS_NUMBER"];
    $sql2 = "SELECT fee AS total_fee FROM school_register WHERE bus_number = '$bus_id'";
    $result2 = mysqli_query($connection, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $total_fee = intval($row2["total_fee"]);


    // Update the bus wise income with the total fee
    $income =intval($row["TOTAL_INCOME"])+ $total_fee;
    $profit=intval($row["PROFIT"])+$total_fee;
    $bus_id = $row["BUS_NUMBER"];
    $sql3 = "UPDATE school SET TOTAL_INCOME = '$income' ,PROFIT='$profit' WHERE BUS_NUMBER = '$bus_id'";
    mysqli_query($connection, $sql3);
}

            
            
            
            
            
  $fee="";
            $successMessage="Client updated correctly";
         header("location: /transport-project/school_student.php");
            
        }while(false);
       
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charaset="UTF-8">
        <meta http-enquiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" channel ="wifth=device-width,initial-scale=1.0">
        <title> Transport</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    .form-control{
        background-color: lightgrey;
        border: 3px solid #ccc;
        padding: 5px;
    }

    .form-control:hover {
        background-color: #ddd;
        border: 1px solid #aaa;
    }
</style>
    </head>
    <body>
        <div class="container my-5">
            <h2> Edit Fee</h2>
            <?php
            if(!empty($errorMessage))
            {
                echo "
                <div class='alert alert-warning alert-dismissable fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            }
            ?>
            <form method="post">
               
       
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">FEE</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="fee" value="<?php echo $fee;?>">
             </div>
        </div>
        
        <?php
        if(!empty($successMessage))
        {
            echo "
            <div class='row mb-3'>
            <div class='offset-sm-3 col-sm-6'>
            <div class='alert alert-success alert-dismissable fade show' role='alert'>
                <strong>$successMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
           </div>
           </div>
           </div>
                ";
        }
        ?>
        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
</div>
<div class="col-sm-3 d-grid">
    <a class="btn btn-outline-primary" href="/transport-project/school_student.php" role="button">Cancel</a>
</div>
</div>
</form>
</div>
</body>
</html>