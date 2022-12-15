<?php 

include 'layout/head.php';
include 'layout/sidenav.php';

//$msg='';
//$err='';
//$warn='';

//fetch company applied adverts by id
$famp = Apply_Company_Advert::find_by_id($_GET['id']);
$frow = $database->fetch_array($famp);

//fetch company detail
$com = Company::find_all($_SESSION['username']);
$comp = $database->fetch_array($com);

//fetch student details by id
$std = Student::find_by_id($frow['student_id']);
    $stdnt = $database->fetch_array($std);

if(isset($_POST['approve'])){
    $std = new Apply_Company_Advert;
    $std->ac_status = $database->prep(trim(APPROVE));
    
    $result = $std->approve_apply_advert($_GET['id']);
    
    //variables for sending sms to students
    $student_name = $stdnt['student_name'];
    $company_name = $comp['company_name'];
    $work_phone = $comp['work_phone'];
    $student_telephone = $frow['student_telephone'];
    $com_date = date("D d M, Y",strtotime($_POST['com_date']));
    
    //variable for sending emails
    $to = $frow['student_email'];
    $from = $comp['email'];
    $subject = "INTERNSHIP APPROVAL FROM ".$company_name;
    $content = 'Congratulation '.$student_name.', you are to start work in '.$company_name.' as an intern on '.$com_date.'. Call '.$work_phone.' for assistance or any information. THANK YOU.';
    
		if ($result) {
            
            //sending email
            $mail = mail($to,$subject,$content);
            if($mail){
                echo 'gud <br>';
            }else{
                echo 'bad <br>';
            }
            
            //sending sms to students
            sendsms($student_name,$company_name,$com_date,$student_telephone,$work_phone);
            
			$msg= "<script>
                    document.write('INTERNSHIP OFFER APPROVED');
                    window.location='dashboard.php';
                </script>";
		}
		else{
			$err= "<script>
                    document.write('FAILED TO APPROVE INTERNSHIP OFFER');
                    window.location='dashboard.php';
                </script>";
		}
}


if(isset($_POST['reject'])){
    $std = new Apply_Company_Advert;
    $std->ac_status = $database->prep(trim(REJECT));
    
    $result = $std->reject_apply_advert($_GET['id']);
		if ($result) {
			$err= "<script>
                    document.write('INTERNSHIP OFFER REJECTED');
                    window.location='dashboard.php';
                </script>";
		}
		else{
			$warn= "<script>
                    document.write('FAILED TO REJECT INTERNSHIP OFFER');
                    window.location='dashboard.php';
                </script>";
		}
}

?>


<div class="container">
        <div class="row">
            <div class="col-md-6" >
                
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
                            <td><?php echo date("D d M, Y",strtotime($frow['ac_doe'])); ?></td>
                        </tr> 
                        <tr>
                            <td>Date of Commencement</td>
                            <td><input type="date" class="form-control" name="com_date" placeholder="eg: 2007-12-25"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" class="btn btn-success" name="approve" value="Approve"> | <input type="submit" class="btn btn-danger" name="reject" value="Reject"></td>
                        </tr>
                        
                    </table> 
                    </form>
                </div>
            </div>
            <div class="col-md-6" >
                <?php if($frow['c_image']==TRUE){ ?>
                    <p> <img width="100%" src="uploads/company/<?php echo $frow['c_image']; ?>" alt="<?php echo $frow['id']; ?>"></p>
                <?php }else{echo "no image sent.";} ?>
                
                
                <a href="" class="btn btn-primary"><span class="fa fa-download"></span> Document (.docx)</a>
                <a href="" class="btn btn-primary"><span class="fa fa-download"></span> PDF (.pdf)</a>
            </div>
    </div>

    </div>

  
<?php include 'layout/footer.php';?>