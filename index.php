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
                <td><h4><?php echo t("Basic"); ?></h4></td>
                <td colspan='7'></td>
            </tr>
            <tr>
                <td></td>
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
                        <?php
                        $Word = new Ord();
                        $OrdCat = $Word->getTypesOfOrd();
                            echo "<option>".t("część mowy")."</option>";
                        foreach($OrdCat as $k){
                            if(strlen(t($k)) > 14 || strlen(tl($k, "en")) > 14)
                                echo "<option value=$k>".substr(t($k),0,14)." ( ".substr(tl($k,"en"),0,14)." )</option>";
                            else
                                echo "<option value=$k>".t($k)." ( ".tl($k,"en")." )</option>";
                        }   
                        ?>
                    </select>
                </td>
                <td class='label'><?php echo t("rodzaj"); ?></td>
                <td>
                    <select id=rodzaj name='rodzaj'>
                        <?php
                        $Word = new Ord();
                        $OrdCat = $Word->getRodzOfOrd();
                        foreach($OrdCat as $k){
                            echo "<option value=$k>".$k."</option>";
                        }
                        ?>
                    </select>
                </td>
                <td class='label'><?php echo t("szwedzki"); ?></td>
                <td><input id='trans' name='trans'></td>
                
            <tr>    
            <tr>    
                <td colspan="4"></td>
                <td class='label'><?php echo t("lab_grupa"); ?></td>
                <td>
                    <select id=grupa name='grupa'>
                        <?php
                        $Word = new Ord();
                        $OrdCat = $Word->getGroupOfOrd();
                        foreach($OrdCat as $k){
                            echo "<option value=$k>".$k."</option>";
                        }
                        ?>
                    </select>
                </td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr>            
            </tbody>
            
            <tbody id='czasownik' >
            <tr>
                <td><h4><?php echo t("Verb"); ?></h4></td>
                <td colspan='7'></td>
            </tr>
            <tr>
                <td colspan="3"><i><?php echo t("Active"); ?></i> (<b>Active</b>)</td>
                <td></td>
                <td colspan='3'></td>
            </tr>            
            <tr>
                <td class='label'><?php echo t("infinitive"); ?><br>(infinitive)</td>
                <td><input id='in1' name='infinitive'></td>
                <td class='label'><?php echo t("present"); ?><br>(present)</td>
                <td><input id='in1' name='presens'></td>
                <td class='label'><?php echo t("past"); ?><br>(past)</td>
                <td><input id='in1' name='past'></td>
                <td class='label'><?php echo t("supine"); ?><br>(supine)</td>
                <td><input id='in1' name='supine'></td>
            </tr>
            <tr>
                <td class='label'><?php echo t("imperative"); ?><br>(imperative)</td>
                <td><input id='in1' name='imperative'></td>
                <td class='label'><?php echo t("present participle"); ?> <br>(present participle)</td>
                <td><input id='in1' name='present_participle'></td>
                <td class='label'><?php echo t("past participle"); ?> <br>(past participle)</td>
                <td><input id='in1' name='past_participle'></td>
                <td colspan='2'></td>
            </tr>
            
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr>            
            <tr>
                <td colspan="3"><i><?php echo t("Passive"); ?></i> (<b>Passive</b>)</td>
                <td></td>
                <td colspan='3'></td>
            </tr>            
            <tr>
                <td class='label'><?php echo t("Passive infinitive"); ?> <br>(Passive infinitive)</td>
                <td><input id='in1' name='pas_infinitive'></td>
                <td class='label'><?php echo t("Passive present"); ?> <br>(Passive present)</td>
                <td><input id='in1' name='pas_presens'></td>
                <td class='label'><?php echo t("Passive past"); ?> <br>(Passive past)</td>
                <td><input id='in1' name='pas_preterite'></td>
                <td class='label'><?php echo t("Passive supine"); ?> <br>(Passive supine)</td>
                <td><input id='in1' name='pas_supine'></td>
            </tr>
            <tr>
                <td class='label'><?php echo t("Passive imperative"); ?> <br>(Passive imperative)</td>
                <td><input id='in1' name='pas_imperative'></td>
<!--                <td class='label'>P_present_participle</td>
                <td><input id='in1' name='pas_present_participle'></td>
                <td class='label'>P_past_participle</td>
                <td><input id='in1' name='pas_past_participle'></td>-->
                <td colspan='6'></td>
            </tr>
            
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr>            
            <!--</div>-->
            </tbody>
            <tbody id='rzeczownik' >
            <tr>
                <td><h4><?php echo t("Noun"); ?></h4></td>
                <td colspan='7'></td>
            </tr>
            <tr>
