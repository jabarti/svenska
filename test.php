<?php

/* * **************************************************
 * Project:     ZZZProba
 * Filename:    test.php
 * Encoding:    UTF-8
 * Created:     2014-06-26
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
//require_once "common.inc.php";
//include 'DB_Connection.php';
//$title = 'Svenska | Test';
//include 'header.php';
////include '../Translations/flag.php';
//include 'buttons.php';

require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Test';
include 'header.php';
include 'buttons.php';

//if(isset($_SESSION['log'])){
//    if($_SESSION['log'] == true){
//        echo "<br>Zalogowany jako: ".$_SESSION['user'];//." z hasłem: ". $_SESSION['password'];
//    }else{
//        echo "<br>NIE ZALOGOWANY";
//    }
//}

//if (isset($_POST['clear'])){
//    echo "<br>".__LINE__."/ 1 ISSET POST Clear";
//    $score = new Score();
//    $score->setScoreData($_SESSION['user'], $_SESSION['good'], $_SESSION['bad']);
//    $score->saveScoreData();
//    $_SESSION['arrOfAnsw'] = array();
//    $_SESSION['good']=0;
//    $_SESSION['bad']=0;
//}

if($_SESSION['log'] == true && isset($_COOKIE['log'])){
    
 if(!isset($_SESSION['good']) && !isset($_SESSION['bad'])){
 $_SESSION['good']=0;
 $_SESSION['bad']=0;
 }else{
     if(isset($_POST['clear'])){
//         echo "<br>".__LINE__."/ 2 ISSET POST Clear";
         $score = new Score();
         $score->setScoreData($_SESSION['user'], $_SESSION['good'], $_SESSION['bad']);
         $score->saveScoreData();

         $_SESSION['arrOfAnsw'] = array();
         $_SESSION['good']=0;
         $_SESSION['bad']=0;
     }
 }

if($Word = new Ord()){
//    echo "<br>OK";
}else{
    echo "<br>NOT OK: Object of Ord class not created!";
}

$max = $Word->getLastId(false);

$rand =  mt_rand(1, $max); // wybór słowa
//echo "<br>".__LINE__." / Słowo(Rand):".$rand;

//$rand = 123;  // For test - fixed ID of word; 


$testTab = $Word->getQuestAndAnswerById($rand);
$wordPL = $Word->getOrdPLById($rand);
//echo "<br>WordPL: ".$wordPL;

$method = 'post';

echo "<table>"
   . "<form id=testForm1 action=test.php method=".$method.">";
echo "<tr>"
                ."<td>".t("To jest")." ".trans($testTab[0])."</td>"
                .'<td><textarea rows=1 cols=20 name="'.$testTab[0].'" disabled>'.$testTab[1].'</textarea></td>';
        echo    "<td>".t("Podaj")." ".trans($testTab[2])."</td>"
                ."<td>"
                . "<input type=hidden name=quest_p1 value='".$testTab[2]."'>"       // pytanie
                . "<input type=hidden name=quest_p2 value='".$testTab[1]."'>"       // słowo
                . "<input type=hidden name=quest_p3 value='".$testTab[0]."'>"       // to jest.. 
                . "<input type=hidden name=quest_p4 value='".$wordPL."'>";          // słowo PL
        if ($testTab[2] == "typ"){
            ?> <select name='try'>
                        <option ><?php echo t("część mowy"); ?></option>
                        <!--<option ></option>-->
                        <option value="noun"><?php echo t("rzeczownik"); ?> ( <?php echo tl("rzeczownik", "en"); ?> )</option>
                        <option value="verb"><?php echo t("czasownik"); ?> ( <?php echo tl("czasownik", "en"); ?> )</option>
                        <option value="hjalp_verb"><?php echo t("czas. posiłkowy"); ?> ( <?php echo tl("czas. posiłkowy", "en"); ?> )</option>
                        <option value="adjective"><?php echo t("przymiotnik"); ?> ( <?php echo tl("przymiotnik", "en"); ?> )</option>
                        <option value="adverb"><?php echo t("przysłówek"); ?> ( <?php echo tl("przysłówek", "en"); ?> )</option>
                        <option value="preposition"><?php echo t("przyimek"); ?> ( <?php echo tl("przyimek", "en"); ?> )</option>
                        <option value="pronoun"><?php echo t("zaimek"); ?> ( <?php echo tl("zaimek", "en"); ?> )</option>
                        <option value="conjunction"><?php echo t("spójnik"); ?> ( <?php echo tl("spójnik", "en"); ?> )</option>
                        <option value="interjection"><?php echo t("wykrzyknik"); ?> ( <?php echo tl("wykrzyknik", "en"); ?> )</option>
                        <option value="numeral"><?php echo t("liczebnik"); ?> ( <?php echo tl("liczebnik", "en"); ?> )</option>
                        <option value="particle"><?php echo t("partykuła"); ?> ( <?php echo tl("partykuła", "en"); ?> )</option>
                        <option value="wyrazenie"><?php echo t("wyrażenie"); ?></option>
                        <option value="???">???</option>
                </select><?php
        }else{
            echo      "<textarea id=try rows=1 cols=20 name=try></textarea>";
        }
            echo      "<input id=check type=hidden name=check value='".$testTab[3]."'>"
                    ."</td>"
                    ."<td></td>"
                ."</tr>";
        
echo "<tr><td colspan=3></td><td><input id=btn_sub_01 type=submit name=test value=Odpowiedz></td>";
echo "<td><input id=btn_sub_02 type=submit name=avoid value='Pomiń=>'></td>"
//echo "<tr><td colspan=3></td><td><button id=btn_submit >Sprawdź</button></td>"
    ."</form>"
    ."</table>";

?>
<button id="butt_diak_01" value="ą">ą</button>
<button id="butt_diak_02" value="ć">ć</button>
<button id="butt_diak_03" value="ę">ę</button>
<button id="butt_diak_04" value="ł">ł</button>
<button id="butt_diak_05" value="ń">ń</button>
<button id="butt_diak_06" value="ó">ó</button>
<button id="butt_diak_07" value="ś">ś</button>
<button id="butt_diak_08" value="ź">ź</button>
<button id="butt_diak_09" value="ż">ż</button>
<br>
<button id="butt_diak_10" value="ä">ä</button>
<button id="butt_diak_11" value="å">å</button>
<button id="butt_diak_12" value="ö">ö</button>

<?php
//if(isset($_POST['test']))
//    echo $_POST['test'];
//
//if(isset($_POST['avoid']))
//    echo $_POST['avoid'];
//
//

if(isset($_POST['test'])){      // Wybrana pierwsza opcja (Button)
    
    $patern = '/\.|\?|\!|\_|\\s/';               // uwala "..." i ?
    
    $arr = explode(', ',$_POST['check']);
    
    $str_tr = strtolower(trim($_POST['try']));        // to jest udzielona odp, pozbawiona b.znaków na końcu i początku! A potem do małych liter!
    $try = preg_replace($patern, '', $str_tr);
    
    $wordInArr = false;
    
    for($i=0; $i<count($arr); $i++){
//        echo "<br>try   : ".$try;
//        echo "<br>arr[i]: ".$arr[$i];
        
        $str_ch = (string)$arr[$i];
        $str_ch = strtolower(trim($str_ch));        // to jest udzielona odp, pozbawiona b.znaków na końcu i początku! A potem do małych liter!
        $check = preg_replace($patern, '', $str_ch);
//        echo "<br>Czy jest?:".strcmp($try, $try2);

        if(strcmp($try, $check) == 0){
//            echo "<br>Pasuje!";
            $wordInArr = true;
            
        }else{
//            echo "<br>Nie pasuje!";       
        }
    }
    
    $temp_scor = '';
    if($wordInArr){
        echo "<br>POPRAWNA ODPOWIEDŹ!!!!!";
        $_SESSION['good']++;
        $temp_scor = "OK";
    }else{
        echo "<br>ŻLE - POPRAWNA ODPOWIEDŹ: na pytanie:<br>Podaj ".t($_POST['quest_p1']). " do \"<span class=red>".$_POST['quest_p2']."</span>\". Odpowiedź to:"
        . " <span class=red><b>".$_POST['check']."</b></span><br>, a Twoja odpowiedź: \"".$_POST['try']."\"";
         $_SESSION['bad']++;
         $temp_scor = "błąd";
    }
    
//    echo "<br>ta tablica:";
    $tempArrOfAnsw = array($_POST['quest_p4'],$_POST['quest_p3'],$_POST['quest_p2'],$_POST['quest_p1'],$_POST['check'], $_POST['try'], $temp_scor );
//    array_push($_SESSION['arrOfAnsw'],$tempArrOfAnsw);
    array_unshift($_SESSION['arrOfAnsw'],$tempArrOfAnsw);
//    var_dump($_SESSION['arrOfAnsw']);
    
//    echo "<br>Po tablicy";
    
    unset($_POST['test']);
}      
else if(isset($_POST['avoid'])){
//    echo "<br>JEST AVOID!!!";
    $temp_scor = "BRAK ODPOWIEDZI!!!";
    $tempArrOfAnsw = array($_POST['quest_p4'],$_POST['quest_p3'],$_POST['quest_p2'],$_POST['quest_p1'],$_POST['check'], "-", $temp_scor );
    array_unshift($_SESSION['arrOfAnsw'],$tempArrOfAnsw);
}

if ($_SESSION['good'] != 0 || $_SESSION['bad'] != 0){
    $temp = $_SESSION['good']+$_SESSION['bad'];
    echo    "<br><br>Dobrych odpowiedzi: <span id=good>".$_SESSION['good']."</span> tzn. ".round($_SESSION['good']/$temp*100,2)." %".
            "<br>Złych odpowiedzi: <span id=bad>".$_SESSION['bad']."</span>".
            "<br>Wszystkich odpowiedzi: <span id=all>".$temp."</span>";
}
 if(isset($_SESSION['scoresOfUsr'])){
     echo "<br><br><b>Wcześniejsze wyniki:</b><br>";
     echo "<span class=red>Good: <b>".$_SESSION['scoresOfUsr'][0]."</b></span>/<span class=red>Bad: <b>".$_SESSION['scoresOfUsr'][1]."</b></span>";
 }else{
     echo "<br> NIE MA SESJA SCORE";
 }

$score = new Score();
$score->setScoreData($_SESSION['user'], $_SESSION['good'], $_SESSION['bad']);

?>
<form action="" method="post">
    <input id=clear name="clear" type="submit" value="Clear score">
</form>

<br>
<!--<button onclick="window.location.href='loger.php'">Wyloguj</button>-->

<?php

    // Prezentacja wyników już osiągnietych!
    echo "<h3> Twoje dotychczasowe odpowiedzi: </h3>";

    foreach ($_SESSION['arrOfAnsw'] as $key) {
        echo "<p>";     
//        echo "Pytanie: Do ".trans($key[0])." ( ".$key[1]." ) podaj ".trans($key[2]).", Odp.: <span class=red>\"".$key[3]."\"</span> / Twoja odp: <span class=blue> \"".$key[4]."\"</span>";
        if(trans($key[1])!= 'słowo PL')
            echo "Pytanie: To jest ".trans($key[1])." ( <span class=green>".$key[2]."</span> : <span class=green>".$key[0]."</span>) podaj ".trans($key[3]).", Odp.: \"<span class=red>".$key[4]."</span>\" / Twoja odp: \"<span class=blue>".$key[5]."</span>\" czyli: <b>$key[6]</b>.";
        else
            echo "Pytanie: To jest ".trans($key[1])." ( <span class=green>".$key[2]."</span> ) podaj ".trans($key[3]).", Odp.: \"<span class=red>".$key[4]."</span>\" / Twoja odp: \"<span class=blue>".$key[5]."</span>\" czyli: <b>$key[6]</b>.";
            echo "</p>";
    }

} else {
    require 'loger.php';
}

