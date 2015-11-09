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
    
    if (isNaN(log_tim_took)){      // jeśli nie jest liczbą, czyli nie ma ustawionego limitu czasu
//        alert("Ide do logout");
        window.location.href = "logerMOD.php?action=logout"
    }else{
//        alert("To jest poprawny format: "+log_tim_took);
    }
    
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
    
    if ((hou>22 && min>58)|| (hou==0 && min == 0 && sec==0)){      // >23 to zegar się "przekręca" i de fakto zawsze jest zalogowane!
//        alert("Ide do logout");
        window.location.href = "logerMOD.php?action=logout"
    }    
    
    if (hou==0 && min == 0 && sec<10){
        return("<span class=red><b>"+ rozn_str+"</b></span>");
    }else{
        return(rozn_str);
    }
}
 
//wywołanie ma na celu eliminację opóźnienia sekundowego
if(document.getElementById('zegar') && document.getElementById('zegar_log')){
    document.getElementById('zegar').innerHTML =    getTime();
    document.getElementById('zegar_log').innerHTML = logTime();
}
 
setInterval(function() {
// logTime();
    if(document.getElementById('zegar') && document.getElementById('zegar_log')){
        document.getElementById('zegar').innerHTML =    getTime(); //"<br>obecny czas: "+getTime();
        document.getElementById('zegar_log').innerHTML = logTime();
    }
     
}, 1000);


function addTimeScan(){
    tid2 = document.getElementById("add_time_after_click").innerHTML;
    console.log(tid2);
};

/* FUNKCJE W logerMOD.php do kasowania COOKIE z poziomy js. DZIAŁAJĄ ale nie na cooi 'log' ;( */
/*
function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
    try{
        createCookie(name,"",-1);
    }
    catch(ex){
        alert(ex)
    }
}
/**/

//var samogl = new Array('a','å','e','i','o','u','y','ä','ö');  //A, E, I, O, U, Y, Å, Ä och Ö
//var spolgl = new Array('b');
//

