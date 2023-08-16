<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "transport-project";

// creating a connection
$connection = new mysqli($servername, $username, $password, $database);
$DATE="";
$RECURRING_EXPENDIATURE="";
$CORRECTIVE_MAINTAINANCE="";
$PREVENTIVE_MAINTAINANCE="";
$EMPLOYEES_SALARY="";
$TAXES="";
$col1="";
$col2="";
$col3="";
$col4="";
$col5="";
$date="";
$amount="";
$RE="";
$CM="";
$PM="";
$TAX="";
$sno="";
$errorMessage="";
$successMessage="";
if ($_SERVER['REQUEST_METHOD']=='GET')
{
    if (!isset($_GET["BUS_NUMBER"]))
    {
        header("location:/transport-project/income.php");
        exit;
    }
    $BUS_NUMBER=$_GET["BUS_NUMBER"];
    $sql=("SELECT * FROM view WHERE BUS_NUMBER='$BUS_NUMBER'");
    $result=$connection->query($sql);
    $row=$result->fetch_assoc();
    if (!$row)
    {
        header("location:/transport-project/income.php");
        exit;
    }
    
}
else {
    # code...
    $DATE=$_POST["DATE"];
    $RECURRING_EXPENDIATURE=$_POST["RECURRING_EXPENDIATURE"];
$CORRECTIVE_MAINTAINANCE=$_POST["CORRECTIVE_MAINTAINANCE"];
$PREVENTIVE_MAINTAINANCE=$_POST["PREVENTIVE_MAINTAINANCE"];
$EMPLOYEES_SALARY=$_POST["EMPLOYEES_SALARY"];
$TAXES=$_POST["TAXES"];
$col1=$_POST["col1"];
$col2=$_POST["col2"];
$col3=$_POST["col3"];
$col4=$_POST["col4"];
$col5=$_POST["col5"];
        do{
            if(empty($DATE))
            {
                echo "DATE MUST BE REQUIRED";
            }
         
            $BUS_NUMBER=$_GET["BUS_NUMBER"];
            $sql=("UPDATE view SET  RECURRING_EXPENDIATURE=RECURRING_EXPENDIATURE+'$RECURRING_EXPENDIATURE',DATE='$DATE',CORRECTIVE_MAINTAINANCE=CORRECTIVE_MAINTAINANCE+'$CORRECTIVE_MAINTAINANCE',PREVENTIVE_MAINTAINANCE=PREVENTIVE_MAINTAINANCE+'$PREVENTIVE_MAINTAINANCE',EMPLOYEES_SALARY=EMPLOYEES_SALARY+'$EMPLOYEES_SALARY',TAXES=TAXES+'$TAXES',PROFIT=PROFIT-'$RECURRING_EXPENDIATURE',PROFIT=PROFIT-'$CORRECTIVE_MAINTAINANCE',PROFIT=PROFIT-'$PREVENTIVE_MAINTAINANCE',PROFIT=PROFIT-'$EMPLOYEES_SALARY',PROFIT=PROFIT-'$TAXES',col1='$col1',col2='$col2',col3='$col3',col4='$col4',col5='$col5'WHERE BUS_NUMBER='$BUS_NUMBER'")or
    die($mysqli->error);   
            $result=$connection->query($sql);
            if (!$result)
            {
                $errorMessage="Invalid query: ".$connection->error;
                break;
            }
           $amount=intval($RECURRING_EXPENDIATURE)+intval($CORRECTIVE_MAINTAINANCE)+intval($PREVENTIVE_MAINTAINANCE)+intval($EMPLOYEES_SALARY)+intval($TAXES);
           $sql=("INSERT INTO pdf(date, RE, CM, PM, ES, TAX,amount,bus_number,col1,col2,col3,col4,col5) VALUES ('$DATE','$RECURRING_EXPENDIATURE','$CORRECTIVE_MAINTAINANCE','$PREVENTIVE_MAINTAINANCE','$EMPLOYEES_SALARY','$TAXES','$amount','$BUS_NUMBER','$col1','$col2','$col3','$col4','$col5')");
        $result=$connection->query($sql);
        if (!$result)
        {
            $errorMessage="Invalid query: ".$connection->error;
            break;
        }
            $successMessage="Client updated correctly";
            header("location: /transport-project/income.php");
            
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
            <h2> Edit </h2>
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
                    <label class="col-sm-3 col-form-label">DATE</label>
                    <div class="col-sm-6">
                        
                        <input type="date" class="form-control" name="DATE" value="<?php echo $DATE;?>">
             </div>
        </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">RECURRING EXPENDIATURE</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="RECURRING_EXPENDIATURE" value="<?php echo $RECURRING_EXPENDIATURE;?>">
             </div>
        </div>
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label"> REASON-RECURRING EXPENDIATURE</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="col1" value="<?php echo $col1;?>">
             </div>
        </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">CORRECTIVE MAINTAINANCE</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="CORRECTIVE_MAINTAINANCE"value="<?php echo $CORRECTIVE_MAINTAINANCE;?>">
             </div>
        </div>
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">REASON-CORRECTIVE MAINTAINANCE</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="col2"value="<?php echo $col2;?>">
             </div>
        </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">PREVENTIVE MAINTAINANCE</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="PREVENTIVE_MAINTAINANCE" value="<?php echo $PREVENTIVE_MAINTAINANCE;?>">
             </div>
        </div>
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">REASON-PREVENTIVE MAINTAINANCE</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="col3" value="<?php echo $col3;?>">
             </div>
        </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">EMPLOYEES SALARY</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="EMPLOYEES_SALARY" value="<?php echo $EMPLOYEES_SALARY;?>">
             </div>
        </div>
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">REASON-EMPLOYEES SALARY</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="col4" value="<?php echo $col4;?>">
             </div>
        </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">TAXES</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="TAXES" value="<?php echo $TAXES;?>">
             </div>
        </div>
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">REASON-TAXES</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="col5" value="<?php echo $col5;?>">
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
    <a class="btn btn-outline-primary" href="/transport-project/income.php" role="button">Cancel</a>
</div>
</div>
</form>
</div>
</body>
</html>