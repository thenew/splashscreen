<?php
$splash_log = "";
if(isset($_POST) && !empty($_POST)) {
    if(empty($_POST['splash_email']) || $_POST['splash_email'] != "hello@thenew.fr") {
        $splash_log .= "The spam filter has detected an intrusion.";
    } else if(empty($_POST['splash_spam']) || !filter_var($_POST['splash_spam'], FILTER_VALIDATE_EMAIL)) {
        $splash_log .= "The email is not correct.";
    } else {
        $path = dirname(__FILE__).'/../mails/';
        $file = $path.'mails.csv';

        $mail = $_POST['splash_spam'];
        $name = explode("@", $mail);
        $name = $name[0];
        $data = array($name, $mail, date('c'));
        if(!file_exists($file)) {
            mkdir($path, 0755);
            @file_put_contents($file, "Name,E-mail,Notes\r\n");
        }
        @chmod($path, 0755);
        @file_put_contents($file, implode(",", $data)."\r\n", FILE_APPEND | LOCK_EX);
        $splash_log .= "Thanks. Your email <em>".$mail."</em> has been registered.<br /> You will hear about us soon.";
    }
}