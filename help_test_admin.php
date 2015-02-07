<?php

/****************************************************
 * Project:     Svenska
 * Filename:    help_test_admin.php
 * Encoding:    UTF-8
 * Created:     2014-07-17
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
include 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Help_Adm';
include 'header.php';
include 'buttons.php';
include 'rozdzielacz.php';

if($Word = new Ord()){
    $empty_rec = $Word->findEmptyOrdId();
    echo "<br>line(".__LINE__.") Empty_records: ";var_dump($empty_rec);
    
    foreach($empty_rec as $k => $v){
        echo "<br>K: $k => V: $v";
        ?>
<form id='form1' action='InserterMOD.php' method="POST">
        <table class='tab_insert'>
        <tbody id='podstawowe'>
            <tr>
                <td><h4><?php echo t("Basic"); ?></h4></td>
                <td colspan='7'></td>
            </tr>
            <tr>
                <td><?php echo t("ID:"); ?></td>
                <td><input type="text" name="id" value="<?php echo $v; ?>" readonly></td>
                <td colspan ="6"></td>
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
                <td><input type='submit' name=submitHTA id='but1' value='<?php echo t("Zapisz do Bazy"); ?>'></input></td>
            </tr>
    
        </table>
    </form>
        <?php
    }
}

if(isset($_SESSION['log'])&& isset($_COOKIE['log'])){
    if($_SESSION['log'] == true){
        echo "<br>Zalogowany jako: ".$_SESSION['user'];//." z hasłem: ". $_SESSION['password'];
    }else{
        echo "<br>NIE ZALOGOWANY";
    }
}

//echo '<br><br>linia: '.__LINE__.' ROOT: '.ROOT.'<br>';
//echo 'linia: '.__LINE__.' BASE_PATH: '.BASE_PATH.'<br>';
//echo 'linia: '.__LINE__.' INCLUDE_PATH: '.INCLUDE_PATH.'<br>';
//echo 'linia: '.__LINE__.' CLASSES_PATH: '.CLASSES_PATH.'<br>';
//echo 'linia: '.__LINE__.' FILES_PATH: '.FILES_PATH.'<br>';
//echo 'linia: '.__LINE__.' PICTURES_PATH: '.PICTURES_PATH.'<br>';
//echo 'linia: '.__LINE__.' STYLES_PATH: '.STYLES_PATH.'<br>';
//
//echo 'linia: '.__LINE__.' BL_WEB_ROOT_PATH: '.BL_WEB_ROOT_PATH.'<br>';
//echo 'linia: '.__LINE__.' BL_TRANSLATION_PATH: '.BL_TRANSLATION_PATH.'<br>';

//echo 'linia: '.__LINE__.' LOCALE_PATH: '.LOCALE_PATH.'<br>';
//echo 'linia: '.__LINE__.' UPRODUCE_UPLOAD_PATH: '.UPRODUCE_UPLOAD_PATH.'<br>';
//echo 'linia: '.__LINE__.' INFO_IMG_FILE_PATH: '.INFO_IMG_FILE_PATH.'<br>';
//echo 'linia: '.__LINE__.' XML_RESOURCES_DIR: '.XML_RESOURCES_DIR.'<br>';
//echo 'linia: '.__LINE__.' PAGE_THUMBS_PATH: '.PAGE_THUMBS_PATH.'<br>';

echo 'linia: '.__LINE__.' =============================================<br>';

echo $_SESSION['user'];

//if(true){
if($_SESSION['log'] == true && $_SESSION['role'] == 'admin'){   
    
if($Random = new Random()){
    echo "<br>Random OK";
//    $Random->getIdByWordId("7");
//    $Random->setData(1, 3, 5, 7);
//    $Random->setData(2, 7, 4, 3);
//    $Random->setData(1, 7, 3, 3);
    // test id 19750
}else{
    echo "<br>Random NOT OK: Object of User class not created!";
}



if($Word = new Ord()){
//    echo "<br>OK";
//    echo "<br>Cięcie stringa do bazy:";
//    $str_old = "<br>Alą mać kotę, Ącko źrebiŃ, öäå+ÖÄÅ";
//    $str = $Word->setSQLstringToCode($str_old);
//    $str2 = $Word->setSQLstringDeCode($str);
//    $str3 = $Word->getCountSimOrdByIdOrd("ok", false);
    //$str3 = $Word->getTabOrdById("3");       // To jest próbna tabela TODO!!!!!
    $arr1 = $Word->getQuestionIDsArrByType("noun");       
    $arr2 = $Word->getQuestionIDsArrByType("verb");       
    $arr3 = $Word->getQuestionIDsArrByType("hjalp_verb");       
    $arr4 = $Word->getQuestionIDsArrByType(false);      
     
    var_dump($arr4);
    $max = count($arr4)-1;
    $rand_index = mt_rand(0, $max);
    $rand = $arr4[$rand_index];
    
//    $rand = rand($arr1);
//    echo "<br>".__FILE__.__LINE__." rand: ".$rand;
//    $rand = rand($arr2);
//    echo "<br>".__FILE__.__LINE__." rand: ".$rand;
    
    echo "<br>".__FILE__.__LINE__." rand: ".$rand;
//    $rand = rand($arr4);
//    echo "<br>".__FILE__.__LINE__." rand: ".$rand;
    echo "<br>";
    //UŻYWAĆ OSTROŻNIE!!!!
//    $Word->copyFromOrdLHToOrd();
    //$str4 = $Word->getSimOrdByTrans("ok");

    //echo "<br>".$str_old;
    //echo "<br>".$str;
    //echo "<br>".$str2;
    //echo "<br>ILE?: ".$str3;
    
    echo "<br>";

    echo "<br> LISTA WYRAZÓW:";

//    $Word->getSimOrdByIdOrd("ok");
//    $Word->getSimOrdByTrans("ok");

//    echo "<br>Ile jest noun:".$Word->howManyOrdByPartOfSpeech("noun");
//    echo "<br>Ile jest ???:".$Word->howManyOrdByPartOfSpeech("???");
//    //$Word->tryColumns();
//    $max = $Word->getLastId(false);
//    
//    $Word->findEmptyOrdId();
//    $Word->getOrdArrByType("pronoun");
//    echo "<br>=============CATEGORIES=================<br>";
//    $Word->getCategoriesOfOrd();
    
}else{
    echo "<br>NOT OK: Object of Ord class not created!";
}

if($User = new User()){
//    echo "<br>USER OK";
//    $User->getUsersNames();
}else{
    echo "<br>USER NOT OK: Object of User class not created!";
}


    $str='';
    echo "<br>SHA: ".sha1($str);
    echo "<br>pass: da39a3ee5e6b4b0d3255bfef95601890afd80709";

} else {
    require 'loger.php';
}
?>
<body>
    <img src="http://www.bartilevi.pl/BartiLevi_WEB/Translations/flags/flag_pl.jpg">
    <img src="../BartiLevi_WEB/Translations/flags/flag_pl.jpg">
    <img src="../Translations/flags/flag_pl.jpg">
    <img src="<?php echo BL_TRANSLATION_PATH ?>flags/flag_pl.jpg">
    <a href="../Translations/flags/flag_pl.jpg">link</a>
    <a href="<?php echo BL_TRANSLATION_PATH ?>flags/flag_pl.jpg">link</a>
    <div id="czas"></div>
    
</body>
<script>
    function getTime() {
    return (new Date()).toLocaleTimeString();
}

document.getElementById('czas').innerHTML = getTime();

setInterval(function() {

    document.getElementById('czas').innerHTML = getTime();
    
}, 1000);
    </script>
<?php

    $SQL = "SELECT id, trans, past_participle FROM `ord` WHERE `past_participle` LIKE '%en';";
    echo "<br>SQL = $SQL<br>";
    
    $mq = mysql_query($SQL);
    $arr = array();
    if(mysql_affected_rows()){
        while($arr = mysql_fetch_assoc($mq)){
            echo '<br>';
            foreach($arr as $k => $v)
                echo "| $k => $v";
        }

    }