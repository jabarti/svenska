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

//foreach($_POST as $k => $v){
//    echo "POST[$k]=".$v.", ";
//}
//echo "<br>";
//foreach($_SESSION as $k => $v){
//    echo "SESSION[$k]=".$v.", ";
//}

if(isset($_GET['urls'])){
        $_SESSION['urls'] = $_GET['urls'];
        unset($_SESSION['sercz_dok']);
        unset($_SESSION['sercz']);
}

if(isset($_GET['sercz_id'])){
        $_SESSION['urls'] = $_GET['urls'];
        unset($_SESSION['sercz_dok']);
        unset($_SESSION['sercz']);
        unset($_SESSION['urls']);
}

if (isset($_POST['sercz'])){
        $_SESSION['sercz']=$_POST['sercz'];
        unset($_SESSION['sercz_dok']);
        unset($_SESSION['urls']);
}
if(isset($_POST['sercz_dok'])){
        $_SESSION['sercz_dok'] = $_POST['sercz_dok'];
        unset($_SESSION['sercz']);
        unset($_SESSION['urls']);
}


//if(!isset($_POST)){
$wher='';
$sort='';
$sercz='';
$sercz_id='';
//}

if($_SESSION['log'] == true && isset($_COOKIE['log'])){
//if($_SESSION['log'] == true){
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
//            case 'cat':
//                $sort= "ORDER BY kategoria";
//                break;
            default:
                ?><script>//alert("DEFAULT sort");</script><?php
                $sort= "";
//                if(isset($_SESSION['sort'])){
//                    ?><script>//alert("isse sess sort");</script><?php
//                    $sort = $_SESSION['sort'];
//                }
                break;
        }
//        $_SESSION['sort'] = $sort;
//        $_SESSION['sort_id'] = $_POST['sort'];
    }
    
    if(isset($_POST['wher'])){      // szuka po części mowy (typ)
        if ($_POST['wher'] != 'część mowy')
            if ($_POST['wher'] != 'verb'){
                if(isset($_POST['wher']) || isset($_SESSION['wher'])){
                    $wher = " AND `typ`='".$_POST['wher']."'";
                }else{
                    $wher = " WHERE `typ`='".$_POST['wher']."'";
                }               
            }else{
                if(isset($_POST['wher']) || isset($_SESSION['wher'])){
//                    $wher = " (2aa wher) AND `typ`='".$_POST['wher']."'";
                    $wher = " AND typ ='hjalp_verb' OR typ='".$_POST['wher']."'";
                }else{
                    $wher = " WHERE typ ='hjalp_verb' OR typ='".$_POST['wher']."'";
                }
            }
//        $_SESSION['wher'] = $wher;    
//        $_SESSION['wher_id'] = $_POST['wher'];    
    }
}

if(isset($_GET['sercz_id'])){
    $id = $_GET['sercz_id'];
    $Word = new Ord();
//    $tabAttr = $Word->getTabOfAttr();
    
//    $Word->getTabOrdById($id);
    $sercz_id = " WHERE `id` = '".$id."'";
}

if(isset($_GET['urls']) || isset ($_SESSION['urls']) && !isset($_GET['sercz_id'])){
//    $urls = explode(",",$_GET['urls']);
    
    $urls_temp = $_GET['urls']?$_GET['urls']:$_SESSION['urls'];
    
    $urls = " WHERE `id` IN (".$urls_temp.")";
//    $sercz_id = " WHERE `id` = '".$id."'";
}

//$sercz='';
if (    isset($_POST['sercz'])      ||  isset($_SESSION['sercz']) 
    && !isset($_POST['sercz_dok'])
    && !isset($_GET['urls'])        && !isset ($_SESSION['urls'])    
    && !isset($_GET['sercz_id'])    ){
//if (isset($_POST['sercz'])){

//    $szukane = $_POST['sercz'];
    
        $szukane = $_SESSION['sercz']?$_SESSION['sercz']:$_POST['sercz'];
    
    $Word = new Ord();
    $tabAttr = $Word->getTabOfAttr();
    
    ?><script>//alert("isset post sercz");</script><?php
    $sercz .= " WHERE ";
    $licz=0;
    foreach ($tabAttr as $value) {
        if ($licz == 0){
            $sercz .= "`".$value."` LIKE \"%".$szukane."%\"";
        } 
//        elseif ($licz) {
//            TODO!! jesli to kategoria żeby jakoś dzialiło wynik i go tłumaczyło (różn języki) -=> t($text)
//            $licz żeby zawsze == kategoria - pobrać listę!!!
//        }
        else {
            $sercz .= " OR `".$value."` LIKE \"%".$szukane."%\"";
        }
        $licz++;
    }     
//    $sercz .=";";
//    echo "<br>SERCZ: ".$sercz;
}else
if (        isset($_POST['sercz_dok'])  ||  isset($_SESSION['sercz_dok']) 
        && !isset($_POST['sercz'])      && !isset($_GET['sercz_id'])){
    
       $szukane = $_POST['sercz_dok']?$_POST['sercz_dok']:$_SESSION['sercz_dok'];
    
    $Word = new Ord();
    $tabAttr = $Word->getTabOfAttr();
    
    ?><script>//alert("isset post sercz");</script><?php
    $sercz .= "WHERE ";
    $licz=0;
    foreach ($tabAttr as $value) {
        if ($licz == 0){
            $sercz .= "`".$value."` = \"".$szukane."\"";
        } else {
            $sercz .= " OR `".$value."` = \"".$szukane."\"";
        }
        $licz++;
    }     
}else{
    $sercz = '';
}  

