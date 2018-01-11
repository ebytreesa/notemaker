<!DOCTYPE html>
<html>
<head>
	<?php 

			include('/includes/header.php'); 
		?>
	<title>Register</title>
	
	
</head>
<body>
	<div class="container">
		<?php 
			// include('/includes/topNav.php'); 
		?>	
       	<div class="form">
	       	<div class="loginLink">
	        	<a href="index.php">Login</a>
	      	</div>
			<center><h1>Sign up</h1></center>
			<?php
				session_start();
    			if (isset($_SESSION['errMsg']) && !empty($_SESSION['errMsg'])):
    		?>
     		 <div class="success"> 
       		 <?php
       		 echo $_SESSION['errMsg'];
       		 unset($_SESSION['errMsg']); ?>
       		 </div> 
   		 <?php  endif  ?>
			 
			<form method="POST" id="register-form" action="registerFunction.php">
				<div class="row">
					<div class="col-30">
						<label><strong>Username</strong></label>
					</div>
					<div class="col-90">
						<input type="text" class="form-control "  name="username" >
					</div>
					<br>
				</div>
				<div class="row">
					<div class="col-30">
						<label><strong>Email</strong></label>
					</div>
					<div class="col-90">
						<input type="email" class="form-control" name="email" >
					</div>
					<br>
				</div>

				<div class="row">
					<div class="col-30">
						<label><strong>Password</strong></label>
					</div>
					<div class="col-90">
						<input type="password" class="form-control" name="pass1" id="pass1" >
					</div>
					<br>
				</div>

				<div class="row">
					<div class="col-30">
						<label><strong>Confirm Password</strong></label>
					</div>
					<div class="col-90">
						<input type="password" class="form-control" name="pass2" >
					</div>
					<br>
				</div>
				
	            <div class="row">
	            	<!-- <div class="col-30"> -->
						<input type="submit" class="submitBtn" name="register" class="btn btn-primary" value="Submit">
					<!-- </div> -->
					<!-- <div class="col-90">
						<a href="index.php" class="btn-danger">Cancel</a>
					 </div> -->
				</div>
			</form>
       </div>
	</div>

<script>


  $(function () {
    $("#register-form").validate({
        rules:{
            username:{
                required:true,

            },
            email:{
                required:true,
                email:true
            },

            pass1:{
                required: true,
                minlength: 6
            },

            pass2:{
                required: true,
                equalTo: '#pass1'                               
            }
            
        },

        messages:{
            username:{
                required: "This field is required",
            },
            email:{
                required: "This field is required",
                email: "write a valid email adresse"
            },
            pass1:{
                required: "This field is required",
                minlength: "password must be min 6 characters"
            },
            pass2:{
                required: "This field is required",
                equalTo: "both passwords must be the same"
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
        },    
        

           

      });

 });
</script>
</body>
</html>