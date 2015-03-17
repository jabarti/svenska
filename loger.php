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

if($REMOTE_ADDR){
    echo "Admin IP Address: ".$_SERVER["REMOTE_ADDR"];
}

//$_SESSION['licznik_odw']++;     // dla reloaudu z common.inc.php (złe rozwiązanie!!!)

//echo "<script> console.log('loger.php') </script>";

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
//echo "<span>".t('Przybywasz z: <br><span class=red>').$_SESSION['ref']."</span></span>";

?>
<body> 
    <form action="logerMOD.php" method="post" >
        <table class='table_log' >
            <tr>
                <td colspan='2'><h1 class='table_log' style='text-align: center;'> <?php echo t("Panel logowania"); ?> </h1></td>
            </tr>
            <tr>
                <td><label for="user"><?php echo t("Użytkownik"); ?>:</td>
                <?php
                if($REMOTE_ADDR){
                    echo "<td><select id=user name='user' >";
                            echo "<option value='Bartek'>Bartek</option>";
                        $usr = new User();
//                      $names = array();
                        $names = $usr->getUsersNames();
                        foreach ($names as $k=>$v){
                            echo "<option value=".$v.">".$v."</option>";
                        }
                    echo"    </select>";
                }else{
                    echo '<td><input id=user type="text" name="user" ></td>';
                }
                ?>
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
                <td><input id='submitLOG' name="submitLOG" type="submit" value="<?php echo t("Zaloguj"); ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="RestorePassword.php" id="passRestore"><?php echo t("Zapomniałem hasła");?></a></td>
                <!--<td><input id=pass type="hidden" name="password" value="" ></td>-->
            </tr>

        <tr><td colspan='2'><?php echo t("OR"); ?></td><tr>
        <?php //echo t("OR"); ?>

            <tr>
                <!--<td><?php echo t("Create New User"); ?></td>-->
                <td></td>
    <?php 
        $DOIT = "javascript:if(confirm(\"".t('Create NEW User?')."\")== true){window.location.href = \"CreateUser.php\"}else{window.location.href = \"index.php\"};";
        echo "<td><button id='CreateUser' type='button' onclick='".$DOIT."'>".t("CreateUser")."</button></td>";
     ?>
            </tr>
        </table>
    </form>
    <br>
    <table class='table_log'>
                    <tr>
                <td colspan='2'><?php echo t("Mozesz obejrzec prosta wersje logujac sie jako");?>: </td>
                <!--<td></td>-->
            </tr>
            <tr>
                <td><?php echo t("Użytkownik");?></td>
                <td><?php echo ": Gosc";?></td>
            </tr>
            <tr>
                <td><?php echo t("hasło");?></td>
                <td><?php echo ": (".t("puste").")";?></td>
            </tr>
    </table>
    
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

