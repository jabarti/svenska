<?php

/* * **************************************************
 * Project:     Svenska
 * Filename:    Log_Ord.class.php
 * Encoding:    UTF-8
 * Created:     2015-03-13, 00:12:08
 *
 * Author      Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */

class Log_Ord{
    
    private $id;
    private $id_Ord;
    private $id_Login;
    private $data_create;
    private $data_edit;
    private $Zmiany_log;
    
    private $table = "Log_Ord";
    
    
    //VALUES ('".$id."','".$id_Ord."','".$id_Login."','".$data_create."','".$data_edit."','".$Zmiany_log."');";
    
    public function setData($id_Ord, $id_Login, $Zmiany_arr) {
        
        $typZM = gettype($Zmiany_arr);
        
//        echo "<br> TYP ZMIENNEJ ($Zmiany_arr): ".$typZM;
        
        switch($typZM){
            case 'array':
                ?><script>//console.log("ARRAY");</script><?php
//                echo "<br>".__LINE__." / ";var_dump($Zmiany_arr);
                foreach($Zmiany_arr as $k => $v){
                    if($v!='' AND $k!='submit' AND $k!='submitHTA' AND $k!='edit' AND $k!='id'){
                        $Zmiany_log .= "\'$k\'=>\'$v\'; ";
                    }
                }
                break;
            case 'string':
                ?><script>//console.log("STRING");</script><?php //
                $Zmiany_log = $Zmiany_arr;
                break;
            default:
                echo "<br>ERROR TYPU!!";
                break;
        }
        
        $t=time();
        $data_create = date("Y-m-d, H:i:s",$t);
            
        $SQL = "INSERT INTO `".$this->table."`(`id_Ord`, `id_Login`, `data_create`, `Zmiany_log`) 
                VALUES ('".$id_Ord."','".$id_Login."','".$data_create."','".$Zmiany_log."');";
        
//        echo "<br>SQL_Log_Ord:".$SQL;
        
        $mq = mysql_query($SQL);
        
        if(mysql_affected_rows()){
//            echo "OK";
            return true;
        }else{
//            echo "NOT OK";
            return false;
        }
    }
    
    public function editLog($id_Ord, $id_Login, $Zmiany_arr) {
        
        if(is_array($Zmiany_arr)){
            foreach($Zmiany_arr as $k => $v){
                if($v!='' AND $k!='submit' AND $k!='edit' AND $k!='id'){
                    $Zmiany_log .= "\'$k\'=>\'$v\'; ";
                }
            }
        }else{
//            $Zmiany_log = $Zmiany_arr;
            $Zmiany_log = str_replace("'","\"",$Zmiany_arr);
//            echo "<br>ZMIANY: ".$Zmiany_log;
        }
         
        $t=time();
        $data_edit = date("Y-m-d, H:i:s",$t);
        
        $SQL = "INSERT INTO `".$this->table."`(`id_Ord`, `id_Login`, `data_edit`, `Zmiany_log`) 
                VALUES ('".$id_Ord."','".$id_Login."','".$data_edit."','".$Zmiany_log."');";
        
//        echo "<br>SQL_Log_Ord:".$SQL;
        
        $mq = mysql_query($SQL);
        
        if(mysql_affected_rows()){
            echo "OK";
            return true;
        }else{
            echo "NOT OK";
            return false;
        }
    }
    
    public function deleteLog($id_Ord, $id_Login) {
        
        $t=time();
        $data_edit = date("Y-m-d, H:i:s",$t);
        
        $SQL = "INSERT INTO `".$this->table."`(`id_Ord`, `id_Login`, `data_edit`, `Zmiany_log`) 
                VALUES ('".$id_Ord."','".$id_Login."','".$data_edit."','RECORD DELETED');";
        
//        echo "<br>SQL_Log_Ord:".$SQL;
        
        $mq = mysql_query($SQL);
        
        if(mysql_affected_rows()){
            echo "OK";
            return true;
        }else{
            echo "NOT OK";
            return false;
        }
    }
    
