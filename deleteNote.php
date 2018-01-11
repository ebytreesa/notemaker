<?php
include('includes/dbcon.php');
if (isset($_GET['delete_id']))
{ 
$id = $_GET['delete_id'];
$query = "DELETE FROM notes WHERE id=$id";
$mysqli->query($query);

  }

?>
