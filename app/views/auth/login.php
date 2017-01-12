<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.01.2017
 * Time: 15:57
 */
//var_dump($_POST);
?>
<!--<form action="" method="post">-->
<!--    <input type="text" name="login" placeholder="login">-->
<!--    <input type="text" name="password" placeholder="password">-->
<!--    <input type="submit" name="send" value="login">-->
<!--</form>-->
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
    <!-- Animate.css -->
    <link href="http://<?php echo SITE_URL;?>/whiteboardview/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="http://<?php echo SITE_URL;?>/whiteboardview/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="" method="post">
                    <h1>Login Form</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Login" required="" name="login" />
                    </div>
                    <div>
                        <input type="password" class="form-control"  placeholder="Password" required="" name="password" />
                    </div>
                    <div>
                        <input type="submit" name="send" value="login!!!!">
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="#signup" class="to_register"> Create Account </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form action="" method="post">
                    <h1>Create Account</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Login" required="" name="login"/>
                    </div>
<!--                    <div>-->
<!--                        <input type="email" class="form-control" placeholder="Email" required="" />-->
<!--                    </div>-->
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" name="password"/>
                    </div>
                    <div>
<!--                        <a class="btn btn-default submit" href="index.html">Submit</a>-->
                        <input type="submit" name="send" value="login">
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="#signin" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>