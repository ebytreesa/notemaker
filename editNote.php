<?php
session_start();
if (isset($_POST['submit']))
{
	include('includes/dbcon.php');
	$id = $_GET['id'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$user_id = $_SESSION['id'];
	$query = "UPDATE notes SET title='$title', content='$content', user_id='$user_id' WHERE id=".$id;
	if ($mysqli->query($query) === TRUE) 
	{
		$_SESSION['success'] = "note being edited successfully";
    	header('Location: profile.php');
	} else 
	{
    	echo "Error: " . $sql . "<br>" . $mysqli->error;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<div class="container">
		<?php include('includes/topNav.php');
			include('includes/dbcon.php');
			$note_id = $_GET['id'];
			$query = "SELECT * FROM notes WHERE id=$note_id";
			$result =$mysqli->query($query);
			$row  = $result->fetch_object();
		 ?>
		<h1>Edit Note&nbsp;<small>Edit Note</small></h1>
		<form method="POST">
			
			<label>title</label>
			<input type="text" class="form-control" name="title" value="<?php echo $row->title;?>" required>
			<br>
			<label>Content</label>
			<textarea  class="form-control" name="content" required><?php echo $row->content;?></textarea> 
			<br>
			<button><a href="profile.php">Cancel</a></button> 
			<input type="submit" name="submit" class="btn btn-primary" value="Edit">
		</form>
	</div>
</body>
</html>