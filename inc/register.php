<?php
// CSV template
$csv_head = array('Name','E-mail','Notes','Section 1 - Description','Section 1 - Email','Section 1 - IM','Section 1 - Phone','Section 1 - Mobile','Section 1 - Pager','Section 1 - Fax','Section 1 - Company','Section 1 - Title','Section 1 - Other','Section 1 - Address','Section 2 - Description','Section 2 - Email','Section 2 - IM','Section 2 - Phone','Section 2 - Mobile','Section 2 - Pager','Section 2 - Fax','Section 2 - Company','Section 2 - Title','Section 2 - Other','Section 2 - Address');
// Dave Jeyes,theregoesdave@gmail.com,Test of notes field,Other,,AIM: davejeyes,,,,,,,,,Personal,,,,,,,,,,



$splash_log = "";
if(isset($_POST) && !empty($_POST)) {
    if(empty($_POST['splash_email']) || $_POST['splash_email'] != "hello@thenew.fr") {
        $splash_log .= "The spam filter has detected an intrusion.";
    } else if(empty($_POST['splash_spam']) || !filter_var($_POST['splash_spam'], FILTER_VALIDATE_EMAIL)) {
        $splash_log .= "The email is not correct.";
    } else {
        $path = dirname(__FILE__).'/../mails/';
        $file = $path.'mails.csv';
        $mail = array('', $_POST['splash_spam'], date('c'));
        if(!file_exists($file)) {
            mkdir($path, 0755);
            @file_put_contents($file, '');
        }
        @chmod($path, 0755);
        @file_put_contents($file, date('c').'\n'.implode('\n', $mail).'\n', FILE_APPEND | LOCK_EX);
        $splash_log .= "Thanks. Your email has been registered. You will hear about us soon.";
    }

}