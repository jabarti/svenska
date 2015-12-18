<?php

/****************************************************
 * Project:     Svenska
 * Filename:    Search.php
 * Encoding:    UTF-8
 * Created:     2014-07-25
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
$isEdit = strrpos($_SERVER['PHP_SELF'], "Edit.php");
$isShow = strrpos($_SERVER['PHP_SELF'], "show.php");  

if($isEdit){
    $isEdit = '';
}else{
    $isEdit = "target='_blank'";
}

echo "<div id=movingsearch class=movingsearch>";     
//echo "<form action='Edit.php' ".$isEdit." method=post>
//        <select name='sort'>";
//if(isset($_SESSION['sort']))  
//    echo                "<option value='".$_SESSION['sort_id']."'>".t("sortuj po ").t($_SESSION['sort_id'])."</option>";
//else                            
//    echo                "<option >".t("sortuj")."</option>";
//
//echo "                  <option value='id'>id</option>
//                        <option value='cz_mov'>".t("część mowy_SL")."</option>
//                        <option value='alf'>".t("alfabet")."</option>
//        </select>";
//echo "
//        <select name='wher'>";
//if(isset($_SESSION['wher']))  
//    echo                "<option value='".$_SESSION['wher_id']."'>".t("część mowy_SL").": ".t($_SESSION['wher_id'])."</option>";
//else                            
//    echo                "<option >".t("część mowy_SL")."</option>";
//                        
//                            
// echo "                 <option value='noun'>".t("rzeczownik")."</option>
//                        <option value='verb'>".t("czasownik")."</option>
//                        <option value='hjalp_verb'>".t("czas. posiłkowy")."</option>
//                        <option value='adjective'>".t("przymiotnik")."</option>
//                        <option value='adverb'>".t("przysłówek")."</option>
//                        <option value='preposition'>".t("przyimek")."</option>
//                        <option value='pronoun'>".t("zaimek")."</option>
//                        <option value='conjunction'>".t("spójnik")."</option>
//                        <option value='interjection'>".t("wykrzyknik")."</option>
//                        <option value='numeral'>".t("liczebnik")."</option>
//                        <option value='particle'>".t("partykuła")."</option>
//                        <option value='wyrazenie'>".t("wyrażenie")."</option>
//                        <option value='???'>???</option>
//                        <option value='empty'>".t("puste")."</option>
//        </select>";
//
//echo "  <select name=kat_sercz>"
//               . "<option >".t("kategoria")."</option>";
//        $Word = new Ord();
//        $OrdCat = $Word->getCategoriesOfOrd();
//        foreach($OrdCat as $k){
//            echo "<option value=$k>".t($k)."</option>";
//        }
//echo "  </select>";
//        
//echo "  <input type=submit name=wher_sub value='".t('wybierz')."'></input>
//      </form>";
if($isShow){
    echo "<form action='Edit.php' ".$isEdit." method=post>
            <p>SHOW MUST GO ON!!!</p>
            <input id='sercz'     type='text' name='sercz' >".
            "<input id='sercz_btn' type='submit' value='".t("Szukaj podobnych")."'></input>
            <br><span> ".t("Tip: use")." '_' ".t("for unknown symbol/letter")."
            <br>  ".t("Tip: use")." '%' ".t("for string of unknown symbols/letters")."</span>
          </form>";
    echo "<form action='Edit.php' ".$isEdit." method=post> 
            <input id='sercz_dok'     type='text' name='sercz_dok' >".
            "<input id='sercz_dok_btn' type='submit' value='".t("Szukaj dokładnie")."'></input>
            <!--input id='resetFormIndex' type='reset' value='".t("Wyczyść wszystko")."'></input-->
          </form>";
    echo "</div>";
}else{

    echo "<form action='Edit.php' ".$isEdit." method=post>
            <input id='sercz'     type='text' name='sercz' >".
    //        "<!--value='".$_SESSION['serczCONST']."'-->".
            "<input id='sercz_btn' type='submit' value='".t("Szukaj podobnych")."'></input>
            <br><span> ".t("Tip: use")." '_' ".t("for unknown symbol/letter")."
            <br>  ".t("Tip: use")." '%' ".t("for string of unknown symbols/letters")."</span>
          </form>";
    echo "<form action='Edit.php' ".$isEdit." method=post> 
            <input id='sercz_dok'     type='text' name='sercz_dok' >".
    //        "<!--value='".$_SESSION['serczCONST_dok']."'--> ".
            "<input id='sercz_dok_btn' type='submit' value='".t("Szukaj dokładnie")."'></input>
            <!--input id='resetFormIndex' type='reset' value='".t("Wyczyść wszystko")."'></input-->
          </form>";
    //echo "<form action='Eraser.php' ".$isEdit." method=post>
    //        <input id='erase_btn' type='submit' value='".t("Wyczyść wszystko")."'></input>
    //      </form>";
    //echo "<form action='Edit.php' method=post>
    //        <input id='erase_btn' type='submit' name='erase' value='".t("Wyczyść wszystko")."'></input>
    //      </form>";
    echo "</div>";
}
