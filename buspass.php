<!DOCTYPE html>
<html>
<head>
  <title>Student Bus Pass Template</title>
  <style>
    #bus-pass-container {
      display: flex;
      
     
      flex-direction: column;
     padding: 10px;
      width: 400px;
      margin: 0 auto;
     
      border: 1px solid black;
      border-radius: 10px;
      background-color:skyblue;
  color: #333;
    }
    
    #college-logo {
      width: 100%;
      height: 100%;
    }
    
    #bus-pass {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  flex-direction: row;
  
  padding: 10px;
  
  border-radius: 10px;
}
.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
}

h1 {
  text-align: center;
  margin-bottom: 20px;
}
label {
  display: inline-block;
  width: 100px; /* adjust the width as per your needs */
  text-align: right;
  margin-right: 10px;
}


input[type="text"], select {
  margin-bottom: 20px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}
@media print {
  body * {
    visibility: hidden;
  }
  #bus-pass-container, #bus-pass-container * {
    visibility: visible;
  }
  #bus-pass-container {
    position: absolute;
    left: 100px;
    top: 100px;
  }
}

button {
  padding: 10px 20px;
  border-radius: 5px;
  background-color: #007bff;
  color: #fff;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

button:hover {
  background-color: #0069d9;
}
form {
  display: flex;
  flex-direction: column;
}


#bus-pass img {
  max-width: 100px;
  max-height: 100px;
  margin-right: 30px;
  margin-top: -10px;
  margin-bottom: auto;
  margin-left: 50px;
}
  </style>
  <script>
   function reflectDetails() {

  const image = document.getElementById("image").files[0];
  const pass = document.getElementById("bus-pass");

  // Set the student details on the bus pass
  
  // Add the student's image to the bus pass
  const reader = new FileReader();
  reader.onload = function(e) {
    pass.innerHTML += "<img src='" + e.target.result + "'>";
  }
  reader.readAsDataURL(image);
}

function validateForm() {
  

  // if all validations pass, reflect the details and clear error message
  reflectDetails();
  errorMessage.textContent = '';
}


  </script>
</head>
<body>
  <form>
    <br>
   <div class="container">
    <h1>Bus Pass</h1>

   
    <label for="image">Image:</label>
    <input type="file" id="image" accept="image/*" required><br><br>
    <button type="button" onclick="validateForm()">Generate Bus Pass</button>
  </div>
  </form>
  <div id="error-message"></div>
  <br>
  <div id="bus-pass-container">

    <img id="college-logo" src="image\viewlogo.jpeg" alt="College Logo">
    <div class="text">
      <br>
    <lable>Valid till: </lable>
   <br>
    <div id="bus-pass" style="float:right;"></div>
    <br>
    
    <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $database = "transport-project";
 
   $connection = new mysqli($servername, $username, $password, $database);
   if ($_SERVER['REQUEST_METHOD']=='GET')
{
  $roll_number= $_GET["roll_number"];
 
   $sql="SELECT * From student where roll_number='$roll_number'";
  
  $row= $connection->query($sql)->fetch_assoc();
        echo "
        <tr>
    Name          :$row[name]<br>
    Roll No    :$row[roll_number]<br>
   
    Bus No           :$row[bus_number]<br>
    Boarding At:$row[pick_up_point]<br>
    
    </tr>
        ";
    
    }
     ?>
     <br>
     <lable>PRINCIPAL</lable>
    </div>

  
  </div>
 <button onclick="printBusPass()">Print Bus Pass</button>
  
  <script>
    function printBusPass() {
      window.print(); // Trigger the printing dialog box
    }
  </script>
  
</body>
</html>