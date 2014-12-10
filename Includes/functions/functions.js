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
    switch(group){
        case 'bez stopniowania':
            $('#neuter').val(trans+'t');
            $('#masculin').val(trans+'e');
            $('#plural').val(trans+'a');
//            $('#st_rowny').val(trans);

        case 'nieodmienny':
            break;
        default:
            $('#neuter').val(trans+'t');
            $('#masculin').val(trans+'e');
            $('#plural').val(trans+'a');
            $('#st_rowny').val(trans);
            $('#st_wyzszy').val(trans+'are');
            $('#st_najwyzszy').val(trans+'ast, '+trans+'aste');
            break;
    }

}

// Ta funkcja złuży do auto uzupełniania pól dla VERB
function autoVerb(trans, group) {
    
    var ogon = "";
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
    
    trans = trans.trim();           // obcina białe znaki!!
       
    transVB = trans.split(" ");     // np.: gå ner - partikelverb!!!
    trans = transVB[0];             // goły verb
    var infi = trans;               // zachowane dla infinitiv

    if(transVB.length > 1){         // partikel verby itp!!!
        for(i=1;i<transVB.length;i++)
            ogon += " "+transVB[i]; // stworzenie "ogona": på till över itp
    }
    
    var ostLett = trans.slice(trans.length-1)   // ostatnia litera gołego verba
    ostLettIMPER = ostLett;
    
    if(ostLett == 'a'){
            var indA = trans.lastIndexOf("a");
            var trans = trans.slice(0,indA); // ostateczny kształt "tematu słowa" - bez końcowego a
            ostLettIMPER = trans.slice(trans.length-1);
    }

//    alert("TEMAT słowa: "+trans+"\nostLett: "+ostLett)

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
        case '1':
            valider = 1;
            
            if(ostLett == 'a'){
//                alert("ostA =" +ostLett)
                validA = 'a';
            }else{
//                alert("NIE ostA "+ostLett)
                validA = '';
            }
            
            Kpres = 'r';
            Kpret = 'de';
            Ksupi = 't';
//            Kprespart = 'nde';
            Kpretpart = 'd'; 
//            Kpas_presens = ', '+trans+validA+'e'+Kpassiv+ogon;
            break;
            
        case '2A':
            valider = 1;

            switch(ostLettIMPER){
                case 'r':
                    break;
                default:
                    Kpres = 'er';
                    break;
            }
            
            Kpret = 'de';
            Ksupi = 't';
//            Kprespart = 'ande';
            Kpretpart = 'd'; 
            Kpas_presens = ', '+trans+validA+'e'+Kpassiv+ogon;
            break;
        case '2B':
            valider = 1;
//            trans = trans2;
            
            Kpres = 'er';
            Kpret = 'te';
            Ksupi = 't';
//            Kprespart = 'ande';
            Kpretpart = 'd'; 
            Kpas_presens = ', '+trans+validA+'e'+Kpassiv+ogon;
            break;
        case '3':       // kort
            valider = 1;
//            trans = trans2;
            
            Kpres = 'r';
            Kpret = 'dde';
            Ksupi = 'tt';
//            Kprespart = 'ande';
            Kpretpart = 'dd'; 
            Kpas_presens = ', '+trans+validA+'e'+Kpassiv+ogon;
            break;
        case '4':       // kort
            valider = 1;
            
            Kpres = 'er';
//            Kpret = '';
            Ksupi = 'it';
//            Kprespart = 'ande';
            Kpretpart = 'd/en'; 
            
            $('#supine').change(function(){
                supine =  $('#supine').val();
                $('#pas_supine').val(supine+'s');
            });
            
            $('#past').change(function(){
                past =  $('#past').val();
                $('#pas_preterite').val(past+'s');
            });
            
            Kpas_presens = ', '+trans+validA+'e'+Kpassiv+ogon;
            
            break;
        default:
            valider = 0;
            break;
    }
    
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
    
        if(infinitive == 0)          $('#infinitive').val           (Kinfi+infi+ogon);
        if(presens == 0)             $('#presens').val              (trans+validA+Kpres+ogon);
        if(past == 0)                $('#past').val                 (trans+validA+Kpret+ogon);
        if(supine == 0)              $('#supine').val               (trans+validA+Ksupi+ogon);
        if(imperative == 0)          $('#imperative').val           (trans+validA+ogon+Kimpe);
        if(present_participle == 0)  $('#present_participle').val   (trans+Kprespart+ogon+', '+trans+Kprespart+Kpassiv+ogon);
        if(past_participle == 0)     $('#past_participle').val      (trans+validA+Kpretpart+ogon);
        
        if(pas_infinitive == 0)     $('#pas_infinitive').val        (trans+validA+Kpassiv+ogon);
        if(pas_presens == 0)        $('#pas_presens').val           (trans+validA+Kpassiv+ogon+Kpas_presens);
