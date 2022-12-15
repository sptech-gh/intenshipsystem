<?php
include 'layout/head.php';
include 'layout/sidenav.php';

//fetch company applied adverts
//$fcmp = Apply_Company_Advert::find_by_join($_SESSION['username']);
$fcmp = Apply_Company_Advert::find_by_company_id($_SESSION['username']);

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
                            <td>S/N</td>
                            <td>Student Full Name</td>
                            <td>Department</td>
                            <td>Program</td>
                            <td>image</td>
                            <td>Date Applied</td>
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
                            <td><?php 
                                    if($fetch_ad['c_image']==TRUE){
                                ?>
                                <img width="40px" height="40px" src="uploads/company/<?php echo $fetch_ad['c_image'] ;?>" alt="<?php echo $fetch_ad['c_image'] ;?>">
                                <?php
                                    }else{
                                        echo "No image";
                                    }
                                ?></td>
                            <td><?php echo date("D d M, Y",strtotime($fetch_ad['ac_doe'])); ?></td>
                            <td><?php 
                                            switch ($fetch_ad['ac_status']){
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
                            <td><a class="btn btn-xs btn-primary" href="view_applied_advert_com?id=<?php echo $fetch_ad['id'].'&&student_id='.$fetch_ad['student_id'] ;?>" ><span class="glyphicon glyphicon-eye-open"></span></a> </td>
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