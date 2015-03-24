<?php

/****************************************************
 * Project:     Svenska
 * Filename:    testMOD.php
 * Encoding:    UTF-8
 * Created:     2015-03-17
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
//$title = 'Svenska | TestMOD';
//include 'header.php';
//include 'buttons.php';

//echo"POST: ";var_dump($_POST);
//echo"<br>SESSION: ";var_dump($_POST);

$case = 0;

if(isset($_POST['typ_cz_mov'])){
    if($_POST['typ_cz_mov'] == 'clear'){
//        $_SESSION['typ_cz_mov'] = false;
        $case = 1;
    }else if($_POST['typ_cz_mov'] == ''){
        $case = 2;
    }else{
//        $_SESSION['typ_cz_mov'] = $_POST['typ_cz_mov'];
        $case = 3;
    }
}

if(isset($_POST['group_ord'])){
    if($_POST['group_ord'] == 'clear'){
    // Czyszczenie grupy 
        $case = 4;
    }else{
    // Jeśli ustalamy grupę to z automatu ustalamy typ na czasownik => potem można zmienić żeby był też rzeczownik
        $case = 5;
    }
}

//        echo "<br>POST['typ_cz_mov']:".$_POST['typ_cz_mov'];
//        echo "<br>SESSION['typ_cz_mov']:".$_SESSION['typ_cz_mov'];
//        echo "<br>POST['group_ord']:".$_POST['group_ord'];
//        echo "<br>SESSION['group_ord']:".$_SESSION['group_ord'];
//        echo "<br>typ_current:".$typ_current;

if($Word = new Ord()){
    echo "<br>OK: Object of Ord class is created!";
}else{
    echo "<br>NOT OK: Object of Ord class not created!";
}

//if(isset($_POST['group_ord']) && $_POST['group_ord'] == false && $group_ord == false){
////    echo "<br>NORMAL!";
//    $arr = $Word->getQuestionIDsArrByType($typ_current);
//}else{
//    $arr = $Word->getQuestionIDsArrByGroup($group_ord);
////    echo "<br>STARKA VERB!";
//}

switch($case){
    case '0':
        echo "<br>".__LINE__."/ CASE: $case ()";
        break;
    case '1':
//        echo "<br>".__LINE__."/ CASE: $case (OPRÓŻNIANIE)";
        unset($_SESSION['typ_cz_mov']);
        unset($_SESSION['group_ord']);
//        header("Location: test.php");
        echo "<script> window.location.replace('test.php') </script>" ;
        break;
    case '2':
        echo "<br>".__LINE__."/ CASE: $case (PUSTE)";
        break;
    case '3':
//        echo "<br>".__LINE__."/ CASE: $case (TYP)";
        $_SESSION['typ_cz_mov'] = $_POST['typ_cz_mov'];
//        unset($_SESSION['typ_cz_mov']);
        unset($_SESSION['group_ord']);
//        header("Location: test.php");
        echo "<script> window.location.replace('test.php') </script>" ;
        break;
    case '4':
//        echo "<br>".__LINE__."/ CASE: $case (GRUPA = clear)";
        unset($_SESSION['typ_cz_mov']);
        unset($_SESSION['group_ord']);
//        header("Location: test.php");
        echo "<script> window.location.replace('test.php') </script>" ;
        break;
    case '5':
        echo "<br>".__LINE__."/ CASE: $case (GRUPA i typ=verb)";
        $_SESSION['typ_cz_mov'] = 'verb';
        $_SESSION['group_ord'] = $_POST['group_ord'];
        echo "<br>".__LINE__."Set group_ord: $group_ord AND typ_current: $typ_current";
        echo "<script> window.location.replace('test.php') </script>" ;
        break;
    default:
        echo "<br>".__LINE__."/ CASE: $case (????)";
        break;
}


$max = count($arr)-1;
//$max = $Word->getLastId(false);
$rand_index = mt_rand(0, $max); // wybór słowa
$rand = $arr[$rand_index];

$max = $Word->getLastId(false);

$rand =  mt_rand(1, $max); // wybór słowa
echo "<br>".__LINE__." / Słowo(Rand):".$rand;
//
//$rand = 694;  // For test - fixed ID of word; 

$testTab = $Word->getQuestAndAnswerById($rand);
//$wordPL = $Word->getOrdPLById($rand);
$wordPL = $Word->getOrdNameById($rand, 'pl');
echo "<br>WordPL: ".$wordPL;

?>
<!--<button onclick="window.location.href='try2.php'">WRÓĆ</button>-->