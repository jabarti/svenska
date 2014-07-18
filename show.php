<?php

/* * **************************************************
 * Project:     ZZZProba
 * Filename:    show.php
 * Encoding:    UTF-8
 * Created:     2014-06-26
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
require_once "common.inc.php";
include 'DB_Connection.php';
$title = 'Svenska | Show/printer';
include 'header.php';
//include 'flag.php';
include 'buttons.php';

if($_SESSION['log'] == true ){

$word = new Ord();
$mr = $word->getDBAll();
//$mr = $word->getAllArr();

$SQL = sprintf("SELECT * FROM `ord`;");
//echo $SQL;
$mq = mysql_query($SQL);
?>
<form action="" method="post">
    <input type="checkbox" name="flat" value="flat">flat?
    <input type="submit" name=sub_flat value="Flat?">

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
            <th>L.p.</th>
            <th>Słowo PL</th>
            <th>Część mowy</th>
            <th>rodzajnik</th>
            <th>słowo SE</th>
            <th>Formy</th>
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