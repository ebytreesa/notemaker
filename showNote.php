  <?php

// session_start();
if (isset($_POST['submit']))
{ 
    session_start();
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
          
          echo "<div class='notes' style=''>";
          echo "<p>" . $row->created_at . "</p>";
          echo "<h3>" . $row->title . "</h3>";
          echo "<p>" . nl2br($row->content) . "</p>";
          echo "<button><a id='editBtn' href='editNote.php?id=".$row->id ."'>edit</a></button> 
                <button class='deleteBtn' data-id='".$row->id ."' style='color: red;'>Delete</button>";
          echo "</div>";
        }
      }
} else
{     
  
  $id = $_SESSION['id']; 
  $query = "SELECT * FROM notes WHERE user_id=$id";
  $result = $mysqli->query($query);
  if ($result->num_rows > 0)
  {
    while ($row = $result->fetch_object())
    {
      echo "<div class='notes' style=''>";
      echo "<p>" . $row->created_at . "</p>";
      echo "<h3>" . $row->title . "</h3>";
      echo "<p>" . nl2br($row->content) . "</p>";
      echo "<button><a id='editBtn' href='editNote.php?id=".$row->id ."'>edit</a></button> 
            <button class='deleteBtn' data-id='".$row->id ."' style='color: red;'>Delete</button>";
      echo "</div>";
    }
  }
}   
?>
<script type="text/javascript">
  $(document).ready(function(){ 
   $(".deleteBtn").click(function(e){
       
        var id = $(this).attr('data-id');
        var btn = $(this);
        $.ajax({
            type: 'GET',
            url: 'deleteNote.php',      
            data: { delete_id: id},
            success: function() {     

               btn.parent().remove();
            }

          });
        e.preventDefault();          
    });

    
  });
</script>    