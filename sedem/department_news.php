<?php
include 'layout/head.php';
include 'layout/sidenav.php';

//fetch all news
$fnews = News::fetch_all();
?> 

<div class="col-md-10 content">
<div class="panel panel-default">
                <div class="panel-heading">
                    Manage News
                </div>
                  
        <div class="row text-center" style="padding:10px;">
			
			<div class="col-md-12 ">
				<div class="">
					<table id="example" class="datatable table table-striped " cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>News Title</td>
                        <td>Detailed News</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>Posted By</td>
                        <td>Date Posted</td>
                   <!-- <td>Status</td> -->
                        <td>Image</td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php while($fetch_news = $database->fetch_array($fnews)){ ?>
                    <tr>
                        <td><?php echo $fetch_news['id']; ?></td>
                        <td><?php echo $fetch_news['news_title']; ?></td>
                        <td><?php echo $fetch_news['news_details']; ?></td>
                        <td><?php echo date("D d M, Y",strtotime($fetch_news['start_date'])); ?></td>
                        <td><?php echo date("D d M, Y",strtotime($fetch_news['end_date'])); ?></td>
                        <td><?php echo $fetch_news['posted_by']; ?></td>
                        <td><?php echo date("D d M, Y",strtotime($fetch_news['doe'])); ?></td>
					<!-- <td><?php #if(date("D d M, Y",strtotime($fetch_news['end_date'])) <= date('D d M, Y',strtotime(date("d")))){echo '<span class = "label label-success">Healthy</span>';}else{echo '<span class = "label label-danger">Expired</span>';} ?></td> -->
                        <td>
                            <?php if($fetch_news['image']==TRUE){ ?>
                                <p><img width="50px" height="50px" src="uploads/department/news/<?php echo $fetch_news['image']; ?>" alt="<?php echo $fetch_news['image']; ?>"></p>
                                <?php }else{echo "no image sent";} ?>
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