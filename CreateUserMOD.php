<?php

/****************************************************
 * Project:     Svenska
 * Filename:    CreateUserMOD.php
 * Encoding:    UTF-8
 * Created:     2015-01-30
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
// Tu trafiają dane z CreateUser.php
require_once 'common.inc.php';
include 'DB_Connection.php';
$title = 'Svenska | Create New User MOD';
include 'title.php';
include 'header.php';
//include 'buttons.php';
include 'divLog.php';

//foreach($_SESSION as $k => $v){
//    echo "<br>SESSION[$k] => $v";
//}
//
//foreach($_POST as $k => $v){
//    echo "<br>POST[$k] => $v";
//}

//echo "<br>JESTEŚ W CreateUserMOD.php";

if(isset($_POST)){
//    echo "<br>".__LINE__."OK: POST set!";
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $haslo = $_POST['haslo'];
    $haslo2 = $_POST['haslo2'];  // TODO: zrobić walidację na poziomie CreateUser.php
    
//    echo "<br>vardump(files)";var_dump($_FILES); 
    
    foreach($_POST as $k => $v){
//        echo "<br>$k=>$v";
    }

    require 'FTP_Connection.php';
           
    $real_name_PK = $_FILES['file']['name'][0];
    $real_name_PC = $_FILES['file']['name'][1];
    
//    ECHO "<br>FILE ERROR: ".$_FILES['file']['error'][0];
    
    $UPP_FIL_ERR = true;
    
    switch($_FILES['file']['error'][0]) {
        case '0':
//            ECHO "<br>UPLOAD FILE WITH NO ERROR";
            $mess = "<br>UPLOAD FILE WITH NO ERROR";
             $UPP_FIL_ERR = false;
            break;
        case '1':
//            ECHO "<br>FILE ERROR: exceeds the upload_max_filesize";
            $mess =  "<br>FILE ERROR: exceeds the upload_max_filesize";
            break;
        case '2':
//            ECHO "<br>FILE ERROR: exceeds the MAX_FILE_SIZE";
            $mess =  "<br>FILE ERROR: exceeds the MAX_FILE_SIZE";
            break;
        case '3':
//            ECHO "<br>FILE ERROR: file was only partially uploaded";
            $mess =  "<br>FILE ERROR: file was only partially uploaded";
            break;
        case '4':
//            ECHO "<br>FILE ERROR: No file was uploaded";
            $mess =  "<br>FILE ERROR: No file was uploaded";
            break;
        case '5':
//            ECHO "<br>FILE ERROR: 5";
            $mess =  "<br>FILE ERROR: 5";
            break;
        case '6':
//            ECHO "<br>FILE ERROR: Missing a temporary folder";
            $mess =  "<br>FILE ERROR: Missing a temporary folder";
            break;
        default:
//            ECHO "<br>FILE ERROR:".$_FILES['file']['error'][0];
            $mess =   "<br>FILE ERROR:".$_FILES['file']['error'][0];
            break;
            
    }

    if(!$UPP_FIL_ERR){
//        echo "<br>File_Name1: ".$real_name_PK;
//        echo "<br>File_Name2: ".$real_name_PC;

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
//            echo "<br>NIE istnieje userFolder: $userFolder";
            if(ftp_mkdir($conn_id,$userFolder)){
//                echo "<br> Dir $userFolder CREATED"; 
            }else{
//                echo "<br> Dir $userFolder NOT created";
            }
        }else{
//            echo "<br>Istnieje już folder: $userFolder - nie tworzę nowego!";
        }

//        echo "<br> $remote_file_PK / ".$_FILES['file']['tmp_name'][0];
        $try_put_file_PK = ftp_put($conn_id, $remote_file_PK, $_FILES['file']['tmp_name'][0], FTP_BINARY);

        if($try_put_file_PK){
//            echo "<br>".__LINE__."/ successfully uploaded {$_FILES['file']['name'][0]}\n";
        }else{
//            echo "<br>".__LINE__."/ NOT uploaded {$_FILES['file']['name'][0]}\n";
        }

//        echo "<br> $remote_file_PC / ".$_FILES['file']['tmp_name'][1];    
        $try_put_file_PC = ftp_put($conn_id, $remote_file_PC, $_FILES['file']['tmp_name'][1], FTP_BINARY);

        if($try_put_file_PC){
//            echo "<br>".__LINE__."/ successfully uploaded {$_FILES['file']['name'][1]}\n";
        }else{
//            echo "<br>".__LINE__."/ NOT uploaded {$_FILES['file']['name'][1]}\n";
        }    

       /**/ 



        // Tu odczytujemy plik i zapisujemy odczytane wartości (jeśli klucz lub zaszyfr. wiadomość) do BD
                    try{
//                        echo "<br>FILE TYPE_PublicKey:" .$_FILES['file']['type'][0]."<br>";
//                        echo "<br>FILE Name_PublicKey:" .$_FILES['file']['name'][0]."<br>";
//
//                        echo "<br>FILE TYPE_PassCrypt:" .$_FILES['file']['type'][1]."<br>";
//                        echo "<br>FILE Name_PassCrypt:" .$_FILES['file']['name'][1]."<br>";

                        $fil_PK = $_FILES['file']['name'][0];
                        $fil_PC = $_FILES['file']['name'][1];

//                        echo "<br>STRPOS: ".strpos($fil_PK,"public_key")."<br>";
//                        echo "<br>STRPOS: ".strpos($fil_PC,"Secret_Message")."<br>";

                        $filBool_PK = false;
                        $filBool_PC = false;

                        $filBool_PK = strpos($fil_PK,"public_key");
                        $filBool_PC = strpos($fil_PC,"Secret_Message");

                        if($filBool_PK AND $filBool_PC){
//                            echo "<br> biere plik $fil_PK i $fil_PC do zabawy!!! <br>";
                            $file_PK = trim(file_get_contents($_FILES['file']['tmp_name'][0], true));
                            $file_PC = trim(file_get_contents($_FILES['file']['tmp_name'][1], true));
    //         
//                            echo "<br>".__LINE__."/file_PK: ".$file_PK;
//                            echo "<br>".__LINE__."/file_PC: ".$file_PC;
//                            echo "<br>_FILES[file][tmp_name]: ".$_FILES["file"]["tmp_name"][0];
//                            echo "<br>_FILES[file][tmp_name]: ".$_FILES["file"]["tmp_name"][1];
                         }else{
                            echo "<br> NIE biere pliku $fil do zabawy!!! <br>";
                         }
                    } catch (Exception $ex) {
                        echo "<br>".__LINE__."/ERROR: ".$ex;
                    }
    }
    ftp_close($conn_id);

    $PublicKey = $file_PK;
    $PassCrypt = $file_PC;
    
    foreach($_POST as $k =>$v){
//        echo "<br>$k=>$v";
    }
         
    if($haslo != $haslo2){
        ?><script> alert("Różne hasla!!!") </script><?php        
    }else{
//        echo "<br>".$imie." / ".$nazwisko." / ".$login." / ".$haslo." / ".$haslo2."<br>";
//        echo __DIR__."<br>";
//        echo __FILE__;
        try{
            $newUser = new User();
            $boola = $newUser->setData($imie, $nazwisko, $login, $haslo, $email, $PublicKey, $PassCrypt);
            if($boola){
                $_SESSION['communicate'] = 'OK / '.'User like <span class=red>"'.$login.'"</span> created / '.$mess;
//                echo "<br> WESZŁO DO BAZY!!!!!!";
                // Jak weszło do bazy to robię dopieroupload plików!!! -- W tym miejscu nie działa, nie wiem czemu.
                // !!!!!!!!!!!!!!!!!!!!!!!!!!!! CZEMU NIE DZIAŁA!!!!!!!!!!!!!!
/*               if(!is_dir('../svenska/'.$userFolder)){
                    echo "<br>NIE istnieje userFolder: $userFolder";
                    if(ftp_mkdir($conn_id,$userFolder."/")){
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
                
                    $remote_file_PK = $userFolder."/".$real_name_PK;
                    $remote_file_PC = $userFolder."/".$real_name_PC;
                
                 echo "<br> $remote_file_PC / ".$_FILES['file']['tmp_name'][1];    
                $try_put_file_PC = ftp_put($conn_id, $remote_file_PC, $_FILES['file']['tmp_name'][1], FTP_BINARY);
                if($try_put_file_PC){
                    echo "<br>".__LINE__."/ successfully uploaded {$_FILES['file']['name'][1]}\n";
                }else{
                    echo "<br>".__LINE__."/ NOT uploaded {$_FILES['file']['name'][1]}\n";
                }/**/
            }else{
//                echo "<br>".__LINE__."/MSQL ERROR: ".mysql_error();
                $_SESSION['communicate'] = 'User like <span class=red>"'.$login.'"</span> was NOT created / '.mysql_error().$mess;
            } 
        } catch (Exception $ex) {
            $error = $ex->getMessage();
//            echo '<br>Caught exception: ',  t($error), "\n";
//            $_SESSION['communicate'] = $error;
        }
//        echo "<pre>Output $output</pre>";
//        header("Location: index.php".$communicate);
//        header("Location: index.php");
        echo "<script> window.location.replace('index.php') </script>" ;
    }
}else{
    echo "<br>".__LINE__."ERROR: POST set inte!";
}
?>

<button onclick="window.location.href='index.php'">WRÓĆ</button>

