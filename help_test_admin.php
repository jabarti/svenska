<?php

/****************************************************
 * Project:     Svenska
 * Filename:    help_test_admin.php
 * Encoding:    UTF-8
 * Created:     2014-07-17
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
//require_once "common.inc.php";
//include 'DB_Connection.php';
//$title = 'Svenska | Help_Adm';
//include 'header.php';
////include 'flag.php';
//include 'buttons.php';

include 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Help_Adm';
include 'header.php';
include 'buttons.php';

//mysql_select_db($dbname2, $DBConn);
//mysql_select_db($dbname, $DBConn);



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
if($_SESSION['log'] == true && $_SESSION['user'] == 'Bartek'){   
    
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


    $str='try';
    echo "<br>SHA: ".sha1($str);

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
    