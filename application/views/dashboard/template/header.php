<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <?php foreach ($css as $key => $value):?>
        <link href="<?php echo $value;?>" rel="stylesheet">
        <?php endforeach;?>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
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

                    <a class="brand" href="./">sukalele</a>

                    <div class="nav-collapse">

                        <ul class="nav pull-right">
                           
                            <li class="divider-vertical"></li>

                            <li class="dropdown">

                                <a data-toggle="dropdown" class="dropdown-toggle " href="#">
                                    User <b class="caret"></b>							
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="./account.html"><i class="icon-user"></i> Account Setting  </a>
                                    </li>

                                    <li>
                                        <a href="./change_password.html"><i class="icon-lock"></i> Change Password</a>
                                    </li>

                                    <li class="divider"></li>

                                    <li>
                                        <a href="./"><i class="icon-off"></i> Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </div> <!-- /nav-collapse -->

                </div> <!-- /container -->

            </div> <!-- /navbar-inner -->

        </div> <!-- /navbar -->


