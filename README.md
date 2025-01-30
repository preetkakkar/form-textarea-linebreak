# line breaks for the textarea field in the PHP form

IF form is stripping out line breaks when sending the email. Here are a few things to check and fix:

<strong>1. Ensure Proper Formatting in the Email Template</strong><br />
If your form sends emails in HTML format, you need to preserve line breaks by converting newlines (\n) into <br> tags.
Example (PHP - Using nl2br())

If you're using PHP to send the email:

<strong>$message = nl2br($_POST['message']);</strong> // Converts newlines to <br>

Example (Magento 2 Email Template)

If you're using a Magento email template, wrap the variable inside escape with nl2br:

{{var message|escape|nl2br}}

<strong>2. Check the Email Format</strong><br />
If your email is sent as plain text, make sure the Content-Type is set correctly:
For Plain Text Email:

$headers = "Content-Type: text/plain; charset=UTF-8";

For HTML Email:

$headers = "Content-Type: text/html; charset=UTF-8";

If it's an HTML email, you must replace line breaks (\n) with <br> manually using nl2br().

<strong>Example: Message in email without line breaks</strong><br /><br />
![Capture1](https://github.com/user-attachments/assets/e4d5ca9d-d449-4c95-a92b-01d20b628442)


<strong>Example: Message in email with line breaks</strong><br /><br />
![Capture2](https://github.com/user-attachments/assets/0250e074-4e1a-4152-aa70-97d79db24248)
