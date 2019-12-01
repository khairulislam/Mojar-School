<?php
	if(isset($_GET['rCatagory']))$rCatagory = $_GET['rCatagory'];
	else $rCatagory='1';
	
	if(isset($_GET['rId']))$rId = $_GET['rId'];
	else $rId='0';
	
	if(isset($_GET['serial']))$serial = $_GET['serial'];
	else $serial='1';
	
	if(isset($_GET['user']))$user = $_GET['user'];
	else $user='';
	
	$dbc = mysqli_connect("localhost","root","123","tanim") 
			or die("Couldn't connect to server".mysqli_connect_error());
	mysqli_query($dbc,'SET CHARACTER SET utf8');
	
	$query1 ="select * from resource where rCatagory='$rCatagory'";
	$query2 = "select * from resourceId where rCatagory='$rCatagory'";
?>

<!doctype html>
<html lang="en">
<head>
  <title>Mojar School</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  
  <style>
  .imgcont {
		height: 20vw;
		padding: 1px;
	}
  </style>
</head>

<body style="background-color:#aab7ad">

<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-2">
		<div class="row-sm-6">
			<?php
			$result = mysqli_query($dbc,$query1)or die("Error querying".mysqli_error($dbc));
			if($result && mysqli_num_rows($result)){
				$array = mysqli_fetch_array($result);
				
				echo '<a href="resource.php?rCatagory=',$rCatagory, '& user=',$user,'">';
				echo '<h2>'.$array['rCatagoryName'].'</h2>';
				echo '</a>';
				
				$result = mysqli_query($dbc,$query2)or die("Error querying".mysqli_error($dbc));
				while($array = mysqli_fetch_array($result)){
					echo '<a href="resource.php? rCatagory=',$rCatagory,'&rId=',$array['rId'],'&user=',$user,'">';
					echo '<h4>',$array['rTitle'],'</h4></a></br>';
				}
			}
			?>
		</div>
		<div class="row-sm-6">
			<a href="home.php?user= <?php echo $user;?>"><h3>Home</h3></a></br>
		</div>
    </div>
    <div class="col-sm-10">
		<?php
		
		if($rId!=0){
			$query3 = "select * from resourceData where rId='$rId' and serial='$serial'";
			$result = mysqli_query($dbc,$query3)or die("Error querying".mysqli_error($dbc));
			
			if($result && mysqli_num_rows($result)){
				$array = mysqli_fetch_array($result);
				
				?>
				<div class="row-sm-2">
				<?php echo '<h3 accept-chartset="utf-8">',$array['data'],'</h3>'; ?>
				</div>
				
				<div class="row-sm-10">
				<?php 
					echo '<img style="width:75%;" src="images/',$array['img'],'"></img></br>';
					if($serial!='4')echo '<a href="resource.php?rCatagory=',$rCatagory,'&rId=',$rId,'&serial=',$serial+1,'&user=',$user,'"><h3>Next</h3></a>';
					else echo '<h3>Ended</h3>';
				?>
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="70"aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($serial*25)."%"; ?>">
						<?php echo ($serial*25)."%"; ?>
						</div>
					</div>
				</div>
				
				<?php
			}
		}
		else {
			$query4 = "select * from resourceId where rCatagory='$rCatagory'";
			$result = mysqli_query($dbc,$query4)or die("Error querying".mysqli_error($dbc));

			if($result && mysqli_num_rows($result)){
				while($array = mysqli_fetch_array($result)){
					
					echo '<div class="col-sm-5">';
					echo '<a href="resource.php?rId=',$array['rId'],' &serial=1 & user=',$user,'">';
					echo '<h3>',$array['rTitle'],'</h3></br>';
					echo '<img class="imgcont" src="images/',$array['rTitle'],'.jpg"></img></br>';
					echo '</a>';
					echo '</div>';
					
					if($array = mysqli_fetch_array($result)){
						echo '<div class="col-sm-5">';
						echo '<a href="resource.php?rId=',$array['rId'],' &serial=1 & user=',$user,'">';
						echo '<h3>',$array['rTitle'],'</h3></br>';
						echo '<img class="imgcont" src="images/',$array['rTitle'],'.jpg"></img></br>';
						echo '</a>';
						echo '</div>';
					}
				}
			}
		}
		?>
    </div>
  </div>
</div><br>

</body>

</html>