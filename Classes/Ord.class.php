<?php
/* * **************************************************
 * Project:     Svenska
 * Filename:    Ord.class.php
 * Encoding:    UTF-8
 * Created:     2014-06-24, 23:19
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */

/**
 * Description of Ord
 *
 * @author Bartosz Lewiński
 */
class Ord {
    
    private $id;
    private $id_ord;
    private $typ;
    private $rodzaj;
    private $grupa;
    private $trans;
    private $infinitive;
    private $presens;
    private $past;
    private $supine;
    private $imperative;
    private $present_participle;
    private $past_participle;
    
    private $pas_infinitive;
    private $pas_presens;
    private $pas_preterite;
    private $pas_supine;
    private $pas_imperative;

    private $S_indefinite;
    private $S_definite;
    private $P_indefinite;
    private $P_definite;
    private $neuter;
    private $masculin;
    private $plural;
    private $st_rowny;
    private $st_wyzszy;
    private $st_najwyzszy;
    private $glowny;
    private $porzadkowy;
    private $ulamek;
    
    private $wymowa;
    private $kategoria;
    private $uwagi;
    private $linki;

    private $table = "ord";
    private $prezentuj = 20;    // określa ilość prezentowanych wyników dla:  LIMIT 0, $prezentuj
                                //  getSimOrdByIdOrd($text); 
                                //  getSimOrdByTrans($text);
    
    private $group =    array(  '',
//                                'verb_ar','verb_er','verb_er_ptks','starka_verb','kortverben','irregular',
                                'verb:gr1_ar','verb:gr2A_er/de','verb:gr2B_er/te_ptksx',
                                'verb:gr3_kort_r/dd,tt','verb:gr4_starka','verb:gr4_oregel','verb:gr5_deponens',
//                                'noun_or','noun_ar','noun_er','noun__');
                                'noun:gr1_or+na','noun:gr2_ar+na','noun:gr3_er/r+na',
                                'noun:gr4_n+a','noun:gr5__+en/na','noun:b.lm.','noun:b.l.poj.','noun:nieregularny',
                                'mer/mest', 'nieodmienny','bez stopniowania','adj:nieregularny');

    private $group_verb =   array(  '',
                                'verb:gr1_ar','verb:gr2A_er/de','verb:gr2B_er/te_ptksx','verb:gr5_deponens',
                                'verb:gr3_kort_r/dd,tt','verb:gr4_starka');
    
//    private $category = array(  'brak', 'abstr.',
    private $category = array(  'abstr.','mitologia','sztuka','muzyka','literatura',
                                'ludzie','rodzina','cialo','emocje','zdrowie','dom','jedzenie','zawody','praca','sport','wydarzenia', 
                                'przyroda','religia','nauka','technika','medycyna','geografia','matematyka','informatyka_categ','polityka','prawo','sztuka',
                                'ekonomia','miary','miejsca','czas','kosmos','kolory','szkoła','konie','filozofia','psychologia',
                                'przedmioty','narzedzia','urządzenia','instrumenty','telefon','biuro','ubrania','jezyki',
                                'gramatyka','pytajnik','idiom','przysłowie','zart','wulgarne','potoczne','uzupelnic');
    
    public function setDataFakeForTest($id_ord, $typ, $rodzaj, $grupa, $trans, 
                            $infinitive, $presens, $past, $supine, $imperative, $present_participle, $past_participle, 
                            $pas_infinitive, $pas_presens, $pas_preterite, $pas_supine, $pas_imperative,
                            $S_indefinite, $S_definite, $P_indefinite, $P_definite, 
                            $neuter, $masculin, $plural, $st_rowny, $st_wyzszy, $st_najwyzszy, 
                            $glowny, $porzadkowy,$ulamek,
                            $wymowa, $kategoria, $uwagi, $linki){
        
//            if(!$this->getId($id_ord)){ // blokada ponownego dodania rekordu o takim samym kluczu słownym
            
            $SQL = "INSERT INTO `".$this->table."` "
                . "(`id_ord`, `typ`, `rodzaj`, `grupa`, `trans`, "
                . "`infinitive`, `presens`, `past`, `supine`, `imperative`, `present_participle`, `past_participle`, "
                . "`pas_infinitive`, `pas_presens`, `pas_preterite`, `pas_supine`, `pas_imperative`, "
                . "`S_indefinite`, `S_definite`, `P_indefinite`, `P_definite`, "
                . "`neuter`, `masculin`, `plural`,`st_rowny`, `st_wyzszy`, `st_najwyzszy`, "
                . "`glowny`, `porzadkowy`, `ulamek`,"
                . "`wymowa`, `kategoria`, `uwagi`,`linki`) "
                . "VALUES "
                . "('".$id_ord."','".$typ."','".$rodzaj."','".$grupa."','".$trans."',"
                . "'".$infinitive."','".$presens."','".$past."','".$supine."','".$imperative."','".$present_participle."','".$past_participle."',"
                . "'".$pas_infinitive."','".$pas_presens."','".$pas_preterite."','".$pas_supine."','".$pas_imperative."',"
                . "'".$S_indefinite."','".$S_definite."','".$P_indefinite."','".$P_definite."',"
                . "'".$neuter."','".$masculin."','".$plural."','".$st_rowny."','".$st_wyzszy."','".$st_najwyzszy."',"
                . "'".$glowny."','".$porzadkowy."','".$ulamek."',"
                . "'".$wymowa."', '".$kategoria."','".$uwagi."','".$linki."');";            
        
                ?><script>alert("<?php echo $SQL; ?>")</script><?php
             
//            }
        }
        
//  Funkcja do robienia LINKU w uwadze. na podstawie słowa między => a SŁOWO ; => id
//  i przetworzenie na link postaci: <a href="#ordAnchor_4044">klä upp sig</a> (widoczne w show)  
    
    public function MakeLinkToTextarea($uwagi){
      
        $sven   = "öäåÖÄÅ";
        $pols   = "ąćęłńóśżźĆŁŚŹŻ";
        $preg0  = "[a-zA-Z$sven$pol\s]";

        $pregcon = "($preg0)+";
        $kon = "(;|\s|<|\n|\))";
        
        $preg1  = str_replace(" ","", "(=>|<==>|==|\()* $pregcon  $kon ");     // => słowo takie lub takie;    
        $pregX  = "($preg0*(\s)*)*(;|\s|\))";                                  // słowo takie lub takie;
       
        $arrIDofWordByTrans = array();
        $temp = "";
        
        preg_match_all("/$preg1/", $uwagi,$matches); 
        
        foreach($matches as $k){
            foreach($k as $v => $p){
                if($p!="" && strlen($p)>1 && strpos($temp,$p)===false){
                    $temp .= $p.",";
                }
            }
        }

        $matchesTEMP = explode(",",$temp);

        foreach($matchesTEMP as $value){
            preg_match_all("/$pregX/",$value,$word);                         // obcięcie z SubStringa '=>', '==' etc.
            
            foreach($word[0] as $val){
                $pocz = strpos($val, "(");
                $koni = strpos($val, ")");
                $sred = strpos($val, ";");

                if($pocz !== false){
                    $val = substr($val,$pocz+1);
                }
                
                if($sred !== false){
                    $val = substr($val,0,$sred);
                }
                
                if($koni !== false){
                    $val = substr($val,0,$koni);
                }

                $matches2="";
                if(strlen($val)!=0){                                        // jeśli string ma zawartość
                    
                    if(strpos($val, "att ")!==false || strpos($val, "ett ")!==false){
                        $val = substr($val, 4);                       
                    }else if(strpos($val, "en ")!==false){
                        $val = substr($val, 3);                        
                    }

                    $val_ord = trim($val);

                    $IDofWordByTrans = $this->getIdsByTrans($val_ord);      // funkcja znajduje numer rekordu w bazie jeśli jest lub false

                    if($IDofWordByTrans && !in_array($IDofWordByTrans, $arrIDofWordByTrans)){      // sprawdzamy czy jest numer i czy nie ma w $linki już takiego wyrazu             
                        array_push($arrIDofWordByTrans, $IDofWordByTrans);
                        $linki .= $IDofWordByTrans.",";  
                    }// zapisuje tylko id slowa
                    else{ 
//                        echo "<br>$val_ord NIE znaleziony";                    
                    } //if($IDofWordByTrans){   
                }else{} // if(strlen($val)!=0){   
            }
        }
        return $linki;
    }  
    
    // FUNKCJA TWORZY ciąg linków (edit.php, show.php)
    public function MakeLinks($linki, $destination){    //e.g. $linki = "123,122,125", $destination = "Edit.php?urls="
        
//        echo "<br>Linki:";
//        print_r($linki);
        $linki = explode(",",$linki);
//        print_r($linki);
        if($destination == ""){
            $destination = "Edit.php?urls=";
        }
//        echo "<br>FILE:".__FILE__;  //"Edit.php?urls=
        
        $result =  "<span class='linki_ta'  readonly>";
                foreach($linki as $value){
                    if($value != ""){
                        $ordTrans = $this->getTransById($value);
                        $result .= "<a href='".$destination.$value."' value='link".$value."'>$ordTrans</a>, ";
                    }
                }
        $result .= "</span></td>";
        return $result;
    }
    
