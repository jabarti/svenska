<?php

/****************************************************
 * Project:     Svenska
 * Filename:    UserAdminMOD.php
 * Encoding:    UTF-8
 * Created:     2015-02-07
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | UserAdmin';
include 'header.php';
//include 'buttons.php';

var_dump ($_POST);

if(isset($_POST)){
    $action = $_POST['aktion'];
    $id = $_POST['id'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $login = $_POST['user'];
    $rola = $_POST['rola'];
    $email = $_POST['email'];
    
    $user = new User();
    
    switch($action){
        case 'Change_UsrAdm':       // akcja: zmiany na koncie usera
            try{
                $user->updateDataByAdmin_I($id, $imie, $nazwisko, $rola, $email);
                echo "<script> window.location.replace('UserAdmin.php') </script>" ;
            } catch (Exception $ex) {
                $alert = t($ex->getMessage());
                ?><script>
                alert("<?php echo $alert;?>");
                window.location.replace('UserAdmin.php')
                </script><?php
            }
            break;
        
        case 'Remove_UsrAdm':       //  akcja: usunięcie usera
            try{
                $user->deleteUserById($id);
//                require 'FTP_Connection.php';
//                
//                $dir = '../svenska/'.$login;
//                
//                echo "<br>$dir";
//                if(is_dir($dir)){
//                    echo "<br>Istnieje userFolder: $dir";
//                    $subDir = '../'.$login;
//                    $contents_on_server = ftp_nlist($conn_id, $subDir);                   
//                    echo "<br>Zawartosć folderu: ";//var_dump($contents_on_server);
//                    
//                    foreach($contents_on_server as $k => $v){
//                        echo "<br> $k => $v";
//                        try{
//                            ftp_chmod($ftp_conn, 777, $v);
//                            echo "Successfully chmoded $v to 777.";
//                        } catch (Exception $ex) {
//                            echo "<br>ERROR: ".$ex;
//                        }
//                        if (ftp_chmod($ftp_conn, 777, $v) !== false)
//                        {
//                            echo "Successfully chmoded $v to 777.";
//                        }else{
//                            echo "chmod failed.";
//                        }
//                        try{
//                            echo "<br>przed delete";
//                            ftp_delete($conn_id, $v);
//                            echo "<br>po delete";
//                        } catch (Exception $ex) {
//                             echo "<br>ERROR: ".$ex;
//                        }
//                        $boolFil = ftp_delete($conn_id, $v);
//                        if($boolFil){
//                            echo "<br>Plik '$v' skasowany ($boolFil) =< wynik";
//                        }else{
//                            echo "<br>Plik '$v' NIE skasowany";
//                        }
//                    }
//
////                    if (ftp_rmdir($conn_id, $dir)) {
////                        echo "<br>$dir deleted successful\n";
////                    } else {
////                        echo "<br>could not delete $dir\n";
////                    }
//                }else{
//                    echo "<br>NIE istnieje userFolder: $dir";
//                }
//                ftp_close($conn_id);
                echo "<script> window.location.replace('UserAdmin.php') </script>" ;
            } catch (Exception $ex) {
                $alert = t($ex->getMessage());
                ?><script>
                alert("<?php echo $alert;?>");
                window.location.replace('UserAdmin.php')
                </script><?php
            }
            break;
        default:
            $alert = t('ERROR!!! Wywołano akcja DEFAULT w pliku:').__FILE__."!!";
          ?><script>
            alert("<?php echo $alert;?>");
          </script>
        <?php
            break;
    }
}else{
    echo "<br>".t("Brak danych!!");
}

?>
<br><button onclick="window.location.href='UserAdmin.php'">WRÓĆ</button>


