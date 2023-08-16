<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "transport-project";

// creating a connection
$connection = new mysqli($servername, $username, $password, $database);
$name = "";
$user_category="";
$roll_number="";
 $school_name="";
    $class="";
    $year_of_enrollment="";
 $gender="";
 
  $mobile_number="";
  $address="";
  $bus_number="";
  $pick_up_point="";
  
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name = $_POST['name'];
    $user_category=$_POST['user_category'];
    $roll_number=$_POST['roll_number'];
     $school_name=$_POST['school_name'];
    $class=$_POST['class'];
  $year_of_enrollment=$_POST['year_of_enrollment'];
 $gender=$_POST['gender'];
 
  $mobile_number=$_POST['mobile_number'];

  $address=$_POST['address'];
  $bus_number=$_POST['bus_number'];
  $pick_up_point=$_POST['pick_up_point'];
 
        do{
            if(empty($name)||empty($class)|| empty($roll_number)|| empty($gender)||empty($school_name)||empty($mobile_number)||empty($year_of_enrollment)||empty($address)||empty($user_category)||empty($bus_number)||empty($pick_up_point))
            {
               $errorMessage="All the fileds are required";
               break;
            }
           
           
         $sql = "INSERT INTO school_register (name,class,roll_number,gender,school_name,mobile_number,address,bus_number,pick_up_point,year_of_enrollment,user_category) VALUES ('$name','$class','$roll_number','$gender','$school_name','$mobile_number','$address','$bus_number','$pick_up_point','$year_of_enrollment','$user_category')";
        
        $result=$connection->query($sql);
        if(!$result)
        {
            $errorMessage="Invalid query:" .$connection->error;
            break;
        }
   
            $sql=("UPDATE school SET  NO_OF_PASSENGERS=NO_OF_PASSENGERS+1  where BUS_NUMBER='$bus_number'");
            $result=$connection->query($sql);
            if (!$result)
            {
                $errorMessage="Invalid query: ".$connection->error;
                break;
            }
       $name = "";
$user_category="";
$roll_number="";
 $school_name="";
    $class="";
    $year_of_enrollment="";
 $gender="";
 $current_year="";
  $mobile_number="";
  $address="";
  $bus_number="";
  $pick_up_point="";
 
$successMessage="Client added correctly";

    header ("location: /transport-project/success.html?");
    exit();


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
    <link rel="stylesheet" href="register.css">
    </head>
    <body>
        <div class="container">  
   
  <div class="text">
    <br>
  <center>  <h1> Registeration Form</h1> </center>
  <hr> 
  <h2>THIMMAPURAM TRANSPORT REGISTRATION</h2>
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
                    <label class="col-sm-3 col-form-label">USER CATEGORY</label>
                 
                    <select class="col-sm-6" name="user_category">
                    <option value="">--select--</option>
                    <option value="student">STUDENT</option>
                    <option value="staff"> STAFF</option>
                    </select>

        </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">CLASS</label>
                    <select class="col-sm-6" name="class">
                    <option value="">--select--</option>
                    <option value="LKG">LKG</option>
                    <option value="UKG">UKG</option>
                    <option value="1ST">1ST</option>
                    <option value="2ND"> 2ND</option>
                    <option value="3RD">3RD</option>
                    <option value="4TH"> 4TH</option>
                    <option value="5TH"> 5TH</option>
                    <option value="6TH"> 6TH</option>
                    <option value="7TH"> 7TH</option>
                    <option value="8TH"> 8TH</option>
                    <option value="9TH"> 9TH</option>
                    <option value="10TH"> 10TH</option>
                    <option value="STAFF"> STAFF</option>
                    </select>
        </div>
        
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">YEAR OF ENROLLMENT</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="year_of_enrollment" value="<?php echo $year_of_enrollment;?>">
             </div>
        </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">ROLL NUMBER/EMPLOYEE ID</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="roll_number" value="<?php echo $roll_number;?>">
             </div>
        </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">GENDER</label>
                    <select class="col-sm-6" name="gender">
                    <option value="">--select--</option>
                    <option value="male">MALE</option>
                    <option value="female"> FEMALE</option>
                    </select>
        </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">SCHOOL NAME</label>
                   <select id="collegeDropdown" onchange="updateBusDropdown()"class="col-sm-6" name="school_name">
                    <option value="">--select--</option>
                    <option value="WORLD ONE SCHOOL">VIGNAN'S WORLD ONE SCHOOL</option>
                    
                    </select>
                   


        </div>
    
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">MOBILE NUMBER</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="mobile_number" value="<?php echo $mobile_number;?>">
             </div>
        </div>
        
        
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">ADDRESS </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
             </div>
        </div>
       
              <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">BUS NUMBER</label>
                   <select id="busDropdown" class="col-sm-6" name="bus_number">
                      <option>--select--</option>
</select>
                    <script>
  function updateBusDropdown() {
  const collegeDropdown = document.getElementById("collegeDropdown");
  const busDropdown = document.getElementById("busDropdown");

  // Get the selected college
  const selectedCollege = collegeDropdown.value;

  // Clear the bus dropdown
  busDropdown.innerHTML = "";

  // Populate the bus dropdown based on the selected college
  switch (selectedCollege) {
    case "WORLD ONE SCHOOL":
      busDropdown.options.add(new Option("AP31 TP 4980  -  BEACH ROAD", "AP31-TP-4980"));
      busDropdown.options.add(new Option("AP31 TE 3993 -  AKKAYYAPALEM", "AP31-TE-3993"));
      busDropdown.options.add(new Option("AP31 TE 3992  - ARILOVA", "AP31-TE-3992"));
      busDropdown.options.add(new Option("AP31 TP 4914 -  P M PALEM", "AP31-TP-4914"));
      busDropdown.options.add(new Option("AP31 TE 3998  -  YENDADA", "AP31-TE-3998"));
      busDropdown.options.add(new Option("AP31 TP 4982  - MADHURAWADA", "AP31-TP-4982"));
      busDropdown.options.add(new Option("AP02 TB 8023  - KOMMADI", "AP02-TB-8023"));
      busDropdown.options.add(new Option("AP31 TP 4978  - BHEEMILI", "AP31-TP-4978"));
      busDropdown.options.add(new Option("AP31 TP 4976  - ANANDAPURAM", "AP31-TP-4976"));
      busDropdown.options.add(new Option("AP31 TP 4981  - CAR SHED", "AP31-TP-4981"));
      busDropdown.options.add(new Option(" AP31 TE 0906  - KRISHNA RAJU PETA", " AP31-TE-0906"));
      busDropdown.options.add(new Option("AP31 TH 8104  - 4th TOWN POLICE STATION", "AP31-TH-8104"));
      busDropdown.options.add(new Option("AP31 TP 4983 -  TAGARAPUVALASA", "AP31-TP-4983"));
      busDropdown.options.add(new Option("AP31 TD 6141  -P M PALEM 2", "AP31-TD-6141"));
      busDropdown.options.add(new Option("AP05 TG 4545  -P M PALEM 3", "AP05-TG-4545"));
      break;
    
  }
}

</script>
                    
                   
        </div>
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">PICK UP POINT</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="pick_up_point" value="<?php echo $pick_up_point;?>">
             </div>

        </div>
            
             <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid" style="float:left;">
                <button type="submit" class="btn btn-primary" >Submit</button>
</div>

<div class="col-sm-3 d-grid">
    <a class="btn btn-outline-primary" href="" role="button">Cancel</a>
</div>
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
        
</form>
</div>
</body>
</html>