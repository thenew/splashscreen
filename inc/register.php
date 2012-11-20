<?php
$splash_log = "";
if(isset($_POST) && !empty($_POST)) {
    if(empty($_POST['splash_email']) || $_POST['splash_email'] != "hello@thenew.fr") {
        $splash_log .= "Le filtre anti-spam a détecté une intrusion.";
    } else if(empty($_POST['splash_spam']) || !filter_var($_POST['splash_spam'], FILTER_VALIDATE_EMAIL)) {
        $splash_log .= "L'email n'est pas correct.";
    } else {
        $path = dirname(__FILE__).'/../mails/';
        $file = ;
        $mail = $_POST['splash_spam'];
        if(!file_exists($path))
            mkdir($path, 0755);

        @file_put_contents($file, date('c')."\n".$mail, FILE_APPEND);
    }

}