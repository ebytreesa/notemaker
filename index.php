<!DOCTYPE html>
<html>
<head>
    <?php 
      include('/includes/header.php'); 
    ?>
    <title>Notes</title>
    
</head>
<body>
<div class="container" style="position:relative;">

<?php 
	session_start(); 
	include('/includes/dbcon.php');
?>
	 

 <?php
  if (isset($_SESSION['username'])):/* redirect to profile if the user is logged in*/
    header('location:profile.php') ;
  else:
?> 
<section>
  <?php
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
    <div class="form">
    
    <center><h1>Login</h1></center>
    <?php
    if (isset($_SESSION['errMsg']) && !empty($_SESSION['errMsg'])):
    ?>
      <div class="success"> 
        <?php
        echo $_SESSION['errMsg'];
        unset($_SESSION['errMsg']); ?>
        </div> 
    <?php
    endif
  ?>

   
    <form method="POST" id="loginForm" action="login.php">
      <div class="row">
        <div class="col-30">
          <label><strong>Username</strong></label>
        </div>
        <div class="col-70">
          <input type="text" class="form-control "  name="username" >
        </div>
        <br>
      </div>
      

      <div class="row">
        <div class="col-30">
          <label><strong>Password</strong></label>
        </div>
        <div class="col-70">
          <input type="password" class="form-control" name="pass1" id="pass1" >
        </div>
        <br>
      </div>
      
      
       <div class="row_submit">
          <div class="col-30">
          
          </div>
          <div class="col-70">
            <input type="submit" class="submitBtn" name="login" class="btn btn-primary" value="Submit">
          </div>
      </div>
      
    </form>

  <div class="registerLink">
      <span>Not yet a user?</span>  <a href="register.php"><strong>Sign up</strong></a>
    </div>

</div>

 </section> 
<?php endif ?>
</div>
<script type="text/javascript">

  $(function () {
    $("#loginForm").validate({
        rules:{
            username:{
                required:true,
            },

            pass1:{
                required: true,
                minlength: 6
            },        
            
        },

        messages:{
            username:{
                required: "This field is required",
            },
            
            pass1:{
                required: "This field is required",
            }
            
        },

        submitHandler: function(form){
            form.submit();
        },  

         highlight: function (element, errorClass) {
                 $(element).closest('.form-group').addClass('has-error');
        } ,

        unhighlight: function (element, errorClass) {
            $(element).closest('.form-group').removeClass('has-error');
        }           

     });   

 });
</script>

</body>
</html>
