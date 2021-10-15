<?php 
    session_start();
    if (!isset($_SESSION['cr_id'])) {
        header("location:index.php");
    }
    $_SESSION['token']=bin2hex(random_bytes(32));
    $_SESSION['token-expire']=time()+3600;
    include "include/functions.php";
    require "include/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Institute Workshop Coordinator Portal :: Upload Monthly Reports</title>

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

        <!-- new workshop form -->
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><i class="fa fa-upload"></i>  Upload Monthly Report</h3>
                        </div>
                        <div class="panel-body">
                            <?php 
                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                            ?>
                            <form method="post" action="<?=base_url('action.php');?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                            <label>Select Month: <span class="text-danger">*</span></label>
                                            <select name="m_id" class="form-control" required="required">
                                                <option value="">--- Select Month ---</option>
                                                <?php 
                                                    for ($i=1; $i<=12; $i++) { 
                                                        if ($i==date('m')) {
                                                            break;
                                                        }
                                                        else{
                                                ?>
                                                            <option value="<?=$i?>"><?=num_to_month($i)." &mdash; ".date("Y");?></option>
                                                <?php
                                                        }
                                                    }           
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                            <label>Select Report File (PDF only): <span class="text-danger">*</span></label>
                                            <br>
                                            <strong  class="text-danger">Instructions:</strong><hr style="margin-top: 5px;margin-bottom: 5px;">
                                            <span class="text-danger">
                                                1. File Size Must not more then 1MB.<br>
                                                2. File must be in PDF (<code><i>.pdf</i></code>) format.
                                            </span>
                                            <br>
                                            <input type="file" name="report-file" class="form-control" accept="application/pdf" required="required">
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="token" value="<?=$_SESSION["token"]?>">
                                <center><button name="btnUploadReport" type="submit" class="btn btn-success">Upload</button>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--./new work shop form-->

    </div>
    <!--./page content-->

    <!-- JavaScript -->
    <script src="<?=base_url('assets/js/jquery-1.10.2.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.js');?>"></script>
</body>
</html>