<?php

/****************************************************
 * Project:     Svenska
 * Filename:    rozdzielacz.php
 * Encoding:    UTF-8
 * Created:     2015-01-28
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
//$match = strpos($_SERVER['HTTP_REFERER'], "loger.php");
//$match_test = strpos($_SERVER['HTTP_REFERER'], "test.php");
//$match_showPr = strpos($_SERVER['HTTP_REFERER'], "show.php");

//echo $_SERVER['HTTP_REFERER'];
//echo "<br>ROLE:".$_SESSION['role'];
//echo "<br>user:".$_SESSION['user'];
//echo "<br>ref:".$_SESSION['ref'];

$file = trim(strrchr($_SERVER['PHP_SELF'],'/'),'/');
//$ref = trim(strrchr($_SESSION['ref'],'/'),'/');
//echo "<br>REF:".$ref;
//echo "<br>FILE:".$file;
//echo "<br>FILE:".$_SERVER['PHP_SELF'];


$allowPages = Array();

if(isset($_SESSION['role'])){
     switch ($_SESSION['role']){
         case 'admin':
             array_push($allowPages,"ShowRandomStats.php");
             array_push($allowPages,"help_test_admin.php");
             array_push($allowPages,"UserAdmin.php");
         case 'user_plus':
             array_push($allowPages,"Edit.php");
         case 'user':
             array_push($allowPages,"motsatsen.php");
             array_push($allowPages,"synonymer.php");
             array_push($allowPages,"index.php");
             ?><script> //alert("Bartek lub Anetka") </script><?php
         case 'visitor':
             ?><script> //alert("01. Gosc") </script><?php
             
             array_push($allowPages,"test.php");
             array_push($allowPages,"show.php");
             array_push($allowPages,"mail.php");
             array_push($allowPages,"EditUserByUser.php");
//                 header("Location: test.php");
             break;
         default:
             ?><script> //alert("04. Defałlt") </script><?php
             break;
     }
 }else{
     ?><script> //alert("05. Wala") </script><?php
 }

//echo "<br>REF:".$ref;
//echo "<br>allowPages:"; var_dump($allowPages);

if(!in_array($file,$allowPages)){
//    echo "<BR><br>NIE JEST na liście allowPages";
    if($file != 'test.php'){
        ?><script>alert("przed location")</script><?php
        header("Location: test.php");
    }
}else{
//    echo "<BR>JEST na liście allowPages";
}