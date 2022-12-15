<?php 

namespace Dompdf;

include 'layout/head.php';
include 'layout/sidenav.php';


require_once 'assets/dompdf/autoload.inc.php';

//fetch company applied adverts by id
//$famp = Apply_Company_Advert::find_by_id_student($_GET['student_id'],$_GET['id']);
$famp = $database->query_db("SELECT * FROM apply_company_advert WHERE id = '".$_GET['id']."' AND student_id='".$_GET['student_id']."' ");
$frow = $database->fetch_array($famp);

//fetch company detail
//$com = Company::find_by_id($_SESSION['username']);
$com = $database->query_db("SELECT * FROM company WHERE com_id = '".$_SESSION['username']."' ");
$comp = $database->fetch_array($com);

//fetch student details by id
//$std = Student::find_by_id($frow['student_id']);
$std = $database->query_db("SELECT * FROM student WHERE student_id = '".$frow['student_id']."' ");
    $stdnt = $database->fetch_array($std);

if(isset($_POST['approve'])){
    $ac_report = $database->prep(trim($_POST['report']));
    $ac_status = $database->prep(trim($_POST['status']));
    
    //variables for sending sms to students
    $student_name = $stdnt['student_name'];
    $company_name = $comp['company_name'];
    $company_logo = $comp['image'];
    $work_phone = $comp['work_phone'];
    $student_telephone = $frow['student_telephone'];
    $com_date = date("D d M, Y",strtotime($_POST['com_date']));
    $from = $comp['email'];
    $file_nme = $frow['student_id']."__".date('D d M, Y');
    $file_name = $frow['student_id']."__".date('D d M, Y').".pdf";
    
    
    $result = $database->query_db("INSERT INTO student_report(student_id,company_id,report,status,report_file) VALUES('".$frow['student_id']."','".$_SESSION['username']."','$ac_report ','$ac_status','$file_name')");
    
    //variable for sending emails
//    $to = $frow['student_email'];
//    $subject = "INTERNSHIP APPROVAL FROM ".$company_name;
//    $content = 'Congratulation '.$student_name.', you are to start work in '.$company_name.' as an intern on '.$com_date.'. Call '.$work_phone.' for assistance or any information. THANK YOU.';
    
		if ($result) {
            
            //sending email
//            $mail = mail($to,$subject,$content);
//            if($mail){
//                echo 'gud <br>';
//            }else{
//                echo 'bad <br>';
//            }
            
            //sending sms to students
//            sendsms($student_name,$company_name,$com_date,$student_telephone,$work_phone);
            
            
  
$dompdf = new Dompdf();
$dompdf->loadHtml('
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>'.$student_name.'</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/bootstrap-flat.min.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        
        <style>

                @font-face {
                    font-family: "caviar_dreamsregular";
                    src:    url("assets/font1/CaviarDreams.ttf") format("truetype"),
                            url("assets/font1/font/caviardreams-webfont.woff2") format("woff2"),
                            url("assets/font1/font/caviardreams-webfont.woff") format("woff");
                    font-weight: normal;
                    font-style: normal;

                }
            body{
                font-family: "caviar_dreamsregular" ; 
                font-size: 10pt;
            }
            .al ul li{
                list-style: none;
            }
            .terms p{
                font-size: 9pt;
            }
            .terms ol li{
                font-size: 10pt;
            }


        </style>
        
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" style=" border:1px solid transparent">
                    <p style="height:215px;border:1px solid transparent;"><img style="float:right;" height="100px" width="100px" class=""  class="img pull-right" src="uploads/company_logo/'.$company_logo.'"></p>
                    <p style="margin-top:-35px;margin-left:10%;border:1px solid #000;width:100%;padding:10px;"><strong>INTERNSHIP REPORT FOR '.$student_name.' ('.$frow['student_id'].')</strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4 pull-right al" style="padding-top:20px;padding-right:30px;">
                    <ul>
                        <li><strong>Company Name: </strong>'.$company_name.' </li>
                        <li><strong>Company Email:  </strong>'.$from.' </li>
                        <li><strong>Date: </strong> '.date('D d M, Y').'</li>
                        <li><strong>Commencement Date : </strong>'.date("D d M, Y",strtotime($frow['ac_doe'])).' </li>
                        <li><strong>Internship Status : </strong>'.$ac_status.' </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 pull-left" style="font-weight:bold;">
                    To Whom it May Concern
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
            </div>
        
            <div class="row">
                <div class="col-md-12" style="margin-top: 10px;padding-top:10px;">
                    <p>'.$ac_report.'</p>
                
                    <div style="margin-top:40px;">
                        Yours Faithfully,<br>
                        For and on Behalf of '.$company_name.'

                    </div>
                </div>
            </div>
            
           
        </div>
    </body>
</html>
');
$dompdf->setPaper('A4','portrait');
$dompdf->render();
//$dompdf->stream("",array("Attachment"=>false));
//exit(0);

$output = $dompdf->output();
$final = file_put_contents('assets/document/'.$file_nme.''.'.pdf', $output);

   
            
			echo "<script>
                    alert('REPORT SUBMITTED');
                    window.location='dashboard.php';
                </script>";
		}
		else{
			$err= "<script>
                    document.write('FAILED TO SUBMIT REPORT');
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
                
                <?php if($warn){ ?>
                    <h5 class="text-center alert alert-warning alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-lable="close">&times;</a>
                        <?php echo $err; ?>
                    </h5>
                <?php } ?>
                    <!--- End of Printing messages to the user-->
                
                <div class="">
                    <h3>Intern's Report</h3>
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
                            <td>Date Approved</td>
                            <td><?php echo date("D d M, Y",strtotime($frow['ac_doe'])); ?></td>
                        </tr> 
                        <tr>
                            <td>Internship Status</td>
                            <td><select class="form-control" name="status">
                                    <option></option>
                                    <option>Completed</option>
                                    <option>Ungoing</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Reporting Date</td>
                            <td>
<!--                                <input type="text" id="datepicker5" class="form-control" name="com_date" placeholder="eg: 2007-12-25" readonly value="">-->
                                <?php echo date('D d M, Y'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Report<textarea class="form-control" name="report" cols="10" rows="10" ></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" class="btn btn-primary" name="approve" value="Send Report"> </td>
                        </tr>
                        
                    </table> 
                    </form>
                </div>
            </div>
    </div>

    </div>

  

</body>
</html>