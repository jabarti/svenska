/****************************************************
 * Project:     Svenska
 * Filename:    functions.js
 * Encoding:    UTF-8
 * Created:     2014-07-23
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
// COMON - zegar do logowania!!!
var licz = true;

function getTime() 
{
    return (new Date()).toLocaleTimeString();
}

function logTime(){
    var log_tim_took = document.getElementById("log_time").innerHTML;
    a = parseInt(log_tim_took *1000);
    var log_tim = new Date(a);
    var log_tim2 = new Date(log_tim) ;
    log_tim2.setHours(log_tim.getHours()-1);
    log_tim2.setSeconds(log_tim.getSeconds()-8);
    
    pres = new Date();
    
    rozn_dat = log_tim2 - pres;
    
    rozn = new Date(rozn_dat);
    rozn_str = new Date(rozn).toLocaleTimeString();
    
    hou = rozn.getHours();
    min = rozn.getMinutes();
    sec = rozn.getSeconds();
    
    if (hou>22 || (hou==0 && min == 0 && sec==0)){
        window.location.href = "loger.php"
    }    
    
    if (hou==0 && min == 0 && sec<10){
        return("<br>zostało:     <span class=red><b>"+ rozn_str+"</b></span>");
    }else{
        return("<br>zostało:     "+ rozn_str);
    }
}
 
//wywołanie ma na celu eliminację opóźnienia sekundowego
document.getElementById('zegar').innerHTML =     "<br>obecny czas: "+getTime();
document.getElementById('zegar_log').innerHTML = "do wylogowania "+logTime();
 
setInterval(function() {
// logTime();
    document.getElementById('zegar').innerHTML =     "<br>obecny czas: "+getTime();
    document.getElementById('zegar_log').innerHTML = "do wylogowania  "+logTime();
     
}, 1000);
// INDEX.php
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
    $("#stopniowanie").hide();
    $("#zaimek").hide();
}

$(document).ready(function(){
//    $("#typ").change(function(){
    $("#typ").change(function(){
        var val = $(this).val();
//        alert(val);
        $("#ang_cz_m").html(val); // przypisanie tego czerwonego tlumaczenia nazwy części mowy
        
        // Wyświetlanie odpowiednich fragmentów tabeli
        switch (val){
            case 'preposition':
            case 'noun':
                $("#czasownik").hide();
                $("#rzeczownik").show();
                $("#przymiotnik").hide();
                $("#stopniowanie").hide();
                $("#zaimek").hide();
                break;
  
            case 'hjalp_verb':
            case 'verb':
                $("#czasownik").show();
                $("#rzeczownik").hide();
                $("#przymiotnik").hide();
                $("#stopniowanie").hide();
                $("#zaimek").hide();
                break;
                
            case 'adjective':       // przymiotnik
                $("#czasownik").hide();
                $("#rzeczownik").hide();
                $("#przymiotnik").show();
                $("#stopniowanie").show();
                $("#zaimek").hide();
                break;
                
            case 'wyrazenie':    
            case 'interjection':
            case 'conjunction':
                $("#czasownik").hide();
                $("#rzeczownik").hide();
                $("#przymiotnik").hide();
                $("#stopniowanie").hide();
                $("#zaimek").hide();
                break
                
            case 'adverb':
                $("#czasownik").hide();
                $("#rzeczownik").hide();
                $("#przymiotnik").hide();
                $("#stopniowanie").show();
                $("#podstawowe").addClass("nobordbottom");
                $("#zaimek").hide();
                break;
                
            case 'pronoun':
                $("#czasownik").hide();
                $("#rzeczownik").hide();
                $("#przymiotnik").hide();
                $("#stopniowanie").hide();
                $("#zaimek").show();
                break;
                
            case'numeral':
                $("#czasownik").show();
                $("#rzeczownik").show();
                $("#przymiotnik").show();
                $("#stopniowanie").show();
                $("#zaimek").show();
                break;
                
            default:
                $("#czasownik").show();
                $("#rzeczownik").show();
                $("#przymiotnik").show();
                $("#stopniowanie").show();
                $("#zaimek").show();
                break;
        }
        // Tu ustalamy tylko opisy do cz.mowy
        switch(val){
            case 'preposition':     // przyimki
                $('#coto').empty();
                $('#coto').append("informują o stosunkach między przedmiotami, łącząc części zdania o <u>niejednakowej</u> funkcji składniowej. (gdzie? kiedy?), <br>np: Jedziemy <span class=red><b>w</b></span> grudniu.");
                break;
                
            case 'noun':            // rzeczownik
                $('#coto').empty();
                $('#coto').append("nazywają osoby i przedmioty (kto? co?)");
                break;
  
            case 'hjalp_verb':
                $('#coto').empty();
                $('#coto').append("jest to cz.mowy mówiąca o...hjalp verb");
                break;
                
            case 'verb':        // czasownik
                $('#coto').empty();
                $('#coto').append("informują o czynnościach, stanach i zjawiskach (co robi? co się z nim dzieje?)");
                break;
                
            case 'adjective':       // przymiotnik
                $('#coto').empty();
                $('#coto').append("nazywają cechy jakościowe rzeczowników (jaki?), <br>np.: <span class=red><b>duży</b></span> dom");
                break;
                
            case 'interjection':    // wykrzyknik
                $('#coto').empty();
                $('#coto').append("wyrażają uczucia lub pełnią funkcję apeli");
                break;
                
            case 'conjunction':     // spójnik
                $('#coto').empty();
                $('#coto').append("informują o stosunkach między przedmiotami i czynnościami, łącząc części zdania o <u>tej samej</u> funkcji,");
                break
                
            case 'particle':     // partykuła
                $('#coto').empty();
                $('#coto').append("(wyrazki) – wzmacniają lub modyfikują znaczenie innych wyrazów,");
                break
                
            case 'adverb':      // przysłówek
                $('#coto').empty();
                $('#coto').append("nazywają cechy jakościowe czynności (jak? gdzie? kiedy?), <br>np. pies pracuje <span class=red><b>dużo</b></span>");
                break;
                
            case 'pronoun':     // zaimek
                $('#coto').empty();
                $('#coto').append("nie mają treści znaczeniowej, pełnią funkcję różnych innych części mowy");
                break;
                
            case 'numeral':     // liczebnik
                $('#coto').empty();
                $('#coto').append("określają liczbę lub kolejność przedmiotów (ile? który z kolei?)");
                break;
                
            default:
                $('#coto').empty();
                break
        }
    });    
});

// EDIT.php
function Menu(){
    location.href="#menu";
}

