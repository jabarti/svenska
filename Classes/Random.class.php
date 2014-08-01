<?php

/* * **************************************************
 * Project:     Svenska
 * Filename:    Random.class
 * Encoding:    UTF-8
 * Created:     2014-08-01, 02:09:41
 *
 * Author      Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */

class Random {
//    INSERT INTO `random`(`id`, `word_id`, `countOfWordId`, `ques_num`, `countOfQuesNum`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
        private $id;
        private $word_id;
        private $countOfWordId;
        private $ques_num;
        private $countOfQuesNum;
        
        private $table = "random";
        
//        private $array = Array();
//        
//        public function setData($array){
//            
//        }
        
        public function setData($word_id, $countOfWordId, $ques_num, $countOfQuesNum){
            $this->word_id = $word_id;
            $this->countOfWordId = $countOfWordId;
            $this->ques_num = $ques_num;
            $this->countOfQuesNum = $countOfQuesNum;
                        
            $this->id = $this->getIdByWordId($word_id);
            
            if($this->id === false){
                echo "<br> No ID like this! LET's INSERT";
            }else{
                echo "<br> Is ID like this! LET's UPDATE";
                $row = $this->getParamsFromDBById();
            }
            
            $this->getParams();
            
        }
        
        public function getIdByWordId($word_id){
            $SQL = sprintf("SELECT id FROM ".$this->table." WHERE `word_id` = '".$word_id."';");
            echo "<br>======<br>SQL: ".$SQL;
            $mq = mysql_query($SQL);
            
//            $res=0;
            
            if(mysql_affected_rows()){
                echo "<br> JEST Stat dla Słowa o ID=".$word_id;
                $res = mysql_result($mq,0);
            }else{
                echo "<br> NIE MA Stat dla Słowa o ID=".$word_id;    
                $res=false;
            }
            echo "<br>ID: ".$res;
            return $res;
        }
        
        public function getParamsFromDBById(){

            $SQL = sprintf("SELECT * FROM ".$this->table." WHERE `id` = '".$this->id."';");
            echo "<br>======<br>SQL: ".$SQL;
            $mq = mysql_query($SQL);
            
//            $res=0;
            
            if(mysql_affected_rows()){
                $row = mysql_fetch_row($mq);
                echo '<br>';var_dump($row);
            }
        }
    
        public function getParams() {
//            echo "<br>Oto Parametr  \$ques_num (IF EXIST!! Should not!):".$ques_num;
            echo "<br>Oto Parametr tego obj o nazwie id:".$this->id;
            echo "<br>Oto Parametr tego obj o nazwie word_id:".$this->word_id;
            echo "<br>Oto Parametr tego obj o nazwie ques_num:".$this->ques_num;
            echo "<br>Oto Parametr tego obj o nazwie countOfQuesNum:".$this->countOfQuesNum;
        }
}
