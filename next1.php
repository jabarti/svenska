<?php
/* * **************************************************
 * Project:     ZZZProba
 * Filename:    next1.php
 * Encoding:    UTF-8
 * Created:     
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
include 'common.inc.php';
include 'DB_Connection.php';
$title = 'A | next1';
include 'header.php';
include 'buttons.php';


if(isset($_GET['text'])){
    if($_GET['text'] != ''){
        $text = $_GET['text'];
        ?><script>one();</script><?php
        echo "<br>OTO text z ajax: ".$text;
    } else {
        echo "<br>PUSTY<br>";
        ?><script>three();</script><?php
    }
}else{
    echo "<br>NO POST<br>";
    ?><script>two();</script><?php
}

switch($_REQUEST['action'])
{
    case 'try':
        print "ALa";
        
        break;
}

