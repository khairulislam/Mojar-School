<?php 
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$id = test_input($_POST['id']);
$pwd = test_input($_POST['pwd']);
$msg="";
$user="";
if(!empty($id) && !empty($pwd)){
	$dbc = mysqli_connect("localhost","root","123","tanim") 
			or die("Couldn't connect to server".mysqli_connect_error());
	$query = "select * from login where username='$id'"; 
	$result = mysqli_query($dbc,$query) or die("Error querying".mysqli_error($dbc));
						
	if(empty($result))$msg="Id not registered"; 
	else {
		$row = mysqli_fetch_array($result);
		if($row['password']==$pwd){
			$msg="Logged in as ".$id;
			$user = $id;
		}
	}
	mysqli_close($dbc);
}
else $msg="Enter id and Password correctly";

echo $user,' ' ,$msg;
header("Location: home.php?user=".$user."&msg=".$msg);
?>
