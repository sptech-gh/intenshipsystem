<?php

include 'includes/all.php';
session_start();

$msg='';
$err='';

//Student login
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
            
            switch($_SESSION['access_level']){
                
                case 3:
                    header("Location:". $_SESSION['current_page']);
                    break;
                default:
                    $err= "<script>
                        document.write('Enter User ID and Pin');
                    </script>";
            }
            
        }else{
            $err= "<script>
                        document.write('ERROR: Check User ID and Pin');
                    </script>";
        }
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>DIS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  
<!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <style>
       body{
            margin: 0px auto;
            padding: 0px auto;
            background-image: url(assets/images/dli-logo.png);
           color: #fff;
           text-shadow: 1px 1px 1px #000;
            background-size: contain;
/*            background-repeat: no-repeat;*/
        }
        .primary{
            color: #fff;
            text-align: center;
            text-decoration: underline;
        }
        a{
            text-decoration: none;
            color: #fff;
        }
        a:hover{
            color: #fff;
        }

    </style>
</head>
    <body>
         
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="background-color:transparent;height:300px;">
                    <h3 class="text-center alert alert-primary">Sign In</h3>
                    
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
                    
                    <form action="" method="post">
                       <br><br><div class="input-group input-group-md">
                            <span class="input-group-addon">
                                <i class="fa fa-user" style="color:#fff;"></i>
                            </span>
                        <input type="text" name="txtstudent_id" required class="form-control" Pattern="[0-9]{8}" maxlength="8" title="Input must be numeric only of 8 characters!" placeholder="Enter Student ID">
                        </div><br>
                        <div class="input-group input-group-md">
                            <span class="input-group-addon">
                                <i class="fa fa-lock" style="color:#fff;"></i>
                            </span>
                        <input type="password" name="txtpassword" required maxlength="5" minlength="5" Pattern="[0-9]{5}" class="form-control" title="Input must numeric only and of 5 characters!" placeholder="Enter Student Pin Number">
                        </div><br>
                        <button type="submit" class="form-control btn btn-primary" name="login"><span class="fa fa-unlock"></span> Login</button>
                    </form>
<!--                    <p class=""><a href="student"><small>CLICK HERE TO REGISTER STUDENT</small></a></p>-->
                    <p class=""><small class="text-center">&copy; Student Internship Management System <?php echo date('Y'); ?>.</small></p>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        
    </body>
</html>