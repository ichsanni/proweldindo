<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' => '6Le9qNwUAAAAANoR-39QTKEjCcBR2gO6dn8RvHzK',
		'response' => $_POST["g-recaptcha-response"]
	);
	$options = array(
		'http' => array (
			'method' => 'POST',
			'header' => "Content-Type: application/x-www-form-urlencoded",
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success=json_decode($verify);

	if ($captcha_success->success==true) {
		$today = date("Y-m-d H:i:s");
		$ipaddress = @$_SERVER['REMOTE_ADDR'];
		$txtname = @$_POST['txtName'];
		$txtcompany = @$_POST['txtCompany'];			
		$txtemail = @$_POST['txtEmail'];			
		$txtphone = @$_POST['txtPhone'];	
		$txtcomment = @$_POST['txtComment'];			

		$data2 .= "Name : ".$txtname."\r\n";
		$data2 .= "Company : ".$txtcompany."\r\n";		
		$data2 .= "Email : ".$txtemail."\r\n";
		$data2 .= "Phone : ".$txtphone."\r\n";			
		$data2 .= "Comment : ".$txtcomment."\r\n";					
		$data2 .= "\r\n";			
				
		$to = "info@proweldindo.com";
		$from = $txtemail;
		$subject = "Contact Us";
		$message .= "Contact Us from website www.proweldindo.com\r\n\r\n";
		$message .= $data2."\r\n\r\n";
		$message .= "Thank you,\r\n";
		$message .= "www.proweldindo.com\r\n";
		//Normal headers
		$headers  = "From: $txtName <$txtemail>";				
		mail($to,$subject,$message,$headers);
		header("Location: ".$_SERVER['HTTP_REFERER']."?email=sent");
	} else {
		header("Location: ".$_SERVER['HTTP_REFERER']."?email=failed");
	}
?>
