<?php
// 日本語
if (!$_POST['from'] || $_POST['pw'] != 'な') {
//  header( "Location: " . $_SERVER['HTTP_REFERER'] );
  header( "Location: https://" . $_SERVER['HTTP_HOST'] . "/?sent=2" );
} else {
  $name  = $_POST['name'];
  $from  = "From: ".$_POST['from'];
  $subj  = "[siteyuh.com] yuhへのメッセージ";
  $comm  = $_POST['comm'].PHP_EOL.PHP_EOL."from ".$name." さま";
  $comm .= PHP_EOL.'---'.PHP_EOL.$_SERVER['HTTP_USER_AGENT'].PHP_EOL;
  $comm .= $_SERVER['REMOTE_ADDR'].PHP_EOL.$_SERVER['REMOTE_HOST'];
  $to    = "info@siteyuh.com";
	
  $internal_enc = 'UTF-8';
  mb_language('ja');
  mb_internal_encoding($internal_enc);
  mb_send_mail($to, $subj, $comm, $from, '-f' . $from);

  header( "Location: https://" . $_SERVER['HTTP_HOST'] . "/?sent=1" );
}
