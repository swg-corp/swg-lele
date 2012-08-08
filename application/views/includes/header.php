<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">

        <title>sukalele</title>
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/admin.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet">
        <?php if (isset($css)): ?>
            <?php foreach ($css as $stylesheet): ?>
                <link rel="stylesheet" href="<?php echo base_url('assets/css/'.$stylesheet); ?>">
            <?php endforeach; ?>
        <?php endif; ?>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <script src="<?php echo base_url('assets/js/jquery-1.7.2.min.js'); ?>"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <?php if (isset($js)): ?>
            <?php foreach ($js as $script): ?>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/<?php echo $script; ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div id="nav" class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 				
                    </a>
                    <a class="brand" href="./">sukalele.com</a>
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="divider-vertical"></li>
                            <li>
                                <a href="<?php echo site_url('dashboard/user_setting'); ?>"><i class="icon-user"></i> Account Setting  </a>
                            </li>
                            <li class="divider-vertical"></li>
                            <li>
                                <a href="#" ><i class="icon-lock"></i> Change Password</a>
                            </li>

                            <li class="divider-vertical"></li>

                            <li>
                                <a href="<?php echo site_url('authentication/logout'); ?>"><i class="icon-off"></i> Logout</a>
                            </li>
                            <li class="divider-vertical"></li>
                        </ul>

                    </div> <!-- /nav-collapse -->

                </div> <!-- /container -->

            </div> <!-- /navbar-inner -->

        </div> <!-- /navbar -->
        <div id="content">
            <div class="container">
                <div class="row">
