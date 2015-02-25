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
    <td colspan='3'><?php echo t("Podaj swój email lub nazwe użytkownika");?>:</td>
    <td><input type="text" id="RestorPassQuest" name="RestorPassQuest"></td> 
  </tr>
  <tr>
    <td colspan="3"></td>
    <td><input type="submit" id="submit" value="<?php echo t('submit');?>"></td> 
  </tr>
  <tr>
      <td ><u><?php echo t("Download files");?>:</u></td>
      <td colspan=3></td>
  </tr>
  <tr>
      <td ><span class='fileldDescrYel'>(<?php echo t("hasło otrzymasz zaszyfrowane algorytmem RSA");?>)</span></td>
      <td colspan=3></td>
  </tr>
  <tr>
      <td colspan=4><a href="Resources/Pari/RSAPassword/RSAPassword.zip" download>RSAPassword</a></td>
  </tr>
  <tr>
      <td colspan=4><a href="Resources/Pari/Pari-2-7-2.exe" download>Pari-2-7-2.exe</a></td>
  </tr>
  <tr>
      <td colspan=3></td>
      <td colspan=1><button type='button' onclick="window.location.href='index.php'"><?php echo t("wróć");?></button></td>
  </tr>

</table>
</form>


