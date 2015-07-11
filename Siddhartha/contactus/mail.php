<?php
	
	$name = $_POST['name'];
	$from = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	$email = "roshan.agarwal@iitgn.ac.in"
	
	if( $name=="" && $from=="" && $subject=="" && $message=="" ){
		
	}else{
		
		mail($email, $subject, $message, "From: ".$from);
		
	}
	
?>
