<?php

$name = $_POST['name'];
$email = $_POST['email'];
$betreff = $_POST['betreff'];
$nachricht = $_POST['nachricht'];


$my_file = "3610-tulips.jpg";
$my_path = "uploads/";
$my_name = "$name";
$mail = "$email";
$my_mail = "natal.bumann@admin.vs.ch";
$my_replyto = "natal.bumann@admin.vs.ch";
$my_subject = "$betreff";
$my_message = "$nachricht";
mail_attachment($my_file, $my_path, $mail, $my_mail, $my_name, $my_replyto, $my_subject, $my_message);



function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
 $file = $path.$filename;
 $file_size = filesize($file);
 $handle = fopen($file, "r");
 $content = fread($handle, $file_size);
 fclose($handle);
 $content = chunk_split(base64_encode($content));
 $uid = md5(uniqid(time()));
 $header = "From: ".$from_name." <".$from_mail.">";
 $header .= "Reply-To: ".$replyto."";
 $header .= "MIME-Version: 1.0";
 $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"";
 $header .= "This is a multi-part message in MIME format.";
 $header .= "--".$uid."";
 $header .= "Content-type:text/plain; charset=iso-8859-1";
 $header .= "Content-Transfer-Encoding: 7bit";
 $header .= $message."";
 $header .= "--".$uid."";
 $header .= "Content-Type: application/octet-stream; name=\"".$filename."\""; // use different content types here
 $header .= "Content-Transfer-Encoding: base64\r";
 $header .= "Content-Disposition: attachment; filename=\"".$filename."\"";
 $header .= $content."";
 $header .= "--".$uid."--";
 if (mail($mailto, $subject, "", $header)) {
 echo "mail send ... OK"; // or use booleans here
 } else {
 echo "mail send ... ERROR!";
 }
}

?>