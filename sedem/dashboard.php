<?php

include 'layout/head.php';
include 'layout/sidenav.php';


?>

<div class="col-md-10 content">
    <?php if($_SESSION['access_level']==2 && $_SESSION['app_status']!=4){ ?>
    <div class="panel panel-default">
                <div class="panel-heading">
                    Companies
                </div>
                  
        <div class="row text-center" style="padding:10px;">
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Companies on Platform </h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo ($chk_num_rows_comp/$chk_num_rows_comp)*100 ;?>" ><span class="percent"><?php echo $chk_num_rows_comp; ?></span></div>
					</div>
				</div>
			</div>
			<div class="col-md-3 ">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<div><h4>Pending Offers</h4></div>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo ($chk_num_rows_pen_com/$Total_com_apply)*100 ;?>" ><span class="percent"><?php echo $chk_num_rows_pen_com; ?></span>
						</div>
					</div>
				</div>   
            </div>
                <div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4> Accepted Offers</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo ($chk_num_rows_ap_com/$Total_com_apply)*100 ;?>" ><span class="percent"><?php echo $chk_num_rows_ap_com; ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Rejected Offers</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo ($chk_num_rows_re_com/$Total_com_apply)*100 ;?>" ><span class="percent"><?php echo $chk_num_rows_re_com; ?></span>
						</div>
					</div>
				</div>
			</div>
            <div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Rejected Companies</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo ($chk_num_rows_rej_com/$chk_num_rows_comp)*100 ;?>" ><span class="percent"><?php echo $chk_num_rows_rej_com; ?></span>
						</div>
					</div>
				</div>
			</div>
            <div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Approved Companies</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo ($chk_app_com/$chk_num_rows_comp)*100 ;?>" ><span class="percent"><?php echo $chk_app_com; ?></span>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
    
    <div class="panel panel-default">
                <div class="panel-heading">
                    Department
                </div>
                  
        <div class="row text-center" style="padding:10px;">
			<div class="col-md-3 ">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<div><h4>Total Posts</h4></div>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo ($chk_num_rows_dep_post_offer / $chk_num_rows_dep_post_offer)*100 ; ?>" ><span class="percent"><?php echo $chk_num_rows_dep_post_offer; ?></span>
						</div>
					</div>
				</div>   
            </div>
            <div class="col-md-3 ">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<div><h4>Pending Offers</h4></div>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo ($chk_num_rows_pen_dep/$Total_com_apply)*100 ;?>" ><span class="percent"><?php echo $chk_num_rows_pen_dep; ?></span>
						</div>
					</div>
				</div>   
            </div>
                <div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4> Accepted Offers</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo ($chk_num_rows_ap_dep/$Total_com_apply)*100 ;?>" ><span class="percent"><?php echo $chk_num_rows_ap_dep; ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Rejected Offers</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo ($chk_num_rows_re_dep/$Total_com_apply)*100 ;?>" ><span class="percent"><?php echo $chk_num_rows_re_dep; ?></span>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
    
    <?php }elseif($_SESSION['access_level']==1 && $_SESSION['app_status']==4){ ?>
    <div class="panel panel-default">
                <div class="panel-heading">
                    Company Dashboard
                </div>
                  
        <div class="row text-center" style="padding:10px;">
			
			<div class="col-md-3 ">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<div><h4>Pending Offers</h4></div>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo ($chk_num_rows_pen_com_session/$Total_com_apply_session)*100 ;?>" ><span class="percent"><?php echo $chk_num_rows_pen_com_session; ?></span>
						</div>
					</div>
				</div>   
            </div>
                <div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4> Accepted Offers</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo ($chk_num_rows_ap_com_session/$Total_com_apply_session)*100 ;?>" ><span class="percent"><?php echo $chk_num_rows_ap_com_session; ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Rejected Offers</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo ($chk_num_rows_re_com_session/$Total_com_apply_session)*100 ;?>" ><span class="percent"><?php echo $chk_num_rows_re_com_session; ?></span>
						</div>
					</div>
				</div>
			</div>
            <div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Total Posts</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $chk_num_rows_tcomp ;?>" ><span class="percent"><?php echo $chk_num_rows_tcomp; ?></span>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
    <?php }else{echo "Please wait for your Account to be activated. A Confirmation message will be sent to you soon.";} ?>
</div>

<?php include 'layout/footer.php';?>