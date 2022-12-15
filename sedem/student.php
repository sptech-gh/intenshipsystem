<?php
include 'includes/all.php';

$msg='';
$err='';

if(isset($_POST['create'])){
                $cmp = new Student;
                $cmp->student_id = $database->prep(trim($_POST['student_id']));
                $cmp->student_name = $database->prep(trim($_POST['student_name']));
                $cmp->student_department = $database->prep(trim($_POST['student_department']));
                $cmp->student_program = $database->prep(trim($_POST['student_program']));
                $cmp->student_email = $database->prep(trim($_POST['student_email']));
                $cmp->pin = $database->prep(trim($_POST['pin']));
//                $cmp->status = $database->prep(trim(STUDENT));
    
                $user = new Users;
                    $user->username = $database->prep(trim($_POST['student_id']));
                    $user->pin = $database->prep(trim($_POST['pin']));
                    $user->access_level = $database->prep(trim(STUDENT));
                    $user->create_user();
                
                $result = $cmp->create_student();
                    if ($result) {
                        $msg= "<script>document.write('<strong>SUCCESS! </strong> STUDENT CREATED.')
                                         window.location='student_login';</script>";
                    }
                    else{
                        $err= "<script>document.write(<strong>ERROR! </strong> FAILED TO CREATE STUDENT.')</script> ";
                    }
            }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>SIM System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
        <style>
            body {
                margin: 0px auto;
                padding: 0px auto;
                background-image: url(assets/images/firstgenerationcollege.jpg);
                color: #000;
                /*                text-shadow: 1spx 1px 1px #000;*/
                background-size: cover;
                background-repeat: no-repeat;
                font-weight: bold;
                font-size: 18px;
            }

            .primary {
                color: #fff;
                text-align: center;
                text-decoration: underline;
            }

            a {
                text-decoration: none;
                color: #000;
            }

            a:hover {
                color: #000;
            }

            .reqiure {
                color: red;
            }

        </style>
    </head>

    <body>
        <div class="container">
            <div class="row" style="padding-top:10%;padding-bottom:9%;">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="background-color:rgba(255, 255, 255, 0.82);">
                    <h3 class="text-center"><u>Register Student</u></h3>

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
                        Student ID<small class="reqiure">*</small>: <input type="text" name="student_id" required class="form-control" Pattern="[0-9]{8}" maxlength="8" title="Input must be numeric only of 8 characters!"> Student Name<small class="reqiure">*</small>: <input type="text" name="student_name" required class="form-control" Pattern="[a-Z]+" title="Input must contain alphabets only!"> Student Department<small class="reqiure">*</small>: <input type="text" name="student_department" required class="form-control" Pattern="[a-Z]+" title="Input must contain alphabets only!"> Student Program<small class="reqiure">*</small>: <input type="text" name="student_program" required class="form-control" Pattern="[a-Z]+" title="Input must contain alphabets only!"> Student Email<small class="reqiure">*</small>: <input type="email" name="student_email" class="form-control" title="Email must be in the form example@example.com"> Student Pin<small class="reqiure">*</small>: <input type="password" name="pin" required maxlength="5" minlength="5" Pattern="[0-9]{5}" class="form-control" title="Input must numeric only and of 5 characters!"><br>
                        <input type="submit" name="create" value="Create" class="form-control btn btn-primary">
                    </form>
                    <small>&copy; Student Internship Management System <?php echo date('Y'); ?>.</small>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>

    </html>
