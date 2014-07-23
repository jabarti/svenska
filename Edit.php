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

require_once "common.inc.php";
include 'DB_Connection.php';
$title = 'Svenska | Edit';
include 'header.php';
//include 'flag.php';
include 'buttons.php';

if($_SESSION['log'] == true && isset($_COOKIE['log'])){
    
// echo "<br>
//<button onclick=\"window.location.href='loger.php'\">Wyloguj</button>   ";
    
echo "<form action='' method=post>
        <select name='sort'>
                        <option >sortuj</option>
                        <option value='id'>id</option>
                        <option value='cz_mov'>części mowy</option>
                        <option value='alf'>alfabet</option>
        </select>";
echo "
        <select name='wher'>
                        <option >część mowy</option>
                        <option value='noun'>rzeczownik</option>
                        <option value='verb'>czasownik</option>
                        <option value='hjalp_verb'>czas. posiłkowy</option>
                        <option value='adjective'>przymiotnik</option>
                        <option value='adverb'>przysłówek</option>
                        <option value='preposition'>przyimek</option>
                        <option value='pronoun'>zaimek</option>
                        <option value='conjunction'>spójnik</option>
                        <option value='interjection'>wykrzyknik</option>
                        <option value='numeral'>liczebnik</option>
                        <option value='particle'>partykuła</option>
                        <option value='wyrazenie'>wyrażenie</option>
                        <option value='empty'>puste</option>
        </select>
        <input type=submit name=wher_sub value='wybierz'></input>
      </form><br>";

echo "<form action='' method=post>
        <input type=text name=sercz>
        <input type=submit value='Szukaj'></input>
        <br><span> Tip: use '_' for unknown symbol/letter
        <br> Tip: use '%' for string of unknown symbols/letters</span>
      </form><br>";

//$sort = "";
//if(isset($_POST['sort_sub'])){
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
            default:
                ?><script>//alert("DEFAULT sort");</script><?php
                $sort= "";
                if(isset($_SESSION['sort'])){
                    ?><script>//alert("isse sess sort");</script><?php
                    $sort = $_SESSION['sort'];
                }
                break;
        }
    $_SESSION['sort']=$sort;
    }
//$wher = '';
    
    if(isset($_POST['wher'])){
        switch($_POST['wher']){
            case 'noun':
                $wher = "WHERE typ='noun'";
                break;
            case 'verb':
                $wher = "WHERE typ='verb'";
                break;
            case 'hjalp_verb':
                $wher = "WHERE typ='hjalp_verb'";
                break;
            case 'adjective':
                $wher = "WHERE typ='adjective'";
                break;
            case 'adverb':
                $wher = "WHERE typ='adverb'";
                break;
            case 'preposition':
                $wher = "WHERE typ='preposition'";
                break;
            case 'pronoun':
                $wher = "WHERE typ='pronoun'";
                break;
            case 'conjunction':
                $wher = "WHERE typ='conjunction'";
                break;
            case 'numeral':
                $wher = "WHERE typ='numeral'";
                break;
            case 'particle':
                $wher = "WHERE typ='particle'";
                break;
            case 'wyrazenie':
                $wher = "WHERE typ='wyrazenie'";
                break;
            case '???':
                $wher = "WHERE typ='???'";
                break;
            case 'empty':
                $wher = "WHERE typ=''";
                break;
            default:
                ?><script>//alert("DEFAULT wher");</script><?php
                $wher = "";
                if(isset($_SESSION['wher'])){
                    ?><script>//alert("isse sess wher");</script><?php
                    $wher = $_SESSION['wher'];
                }
                break;
        }
    
    $_SESSION['wher']=$wher;
    }
}

//if(isset($_SESSION['wher'])){
//    $wher = $_SESSION['wher'];
//    ?><script>//alert("Jest sessia wher");</script><?php
//}
//if(isset($_SESSION['sort'])){
//    $sort = $_SESSION['sort'];
//}

