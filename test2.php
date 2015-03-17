<?php

/* * **************************************************
 * Project:     ZZZProba
 * Filename:    test2.php
 * Encoding:    UTF-8
 * Created:     2014-06-26
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Test2';
include 'header.php';
include 'buttons.php';

//if($_SESSION['log'] == true && isset($_COOKIE['log'])){
if($_SESSION['log'] == true ){
    
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

$typ_current = '';
$group_ord = '';

if(isset($_POST['group_ord'])){
    if($_POST['group_ord'] == 'clear'){
        $_SESSION['group_ord'] = false;
    }else{
        $_SESSION['typ_cz_mov'] = 'verb';
        $_SESSION['group_ord'] = $_POST['group_ord'];
        
        $typ_current =  $_SESSION['typ_cz_mov'];
        $group_ord =    $_SESSION['group_ord'];
    }
}

//        echo "<br>POST['typ_cz_mov']:".$_POST['typ_cz_mov'];
//        echo "<br>SESSION['typ_cz_mov']:".$_SESSION['typ_cz_mov'];
//        echo "<br>typ_current:".$typ_current;

//if(isset($_POST['group_ord']) && $_POST['group_ord'] == false && $group_ord == false){
if(isset($_SESSION[typ_cz_mov])){
//    echo "<br>NORMAL!";
    $arr = $Word->getQuestionIDsArrByType($_SESSION[typ_cz_mov]);
}else if(isset($_SESSION['group_ord'])){
    $arr = $Word->getQuestionIDsArrByGroup($group_ord);
//    echo "<br>STARKA VERB!";
}else{
//    $arr = $Word->getAllArr();
    $arr = $Word->getQuestionIDsArr();
}

$max = count($arr)-1;
echo "<br>MAX: ".$max;
//$max = $Word->getLastId(false);
$rand_index = mt_rand(0, $max); // wybór słowa
$rand = $arr[$rand_index];

//$max = $Word->getLastId(false);

//$rand =  mt_rand(1, $max); // wybór słowa
//echo "<br>".__LINE__." / Słowo(Rand):".$rand;
//
//$rand = 694;  // For test - fixed ID of word; 

$testTab = $Word->getQuestAndAnswerById($rand);
$wordPL = $Word->getOrdPLById($rand);
//echo "<br>WordPL: ".$wordPL;

echo "<form method=post action='testMOD.php'>";
echo t("Pytania z")." <select name='typ_cz_mov'>";
                        $Word = new Ord();
                        $OrdCat = $Word->getTypesOfOrd();
                        if(isset($_SESSION['typ_cz_mov']) && $_SESSION['typ_cz_mov']!= 'clear'){
                            echo "<option value=''>".t($_SESSION['typ_cz_mov'])."</option>";
                        }
//                            echo "<option value='cl>".t("część mowy")."</option>";
                            echo "<option value='clear'>".t("wyczyść")."</option>";
                        foreach($OrdCat as $k){
                            if(strlen(t($k)) > 14 || strlen(tl($k, "en")) > 14)
                                echo "<option value=$k>".substr(t($k),0,14)." ( ".substr(tl($k,"en"),0,14)." ) </option>";
                            else
                                echo "<option value=$k>".t($k)." ( ".tl($k,"en")." )</option>";
                        }   
            echo "</select>";
            echo "<input type=submit value='".t("Wyślij")."'>";
echo "</form>";

echo "<form method=post action='testMOD.php'>";
 echo t("Czasowniki z grupy")." <select name='group_ord'>";
                        $Word = new Ord();
                        $OrdGroup = $Word->getOrdByGroup();
                        if(isset($_SESSION['group_ord']) && $_SESSION['group_ord']!= 'clear'){
                            echo "<option value=''>".t($_SESSION['group_ord'])."</option>";
                        }
                            echo "<option value='clear'>".t("wyczyść")."</option>";
                        foreach($OrdGroup as $k){
                           echo "<option value=$k>".substr(t($k),0,8)."</option>";
                        }   
            echo "</select>";
            echo "<input type=submit value='".t("Wyślij")."'>";
echo "</form>";

$method = 'post';

echo "<table class=tab_insert>"
   . "<form id=testForm1 action=test2.php method=".$method.">";
echo "<tr>"
                ."<td>".t("To jest")." ".t(trans($testTab[0]))."</td>"
                .'<td><textarea rows=1 cols=20 name="'.$testTab[0].'" disabled>'.$testTab[1].'</textarea></td>';
        echo    "<td>".t("Podaj")." ".t(trans($testTab[2]))."</td>"
                ."<td>"
                . "<input type=hidden name=quest_p1 value='".$testTab[2]."'>"       // pytanie
                . "<input type=hidden name=quest_p2 value='".$testTab[1]."'>"       // słowo
                . "<input type=hidden name=quest_p3 value='".$testTab[0]."'>"       // to jest.. 
                . "<input type=hidden name=quest_p4 value='".$wordPL."'>";          // słowo PL
        if ($testTab[2] == "typ"){
            echo "<select name='try'>";
                        $Word = new Ord();
                        $OrdCat = $Word->getTypesOfOrd();
                            echo "<option>".t("część mowy")."</option>";
                        foreach($OrdCat as $k){
                            if(strlen(t($k)) > 14 || strlen(tl($k, "en")) > 14)
                                echo "<option value=$k>".substr(t($k),0,14)." ( ".substr(tl($k,"en"),0,14)." ) </option>";
                            else
                                echo "<option value=$k>".t($k)." ( ".tl($k,"en")." )</option>";
                        }   
            echo "</select>";
        }else{
            echo      "<textarea id=try rows=1 cols=20 name=try></textarea>";
        }
            echo      "<input id=check type=hidden name=check value='".$testTab[3]."'>"
                    ."</td>"
                    ."<td></td>"
                ."</tr>";
        
echo "<tr><td colspan=3></td><td><input id=btn_sub_01 type=submit name=test value=".t('Odpowiedz')."></td>";
echo "<td><input id=btn_sub_02 type=submit name=avoid value='".t('Pomiń')." =>'></td>" 
//echo "<tr><td colspan=3></td><td><button id=btn_submit >Sprawdź</button></td>"
    ."</form>"
    ."</table>";

?>
<button class="butt_diak" id="butt_diak_01" value="ą">ą</button>
<button class="butt_diak" id="butt_diak_02" value="ć">ć</button>
<button class="butt_diak" id="butt_diak_03" value="ę">ę</button>
<button class="butt_diak" id="butt_diak_04" value="ł">ł</button>
<button class="butt_diak" id="butt_diak_05" value="ń">ń</button>
<button class="butt_diak" id="butt_diak_06" value="ó">ó</button>
<button class="butt_diak" id="butt_diak_07" value="ś">ś</button>
<button class="butt_diak" id="butt_diak_08" value="ź">ź</button>
<button class="butt_diak" id="butt_diak_09" value="ż">ż</button>
<br>
<button class="butt_diak" id="butt_diak_10" value="ä">ä</button>
<button class="butt_diak" id="butt_diak_11" value="å">å</button>
<button class="butt_diak" id="butt_diak_12" value="ö">ö</button>
<button class="butt_diak" id="butt_diak_13" value="é">é</button>

<?php

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
        echo "<br>".t('POPRAWNA ODPOWIEDŹ')."!!!!!";
        $_SESSION['good']++;
        $temp_scor = "OK"; 
    }else{
        echo "<br>".t('ŻLE')." - ".t('POPRAWNA ODPOWIEDŹ').": ".t('na pytanie').":<br>".t('Podaj')." ".t($_POST['quest_p1']). " ".t('do')." \"<span class=red>".$_POST['quest_p2']."</span>\". ".t('Odpowiedź to').":"
        . " <span class=red><b>".$_POST['check']."</b></span><br>, ".t('a Twoja odpowiedź').": \"".$_POST['try']."\"";
         $_SESSION['bad']++;
         $temp_scor = t("błąd");
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
    $temp_scor = t("BRAK ODPOWIEDZI")."!!!";
    $tempArrOfAnsw = array($_POST['quest_p4'],$_POST['quest_p3'],$_POST['quest_p2'],$_POST['quest_p1'],$_POST['check'], "-", $temp_scor );
    array_unshift($_SESSION['arrOfAnsw'],$tempArrOfAnsw);
}

if ($_SESSION['good'] != 0 || $_SESSION['bad'] != 0){
    $temp = $_SESSION['good']+$_SESSION['bad'];
    echo    "<br><br>".t('Dobrych odpowiedzi').": <span id=good>".$_SESSION['good']."</span> ".t('tzn')." ".round($_SESSION['good']/$temp*100,2)." %".
            "<br>".t('Złych odpowiedzi').": <span id=bad>".$_SESSION['bad']."</span>".
            "<br>".t('Wszystkich odpowiedzi').": <span id=all>".$temp."</span>";
}
 if(isset($_SESSION['scoresOfUsr'])){
     echo "<br><br><b>".t('Wcześniejsze wyniki').":</b><br>";
     echo "<span class=red>".t('Dobre').": <b>".$_SESSION['scoresOfUsr'][0]."</b></span>/<span class=red>".t('Złe').": <b>".$_SESSION['scoresOfUsr'][1]."</b> = ".round(100*$_SESSION['scoresOfUsr'][0]/($_SESSION['scoresOfUsr'][0]+$_SESSION['scoresOfUsr'][1]),2)."% ".t('dobrych odpowiedzi').".</span>";
 }else{
     echo "<br> ".t('NIE MA SESJA SCORE')."";
 }

$score = new Score();
$score->setScoreData($_SESSION['user'], $_SESSION['good'], $_SESSION['bad']);

?>
<form action="" method="post">
    <input id=clear name="clear" type="submit" value="<?php echo t('Clear score') ?>">
</form>

<!--<button onclick="window.location.href='loger.php'">Wyloguj</button>-->

<?php
// ".t('')."
    // Prezentacja wyników już osiągnietych!
    echo "<h3> ".t('Twoje dotychczasowe odpowiedzi').": </h3>";

    foreach ($_SESSION['arrOfAnsw'] as $key) {
        echo "<p>";     
//        echo "Pytanie: Do ".trans($key[0])." ( ".$key[1]." ) podaj ".trans($key[2]).", Odp.: <span class=red>\"".$key[3]."\"</span> / Twoja odp: <span class=blue> \"".$key[4]."\"</span>";
        if(trans($key[1])!= 'słowo PL')
            echo t('Pytanie').": ".t('To jest')." ".t(trans($key[1]))." ( <span class=green>".$key[2]."</span> : <span class=green>".$key[0]."</span>) ".t('podaj')." ".t(trans($key[3])).", ".t('Odp.').": \"<span class=red>".$key[4]."</span>\" / ".t('Twoja odp').": \"<span class=blue>".$key[5]."</span>\" ".t('czyli').": <b>$key[6]</b>.";
        else
            echo t('Pytanie').": ".t('To jest')." ".t(trans($key[1]))." ( <span class=green>".$key[2]."</span> ) ".t('podaj')." ".t(trans($key[3])).", ".t('Odp.').": \"<span class=red>".$key[4]."</span>\" / ".t('Twoja odp').": \"<span class=blue>".$key[5]."</span>\" ".t('czyli').": <b>$key[6]</b>.";
            echo "</p>";
    }

} else {
    require 'loger.php';
}

