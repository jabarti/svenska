<?php

/****************************************************
 * Project:     Svenska
 * Filename:    loger.php
 * Encoding:    UTF-8
 * Created:     2014-07-11
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once "common.inc.php";
include 'DB_Connection.php';
$title = 'Logger';
include 'header.php';
//include 'flag.php';
include 'buttons.php';
if ($_SERVER['HTTP_REFERER'] != "http://www.bartilevi.pl/Svenska/loger.php"){
    $_SESSION['ref'] = $_SERVER['HTTP_REFERER'];
}
echo "Przybywasz z: ".$_SESSION['ref'];

//$user_try = new User();
//    echo "<br>set data user: "; var_dump($user_try->setData("Lolas", "svenska"));
//    echo "<br>get data user: "; var_dump($user_try->getUserByName("Lolas"));
 
$Usr_name ='';
$Usr_pass ='';


if(isset($_POST) || isset($_GET)){
//    echo "<br>POST1: ";var_dump($_POST);
//    echo "<br>SESS1: ";var_dump($_SESSION);
    
    
   if(isset($_POST['user'])){
        $user = new User();
        
        if($user->getId($_POST['user'])){
            $user_data = $user->getUserByName($_POST['user']);
//            echo "<br>DB user data: ";var_dump($user_data);
            $Usr_name = $user_data[1];
            $Usr_pass = $user_data[2];
//            echo "<br>DB user name: ".$Usr_name;
//            echo "<br>DB user pass: ".$Usr_pass;
        }   
   } 
   
    if($_POST['user']==$Usr_name  && sha1($_POST['password'])==$Usr_pass){
//    if(($_POST['user']=='Anetka' || $_POST['user']=='Barti') && $_POST['password']=='svenska'){
//    if($_GET['user']=='Anetka' && $_GET['password']=='svenska'){
//        echo "<br>Jest w TRU: ".$_POST['user']." / ".$_POST['password'];
        $_SESSION['log'] = true;
        $_SESSION['user'] = $_POST['user'] ? $_POST['user'] : $_GET['user'];
        $_SESSION['password'] = $_POST['password'] ? $_POST['password'] : $_GET['password'];
        $_SESSION['arrOfAnsw'] = array();
        $_SESSION['good']=0;
        $_SESSION['bad']=0;
        $score = new Score();
        $_SESSION['scoresOfUsr'] = $score->getScoresOfUser($_SESSION['user']);
        echo "<p class=red><b>".$_SESSION['scoresOfUsr'][0]."/".$_SESSION['scoresOfUsr'][1]."</b></p>";
        header("Location: ".$_SESSION['ref']);
    }else{
        unset($_SESSION);
        $_SESSION['log'] = false;
    }
}

//    echo "<br>POST2: ";var_dump($_POST);
//    echo "<br>SESS2: ";var_dump($_SESSION);

?>
<body>
    <h1> Panel logowania </h1>
    
    <form action="loger.php" method="post">
        <table>
            <tr>
                <td><label for="user">Użytkownik:</td>
                <td><input id=user type="text" name="user" value="Anetka"></td>
            </tr>
            <tr>
                <td><label for="pass">Hasło:</td>
                <td><input id=pass type="password" name="password" value="" ></td>
                <!--<td><input id=pass type="hidden" name="password" value="svenska" ></td>-->
            </tr>
            <tr>
                <td></td>
                <td><input id=sub name=sub type="submit" value="Zaloguj"></td>
            </tr>
        </table>
    </form>
    
</body>

