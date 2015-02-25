<?php

/****************************************************
 * Project:     Svenska
 * Filename:    FTP_Connection__.php
 * Encoding:    UTF-8
 * Created:     2015-02-24
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/

    $ftp_server = '***';
    $ftp_user = '***';
    $ftp_pass = '***';
    
    $conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server");
    $ftp_log = ftp_login($conn_id, $ftp_user, $ftp_pass);
    
    if($conn_id AND $ftp_log){
        echo "<br>".__FILE__."/ Conn OK: ".$conn_id." / ftp_log: ".$ftp_log;
    }else{
        echo "<br>".__FILE__."/ Conn NOT";
    }
    
    echo "<br>FTP_SERVER:".$ftp_server;