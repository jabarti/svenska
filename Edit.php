<?php

/* * **************************************************
 * Project:     ZZZProba
 * Filename:    Edit.php
 * Encoding:    UTF-8
 * Created:     2014-06-26
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
ob_start(); // żeby sie dało reloadeować

require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Edit';
include 'header.php';
include 'buttons.php';

//if(!isset($_POST)){
$wher='';
$sort='';
$sercz='';
$sercz_id='';
//}

if($_SESSION['log'] == true && isset($_COOKIE['log'])){
    include 'Search.php';

if(isset($_POST)){
    if(isset($_POST['sort'])){
        switch($_POST['sort']){
            case 'id':
                $sort = "ORDER BY id";
                break;
            case 'cz_mov':
                $sort= "ORDER BY typ";
                break;
            case 'alf':
                $sort= "ORDER BY id_ord";
                break;
            case 'cat':
                $sort= "ORDER BY kategoria";
                break;
            default:
                ?><script>//alert("DEFAULT sort");</script><?php
                $sort= "";
                if(isset($_SESSION['sort'])){
                    ?><script>//alert("isse sess sort");</script><?php
                    $sort = $_SESSION['sort'];
                }
                break;
        }
    }
    
    if(isset($_POST['wher'])){
        if ($_POST['wher'] != 'część mowy')
            if ($_POST['wher'] != 'verb'){
                $wher = "WHERE typ='".$_POST['wher']."'";
            }else{
                $wher = "WHERE typ ='hjalp_verb' or typ='".$_POST['wher']."'";
            }
    }
}

if(isset($_GET['sercz_id'])){
    $id = $_GET['sercz_id'];
    $Word = new Ord();
//    $tabAttr = $Word->getTabOfAttr();
    
//    $Word->getTabOrdById($id);
    $sercz_id = " WHERE `id` = '".$id."'";
}

//$sercz='';
if (isset($_POST['sercz'])){
    
    $szukane = $_POST['sercz'];
    
    $Word = new Ord();
    $tabAttr = $Word->getTabOfAttr();
    
    ?><script>//alert("isset post sercz");</script><?php
    $sercz .= "WHERE ";
    $licz=0;
    foreach ($tabAttr as $value) {
        if ($licz == 0){
            $sercz .= $value." LIKE \"%".$szukane."%\"";
        } else {
            $sercz .= " OR ". $value." LIKE \"%".$szukane."%\"";
        }
        $licz++;
    }     
//    $sercz .=";";
//    echo "<br>SERCZ: ".$sercz;
}else
if (isset($_POST['sercz_dok'])){
       $szukane = $_POST['sercz_dok'];
    
    $Word = new Ord();
    $tabAttr = $Word->getTabOfAttr();
    
    ?><script>//alert("isset post sercz");</script><?php
    $sercz .= "WHERE ";
    $licz=0;
    foreach ($tabAttr as $value) {
        if ($licz == 0){
            $sercz .= $value." = \"".$szukane."\"";
        } else {
            $sercz .= " OR ". $value." = \"".$szukane."\"";
        }
        $licz++;
    }     
}else{
    $sercz = '';
}

$text = "SELECT * FROM `ord` ";
//$text = "SELECT id FROM `ord` ";
$text .=$wher." ";
$text .=$sercz." ";
$text .=$sort." ";
$text .=$sercz_id." ";
$text .=";";

//echo "<br>TEXT: ".$text;

$SQL1 = $text;
$SQL2 = $text;

//echo "<br>SQL1:".$SQL1;
//echo "<br>SQL2:".$SQL2;
$mq = mysql_query($SQL2);
$mq2 = mysql_query($SQL1);
$i=0;
$li=0;

//tworzenie tabelek
$method='post';
//$id = 0;
echo "<div id=div_edit class=edit_tab_contener>";
while($row = mysql_fetch_assoc($mq)){
    
    $curr_word_id = $row['id'];
    
    echo "<table class=edit_table id ='ord_".$curr_word_id."'>";
    echo "<form id='form_ord_".$curr_word_id."' method=".$method." action='EditMod.php' >";
    $j=0;
    foreach($row as $k=>$v){
            
        if($j%4==0){        // 4 kolumny w tabeli EDIT
            echo "<tr>";
        }
        
        if($k == 'typ'){
            echo "<td>".$k."</td><td>";
            echo "<select name='".$k."'>";
                    if($v != '')
                       echo" <option value=".$v.">".trans($v)." (".t("zapisane").")</option>"; 
          
                        $Word = new Ord();
                        $OrdCat = $Word->getTypesOfOrd();
//                            echo "<option>".t("część mowy")."</option>"
//                                    . "<option ></option>";
                        foreach($OrdCat as $k){
                            if(strlen(t($k)) > 14 || strlen(tl($k, "en")) > 14)
                                echo "<option value=$k>".substr(t($k),0,14)." ( ".substr(tl($k,"en"),0,14)." ) </option>";
                            else
                                echo "<option value=$k>".t($k)." ( ".tl($k,"en")." )</option>";
                        }   
                    
             echo "   </select>";
             echo "</td>";
        }  
        elseif($k == 'rodzaj'){
            echo "<td>".$k."</td><td>";
        
            echo "      <select id=rodzaj name='rodzaj'>";
                        if($v != '')
                            echo "<option value='".$v."'>".$v." (".t("zapisane").")</option>";
                        
                            $Word = new Ord();
                            $OrdCat = $Word->getRodzOfOrd();
                            foreach($OrdCat as $k){
                            echo "<option value=$k>".$k."</option>";
                        }
            echo "      </select>";
            echo "</td>";            
        }
        elseif($k == 'grupa'){
            echo "<td>".$k."</td><td>";
        
            echo "      <select id=grupa name='grupa'>";
                    if($v != '')
                        echo "<option value='".$v."'>".$v." (".t("zapisane").")</option>";
                    
                            $Word = new Ord();
                            $OrdCat = $Word->getGroupOfOrd();
                            foreach($OrdCat as $k){
                            echo "<option value=$k>".$k."</option>";
                        }
            echo "      </select>";
            echo "</td>";            
        }
        elseif($k == 'kategoria'){
            echo "<td>".$k."</td><td>";
        
            echo "      <select id=kategoria name='kategoria'>";
//            echo "      <select id=kategoria multiple='multiple' name='kategoria'>";
//            echo "      <select class='kat_edit_sel' multiple='multiple'  name='kategoria'>";
                if($v !='')
                    echo "<option value='".$v."'>".t($v)."</option>";
                else
                    echo "<option value='".$v."'>".$v."</option>";
                
                        $Word = new Ord();
                        $OrdCat = $Word->getCategoriesOfOrd();
                        foreach($OrdCat as $k){
                            echo "<option value=$k>".t($k)."</option>";
                        }
            echo "      </select>";
            echo "</td>";              
        }
        elseif($k == 'uwagi'){
            echo "<tr>"; // UWAGA: tu będzie zamknięty ostatni ROW i musi być wyjśćie z pętli!!!!
                echo "<td>".$k."</td>";
                echo "<td colspan=7>";
                    echo "<textarea d=uwagi_ta class=uwagi_ta name=".$k." >".$v."</textarea>";
                echo "</td>";
            echo "</tr>";
            break;
        }
        elseif($k == 'id'){
            echo "<td>".$k."</td><td><input id='id".$curr_word_id."' name=".$k." value='".$v."' readonly></td>";
        }
        else{
            if(strlen($v)<21){
                echo "<td>".$k."</td><td><input name=".$k." value='".$v."'></td>";
            } else {
                echo "<td>".$k."</td><td><textarea rows=1 cols=15 name=".$k." >".$v."</textarea></td>";
            }
        }
        
        if($j%4==3){
            echo "</tr>";
        }     
    $j++;    
    }
        echo "<tr> <td colspan=6></td>
                    <td colspan=2>
                        <button onclick='Menu();'>".t("Menu")."</button>
                        <input id=Edit_".$curr_word_id." type=submit name=edit value='".t('Edit')."'>";
//                        <input id=CBedit_".$curr_word_id." class=edit_checkbox type=checkbox name=CBedit_".$id." value='".t('wartość')."' disabled />
        echo "          <input id=CBedit_".$curr_word_id." class=edit_checkbox type=checkbox name=CBedit_".$curr_word_id." value='".$curr_word_id."' disabled />
                        <input id=Del_".$curr_word_id." type=submit name=delete value='".t("DELETE")."'>                        
                    </td>
              </tr>
              <tr><td colspan=8><textarea hidden rows=5 cols=80 id='ta_ser_".$curr_word_id."'></textarea></td></tr>
        </form>
        </table>";    
        
    $i++; //$id++;<tr><td colspan=8><textarea hidden rows=5 cols=80 id='ta_ser_".$curr_word_id."'></textarea></td></tr>
}
echo "</div>";      // end of div: edit_tab_contener

echo "<div class=floating_button_div>"
        . "<button id=floating_button value=TRY>Edytuj wszystkie</button>"
   . "</div>";

ob_end_flush();  // żeby sie dało reloadeować

} else {
    require 'loger.php';
}