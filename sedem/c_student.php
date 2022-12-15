<?php
include 'layout/head.php';
include 'layout/sidenav.php';

//fetch company applied adverts
//$fcmp = Apply_Company_Advert::find_by_company_id($_SESSION['username']);
$fcmp = $database->query_db("SELECT * FROM apply_company_advert WHERE ac_status='4' && company_id='".$_SESSION['username']."' && int_status='on-going'");

?> 

<div class="col-md-10 content">
<div class="panel panel-default">
                <div class="panel-heading">
                    Manage Intern
                </div>
                  
        <div class="row text-center" style="padding:10px;">
			
			<div class="col-md-12 ">
				<div class="">
					<table id="example2" class="datatable table table-striped " cellspacing="0" width="100%">
                    <thead>    
                        <tr>
                            <td>S/N</td>
                            <td>Student Full Name</td>
                            <td>Department</td>
                            <td>Program</td>
                            <td>Date Approved</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($fetch_ad = $database->fetch_array($fcmp)){ 
                            
                            $stdnt = Student::find_by_id($fetch_ad['student_id']);
                            $std = $database->fetch_array($stdnt);
                        ?>
                        <tr>
                            <td><?php echo $fetch_ad['student_id']; ?></td>
                            <td><?php echo $std['student_name']; ?></td>
                            <td><?php echo $std['student_department']; ?></td>
                            <td><?php echo $std['student_program']; ?></td>
                            <td><?php echo date("D d M, Y",strtotime($fetch_ad['ac_doe'])); ?></td>
                            <td><?php echo $fetch_ad['int_status']; ?></td>
                            <td><a class="btn btn-xs btn-primary" href="view_rep?id=<?php echo $fetch_ad['id'].'&&student_id='.$fetch_ad['student_id'] ;?>" > Send Report</a>
                                
                                <a class="btn btn-xs btn-success" href="in_complete?id=<?php echo $fetch_ad['id'].'&&student_id='.$fetch_ad['student_id'] ;?>" > Completed</a> 
                                
<!--                                <a class="btn btn-xs btn-primary" href="in_complete?id=<?php #echo $fetch_ad['id'].'&&student_id='.$fetch_ad['student_id'] ;?>" > Completed</a> </td>-->
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