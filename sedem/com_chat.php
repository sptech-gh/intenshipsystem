<?php
include 'includes/all.php';
@session_start();
if(!$_SESSION['username'] AND !$_SESSION['pin'] ){
    echo "<script>
                window.location='student_login.php';
        </script>";
}

$student_id = $_GET['student_id'];

?>
<html>
    <head>
        <title>Chat</title>
              <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
    
    </head>
    <body>

<!--
        <frameset rows="25%,*,25%">
          <frame src="read_chat.php">
          <frame src="send_chat.php">
        </frameset>
-->
        
        <iframe style="border:2px solid #2BA9E3;width:100%;overflow:scroll;" frameborder="0" height="400px" src="com_read_chat?student_id=<?php echo $student_id; ?>"></iframe>
        
        <iframe style="width:100%;" frameborder="0" target="schat" src="com_send_chat?student_id=<?php echo $student_id; ?>"></iframe>
    </body>
</html>