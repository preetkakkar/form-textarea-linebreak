# line breaks for the textarea field in the PHP form

IF form is stripping out line breaks when sending the email. Here are a few things to check and fix:

<strong>1. Ensure Proper Formatting in the Email Template</strong><br />
If your form sends emails in HTML format, you need to preserve line breaks by converting newlines (\n) into <br> tags.
Example (PHP - Using nl2br())

If you're using PHP to send the email:

$message = nl2br($_POST['message']); // Converts newlines to <br>

Example (Magento 2 Email Template)

If you're using a Magento email template, wrap the variable inside escape with nl2br:

{{var message|escape|nl2br}}


If your email is sent as plain text, make sure the Content-Type is set correctly:
For Plain Text Email:

$headers = "Content-Type: text/plain; charset=UTF-8";

For HTML Email:

$headers = "Content-Type: text/html; charset=UTF-8";

If it's an HTML email, you must replace line breaks (\n) with <br> manually using nl2br().