//$sort = $_SESSION['sort'] ? $_SESSION['sort'] : $sort;
//
//if($sort != ''){
//    $wher ='';
//}else{
//    $wher = $_SESSION['wher'] ? $_SESSION['wher'] : $wher;
//}

$text = "SELECT * FROM `ord` ";


$text .=$sercz." ";             // WHERE ... or ... //  niedokładnie
$text .=$sercz_id." ";          // WHERE            // dokładnie
$text .=$urls." ";              // WHERE
$text .=$wher." ";              // WHERE
$text .=$sort." ";              // ORDER BY id
//$text .=$urls." ";              // WHERE

$text1 = "SELECT count(*) as all_ord FROM `ord` ";


$text1 .=$sercz." ";
$text1 .=$sercz_id." ";
$text1 .=$urls." ";
$text1 .=$wher." ";
$text1 .=$sort." ";

//$text .=" ORDER BY id ASC LIMIT $limit, $onpage";

//echo "<br>".__LINE__."SQL1:".$text;
//echo "<br>".__LINE__."SQL2:".$text1;

$SQL_pag = $text1;
$mq1 = mysql_query($SQL_pag) or die (mysql_error());
$row1 = mysql_fetch_array($mq1);
//var_dump($row);
extract($row1);
//echo "<br>All Ord: ".$all_ord;

if (isset($_POST['ile_onpage']) || isset($_SESSION['ile_onpage'])){
    $onpage = $_POST['ile_onpage'] ? $_POST['ile_onpage'] : $_SESSION['ile_onpage']; //ilość newsów na stronę
    if (isset($_POST['ile_onpage']))
        $_SESSION['ile_onpage'] = $_POST['ile_onpage'];
}else{
    $onpage = 25; //ilość newsów na stronę
}

$navnum = 3; //ilość wyświetlanych numerów stron, ze względów estetycznych niech będzie to liczba nieparzysta
$allpages = ceil($all_ord/$onpage); //wszysttkie strony to zaokrąglony w górę iloraz wszystkich postów i ilości postów na stronę
        
//sprawdzamy poprawnośc przekazanej zmiennej $_GET['page'] zwróć uwage na $_GET['page'] > $allpages
if(!isset($_GET['page']) or $_GET['page'] > $allpages or !is_numeric($_GET['page']) or $_GET['page'] <= 0){
     $page = 1;
}else{
     $page = $_GET['page'];
}
$limit = ($page - 1) * $onpage; //określamy od jakiego newsa będziemy pobierać informacje z bazy danych


$text .="  LIMIT $limit, $onpage";
$text .=";";

//echo "<br>".__LINE__."TEXT: ".$text;
//$_SESSION['sql'] = $text;

$SQL1 = $text;
//$SQL2 = $text;

//echo "<br>".__LINE__."SQL1:".$SQL1;
//echo "<br>".__LINE__."SQL2:".$SQL2;
$mq = mysql_query($SQL1);
//$mq2 = mysql_query($SQL1);
$i=0;
$li=0;