//        if(pas_presens == 0)        $('#pas_presens').val(trans+validA+Kpres+Kpassiv+ogon);
        if(pas_preterite == 0)      $('#pas_preterite').val         (trans+validA+Kpret+Kpassiv+ogon);
        if(pas_supine == 0)         $('#pas_supine').val            (trans+validA+Ksupi+Kpassiv+ogon);
//        if(pas_imperative == 0)     $('#pas_imperative').val(trans+Kpretpart+Kpassiv+ogon);
    
        console.log(
            "infinitive: "+Kinfi+trans+ogon+"\n"
            +"presens: "+trans+Kpres+ogon+"\n"
            +"past: "+trans+Kpret+ogon+"\n"
            +"supine: "+trans+Ksupi+ogon+"\n"
            +"imperative: "+trans+ogon+Kimpe+"\n"
            +"present_participle: "+trans+Kprespart+ogon+"\n"
            +"past_participle: "+trans+Kpretpart+ogon+"\n"
    
            +"pas_infinitive: "+Kinfi+trans+Kpassiv+ogon+"\n"
            +"pas_presens: "+trans+Kpres+Kpassiv+ogon+"\n"
            +"pas_preterite: "+trans+Kpret+Kpassiv+ogon+"\n"
            +"pas_supine: "+trans+Ksupi+Kpassiv+ogon+"\n"
            +"pas_imperative: "+trans+Kpretpart+Kpassiv+ogon
        );
    }
}

