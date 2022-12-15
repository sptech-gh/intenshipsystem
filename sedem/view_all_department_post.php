<?php
include 'includes/all.php';
include 'layout/head2.php';
include 'layout/sidenav2.php';

$news = Department_Post_Adverts::find_all();

?>

<style>
	a #card:hover{border:none;}
	a:hover{color:#fff;}
</style>


        <div class="col-md-10" style="background-color:#fff;padding-bottom:10px;padding-top:10px;">
           <!-- <ul class="list-group">
                <?php #if($database->num_rows($news)){ while($fetch_intern = $database->fetch_array($news)){ ?>
                    <li class="list-group-item"><a style="color:#000;" href="view_intern_offer?department_id=<?php #echo $fetch_intern['department_id']."&&id=".$fetch_intern['id'];?>"><?php# echo "<strong>". $fetch_intern['job_title'] . "</strong> | ". wordwrap(substr($fetch_intern['job_details'], 0, 50), 40)."... <small>Read More</small>" ;?></a></li>
                <?php #}}else{echo "No news available";}?>
                </ul>-->
				
				
				
				<div class="container-fluid">
					<div class="row">
					 <?php if($database->num_rows($news)){ while($fetch_intern = $database->fetch_array($news)){ ?>
					 <a href="view_intern_offer?department_id=<?php echo $fetch_intern['department_id']."&&id=".$fetch_intern['id'];?>">
						<div class="col-md-3" id="card" style="border:1px solid navy;color:navy;">
							<div class="card">
							  <div class="card-block">
								<h4 class="card-title"><?php echo $fetch_intern['job_title'] ; ?></h4>
								<h6 class="card-subtitle mb-2 text-muted"><?php echo $fetch_intern['doe']; ?></h6>
								<p class="card-text"><?php echo  wordwrap(substr($fetch_intern['job_details'], 0, 80), 80)."... <small>Read More</small>"; ?></p>
							  </div>
							</div>
						</div>
					</a>
						<?php }}else{echo "No news available";}?>
					</div>
				</div>
				
				
    </div>
        
<?php include 'layout/footer2.php'; ?>