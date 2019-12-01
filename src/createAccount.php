<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mojar School</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <style>
.error {color: #FF0000;}
</style>
</head>
<body style="background-color:#B2BEB5">

<?php
// define variables and set to empty values
$idErr = $pwdErr = $emailErr = $extraErr="";
$id =$email=$pwd= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["createId"])) {
    $idErr = "Id is required";
  } else {
    $id = test_input($_POST["createId"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]*$/",$id)) {
      $idErr = "Only letters and white space allowed"; 
    }
  }
  
  if(empty($_POST["createPwd"])){
	  $pwdErr = "Password is required";
  }
  else $pwd = $_POST["createPwd"];
  
  if (empty($_POST["createEmail"])) {
    $emailErr = "Email is optional";
  } else {
    $email = test_input($_POST["createEmail"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  
	if(empty($idErr) && empty($pwdErr)){
		$dbc = mysqli_connect("localhost","root","123","tanim") or die("Error connecting ".mysqli_connect_error());
		$query = "select * from login where username='$id'"; 
		$result = mysqli_query($dbc,$query) or die("Error querying".mysqli_error($dbc));
		$row = mysqli_fetch_array($result);
		if($row){
			$idErr = "Id already registered"; 
		
		}
		else {
			$query = "Insert into login values('$id','$pwd','$email')";
			$result = mysqli_query($dbc,$query) or die("Can't query".mysqli_error($dbc));
			if($result){
				$_SESSION['username']=$id;
				$_SESSION['msg']="Logged in as ".$id;
				header('Location: home.php');
			}
		}
		mysqli_close($dbc);
  }
    
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="container-fluid" style="padding:40px;">
	<div class="row">
		<div class="col-lg-4">
		</div>
		<div class="col-lg-4" style="padding:20px;background-color:white">
			<h2>Create An Account</h2>
			<p><span class="error">* required field.</span></p>
			
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
				 <label>ID:</label>
				 <input type="text" name="createId" value="<?php echo $id;?>" class="form-control">
				 <span class="error">* <?php echo $idErr;?></span>
				 <br><br>
				 
				 <label>Password:</label>
				 <input type="text" name="createPwd" value="<?php echo $pwd;?>" class="form-control">
				 <span class="error">* <?php echo $pwdErr;?></span>
				 <br><br>
				 
				 <label>E-mail:</label>
				 <input type="text" name="createEmail" value="<?php echo $email;?>" class="form-control">
				 <span class="error"><?php echo $emailErr;?></span>
				 <br><br>
				 
				 </pre>
				 <input type="submit" name="submit" value="Submit">  
			</form>
			<span><a href="home.php">Go back to home</a></span>
		</div>
		<div class="col-lg-4">
		</div>
	</div>
</div>

</body>
</html>