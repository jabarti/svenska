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

//echo "<script> console.log('logerMOD.php') </script>";

if(!isset($_GET['action'])){

//    echo "<br>Przybywasz z: ".$_SERVER['HTTP_REFERER'];
    
    if(isset($_SERVER['HTTP_REFERER'])){
        $matchKUKI = strpos($_SERVER['HTTP_REFERER'], "?kuki");
    //    echo "<br>Macz: ".$match."<br>";
        $temp = explode("?", $_SERVER['HTTP_REFERER']);
        $servBARE = $temp[0];
    }else{
        ?><script>//alert ("Brak $_SERVER['HTTP_REFERER']");</script><?php
    }
    
    $match = strpos($servBARE, "loger.php");
    
//    echo "<br>".__LINE__."/ BARE SERVER".$servBARE;

    if(!$match){        // jeśli NIE przybyłeś z loger.php
//        echo "<br>!match:".var_export((!$match), true);
//        echo '<br>$_SESSION[ref]  1 :'.$_SESSION['ref'];
        $_SESSION['ref'] = $servBARE;
//        echo '<br>$_SESSION[ref]  2 :'.$_SESSION['ref'];
//        $_SESSION['ref'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "index.php";
    }else{
//        echo '<br>$_SESSION[ref]'.$_SESSION['ref'];
//        echo "<br>!match:".var_export(!$match, !true);
        $_SESSION['ref'] = "index.php";
    }
    
//    echo "<br><span>".t('Przybywasz z: ').$_SESSION['ref']."</span>";
 
//    $Usr_name ='';
//    $Usr_pass ='';
    
    if(isset($_SESSION['submitLOG'])){
//        echo "<br>POST_LOG_MOD: ";var_dump($_POST);
//        echo "<br>SESS_LOG_MOD: ";var_dump($_SESSION);
//        echo "<br>Cooki_LOG_MOD: ";var_dump($_COOKIE);
//        echo "<br>COOKIE LOG: ".(isset($_COOKIE['log'])?$_COOKIE['log']:"pusty cookie");

        if(isset($_SESSION['submitLOG']['user']) && isset($_SESSION['submitLOG']['password']) ){
        
            $userLOGMOD = new User();
        
            $userLoginFORM      = $_SESSION['submitLOG']['user'];
            $userPasswordFORM   = $_SESSION['submitLOG']['password'];

            if($userLOGMOD->getId($userLoginFORM)){
                $user_data = $userLOGMOD->getLogDataByUser($userLoginFORM);
//                echo "<br>DB user data: ";var_dump($user_data);
                $Usr_name = $user_data[0];                      // user
                $Usr_pass = $user_data[1];                      // pass
                $Usr_PubKey = $user_data[2];                    // PublicKey
                $Usr_role = $user_data[3];                      // PublicKey
                $Usr_id = $userLOGMOD->getId($userLoginFORM);   // usrId
                
                $Usr_mail = $user_data[4];                      // email
            }else{
                $Usr_name = 'empty';
                $Usr_pass = 'empty';
                $Usr_PubKey = 'empty';
                $Usr_role = 'empty';
                $Usr_id = 'empty';
                $Usr_mail = 'empty';
            }
        } else {
//            echo "<br> isset(_SESSION['submitLOG']['user']) NOT SET!!!"
//            . "   <br> isset(_SESSION['submitLOG']['password']) NOT SET!!!";
        }
//        echo "<br>Usr_pass: ".$Usr_pass;
//        echo "<br>sha1(_POST['password']): ".sha1($_POST['password']);
   
//        if(isset($_POST['user']) && isset($_POST['password'])){
        if($userLoginFORM==$Usr_name  && $userPasswordFORM==$Usr_pass){
//            echo "<br>".__LINE__." / Jest w TRU: ".$userLoginFORM." / ".$userPasswordFORM;
            $_SESSION['log'] = true;
//            echo "<br>".__LINE__." /Ustanawiam SESS[log] na true:".var_export($_SESSION['log'], true);
            $_SESSION['user'] = $Usr_name;// ? $_POST['user'] : $_GET['user'];
            $_SESSION['role'] = $Usr_role;
            $_SESSION['user_id'] = $Usr_id;
            $_SESSION['usr_mail'] = $Usr_mail;
        
            $_SESSION['arrOfAnsw'] = array();
            $_SESSION['good']=0;
            $_SESSION['bad']=0;
            $score = new Score();
            $_SESSION['scoresOfUsr'] = $score->getScoresOfUser($Usr_name);
    //        echo "<p class=red><b>".$_SESSION['scoresOfUsr'][0]."/".$_SESSION['scoresOfUsr'][1]."</b></p>";
//            $time = time()+60*60*23;    // loger: Cookie log =  18h, header (odświerzanie!): 10min
    //        $time = time()+15;
//            $time_str = date($time);//? date($time) : $_SESSION['user'];
    //        setcookie("log", $_SESSION['user'], time()+60*60*24);       // ciastko ważne 24h
//            setcookie("log", $time_str, $time);       // ciastko ważne 24h
            
//            echo "<br>".__LINE__."/ time_str:".$time_str." / time:".$time;
            
            if (isset($_COOKIE['log'])){
                echo "<br>COOKIE[log] BYŁO ustawione: ".$_SESSION['log'];
                echo "<br>heder do sess REF2:".$_SESSION['ref'];
//                header("Location: ".$_SESSION['ref']."?kuki=OK_oldH");
//                echo "<script> window.location.href='".$_SESSION['ref']."?kuki=OK_oldW' </script>";
                echo "<script> window.location.replace('".$_SESSION['ref']."?kuki=OK_oldW') </script>";
                exit("<br>".__LINE__."Location: ".$_SESSION['ref']."?kuki=OK_old");
//            }
//            elseif(setcookie("log", $time_str, $time)){   // ciastko ważne 24h
//                echo "<br>heder do sess REF1:".$_SESSION['ref'];
//                header("Location: ".$_SESSION['ref']."?kuki=OK_newH".$_COOKIE['log']);
//                exit("<br>".__LINE__."Location: ".$_SESSION['ref']."?kuki=OK_newL".$_COOKIE['log']);
            }else{
//                echo "<BR>".__LINE__."/NO COOKIE LOG SET!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
    //            setcookie("log", time()+1);
//                echo "<br>heder do sess REF2:".$_SESSION['ref'];
//                echo "<br>User session:".$_SESSION['user'];
//                echo "<br>COOKIE (nie ustawione, czemu???:".var_export($_COOKIE['log'], true);
//                try{
//                    @setcookie("log_TRY", $time_str, $time);
//                    echo "<br>COOKIE (nie ustawione, czemu???:".var_export($_COOKIE['log'], true);                    
//                } catch (Exception $ex) {
//                    echo "error: $ex";
////                    echo "<br>COOKIE (ERROR: nie ustawione, czemu???:".var_export($_COOKIE['log'], true);                    
//                }
                echo "<script> window.location.replace('".$_SESSION['ref']."?kuki=NOT_OKW') </script>";
//                echo "<script> window.location.href='".$_SESSION['ref']."?kuki=NOT_OKW' </script>";
//                header("Location: ".$_SESSION['ref']."?kuki=NOT_OKH");
//                exit("<br>".__LINE__."Location: ".$_SESSION['ref']."?kuki=NOT_OKW");
            }
        } else{
//            echo "<br>// faktyczne wylogowanie!!!!!!!!!!!! Bo złe hasło....";
            ?>
                <script>alert ("WYLOG 1");</script>
            <?php
            unset($_SESSION['log']);
//            setcookie("log", '', time()-3600);
            $_SESSION['log'] = false; 
            $_SESSION['role'] = '';
            unset($_SESSION['APPTIME']);
            unset($_SESSION['role']);
            unset($_SESSION['user_id']);      
            unset($_SESSION['usr_mail']);
            unset($_SESSION['user']);
//            header("Location: loger.php");
            exit("<br>".__LINE__."Location: loger.php");
        }
    } else{
//        echo "<br>Brakisset(SESSION['submitLOG'] !!"."| File:".__FILE__.", line:".__LINE__;
    }
}else{
//if(isset($_GET['action'])){
        switch($_GET['action']){
            case 'logout':
                ?>
                <!--<script>alert ("WYLOG 2");</script>-->
                <?php
                if(isset($_SESSION['good']) OR isset($_SESSION['bad'])){
                    $score = new Score();
                    $score->setScoreData($_SESSION['user'], $_SESSION['good'], $_SESSION['bad']);
                    $score->saveScoreData();
                }
                
                // PROBLEM ZE SKASOWANIEM TEGO COOKIE. ZOSTAJE TO POMINIĘTE W divLog.php
                if(setcookie("log", '', time()-3600) or setcookie("log", '', time()-3600, '/')){
                    ?>
                <!--<script>alert ("WYLOG 2a OK");</script>-->
                    <?php
                }else{
                    ?>
                <!--<script>alert ("WYLOG 2b NOT WORKING");</script>-->
                    <?php
                }
//                setcookie("log", '', time()-3600, '/');
            
//        $past = time() - 3600;
//        foreach ( $_COOKIE as $key => $value )
//        {
//            $value = null;
//            setcookie( $key, $value, $past );
//            setcookie( $key, $value, $past, '/' );
//            echo "<br>COKI[ $key, $value, $past ]";
//        }
            
        ?>
<!--            <script>
                createCookie('pipi','value',1)
                var b = readCookie('pipi')
                alert (b)
                eraseCookie('pipi')
                
                createCookie('log','val',1)
                
                var a = readCookie('log')
                alert (a)
                eraseCookie('log')
//                alert (a)
            </script>-->
            <?php
            
                $_SESSION['log'] = false;
                $_SESSION['role'] = '';
                $_SESSION['licznik_odw'] = 0;
                unset($_SESSION['role']);
                unset($_SESSION['usr_mail']);
                unset($_SESSION['user']);
                unset($_SESSION['user_id']);
                unset($_SESSION['submitLOG']);
                unset($_SESSION['APPTIME']);
                
                foreach($_SESSION as $k => $v){
//                    echo "<br>\$_SESSION[$k]=$v";
//                    if($k != 'log'){
                        ($_SESSION[$k] = false);
//                    }else{
//                        echo $k;
//                    }
                }
                header("Location: index.php");
                echo "<script> window.location.replace('index.php') </script>" ;
//                exit("<br>".__LINE__."LOGOUT: Location: index.php");
                break;
            default:
                break;
        }
}


//    echo "<br>POST2: ";var_dump($_POST);
//    echo "<br>SESS2: ";var_dump($_SESSION);
//    echo "<br>COOC2: ";var_dump($_COOKIE);
//    echo "<br>SESS2: ";var_dump($_SESSION);
