<?php
session_start();
include("connection.php");
?>


<html>
<head>
<title>
LOGIN PAGE
</title>
</head>
<style type="text/css">
   button {
  background-color :#4CAF50;
  color: white;
  padding: 10px 20px;
  margin: 20px 0;
  border: none;
  cursor: pointer;
  width: 10%;
   }
.cancel{
        background-color:red;
        width:15%;
        }
.login{
	     background-color:green;
        width:10%;
        height: 5%;
        color: white;
        font-size: 20px;
}
body{    
                
    margin-top: 1%;    
    margin-bottom: 1%;    
    margin-right: 160px;    
    margin-left: 90px;    
    background-color: skyblue;    
    color: navy;    
    font-family: verdana;    
    font-size: 100%    
        
        } 
        .container 
        {
            padding:50px 50px;
            width:60%;
            margin:auto;
            background-color:whitesmoke;
        }

</style>
<body>
<form action="" method="post">

<marquee><h1>WELCOME TO ADMIN LOGIN PAGE</h1></marquee><center>
<div class="container">
<img src="image\logo2.jpeg"  height="150" width="150">
<h3>Admin login</h3> 
<p>USERNAME</p>
<input type="text" type="text" name="name" value="" required=""><br/><br/>
<p>PASSWORD</p>
<input type="text" name="password" value="" required=""><br/><br/>
<input type="submit" name="submit" class="login" value="Login"><br/>
<br>
<button type="submit" class="cancel">cancel</button>
</center>
    </div>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$user= $_POST['name'];
	$pwd= $_POST['password'];

	$query="SELECT * FROM login WHERE user='$user' && pwd='$pwd'";
	
	$data = mysqli_query($conn , $query);
	$total = mysqli_num_rows($data);
	if($total==1)
	{
		$_SESSION['user_name']=$user;
		header('location:duvvada.html');
	}
	else
	{
		echo "<script type='text/javascript'>alert('Incorrect username and password')</script>";
	}
}
?>