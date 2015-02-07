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
//include 'buttons.php';

//echo "<br>1Przybywasz z: ".$_SESSION['ref'];
$match = strpos($_SERVER['HTTP_REFERER'], "loger.php");
//echo "<br>Macz: ".$match."<br>";
//if (
//    $_SERVER['HTTP_REFERER'] != "http://www.bartilevi.pl/Svenska/loger.php" &&
//    $_SERVER['HTTP_REFERER'] != "http://localhost/svenska_local/loger.php" && 
//    $_SERVER['HTTP_REFERER'] != "http://bartilevi.pl/Svenska/loger.php"  
//        ){
if(!$match){
        $_SESSION['ref'] = $_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : "index.php";
    }
    
echo "<br><span>".t('Przybywasz z: ').$_SESSION['ref']."</span>";

//$user_try = new User();
//    echo "<br>set data user: "; var_dump($user_try->setData("Lolas", "svenska"));
//    echo "<br>get data user: "; var_dump($user_try->getUserByName("Lolas"));
 
$Usr_name ='';
$Usr_pass ='';


if(isset($_POST) || isset($_GET)){
//    echo "<br>POST1: ";var_dump($_POST);
//    echo "<br>SESS1: ";var_dump($_SESSION);
//    echo "<br>Cooki: ";var_dump($_COOKIE);
//    echo "<br>COOKIE LOG: ".$_COOKIE['log'];
    
    
   if(isset($_POST['user'])){
        $user = new User();
        
        if($user->getId($_POST['user'])){
//            $user_data = $user->getUserByName($_POST['user']);
            $user_data = $user->getLogDataByUser($_POST['user']);
            echo "<br>DB user data: ";var_dump($user_data);
            $Usr_name = $user_data[0];      // user
            $Usr_pass = $user_data[1];      // pass
            $Usr_PubKey = $user_data[2];      // PublicKey
            $Usr_role = $user_data[3];      // PublicKey

        }else{
            $Usr_name = 'empty';
            $Usr_pass = 'empty';
            $Usr_PubKey = 'empty';
            $Usr_role = 'empty';
        }
   } 
//   echo "<br>Usr_pass: ".$Usr_pass;
//   echo "<br>sha1(_POST['password']): ".sha1($_POST['password']);
   if(isset($_POST['user']) && isset($_POST['password'])){
    if($_POST['user']==$Usr_name  && sha1($_POST['password'])==$Usr_pass){
        echo "<br>Jest w TRU: ".$_POST['user']." / ".$_POST['password'];
        $_SESSION['log'] = true;
        echo "Ustanawiam SESS[log] na true:".$_SESSION['log'] ;
        $_SESSION['user'] = $_POST['user'] ? $_POST['user'] : $_GET['user'];
//        $_SESSION['password'] = sha1($_POST['password']) ? sha1($_POST['password'] : $_GET['password'];
        $_SESSION['role'] = $Usr_role;
        
        
        $_SESSION['arrOfAnsw'] = array();
        $_SESSION['good']=0;
        $_SESSION['bad']=0;
        $score = new Score();
        $_SESSION['scoresOfUsr'] = $score->getScoresOfUser($_SESSION['user']);
//        echo "<p class=red><b>".$_SESSION['scoresOfUsr'][0]."/".$_SESSION['scoresOfUsr'][1]."</b></p>";
        $time = time()+60*60*23;    // loger: Cookie log =  18h, header (odświerzanie!): 10min
//        $time = time()+15;
        $time_str = date($time)? date($time) : $_SESSION['user'];
//        setcookie("log", $_SESSION['user'], time()+60*60*24);       // ciastko ważne 24h
//        setcookie("log", $time_str, $time);       // ciastko ważne 24h
        
        if(setcookie("log", $time_str, $time)){   // ciastko ważne 24h
            header("Location: ".$_SESSION['ref']);
        }else{
            echo "<BR>NO COOKIE LOG SET";
            setcookie("log", time()+1);
        }
        
        header("Location: ".$_SESSION['ref']);
    }else{
//        echo "<br>// faktyczne wylogowanie!!!!!!!!!!!!";
        unset($_SESSION['log']);
        setcookie("log", '', time()-7200);
        $_SESSION['log'] = false; 
        $_SESSION['role'] = '';
        unset($_SESSION['role']);
    }
  } else {
//        echo "<br>// faktyczne wylogowanie!!!!!!!!!!!!";
        unset($_SESSION['log']);
        setcookie("log", '', time()-7200);
        $_SESSION['log'] = false;
        $_SESSION['role'] = '';
        unset($_SESSION['role']);
        
  }
}else{
    echo "<br>Brak POST or GET!!!"."| File:".__FILE__.", line:".__LINE__;
}

//    echo "<br>POST2: ";var_dump($_POST);
//    echo "<br>SESS2: ";var_dump($_SESSION);

?>
<body> 
    <form action="loger.php" method="post" enctype="multipart/form-data">
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
            <tr>
                <td><label for="pass"><?php echo t("PrivateKey"); ?>:</td>
                <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                <!--<td><input id=pass type="hidden" name="password" value="" ></td>-->
            </tr>
            <tr>
                <td></td>
                <td><input id=sub name=sub type="submit" value="<?php echo t("Zaloguj"); ?>"></td>
            </tr>

        <tr><td colspan='2'><?php echo t("OR"); ?></td><tr>
        <?php //echo t("OR"); ?>

            <tr>
                <td><?php echo t("Create New User"); ?></td>
                <td><button id='CreateUser' type="button" ><?php echo t("CreateUser"); ?></button></td>
            </tr>
        </table>
    </form>
    
<!--    <form method="post" action="" id="update_form">
     <label for="user_name">Name</label>
     <input type="text" name="user[name]" id="user_name" />
     <label for="user_email">Email</label>
     <input type="text" name="user[email]" id="user_email" />     
     <label for="user_gender">Gender</label>
     <select id="user_gender" name="user[gender]">
          <option value="m">Male</option>
          <option value="f">Female</option>
     </select>     
     <input type="submit" value="Update" />
    </form>-->
</body>

