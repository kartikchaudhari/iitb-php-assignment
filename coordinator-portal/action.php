<?php
    session_start();
    include "include/functions.php";
    require "include/Captcha.php";
    require "include/config.php";

    if (isset($_POST['btnCoordinatorLogin'])) {
        //check csrf token
        if(hash_equals($_SESSION['token'], $_POST['token'])) {

            $captcha_input=clean_post_input($_POST['captcha-input']);
            $isok = (Captcha::check($captcha_input)) ? TRUE : FALSE;

            if ($isok) {
                $email=clean_post_input($_POST['email']);
                $password=md5(clean_post_input($_POST['password']));

                $sql = "SELECT * FROM iitb_coordinator WHERE email='$email' AND password='$password'";
                $query=$con->query($sql);
                
                if ($query->num_rows > 0) {
                    $row = $query->fetch_assoc();
                    
                    $_SESSION['cr_id']=$row['coordinator_id'];
                    $_SESSION['cr_name']=$row['name'];
                    header("location:dashboard.php");
                } 
                else {
                    $message="Invalid Credentials, Please Retry.";
                    $_SESSION['message']=alert('e',$message);
                    header("location:index.php");
                }
                
            }
            else{
                $message="Captcha Mismatched, Please Retry.";
                $_SESSION['message']=alert('e',$message);
                header("location:index.php");
            }            
        } 
        else{
            $message="CSRF Token Mismatched.";
            $_SESSION['message']=alert('e',$message);
            header("location:index.php");
        }
    }
?>