<?php

/****************************************************
 * Project:     Svenska
 * Filename:    UserAdmin.php
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

//var_dump ($_POST);
if(isset($_POST)){
    
    
    
    $action = $_POST['aktion'];
    $id = $_POST['id'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
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


