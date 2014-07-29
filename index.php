<?php
/* * **************************************************
 * Project:     ZZZProba
 * Filename:    index.php
 * Encoding:    UTF-8
 * Created:     
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Inserter';
include 'header.php';
include 'buttons.php';

if($_SESSION['log'] == true && isset($_COOKIE['log'])){
    include 'Search.php';
?>
<body onload='start();'>
<!--<div class=edit_tab_contener>-->
    <form id='form1' action='index.php' method="POST">
        <table class='tab_insert'>
        <tbody id='podstawowe'>
            <tr>
                <td><b><?php echo t("Podstawowe"); ?></b></td>
                <td colspan='7'></td>
            </tr>
            <tr>
                <td><br></td>
                <!--<td></td>-->
                <td id="resul" colspan="2"></td>
                <td><p class=red id='ang_cz_m'></p></td>
                <td colspan='4'><p class=blue id='coto'></p></td>
            </tr>
            <tr>
            <tr>
                <td class='label'><?php echo t("polski"); ?></td>
                <td><input id='id_ord' name='id_ord'></td>
                <td class='label'><?php echo t("część mowy"); ?></td>
                <td>
                    <select id=typ name='typ'>
                        <option ><?php echo t("część mowy"); ?></option>
                        <!--<option ></option>-->
                        <option value="noun"><?php echo t("rzeczownik"); ?> ( <?php echo t("rzeczownik", "en"); ?> )</option>
                        <option value="verb"><?php echo t("czasownik"); ?> ( <?php echo t("czasownik", "en"); ?> )</option>
                        <option value="hjalp_verb"><?php echo t("czas. posiłkowy"); ?> ( <?php echo t("czas. posiłkowy", "en"); ?> )</option>
                        <option value="adjective"><?php echo t("przymiotnik"); ?> ( <?php echo t("przymiotnik", "en"); ?> )</option>
                        <option value="adverb"><?php echo t("przysłówek"); ?> ( <?php echo t("przysłówek", "en"); ?> )</option>
                        <option value="preposition"><?php echo t("przyimek"); ?> ( <?php echo t("przyimek", "en"); ?> )</option>
                        <option value="pronoun"><?php echo t("zaimek"); ?> ( <?php echo t("zaimek", "en"); ?> )</option>
                        <option value="conjunction"><?php echo t("spójnik"); ?> ( <?php echo t("spójnik", "en"); ?> )</option>
                        <option value="interjection"><?php echo t("wykrzyknik"); ?> ( <?php echo t("wykrzyknik", "en"); ?> )</option>
                        <option value="numeral"><?php echo t("liczebnik"); ?> ( <?php echo t("liczebnik", "en"); ?> )</option>
                        <option value="particle"><?php echo t("partykuła"); ?> ( <?php echo t("partykuła", "en"); ?> )</option>
                        <option value="wyrazenie"><?php echo t("wyrażenie"); ?></option>
                        <option value="???">???</option>
                    </select>
                </td>
                <td class='label'><?php echo t("rodzaj"); ?></td>
                <td>
                    <select id=rodzaj name='rodzaj'>
                            <option value=""></option>
                            <option value="att">att</option>
                            <option value="ett">ett</option>
                            <option value="en">en</option>
                    </select>
                </td>
                <td class='label'><?php echo t("szwedzki"); ?></td>
                <td><input id='trans' name='trans'></td>
            </tr>
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr>            
            </tbody>
            
            <tbody id='czasownik' >
            <tr>
                <td><b><?php echo t("Czasownik"); ?></b></td>
                <td colspan='7'></td>
            </tr>
            
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr>            
            <tr>
                <td class='label'>infinitive</td>
                <td><input id='in1' name='infinitive'></td>
                <td class='label'>presens</td>
                <td><input id='in1' name='presens'></td>
                <td class='label'>preterite</td>
                <td><input id='in1' name='past'></td>
                <td class='label'>supine</td>
                <td><input id='in1' name='supine'></td>
            </tr>
            <tr>
                <td class='label'>imperative</td>
                <td><input id='in1' name='imperative'></td>
                <td class='label'>present_participle</td>
                <td><input id='in1' name='present_participle'></td>
                <td class='label'>past_participle</td>
                <td><input id='in1' name='past_participle'></td>
                <td colspan='2'></td>
            </tr>
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr>            
            </div>
            </tbody>
            <tbody id='rzeczownik' >
            <tr>
                <td><b><?php echo t("Rzeczownik"); ?></b></td>
                <td colspan='7'></td>
            </tr>
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr>            
            <tr>
                <td class='label'>S_indefinite</td>
                <td><input id='in1' name='S_indefinite'></td>
                <td class='label'>S_definite</td>
                <td><input id='in1' name='S_definite'></td>
                <td class='label'>P_indefinite</td>
                <td><input id='in1' name='P_indefinite'></td>
                <td class='label'>P_definite</td>
                <td><input id='in1' name='P_definite'></td>
            </tr>
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr>            
            </tbody>
            <tbody id='przymiotnik' class='nobordbottom'>               
            <tr>
                <td><b><?php echo t("Przymiotnik"); ?></b></td>
                <td colspan='7'></td>
            </tr>
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr>            
            <tr>
                <td class='label'>neuter</td>
                <td><input id='in1' name='neuter'></td>
                <td class='label'>masculin</td>
                <td><input id='in1' name='masculin'></td>
                <td class='label'>plural</td>
                <td><input id='in1' name='plural'></td>
                <td colspan='2'></td>
            </tr>
            <tbody id='stopniowanie' class='nobordtop'>
            <tr>
                <td  class='label'><?php echo t("st równy"); ?></td>
                <td><input id='in1' name='st_rowny'></td>
                <td  class='label'><?php echo t("st wyższy"); ?></td>
                <td><input id='in1' name='st_wyzszy'></td>
                <td  class='label'><?php echo t("st najwyższy"); ?></td>
                <td><input id='in1' name='st_najwyzszy'></td>
                <td colspan='2'></td>
            </tr>
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr> 
            </tbody>
            </tbody>
            
<!--            <tbody id="zaimek">
            <tr>
                <td><b><?php echo t("Zaimek"); ?></b></td>
                <td colspan='7'></td>
            </tr>
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr>            
            <tr>
                <td class='label'>common</td>
                <td><input id='in1' name='common'></td>
                <td class='label'>plural</td>
                <td><input id='in1' name='plural'></td>
                 <td colspan="4"></td>
            </tr>
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr>    
            </tbody>-->
            
            <tbody id='inne'>
            <tr>
                <td><b><?php echo t("Inne"); ?></b></td>
                <td colspan='7'></td>
            </tr>
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr>            
            <tr>
                <td class='label'><?php echo t("wymowa"); ?></td>
                <td><input id='in1' name='wymowa'></td>
                <td colspan='6'></td>
            </tr>
            <tr>
                <td class='label'><?php echo t("uwagi"); ?></td>
                <td colspan="4"><textarea id=uwagi_ta class=uwagi_ta name="uwagi" rows="1"  style="height: 2em;"></textarea></td>
                <td colspan='2'></td>
            </tr>
            <tr>
                <td colspan='7'></td>
                <td><input type='submit' name=submit id='but1' value='<?php echo t("Zapisz do Bazy"); ?>'></input></td>
            </tr>
    
        </table>
    </form>
<!--</div>    // end of div: edit_tab_contener-->

    
<?php
$Word = new Ord();

$arr = $Word->getTypesOfOrd();

echo "<div class=tab_stat>
        <table>";
foreach($arr as $k){
    echo "<tr><td>".t($k).t("ów").": </td><td>".$Word->howManyOrdByPartOfSpeech($k)."</td></tr>";
}
    echo "<tr><td></td><td>------</td></tr>";
    echo "<tr><td>".t("Razem").": </td><td>".$Word->howManyOrd()."</td></tr>";
echo "</table>
         </div>";

echo "<div id=p2 class=\"tab_info\"></div>";

$id_ord = 'samochod';
if(isset($_POST['submit'])){
    if($_POST['id_ord'] !=''){
        
        $id_ord =               $_POST['id_ord'];
        $typ =                  $_POST['typ'];
        $rodzaj =               $_POST['rodzaj'];
        $trans =                $_POST['trans'];
        $infinitive =           $_POST['infinitive'];
        $presens =              $_POST['presens'];
        $past =                 $_POST['past'];
        $supine =               $_POST['supine'];
        $imperative =           $_POST['imperative'];
        $present_participle =   $_POST['present_participle'];
        $past_participle =      $_POST['past_participle'];
        $S_indefinite =         $_POST['S_indefinite'];
        $S_definite =           $_POST['S_definite'];
        $P_indefinite =         $_POST['P_indefinite'];
        $P_definite =           $_POST['P_definite'];
        $neuter =               $_POST['neuter'];
        $masculin =             $_POST['masculin'];
        $plural =               $_POST['plural'];
        $st_rowny =             $_POST['st_rowny'];
        $st_wyzszy =            $_POST['st_wyzszy'];
        $st_najwyzszy =         $_POST['st_najwyzszy'];
        $wymowa =               $_POST['wymowa'];
        $uwagi =                $_POST['uwagi'];

        ?><script>//one();</script><?php
//        echo "<br>OTO text: ".$id_ord;
        
        $Word = new Ord();
//        echo "<br>id of a: ".$Word->getId($id_ord);
        echo "<br>Last index: ".$Word->getLastId();
       
        
        $Word->setData( $id_ord, $typ, $rodzaj, $trans, $infinitive, $presens,$past, 
                        $supine, $imperative, $present_participle, $past_participle, 
                        $S_indefinite, $S_definite, $P_indefinite, $P_definite, 
                        $neuter, $masculin, $plural, $st_rowny, $st_wyzszy, $st_najwyzszy, 
                        $wymowa, $uwagi);
    } 
    
//    echo "<br>Do Translation test KROWA: t()".t("krowa")."/ g()".g( "krowa");

}else{
//    echo "<br>NO POST<br>";
//    echo "<br>Do Translation test KROWA: t()".t("krowa")."/ g()".g( "krowa");
//    echo "<br>Do Translation test KROWA: t()".t("krowa")."/ g()".g( "krowa");

}

?>
    <br>

</body>
</html>
<?php
} else {
    require 'loger.php';
}