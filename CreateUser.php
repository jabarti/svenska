<?php

/****************************************************
 * Project:     Svenska
 * Filename:    CreateUser.php
 * Encoding:    UTF-8
 * Created:     2015-01-30
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Create New User';
include 'header.php';
include 'buttons.php';

?>
<form action="CreateUserMOD.php" method="post">
<table class='table_log'>
  <tr>
    <td>imie</td>
    <td><input type="text" id="imie" name="imie"></td> 
    <td>nazwisko</td>
    <td><input type="text" id="nazwisko" name="nazwisko"></td> 
  </tr>
  <tr>
    <td>login</td>
    <td><input type="text" id="login" name="login"></td> 
    <td>email</td>
    <td><input type="text" id="email" name="email"></td> 
  </tr>
  <tr>
	<td colspan="2"><div id="errorLogin" class="error"></div></td>
	<td colspan="2"><div id="errorEmail" class="error"></td>
  </tr>
  <tr>
    <td>haslo</td>
    <td><input type="password" id="haslo" name="haslo"></td> 
    <td>haslo2</td>
    <td><input type="password" id="haslo2" name="haslo2"></td> 
  </tr>
    <tr>
	<td colspan="2"><div id="errorHaslo" class="error"></div></td>
	<td colspan="2"></td>
  </tr>
  <tr>
    <td colspan="3"></td>
    <td><input type="submit" id="submit" value="submit"></td> 
  </tr>
</table>
</form>
