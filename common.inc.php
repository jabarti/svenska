<?php
//session_start();
/**
 * common.inc.php
 *
 * Includes all necessary files for the project.
 *
 * @author Bartosz Lewiński <jabarti@wp.pl>
 *
 */

if(!isset($_SESSION)){
//    ob_start();
    session_start();
}

//echo "<script> console.log('common.inc.php') </script>";

//    echo "<script>console.log('_SESSION[licznik_odw]:".$_SESSION['licznik_odw']."') </script>";


if(isset($_POST)){
    ?><script>//alert ("Jest POST!!");</script><?php
    if(isset($_POST['submitLOG'])){
//        ?><script>//alert ("Jest POST[submitLOG]!!");</script><?php
        // to to co przeszło z logera, jeszcze nie wiadomo czy jest taki user!!
        $_SESSION['submitLOG']['user'] = $_POST['user'];
        $_SESSION['submitLOG']['password'] = sha1($_POST['password']);
        unset($_POST['submitLOG']);
    }else{
//        ?><script>//alert ("NIE MA POST[submitLOG]!!");</script><?php
//        unset($_SESSION['submitLOG']);
    }
}

$log_hours = 23;
$log_min = 60*57;

if(isset($_GET['kuki'])){
//    var_dump($_GET);
    ?><script>//console.log("Jest GET['kuki']!!: <?php echo $_GET['kuki'] ?>");</script><?php
    switch($_GET['kuki']){       
        case 'NOT_OK':
            ?><script>//alert ("Jest GET['kuki']!!: <?php //echo $_GET['kuki'] ?> ||");</script><?php
            $time = time()+60*60*$log_hours+$log_min;    // loger: Cookie log =  18h, header (odświerzanie!): 10min
            $time_str = date($time);
            try{
                if(setcookie("log", $time_str, $time)){
//                    echo "<br>".__LINE__." / COOKIE (USTAWIONE!:".var_export($_COOKIE['log'], true);
                }else{
//                    echo "<br>".__LINE__." / common.php COOKIE (nie ustawione, czemu???):";
                }
                if(isset($_COOKIE['log'])){
//                    echo "<br>".__LINE__." / COOKIE (USTAWIONE!:".var_export($_COOKIE['log'], true);
                }else{
//                    echo "<br>".__LINE__." / common.php COOKIE (nie ustawione, czemu???):";
                }                  
            } catch (Exception $ex) {
                echo "error: $ex";
//                    echo "<br>COOKIE (ERROR: nie ustawione, czemu???:".var_export($_COOKIE['log'], true);                    
            }
            break;
        case 'NOT_OKW':
            ?><script>//alert ("Jest GET['kuki']!!: <?php echo $_GET['kuki'] ?> ||");</script><?php
            $time = time()+60*60*$log_hours+$log_min;    // loger: Cookie log =  18h, header (odświerzanie!): 10min
            $time_str = date($time);
            try{
                if(setcookie("log", $time_str, $time)){
//                    echo "<br>".__LINE__." / COOKIE (USTAWIONE!:".var_export($_COOKIE['log'], true);
                }else{
//                    echo "<br>".__LINE__." / common.php COOKIE (nie ustawione, czemu???):";
                }
                if(isset($_COOKIE['log'])){
//                    echo "<br>".__LINE__." / COOKIE USTAWIONE!:".var_export($_COOKIE['log'], true);
                }else{
//                    echo "<br>".__LINE__." / common.php COOKIE (nie ustawione, czemu???):";
                }                  
            } catch (Exception $ex) {
                echo "error: $ex";
//                    echo "<br>COOKIE (ERROR: nie ustawione, czemu???:".var_export($_COOKIE['log'], true);                    
            }
            if(isset($_SESSION['licznik_odw']) && $_SESSION['licznik_odw']<3){
//                echo "<script> window.location.reload(); </script>";
            }elseif(isset($_SESSION['licznik_odw']) && $_SESSION['licznik_odw']<9){
//                echo $_SESSION['licznik_odw'];
            }else{
//                echo "brak Session licznik";
            }

            
            break;
        default:
            ?><script>//alert ("DEFAULT: Jest GET['kuki']!!: <?php //echo $_GET['kuki'] ?> ||");</script><?php 
            break;
    }
}else{
    ?><script>//alert ("NIE ma GET[kuki]!!");</script><?php
}



//header('Content-Type: text/html; charset=utf-8'); 
 // LOAD CUSTOM SETTINGS
