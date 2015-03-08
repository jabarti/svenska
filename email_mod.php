<?php

/****************************************************
 * Project:     Svenska
 * Filename:    email_mod.php
 * Encoding:    UTF-8
 * Created:     2015-02-09
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | mailMOD';
include 'header.php';
//include 'buttons.php';

echo "<br>POST:";var_dump($_POST);


if ($REMOTE_ADDR)
    $MyServ = "MyServer!";
else
    $MyServ = $_SERVER["REMOTE_ADDR"];

if (isset($_POST['mailform'])){
        if(isset($_POST['mail'])){
            echo "<br> POST[mail]=".$_POST['mail']."<br>";
            $to = 'bartosz.lewinski@bartilevi.pl, ';        // note the comma
//            $to .= $_POST['mail'].',';           //'bartosz.lewinski@bartilevi.pl';$_POST['mail']
//            $_SESSION['user_mail'] = $_POST['mail'];          //'bartosz.lewinski@bartilevi.pl';$_POST['mail']
//            echo "<br>MAIL = ".$_SESSION['user_mail'].'<br>';
        } else {
            $to = '';//jabarti@wp.pl';          //'bartosz.lewinski@bartilevi.pl';
        }

        $subject = $_POST['subject'] ? $_POST['subject'] : 'Empty';
        
        $message = isset($_POST['message']) 
                ? "Your message:"."\r\n".
                   $_POST['message'].
                   "\r\n"."================".
                   "\r\n".'Hello from '.$_SERVER["HTTP_HOST"]."\r\n".'Your IP: '.$MyServ
                : 'Hello from '.$_SERVER["HTTP_HOST"]."\r\n"."Your IP: ".$MyServ;

//        $headers .= 'To: ' . "\r\n";
        $headers =  'From: bartosz.lewinski@bartilevi.pl' . "\r\n";
        $headers .= 'Bcc: jabarti@wp.pl' . "\r\n";    //'bartosz.lewinski@bartilevi.pl';
        $headers .= 'Bcc: '.$_POST['mail']. "\r\n";    //'bartosz.lewinski@bartilevi.pl';
        $headers .= 'Reply-To: bartosz.lewinski@bartilevi.pl' . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();

        try{
            echo '<br>$to: '.$to;
            echo '<br>$subject: '.$subject;
            echo '<br>$message: '.$message;
            echo '<br>$headers: '.$headers;
            
            if(($_POST['subject'])!='' || $_POST['message'] != ''){
                echo "<br>WYSYŁANY MAIL!!!";
                mail($to, $subject, $message, $headers) or die("<br>Nie wysłano maila");
                
                unset($_POST);
                unset($_GET);
                header("Location: mail.php?send=ok");                
                echo "<br><button type='button' onclick='window.location.href=\"mail.php?send=ok\"'>Click Me!</button>";
//                echo '<br>'.__line__.' | No.01 header("Location: index.php?send=ok")';
            } else {
                  unset($_POST);
                  unset($_GET);
                  header("Location: mail.php?send=no");                  
                  echo "<br><button type='button' onclick='window.location.href=\"mail.php?send=no\"'>Click Me!</button>";

//                  echo '<br>'.__line__.' | No.02 header("Location: index.php?send=no")';
            }   
        } catch (Exception $ex) { 
            echo "ERROR: ".$ex;
        }
} else {
    ?><script>
    alert ("Nie weszło!")
    </script><?php
}
