   
<?php
include 'includes/all.php';
/*
add company details to company table 
or
creating new company
*/

if(isset($_POST['create'])){
                $cmp = new Company;
                $cmp->com_id = $database->prep(trim($_POST['com_id']));
                $cmp->company_name = $database->prep(trim($_POST['company_name']));
                $cmp->region = $database->prep(trim($_POST['region']));
                $cmp->work_phone = $database->prep(trim($_POST['work_phone']));
                $cmp->email = $database->prep(trim($_POST['email']));
                $cmp->website = $database->prep(trim($_POST['website']));
                $cmp->about = $database->prep(trim($_POST['about']));
                $cmp->reg_ref_number = $database->prep(trim($_POST['reg_ref_number']));
                $cmp->pin = $database->prep(trim($_POST['pin']));
                $cmp->status = $database->prep(trim(COMPANY));
                //$cmp->app_status = $database->prep(trim(1));
    

                //file upload
                    $fileName =trim($_FILES['image']['tmp_name']);
                    $image = trim($_FILES['image']['name']);

                    move_uploaded_file($fileName, "uploads/company_logo/{$image}");
                    
                $cmp->image = $database->prep($image);
                    
                $user = new Users;
                    $user->username = $database->prep(trim($_POST['com_id']));
                    $user->pin = $database->prep(trim($_POST['pin']));
                    $user->access_level = $database->prep(trim(COMPANY));
                    $user->create_user();
                    
                    $ck = $cmp->chk(email,$work_phone);
    
                if(!$ck){
                
                $result = $cmp->create_company();
                    if ($result) {
                        $msg= "<script>document.write('<strong>SUCCESS! </strong> COMPANY CREATED.')</script>";
                    }
                    else{
                        $err= "<script>alert(<strong>ERROR! </strong> FAILED TO CREATE COMPANY.')</script> ";
                    }
                    
                }else{
                    $err= "<script>alert(<strong>ERROR! </strong> COMPANY ALREADY REGISTERED.')</script> ";
                }
            }


//company post intern offer
if(isset($_POST['create_comp_intern'])){
                $cmp = new Company_Post_Adverts;
                $cmp->job_title = $database->prep(trim($_POST['job_title']));
                $cmp->job_details = $database->prep(trim($_POST['job_details']));
                $cmp->deadline = $database->prep(trim($_POST['deadline']));
                $cmp->company_id = $database->prep(trim($_SESSION['username']));
                

                $result = $cmp->create_company_post_advert();
                    if ($result) {
                        $msg= "<strong>SUCCESS! </strong> INTERNSHIP ADVERT CREATED.";
                    }
                    else{
                        $err= "<strong>ERROR! </strong> FAILED TO SAVE INTERNSHIP ADVERT.";
                    }
            }

//post departmental news
if(isset($_POST['create_news'])){
    
    //file upload
        $fileName =trim($_FILES['image']['tmp_name']);
        $image = trim($_FILES['image']['name']);

        move_uploaded_file($fileName, "uploads/department/news/{$image}");
    
    $news_std = new News;
    $news_std->news_title = $database->prep(trim($_POST['news_title']));
    $news_std->news_details = $database->prep(trim($_POST['news_details']));
    $news_std->start_date = $database->prep(trim($_POST['start_date']));
    $news_std->end_date = $database->prep(trim($_POST['end_date']));
    $news_std->posted_by = $database->prep(trim($_POST['posted_by']));
    $news_std->image = $database->prep(trim($image));

    
    $result = $news_std->create_news();
		if ($result) {
			$msg="<script>
                    document.write('<strong>SUCCESS! </strong> NEWS POSTED SUCCESSFULLY.');
                    window.location='dashboard.php';
                </script>";
		}
		else{
			$err= "<script>
                    document.write('<strong>ERROR! </strong> FAILED TO POST NEWS.');
                    window.location='dashboard.php';
                </script>";
		}
}


