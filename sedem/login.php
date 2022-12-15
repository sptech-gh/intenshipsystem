<?php
include 'includes/all.php';
session_start();


$msg='';
$err='';

//Company and Admin Login
if(isset($_POST['login'])){
    $username = $database->prep(trim($_POST['txtstudent_id']));
    $pin = $database->prep(trim($_POST['txtpassword']));
    
    $result = $database->query_db("SELECT * FROM users WHERE username='".$username."' AND pin='".$pin."'");
    $chk_num_rows = $database->num_rows($result);
    
        if($chk_num_rows){
            $user = $database->fetch_array($result);
            $_SESSION['username']=$username;
            $_SESSION['pin']=$pin;
            $_SESSION['access_level']=$user['access_level'];
            $_SESSION['app_status']=$user['app_status'];
            
            switch($_SESSION['access_level']){
                case 1:
                    $msg = "<script>
                            document.write('LoggedIn Successfully');
                            window.location='dashboard';
                        </script>";
                    break;
                case 2:
                    $msg = "<script>
                            document.write('LoggedIn Successfully');
                            window.location='dashboard';
                        </script>";
                    break;
                case 3:
                    $msg ="<script>
                            document.write('LoggedIn Successfully');
                            window.location='apply_post';
                        </script>";
                    break;
                default:
                    $err = "Enter User ID and Pin";
            }
            
        }else{
            $err = "ERROR: Check User ID and Pin";
        }
    
}

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Login | Online Internship Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css">
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <style type="text/css">
            body {
                background: #eee url(assets/images/dli-logo.png);
                background-size: contain;
            }

            html,
            body {
                position: relative;
                height: 100%;
            }

            .login-container {
                position: relative;
                width: 400px;
                margin: 80px auto;
                padding: 20px 40px 40px;
                text-align: center;
                background: #fff;
                border: 1px solid #ccc;
            }

            #output {
                position: absolute;
                width: 300px;
                top: -75px;
                left: 0;
                color: #fff;
            }

            #output.alert-success {
                background: rgb(25, 204, 25);
            }

            #output.alert-danger {
                background: rgb(228, 105, 105);
            }


            .login-container::before,
            .login-container::after {
                content: "";
                position: absolute;
                width: 100%;
                height: 100%;
                top: 3.5px;
                left: 0;
                background: #fff;
                z-index: -1;
                -webkit-transform: rotateZ(4deg);
                -moz-transform: rotateZ(4deg);
                -ms-transform: rotateZ(4deg);
                border: 1px solid #ccc;

            }

            .login-container::after {
                top: 5px;
                z-index: -2;
                -webkit-transform: rotateZ(-2deg);
                -moz-transform: rotateZ(-2deg);
                -ms-transform: rotateZ(-2deg);

            }

            .avatar {
                width: 100px;
                height: 100px;
                margin: 10px auto 30px;
                border-radius: 100%;
                border: 2px solid #aaa;
                background-size: cover;
            }

            .form-box input {
                width: 100%;
                padding: 10px;
                height: 60px;
                border: 1px solid #ccc;
                background: #fafafa;
                transition: 0.2s ease-in-out;

            }

            .form-box input:focus {
                outline: 0;
                background: #eee;
            }

            .form-box input[type="text"] {
                border-radius: 5px 5px 0 0;
                text-transform: none;
                font-size: 16px;
            }

            .form-box input[type="password"] {
                border-radius: 0 0 5px 5px;
                border-top: 0;
            }

            .form-box button.login {
                margin-top: 15px;
                padding: 10px 20px;
            }

            .animated {
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
            }

            @-webkit-keyframes fadeInUp {
                0% {
                    opacity: 0;
                    -webkit-transform: translateY(20px);
                    transform: translateY(20px);
                }

                100% {
                    opacity: 1;
                    -webkit-transform: translateY(0);
                    transform: translateY(0);
                }
            }

            @keyframes fadeInUp {
                0% {
                    opacity: 0;
                    -webkit-transform: translateY(20px);
                    -ms-transform: translateY(20px);
                    transform: translateY(20px);
                }

                100% {
                    opacity: 1;
                    -webkit-transform: translateY(0);
                    -ms-transform: translateY(0);
                    transform: translateY(0);
                }
            }

            .fadeInUp {
                -webkit-animation-name: fadeInUp;
                animation-name: fadeInUp;
            }


            .password {
                position: relative;
            }

            .password input[type="password"] {
                padding-right: 30px;
                font-size: 18px;
            }

            .password .glyphicon,
            #password2 .glyphicon {
                display: none;
                right: 15px;
                position: absolute;
                top: 25px;
                cursor: pointer;
            }

        </style>

    </head>

    <body>
        <div class="container">
            <div class="login-container">

                <div id="error">
                    <!---Printing messages to the user-->
                    <?php if($msg){ ?>
                    <h5 class="text-center alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-lable="close">&times;</a>
                        <?php echo $msg; ?>
                    </h5>
                    <?php } ?>

                    <?php if($err){ ?>
                    <h5 class="text-center alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-lable="close">&times;</a>
                        <?php echo $err; ?>
                    </h5>
                    <?php } ?>
                    <!--- End of Printing messages to the user-->

                </div>
                <div class="avatar"></div>
                <div class="form-box" id="box"><br><br>
                    <form action="" method="post">
                        <input type="text" placeholder="username" name="txtstudent_id" Pattern="[0-9]{8}" maxlength="8" title="Input must be numeric only of 8 characters!" required>
                        <div class="password">
                            <input type="password" id="passwordfield" placeholder="password" name="txtpassword" required maxlength="5" minlength="5" Pattern="[0-9]{5}" class="form-control" title="Input must numeric only and of 5 characters!">
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </div><br><br>
                        <button class="btn btn-info btn-block login" name="login" id="login" type="submit">Login</button>

                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $("#passwordfield").on("keyup", function() {
                if ($(this).val())
                    $(".glyphicon-eye-open").show();
                else
                    $(".glyphicon-eye-open").hide();
            });
            $(".glyphicon-eye-open").mousedown(function() {
                $("#passwordfield").attr('type', 'text');
            }).mouseup(function() {
                $("#passwordfield").attr('type', 'password');
            }).mouseout(function() {
                $("#passwordfield").attr('type', 'password');
            });

        </script>
    </body>

    </html>
