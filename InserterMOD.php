<?php
/* * **************************************************
 * Project:     ZZZProba
 * Filename:    InserterMOD.php
 * Encoding:    UTF-8
 * Created:     
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | '.t('InserterMOD');
include 'header.php';
//include 'buttons.php';

//foreach($_POST as $k => $v){
//    echo "POST['$k']=".$v.", ";
//}
//echo "<br>";
//foreach($_SESSION as $k => $v){
//    echo "SESSION['$k']=".$v.", ";
//}


$ID_US=0;
IF(ISSET($_SESSION['user_id'])){
    $ID_US = $_SESSION['user_id'];
}ELSE{
    $ID_US =0;
}

$id_ord = '';
if(isset($_POST['submit'])){
    ?><script>//alert("isset POST submit");</script><?php //
    if($_POST['id_ord'] !=''){
        ?><script>//alert("isset POST id_ord");</script><?php
//        $text='';
//        foreach($_POST as $k=>$v){
////            if($v!='' || $v!='submit'){
//            if($v!='' AND $k!='submit'){
//                $text .= "\'$k\'=>\'$v\'; ";
//            }
//        }
        
        $id_ord =               triTrim($_POST['id_ord']);
        $typ =                  triTrim($_POST['typ']);
        $rodzaj =               triTrim($_POST['rodzaj']);
        $grupa =                triTrim($_POST['grupa']);
        $trans =                triTrim($_POST['trans']);
        $infinitive =           triTrim($_POST['infinitive']);
        $presens =              triTrim($_POST['presens']);
        $past =                 triTrim($_POST['past']);
        $supine =               triTrim($_POST['supine']);
        $imperative =           triTrim($_POST['imperative']);
        $present_participle =   triTrim($_POST['present_participle']);
        $past_participle =      triTrim($_POST['past_participle']);

        $pas_infinitive =       triTrim($_POST['pas_infinitive']);
        $pas_presens =          triTrim($_POST['pas_presens']);
        $pas_preterite =        triTrim($_POST['pas_preterite']);
        $pas_supine =           triTrim($_POST['pas_supine']);
        $pas_imperative =       triTrim($_POST['pas_imperative']);
        
        $S_indefinite =         triTrim($_POST['S_indefinite']);
        $S_definite =           triTrim($_POST['S_definite']);
        $P_indefinite =         triTrim($_POST['P_indefinite']);
        $P_definite =           triTrim($_POST['P_definite']);
        $neuter =               triTrim($_POST['neuter']);
        $masculin =             triTrim($_POST['masculin']);
        $plural =               triTrim($_POST['plural']);
        $st_rowny =             triTrim($_POST['st_rowny']);
        $st_wyzszy =            triTrim($_POST['st_wyzszy']);
        $st_najwyzszy =         triTrim($_POST['st_najwyzszy']);
        $wymowa =               triTrim($_POST['wymowa']);
        $glowny =               triTrim($_POST['glowny']);
        $porzadkowy =           triTrim($_POST['porzadkowy']);
        $ulamek =               triTrim($_POST['ulamek']);
        
        $kategoria =            triTrim($_POST['kategoria']);
        $uwagi =                triTrim($_POST['uwagi']);

        ?><script>//one();</script><?php
//        echo "<br>OTO text: ".$id_ord;
        
        $Word = new Ord();
        $Log = new Log_Ord();
//        echo "<br>id of a: ".$Word->getId($id_ord);
//        echo "<br>PRZED setData Last index: ".$Word->getLastId(false);
       
        
        $Word->setData( $id_ord, $typ, $rodzaj, $grupa, $trans, $infinitive, $presens,$past, 
                        $supine, $imperative, $present_participle, $past_participle, 
                        $pas_infinitive, $pas_presens, $pas_preterite, $pas_supine, $pas_imperative,
                        $S_indefinite, $S_definite, $P_indefinite, $P_definite, 
                        $neuter, $masculin, $plural, $st_rowny, $st_wyzszy, $st_najwyzszy, 
                        $glowny, $porzadkowy, $ulamek,
                        $wymowa, $kategoria, $uwagi);
        
        $idOrd = $Word->getId($id_ord);

        if ($_SESSION['test_001']=="true"){
            ?><script>//alert("SESSION test_001 == true");</script><?php
            $_SESSION['test_001']=="false";
            $newID = $Word->getId($id_ord);
            $Log->setData($idOrd, $ID_US, $_POST);
//            echo "<br>LINE:".__LINE__;
            header("Location: index.php?result=OK&transz=".$trans."&newId=$newID");
            echo "<script> window.location.replace('index.php?result=OK&transz=".$trans."&newId=".$newID."') </script>" ;
            exit("heder/window.location nie poszedł: ".__LINE__." / file: ".__FILE__);
        }else{
            ?><script>//alert("SESSION test_001 == false");</script><?php
            header("Location: index.php?result=pusty");
            echo "<script> window.location.replace('../../index.php?result=pusty') </script>" ;
            exit("heder/window.location nie poszedł: ".__LINE__." / file: ".__FILE__);
        }
//        header("Location: index.php?result=OK");
    } else {
        ?><script>alert("isset POST id_ord ELSE");</script><?php
        header("Location: index.php?result=pusty");
        echo "<script> window.location.replace('index.php?result=pusty') </script>" ;
        exit("heder/window.location nie poszedł: ".__LINE__." / file: ".__FILE__);
    }
    
}else 
    if(isset($_POST['submitHTA'])){       // tutaj robimy inserta dla ew. pustych pól z bazy z help_test_admin.php!
    ?><script>//alert("isset POST submitHTA");</script><?php
    $Zmiany_arr = "";
    $SQL = "INSERT INTO `ord` ";
    $attr = "(";
    $values = " VALUES (";
    foreach($_POST as $k => $v){
//        echo "<br>K: $k => V: $v";
        switch($k){
            case 'submitHTA':
                break;
            case 'kategoria':
//                $SQL .= "'".$v."');";
                $attr .= "`$k`)";
                $values .= "'".triTrim($v)."');";
                if($v!=''){
                    $Zmiany_arr .= "\'$k\'=>\'".triTrim($v)."\'; ";
                }
                break;
            case 'id':
                $attr .= "`$k`,";
                $values.= "'".triTrim($v)."',";
                $idOrd = $v;
                break;                
            default:
                $attr .= "`$k`,";
                $values.= "'".triTrim($v)."',";
                if($v!=''){
                    $Zmiany_arr .= "\'$k\'=>\'".triTrim($v)."\'; ";
                }
                break;                
        }
        
    }
    $SQL .= $attr.$values;
//    echo "<br>linia(".__LINE__.") SQL:".$SQL."<br>";
    
    $Log = new Log_Ord();
    
    mysql_query($SQL);
    
//    echo "<br><b>Zmiany_arr</b>: ";var_dump($Zmiany_arr);
//    echo "<br>POST: ";var_dump($_POST);
    
    if(mysql_affected_rows()){
//         echo "<br>linia(".__LINE__.") JEST OK";
         $Log->setData($idOrd, $ID_US, $Zmiany_arr);
         header("Location: help_test_admin.php");
         echo "<script> window.location.replace('help_test_admin.php') </script>" ;
//         header("Location: index.php");
         exit("<br>heder nie poszedł: ".__LINE__." / file: ".__FILE__);
    }else{
         header("Location: help_test_admin.php");
//         echo "<script> window.location.replace('help_test_admin.php') </script>" ;
         exit("<br>heder nie poszedł: ".__LINE__." / file: ".__FILE__);
    }
}else{
    ?><script>alert("isset POST submit ELSE");</script><?php
    header("Location: index.php?result=Error");
//    echo "<script> window.location.replace('index.php?result=Error') </script>" ;
    exit("<br>heder nie poszedł: ".__LINE__." / file: ".__FILE__);
}
