<?php

include 'includes/all.php';
include 'layout/head2.php';
include 'layout/sidenav2.php';

$news = Company_Post_Adverts::find_all();

?>
<style>
	a #card:hover{border:none;}
	a:hover{color:#fff;}
</style>


        <div class="col-md-10" style="background-color:#fff;padding-bottom:10px;padding-top:10px;">
         <!--   <ul class="list-group">
                <?php #if($database->num_rows($news)){ while($fetch_ad = $database->fetch_array($news)){ ?>
                    <li class="list-group-item"><a style="color:#000;" href="view_comp_offer?company_id=<?php #echo $fetch_ad['company_id']."&&id=".$fetch_ad['id'];?>"><?php #echo "<strong>". $fetch_ad['job_title'] . "</strong> | ". wordwrap(substr($fetch_ad['job_details'], 0, 80), 80)."... <small>Read More</small>" ;?></a></li>
                <?php #}}else{echo "No news available";}?>
                </ul>
				-->
				
				<div class="container-fluid">
					<div class="row">
					 <?php if($database->num_rows($news)){ while($fetch_ad = $database->fetch_array($news)){ ?>
					 <a href="view_comp_offer?company_id=<?php echo $fetch_ad['company_id']."&&id=".$fetch_ad['id'];?>">
						<div class="col-md-3" id="card" style="border:1px solid darkcyan;color:darkcyan;">
							<div class="card">
							  <div class="card-block">
								<h4 class="card-title"><?php echo $fetch_ad['job_title'] ; ?></h4>
								<h6 class="card-subtitle mb-2 text-muted"><?php echo $fetch_ad['doe']; ?></h6>
								<p class="card-text"><?php echo  wordwrap(substr($fetch_ad['job_details'], 0, 80), 80)."... <small>Read More</small>"; ?></p>
							  </div>
							</div>
						</div>
					</a>
						<?php }}else{echo "No news available";}?>
					</div>
				</div>
				

    
    </div>

<?php include 'layout/footer2.php'; ?>