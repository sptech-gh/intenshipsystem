<?php 

include 'layout/head.php';
include 'layout/sidenav.php';

//$msg='';
//$err='';
//$warn='';

//fetch applied department advert by id
$famp = Apply_Department_Advert::find_by_id($_GET['student_id'],$_GET['department_post_adverts_id']);
$frow = $database->fetch_array($famp);

//fetch student details by id
$stdn = Student::find_by_id($_GET['student_id']);
    $stdnt = $database->fetch_array($stdn);

//fetch post adverts from department
$dep = Department_Post_Adverts::find_by_dep_id($_GET['department_post_adverts_id']);
$dept = $database->fetch_array($dep);

if(isset($_POST['approve'])){
    $std = new Apply_Department_Advert;
    $std->ad_status = $database->prep(trim(APPROVE));
    
    $result = $std->approve_apply_advert($_GET['student_id'],$_GET['department_post_adverts_id']);
    
    //variables for sending sms to students
    $student_name = $stdnt['student_name'];
    $company_name = $dept['company_name'];
    $work_phone = $dept['company_tel'];
    $student_telephone = $frow['student_telephone'];
    $com_date = date("D d M, Y",strtotime($_POST['com_date']));
    
    
		if ($result) {
            
   // $msg= $student_name." -- ". $company_name." -- ".$work_phone." -- ".$student_telephone." -- ".$com_date;
           //sending sms to students
            sendsms($student_name,$company_name,$com_date,$student_telephone,$work_phone);
            
			$msg= "<script>
                    document.write('<strong>SUCCESS! </strong> INTERNSHIP OFFER APPROVED.');
                    window.location='department_internship.php';
                </script>";
		}
		else{
			$warn= "<script>
                    document.write('<strong>ERROR! </strong> FAILED TO APPROVE INTERNSHIP OFFER.');
                    window.location='department_internship.php';
                </script>";
		}
}

if(isset($_POST['reject'])){
    $std = new Apply_Department_Advert;
    $std->ad_status = $database->prep(trim(REJECT));
    
    $result = $std->reject_apply_advert($_GET['student_id'],$_GET['department_post_adverts_id']);
		if ($result) {
			$err= "<script>
                    document.write('<strong>SUCCESS! </strong> INTERNSHIP OFFER REJECTED.');
                    window.location='dashboard.php';
                </script>";
		}
		else{
			$warn= "<script>
                    document.write('<strong>ERROR! </strong> FAILED TO REJECT INTERNSHIP OFFER.');
                    window.location='dashboard.php';
                </script>";
		}
}

?>


<div class="container">
        <div class="row">
            <div class="col-md-6" >
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
                    
                <div class="">
                    <form action="" method="post">
                    <table class="table table-stripped">
                        <tr>
                            <td>Student ID</td>
                            <td><?php echo $frow['student_id']; ?></td>
                        </tr>
                        <tr>
                            <td>Student Name</td>
                            <td><?php echo $stdnt['student_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Student Email</td>
                            <td><?php echo $frow['student_email']; ?></td>
                        </tr>
                        <tr>
                            <td>Telephone / Mobile Number</td>
                            <td><?php echo $frow['student_telephone']; ?></td>
                        </tr>
                        <tr>
                            <td>Date Applied</td>
                            <td><?php echo date("D d M, Y",strtotime($frow['ad_doe'])); ?></td>
                        </tr> 
                        <tr>
                            <td>Date of Commencement</td>
                            <td><input type="text" class="form-control" id="datepicker4" name="com_date" placeholder="eg: 2007-12-25"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" class="btn btn-success" name="approve" value="Approve"> | <input type="submit" class="btn btn-danger" name="reject" value="Reject"></td>
                        </tr>
                        
                    </table> 
                    </form>
                </div>
            </div>
            <div class="col-md-4" >
                <?php if($frow['image']==TRUE){ ?>
                <p><img width="100%" src="uploads/department/<?php echo $frow['image']; ?>" alt="<?php echo $frow['image']; ?>"></p>
                <?php }else{echo "no image sent";} ?>
                
                <?php if($frow['docx']==TRUE){ ?>
                    <a href="uploads/department/docx/<?php echo $frow['docx']; ?>" class="btn btn-primary" download="<?php echo $frow['docx']; ?>"><span class="fa fa-download"></span> Document (.docx)</a>
                <?php }else{echo "";} ?>
                
                 <?php if($frow['pdf']==TRUE){ ?>
                    <a href="uploads/department/pdf/<?php echo $frow['pdf']; ?>" class="btn btn-primary" download="<?php echo $frow['pdf']; ?>"><span class="fa fa-download"></span> PDF (.pdf)</a>
                <?php }else{echo "";} ?>
            </div>
    </div>
    
    </div>

  
<?php include 'layout/footer.php';?>