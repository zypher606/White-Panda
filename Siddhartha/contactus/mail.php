<?php
	
	$name = $_POST['name'];
	$from = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	$email = "sidc.117@gmail.com"
	
	if( $name=="" && $from=="" && $subject=="" && $message=="" ){
		
	}else{
		
		mail($email, $subject, $message, "From: ".$from);
		
	}
	
?>