<?php
/* * **************************************************
 * Project:     ZZZProba
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
    
    private $wymowa;
    
    private $table = "ord";
    

    public function setData($id_ord, $typ, $rodzaj, $trans, $infinitive, $presens,$past, 
                            $supine, $imperative, $present_participle, $past_participle, 
                            $S_indefinite, $S_definite, $P_indefinite, $P_definite, 
                            $neuter, $masculin, $plural, $st_rowny, $st_wyzszy, $st_najwyzszy, 
                            $wymowa){
        
        if(!$this->getId($id_ord)){
            
            $SQL = sprintf("INSERT INTO `".$this->table."` "
                . "(`id_ord`, `typ`, `rodzaj`, `trans`, `infinitive`, `presens`, `past`, "
                . "`supine`, `imperative`, `present_participle`, `past_participle`, "
                . "`S_indefinite`, `S_definite`, `P_indefinite`, `P_definite`, "
                . "`neuter`, `masculin`, `plural`,`st_rowny`, `st_wyzszy`, `st_najwyzszy`, "
                . "`wymowa`) "
                . "VALUES "
                . "('".$id_ord."','".$typ."','".$rodzaj."','".$trans."','".$infinitive."','".$presens."','".$past."',"
                . "'".$supine."','".$imperative."','".$present_participle."','".$past_participle."',"
                . "'".$S_indefinite."','".$S_definite."','".$P_indefinite."','".$P_definite."',"
                . "'".$neuter."','".$masculin."','".$plural."','".$st_rowny."','".$st_wyzszy."','".$st_najwyzszy."',"
                . "'".$wymowa."');");
//            echo "<br>INSERT: ".$SQL;
        
//            try{mysql_query($SQL);}
//                catch(Exception $ex){
//                echo "ERROE wsadu";
//            }
        
            if (mysql_query($SQL)){
                echo "<br>WSADZONE!!!";
            }else{
                echo "<br>ERROR wsadu";
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
        
        public function getTypeById($id) {
            $SQL = sprintf("SELECT typ FROM `".$this->table."` WHERE id = \"".$id."\";");
//            echo "<br>SQL:".$SQL;
            $mq = mysql_query($SQL);
            
            $res = mysql_result($mq,0);
//            print_r($res);
            return $res;            
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
                                    'wymowa'
                                );
                    break;
                
                case 'verb':            // czasownik
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'infinitive', 'presens', 'past', 'supine', 'imperative', 
                                    'present_participle', 'past_participle', 
                                    'wymowa'); 
                    break;
                
                case 'adjective':       // przymiotnik   
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'neuter', 'masculin', 'plural' , 'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                    'wymowa'); 
                    break;
                
                case 'adverb':          // przysłówek
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                    'wymowa'); 
                    break;
                
                case 'preposition':     // przyimek
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                    'wymowa'); 
                    break;
                
                case 'pronoun':         // zaimek
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                    'wymowa');  
                    break;
                
                case 'conjunction':    // spójnik
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans',  
                                    'wymowa'); 
                    break;
                
                case 'wyrazenie':
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'wymowa'); 
                    break;
                
                default:
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
                                    'infinitive', 'presens', 'past', 'supine', 'imperative', 
                                    'present_participle', 'past_participle', 
                                    'S_indefinite', 'S_definite', 'P_indefinite', 'P_definite', 
                                    'neuter', 'masculin', 'plural' , 'st_rowny','st_wyzszy', 'st_najwyzszy', 
                                    'wymowa'); 
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
                
                case 'wyrazenie':
                    $tab = Array(   'id_ord', 'trans', 
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
                
                case 'wyrazenie':
                    $tab = Array(   'id_ord', 'typ', 'rodzaj', 'trans', 
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
                if($value != ''){
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
            
//            echo "<br>Rand:".$rand;
            
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
            
//            echo "<br>Rand:".$rand;
            
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
}

