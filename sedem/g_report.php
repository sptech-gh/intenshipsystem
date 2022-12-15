<?php
error_reporting(0);
include 'layout/head.php';
include 'layout/sidenav.php';

//fetch all news
//$fco = Company::fetch_com_app();

if(isset($_POST['btnSearch'])){
    @$fdate = $_POST['fdate'];
    @$tdate = $_POST['tdate'];
    $fco = $database->query_db("SELECT *,count(student_id) AS sid FROM apply_company_advert WHERE DATE(ac_doe)>='".$fdate."' && DATE(ac_doe)<='".$tdate."' GROUP BY company_id");
//    while($fetch_co = $database->fetch_array($fco)){}
}else{
    #$fco = $database->query_db("SELECT *,count(student_id) AS sid FROM apply_company_advert GROUP BY company_id");

}

?> 
<style>
    ul{
        list-style-type: none;
    }
</style>
<div class="col-md-10 content">
<div class="panel panel-default">
                <div class="panel-heading">
                    GENERAL REPORT
                    
                    <span class="pull-right">
                        <form action="" method="post">
                            Date From: <input type="date" name="fdate" >
                            Date to: <input type="date" name="tdate" >
                             <input type="submit" name="btnSearch" value="Search" >
                            <a href="print_pdf?fdate=<?php echo $fdate.'&tdate='.$tdate;?>" class="btn btn-xs btn-default">Print PDF</a>
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
                        <td>NO. OF STUDENT</td>
                        <td>LIST OF STUDENT</td>
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
                        <td><?php echo $fetch_co['sid']; ?></td>
                        
                        <td>
                            <ul>
                                <?php
                            $alstudent = $database->query_db("SELECT * FROM apply_company_advert WHERE company_id='".$fetch_co['company_id']."'");
                                while($comrow = $database->fetch_array($alstudent)){
                                        
                            $fsi = $database->query_db("SELECT * FROM student WHERE student_id='".$comrow['student_id']."'");
                                $rowsi=$database->fetch_array($fsi);
                               
                        ?>
                                <li><?php echo $rowsi['student_name']."(".$comrow['student_id'].")-".$comrow['int_status']; ?></li>
                                <?php } ?>
                            </ul>
                        </td>
                        
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