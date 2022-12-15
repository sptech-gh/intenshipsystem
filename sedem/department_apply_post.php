<?php

include 'includes/all.php';
error_reporting(0);
session_start();
if(!$_SESSION['username'] AND !$_SESSION['pin'] ){
    echo "<script>
                window.location='student_login.php';
        </script>";
}

$msg='';
$err='';

$_SESSION['current_page']=$_SERVER['REQUEST_URI'];


//fetch department's adverts by id
$c_apply_ad = Department_Post_Adverts::find_ads_by_department_id($_GET['department_id'],$_GET['id']);
$row = $database->fetch_array($c_apply_ad);

//fetch student details
$std = Student::find_by_id($_SESSION['username']);
$stdnt = $database->fetch_array($std);

?>

<?php

if(isset($_POST['create'])){
     
                    //image upload
                  $fileName =trim($_FILES['image']['tmp_name']);
                    $image = explode(".",trim($_FILES['image']['name']));
                    $new_image = $stdnt['student_id']."_".round(microtime(true)) . '.' . end($image);

                  move_uploaded_file($fileName, "uploads/department/{$new_image}");
     
                    //docx upload
                  $fileName1 =trim($_FILES['docx']['tmp_name']);
                    $docx = explode(".",trim($_FILES['docx']['name']));
                    $new_docx = $stdnt['student_id']."_".round(microtime(true)) . '.' . end($docx);

                  move_uploaded_file($fileName1, "uploads/department/docx/{$new_docx}");
    
                    //pdf upload
                  $fileName2 =trim($_FILES['pdf']['tmp_name']);
                    $pdf = explode(".",trim($_FILES['pdf']['name']));
                    $new_pdf = $stdnt['student_id']."_".round(microtime(true)) . '.' . end($pdf);

                  move_uploaded_file($fileName2, "uploads/department/pdf/{$new_pdf}");
    
                $cmp = new Apply_Department_Advert;
                $cmp->student_id = $database->prep(trim($stdnt['student_id']));
                $cmp->department_post_adverts_id = $database->prep(trim($row['id']));
                $cmp->student_email = $database->prep(trim($_POST['student_email']));
                $cmp->student_telephone = $database->prep(trim($_POST['student_telephone']));
                $cmp->dept_id = $database->prep(trim($row['department_id']));
                $cmp->image = $database->prep(trim($new_image));
                $cmp->docx = $database->prep(trim($new_docx));
                $cmp->pdf = $database->prep(trim($new_pdf));
                
                $result = $cmp->create_apply_department_advert();
                    if ($result) {
                        $msg= "<script>document.write('<strong>SUCCESS! </strong> INTERNSHIP OFFER APPLIED.')</script>";
                    }
                    else{
                        $err= "<script>document.write(<strong>ERROR! </strong> FAILED TO APPLY INTERNSHIP OFFER.')</script> ";
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
<!--
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/initslider-1.js"></script>
  <script src="assets/js/amazingslider.js"></script>
-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
        .primary{
            color: #fff;
            text-align: center;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index">SIM System</a>
    </div>
    <ul class="nav navbar-nav">
<!--
      <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
-->
    </ul>
    <ul class="nav navbar-nav navbar-right">
<!--      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Company's Sign Up</a></li>-->
      <li><a href="logout"><span class="glyphicon glyphicon-off"></span> LogOut</a></li>
    </ul>
  </div>
</nav>
    
    <!-- Apply for Internship-->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                
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
                
                <pre>Apply for Internship</pre>
                <form action="" method="post" enctype="multipart/form-data">
                    Student Name    <input type="text" name="student_name" readonly class="form-control" value="<?php echo $stdnt['student_name']; ?>">
                    Student ID      <input type="text" name="student_id" readonly class="form-control" value="<?php echo $stdnt['student_id']; ?>">
                    Student Email      <input type="email" name="student_email" class="form-control" value="<?php echo $stdnt['student_email']; ?>">
                    Student Telephone Number      <input type="text" name="student_telephone" class="form-control" placeholder="eg: 233549565568">
                    Upload Internship Letter    <input type="file" name="image" class="form-control"> <b>OR</b><br>
                    Upload Internship Letter (.Docx)    <input type="file" name="docx" accept=".docx" class="form-control"> <b>OR</b><br>
                    Upload Internship Letter (.PDF)    <input type="file" name="pdf" accept=".pdf" class="form-control">
                    <div class="form-group" style="margin:5px;">
                        <input type="submit" name="create" class="btn btn-success" value="Submit">
                    </div>
                </form>
            </div>
            
            <!--Display Internship Details-->

            <div class="col-md-6">
                Job Title   : <input type="text" readonly class="form-control" value="<?php echo $row['job_title'] ;?>">
                Deadline   : <input type="text" readonly class="form-control" value="<?php echo $row['deadline'] ;?>">
                Job Detail   : <textarea class="form-control" readonly><?php echo $row['job_details'] ;?></textarea>
            </div>
        </div>
    </div>
    
    
    </body>
</html>