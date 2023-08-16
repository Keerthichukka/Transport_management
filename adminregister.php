

 <?php
session_start();
include("connection.php");
?>

<html>
<head>
<title>ADMIN REGISTRATION FORM</title>
</head>
<body>
<table border="2" align="center">
<form method="POST" action="">
<!-- we will create registration.php after registration.html -->
<center><h3>REGISTRATION</h3></center>
<tr>
	<form method="post" action="adminregister.php">
<th>ADMIN USERNAME:</th>
<td><input type="text" name="name" value=""></br></td>
</tr>
<th>PASSWORD</th>
<td><input type="text" name="password" ></br></td>


<tr>
<th><input type="submit" name="submit" value="submit"></th>
<td><a href="login.php">click here for login</a></td>
</tr>

</form>
</tr>
</table> 


</body>
</html>
<?php
/*if(isset($_POST['submit']))
{
	$user= $_POST['name'];
	$pwd= $_POST['password'];
	$query="INSERT INTO login VALUES('$user','$pwd')"; 
	
	$data = mysqli_query($conn , $query);
	
}*/
$errors = array(); 

// connect to the database

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $user = mysqli_real_escape_string($conn, $_POST['name']);
  
  $pwd = mysqli_real_escape_string($conn, $_POST['password']);
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($user)) { array_push($errors, "Username is required"); }
  if (empty($pwd)) { array_push($errors, "Password is required"); }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM login WHERE user='$user' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user1 = mysqli_fetch_assoc($result);
  
  if ($user1) { // if user exists
    if ($user1['user'] === $user) {
      array_push($errors, "Username already exists");
      echo "<script type='text/javascript'>alert('Username already exists')</script>";
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$pwd = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO login (user, pwd) 
  			  VALUES('$user', '$pwd')";
  	mysqli_query($conn, $query);
  	$_SESSION['name'] = $user;
  	$_SESSION['success'] = "You are now logged in";
  	
  }
}
?>