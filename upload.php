<?php

/****************************************************
 * Project:     Svenska
 * Filename:    upload.php
 * Encoding:    UTF-8
 * Created:     2015-02-23
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | '.t('upload');
include 'header.php';
include 'buttons.php';

echo "POST:";
foreach ($_POST as $k => $v){
    echo "<br>$k => $v";
}
echo "<br>FILES:";
foreach ($_FILES as $k => $v){
    foreach($v as $t => $s){
        echo "<br>$t => $s";
    }
}

echo "<br>=============";

if(isset($_POST)){            
        require 'FTP_Connection.php';
    
        echo "<br>FTP_SERVER:".$ftp_server;
        
	// set up a connection or die
	$conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server");
        
        if($conn_id){
            echo "<br>".__LINE__."/ Conn OK: ".$conn_id;
        }else{
            echo "<br>".__LINE__."/ Conn NOT: ".$conn_id;
        }
	// try to login
	$login_result = ftp_login($conn_id, $ftp_user, $ftp_pass);
 
        $real_name = $_FILES['file']['name'];
        $_FILES['file']['type'];
        $_FILES['file']['tmp_name'];
        $_FILES['file']['error'];
        $_FILES['file']['size'];

        // Tworzymy osobny folder dla każdego usera 
        // OBS! działa tylko przy zalogowanym userze lub przy przesyłaniu form z nowym userem!!!
        if(isset($_SESSION['user'])){
            $userFolder = $_SESSION['user']; 
        }elseif($_POST['user']){
            $userFolder = $_POST['user'];
        }
        
        try{
            ftp_mkdir($conn_id,$userFolder);
            echo "<br> Dir CREATED";
        } catch (Exception $ex) {
            echo "<br> Dir NOT Created $ex";
        }
        
        $remote_file = $userFolder."/".$real_name;
        
        echo "<br>remote_file: ".$remote_file;
        
//        $try_put_file = ftp_put($conn_id, $remote_file, $_FILES['file']['tmp_name'], FTP_BINARY);
//	if ($try_put_file) {
//		echo "<br>".__LINE__."successfully uploaded {$_FILES['file']['name']}\n";
                
                // Tu odczytujemy plik i zapisujemy odczytane wartości (jeśli klucz lub zaszyfr. wiadomość) do BD
                try{
                    echo "<br>".__LINE__."OK1a<br>"; 
                    echo "<br>FILE TYPE:" .$_FILES['file']['type']."<br>";
                    echo "<br>FILE Name:" .$_FILES['file']['name']."<br>";
                    
                    $fil = $_FILES['file']['name'];
                    
                    echo "<br>STRPOS: ".strpos($fil,"public_key")."<br>";
                    echo "<br>STRPOS: ".strpos($fil,"Secret_Message")."<br>";
                    
                    if(strpos($fil,"public_key")){
                        $filBool = true;
                        $where = "PubKey";
                    }elseif(strpos($fil,"Secret_Message")){
                        $filBool = true;
                        $where =  "CrypMess";
                    }else{
                        $filBool = false;
                    }
                    
                
                    if($filBool){
                        echo "<br> biere plik $fil do zabawy!!! <br>";
                        $file = file_get_contents($_FILES['file']['tmp_name'], true);
//                        var_dump($file);
//                        $lines = explode("\n", str_replace("\r", '', $file));
//                        echo "<br>line[0]PUBKey:".$lines[0];
//                        echo "<br>line[1]n:".$lines[1];
                        echo "<br>line[0]PUBKey:".$file;
                        
                        $try_put_file = ftp_put($conn_id, $remote_file, $_FILES['file']['tmp_name'], FTP_BINARY);
                        
                        if ($try_put_file) {
                            echo "<br>".__LINE__."successfully uploaded {$_FILES['file']['name']}\n";
                        }else {
                            echo "<br>".__LINE__."There was a problem while uploading\n";
                        }
                        switch($where){
                                case 'PubKey':
                                    echo "<br> TO KLUCZ PUB!";
                                    echo "<br>line[0]PUBKey:".$lines[0];
                                    echo "<br>line[1]n:".$lines[1];
                                break;
                                case 'CrypMess':
                                    echo "<br> TO CrypMess!";
                                    echo "<br>line[0]CrypMess:".$lines[0];
                                    echo "<br>line[1]n:".$lines[1];
                                break;
                                }
                        }else{
                            echo "<br> NIE biere pliku $fil do zabawy!!! <br>";
                        }
                } catch (Exception $ex) {
                    echo "<br>".__LINE__."/ERROR: ".$ex;
                }
	ftp_close($conn_id);
}
?>
<br><button onclick="window.location.href='try.php'">WRÓĆ</button>