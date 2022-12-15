<?php
include 'includes/all.php';
//$us = Users::find_username($_GET['com_id']);
//$user = $database->fetch_array($us)
                
                $cmp = new Company;
                        $cmp->app_status = $database->prep(trim(APPROVE));
                        $cmp->approve_company($_GET['com_id']);

    
                $user = new Users;
                        $user->app_status = $database->prep(trim(APPROVE));
                   $result = $user->approve_company($_GET['com_id']);
                
                    if ($result) {
                        
                        //fetch company detail by company id
                        $fet_comp = Company::find_by_id($_GET['com_id']);
                        $fet = $database->fetch_array($fet_comp);
                        
                        $company_name = $fet['company_name'];
                        $com_id = $fet['com_id'];
                        $pin = $fet['pin'];
                        $work_phone = $fet['work_phone'];
                        
                        //echo $company_name." -- ".$com_id." -- ".$pin." -- ".$work_phone;
                        
                           //sending sms to companies
                             sendcomsms($company_name,$com_id,$pin,$work_phone);
                        echo "<script>document.write('<strong>SUCCESS! </strong> COMPANY APPROVED.');</script>";
                        header("location: confirm_company.php");
                    }
                    else{
                        echo "<script>alert(<strong>ERROR! </strong> FAILED TO APPROVE COMPANY.')</script> ";
                    }
            
?>
