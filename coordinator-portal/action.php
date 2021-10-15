<?php
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


    if (isset($_POST['btnUploadReport'])) {

        //check csrf token
        if(hash_equals($_SESSION['token'], $_POST['token'])) {
           
            $new_name=num_to_month(clean_post_input($_POST['m_id']))."-".date("Y")."-".strtotime("now");

            $target_dir = "reports/";
            $target_file = $target_dir .basename($_FILES["report-file"]["name"]);
            $uploadOk = 1;
            $file_extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $error="";
            // Check file size
            if ($_FILES["report-file"]["size"] > 500000) {
                $error.="<li>Sorry, your file is too large.</li>";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($file_extension != "pdf" && $file_extension != "PDF") {
                $error.="<li>Sorry, only PDF files are allowed.</li>";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $error.="<li>Sorry, your file was not uploaded.</li>";
                $_SESSION['message']=alert('e',$error);
                header("location:monthly-report.php");
                
            } 
            else {
                // if everything is ok, try to upload file
                $new_file_path=$target_dir.$new_name.".".$file_extension;

                if (move_uploaded_file($_FILES["report-file"]["tmp_name"],$new_file_path)) {
                    $month_id=$_POST['m_id'];
                    //insert info to db
                    $stmt = $con->prepare("INSERT INTO iitb_reports (month,report_file) VALUES (?,?)");
                    $stmt->bind_param("is",$month_id,$new_file_path);
                    
                    if($stmt->execute()){

                        //update workshop table
                        $sql="UPDATE iitb_workshop SET workshop_status=2 WHERE MONTH(workshop_date)=$month_id";

                        if ($con->query($sql) === TRUE) {
                            $_SESSION['message']=alert('s',"Report File Uploaded Successfully.");
                            header("location:monthly-report.php");
                        } else {
                          echo "Error updating record: " . $conn->error;
                        }
                    }
                    else{
                        $_SESSION['message']=alert('e',"An Error Occured While Adding Workshop.");
                        header("location:monthly-report.php");
                    }
                } 
                else {
                    $error.="<li>Sorry, there was an error uploading your file.</li>";
                    $_SESSION['message']=alert('e',$error);
                    header("location:monthly-report.php");
                }
            }                         
        } 
        else{
            $message="CSRF Token Mismatched.";
            $_SESSION['message']=alert('e',$message);
            header("location:monthly-report.php");
        }
    }
?>