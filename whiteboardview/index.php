<?php require_once('header.php')?>

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
    <script src="http://whiteboardview.dev/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="http://whiteboardview.dev/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="http://whiteboardview.dev/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="http://whiteboardview.dev/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="http://whiteboardview.dev/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="http://whiteboardview.dev/vendors/iCheck/icheck.min.js"></script>
    <!-- PNotify -->
    <script src="http://whiteboardview.dev/vendors/pnotify/dist/pnotify.js"></script>
    <script src="http://whiteboardview.dev/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="http://whiteboardview.dev/vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="http://whiteboardview.dev/build/js/custom.min.js"></script>

    <!-- PNotify -->
    <script>
      
    </script>
    <!-- /PNotify -->

    <!-- Custom Notification -->
    <script src="http://whiteboardview.dev/customnotification.js"></script>
    <!-- /Custom Notification -->
  </body>
</html>