﻿<?php

//echo ROOT;
$arr = explode(DIRECTORY_SEPARATOR, ROOT);
//var_dump($arr);
//echo '<br>'.$arr[1];
switch ($arr[1]){
    case 'xampp':
        try{
            $dbhost	= "localhost";
            $dbuser	= "root";
            $dbpass	= "";
            $dbname	= "a23";
            
            mysql_connect($dbhost,$dbuser,$dbpass) or die('Connection failed!');
            mysql_select_db($dbname)or die('Seletion failed!');
            
            echo "<br>CASE xampp";
        
        } catch (Exception $ex) {
            echo $ex;
        }
        break;
    case 'home':
        try{
            $dbhost	= "localhost";
            $dbuser	= "bartilev";
            $dbpass	= "";
            $dbname	= "";
            mysql_connect($dbhost,$dbuser,$dbpass) or die('Connection failed!');
            mysql_select_db($dbname)or die('Seletion failed!');
            
            echo "<br>CASE home";
            
        } catch (Exception $ex) {
            echo $ex;
        }
        break;
    default:
        break;
}