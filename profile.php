<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location:index.php');
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <?php 
    include('/includes/header.php'); 
  ?>
  <title>
    welcome <?php echo  $_SESSION['username'];
     ?>      
  </title>    
</head>

<body>
<div class="container" style="position:relative;">
  <?php 
  include('/includes/dbcon.php');
	
  if (isset($_SESSION['success']) && !empty($_SESSION['success'])):
  ?>
      <div class="success"> 
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']); ?>
      </div> 
    <?php
  endif
  ?>  
 
<header>	
	<?php 	
  
     ?> 
</header> 

<section>
<?php ?>

      <h3 class="welcome"> welcome<strong style="color:red;"> <?php echo  $_SESSION['username']; ?></strong> </h3>
      <a href="logout.php" class="logoutLink">Logout</a>
       
      <div class="noteForm" style="display:;">
      <!-- Form to create note -->
        <form method="POST" id="createForm"> 
            <h3>Make a note</h3>  
          <label>Title</label>
          <input type="text" class="form-control" name="title" id="title" >
          <br>
          <div class="wrap">
            <label class="content">Content</label>
            <textarea  class="form-control" name="content" id="content"  ></textarea> 
          <br>
          </div>
          <!-- <button><a href="profile.php">Cancel</a></button>  -->
          <button name="submit" id="add" class="submitBtn">Add</button> 
        </form>
      </div>

  <div id="displayNotes">
 <!--  view notes -->
  <h2>Notes</h2>  
      <?php include('showNote.php');?>
  </div>
    
</div>
</section>
</div>

<script type="text/javascript">
  $(document).ready(function(){ 
// creating note form validating and submitting using jquery and ajax
      $("#createForm").validate({
        rules:{
            title:{
                required:true,
            },

            content:{
                required: true,
           },   
            
        },

        messages:{
            title:{
                required: "This field is required",
            },
            
            content:{
                required: "This field is required",
                
            }
            
        },

        submitHandler: submitForm
    }); 

    function submitForm(){
      var data = $('#createForm').serialize();
      
           $.ajax({
            type: 'POST',
            url: 'showNote.php',
            
            data: data,
            success: function(d) {              
                $('#title').val('');
                $('#content').val('');

                $('#displayNotes').html(d);
                //$('.notes').css('background-color', colours[Math.floor(Math.random()*colours.length)]);
                $(function() {
    $(".notes").each(function() {
    
        $(this).css("background-color", colours[Math.floor(Math.random()*colours.length)]);
    });
});
            }
          });  
    }

    
 });
  </script>

</div>

 
</body>
</html> 