<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mojar School</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body style="background-color:#aab7ad">
<?php
	require_once('navBar.php');

	$dbc = mysqli_connect("localhost","root","123","tanim") 
			or die("Couldn't connect to server".mysqli_connect_error());

	$fullname="";
	$address="";
	$age="";
	$birthday="";
	$pic="";

	if(isset($_POST['submitPic'])){
		$user = $_POST['user'];
		$pic = $_POST['pic'];
		unlink('../myDir/'.$user.$pic);

		$query="update userdata set pic='' where username='$user'";
		$result = mysqli_query($dbc,$query)or die("Error querying".mysqli_error($dbc));
		if($result)header("Location: profile.php?user=".$user);

	}
	else if(isset($_POST['submitData'])){
		$user=$_POST['user'];
		$fullname=$_POST['fullname'];
		$age=$_POST['age'];
		$address=$_POST['address'];
		$birthday=$_POST['birthday'];
		$pic=$_FILES['pic']['name'];
		if(!empty($pic)){

			$dir = 'myDir';
			 // create new directory with 744 permissions if it does not exist yet
			 // owner will be the user/group the PHP script is run under
			 if ( !file_exists($dir)) {
			     $oldmask = umask(0);  // helpful when used in linux server  
			     mkdir ($dir, 0744);
			 }

			move_uploaded_file($_FILES['pic']['tmp_name'],$dir.'/'.$user.$pic);
			$query = "update userdata set fullname='$fullname',birthday='$birthday',address='$address',age='$age',pic='$pic' where username='$user'";
		}
		else $query="update userdata set fullname='$fullname',birthday='$birthday',address='$address',age='$age' where username='$user'";
		
		$result = mysqli_query($dbc,$query)or die("Error querying".mysqli_error($dbc));
		if($result)header("Location: profile.php?user=".$user);
	}

	else if(isset($_POST['user'])){
		$user=$_POST['user'];
		$query="select * from userdata where username='$user'";
		$result = mysqli_query($dbc,$query)or die("Error querying".mysqli_error($dbc));
		if($array = mysqli_fetch_array($result)){
			$fullname=$array['fullname'];
			$address=$array['address'];
			$age=$array['age'];
			$birthday=$array['birthday'];
			$pic=$array['pic'];
		}
	}
	else $user="";

	

?>

<div class="container-fluid bg-3 text-center">    
  <h3>Edit profile</h3><br>
  <div class="row">
  	<div class="col-sm-2 text-left" >
  	</div>

    <div class="col-sm-8 text-center">

      <?php ?>

      <form method="post" action="editProfile.php">
      	<input type="hidden" name="user" value="<?php echo $user;?>"/>
      	<input type="hidden" name="pic" value="<?php echo $pic;?>">
      	<input type="submit" name="submitPic" style="font-size:16px;" value="Delete profile picture">
      </form>
      <br>

      <form enctype="multipart/form-data" method="post" action="editProfile.php">
      <?php 
      	if(!empty($pic))echo '<img style="width:30%" src="myDir/',$user,$pic,'"/><br>'
      	?>
      	<label><input type="file" id="pic" name="pic"></label><br>

      <label>Full Name : </label> </br>
      	<span><input type="text" name="fullname" style="padding-left: 5px" value="<?php echo $fullname; ?>"></span></br>
      <label>Address :   </label></br> 
      	<span><input type="text" name="address" style="padding-left: 5px" value="<?php echo $address; ?>"></span></br>
      <label>Age : </label><br> 
      	<span><input type="text" name="age" style="padding-left: 5px" value="<?php echo $age; ?>"></span></br>
      <label>Birthday :  </label><br>
      	<span><input type="text" name="birthday" style="padding-left: 5px" value="<?php echo $birthday; ?>"></span></br></br>

      <input type="hidden" name="user" value="<?php echo $user;?>"/>
      <input type="submit" style="font-size:16px;" name="submitData" value="Submit profile">
      </form>

    </div>
    <div class="col-sm-2 text-left"> 
    
    </div>
  </div>
</div><br>
</body>