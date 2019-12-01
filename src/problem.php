<?php
$catagory = $_POST['catagory'];
$sub_catagory_id= $_POST['sub_catagory_id'];
$problem_id=$_POST['problem_id'];
$user=$_POST['user'];

$no_ans_selected="";

if(isset($_POST['problem_submit'])){
	$ans= $_POST['ans'];
	$sub_problem_id =$_POST['sub_problem_id'];
	
	if(isset($_POST['option']))$option = $_POST['option'];
	else {
		$no_ans_selected="1";
		$sub_problem_id-= 1;
	}
	
	
	$score=$_POST['score'];
}
else {
	$ans= "";
	$option = "";
	$sub_problem_id = 5*($_POST['problem_id']-1)+1;
	$score=0;
}

function decorate($catagory,$sub_catagory_id,$problem_id,$sub_problem_id,$user,$score)
{
	$dbc = mysqli_connect("localhost","root","123","tanim") 
			or die("Couldn't connect to server".mysqli_connect_error());
	$query1="select * from leveltable where sub_catagory_id='$sub_catagory_id'";
	$query2= "select * from probtosubprob join subprob using(sub_problem_id) ".
	"where problem_id='$problem_id' and sub_problem_id='$sub_problem_id'";
	
	$result=mysqli_query($dbc,$query1)or die("Error querying".mysqli_error($dbc));
	$array= mysqli_fetch_array($result);
	echo '<h2>Level :',$array['level'],'>',$array['catagory'],'>',$array['sub_catagory_title'],'</h2>';
	
	$result=mysqli_query($dbc,$query2)or die("Error querying".mysqli_error($dbc));
	$array= mysqli_fetch_array($result);
	echo '<h3>',$array['sub_problem_title'],'</h3>';
	echo '<img style="width:50%" src="images/',$array['question'],'"></img></br>';
	echo '<form method="post" action="problem.php">';
	echo '<input type="radio" size="20" name="option" value="',$array['op1'],'"/> ',$array['op1'],'</br>';
	echo '<input type="radio" name="option" value="',$array['op2'],'"/> ',$array['op2'],'</br>';
	echo '<input type="radio" name="option" value="',$array['op3'],'"/> ',$array['op3'],'</br>';
	echo '<input type="radio" name="option" value="',$array['op4'],'"/> ',$array['op4'],'</br>';
	
	echo '<input type="hidden" name="ans" value="',$array['ans'],'"/></br>';
	
	echo '<input type="hidden" name="catagory" value="',$catagory,'"/>',
			'<input type="hidden" name="sub_catagory_id" value="',$sub_catagory_id,'"/>',
			'<input type="hidden" name="problem_id" value="',$problem_id,'"/>',
			'<input type="hidden" name="sub_problem_id" value="',$sub_problem_id+1,'"/>',
			'<input type="hidden" name="score" value="',$score,'"/>',
			'<input type="hidden" name="user" value="',$user,'"/>';

	echo '<input type="submit" name="problem_submit" style="margin-top:5px;" value="Submit"/>';
	echo '</form>';
}

function lastStep($catagory,$problem_id,$user,$score){
	echo '<a href="catagory.php?catagory=',$catagory,"&user=",$user,'">Return to ',$catagory,' page</a></br>';
	
	$dbc = mysqli_connect("localhost","root","123","tanim") 
			or die("Couldn't connect to server".mysqli_connect_error());

	if(!empty($user)){
		$query="insert into `record` (`username`,`pId`,`date`,`score`) values('$user','$problem_id',CURDATE(),'$score')";
		$result=mysqli_query($dbc,$query)or die("Error querying".mysqli_error($dbc));
		if(!$result)echo "Error updating record";
	}

	$query="select * from subtoprob where problem_id ='$problem_id'";
	$result=mysqli_query($dbc,$query)or die("Error querying".mysqli_error($dbc));
	
	
	if($result && mysqli_num_rows($result)>0){
		$array = mysqli_fetch_array($result);
		
		echo '<form method="post" action="problem.php">',
			'<input type="hidden" name="catagory" value="',$catagory,'"/>',
			'<input type="hidden" name="sub_catagory_id" value="',$array['sub_catagory_id'],'"/>',
			'<input type="hidden" name="problem_id" value="',$problem_id,'"/>',
			'<input type="hidden" name="user" value="',$user,'"/>',
			'<label>Next problem : </label>',
			'<input type="submit" name="next_problem_submit" style="font-size:16px;border:none;background:none;" value="',$array['problem_title'],'"/>',
			'</form>';
	}
	else echo "No more problems";
		
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
  .col-sm-7{
	  font-size:20px;
  }
  </style>
  
</head>
<body>
<?php
require_once('navBar.php');
?>

<div class="container-fluid bg-2">
  <div class="row">
  
    <div class="col-sm-3">
	<?php
	if($no_ans_selected=="1"){
		echo "Please select an ans .</br>";
	}
	else if(!empty($ans)){
		if($ans==$option){
			$score = $score + 1;
			echo "Correct ans . Your score ",$score,'</br>';
			
			if($score<5)echo '<img src="images/right.jpg" style="width:80%"></img>';
			else echo '<img src="images/very_good.jpg" style="width:80%"></img>';
		}
		else {
			echo "Sorry , wrong.The correct answer is ",$ans,'</br>';
			echo '<img src="images/wrong.jpg" style="width:80%"></img>';
		}
	}
	$width = ($sub_problem_id-($problem_id-1)*5 -1) *20;
	?>
		<div class="progress">
			<div class="progress-bar" role="progressbar" aria-valuenow="70"aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $width."%"; ?>">
			<?php echo $width."%"; ?>
			</div>
		</div>
    </div>
	
    <div class="col-sm-7"> 
	  <?php
		if(isset($_POST['catagory'])){
				if($sub_problem_id<=5*$problem_id){
					decorate($catagory,$sub_catagory_id,$problem_id,$sub_problem_id,$user,$score);
				}
				else lastStep($catagory,$problem_id+1,$user,$score);
		}
		else echo "Sorry , no contents selected !",$_POST['ans'];
		?>
    </div>
	
    <div class="col-sm-3"> 
    </div>
	
  </div>
</div><br>
</body>