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
//include 'buttons.php';

?>
<form id="CreateUserForm" action="CreateUserMOD.php" method="post">
<table class='table_log'>
  <tr>
    <td><?php echo t("imie");?></td>
    <td><input type="text" id="Imie" name="imie"></td> 
    <td><?php echo t("nazwisko");?></td>
    <td><input type="text" id="Nazwisko" name="nazwisko"></td> 
  </tr>
  <tr>
    <td></td>
    <td colspan="1"><div id="errorImie" class="error"></div></td>
    <td></td>
    <td colspan="1"><div id="errorNazwisko" class="error"></td>
  </tr>
  <tr>
    <td><?php echo t("login");?></td>
    <td><input type="text" id="Login" name="login"></td> 
    <td><?php echo t("email");?></td>
    <td><input type="text" id="Email" name="email"></td> 
  </tr>
  <tr>
    <td></td>
    <td colspan="1"><div id="errorLogin" class="error"></div></td>
    <td></td>
    <td colspan="1"><div id="errorEmail" class="error"></td>
  </tr>
  <tr>
    <td><?php echo t("hasło");?></td>
    <td><input type="password" id="Haslo" name="haslo"></td> 
    <td><?php echo t("powtórz hasło");?></td>
    <td><input type="password" id="Haslo2" name="haslo2"></td> 
  </tr>
  <tr>
    <td></td>
    <td colspan="1"><div id="errorHaslo" class="error"></div></td>
    <td></td>
    <td colspan="1"><div id="errorHaslo2" class="error"></td>
  </tr>
  <tr >
      <td colspan="4" style='color:cadetblue;'>_______</td>
  </tr>
  <tr>
    <td><?php echo t("PublicKey")."<span class='fileldDescrBlu'> (".t('wygenerowany algorytmem RSA');?>)</td>
    <td colspan="3"><input size=45 type="text" id="PublicKey" name="PublicKey"></td> 
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><div id="errorPublicKey" class="error"></div></td>
    <td></td>
  </tr>
  <tr>
      <td><?php echo t("PassCrypt")."<span class=fileldDescrBlu> (".t('wygenerowany algorytmem RSA');?>)</span></td>
    <td colspan="3"><input size=45 type="text" id="PassCrypt" name="PassCrypt"></td> 
  </tr>
  <tr>
    <td></td>
    <td colspan="1"><div id="errorPassCrypt" class="error"></div></td>
    <td></td>
  </tr>
  <tr>
<!--    <td><button type='button' onclick="window.location.href='index.php'"><?php echo t("powrót");?></button></td>-->
    <td colspan="3"></td>
    <td><input type="submit" id="submit" value="<?php echo t("submit");?>"></td> 
  </tr>

  <tr>
      <td ><u><b><?php echo t("Download files");?>:</b></u></td>
      <td colspan=3></td>
  </tr>
    <tr>
        <td ><span class='fileldDescrBlu'>(<?php echo t("Potrzebne do szyfrowania algorytmem RSA");?>)</span></td>
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
      <td colspan=1><button onclick="window.location.href='index.php'"><?php echo t("wróć");?></button></td>
  </tr>
</table>
</form>
<?php
if(isset($_SESSION['comunicate'])){
    echo '<br>'.t($_SESSION['comunicate']);
    unset($_SESSION['comunicate']);
}
?>
