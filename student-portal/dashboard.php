<?php 
    session_start();
    if (!isset($_SESSION['st_id'])) {
        header("location:login.php");
    }
    $_SESSION['token']=bin2hex(random_bytes(32));
    $_SESSION['token-expire']=time()+3600;
    include "include/functions.php";
    require "include/Captcha.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Feedback Portal :: Submit Feedback</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/bootstrap-theme.min.css');?>" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link rel="stylesheet" href="<?=base_url('assets/font-awesome/css/font-awesome.min.css');?>">
</head>
<body>
    <!-- navbar -->
    <?php include "nav.php";?>
    <!--./navbar-->
    
    <!-- page content-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><i class="fa fa-plus"></i>  Submit Feedback</h3>
                        </div>
                        <div class="panel-body">
                            <?php 
                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                            ?>
                            <form method="post" action="<?=base_url('action.php');?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" disabled="disabled" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" disabled="disabled" value="<?=date("d/m/Y")?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Discipline: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" disabled="disabled" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Semester: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" disabled="disabled" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Topic Attended: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>&nbsp;<span class="text-danger">&nbsp;</span></label>
                                                <button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add Topic</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row-fluid">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Your Feedback: <span class="text-danger">*</span></label>
                                            <textarea name="" id="input" class="form-control" rows="3" required="required"></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <input type="hidden" name="token" value="<?=$_SESSION["token"]?>">
                                <center><button name="btnStudentLogin" type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button></center>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--./page content-->

    <!-- JavaScript -->
    <script src="<?=base_url('assets/js/jquery-1.10.2.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.js');?>"></script>
</body>
</html>