<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.01.2017
 * Time: 17:33
 */
//var_dump($data['user']);
//session_start();
//var_dump($_SESSION);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="http://<?php echo SITE_URL;?>/whiteboardview/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="http://<?php echo SITE_URL;?>/whiteboardview/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="http://<?php echo SITE_URL;?>/whiteboardview/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="http://<?php echo SITE_URL;?>/whiteboardview/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="http://<?php echo SITE_URL;?>/whiteboardview/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="http://<?php echo SITE_URL;?>/whiteboardview/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="http://<?php echo SITE_URL;?>/whiteboardview/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="http://<?php echo SITE_URL;?>/whiteboardview/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="http://<?php echo SITE_URL;?>/whiteboardview/build/css/custom.min.css" rel="stylesheet">
</head>


<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">

            <?php require_once('sidebar.php')?>

        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <?php require_once('topnavigation.php')?>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>General Elements</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>


            </div>
            <?php echo $data['content']?>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <!-- jQuery -->
    <script src="http://<?php echo SITE_URL;?>/whiteboardview/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="http://<?php echo SITE_URL;?>/whiteboardview/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="http://<?php echo SITE_URL;?>/whiteboardview/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="http://<?php echo SITE_URL;?>/whiteboardview/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="http://<?php echo SITE_URL;?>/whiteboardview/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="http://<?php echo SITE_URL;?>/whiteboardview/vendors/iCheck/icheck.min.js"></script>
    <!-- PNotify -->
    <script src="http://<?php echo SITE_URL;?>/whiteboardview/vendors/pnotify/dist/pnotify.js"></script>
    <script src="http://<?php echo SITE_URL;?>/whiteboardview/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="http://<?php echo SITE_URL;?>/whiteboardview/vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="http://<?php echo SITE_URL;?>/whiteboardview/build/js/custom.min.js"></script>

    <!-- PNotify -->
    <script>

    </script>
    <!-- /PNotify -->

    <!-- Custom Notification -->
    <script src="http://<?php echo SITE_URL;?>/whiteboardview/customnotification.js"></script>
    <!-- /Custom Notification -->
</body>
</html>
