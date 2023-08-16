<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "transport-project";

// creating a connection
$connection = new mysqli($servername, $username, $password, $database);

$BUS_NUMBER="";
$BOARDING_TIME="";
$BUS_DRIVER="";
$CONTACT_NUMBER="";
$STOPS="";
$NO_OF_PASSENGERS="";
$MILEAGE="";
$PERMIT_DUE_DATE="";
$INSURANCE_DUE_DATE="";
$STARTING_POINT="";
$FEE="";
$errorMessage="";
$successMessage="";
if($_SERVER['REQUEST_METHOD']=='POST')
{      
        $BUS_NUMBER = $_POST['BUS_NUMBER'];
        $BOARDING_TIME = $_POST['BOARDING_TIME'];
        $BUS_DRIVER=$_POST['BUS_DRIVER'];
        $CONTACT_NUMBER=$_POST['CONTACT_NUMBER'];
        $STOPS=$_POST['STOPS'];
        
        $MILEAGE=$_POST['MILEAGE'];
       $PERMIT_DUE_DATE=$_POST['PERMIT_DUE_DATE'];
       $INSURANCE_DUE_DATE=$_POST['INSURANCE_DUE_DATE'];
       $STARTING_POINT=$_POST['STARTING_POINT'];
        $FEE=$_POST['FEE'];
        
        $sql="SELECT COUNT(*) as total_student from staff where bus_number='$BUS_NUMBER'";
        $result=$connection->query($sql);
        $row=$result->fetch_assoc();
        $sql1="SELECT COUNT(*) as total_students from student where bus_number='$BUS_NUMBER'";
        $result1=$connection->query($sql1);
        $row1=$result1->fetch_assoc();
        $NO_OF_PASSENGERS=$row["total_student"]+$row1["total_students"];

        do{
         if(empty($MILEAGE)||empty($INSURANCE_DUE_DATE)||empty($PERMIT_DUE_DATE)||empty($STARTING_POINT)||empty($FEE)||empty($BUS_NUMBER)||empty($BOARDING_TIME)|| empty($BUS_DRIVER)|| empty($CONTACT_NUMBER)||empty($STOPS))
         {
            $errorMessage="All the fileds are required";
            break;
         }
         $sql = "INSERT INTO viit (BUS_NUMBER,BOARDING_TIME,BUS_DRIVER,CONTACT_NUMBER,STOPS,NO_OF_PASSENGERS,MILEAGE,PERMIT_DUE_DATE,INSURANCE_DUE_DATE,STARTING_POINT,FEE) VALUES ('$BUS_NUMBER','$BOARDING_TIME','$BUS_DRIVER','$CONTACT_NUMBER','$STOPS','$NO_OF_PASSENGERS','$MILEAGE','$PERMIT_DUE_DATE','$INSURANCE_DUE_DATE','$STARTING_POINT','$FEE')";
        $result=$connection->query($sql);
        if(!$result)
        {
            $errorMessage="Invalid query:" .$connection->error;
            break;
        }
       
 $BUS_NUMBER="";
$BOARDING_TIME="";
$BUS_DRIVER="";
$CONTACT_NUMBER="";
$STOPS="";
$NO_OF_PASSENGERS="";
$MILEAGE="";
$PERMIT_DUE_DATE="";
$INSURANCE_DUE_DATE="";
$STARTING_POINT="";
$FEE="";
$successMessage="Client added correctly";
header("location: /Transport-project/viitcontent.php");
exit;
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
    </head>
    <body>
        <div class="container my-5">
            <h2> New Bus</h2>
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
                    
                    
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">BUS NUMBER</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="BUS NUMBER" value="<?php echo $BUS_NUMBER;?>">
             </div>
        </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">BOARDING TIME</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="BOARDING TIME"value="<?php echo $BOARDING_TIME;?>">
             </div>
        </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">BUS DRIVER</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="BUS DRIVER" value="<?php echo $BUS_DRIVER;?>">
             </div>
        </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">CONTACT NUMBER</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="CONTACT NUMBER" value="<?php echo $CONTACT_NUMBER;?>">
             </div>
        </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">STOPS</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="STOPS" value="<?php echo $STOPS;?>">
             </div>
        </div>
    
               
             <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">MILEAGE</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="MILEAGE" value="<?php echo $MILEAGE;?>">
             </div>
        </div>
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">PERMIT DUE DATE</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="PERMIT_DUE_DATE" value="<?php echo $PERMIT_DUE_DATE;?>">
             </div>
        </div>
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">INSURANCE DUE DATE</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="INSURANCE_DUE_DATE" value="<?php echo $INSURANCE_DUE_DATE;?>">
             </div>
        </div>
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">STARTING POINT</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="STARTING_POINT" value="<?php echo $STARTING_POINT;?>">
             </div>
        </div>
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">FEE</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="FEE" value="<?php echo $FEE;?>">
             </div>
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
    <a class="btn btn-outline-primary" href="/Transport-project/viitcontent.php" role="button">Cancel</a>
</div>
</div>
</form>
</div>
</body>
</html>





