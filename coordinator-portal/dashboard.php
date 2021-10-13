<?php 
    session_start();
    if (!isset($_SESSION['cr_id'])) {
        header("location:index.php");
    }
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

    <title>Institute Workshop Coordinator Portal :: Coordinator Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/bootstrap-theme.min.css');?>" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link rel="stylesheet" href="<?=base_url('assets/font-awesome/css/font-awesome.min.css');?>">

    <!-- page based css -->
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap-datetimepicker.min.css');?>">
</head>
<body>
    <!-- navbar -->
    <?php include "nav.php";?>
    <!--./navbar-->
    
    <!-- page content-->
    <div class="container">

        <!-- new work shop form -->
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><i class="fa fa-plus"></i>  Add New Workshop</h3>
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
                                            <div class="form-group date" >
                                                <label>Date of Workshop: <span class="text-danger">*</span></label>
                                                <input id="workshop-dt-picker" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Type of Workshop: <span class="text-danger">*</span></label>
                                                <select name="" class="form-control" required="required">
                                                    <option value="">--- Select Workshop Type ---</option>
                                                    <?php 
                                                        $sql="SELECT * FROM iitb_workshop_type";
                                                        $query=mysqli_query($con,$sql);
                                                        if ($query->num_rows>0) {
                                                            while($result=mysqli_fetch_assoc($query)){
                                                    ?>
                                                            <option value="<?=$result['type_id']?>"><?=$result['type_name']?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Participants: <span class="text-danger">*</span></label>
                                                <select name="" class="form-control" required="required">
                                                    <option value="">--- Select Participants ---</option>
                                                    <?php 
                                                        $sql="SELECT * FROM iitb_participants_type";
                                                        $query=mysqli_query($con,$sql);
                                                        if ($query->num_rows>0) {
                                                            while($result=mysqli_fetch_assoc($query)){
                                                    ?>
                                                            <option value="<?=$result['type_id']?>"><?=$result['type_name']?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Discipline: <span class="text-danger">*</span></label>
                                                <select name="d_id" class="form-control" required="required">
                                                    <option value="">--- Select Discipline ---</option>
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
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Expected No. of Participants: <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Workshop Category</label>
                                                <input type="text" disabled="disabled" class="form-control" value="">
                                            </div>
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
        <!--./new work shop form-->

        <!-- upcomming workshops -->
        <div id="upcomming" class="row">
            <div class="col-md-12">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><i class="fa fa-list"></i> Upcomming Workshops</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr class="active">
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Type &amp; Participants</th>
                                        <th class="text-center">Expected No. of participants &amp; Category</th>
                                        <th class="text-center">Disciplines</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--./upcomming workshops-->

        <!-- pending workshops -->
        <div id="pending" class="row">
            <div class="col-md-12">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><i class="fa fa-list"></i> Pending Workshops</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr class="active">
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Type &amp; Participants</th>
                                        <th class="text-center">No. of participants &amp; Category</th>
                                        <th class="text-center">Reports</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--./pending workshops-->
    </div>
    <!--./page content-->

    <!-- JavaScript -->
    <script src="<?=base_url('assets/js/jquery-1.10.2.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.js');?>"></script>

    <!-- page based js -->
    <script src="<?=base_url('assets/js/moment.min.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap-datetimepicker.min.js');?>"></script>
    <script type="text/javascript">
        $(function () {
            $('#workshop-dt-picker').datetimepicker({
                minDate:new Date(),
                format: 'DD/MM/YYYY'
            });
        });
    </script>
</body>
</html>