    /* FUNKCJA TESTOWA */
    public function MakeLinkToTextarea2($uwagi){
        
//        $pregLink = "/<a href=\"([^\"]*)\">(.*)<\/a>/iU";
//        $pregLink = "/<a\s[^>]*href=\"([^\"]*)\"[^>]*>(.*)<\/a>/siU";
        
        $sven   = "öäåÖÄÅ";
        $pols   = "ąćęłńóśżźĆŁŚŹŻ";
        $preg0  = "[a-zA-Z$sven$pol\s]";

        $pregcon = "($preg0)+";
        $kon = "(;|\s|<|\n|\))(^=)";
        
        $preg1  = str_replace(" ","", "(=>|<==>|==|\()* $pregcon  $kon ");                     // => słowo takie lub takie;
//        $preg2  = str_replace(" ","", "(<=>|\()+     $pregcon  $kon ");                       // <=> słowo takie lub takie;
//        $preg3  = str_replace(" ","", "(==|\()+      $pregcon  $kon ");                       // == słowo takie lub takie;
//        $preg4 = "(;)*((\s)*$preg0*(\s)*)*(;|\s)";                     // == słowo takie lub takie;
//        $preg5  = str_replace(" ","", "(\()+      $pregcon  (=>|<=>|==|;|\s|\n)");                      // == słowo takie lub takie;
        
        $pregX  = "($preg0*(\s)*)*(;|\s|\))";                                  // słowo takie lub takie;

//        $pregADD = "((=>)|(<=>)|(==)|;|(\()).? ((\s)*($preg0)*(\s)*)*(;|\s|<)?";
        
        $arrIDofWordByTrans = array();
//        $arrk = array();
        $temp = "";
        
        if(preg_match("/$preg1/",$uwagi)){echo "<br> preg1 [<span class=red>$preg1</span>] <span class=green>MATCHES</span>"; }else{echo "<br> preg1 [<span class=red>$preg1</span>] NOT matches";}
//        if(preg_match("/$preg2/",$uwagi)){echo "<br> preg2 [<span class=red>$preg2</span>] <span class=green>MATCHES</span>"; }else{echo "<br> preg2 [<span class=red>$preg2</span>] NOT matches";}
//        if(preg_match("/$preg3/",$uwagi)){echo "<br> preg3 [<span class=red>$preg3</span>] <span class=green>MATCHES</span>"; }else{echo "<br> preg3 [<span class=red>$preg3</span>] NOT matches";}
//        if(preg_match("/$preg4/",$uwagi)){echo "<br> preg4 [<span class=red>$preg4</span>] <span class=green>MATCHES</span>"; }else{echo "<br> preg4 [<span class=red>$preg4</span>] NOT matches";}
//        if(preg_match("/$preg5/",$uwagi)){echo "<br> preg5 [<span class=red>$preg5</span>] <span class=green>MATCHES</span>"; }else{echo "<br> preg5 [<span class=red>$preg5</span>] NOT matches";}
//        if(preg_match("/$pregADD/",$uwagi)){echo "<br> pregADD [<span class=red>$pregADD</span>] <span class=green>MATCHES</span>"; }else{echo "<br> pregADD [<span class=red>$pregADD</span>] NOT matches";}
        
        echo "<br>DOPASOWANIA preg1: ";
        preg_match_all("/$preg1/", $uwagi,$macz); 
        
        foreach($macz as $k){
            foreach($k as $v => $p){
                echo "('$v' -> '$p');";
                if($p!="" && strlen($p)>1 && strpos($temp,$p)===false){
                    $temp .= $p.",";
                }
            }
        }
        
//        echo "<br>DOPASOWANIA preg2: ";
//        preg_match_all("/$preg2/", $uwagi,$macz); 
////        array_push($arrk,$macz);
////        echo "<br>";print_r($macz);echo "<br>";var_dump($macz);
////        
//        foreach($macz as $k){
//            foreach($k as $v => $p){
//                echo "('$v' -> '$p');";
//                if($p!="" && strlen($p)>1 && strpos($temp,$p)===false){
//                    $temp .= $p.",";
//                }
//            }
//        }
//        echo "<br>DOPASOWANIA preg3: ";
//        preg_match_all("/$preg3/", $uwagi,$macz); 
////        array_push($arrk,$macz);
////        echo "<br>";print_r($macz);echo "<br>";var_dump($macz);
//        
//        foreach($macz as $k){
//            foreach($k as $v => $p){
//                echo "('$v' -> '$p');";
//                if($p!="" && strlen($p)>1 && strpos($temp,$p)===false){
//                    $temp .= $p.",";
//                }
//            }
//        }

//        echo "<br>DOPASOWANIA preg4: ";
//        preg_match_all("/$preg4/", $uwagi,$macz); 
////        array_push($arrk,$macz);
////        echo "<br>";print_r($macz);echo "<br>";var_dump($macz);
//        
//        foreach($macz as $k){
//            foreach($k as $v => $p){
//                echo "('$v' -> '$p');";
//                if($p!="" && strlen($p)>1 && strpos($temp,$p)===false){
//                    $temp .= $p.",";
//                }                
//            }
//        }

//        echo "<br>DOPASOWANIA preg5: ";
//        preg_match_all("/$preg5/", $uwagi,$macz); 
////        array_push($arrk,$macz);
////        echo "<br>";print_r($macz);echo "<br>";var_dump($macz);
//        
//        foreach($macz as $k){
//            foreach($k as $v => $p){
//                echo "('$v' -> '$p');";
//                if($p!="" && strlen($p)>1 && strpos($temp,$p)===false){
//                    $temp .= $p.",";
//                }                
//            }
//        }
//        echo "<br>DOPASOWANIA pregADD: ";
//        preg_match_all("/$pregADD/", $uwagi,$macz); 
//        echo "<br>";print_r($macz);echo "<br>";var_dump($macz);
//        
//        foreach($macz as $k){
//            foreach($k as $v => $p){
//                echo "('$v' -> '$p');";
//            }
//        }
        
//        preg_match_all("/$preg1|$preg2|$preg3|$preg4|$preg5/",$uwagi,$matches);               // do array $matches zapisane sa wyniki podziału stringa na fragmenty jak wyżej
        preg_match_all("/$preg1/",$uwagi,$matches);               // do array $matches zapisane sa wyniki podziału stringa na fragmenty jak wyżej
//        preg_match_all("/$pregADD/",$uwagi,$matches);               // do array $matches zapisane sa wyniki podziału stringa na fragmenty jak wyżej
//        echo "<br>MATCHES:";
//        var_dump($matches);
//        echo "<br>ARRK";
//        var_dump($arrk);
//        foreach ($matches as $v => $k){
//            foreach ($k as $t => $j){
////                echo "{[$v][$k][$t][$j]},";
//                if($j!=""){
////                    $temp .= $j.",";
//                }
//            }
//        }
        echo "<br>TEMP:($temp)<br>";
        $matchesTEMP = explode(",",$temp);
        echo "<br>MATCHES TEMP:";var_dump($matchesTEMP);
        echo "<br>MATCHES ZERO:";var_dump($matches[0]);
        
//        foreach($matches[0] as $value){
        $licznik0 = 0;
        foreach($matchesTEMP as $value){
           
            if(preg_match("/$pregX/",$value)){echo "<br> pregX [<span class=red>$pregX</span>] na [$value] <span class=green>MATCHES</span>"; }else{echo "<br> pregX [<span class=red>$pregX na [$value] </span>] NOT matches";}
            preg_match_all("/$pregX/",$value,$word);                         // obcięcie z SubStringa '=>', '==' etc.
            echo "<br>Po PREGX: '$value' => '".$word[0][$licznik0]."'";
            foreach($word[0] as $val){
                
//                echo "<br>VAL przed: $val";
                
                $pocz = strpos($val, "(");
                $koni = strpos($val, ")");
                $sred = strpos($val, ";");
//                $leng = strlen($val);
                
//                echo "<br>VAL przed: $val i pocz=$pocz, koni=$koni i leng=$leng";
                
                if($pocz !== false){
                    
//                    echo "<br>PRZED POCZ=".$pocz." , $val";
                    $val = substr($val,$pocz+1);
//                    echo "<br>PO POCZ=$pocz, $val";
                }
                
                if($sred !== false){
//                    echo "<br>PRZED KONI=".$sred." , $val";
                    $val = substr($val,0,$sred);
//                    echo "<br>PO KONI=".$sred." , $val";
                }
                
                if($koni !== false){
//                    echo "<br>PRZED KONI=".$koni." , $val";
                    $val = substr($val,0,$koni);
//                    echo "<br>PO KONI=".$koni." , $val";
                }

//                echo "<br>VAL PO: $val";
                $matches2="";
                if(strlen($val)!=0){                                        // jeśli string ma zawartość
                    
                    $prex = "/(?![att|en|ett])(\s)*[[:alnum:]åöä\s]*/i";
                    
                    if(preg_match($prex, $val,$matches2)){
//                      print_r($matches2);
//                        echo "<br>PREX pasi: ".$matches2[0]."<br>";
                    }else{
//                        echo "<br>PREX nie pasi<br>";
                    }

                    if(strpos($val, "att ")!==false || strpos($val, "ett ")!==false){
//                        echo "<br>PREX2 att lub ett pasi: ($val)";
                        $val = substr($val, 4);
//                        echo "PO: ($val)<br>";
                        
                    }else if(strpos($val, "en ")!==false){
                        $val = substr($val, 3);
//                        echo "<br>PREX2 'en' pasi<br>";
                        
                    }else{
//                        echo "<br>PREX2 'att' lub 'ett' lub'en' NIE pasi<br>";
                    }

//                    print_r($matches2);
//                    echo "<br> PO PREX: $val";
//                    $val_ord = trim(substr($val,0,-1));
                    $val_ord = trim($val);
                    echo "<br>FINAL: '$val'";
//                    echo "<br>Znajdz numer $val_ord:";
                    $IDofWordByTrans = $this->getIdsByTrans2($val_ord);      // funkcja znajduje numer rekordu w bazie jeśli jest lub false
//                    echo "<br>Numer $val_ord: $IDofWordByTrans";
                    // WERSJA 1
                    if($IDofWordByTrans && !in_array($IDofWordByTrans, $arrIDofWordByTrans)){      // sprawdzamy czy jest numer i czy nie ma w $linki już takiego wyrazu             
                        array_push($arrIDofWordByTrans, $IDofWordByTrans);
                        $linki .= $IDofWordByTrans.",";  
                    }// zapisuje tylko id slowa
                    
                    // WERSJA 2
//                    if($IDofWordByTrans && !in_array($IDofWordByTrans, $arrIDofWordByTrans)){      // sprawdzamy czy jest numer i czy nie ma w $linki już takiego wyrazu             
////                        if(!in_array($IDofWordByTrans, $arrIDofWordByTrans)){ /*daje błąd jeśli wystąpi podobny zbitek liter np.: ord, anchor, kyl i kylskåp*/
//                            array_push($arrIDofWordByTrans, $IDofWordByTrans);
//                            $linki .= "<a href=#ordAnchor_".$IDofWordByTrans."\>".$val_ord."</a>, ";
////                        }else{
//                            /*Taki numer występuje już w linku*/
////                        }
////                        $linki .= "<a href=#ordAnchor_".$IDofWordByTrans."\>".$val_ord."</a>; ";
//                    }
                    
                    else{ 
//                        echo "<br>$val_ord NIE znaleziony";                    
                    } //if($IDofWordByTrans){   
                }else{} // if(strlen($val)!=0){   
            }
        }
        return $linki;
    }   

    
    public function setData($id_ord, $typ, $rodzaj, $grupa, $trans, 
                            $infinitive, $presens, $past, $supine, $imperative, $present_participle, $past_participle, 
                            $pas_infinitive, $pas_presens, $pas_preterite, $pas_supine, $pas_imperative,
                            $S_indefinite, $S_definite, $P_indefinite, $P_definite, 
                            $neuter, $masculin, $plural, $st_rowny, $st_wyzszy, $st_najwyzszy, 
                            $glowny, $porzadkowy,$ulamek,
                            $wymowa, $kategoria,$uwagi,$linki){
        
        if(!$this->getId($id_ord)){ // blokada ponownego dodania rekordu o takim samym kluczu słownym
//        if(true){
            
            $SQL = sprintf("INSERT INTO `".$this->table."` "
                . "(`id_ord`, `typ`, `rodzaj`, `grupa`, `trans`, "
                . "`infinitive`, `presens`, `past`, `supine`, `imperative`, `present_participle`, `past_participle`, "
                . "`pas_infinitive`, `pas_presens`, `pas_preterite`, `pas_supine`, `pas_imperative`, "
                . "`S_indefinite`, `S_definite`, `P_indefinite`, `P_definite`, "
                . "`neuter`, `masculin`, `plural`,`st_rowny`, `st_wyzszy`, `st_najwyzszy`, "
                . "`glowny`, `porzadkowy`, `ulamek`,"
                . "`wymowa`, `kategoria`,`uwagi`,`linki`) "
                . "VALUES "
                . "('".$id_ord."','".$typ."','".$rodzaj."','".$grupa."','".$trans."',"
                . "'".$infinitive."','".$presens."','".$past."','".$supine."','".$imperative."','".$present_participle."','".$past_participle."',"
                . "'".$pas_infinitive."','".$pas_presens."','".$pas_preterite."','".$pas_supine."','".$pas_imperative."',"
                . "'".$S_indefinite."','".$S_definite."','".$P_indefinite."','".$P_definite."',"
                . "'".$neuter."','".$masculin."','".$plural."','".$st_rowny."','".$st_wyzszy."','".$st_najwyzszy."',"
                . "'".$glowny."','".$porzadkowy."','".$ulamek."',"
                . "'".$wymowa."', '".$kategoria."', '".$uwagi."', '".$linki."');");            
        
            if (mysql_query($SQL)){
//                echo "<br>".t("WSADZONE do ord!!!");
                
                $id_LH = $this->getLastId(false)+1;
                $id_LH = $this->getId($id_ord);
//                echo "<br>ID:".$id_LH;
            
                $SQL_PLLH = sprintf("INSERT INTO `".$this->table."LH` "
                    . "(`id`, `id_ord`, `typ`, `rodzaj`, `grupa`, `trans`, "
                    . "`infinitive`, `presens`, `past`, `supine`, `imperative`, `present_participle`, `past_participle`, "
                    . "`pas_infinitive`, `pas_presens`, `pas_preterite`, `pas_supine`, `pas_imperative`,"
                    . "`S_indefinite`, `S_definite`, `P_indefinite`, `P_definite`, "
                    . "`neuter`, `masculin`, `plural`,`st_rowny`, `st_wyzszy`, `st_najwyzszy`, "
                    . "`glowny`, `porzadkowy`,`ulamek`, "
                    . "`wymowa`, `kategoria`, `uwagi`, `linki`) "
                    . "VALUES "
                    . "('".$id_LH."', '".$this->setSQLstringToCode($id_ord)."','".$typ."','".$rodzaj."','".$grupa."','".$this->setSQLstringToCode($trans)."',"
                    . "'".$this->setSQLstringToCode($infinitive)."','".$this->setSQLstringToCode($presens)."','".$this->setSQLstringToCode($past)."','".$this->setSQLstringToCode($supine)."','".$this->setSQLstringToCode($imperative)."','".$this->setSQLstringToCode($present_participle)."','".$this->setSQLstringToCode($past_participle)."',"
                    . "'".$this->setSQLstringToCode($pas_infinitive)."','".$this->setSQLstringToCode($pas_presens)."','".$this->setSQLstringToCode($pas_preterite)."','".$this->setSQLstringToCode($pas_supine)."','".$this->setSQLstringToCode($pas_imperative)."',"
                    . "'".$this->setSQLstringToCode($S_indefinite)."','".$this->setSQLstringToCode($S_definite)."','".$this->setSQLstringToCode($P_indefinite)."','".$this->setSQLstringToCode($P_definite)."',"
                    . "'".$this->setSQLstringToCode($neuter)."','".$this->setSQLstringToCode($masculin)."','".$this->setSQLstringToCode($plural)."','".$this->setSQLstringToCode($st_rowny)."','".$this->setSQLstringToCode($st_wyzszy)."','".$this->setSQLstringToCode($st_najwyzszy)."',"
                    . "'".$this->setSQLstringToCode($glowny)."','".$this->setSQLstringToCode($porzadkowy)."','".$this->setSQLstringToCode($ulamek)."',"
                    . "'".$this->setSQLstringToCode($wymowa)."','".$this->setSQLstringToCode($kategoria)."','".$this->setSQLstringToCode($uwagi)."','".$this->setSQLstringToCode($linki)."');");
//                 echo "<br>INSERT: ".$SQL_PLLH;
                if (mysql_query($SQL_PLLH)){
//                    echo "<br>".t("WSADZONE do ordLH!!!");
                }else{
//                    echo "<br>ERROR wsadu";
                    echo "<br>".__FILE__.__LINE__.t("ERROR wsadu");
                }
                
                
            }else{
//                echo "<br>ERROR wsadu";
                echo "<br>".__FILE__.__LINE__.t("ERROR wsadu").", SQL:".$SQL;
            }
            $_SESSION['test_001']="true";        
            return true;
        }else{
            $_SESSION['test_001']="false";
            $_SESSION['test_002']="true";
//            echo "<br>".__LINE__."ERROR W bazie jest!!";
            return false;
        }
    }
              
//        public function getId_ord() {
//            return $this->id_ord;
//        }
        
