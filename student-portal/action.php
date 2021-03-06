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
                    header("location:index.php");
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

    if (isset($_POST['btnStudentLogin'])) {
        //check csrf token
        if(hash_equals($_SESSION['token'], $_POST['token'])) {

            $captcha_input=clean_post_input($_POST['captcha-input']);
            $isok = (Captcha::check($captcha_input)) ? TRUE : FALSE;

            if ($isok) {
                $email=clean_post_input($_POST['email']);
                $password=md5(clean_post_input($_POST['password']));

                $sql = "SELECT * FROM iitb_student WHERE email='$email' AND password='$password'";
                $query=$con->query($sql);
                
                if ($query->num_rows > 0) {
                    $row = $query->fetch_assoc();
                    
                    $_SESSION['st_id']=$row['student_id'];
                    $_SESSION['st_name']=$row['name'];
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

    if (isset($_POST['btnSubmitFeedback'])) {

        //check csrf token
        if(hash_equals($_SESSION['token'], $_POST['token'])) {
        
            $student_id=$_SESSION['st_id'];
            $date=date("Y-m-d");
            $topics=json_encode($_POST['topic']);
            $feedback=clean_post_input($_POST['feedback']);

            $stmt = $con->prepare("INSERT INTO `iitb_feedback` (student_id,feedback_date,topic_attended,feedback) VALUES (?,?,?,?)");
            $stmt->bind_param("isss",$student_id,$date,$topics,$feedback);
            
            if($stmt->execute()){
                $_SESSION['message']=alert('s',"Feedback Submitted Successfully.");
                header("location:dashboard.php");
            }
            else{
                $_SESSION['message']=alert('s',"An Unexpected Error occured, Please Try Again.");
                header("location:dashboard.php");
            }
                 
        } 
        else{
            $message="CSRF Token Mismatched.";
            $_SESSION['message']=alert('e',$message);
            header("location:register.php");
        }
    }
?>