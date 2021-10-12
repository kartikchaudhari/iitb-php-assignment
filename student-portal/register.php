<?php 
    session_start();
    $_SESSION['token']=bin2hex(random_bytes(32));
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
                        <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
                            <div class="form-group-group">
                                <label>Student Name: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Course: <span class="text-danger">*</span></label>
                                <select name="" class="form-control" required="required">
                                    <option value="">--- Select Course ---</option>
                                    <?php 
                                        $sql="SELECT * FROM iitb_discipline";
                                        $query=mysqli_query($con,$sql);
                                        
                                    ?>
                                </select>
                            </div>
                           <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?=base_url('include/captcha-image-handler.php')?>" class="img-thumbnail" alt="Captcha Image" id="captcha-image" />
                                    </div>
                                    <div class="col-md-2" style="padding-top: 10px;">
                                        <button type="button" id="refresh" class="btn btn-info"><i class="fa fa-refresh"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <input type="text" class="form-control" name="captcha-input" placeholder="Password">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form> 
                        <br>
                        <?php
                            if (isset($_POST['captcha-input'])) {
                                $captcha_input=clean_post_input($_POST['captcha-input']);
                                $isok = (Captcha::check($captcha_input)) ? TRUE : FALSE;
                                
                                if ($isok) {
                                    echo "OK";
                                }
                                else{
                                    echo "Captcha Error";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- JavaScript -->
    <script src="<?=base_url('assets/js/jquery-1.10.2.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.js');?>"></script>
    <script type="application/javascript">

        var check = $("#check"),
            errText = $("#error-text");

        $("#refresh").on("click", function(ev) {
            ev.preventDefault();
            $("#captcha-image").attr("src","<?=base_url('include/captcha-image-handler.php');?>?refresh" + (+new Date().getTime()));
            check.val("");
            errText.html("&nbsp;");
        });

        // $("#submit").on("click", function(ev) {
        //     ev.preventDefault();

        //     var code = $("#check").val(),
        //         url  = "http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>/main.php?check="

        //     $.get(url + code, function(data) {
        //         if (data.isok) {
        //             errText.html("<span class=\"text-success\">Valid</span>");
        //         } else {
        //             errText.html("<span class=\"text-danger\">Invalid</span>");
        //         }
        //     });
        // });
    </script>

</body>
</html>