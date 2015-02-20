<?php

/****************************************************
 * Project:     Svenska
 * Filename:    RestorePassword.php
 * Encoding:    UTF-8
 * Created:     2015-02-19
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Restore Password';
include 'header.php';
//include 'buttons.php';


?>
<form action="RestorePasswordMOD.php" method="post">
<table class='table_log'>
  <tr>
    <td><?php echo t("Podaj swój email lub nazwe użytkownika");?>:</td>
    <td><input type="text" id="RestorPassQuest" name="RestorPassQuest"></td> 
  </tr>
  <tr>
    <td colspan="3"></td>
    <td><input type="submit" id="submit" value="submit"></td> 
  </tr>
</table>
</form>