/*if (file_exists(dirname(__FILE__) . DIRECTORY_SEPARATOR . '../config.inc.php')) {
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '../config.inc.php');
}/**/

//$tempPath = getenv('PATH');
//$res = putenv('PATH=/opt/local/bin/:'.$tempPath);


//if (!defined('MAX_MAIL_BATCH')) {
//	define('MAX_MAIL_BATCH', 1); // Maximum number of emails to send while running the newsletter mailer job.
//}


//// DEFINE DIRECTORIES
//define('BASE_PATH', dirname(__FILE__));
//define('ROOT', dirname(dirname(__FILE__))); 
////define('UPRODUCE_UPLOAD_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'uProduceUploads');
////define('INCLUDE_PATH', substr(BASE_PATH, 0, strrpos(BASE_PATH, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'Includes');
//define('CLASSES_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'Classes');
//define('INCLUDE_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'Includes');
////define('LOCALE_PATH', INCLUDE_PATH . DIRECTORY_SEPARATOR . 'locale');
//define('FILES_PATH', substr(BASE_PATH, 0, strrpos(BASE_PATH, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'files');
//define('PICTURES_PATH', FILES_PATH . DIRECTORY_SEPARATOR . 'img');
//define('STYLES_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'CSS');
////define('INFO_IMG_FILE_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'infoImages');
////define('XML_RESOURCES_DIR', substr(BASE_PATH, 0, strrpos(BASE_PATH, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'xmlResources');
////define('PAGE_THUMBS_PATH', FILES_PATH . DIRECTORY_SEPARATOR . 'page_thumbs');
///*
//echo '<br><br>linia: '.__LINE__.' ROOT: '.ROOT.'<br>';
//echo 'linia: '.__LINE__.' BASE_PATH: '.BASE_PATH.'<br>';
//echo 'linia: '.__LINE__.' UPRODUCE_UPLOAD_PATH: '.UPRODUCE_UPLOAD_PATH.'<br>';
//echo 'linia: '.__LINE__.' INCLUDE_PATH: '.INCLUDE_PATH.'<br>';
//echo 'linia: '.__LINE__.' CLASSES_PATH: '.CLASSES_PATH.'<br>';
//echo 'linia: '.__LINE__.' LOCALE_PATH: '.LOCALE_PATH.'<br>';
//echo 'linia: '.__LINE__.' FILES_PATH: '.FILES_PATH.'<br>';
//echo 'linia: '.__LINE__.' PICTURES_PATH: '.PICTURES_PATH.'<br>';
//echo 'linia: '.__LINE__.' STYLES_PATH: '.STYLES_PATH.'<br>';
//echo 'linia: '.__LINE__.' INFO_IMG_FILE_PATH: '.INFO_IMG_FILE_PATH.'<br>';
//echo 'linia: '.__LINE__.' XML_RESOURCES_DIR: '.XML_RESOURCES_DIR.'<br>';
//echo 'linia: '.__LINE__.' PAGE_THUMBS_PATH: '.PAGE_THUMBS_PATH.'<br>';
//echo 'linia: '.__LINE__.' =============================================<br>';
///**/

//var_dump($_SERVER);

//echo "ACCEPT LANG:".$_SERVER["HTTP_ACCEPT_LANGUAGE"];
if (isset($_GET['lang'])||isset($_SESSION['lang'])){
    if(isset($_GET['lang']))
        $_SESSION['lang'] = $_GET['lang'];
        ?><script>//alert ("SESSION LANG!!");</script><?php
} else {
    $_SESSION['lang'] = "pl";
}

$REMOTE_ADDR = false;
//echo "REMOTE ADDR:".$_SERVER["REMOTE_ADDR"];//=> string(14) "81.234.110.249";

$ServerList = array("81.234.110.249", "85.202.150.195"); //(Mullsjö,OBR11/90)
if(in_array($_SERVER["REMOTE_ADDR"],$ServerList)){
    echo "Admin IP Address: ".$_SERVER["REMOTE_ADDR"];
    $REMOTE_ADDR = "true";
}

// INCLUDE FILES - DO NOT TOUCH SEQUENCE
//die("a");
/*require_once(INCLUDE_PATH . DIRECTORY_SEPARATOR . 'classes.inc.php');
require_once(INCLUDE_PATH . DIRECTORY_SEPARATOR . 'pear.inc.php');

require_once(INCLUDE_PATH . DIRECTORY_SEPARATOR . 'db.inc.php');

require_once(INCLUDE_PATH . DIRECTORY_SEPARATOR . 'localization.inc.php');

if (!AUTO_LOGIN) { 
	require_once(INCLUDE_PATH . DIRECTORY_SEPARATOR . 'auth.inc.php');
}/**/
//mysql_query('SET NAMES utf8');

