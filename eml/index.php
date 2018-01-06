<?php
/*
$mbox = imap_open ("{map.gmail.com:993/imap/ssl}INBOX", "moo@zoojoo.be", "Pwd123.!@#");
$message_count = imap_num_msg($mbox);
if ($message_count > 0) {
    $headers = imap_fetchheader($mbox, $message_count, FT_PREFETCHTEXT);
    $body = imap_body($mbox, $message_count);
    file_put_contents('here.eml', $headers . "\n" . $body);
}
imap_close($mbox);*/

require 'vendor/autoload.php';


$mail = new PHPMailer;
//define( 'ABSPATH', dirname(dirname(__FILE__)) . '/' );
define( 'ABSPATH', getcwd() . '/' );
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.mandrillapp.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "avinash.saurabh@zoojoo.be";
//Password to use for SMTP authentication
$mail->Password = "7FHjsrippAeYlkIe77CkPg";





$mail->setFrom('moo@zoojoo.be', 'Moovendan');
$mail->addAddress('moovendan@gmail.com', 'moovendan');
$mail->Subject = 'HCL EML test';
$msg    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>HCL</title>
  </head>
  <body style="font-family:"calibri" ; background:#ccc;">
    <table width="1116" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top" height="53">
          <img src="images/963dc8cf-11e7-45aa-8ef2-130f2f498238.jpg" alt="" width="1116" height="79">
        </td>
      </tr>
      <tr>
        <td>
          <table border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="533" valign="top">
                <img src="images/3c7f6162-be6f-4f3e-a6a7-103ef6eaf18d.jpg" alt="" width="556" height="584">
              </td>
              <td valign="top" style="background:#ededed;width:560px;padding:0px 20px;">
                <p style="margin:0px;padding-top:40px;">Dear HCLites,</p>
                <p style="margin:0px;padding-top:20px;">Are you stressed about finding an answer to your stress? Don\'t worry, there\'s an easy solution.</p>
                <p style="margin:0px;padding-top:5px;">All it takes is 5 minutes.</p>
                <p style="margin:0px;padding-top:5px;">Start with guided meditation sessions today and say goodbye to stress forever.</p>
                <p style="margin:0px;padding-top:5px;"></p>
                <a style="color:#0a94ad;font-size:22px;margin:0px;padding-top:5px;font-weight:bold;" href="https://hcl.appzoojoo.be/mindful_minutes">Subscribe here</a>
                <p style="margin:0px;padding-top:30px;">Find yourself calmer,relaxed and de-stressed. Try it out today.</p>
                <p></p>
                <p style="margin:0px;padding-top:5px;">Akash Gupta</p>
                <p style="margin:0px;padding-top:5px;">HR- Employee Engagement COE </p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <img src="images/81944edd-2e9b-40b3-953a-89b1827acfc5.jpg" alt="" width="1116" height="68">
        </td>
      </tr>
    </table>
  </body>
</html>';

$mail->MsgHTML($msg,ABSPATH);
//$mail->createBody();
$mail->preSend();
echo $mail->getSentMIMEMessage();exit;



//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
  //  echo $mail->getSentMIMEMessage();exit;

      file_put_contents('from_template.eml', $mail->getSentMIMEMessage());
}


//echo $mail->createBody();exit;

?>
