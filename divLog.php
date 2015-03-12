<?php

/****************************************************
 * Project:     Svenska
 * Filename:    divLog.php
 * Encoding:    UTF-8
 * Created:     2014-07-25
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
//require_once "common.inc.php";
//include 'DB_Connection.php';
//$title = '';
//include 'header.php';
//include 'flag.php';
//include 'buttons.php';

//foreach($_SESSION as $k => $v){
//    echo "<br>SESSION $k => $v";
//}
//        echo "<br>".__FILE__.__LINE__." ROLE:".$_SESSION['role'];
//        echo "<br>user:".$_SESSION['user'];
?><script>//alert ("JEST divlog");</script><?php

if(isset($_SESSION['log'])){
    ?><script>//alert ("JEST divlog i jest SESS[log]");</script><?php
    if($_SESSION['log'] == true){
        ?><script>//alert ("JEST divlog i jest SESS[log] == true");</script><?php
//    echo "<div class=divLog>  ".t('Zalogowany jako').": ".$_SESSION['user']." (".$_SESSION['role'].")";//." z hasłem: ". $_SESSION['password'];
    echo "<div class=divLog>  ";//.t('Zalogowany jako').": ".$_SESSION['user']." (".$_SESSION['role'].")";//." z hasłem: ". $_SESSION['password'];
        echo "<table class='tabl_time'  >";
        echo "<tr><td><span>".t('Zalogowany jako')."</span>: </td><td><span>".$_SESSION['user']." (".$_SESSION['role'].")</span></td></tr>";
        echo "<tr><td><span id=zegarText1>".t('obecny czas')."</span>: </td><td><span id=zegar></span></td></tr>";
        echo "<tr><td><span id=zegarText2>".t('do wylogowania zostało')."</span>: </td><td><span id=zegar_log style='visibility: block'></span></td></tr>";
        echo "</table>";
        echo "<button onclick=\"window.location.href='logerMOD.php?action=logout'\">".t("Wyloguj")."</button>";
        if(isset($_COOKIE['log'])){
           $tim = $_COOKIE['log']; 
        }else{
            $tim = time()+60*60;
        }
        echo "<span id=log_time style='visibility: hidden;'>".$tim."</span>";
//        echo "<input id=log_time type=hidden value='".$tim."'>";
        echo "</div>";
    }else{
        echo "<div class=divLog>".t("NIE ZALOGOWANY")."</div>";
    }
}
else{
//    echo "<br>Brak SESS[log]!!!"."| File:".__FILE__.", line:".__LINE__;
//    if(!isset($_SESSION['log']))
//        echo "ERROR: Brak sesji użytkownika. Prosze wcisnąć F5";
}
