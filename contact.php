<?php
if ( isset( $_GET['cf_email']) ){ $filtered_var = mysql_escape_string( $_GET['cf_email'] ); $_GET['cf_email'] = $filtered_var;}
if ( isset( $_POST['cf_email']) ){ $filtered_var = mysql_escape_string( $_POST['cf_email'] ); $_POST['cf_email'] = $filtered_var;}
if ( isset( $_REQUEST['cf_email']) ){ $filtered_var = mysql_escape_string( $_REQUEST['cf_email'] ); $_REQUEST['cf_email'] = $filtered_var;}

if ( isset( $_GET['cf_message']) ){ $filtered_var = mysql_escape_string( $_GET['cf_message'] ); $_GET['cf_message'] = $filtered_var;}
if ( isset( $_POST['cf_message']) ){ $filtered_var = mysql_escape_string( $_POST['cf_message'] ); $_POST['cf_message'] = $filtered_var;}
if ( isset( $_REQUEST['cf_message']) ){ $filtered_var = mysql_escape_string( $_REQUEST['cf_message'] ); $_REQUEST['cf_message'] = $filtered_var;}
$field_name = $_POST['cf_name'];
$field_email = $_POST['cf_email'];
$field_message = $_POST['cf_message'];
$mail_to = 'chris@cwardcode.com';
$subject = 'Message from cwardcode.com '.$field_name;
$body_message = 'From: '.$field_name."\n";
$body_message .= 'E-mail: '.$field_email."\n";
$body_message .= 'Message: '.$field_message;
$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";
if(empty($field_email)) { ?>
    <script language="javascript" type="text/javascript">
        alert('Please enter an email address');
        window.location = 'contact.html'
    </script> <?php
} elseif(empty($field_message)) { ?>
    <script language="javascript" type="text/javascript">
        alert('Please enter a message to send!');
        window.location = 'contact.html'
    </script> <?php
} else {
$mail_status = mail($mail_to, $subject, $body_message, $headers);

if ($mail_status) { ?>

    <script language="javascript" type="text/javascript">
        alert('Thank you for the message. You will receive a response shortly.');
        window.location = 'index.html';
    </script>

<?php } else { ?>

    <script language="javascript" type="text/javascript">
        alert('Message failed. Please, send an email directly to chris@cwardcode.com');
        window.location = 'index.html';
    </script>

<?php }} ?>
