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
        
        foreach($Zmiany_arr as $k => $v){
            if($v!='' AND $k!='submit' AND $k!='edit' AND $k!='id'){
                $Zmiany_log .= "\'$k\'=>\'$v\'; ";
            }
        }
        
        $t=time();
        $data_create = date("Y-m-d, H:i:s",$t);
        
//        $Zmiany_log = "`id_Ord`=>'".$id_Ord."' `id_Login`=>'".$id_Login."' `data_create`=>'".$data_create."'`DANE:`=>'".$datas."'";
        
        $SQL = "INSERT INTO `".$this->table."`(`id_Ord`, `id_Login`, `data_create`, `Zmiany_log`) 
                VALUES ('".$id_Ord."','".$id_Login."','".$data_create."','".$Zmiany_log."');";
        
        echo "<br>SQL_Log_Ord:".$SQL;
        
        $mq = mysql_query($SQL);
        
        if(mysql_affected_rows()){
            echo "OK";
        }else{
            echo "NOT OK";
        }
    }
    
    public function editLog($id_Ord, $id_Login, $Zmiany_arr) {
        
        foreach($Zmiany_arr as $k => $v){
            if($v!='' AND $k!='submit' AND $k!='edit' AND $k!='id'){
                $Zmiany_log .= "\'$k\'=>\'$v\'; ";
            }
        }
         
        $t=time();
        $data_edit = date("Y-m-d, H:i:s",$t);
        
        $SQL = "INSERT INTO `".$this->table."`(`id_Ord`, `id_Login`, `data_edit`, `Zmiany_log`) 
                VALUES ('".$id_Ord."','".$id_Login."','".$data_edit."','".$Zmiany_log."');";
        
        echo "<br>SQL_Log_Ord:".$SQL;
        
        $mq = mysql_query($SQL);
        
        if(mysql_affected_rows()){
            echo "OK";
        }else{
            echo "NOT OK";
        }
    }
    
    public function deleteLog($id_Ord, $id_Login) {
        
        $t=time();
        $data_edit = date("Y-m-d, H:i:s",$t);
        
        $SQL = "INSERT INTO `".$this->table."`(`id_Ord`, `id_Login`, `data_edit`, `Zmiany_log`) 
                VALUES ('".$id_Ord."','".$id_Login."','".$data_edit."','RECORD DELETED');";
        
        echo "<br>SQL_Log_Ord:".$SQL;
        
        $mq = mysql_query($SQL);
        
        if(mysql_affected_rows()){
            echo "OK";
        }else{
            echo "NOT OK";
        }
    }

}
