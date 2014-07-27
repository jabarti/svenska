<?php

/* * **************************************************
 * Project:     Svenska
 * Filename:    Score.class.php
 * Encoding:    UTF-8
 * Created:     2014-07-15, 10:52:00
 *
 * Author      Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */

class Score {
    private $id;
    private $user_id;
    private $good;
    private $bad;
    private $data;
    private $table = "score";
      
    private function getUsrIdByUsrName($user_name){
        $user = new User();
        $user_id = $user->getId($user_name);
//        $this->user_id = $user_id;
//        echo "<br>USER ID:".$user_id;
        return $user_id;
    }
    
    public function setScoreData($user_name,$good,$bad){
        $user_id = $this->getUsrIdByUsrName($user_name);
        
//        echo "<br>USER ID:".$user_id; 
//        echo "<br>USER Name:".$user_name; 
//        echo "<br>USER Good:".$good; 
//        echo "<br>USER Bad:".$bad; 
        
        $this->user_id = $user_id;
        $this->good = $good;
        $this->bad = $bad;
    }
    
    public function saveScoreData(){
        $SQL = sprintf("INSERT INTO `".$this->table."`(`user_id`, `good`, `bad`) VALUES ('".$this->user_id."', '".$this->good."', '".$this->bad."');");
//        echo "<br>SQL: $SQL";
        if(!mysql_query($SQL))
            echo '<p class=red><b>ERROR DURING INSERT SCORES!!!!</b></p>';
//        else
//            echo '<p class=red><b>OK DURING INSERT SCORES!!!!</b></p>';
    }
    
    public function getScoresOfUser($user_name){
        echo "<br>This USR ID: ". $this->user_id; 
        echo "<br>get USR ID by name: ". $this->getUsrIdByUsrName($user_name);
        
        $user_id = ($this->user_id) ? ($this->user_id) : ($this->getUsrIdByUsrName($user_name));
        
        echo "<br>FIN USR ID by name: ".$user_id;
        
        $SQL = sprintf("SELECT SUM(`good`), SUM(`bad`) FROM `".$this->table."` WHERE user_id = '".$user_id."';"); // GROUP BY 'id';");
        echo "<br>SQL: $SQL";
        $mq = mysql_query($SQL);
        
        $row = mysql_fetch_row($mq);
               
        echo "<br>Good: ".$row[0]." Bad: ".$row[1];
        return $row;
    }
    
}
