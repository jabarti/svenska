<?php

/****************************************************
 * Project:     Svenska
 * Filename:    Search.php
 * Encoding:    UTF-8
 * Created:     2014-07-25
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
//require_once "common.inc.php";
//include 'DB_Connection.php';
//$title = '';
//include 'header.php';
//include 'flag.php';
//include 'buttons.php';
$isEdit = strrpos($_SERVER['PHP_SELF'], "Edit.php");

if($isEdit){
    $isEdit = '';
}else{
    $isEdit = "target='_blank'";
}
    
echo "<div id=movingsearch class=movingsearch>";     
echo "<form action='Edit.php' ".$isEdit." method=post>
        <select name='sort'>
                        <option >".t("sortuj")."</option>
                        <option value='id'>id</option>
                        <option value='cz_mov'>".t("części mowy")."</option>
                        <option value='alf'>".t("alfabet")."</option>
                        <option value='cat'>".t("kategoria")."</option>
        </select>";
echo "
        <select name='wher'>
                        <option >".t("część mowy")."</option>
                        <option value='noun'>".t("rzeczownik")."</option>
                        <option value='verb'>".t("czasownik")."</option>
                        <option value='hjalp_verb'>".t("czas. posiłkowy")."</option>
                        <option value='adjective'>".t("przymiotnik")."</option>
                        <option value='adverb'>".t("przysłówek")."</option>
                        <option value='preposition'>".t("przyimek")."</option>
                        <option value='pronoun'>".t("zaimek")."</option>
                        <option value='conjunction'>".t("spójnik")."</option>
                        <option value='interjection'>".t("wykrzyknik")."</option>
                        <option value='numeral'>".t("liczebnik")."</option>
                        <option value='particle'>".t("partykuła")."</option>
                        <option value='wyrazenie'>".t("wyrażenie")."</option>
                        <option value='???'>???</option>
                        <option value='empty'>".t("puste")."</option>
        </select>
        <input type=submit name=wher_sub value='".t('wybierz')."'></input>
      </form>";

echo "<form action='Edit.php' ".$isEdit." method=post>
        <input id='sercz'     type='text' name='sercz'>
        <input id='sercz_btn' type='submit' value='".t("Szukaj podobnych")."'></input>
        <br><span> ".t("Tip: use")." '_' ".t("for unknown symbol/letter")."
        <br>  ".t("Tip: use")." '%' ".t("for string of unknown symbols/letters")."</span>
      </form>";
echo "<form action='Edit.php' ".$isEdit." method=post>
        <input id='sercz_dok'     type='text' name='sercz_dok'>
        <input id='sercz_dok_btn' type='submit' value='".t("Szukaj dokładnie")."'></input>
      </form>";
echo "</div>";

