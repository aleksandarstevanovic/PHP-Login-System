<?php 
require "header.php";
?>
<main>
<?php 
if(isset($_SESSION['userId'])){
  echo  "<p>Logovani ste!</p>";
}
  else{
    echo "<p>Odjavljeni ste!</p>";
  }
?>

</main>

<?php
require "footer.php";
?>
