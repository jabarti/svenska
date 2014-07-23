<?php
/* * **************************************************
 * Project:     ZZZProba
 * Filename:    index.php
 * Encoding:    UTF-8
 * Created:     
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
include 'common.inc.php';
include 'DB_Connection.php';
$title = 'Svenska | Inserter';
include 'header.php';
include 'buttons.php';


//    if(isset($_SESSION['log'])){
//    if($_SESSION['log'] == true){
//        echo "<div class=divLog>  Zalogowany jako: ".$_SESSION['user']."</div>";//." z hasłem: ". $_SESSION['password'];
//    }else{
//        echo "<br>NIE ZALOGOWANY";
//    }
//}else{
//    echo "KUPA";
//}

if($_SESSION['log'] == true && isset($_COOKIE['log'])){
?>
<body onload='start();'>
    <form id='form1' action='index.php' method="POST">
        <table class='tab_insert'>
        <tbody id='podstawowe'>
            <tr>
                <td><b>Podstawowe</b></td>
                <td colspan='7'></td>
<!--                <td><p class=red id='ang_cz_m'></p></td>
                <td colspan='4'></td>-->
            </tr>
            <tr>
                <td><br></td>
                <td colspan='2'></td>
                <td><p class=red id='ang_cz_m'></p></td>
                <td colspan='4'></td>
            </tr>
            <tr>
            <tr>
                <td class='label'>polski</td>
                <td><input id='in1' name='id_ord'></td>
                <td class='label'>typ</td>
                <td>
                    <select id=typ name='typ'>
                        <option >część mowy</option>
                        <option value="noun">rzeczownik</option>
                        <option value="verb">czasownik</option>
                        <option value="hjalp_verb">czas. posiłkowy</option>
                        <option value="adjective">przymiotnik</option>
                        <option value="adverb">przysłówek</option>
                        <option value="preposition">przyimek</option>
                        <option value="pronoun">zaimek</option>
                        <option value="conjunction">spójnik</option>
                        <option value="interjection">wykrzyknik</option>
                        <option value="wyrazenie">wyrażenie</option>
                        <option value="???">???</option>
                    </select>
                </td>
                <td class='label'>rodzaj</td>
                <td>
                    <select id=rodzaj name='rodzaj'>
                        <!--<trbody id='att'>-->
                            <option id=att value=""></option>
                            <option id=att value="att">att</option>
                        <!--</trbody>-->
                        <!--<trbody id='enett'>-->
                            <option value="ett">ett</option>
                            <option value="en">en</option>
                        <!--</trbody>-->
                    </select>
                </td>
                <td class='label'>szwedzki</td>
                <td><input id='in1' name='trans'></td>
            </tr>
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr>            
            </tbody>
            
            <tbody id='czasownik' >
            <tr>
                <td><b>Czasownik</b></td>
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
                <td><b>Rzeczownik</b></td>
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
                <td><b>Przymiotnik</b></td>
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
                <td  class='label'>st równy</td>
                <td><input id='in1' name='st_rowny'></td>
                <td  class='label'>st wyższy</td>
                <td><input id='in1' name='st_wyzszy'></td>
                <td  class='label'>st najwyższy</td>
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
                <td><b>Zaimek</b></td>
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
                <td><b>inne</b></td>
                <td colspan='7'></td>
            </tr>
            <tr>
                <td><br></td>
                <td colspan='7'></td>
            </tr>            
            <tr>
                <td class='label'>wymowa</td>
                <td><input id='in1' name='wymowa'></td>
                <td colspan='6'></td>
            </tr>
            <tr>
                <td colspan='7'></td>
                <td><input type='submit' name=submit id='but1' value='Zapisz do bazy'></input></td>
            </tr>
    
        </table>
    </form>
    <p id='p1'></p>

    
<?php
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
        $st_rowny =            $_POST['st_rowny'];
        $st_wyzszy =            $_POST['st_wyzszy'];
        $st_najwyzszy =         $_POST['st_najwyzszy'];
        $wymowa =               $_POST['wymowa'];

        ?><script>//one();</script><?php
//        echo "<br>OTO text: ".$id_ord;
        
        $Word = new Ord();
//        echo "<br>id of a: ".$Word->getId($id_ord);
        echo "<br>Last index: ".$Word->getLastId();
       
        
        $Word->setData( $id_ord, $typ, $rodzaj, $trans, $infinitive, $presens,$past, 
                        $supine, $imperative, $present_participle, $past_participle, 
                        $S_indefinite, $S_definite, $P_indefinite, $P_definite, 
                        $neuter, $masculin, $plural, $st_rowny, $st_wyzszy, $st_najwyzszy, 
                        $wymowa);
    } 
    
    echo "<br>"."krowa";

}else{
    echo "<br>NO POST<br>";

    ?><script>//two();</script><?php
}

?>
    <br>
<button onclick="window.location.href='loger.php'"><?php echo t("Wyloguuujj")?></button>
</body>
</html>
<?php
} else {
    require 'loger.php';
}