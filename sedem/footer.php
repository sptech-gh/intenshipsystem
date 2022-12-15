<?php
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



<footer class="pull-left footer">
  			<p class="col-md-12">
  				<hr class="divider">
  				Copyright &COPY; 2017 <a href="#">Online Internship Management System</a>
  			</p>
  		</footer>
  	</div>
<script src="assets/js/easypiechart.js"></script>
<script src="assets/js/easypiechart-data.js"></script>
<script type="text/javascript">
$(function () {
  	$('.navbar-toggle-sidebar').click(function () {
  		$('.navbar-nav').toggleClass('slide-in');
  		$('.side-body').toggleClass('body-slide-in');
  		$('#search').removeClass('in').addClass('collapse').slideUp(200);
  	});

  	$('#search-trigger').click(function () {
  		$('.navbar-nav').removeClass('slide-in');
  		$('.side-body').removeClass('body-slide-in');
  		$('.search-input').focus();
  	});
  });
    
        $(document).ready(function() {
    $('#example').DataTable();
        $('#example2').DataTable();
} );
</script>
</body>
</html>