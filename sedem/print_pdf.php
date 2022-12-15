<?php
error_reporting(0);
include 'layout/head.php';
#include 'layout/sidenav.php';

$fdate = $_GET['fdate'];
$tdate = $_GET['tdate'];

    $fco = $database->query_db("SELECT *,count(student_id) AS sid FROM apply_company_advert WHERE DATE(ac_doe)>='".$fdate."' && DATE(ac_doe)<='".$tdate."' GROUP BY company_id");
//    while($fetch_co = $database->fetch_array($fco)){}


?>
    <style>
        ul {
            list-style-type: none;
        }

    </style>
    <script>
        window.print();

    </script>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                DIS GENERAL REPORT
                <p class="pull-right"><img class=" img-responsive" width="80px" src="assets/images/dli-logo.png"><br><span> <?php echo date('d M Y H:m:i'); ?> </span></p>

            </div>

            <div class="row text-center" style="padding:10px;">

                <div class="col-md-12 ">
                    <div class="">
                        <table id="" class="datatable table table-striped " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <td>COMPANY NAME</td>
                                    <td>NO. OF STUDENT</td>
                                    <td>LIST OF STUDENT</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            while($fetch_co = $database->fetch_array($fco)){ 
                            $fc = $database->query_db("SELECT * FROM company WHERE com_id='".$fetch_co['company_id']."'");
                                $row = $database->fetch_array($fc);
                               
                            $fs = $database->query_db("SELECT * FROM student WHERE student_id='".$fetch_co['student_id']."'");
                                $rows=$database->fetch_array($fs);
                               
                        ?>
                                <tr>
                                    <td>
                                        <?php echo $row['company_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fetch_co['sid']; ?>
                                    </td>

                                    <td>
                                        <ul>
                                            <?php
                            $alstudent = $database->query_db("SELECT * FROM apply_company_advert WHERE company_id='".$fetch_co['company_id']."'");
                                while($comrow = $database->fetch_array($alstudent)){
                                        
                            $fsi = $database->query_db("SELECT * FROM student WHERE student_id='".$comrow['student_id']."'");
                                $rowsi=$database->fetch_array($fsi);
                               
                        ?>
                                                <li>
                                                    <?php echo $rowsi['student_name']."(".$comrow['student_id'].")-".$comrow['int_status']; ?>
                                                </li>
                                                <?php } ?>
                                        </ul>
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


    <?php #include 'layout/footer.php';?>
