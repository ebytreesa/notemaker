

<div id="logo">
	  <a href="index.php"><h1>Notes</h1></a>
         <div class="welcome" style="position:absolute; right:10px;top:10px;">
    <?php
      if (isset($_SESSION['username']) ):    ?>
      <p>Welcome <strong><?php echo $_SESSION['username'] ;?></strong></p>
      <?php endif ?>   
  </div>      
</div>
<nav id="navTop">
	<ul>  
       
       
       <?php if (isset($_SESSION['username'])): ?>
       
       <li><a href="profile.php">My Notes</a></li>
       <li><a href="logout.php">Logout</a></li> 
       <?php else: ?>
       <li><a href="register.php">Register</a></li>
       <li><a href="index.php">Login</a></li>
       <?php
       endif 
       ?> 
	</ul>

</nav>
	
