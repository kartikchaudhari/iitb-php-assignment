<?php 
    session_start();
    $_SESSION['token']=bin2hex(random_bytes(32));
    $_SESSION['token-expire']=time()+3600;

    include "include/functions.php";
    require "include/Captcha.php";
    require "include/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Feedback Portal :: Student Registration</title>

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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><i class="fa fa-plus"></i>  Student Registration</h3>
                        </div>
                        <div class="panel-body">
                            <?php 
                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                            ?>
                            <form method="post" action="<?=base_url('action.php');?>">
                                <div class="form-group">
                                    <label>Name: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Course: <span class="text-danger">*</span></label>
                                    <select name="d_id" class="form-control" required="required">
                                        <option value="">--- Select Course ---</option>
                                        <?php 
                                            $sql="SELECT * FROM iitb_discipline";
                                            $query=mysqli_query($con,$sql);
                                            if ($query->num_rows>0) {
                                                while($result=mysqli_fetch_assoc($query)){
                                        ?>
                                                <option value="<?=$result['d_id']?>"><?=$result['d_name']?></option>
                                        <?php
                                                }
                                            }
                                            mysqli_close($con);
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Semester: <span class="text-danger">*</span></label>
                                    <select name="sem" class="form-control" required="required">
                                        <option value="">--- Select Semester ---</option>
                                        <?php 
                                            for($i=1;$i<7;$i++){
                                        ?>
                                            <option value="<?=$i;?>"><?=$i;?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Email: <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label>Password: <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?=base_url('include/captcha-image-handler.php')?>" class="img-thumbnail" alt="Captcha Image" id="captcha-image" />
                                        </div>
                                        <div class="col-md-2" style="padding-top: 10px;">
                                            <button type="button" id="refresh" class="btn btn-info" title="Click to Refresh Captcha"><i class="fa fa-refresh"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Captcha: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="captcha-input">
                                </div>
                                <input type="hidden" name="token" value="<?=$_SESSION["token"]?>">
                                <button name="btnStudentRegistration" type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="<?=base_url('assets/js/jquery-1.10.2.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.js');?>"></script>

</body>
</html>