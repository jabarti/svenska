<?php

/****************************************************
 * Project:     Svenska
 * Filename:    help_test_admin.php
 * Encoding:    UTF-8
 * Created:     2014-07-17
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once "common.inc.php";
include 'DB_Connection.php';
$title = 'Svenska | Show/printer';
include 'header.php';
//include 'flag.php';
include 'buttons.php';

if(isset($_SESSION['log'])){
    if($_SESSION['log'] == true){
        echo "<br>Zalogowany jako: ".$_SESSION['user'];//." z hasłem: ". $_SESSION['password'];
    }else{
        echo "<br>NIE ZALOGOWANY";
    }
}

echo $_SESSION['user'];

//if(true){
if($_SESSION['log'] == true && $_SESSION['user'] == 'Bartek'){   
    


if($Word = new Ord()){
    echo "<br>OK";
}else{
    echo "<br>NOT OK: Object of Ord class not created!";
}

$max = $Word->getLastId();


$Word->findEmptyOrdId();

} else {
    require 'loger.php';
}