// Index.php = początkowy wygląd tabelki
function start(){
    $("#czasownik").hide();
    $("#rzeczownik").hide();
    $("#przymiotnik").hide();
    $("#stopniowanie").hide();
    $("#liczebnik").hide();
}

 $(document).ready(function(){

    /* Używane w BUTTON.php do ukrycia i odsłaniania buttonów w sekcjach */
    
    $("#core").hide();
    $("#admin").hide();
    $("#usrAdmin").hide(); 
//    $('#coreButtArrow').remove();
    $('#coreButt').append('<span id="coreButtArrow">&#10549;</span>');
    $('#admButt').append('<span id="adminButtArrow">&#10549;</span>');
    $('#usrAdmButt').append('<span id="usrAdmArrow">&#10549;</span>');
        
//    $("#coreButt").bind("click", function(){
    $("#coreButt").click(function(){
        $("#admin").hide();
        $("#usrAdmin").hide();
        
        if ($('#coreButtArrow').text() == '⤵'){
            $("#core").show();
            
            $('#coreButtArrow').remove();
            $('#adminButtArrow').remove();
            $('#usrAdmArrow').remove();
            
            $('#coreButt').append('<span id="coreButtArrow">&#10548;</span>');
            $('#admButt').append('<span id="adminButtArrow">&#10549;</span>');
            $('#usrAdmButt').append('<span id="usrAdmArrow">&#10549;</span>');
        }else{
            $("#core").hide();
            $('#coreButtArrow').remove();
            $('#coreButt').append('<span id="coreButtArrow">&#10549;</span>');
        }
    });
    
//    $("#admButt").bind("click", function(){
    $("#admButt").click(function(){
        $("#core").hide();
        $("#usrAdmin").hide();
//        $("#admin").toggle();
        
        if ($('#adminButtArrow').text() == '⤵'){
            $("#admin").show();
            
            $('#coreButtArrow').remove();
            $('#adminButtArrow').remove();
            $('#usrAdmArrow').remove();
            
            $('#coreButt').append('<span id="coreButtArrow">&#10549;</span>');
            $('#admButt').append('<span id="adminButtArrow">&#10548;</span>');
            $('#usrAdmButt').append('<span id="usrAdmArrow">&#10549;</span>');
        }else{
            $("#admin").hide();
            $('#adminButtArrow').remove();
            $('#admButt').append('<span id="adminButtArrow">&#10549;</span>');
        }        
        
    });
    
//    $("#usrAdmButt").bind("click", function(){
    $("#usrAdmButt").click(function(){
        $("#core").hide();
        $("#admin").hide();
//        $("#usrAdmin").toggle();

        if ($('#usrAdmArrow').text() == '⤵'){
            $("#usrAdmin").show();
            
            $('#coreButtArrow').remove();
            $('#adminButtArrow').remove();
            $('#usrAdmArrow').remove();
            
            $('#coreButt').append('<span id="coreButtArrow">&#10549;</span>');
            $('#admButt').append('<span id="adminButtArrow">&#10549;</span>');
            $('#usrAdmButt').append('<span id="usrAdmArrow">&#10548;</span>');
        }else{
            $("#usrAdmin").hide();
            $('#usrAdmArrow').remove();
            $('#usrAdmButt').append('<span id="usrAdmArrow">&#10549;</span>');
        }

    });
    
    /* KONIEC SEKCJI do Button.php */
    
    
    
    /* Do TEST.php bind to each => button w odpowiedzi */
    
    $('#testAnswers').each(function(index){
//        $('.ordAnchor', this).hover(function(){
        $('.ordAnchor', this).mouseenter(function(){
//            var value = $(this).attr("href");
            var id = $(this).attr("id");
//            console.log($('a:href',this));
//            console.log("href: "+value);
            console.log("id: "+id);
            
            var pos = id.indexOf('_');
            var num = id.slice((pos+1))
            console.log("num: "+num);
            
            $.ajax({    url:"ajax.admin.php",
                            datatype: 'json',
                            type: 'post',
                            data: {
                                action: 'getOrdInfo',
                                var1:   num
                            },
                            success:function(data){
//                                alert('dymek'+num)
                                $('#dymek'+num).empty();
                                $('#dymek'+num).html(data);
//                                alert(valtem)
//                                console.log(data);
                                return data;
                            }             
           }); 
            
            
            
            
        });
    });
    
    /* KONIEC sekcji: Do TEST.php bind to each => button w odpowiedzi */
    
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
            case 'reflexivaverb':
//            case 'deponensverb':
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
                
//            case 'deponensverb':
//                $('#coto').empty();
//                text1 = "jest to cz.mowy mówiąca o...deponens verb";
//                getTr(text1);
//                break;
                
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
  
function getTrans1(text, pole){
    $.ajax({    url:"ajax.admin.php",
                            datatype: 'json',
                            type: 'post',
                            data: {
                                action: 'trans',
                                var1:   text
                            },
                            success:function(data){
                                $('#'+pole).html(data);
                                return data;
                            }             
           });    
}

function getTrans(text, pole){
    $.ajax({    url:"ajax.admin.php",
                            datatype: 'json',
                            type: 'post',
                            data: {
                                action: 'trans',
                                var1:   text
                            },
                            success:function(data){
                                $('#error'+pole.id).html(data);
                                return data
                            }             
           });    
}
  
function getTr(text){       // tłumaczenie 'text' (dokładnie opis części mowy wyświetlający się na czerwono
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
        console.log("line275: "+tekst);
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

// Podaje grupę do której należy słowo
function locateGroup(group){
 
    x = group.indexOf(":")+3;
    y = group.indexOf("_");
    
    var grupFIN = group.slice(x,y);

    return grupFIN;
}

function tryEditFill(id){       // akcja dla buttona z Edit.php do uzupełniania pól w trybie edycji
//    alert("przesłane id="+id);
    ord_id = 'ord_'+id;
    
//    $('#ord_'+id+'.uwagi_ta').attr('background-color','red')
//    var ord_type = $('#ord_types_'+id+' option:selected').val();
    var ord_type = $('#ord_types_'+id).val();
    var rodzaj = $('#rodzaj_'+id).val();
    var grupa = $('#grupa_'+id).val();
    var kategoria = $('#kategoria_'+id).val();
    var uwagi = $('#uwagi_ta_'+id).val();
    
    var tryOrd = $('#ord_'+id+' [name=wymowa]').val();
    
    alert(tryOrd);
    
    alert(ord_type + ', ' +
          rodzaj + ', ' +
          grupa + ', ' +
          kategoria + ', ' +
          uwagi)
//    alert(ord_id)
////    for (i=0;i<samogl.length;i++){
////        
//////        $('#ord_id uwagi_ta').val(abac);
////    }
//    var tabelka = document.getElementById(ord_id);
//    
//    alert(tabelka)
//    
//    tabelka.attributes("background":"red");
}

// Podaje typ słowa na podst wybranej grupy do której należy słowo
function locateOrdTyp(group){
    x = group.indexOf(":");
    var ordTypp = group.slice(0,x);
    return ordTypp;
}

// Ta funkcja złuży do auto uzupełniania pól dla ADJECTIV
function autoAdjectiv(trans,group) {
//    alert(group)
//    console.log(group)
    trans = trans.trim(); // obcina białe znaki!!
    
    var ost1Lett = trans.slice(trans.length-1);
    var ost2Lett = trans.slice(trans.length-2);
    
//    alert(ost2Lett);

//    if(ost1Lett == 'd'){   // np: deprimerad => NIE deprimeradt => deprimerat.
//        trans1 = trans.slice(0,trans.length-1);     
//    }else {
//        trans1 = trans;
//    }
    switch(ost2Lett){
        case 'en':          // np: besviken => besvikne, besvikna osv.
            trans2 = trans.slice(0,trans.length-2)+'n';  
            break;
        case 'am':
            trans2 = trans.slice(0,trans.length-2)+'amm'; 
            break;
        default:
            trans2 = trans; 
            break;
    }
    
    switch(group){
        case 'bez stopniowania':
            $('#neuter').val(trans+'t');
            $('#masculin').val(trans2+'e');
            $('#plural').val(trans2+'a');
//            $('#st_rowny').val(trans)
            $('#st_rowny').val('');
            $('#st_wyzszy').val('');
            $('#st_najwyzszy').val('');
            break;
        case 'nieodmienny':
            $('#neuter').val('');
            $('#masculin').val('');
            $('#plural').val('');
            $('#st_rowny').val('');
            $('#st_wyzszy').val('');
            $('#st_najwyzszy').val('');
            break;
        case 'mer/mest':
            $('#neuter').val(trans+'t');
            $('#masculin').val(trans2+'e');
            $('#plural').val(trans2+'a');
            $('#st_rowny').val(trans);
            $('#st_wyzszy').val('mer '+trans);
            $('#st_najwyzszy').val('mest '+trans);
            break;
        default:
            $('#neuter').val(trans+'t');
            $('#masculin').val(trans2+'e');
            $('#plural').val(trans2+'a');
            $('#st_rowny').val(trans);
            $('#st_wyzszy').val(trans2+'are');
            $('#st_najwyzszy').val(trans2+'aste, '+trans2+'ast');
            break;
    }
}

// Ta funkcja złuży do auto uzupełniania pól dla VERB
function autoVerb(trans, group) {
    
    var OrdTyp = $('#typ').val(); // trzeba popracować nad perfekt particip dla partikelverbów
    var OrdGrup = $('#grupa').val(); // trzeba popracować nad perfekt particip dla partikelverbów
    
    var sig = '';
//    var partikelverbValidator = 0;
//    if(OrdTyp == 'partikelverb'){
//            alert(OrdTyp);
//            partikelverbValidator = '1';
//            sig = 'sig'
//    }
    var gr4='';
    var depon = '';
    
    if (OrdGrup.indexOf("stark") >= 0){
//        alert(OrdGrup+'1');
        gr4 = 'starka';
    }
    if (OrdGrup.indexOf("oregel") >= 0){
//        alert(OrdGrup+'1');
        gr4 = 'oregel';
    }
//    
//    if (OrdGrup.indexOf("deponens") >= 0){
//        alert(OrdGrup+'deponens1'); 
//        depon = 'deponens';
//    }else{
//        //alert(OrdGrup+'deponens2');
//    }
//    if (OrdGrup.contains("stark") >= 0){
//        alert(OrdGrup+'2');
//    }
//    if (OrdGrup.search("stark") >= 0){
//        alert(OrdGrup+'3');
//    }
    
    var ogon = "";
    var ogon2 = "";
    var validA ='';
    var valider = 0;
    
    var Kinfi = 'att ';
    var Kpres = '';
    var Kpret = '';
    var Ksupi = '';
    var Kimpe = '!';
    var Kprespart = '';
    var Kpretpart = ''; 
    var Kpassiv = 's';
    
    var Kpas_presens = '';
    
    var OrdInfi = '';
    var OrdPresens ='';
    var OrdPerfParticip = '';
    var OrdPreterite = '';
    var OrdSupine = '';
    var OrdImperative = '';
    var OrdPresParticip = '';
    var OrdPasInfinite = '';
    var OrdPasPresens = '';
    var OrdPasPreterite = '';
    var OrdPasSupine = '';
    
    trans = trans.trim();           // obcina białe znaki!!
       
    transVB = trans.split(" ");     // np.: gå ner - partikelverb!!!
//    trans = transVB[0];           // goły verb
    var temat = transVB[0];         // goły verb
    var infi = temat;               // zachowane dla infinitiv

    if(transVB.length > 1){         // partikel verby itp!!! "titta på sig"
        for(i=1;i<transVB.length;i++){
            if(transVB[i] == 'sig'){
                sig = ' sig';
            }else{
                ogon2 += transVB[i]; // stworzenie "ogona": tagen upp -> upptagen
            }
//            ogon += " "+transVB[i]; // stworzenie "ogona": på till över itp
            if(ogon2 != '')
                ogon = " "+ogon2; // stworzenie "ogona": på till över itp
        }
    }
    
    var ostLett = temat.slice(temat.length-1)   // ostatnia litera gołego verba
    ostLettIMPER = ostLett;
    
    if(ostLett == 'a'){
            var indA = temat.lastIndexOf("a");
            var temat = temat.slice(0,indA); // ostateczny kształt "tematu słowa" - bez końcowego a
            ostLettIMPER = temat.slice(temat.length-1);
    }
//    alert("TEMAT słowa: "+temat+"\nostLett: "+ostLettIMPER)

    console.log('inda: '+indA+" ;trans"+trans+" ;ostLett: "+ostLett)
    console.log(trans);
    
    if(ostLett == 'a'){
//        alert("ostA =" +ostLett)
        Kprespart = 'ande';
    }else{
//        alert("NIE ostA "+ostLett)
        Kprespart = 'ende';
    }
    
    switch(group){
        case '1':       // verb group:1
            valider = 1;
            
            if(ostLett == 'a'){
                validA = 'a';
            }
            
            if(ostLett == 'e'){
                alert("ost lett: e")
            }
            
            Kpres = 'r';
            Kpret = 'de';
            Ksupi = 't';
            
//            OrdInfi = Kinfi+infi+ogon+sig +'/ OGON:'+ogon;
            OrdInfi = Kinfi+infi+ogon+sig;
            OrdPresens = temat+validA+Kpres+ogon+sig;
            OrdPreterite = temat+validA+Kpret+ogon+sig;
            OrdSupine = temat+validA+Ksupi+ogon+sig;
            OrdImperative = temat+validA+ogon+sig+Kimpe;
            OrdPresParticip = ogon2+temat+Kprespart+sig+', '+ogon2+temat+Kprespart+Kpassiv+sig;
            
            Kpretpart1 = 'd'; 
            Kpretpart2 = 't'; 
            Kpretpart3 = 'de'; 
            
            // perfect particip för partikelverb
//            OrdPerfParticip = temat+validA+Kpretpart1+ogon+', ';
//            OrdPerfParticip += temat+validA+Kpretpart2+ogon+', ';
//            OrdPerfParticip += temat+validA+Kpretpart3+ogon;

            OrdPerfParticip = ogon2+temat+validA+Kpretpart1+sig+', ';
            OrdPerfParticip += ogon2+temat+validA+Kpretpart2+sig+', ';
            OrdPerfParticip += ogon2+temat+validA+Kpretpart3+sig;
            
            OrdPasInfinite = temat+validA+Kpassiv+ogon+sig;
            OrdPasPresens = temat+validA+Kpassiv+ogon+Kpas_presens+sig;
            OrdPasPreterite = temat+validA+Kpret+Kpassiv+ogon+sig;
            OrdPasSupine = temat+validA+Ksupi+Kpassiv+ogon+sig;

            break;
            
        case '2A':       // verb group:2A
            valider = 1;
            
            if(ostLett == 'a'){
                validA = 'a';
            }

            switch(ostLettIMPER){
                case 'r':
                    break;
                default:
                    Kpres = 'er';
                    break;
            }
            
            Kpret = 'de';
            Ksupi = 't';
            Kpretpart = 'd'; 
            
            OrdInfi = Kinfi+infi+ogon+sig;      // att + köra + på sig
            OrdPresens = temat+Kpres+ogon+sig;
            OrdPreterite = temat+Kpret+ogon+sig;
            OrdSupine = temat+Ksupi+ogon+sig;
            OrdImperative = temat+ogon+sig+Kimpe;
            OrdPresParticip = ogon2+temat+Kprespart+sig+', '+ogon2+temat+Kprespart+Kpassiv+sig;
            
            Kpretpart1 = 'd'; 
            Kpretpart2 = 't'; 
            Kpretpart3 = 'da';     
            OrdPerfParticip = ogon2+temat+Kpretpart1+sig+', ';
            OrdPerfParticip += ogon2+temat+Kpretpart2+sig+', ';
            OrdPerfParticip += ogon2+temat+Kpretpart3+sig;
            
            OrdPasInfinite = temat+validA+Kpassiv+ogon+sig;
            OrdPasPresens = temat+Kpassiv+ogon+sig+', '+temat+'e'+Kpassiv+ogon+sig;
            OrdPasPreterite = temat+Kpret+Kpassiv+ogon+sig;
            OrdPasSupine = temat+Ksupi+Kpassiv+ogon+sig;
            
            break;
            
        case '2B':       // verb group:2B
            valider = 1;
            
            if(ostLett == 'a'){
                validA = 'a';
            }

            Kpres = 'er';
            Kpret = 'te';
            Ksupi = 't';
            Kpretpart = 't'; 
            
            OrdInfi = Kinfi+infi+ogon+sig;      // att + köpa + på sig
            OrdPresens = temat+Kpres+ogon+sig;
            OrdPreterite = temat+Kpret+ogon+sig;
            OrdSupine = temat+Ksupi+ogon+sig;
            OrdImperative = temat+ogon+sig+Kimpe;
            OrdPresParticip = ogon2+temat+Kprespart+sig+', '+ogon2+temat+Kprespart+Kpassiv+sig;
            
            Kpretpart1 = 't'; 
            Kpretpart2 = 't'; 
            Kpretpart3 = 'ta'; 
            
            OrdPerfParticip = ogon2+temat+Kpretpart1+sig+', ';
            OrdPerfParticip += ogon2+temat+Kpretpart2+sig+', ';
            OrdPerfParticip += ogon2+temat+Kpretpart3+sig;
            
            OrdPasInfinite = temat+validA+Kpassiv+ogon+sig;
            OrdPasPresens = temat+Kpassiv+ogon+sig+', '+temat+'e'+Kpassiv+ogon+sig;
            OrdPasPreterite = temat+Kpret+Kpassiv+ogon+sig;
            OrdPasSupine = temat+Ksupi+Kpassiv+ogon+sig;
            
            break;
            
        case '3':       // verb group:3 kort
            valider = 1;
            
            switch(ostLettIMPER){
                case 'r':
                    break;
                default:
                    Kpres = 'er';
                    break;
            }
            
            Kpres = 'r';
            Kpret = 'dde';
            Ksupi = 'tt';
            Kpretpart = 'dd'; 
       
            OrdInfi = Kinfi+infi+ogon+sig;      // att + köpa + på sig
            OrdPresens = temat+Kpres+ogon+sig;
            OrdPreterite = temat+Kpret+ogon+sig;
            OrdSupine = temat+Ksupi+ogon+sig;
            OrdImperative = temat+ogon+sig+Kimpe;
            OrdPresParticip = ogon2+temat+Kprespart+sig+', '+ogon2+temat+Kprespart+Kpassiv+sig;
            
            Kpretpart1 = 'dd'; 
            Kpretpart2 = 'tt'; 
            Kpretpart3 = 'dda'; 
            OrdPerfParticip = ogon2+temat+Kpretpart1+sig+', ';
            OrdPerfParticip += ogon2+temat+Kpretpart2+sig+', ';
            OrdPerfParticip += ogon2+temat+Kpretpart3+sig;
            
            OrdPasInfinite = temat+Kpassiv+ogon+sig;
            OrdPasPresens = temat+Kpassiv+ogon+sig;//+', '+temat+'e'+Kpassiv+ogon;;
            OrdPasPreterite = temat+Kpret+Kpassiv+ogon+sig;
            OrdPasSupine = temat+Ksupi+Kpassiv+ogon+sig;
            
            break;
            
        case '4':       // verb group:4 starka/oregelbund
            valider = 1;
            
            if(ostLett == 'a'){
                validA = 'a';
            }
            
            switch(ostLettIMPER){
                case 'r':
                    break;
                default:
                    Kpres = 'er';
                    break;
            }
            
            switch(gr4){
                case 'starka':
//                    Kpretpart = 'd/en';
                    Kpretpart1 = 'en'; 
                    Kpretpart2 = 'et'; 
                    Kpretpart3 = 'na'; 
                    lettE ='';
                    break;
                case 'oregel':
//                    Kpretpart = 'd/en';
                    Kpretpart1 = 'd'; 
                    Kpretpart2 = 't'; 
                    Kpretpart3 = 'da';
                    lettE = 'e';
                    break;
                default:
                    Kpretpart1 = 'en/d'; 
                    Kpretpart2 = 'et/t'; 
                    Kpretpart3 = 'na/da'; 
                    lettE = ''
                    break;
            }
            
            Kpres = 'er';
//            Kpret = '';
            Ksupi = 'it';
//            Kprespart = 'ande';
//            Kpretpart = 'd/en'; 
            
//            $('#supine').change(function(){
//                supine =  $('#supine').val();
//                $('#pas_supine').val(supine+'s');
//            });
//            
//            $('#past').change(function(){
//                past =  $('#past').val();
//                $('#pas_preterite').val(past+'s');
//            });
            
            OrdInfi = Kinfi+infi+ogon+sig;      // att + köpa + på sig
            OrdPresens = temat+Kpres+ogon+sig;
            OrdPreterite = temat+Kpret+ogon+sig;
            OrdSupine = temat+Ksupi+ogon+sig;
            OrdImperative = temat+ogon+sig+Kimpe;
            OrdPresParticip = ogon2+temat+Kprespart+sig+', '+ogon2+temat+Kprespart+Kpassiv+sig;
            
            OrdPerfParticip = ogon2+temat+Kpretpart1+sig+', ';
            OrdPerfParticip += ogon2+temat+Kpretpart2+sig+', ';
            OrdPerfParticip += ogon2+temat+Kpretpart3+sig;
            
            OrdPasInfinite = temat+validA+Kpassiv+ogon+sig;
            OrdPasPresens = temat+Kpassiv+ogon+sig+', '+temat+'e'+Kpassiv+ogon+sig;
            OrdPasPreterite = temat+Kpret+lettE+Kpassiv+ogon+sig;
            OrdPasSupine = temat+Ksupi+Kpassiv+ogon+sig;
            
            break;
        case '5':
            valider = 1;
//            alert ("os lett: "+ostLettIMPER)
//            alert ("temat:   "+infi)
            var temUtanS = temat.slice(0,temat.length-1)   // ostatnia litera gołego verba
//            alert("tem:   "+temUtanS)
            
            
            var ostLett = temUtanS.slice(temUtanS.length-1)
            temUtanAS = '';
            
            switch(ostLett){
                case 'a':
//                    temUtanAS = temat.slice(0,temat.length-2)
                    Kprespart = 'nde'
                    break;
                default:
//                    temUtanAS = temUtanS
                    break;
            }
            
            var s = 's';
            Kpres = '';
            Kpret = 'de';
            Ksupi = 't';
//            Kpretpart = 'dd'; 
       
            OrdInfi = Kinfi+temUtanS+s+ogon;      // att + köpa + på sig
            OrdPresens = temUtanS+Kpres+s+ogon;
            OrdPreterite = temUtanS+Kpret+s+ogon;
            OrdSupine = temUtanS+Ksupi+s+ogon;
            OrdImperative = temUtanS+s+ogon+Kimpe;
            OrdPresParticip = ogon2+temUtanS+Kprespart+sig+', '+ogon2+temUtanS+Kprespart+Kpassiv+sig;
            
//            Kpretpart1 = 'dd'; 
//            Kpretpart2 = 'tt'; 
//            Kpretpart3 = 'dda'; 
//            OrdPerfParticip = temUtanS+Kpretpart1+ogon+', ';
//            OrdPerfParticip += temUtanS+Kpretpart2+ogon+', ';
//            OrdPerfParticip += temUtanS+Kpretpart3+ogon;
            
//            OrdPasInfinite = temUtanS
//            OrdPasPresens = temUtanS
//            OrdPasPreterite = temUtanS
//            OrdPasSupine = temUtanS
            
            break;
        
        default:
            valider = 0;
            alert("default: "+group);
            break;
    }
    
    $('#supine').change(function(){
         supine =  $('#supine').val();
         $('#pas_supine').val(supine+'s'); // ale dla partikel verbów i reflexiva dodaje to s bez sensu!!
    });
            
    $('#past').change(function(){
        past =  $('#past').val();
        $('#pas_preterite').val(past+'s');
    });
    
    if(valider == 1){
        infinitive          = $('#infinitive').val().length;			
        presens             = $('#presens').val().length;					
        past                = $('#past').val().length;					
        supine              = $('#supine').val().length;	 				
        imperative          = $('#imperative').val().length;	 			
        present_participle  = $('#present_participle').val().length;	 	
        past_participle     = $('#past_participle').val().length;
        
        pas_infinitive      = $('#pas_infinitive').val().length;
        pas_presens         = $('#pas_presens').val().length;
        pas_preterite       = $('#pas_preterite').val().length;
        pas_supine          = $('#pas_supine').val().length;
        pas_imperative      = $('#pas_imperative').val().length;
    
        console.log("infinitive: "+infinitive)
        console.log("presens: "+presens)
        console.log("past: "+past)
    
        if(infinitive == 0)          $('#infinitive').val           (OrdInfi);
        if(presens == 0)             $('#presens').val              (OrdPresens);
        if(past == 0)                $('#past').val                 (OrdPreterite);
        if(supine == 0)              $('#supine').val               (OrdSupine);
        if(imperative == 0)          $('#imperative').val           (OrdImperative);
        if(present_participle == 0)  $('#present_participle').val   (OrdPresParticip);
        if(past_participle == 0)     $('#past_participle').val      (OrdPerfParticip);
        
        if(pas_infinitive == 0)     $('#pas_infinitive').val        (OrdPasInfinite);
        if(pas_presens == 0)        $('#pas_presens').val           (OrdPasPresens);
        if(pas_preterite == 0)      $('#pas_preterite').val         (OrdPasPreterite);
        if(pas_supine == 0)         $('#pas_supine').val            (OrdPasSupine);
    
        console.log(
            "infinitive: "+OrdInfi+"\n"
            +"presens: "+OrdPresens+"\n"
            +"past: "+OrdPreterite+"\n"
            +"supine: "+OrdSupine+"\n"
            +"imperative: "+OrdImperative+"\n"
            +"present_participle: "+OrdPresParticip+"\n"
            +"past_participle: "+OrdPerfParticip+"\n"
    
            +"pas_infinitive: "+OrdPasInfinite+"\n"
            +"pas_presens: "+OrdPasPresens+"\n"
            +"pas_preterite: "+OrdPasPreterite+"\n"
            +"pas_supine: "+OrdPasSupine+"\n"
            +"pas_imperative: BRAK"
        );
    }
}

// GENERAL FUNCTION simmilar to PHP's "inArray()"
function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}

function autoNoun(trans, group, rodzaj) {
//    alert(trans + " / " + group + " / "+rodzaj)
    trans = trans.trim();           // obcina białe znaki!!
    var OBSI = trans;               // zachowuje ORGINALNY kształt słowo bez białych znaków
    var ostLett = trans.slice(trans.length-1)
//    alert(ostLett)
//    if(inArray(ostLett, sam)){
    if(ostLett == 'a'){
        console.log("here")
            var indA = trans.lastIndexOf("a");
            var trans = trans.slice(0,indA); // ostateczny kształt "tematu słowa" - bez końcowego a
    }

    var konVal = false;
    console.log('trans: '+trans+'\ngroup: '+group+'\rodzaj: '+rodzaj);
    
    if(rodzaj == "en"){
        console.log("konc=en")
        konc = rodzaj;
    }else if(rodzaj == "ett"){
        console.log("konc=ett")
        konc = 'et'
    }else{
        konVal = true;
        rodzaj = "en"
        konc = 0;
        }
    var transPL = trans;
    var koncPL = '';

    switch(group){
        case "1":
            console.log("Algorytm dla gr1 działa OK!");
            
            group = 'or';
//            rodzaj = 'en';
            koncPL = 'na';
            konc = 'n';

            switch (ostLett){
                case 'a':
                    konc = 'an';
                    break;
                case 'o':
                    group = 'r';
                    break
                default:
                    console.log ("ERROR in functions.js autoNoun: #AuNo0001, ost litera: "+ostLett)
                    break;
            }

            if(konVal==true) 
                $('#rodzaj option[value=en]').attr('selected','selected');
//                $('#typ option[value=noun]').attr('selected','selected');
        break;
        case '2':
            console.log("Algorytm dla noun:gr2 działa OK!");
            group = 'ar';
//            rodzaj = 'en';
            konc = 'en';
            koncPL = 'na';
            
            var spolgloski = new Array('n');
            var samogloski = new Array('å');
            var treOstLett = new Array('kel','gel','pel','gon','ter','ger','ber');
            
            var ost3Lett = trans.slice(trans.length-3)
//            alert (ost3Lett)
            
            if(inArray(ost3Lett,treOstLett)){
                len = trans.length
                var trans3l = trans.slice(0,len-3); // ostateczny kształt "tematu słowa" - bez końcowych 3 liter
                var kon = trans.slice(len-3)
//                alert(trans3l + " /1: "+kon) 
                kon = kon.slice(0,1)+kon.slice(2)
//                alert(trans3l + " /2: "+kon)
                transPL = trans3l+kon
                
                if(inArray(ostLett, spolgloski)){
                    konc = 'en';
                }else{
                    konc = 'n';
                }
            }
            
            if(ostLett == 'å'){
                konc = 'n';
                group = 'r';
            }
            
            if(konVal==true) 
                $('#rodzaj option[value=en]').attr('selected','selected');
        break;
        case '3':
            console.log("Algorytm dla gr3 działa prawie OK!");
            if(ostLett=='e'){
                group = 'r';
                konc = 'n';
            }else{
                group = 'er';
                konc = 'en';
            }
            koncPL = 'na';
            if(konVal==true) 
                $('#rodzaj option[value=en]').attr('selected','selected');
        break;
        
        case '4':
            console.log ("TODO 4: przy 'en' i 'ett' dodaje za dużo samogłosek");
            
            if(ostLett=='e'){
                if(rodzaj == "ett"){
                    konc = 't'
                }else{
                    konc = 'n'
                }
            }
            group = 'n';
            koncPL = 'a';
            if(konVal==true) 
                $('#rodzaj option[value=ett]').attr('selected','selected');
        break;
        
        case '5':
            console.log ("TODO: przy 'en' dodaje za dużo samogłosek")
            group = '';
            if(rodzaj == "en")
                koncPL = 'na';
            else
                koncPL = 'en';
            
            if(konVal==true) 
                $('#rodzaj option[value=ett]').attr('selected','selected');
        break;
        case "b.lm.":
//            alert("TUTUTUTU!! 6")
            group = '';
            konc = '';
//            $('#rodzaj').val("ett");
            koncPL='an/na';
        break;
        case "oregelbund":
//            alert("TUTUTUTU!! 7")
            group = '';
//            $('#rodzaj').val("ett");
            koncPL='na/an';
        break;
        
        default:
//            alert("TUTUTUTU!! 8")
            $('#rodzaj select').val("ett");
            $('#form1.rodzaj select').val("ett");
            transPL='';
            group='';
            koncPL='';
        break;
    }
    console.log('trans: '+trans+' / transPL: '+transPL+' / ngroup: '+group+'/nkonc: '+konc);
    
    $('#S_indefinite').val(rodzaj+" "+OBSI);
    $('#S_definite').val(trans+konc);
    $('#P_indefinite').val(transPL+group);
    $('#P_definite').val(transPL+group+koncPL);
}

$(document).ready(function(){ 
    
//    $('#sercz_btn').click(function(){
//        var sercz = $('#sercz').val();
//        alert(sercz);
//    }),
    
    $('#resetFormIndex').click(function(){  // po kliknięciu "Wyczyść formularz usówa powiązania (bind)
//        alert("resetFormIndex")
        $('#trans').unbind();
        $('#grupa').unbind();
        $('#past').unbind();
        $('#supine').unbind();
    }),
    
    $('button.butt_diak').click(function(){ // Akcja po kliknięciu klawiszy literek w TEST.php
        var letter = $(this).attr('value')  // pobranie vartości klawisza klikniętego (literka np.: ą, ć itd
        temp = $('#try').val()+letter;      // pobranie wartośi wprowadzanych i dodanie literki
        $('#try').val(temp);                // PRZEPISANIE WARTOŚCI
        $("#try").focus();                  // PRZYWRÓCENIE FOCUSA NA TEXTAREA!
    });
    
    // Działa w insert  do dodania znaków "≠", "<=>" i "=="
    $('button.butt_insert_znaki').click(function(){ // Akcja po kliknięciu klawiszy literek w TEST.php
        var letter = $(this).attr('value')  // pobranie vartości klawisza klikniętego (literka np.: ą, ć itd
//        alert(letter);
        if(letter == "transitivt; " || letter == "intransitivt; "){
//            alert("is trans: "+letter)
            temp = letter + $('#uwagi_ta').val();      // pobranie wartośi wprowadzanych i dodanie literki
        }else{
//            alert("is NOT trans: "+letter)
            temp = $('#uwagi_ta').val()+letter;      // pobranie wartośi wprowadzanych i dodanie literki
        }

        //temp = $('#uwagi_ta').val()+letter;      // pobranie wartośi wprowadzanych i dodanie literki
//        alert(temp);
        $('#uwagi_ta').val(temp);                // PRZEPISANIE WARTOŚCI
        $("#uwagi_ta").focus();                  // PRZYWRÓCENIE FOCUSA NA TEXTAREA!
    });
    
        // Działa w  edit do dodania znaków "≠", "<=>" i "=="
    $('button.butt_insert_znakiEdit').click(function(){ // Akcja po kliknięciu klawiszy literek w TEST.php
        var letter = $(this).attr('value')  // pobranie vartości klawisza klikniętego (literka np.: ą, ć itd
        var stoper = letter.indexOf('_');
        var text = letter.substr(0,stoper)
        var index = letter.substr(stoper+1);
//        alert(stoper);
//        alert(index);
//        alert(text);
        if(text == "transitivt; " || text == "intransitivt; "){
                temp = text + $('#uwagi_ta_'+index).val();      // pobranie wartośi wprowadzanych i dodanie literki
        }else{
            temp = $('#uwagi_ta_'+index).val()+text;      // pobranie wartośi wprowadzanych i dodanie literki
        }
//        temp = $('#uwagi_ta_'+index).val()+text;      // pobranie wartośi wprowadzanych i dodanie literki
//        alert(temp);
        $('#uwagi_ta_'+index).val(temp);                // PRZEPISANIE WARTOŚCI
        $('#CBedit_'+index).prop('checked', true);               // PRZEPISANIE WARTOŚCI
        $("#uwagi_ta_"+index).focus();                  // PRZYWRÓCENIE FOCUSA NA TEXTAREA!
    });
    
    var NrGrupy = 1;
    $('#typ').change(function(){        // Po zmianie typu nastepuje m.in. powiązanie różnych autouzupełnienć do pola "trans"
//        $('#resetFormIndex').click();
        $('#trans').unbind();
        $('#grupa').unbind();
        var grupAll             = ['verb:gr1_ar','verb:gr2A_er/de','verb:gr2B_er/te_ptksx',
                                'verb:gr3_kort_r/dd,tt','verb:gr4_starka','verb:gr4_oregel','verb:gr5_deponens',
                                'noun:gr1_or+na','noun:gr2_ar+na','noun:gr3_er/r+na',
                                'noun:gr4_n+a','noun:gr5__+en/na','noun:b.lm.','noun:b.l.poj.','noun:nieregularny',
                                'mer/mest', 'nieodmienny','bez stopniowania'];
                            
        var grupNotAdjective    = ['verb:gr1_ar','verb:gr2A_er/de','verb:gr2B_er/te_ptksx',
                                'verb:gr3_kort_r/dd,tt','verb:gr4_starka','verb:gr4_oregel','verb:gr5_deponens',
                                'noun:gr1_or+na','noun:gr2_ar+na','noun:gr3_er/r+na',
                                'noun:gr4_n+a','noun:gr5__+en/na','noun:b.lm.','noun:b.l.poj.','noun:nieregularny',
                                ];
                            
        var grupNotVerb         = [ 'noun:gr1_or+na','noun:gr2_ar+na','noun:gr3_er/r+na',
                                    'noun:gr4_n+a','noun:gr5__+en/na','noun:b.lm.','noun:b.l.poj.','noun:nieregularny',
                                    'mer/mest', 'nieodmienny','bez stopniowania'];

        var grupNotNoun         = ['verb:gr1_ar','verb:gr2A_er/de','verb:gr2B_er/te_ptksx',
                                'verb:gr3_kort_r/dd,tt','verb:gr4_starka','verb:gr4_oregel','verb:gr5_deponens',
                                'mer/mest', 'nieodmienny','bez stopniowania']                     
                                
        var typ_val = $('#typ').val();
        console.log("TYP: "+typ_val);
        switch(typ_val){
            case 'deponens':
                alert('deponens')
            case 'hjalp_verb':
            case 'modal_verb':
            case 'partikelverb':
            case 'reflexivaverb':
            case 'verb':
                
                // Wyłącza opcje w polu grupy dla innych niż czasowniki
                for (i=0; i < grupAll.length; i++){
                    $('#grupa option[value="'+grupAll[i]+'"]').show();
                }
                for (i=0; i < grupNotVerb.length; i++){
                    $('#grupa option[value="'+grupNotVerb[i]+'"]').hide();
                }

                $('#grupa').bind({
                    change:function(){
                        var grouppa = $('#grupa :selected').val();
                        NrGrupy = locateGroup(grouppa);
                        ordTypp = locateOrdTyp(grouppa);

                        if(ordTypp == "verb"){       // sprawdza część mowy
                            var trans = $('#trans').val();
                            if (trans != ""){       // jak jest puste żeby nie robił bez sensu końcówek
                                autoVerb(trans, NrGrupy);
                            }
                        }                        
                    }
                });
                
                $('#rodzaj').val('att');

                break;
                
            case 'noun':    // tutaj robimy (NIE SKOŃCZONE!!!) obsługę autouzupełniania.

                // Wyłącza opcje w polu grupy dla innych niż rzeczowniki
                for (i=0; i < grupAll.length; i++){
                    $('#grupa option[value="'+grupAll[i]+'"]').show();
                }
                for (i=0; i < grupNotNoun.length; i++){
                    $('#grupa option[value="'+grupNotNoun[i]+'"]').hide();
                }                
                
                $('#grupa').change(function(){
                    var grouppa = $('#grupa :selected').val();
                    var trans = $('#trans').val();
                    var rodzaj = $('#rodzaj').val();
                    NrGrupy = locateGroup(grouppa); 
                    typOrd = locateOrdTyp(grouppa);
                                                 
                    if(typOrd == "noun"){       // sprawdza część mowy
//                        alert("NOUN")
                        if (trans != ""){       // jak jest puste żeby nie robił bez sensu końcówek
                            if(rodzaj != ""){
                                console.log("NIE PUSTE:\ngroupa:"+grouppa+"\nNrGrupy:"+NrGrupy+"\ntrans:"+trans+"\nrodzaj:"+rodzaj)
                                alert("1444. NIE PUSTE:\ngroupa:"+grouppa+"\nNrGrupy:"+NrGrupy+"\ntrans:"+trans+"\nrodzaj:"+rodzaj)
//                                autoNoun(trans, NrGrupy);
                                autoNoun(trans, NrGrupy, rodzaj)
                            }else{
//                                alert("Pusty rodzaj!!");
                                autoNoun(trans, NrGrupy, 0)
                                // dwie opcje: 1) event => zmaiana rodzaju, albo 2) autouzupełnienie rodzaju!
                            }
                        }else{
                            console.log("PUSTE:\ngroupa:"+grouppa+"\nNrGrupy:"+NrGrupy+"\ntrans:"+trans+"\nrodzaj:"+rodzaj)
                        }
                    }
                });
                   
                 $('#rodzaj2').change(function(){
                     alert("rodzaj 2 - linia1543")
                     var rodzaj_val = $('#rodzaj').val().toString();
                     var S_indefinite = $('#S_indefinite').val().toString();
                     var trans = $('#trans').val();
                     console.log('rodzaj_val:   '+rodzaj_val);
                     console.log('S_indefinite: '+S_indefinite);
                     console.log('trans: '+trans);
                     
                    
                     switch(rodzaj_val){
                         case 'en':
                             if(S_indefinite == ''){
                                 alert("1. Case EN, S_indefinite == ''");
                                $('#S_indefinite').val('en ');
                                var grouppa = $('#grupa :selected').val();
                                NrGrupy = locateGroup(grouppa);
//                                $('#S_indefinite').val('en '+trans);
                                autoNoun(trans, rodzaj_val, NrGrupy);
                                
                             }else{
                                 alert("2. Case EN, S_indefinite != ''");
                                var arr = S_indefinite.split(' ')
                                switch(arr[0]){     // sprawdzanie czy już cos nie stoii tam jako rodzajnik!
                                    case 'ett':
//                                        alert("2a. Case EN, S_indefinite != '', Case ett");
                                        var text = S_indefinite.substring(4);    // czyli to co jest poza ett lub en
                                        console.log('text: '+text);
                                         $('#S_indefinite').val('en '+text);
                                         console.log("text"+text);
//                                         $('#S_definite').val(text+'en');
                                        break;
                                    case 'en':
//                                        alert("2b. Case EN, S_indefinite != '', Case en - pusty");
//                                        $('#S_indefinite').val(S_indefinite+'OK');
                                        break;
                                    case 'en/ett':
//                                        alert("2c. Case EN, S_indefinite != '', Case en/ett");
                                        var text = S_indefinite.substring(6);   // czyli to co jest poza ett lub en
                                        $('#S_indefinite').val('en'+ text);
//                                        $('#S_definite').val(text+'en');
                                        break;
                                    default:
//                                        alert("2d. Case EN, S_indefinite != '', default");
                                        $('#S_indefinite').val('en '+S_indefinite); 
//                                        $('#S_definite').val(S_indefinite+'en'); 
                                        break;
                                }
                             }
                             break;
                         case 'ett':
//                             alert("3. Case ETT,");
                             if(S_indefinite == ''){
//                                 alert("3a. Case ETT, S_indefinite == ''");
                                $('#S_indefinite').val('ett ');
                             }else{
//                                 alert("3b. Case ETT, S_indefinite != ''");
                                var arr = S_indefinite.split(' ')
                                switch(arr[0]){      // sprawdzanie czy już cos nie stoii tam jako rodzajnik!
                                    case 'en':
//                                        alert("3b1. Case ETT, S_indefinite != '', case en");
                                        var text = S_indefinite.substring(3);    // czyli to co jest poza ett lub en
//                                        console.log('text: '+text);
                                         $('#S_indefinite').val('ett '+text);
//                                         $('#S_definite').val(text+'et');
                                        break;
                                    case 'ett':
//                                        alert("3b2. Case ETT, S_indefinite != '', case ett");
//                                        $('#S_indefinite').val(S_indefinite+'OK');
//                                        $('#S_definite').val(S_indefinite+'etOK');
                                        break;
                                    case 'en/ett':
//                                        alert("3b3. Case ETT, S_indefinite != '', case en/ett");
                                        var text = S_indefinite.substring(6); // czyli to co jest poza ett lub en
                                        $('#S_indefinite').val('ett'+ text);
//                                        $('#S_definite').val(text+'et');
                                        break;
                                    
                                    default:
//                                        alert("3b4. Case ETT, S_indefinite != '', default");
                                        $('#S_indefinite').val('ett '+S_indefinite); 
//                                        $('#S_definite').val(S_indefinite+'et'); 
                                        break;
                                }
                             }
                             break;

                         default:
                             if(S_indefinite == ''){
                                $('#S_indefinite').val('en/ett');
                             }else{
                                $('#S_indefinite').val('en/ett '+S_indefinite); 
                             }
                             break
                     }
                 });  
                
                break; // KONIEC NOUN!!!!
                
            case 'adjective':
                
                // Wyłącza/Włącza opcje w polu grupy dla innych niż przymiotniki
                for (i=0; i < grupAll.length; i++){
                    $('#grupa option[value="'+grupAll[i]+'"]').show();
                }
                for (i=0; i < grupNotAdjective.length; i++){
                    $('#grupa option[value="'+grupNotAdjective[i]+'"]').hide();
                }                 
                console.log('typ_val:'+typ_val);
                
                 // to działa od razu jak sie zmieni TYP na adjektiv
                 var trans = $('#trans').val();
                 var group = $('#grupa').val();
                 console.log('trans: '+trans+'/ntyp_val'+typ_val);
                 autoAdjectiv(trans,group);

                // to działa jak sie zmieni grupę danego słowa np. nieodmienny, bez stopniowania itp
                $('#grupa').change(function(){
                        trans = $('#trans').val();
                        group = $('#grupa').val();
                        console.log('trans: '+trans+'/ntyp_val'+typ_val);
                        autoAdjectiv(trans,group);
                });
                
                // to działa przy pisaniu w polu trans(jest "odpiete" przy zmianie na inny TYP oraz w resetFormIndex())
                $('#trans').bind({
                    'change':function(){  // AUTOUZUPEŁNIANIE pól przymiotnika
                        trans = $('#trans').val();
                        group = $('#grupa').val();
                        console.log('trans: '+trans+'/ntyp_val'+typ_val);
                        autoAdjectiv(trans,group); 

                        },
                    'keyup': function(){  // AUTOUZUPEŁNIANIE pól przymiotnika
                        trans = $('#trans').val();
                        group = $('#grupa').val();
                        console.log('trans: '+trans);
                        autoAdjectiv(trans,group); 
                    }
                });
                break;
            default:
                // Wyłącza/Włącza opcje w polu grupy dla innych niż przymiotniki
                for (i=0; i < grupAll.length; i++){
                    $('#grupa option[value="'+grupAll[i]+'"]').show();
                }                
                $('#rodzaj').val('');
                $('#trans').unbind();
                break;
        }
    });
    $('#sercz_btn').click(function(){
       $('#sercz').empty();
    });
    $('#sercz_dok_btn').click(function(){
       $('#sercz_dok').empty();
    });
    
    $('table.edit_table').change(function(){ // W Edytuj wszystkie!
        var ID = $(this).attr('id');
        var pos1 = ID.search("_")
        nID = ID.slice(pos1+1);   // e.g.: 345
//        alert("fun.js948 id="+nID)
        $('#CBedit_'+nID).prop('checked', true);
        
        var checkedVals = $('.edit_checkbox:checkbox:checked').map(function() {
        return this.value;
        }).get();
//        alert(checkedVals.join(","));
        
//        $( "#form_ord_"+nID ).submit(function( event ) {
//            event.preventDefault();
//            console.log( $( this ).serialize() );
//        });
//        
        // Find disabled inputs, and remove the "disabled" attribute
//        $("#id_"+nID).removeAttr('disabled');
//        alert(disabled);

        // serialize the form
        var serialized = $("#form_ord_"+nID).serialize();

        // re-disabled the set of inputs that you previously enabled
//        $("#id_"+nID).attr('disabled','disabled');
        $("#ta_ser_"+nID).text(serialized);
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
                    $('#kategoria_edit_val_'+nID).val(values)
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