        public function getLastId($tabLH) {
//            if( $tabLH!=''){
//                $tabLH = $tabLH; 
//            }else{
//                $tabLH = '';
//            }
            $SQL = sprintf("SELECT max(id) FROM `".$this->table.$tabLH."`;");
            
//            echo "<br>".$SQL;
            
            $res = mysql_fetch_row(mysql_query($SQL));
            if (mysql_affected_rows()){
//            echo "<br>res[0]:".$res[0];
                return $res[0];
            }else{
                echo "<br>ERROR getLastId(false)";
                return false;
            }
        }
        
        public function getId($id_ord){
//            echo mysql_real_escape_string($id_ord);
            $SQL = sprintf("SELECT id FROM `".$this->table."` WHERE id_ord = \"".$id_ord."\";");            
            $res = mysql_fetch_row(mysql_query($SQL));
        
//            echo '<br>'.$SQL;
        
            if (mysql_affected_rows()){
//            echo "<br>res[0]:".$res[0];
                return $res[0];
            }else{
//                echo "<br>ERROR";
                return false;
            }
        } 
        
        public function getIdsByTrans($trans){
            $SQL = sprintf("SELECT id FROM `".$this->table."` WHERE `trans` = \"".$trans."\";");            
            $res = mysql_fetch_row(mysql_query($SQL));
            if (mysql_affected_rows()){
                return $res[0];
            }else{
                return false;
            }
        } 
        
