
<div class="container-fluid main-container">
  		<div class="col-md-2 sidebar">
  			<div class="row">
	<!-- uncomment code for absolute positioning tweek see top comment in css -->
	<div class="absolute-wrapper"> </div>
	<!-- Menu -->
	<div class="side-menu">
		<nav class="navbar navbar-default" role="navigation">
			<!-- Main Menu -->
			<div class="side-menu-container">
				<ul class="nav navbar-nav">
					<li class=""><a href="dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
					
                    <?php if($_SESSION['access_level']==2){ ?>
					<!-- Dropdown-->
					<li class="panel panel-default" id="dropdown">
						<a data-toggle="collapse" href="#dropdown-lvl3">
							<span class="fa fa-users"></span> Manage Internship <span class="caret"></span>
						</a>

						<!-- Dropdown level 1 -->
						<div id="dropdown-lvl3" class="panel-collapse collapse">
							<div class="panel-body">
								<ul class="nav navbar-nav">
                                    <li><a href="#" data-toggle="modal" data-target="#announcement"> Create Internship Offer</a></li>
									<li><a href="department_internship" >Manage Offer</a></li>
								</ul>
							</div>
						</div>
					</li>
                    
                    <!-- Dropdown-->
					<li class="panel panel-default" id="dropdown">
						<a data-toggle="collapse" href="#dropdown-lvl1">
							<span class="fa fa-th-list"></span> Manage News <span class="caret"></span>
						</a>

						<!-- Dropdown level 1 -->
						<div id="dropdown-lvl1" class="panel-collapse collapse">
							<div class="panel-body">
								<ul class="nav navbar-nav">
                                    <li><a href="#"  data-toggle="modal" data-target="#departmental_modal"> Create News</a></li>
                                    <li><a href="department_news"> Manage News</a></li>
<!--									<li><a href="view_voters">View all Users</a></li>-->
<!--									<li><a href="#">Report</a></li>-->

								</ul>
							</div>
						</div>
					</li>
                    
                    <!-- Dropdown-->
<!--
					<li class="panel panel-default" id="dropdown">
						<a data-toggle="collapse" href="#dropdown-lvl2">
							<span class="glyphicon glyphicon-thumbs-up"></span> Manage Vote <span class="caret"></span>
						</a>
-->

						<!-- Dropdown level 1 -->
<!--
						<div id="dropdown-lvl2" class="panel-collapse collapse">
							<div class="panel-body">
								<ul class="nav navbar-nav">
									<li><a href="count_vote">Count Votes</a></li>
									<li><a href="#">Report</a></li>
					
								</ul>
							</div>
						</div>
					</li>
-->

					<li><a href="confirm_company"><span class="fa fa-institution"></span> Confirm Company</a></li>
					<li><a href="s_report"><span class="fa fa-th-list"></span> Report From Companies</a></li>
					<li><a href="g_report"><span class="fa fa-th-list"></span> General Report</a></li>
                    
                    <?php } ?>
                    
                    <?php if($_SESSION['access_level']==1 && $_SESSION['app_status']==4){ ?>
					<li><a href="#" data-toggle="modal" data-target="#comp_intern"><span class="fa fa-users"></span> Create Internship Offer</a></li>
					<li><a href="company_internship"><span class="fa fa-th-list"></span> Manage Internship Offer</a></li>
<!--					<li><a href="#"><span class="fa fa-file-text"></span> Report</a></li>-->
                    <?php } ?>
                    
<!--                    company-->
                    <?php if($_SESSION['access_level']==1){ ?>
                    
                    <!-- Dropdown-->
					<li class="panel panel-default" id="dropdown">
						<a data-toggle="collapse" href="#dropdown-lvl1">
							<span class="fa fa-th-list"></span> Manage Interns <span class="caret"></span>
						</a>

						<!-- Dropdown level 1 -->
						<div id="dropdown-lvl1" class="panel-collapse collapse">
							<div class="panel-body">
								<ul class="nav navbar-nav">
<!--                                    <li><a href="#"  data-toggle="modal" data-target="#departmental_modal"> Approved Students</a></li>-->
                                    <li><a href="c_student"> Approved Interns</a></li>
<!--									<li><a href="view_voters">View all Users</a></li>-->
<!--									<li><a href="#">Report</a></li>-->

								</ul>
							</div>
						</div>
					</li>
                    <li class=""><a href="c_chat"><span class="glyphicon glyphicon-dashboard"></span> Chats</a></li>
					
                    <?php } ?>
                    
				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

	</div>
</div>  		</div>