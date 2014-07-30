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
    private $trans;
    private $infinitive;
    private $presens;
    private $past;
    private $supine;
    private $imperative;
    private $present_participle;
    private $past_participle;
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
    
    private $wymowa;
    private $uwagi;
    
    private $table = "ord";
    

    public function setData($id_ord, $typ, $rodzaj, $trans, $infinitive, $presens,$past, 
                            $supine, $imperative, $present_participle, $past_participle, 
                            $S_indefinite, $S_definite, $P_indefinite, $P_definite, 
                            $neuter, $masculin, $plural, $st_rowny, $st_wyzszy, $st_najwyzszy, 
                            $glowny, $porzadkowy,
                            $wymowa, $uwagi){
        
        if(!$this->getId($id_ord)){
            
            $SQL = sprintf("INSERT INTO `".$this->table."` "
                . "(`id_ord`, `typ`, `rodzaj`, `trans`, `infinitive`, `presens`, `past`, "
                . "`supine`, `imperative`, `present_participle`, `past_participle`, "
                . "`S_indefinite`, `S_definite`, `P_indefinite`, `P_definite`, "
                . "`neuter`, `masculin`, `plural`,`st_rowny`, `st_wyzszy`, `st_najwyzszy`, "
                . "`glowny`, `porzadkowy`, "
                . "`wymowa`, `uwagi`) "
                . "VALUES "
                . "('".$id_ord."','".$typ."','".$rodzaj."','".$trans."','".$infinitive."','".$presens."','".$past."',"
                . "'".$supine."','".$imperative."','".$present_participle."','".$past_participle."',"
                . "'".$S_indefinite."','".$S_definite."','".$P_indefinite."','".$P_definite."',"
                . "'".$neuter."','".$masculin."','".$plural."','".$st_rowny."','".$st_wyzszy."','".$st_najwyzszy."',"
                . "'".$glowny."','".$porzadkowy."',"
                . "'".$wymowa."','".$uwagi."');");
                   
//            try{mysql_query($SQL);}
//                catch(Exception $ex){
//                echo "ERROE wsadu";
//            }
        
            if (mysql_query($SQL)){
                echo "<br>".t("WSADZONE do ord!!!");
                
                $id_LH = $this->getLastId()+1;
                $id_LH = $this->getId($id_ord);
//                echo "<br>ID:".$id_LH;
            
                $SQL_PLLH = sprintf("INSERT INTO `".$this->table."LH` "
                    . "(`id`, `id_ord`, `typ`, `rodzaj`, `trans`, `infinitive`, `presens`, `past`, "
                    . "`supine`, `imperative`, `present_participle`, `past_participle`, "
                    . "`S_indefinite`, `S_definite`, `P_indefinite`, `P_definite`, "
                    . "`neuter`, `masculin`, `plural`,`st_rowny`, `st_wyzszy`, `st_najwyzszy`, "
                    . "`glowny`, `porzadkowy`, "
                    . "`wymowa`, `uwagi`) "
                    . "VALUES "
                    . "('".$id_LH."', '".$this->setSQLstringToCode($id_ord)."','".$typ."','".$rodzaj."','".$this->setSQLstringToCode($trans)."','".$this->setSQLstringToCode($infinitive)."','".$this->setSQLstringToCode($presens)."','".$this->setSQLstringToCode($past)."',"
                    . "'".$this->setSQLstringToCode($supine)."','".$this->setSQLstringToCode($imperative)."','".$this->setSQLstringToCode($present_participle)."','".$this->setSQLstringToCode($past_participle)."',"
                    . "'".$this->setSQLstringToCode($S_indefinite)."','".$this->setSQLstringToCode($S_definite)."','".$this->setSQLstringToCode($P_indefinite)."','".$this->setSQLstringToCode($P_definite)."',"
                    . "'".$this->setSQLstringToCode($neuter)."','".$this->setSQLstringToCode($masculin)."','".$this->setSQLstringToCode($plural)."','".$this->setSQLstringToCode($st_rowny)."','".$this->setSQLstringToCode($st_wyzszy)."','".$this->setSQLstringToCode($st_najwyzszy)."',"
                    . "'".$this->setSQLstringToCode($glowny)."','".$this->setSQLstringToCode($porzadkowy)."',"
                    . "'".$this->setSQLstringToCode($wymowa)."','".$this->setSQLstringToCode($uwagi)."');");
//                 echo "<br>INSERT: ".$SQL_PLLH;
                if (mysql_query($SQL_PLLH)){
                    echo "<br>".t("WSADZONE do ordLH!!!");
                }else{
//                    echo "<br>ERROR wsadu";
                    echo "<br>".t("ERROR wsadu");
                }
                
                
            }else{
//                echo "<br>ERROR wsadu";
                echo "<br>".t("ERROR wsadu");
            }
                    
            return true;
        }else{
            echo "<br>ERROR W bazie jest!!";
            return false;
        }
    }
              
        public function getId_ord() {
            return $this->id_ord;
        }
        
        public function getLastId() {
            $SQL = sprintf("SELECT max(id) FROM `".$this->table."`;");
            
//            echo "<br>".$SQL;
            
            $res = mysql_fetch_row(mysql_query($SQL));
            if (mysql_affected_rows()){
//            echo "<br>res[0]:".$res[0];
                return $res[0];
            }else{
                echo "<br>ERROR getLastId()";
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
        
        public function getOrdById($id){
            $SQL = sprintf("SELECT * FROM `".$this->table."` WHERE id = \"".$id."\";"); 
//            echo "<br>SQL:".$SQL;
            $mq = mysql_query($SQL);
            
            $res = mysql_fetch_assoc($mq);
//            print_r($res);
            return $res;
        }
        
        public function getOrdPLById($id){
            $SQL = sprintf("SELECT `id_ord` FROM `".$this->table."` WHERE id = \"".$id."\";"); 
//            echo "<br>SQL:".$SQL;
            $mq = mysql_query($SQL);
            
            $res = mysql_result($mq,0);
//            print_r($res);
            return $res;
        }
        
        public function getTypeById($id) {
            $SQL = sprintf("SELECT typ FROM `".$this->table."` WHERE id = \"".$id."\";");
//            echo "<br>SQL:".$SQL;
            $mq = mysql_query($SQL);
            
            $res = mysql_result($mq,0);
//            print_r($res);
            return $res;            
        }
        
        public function getTabOfAttr(){
            $tab = Array( 'id',     'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'infinitive', 'presens', 'past', 'supine', 'imperative', 
                                    'present_participle', 'past_participle', 
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                    'neuter', 'masculin', 'plural' , 'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                    'glowny', 'porzadkowy',
                                    'wymowa', 'uwagi');
            
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
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'S_indefinite', 'S_definite','P_indefinite', 'P_definite', 
                                    'wymowa', 'uwagi'
                                );
                    break;
                
                case 'hjalp_verb':
                case 'verb':            // czasownik
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'infinitive', 'presens', 'past', 'supine', 'imperative', 
                                    'present_participle', 'past_participle', 
                                    'wymowa', 'uwagi'); 
                    break;
                
                case 'adjective':       // przymiotnik   
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'neuter', 'masculin', 'plural' , 'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                    'wymowa', 'uwagi'); 
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
                                    'glowny', 'porzadkowy'); 
                    break;
                
                case 'particle':
                    $tab = Array(   'id_ord', 'typ', 'trans', 
                                    'wymowa', 'uwagi'); 
                    break;
                
                case 'wyrazenie':
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'wymowa', 'uwagi'); 
                    break;
                
                default:
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'infinitive', 'presens', 'past', 'supine', 'imperative', 
                                    'present_participle', 'past_participle', 
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                    'neuter', 'masculin', 'plural' , 'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                    'glowny', 'porzadkowy',
                                    'wymowa', 'uwagi'); 
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
                case 'verb':            // czasownik
                    $tab = Array(   'id_ord', 'trans', 
                                    'infinitive', 'presens', 'past', 'supine', 'imperative', 
                                    'present_participle', 'past_participle', 
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
                                    'glowny', 'porzadkowy'); 
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
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                    'neuter', 'masculin', 'plural' , 'st_rowny','st_wyzszy', 'st_najwyzszy', 
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
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'S_indefinite', 'S_definite','P_indefinite', 'P_definite', 
                                );
                    break;
                
                case 'hjalp_verb':
                case 'verb':            // czasownik
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'infinitive', 'presens', 'past', 'supine', 'imperative', 
                                    'present_participle', 'past_participle', 
                                ); 
                    break;
                
                case 'adjective':       // przymiotnik   
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'neuter', 'masculin', 'plural' , 'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                ); 
                    break;
                
                case 'adverb':          // przysłówek
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                ); 
                    break;
                
                case 'preposition':     // przyimek
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                 ); 
                    break;
                
                case 'pronoun':         // zaimek
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                 );  
                    break;
                
                case 'conjunction':    // spójnik
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans',  
                                ); 
                    break;
                
                case 'interjection':    // wykrzyknik
                    $tab = Array(   'id_ord', 'typ', 'trans',  
                                ); 
                    break;
                
                case 'numeral':    // wykrzyknik
                    $tab = Array(   'id_ord', 'typ', 'trans',  
                                    'glowny', 'porzadkowy'); 
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
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'infinitive', 'presens', 'past', 'supine', 'imperative', 
                                    'present_participle', 'past_participle', 
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
            
            $res = array($quest[0], $quest[1], $RESULT_1, $RESULT_2);
            
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
            
            $licz = 1;
            echo "<br>ID's: ";
            
            while($row = mysql_fetch_row($mq)){
                echo $row[0]."/$licz, ";
//                var_dump($row);
                if($row[0] != $licz){
                    echo "<span class=red>BRAK $licz!!!!</span>";
                    $licz++;
                }
                
                $licz++;
            }
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
            
            $co = $co?$co:'id_ord';
            
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
        public function getTabOrdById($id){
            $SQL = "SELECT * FROM ".$this->table." WHERE `id` = '".$id."';";
            echo $SQL;
            $mq = mysql_query($SQL);
            
            //tworzenie tabelek
            $method='post';
//            $liczID = 0;

            echo "<div class=edit_tab_contener>";
            while($row = mysql_fetch_assoc($mq)){
            var_dump($row);
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
                        <button onclick='Menu();'>".t("Menu")."</button>
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
        }
        
        // tworzy tabelkę rekordów o id_ord podobnym do wprowadzonego słowa 
        public function getSimOrdByIdOrd($text){
            $SQL = "SELECT id, id_ord, rodzaj, trans FROM ".$this->table." WHERE `id_ord` like '%".$text."%';";
//            echo '<br>getCountSimOrdByIdOrd SQL: '.$SQL;
            $mq = mysql_query($SQL);
            echo "<table>";
            echo "<tr><th colspan=4>Jest <span class=red>".$this->getCountSimOrdByIdOrd($text)."</span> podobnych wyników:<th><tr>";
            while($row = mysql_fetch_assoc($mq)){
                echo "<tr>";
                foreach($row as $k => $v){
                    switch($k){
                        case 'rodzaj':
                            echo "<td> => $v ";
                            break;
                        case 'trans':
                            echo "$v</td>";
                            echo "<td><a href='Edit.php?sercz_id=".$id."'>=></a></td>";
                            break;
                        case 'id':
                            echo "<td>$v</td>";
                            $id=$v;
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
            $SQL = "SELECT id, rodzaj, trans, id_ord FROM ".$this->table." WHERE `trans` like '%".$text."%';";
//            echo '<br>getCountSimOrdByIdOrd SQL: '.$SQL;
            $mq = mysql_query($SQL);
            echo "<table>";
            echo "<tr><th colspan=4>Jest <span class=red>".$this->getCountSimOrdByIdOrd($text, 'trans')."</span> podobnych wyników:<th><tr>";
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
                        case 'id_ord':
                            echo "<td> => $v</td>";
                            echo "<td><a href='Edit.php?sercz_id=".$id."'>=></a></td>";
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
            $sql = "SHOW COLUMNS FROM `".$this->table."` LIKE 'typ'";
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
        
        
}

