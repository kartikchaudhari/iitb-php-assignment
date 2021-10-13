<nav class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=base_url("index.php");?>">Institute Workshop Coordinator Portal</a>
    </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <?php 
                if (!isset($_SESSION['cr_id'])) {
            ?>
            <li><a href="<?=base_url('index.php');?>"><i class="fa fa-sign-in"></i> Login</a></li>
            <?php
                }
                else{
            ?>
            <li><a href="<?=base_url('dashboard.php');?>"><i class="fa fa-plus"></i> Add New Workshop</a></li>            
            <?php
                }
            ?>
        </ul>
        
        <?php 
            if (isset($_SESSION['cr_id'])) {
        ?>
        <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=$_SESSION['cr_name']?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?=base_url('logout.php');?>"><i class="fa fa-power-off"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
        <?php
            }
        ?>

    </div><!-- /.navbar-collapse -->
</nav>
