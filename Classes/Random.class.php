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
        
//        public function setData($word_id, $countOfWordId, $ques_num, $countOfQuesNum){
        public function setData($word_id, $ques_num){
            $this->word_id = $word_id;
//            $this->countOfWordId = $countOfWordId;
            $this->ques_num = $ques_num;
//            $this->countOfQuesNum = $countOfQuesNum;
                        
            $this->id = $this->getIdByWordIdAndQuestNum($word_id, $ques_num);
            
            if($this->id === false){
                
                $this->id = ((int)$this->getLastId(false))+1;
//                echo "<br> No ID like this! LET's INSERT";
//                INSERT INTO `random`(`id`, `word_id`, `countOfWordId`, `ques_num`, `countOfQuesNum`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
                $SQL = sprintf("INSERT INTO `".$this->table."` (`id`, `word_id`, `countOfWordId`, `ques_num`, `countOfQuesNum`) VALUES ('".$this->id."', '".$this->word_id."', '1', '".$this->ques_num."', '1');");
//                echo "<br> SQL = ".$SQL;
                $mq = mysql_query($SQL);
                
                if(mysql_affected_rows()){
//                    echo "<br>WESZŁO do RAND";
                }else{
                    echo "<br>NIE WESZŁO do RAND";
                }
            }else{
//                echo "<br> Is ID like this! LET's UPDATE";
                $row = $this->getParamsFromDBById();
                
                $SQL = "UPDATE `".$this->table."` SET ";
                
                
                foreach($row as $k => $v){
                    switch($k){
                        case 'id':
                            $tag = " WHERE `$k` ='".$v."' AND ";
                            break;
                        case 'word_id':
                            $tag .= " `$k` ='".$v."' AND";
                            break;
                        case 'countOfWordId':
                            $v = ((int)$v)+1;
                            $SQL .= "`$k` ='".$v."',";
                            break;
                        case 'ques_num':
                            $tag .= " `$k` ='".$v."';";
                            break;
                        case 'countOfQuesNum':
                            $v = ((int)$v)+1;
                            $SQL .= "`$k` ='".$v."'";
                            break;
                    }
                }
                $SQL .= $tag;
                
//                echo "<br> fin SQl: ".$SQL;
                
                $mq = mysql_query($SQL);
                
                if(mysql_affected_rows()){
//                    echo "<br>WESZŁO do RAND";
                }else{
                    echo "<br>NIE WESZŁO do RAND";
                }
            }
            
//            $this->getParams();
            
        }
        
        public function getIdByWordIdAndQuestNum($word_id, $ques_num){
            $SQL = sprintf("SELECT id FROM ".$this->table." WHERE `word_id` = '".$word_id."' AND `ques_num` = '".$ques_num."';");
//            echo "<br>======<br>SQL: ".$SQL;
            $mq = mysql_query($SQL);
            
//            $res=0;
            
            if(mysql_affected_rows()){
//                echo "<br> JEST Stat dla Słowa o ID=".$word_id;
                $res = mysql_result($mq,0);
            }else{
//                echo "<br> NIE MA Stat dla Słowa o ID=".$word_id;    
                $res=false;
            }
//            echo "<br>ID: ".$res;
            return $res;
        }
        
        public function getParamsFromDBById(){

            $SQL = sprintf("SELECT * FROM ".$this->table." WHERE `id` = '".$this->id."';");
//            echo "<br>======<br>SQL: ".$SQL;
            $mq = mysql_query($SQL);
            
            if(mysql_affected_rows()){
//                $row = mysql_fetch_row($mq);
                $row = mysql_fetch_assoc($mq);
                
//                echo '<br>Pobrany rekord:';var_dump($row);

                return $row;
            }
        }
    
        public function getParams() {
//            echo "<br>Oto Parametr  \$ques_num (IF EXIST!! Should not!):".$ques_num;
            echo "<br>Oto Parametr tego obj o nazwie id:".$this->id;
            echo "<br>Oto Parametr tego obj o nazwie word_id:".$this->word_id;
            echo "<br>Oto Parametr tego obj o nazwie ques_num:".$this->ques_num;
            echo "<br>Oto Parametr tego obj o nazwie countOfQuesNum:".$this->countOfQuesNum;
        }
        
        public function getLastId($tabLH) {
            
            if($tabLH){
                $tabLH = 'LH';
            }else{
                $tabLH = '';
            }
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
        
        public function getAllToTable(){
            $SQL = sprintf("SELECT r.`word_id`, o.`id_ord`, r.`ques_num`, r.`countOfWordId`, r.`countOfQuesNum` 
                            FROM `random` r JOIN `ord` o 
                            WHERE r.`word_id` = o.`id` 
                            ORDER BY r.`word_id` ASC");
            echo "<br>SQL: ".$SQL;
            $mq = mysql_query($SQL);
            if(mysql_affected_rows()){
                echo "<table>";
                echo "<th>wordId</th><th>Word</th><th>questID</th><th>countOfWordId</th><th>countOfQuesNum</th>";
                while ($row = mysql_fetch_row($mq)) {
//                    echo "<br>";var_dump($row);
                    echo "<tr>";
                    foreach ($row as $k ){
                                echo "<td> $k  </td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                
            }else{
                echo "ERROR in SQL: ".$SQL;
            }
        }
        
        public function getCountWordToTable(){
            $SQL = sprintf("SELECT `word_id`, count(`countOfWordId`) FROM `random` GROUP BY `word_id`;");
            echo "<br>SQL: ".$SQL;
            $mq = mysql_query($SQL);
            if(mysql_affected_rows()){
                echo "<table>";
                echo "<th>wordId</th><th>count</th>";
                while ($row = mysql_fetch_row($mq)) {
//                    echo "<br>";var_dump($row);
                    echo "<tr>";
                    foreach ($row as $k ){
                                echo "<td> $k  </td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                
            }else{
                echo "ERROR in SQL: ".$SQL;
            }
        }
        
        public function getMaxWordToTable(){
            $SQL = sprintf("SELECT `word_id`, sum(`countOfWordId`) FROM `random` GROUP BY `word_id`;");
            echo "<br>SQL: ".$SQL;
            $mq = mysql_query($SQL);
            if(mysql_affected_rows()){
                echo "<table>";
                echo "<th>wordId</th><th>count</th>";
                while ($row = mysql_fetch_row($mq)) {
//                    echo "<br>";var_dump($row);
                    echo "<tr>";
                    foreach ($row as $k ){
                                echo "<td> $k  </td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                
            }else{
                echo "ERROR in SQL: ".$SQL;
            }
        }
        
        public function deleteAllRecords(){
            $SQL = sprintf("DELETE FROM ".$this->table.";");
            $mq = mysql_query($SQL);
            
            if(mysql_affected_rows()){
                echo "<br>OK, skasowane!";
            }else{
                echo "<br>Err, NIE skasowane!";
            }
        }
}
