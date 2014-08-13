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
include 'buttons.php';

$id_ord = '';
if(isset($_POST['submit'])){
    if($_POST['id_ord'] !=''){
        
        $id_ord =               trim(trim(trim($_POST['id_ord']),","));
        $typ =                  trim(trim(trim($_POST['typ']),","));
        $rodzaj =               trim(trim(trim($_POST['rodzaj']),","));
        $grupa =                trim(trim(trim($_POST['grupa']),","));
        $trans =                trim(trim(trim($_POST['trans']),","));
        $infinitive =           trim(trim(trim($_POST['infinitive']),","));
        $presens =              trim(trim(trim($_POST['presens']),","));
        $past =                 trim(trim(trim($_POST['past']),","));
        $supine =               trim(trim(trim($_POST['supine']),","));
        $imperative =           trim(trim(trim($_POST['imperative']),","));
        $present_participle =   trim(trim(trim($_POST['present_participle']),","));
        $past_participle =      trim(trim(trim($_POST['past_participle']),","));

        $pas_infinitive =       trim(trim(trim($_POST['pas_infinitive']),","));
        $pas_presens =          trim(trim(trim($_POST['pas_presens']),","));
        $pas_preterite =        trim(trim(trim($_POST['pas_preterite']),","));
        $pas_supine =           trim(trim(trim($_POST['pas_supine']),","));
        $pas_imperative =       trim(trim(trim($_POST['pas_imperative']),","));
        
        $S_indefinite =         trim(trim(trim($_POST['S_indefinite']),","));
        $S_definite =           trim(trim(trim($_POST['S_definite']),","));
        $P_indefinite =         trim(trim(trim($_POST['P_indefinite']),","));
        $P_definite =           trim(trim(trim($_POST['P_definite']),","));
        $neuter =               trim(trim(trim($_POST['neuter']),","));
        $masculin =             trim(trim(trim($_POST['masculin']),","));
        $plural =               trim(trim(trim($_POST['plural']),","));
        $st_rowny =             trim(trim(trim($_POST['st_rowny']),","));
        $st_wyzszy =            trim(trim(trim($_POST['st_wyzszy']),","));
        $st_najwyzszy =         trim(trim(trim($_POST['st_najwyzszy']),","));
        $wymowa =               trim(trim(trim($_POST['wymowa']),","));
        $glowny =               trim(trim(trim($_POST['glowny']),","));
        $porzadkowy =           trim(trim(trim($_POST['porzadkowy']),","));
        $ulamek =               trim(trim(trim($_POST['ulamek']),","));
        
        $kategoria =            trim(trim(trim($_POST['kategoria']),","));
        $uwagi =                trim(trim(trim($_POST['uwagi']),","));

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
    } 
    
    header("Location: index.php?result=OK");

}else{
    header("Location: index.php?result=Error");
}
