<?php

/****************************************************
 * Project:     Svenska
 * Filename:    RestorePasswordMOD.php
 * Encoding:    UTF-8
 * Created:     2015-02-19
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Restore Password';
include 'header.php';
//include 'buttons.php';

if(isset($_POST)){
    foreach($_POST as $k =>$v){
        echo "<br>$k=>$v";
    }
    
    $RestorPassQuest = $_POST['RestorPassQuest'];

    $usrMail = new User();
    $usrData = $usrMail->getUserPassCryptByUserOrMail($RestorPassQuest);
    var_dump($usrData);
    echo "<br>UsrData[mail]: ".$usrData['email'];
    echo "<br>UsrData[PassCrypt]: ".$usrData['PassCrypt'];
    
        $headers =  'From: svenska@bartilevi.pl' . "\r\n";
//        $headers .= 'Bcc: jabarti@wp.pl' . "\r\n";    //'bartosz.lewinski@bartilevi.pl';
        $headers .= 'Bcc: '.$usrData['email']. "\r\n";    //'bartosz.lewinski@bartilevi.pl';
        $headers .= 'Reply-To: svenska@bartilevi.pl' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
    
        $text = $usrData['PassCrypt'];
        $text .= '<br><a href="http://www.bartilevi.pl/Svenska/Resources/Pari/RSAPassword/RSAPassword.zip" download>RSAPassword.zip</a>';
        $text .= '<br><a href="http://www.bartilevi.pl/Svenska/Resources/Pari/Pari-2-7-2.exe" download>Pari-2-7-2.exe</a>';
    try{
        $boolka = mail($usrData['email'], t("Przypomnienie hasła(zaszyfrowane kluczem publicznym - algorytm RSA)"),  $text,$headers);
        
        if($boolka){
            echo "<br>działa";
            echo "<br>HEADERS: $headers";
        }else{
            echo "<br>NIE działa";
            echo "<br>HEADERS: $headers";
        }
    } catch (Exception $ex) {
        echo("MAil nie poszedł");
    }
    header("Location: index.php");
}
?>
<br>
<button onclick="window.location.href='index.php'">WRÓĆ</button>