<?php
include 'includes/all.php';
include 'layout/head2.php';
include 'layout/sidenav2.php';

$news = News::find_all();

?>
  <style type="text/css">
  h2 {
  border-bottom: 10px solid red;
  font-family: 'Raleway', sans-serif;
  font-size: 65px;
  font-weight: 900;
  margin: 0 auto;
  padding: 20px 0 3px;
  text-align: center;
  text-transform: uppercase;
  width: 40.2%;
}
img {
  height: 200px !important;
}

.row.text-center p {
  font-size: 17px;
  font-weight: 600;
  letter-spacing: -0.3px;
  margin: 3px 0 30px;
  text-transform: uppercase;
}

.h3, h3 {
  font-family: 'Raleway', sans-serif;
  font-size: 24px;
  text-transform: uppercase;
}
.btn-default {
  background: transparent none repeat scroll 0 0;
  border: 2px solid #fff;
  border-radius: 50px;
  text-shadow: 0 1px 0 #fff;
  font-family: 'Raleway', sans-serif;
}
.glyphicon {
    color: white;}
    .caption-text p {
  margin: 18px auto 13px;
  text-align: center;
  width: 91%;
}
.btn-default:focus, .btn-default:hover {
  background-color: red;
  background-position: 0 -15px;
}
	
  .news_hover{
    	padding: 0px;
		position: relative;
		overflow: hidden;
		height: 200px;
	}
	.news_hover:hover .caption{
		opacity: 1;
		transform: translateY(-150px);
		-webkit-transform:translateY(-150px);
		-moz-transform:translateY(-150px);
		-ms-transform:translateY(-150px);
		-o-transform:translateY(-150px);
	}
	.news_hover img{
		z-index: 4;
	}
	.news_hover .caption{
		position: absolute;
		top:150px;
		-webkit-transition:all 0.3s ease-in-out;
		-moz-transition:all 0.3s ease-in-out;
		-o-transition:all 0.3s ease-in-out;
		-ms-transition:all 0.3s ease-in-out;
		transition:all 0.3s ease-in-out;
		width: 100%;
	}
	.news_hover .blur{
		background-color: rgba(0,0,0,0.7);
		height: 300px;
		z-index: 5;
		position: absolute;
		width: 100%;
	}
	.news_hover .caption-text{
		z-index: 10;
		color: #fff;
		position: absolute;
		height: 300px;
		text-align: center;
		top:-20px;
		width: 100%;
	}
    </style>

        <div class="col-md-10" style="background-color:#fff;padding-bottom:10px;padding-top:10px;">
          <!--  <ul class="list-group">
                 <?php #if($database->num_rows($news)){ while($fetch_news = $database->fetch_array($news)){ ?>
                    <li class="list-group-item"><a style="color:#000;height: auto;" href="view_news?id=<?php #echo $fetch_news['id'];?>"><?php #echo "<strong>". $fetch_news['news_title'] . "</strong> | ". wordwrap(substr($fetch_news['news_details'], 0, 50), 40)."... <small>Read More</small>" ;?>
    
            <?php #if($fetch_news['image']==TRUE){?>
            <img class="pull-right" width="30px" height="30px" src="uploads/department/news/<?php #echo $fetch_news['image'];?>" alt="<?php #echo $fetch_news['image'];?>">
            <?php #}else{echo "No image found";}?>
        </a></li>
                 <?php #}
                                                     
            #}else{echo "No news available";}?>
            </ul>
-->
            
<!--
            <?php #if($database->num_rows($news)){ while($fetch_news = $database->fetch_array($news)){ ?>
<a href="view_news?id=<?php #echo $fetch_news['id'];?>">            
<div class="col-sm-3 col-md-3 ">
    <div class="thumbnail border">
        <?php #if($fetch_news['image']==TRUE){?>
            <img class="img-responsive" src="uploads/department/news/<?php #echo $fetch_news['image'];?>" alt="<?php #echo $fetch_news['image'];?>">
            <?php #}else{echo "No image found";}?>
      <div class="caption">
        <h4><?php #echo $fetch_news['news_title']; ?></h4>
        <p class="card-description"><?php #echo wordwrap(substr($fetch_news['news_details'], 0, 50), 40)."... <small class='btn btn-primary'>Read More</small>"; ?></p>
      </div>
    </div>
</div></a>
        <?php #}
                                                     
            #}else{echo "No news available";}?>    
            
-->
            
            <?php if($database->num_rows($news)){ while($fetch_news = $database->fetch_array($news)){ ?>
            <div class="col-lg-3" style="margin-bottom:3px;">
    				<div class="news_hover " style="background-color:#cccccc;">
                        <?php if($fetch_news['image']==TRUE){?>
						<p style="text-align:center;">
							<img src="uploads/department/news/<?php echo $fetch_news['image'];?>" alt="<?php echo $fetch_news['image'];?>" class="img-responsive" >
						</p><?php }else{echo "No image found";}?>
						<div class="caption">
							<div class="blur"></div>
							<div class="caption-text">
								<h4 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;"><?php echo $fetch_news['news_title']; ?></h4>
								<p><?php echo wordwrap(substr($fetch_news['news_details'], 0, 50), 40); ?>... <a href="view_news?id=<?php echo $fetch_news['id'];?>" ><small class='btn btn-primary'>Read More</small></a></p>
							</div>
						</div>
					</div>
				
	    </div>
           <?php }
                                                     
            }else{echo "No news available";}?>
    </div>

<?php include 'layout/footer2.php'; ?>