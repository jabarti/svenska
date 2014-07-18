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
//    var_dump($_SESSION);
    $_SESSION['try'] = 3;
}else{
    echo "SESJA JEST USTANOWIONA";
    $_SESSION['try']++;
}

//header('Content-Type: text/html; charset=utf-8'); 
 // LOAD CUSTOM SETTINGS
/*if (file_exists(dirname(__FILE__) . DIRECTORY_SEPARATOR . '../config.inc.php')) {
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '../config.inc.php');
}/**/

//$tempPath = getenv('PATH');
//$res = putenv('PATH=/opt/local/bin/:'.$tempPath);


if (!defined('MAX_MAIL_BATCH')) {
	define('MAX_MAIL_BATCH', 1); // Maximum number of emails to send while running the newsletter mailer job.
}


// DEFINE DIRECTORIES
define('BASE_PATH', dirname(__FILE__));
define('ROOT', dirname(dirname(__FILE__))); 
define('UPRODUCE_UPLOAD_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'uProduceUploads');
//define('INCLUDE_PATH', substr(BASE_PATH, 0, strrpos(BASE_PATH, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'Includes');
define('CLASSES_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'Classes');
define('INCLUDE_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'Includes');
define('LOCALE_PATH', INCLUDE_PATH . DIRECTORY_SEPARATOR . 'locale');
define('FILES_PATH', substr(BASE_PATH, 0, strrpos(BASE_PATH, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'files');
define('PICTURES_PATH', FILES_PATH . DIRECTORY_SEPARATOR . 'pictures');
define('STYLES_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'Styles');
define('INFO_IMG_FILE_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'infoImages');
define('XML_RESOURCES_DIR', substr(BASE_PATH, 0, strrpos(BASE_PATH, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'xmlResources');
define('PAGE_THUMBS_PATH', FILES_PATH . DIRECTORY_SEPARATOR . 'page_thumbs');
/*
echo '<br><br>linia: '.__LINE__.' ROOT: '.ROOT.'<br>';
echo 'linia: '.__LINE__.' BASE_PATH: '.BASE_PATH.'<br>';
echo 'linia: '.__LINE__.' UPRODUCE_UPLOAD_PATH: '.UPRODUCE_UPLOAD_PATH.'<br>';
echo 'linia: '.__LINE__.' INCLUDE_PATH: '.INCLUDE_PATH.'<br>';
echo 'linia: '.__LINE__.' CLASSES_PATH: '.CLASSES_PATH.'<br>';
echo 'linia: '.__LINE__.' LOCALE_PATH: '.LOCALE_PATH.'<br>';
echo 'linia: '.__LINE__.' FILES_PATH: '.FILES_PATH.'<br>';
echo 'linia: '.__LINE__.' PICTURES_PATH: '.PICTURES_PATH.'<br>';
echo 'linia: '.__LINE__.' STYLES_PATH: '.STYLES_PATH.'<br>';
echo 'linia: '.__LINE__.' INFO_IMG_FILE_PATH: '.INFO_IMG_FILE_PATH.'<br>';
echo 'linia: '.__LINE__.' XML_RESOURCES_DIR: '.XML_RESOURCES_DIR.'<br>';
echo 'linia: '.__LINE__.' PAGE_THUMBS_PATH: '.PAGE_THUMBS_PATH.'<br>';
echo 'linia: '.__LINE__.' =============================================<br>';
/**/

// DEFAULT LANGUAGE
//define("DEFAULT_LANGUAGE", "no");


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
define('DATA_DIR', BASE_PATH);

function db_query($sql)
{
	$ret = @mysql_query($sql);
	
	if (!$ret)
		die('MySQL query failed: '.$sql.' Error message: '.mysql_error());//,$sql,mysql_error());
	return $ret;
}


//initPage();

//require_once(INCLUDE_PATH . DIRECTORY_SEPARATOR . 'identifyImage.php');

//if (!defined('DO_NOT_CLOSE_SESSION')) {
//	session_write_close();
//}
try{
    require_once CLASSES_PATH.DIRECTORY_SEPARATOR.'Ord.class.php';
    require_once CLASSES_PATH.DIRECTORY_SEPARATOR.'User.class.php';
    require_once CLASSES_PATH.DIRECTORY_SEPARATOR.'Score.class.php';
    require_once INCLUDE_PATH.DIRECTORY_SEPARATOR.'functions.php';
}
catch(Exception $ex){
    echo "Błędem jest :".$ex;
}

//if(include '../Translations/translacjon.php'){
//    echo "<br>Translation OK";
//}else{
//    echo "<br>Translation ERROR";
//}

//if(!isset($_SESSION['good'])){
//    $_SESSION['good'] =0;
//    $_SESSION['bad'] =0;

//$_SESSION['ala']  = 'ala';
//}
////$_SESSION['views']=0;
//if(isset($_SESSION['views']))
//    $_SESSION['views'] = $_SESSION['views']+ 1;
//else
//    $_SESSION['views'] = 1;

//echo "views = ". $_SESSION['views']; 
//echo "<br>_SESSION['good'] = ". $_SESSION['good']; 
//echo "<br>_SESSION['bad'] = ". $_SESSION['bad']; 

//if(!isset($_SESSION['test']))
//    $_SESSION['test'] = 0;
//else
//    $_SESSION['test']=8;


//echo "<br>_SESSION['log']:".$_SESSION['log'];