function autoNoun(trans, group, rodzaj) {
    trans = trans.trim();           // obcina białe znaki!!
    var OBSI = trans;
    var ostLett = trans.slice(trans.length-1)
//    alert(ostLett)
    if(ostLett == 'a'){
            var indA = trans.lastIndexOf("a");
            var trans = trans.slice(0,indA); // ostateczny kształt "tematu słowa" - bez końcowego a
//            ostLettIMPER = trans.slice(trans.length-1);
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
        konc = 0;
    }
    transPL = trans;
    var koncPL = '';
    
    switch(group){
        case "1":

            group = 'or';
            konc = 'en';
            koncPL = 'na';
            if(konVal==true) 
                $('#rodzaj option[value=en]').attr('selected','selected');
        break;
        case '2':
            group = 'ar';
            konc = 'en';
            koncPL = 'na';
            if(konVal==true) 
                $('#rodzaj option[value=en]').attr('selected','selected');
        break;
        case '3':
            group = 'er';
            konc = 'en';
            koncPL = 'na';
            if(konVal==true) 
                $('#rodzaj option[value=en]').attr('selected','selected');
        break;
        case '4':
            group = 'n';
            koncPL = 'a';
            if(konVal==true) 
                $('#rodzaj option[value=ett]').attr('selected','selected');
        break;
        case '5':
            group = '';
            koncPL = 'na/en';
            if(konVal==true) 
                $('#rodzaj option[value=ett]').attr('selected','selected');
        break;
        case "b.lm.":
            alert("TUTUTUTU!! 6")
            group = '';
            konc = '';
//            $('#rodzaj').val("ett");
            koncPL='an/na';
        break;
        case "oregelbund":
            alert("TUTUTUTU!! 7")
            group = '';
//            $('#rodzaj').val("ett");
            koncPL='na/an';
        break;
        default:
            alert("TUTUTUTU!! 8")
            $('#rodzaj select').val("ett");
            $('#form1.rodzaj select').val("ett");
            transPL='';
            group='';
            koncPL='';
        break;
    }
    console.log('trans: '+trans+'/ngroup: '+group+'/nkonc: '+konc);
    
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
        $('#trans').unbind();
        $('#grupa').unbind();
        $('#past').unbind();
        $('#supine').unbind();
//        $('#sercz').val(' '); 
//        $('#sercz_dok').val('ala');
    }),
    
    $('button.butt_diak').click(function(){ // Akcja po kliknięciu klawiszy literek w TEST.php
        var letter = $(this).attr('value')  // pobranie vartości klawisza klikniętego (literka np.: ą, ć itd
        temp = $('#try').val()+letter;      // pobranie wartośi wprowadzanych i dodanie literki
        $('#try').val(temp);                // PRZEPISANIE WARTOŚCI
        $("#try").focus();                  // PRZYWRÓCENIE FOCUSA NA TEXTAREA!
    });
    
    var NrGrupy = 1;
    $('#typ').change(function(){        // Po zmianie typu nastepuje m.in. powiązanie różnych autouzupełnienć do pola "trans"
//        $('#resetFormIndex').click();
        $('#trans').unbind();
        $('#grupa').unbind();
        var typ_val = $('#typ').val();
        console.log("TYP: "+typ_val);
        switch(typ_val){
            case 'hjalp_verb':
            case 'modal_verb':
            case 'partikelverb':
            case 'verb':

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
                
//                $('#trans').bind({
//                    'change':function(){  // AUTOUZUPEŁNIANIE pól 
//                        var trans = $('#trans').val();
////                        autoVerb(trans, NrGrupy) 
//                        },
//                    'keyup': function(){  // AUTOUZUPEŁNIANIE pól 
//                        var trans = $('#trans').val();
////                        var grouppa = $('#grupa :selected').val();
////                        var NrGrupy = locateGroup(grouppa);
////                        alert(trans+NrGrupy)
////                        autoVerb(trans, NrGrupy) 
//                    }
//                });
////                $('#trans').change(function(){
////                    trans = $('#trans').val();
////                })
                $('#rodzaj').val('att');

                break;
                
            case 'noun':    // tutaj robimy (NIE SKOŃCZONE!!!) obsługę autouzupełniania.
                
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
                     var rodzaj_val = $('#rodzaj').val().toString();
                     var S_indefinite = $('#S_indefinite').val().toString();
                     var trans = $('#trans').val();
                     console.log('rodzaj_val:   '+rodzaj_val);
                     console.log('S_indefinite: '+S_indefinite);
                     console.log('trans: '+trans);
                     
                    
                     switch(rodzaj_val){
                         case 'en':
                             if(S_indefinite == ''){
//                                 alert("1. Case EN, S_indefinite == ''");
                                $('#S_indefinite').val('en ');
                                var grouppa = $('#grupa :selected').val();
                                NrGrupy = locateGroup(grouppa);
//                                $('#S_indefinite').val('en '+trans);
                                autoNoun(trans, rodzaj_val, NrGrupy);
                                
                             }else{
//                                 alert("2. Case EN, S_indefinite != ''");
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
                console.log('typ_val:'+typ_val)
//                $('#rodzaj').val('att');
//                $('#trans').keypress(function(){
                $('#trans').bind({
                    'change':function(){  // AUTOUZUPEŁNIANIE pól przymiotnika
                        var trans = $('#trans').val();
                        var group = $('#grupa').val();
                        console.log('trans: '+trans+'/ntyp_val'+typ_val);
                        autoAdjectiv(trans,group); 

                        },
                    'keyup': function(){  // AUTOUZUPEŁNIANIE pól przymiotnika
                        var trans = $('#trans').val();
                        var group = $('#grupa').val();
                        console.log('trans: '+trans);
                        autoAdjectiv(trans,group); 
                    }
                });
                break;
            default:
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
