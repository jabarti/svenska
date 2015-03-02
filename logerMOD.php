<?php

/****************************************************
 * Project:     Svenska
 * Filename:    LogerMOD.php
 * Encoding:    UTF-8
 * Created:     2015-03-02
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | loggerMOD';
include 'header.php';
//include 'buttons.php';

echo "<br>Przybywasz z: ".$_SERVER['HTTP_REFERER'];
$match = strpos($_SERVER['HTTP_REFERER'], "loger.php");
//echo "<br>Macz: ".$match."<br>";

if(!$match){
        echo "<br>!match:".!match;
        echo '<br>$_SESSION[ref]:'.$_SESSION['ref'];
        $_SESSION['ref'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "index.php";
    }else{
        echo '<br>$_SESSION[ref]'.$_SESSION['ref'];
        echo "<br>!match:".!match;
        $_SESSION['ref'] = "index.php";
    }
    
echo "<br><span>".t('Przybywasz z: ').$_SESSION['ref']."</span>";
 
$Usr_name ='';
$Usr_pass ='';

//if(isset($_POST) || isset($_GET)){
if(isset($_POST['sub'])){
    echo "<br>POST1: ";var_dump($_POST);
    echo "<br>SESS1: ";var_dump($_SESSION);
    echo "<br>Cooki: ";var_dump($_COOKIE);
    echo "<br>COOKIE LOG: ".(isset($_COOKIE['log'])?$_COOKIE['log']:"pusty cookie");
    
    
    if(isset($_POST['user'])){
        
        $userLOGMOD = new User();
        
        if($userLOGMOD->getId($_POST['user'])){
//            $user_data = $user->getUserByName($_POST['user']);
            $user_data = $userLOGMOD->getLogDataByUser($_POST['user']);
//            echo "<br>DB user data: ";var_dump($user_data);
            $Usr_name = $user_data[0];                  // user
            $Usr_pass = $user_data[1];                  // pass
            $Usr_PubKey = $user_data[2];                // PublicKey
            $Usr_role = $user_data[3];                  // PublicKey
            $Usr_mail = $user_data[4];                  // email
        }else{
            $Usr_name = 'empty';
            $Usr_pass = 'empty';
            $Usr_PubKey = 'empty';
            $Usr_role = 'empty';
            $Usr_mail = 'empty';
        }
   } else {
       echo "<br> POST[user] NOT SET!!!";
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
        $_SESSION['usr_mail'] = $Usr_mail;
        
        
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
                echo "<br>heder do sess REF1:".$_SESSION['ref'];
            header("Location: ".$_SESSION['ref']."?kuki=OK");
        }else{
            echo "<BR>NO COOKIE LOG SET!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
//            setcookie("log", time()+1);
            echo "<br>heder do sess REF2:".$_SESSION['ref'];
            header("Location: ".$_SESSION['ref']."?kuki=NOT_OK");
        }
//            echo "<br>heder do sess REF2:".$_SESSION['ref'];
//        header("Location: ".$_SESSION['ref']."?kuki=NOT_OK");
    }else{
        echo "<br>// faktyczne wylogowanie!!!!!!!!!!!! Bo złe hasło....";
        ?><script>//alert ("WYLOG 1");</script><?php
//        unset($_SESSION['log']);
        setcookie("log", '', time()-3600);
        $_SESSION['log'] = false; 
        $_SESSION['role'] = '';
        unset($_SESSION['role']);
        unset($_SESSION['usr_mail']);
        unset($_SESSION['user']);
        header("Location: loger.php");
    }
  } else {
        echo "<br>// faktyczne wylogowanie!!!!!!!!!!!! ";
//        ?><script>alert ("WYLOG 2");</script><?php
//        unset($_SESSION['log']);
        setcookie("log", '', time()-3600);
        $_SESSION['log'] = false;
        $_SESSION['role'] = '';
        unset($_SESSION['role']);
        unset($_SESSION['usr_mail']);
        unset($_SESSION['user']);
        header("Location: loger.php");
  }
}else{
    echo "<br>Brak POST{'sub'] !!"."| File:".__FILE__.", line:".__LINE__;
    
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case 'logout':
                setcookie("log", '', time()-3600);
                $_SESSION['log'] = false;
                $_SESSION['role'] = '';
                unset($_SESSION['role']);
                unset($_SESSION['usr_mail']);
                unset($_SESSION['user']);
                header("Location: index.php");
                break;
            default:
                break;
        }
    }
}

//    echo "<br>POST2: ";var_dump($_POST);
//    echo "<br>SESS2: ";var_dump($_SESSION);
