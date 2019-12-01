<?php

if(!isset($_GET['catagory']))$catagory='math';
else {
	$catagory = $_GET['catagory'];
}
if(isset($_GET['user']))$user=$_GET['user'];
else $user="";

$dbc = mysqli_connect("localhost","root","123","tanim") 
			or die("Couldn't connect to server".mysqli_connect_error());
$query  = "select leveltable.sub_catagory_id,problem_id,problem_title ". 
		"from leveltable join subtoprob where catagory='$catagory' and ".
		"leveltable.sub_catagory_id=subtoprob.sub_catagory_id";
		
function decorate($dbc,$query,$level,$catagory,$user){
	$result = mysqli_query($dbc,$query." and level='$level'")or die("Error querying".mysqli_error($dbc));
	while($array = mysqli_fetch_array($result)){
		echo '<form method="post" action="problem.php">',
			'<input type="hidden" name="catagory" value="',$catagory,'"/>',
			'<input type="hidden" name="sub_catagory_id" value="',$array['sub_catagory_id'],'"/>',
			'<input type="hidden" name="problem_id" value="',$array['problem_id'],'"/>',
			'<input type="hidden" name="user" value="',$user,'"/>',
			'<input type="submit" name="submit" style="font-size:16px;border:none;background:none;" value="',$array['problem_title'],'"/>',
			'</form>';
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mojar School</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  
  <style>
  .col-sm-3{
	background-color:#aab7ad;
	padding:20px;
	margin:40px;  
  };
  </style>
</head>
<body>
<?php

require_once('navBar.php');
echo '<h1>',$catagory,'</h1>';
?>

<div class="container-fluid bg-3">    
  <div class="row">
    <div class="col-sm-3">
	<h2>
	Level One
	</h2>
	<?php
	decorate($dbc,$query,"1",$catagory,$user);
	?>
	
	
    </div>
    <div class="col-sm-3"> 
	  <h2>
	  Level Two
	  </h2>
	  <?php
		decorate($dbc,$query,"2",$catagory,$user);
		?>
    </div>
    <div class="col-sm-3"> 
      <h2>
	  Level Three
	  </h2>
	  <?php
	  decorate($dbc,$query,"3",$catagory,$user);
	  ?>
    </div>
  </div>
</div><br>
</body>