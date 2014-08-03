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

if(isset($_POST['cz_mov'])){
//    echo "SET POST"; echo " / POST flat = ".$_POST['flat'];
//    echo "_POST['cz_mov']:".$_POST['cz_mov'];
    if($_POST['cz_mov']=='cz_mov'){
        $_SESSION['cz_mov'] = true;
    }
}else{
        $_SESSION['cz_mov'] = false;
}

if(isset($_SESSION['cz_mov'])){
    ?><script>//alert("SESSION SET!");</script><?php
    if($_SESSION['cz_mov'] == true){
        ?><script>//alert("SESSION SET == TRUE!");</script><?php
        $mr = $word->getDBAllOrdByTyp();
        $SQL = sprintf("SELECT * FROM `ord` ORDER BY `typ`, `id_ord;");
        $czek = 'checked';
    }else{
        ?><script>//alert("SESSION SET == FALSE!");</script><?php
        $mr = $word->getDBAll();
        $SQL = sprintf("SELECT * FROM `ord` ;");
        $czek ='';
    }
}else{
    ?><script>//alert("SESSION NOT SET!");</script><?php
    $mr = $word->getDBAll();
    $SQL = sprintf("SELECT * FROM `ord`;");
    $czek ='';
}
//$mr = $word->getDBAll();
//$mr = $word->getAllArr();

//$SQL = sprintf("SELECT * FROM `ord`;");
//echo $SQL;
$mq = mysql_query($SQL);
?>
<form action="" method="post">
    <input type="checkbox" name="flat" value="flat"><?php echo t("płaskie"); ?>?
    <br><?php
    echo '<input type="checkbox" name="cz_mov" value="cz_mov" '.$czek.'>'.t("części mowy").'?';
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
echo "  <tr>
            <th>".t("L.p.")."</th>
            <th>".t("Słowo PL")."</th>
            <th>".t("Część mowy")."</th>
            <th>".t("Rodzajnik")."</th>
            <th>".t("Słowo SE")."</th>
            <th>".t("Formy")."</th>
        </tr>" ; 
            
while ($row = mysql_fetch_array($mq, MYSQL_ASSOC)){
//     echo "<tr><td colspan=6>";var_dump($row);echo "</td></tr>";
       echo "<tr>";
       $attr = 0;
       foreach($row as $k => $v){
           if($attr < 5){
                echo "<td id=norm>".$v."</td>";         // wypełnia kolumny L.p., słowoPL itd
           }else{
                if($attr==5 && $v!=''){
                    if(!$flat)
                        echo "<td id=piec>".substr($k,0,6).": <span class=red>$v</span>,<br>";  // kolumna z info w trybie bez flat, pierwszy wiersz!!
                    else
                        echo "<td id=piec>$v, ";   // kolumna z info Z FLATEM, 1-szy wyraz
                    }
                elseif($attr==5 && $v==''){
                    echo "<td id=piec>";   // puste albo 1szy wyraz
                }
                elseif($attr==(count($row))){
                    echo "</td>";
                }
                elseif($v!='' && $k !='wymowa'){
                    if(!$flat){
                        echo substr($k,0,6).": <span class=red>$v</span>,<br>";
                    }else{
                        if($k == "uwagi" || $k == "kategoria" ){
                            echo "<br><span class=blue><b>".t($k)."</b></span>: $v, ";
                        }else{
                            echo "$v, ";
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