//post departmental internship offer
if(isset($_POST['create_dept_internship'])){
    $intern_std = new Department_Post_Adverts;
    $intern_std->job_title = $database->prep(trim($_POST['job_title']));
    $intern_std->job_details = $database->prep(trim($_POST['job_details']));
    $intern_std->deadline = $database->prep(trim($_POST['deadline']));
    $intern_std->company_name = $database->prep(trim($_POST['company_name']));
    $intern_std->company_email = $database->prep(trim($_POST['company_email']));
    $intern_std->company_address = $database->prep(trim($_POST['company_address']));
    $intern_std->company_tel = $database->prep(trim($_POST['company_tel']));
    $intern_std->company_website = $database->prep(trim($_POST['company_website']));
    $intern_std->department_id = $database->prep(trim($_SESSION['username']));
    
    $result = $intern_std->create_department_post_advert();
		if ($result) {
			$msg= "<script>
                    document.write('<strong>SUCCESS! </strong>INTERNSHIP OFFER POSTED SUCCESSFULLY.');
                    window.location='dashboard.php';
                </script>";
		}
		else{
			$err= "<script>
                    document.write('<strong>ERROR! </strong> FAILED TO POST INTERNSHIP.');
                    window.location='dashboard.php';
                </script>";
		}
}

?>

<!DOCTYPE html>
<!-- saved from url=(0030)http://portal.datalink.edu.gh/ -->
<html lang="en-US"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="keywords" content="Datalink, Datalink institute portal , Student portal">
      <title>Data Link Admissions Portal</title>
      <link rel="stylesheet" href="./Data Link Admissions Portal_files/components.css">
      <link rel="stylesheet" href="./Data Link Admissions Portal_files/icons.css">
      <link rel="stylesheet" href="./Data Link Admissions Portal_files/responsee.css">
<link rel="shortcut icon" href="http://portal.datalink.edu.gh/portal/images/dli.ico">
	
      <link rel="stylesheet" href="./Data Link Admissions Portal_files/owl.carousel.css">
      <link rel="stylesheet" href="./Data Link Admissions Portal_files/owl.theme.css">
      <!-- CUSTOM STYLE -->
      <link rel="stylesheet" href="./Data Link Admissions Portal_files/template-style.css">
      <link href="./Data Link Admissions Portal_files/css" rel="stylesheet" type="text/css">
      <script type="text/javascript" src="./Data Link Admissions Portal_files/jquery-1.8.3.min.js.download"></script>
      <script type="text/javascript" src="./Data Link Admissions Portal_files/jquery-ui.min.js.download"></script>
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
    <style>
        p{
            font-size: 14px;
        }
    </style>
   </head>

   <body class="size-1140" style="font-size:18px;">
      <!-- TOP NAV WITH LOGO -->
      <header>
         <nav>
            <div class="line">
               <div class="top-nav">
                  <div class="logo hide-l">
                     <a href="http://portal.datalink.edu.gh/#">DATALINK <br><strong>INSTITUTE</strong></a>
                  </div>
                  <p class="nav-text">Custom menu text</p>
                  <div class="top-nav s-12 l-5">
                     <ul class="right top-ul chevron">
                        <li><a href="http://portal.datalink.edu.gh/#">Home</a>
                        </li>

                     </ul>
                  </div>
                  <ul class="s-12 l-2">
                     <li class="logo hide-s hide-m">
                        <a href="http://datalink.edu.gh/" target="_blank">DATALINK <br><strong>INSTITUTE</strong></a>
                     </li>
                  </ul>
                  <div class="top-nav s-12 l-5">
                     <ul class="top-ul chevron">
                        <li> <a href="http://datalink.edu.gh/" target="_blank">Contact</a>
                        </li>

                     </ul>
                  </div>
               </div>
            </div>
         </nav>
      </header>
      <section>
         <!-- CAROUSEL -->
         <div id="carousel">
            <div id="owl-demo" class="owl-carousel owl-theme" style="opacity: 1; display: block;">

               <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 5332px; left: 0px; display: block; transition: all 1000ms ease; transform: translate3d(0px, 0px, 0px);"><div class="owl-item" style="width: 1333px;"><div class="item">
                  <img src="./Data Link Admissions Portal_files/1.jpg" alt="">
                  <div class="carousel-text">
                     <div class="line">
                        <div class="s-12 l-9">
                           <h2>Welcome to the Internship Portal of</h2>
                        </div>
                        <div class="s-12 l-9">
                           <p>Datalink Institute
                           </p>
                        </div>
                     </div>
                  </div>
               </div></div><div class="owl-item" style="width: 1333px;"><div class="item">
                  <img src="./Data Link Admissions Portal_files/6.jpg" alt="">
                  <div class="carousel-text">
                     <div class="line">
                        <div class="s-12 l-9">
                           <h2>Be part of</h2>
                        </div>
                        <div class="s-12 l-9">
                           <p>Our Communuity
                           </p>
                        </div>
                     </div>
                  </div>
               </div></div></div></div>
               
            </div>
         </div>
         <!-- FIRST BLOCK -->
         <div id="first-block" style="text-align:center;">
            <div class="line">
               <h2 style="margin-bottom:20px;">Data Link Internship Portal</h2>
