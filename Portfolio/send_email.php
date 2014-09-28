<?php

	$autoResponse = true; //if set to true auto response email will be sent, if you don't want autoresponse set it to false
	$autoResponseSubject = "Customer Contact Form"; 
	$autoResponseMessage = "Hi, thank you We will contact you soon.";
	$autoResponseHeaders = "From: jmgeear@gmail.com";  
	
    //we need to get our variables first
	$email_to =   'jmgeear@gmail.com'; //the address to which the email will be sent
    $topic    =   $_POST['topic'];
    $name     =   $_POST['name'];
    $email    =   $_POST['email'];
    $subject  =   $_POST['subject'];
    $msg  =   $_POST['message'];
    
    $message = "From: $name \r\nEmail: $email \r\nTopic: $topic \r\nMessage: \r\n$msg";

    /*the $header variable is for the additional headers in the mail function,
     we are asigning 2 values, first one is FROM and the second one is REPLY-TO.
     That way when we want to reply the email gmail(or yahoo or hotmail...) will know
     who are we replying to. */
    $headers  = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    

    if(mail($email_to, $subject, $message, $headers)){
    	if($autoResponse === true){
    		mail($email, $autoResponseSubject, $autoResponseMessage, $autoResponseHeaders);
    	}
        echo 'sent'; // we are sending this text to the ajax request telling it that the mail is sent..
    }else{
        echo 'failed';// ... or this one to tell it that it wasn't sent
    }


?>