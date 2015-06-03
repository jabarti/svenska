<?php

/****************************************************
 * Project:     svenskaTRY
 * Filename:    titler.php
 * Encoding:    UTF-8
 * Created:     2015-02-27
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
if(isset($_GET['tit'])){
    switch($_GET['tit']){
        case 'SI001':
            $title = 'Svenska | Inserter';
            break;
        case 'SE001':
            $title = 'Svenska | Edit';
            break;
        case 'SEUD1':
            $title = 'Svenska | Edit User Data';
            break;
        case 'SUA01':
            $title = 'Svenska | UserAdmin';
            break;
        case 'SM001':
            $title = 'Svenska | Motsatsen';
            break;
        case 'SM002':
            $title = 'Svenska | mail';
            break;
        case 'SS001':
            $title = 'Svenska | Synonymer';
            break;
        case 'SSP01':
            $title = 'Svenska | Show/printer';
            break;
        case 'SHE01':
            $title = 'Svenska | Help_Adm';
            break;
        case 'SSRS1':
            $title = 'Svenska | ShowRandomStats';
            break;
        case 'ST001':
            $title = 'Svenska | Test';
            break;
        case 'ST002':
            $title = 'Svenska | try';
            break;
        default:
            ?><script> alert brak GET tittle </script><?php
            $title = $_GET['tit'];
            break;  
    }
    $_SESSION['title'] = $title;
    
}elseif(isset($_SESSION['title'])){
    $title = $_SESSION['title'];
}else{
    $title = 'My Page';
}
