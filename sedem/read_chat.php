<?php
include 'includes/all.php';
@session_start();
if(!$_SESSION['username'] AND !$_SESSION['pin'] ){
    echo "<script>
                window.location='student_login.php';
        </script>";
}

//Read chats both company and student
$student_id = $_SESSION['username'];
$company_id = $_GET['company_id'];

$result = $database->query_db("SELECT * FROM chats WHERE student_id='$student_id' && company_id='$company_id' && DATE(doe)=CURDATE() ");



?>
<html>
    <head>
        <title></title>
              <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="1">
     <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
    
    </head>
    <body >
        <?php while($row = $database->fetch_array($result)){ 
            $comm .= $database->query("SELECT * FROM company WHERE com_id='".$row['posted_by']."'");
            $comm = $database->query("SELECT * FROM student WHERE student_id='".$row['posted_by']."'");
            $rows = $database->fetch_array($comm);
        ?>
            <p class="" style=""><span class="">FROM: <?php echo $rows['company_name']." ".$rows['student_name']; ?><br></span><?php echo $row['complain']; ?></p>
        <?php } ?>
        
</body>
    
</html>
