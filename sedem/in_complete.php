<?php 

include 'layout/head.php';
include 'layout/sidenav.php';

$student_id = $_GET['student_id'];
$id = $_GET['id'];

$result = $database->query_db("UPDATE apply_company_advert SET int_status = 'completed' WHERE student_id='$student_id' && id='$id'");

echo "<script>window.location='c_student'</script>";

?>