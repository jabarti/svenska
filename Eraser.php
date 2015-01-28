<?php

/****************************************************
 * Project:     Svenska
 * Filename:    Eraser.php
 * Encoding:    UTF-8
 * Created:     2014-08-21
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once "common.inc.php";
include 'DB_Connection.php';
$title = 'Svenska | Eraser';
include 'header.php';
include 'flag.php';
include 'buttons.php';
include 'rozdzielacz.php';

foreach($_POST as $k => $v){
    echo "<br>POST['$k']=".$v;
}
echo "<br>";
foreach($_SESSION as $k => $v){
    echo "<br>SESSION['$k']=".$v;
}

if(isset($_SESSION['sort']))        {  unset ($_SESSION['sort']); }
if(isset($_SESSION['sort_id']))     {  unset ($_SESSION['sort_id']); }
if(isset($_SESSION['wher']))        {  unset ($_SESSION['wher']); }
if(isset($_SESSION['wher_id']))     {  unset ($_SESSION['wher_id']); }
if(isset($_SESSION['sercz']))       {  unset ($_SESSION['sercz']); }
if(isset($_SESSION['sercz_dok']))   {  unset ($_SESSION['sercz_dok']); }
if(isset($_SESSION['sql']))         {  unset ($_SESSION['sql']); }
if(isset($_SESSION['sercz_dok']))   {  unset ($_SESSION['sercz_dok']); }
if(isset($_SESSION['urls']))        {  unset ($_SESSION['urls']); }

//echo "<br> Po cięciu:";
//foreach($_POST as $k => $v){
//    echo "<br>POST['$k']=".$v;
//}
//echo "<br>";
//foreach($_SESSION as $k => $v){
//    echo "<br>SESSION['$k']=".$v;
//}


header("Location: Edit.php");
