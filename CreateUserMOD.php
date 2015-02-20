<?php

/****************************************************
 * Project:     Svenska
 * Filename:    CreateUserMOD.php
 * Encoding:    UTF-8
 * Created:     2015-01-30
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
// Tu trafiają dane z CreateUser.php
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Create New User MOD';
include 'header.php';
//include 'buttons.php';

echo "JESTEŚ W CreateUserMOD.php";

if(isset($_POST)){
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $haslo = $_POST['haslo'];
    $haslo2 = $_POST['haslo2'];  // TODO: zrobić walidację na poziomie CreateUser.php
    $PublicKey = $_POST['PublicKey'];
    $PassCrypt = $_POST['PassCrypt'];
    
    foreach($_POST as $k =>$v){
        echo "<br>$k=>$v";
    }
    
//    echo "<br>HASLA: 1) $haslo 2) $haslo2";
       
    if($haslo != $haslo2){
        ?><script> alert("Różne hasla!!!") </script><?php
//        header("Location: CreateUser.php");
//        $output = shell_exec('ls -lart');
//        echo "<pre>$output</pre>";
        
    }else{
        echo "<br>".$imie." / ".$nazwisko." / ".$login." / ".$haslo." / ".$haslo2."<br>";
        echo __DIR__."<br>";
        echo __FILE__;
        try{
            $newUser = new User();
            $boola = $newUser->setData($imie, $nazwisko, $login, $haslo, $email, $PublicKey, $PassCrypt);
//            $output = exec('/home/bartilev/public_html/Svenska/Includes/dll/gp-gitc8c06bc.exe skrypt_01.gp');
            if($boola){
                $communicate = '?comm='.'OK';
            }else{
                $communicate = '?comm='.'User like <span class=red>"'.$login.'"</span> exists';
            }
        } catch (Exception $ex) {
            $error = $ex->getMessage();
            echo '<br>Caught exception: ',  t($error), "\n";
            $communicate = '?comm='.$error;
        }
        
//        $output = shell_exec('ls -l');
        echo "<pre>Output $output</pre>";
//        header("Location: index.php".$communicate);
        header("Location: index.php");
    }
}
?>

<button onclick="window.location.href='index.php'">WRÓĆ</button>

