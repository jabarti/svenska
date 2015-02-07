<?php

/****************************************************
 * Project:     Svenska
 * Filename:    rozdzielacz.php
 * Encoding:    UTF-8
 * Created:     2015-01-28
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
$match = strpos($_SERVER['HTTP_REFERER'], "loger.php");
$match_test = strpos($_SERVER['HTTP_REFERER'], "test.php");
$match_showPr = strpos($_SERVER['HTTP_REFERER'], "show.php");

//echo $_SERVER['HTTP_REFERER'];
//echo "<br>ROLE:".$_SESSION['role'];
//echo "<br>user:".$_SESSION['user'];


if(isset($_SESSION['role'])){
     switch ($_SESSION['role']){
         case 'admin':
         case 'user_plus':
         case 'user':
             ?><script> //alert("Bartek lub Anetka") </script><?php
             break;
//         case 'Gosc':
         case 'visitor':
             ?><script> //alert("01. Gosc") </script><?php
                 header("Location: test.php");
             break;
         default:
             ?><script> //alert("04. Defałlt") </script><?php
             break;
     }
 }else{
     ?><script> //alert("05. Wala") </script><?php
 }

