<?php
/****************************************************
 * Project:     Svenska
 * Filename:    rozdzielacz.php
 * Encoding:    UTF-8
 * Created:     2015-01-28
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
$file = trim(strrchr($_SERVER['PHP_SELF'],'/'),'/');

?><script>//alert('FILE:<?php echo $file?>')</script><?php
//echo "<script> console.log('rozdzielacz.php') </script>";

$allowPages = Array();

if(isset($_SESSION['role'])){
    ?><script>//alert ("UstAWIONE session ROLE!!: <?php echo $_SESSION['role']; ?>");<?php
     switch ($_SESSION['role']){
         case 'admin':
             array_push($allowPages,"ShowRandomStats.php");
             array_push($allowPages,"help_test_admin.php");
             array_push($allowPages,"UserAdmin.php");
             array_push($allowPages,"try.php");
             array_push($allowPages,"upload.php");
         case 'user_plus':
             array_push($allowPages,"Edit.php");
             array_push($allowPages,"try.php");
             array_push($allowPages,"upload.php");
             array_push($allowPages,"LogShow.php");
             
         case 'user':
             array_push($allowPages,"motsatsen.php");
             array_push($allowPages,"synonymer.php");
             array_push($allowPages,"index.php");
             ?><script>//alert("Bartek lub Anetka") </script><?php
         case 'visitor':
             ?><script>//alert("01. Gosc") </script><?php
             
             array_push($allowPages,"test.php");
             array_push($allowPages,"show.php");
             array_push($allowPages,"mail.php");
             array_push($allowPages,"EditUserByUser.php");
             array_push($allowPages,"loger.php");
             array_push($allowPages,"logerMOD.php");
//                 header("Location: test.php");
             break;
         default:
             ?><script>//alert("04. Defałlt") </script><?php
             break;
     }
 }else{
     ?><script>//alert("05. Nie ma $_SESSION['role']") </script><?php
 }

//echo "<br>REF:".$ref;
//echo "<br>allowPages:"; var_dump($allowPages);
//$tester = var_dump($allowPages);
if(!in_array($file,$allowPages)){
//    echo "<BR><br>NIE JEST na liście allowPages";
    if($file != 'test.php'){
        ?><script>//alert("przed location")</script><?php
        ?><script>//alert('TESTER:<?php //echo $tester; ?>')</script><?php
        header("Location: test.php");
    }
}/*
else{
    ?><script>//alert('<?php //echo $tester?>')</script><?php
    ?><script>//alert('JEST na liście allowPages')</script><?php
//    echo "<BR>JEST na liście allowPages";
//    header("Location: ".$file);
}
/**/