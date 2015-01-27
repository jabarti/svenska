<?php

/* * **************************************************
 * Project:     ZZZProba
 * Filename:    show.php
 * Encoding:    UTF-8
 * Created:     2014-06-26
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Show/printer';
include 'header.php';
include 'buttons.php';

if($_SESSION['log'] == true && isset($_COOKIE['log'])){

$word = new Ord();
$czek ='';
$irreg = '';

if(isset($_POST['cz_mov'])){
//    echo "SET POST"; echo " / POST cz_mov = ".$_POST['cz_mov'];
//    echo "_POST['cz_mov']:".$_POST['cz_mov'];
    if($_POST['cz_mov']=='cz_mov'){
        $_SESSION['cz_mov'] = true;
    }
}else{
        $_SESSION['cz_mov'] = false;
}

if(isset($_POST['irreg'])){
//    echo "SET POST"; echo " / POST irreg = ".$_POST['irreg'];
//    echo "_POST['irreg']:".$_POST['irreg'];
    if($_POST['irreg']=='irreg'){
        $_SESSION['irreg'] = true;
    }
}else{
        $_SESSION['irreg'] = false;
}

if (isset($_SESSION['irreg']) && $_SESSION['irreg'] == true){
    ?><script>//alert("SESSION NOT SET!");</script><?php
//    if($_SESSION['irreg'] == true){
    $mr = $word->getDBAll();
//    $SQL = sprintf("SELECT * FROM `ord` WHERE (`grupa` = 'irregular' OR `grupa` = 'modal_verb') AND `typ` != 'noun';");
    $SQL = sprintf("SELECT * FROM `ord` WHERE (`grupa` = 'irregular' "
            . "OR `grupa`='verb:g4_starka' "
            . "OR `grupa`='verb:gr4_starka' "
            . "OR `grupa`='verb:gr4_oregel' "
            . "OR `typ` = 'modal_verb') AND `typ` != 'noun';");
    $irreg = 'checked';
//    }
}else{
    
if(isset($_SESSION['cz_mov'])){
    ?><script>//alert("SESSION SET!");</script><?php
    if($_SESSION['cz_mov'] == true){
        ?><script>//alert("SESSION SET == TRUE!");</script><?php
        $mr = $word->getDBAllOrdByTyp();
        $SQL = sprintf("SELECT * FROM `ord` ORDER BY `typ`, `id_ord`;");
        $czek = 'checked';
    }else{
        ?><script>//alert("SESSION SET == FALSE!");</script><?php
        $mr = $word->getDBAll();
        $SQL = sprintf("SELECT * FROM `ord` ;");
//        $czek ='';
    }
}else{
    ?><script>//alert("SESSION NOT SET!");</script><?php
    $mr = $word->getDBAll();
    $SQL = sprintf("SELECT * FROM `ord`;");
//    $czek ='';
}

} // end of if (SESSION[irreg] -> else

//$mr = $word->getDBAll();
//$mr = $word->getAllArr();

//$SQL = sprintf("SELECT * FROM `ord`;");
echo "<br>SQL: $SQL";
$mq = mysql_query($SQL);
?>
<form action="" method="post">
    <input type="checkbox" name="flat" value="flat"><?php echo t("płaskie"); ?>?
    <br><?php
    echo '<input type="checkbox" name="cz_mov" value="cz_mov" '.$czek.'>'.t("części mowy").'?';
    echo '<br><input type="checkbox" name="irreg" value="irreg" '.$irreg.'>'.t("tylko czasowniki nieregularne").'?';
    ?>
    <input type="submit" name=sub_flat value="<?php echo t("zobacz"); ?>">

</form>    
<?php
$flat = false;
$cz_mov = false;

if(isset($_POST['sub_flat'])){
//    echo "SET POST"; echo " / POST flat = ".$_POST['flat'];
    if($_POST['flat']=='flat'){
        $flat = true;
    }
}

echo "<table class=print>";
echo "  <tr>";
if(!$flat)
echo "      <th >".t("Link")."</th>";
echo "      <th >".t("L.p.")."</th>
            <th >".t("Słowo PL")."</th>
            <th >".t("Część mowy")."</th>
            <th >".t("Rodz.")."</th>
            <th >".t("Grupa")."</th>
            <th >".t("Słowo SE")."</th>
            <th >".t("Formy")."</th>
        </tr>" ; 
            
while ($row = mysql_fetch_array($mq, MYSQL_ASSOC)){
//     echo "<tr><td colspan=6>";var_dump($row);echo "</td></tr>";
       echo "<tr>";
       $attr = 0;
       foreach($row as $k => $v){
           if($attr < 6){
               if($attr == 0){
                   $id = $v;
                   if(!$flat)
                        echo "<td><a href='Edit.php?sercz_id=".$id."' target=\"_blank\">=></a></td>";
                   echo "<td id=norm>".$v."</td>";         // wypełnia kolumny L.p., słowoPL itd
               }else{
                echo "<td id=norm>".$v."</td>";         // wypełnia kolumny L.p., słowoPL itd
               }
           }else{
                if($attr==6 && $v!=''){
                    if(!$flat)
                        echo "<td id=szesc>".substr($k,0,6).": <span class=red>$v</span>,<br>";  // kolumna z info w trybie bez flat, pierwszy wiersz!!
                    else
                        echo "<td id=szesc>$v, ";   // kolumna z info Z FLATEM, 1-szy wyraz
                    }
                elseif($attr==6 && $v==''){
                    echo "<td id=szesc>";   // puste albo 1szy wyraz
                }
                elseif($attr==(count($row))){
                    echo "</td>";
                }
                elseif($v!='' && $k !='wymowa'){
                    if(!$flat){
                        if ( $k == "kategoria"){
//                            echo substr($k,0,6).": <span class=blue>$v</span>,<br>";
                            continue;
                        }else{
                            echo substr($k,0,6).": <span class=red>$v</span>,<br>";
                        }
                    }else{
//                        if($k == "uwagi" || $k == "kategoria" ){
                        if($k == "uwagi" ){
                            echo "<br><span class=blue><b>".t($k)."</b></span>: $v, ";
                        }elseif ( $k != "kategoria"){
                            echo "$v, ";
                        }else{
                            continue;
                        }
                    }
                }
                else {
                    continue;
                }
            }
            $attr++;  
       }
       echo "</tr>" ;
}
echo "</table>";

} else {
    require 'loger.php';
}