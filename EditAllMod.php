<?php

/* * **************************************************
 * Project:     ZZZProba
 * Filename:    EditAllMod.php
 * Encoding:    UTF-8
 * Created:     2014-08-15
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
/*
 * NIE działa jeszcze przesyłanie kategorii - na razie jest zablokowany EDIT dla tego atrybutu!!!
 */
ob_start(); // żeby sie dało reloadeować

require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | EditAll';
include 'header.php';
include 'buttons.php';

// Wyniki!!??? z sercza
//echo "<div id=p3 class=\"tab_info2\"></div>";
       
if(isset($_POST)){
    ?><script>//alert(" isset $_POST");</script><?php
    $urls = '';
    $urls_EMPT = '';
    $str = '';
    $test = false;          // ma sprawdzać czy była jakaś zmiana dokonana!, jeśli tak ma być tru!
    
    foreach ($_POST as $k0 => $v0){        
        $SQL = "UPDATE `ord` SET ";
        $arr_fin = array();
        if($v0 != ''){
            $test = true;
            echo "<br>OTO: $k0 => $v0";
//            $SQL .= $v;
//            $arr = unserialize($v);  /// to idzie z seralize js! nie czyta tego php
//            var_dump($arr);
            
            $arr1 = explode("&",$v0); //id_ord=jedzenie%2C+pokarm%2C+potrawa%2C+po%C5%BCywienie%2C+%C5%BCywno%C5%9B%C4%87
               
            echo "<br>VarDump:";var_dump($arr1 );
            
            // Zamiana znaków z serializacji js na php  !ZNAKI!
            foreach($arr1 as $v1){
                $v1 = str_replace('+'     ,' ' , $v1);
                $v1 = str_replace('%3B'   ,';' , $v1);
                $v1 = str_replace('%2C'   ,',' , $v1);
                $v1 = str_replace('%3A'   ,':' , $v1);
                $v1 = str_replace('%2B'   ,'+' , $v1);
                $v1 = str_replace('%2F'   ,'/' , $v1);
                $v1 = str_replace('%3F'   ,'?' , $v1);
                $v1 = str_replace('%40'   ,'@' , $v1);
                $v1 = str_replace('%3C'   ,'<' , $v1);
                $v1 = str_replace('%3E'   ,'>' , $v1);
                $v1 = str_replace('='     ,'|!|!|' , $v1); // Zastępuje znak podziału, żeby można podmienić =
                $v1 = str_replace('%3D'   ,'=' , $v1); 
                
                $v1 = str_replace("'"     ,"\"" , $v1);
                $v1 = str_replace("%22"   ,"\"" , $v1);
                
                $v1 = str_replace('%C4%85','ą' , $v1);
                $v1 = str_replace('%C4%87','ć' , $v1);
                $v1 = str_replace('%C4%99','ę' , $v1);
                $v1 = str_replace('%C5%82','ł' , $v1);
                $v1 = str_replace('%C5%84','ń' , $v1);
                $v1 = str_replace('%C3%B3','ó' , $v1);
                $v1 = str_replace('%C5%9B','ś' , $v1);
                $v1 = str_replace('%C5%BC','ż' , $v1);
                $v1 = str_replace('%C5%BA','ź' , $v1);
                
                $v1 = str_replace('%C3%B6','ö' , $v1);
                $v1 = str_replace('%C3%96','Ö' , $v1);
                
                $v1 = str_replace('%C3%A4','ä' , $v1);
                $v1 = str_replace('%C3%84','Ä' , $v1);
                
                $v1 = str_replace('%C3%A5','å' , $v1);
                $v1 = str_replace('%C3%85','Å' , $v1);
                
                $arr2 = explode("|!|!|",$v1);

                array_push($arr_fin, $arr2);
                
            } // END of foreach($arr1 as $v1)

            echo "<p>OTO ARR_FIN:<br><span class=blue>"    ;
            var_dump($arr_fin);   
  
            $len = count($arr_fin);
  
            for($i=0; $i<$len; $i++){
                if($i == 0)
                    $id = $arr_fin[$i][1];
                else if($i == $len-1)
                    $SQL .= "`".$arr_fin[$i][0]."` = '".$arr_fin[$i][1]."' ";
                else if($i == $len-2)   // blokada nadpisywania kategorii!!!
//                    $SQL .= "`".$arr_fin[$i][0]."` = '".$arr_fin[$i][1]."' ";
                    continue;
                else
                    $SQL .= "`".$arr_fin[$i][0]."` = '".$arr_fin[$i][1]."', ";
            }
            $urls .= "$id,";
            $SQL .= "WHERE `id` = '$id';";

            echo "</span></p>";
        
            echo "<p class=red>";
            echo '<br>SQL: '.$SQL;
            echo "</p>";

           echo "<br>LOCATION: ";
//           echo("Location: Edit.php?urls='".$urls."'"); // !!!!!!!!!!!!!!!!!!!!

            mysql_query($SQL);
            if(mysql_affected_rows()){
        
//            if(true){
               ?><script>//alert("Weszło");</script><?php
//                  header("Location: Edit.php?urls='".$urls."'");        
//                  header("Location: Edit.php?urls=".rtrim($urls,",")."");    // !!!!!!!!!!!!      
            }else{
                ?><script>alert("100 NIE Weszło");</script><?php
//                header("Location: Edit.php?urls='".$urls."'");
//                header("Location: Edit.php");
            }
          ?><script>alert("105 NIE Weszło");</script><?php
        } // END of if($v0 != '')
        
        else {
            echo "<br>".__LINE__."OTO: $k0";
            $num = ltrim($k0, "edit_all_");
            $urls_EMPT .= $num.","; 
            ?><script>alert("107 NIE Weszło");</script><?php
//            echo "<br>$k jest PUSTE!";
//            echo("Location: Edit.php?urls=".rtrim($urls_EMPT,",")."");
//            header("Location: Edit.php");
        }
        echo "<br>".__LINE__."STAN TESTu: ".(bool)$test;
        if($test){  // False = NIE było zmain, True = BYŁY zmiany
            echo("<br>".__LINE__."TRUE Location: Edit.php?urls=".rtrim($urls,",")."");    // !!!!!!!!!!!!    
            header("Location: Edit.php?urls=".rtrim($urls,",")."");    // !!!!!!!!!!!!    
        }else{
            echo("<br>".__LINE__."FALSE Location: Edit.php?urls=".rtrim($urls_EMPT,",").""); //!!!!!!!!!!!
            header("Location: Edit.php?urls=".rtrim($urls_EMPT,",").""); //!!!!!!!!!!!
        }

    } // END of  foreach ($_POST as $k0
    ?><script>alert("114 NIE Weszło");</script><?php
//    var_dump($urls);
    $urls = rtrim($urls,",");    
    echo "<br>LOCATION: ";
    echo("Location: Edit.php?urls='".$urls."'");
    echo "<br>";
    $str .="SELECT * FROM `ord` WHERE `id` IN (".$urls.");";  
    echo "<br>STR URL:".$str;
//    header("Location: Edit.php?urls=".rtrim($urls,",").""); 
//    header("Location: Edit.php");

}   // END if(isset $POST)
else{
    ?><script>alert("127 NIE isset $_POST");</script><?php
}

//echo "<div class=floating_button_div>"
//        . "<button id=floating_button value=TRY>Edytuj wszystkie</button>"
//   . "</div>";

ob_end_flush();  // żeby sie dało reloadeować

