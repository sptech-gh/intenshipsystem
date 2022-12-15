<?php
include 'layout/head.php';
include 'layout/sidenav.php';

//fetch company applied adverts
//$fcmp = Apply_Company_Advert::find_by_join($_SESSION['username']);
//$fcmp = Apply_Company_Advert::find_by_company_id($_SESSION['username']);

$fcmp = $database->query_db("SELECT * FROM chats WHERE company_id='".$_SESSION['username']."' && DATE(doe)=CURDATE() GROUP BY student_id ORDER BY id DESC");

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
                            <td><a class="btn btn-xs btn-primary" href="com_chat?student_id=<?php echo $fetch_ad['student_id']; ?>" onclick="return popitup('com_chat?student_id=<?php echo $fetch_ad['student_id']; ?>','CustomerCare')"><span class="glyphicon glyphicon-eye-open"></span></a> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
				</div>   
            </div>
               
			</div>
		</div>
</div>


  <script>
        function popitup(url,windowName) {
           newwindow=window.open(url,windowName,'height=600,width=700');
           if (window.focus) {newwindow.focus()}
           return false;
         }

</script>
    
    
<?php include 'layout/footer.php';?>