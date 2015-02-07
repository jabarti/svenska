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

if(isset($_SESSION['log'])){
//    echo "<br>SESS[log] isset!!!";
    if($_SESSION['log'] == true){
    echo "<div class=divLog>  ".t('Zalogowany jako').": ".$_SESSION['user']." (".$_SESSION['role'].")";//." z hasłem: ". $_SESSION['password'];
        echo "<span id=zegar></span><br>";
        echo "<span id=zegar_log style='visibility: block'></span>";
        echo "<br><button onclick=\"window.location.href='loger.php'\">".t("Wyloguj")."</button>";
        $tim = $_COOKIE['log'];
        echo "<span id=log_time style='visibility: hidden;'>".$tim."</span>";
//        echo "<input id=log_time type=hidden value='".$tim."'>";
        echo "</div>";
    }else{
        echo "<div class=divLog>".g("NIE ZALOGOWANY")."</div>";
    }
}else{
    echo "<br>Brak sesji log!!!"."| File:".__FILE__.", line:".__LINE__;
    $_SESSION['log'] = false;
    header("Location: index.php");
}
