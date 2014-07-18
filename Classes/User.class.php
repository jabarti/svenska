<?php

/* * **************************************************
 * Project:     Svenska
 * Filename:    User.class.php
 * Encoding:    UTF-8
 * Created:     2014-07-11, 01:41:29
 *
 * Author      Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */

class User {
    
    private $id;
    private $user;
    private $password;
    private $data;
    
    private $table = "login";
    
//        $this->id = $this->getId($user);
//        $this->user = $user;
//        $this->password = $sha_password;
//        $this->data = $data;
//            
//      $userArr = array($this->id, $this->user, $this->password, $this->data);

       
    public function setData($user, $password){
//    private function setData($user, $password){
        
        $t=time();
        $data = date("Y-m-d, H:i:s",$t);
        $sha_password = sha1($password);
        
        if(!$this->getId($user)){
            $SQL = sprintf("INSERT INTO `".$this->table."` (`user`, `password`, `data`)
                                                    VALUES ('".$user."', '".$sha_password."', '".$data."');");
//            echo "<br>SQL INSERT user: ".$SQL;
            $mq = mysql_query($SQL);
            if(mysql_affected_rows()){
                echo "<br>SUCCESS: User \"<span class=blue>".$user."</span>\" added.";
                return true;
            }else{
                echo "<br>ERROR";
                return false;
            }
        }else{
            echo "<br>User like \"<span class=red>".$user."</span>\" exists.";
            return false;
        }
    }
    
//    private function getId($user){
    public function getId($user){
        $SQL = sprintf("SELECT id FROM `".$this->table."` WHERE user=\"".$user."\";");
//        echo "<br>SQL".$SQL;
        $mq = mysql_query($SQL);
        if(mysql_affected_rows()){
            echo '<br>mysql_affected_rows == true';
            $mr = mysql_result($mq,0);
        }else{
            echo '<br>mysql_affected_rows == true';
            $mr = false;
        }
//        echo "<br>User ID:".$mr;
        return $mr;
    }
    
    public function getUserByName($user){
        $SQL = sprintf("SELECT * FROM `".$this->table."` WHERE user=\"".$user."\";");
        $mq = mysql_query($SQL);
        
        if(mysql_affected_rows()){
            $row = mysql_fetch_row($mq);
            echo "<br>SUCCESS: User \"<span class=blue>".$user."</span>\" loaded.";
            return $row;
        }else{
            echo "<br>ERROR: User \"<span class=blue>".$user."</span>\" NOT added.";
            return false;
        }
    }  

}
