<?php
$adminemail = "youremailhere@googlemail.com";

if ($_GET['send'] == 'comments')
{
						
	$_uname = $_POST['q-fullname'];
	$_cdlnumber = $_POST['q-cdlnumber'];
	$_state = $_POST['q-state'];
	$_phonenumber = $_POST['q-phonenumber'];
	$_uemail = $_POST['q-email'];	
	$_message = $_POST['q-message'];
	//$_comments	=	stripslashes($_POST['urmessage']);
						
	$email_check = '';
	$return_arr = array();

	if($_uname=="" || $_uemail=="" || $_message=="" || $_phonenumber=="")
	{
		$return_arr["frm_check"] = 'error';
		$return_arr["msg"] = "Please fill in all required fields!";
	} 
	else if(filter_var($_uemail, FILTER_VALIDATE_EMAIL)) 
	{
	
	$to = $adminemail;
	$from = $_uemail;
	$subject = "Mowasalat - Request a Quote";
	
	$message =  'Name: &nbsp;&nbsp;' . $_uname .'<br><br> CDL Number: &nbsp;&nbsp;' . $_cdlnumber .  '<br><br> State: &nbsp;&nbsp;' . $_state .   '<br><br> Phone Number: &nbsp;&nbsp;' . $_phonenumber . '<br><br> Email: &nbsp;&nbsp;' . $_uemail . '<br><br> Message: &nbsp;&nbsp;' . $_message .;	

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "Content-Transfer-Encoding: 7bit\r\n";
	$headers .= "From: " . $from . "\r\n";

	@mail($to, $subject, $message, $headers);	
	
	} else {
    
	$return_arr["frm_check"] = 'error';
	$return_arr["msg"] = "Please enter a valid email address!";

}

echo json_encode($return_arr);
}

?>