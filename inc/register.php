<?php
$data_format = "Name,E-mail,Notes\r\n";
$splash_log = "";
if(isset($_POST) && !empty($_POST)) {
    // Spam filter
    if(empty($_POST['splash_email']) || $_POST['splash_email'] != "hello@thenew.fr") {
        $splash_log .= "The spam filter has detected an intrusion.";
    // Email validate filter
    } else if(empty($_POST['splash_spam']) || !filter_var($_POST['splash_spam'], FILTER_VALIDATE_EMAIL)) {
        $splash_log .= "The email is not correct.";
    } else {
        $path = dirname(__FILE__).'/../mails/';
        $file = $path.'mails.csv';
        // POST values
        $mail = $_POST['splash_spam'];
        $name = explode("@", $mail);
        $name = $name[0];
        // Name, E-mail, Notes
        $data = array($name, $mail, date('c'));
        if(!file_exists($file)) {
            mkdir($path, 0755);
            @file_put_contents($file, $data_format);
        }
        @chmod($path, 0755);

        @file_put_contents($file, implode(",", $data)."\r\n", FILE_APPEND | LOCK_EX);
        $splash_log .= "Thanks. Your email <em>".$mail."</em> has been registered.<br /> You will hear about us soon.";
    }
}