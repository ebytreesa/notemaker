<?php
if (isset($_POST['submit']))
{
	include('dbcon.php');
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query = "INSERT INTO students (username, email, password) VALUES ('$username', '$email', '$password')";
	if ($con->query($query) === TRUE) 
	{
    	header('Location: profile.php');
	} else 
	{
    	echo "Error: " . $sql . "<br>" . $con->error;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	
	<script src="js/jquery.min.js"></script>
	
</head>
<body>
	<div class="container">
		<?php 
			include('header.php'); 
		?>	
		<h1><small>Ny elev</small></h1>
		<form method="POST">
			<label>Username</label>
			<input type="text" class="form-control" name="username" required>
			<br>
			<label>email</label>
			<input type="email" class="form-control" name="lastname" required>
			<br>
			<label>Password</label>
			<input type="password" class="form-control" name="pass1" required>
			<br>
            <label>Confirm Password</label>
			<input type="password" class="form-control" name="pass2" required>
			<br>
			<a href="index.php" class="btn btn-danger">Cancel</a>
			<input type="submit" name="submit" class="btn btn-primary" value="Submit">
		</form>
	</div>
</body>
</html>