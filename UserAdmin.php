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
$title = 'Svenska | UserAdminMOD';
include 'header.php';
include 'buttons.php';
//include 'rozdzielacz.php';

$user = new User();
$AllUsrArr = $user->getUsersDataForAdmin();

$len =count($AllUsrArr);

echo "<table class='table_log'>";
echo "  <tr>
            <th>id</th>
            <th>".t('imie')."</th>
            <th>".t('nazwisko')."</th>
            <th>".t('login')."</th>
            <th>".t('rola')."</th>
            <th>".t('email')."</th>
            <th></th>
        </tr>";

for($i=0; $i<$len; $i++){
    echo "<tr>";
    echo "<form id=".$i." action='UserAdminMOD.php' method=post>";
    foreach($AllUsrArr[$i] as $k => $v){
        switch($k){
            case 'id':
                echo "<td><input class=UsrAdm_grey size=1 type=text name=".$k." value=".$v." readonly></td>";
                break;
            case 'user':
                echo "<td><input class=UsrAdm_grey type=text name=".$k." value=".$v." readonly></td>";
                break;
            case 'password':
            case 'PublicKey':
            case 'data':
                continue;
                break;
            case 'rola':
                if($v != 'admin'){
                    echo "<td><select name=$k>";
                    echo "<option value=$v>".t($v)."</option>";
                    $UsrRoles = $user->getRolesOfUser();
                    foreach($UsrRoles as $k){
                         echo "<option value=$k>".t($k)."</option>";
                    }   
                    echo "</select></td>";
                }else{
                    echo "<td><select name=$k readonly='readonly'>";
                    echo "<option value=$v >".t($v)."</option>"; 
                    echo "</select></td>";
                }
                break;
            default:
                echo "<td><input type=text name=".$k." value=".$v." ></td>";
                break;
        }
    }
    echo "<td colspan=4></td>"
        . "<td><input type=submit value=".t('Change_UsrAdm'). " name=aktion></td>"
        . "<td><input type=submit value=".t('Remove_UsrAdm'). " name=aktion></td>";
    echo "</form>";
    }
echo "</tr>";
echo "</table>";
