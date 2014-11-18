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

//vardump($_SESSION);
//vardump($_COOKIE);

if($_SESSION['log'] == true && isset($_COOKIE['log'])){
//if($_SESSION['log'] == true ){
    include 'Search.php';
if(isset($_GET['copy_id'])){    
//    echo "GET COPY =".$_GET['copy_id'];
    $copy_ord_id = $_GET['copy_id'];
    $CopySQL = "SELECT * FROM `ord` WHERE `id` = '".$copy_ord_id."';";
//    echo "<br>SQL: $CopySQL";
    
    $mqCopy = mysql_query($CopySQL);
    
    if(mysql_affected_rows()){
        $mfa = mysql_fetch_assoc($mqCopy);
    }
}else{
}

if(!isset($_GET['copy_id'])){
?>
    <body onload='start();'>
<?php
}else{
?>
    <body>
<?php
}
?>
<!--<div class=edit_tab_contener>-->
    <!--<form id='form1' action='index.php' method="POST">-->
    <form id='form1' action='InserterMOD.php' method="POST">
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
                <td><input id='id_ord' name='id_ord' value="<?php echo $mfa['id_ord']?$mfa['id_ord']:''; ?>"></td>
                <td class='label'><?php echo t("część mowy"); ?></td>
                <td>
                    <select id=typ name='typ'>
                        <?php
                        $Word = new Ord();
                        $OrdCat = $Word->getTypesOfOrd();
                        if(isset($_GET['copy_id'])){
                            echo "<option>".substr(t($mfa['typ']),0,14)." ( ".substr(tl($mfa['typ'],"en"),0,14)." )</option>";
                        }else{
                            echo "<option>".t("część mowy")."</option>";
                        }
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
                        if(isset($_GET['copy_id'])){
                            echo "<option value='".$mfa['rodzaj']."'>".$mfa['rodzaj']."</option>";
                        }
                        foreach($OrdCat as $k){
                            echo "<option value=$k>".$k."</option>";
                        }
                        ?>
                    </select>
                </td>
                <td class='label'><?php echo t("szwedzki"); ?></td>
                <td><input id='trans' name='trans' value="<?php echo $mfa['trans']?$mfa['trans']:''; ?>"></td>
                
            <tr>    
            <tr>    
                <td colspan="4"></td>
                <td class='label'><?php echo t("lab_grupa"); ?></td>
                <td>
                    <select id=grupa name='grupa'>
                        <?php
                        $Word = new Ord();
                        $OrdCat = $Word->getGroupOfOrd();
                        if(isset($_GET['copy_id'])){
                            echo "<option value='".$mfa['grupa']."'>".t($mfa['grupa'])."</option>";
                        }
                        foreach($OrdCat as $k){
                            echo "<option value=$k>".t($k)."</option>";
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
                <td><input id='in1' name='infinitive' value="<?php echo $mfa['infinitive']?$mfa['infinitive']:''; ?>"></td>
                <td class='label'><?php echo t("present"); ?><br>(present)</td>
                <td><input id='in1' name='presens' value="<?php echo $mfa['presens']?$mfa['presens']:''; ?>"></td>
                <td class='label'><?php echo t("past"); ?><br>(past)</td>
                <td><input id='in1' name='past' value="<?php echo $mfa['past']?$mfa['past']:''; ?>"></td>
                <td class='label'><?php echo t("supine"); ?><br>(supine)</td>
                <td><input id='in1' name='supine' value="<?php echo $mfa['supine']?$mfa['supine']:''; ?>"></td>
            </tr>
            <tr>
                <td class='label'><?php echo t("imperative"); ?><br>(imperative)</td>
                <td><input id='in1' name='imperative' value="<?php echo $mfa['imperative']?$mfa['imperative']:''; ?>"></td>
                <td class='label'><?php echo t("present participle"); ?> <br>(present participle)</td>
                <td><input id='in1' name='present_participle' value="<?php echo $mfa['present_participle']?$mfa['present_participle']:''; ?>"></td>
                <td class='label'><?php echo t("past participle"); ?> <br>(past participle)</td>
                <td><input id='in1' name='past_participle' value="<?php echo $mfa['past_participle']?$mfa['past_participle']:''; ?>"></td>
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
                <td><input id='in1' name='pas_infinitive' value="<?php echo $mfa['pas_infinitive']?$mfa['pas_infinitive']:''; ?>"></td>
                <td class='label'><?php echo t("Passive present"); ?> <br>(Passive present)</td>
                <td><input id='in1' name='pas_presens' value="<?php echo $mfa['pas_presens']?$mfa['pas_presens']:''; ?>"></td>
                <td class='label'><?php echo t("Passive past"); ?> <br>(Passive past)</td>
                <td><input id='in1' name='pas_preterite' value="<?php echo $mfa['pas_preterite']?$mfa['pas_preterite']:''; ?>"></td>
                <td class='label'><?php echo t("Passive supine"); ?> <br>(Passive supine)</td>
                <td><input id='in1' name='pas_supine' value="<?php echo $mfa['pas_supine']?$mfa['pas_supine']:''; ?>"></td>
            </tr>
            <tr>
                <td class='label'><?php echo t("Passive imperative"); ?> <br>(Passive imperative)</td>
                <td><input id='in1' name='pas_imperative' value="<?php echo $mfa['pas_imperative']?$mfa['pas_imperative']:''; ?>"></td>
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
                <td><input id='in1' name='S_indefinite' value="<?php echo $mfa['S_indefinite']?$mfa['S_indefinite']:''; ?>"></td>
                <td class='label'><?php echo t("Single definite");?><br>(Single definite)</td>
                <td><input id='in1' name='S_definite' value="<?php echo $mfa['S_definite']?$mfa['S_definite']:''; ?>"></td>
                <td class='label'><?php echo t("Plural indefinite");?><br>(Plural indefinite)</td>
                <td><input id='in1' name='P_indefinite' value="<?php echo $mfa['P_indefinite']?$mfa['P_indefinite']:''; ?>"></td>
                <td class='label'><?php echo t("Plural definite"); ?><br>(Plural definite)</td>
                <td><input id='in1' name='P_definite' value="<?php echo $mfa['P_definite']?$mfa['P_definite']:''; ?>"></td>
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
                <td><input id='in1' name='neuter' value="<?php echo $mfa['neuter']?$mfa['neuter']:''; ?>"></td>
                <td class='label'><?php echo t("masculin"); ?> <br>(masculin)</td>
                <td><input id='in1' name='masculin' value="<?php echo $mfa['masculin']?$mfa['masculin']:''; ?>"></td>
                <td class='label'><?php echo t("plural"); ?> <br>(plural)</td>
                <td><input id='in1' name='plural' value="<?php echo $mfa['plural']?$mfa['plural']:''; ?>"></td>
                <td colspan='2'></td>
            </tr>
            <tbody id='stopniowanie' class='nobordtop'>
            <tr>
                <td  class='label'><?php echo t("positive"); ?> <br>(positive)</td>
                <td><input id='in1' name='st_rowny' value="<?php echo $mfa['st_rowny']?$mfa['st_rowny']:''; ?>"></td>
                <td  class='label'><?php echo t("comparative"); ?> <br>(comparative)</td>
                <td><input id='in1' name='st_wyzszy' value="<?php echo $mfa['st_wyzszy']?$mfa['st_wyzszy']:''; ?>"></td>
                <td  class='label'><?php echo t("superlative"); ?> <br>(superlative)</td>
                <td><input id='in1' name='st_najwyzszy' value="<?php echo $mfa['st_najwyzszy']?$mfa['st_najwyzszy']:''; ?>"></td>
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
                <td><input id='in1' name='glowny' value="<?php echo $mfa['glowny']?$mfa['glowny']:''; ?>"></td>
                <td class='label'><?php echo t("ordinal number"); ?> <br>(ordinal number)</td>
                <td><input id='in1' name='porzadkowy' value="<?php echo $mfa['porzadkowy']?$mfa['porzadkowy']:''; ?>"></td>
                <td class='label'><?php echo t("fraction"); ?> <br>(fraction)</td>
                <td><input id='in1' name='ulamek' value="<?php echo $mfa['ulamek']?$mfa['ulamek']:''; ?>"></td>
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
                <td><input id='in1' name='wymowa' value="<?php echo $mfa['wymowa']?$mfa['wymowa']:''; ?>"></td>
                <td colspan='6'></td>
            </tr>
            <tr>
                <td class='label'><?php echo t("uwagi"); ?></td>
                <td colspan="3"><textarea id=uwagi_ta class=uwagi_ta name="uwagi" rows="1"  style="height: 2em;"><?php echo $mfa['uwagi']?$mfa['uwagi']:''; ?></textarea></td>
                <td class='label'><?php echo t("kategoria"); ?> </td>
                <td colspan='2'>
                    <!--<select id=kategoria name='kategoria'>-->
                    <select id=kategoria_ins  multiple="multiple" name='kategoria'>                        
                        <?php
                        if(isset($_GET['copy_id'])){
                            echo "<option value='".$mfa['kategoria']."'>".t($mfa['kategoria'])."</option>";
                        }
                        $Word = new Ord();
                        $OrdCat = $Word->getCategoriesOfOrd();

                         // NIE DZIAŁA!!! 
//                        foreach($OrdCat as $k =>$v){
//                            echo "<br>OrdCat[$k]=$v ===>> ";
//                            $OrdCat[$k] = t($v);
//                            echo "PO <OrdCat[$k]=$v";
//                        }

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

if (isset($_GET['result'])){
    switch($_GET['result']){ //Edit.php?sercz_id=$_GET['newId']
        case 'OK':
//            echo t('Wstawione do BD!')." SV: <a href=#>".$_GET['transz']."</a>";
            $tempID =  $_GET['newId'];
//            echo "<br>$tempID";
//            echo "<br>";
            
            echo t('Wstawione do BD!')." SV: <a target='_blank' href='Edit.php?sercz_id=$tempID'>".$_GET['transz']."</a>";
            
            break;
        case 'Error':
            echo t("ERROR!!!!");
            break;
        default:
            echo t('Nic się nie dzieje!');
            break;
    }
    unset($_GET['result']);
}

?>
</body>
</html>
<?php
} else {
    require 'loger.php';
}