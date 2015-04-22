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
    ?>
    <!--<script>alert ("Jest POST!!");</script>-->
    <?php
    if(isset($_POST['submitLOG'])){
        ?>
        <!--<script>alert ("Jest POST[submitLOG]!!");</script>-->
        <?php
        // to to co przeszło z logera, jeszcze nie wiadomo czy jest taki user!!
        $_SESSION['submitLOG']['user'] = $_POST['user'];
        $_SESSION['submitLOG']['password'] = sha1($_POST['password']);
        unset($_POST['submitLOG']);
    }else{
        ?>
            <!--<script>//alert ("NIE MA POST[submitLOG]!!");</script>-->
        <?php
//        unset($_SESSION['submitLOG']);
    }
}

$log_hours = 23;
$log_min = 60*57;

if(isset($_GET['kuki'])){
//    var_dump($_GET);
    ?>
    <!--<script>console.log("Jest GET['kuki']!!: <?php //echo $_GET['kuki'] ?>");</script>-->
    <?php
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
            ?>
            <!--<script>alert ("Jest GET['kuki']!!: <?php //echo $_GET['kuki'] ?> ||");</script>-->
            <?php
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
            ?>
            <!--<script>alert ("DEFAULT: Jest GET['kuki']!!: <?php //echo $_GET['kuki'] ?> ||");</script>-->
            <?php 
            break;
    }
}else{
    ?>
        <!--<script>alert ("NIE ma GET[kuki]!!");</script>-->
    <?php
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
        ?>
                <!--<script>alert ("SESSION LANG!!");</script>-->
        <?php
} else {
    $_SESSION['lang'] = "pl";
}

$geoArr =(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'])));

if(!isset($_SESSION['lang']) OR $_SESSION['lang'] == false){
    switch($geoArr['geoplugin_countryName']){
        case 'Sweden':
//            echo "<br>LANG:".var_export($_SESSION['lang'], true);
            $_SESSION['lang'] = 'se';
            break;
        case 'Poland':
//            echo "<br>LANG:".var_export($_SESSION['lang'], true);
            $_SESSION['lang'] = 'pl';
            break;
        case 'England':
//            echo "<br>LANG:".var_export($_SESSION['lang'], true);
            $_SESSION['lang'] = 'en';
            break;
        default:
            $_SESSION['lang'] = 'pl';
            break;
    }
}


$REMOTE_ADDR = false;
//echo "REMOTE ADDR:".$_SERVER["REMOTE_ADDR"];//=> string(14) "81.234.110.249";

$ServerList = array("81.234.110.249", "85.202.150.195"); //(Mullsjö,OBR11/90)
if(in_array($_SERVER["REMOTE_ADDR"],$ServerList)){
//    echo "Admin IP Address: ".$_SERVER["REMOTE_ADDR"];
    $REMOTE_ADDR = "true";
}

try{
    ?>
    <!--<script>//alert ("common - try");</script>-->
    <?php
    require_once 'Paths.php';
    require_once CLASSES_PATH.'Ord.class.php';
    require_once CLASSES_PATH.'User.class.php';
    require_once CLASSES_PATH.'Log_Ord.class.php';
    require_once CLASSES_PATH.'Score.class.php';
    require_once CLASSES_PATH.'Random.class.php';
    
//    require 'header.php';
    
    require_once FUNCTIONS_PATH.'functions.php';
    if(isset($_SESSION['server'])){
        ?>
        <!--<script>//alert ("isset($_SESSION['server'])");</script>-->
        <?php
        if($_SESSION['server']=='server'){
            ?>
<!--            <script>
//                alert ("isset($_SESSION['server']) == 'server");
            </script>-->
            <?php
            include BL_TRANSLATION_PATH.'translacjon.php';
            include BL_TRANSLATION_PATH.'flag.php';
        }else{  // poza serwerem bartilevi nie widoczna będzie zawartość /translation
            try{
                include BL_TRANSLATION_PATH.'translacjon.php';
            } catch (Exception $ex) {
                ?>
                <script>
                    console.log("ERROR w include translation.php");
                </script>
                <?php
            }
            function t($var){ return $var; }
            function g($var){ return $var; }
        }
    }else{
//        echo "<br>isset(SESSION[server] IS NOT SET)";   
        function t($var){ return $var; }
        function g($var){ return $var; }
    }
}
catch(Exception $ex){
    ?>
<!--    <script>
                alert ("ERROR");
    </script>-->
    <?php
    echo t("Błędem jest")." :".$ex;
}

//var_dump($_SESSION);