<!--
               <p class="subtitile">
Welcome to the DLI Internship Portal. Please select one of the following options.
               </p>
-->
               <div class="margin">
                  <div class="s-12 m-6 l-3 margin-bottom">
                    <a href="#" data-toggle="modal" data-target="#signupcompany"> <i class="icon-users icon2x"></i>
                     <h3>COMPANY REGISTRATION</h3>
<!--
                     <p>Click to sign up your company
                     </p>
-->
                      </a>
                  </div>
				  <!--
                  <div class="s-12 m-6 l-3 margin-bottom">
                   <a href="calender.php">
                     <i  class="icon-calendar icon2x"></i>
                     <h3>Acadamic Calander</h3>
                     <p>Click to view Acadamic Calender
                     </p></a>
                  </div>
                  <div class="s-12 m-6 l-3 margin-bottom">
                   <a href="#">
                     <i class="icon-calendar icon2x"></i>
                     <h3>Available Courses</h3>
                     <p>Click to view avaliable courses
                     </p></a>
                  </div>
				  -->
                  <div class="s-12 m-6 l-3 margin-bottom">
                   <a href="login" target="_blank">
                     <i class="icon-signin icon2x"></i>
                     <h3>Company Login</h3>
<!--
                     <p>Click to sign in company
                     </p>
-->
                      </a>

                  </div>
                   
                  <div class="s-12 m-6 l-3 margin-bottom">
                   <a href="login" target="_blank">
                     <i class="icon-signin icon2x"></i>
                     <h3>Administrator Login</h3>
<!--
                     <p>Click to sign in Administrator
                     </p>
-->
                      </a>

                  </div>
               </div>
            </div>
         </div>



      </section>
      <!-- FOOTER -->
      <footer>
         <div class="line">
            <div class="s-12 l-6">
               <p>Copyright 2018, Datalink Institute
               </p>
            </div>
         </div>
      </footer>
      <script type="text/javascript" src="./Data Link Admissions Portal_files/responsee.js.download"></script>
      <script type="text/javascript" src="./Data Link Admissions Portal_files/owl.carousel.js.download"></script>
      <script type="text/javascript">
         jQuery(document).ready(function($) {
           $("#owl-demo").owlCarousel({
           	slideSpeed : 300,
           	autoPlay : true,
           	navigation : false,
           	pagination : false,
           	singleItem:true
           });
           $("#owl-demo2").owlCarousel({
           	slideSpeed : 300,
           	autoPlay : true,
           	navigation : false,
           	pagination : true,
           	singleItem:true
           });
         });

      </script>

