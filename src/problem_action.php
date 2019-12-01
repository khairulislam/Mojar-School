<?php
session_start();

if(isset($_POST['problem_submit'])){
	
	if(!isset($_POST['option'])){
		echo "Please select one of the options";
		header('Location: problem.php');
	}
	else {
		$option= $_POST['option'];
		$ans= $_POST['ans'];
		
		if($option==$ans)echo "Right answer.";
		else echo "Sorry , Wrong answer !! The correct answer is : ",$ans;
	}
}

?>