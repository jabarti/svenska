<?php

/****************************************************
 * Project:     Svenska
 * Filename:    loger.php
 * Encoding:    UTF-8
 * Created:     2014-07-11
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Logger';
include 'header.php';

$match = strpos($_SERVER['HTTP_REFERER'], "loger.php");
////echo "<br>Macz: ".$match."<br>";

if(!$match){
//        echo '<br>$_SESSION[ref]:'.$_SESSION['ref'];
        $_SESSION['ref'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "index.php";
    }else{
//        echo '<br>$_SESSION[ref]'.$_SESSION['ref'];
        $_SESSION['ref'] = "index.php";
    }
//    
echo "<br><span>".t('Przybywasz z: ').$_SESSION['ref']."</span>";

?>
<body> 
    <form action="logerMOD.php" method="post" enctype="multipart/form-data">
        <table class='table_log' >
            <tr>
                <td colspan='2'><h1 class='table_log' style='text-align: center;'> <?php echo t("Panel logowania"); ?> </h1></td>
            </tr>
            <tr>
                <td><label for="user"><?php echo t("Użytkownik"); ?>:</td>
                <!--<td><input id=user type="text" name="user" value="Bartek"></td>-->
                <td><select id=user name="user" >
                <?php
                    $usr = new User();
//                    $names = array();
                    $names = $usr->getUsersNames();
                    foreach ($names as $k=>$v){
                        echo "<option value=".$v.">".$v."</option>";
                    }
                ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="pass"><?php echo t("Hasło"); ?>:</td>
                <td><input id="pass" type="password" name="password" ></td>
                <!--<td><input id=pass type="hidden" name="password" value="" ></td>-->
            </tr>
<!--            <tr>
                <td><label for="pass"><?php echo t("PrivateKey"); ?>:</td>
                <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                <td><input id=pass type="hidden" name="password" value="" ></td>
            </tr>-->
            <tr>
                <td></td>
                <td><input id=sub name="sub" type="submit" value="<?php echo t("Zaloguj"); ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="RestorePassword.php" id="passRestore"><?php echo t("Zapomniałem hasła");?></a></td>
                <!--<td><input id=pass type="hidden" name="password" value="" ></td>-->
            </tr>

        <tr><td colspan='2'><?php echo t("OR"); ?></td><tr>
        <?php //echo t("OR"); ?>

            <tr>
                <td><?php echo t("Create New User"); ?></td>
                <td><button id='CreateUser' type="button" ><?php echo t("CreateUser"); ?></button></td>
            </tr>
        </table>
    </form>
    
<?php
// TODO!!! NIE DZIAŁA NA RAZIE!!!
if(isset($_SESSION['communicate'])){
    echo '<br>'.$_SESSION['communicate'];
}else{
//    echo ':)';
}
unset($_SESSION['communicate']);
?>
</body>

