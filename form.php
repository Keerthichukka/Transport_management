<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "transport-project";

// creating a connection
$connection = new mysqli($servername, $username, $password, $database);

$name = "";
    $branch="";
  $roll_number="";
 $gender="";
  $college_name="";
  $mobile_number="";
  $parent_name="";
  $parent_number="";
  $address="";
  $boarding_point="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name = $_POST['name'];
    $branch=$_POST['branch'];
  $roll_number=$_POST['roll_number'];
 $gender=$_POST['gender'];
  $college_name=$_POST['college_name'];
  $mobile_number=$_POST['mobile_number'];

  $parent_name=$_POST['parent_name'];
  $parent_number=$_POST['parent_number'];
  $address=$_POST['address'];
  $boarding_point=$_POST['boarding_point'];
        do{
            if(empty($name)||empty($branch)|| empty($roll_number)|| empty($gender)||empty($college_name)||empty($mobile_number)||empty($parent_name)||empty($parent_number)||empty($address)||empty($boarding_point))
            {
               $errorMessage="All the fileds are required";
               break;
            }
         $sql = "INSERT INTO student (name,branch,roll_number,gender,college_name,mobile_number,parent_name,parent_number,address,boarding_point) VALUES ('$name','$branch','$roll_number','$gender','$college_name','$mobile_number','$parent_name','$parent_number','$address','$boarding_point')";
    
        $result=$connection->query($sql);
        if(!$result)
        {
            $errorMessage="Invalid query:" .$connection->error;
            break;
        }
        $name = "";
        $branch="";
      $roll_number="";
     $gender="";
      $college_name="";
      $mobile_number="";
      $parent_name="";
      $parent_number="";
      $address="";
      $boarding_point="";
$successMessage="Client added correctly";
header("location: /Transport-project/viewstudents.php");
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
    <link rel="stylesheet" href="form.css">
    </head>
    <body>
        <div class="container my-5">
        <div class="text">
    <br>
  <center>  <h1> Student Registeration Form</h1> </center>
  <hr> 
  <h2>DUVVADA TRANSPORT REGISTRATION</h2>
<p>This Form has been Created for the Transport Registration of the New/ Old Students and Staff looking to have a Transport facility at VIGNAN University. Kindly fill your details properly.</p>

<h4><I>If any doubt, Please contact below number.</I></h4>

<h4>1)     CH. KEERTHI ( Admin) - Transport Manager- Contact Number: 9392955063</h4> 
<h4><b>PLEASE NOTE:</b> </h4>

<h4 style="color: red";>* If You are trying offline Mode, please pay before registering the Form. otherwise, the form will consider invalid.</h4>
<h4 style="color: red";>* This is applicable for the students who want to use Vignan Buses for 2022-23 only.</h4>
<hr>
</div>
<br>
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
                    <label class="col-sm-3 col-form-label">NAME</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
             </div>
        </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">BRANCH</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="branch"value="<?php echo $branch;?>">
             </div>
        </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">ROLL NUMBER</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="roll_number" value="<?php echo $roll_number;?>">
             </div>
        </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">GENDER</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="gender" value="<?php echo $gender;?>">
             </div>
        </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">COLLEGE NAME</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="college_name" value="<?php echo $college_name;?>">
             </div>
        </div>
    
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">MOBILE NUMBER</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="mobile_number" value="<?php echo $mobile_number;?>">
             </div>
        </div>
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">PARENT NAME</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="parent_name" value="<?php echo $parent_name;?>">
             </div>
        </div>
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">PARENT NUMBER</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="parent_number" value="<?php echo $parent_number;?>">
             </div>
        </div>
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">ADDRESS </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
             </div>
        </div>
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">BOARDING POINT</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="boarding_point" value="<?php echo $boarding_point;?>">
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
    <a class="btn btn-outline-primary" href="/Transport-project/form.php" role="button">Cancel</a>
</div>
</div>
</form>
</div>
</body>
</html>





j