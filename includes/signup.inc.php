<?php
if(isset($_POST['signup-submit'])){
    require "dbh.inc.php";

    $username=$_POST['uid'];
    $email=$_POST['mail'];
    $password=$_POST['pwd'];
    $passwordRepeat=$_POST['pwd-repeat'];

    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
        header("Location:../signup.php?error=emptyfields&uid=$username&mail=$email");
        exit();
       }
       else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location:../signup.php?error=invalidmailuid");
        exit();
       }
       else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location:../signup.php?error=invalidmail&uid=$username");
       }
       else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location:../signup.php?error=invaliduid&mail=$email");
        exit();
       }
       else if($password!==$passwordRepeat){
        header("Location:../signup.php?error=invalidpasswordcheck&mail=$email&uid=$username");
       }
       else{

           $stmt=$conn->prepare("SELECT uidUsers FROM users WHERE uidUsers=?;");
           
           if ($conn->connect_error) {
           header("Location:../signup.php?error=sqlerror");
            exit();
        }
        else{
            $stmt->bind_param("s",$username);
            $stmt->execute();
            $resultCheck=$stmt->get_result();
            
            
            if($resultCheck->num_rows>0){
            header("Location:../signup.php?error=usertaken&mail=$email");
            exit();
            }
            else{
                $stmt->close();
                $stmt=$conn->prepare("INSERT INTO users (uidUsers,emailUsers,pwdUsers) VALUES(?,?,?);");
                                                         

                if ($conn->connect_error) {
                    header("Location:../signup.php?error=sqlerror");
                     exit();
                 }
                 else{
                   $hashedPwd=password_hash($password,PASSWORD_DEFAULT);
                  
                 
                    
                
                    $stmt->bind_param('sss',$username,$email,$hashedPwd);
                    $stmt->execute();
                   
                    header("Location:../signup.php?signup=success");
                    exit();
                 }
            }
        }
       }
       $stmt->close();
       $conn->close();
}
else{
    header("Location:../signup.php");
                    exit();
}