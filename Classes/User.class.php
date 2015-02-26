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
    private $PassCrypt;
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

       
    public function setData($imie, $nazwisko, $user, $password, $email, $publicKey, $PassCrypt){
//    private function setData($user, $password){
        
        $t=time();
        $data = date("Y-m-d, H:i:s",$t);
        $sha_password = sha1($password);
//        if($publicKey == ""){$publicKey = 'TO DO!!'.  mt_rand().rand().srand();}else{}
//        if($PassCrypt == ""){$PassCrypt = 'TO DO!!'.  mt_rand().rand().srand();}else{}
        
//        echo "<br>".__FILE__.__LINE__." | PASS: $password, SHAPASS: $sha_password";
        
        if(!$this->getId($user)){

            $SQL = sprintf("INSERT INTO `".$this->table."` (`id`, `imie`, `nazwisko`, `user`, `password`, `PublicKey`,`PassCrypt`,`email`, `data`)
                                                    VALUES (NULL, '".$imie."','".$nazwisko."','".$user."', '".$sha_password."','".$publicKey."','".$PassCrypt."','".$email."', '".$data."');");
            echo "<br>SQL INSERT user: ".$SQL;
//            $mq = mysql_query($SQL);
            
            try{
                $mq = mysql_query($SQL);
            } catch (Exception $ex) {
                echo "<br>ERROR: $ex";
            }
            
            
//            echo "<br>mysql_affected_rows():".mysql_affected_rows();
            if(mysql_affected_rows()==1){
//                echo "<br>SUCCESS: User \"<span class=blue>".$user."</span>\" added.";
                return true;
            }else{
                echo "<br>ERROR mysql_affected_rows()!=1";
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
//            echo "UPDATE OK!";
        }else{
//            echo "<br>UPDATE ERROR!";
            throw new Exception('Nie udało się zmienić danych!');
        }
    }
    
    public function updateDataByUser ($imie, $nazwisko, $password, $PublicKey, $PassCrypt, $email, $usr){
        echo "<br>wchodze3";
//        if($password == ''){
//            return false;
//        }
        if($PublicKey == '' OR $PassCrypt == '' OR $password == ''){    // nie można zmienić danych o pass, bez zmiany WSZYSTKICH tych pól
            $sql = "UPDATE `".$this->table."` SET `imie`='".$imie."',`nazwisko`='".$nazwisko."',`email`='".$email."' WHERE `user` = '".$usr."';";
        }else{
            $sql = "UPDATE `".$this->table."` SET `imie`='".$imie."',`nazwisko`='".$nazwisko."',`password`='".sha1($password)."',`PublicKey`='".$PublicKey."',`PassCrypt`='".$PassCrypt."',`email`='".$email."' WHERE `user` = '".$usr."';";
        }
        echo "<br>SQL:".$sql;
        $mq = mysql_query($sql);
        if(mysql_affected_rows()==1){
//            echo "UPDATE OK!";
        }else{
//            echo "<br>UPDATE ERROR!";
            throw new Exception('Nie udało się zmienić danych!');
        }
    }
    
    public function deleteUserById($id){
        $sql = "DELETE FROM `".$this->table."` WHERE `id` = ".$id.";";
//        echo "<br> SQL:".$sql;
        $mq = mysql_query($sql);
        if(mysql_affected_rows()==1){
//            echo "DELETE OK!";
        }else{
//            echo "<br>DELETE ERROR!";
            throw new Exception('Nie udało się zmienić danych!');
        }
    }
    
    public function comparePassByUser($user, $pass_old, $pass_new_1, $pass_new_2) {
        if($pass_new_1 === $pass_new_2){
            $sql = "SELECT `password` FROM ".$this->table." WHERE `user` = '".$user."';";
//            echo "<br>sql: ".$sql;
            $mq = mysql_query($sql);
            $mr = mysql_result($mq,0);
//            echo "<br>MR: ".$mr;
            if($mr){
                if($mr == sha1($pass_old)){
//                    echo "<br>Compare OK";
                    return true;
                }else{
//                    echo "<br>Compare NIE OK";
                    return false;
                }
            }
        }else{
            return false;
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
        $SQL = sprintf("SELECT user, password, PublicKey, rola, email FROM `".$this->table."` WHERE user=\"".$user."\";");
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
    
    /* POBIERA DANE DLA EDYCJI DANYCH */
    public function getUsersDataForEditByUser($user){
//        $SQL = sprintf("SELECT * FROM `".$this->table."` WHERE `user` = '".$user."';");
        $SQL = sprintf("SELECT `id`, `imie`, `nazwisko`, `user`, `password`, `rola`, `email`, `PublicKey`, `PassCrypt`, `data` FROM `".$this->table."` WHERE `user` = '".$user."';");
//        echo "<br>===================USERs================<br>";
//        echo "<br>SQL getUsersNames: ".$SQL;
        $mq = mysql_query($SQL);
        $arr = array();
//        while($us = mysql_fetch_row($mq,MYSQLI_ASSOC)){
//            array_push($arr, $us);
//        }
        $us = mysql_fetch_row($mq,MYSQLI_ASSOC);
//        var_dump($arr);
        return $us;
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
    
    public function getUserPassCryptByUserOrMail($param) {
        $sql = "SELECT `email`,`PassCrypt` FROM `".$this->table."` WHERE `user`='".$param."' OR `email`='".$param."';";
        echo '<br>SQL:'.$sql;
        try{
            $mq = mysql_query($sql);
//            $result = mysql_result($mq, 0);
            $result = mysql_fetch_assoc($mq);
        } catch (Exception $ex) {
            echo "<br>ERROR:".$ex;
        }
        return $result;
    }
     

}
