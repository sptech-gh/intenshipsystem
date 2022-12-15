<?php
include 'layout/head.php';
include 'layout/sidenav.php';

//fetch all news
//$fco = Company::fetch_com_app();

if(isset($_POST['btnSearch'])){
    @$fdate = $_POST['fdate'];
    @$tdate = $_POST['tdate'];
    $fco = $database->query_db("SELECT * FROM student_report WHERE DATE(doe)>='".$fdate."' && DATE(doe)<='".$tdate."'");
//    while($fetch_co = $database->fetch_array($fco)){}
}else{
    $fco = $database->query_db("SELECT * FROM student_report");

}

?> 

<div class="col-md-10 content">
<div class="panel panel-default">
                <div class="panel-heading">
<!--                    CONFIRM COMPANY-->
                    
                    <span class="pull-right">
                        <form action="" method="post">
                            Date From: <input type="date" name="fdate" >
                            Date to: <input type="date" name="tdate" >
                             <input type="submit" name="btnSearch" value="Search" >
                        
                        </form>
                    </span>
                </div>
                  
        <div class="row text-center" style="padding:10px;">
			
			<div class="col-md-12 ">
				<div class="">
					<table id="example" class="datatable table table-striped " cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <td>COMPANY NAME</td>
                        <td>STUDENT ID</td>
                        <td>STUDENT NAME</td>
                        <td>FILE NAME</td>
                        <td>DATE RECEIVED</td>
<!--                        <td>STATUS</td>-->
                        <td>ACTION</td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($fetch_co = $database->fetch_array($fco)){ 
                            $fc = $database->query_db("SELECT * FROM company WHERE com_id='".$fetch_co['company_id']."'");
                                $row = $database->fetch_array($fc);
                                
                            $fs = $database->query_db("SELECT * FROM student WHERE student_id='".$fetch_co['student_id']."'");
                                $rows=$database->fetch_array($fs);
                        ?>
                    <tr>
                        <td><?php echo $row['company_name']; ?></td>
                        <td><?php echo $fetch_co['student_id']; ?></td>
                        <td><?php echo $rows['student_name']; ?></td>
                        <td><?php echo $fetch_co['report_file']; ?></td>
                        <td><?php echo date("D d M, Y",strtotime($fetch_co['doe'])); ?></td>
                        <td><a target="_blank" class="btn btn-xs btn-flat btn-primary" href="assets/document/<?php echo $fetch_co['report_file']; ?>" >View / Download PDF File</a> </td>
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