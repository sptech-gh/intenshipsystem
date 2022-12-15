<?php
error_reporting(0);
include 'includes/all.php';
//include 'layout/head2.php';
//include 'layout/sidenav.php';
@session_start();
if(!$_SESSION['username'] AND !$_SESSION['pin'] ){
    echo "<script>
                window.location='student_login.php';
        </script>";
}

$msg='';
$err='';

$_SESSION['current_page']=$_SERVER['REQUEST_URI'];


//fetch comoany's adverts by id
$c_apply_ad = Company_Post_Adverts::find_by_company_id($_GET['company_id'],$_GET['id']);
$row = $database->fetch_array($c_apply_ad);

//fetch company and company posted advert details by id
//$comp = Company::find_by_join($_GET['id']);
//$cmpo = $database->fetch_array($comp);

$comp = Company::find_by_id($_GET['company_id']);
$cmpo = $database->fetch_array($comp);

//fetch student details
$std = Student::find_by_id($_SESSION['username']);
$stdnt = $database->fetch_array($std);
?>

<?php

if(isset($_POST['create'])){
                $cmp = new Apply_Company_Advert;
                    
                    //image upload
                  $fileName =trim($_FILES['image']['tmp_name']);
                    $image = explode(".",trim($_FILES['image']['name']));
                    $new_image = $_POST['student_id']."_".round(microtime(true)) . '.' . end($image);

                  move_uploaded_file($fileName, "uploads/company/{$new_image}");
     
                    //docx upload
                  $fileName1 =trim($_FILES['docx']['tmp_name']);
                    $docx = explode(".",trim($_FILES['docx']['name']));
                    $new_docx = $_POST['student_id']."_".round(microtime(true)) . '.' . end($docx);

                  move_uploaded_file($fileName1, "uploads/company/docx/{$new_docx}");
    
                    //pdf upload
                  $fileName2 =trim($_FILES['pdf']['tmp_name']);
                    $pdf = explode(".",trim($_FILES['pdf']['name']));
                    $new_pdf = $_POST['student_id']."_".round(microtime(true)) . '.' . end($pdf);

                  move_uploaded_file($fileName2, "uploads/company/pdf/{$new_pdf}");
    
                $cmp->company_id = $database->prep(trim($row['company_id']));
                $cmp->student_id = $database->prep(trim($_POST['student_id']));
                $cmp->student_email = $database->prep(trim($_POST['student_email']));
                $cmp->student_telephone = $database->prep(trim($_POST['student_telephone']));
                $cmp->company_post_adverts_id = $database->prep(trim($row['id']));
                $cmp->image = $database->prep(trim($new_image));
                $cmp->docx = $database->prep(trim($new_docx));
                $cmp->pdf = $database->prep(trim($new_pdf));
                
                $result = $cmp->create_apply_advert();
                    if ($result) {
                        $msg= "<script>document.write('<strong>SUCCESS! </strong> APPLICATION SUBMITTED, PLEASE WAIT FOR SMS.')</script>";
                    }
                    else{
                        $err= "<script>document.write('<strong>ERROR! </strong> FAILED TO APPLY INTERNSHIP OFFER.')</script> ";
                    }
            }


//change password
if(isset($_POST['btnChange'])){
    
    $old_pin = $database->prep(trim($_POST['old_pin']));
    $new_pin = $database->prep(trim($_POST['new_pin']));
    $confirm_pin = $database->prep(trim($_POST['confirm_pin']));
    
    $sqll = $database->query_db("SELECT * FROM student WHERE pin='".$old_pin."' && student_id='".$_SESSION['username']."' ");
    
    if($sqll){
    
    if($new_pin == $confirm_pin){
    
    $result = $database->query_db("UPDATE student SET pin='".$new_pin."' WHERE student_id='".$_SESSION['username']."' ");
    
    if($result){
        echo "<script>alert('Password Changed Successfully')</script>";
    }else{
        echo "<script>alert('Something Happened')</script>";
    }
        
    }else{
        echo "<script>alert('Password dont match')</script>";
    }
}else{
         echo "<script>alert('Old Password is incorrect')</script>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="assets/js/jquery.min.js"></script>
<!--
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/initslider-1.js"></script>
  <script src="assets/js/amazingslider.js"></script>
-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    
  <script>
        function popitup(url,windowName) {
           newwindow=window.open(url,windowName,'height=420,width=600');
           if (window.focus) {newwindow.focus()}
           return false;
         }

</script>
    
    
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

<nav class="navbar navbar-inverse " style="background-color:darkcyan; color:#fff;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" style="color:#fff;" href="index">Online Internship Management System</a>
    </div>
    <ul class="nav navbar-nav">
<!--
      <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
-->
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#" data-toggle="modal" data-target="#myModal"  style="color:#fff;"><span class="glyphicon glyphicon-user"></span> Change Password</a></li>
      <li><a href="logout" style="color:#fff;"><span class="glyphicon glyphicon-off"></span> LogOut</a></li>
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
                    Upload Internship Letter (Scanned Image)    <input type="file" name="image" accept="image/*" class="form-control"> 
<!--                    <b>OR</b><br>-->
<!--                    Upload Internship Letter (.Docx)    <input type="file" name="docx" hidden="hidden" accept=".docx" class="form-control"> <b>OR</b><br>-->
<!--                    Upload Internship Letter (.PDF)    <input type="file" name="pdf" hidden="hidden" accept=".pdf" class="form-control">-->
                    <div class="form-group" style="margin:5px;">
                        <input type="submit" name="create" class="btn btn-success" value="Submit">
                    </div>
                </form>
            </div>
            
            <!--Display Company and Internship Details-->
            <div class="col-md-6">
                Company Name  : <p class="alert alert-success" ><?php echo $cmpo['company_name'] ;?></p>
                Company Email  : <p class="alert alert-success" ><?php echo $cmpo['email'] ;?></p>
                Company Address  : <p class="alert alert-success" ><?php echo $cmpo['website'] ;?></p>
                Job Title   : <p class="alert alert-success" ><?php echo $row['job_title'] ;?></p>
                Deadline   : <p class="alert alert-success" ><?php echo $row['deadline'] ;?></p>
                Job Detail   : <p class="alert alert-success" ><?php echo $row['job_details'] ;?></p>
            </div>
        </div>
    </div>
    
 <p class=""><a class="pull-right" style="margin-right:50px;" title="chat" href="chat?company_id=<?php echo $_GET['company_id']; ?>" onclick="return popitup('chat?company_id=<?php echo $_GET['company_id']; ?>','CustomerCare')"><i class="fa fa-envelope fa-4x"></i></a></p>
<?php include 'layout/footer.php';?>
    
    
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="row">
                <div class="col-md-3">
                    Old Password <input type="text" class="form-control" name="old_pin">
              </div> <div class="col-md-3">
                    New Password <input type="text" class="form-control" name="new_pin">
              </div> <div class="col-md-3">
                    Confirm Password <input type="text" class="form-control" name="confirm_pin">
              </div> <div class="col-md-3">
              &nbsp;<br>
                     <input type="submit" class="btn btn-primary" name="btnChange" value="Change">
              </div>
            </div>
          </form>
      </div>
<!--
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
-->
    </div>

  </div>
</div>