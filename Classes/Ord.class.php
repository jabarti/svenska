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
    private $st_wyzszy;
    private $st_najwyzszy;
    
    private $wymowa;
    
    private $table = "ord";
    

    public function setData($id_ord, $typ, $rodzaj, $trans, $infinitive, $presens,$past, 
                            $supine, $imperative, $present_participle, $past_participle, 
                            $S_indefinite, $S_definite, $P_indefinite, $P_definite, $st_wyzszy, 
                            $st_najwyzszy, $wymowa){
        
        if(!$this->getId($id_ord)){
            
            $SQL = sprintf("INSERT INTO `".$this->table."` "
                . "(`id_ord`, `typ`, `rodzaj`, `trans`, `infinitive`, `presens`, `past`, "
                . "`supine`, `imperative`, `present_participle`, `past_participle`, "
                . "`S_indefinite`, `S_definite`, `P_indefinite`, `P_definite`, "
                . "`st_wyzszy`, `st_najwyzszy`, "
                . "`wymowa`) "
                . "VALUES "
                . "('".$id_ord."','".$typ."','".$rodzaj."','".$trans."','".$infinitive."','".$presens."','".$past."',"
                . "'".$supine."','".$imperative."','".$present_participle."','".$past_participle."',"
                . "'".$S_indefinite."','".$S_definite."','".$P_indefinite."','".$P_definite."',"
                . "'".$st_wyzszy."','".$st_najwyzszy."',"
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
            
//            $res = mysql_fetch_row($mq);
            $res = mysql_fetch_assoc($mq);
//            print_r($res);
            return $res;
        }
        
        
}

