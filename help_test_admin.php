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
$title = 'Svenska | '.t("Help Test Admin");
include 'title.php';
include 'header.php';
include 'buttons.php';
include 'divLog.php'; 

echo "LEPSZY SZYFR!!!: ".hash('sha256', "ala")."<br>";

    $sumM = 0;
    $sumZ = 0;
    
for($i=1; $i<100; $i++){
    $random = rand(1,2);
//    echo "<br>wynik:".$random;
    if($random == 1){
        $sumZ++; 
    }else{
        $sumM++;
    }
}

if($sumZ > $sumM){
    $win = 'Zuzanna';
}else{
    $win = 'Maciek'; 
}

echo "<br>Wygrywa: ".$win.' i siedzi przy oknie przy starcie<br><br>';

//$string = "abcdefghijbklmnopioqrsbtuwxyzb1234567890";
//echo preg_match("/abc/", $string);
//
//if(preg_match("/^aBc/i",$string)){          // i for insensitive for case
//    echo '<br>true'.__LINE__;
//    if(preg_match("/^aBc|90\z/i",$string)){
//        echo '<br>true'.__LINE__;
//    }else{
//        echo '<br>false'.__LINE__;
//    }
//}else{
//    echo '<br>false';
//}
//
//preg_match_all("/[^b]/",$string,$matches);
//
//foreach ($matches as $key => $value) {
//    echo "<br>$key => $value";
//}

