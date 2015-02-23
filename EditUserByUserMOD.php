<?php

/****************************************************
 * Project:     Svenska
 * Filename:    EditUserByUserMOD.php
 * Encoding:    UTF-8
 * Created:     2015-02-21
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Edit User Data';
include 'header.php';
//include 'buttons.php';

foreach ($_POST as $k => $v){
    echo "<br>$k => $v";
}

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$password = $_POST['password'];
$PublicKey = $_POST['PublicKey'];
$PassCrypt = $_POST['PassCrypt'];
$email = $_POST['email'];
$usr = $_POST['user'];

$user = new User();
$bol = 1;
try{
    $user->updateDataByUser($imie, $nazwisko, $password, $PublicKey, $PassCrypt, $email, $usr);
//    echo "<script> window.location.replace('EditUserByUser.php') </script>";
    $bol = "Dane zmienione";
} catch (Exception $ex) {
    echo "<br>Sorry $ex";
    $bol = "Nie udało się zmienić danych";
}
    echo "<script> window.location.replace('EditUserByUser.php?comm=".$bol."') </script>";
    header("Location: EditUserByUser.php?comm=$bol");

