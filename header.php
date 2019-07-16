<?php 
session_start();
?>
<html>
<head>
</head>
<body>
    
<header>
<nav>
<ul>
<li><a href="inde.php">Home</a></li> 
<li><a href="#">Portfolio</a></li> 
<li><a href="#">About me</a></li> 
<li><a href="#">Contact</a></li> 
</ul>
<div>
<?php
if(isset($_SESSION['userId'])){
    echo  '<form action="includes/logout.inc.php" method="post">

    <button type="submit" name="logout-submit">Logout</button>
    </form>';
  }
    else{
      echo '<form action="includes/login.inc.php" method="post">
      <input type="text" name="mailuid" placeholder="Username or email...">
      <input type="password" name="pwd" placeholder="Password">
      <button type="submit" name="login-submit">Login</button>
      </form>
      <a href="signup.php">Signup</a>
      ';
    }
?>



 

</div>
</nav>
</header>