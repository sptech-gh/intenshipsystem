<?php
include 'includes/all.php';
//$us = Users::find_username($_GET['com_id']);
//$user = $database->fetch_array($us)
    

                $cmp = new Company;
                        $cmp->app_status = $database->prep(trim(REJECT));
                        $cmp->reject_company($_GET['com_id']);


                $user = new Users;
                        $user->app_status = $database->prep(trim(REJECT));
                   $result = $user->reject_company($_GET['com_id']);
                
                    if ($result) {
                        $msg= "<script>document.write('<strong>SUCCESS! </strong> COMPANY CREATED.')</script>";
                        header("location: confirm_company.php");
                    }
                    else{
                        $err= "<script>alert(<strong>ERROR! </strong> FAILED TO CREATE COMPANY.')</script> ";
                    }
            
?>