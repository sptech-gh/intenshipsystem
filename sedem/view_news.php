<?php

include 'includes/all.php';
include 'layout/head2.php';
include 'layout/sidenav2.php';

//fetch all news
$news = News::find_by_id($_GET['id']);
$single_news = $database->fetch_array($news);

?>

            <div class="col-md-10" style="background-color:#fff;padding-bottom:10px;">
                <h3><?php echo $single_news['news_title'];?></h3>
                <p><?php echo $single_news['news_details'];?></p>
                <?php if($single_news['image']==TRUE){ ?>
                <p><img class="img-responsive img-thumbnail" src="uploads/department/news/<?php echo $single_news['image'] ;?>" alt="<?php echo $single_news['image'] ;?>"></p>
                <?php } ?>
                <pre><?php echo "Start Date: " .$single_news['start_date'] ." <br>End Date ". $single_news['end_date'] ." <br>Posted By: ".$single_news['posted_by']. " <br>Date Posted: ". date("D d M, Y",strtotime($single_news['doe'])) ;?></pre>
            </div>

<?php include 'layout/footer2.php'; ?>