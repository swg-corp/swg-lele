<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">

        <title>sukalele</title>

        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/login.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
        <script src="<?php echo base_url('assets/js/jquery-1.7.2.min.js'); ?>"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>


    </head>
</head>
<body>
    <div id="login-container">


        <div id="login-header">

            <h2>
                <a href="#" class="" style="text-decoration: none; color: #fff;">sukalele.com</a>
            </h2>
            
        </div> <!-- /login-header -->

        <div id="login-content" class="clearfix">
            <?php
            if (isset($login_error)) {
                echo '<div class="alert alert-error"><strong>' . $login_error . '</strong></div>';
            }
            ?>
           <?php echo form_open('authentication/login');?>
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="username">Username</label>
                        <div class="controls">
                            <input type="text" class="" id="username" placeholder="username" name="email" value="<?php echo $email;?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="password">Password</label>
                        <div class="controls">
                            <input type="password" class="" id="password" placeholder="password" name="password">
                        </div>
                    </div>
                </fieldset>

                <div id="remember-me" class="pull-left">
                    <input type="checkbox" name="remember" id="remember" />
                    <label id="remember-label" for="remember">Remember Me</label>
                </div>

                <div class="pull-right">
                    <button type="submit" class="btn btn-warning btn-large">
                        Login
                    </button>
                </div>
           <?php echo form_close();?>

        </div> <!-- /login-content -->


        <div id="login-extra">

            <p>Don't have an account? <a href="javascript:;">Sign Up.</a></p>

            <p>Remind Password? <a href="forgot_password.html">Retrieve.</a></p>

        </div> <!-- /login-extra -->

    </div> <!-- /login-wrapper -->


</body>
</html>
