<?php
include 'layout/head.php';
include 'layout/sidenav.php';

//fetch all news
$fco = Company::fetch_com_app();

?> 

<div class="col-md-10 content">
<div class="panel panel-default">
                <div class="panel-heading">
                    CONFIRM COMPANY
                </div>
                  
        <div class="row text-center" style="padding:10px;">
			
			<div class="col-md-12 ">
				<div class="">
					<table id="example" class="datatable table table-striped " cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>COMPANY NAME</td>
                        <td>COMPANY EMAIL</td>
                        <td>COMPANY TELEPHONE</td>
                        <td>COMPANY REG CODE</td>
                        <td>DATE REGISTERED</td>
<!--                        <td>STATUS</td>-->
                        <td>ACTION</td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php while($fetch_co = $database->fetch_array($fco)){ ?>
                    <tr>
                        <td><?php echo $fetch_co['com_id']; ?></td>
                        <td><?php echo $fetch_co['company_name']; ?></td>
                        <td><?php echo $fetch_co['email']; ?></td>
                        <td><?php echo $fetch_co['work_phone']; ?></td>
                        <td><?php echo $fetch_co['reg_ref_number']; ?></td>
                        <td><?php echo $fetch_co['date_of_registration']; ?></td>
                       <!-- <td><?php 
//                                            switch ($fetch_co['app_status']){
//                                                case 4:
//                                                    echo '<span class = "label label-success">APPROVED</span>';
//                                                break;
//                                                case 5:
//                                                    echo '<span class = "label label-danger">REJECTED</span>';
//                                                break;
//                                                default:
//                                                    echo '<span class="label label-warning">PENDING</span>';
//                                            } 
                                ?></td>-->
                        <td><a class="btn btn-xs btn-flat btn-success" href="approve_company.php?com_id=<?php echo $fetch_co['com_id']; ?>" name="approve" >Approve</a> | <a class="btn btn-xs btn-flat btn-danger" href="reject_company.php?com_id=<?php echo $fetch_co['com_id']; ?>" name="reject" >Reject</a>  </td>
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