<?php
session_start();
if (isset($_POST['submit']))
{ 
	include('includes/dbcon.php');
	$title = $_POST['title'];
	$content = $_POST['content'];
	$user_id = $_SESSION['id']; 
	$query = "INSERT INTO notes (title, content, user_id) VALUES ('$title', '$content', '$user_id')";
	$mysqli->query($query);

	  $query1 = "SELECT * FROM notes WHERE user_id=$user_id";
      $result = $mysqli->query($query1);
      if ($result->num_rows > 0)
        {
          while ($row = $result->fetch_object())
          {
          	$id = mysqli_insert_id($mysqli);
            echo "<div class='notes' style='border:1px solid black;'>";
            echo "<p>" . $row->created_at . "</p>";
            echo "<h3>" . $row->title . "</h3>";
            echo "<p>" . nl2br($row->content) . "</p>";
            echo "<button><a href='editNote.php?id=". $id ."'>edit</a></button> 
                  <button><a href='deleteNote.php?id=". $id ."' style='color: red;'>Delete</a></button>";
            echo "</div>";
          }
    }
        
	// if ($mysqli->query($query) === TRUE) 
	// {
	// 	echo "<div class='notes' style='border:1px solid black;'>";
 //            echo "<p>" . $row->created_at . "</p>";
 //            echo "<h3>" . $row->title . "</h3>";
 //            echo "<p>" . nl2br($row->content) . "</p>";
 //            echo "<button><a href='editNote.php?id=". $row->id ."'>edit</a></button> 
 //                  <button><a href='deleteNote.php?id=". $row->id ."' style='color: red;'>Delete</a></button>";
 //            echo "</div>";
	// 	$_SESSION['success'] = "note created successfully";
 //    	header('Location: profile.php');
	// } else 
	// {
 //    	echo "Error: " . $sql . "<br>" . $mysqli->error;
	// }
}

?>
