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
$title = 'Svenska';
include 'header.php';
include 'buttons.php';
?>
    <script>
//        $(document).ready(function(){
//            $("#but1").click(function(){
//            var a = $("#in1").val();
//            alert (a);
//            $.ajax({
//                'action':   'try',
//                'type':     'GET',
//                'url':      'next1.php',
//                'data':     {
//                                'text': "ala"
//                            },
//                success:    function(data){
//                                if(data == 0) alert ("Error ajax");
//                            
//                            else{
//                                alert("else"+data)
//                            }
//                        }
//            });
//  });
//});
//
//function one() {
//    $('#p1').html("OK");
//}
//function two() {
//    $('#p1').html("NO POST");
//}
//function three() {
//    $('#p1').html("NO text");
//}
//$(body).onload(function(){
//    $("#czasownik").hide();
//    $("#rzeczownik").hide();
//});

function start(){
    $("#czasownik").hide();
    $("#rzeczownik").hide();
    $("#przymiotnik").hide();
}

$(document).ready(function(){
//    $("#typ").change(function(){
    $("#typ").change(function(){
        var val = $(this).val();
//        alert(val);
        switch (val){
            case 'preposition':
            case 'noun':
                $("#czasownik").hide();
                $("#rzeczownik").show();
                $("#przymiotnik").hide();
                break;
            case 'verb':
                $("#czasownik").show();
                $("#rzeczownik").hide();
                $("#przymiotnik").hide();
                break;
            case 'adjective':
                $("#czasownik").hide();
                $("#rzeczownik").hide();
                $("#przymiotnik").show();
                break;
            case 'conjunction':
            case 'adverb':
                $("#czasownik").hide();
                $("#rzeczownik").hide();
                $("#przymiotnik").hide();
                break;
                
            default:
                $("#czasownik").show();
                $("#rzeczownik").show();
                $("#przymiotnik").show();
                break
    }
    });    
});

    </script>

<body onload='start();'>
    <form id='form1' action='index.php' method="POST">
        <table>
        <tbody id='podstawowe'>
            <tr>
                <td><b>Podstawowe</b></td>
                <td colspan='7'></td>
            </tr>
            <tr>
            <tr>
                <td>polski</td>
                <td><input id='in1' name='id_ord'></td>
                <td>typ</td>
                <td>
                    <!--<input id='in1' name='typ'>-->
                    <select id=typ name='typ'>
                        <option >część mowy</option>
                        <option value="noun">rzeczownik</option>
                        <option value="verb">czasownik</option>
                        <option value="adjective">przymiotnik</option>
                        <option value="adverb">przysłówek</option>
                        <option value="preposition">przyimek</option>
                        <option value="pronoun">zaimek</option>
                        <option value="conjunction">spójnik</option>
                        <option value="wyrazenie">wyrażenie</option>
                    </select>
                </td>
                <td>rodzaj</td>
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
                <td>szwedzki</td>
                <td><input id='in1' name='trans'></td>
            </tr>
            </tbody>
            <tbody id='czasownik' >
<!--            <div id='czasownik'>-->
            <tr>
                <td><b>Czasownik</b></td>
                <td colspan='7'></td>
            </tr>
            <tr>
                <td>infinitive</td>
                <td><input id='in1' name='infinitive'></td>
                <td>presens</td>
                <td><input id='in1' name='presens'></td>
                <td>preterite</td>
                <td><input id='in1' name='past'></td>
                <td>supine</td>
                <td><input id='in1' name='supine'></td>
            </tr>
            <tr>
                <td>imperative</td>
                <td><input id='in1' name='imperative'></td>
                <td>present_participle</td>
                <td><input id='in1' name='present_participle'></td>
                <td>past_participle</td>
                <td><input id='in1' name='past_participle'></td>
                <td colspan='2'></td>
            </tr>
            </div>
            </tbody>
            <tbody id='rzeczownik' >
            <!--<div id='rzeczownik'>-->
            <tr>
                <td><b>Rzeczownik</b></td>
                <td colspan='7'></td>
            </tr>
            <tr>
                <td>S_indefinite</td>
                <td><input id='in1' name='S_indefinite'></td>
                <td>S_definite</td>
                <td><input id='in1' name='S_definite'></td>
                <td>P_indefinite</td>
                <td><input id='in1' name='P_indefinite'></td>
                <td>P_definite</td>
                <td><input id='in1' name='P_definite'></td>
            </tr>
            </tbody>
            <tbody id='przymiotnik'>
            <tr>
                <td><b>przymiotnik</b></td>
                <td colspan='7'></td>
            </tr>
            <tr>
                <td>st wyższy</td>
                <td><input id='in1' name='st_wyzszy'></td>
                <td>st najwyższy</td>
                <td><input id='in1' name='st_najwyzszy'></td>
                <td colspan='4'></td>
            </tr>
            <tbody id='inne'>
<!--            </div>-->
            <tr>
                <td><b>inne</b></td>
                <td colspan='7'></td>
            </tr>
            <tr>
                <td>wymowa</td>
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
        $st_wyzszy =            $_POST['st_wyzszy'];
        $st_najwyzszy =         $_POST['st_najwyzszy'];
        $wymowa =               $_POST['wymowa'];

        ?><script>//one();</script><?php
//        echo "<br>OTO text: ".$id_ord;
        
        $Word = new Ord();
//        echo "<br>id of a: ".$Word->getId($id_ord);
//        echo "<br>Last index: ".$Word->getLastId();
        $Word->setData($id_ord, $typ, $rodzaj, $trans, $infinitive,$presens, 
                            $past, $supine, $imperative, $present_participle, 
                            $past_participle, $S_indefinite, $S_definite, $P_indefinite, $P_definite, 
                            $st_wyzszy, $st_najwyzszy,
                            $wymowa);
    } 

}else{
    echo "<br>NO POST<br>";

    ?><script>//two();</script><?php
}

?>
</body>
</html>