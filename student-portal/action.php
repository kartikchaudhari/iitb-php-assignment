<?php
    session_start();
    include "include/functions.php";
    require "include/Captcha.php";
    require "include/config.php";

    if (isset($_POST['btnStudentRegistration'])) {
        //check csrf token
        if(hash_equals($_SESSION['token'], $_POST['token'])) {
            
            $captcha_input=clean_post_input($_POST['captcha-input']);
            $isok = (Captcha::check($captcha_input)) ? TRUE : FALSE;

            if ($isok) {
                $name=clean_post_input($_POST['name']);
                $course=clean_post_input($_POST['d_id']);
                $sem=clean_post_input($_POST['sem']);
                $email=clean_post_input($_POST['email']);
                $pasword=md5(clean_post_input($_POST['password']));

                $stmt = $con->prepare("INSERT INTO `iitb_student` (name,course,semester,email,password) VALUES (?,?,?,?,?)");
                $stmt->bind_param("siiss",$name,$course,$sem,$email,$password);
                
                if($stmt->execute()){
                    $_SESSION['message']=alert('s',"You are successfully registered, Please login to Access your dashboard.");
                    header("location:login.php");
                }
            }
            else{
                $message="Captcha Mismatched, Please Retry.";
                $_SESSION['message']=alert('e',$message);
                header("location:register.php");
            }            
        } 
        else{
            $message="CSRF Token Mismatched.";
            $_SESSION['message']=alert('e',$message);
            header("location:register.php");
        }
    }
    else{
        $message="You are not allowed to Access this Section.";
        $_SESSION['message']=alert('e',$message);
        header("location:register.php");
    }
?>