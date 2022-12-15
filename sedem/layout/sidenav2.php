
<div class="container-fluid main-container" >
  		<div class="col-md-2 sidebar">
  			<div class="row">
	<!-- uncomment code for absolute positioning tweek see top comment in css -->
	<div class="absolute-wrapper" style="background-color:cornflowerblue"> </div>
	<!-- Menu -->
	<div class="side-menu" style="background-color:cornflowerblue">
		<nav class="navbar navbar-default" role="navigation" >
			<!-- Main Menu -->
			<div class="side-menu-container" >
				<ul class="nav navbar-nav" style="background-color:darkcyan;">
                    <!-- Dropdown-->

					<li class="panel panel-default" id="dropdown">
						<a  style="color:#fff;" data-toggle="collapse" href="#dropdown-lvl3">
							<span class="fa fa-institution"></span> Department <span class="caret"></span>
						</a>

<!--						 Dropdown level 1 -->
						<div id="dropdown-lvl3" class="panel-collapse collapse">
							<div class="panel-body">
								<ul class="nav navbar-nav" style="background-color:cornflowerblue" >
                                    <li class="active" ><a  href="view_all_news" style="color:#fff;"> Departmental News</a></li>
								</ul>
							</div>
						</div>
					</li>
                    

                    <!-- Dropdown-->
					<li class="panel panel-default" id="dropdown">
						<a  style="color:#fff;" data-toggle="collapse" href="#dropdown-lvl2">
							<span class="fa fa-book"></span> Internship Offers <span class="caret"></span>
						</a>

						<!-- Dropdown level 1 -->
						<div id="dropdown-lvl2" class="panel-collapse collapse">
							<div class="panel-body">
								<ul class="nav navbar-nav" style="background-color:cornflowerblue" >
                                  	<li><a href="view_all_company_post" style="color:#fff;"> Internship Offer from Companies</a></li>
									<li><a href="view_all_department_post" style="color:#fff;"> Internship Offers from Department</a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

	</div>
</div>  		</div>