<?php

/****************************************************
 * Project:     Svenska
 * Filename:    synonymer.php
 * Encoding:    UTF-8
 * Created:     2014-10-22
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/

include 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | '.t("Synonimy");
include 'header.php';
include 'buttons.php';
//include 'rozdzielacz.php';

if($Word = new Ord()){
    $empty_rec = $Word->findEmptyOrdId();
//    echo "<br>line(".__LINE__.") Empty_records: ";var_dump($empty_rec);
    
    $MAX = $Word->getLastId();
    
}

//if(isset($_SESSION['log'])&& isset($_COOKIE['log'])){
if($_SESSION['log'] == true ){    
    if($_SESSION['log'] == true){
//        echo "<br>Zalogowany jako: ".$_SESSION['user'];//." z hasłem: ". $_SESSION['password'];
        
        echo "<br>Wyszukaj w ord_id (przecinek!!) wyrazy IDENTCZNE jak w tym ($MAX) który wprowadzasz!";
        
        echo "<form action='SynonymerMOD.php' method='post'>
                ".t('Do ID')."<input type=text name=sercz_synonym_nr><br>
                ".t('Do słowa')."<input type=text name=sercz_synonym_ord><br>
                <input type=submit name=submit value=".t('Szukaj synonimów').">
              </form>";
        
        
        if(isset($_GET)){
            echo "<br>ISSET GET!!!";
            if(isset($_GET['sercz_synonym_nr'])){
                $i = $_GET['sercz_synonym_nr'];
            }  else 
            if(isset($_GET['sercz_synonym_ord'])){
                $i = 1;
            }
        }else{
            echo "<br>NIE ISSET GET!!!";
            $i = 1655;
        }
//        for($i=1;$i<$MAX;$i++){
            
            $SQL = "SELECT id_ord FROM `ord` WHERE id='".$i."';";
        
//            $SQL = "SELECT id_ord FROM `ord` WHERE id='1653';";
//            echo "<br>SQL:".$SQL;
            $mq = mysql_query($SQL);
            
            if(mysql_affected_rows()){
                $text = mysql_fetch_array($mq);
                $text = mysql_result($mq, 0);
//                echo "<br>TEXT: ".$text;
                $arr = explode(', ',$text);
//                echo '<br>';
                var_dump($arr);
                
                foreach($arr as $k){
//                    echo "<br>I=$i => $k";
                    for($j=1;$j<$MAX;$j++){
                        if($i != $j){
                            $SQL2 = "SELECT id_ord FROM `ord` WHERE id='".$j."';";
//                            echo "<br>SQL2:".$SQL2;
                            $mq2 = mysql_query($SQL2);
                            if(mysql_affected_rows()){
                                $text2 = mysql_result($mq2, 0);
//                                echo "<br>TEXT2: ".$text2;
                                $arr2 = explode(', ',$text2);
                                foreach($arr2 as $k2){
                                    if($k == $k2){
                                        echo "<br>SYNONYMER???: $i = $j => $k = $k2";
                                        echo '<br><a target="_blank" href="Edit.php?sercz_id='.$i.'">'.$i.'</a>';
                                        echo '<br><a target="_blank" href="Edit.php?sercz_id='.$j.'">'.$j.'</a>';
                                    }
                                }
                            }
                        }
                    }
                }
            }
            
//        }  
    }else{
        echo "<br>NIE ZALOGOWANY";
    }
}