$sercz='';
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
}else{
    $sercz = '';
}
$text = "SELECT * FROM `ord` ";
$text .=$wher." ";
$text .=$sercz." ";
$text .=$sort." ";
$text .=";";

//echo "<br>TEXT: ".$text;
//$SQL1 = sprintf("SELECT * FROM `ord` ".$wher." ".$sercz." ".$sort.";");
//$SQL2 = sprintf("SELECT * FROM `ord` ".$wher." ".$sercz." ".$sort.";");
$SQL1 = $text;
$SQL2 = $text;

//echo "<br>SQL1:".$SQL1;
//echo "<br>SQL2:".$SQL2;
$mq = mysql_query($SQL2);
$mq2 = mysql_query($SQL1);
$i=0;
$li=0;

echo "<div id=menu>";
echo "<table class='table2'>";
while($row2 = mysql_fetch_assoc($mq2)){
    if($li%5==0){
            echo "<tr>";
    }
    echo "<td><a href='#ord_".$li."'>".$row2['id'].": ".$row2['id_ord']." => ".$row2['trans']."</a></td>";
//    if ($li == 40) break;
    if($li%5==4){
            echo "</tr>";
    }
    $li++;
}
echo "</table>";
echo "</div><br>";

//echo "<br>DUPA<br>";
$method='post';
$id = 0;

while($row = mysql_fetch_assoc($mq)){
    
    echo "<table id ='ord_".$id."'>";
    echo "<form method=".$method." action=Edit.php >";
    $j=0;
    foreach($row as $k=>$v){

        if($j%4==0){
            echo "<tr>";
        }
        if($k != 'typ'){
            echo "<td>".$k."</td><td><input name=".$k." value='".$v."'></td>";
        }else{
            echo "<td>".$k."</td><td>";
//                    . "<input name=".$k." value='".$v."'>"
            echo "<select name='".$k."'>
                        <option value=".$v.">".trans($v)."</option>
                        <option value='noun'>rzeczownik</option>
                        <option value='verb'>czasownik</option>
                        <option value='hjalp_verb'>czas. posiłkowy</option>
                        <option value='adjective'>przymiotnik</option>
                        <option value='adverb'>przysłówek</option>
                        <option value='preposition'>przyimek</option>
                        <option value='pronoun'>zaimek</option>
                        <option value='conjunction'>spójnik</option>
                        <option value='interjection'>wykrzyknik</option>
                        <option value='numeral'>liczebnik</option>
                        <option value='particle'>partykuła</option>
                        <option value='wyrazenie'>wyrażenie</option>
                        <option value='???'>???</option>
                </select>";        
             echo "</td>";
        }
        if($j%4==3){
            echo "</tr>";
        }     
    $j++;    
    }
        echo "<tr> <td colspan=6></td>
                    <td>
                        <button onclick='Menu();'>Menu</button>
                        <input type=submit name=edit value=Edit>
                        <input type=submit name=delete value=DELETE>
                    </td>
              </tr>
        </form>
        </table>";    
        
    $i++; $id++;
}

