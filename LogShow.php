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

echo "<table>";
echo "<form action='LogShow.php' method='post'>";
echo "<tr><td>".t("Po id słowa").":</td><td><input type='text' name='id_ord'></td></tr>";
//echo "Po id usera: <input type='text' name='id_user'><br>";
echo "<tr><td>".t("Po Userze").":</td><td><select name='id_user' >";
echo "<option value=''>empty</option>";
      $names = $User->getUsersNames();
      foreach ($names as $k=>$v){
        echo "<option value=".$v.">".$v."</option>";
      }
echo"    </select></td></tr>";
echo "<tr style='text-align: right;'><td></td><td ><input type='submit' name='subm_01' value='".t("submit")."'></td></tr>";
echo "</form>";
echo "</table>";

if(isset($_POST['id_ord']) AND $_POST['id_ord'] !='' ){
    ?><script>//alert (1)</script><?php
    $id_ord = $_POST['id_ord'];
    $id_user = false;
    $arr = $LogOrd->getLogByOrdId($id_ord);   
}else 
if(isset($_POST['id_user']) AND $_POST['id_user'] !=''){
    ?><script>//alert (2)</script><?php
//    $id_ord = false;
//    $id_ord=2653;
    $id_user = $_POST['id_user'];
    $id_user = $User->getId($id_user);
    $arr = $LogOrd->getLogByUsrId($id_user);
//    $UsrName = $User->getUsrById($id_user);
}else
if(isset($_GET['id_Ord_DIR']) AND $_GET['id_Ord_DIR'] !=''){
    ?><script>//alert (3)</script><?php
    $id_ord = false;
    $id_user = false;
    $arr = $LogOrd->getAllLog($_GET['id_Ord_DIR']);
    
}else
if(isset($_GET['data_create_DIR']) AND $_GET['data_create_DIR'] !=''){
    ?><script>//alert (3)</script><?php
    $id_ord = false;
    $id_user = false;
    $arr = $LogOrd->getAllLogByDateCreate($_GET['data_create_DIR']);
    
}else
if(isset($_GET['data_edit_DIR']) AND $_GET['data_edit_DIR'] !=''){
    ?><script>//alert (3)</script><?php
    $id_ord = false;
    $id_user = false;
    $arr = $LogOrd->getAllLogByDateEdit($_GET['data_edit_DIR']);
    
}else{
    ?><script>//alert (4)</script><?php
    $id_ord=false;
    $id_user=false;
    $arr = $LogOrd->getAllLog();
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
                case 'id_Ord':
                case 'data_create':
                case 'data_edit':
                    echo "<th>".t($v);
//                    echo "<button name='".$v."_DIR' value='up' >&#8593;</button>";
                    echo "<button name='".$v."_DIR' value='up' >&#8657;</button>";
//                    echo "<button type='button' id='".$v."_up'>&#8593;</button>";
//                    echo "<button name='".$v."_DIR' value='down' >&#8595;</button></th>";
                    echo "<button name='".$v."_DIR' value='down' >&#8659;</button></th>";
//                    echo "<button type='button' id='".$v."_down'>&#8595;</button></th>";
                    break;
                default:
                    echo "<th>".t($v)."</th>";
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


