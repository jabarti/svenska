<?php
/* * **************************************************
 * Project:     ZZZProba
 * Filename:    index.php
 * Encoding:    UTF-8
 * Created:     
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Inserter';
include 'header.php';
//include 'buttons.php';

//foreach($_POST as $k => $v){
//    echo "POST['$k']=".$v.", ";
//}
//echo "<br>";
//foreach($_SESSION as $k => $v){
//    echo "SESSION['$k']=".$v.", ";
//}


$id_ord = '';
if(isset($_POST['submit'])){
    if($_POST['id_ord'] !=''){
        
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
//        echo "<br>id of a: ".$Word->getId($id_ord);
        echo "<br>Last index: ".$Word->getLastId(false);
       
        
        $Word->setData( $id_ord, $typ, $rodzaj, $grupa, $trans, $infinitive, $presens,$past, 
                        $supine, $imperative, $present_participle, $past_participle, 
                        $pas_infinitive, $pas_presens, $pas_preterite, $pas_supine, $pas_imperative,
                        $S_indefinite, $S_definite, $P_indefinite, $P_definite, 
                        $neuter, $masculin, $plural, $st_rowny, $st_wyzszy, $st_najwyzszy, 
                        $glowny, $porzadkowy, $ulamek,
                        $wymowa, $kategoria, $uwagi);
        if ($_SESSION['test_001']=="true"){
            $_SESSION['test_001']=="false";
            $newID = $Word->getId($id_ord);
            header("Location: index.php?result=OK&transz=".$trans."&newId=$newID");
        }else{
            header("Location: index.php?result=pusty");
        }
//        header("Location: index.php?result=OK");
    } else {
        header("Location: index.php?result=pusty");
    }
}else if(isset($_POST['submitHTA'])){       // tutaj robimy inserta dla ew. pustych pól z bazy z help_test_admin.php!
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
                break;
            default:
                $attr .= "`$k`,";
                $values.= "'".triTrim($v)."',";
                break;                
        }
        
    }
    $SQL .= $attr.$values;
//    echo "<br>linia(".__LINE__.") SQL:".$SQL;
    
    mysql_query($SQL);
    
    if(mysql_affected_rows()){
//         echo "<br>linia(".__LINE__.") JEST OK";
         header("Location: help_test_admin.php");
//         header("Location: index.php");
    }else{
         header("Location: help_test_admin.php");
    }
}else{
    header("Location: index.php?result=Error");
}
