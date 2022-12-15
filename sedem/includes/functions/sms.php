<?php




function clean($string) {
      // Replaces all spaces with hyphens.
   
   $string = str_replace('0','233', $string); // Replaces all spaces with hyphens.
 
return $string;
}


//SMS to student when approved
function sendsms($student_name,$company_name,$com_date,$student_telephone,$work_phone){
$username = 'kingicon';
$password = 'x6G0U6K7';
$message = 'Congratulation '.$student_name.', you are to start work in '.$company_name.' as an intern on '.$com_date.'. Call '.$work_phone.' for assistance or any information. THANK YOU.';
$from = "INTERNSHIP";//your senderid example "kwamena"max is 11 chars;
$baseurl = "http://isms.wigalsolutions.com/ismsweb/sendmsg/";

//All numbers must have a country code. delimit them with comma(,)
$to = $student_telephone;
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


//SMS to student when approved
function sendrejectsms($student_name,$company_name,$student_telephone){
$username = 'kingicon';
$password = 'x6G0U6K7';
//$password = 'Secret!@#';
$message = 'Hello '.$student_name.', we sorry to inform you that your offer to '.$company_name.' has been declined. Please try other available offers. THANK YOU.';
$from = "INTERNSHIP";//your senderid example "kwamena"max is 11 chars;
$baseurl = "http://isms.wigalsolutions.com/ismsweb/sendmsg/";

//All numbers must have a country code. delimit them with comma(,)
$to = $student_telephone;
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
