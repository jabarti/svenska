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
    private $imie;
    private $nazwisko;
    private $user;
    private $password;
    private $publicKey;
    private $rola;
    private $email;
    private $data;
    
    private $table = "login";
    
//        $this->id = $this->getId($user);
//        $this->user = $user;
//        $this->password = $sha_password;
//        $this->data = $data;
//            
//      $userArr = array($this->id, $this->user, $this->password, $this->data);

       
    public function setData($imie, $nazwisko, $user, $password, $email){
//    private function setData($user, $password){
        
        $t=time();
        $data = date("Y-m-d, H:i:s",$t);
        $sha_password = sha1($password);
        $publicKey = 'TO DO!!'.  mt_rand().rand().srand();
        
//        echo "<br>".__FILE__.__LINE__." | PASS: $password, SHAPASS: $sha_password";
        
        if(!$this->getId($user)){

            $SQL = sprintf("INSERT INTO `".$this->table."` (`id`, `imie`, `nazwisko`, `user`, `password`, `PublicKey`,`email`, `data`)
                                                    VALUES (NULL, '".$imie."','".$nazwisko."','".$user."', '".$sha_password."','".$publicKey."','".$email."', '".$data."');");
            echo "<br>SQL INSERT user: ".$SQL;
            $mq = mysql_query($SQL);
//            echo "<br>mysql_affected_rows():".mysql_affected_rows();
            if(mysql_affected_rows()==1){
//                echo "<br>SUCCESS: User \"<span class=blue>".$user."</span>\" added.";
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
    
    public function updateDataByAdmin_I ($id, $imie, $nazwisko, $rola, $email){
        $sql = "UPDATE `".$this->table."` SET `imie`='".$imie."', `nazwisko`='".$nazwisko."',`rola`='".$rola."',`email`='".$email."' WHERE `id`='".$id."';";
//        echo "<br>SQL:".$sql;
        $mq = mysql_query($sql);
        if(mysql_affected_rows()==1){
            echo "UPDATE OK!";
        }else{
            echo "<br>UPDATE ERROR!";
            throw new Exception('Nie udało się zmienić danych!');
        }
    }


        public function getId($user){
        $SQL = sprintf("SELECT `id` FROM `".$this->table."` WHERE user=\"".$user."\";");
//        echo "<br>SQL".$SQL;
        $mq = mysql_query($SQL);
        if(mysql_affected_rows()==1){
//            echo '<br>mysql_affected_rows == true';
            $mr = mysql_result($mq,0);
        }else{
//            echo '<br>mysql_affected_rows == true';
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
//            echo "<br>SUCCESS: User \"<span class=blue>".$user."</span>\" loaded.";
            return $row;
        }else{
            echo "<br>ERROR: User \"<span class=blue>".$user."</span>\" NOT added.";
            return false;
        }
    }  
    
    public function getLogDataByUser($user){
        $SQL = sprintf("SELECT user, password, PublicKey, rola FROM `".$this->table."` WHERE user=\"".$user."\";");
//        $SQL = sprintf("SELECT * FROM `".$this->table."` WHERE user=\"".$user."\";");
        $mq = mysql_query($SQL);
        
        if(mysql_affected_rows()){
            $row = mysql_fetch_row($mq);
//            echo "<br>SUCCESS: User \"<span class=blue>".$user."</span>\" loaded.";
            return $row;
        }else{
            echo "<br>ERROR: User \"<span class=blue>".$user."</span>\" NOT added.";
            return false;
        }
    }  
    
    public function getUsersNames(){
        $SQL = sprintf("SELECT `user` FROM `".$this->table."`;");
//        echo "<br>===================USERs================<br>";
//        echo "<br>SQL getUsersNames: ".$SQL;
        $mq = mysql_query($SQL);
        $arr = array();
        while($us = mysql_fetch_row($mq)){
            array_push($arr, $us['0']);
        }
                
//        echo "<br>arr:";
        var_dump($arr);
        
//        echo "<br>Users:".$arr[0]."/".$arr[1];
        
        return $arr;
    }
    
   
    /* POBIERA DANE DLA ADMINISTRACJI DANYMI */
    public function getUsersDataForAdmin(){
        $SQL = sprintf("SELECT * FROM `".$this->table."`;");
//        echo "<br>===================USERs================<br>";
//        echo "<br>SQL getUsersNames: ".$SQL;
        $mq = mysql_query($SQL);
        $arr = array();
        while($us = mysql_fetch_array($mq,MYSQLI_ASSOC)){
            array_push($arr, $us);
        }
//        var_dump($arr);
        return $arr;
    }
    
    public function getRolesOfUser(){
            $sql = sprintf("SHOW COLUMNS FROM `".$this->table."` LIKE 'rola';");
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
//            $vals = str_split($vals, 1);
//            sort($vals);
            return $vals;
        }

}
