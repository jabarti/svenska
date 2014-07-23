<?php

/****************************************************
 * Project:     Svenska
 * Filename:    help_test_admin.php
 * Encoding:    UTF-8
 * Created:     2014-07-17
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once "common.inc.php";
include 'DB_Connection.php';
$title = 'Svenska | Help_Adm';
include 'header.php';
//include 'flag.php';
include 'buttons.php';

if(isset($_SESSION['log'])&& isset($_COOKIE['log'])){
    if($_SESSION['log'] == true){
        echo "<br>Zalogowany jako: ".$_SESSION['user'];//." z hasłem: ". $_SESSION['password'];
    }else{
        echo "<br>NIE ZALOGOWANY";
    }
}

echo $_SESSION['user'];

//if(true){
if($_SESSION['log'] == true && $_SESSION['user'] == 'Bartek'){   
    


if($Word = new Ord()){
    echo "<br>OK";
}else{
    echo "<br>NOT OK: Object of Ord class not created!";
}
echo "<br>Cięcie stringa do bazy:";
$str = $Word->setSQLstringToCode("<br>Alą mać kotę<br>Ącko źrebiŃ<br>öäå+ÖÄÅ");
$str2 = $Word->setSQLstringDeCode($str);

echo "<br>";

if($User = new User()){
    echo "<br>OK";
}else{
    echo "<br>NOT OK: Object of User class not created!";
}

$max = $Word->getLastId();


$Word->findEmptyOrdId();


$Word->getOrdArrByType("pronoun");

$User->getUsersNames();
$str='try';
echo "SHA: ".sha1($str);

} else {
    require 'loger.php';
}
?>
<body>
    <div id="czas"></div>
</body>
<script>
    function getTime() {
    return (new Date()).toLocaleTimeString();
}

document.getElementById('czas').innerHTML = getTime();

setInterval(function() {

    document.getElementById('czas').innerHTML = getTime();
    
}, 1000);
    </script>
    
    