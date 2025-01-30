<?php

require_once('PHPMailer/class.phpmailer.php'); 

if (isset($_GET['action']) && ($_GET['action'] == 'process')) {

  $user_name = $_POST["userName"];
  $customer_email = $_POST["userEmail"];
  $company = $_POST["company"];
  $message = nl2br($_POST["message"]); // Converts newlines to <br>
  $phone_number = $_POST["phone_number"];
  $state = $_POST["state"];

  $send_email_to = "youremail@email.com";
	
	

  $body = '<html>
      <head>
        <title>Contact US</title>
      </head>
      <body>
        Hello '.$title.' Notifications,<br>
        <br>
        This is an automated email to inform you that a customer has fill an enquiry form on the website. Please respond to the following enquiry when you have a chance (customer email: <a href="mailto:'.$customer_email.'">'.$customer_email.'</a>):<br>
        <br>
        <strong>Name: </strong>'.$user_name.'<br>
        <strong>Email Address: </strong>'.$customer_email.'<br>
        <strong>Company: </strong>'.$company.'<br>
        <strong>Phone Number: </strong>'.$phone_number.'<br>
        <strong>Location: </strong>'.$state.'<br>
        <strong>Message: </strong>'.$message.'<br>
        <br><br>
        Thank you,<br><br>
      </body>
      </html>';

      $customer_email_2 = new PHPMailer();
      $customer_email_2->isHTML(true); // Enables HTML on the mail body
      $customer_email_2->From      = $customer_email;
      $customer_email_2->FromName  = $user_name;
      $customer_email_2->Subject   = "Contact Enquiry";
      $customer_email_2->Body      = $body;
      $customer_email_2->AddAddress($send_email_to);
      $customer_email_2->AddCC($send_email_cc);
      $customer_email_2->Send();

	/*  Auto confirmation to the customer */
	
 	$body_1 = '<html>
      <head>
        <title>Contact US</title>
      </head>
      <body>
        Hello '.$user_name.',<br>
        <br>
        This is an automated email to inform you that your web enquiry has been received by our team. One of our customer service representatives will respond as soon as possible. :<br>
        <br>
        <strong>Name: </strong>'.$user_name.'<br>
        <strong>Email Address: </strong>'.$customer_email.'<br>
        <strong>Company: </strong>'.$company.'<br>
        <strong>Phone Number: </strong>'.$phone_number.'<br>
        <strong>Location: </strong>'.$state.'<br>
        <strong>Message: </strong>'.$message.'<br>
        <br>
        Thank you,<br><br>
      </body>
      </html>';

      $customer_email1 = new PHPMailer();
      $customer_email1->isHTML(true); // Enables HTML on the mail body
      $customer_email1->From      = $send_email_to;
      $customer_email1->FromName  = $user_name;
      $customer_email1->Subject   = "Thank you for Contact Enquiry";
      $customer_email1->Body      = $body_1;
      $customer_email1->AddAddress($customer_email);
      $customer_email1->Send();

      print "<div class='success_contact_us_form'>Thank you for recent Enquiry. One of our customer representative will contact you shortly!</div>";

}

else{

  echo "You do not have permission to access this page. Please contact website administration for further information.";

}

?>