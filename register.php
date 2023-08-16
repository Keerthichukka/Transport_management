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
 $college_name="";
    $branch="";
    $year_of_enrollment="";
 $gender="";
 $current_year="";
 
  $bus_number="";
  $pick_up_point="";
  
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name = $_POST['name'];
    $user_category=$_POST['user_category'];
    $roll_number=$_POST['roll_number'];
     $college_name=$_POST['college_name'];
    $branch=$_POST['branch'];
  $year_of_enrollment=$_POST['year_of_enrollment'];
 $gender=$_POST['gender'];
 $current_year=$_POST['current_year'];
  

 
  $bus_number=$_POST['bus_number'];
  $pick_up_point=$_POST['pick_up_point'];
 
        do{
            if(empty($name)||empty($branch)|| empty($roll_number)|| empty($gender)||empty($college_name)||empty($year_of_enrollment)||empty($user_category)||empty($bus_number)||empty($pick_up_point))
            {
               $errorMessage="All the fileds are required";
               break;
            }
           
           
         
         if ($user_category == "student") 
         {
             $sql = "INSERT INTO student (name,branch,roll_number,gender,current_year,college_name,bus_number,pick_up_point,year_of_enrollment) VALUES ('$name','$branch','$roll_number','$gender','$current_year','$college_name','$bus_number','$pick_up_point','$year_of_enrollment')";
 
           }
        else if($user_category== "staff") 
           {
             $sql = "INSERT INTO staff (name,branch,roll_number,gender,current_year,college_name,bus_number,pick_up_point,year_of_enrollment) VALUES ('$name','$branch','$roll_number','$gender','$current_year','$college_name','$bus_number','$pick_up_point','$year_of_enrollment')";
 
           }
        $result=$connection->query($sql);
        if(!$result)
        {
            $errorMessage="Invalid query:" .$connection->error;
            break;
        }
   
            $sql=("UPDATE view SET  NO_OF_PASSENGERS=NO_OF_PASSENGERS+1  where BUS_NUMBER='$bus_number'");
            $result=$connection->query($sql);
            if (!$result)
            {
                $errorMessage="Invalid query: ".$connection->error;
                break;
            }
       $name = "";
$user_category="";
$roll_number="";
 $college_name="";
    $branch="";
    $year_of_enrollment="";
 $gender="";
 $current_year="";

  $bus_number="";
  $pick_up_point="";
 
$successMessage="Client added correctly";
if($_POST['user_category'] == 'staff') {
    header ("location: /transport-project/success.html?");
    exit();
} else {
    $roll_number=$_POST['roll_number'];
    header("location: /transport-project/buspass.php?roll_number=$roll_number");
    exit;
}

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
                    <label class="col-sm-3 col-form-label">USER CATEGORY</label>
                 
                    <select class="col-sm-6" name="user_category">
                    <option value="">--select--</option>
                    <option value="student">STUDENT</option>
                    <option value="staff"> STAFF</option>
                    </select>

        </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">BRANCH</label>
                    <select class="col-sm-6" name="branch">
                    <option value="">--select--</option>
                    <option value="CSE">CSE</option>
                    <option value="IT"> IT</option>
                    <option value="ECE"> ECE</option>
                    <option value="EEE"> EEE</option>
                    <option value="MECH"> MECH</option>
                    <option value="MBA"> MBA</option>
                    <option value="BS&H"> BS & H</option>
                    <option value="OTHERS"> OTHERS</option>
                    </select>
        </div>
         <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">CURRENT YEAR</label>
                    <select class="col-sm-6" name="current_year">
                    <option value="">--select--</option>
                    <option value="1 ST YEAR">1 ST YEAR</option>
                    <option value="2 ND YEAR"> 2 ND YEAR</option>
                    <option value="3 RD YEAR"> 3 RD YEAR</option>
                    <option value="4 TH YEAR"> 4 TH YEAR</option>
                    <option value="NOT APPILICABLE"> NOT APPILICABLE</option>
                    </select>
        </div> 
        <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">YEAR OF ENROLLMENT</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="year_of_enrollment" value="<?php echo $year_of_enrollment;?>">
             </div>
        </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">ROLL NUMBER / EMPLOYEE ID</label>
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
                    <label class="col-sm-3 col-form-label">COLLEGE NAME</label>
                   <select id="collegeDropdown" onchange="updateBusDropdown()"class="col-sm-6" name="college_name">
                    <option value="">--select--</option>
                    <option value="VIEW">VIGNAN'S INSTITUTE OF ENGINEERING FOR WOMEN</option>
                    <option value="VIIT">VIGNAN'S INSTITUTE OF INFORMATION TECHNOLOGY</option>
                    <option value="VIPT">VIGNAN'S INSTITUTE OF PHARAMACEUTICAL TECHNOLOGY</option>
                    
                    </select>
                   


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
    case "VIEW":
      busDropdown.options.add(new Option("AP31-TH-4019  -  CAR SHED, HANUMATNHUWAKA, ISUKATHOTA, MADDILAPALEM, GURUDWARA", "AP31-TH-4019"));
      busDropdown.options.add(new Option("AP31-TD-6636 -  RAMALAKSHMI APARTMENT, USHODAYA, M.V.P, 4TH TOWN, THATICHETLAPALEM, KANCHARRAPALEM, URVASI", "AP31-TD-6636"));
      busDropdown.options.add(new Option("AP31-TH-4015  -  SATYAM JUNCTION, SEETHMMADHARA, 5TH TOWN, BIRLA JUNCTION", "AP31-TH-4015"));
      busDropdown.options.add(new Option("AP31-TU-9613 -  AKKAYAPALEM, AKKAYAPALEM HIGHWAY, PORT HOSPITAL, PUNJAB HOTEL, R&B,NSTL", "AP31-TU-9613"));
      busDropdown.options.add(new Option("AP31-TU-9614  -  JAGADHAMBA, R.T.C COMPLEX, LIC BUILDING, DONDAPARTHI", "AP31-TU-9614"));
      busDropdown.options.add(new Option("AP05-TD-2880  -  PENDURTHI, PENDURTHI COLLEGE, PENDURTHI GOVT HOSPITAL, VEPAGUNTA", "AP05-TD-2880"));
      busDropdown.options.add(new Option("AP31-TD-7093  -  CHINNAMUSHIDIWADA, SUJATHA NAGAR, KRISHNARAI OURAM, PURSHOTA PURAM", "AP31-TD-7093"));
      busDropdown.options.add(new Option("AP31-TH-4018  -  NAIDUTHOTA, BAJI JUNCTION, NAD, KAKANI NAGAR", "AP31-TH-4018"));
      busDropdown.options.add(new Option("AP39-U-0287  -  APPANA PALEM, GOSHALA, PRAHALADHAPURAM, GOPALAPATNAM", "AP39-U-0287"));
      busDropdown.options.add(new Option("AP31-TE-3995  -  SCINDYA, MALKAPURAM, SRIHARIPURAM, CORAMANDALGATE, GAJUWAKA DEPO, ZINK GATE", "AP31-TE-3995"));
      busDropdown.options.add(new Option("AP31-TD-6635  -  B.C ROAD, CHINNA NADIPUR, PEDAGANTYADA, KANYA SREE KANYA, NEW KAJUWAKA, CDR", "AP31-TD-6635"));
      busDropdown.options.add(new Option("AP31-TU-4905  -  OLD GAJUWADA, PANTHULUGARI MEDA, AUTO NAGAR, BHPV, NATYAPALEM, SHELLA NAGAR", "AP31-TU-4905"));
      busDropdown.options.add(new Option("AP31-TE-3994 -  R.K HOSPITAL, GAJUWAKA POLICE STATION, SRINAGAR", "AP31-TE-3994"));
      busDropdown.options.add(new Option("AP31-TD-6634  -  ANAKAPALLI, 4ROAD JUNCTION, SIRASAPALLI, AGANAM PUDI, KOTTURU, LANKELAPALEM", "AP31-TD-6634"));
      busDropdown.options.add(new Option("AP31-TE-3996  -  NTPC, PARAWADA, DESIPATRIPALEM, SECTOR 1-10, GENRAL HOSPITAL, KURMANAPALEM", "AP31-TE-3996"));
      break;
    case "VIIT":
      busDropdown.options.add(new Option("Bus 3", "bus3"));
      busDropdown.options.add(new Option("Bus 4", "bus4"));
      break;
    case "VIPT":
      busDropdown.options.add(new Option("Bus 5", "bus5"));
      busDropdown.options.add(new Option("Bus 6", "bus6"));
      break;
    default:
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