        /* TEST FUNKTION (COPY of PREVIOUS f-ion*/
        public function getIdsByTrans2($trans){
            $SQL = sprintf("SELECT id FROM `".$this->table."` WHERE `trans` = \"".$trans."\";");            
            $res = mysql_fetch_row(mysql_query($SQL));

            echo '<br>'.$SQL.'<br>';
        
            if (mysql_affected_rows()){
//            echo "<br>res[0]:".$res[0];
                return $res[0];
            }else{
//                echo "<br>ERROR";
                return false;
            }
        } 
        
        public function getOrdById($id){
            $SQL = sprintf("SELECT * FROM `".$this->table."` WHERE id = \"".$id."\";"); 
//            echo "<br>SQL:".$SQL;
            $mq = mysql_query($SQL);
            
            $res = mysql_fetch_assoc($mq);
//            print_r($res);
            return $res;
        }
        
        public function getTransById($id){
            $SQL = sprintf("SELECT `trans` FROM `".$this->table."` WHERE id = \"".$id."\";"); 
//            echo "<br>SQL:".$SQL;
            $mq = mysql_query($SQL);        
            $res = mysql_fetch_assoc($mq);
            return $res[trans];
        }
        
        public function getOrdNameById($id, $lang){
//            if($lang == 'pl'){
//                $name = 'id_ord';
//            }else{
//                $name = 'trans';
//            }
            switch($lang){
                case 'pl':
                    $name = 'id_ord';
                    break;
                case 'en':
//                    break;
                case 'se':
//                    break;
                default:
                    $name = 'trans';
                    break;
            }
            
            $SQL = sprintf("SELECT `".$name."` FROM `".$this->table."` WHERE id = \"".$id."\";"); 
//            echo "<br>SQL:".$SQL;
            $mq = mysql_query($SQL);
            
            $res = mysql_result($mq, 0);
//            print_r($res);
            return $res;
        }
        
/*        public function getOrdPLById($id){ //ta sama funkcjonalność f-cji getOrdNameById
            $SQL = sprintf("SELECT `id_ord` FROM `".$this->table."` WHERE id = \"".$id."\";"); 
//            echo "<br>SQL:".$SQL;
            $mq = mysql_query($SQL);
            
            $res = mysql_result($mq,0);
//            print_r($res);
            return $res;
        }/**/
        
        public function getTypeById($id) {
            $SQL = sprintf("SELECT typ FROM `".$this->table."` WHERE id = \"".$id."\";");
//            echo "<br>SQL:".$SQL;
            $mq = mysql_query($SQL);
            
            $res = mysql_result($mq,0);
//            print_r($res);
            return $res;            
        }
        
        public function getTabOfAttr(){
            $tab = Array( 'id',     'id_ord', 'typ', 'rodzaj', 'grupa', 'trans', 
                                    'infinitive', 'presens', 'past', 'supine', 'imperative', 'present_participle', 'past_participle', 
                                    'pas_infinitive', 'pas_presens', 'pas_preterite', 'pas_supine', 'pas_imperative', 
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                    'neuter', 'masculin', 'plural' , 'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                    'glowny', 'porzadkowy', 'ulamek',
                                    'wymowa', 'kategoria', 'uwagi', 'linki');
            
            return $tab;
        }
        
        public function getPropTabById($id){
            $typ = $this->getTypeById($id);
//    1                     2                   3                   4               5
//    '$id.                 $id_ord,            $typ,               $rodzaj,        $trans, 
//    6                     7                   8                   9               10
//    $infinitive,          $presens,           $past,              $supine,        $imperative,
//    11                    12                  13                  14              15 
//    $present_participle,  $past_participle,   $S_indefinite,      $S_definite,    $P_indefinite, 
//    16                    17                  18                  19              20
//    $P_definite,          $neuter,            $masculin,          $plural,        $st_rowny,      
//    21                    22                  23
//    $st_wyzszy,          $st_najwyzszy,       $wymowa'   
            
            switch($typ){
                case 'noun':            // rzeczownik
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'grupa', 'trans', 
                                    'S_indefinite', 'S_definite','P_indefinite', 'P_definite', 
                                    'wymowa', 'kategoria', 'uwagi'
                                );
                    break;
                
                case 'hjalp_verb':
                case 'modal_verb':
                case 'partikelverb':
                case 'reflexivaverb':
//                case 'deponensverb':
                case 'verb':            // czasownik
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'grupa', 'trans', 
                                    'infinitive', 'presens', 'past', 'supine', 'imperative', 
                                    'present_participle', 'past_participle', 
                                    'pas_infinitive', 'pas_presens', 'pas_preterite', 'pas_supine', 'pas_imperative',
                                    'wymowa', 'kategoria', 'uwagi');
                    break;
                
                case 'adjective':       // przymiotnik   
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'neuter', 'masculin', 'plural' , 'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                    'wymowa', 'kategoria', 'uwagi');
                    break;
                
