<?php

/****************************************************
 * Project:     Svenska
 * Filename:    LogShow.php
 * Encoding:    UTF-8
 * Created:     2015-03-18
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | '.t("LogShow");
include 'header.php';
include 'buttons.php';

$LogOrd = new Log_Ord();
$User = new User();
$Ord = new Ord();
$arr = '';

echo "<form action='LogShow.php' method='post'>";
echo "Po id słowa: <input type='text' name='id_ord'>";
echo "Po id usera: <input type='text' name='id_user'>";
echo "<input type='submit' name='subm_01' value='submit'>";
echo "</form>";

if(isset($_POST['id_ord']) AND $_POST['id_ord'] !='' ){
    $id_ord = $_POST['id_ord'];
    $id_user = false;
    $arr = $LogOrd->getLogByOrdId($id_ord);
    
}else 
if(isset($_POST['id_user']) AND $_POST['id_user'] !=''){
//    $id_ord = false;
    $id_ord=2653;
    $id_user = $_POST['id_user'];
    $arr = $LogOrd->getLogByUsrId($id_user);
//    $UsrName = $User->getUsrById($id_user);
}else{
    $id_ord=false;
    $id_user=false;
}

//echo "<br>VARDUMP: ";var_dump($arr);

echo "<table class='edit_table'>";
echo "<form>";
$j=0;
$i=0;
//$kol = 6;
//echo "<br>ile: ".count($arr[0]);
$kol = count($arr[0]);
foreach ($arr as $ar){
    if($j==0){
        foreach ($arr[0] as $v => $k){  
            switch($v){
                case 'id':
                    break;
                default:
                    echo "<th>$v</th>";
                    break;
            }
        }
    }
    
    foreach($ar as $k => $v){
        if($j%$kol==0){        // 4 kolumny w tabeli EDIT
            echo "<tr>";
        }
        switch($k){
            case 'id':
                break;
            case 'Zmiany_log':
                echo "<td id='".$k."_".$i."'><textarea rows='5' cols='50'>$v</textarea></td>";
                break;
            case 'id_Login':
                $UsrName = $User->getUsrById($v);
                echo "<td id='".$k."_".$i."'><input type='text' value='".$v.' ('.$UsrName.")'></input></td>";
                break;
            case 'id_Ord':
                $ordName = $Ord->getOrdNameById($v, $_SESSION['lang']);
                echo "<td id='".$k."_".$i."'><input type='text' value='".$v.' ('.$ordName.")'></input>";
                echo "<a target='_blank' href='Edit.php?sercz_id=$v'>=></a></td>";
                break;
            default:
                echo "<td id='".$k."_".$i."'><input type='text' value='$v'></input></td>";
                break;
        }
        if($j%$kol==($kol-1)){
            echo "</tr>";
        } $j++;
    } $i++;
}
echo "</form>";
echo "</table>";


