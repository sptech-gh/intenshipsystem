<?php
include 'includes/all.php';
@session_start();
if(!$_SESSION['username'] AND !$_SESSION['pin'] ){
    echo "<script>
                window.location='student_login.php';
        </script>";
}

//Read chats both company and student
$student_id = $_GET['student_id'];
$company_id = $_SESSION['username'];

if(isset($_POST['btnSend'])){
    $complain = $database->prep(trim($_POST['complain']));
    
    $result = $database->query_db("INSERT INTO chats(student_id,company_id,complain,posted_by) VALUES('$student_id','$company_id','$complain','$company_id')");
//    
//    if($result){
//        echo "<script>alert('Good')</script>";
//    }else{
//        echo "<script>alert('Bad')</script>";
//    }
}

?>
<html>
    <head>
        <title></title>
              <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
    
    </head>
    <body >
     <form action="" method="post">
         <div class="container">
         <div class="row">
            <div class="col-xs-8">
                <textarea class="form-control" name="complain" cols="5" rows="5"></textarea>
             </div>
            <div class="col-xs-4">
                <input type="submit" name="btnSend" value="Send" class="btn btn-primary btn-block btn-lg">
             </div>
         </div>
        </div>
        </form>
</body>
    
</html>