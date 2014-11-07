<?php
/* * **************************************************
 * Project:     ZZZProba
 * Filename:    SynonymerMOD.php
 * Encoding:    UTF-8
 * Created:     2014-10-24
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | SynonymerMOD';
include 'header.php';
include 'buttons.php';

foreach($_POST as $k => $v){
    echo "POST['$k']=".$v.", ";
}
echo "<br>";
//foreach($_SESSION as $k => $v){
//    echo "SESSION['$k']=".$v.", ";
//}

if(isset($_POST['submit'])){
    echo "Jest POST{submit}";
    
    if($_POST['sercz_synonym_nr']!=''){
        header("Location: synonymer.php?sercz_synonym_nr=".$_POST['sercz_synonym_nr']);
    }else
    if($_POST['sercz_synonym_ord']!=''){
        header("Location: synonymer.php?sercz_synonym_ord=".$_POST['sercz_synonym_ord']);
    }else{
        header("Location: synonymer.php");
    }

}else{
    echo " NIe ma POST{submit}";
//         header("Location: help_test_admin.php");
}