//mb_internal_encoding('UTF-8');

/*** Ed stuff: ***/
//define('DATA_DIR', BASE_PATH);


//initPage();

//require_once(INCLUDE_PATH . DIRECTORY_SEPARATOR . 'identifyImage.php');

//if (!defined('DO_NOT_CLOSE_SESSION')) {
//	session_write_close();
//}
try{
    ?><script>//alert ("common - try");</script><?php
    require_once 'Paths.php';
    require_once CLASSES_PATH.'Ord.class.php';
    require_once CLASSES_PATH.'User.class.php';
    require_once CLASSES_PATH.'Score.class.php';
    require_once CLASSES_PATH.'Random.class.php';
    
    require_once FUNCTIONS_PATH.'functions.php';
    if(isset($_SESSION['server'])){
        ?><script>//alert ("isset($_SESSION['server'])");</script><?php
        if($_SESSION['server']=='server'){
            ?><script>//alert ("isset($_SESSION['server']) == 'server");</script><?php
            include BL_TRANSLATION_PATH.'translacjon.php';
            include BL_TRANSLATION_PATH.'flag.php';
        }else{  // poza serwerem bartilevi nie widoczna będzie zawartość /translation
            function t($var){ return $var; }
            function g($var){ return $var; }
        }
    }
}
catch(Exception $ex){
    echo t("Błędem jest")." :".$ex;
}

//if(include '../Translations/translacjon.php'){
//    echo "<br>Translation OK";
//}else{
//    echo "<br>Translation ERROR";
//}
//echo t('Zalogowany jako');
//if(isset($_SESSION['log'])){
//
//    if($_SESSION['log'] == true){
//    echo "<div class=divLog>  ".g('Zalogowany jako').": ".$_SESSION['user']."";//." z hasłem: ". $_SESSION['password'];
//        echo "<span id=zegar></span><br>";
//        echo "<span id=zegar_log style='visibility: block'></span>";
//        echo "<br><button onclick=\"window.location.href='loger.php'\">".g("Wyloguj")."</button>";
//        $tim = $_COOKIE['log'];
//        echo "<span id=log_time style='visibility: hidden;'>".$tim."</span>";
////        echo "<input id=log_time type=hidden value='".$tim."'>";
//        echo "</div>";
//    }else{
//        echo "<div class=divLog>".g("NIE ZALOGOWANY")."</div>";
//    }
//}else{
//    echo "KUPA";
//}

//if(isset($_COOKIE["test"])){
//    echo "<br>W isset COOKIE";    
//    echo "<br>W COOKIE removal:<br>";
//    foreach ($_COOKIE as $name => $value){
//       echo "Name: $name => Value: $value <br />";
//    }
//
//    unset($_COOKIE['test']);
//    unset($_COOKIE['user']);
//    unset($_COOKIE['time']);
//    unset($_COOKIE['log']);
//    
//    if(isset($_COOKIE['test'])){
//        echo "<br>1) cookie dalej siedzi";
//        
//    }else{
//        echo "<br>1) cookie wycięte";
//    }
//    setcookie('test','',  time()-7200);
//    setcookie('user','',  time()-7200);
//    setcookie('time','',  time()-7200);
//    setcookie('log','',  time()-7200);
//    if(isset($_COOKIE['test'])){
//        echo "<br>2) cookie dalej siedzi";
//    }else{
//        echo "<br>2) cookie wycięte";
//    }
//}else{
//    echo "<br>W ELSE isset COOKIE";
//    try{
//        $usr_name = $_SESSION['user']?$_SESSION['user']:"Noname!";
////        $czas = date("y-m-d; H:i:s");
////        echo "Czas: $czas";
//        setcookie("test", $usr_name, time()+60*10);
//        setcookie("log", $usr_name, time()+60*10);
//        try{
//            setcookie("time", date("y-m-d; H:i:s"), time()+60*10);
//        }catch(Exception $ex){
//            echo "<br>ERROR $ex";
//        }
////        setcookie("user", "Barti Levi", time()+7200);
//        echo "<br>COOKIES SET!!";
//    }catch(Exception $ex){
//        echo "ERROR:$ex";
//    }
//}
