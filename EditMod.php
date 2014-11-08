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

// Wyniki!!??? z sercza
//echo "<div id=p3 class=\"tab_info2\"></div>";
       
if(isset($_POST)){
    ?><script>//alert("//24 w isset $_POST");</script><?php
    echo "<br>POST:";
    var_dump($_POST);
    echo "<br>";
    if(isset($_POST['edit'])){
//        ?><script>//alert("//26 w $_POST['edit']!=null");</script><?php
        if(isset($_POST['kategoria']) ){
          echo "<br>POST:";var_dump($_POST);
            $arr = explode(";",$_POST['kategoria']);
            echo "<br>ARR:";var_dump($arr);
        }

        $serial = serialize($_POST);
        print_r($serial);
        $serial=  unserialize($serial);
        print_r($serial);
        $curr_ord_id = 0;
        if(isset($_POST['id'])){
            echo '<br>line: '.__LINE__."POST ID =".$_POST['id'];
                $curr_ord_id = $_POST['id'];
        }
        echo '<br>line: '.__LINE__."Curr ID: $curr_ord_id";
        echo '<br>line: '.__LINE__."_POST['id']: ".$_POST['id'];
    
        $sql_text = "UPDATE `ord` SET ";
        $sql_textPLLH = "UPDATE `ordLH` SET ";
        $sql_textErrINSPLLH = "INSERT INTO `ordLH` VALUES (";
        
        $id = '';
        $id_ord = '';
        $Word = new Ord();
        echo  '<br>1) '.$sql_text;
        foreach ($serial as $k=>$v){
//        echo "<br>".$k."=>".$v;
            switch($k){
                case 'edit':
                    break;
                case 'id':
                    $id = $v;
//                    $_SESSION['curr_ord_id']=$id;
                    $sql_textErrINSPLLH .= "'".($v)."',";
                    break;
                case 'uwagi':           // ostatni musi mieć zakończenie z ";"
                    $sql_text .= "`".$k."`='".triTrim($v)."'";
                    $sql_textPLLH .= "`".$k."`='".$Word->setSQLstringToCode(triTrim($v))."'";
                    $sql_textErrINSPLLH .= "'".$Word->setSQLstringToCode(triTrim($v))."');";
//                    $sql_textPLLH .= "`".$k."`='".($v)."'";
                    break;
                default:
                    $sql_text .= "`".$k."`='".triTrim($v)."',";
                    $sql_textPLLH .= "`".$k."`='".$Word->setSQLstringToCode(triTrim($v))."',";
                    $sql_textErrINSPLLH .= "'".$Word->setSQLstringToCode(triTrim($v))."',";
//                    $sql_textPLLH .= "`".$k."`='".($v)."'";
                    break;
            }
        }
        $sql_text .= " WHERE id='".$id."';";// AND id_ord='".$id_ord."';";
        $sql_textPLLH .= " WHERE id='".$id."';";// AND id_ord='".$id_ord."';";
//        $sql_textPLLH = str_replace($this->table."LH", $this->table, $sql_text);
        
        echo '<br>line: '.__LINE__.'/ SQL: '.$sql_text;
        echo '<br>line: '.__LINE__.'/ SQL_PLLH: '.$sql_textPLLH;
        echo '<br>line: '.__LINE__.'/ $sql_textErrINSPLLH: '.$sql_textErrINSPLLH;
        
        mysql_query($sql_text);
        
        if(mysql_affected_rows()){
//            ?><script>alert("//85 WESZŁO do BD (Update)");</script><?php
            mysql_query($sql_textPLLH);
            if( mysql_affected_rows()){
                ?><script>alert("88 WESZŁO do PLLH (update)");</script><?php
            }else{
                ?><script>alert("90 NIE WESZŁO do PLLH (update)");</script><?php
                // TODO: czyli nie ma ord o taki mnumerze i trzeba insertować!!!
                // Wpleść kolejny SQL????
                mysql_query($sql_textErrINSPLLH);
                if(mysql_affected_rows()){
                    ?><script>alert("95 WESZŁO do PLLH (INSERTEM)");</script><?php
                }else{
                    ?><script>alert("97 NIE WESZŁO do PLLH nawet INSERTEM");</script><?php
                }
            }
            if(isset($curr_ord_id)){
                ?><script>//alert("101 isset SESS curr_ord_id Przed headerem!");</script><?php
//                $curr_ord_id = $_SESSION['curr_ord_id'];
//                $_SESSION['curr_ord_id']='';
                
               echo '<br>line: '.__LINE__."Location: Edit.php?sercz_id=".$curr_ord_id;
//                header("Location: Edit.php");
                
                header("Location: Edit.php?sercz_id=".$curr_ord_id); 
            }else{
                ?><script>//alert("//110 NIE iset SESS curr_ord_id Przed headerem!");</script><?php
                header("Location: Edit.php");
            }
//            header("Location: Edit.php");
//            header("Location: Edit.php?sercz_id=".$curr_word_id);
            ?><script>//alert("//116 NIE WESZŁO do BD");</script><?php
        } else {
            echo "<br> ERROR MYSQLA (żadnej zmiany!!!): ".$sql_text;
             ?><script>alert("121 NIE WESZŁO do BD: mysql_affected_rows() == false");</script><?php
//             header("Location: Edit.php?sercz_id=".$curr_ord_id); 
        } 
    }
    elseif(isset($_POST['delete'])){
//        ?><script>alert("126 w $_POST['delete']!=null");</script><?php
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
//        echo '<br>SQL: '.$sql_text;
//        echo '<br>SQL: '.$sql_textPLLH;

        if( mysql_query($sql_text)){
            ?><script>alert("156 Skasowało");</script><?php
            if( mysql_query($sql_textPLLH)){
                ?><script>alert("158 WESZŁO do PLLH");</script><?php
            }else{
                ?><script>alert("160 NIE WESZŁO do PLLH");</script><?php
            }
            header("Location: Edit.php");
        }else{
            ?><script>alert("166 NIE skasowało");</script><?php
        } 
    }
    elseif(isset($_POST['copy'])){
        ?><script>alert("Funkcjonalność w budowie");</script><?php
        echo "<br>ID WORD: ".$_POST['id'];
        echo '<br>copy';
//        header("Location: index.php?copy_id=".$_POST['id']);
//        header("Location: Edit.php");
    }
}

//echo "<div class=floating_button_div>"
//        . "<button id=floating_button value=TRY>Edytuj wszystkie</button>"
//   . "</div>";

ob_end_flush();  // żeby sie dało reloadeować