<!--                <td><br></td>-->
                <td colspan='8'></td>
            </tr>            
            <tr>
                <td class='label'><?php echo t("Single indefinite");?><br>(Single indefinite)</td>
                <td><input id='in1' name='S_indefinite'></td>
                <td class='label'><?php echo t("Single definite");?><br>(Single definite)</td>
                <td><input id='in1' name='S_definite'></td>
                <td class='label'><?php echo t("Plural indefinite");?><br>(Plural indefinite)</td>
                <td><input id='in1' name='P_indefinite'></td>
                <td class='label'><?php echo t("Plural definite"); ?><br>(Plural definite)</td>
                <td><input id='in1' name='P_definite'></td>
            </tr>
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr>            
            </tbody>
            <tbody id='przymiotnik' class='nobordbottom'>               
            <tr>
                <td><h4><?php echo t("Adjective"); ?></h4></td>
                <td colspan='7'></td>
            </tr>
            <tr>
                <!--<td><br></td>-->
                <td colspan='8'></td>
            </tr>            
            <tr>
                <td class='label'><?php echo t("neuter"); ?> <br>(neuter)</td>
                <td><input id='in1' name='neuter'></td>
                <td class='label'><?php echo t("masculin"); ?> <br>(masculin)</td>
                <td><input id='in1' name='masculin'></td>
                <td class='label'><?php echo t("plural"); ?> <br>(plural)</td>
                <td><input id='in1' name='plural'></td>
                <td colspan='2'></td>
            </tr>
            <tbody id='stopniowanie' class='nobordtop'>
            <tr>
                <td  class='label'><?php echo t("positive"); ?> <br>(positive)</td>
                <td><input id='in1' name='st_rowny'></td>
                <td  class='label'><?php echo t("comparative"); ?> <br>(comparative)</td>
                <td><input id='in1' name='st_wyzszy'></td>
                <td  class='label'><?php echo t("superlative"); ?> <br>(superlative)</td>
                <td><input id='in1' name='st_najwyzszy'></td>
                <td colspan='2'></td>
            </tr>
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr> 
            </tbody>
            </tbody>
            
            <tbody id="liczebnik">
            <tr>
                <td><h4><?php echo t("Numeral"); ?></h4></td>
                <td colspan='7'></td>
            </tr>
            <tr>
                <!--<td><br></td>-->
                <td colspan='8'></td>
            </tr>            
            <tr>
                <td class='label'><?php echo t("cardinal number"); ?> <br>(cardinal number)</td>
                <td><input id='in1' name='glowny'></td>
                <td class='label'><?php echo t("ordinal number"); ?> <br>(ordinal number)</td>
                <td><input id='in1' name='porzadkowy'></td>
                <td class='label'><?php echo t("fraction"); ?> <br>(fraction)</td>
                <td><input id='in1' name='ulamek'></td>
                 <td colspan="2"></td>
            </tr>
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr>    
            </tbody>
            
            <tbody id='inne'>
            <tr>
                <td><h4><?php echo t("Other"); ?></h4></td>
                <td colspan='7'></td>
            </tr>
            <tr>
                <!--<td><br></td>-->
                <td colspan='8'></td>
            </tr>            
            <tr>
                <td class='label'><?php echo t("wymowa"); ?></td>
                <td><input id='in1' name='wymowa'></td>
                <td colspan='6'></td>
            </tr>
            <tr>
                <td class='label'><?php echo t("uwagi"); ?></td>
                <td colspan="3"><textarea id=uwagi_ta class=uwagi_ta name="uwagi" rows="1"  style="height: 2em;"></textarea></td>
                <td class='label'><?php echo t("kategoria"); ?> </td>
                <td colspan='2'>
                    <!--<select id=kategoria name='kategoria'>-->
                    <select id=kategoria_ins  multiple="multiple" name='kategoria'>                        
                        <?php
                        $Word = new Ord();
                        $OrdCat = $Word->getCategoriesOfOrd();
                        foreach($OrdCat as $k){
                            echo "<option value=$k>".t($k)."</option>";
                        }
                        ?>
                    </select>
                    <input type='hidden' id='kategoria_val' name='kategoria'></input>
                </td>
            </tr>
            <tr>
                <td colspan='5'></td>
                <td colspan='2'><input type="reset" value="<?php echo t("Wyczyść formularz"); ?>"></td>
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
    switch($k){
        case'???':
        case'wyrazenie':
            echo "<tr><td>".t($k).": </td><td>".$Word->howManyOrdByPartOfSpeech($k)."</td></tr>";
            break;
        case'hjalp_verb':
            echo "<tr><td>".t("czasowników posiłkowych").": </td><td>".$Word->howManyOrdByPartOfSpeech($k)."</td></tr>";
            break;
        default:
            echo "<tr><td>".t($k).t("ów").": </td><td>".$Word->howManyOrdByPartOfSpeech($k)."</td></tr>";
            break;
    }
    
}
    echo "<tr><td></td><td>------</td></tr>";
    echo "<tr><td>".t("Razem").": </td><td>".$Word->howManyOrd()."</td></tr>";
