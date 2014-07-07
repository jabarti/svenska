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

$score_good = 0;
$score_bad = 0;
$score_err = 0;

if($Word = new Ord()){
//    echo "<br>OK";
}else{
    echo "<br>NOT OK";
}
//    $Word = new Ord();
//    echo "Word:".$Word;

//echo "<br>id of a: ".$Word->getId($id_ord);
//echo "<br>Last index: ".$Word->getLastId();
$max = $Word->getLastId();
//echo "<br>MAX: ".$max;
?><script>//alert("Ala");</script><?php
//$noun = array('$id_ord, $typ, $rodzaj, $trans, $S_indefinite, $S_definite, $P_indefinite, $P_definite');
//$verb = array('$id_ord, $typ, $trans, $infinitive, $presens,$past, $supine, $imperative, $present_participle, $past_participle');
//
function t($var){
    switch($var){
        case 'id_ord':
            return "słowo PL";
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
//$ord = array('$id_ord, $typ, $rodzaj, $trans, $infinitive, $presens,$past, 
//                            $supine, $imperative, $present_participle, $past_participle, 
//                            $S_indefinite, $S_definite, $P_indefinite, $P_definite, $st_wyzszy, 
//                            $st_najwyzszy, $wymowa');

$rand =  mt_rand(1, $max); // wybór słowa
$rand3 =  mt_rand(1, 2); // pl or sw


echo "<br>ID: ".$rand;

echo "<br>"; 
$row = $Word->getOrdById($rand);

//$rand4 = array_rand($row,1);
//echo "<br>arr rand: ".$rand4;

//print_r($row);
echo "<br>TYP: ".$row['typ'];

$x = array(2,3,4,6,7,8,9,10,11,12,13,14,15,16,17,18);
$noun = array(2,4,13,14,15,16);
$verb = array(2,6,7,8,9,10,11,12);
$adjective = array(2,5,17,18);
$adverb = array(2,5);

switch($row['typ']){
//    1                     2                   3                   4               5
//    '$id.                 $id_ord,            $typ,               $rodzaj,        $trans, 
//    6                     7                   8                   9               10
//    $infinitive,          $presens,           $past,              $supine,        $imperative,
//    11                    12                  13                  14              15 
//    $present_participle,  $past_participle,   $S_indefinite,      $S_definite,    $P_indefinite, 
//    16                    17                  18                  19
//    $P_definite,          $st_wyzszy,         $st_najwyzszy,      $wymowa'

    
    case 'noun':
        $tab = $noun;
        $rand_qu = 0;
        $rand_an = 0;
//        print_r($tab);
        
        $i=0;
        while($rand_qu == 0 || $rand_qu==1 || $tab[$rand_qu] == ''){
//            echo "<br>1)rand_qu=".$rand_qu;
            $rand_qu = array_rand($tab, 1);
//            echo "<br>2)rand_qu=".$rand_qu;
            $i++;
            if($i==10){
                $rand_qu=2;
                break;
            }
        }
//        echo "<br>Qu nr(".$rand_qu."):".$tab[$rand_qu];

        $quest = $tab[$rand_qu]; // nr kolumny w $row[]
        
        $i=0;
        while($rand_an == 0 || $rand_an==$rand_qu || $tab[$rand_an] == ''){
//            echo "<br>rand_an=".$rand_an;
            $rand_an = array_rand($tab, 1);
            $i++;
            if($i==10){
                $rand_an=5;
                break;
            }
        }

        echo "<br>An nr(".$rand_an."):".$tab[$rand_an];
        $answ = $tab[$rand_an]; // nr kolumny w $row[]

        break;
        
    case 'verb':
        $tab = $verb;
        $rand_qu = 0;
        $rand_an = 0;
//        print_r($tab);
        
        $i=0;
        while($rand_qu == 0 || $rand_qu==1 || $tab[$rand_qu] == ''){
//            echo "<br>rand_qu=".$rand_qu;
//            echo "<br>tab[rand_qu]=".$tab[$rand_qu];
            $rand_qu = array_rand($tab, 1);
            $i++;
            if($i==10){
                $rand_qu=2;
                break;
            }
        }
        echo "<br>Qu nr(".$rand_qu."):".$tab[$rand_qu];
        $quest = $tab[$rand_qu]; // nr kolumny w $row[]
        
        $i=0;
        while($rand_an == 0 || $rand_an==$rand_qu || $tab[$rand_an] == ''){
//            echo "<br>rand_an=".$rand_an;
            $rand_an = array_rand($tab, 1);
            $i++;
            if($i==10){
                $rand_an=5;
                break;
            }
        }

        echo "<br>An nr(".$rand_an."):".$tab[$rand_an];
        $answ = $tab[$rand_an]; // nr kolumny w $row[]

        break;
        
    case 'adjective':
        $tab = $adjective;
        $rand_qu = 0;
        $rand_an = 0;
//        print_r($tab);
        
        $i=0;
        while($rand_qu == 0 || $rand_qu==1 || $tab[$rand_qu] == ''){
//            echo "<br>rand_qu=".$rand_qu;
            $rand_qu = array_rand($tab, 1);
            $i++;
            if($i==10){
                $rand_qu=2;
                break;
            }
        }
        echo "<br>Qu nr(".$rand_qu."):".$tab[$rand_qu];
        $quest = $tab[$rand_qu]; // nr kolumny w $row[]
        
        $i=0;
        while($rand_an == 0 || $rand_an==$rand_qu || $tab[$rand_an] == ''){
//            echo "<br>rand_an=".$rand_an;
            $rand_an = array_rand($tab, 1);
            $i++;
            if($i==10){
                $rand_an=5;
                break;
            }
        }

        echo "<br>An nr(".$rand_an."):".$tab[$rand_an];
        $answ = $tab[$rand_an]; // nr kolumny w $row[]

        break;
        
    case 'conjunction':
    case 'adverb':
        $tab = $adverb;
        $rand_qu = 0;
        $rand_an = 0;
        print_r($tab);

//        echo "<br>rand_qu=".$rand_qu;
        $rand_qu = array_rand($tab, 1);

        echo "<br>Qu nr(".$rand_qu."):".$tab[$rand_qu];
        $quest = $tab[$rand_qu]; // nr kolumny w $row[]
        
//        echo "<br>rand_an=".$rand_an;
        $rand_an = array_rand($tab, 1);

        echo "<br>An nr(".$rand_an."):".$tab[$rand_an];
        $answ = $tab[$rand_an]; // nr kolumny w $row[]

        break;

    default:
        $tab = $x;
        $rand_qu = 0;
        $rand_an = 0;
//        print_r($tab);
        
        $i=0;
        while($rand_qu == 0 || $rand_qu==4 || $tab[$rand_qu] == ''){
//            echo "<br>rand_qu=".$rand_qu;
            $rand_qu = array_rand($tab, 1);
            $i++;
            if($i==10){
                $rand_qu=2;
                break;
            }
        }
        echo "<br>Qu nr(".$rand_qu."):".$tab[$rand_qu];
        $quest = $tab[$rand_qu]; // nr kolumny w $row[]
        
        $i=0;
        while($rand_an == 0 || $rand_an==$rand_qu || $tab[$rand_an] == ''){
            echo "<br>rand_an=".$rand_an;
            $rand_an = array_rand($tab, 1);
            $i++;
            if($i==10){
                $rand_an=5;
                break;
            }
        }

        echo "<br>An nr(".$rand_an."):".$tab[$rand_an];
        $answ = $tab[$rand_an]; // nr kolumny w $row[]
        break;
}


$method = 'post';

echo "<table>"
//   . "<form id=testForm action=test.php method=".$method.">";
//   . "<form id=testForm action='' method=".$method.">";
   ;
$rowId=1;
foreach($row as $k=>$v){
    if($rowId == $quest){
//        echo "<h1>$v</h1>";
        if($v == ''){
//            echo "<h1>PUSTY</h1>";
//            session_regenerate_id(true);
            session_write_close();
            header('Location: '.$_SERVER['PHP_SELF']); 
//            exit();
        }
        echo "<tr id='".$rowId."' >"
                ."<td>To jest ".t($k)."</td>"
                ."<td><textarea rows=1 cols=20 name='".$k."'>".$v."</textarea></td>";
    }
    $rowId++;
}
$rowId=1;

foreach($row as $k=>$v){    
    if($rowId == $answ){
        if($v == ''){
//            echo "<h1>PUSTY</h1>";
//            session_regenerate_id(true);
            session_write_close();
            header('Location: '.$_SERVER['PHP_SELF']); 
//            exit();
        }
        echo    "<td>Podaj ".t($k)."</td>"
                ."<td>"
                . "<textarea id=try rows=1 cols=20 name=try></textarea>"
                . "<input id=check type=hidden name=check value='".$v."'>"
                ."</td>"
            ."</tr>";
    }
    $rowId++;
}

//echo "<tr><td>Twoja odpowiedź:</td><td><textarea rows=2 cols=30 name=try>Podaj odpowiedź</textarea></td></tr>";

//echo "<tr><td colspan=3></td><td><input type=submit name=test value=Sprawdź></td>"
echo "<tr><td colspan=3></td><td><button id=btn_submit >Sprawdź</button></td>"
//    ."</form>"
    ."</table>";
echo "<button id=btn_end name=btn_end form=testForm >Zakończ</button>";
?><script>
    var good=0;
    var bad=0;
    
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
//if(isset($_POST['test'])){
////    echo "<br> JEST POST?GET";
//    
//    foreach ($_POST as $k => $v){
////        echo "<br>k=".$k.", v=".$v;
//    }
//    
//    if($_POST['try'] == $_POST['check']){
//        echo "<br>POPRAWNA ODPOWIEDŹ!!!!!";
//    }else{
//        echo "<br>ŻLE - POPRAWNA ODPOWIEDŹ: ".$_POST['check'].", a Twoja odpowiedź: \"".$_POST['try']."\"";
//    }
//        
//    
//    unset($_POST['test']);
//    unset($_POST['test']);
//}else{
////    echo "<br>NIE JEST POST?GET";
//}
//$temp = $_SESSION['good']+$_SESSION['bad'];
echo "<br>Dobrych odpowiedzi: <span id=good>"."</span>".
     "<br>Złych odpowiedzi: <span id=bad>"."</span>".
     "<br>Wszystkich odpowiedzi: <span id=all>"."</span>";

if(isset($_POST)){
    echo "<br>Z post:";
    var_dump($_POST);
    $ending = $_POST['ending'];
    echo $ending;
}

//while (!$_POST['ending']){
//    echo "1, ";
//}

//echo "<br>SESS ala: ".$_SESSION['ala'];
//$_SESSION['test'] +=1;

//echo "<br>_SESSION['test']".$_SESSION['test'];

