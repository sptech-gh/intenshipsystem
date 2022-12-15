<?php

include 'includes/all.php';
session_start();

 Session::logout();
    header('location: index');
//echo "<script>window.location.href='index'</script>";

?>