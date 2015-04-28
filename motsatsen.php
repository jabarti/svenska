<?php

/****************************************************
 * Project:     Svenska
 * Filename:    motsatsen.php   // motsatsen = przeciwieństwa!!
 * Encoding:    UTF-8
 * Created:     2014-10-22
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
include 'common.inc.php';
include 'DB_Connection.php';
$title = 'Svenska | '.t("Przeciwieństwa");
include 'title.php';
include 'header.php';
include 'buttons.php';
include 'divLog.php';

if($Word = new Ord()){
    $empty_rec = $Word->findEmptyOrdId();
    echo "<br>line(".__LINE__.") Empty_records: ";var_dump($empty_rec);
    
}

//if(isset($_SESSION['log'])&& isset($_COOKIE['log'])){
if($_SESSION['log'] == true ){
    if($_SESSION['log'] == true){
        echo "<br>Zalogowany jako: ".$_SESSION['user'];//." z hasłem: ". $_SESSION['password'];
    }else{
        echo "<br>NIE ZALOGOWANY";
    }
}

echo '<br> TODO!!! koniec pliku';
