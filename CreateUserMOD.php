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
include 'buttons.php';

echo "JESTEŚ W CreateUserMOD.php";

if(isset($_POST)){
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $haslo = $_POST['haslo'];
    $haslo2 = $_POST['haslo2'];  // TODO: zrobić walidację na poziomie CreateUser.php
    
//    echo "<br>HASLA: 1) $haslo 2) $haslo2";
    
//    function Exeg($e){
//        if (!$e){
//            $message = "<br>DUpa blada";
//            throw new Exception($message);
//        }else{
//            return 1/$e;
//        }
//    }
//    
//    try{
//        echo "<br>EXEG(2):".Exeg(2);
//        echo "<br>EXEG(0):".Exeg(0);
//    } catch (Exception $e) {
//        echo $e->getMessage();
//    }
    
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
            $newUser->setData($imie, $nazwisko, $login, $haslo, $email);
//            $output = exec('/home/bartilev/public_html/Svenska/Includes/dll/gp-gitc8c06bc.exe skrypt_01.gp');
        } catch (Exception $ex) {
            echo '<br>Caught exception: ',  $ex->getMessage(), "\n";
        }
        
//        $output = shell_exec('ls -l');
        echo "<pre>Output $output</pre>";
        header("Location: index.php");
    }
}
?>

<button onclick="window.location.href='index.php'">WRÓĆ</button>

