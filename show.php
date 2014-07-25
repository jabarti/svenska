<?php

/* * **************************************************
 * Project:     ZZZProba
 * Filename:    show.php
 * Encoding:    UTF-8
 * Created:     2014-06-26
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
//require_once "common.inc.php";
//include 'DB_Connection.php';
//$title = 'Svenska | Show/printer';
//include 'header.php';
////include 'flag.php';
//include 'buttons.php';

include 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Show/printer';
include 'header.php';
include 'buttons.php';

if($_SESSION['log'] == true && isset($_COOKIE['log'])){

$word = new Ord();
$mr = $word->getDBAll();
//$mr = $word->getAllArr();

$SQL = sprintf("SELECT * FROM `ord`;");
//echo $SQL;
$mq = mysql_query($SQL);
?>
<form action="" method="post">
    <input type="checkbox" name="flat" value="flat"><?php echo t("płaskie"); ?>?
    <input type="submit" name=sub_flat value="<?php echo t("zobacz"); ?>">

</form>    
<?php
$flat = false;

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
            <th>".t("rodzajnik")."</th>
            <th>".t("słowo SE")."</th>
            <th>".t("Formy")."</th>
        </tr>" ; 
            
while ($row = mysql_fetch_array($mq, MYSQL_ASSOC)){
//     echo "<tr><td colspan=6>";var_dump($row);echo "</td></tr>";
       echo "<tr>";
       $attr = 0;
       foreach($row as $k => $v){
           if($attr < 5){
                echo "<td id=norm>".$v."</td>";
           }else{
                if($attr==5 && $v!=''){
                    if(!$flat)
                        echo "<td id=piec>".substr($k,0,6).": <span class=red>$v</span>,<br>";
                    else
                        echo "<td id=piec>$v, ";
                }
                elseif($attr==5 && $v==''){
                    echo "<td id=piec>";
                }
                elseif($attr==(count($row))){
                    echo "</td>";
                }
                elseif($v!='' && $k !='wymowa'){
                    if(!$flat)
                        echo substr($k,0,6).": <span class=red>$v</span>,<br>";
                    else
                        echo "$v, ";
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