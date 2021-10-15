<?php
    defined('BASEPATH') OR exit('You are not allowed to Access this Section.');
    session_start();
    include "include/functions.php";
    require "include/Captcha.php";
    require "include/config.php";

    if (isset($_POST['btnAddWorkshop'])) {
        
        //check csrf token
        if(hash_equals($_SESSION['token'], $_POST['token'])) {
           
            $w_title=clean_post_input($_POST['w_title']);
            $w_date=db_date($_POST['w_date']);
            $w_type_id=clean_post_input($_POST['w_type_id']);
            $participants_id=clean_post_input($_POST['participants_id']);
            $d_id=json_encode($_POST['d_id']);
            $participant_expacted=clean_post_input($_POST['participant_expacted']);
            $w_category=clean_post_input($_POST['w_category']);

            $stmt = $con->prepare("INSERT INTO iitb_workshop (workshop_title, workshop_date, workshop_type, participant_type, participant_expacted, workshop_category, discipline_type) VALUES (?,?,?,?,?,?,?)");
            $stmt->bind_param("ssiiiss",$w_title, $w_date, $w_type_id, $participants_id, $participant_expacted,$w_category,$d_id);
            
            if($stmt->execute()){
                $_SESSION['message']=alert('s',"Workshop Addedd Successfully.");
                header("location:dashboard.php");
            }
            else{
                $_SESSION['message']=alert('e',"An Error Occured While Adding Workshop.");
                header("location:dashboard.php");
            }                     
        } 
        else{
            $message="CSRF Token Mismatched.";
            $_SESSION['message']=alert('e',$message);
            header("location:dashboard.php");
        }
    }



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