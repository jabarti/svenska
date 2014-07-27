<?php

/****************************************************
 * Project:     Svenska
 * Filename:    ajax.admin.php
 * Encoding:    UTF-8
 * Created:     2014-07-27
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once "common.inc.php";
include 'DB_Connection.php';
//$title = '';
//include 'header.php';
//include 'flag.php';
//include 'buttons.php';
$Word = new Ord();
switch($_REQUEST['action']){
    case 'trans':
        echo t($_REQUEST['var1']);
        break;
    case 'text_input':
        $text = $_REQUEST['var1'];
        echo "Jest: <span class=red>".$Word->getCountSimOrdByIdOrd($text)."</span> podobnych wyników:";
        $Word->getSimOrdByIdOrd($text);
        break;
    default:
        break;
}