if(isset($_POST)){
    ?><script>//alert("w isset $_POST");</script><?php
    if(isset($_POST['edit'])){
//        ?><script>//alert("w $_POST['edit']!=null");</script><?php
        $serial = serialize($_POST);
        print_r($serial);
        $serial=  unserialize($serial);
        print_r($serial);
    
        $sql_text = "UPDATE `ord` SET ";
        $sql_textPLLH = "UPDATE `ordLH` SET ";
        $id = '';
        $id_ord = '';
        $Word = new Ord();
//        echo  '<br>1) '.$sql_text;
        foreach ($serial as $k=>$v){
        echo "<br>".$k."=>".$v;
            switch($k){
                case 'edit':
                    break;
                case 'id':
                    $id = $v;
                    break;
//                case 'id_ord':
//                    $id_ord = $v;
//                    break;
                case 'wymowa':
                    $sql_text .= "`".$k."`='".$v."'";
                    $sql_textPLLH .= "`".$k."`='".$Word->setSQLstringToCode($v)."'";
//                    $sql_textPLLH .= "`".$k."`='".($v)."'";
                    break;
                default:
                    $sql_text .= "`".$k."`='".$v."',";
                    $sql_textPLLH .= "`".$k."`='".$Word->setSQLstringToCode($v)."',";
//                    $sql_textPLLH .= "`".$k."`='".($v)."'";
                    break;
            }
        }
        $sql_text .= " WHERE id='".$id."';";// AND id_ord='".$id_ord."';";
        $sql_textPLLH .= " WHERE id='".$id."';";// AND id_ord='".$id_ord."';";
//        $sql_textPLLH = str_replace($this->table."LH", $this->table, $sql_text);
        
        echo '<br>SQL: '.$sql_text;
        echo '<br>SQL_PLLH: '.$sql_textPLLH;

        if( mysql_query($sql_text)){
            ?><script>//alert("WESZŁO");</script><?php
            if( mysql_query($sql_textPLLH)){
                ?><script>alert("WESZŁO do PLLH");</script><?php
            }else{
                ?><script>alert("NIE WESZŁO do PLLH");</script><?php
                // TODO: czyli nie ma ord o taki mnumerze i trzeba insertować!!!
                // Wpleść kolejny SQL????
            }
//            header("Location: Edit.php");
        }else{
            ?><script>alert("NIE WESZŁO do BD");</script><?php
        }
    
//    $Word = new Ord();
//    $Word->setData($id_ord, $typ, $rodzaj, $trans, $infinitive, $presens, $past, $supine, $imperative, $present_participle, $past_participle, $S_indefinite, $S_definite, $P_indefinite, $P_definite, $wymowa);
    
    }
    elseif(isset($_POST['delete'])){
//        ?><script>//alert("w $_POST['delete']!=null");</script><?php
        $serial = serialize($_POST);
//        print_r($serial);
        $serial=  unserialize($serial);
//        print_r($serial);
    
        $sql_text = "DELETE FROM `ord` ";
        $sql_textPLLH = "DELETE FROM `ordLH` ";
        $id = '';
        $id_ord = '';
//        echo  '<br>1) '.$sql_text;
        foreach ($serial as $k=>$v){
//        echo "<br>".$k."=>".$v;
            switch($k){
                case 'edit':
                    break;
                case 'id':
                    $id = $v;
                    break;
                case 'id_ord':
                    $id_ord = $v;
                    break;
                case 'wymowa':
//                    $sql_text .= "`".$k."`='".$v."'";
                    break;
                default:
//                    $sql_text .= "`".$k."`='".$v."',";
                    break;
            }
        }
        $sql_text .= " WHERE `ord`.`id` ='".$id."' AND id_ord='".$id_ord."';";
        $sql_textPLLH .= " WHERE `ordLH`.`id` ='".$id."' AND id_ord='".trans($id_ord)."';";
        echo '<br>SQL: '.$sql_text;
        echo '<br>SQL: '.$sql_textPLLH;

        if( mysql_query($sql_text)){
            ?><script>//alert("Skasowało");</script><?php
            if( mysql_query($sql_textPLLH)){
                ?><script>//alert("WESZŁO do PLLH");</script><?php
            }else{
                ?><script>alert("NIE WESZŁO do PLLH");</script><?php

            }
            header("Location: Edit.php");
        }else{
            ?><script>alert("NIE skasowało");</script><?php
        }
    
//    $Word = new Ord();
//    $Word->setData($id_ord, $typ, $rodzaj, $trans, $infinitive, $presens, $past, $supine, $imperative, $present_participle, $past_participle, $S_indefinite, $S_definite, $P_indefinite, $P_definite, $wymowa);
    
    }
}
ob_end_flush();  // żeby sie dało reloadeować


} else {
    require 'loger.php';
}