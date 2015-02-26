<?php

/****************************************************
 * Project:     Svenska
 * Filename:    EditUserByUserMOD.php
 * Encoding:    UTF-8
 * Created:     2015-02-21
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Edit User Data';
include 'header.php';
//include 'buttons.php';

//foreach($_POST as $k => $v){
//    echo "<br>POST[$k] => $v";
//}

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];

$pass_old = $_POST['pass_old'];
$pass_new_1 = $_POST['pass_new_1'];
$pass_new_2 = $_POST['pass_new_2'];

$email = $_POST['email'];
$usr = $_POST['user'];

$classUser = new User();
$passOK = $classUser->comparePassByUser($usr, $pass_old, $pass_new_1, $pass_new_2);

if($passOK){
    $password = $pass_new_1;
}else{
    $password = '';
}

//echo "<br>vardump(files)";var_dump($_FILES); 

require 'FTP_Connection.php';

$real_name_PK = $_FILES['file']['name'][0];
$real_name_PC = $_FILES['file']['name'][1];
    
echo "<br>File_Name1: ".$real_name_PK;
echo "<br>File_Name2: ".$real_name_PC;

if(isset($_SESSION['user'])){
    $userFolder = $_SESSION['user'];//?$_SESSION['user']:$_POST['login']; 
}elseif(isset($_POST['login'])){
    $userFolder = $_POST['login'];
}else{
    $userFolder = 'WildFolder';
}  
          
$remote_file_PK = $userFolder."/".$real_name_PK;
$remote_file_PC = $userFolder."/".$real_name_PC;

echo "<br>remote_file_PK: ".$remote_file_PK;
echo "<br>remote_file_PC: ".$remote_file_PC;

if(!is_dir('../svenska/'.$userFolder)){
    echo "<br>NIE istnieje userFolder: $userFolder";
    if(ftp_mkdir($conn_id,$userFolder)){
        echo "<br> Dir $userFolder CREATED"; 
    }else{
        echo "<br> Dir $userFolder NOT created";
    }
}else{
    echo "<br>Istnieje już folder: $userFolder - nie tworzę nowego!";
}

echo "<br> $remote_file_PK / ".$_FILES['file']['tmp_name'][0];
$try_put_file_PK = ftp_put($conn_id, $remote_file_PK, $_FILES['file']['tmp_name'][0], FTP_BINARY);
if($try_put_file_PK){
    echo "<br>".__LINE__."/ successfully uploaded {$_FILES['file']['name'][0]}\n";
}else{
    echo "<br>".__LINE__."/ NOT uploaded {$_FILES['file']['name'][0]}\n";
}

echo "<br> $remote_file_PC / ".$_FILES['file']['tmp_name'][1];    
$try_put_file_PC = ftp_put($conn_id, $remote_file_PC, $_FILES['file']['tmp_name'][1], FTP_BINARY);
if($try_put_file_PC){
    echo "<br>".__LINE__."/ successfully uploaded {$_FILES['file']['name'][1]}\n";
}else{
    echo "<br>".__LINE__."/ NOT uploaded {$_FILES['file']['name'][1]}\n";
}   

// Tu odczytujemy plik i zapisujemy odczytane wartości (jeśli klucz lub zaszyfr. wiadomość) do BD
try{
    echo "<br>FILE TYPE_PublicKey:" .$_FILES['file']['type'][0]."<br>";
    echo "<br>FILE Name_PublicKey:" .$_FILES['file']['name'][0]."<br>";

    echo "<br>FILE TYPE_PassCrypt:" .$_FILES['file']['type'][1]."<br>";
    echo "<br>FILE Name_PassCrypt:" .$_FILES['file']['name'][1]."<br>";

    $fil_PK = $_FILES['file']['name'][0];
    $fil_PC = $_FILES['file']['name'][1];
                    
    echo "<br>STRPOS: ".strpos($fil_PK,"public_key")."<br>";
    echo "<br>STRPOS: ".strpos($fil_PC,"Secret_Message")."<br>";
                    
    $filBool_PK = false;
    $filBool_PC = false;
                    
    $filBool_PK = strpos($fil_PK,"public_key");
    $filBool_PC = strpos($fil_PC,"Secret_Message");
                            
    if($filBool_PK AND $filBool_PC){
        echo "<br> biere plik $fil_PK i $fil_PC do zabawy!!! <br>";
        $file_PK = trim(file_get_contents($_FILES['file']['tmp_name'][0], true));
        $file_PC = trim(file_get_contents($_FILES['file']['tmp_name'][1], true));
         
        echo "<br>".__LINE__."/file_PK: ".$file_PK;
        echo "<br>".__LINE__."/file_PC: ".$file_PC;
        echo "<br>_FILES[file][tmp_name]: ".$_FILES["file"]["tmp_name"][0];
        echo "<br>_FILES[file][tmp_name]: ".$_FILES["file"]["tmp_name"][1];
    }else{
        echo "<br> NIE biere pliku $fil do zabawy!!! <br>";
    }
} catch (Exception $ex) {
    echo "<br>".__LINE__."/ERROR: ".$ex;
}
ftp_close($conn_id);

$PublicKey = $file_PK;
$PassCrypt = $file_PC;

$bol = 1;
try{
//    echo "<br>Curr PASs:".$password;
    $classUser->updateDataByUser($imie, $nazwisko, $password, $PublicKey, $PassCrypt, $email, $usr);
//    echo "<script> window.location.replace('EditUserByUser.php') </script>";
    $bol = "Dane zmienione";
} catch (Exception $ex) {
    echo "<br>Sorry $ex";
    $bol = "Nie udało się zmienić danych";
}
    echo "<script> window.location.replace('EditUserByUser.php?comm=".$bol."') </script>";
    header("Location: EditUserByUser.php?comm=$bol");

?>
<br><button onclick="window.location.href='EditUserByUser.php'">WRÓĆ</button>