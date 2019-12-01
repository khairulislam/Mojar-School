<?php
$dbc = mysqli_connect("localhost","root","123","tanim") 
			or die("Couldn't connect to server".mysqli_connect_error());
if(isset($_GET['user']))$user=$_GET['user'];
else $user="";

function decorate($dbc,$level,$catagory,$user){
	$query  = "select leveltable.sub_catagory_id,problem_id,problem_title ". 
		"from leveltable join subtoprob where catagory='$catagory' and ".
		"leveltable.sub_catagory_id=subtoprob.sub_catagory_id";
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
</head>

<body style="background-color:#aab7ad">
<?php
	require_once('navBar.php');
?>

  <div class="container text-center">
    <img src="bangladesh.jpg" class="img-responsive" alt="Bangladesh" style="height:450px;width:100%;"></img>
  </div>
  
<div class="container-fluid bg-3 text-center">    
  <h3>Let's learn with fun...</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <h2>Level One</h2>
	  <?php
	  decorate($dbc,'1','math',$user);
	  ?>
    </div>
    <div class="col-sm-4"> 
      <h2>Level Two</h2>
	  <?php
	  decorate($dbc,'2','math',$user);
	  decorate($dbc,'2','science',$user);
	  ?>
    </div>
    <div class="col-sm-4"> 
      <h2>Level Three</h2>
    </div>
  </div>
</div><br>

<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-6">
		<h3> মহাকাশ ( Space )</h3>
		<a href="resource.php?rCatagory=1 & user=<?php echo $user;?>">
			<img src="images/space.jpg" style="width:90%;border:solid"></img>
		</a>
    </div>
    <div class="col-sm-6"> 
		<h3>সাগর ( Sea )</h3>
		<a href="resource.php?rCatagory=2 & user=<?php echo $user;?>">
			<img src="images/sea.jpg" style="width:90%;border:solid"></img>
		</a>
    </div>
  </div>
</div><br>

<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-6">
		<h3>প্রানী ( Animals )</h3>
		<a href="resource.php?rCatagory=3 & user=<?php echo $user;?>">
			<img src="images/animals.jpg" style="width:90%;border:solid"></img>
		</a>
    </div>
    <div class="col-sm-6"> 
		<h3>পাখি ( Birds )</h3>
		<a href="resource.php?rCatagory=4 & user=<?php echo $user;?>">
			<img src="images/birds.jpg" style="width:90%;border:solid"></img>
		</a>
    </div>
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p>Made by Tanim</p>
</footer>
</body>

</html>