    public function getLogByOrdId($id_Ord) {
//        echo "<br>ID_ord:".$id_Ord;
        $SQL = "SELECT * FROM `".$this->table."` WHERE `id_Ord`='".$id_Ord."' ORDER BY `id_Ord`;";
//        echo "<br>getLogByOrdId($id_Ord): ".$SQL;
        $mq =  mysql_query($SQL);
        if($mq){
            $arr = Array();
            while($row = mysql_fetch_assoc($mq)){
                array_push($arr, $row);
            }
//            echo "<br>VARDUMP: ";var_dump($arr);
            return $arr;
        }else{
            echo "<br>ERROR line:".__LINE__." / file: ".__FILE__;
        }
    }
    
    public function getLogByUsrId($id_Login) {
//        echo "<br>ID_ord:".$id_Ord;
        $SQL = "SELECT * FROM `".$this->table."` WHERE `id_Login`='".$id_Login."' ORDER BY `id_Ord`;";
//        echo "<br>getLogByUsrId($id_Login): ".$SQL;
        $mq =  mysql_query($SQL);
        if($mq){
            $arr = Array();
            while($row = mysql_fetch_assoc($mq)){
                array_push($arr, $row);
            }
//            echo "<br>VARDUMP: ";var_dump($arr);
            return $arr;
        }else{
            echo "<br>ERROR line:".__LINE__." / file: ".__FILE__;
        }
    }
    
    public function getAllLog($kierunek) {
        
        if($kierunek != ''){
            if($kierunek == 'down'){
                $DIR = 'DESC';
            }else{
                $DIR = 'ASC';
            }
        }else{
            $DIR = '';
        }
        
//        echo "<br>kierunek:".$kierunek." / DIR:".$DIR;
        
        $SQL = "SELECT * FROM `".$this->table."` ORDER BY `id_Ord` $DIR;";
//        echo "<br>getLogByUsrId($id_Login): ".$SQL;
        $mq =  mysql_query($SQL);
        if($mq){
            $arr = Array();
            while($row = mysql_fetch_assoc($mq)){
                array_push($arr, $row);
            }
//            echo "<br>VARDUMP: ";var_dump($arr);
            return $arr;
        }else{
            echo "<br>ERROR line:".__LINE__." / file: ".__FILE__;
        }
    }
    public function getAllLogByDateCreate($kierunek) {
//        echo "<br>ID_ord:".$id_Ord;
        
        if($kierunek != ''){
            $WHERE = ' WHERE `data_create` IS NOT NULL ';
            if($kierunek == 'down'){
                $DIR = 'DESC';
            }else{
                $DIR = 'ASC';
            }
        }else{
            $WHERE = '';
            $DIR = '';
        }
        
        $SQL = "SELECT * FROM `".$this->table."`  $WHERE ORDER BY `data_create` $DIR;";
//        echo "<br>getLogByUsrId($id_Login): ".$SQL;
        $mq =  mysql_query($SQL);
        if($mq){
            $arr = Array();
            while($row = mysql_fetch_assoc($mq)){
                array_push($arr, $row);
            }
//            echo "<br>VARDUMP: ";var_dump($arr);
            return $arr;
        }else{
            echo "<br>ERROR line:".__LINE__." / file: ".__FILE__;
        }
    }
    
    public function getAllLogByDateEdit($kierunek) {
//        echo "<br>ID_ord:".$id_Ord;
        
        if($kierunek != ''){
            $WHERE = ' WHERE `data_edit` IS NOT NULL ';
            if($kierunek == 'down'){
                
                $DIR = 'DESC';
            }else{
                $DIR = 'ASC';
            }
        }else{
            $WHERE = '';
            $DIR = '';
        }
        
        $SQL = "SELECT * FROM `".$this->table."` $WHERE ORDER BY `data_edit` $DIR;";
//        echo "<br>getLogByUsrId($id_Login): ".$SQL;
        $mq =  mysql_query($SQL);
        if($mq){
            $arr = Array();
            while($row = mysql_fetch_assoc($mq)){
                array_push($arr, $row);
            }
//            echo "<br>VARDUMP: ";var_dump($arr);
            return $arr;
        }else{
            echo "<br>ERROR line:".__LINE__." / file: ".__FILE__;
        }
    }

}
