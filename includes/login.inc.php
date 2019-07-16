<?php

if(isset($_POST['login-submit'])){
require 'dbh.inc.php';
$mailuid=$_POST['mailuid'];
$password=$_POST['pwd'];

if(empty($mailuid) || empty($password)){
    header("Location:../index.php?error=emptyfields");
    exit(); 
}
else{
    $stmt=$conn->prepare("select * from users where uidUsers=? or emailUsers=?");
    $stmt->bind_param("ss",$mailuid,$mailuid);
    if($stmt->execute()){
     $result=$stmt->get_result();
     if($row=mysqli_fetch_assoc($result)){
     $pwdCheck=password_verify($password,$row['pwdUsers']);
     if($pwdCheck==false){
        header("Location:../index.php?error=wrongpassword");
        exit(); 
     }
     else if($pwdCheck==true){
     session_start();
     $_SESSION['userId']=$row['idUsers'];
     $_SESSION['userUid']=$row['uidUsers'];
     header("Location:../index.php?login=success");
     exit(); 

     }
     else{
        header("Location:../index.php?error=wrongpassword");
        exit(); 
     }
     }
     else{
        header("Location:../index.php?error=nouser");
        exit(); 
     }
    }
    else{
     header("Location:../index.php?error=sqlerror");
    exit(); 
    }
}
}
else{
    header("Location:../index.php");
    exit();
}