<!-- Modal -->
  <div class="modal fade" id="comp_intern" role="dialog">
    <div class="modal-dialog">
        
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Post Internship Announcement</h4>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            Job Title       <input type="text" name="job_title" class="form-control">
            Job Description <textarea class="form-control" rows="5" id="comment" name="job_details"></textarea>
            Deadline       <input type="date" name="deadline" class="form-control">
            
        </div>
        <div class="modal-footer">
          <input type="submit" name="create_comp_intern" class="btn btn-primary" value="Send">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
            </form>
      </div>
      
    </div>
  </div>
<!-- End Company Post Internship -->


<!-- Modal for department internship offers-->
  <div class="modal fade" id="announcement" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Post Internship Announcement</h4>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            Job Title       <input type="text" name="job_title" class="form-control">
            Job Description <textarea class="form-control" rows="3" id="job_details" name="job_details"></textarea>
            Deadline       <input type="date" name="deadline" class="form-control">
            Company's Name       <input type="text" name="company_name" class="form-control">
            Company's Email       <input type="email" name="company_email" class="form-control">
            Company's Address       <input type="text" name="company_address" class="form-control">
            Company's Tel       <input type="tel" name="company_tel" class="form-control">
            Company's Website       <input type="text" name="company_website" class="form-control">
            
        </div>
        <div class="modal-footer">
          <button type="submit" name="create_dept_internship" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span>Send</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
            </form>
      </div>
      
    </div>
  </div>
<!-- End-->


<!-- Modal for news -->
  <div class="modal fade" id="departmental_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Post Departmental News</h4>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
            News Title       <input type="text" name="news_title" class="form-control">
            Detailed News <textarea class="form-control" rows="5" id="comment" name="news_details"></textarea>
            Start Date       <input type="date" name="start_date" class="form-control">
            End Date       <input type="date" name="end_date" class="form-control">
            Posted By       <input type="text" name="posted_by" class="form-control">
            Upload Image       <input type="file" name="image" class="form-control">
            
        </div>
        <div class="modal-footer">
          <button type="submit" name="create_news" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span>Send</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
            </form>
      </div>
      
    </div>
  </div>

 
    <!-- Modal for sign up company -->
  <div class="modal fade pull-right" id="signupcompany" role="dialog">
    <div class="modal-dialog">
        
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register Company</h4>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
            Company User ID <small style="color:red;">Please keep your COMPANY USER ID safely or write it down</small>      <input type="text" name="com_id" class="form-control" readonly value="<?php echo mt_rand(1,9).mt_rand(1,9).mt_rand(1,9).mt_rand(1,9).mt_rand(1,9).mt_rand(1,9).mt_rand(1,9).mt_rand(1,9); ?>">
              Company Name<small class="reqiure">*</small>       <input type="text" name="company_name" class="form-control">
               Region<small class="reqiure">*</small>       <input type="text" name="region" class="form-control" pattern="[a-Z]" title="Inputs must contain alphabets only">
               Company Telephone<small class="reqiure">*</small>       <input type="tel" name="work_phone" class="form-control">
               Company Email<small class="reqiure">*</small>       <input type="email" name="email" class="form-control">
               Company Website       <input type="text" name="website" class="form-control">
            About Us<small class="reqiure">*</small>  <textarea class="form-control" rows="5" id="comment" name="about"></textarea>
            Company Registration ID <small class="reqiure">*</small>      <input type="text" name="reg_ref_number" class="form-control" required>
            PIN <small class="reqiure">*</small>      <input type="password" name="pin" class="form-control">
            Upload Logo  <small class="reqiure">*</small>      <input type="file" name="image" class="form-control">
            
            
        </div>
        <div class="modal-footer">
          <input type="submit" name="create" class="btn btn-primary" value="Send">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
            </form>
      </div>
      
    </div>
  </div>
</body></html>