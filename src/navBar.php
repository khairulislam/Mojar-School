<nav class="navbar navbar-inverse">
  <div class="container-fluid"> 
      <ul class="nav navbar-nav">
		<?php
			if(isset($_POST['user'])) $user = $_POST['user'];
			else if(isset($_GET['user'])) $user = $_GET['user'];
			else $user = "";
			
			if(isset($_POST['msg'])) $msg = $_POST['msg'];
			else if(isset($_GET['msg'])) $msg = $_GET['msg'];
			else $msg ="";
		?>
	  
        <li class="active"><a href="home.php?user=<?php echo $user;?>">Home</a></li>
        <li><a href="catagory.php?user=<?php echo $user;?>&amp;catagory=science">Science</a></li>
        <li><a href="catagory.php?user=<?php echo $user;?>&amp;catagory=math">Math</a></li>
        <li><a href="catagory.php?user=<?php echo $user;?>&amp;catagory=arts">Arts</a></li>
		<li><a href="catagory.php?user=<?php echo $user;?>&amp;catagory=social_studies">Social Studies</a></li>
		<li><a href="profile.php?user=<?php echo $user;?>">Profile</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<?php
		
		if($user==""){
		?>
		<li>	  
		<form class="form-inline" method="post" action="login.php" style="margin:8px;">
			<label style="color:white"><?php echo $msg; ?></label>
			<div class="form-group">
				<label for="id" style="color:white;">ID:</label>
				<input type="id" class="form-control" name="id" id="id">
			</div>
			<div class="form-group">
				<label for="pwd" style="color:white">Password:</label>
				<input type="password" class="form-control" name="pwd" id="pwd">
			</div>
			<button type="submit" class="btn btn-default">Login</button>
			<a href="createAccount.php">Create Account</a>
		</form>
		</li>
		<?php
			$msg="";
			}
			else{//code for logout
		?>
		<li>
		<a style="color:white"><?php echo $user;?></a>
		</li>
		<li>
		<a href="logout.php">Logout</a>
		</li>
		<?php
			}
		?>
      </ul>
  </div>
</nav>

