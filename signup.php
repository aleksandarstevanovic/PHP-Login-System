<?php 
require "header.php";
?>
<main>
<h1>Signup</h1>
<?php
if(isset($_GET['error'])){

if($_GET['error']=="emptyfields"){
    echo "<p>Prazna polja!</p>";
}
elseif($_GET['error']=="ivaliduidmail"){
    echo "<p>invalid email ili username!</p>";
}
elseif($_GET['error']=="ivaliduid"){
    echo "<p>invalid  username!</p>";
}
elseif($_GET['error']=="ivalidmail"){
    echo "<p>invalid email !</p>";
}
elseif($_GET['error']=="invalidpasswordcheck"){
    echo "<p>Sifra nije tacna</p>";
}
elseif($_GET['error']=="usertaken"){
    echo "<p>Sifra nije tacna</p>";
}
}else if((isset($_GET['signup'])) && $_GET["signup"]=="success"){
    echo "<p>Uspesno ste kreirali nalog</p>";
}
?>
<form action="includes/signup.inc.php" method="post">
<input type="text" name="uid" placeholder="Username">
<input type="text" name="mail" placeholder="Email">
<input type="password" name="pwd" placeholder="Password">
<input type="password" name="pwd-repeat" placeholder="Repeat password">
<button type="submit" name="signup-submit">Signup</button>
</form>
</main>

<?php
require "footer.php";
?>
