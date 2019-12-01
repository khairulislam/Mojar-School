<?php
$dbc = mysqli_connect("localhost","root","123","tanim") 
			or die("Couldn't connect to server".mysqli_connect_error());

	if(isset($_GET['user']))$user=$_GET['user'];
	else $user="";

	$fullname="";
	$address="";
	$age="";
	$pic="";
	$birthday="";

	if(!empty($user)){

		$query="select * from userdata where username='$user'";
		$result = mysqli_query($dbc,$query)or die("Error querying".mysqli_error($dbc));
		if($result && $array = mysqli_fetch_array($result)){
			$fullname=$array['fullname'];
			$address=$array['address'];
			$age=$array['age'];
			$pic=$array['pic'];
			$birthday=$array['birthday'];
		}
		else "No result from userData";
	}

?>


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
?>

<div class="container-fluid bg-3 text-center">    
  <span><h1>My profile</h1></span>
  <div class="row">
    <div class="col-sm-5 text-left" style="margin-left:30px">
      <h3>Personal info</h3>

      <label>Profile pic :</label></br>
      <?php 
      	if(!empty($pic))echo '<img style="width:30%" src="myDir/',$user,$pic,'"/><br>'
      	?>

      <label>Full Name :  <?php if(!empty($user))echo $fullname; ?></label></br>
      <label>Address :  <?php if(!empty($user))echo $address; ?></label></br>
      <label>Age :  <?php if(!empty($user))echo $age; ?></label></br>
      <label>Birthday :  <?php if(!empty($user))echo $birthday; ?></label></br>

      <form method="post" action="editProfile.php">
      <input type="hidden" name="user" value="<?php echo $user;?>"/>
      <input type="submit" style="font-size:16px;" name="edit" value="Edit profile">
      </form>

    </div>
    <div class="col-sm-5 text-left" style="margin-left: 30px"> 
    <h3>My performane records </h3>

      <?php
      	if(!empty($user)){
      		$query = "select * from record where username='$user' order by date desc";
      		$result = mysqli_query($dbc,$query)or die("Error querying".mysqli_error($dbc));

      		if($result){
      			$i=1;
      			while($array = mysqli_fetch_array($result)){
      				$pid=$array['pId'];

      				$query2= "select * from subtoprob where problem_id='$pid'";
      				$result2 = mysqli_query($dbc,$query2)or die("Error querying".mysqli_error($dbc));

      				if($result2 && $array2=mysqli_fetch_array($result2)){
      					echo $i," .</br>Problem : ",$array2['problem_title'],'</br>';
      					echo "Scored : ",$array['score'],"  On ",$array['date'],'<br>';
      				}
      				else echo "Corresponding problem not found";
      				
      				$i=$i+1;
      			}
      		}
      		else echo "No data to show";

      	}
      	else echo "Not logged in";
      	
      ?>
    </div>
  </div>
</div><br>
</body>