echo "<br>===================================================";
if($Word = new Ord()){
    
//    $ordTrans = $Word->getTransById(123);
//    echo "<br>SŁOWO: ".$ordTrans;
    // get host name from URL
    preg_match('@^(?:http://)?([^/]+)@i',
    "http://www.php.net/index.html", $matches);
    $host = $matches[1];

    // get last two segments of host name
    echo "<br>";
    preg_match('/[^.]+\.[^.]+$/', $host, $matches);
    echo "<br>Host name is: $host";
    echo "<br>domain name is: {$matches[0]}\n";
    
    
    $val = "att kupa påAÅ: 123";
    $prex = "/(?<!ett|en|att>)(\s)*[[:alnum:]]*/";
    $prex = "/(?![ett|en|att])(\s)*[[:alnum:]åöä\s:]*/i";
//    $prex = "/(?P<name>\w+): (?P<digit>\d+)/";
    if(preg_match($prex, $val,$matches)){
        print_r($matches);
        echo "<br>OK VAL: '$val' / '".$matches[0]."'";
    }else{
        echo "<br>VAL: '$val' NI MA PATTERN!!";
    }
echo "<br>===================================================";    
    $IDofWordByTrans = $Word->getIdsByTrans("gå");
    echo "<br>ID=".$IDofWordByTrans."<br>";
    $empty_rec = $Word->findEmptyOrdId();
    echo "<br>====================================<br>";
//    $string = "Ala ma kota =>           leende; <=> dupa;";
//    echo "<br>BAZA: ".$string."<br><br>";
//    $link0a = $Word->MakeLinkToTextarea($string);  
//    $link0b = $Word->MakeLinkToTextarea2($string);  
//    echo "<br>link0a__: ".$link0a;
//    echo "<br>link0b__: ".$link0b;
//    echo "<br>====================================<br>";
    
//    $string = "=>           leende; <=> dupa;";
//    echo "<br>BAZA: ".$string."<br><br>";
//    $link1a = $Word->MakeLinkToTextarea($string);  
//    $link1b = $Word->MakeLinkToTextarea2($string);  
//    echo "<br>link1a__: ".$link1a;
//    echo "<br>link1b__: ".$link1b;
//    echo "<br>====================================<br>";
    
//    $string = "Ala ma kota =>        stam; <=> dupa;";
//    echo "<br>BAZA: ".$string."<br><br>";
//    $link2a = $Word->MakeLinkToTextarea($string);
//    $link2b = $Word->MakeLinkToTextarea2($string);
//    echo "<br>link2a__: ".$link2a;
//    echo "<br>link2b__: ".$link2b;
//    echo "<br>====================================<br>";
//    
//    $string = "Ala ma kota => dristighet; <=> dupa;";
//    echo "<br>BAZA: ".$string."<br><br>";
//    $link3a = $Word->MakeLinkToTextarea($string);
//    $link3b = $Word->MakeLinkToTextarea2($string);
//    echo "<br>link3a__: ".$link3a;
//    echo "<br>link3b__: ".$link3b;
//    echo "<br>====================================<br>";
    
    $string = "att fundera == ektt tänka == att tycka == att grubbla == att anse;";
    echo "<br>BAZA: ".$string."<br><br>";
    $link4a = $Word->MakeLinkToTextarea($string);
    $link4b = $Word->MakeLinkToTextarea2($string);
    echo "<br>link4a__: ".$link4a;
    echo "<br>link4b__: ".$link4b;
    echo "<br>====================================<br>";
    
    $string = "Ala ma kota => dristighet; => 	samtidigt => rower; <=> dupa; => härifrån;";
    $string = "(petig == noggran == ordentlig) <=> (slarvig == oordentlig);";
    echo "<br>BAZA: ".$string."<br><br>";
    $link5a = $Word->MakeLinkToTextarea($string);
    $link5b = $Word->MakeLinkToTextarea2($string);
    echo "<br>link5a__: ".$link5a;
    echo "<br>link5b__: ".$link5b;
    echo "<br>====================================<br>";
        
    $string = "gramatyczne formy: supinum (gångit), passiv supinum (gångits); gå in <=> gå ut; gå ner <=> gå upp;
                gå med     = przystąpić, wstąpić, przystępować, wstępować;
                gå över    = kończyć, przerywać;
                gå ut med  = spotykać się z, wyjść z;
                gå förbi   = przechodzić obok, wyprzedzać;
                gå åt      = zużyć, pójść na coś  (det har gått åt 5kg = poszło na to 5 kg);
                gå sönder  = połamać się, rozbić się, uszkodzić się;
                gå under   = kończyć się, umierać, dobiec końca, upaść, zginąć;
                gå upp     = przybrać na wadze;
                gå igenom  = przejść przez coś, poradzić sobie czymś, spenetrować;";
    echo "<br>BAZA: ".$string."<br><br>";
    $link6a = $Word->MakeLinkToTextarea($string);
    $link6b = $Word->MakeLinkToTextarea2($string);
    echo "<br>link6a__: ".$link6a;
    echo "<br>link6b__: ".$link6b;
    echo "<br>====================================<br>";
    
//    $string = "=> därifrån;"; 
//    echo "<br>BAZA: ".$string."<br><br>";   
//    $link7a = $Word->MakeLinkToTextarea($string);
//    $link7b = $Word->MakeLinkToTextarea2($string);
//    echo "<br>link7a__: ".$link7a;
//    echo "<br>link7b__: ".$link7b;
//        echo "<br>";
    
    echo "<br>====================================<br>";    
    $string = "Ala ma kota => dristighet; => 	samtid?igt => rower; <=> dupa; => härifrån == brev;";    
    echo "<br>BAZA: ".$string."<br><br>";
    $link8a = $Word->MakeLinkToTextarea($string);
    $link8b = $Word->MakeLinkToTextarea2($string);
    echo "<br>link8a__: ".$link8a;
    echo "<br>link8b__: ".$link8b;
        echo "<br>";    
    
    $val = $Word->getTypesOfOrd();
 
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
                    <select id=typ name='typ' class='optionInsert'>
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
                    <select id=grupa name='grupa' class='optionInsert'>
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
echo '<br> Rzeczowniki bez grupy, lista:<br>';
$Word->findEmptyNOUN_GROUPOrdId();
echo '<br>';

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
     
//    var_dump($arr4);
    $max = count($arr4)-1;
    $rand_index = mt_rand(0, $max);
    $rand = $arr4[$rand_index];
    
//    $rand = rand($arr1);
//    echo "<br>".__FILE__.__LINE__." rand: ".$rand;
//    $rand = rand($arr2);
//    echo "<br>".__FILE__.__LINE__." rand: ".$rand;
    
//    echo "<br>".__FILE__.__LINE__." rand: ".$rand;
//    $rand = rand($arr4);
//    echo "<br>".__FILE__.__LINE__." rand: ".$rand;
//    echo "<br>";
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
 echo "<br> MULTIPLIKATION:";
    include_once 'mul.php';
    
    ?>

                        <div class="btn-group">
                      <button type='button' data-toggle="dropdown" class="btn dropdown-toggle"  data-placeholder="Please select">Checked option <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><input type="checkbox" id="ID1"><label for="ID1" name="NAME" value="VALUE">Label1</label></li>
                          <li><input type="checkbox" id="ID2"><label for="ID2" name="NAME" value="VALUE">Label2</label></li>
                          <li><input type="checkbox" id="ID3"><label for="ID3" name="NAME" value="VALUE">Label2</label></li>
                          <li><input type="checkbox" id="ID4"><label for="ID4" name="NAME" value="VALUE">Label2</label></li>
                          <li><input type="checkbox" id="ID5"><label for="ID5" name="NAME" value="VALUE">Label2</label></li>
                          <!-- Other items -->
                        </ul>
                    </div>
    <BR>
    <div class="btn-group">
  <button class="btn btn-primary">Checked option</button>
  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><input type="checkbox" id="ID" name="NAME" value="VALUE"><label for="ID">Label</label></li>
      <li><input type="checkbox" id="ID" name="NAME" value="VALUE"><label for="ID">Label</label></li>
      <li><input type="checkbox" id="ID" name="NAME" value="VALUE"><label for="ID">Label</label></li>
      <li><input type="checkbox" id="ID" name="NAME" value="VALUE"><label for="ID">Label</label></li>
      <!-- Other items -->
    </ul>
</div>
<div id="fb-root"></div><script>(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.3";  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script><div class="fb-video" data-allowfullscreen="1" data-href="/1427680617534122/videos/vb.1427680617534122/1485919158376934/?type=3"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/1427680617534122/videos/1485919158376934/"><a href="https://www.facebook.com/1427680617534122/videos/1485919158376934/"></a><p>Czas spojrzeć prawdzie w oczy. Jesteśmy wymierającą rasą i jeśli czegoś z tym nie zrobimy, to za sto, a może trochę więcej lat będziemy tylko historią. Ważną rolę w przyśpieszaniu naszego wymierania, spełnia rasizm i poprawność polityczna skierowana przeciwko nam.</p>Posted by <a href="https://www.facebook.com/pages/Polska-Potrzebuje-Nowych-Elit/1427680617534122">Polska Potrzebuje Nowych Elit</a> on 13 października 2015</blockquote></div></div>
<?php
$Word = new Ord();
$OrdGru = $Word->getGrupaOfOrd();
var_dump($OrdGru);

echo "<table class=tab_insert>"
   . "<form id='testForm1' action='help_test_admin.php' method=post>";
echo "<tr>";
                echo "<select name='try'>";

//                    $OrdGru = $Word->getGroupOfOrd();
                    echo "<option>".t("grupa")."</option>";
                    foreach($OrdGru as $key){
                        foreach($key as $k => $v){
                            if($v == ''){
                                
                            }else{
                                echo "<option value=$v>".$v."</option>";
                            }
                        }
                    }
                echo "</select>";
   echo "</form>";
   echo "</table>";
   
   
   $sql = "SELECT * FROM `ord` WHERE `typ` = \'noun\' AND `grupa` = \'\'";
   
   
   
   
   