echo "<form action='' method=post>"
. t('Ile na stronie').": <select name=ile_onpage>"
. "<option value=".$_SESSION['ile_onpage'].">".$_SESSION['ile_onpage']."</option>"
. "<option value=5>5</option>"
. "<option value=10>10</option>"
. "<option value=15>15</option>"
. "<option value=20>20</option>"
. "<option value=25>25</option>"
. "<option value=100>100</option>"
. "</select>"
. "<input type=submit value=".t('zmień').">"
. "</form>";

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
//                       echo" <option value=".$v.">".trans($v)." TU(".t("zapisane").")</option>"; 
                       echo" <option value=".$v.">".t($v)." ( ".t("zapisane")." )</option>"; 
          
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
            echo "<td>".t($k)."</td><td>";
        
            echo "      <select id=grupa name='grupa'>";
                    if($v != '')
                        echo "<option value='".$v."'>".t($v)." (".t("zapisane").")</option>";
                    
                            $Word = new Ord();
                            $OrdCat = $Word->getGroupOfOrd();
                            foreach($OrdCat as $k){
                            echo "<option value=$k>".t($k)."</option>";
                        }
            echo "      </select>";
            echo "</td>";            
        }
        elseif($k == 'kategoria'){
            echo "<td>".$k."</td><td colspan=4>";
        
//            echo "      <select id=kategoria name='kategoria'>";
            echo "      <select id=kategoria".$curr_word_id."  class=kateg>";
//            echo "      <select id=kategoria".$curr_word_id." multiple='multiple' class=kateg>";
//            echo "      <select id=kategoria".$curr_word_id." class='kat_edit_sel' multiple='multiple'  name='kategoria'>";
                if($v !=''){
                    echo "<option value='".$v."'>".t($v)."</option>";
                }else{
                    echo "<option value='".$v."'>".$v."</option>";
                }
                        $Word = new Ord();
                        $OrdCat = $Word->getCategoriesOfOrd();
                        foreach($OrdCat as $k){
                            echo "<option value=$k>".t($k)."</option>";
                        }
            echo "      </select>";
            echo "      <input type='hidden' id='kategoria_edit_val_".$curr_word_id."' name='kategoria'></input>";
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
                    <td colspan=2>";
//        echo "          <button onclick='Menu();'>".t("Menu")."</button>
        echo "          <input id=Copy_".$curr_word_id." type=submit name=copy value='".t('Copy')."'>";
        echo "          <input id=Edit_".$curr_word_id." type=submit name=edit value='".t('Edit')."'>";
//                        <input id=CBedit_".$curr_word_id." class=edit_checkbox type=checkbox name=CBedit_".$id." value='".t('wartość')."' disabled />
        echo "          <input id=CBedit_".$curr_word_id." class=edit_checkbox type=checkbox name=CBedit_".$curr_word_id." value='".$curr_word_id."' disabled />
                        <input id=Del_".$curr_word_id." type=submit name=delete value='".t("DELETE")."'>                        
                    </td>
              </tr>
              <tr><td colspan=8><textarea hidden form='edit_all' rows=5 cols=80 id='ta_ser_".$curr_word_id."' name='edit_all_".$curr_word_id."'></textarea></td></tr>
        </form>
        </table>";    
        
    $i++; //$id++;<tr><td colspan=8><textarea hidden rows=5 cols=80 id='ta_ser_".$curr_word_id."'></textarea></td></tr>
}
echo "</div>";      // end of div: edit_tab_contener

//zabezpieczenie na wypadek gdyby ilość stron okazała sie większa niż ilośc wyświetlanych numerów stron
if($navnum > $allpages){
       $navnum = $allpages;
}

        //ten fragment może być trudny do zrozumienia
        //wyliczane są tu niezbędne dane do prawidłowego zbudowania pętli
        //zmienne są bardzo opisowę więc nie będę ich tłumaczyć
        $forstart = $page - floor($navnum/2);
        $forend = $forstart + $navnum;
        
        if($forstart <= 0){ $forstart = 1; }
        
        $overend = $allpages - $forend;
        
        if($overend < 0){ $forstart = $forstart + $overend + 1; }
        
        //ta linijka jest ponawiana ze względu na to, że $forstart mogła ulec zmianie
        $forend = $forstart + $navnum;
        //w tych zmiennych przechowujemy numery poprzedniej i następnej strony
        $prev = $page - 1;
        $next = $page + 1;
        
        //nie wpisujemy "sztywno" nazwy skryptu, pobieramy ja od serwera
        $script_name = $_SERVER['SCRIPT_NAME'];
        
        //ten fragment z kolei odpowiada za wyślwietenie naszej nawigacji
        echo "<div id='nav'><ul>";
        if($page > 1) echo "<li><a href=\"".$script_name."?page=".$prev."\">".t("Poprzednia")."</a></li>";
        if ($forstart > 1) echo "<li><a href=\"".$script_name."?page=1\">[1]</a></li>";
        if ($forstart > 2) echo "<li>...</li>";
        for($forstart; $forstart < $forend; $forstart++){
                if($forstart == $page){
                        echo "<li class=\"current\">";
                }else{
                        echo "<li>";
                }
                echo "<a href=\"".$script_name."?page=".$forstart."\">[".$forstart."]</a></li>";
        }
        if($forstart < $allpages) echo "<li>...</li>";
        if($forstart - 1 < $allpages) echo "<li><a href=\"".$script_name."?page=".$allpages."\">[".$allpages."]</a></li>";
        if($page < $allpages) echo "<li><a href=\"".$script_name."?page=".$next."\">".t("Następna")."</a></li>";
        echo "</ul></div><div class=\"clear\"></div>";

echo "<div class=floating_button_div>"
//        . "<form id='edit_all' method=post action=EditAllMod.php target='_blank'>"
        . "<form id='edit_all' method=post action=EditAllMod.php >"
        . "<button id=floating_button>".t('Edytuj wszystkie')."</button>"
        ."</form>"
   . "</div>";

ob_end_flush();  // żeby sie dało reloadeować

} else {
    require 'loger.php';
}