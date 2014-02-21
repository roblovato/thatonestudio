<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);
require('../phpmailer/5_2_1/class.phpmailer.php');

$mail = new PHPMailer();
$mail->IsHTML(true);
$action = $_REQUEST['action'];
$response = "";
$templates = "../templates/";
switch($action){
	case "submit_contact":
		foreach($_POST as $key=>$value){
			$_POST[$key] = trim($value);
		}
		$_POST['recipient_name'] = $_POST['first_name'] . " " . $_POST['last_name'];
		$_POST['recipient_email'] = $_POST['email'];
		$_POST['subject'] = "Thank you for contacting That One Studio";

		$template = file_get_contents($templates."contact_confirmation_email.html");
		$_POST['message_body'] = insert_content($_POST,$template); //Local function
		// $_POST['cc_group'] = array("peakbagger1@yahoo.com"=>"Rob Lovato");
		// $_POST['bcc_group'] = array("thatonestudiopro@gmail.com");
		$_POST['bcc_group'] = array("rlprodesign@me.com");
		// $_POST['bcc_group'] = array("rlprodesign@me.com");
		$send_result = send_notification($_POST); //Local function

		if($send_result == 1){
			$response['status'] = "success";	
		}else{
			$response['status'] = "failed";
		}
				
		break;
	default:
		$response['status'] = "failed";
		$response['message'] = "no action requested";
		break;
}

print json_encode($response);

function send_notification($args){
	global $mail;
	extract($args);

	$mail->From = "noreply@that1studio.com";
	$mail->FromName = "Customer Service at That One Studio";
	$mail->AddAddress($recipient_email,$recipient_name);
	$mail->Subject = $subject;
	$mail->Body = $message_body;
	if(isset($cc_group)){ //check to see if cc group of email addresses exists
		foreach($cc_group as $cc_email=>$cc_name){
			$mail->AddCC($cc_email,$cc_name);
		}
	}
	if(isset($bcc_group)){ //check to see if cc group of email addresses exists
		foreach($bcc_group as $bcc_email){
			$mail->AddBCC($bcc_email);
		}
	}
	$mail->WordWrap = 50;
	$send_result = $mail->Send();
	$mail->ClearAllRecipients();
	return $send_result;
}

function insert_content($data, $string){
    $string1 = $string;
    foreach($data as $key=>$val){
        $string1 = str_replace("##$key##", $val, $string1);
    }
    return $string1;
}


