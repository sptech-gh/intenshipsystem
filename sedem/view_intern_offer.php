<?php

include 'includes/all.php';
include 'layout/head2.php';
include 'layout/sidenav2.php';

//fetch all news
$news = Department_Post_Adverts::find_ads_by_department_id($_GET['department_id'],$_GET['id']);
$single_news = $database->fetch_array($news);

?>



            <div class="col-md-10" style="background-color:#fff;padding-bottom:10px;">
                <table class="table">
                    <tr>
                        <td style="font-weight:bold;">JOB TITLE</td>
                        <td><?php echo $single_news['job_title'];?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">JOB DETAILS</td>
                        <td><?php echo $single_news['job_details'];?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">COMPANY'S NAME</td>
                        <td><?php echo $single_news['company_name'];?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">MOBILE / TELEPHONE</td>
                        <td><?php echo $single_news['company_tel'];?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">WEBSITE</td>
                        <td><?php echo $single_news['company_website'];?></td>
                    </tr>
                </table>
                
<!--
                <?php #if($single_news['image']==TRUE){ ?>
                <p><img class="img-responsive img-thumbnail" src="uploads/department/news/<?php #echo $single_news['image'] ;?>" alt="<?php #echo $single_news['image'] ;?>"></p>
                <?php #} ?>
-->
                <pre><?php echo "Deadline: " .$single_news['deadline'] . " <br>Date Posted: ". date("D d M, Y",strtotime($single_news['doe'])) ;?></pre>
                
                <a class="btn btn-primary" href="department_apply_post?department_id=<?php echo $single_news['department_id']."&&id=".$single_news['id']; ?>">Apply</a>
            </div>

<?php include 'layout/footer2.php'; ?>