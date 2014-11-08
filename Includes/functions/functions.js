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
    
    if (hou>22 || (hou==0 && min == 0 && sec==0)){      // >23 to zegar się "przekręca" i de fakto zawsze jest zalogowane!
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

// Index.php = oczątkowy wygląd tabelki
function start(){
    $("#czasownik").hide();
    $("#rzeczownik").hide();
    $("#przymiotnik").hide();
    $("#stopniowanie").hide();
    $("#liczebnik").hide();
}

$(document).ready(function(){
    $("#typ").change(function(){
        var val = $(this).val();
        $("#ang_cz_m").html(val); // przypisanie tego czerwonego tlumaczenia nazwy części mowy
        
        // Wyświetlanie odpowiednich fragmentów tabeli
        switch (val){
            case 'preposition':
            case 'noun':
                $("#czasownik").hide();
                $("#rzeczownik").show();
                $("#przymiotnik").hide();
                $("#stopniowanie").hide();
                $("#liczebnik").hide();
                break;
  
            case 'hjalp_verb':
            case 'modal_verb':
            case 'partikelverb':
            case 'verb':
                $("#czasownik").show();
                $("#rzeczownik").hide();
                $("#przymiotnik").hide();
                $("#stopniowanie").hide();
                $("#liczebnik").hide();
                break;
                
            case 'adjective':       // przymiotnik
                $("#czasownik").hide();
                $("#rzeczownik").hide();
                $("#przymiotnik").show();
                $("#stopniowanie").show();
                $("#liczebnik").hide();
                break;
                
            case 'wyrazenie':    
            case 'interjection':
            case 'conjunction':
                $("#czasownik").hide();
                $("#rzeczownik").hide();
                $("#przymiotnik").hide();
                $("#stopniowanie").hide();
                $("#liczebnik").hide();
                break
                
            case 'adverb':
                $("#czasownik").hide();
                $("#rzeczownik").hide();
                $("#przymiotnik").hide();
                $("#stopniowanie").show();
                $("#podstawowe").addClass("nobordbottom");
                $("#liczebnik").hide();
                break;
                
            case 'pronoun':
                $("#czasownik").hide();
                $("#rzeczownik").hide();
                $("#przymiotnik").hide();
                $("#stopniowanie").hide();
                $("#liczebnik").hide();
                break;
                
            case'numeral':
                $("#czasownik").hide();
                $("#rzeczownik").hide();
                $("#przymiotnik").hide();
                $("#stopniowanie").hide();
                $("#liczebnik").show();
                break;
                
            default:
                $("#czasownik").show();
                $("#rzeczownik").show();
                $("#przymiotnik").show();
                $("#stopniowanie").show();
                $("#liczebnik").show();
                break;
        }
        // Tu ustalamy tylko opisy do cz.mowy
        switch(val){
            case 'preposition':     // przyimki
                $('#coto').empty();
                text1 = "informują o stosunkach między przedmiotami, łącząc części zdania o <u>niejednakowej</u> funkcji składniowej (gdzie? kiedy?), <br>np: Jedziemy <span class=green><b>w</b></span> grudniu.";
                getTr(text1);
                break;
                
            case 'noun':            // rzeczownik
                $('#coto').empty();
                text1 = "nazywają osoby i przedmioty (kto? co?)";
                getTr(text1);
                break;
  
            case 'hjalp_verb':
                $('#coto').empty();
                text1 = "jest to cz.mowy mówiąca o...hjalp verb";
                getTr(text1);
                break;
                
            case 'verb':        // czasownik
                $('#coto').empty();
                text1 = "informują o czynnościach, stanach i zjawiskach (co robi? co się z nim dzieje?)";
                getTr(text1);
                break;
                
            case 'adjective':       // przymiotnik
                $('#coto').empty();
                text1 = "nazywają cechy jakościowe rzeczowników (jaki?),<br>np.: <span class=green><b>duży</b></span> dom";
                getTr(text1);
                break;
                
            case 'interjection':    // wykrzyknik
                $('#coto').empty();
                text1 = "wyrażają uczucia lub pełnią funkcję apeli";
                getTr(text1);
                break;
                
            case 'conjunction':     // spójnik
                $('#coto').empty();
                text1 = "informują o stosunkach między przedmiotami i czynnościami, łącząc części zdania o <u>tej samej</u> funkcji,";
                getTr(text1);
                break
                
            case 'particle':     // partykuła
                $('#coto').empty();
                text1 = "(wyrazki) – wzmacniają lub modyfikują znaczenie innych wyrazów";
                getTr(text1);
                break
                
            case 'adverb':      // przysłówek
                $('#coto').empty();
                text1 = "nazywają cechy jakościowe czynności (jak? gdzie? kiedy?), <br>np. pies pracuje <span class=green><b>dużo</b></span>";
                getTr(text1);
                break;
                
            case 'pronoun':     // zaimek
                $('#coto').empty();
                text1 = "nie mają treści znaczeniowej, pełnią funkcję różnych innych części mowy";
                getTr(text1);
                break;
                
            case 'numeral':     // liczebnik
                $('#coto').empty();
                text1 = "określają liczbę lub kolejność przedmiotów (ile? który z kolei?)";
                getTr(text1);
                break;
                
            default:
                $('#coto').empty();
                break
        }
    });    
});

// EDIT.php // no
function Menu(){
    location.href="#menu";
}

// umożliwia wysłanie formularzy kliknięciem "enter" - bez myszki!!!
$(document).keyup(function(e){
    if (e.which == 13){
        $("#but1").click();             // accept w inserterze
        $("#btn_sub_01").click();       // accept w test
    }
});

$(document).ready(function(){
    $("#try").focus();      // Focusig cursor in test.php on answer field
  });

function getTr(text){
    $.ajax({    url:"ajax.admin.php",
                            type: 'post',
                            data: {
                                action: 'trans',
                                var1:   text
                            },
                            success:function(result){
                                $('#coto').append(result);
                                return result;
                            }              
           });
}

$(document).ready(function(){
    $("#id_ord").keyup(function(){
        var tekst = $("#id_ord").val();
//        console.log(tekst);
        if (tekst != ''){
            $.ajax({    url:"ajax.admin.php",
                            type: 'post',
                            data: {
                                action: 'text_input_id_ord',
                                var1:   tekst
                            },
                            success:function(result){
                                $('#p2').html(result);
//                                $('#p2').clear();
//                                return result;
                            }              
            });
       } else {
           $('#p2').html('');
       }
    }),
    
    $("#trans").keyup(function(){
        var tekst = $("#trans").val();
        console.log(tekst);
//        alert(tekst);
        if (tekst != ''){
            $.ajax({    url:"ajax.admin.php",
                            type: 'post',
                            data: {
                                action: 'text_input_trans',
                                var1:   tekst
                            },
                            success:function(result){
                                $('#p2').html(result);
//                                $('#p2').clear();
//                                return result;
                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) { 
//                                alert("functions.js 288 Status: " + textStatus); alert("functions.js 288 Error: " + errorThrown); 
                }              
            });
       } else {
           $('#p2').html('');
       }
    }),
    
    $("#sercz").keyup(function(){
        var tekst = $("#sercz").val();
        console.log(tekst);
//        alert(tekst);
        if (tekst != ''){
            $.ajax({    url:"ajax.admin.php",
                            type: 'post',
                            data: {
                                action: 'text_input_sercz',
                                var1:   tekst
                            },
                            success:function(result){
                                $('#p3').html(result);
//                                $('#p2').clear();
//                                return result;
                                  console.log("REZULTAT:"+result);
                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) { 
//                                alert("functions.js 314 Status: " + textStatus); alert("functions.js 314 Error: " + errorThrown); 
                }              
            });
       } else {
           $('#p3').html('');
       }
    });
    $("#del_rand_stats").click(function(){
        if (confirm("Are you sure?") == true) {     // POPUP z potwierdznienim
            $.ajax({    url:"ajax.admin.php",
                            type: 'post',
                            data: {
                                action: 'del_rand_stats',
                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) { 
//                                alert("functions.js 329 Status: " + textStatus); alert("functions.js 329 Error: " + errorThrown); 
                }              
            });
        } else {
        }
    });
});

var nID = 0;

$(document).ready(function(){ 
    
    $('button.butt_diak').click(function(){ // Akcja po kliknięciu klawiszy literek w TEST.php
        var letter = $(this).attr('value')  // pobranie vartości klawisza klikniętego (literka np.: ą, ć itd
        temp = $('#try').val()+letter;      // pobranie wartośi wprowadzanych i dodanie literki
        $('#try').val(temp);                // PRZEPISANIE WARTOŚCI
        $("#try").focus();                  // PRZYWRÓCENIE FOCUSA NA TEXTAREA!
    });
    
//    $('table.edit_table').on('input',function(){
//        var ID = $(this).attr('id');
//        var pos1 = ID.search("_")
//        var nID = ID.slice(pos1);   // e.g.: _345
//        alert(nID)
//        $('#CBedit'+nID).prop('checked', true);
//        $('.myCheckbox').prop('checked', true);
//            $.ajax({    url:"ajax.admin.php",
//                            type: 'post',
//                            data: {
//                                action: 'text_input_sercz',
//                                var1:   tekst
//                            },
//                            success:function(result){
//                                $('#p3').html(result);
////                                $('#p2').clear();
////                                return result;
//                                  console.log("REZULTAT:"+result);
//                            },
//                            error: function(XMLHttpRequest, textStatus, errorThrown) { 
//                                alert("functions.js 368 Status: " + textStatus); alert("functions.js 368 Error: " + errorThrown); 
//                }              
//            });
//    });
    $('#typ').change(function(){
        var typ_val = $('#typ').val();
        switch(typ_val){
            case 'hjalp_verb':
            case 'modal_verb':
            case 'partikelverb':
            case 'verb':
                $('#rodzaj').val('att');
                break;
            default:
                $('#rodzaj').val('');
                break;
        }
    });
    $('#sercz_btn').click(function(){
       $('#sercz').empty();
    });
    $('#sercz_dok_btn').click(function(){
       $('#sercz_dok').empty();
    });
    
    
    $('table.edit_table').change(function(){
        var ID = $(this).attr('id');
        var pos1 = ID.search("_")
        nID = ID.slice(pos1);   // e.g.: _345
//        alert(nID)
        $('#CBedit'+nID).prop('checked', true);
        
        var checkedVals = $('.edit_checkbox:checkbox:checked').map(function() {
        return this.value;
        }).get();
//        alert(checkedVals.join(","));
        
//        $( "#form_ord"+nID ).submit(function( event ) {
//            event.preventDefault();
//            console.log( $( this ).serialize() );
//        });
//        
        // Find disabled inputs, and remove the "disabled" attribute
//        $("#id"+nID).removeAttr('disabled');
//        alert(disabled);

        // serialize the form
        var serialized = $("#form_ord"+nID).serialize();

        // re-disabled the set of inputs that you previously enabled
//        $("#id"+nID).attr('disabled','disabled');
        $("#ta_ser"+nID).text(serialized);
    });
    
    $('#floating_button').click(function(){
        //alert("TODO: Status DOING!");
//        $("#form_ord_"+49).trigger('submit')
    });
    
    // for this (like Kategory!!) select-option block =>dropdown-check-list.1.4.
//    $("#div_edit").each(function(){$("select.kat_edit_sel").dropdownchecklist()});
    $("#kategoria_ins").dropdownchecklist({forceMultiple: true,
                    onComplete: function(selector) {
                    var values = "";
                    for( i=0; i < selector.options.length; i++ ) {
                        if (selector.options[i].selected && (selector.options[i].value != "")) {
                           if ( values != "" ) values += ";";
                                values += selector.options[i].value;
                        }
                    }
                    $('#kategoria_val').val(values)
                    } 
     });
//    $(".kategoria_multi").each(function(){$(this).html("ALA KOTA")});  
    $('#div_edit').each( function() {
        $( ".kateg" ).dropdownchecklist({forceMultiple: true,
                    onComplete: function(selector) {
//                        alert (nID);
                    var values = "";
                    for( i=0; i < selector.options.length; i++ ) {
                        if (selector.options[i].selected && (selector.options[i].value != "")) {
                           if ( values != "" ) values += ";";
                                values += selector.options[i].value;
                        }
                    }
                    $('#kategoria_edit_val'+nID).val(values)
                    } 
    });
    });          
//    $(".kategoria").dropdownchecklist({forceMultiple: true,
//                    onComplete: function(selector) {
//                    var values = "";
//                    for( i=0; i < selector.options.length; i++ ) {
//                        if (selector.options[i].selected && (selector.options[i].value != "")) {
//                           if ( values != "" ) values += ";";
//                                values += selector.options[i].value;
//                        }
//                    }
////                    alert("ala");
//                    alert( values );
////                    alert("4");
//                    $('#kategoria_val').val(values)
//                    } 
//                });
});