echo "</table>
         </div>";

echo "<div id=p2 class=\"tab_info\"></div>";

$id_ord = 'samochod';
if(isset($_POST['submit'])){
    if($_POST['id_ord'] !=''){
        
        $id_ord =               trim(trim(trim($_POST['id_ord']),","));
        $typ =                  trim(trim(trim($_POST['typ']),","));
        $rodzaj =               trim(trim(trim($_POST['rodzaj']),","));
        $grupa =                trim(trim(trim($_POST['grupa']),","));
        $trans =                trim(trim(trim($_POST['trans']),","));
        $infinitive =           trim(trim(trim($_POST['infinitive']),","));
        $presens =              trim(trim(trim($_POST['presens']),","));
        $past =                 trim(trim(trim($_POST['past']),","));
        $supine =               trim(trim(trim($_POST['supine']),","));
        $imperative =           trim(trim(trim($_POST['imperative']),","));
        $present_participle =   trim(trim(trim($_POST['present_participle']),","));
        $past_participle =      trim(trim(trim($_POST['past_participle']),","));

        $pas_infinitive =       trim(trim(trim($_POST['pas_infinitive']),","));
        $pas_presens =          trim(trim(trim($_POST['pas_presens']),","));
        $pas_preterite =        trim(trim(trim($_POST['pas_preterite']),","));
        $pas_supine =           trim(trim(trim($_POST['pas_supine']),","));
        $pas_imperative =       trim(trim(trim($_POST['pas_imperative']),","));
        
        $S_indefinite =         trim(trim(trim($_POST['S_indefinite']),","));
        $S_definite =           trim(trim(trim($_POST['S_definite']),","));
        $P_indefinite =         trim(trim(trim($_POST['P_indefinite']),","));
        $P_definite =           trim(trim(trim($_POST['P_definite']),","));
        $neuter =               trim(trim(trim($_POST['neuter']),","));
        $masculin =             trim(trim(trim($_POST['masculin']),","));
        $plural =               trim(trim(trim($_POST['plural']),","));
        $st_rowny =             trim(trim(trim($_POST['st_rowny']),","));
        $st_wyzszy =            trim(trim(trim($_POST['st_wyzszy']),","));
        $st_najwyzszy =         trim(trim(trim($_POST['st_najwyzszy']),","));
        $wymowa =               trim(trim(trim($_POST['wymowa']),","));
        $glowny =               trim(trim(trim($_POST['glowny']),","));
        $porzadkowy =           trim(trim(trim($_POST['porzadkowy']),","));
        $ulamek =               trim(trim(trim($_POST['ulamek']),","));
        
        $kategoria =            trim(trim(trim($_POST['kategoria']),","));
        $uwagi =                trim(trim(trim($_POST['uwagi']),","));

        ?><script>//one();</script><?php
//        echo "<br>OTO text: ".$id_ord;
        
        $Word = new Ord();
//        echo "<br>id of a: ".$Word->getId($id_ord);
        echo "<br>Last index: ".$Word->getLastId(false);
       
        
        $Word->setData( $id_ord, $typ, $rodzaj, $grupa, $trans, $infinitive, $presens,$past, 
                        $supine, $imperative, $present_participle, $past_participle, 
                        $pas_infinitive, $pas_presens, $pas_preterite, $pas_supine, $pas_imperative,
                        $S_indefinite, $S_definite, $P_indefinite, $P_definite, 
                        $neuter, $masculin, $plural, $st_rowny, $st_wyzszy, $st_najwyzszy, 
                        $glowny, $porzadkowy, $ulamek,
                        $wymowa, $kategoria, $uwagi);
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