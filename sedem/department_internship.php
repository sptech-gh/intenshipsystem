<?php
include 'layout/head.php';
include 'layout/sidenav.php';

//fetch applied internship offers
$intern = Apply_Department_Advert::find_by_join(); 

?> 

<div class="col-md-10 content">
<div class="panel panel-default">
                <div class="panel-heading">
                    Manage Internship Offer
                </div>
                  
        <div class="row text-center" style="padding:10px;">
			
			<div class="col-md-12 ">
				<div class="">
					<table id="example2" class="datatable table table-striped " cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <td></td>
                        <td>Student ID</td>
                        <td>Student Email</td>
                        <td>Student Telephone</td>
                        <td>Job Title</td>
                        <td>Image</td>
                        <td>Date Applied</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    
                    <tbody>
                        <?php while($interns = $database->fetch_array($intern)){ ?>
                    <tr>
                        <td></td>
                        <td><?php echo $interns['student_id']; ?></td>
                        <td><?php echo $interns['student_email']; ?></td>
                        <td><?php echo $interns['student_telephone']; ?></td>
                        <td><?php echo $interns['job_title']; ?></td>
                        <td><img width="50px" height="50px" src="uploads/department/<?php echo $interns['image']; ?>"></td>
                        <td><?php echo date("D d M, Y",strtotime($interns['ad_doe'])); ?></td>
                        <td><?php 
                                            switch ($interns['ad_status']){
                                                case 4:
                                                    echo '<span class = "label label-success">APPROVED</span>';
                                                break;
                                                case 5:
                                                    echo '<span class = "label label-danger">REJECTED</span>';
                                                break;
                                                default:
                                                    echo '<span class="label label-warning">PENDING</span>';
                                            } 
                                ?>
                            </td>
                        <td><a class="btn btn-xs btn-primary" href="department_view_applied_advert?student_id=<?php echo $interns['student_id']; ?>&department_post_adverts_id=<?php echo $interns['department_post_adverts_id']; ?>" ><span class="glyphicon glyphicon-eye-open"></span></a> </td>
                    </tr>
                        <?php } ?>
                    </tbody>
                </table>
				</div>   
            </div>
               
			</div>
		</div>
</div>


<?php include 'layout/footer.php';?>