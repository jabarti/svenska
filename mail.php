<?php

/****************************************************
 * Project:     Svenska
 * Filename:    mail.php
 * Encoding:    UTF-8
 * Created:     2015-02-09
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once 'common.inc.php';
include 'DB_Connection.php';
$title = 'Svenska | '.t("Mail");
include 'title.php';
include 'header.php';
include 'buttons.php';
include 'divLog.php';
//echo "<br>Usr_mial:".$_SESSION['usr_mail'];
?>
<p id="textTitle" style="color: black;"><?php echo t("NAPISZ DO MNIE"); ?></p>
<form name="formatka" action="email_mod.php" method="post">
    <table>
        <tr id="selfmail">
            <td><label for="text"><?php echo t("Podaj swój mail"); ?>:</label></td>
            <td><input id="mail" type="text" name="mail" value="<?php echo $_SESSION['usr_mail']; ?>"></td>
        </tr>
        <tr>
            <td><label for="subject"><?php echo t("Temat"); ?>:</label></td>
            <td><input id="subject" type="text" name="subject"></td>
        </tr>
        <tr>
            <td><label for="text"><?php echo t("Treść"); ?>:</label></td>
            <td><textarea id="message"  rows="4" cols="30" name="message"></textarea></td>
        </tr>
        <tr>
            <td><label for="chac"><?php echo t("Czy chcesz kopię"); ?>?:</label></td>
            <td><input id="chac" type="checkbox" name="chac" </td>
        </tr>
        <tr>
            <td></td>
            <td><input name=mailform type="submit" value="<?php echo t("Wyślij"); ?>"></td>
        </tr>
    </table>
</form>

<?php 

// Informacja zwrotna, czy mail doszedł // 
/* it takes info about mail sent or not from email_mod.php */
if (isset($_GET['send'])){
    if($_GET['send'] == 'ok')
        $send = 1;
    else if ($_GET['send'] == 'ok')
        $send = 0;
    else
        $send = -1;
} else {
    $send = -2;
}

if($send == 1){ 
     echo '<p id="potw">'.t("Mail wysłany").'!</p>';
}else if($send == -1){
    echo '<p id="potw">'.t("Mail nie wysłany").' - '.t("brak tematu").' '.t("lub").'/'.t("i").' '.t("treści").'</p>';
} else {
    echo '<p id="potw">:)</p>';
}

?>