                case 'adverb':          // przysłówek
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                    'wymowa', 'uwagi'); 
                    break;
                
                case 'preposition':     // przyimek
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                    'wymowa', 'uwagi'); 
                    break;
                
                case 'pronoun':         // zaimek
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                    'wymowa', 'uwagi');  
                    break;
                
                case 'conjunction':    // spójnik
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans',  
                                    'wymowa', 'uwagi'); 
                    break;
                
                case 'interjection':    // wykrzyknik
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans',  
                                    'wymowa', 'uwagi'); 
                    break;
                
                case 'numeral':    // wykrzyknik
                    $tab = Array(   'id_ord', 'typ', 'trans',  
                                    'glowny', 'porzadkowy', 'ulamek'); 
                    break;
                
                case 'particle':    // partykuła
                    $tab = Array(   'id_ord', 'typ', 'trans', 
                                    'wymowa', 'uwagi'); 
                    break;
                
                case 'wyrazenie':
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'wymowa', 'kategoria', 'uwagi');
                    break;
                
                default:
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'grupa', 'trans', 
                                    'infinitive', 'presens', 'past', 'supine', 'imperative', 
                                    'present_participle', 'past_participle', 
                                    'pas_infinitive', 'pas_presens', 'pas_preterite', 'pas_supine', 'pas_imperative',
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                    'neuter', 'masculin', 'plural' , 'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                    'glowny', 'porzadkowy', 'ulamek',
                                    'wymowa', 'kategoria', 'uwagi');
                    break;
            }
            
            return $tab;
        }
        
        public function getPropQuestTabById($id){
            $typ = $this->getTypeById($id);
//    1                     2                   3                   4               5
//    '$id.                 $id_ord,            $typ,               $rodzaj,        $trans, 
//    6                     7                   8                   9               10
//    $infinitive,          $presens,           $past,              $supine,        $imperative,
//    11                    12                  13                  14              15 
//    $present_participle,  $past_participle,   $S_indefinite,      $S_definite,    $P_indefinite, 
//    16                    17                  18                  19              20
//    $P_definite,          $neuter,            $masculin,          $plural,        $st_rowny,      
//    21                    22                  23
//    $st_wyzszy,          $st_najwyzszy,       $wymowa'   
            
            switch($typ){
                case 'noun':            // rzeczownik
                    $tab = Array(   'id_ord', 'trans', 
                                    'S_indefinite', 'S_definite','P_indefinite', 'P_definite'
                                );
                    break;
                
                case 'hjalp_verb':
                case 'modal_verb':
                case 'partikelverb':
                case 'reflexivaverb':
//                case 'deponensverb':
                case 'verb':            // czasownik
                    $tab = Array(   'id_ord', 'trans', 
                                    'infinitive', 'presens', 'past', 'supine', 'imperative', 
                                    // JESZCZE NIE
//                                    'present_participle', 'past_participle', 
//                                    'pas_infinitive', 'pas_presens', 'pas_preterite', 'pas_supine', 'pas_imperative'
                                    ); 
                    break;
                
                case 'adjective':       // przymiotnik   
                    $tab = Array(   'id_ord', 'trans', 
                                    'neuter', 'masculin', 'plural' , 'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                    ); 
                    break;
                
                case 'adverb':          // przysłówek
                    $tab = Array(   'id_ord', 'trans', 
                                    'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                    ); 
                    break;
                
                case 'preposition':     // przyimek
                    $tab = Array(   'id_ord', 'trans', 
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                    ); 
                    break;
                
                case 'pronoun':         // zaimek
                    $tab = Array(   'id_ord', 'trans', 
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                    );  
                    break;
                
                case 'conjunction':    // spójnik
                    $tab = Array(   'id_ord', 'trans',  
                                    ); 
                    break;
                
                case 'interjection':    // wykrzyknik
                    $tab = Array(   'id_ord', 'trans',  
                                    ); 
                    break;
                
                case 'numeral':    // liczebnik
                    $tab = Array(   'id_ord', 'trans',  
                                    'glowny', 'porzadkowy', 'ulamek'); 
                    break;
                               
                case 'particle':
                case 'wyrazenie':
                    $tab = Array(   'id_ord', 'trans'
                                    ); 
                    break;
                
                default:
                    $tab = Array(   'id_ord', 'trans', 
                                    'infinitive', 'presens', 'past', 'supine', 'imperative', 
                                    'present_participle', 'past_participle', 
                                    'pas_infinitive', 'pas_presens', 'pas_preterite', 'pas_supine', 'pas_imperative',
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                    'neuter', 'masculin', 'plural' , 'st_rowny','st_wyzszy', 'st_najwyzszy' 
                                    ); 
                    break;
            }
            
            return $tab;
        }
        
        public function getPropAnsTabById($id){
            $typ = $this->getTypeById($id);
//    1                     2                   3                   4               5
//    '$id.                 $id_ord,            $typ,               $rodzaj,        $trans, 
//    6                     7                   8                   9               10
//    $infinitive,          $presens,           $past,              $supine,        $imperative,
//    11                    12                  13                  14              15 
//    $present_participle,  $past_participle,   $S_indefinite,      $S_definite,    $P_indefinite, 
//    16                    17                  18                  19              20
//    $P_definite,          $neuter,            $masculin,          $plural,        $st_rowny,      
//    21                    22                  23
//    $st_wyzszy,          $st_najwyzszy,       $wymowa'   
            
            switch($typ){
                case 'noun':            // rzeczownik
                    $tab = Array(   'id_ord', 'rodzaj', 'grupa', 'trans', 
                                    'S_indefinite', 'S_definite','P_indefinite', 'P_definite', 
                                );
                    break;
                
                case 'hjalp_verb':
                case 'modal_verb':
                case 'partikelverb':
                case 'reflexivaverb':     
                case 'deponensverb':
                case 'verb':            // czasownik
//                    $tab = Array(   'id_ord', 'grupa', 'trans', 
                    $tab = Array(   'id_ord', 'trans', 
                                    //'infinitive', 
                                    'presens', 'past', 'supine', 'imperative', 
                                    // JESZCZE NIE
//                                    'present_participle', 'past_participle', 
//                                    'pas_infinitive', 'pas_presens', 'pas_preterite', 'pas_supine', 'pas_imperative'
                                ); 
                    break;
                
                case 'adjective':       // przymiotnik   
                    $tab = Array(   'id_ord', //'typ', 
                                    'trans', 
                                    'neuter', 'masculin', 'plural' , 'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                ); 
                    break;
                
                case 'adverb':          // przysłówek
//                    $tab = Array(   'id_ord', 'typ', 'trans', 
                    $tab = Array(   'id_ord', 'trans', 
                                    'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                ); 
                    break;
                
                case 'preposition':     // przyimek
                    $tab = Array(   'id_ord', 'typ', 'trans', 
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                 ); 
                    break;
                
                case 'pronoun':         // zaimek
                    $tab = Array(   'id_ord', 'typ', 'trans', 
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                 );  
                    break;
                
                case 'conjunction':    // spójnik
                    $tab = Array(   'id_ord', 'typ', 'trans',  
                                ); 
                    break;
                
                case 'interjection':    // wykrzyknik
                    $tab = Array(   'id_ord', 'typ', 'trans',  
                                ); 
                    break;
                
                case 'numeral':    // wykrzyknik
                    $tab = Array(   'id_ord', 'typ', 'trans',  
                                    'glowny', 'porzadkowy', 'ulamek'); 
                    break;
                
                case 'particle':
                    $tab = Array(   'id_ord', 'typ', 'trans'); 
                    break;
                
                case 'wyrazenie':
//                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                    $tab = Array(   'id_ord',  'trans', 
                                 ); 
                    break;
                
                default:
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'grupa', 'trans', 
                                    'infinitive', 'presens', 'past', 'supine', 'imperative', 
                                    'present_participle', 'past_participle', 
                                    'pas_infinitive', 'pas_presens', 'pas_preterite', 'pas_supine', 'pas_imperative',
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                    'neuter', 'masculin', 'plural' , 'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                ); 
                    break;
            }
            
            return $tab;
        }
        
        public function getFullAttrById($id){
            $tab = $this->getPropTabById($id);
            
            $res_tab = join(", ",$tab);
                    
//            echo '<br>Wypełnienie2: '.$res_tab;
            $SQL = sprintf("SELECT ".$res_tab." FROM `".$this->table."` WHERE id = \"".$id."\";");
//            echo "<br>SQL ORD: ".$SQL;
            $mq = mysql_query($SQL);
            
            $row = mysql_fetch_assoc($mq);
//            echo "<br><br>vardump FULL row: ";  var_dump($row);

            return $row;
        }
        
        public function getNoEmptyAttrById($id){
            $row = $this->getFullAttrById($id);
//            echo "<br><br>vardump CUT $row: ";  var_dump($row);
            $NoEmpty = array();
            foreach ($row as $key => $value) {
                if($value != '' && $value != '???'){
                   array_push($NoEmpty, $key);
                }
            }
//            echo "<br><br>vardump CUT row: ";  var_dump($NoEmpty);
            
            $res_tab = join(", ",$NoEmpty);
            
//            echo "<br>RES_TAB: ".$res_tab;
            
            $SQL = sprintf("SELECT ".$res_tab." FROM `".$this->table."` WHERE id = \"".$id."\";");
//            echo "<br>SQL ORD: ".$SQL;
            $mq = mysql_query($SQL);
            
            $row = mysql_fetch_assoc($mq);
//            echo "<br><br>vardump FULL row: ";  var_dump($row);

            return $row;            
        }
        
        // Zwraca tablicę z ID wszystkich rekordów w bazie
        public function getQuestionIDsArr(){
//            echo "<br>ORD.CLASS OK/ getQuestionIDsArr(): ".__LINE__;
            $arr = array();
            $tempSQL = "SELECT id FROM `".$this->table."`;";
            
//            echo "<br>".__FILE__.__LINE__.", SQL(getQuestionIDsArr):".$tempSQL;
            
            $SQL = sprintf($tempSQL);
            $mq = mysql_query($SQL);
            
            if(mysql_affected_rows()){
//                echo "<br>".__FILE__.__LINE__.", SQL OK ";
                while($row = mysql_fetch_assoc($mq)){
                    array_push($arr, $row['id']);
                }
            }else{
                echo "<br>".__FILE__.__LINE__.", SQL NO OK";
            }
            return $arr;
        }
        
        public function getQuestionIDsArrByType($type){
//            echo '<br>TYPE:'.$type.'<br>';
            $arr = array();
            $tempSQL = "SELECT id FROM `".$this->table."`";
            if($type == 'verb'){
                $tempSQL .= " WHERE `typ`='hjalp_verb' OR `typ`='verb' OR `typ`='modal_verb' OR `typ`='partikelverb' OR `typ`='reflexivaverb' OR `typ` = 'deponensverb';";
//                $tempSQL .= " WHERE `typ` LIKE '%verb';"; // ? adverb!
            }elseif($type==false){
                $tempSQL .=";";
            }else{
                $tempSQL .= " WHERE `typ` = '".$type."';";
            }
//            echo "<br>".__FILE__.__LINE__.", SQL(getQuestionIDsArrByType):".$tempSQL;
            
            $SQL = sprintf($tempSQL);
            $mq = mysql_query($SQL);
            
            if(mysql_affected_rows()){
//                echo "<br>".__FILE__.__LINE__.", SQL OK ";
                while($row = mysql_fetch_assoc($mq)){
                    array_push($arr, $row['id']);
                }
            }else{
                echo "<br>".__FILE__.__LINE__.", SQL NO OK";
            }
            return $arr;
        }
        
        // Zwraca tablicę z ID wszystkich verbów w bazie w zależności od $group, 
        // $g = false,  wszystkie ID z BD
        public function getQuestionIDsArrByGroup($group){
//            echo '<br>TYPE:'.$type.'<br>';
            $arr = array();
            $tempSQL = "SELECT id FROM `".$this->table."`";
            $tempSQL .= " WHERE (`typ`='hjalp_verb' OR `typ`='verb' OR `typ`='modal_verb' OR `typ`='partikelverb' OR `typ`='reflexivaverb' OR `typ` = 'deponensverb') AND `grupa` = \"".$group."\";";            
//            $tempSQL .= " WHERE `typ` LIKE '%verb' AND `grupa` = '".$group."';"; // ? adverb!

//            echo "<br>".__FILE__.__LINE__.", SQL(getQuestionIDsArrByGroup):".$tempSQL;
            
            $SQL = sprintf($tempSQL);
            $mq = mysql_query($SQL);
            
            if(mysql_affected_rows()){
//                echo "<br>".__FILE__.__LINE__.", SQL OK ";
                while($row = mysql_fetch_assoc($mq)){
                    array_push($arr, $row['id']);
                }
            }else{
//                echo "<br>".__FILE__.__LINE__.", SQL NO OK";
            }
//            var_dump($arr);
            return $arr;
        }
        
        public function getQuestionById($id){
            $tab_All = $this->getPropQuestTabById($id);            
            $rowNoEmpty = $this->getNoEmptyAttrById($id);
            
//            echo "<br>==========PORÓWNANIE==================";
//            echo "<br>TAB: ";var_dump($tab_All);  
//            echo "<br>---------------------<br>rowNoEmpty: ";var_dump($rowNoEmpty);
            
            $row_NoEmFin = array();
            
//            echo "<br>========== PRZYPISANIE ==================";
            for($i=0;$i<count($tab_All);$i++){
                foreach ($rowNoEmpty as $k => $v) { 
//                    echo "<br>BEF tab_All[i]".$tab_All[$i]." == rowNoEmpty:".$k;
                    if($tab_All[$i] == $k){
//                        echo "<p style='color: red;'> => PO tab_All[i]".$tab_All[$i]." == rowNoEmpty:".$k."</p>";
                        array_push($row_NoEmFin, $k);
                    }
                }
            }
            
//            echo "<br>WYNIK:";var_dump($row_NoEmFin);
            
            $temp = join(", ",$row_NoEmFin);
            
//            echo "<br>WYNIK String:".$temp;
            
            $len = count($row_NoEmFin);
            
            $rand = mt_rand(1, $len);
            
//            echo "<br>".__LINE__." / Rand:".$rand;
            
            $i = 1;
            foreach ($row_NoEmFin as $key => $value) {
                if($i == $rand){
//                    echo "<br>KEY: ".$key."=>VAL:". $value;
                    $RESULT_1 = $value;
                }
                $i++;
            }
//            echo "<br>========================<br>";
//            echo "RETURN:";var_dump($row_NoEmFin);
//            echo "<br>========================<br>";
            
            $SQL = sprintf("SELECT ".$RESULT_1." FROM `".$this->table."` WHERE id = \"".$id."\";");
            $mq = mysql_query($SQL);
            $RESULT_2 = mysql_result($mq, 0);
            
//            echo "<br>============ RESULTS: ============<br>";
//            echo "RESULT_1: ".$RESULT_1." => RESULT_2: ".$RESULT_2;
//            echo "<br>========================<br>";
            
            $res = array($RESULT_1, $RESULT_2);
            
//            echo "<br>============ RETURNS: ============<br>";
//            echo "RESULT: ";var_dump($res);
//            echo "<br>========================<br>";
            
            return $res;
        }
        
        public function getQuestAndAnswerById($id){
//            $id = 299;
//            $id = 2897;
            $quest = $this->getQuestionById($id);
            
            $tab_All = $this->getPropAnsTabById($id);
            $rowNoEmpty = $this->getNoEmptyAttrById($id);
            $row_NoEmFin = array();
            
//            echo "<br>WYNIK getPropAnsTabById:<br>";var_dump($tab_All);
//            echo "<br>WYNIK getNoEmptyAttrById:<br>";var_dump($rowNoEmpty);
//
//            echo "<br>========== PRZYPISANIE ANSW==================";
            for($i=0;$i<count($tab_All);$i++){
                foreach ($rowNoEmpty as $k => $v) { 
//                    echo "<br>BEF tab_All[i]".$tab_All[$i]." == rowNoEmpty:".$k." && != Quest:".$quest[0];
                    if($tab_All[$i] == $k && $tab_All[$i] != $quest[0]){
//                        echo "<p style='color: red;'> => PO tab_All[i]".$tab_All[$i]." == rowNoEmpty:".$k." && != Quest:".$quest[0]."</p>";
                        array_push($row_NoEmFin, $k);
                    }
                }
            }
            
//            echo "<br>WYNIK:";var_dump($row_NoEmFin);

            $temp = join(", ",$row_NoEmFin);
            
//            echo "<br>WYNIK String:".$temp;
            
            $len = count($row_NoEmFin);
            
            $rand = mt_rand(1, $len);
            
            // Tu wrzuca do bazy statystyk dot losowań wyrazów i quest!!!
            $Random = new Random();
            $Random->setData($id, $rand);
            
//            echo "<br>".__LINE__." / Rand:".$rand;
            
            $i = 1;
            foreach ($row_NoEmFin as $key => $value) {
                if($i == $rand){
//                    echo "<br>KEY: ".$key."=>VAL:". $value;
                    $RESULT_1 = $value;
                }
                $i++;
            }
//            echo "<br>========================<br>";
//            echo "RETURN:";var_dump($row_NoEmFin);
//            echo "<br>========================<br>";
            
            $SQL = sprintf("SELECT ".$RESULT_1." FROM `".$this->table."` WHERE id = \"".$id."\";");
            $mq = mysql_query($SQL);
            $RESULT_2 = mysql_result($mq, 0);
            
            
            // tu pobiera UWAGI !!!!!!!!!!!!!!!!
            $SQL = sprintf("SELECT `uwagi` FROM `".$this->table."` WHERE id = \"".$id."\";");
            $mq = mysql_query($SQL);
            $RESULT_3 = mysql_result($mq, 0);
            
            if(strpos($RESULT_3, "==")){
                $RESULT_3 = $RESULT_3;
            }else{
                $RESULT_3 = 0;
            }
            
//            echo "<br>============ RESULTS: ============<br>";
//            echo "RESULT_1: ".$RESULT_1." => RESULT_2: ".$RESULT_2;
//            echo "<br>========================<br>";
            
            $res = array($quest[0], $quest[1], $RESULT_1, $RESULT_2, $RESULT_3);
            
//            echo "<br>============ RETURNS: ============<br>";
//            echo "RESULT: ";var_dump($res);
//            echo "<br>========================<br>";
            
            return $res;            
        }
        
        
        public function getDBAll(){
            $SQL = sprintf("SELECT * FROM `".$this->table."`;");
//            echo $SQL;
            $mq = mysql_query($SQL);
//            echo $mq;
            return $mq;
        }
        
        public function getDBAllOrdByTyp(){
            $SQL = sprintf("SELECT * FROM `".$this->table."` ORDER BY `typ`;");
//            echo $SQL;
            $mq = mysql_query($SQL);
//            echo $mq;
            return $mq;
        }
        
        public function getAllArr(){ // robi to co show.php
            $SQL = sprintf("SELECT * FROM `".$this->table."`;");
//            echo $SQL;
            $mq = mysql_query($SQL);
//            $mnr = mysql_num_rows($mq);
//            $arr = mysql_fetch_array($mq, MYSQL_ASSOC);

//            echo "<br>Get All ($mnr) Array:"; var_dump($arr);
//            return $mr;
            
            echo "<table class=print>";
            echo "  <tr>
                        <th>".t("L.p.")."</th>
                        <th>".t("Słowo PL")."</th>
                        <th>".t("Część mowy")."</th>
                        <th>".t("rodzajnik")."</th>
                        <th>".t("słowo SE")."</th>
                        <th>".t("Formy")."</th>
                   </tr>" ; 
            
              while ($row = mysql_fetch_array($mq, MYSQL_ASSOC)){

//                echo "<tr><td colspan=6>";var_dump($row);echo "</td></tr>";
                    echo "<tr>";
                    $attr = 0;
                    foreach($row as $k => $v){
                        if($attr < 5){
                            echo "<td id=norm>".$v."</td>";
                        }else{
                        if($attr==5){
                            echo "<td id=piec>";
                        }
                        elseif($attr==(count($row))){
                            echo "</td>";
                        }
                        elseif($v!='' && $k !='wymowa'){
                            echo substr($k,0,6)."<span class=red>: $v</span>,<br>";
                        }
                        else {
                            continue;
                        }
                    }
                    $attr++;  
                    }
                    echo "</tr>" ;
              }
              echo "</table>";
        }
        
        public function findEmptyOrdId(){
            $SQL = sprintf("SELECT `id` FROM ".$this->table." ORDER BY `id` ASC;");
            echo $SQL;
            $mq = mysql_query($SQL);
            
            $empty_record = array();
            
            $licz = 1;
            echo "<br>ID's: ";
            
            while($row = mysql_fetch_row($mq)){
//                echo $row[0]."/$licz, ";
//                var_dump($row);
                if($row[0] != $licz){
//                    echo "<span class=red>BRAK $licz!!!!</span>";
                    while($row[0] != $licz){
                        echo "<span class=red>BRAK $licz!!!!</span>";
                        array_push($empty_record, $licz);
                        $licz++;
                    }
//                    array_push($empty_record, $licz);
//                    $licz++;
                }             
                $licz++;
            }
            
            return $empty_record;
        }
        
        public function findEmptyNOUN_GROUPOrdId(){
//            $SQL = sprintf("SELECT `id` FROM ".$this->table." ORDER BY `id` ASC;");
            $SQL = sprintf("SELECT `id` FROM ".$this->table." WHERE `typ` = 'noun' AND `grupa` = '' limit 1,20;");
            echo $SQL;
            $mq = mysql_query($SQL);
            
            $empty_record = array();
            
            while($row = mysql_fetch_row($mq)){
//                        array_push($empty_record, $row[0]);
                        echo "<br><a href='Edit.php?sercz_id=".$row[0]."' target='_blank'>link_to_".$row[0]."</a>";
            }
            
//            return $empty_record;
        }
        
        public function getOrdArrByType($typ){
            $SQL = sprintf("SELECT * FROM `".$this->table."` WHERE `typ` = '".$typ."';");
//            echo "<br>SQL: $SQL";
            $mq = mysql_query($SQL);
            
            while($row = mysql_fetch_assoc($mq)){
                echo "<br>======================================<br>";
                var_dump($row);
            }
        }
        
        public function setSQLstringToCode($string){
            
            $str = str_replace('ą','?01?', $string);
            $str = str_replace('ć','?02?', $str);
            $str = str_replace('ę','?03?', $str);
            $str = str_replace('ł','?04?', $str);
            $str = str_replace('ń','?05?', $str);
            $str = str_replace('ó','?06?', $str);
            $str = str_replace('ś','?07?', $str);
            $str = str_replace('ź','?08?', $str);
            $str = str_replace('ż','?09?', $str);
            
            $str = str_replace('Ą','?10?', $str);
            $str = str_replace('Ć','?12?', $str);
            $str = str_replace('Ę','?13?', $str);
            $str = str_replace('Ł','?14?', $str);
            $str = str_replace('Ń','?15?', $str);
            $str = str_replace('Ó','?16?', $str);
            $str = str_replace('Ś','?17?', $str);
            $str = str_replace('Ź','?18?', $str);
            $str = str_replace('Ż','?19?', $str); 
            
            $str = str_replace('å','?20?', $str);
            $str = str_replace('ö','?22?', $str);
            $str = str_replace('ä','?23?', $str);
           
            $str = str_replace('Å','?24?', $str);
            $str = str_replace('Ö','?25?', $str);
            $str = str_replace('Ä','?26?', $str);
            
            $str = str_replace('é','?27?', $str);
            
//            echo '<br>String to Code:'.$string;
//            echo '<br>Str Aftr Code:'.$str;
            return $str;
        }
        
        public function setSQLstringDeCode($string){
            
            $str = str_replace('?01?', 'ą', $string);
            $str = str_replace('?02?', 'ć', $str);
            $str = str_replace('?03?', 'ę', $str);
            $str = str_replace('?04?', 'ł', $str);
            $str = str_replace('?05?', 'ń', $str);
            $str = str_replace('?06?', 'ó', $str);
            $str = str_replace('?07?', 'ś', $str);
            $str = str_replace('?08?', 'ź', $str);
            $str = str_replace('?09?', 'ż', $str);
                                       
            $str = str_replace('?10?', 'Ą', $str);
            $str = str_replace('?12?', 'Ć', $str);
            $str = str_replace('?13?', 'Ę', $str);
            $str = str_replace('?14?', 'Ł', $str);
            $str = str_replace('?15?', 'Ń', $str);
            $str = str_replace('?16?', 'Ó', $str);
            $str = str_replace('?17?', 'Ś', $str);
            $str = str_replace('?18?', 'Ź', $str);
            $str = str_replace('?19?', 'Ż', $str); 
                                       
            $str = str_replace('?20?', 'å', $str);
            $str = str_replace('?22?', 'ö', $str);
            $str = str_replace('?23?', 'ä', $str);
                                       
            $str = str_replace('?24?', 'Å', $str);
            $str = str_replace('?25?', 'Ö', $str);
            $str = str_replace('?26?', 'Ä', $str);
            
            $str = str_replace('?27?', 'é', $str);
            
//            echo '<br>String to Decode:'.$string;
//            echo '<br>Str Aftr Deode:'.$str;
            return $str;
        }
        
        // zlicza ilość rekordów w BD podobnych do wprowadzonego słowa
        public function getCountSimOrdByIdOrd($text, $co){
            
            $co = $co ? $co : 'id_ord';
            
            $SQL = "SELECT count(*) FROM ".$this->table." WHERE `".$co."` like '%".$text."%';";
//            echo '<br>getCountSimOrdByIdOrd SQL: '.$SQL;
            $mq = mysql_query($SQL);
            if(mysql_result($mq, 0)){
                return mysql_result($mq, 0);
            }else{
                return 0;
            }
        }
        
        // tworzy tabelkę 1go rekordów na podst ID == coś nie działa jeszcze
  /*      public function getTabOrdById($id){
            $SQL = "SELECT * FROM ".$this->table." WHERE `id` = '".$id."';";
            echo __FILE__.__LINE__.$SQL;
            $mq = mysql_query($SQL);
            
            //tworzenie tabelek
            $method='post';
//            $liczID = 0;

            echo "<div class=edit_tab_contener>";
            while($row = mysql_fetch_assoc($mq)){
            echo __FILE__.__LINE__; var_dump($row);
            echo "<table id ='ord_".$id."'>";
            echo "<form method=".$method." action=Edit.php >";
            $j=0;
            foreach($row as $k=>$v){

                if($j%4==0){
                    echo "<tr>";
                }
        
                if($k == 'typ'){
                    echo "<td>".$k."</td><td>";
                    echo "<select name='".$k."'>
                            <option value=".$v.">".trans($v)."</option>
                            <option value='noun'>rzeczownik</option>
                            <option value='verb'>czasownik</option>
                            <option value='hjalp_verb'>czas. posiłkowy</option>
                            <option value='modal_verb'>czas. modalny</option>
                            <option value='partikelverb'>fraza czasownikowa</option>
                            <option value='reflexivaverb'>czas. zwrotny</option>
                            <option value='adjective'>przymiotnik</option>
                            <option value='adverb'>przysłówek</option>
                            <option value='preposition'>przyimek</option>
                            <option value='pronoun'>zaimek</option>
                            <option value='conjunction'>spójnik</option>
                            <option value='interjection'>wykrzyknik</option>
                            <option value='numeral'>liczebnik</option>
                            <option value='particle'>partykuła</option>
                            <option value='wyrazenie'>wyrażenie</option>
                            <option value='???'>???</option>
                          </select>";        
                    echo "</td>";
                }  elseif($k == 'rodzaj'){
                    echo "<td>".$k."</td><td>";
        
                    echo "      <select id=rodzaj name='rodzaj'>
                                    <option value='".$v."'>".$v."</option>
                                    <option value='att'>att</option>
                                    <option value='ett'>ett</option>
                                    <option value='en'>en</option>
                                </select>";
                    echo "</td>";
            
                }elseif($k == 'uwagi'){
                    echo "<tr>"; // UWAGA: tu będzie zamknięty ostatni ROW i musi być wyjśćie z pętli!!!!
                    echo "<td>".$k."</td>";
                    echo "<td colspan=7>";
                    echo "<textarea d=uwagi_ta class=uwagi_ta name=".$k." >".$v."</textarea>";
                    echo "</td>";
                    echo "</tr>";
                    break;
                }else{
                    echo "<td>".$k."</td><td><input name=".$k." value='".$v."'></td>";
                }
        
                if($j%4==3){
                    echo "</tr>";
                }     
            $j++;    
            }
            echo "<tr> <td colspan=6></td>
                    <td colspan=2>
                        <button onclick='Menu();'>".t("Menu")."ord.class line 978</button>
                        <input id=Edit_".$id." type=submit name=edit value='".t('Edit')."'>
                        <input id=Del_".$id." type=submit name=delete value='".t("DELETE")."'>
                        <input id=CBedit_".$id." type=checkbox name=CBedit_".$id." value='".t('wartość')."' />
                    </td>
                    </tr>
                    </form>
                    </table>";    
        
//            $i++; $id++;
            }
            echo "</div>";      // end of div: edit_tab_contener
        }/**/
        
        // tworzy tabelkę rekordów o id_ord podobnym do wprowadzonego słowa 
        public function getSimOrdByIdOrd($text){
            
            $ileSlow = $this->getCountSimOrdByIdOrd($text, false);
            
            $SQL = "SELECT id, id_ord, typ, rodzaj, trans FROM ".$this->table." WHERE `id_ord` like '%".$text."%' LIMIT 0,".$this->prezentuj.";";
//            echo '<br>getCountSimOrdByIdOrd SQL: '.$SQL;
            $mq = mysql_query($SQL); 
            echo "<table>";
            echo "<tr><th colspan=4>".t('Jest')." <span class=red>".$ileSlow."</span> ".t('podobnych wyników').":<th><tr>";
            
            if($this->prezentuj < $ileSlow) 
                echo "<tr><th colspan=4><span class='fileldDescrRed'> ( ".t('poniżej pierwsze')." ".$this->prezentuj." ".t('rezultatów')." )</span><th><tr>";  //C
            else
                echo "<tr><th colspan=4><span class='fileldDescrRed'> ( ".t('poniżej pierwsze')." ".$ileSlow." ".t('rezultatów')." )</span><th><tr>";  // $this->prezentuj.">".$ileSlow
            
            while($row = mysql_fetch_assoc($mq)){
                echo "<tr>";
                foreach($row as $k => $v){
                    switch($k){
                        case 'rodzaj':
                            echo "<td> => $v ";
                            break;
                        case 'trans':
                            echo "$v</td>";
                            echo "<td><a href='Edit.php?sercz_id=".$id."' target=\"_blank\">=></a></td>";
                            break;                     
                        case 'id':
                            echo "<td>$v</td>";
                            $id=$v;
                            break;
                        case 'typ':
                            echo "<td>(".t(substr($v,0,4)."_4bokst").")</td";
                            break;  
                        default:
                            echo "<td>$v</td>";
                            break;                            
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        
        // tworzy tabelkę rekordów o trans podobnym do wprowadzonego słowa 
        public function getSimOrdByTrans($text){
            
            $ileSlow = $this->getCountSimOrdByIdOrd($text, "trans");
            
            $SQL = "SELECT id, rodzaj, trans, typ, id_ord FROM ".$this->table." WHERE `trans` like '%".$text."%' LIMIT 0,".$this->prezentuj.";";
//            echo '<br>getCountSimOrdByIdOrd SQL: '.$SQL;
            $mq = mysql_query($SQL);
            echo "<table>";
            echo "<tr><th colspan=4>".t('Jest')." <span class=red>".$ileSlow."</span> ".t('podobnych wyników').":<th><tr>";
            
            if($this->prezentuj < $ileSlow)
                echo "<tr><th colspan=4><span class='fileldDescrRed'> ( ".t('poniżej pierwsze')." ".$this->prezentuj." ".t('rezultatów')." )</span><th><tr>";  //$this->prezentuj."<".$ileSlow
            else
                echo "<tr><th colspan=4><span class='fileldDescrRed'> ( ".t('poniżej pierwsze')." ".$ileSlow." ".t('rezultatów')." )</span><th><tr>"; //$this->prezentuj.">".$ileSlow
            
            while($row = mysql_fetch_assoc($mq)){
                echo "<tr>";
                foreach($row as $k => $v){
                    switch($k){
                        case 'rodzaj':
                            echo "<td>$v ";
                            break;
                        case 'trans':
                            echo "$v</td>";
                            break;
                        case 'typ':
                            echo "<td>(".t(substr($v,0,4)."_4bokst").")</td>";
                            break;
                        case 'id_ord':
                            echo "<td> => $v</td>";
                            echo "<td><a href='Edit.php?sercz_id=".$id."' target=\"_blank\">=></a></td>";
                            break;
                        case 'id':
                            echo "<td>$v</td>";
                            $id=$v;
//                            echo "<td><a href='Edit.php?sercz_id=".$v."'>=></a></td>";
                            break;
                        default:
                            echo "<td>$v</td>";
                            break;  
                    }                
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        
        public function howManyOrdByPartOfSpeech($part_speech){
            
            $part_speech = $part_speech ? $part_speech : '???';
                    
            $SQL = "SELECT count(*) FROM ".$this->table." WHERE typ = '".$part_speech."';";
//            echo $SQL;
            $mq = mysql_query($SQL);
            
            if(mysql_result($mq, 0)){
                return mysql_result($mq, 0);
            }else{
                return 0;
            }
        }
        
        public function howManyOrd(){
                    
            $SQL = "SELECT count(*) FROM ".$this->table.";";
//            echo $SQL;
            $mq = mysql_query($SQL);
            
            if(mysql_result($mq, 0)){
                return mysql_result($mq, 0);
            }else{
                return 0;
            }
        }
        
        public function getTypesOfOrd(){
            $sql = sprintf("SHOW COLUMNS FROM `".$this->table."` LIKE 'typ';");
//            echo '<br>SQL:'.$sql;
            $mq = mysql_query($sql);
            $row = mysql_fetch_row($mq);
//            echo "<br>row:"; var_dump($row);
            $type = $row['1'];
//            echo '<br>type:'.$type;
            preg_match('/enum\(\'(.*)\'\)$/', $type, $matches);
//            echo "<br>matches: ".$matches."<br>";var_dump ($matches);
//            echo "<br>matches1: ".$matches[1];
            $vals = explode('\',\'', $matches[1]);
//            echo "<br>Vals: ";var_dump ($vals);
//            $vals = str_split($vals, 1);
//            sort($vals);
            return $vals;
        }
        
        public function getCategoriesOfOrd(){
//            sort(t($this->category));      //sortowanie alfabetyczne t() nie działa
            sort($this->category);      //sortowanie alfabetyczne
            return $this->category;
        }
        
        public function getOrdByGroup(){        // grupa czasowników lub rzeczowników
//            return $this->group;
            return $this->group_verb;
        }
        
        public function getRodzOfOrd(){
            $sql = "SHOW COLUMNS FROM `".$this->table."` LIKE 'rodzaj'";
//            echo '<br>SQL:'.$sql;
            $mq = mysql_query($sql);
            $row = mysql_fetch_row($mq);
//            echo "<br>row:"; var_dump($row);
            $type = $row['1'];
//            echo '<br>type:'.$type;
            preg_match('/enum\(\'(.*)\'\)$/', $type, $matches);
//            echo "<br>matches";var_dump ($matches);
//            echo "<br>matches1: ".$matches[1];
            $vals = explode('\',\'', $matches[1]);
//            echo "<br>Vals: ";var_dump ($vals);
            return $vals;
        }
        
        public function getGrupaOfOrd(){ 
//            $sql = "SELECT distinct `grupa` FROM `ord` group by `grupa` DESC LIMIT 0, 30 ";
            $sql = "SELECT distinct `grupa` FROM `".$this->table."` GROUP BY `grupa` DESC;";
//            echo '<br>SQL:'.$sql.'<br>';
            $mq = mysql_query($sql);
            $arr = Array();
            while($row = mysql_fetch_assoc($mq)){
                array_push($arr, $row);
            }
//            echo "<br>row:"; var_dump($arr);
            return $arr;
        }
        
        public function getGroupOfOrd(){
            return $this->group;
        }
        
        public function copyFromOrdLHToOrd(){
            $idLH = $this->getLastId(true);
//            $idLH = 3;
            $idDB = $this->getLastId(false);
            
//            echo "<br>LastId from LH=".$idLH;
//            echo "<br>LastId from DB=".$idDB;
            
            for ($i=1; $i<$idLH; $i++){
                $arr = Array();
                $SQL_LH = sprintf("SELECT * FROM `".$this->table."LH` WHERE `id` = ".$i.";");
//                $SQL_DB = sprintf("SELECT id FROM `".$this->table."` WHERE `id` = ".$i.";"); /// tylko do spr czy jest taki rekord
                $SQL_DB = sprintf("SELECT id FROM `".$this->table."TEST` WHERE `id` = ".$i.";"); /// tylko do spr czy jest taki rekord
                
//                echo "<br>".$SQL;
                $mq_LH = mysql_query($SQL_LH);
                if(mysql_affected_rows()){
//                    echo "<br>$i=true";
                    $row_LH = mysql_fetch_assoc($mq_LH);
//                    var_dump($row);
                    
                    foreach ($row_LH as $k => $v){
//                        echo "<br>$k => $v, decode: ".$this-> setSQLstringDeCode($v);
                        array_push($arr, array($k ,$this-> setSQLstringDeCode($v)));
                    }
//                    echo "<br>";
//                    var_dump($arr);
//                    echo "<br>Arr[00]: ".$arr[0][0]."=>".$arr[0][1];
//                    echo "<br>Arr[01]: ".$arr[1][0]."=>".$arr[1][1];
                    
                    $mq_DB = mysql_query($SQL_DB); // można dopiero tu, bo inaczej go affected_rows może wykryć
                    
                    if(mysql_affected_rows()){  // czyli jest rekord o takim num w DB!
//                        echo "<br>JEST TAKI ID W ".$this->table."TEST";
                        $SQL_INS = "UPDATE `".$this->table."TEST` SET ";
                        $roz = count($arr);
                        for ($j=1; $j<$roz; $j++){
                            for ($t=0; $t<2; $t++){
//                                echo "<br>arr[$j,$t]=".$arr[$j][$t];
                                if($t==0 ){
                                    $SQL_INS .= "`".$arr[$j][$t]."` = ";
                                }elseif($j != $roz-1){
                                    $SQL_INS .= "'".$arr[$j][$t]."', ";
                                }else{
                                     $SQL_INS .= "'".$arr[$j][$t]."' WHERE `id` = ".$arr[0][1].";";
                                }
                            }
                        }      
                    }else{
//                        echo "<br>NIE MA TAKIEGO ID W ".$this->table."TEST => INSERT";
                        $SQL_INS = "INSERT INTO `".$this->table."TEST` VALUES (";
                        $roz = count($arr);
                        for ($j=0; $j<$roz; $j++){
                            for ($t=0; $t<2; $t++){
//                                echo "<br>arr[$j,$t]=".$arr[$j][$t];
                                if($t==0 ){
//                                    $SQL_INS .= "`".$arr[$j][$t]."` = ";
                                }elseif($j != $roz-1){
                                    $SQL_INS .= "'".$arr[$j][$t]."', ";
                                }else{
                                     $SQL_INS .= "'".$arr[$j][$t]."'); ";
                                }
                            }
                        }
                        
                    }
                    
                    echo "<br> INSERT/UPDATE SQL FINN: ".$SQL_INS;
                    $mq = mysql_query($SQL_INS);
                    if(mysql_affected_rows()){
                        echo "<br>WESZŁO!!!!!!!!";
                    }else{
                        echo "<br>NIE WESZŁO!!!!!!!!";
                    }
                    
                }else{
                    echo "<br>$i=false";
                }
            }
        }
        
        
}



/*
DROP table `ord`;

CREATE TABLE IF NOT EXISTS `ord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ord` varchar(145) NOT NULL,
  `typ` enum('noun','verb','hjalp_verb','adjective','adverb','preposition','pronoun','conjunction','interjection','numeral','particle','wyrazenie','???') NOT NULL,
  `rodzaj` enum('ett','en','att') DEFAULT NULL,
  `trans` varchar(145) NOT NULL,
  `infinitive` varchar(45) DEFAULT NULL,
  `presens` varchar(45) DEFAULT NULL,
  `past` varchar(45) DEFAULT NULL,
  `supine` varchar(45) DEFAULT NULL,
  `imperative` varchar(45) DEFAULT NULL,
  `present_participle` varchar(45) DEFAULT NULL,
  `past_participle` varchar(45) DEFAULT NULL,
  `S_indefinite` varchar(45) DEFAULT NULL,
  `S_definite` varchar(45) DEFAULT NULL,
  `P_indefinite` varchar(45) DEFAULT NULL,
  `P_definite` varchar(45) DEFAULT NULL,
  `neuter` varchar(45) DEFAULT NULL,
  `masculin` varchar(45) DEFAULT NULL,
  `plural` varchar(45) DEFAULT NULL,
  `st_rowny` varchar(45) DEFAULT NULL,
  `st_wyzszy` varchar(45) DEFAULT NULL,
  `st_najwyzszy` varchar(45) DEFAULT NULL,
  `glowny` varchar(45) DEFAULT NULL,
  `porzadkowy` varchar(45) DEFAULT NULL,
  `wymowa` varchar(45) DEFAULT NULL,
  `kategoria` enum('ludzie','sport','przyroda','kolory','muzyka','dom','jedzenie') DEFAULT NULL,
  `uwagi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`id_ord`),
  UNIQUE KEY `id_ord_UNIQUE` (`id_ord`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
 */