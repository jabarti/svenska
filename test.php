<?php

/* * **************************************************
 * Project:     ZZZProba
 * Filename:    test.php
 * Encoding:    UTF-8
 * Created:     2014-06-26
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
require_once "common.inc.php";
include 'DB_Connection.php';
$title = 'Test';
include 'header.php';
//include '../Translations/flag.php';
include 'buttons.php';

if(isset($_SESSION['log'])){
    if($_SESSION['log'] == true){
        echo "<br>Zalogowany jako: ".$_SESSION['user'];//." z hasłem: ". $_SESSION['password'];
    }else{
        echo "<br>NIE ZALOGOWANY";
    }
}

$user = new User("ala", "ala");

//if(true){
if($_SESSION['log'] == true ){

 if(!isset($_SESSION['good']) && !isset($_SESSION['bad'])){
 $_SESSION['good']=0;
 $_SESSION['bad']=0;
 }else{
     if(isset($_POST['clear'])){
         echo "<br>isset clear";
          $_SESSION['good']=0;
          $_SESSION['bad']=0;
     }
 }
 
$score_good = 0;
$score_bad = 0;
$score_err = 0;

if($Word = new Ord()){
//    echo "<br>OK";
}else{
    echo "<br>NOT OK";
}

$max = $Word->getLastId();

function t($var){
    switch($var){
        case 'id_ord':
            return "słowo PL";
            break;
        case 'typ':
            return "typ";
            break;
        case 'trans':
            return "słowo SE";
            break;
        case 'rodzaj':
            return "rodzajnik";
            break;
        case 'infinitive':
            return "bezokolicznik";
            break;
        case 'presens':
            return "cz.teraźniejszy";
            break;
        case 'past':
            return "cz.przeszły";
            break;
        case 'supine':
            return "supine(perfect), dokonany";
            break;
        case 'imperative':
            return "tryb rozkazujący";
            break;
        case 'present_participle':
            return "imiesłów czynny(teraźniejszy)";
            break;
        case 'past_participle':
            return "imiesłów bierny(przeszły)";
            break;
        case 'S_indefinite':
            return "l.pojedyncza, r.nieokreślony";
            break;
        case 'S_definite':
            return "l.pojedyncza, r.określony";
            break;
        case 'P_indefinite':
            return "l.mnoga, r.nieokreślony";
            break;
        case 'P_definite':
            return "l.mnoga, r.określony";
            break;
        case 'neuter':
            return "rodzaj neutralny";
            break;
        case 'masculin':
            return "rodzaj męski";
            break;
        case 'plural':
            return "rodzaj ogólny, l.mnoga";
            break;
        case 'st_rowny':
            return "stopień rowny";
            break;
        case 'st_wyzszy':
            return "stopień wyższy";
            break;
        case 'st_najwyzszy':
            return "stopień najwyższy";
            break;
        
        default:
            return "Brak słowa '".$var."' w słowniku!!!";
            break;
    }
}

$rand =  mt_rand(1, $max); // wybór słowa

$testTab = $Word->getQuestAndAnswerById($rand);

$method = 'post';


echo "<table>"
   . "<form id=testForm1 action=test.php method=".$method.">";
echo "<tr>"
                ."<td>To jest ".t($testTab[0])."</td>"
                .'<td><textarea disabled rows=1 cols=20 name="'.$testTab[0].' disabled">'.$testTab[1].'</textarea></td>';
        echo    "<td>Podaj ".t($testTab[2])."</td>"
                ."<td>"
                . "<input type=hidden name=quest_p1 value='".$testTab[2]."'>"
                . "<input type=hidden name=quest_p2 value='".$testTab[1]."'>"
                . "<textarea id=try rows=1 cols=20 name=try></textarea>"
                . "<input id=check type=hidden name=check value='".$testTab[3]."'>"
                ."</td>"
            ."</tr>";

//echo "<tr><td>Twoja odpowiedź:</td><td><textarea rows=2 cols=30 name=try>Podaj odpowiedź</textarea></td></tr>";

echo "<tr><td colspan=3></td><td><input id=btn_sub_01 type=submit name=test value=Sprawdź></td>"
//echo "<tr><td colspan=3></td><td><button id=btn_submit >Sprawdź</button></td>"
    ."</form>"
    ."</table>";

?><script>
    var good=0;
    var bad=0;
    
//    $(document).ready(function(){
//        $('#btn_sub_01').click(function(){
//            $('#tr_scor').append("<tr id='tr'><td>Ala</td><td>Vala</td></tr>");
//        })
//    });
    
    $(document).ready(function(){
        $("#btn_submit").click(function(){
//            $("#testForm").submit(function(){
                var check = $("#check").val();
                var traj = $("#try").val();
                alert(check+"/"+traj);
                if(check == traj){
                    good++;
                }else{
                    bad++;
                };
                 alert("good: "+good+"bad: "+bad);
                all = good+bad;
                $("#good").html(good);
                $("#bad").html(bad);
                $("#all").html(all);
                
//                location.reload();
//            });
        });
        $("#btn_end").click(function(){
            alert("END");
            $.ajax({
                type     : "POST",
                url      : "test.php",
                data     : {
                            ending : 'Marcin'
                },
                success : function(msg) {
                        //ten fragment wykona się po POMYŚLNYM zakończeniu połączenia
                        //msg zawiera dane zwrócone z serwera
//                        alert("success: "+msg);
                },
                complete : function(r) {
                        //ten fragment wykona się po ZAKONCZENIU połączenia
                        //"r" to przykładowa nazwa zmiennej, która zawiera dane zwrócone z serwera
                        alert("complete: "+r);
                },
                error:    function(error) {
                        //ten fragment wykona się w przypadku BŁĘDU
                        alert("ERROR: "+error);
                }
            });
        });
    });
</script><?php
if(isset($_POST['test'])){
//    echo "<br> JEST POST?GET";
    
//    foreach ($_POST as $k => $v){
//        echo "<br>k=".$k.", v=".$v;
//    }
    
    $arr = explode(', ',$_POST['check']);
    $try = $_POST['try'];
    
    $wordInArr = false;
    
    for($i=0; $i<count($arr); $i++){
//        echo "<br>try   : ".$try;
//        echo "<br>arr[i]: ".$arr[$i];
        
        $try2 = (string)$arr[$i];
        
//        echo "<br>Czy jest?:".strcmp($try, $try2);

        if(strcmp($try, $try2) == 0){
//            echo "<br>Pasuje!";
            $wordInArr = true;
            
        }else{
//            echo "<br>Nie pasuje!";
           
        }
    }
    
//    if($_POST['try'] == $_POST['check']){
    
//    foreach ($_POST as $k => $v){
//        echo "<br>Oto klucz: ".$k." => ". $v;
//    }
    
    if($wordInArr){
        echo "<br>POPRAWNA ODPOWIEDŹ!!!!!";
        $_SESSION['good']++;
    }else{
        echo "<br>ŻLE - POPRAWNA ODPOWIEDŹ: na pytanie:<br>Podaj ".t($_POST['quest_p1']). " do \"<span class=red>".$_POST['quest_p2']."</span>\". Odpowiedź to:"
        . " <span class=red><b>".$_POST['check']."</b></span><br>, a Twoja odpowiedź: \"".$_POST['try']."\"";
         $_SESSION['bad']++;
    }
    
    unset($_POST['test']);
}      
    
    

else{
//    echo "<br>NIE JEST POST?GET";
}
$temp = $_SESSION['good']+$_SESSION['bad'];
echo "<br><br>Dobrych odpowiedzi: <span id=good>".$_SESSION['good']."</span> tzn. ".round($_SESSION['good']/$temp*100,2)." %".
     "<br>Złych odpowiedzi: <span id=bad>".$_SESSION['bad']."</span>".
     "<br>Wszystkich odpowiedzi: <span id=all>".$temp."</span>";

//if(isset($_POST)){
//    echo "<br>Z post:";
//    var_dump($_POST);
//    $ending = $_POST['ending'];
//    echo $ending;
//}

//while (!$_POST['ending']){
//    echo "1, ";
//}

//echo "<br>SESS ala: ".$_SESSION['ala'];
//$_SESSION['test'] +=1;

//echo "<br>_SESSION['test']".$_SESSION['test'];

?>
<form action="" method="post">
    <input name="clear" type="submit" value="Clear score">
</form>

<br>
<button onclick="window.location.href='loger.php'">Wyloguj</button>
<!--
<table>
    <tr id = "tr_scor">
        <th>Dobre</th>
        <th>Złe</th>
    </tr>
    <tr id="tr">
        <td>Ala</td>
        <td>VAla</td>
    </tr>
</table>-->
<?php

} else {
    require 'loger.php';
}

