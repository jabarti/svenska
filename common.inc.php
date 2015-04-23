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

if(isset($_SERVER['HTTP_USER_AGENT'])){
    $useragent=$_SERVER['HTTP_USER_AGENT'];
    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/'
            . '|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)'
            . '|iris|kindle|lge |maemo|midp|mmp|mobile.'
            . '+firefox|netfront|opera m(ob|in)i|palm( os)?'
            . '|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0'
            . '|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',
            $useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa'
                    . '|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)'
                    . '|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)'
                    . '|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-'
                    . '|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi'
                    . '|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8'
                    . '|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go'
                    . '(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)'
                    . '|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac'
                    . '( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu'
                    . '|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)'
                    . '|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/'
                    . '|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)'
                    . '|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )'
                    . '|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)'
                    . '|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran'
                    . '|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl'
                    . '(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60'
                    . '|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/'
                    . '|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-'
                    . '|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl'
                    . '(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )'
                    . '|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-'
                    . '|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9'
                    . '|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40'
                    . '|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)'
                    . '|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto'
                    . '|zte\-/i',substr($useragent,0,4))){
        $_MOBILE = TRUE;
        if($REMOTE_ADDR){
            echo "<br>mobile useragent: ".$useragent."<br><br>";
        }
    }else{
        $_MOBILE = FALSE;
        if($REMOTE_ADDR){
            echo "<br>Desktop useragent: ".$useragent."<br><br>";
        }
    }
}