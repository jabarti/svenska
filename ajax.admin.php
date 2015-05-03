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

$Word = new Ord();
switch($_REQUEST['action']){
    case 'trans':
        echo t($_REQUEST['var1']);
        break;
    case 'text_input_id_ord':
        $text = $_REQUEST['var1'];
//        echo "Jest: <span class=red>".$Word->getCountSimOrdByIdOrd($text)."</span> podobnych wyników:";
        $Word->getSimOrdByIdOrd($text);
        break;
    case 'text_input_trans':
        $text = $_REQUEST['var1'];
//        echo "Jest: <span class=red>".$Word->getCountSimOrdByIdOrd($text, 'trans')."</span> podobnych wyników:";
        $Word->getSimOrdByTrans($text);
//            echo $text;
        break;
    case 'text_input_sercz':
        $text = $_REQUEST['var1'];
//        echo "Jest: <span class=red>".$Word->getCountSimOrdByIdOrd($text, 'trans')."</span> podobnych wyników:";
//        $Word->getSimOrdByTrans($text);
            echo $text;
        break;
    case 'del_rand_stats':
        $rand = new Random();
        $rand->deleteAllRecords();      
        break;
    case 'getOrdInfo':
//        echo 'TODO: TEST.php - "ordAnchor" button. Dane jeszcze nie utworzone:';
//        echo 'TODO: TEST.php - "ordAnchor" button. Dane jeszcze nie utworzone ID_ord: '.$_REQUEST['var1'];
        $arr = $Word->getOrdById($_REQUEST['var1']);
        foreach($arr as $k => $v){
            if($v != ''){
                echo t($k)." => $v<br>";
            }
        }
//        var_dump($arr);
        break;
    default:
        break;
}
