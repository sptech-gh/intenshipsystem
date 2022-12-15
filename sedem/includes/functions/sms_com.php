<?php

//SMS to company when approved
function sendcomsms($company_name,$com_id,$pin,$work_phone){
$username = 'kingicon';
$password = 'x6G0U6K7';
$message = 'Congratulation '.$company_name.', you have been activated to use our platform to send internship offers.Your Username:  '.$com_id.' .Pin: '.$pin.'. Log on to http://localhost/major_new/login. THANK YOU.';
$from = "INTERNSHIP";//your senderid example "kwamena"max is 11 chars;
$baseurl = "http://isms.wigalsolutions.com/ismsweb/sendmsg/";

//All numbers must have a country code. delimit them with comma(,)
$to = $work_phone;
$params = "username=".$username."&password=".$password."&from=".$from."&to=".$to."&message=".$message ;

//send the message
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$baseurl);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
$return = curl_exec($ch);
curl_close($ch);

$send = explode(" :: ",$return);
if(stristr($send[0],"SUCCESS") != FALSE){
echo "message sent";
}else{
echo "message could not be sent";
}
}

?>
