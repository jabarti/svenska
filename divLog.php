<?php

/****************************************************
 * Project:     Svenska
 * Filename:    divLog.php
 * Encoding:    UTF-8
 * Created:     2014-07-25
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
//foreach($_SESSION as $k => $v){
//    echo "<br>SESSION $k => $v";
//}
//        echo "<br>".__FILE__.__LINE__." ROLE:".$_SESSION['role'];
//        echo "<br>user:".$_SESSION['user'];
?><script>//alert ("JEST divlog");</script><?php

if(isset($_SESSION['log'])){
    ?><script>//alert ("JEST divlog i jest SESS[log]");</script><?php
    if($_SESSION['log'] == true){
        ?><script>//alert ("JEST divlog i jest SESS[log] == true");</script><?php
//    echo "<div class=divLog>  ".t('Zalogowany jako').": ".$_SESSION['user']." (".$_SESSION['role'].")";//." z hasłem: ". $_SESSION['password'];
    echo "<div class=divLog>  ";//.t('Zalogowany jako').": ".$_SESSION['user']." (".$_SESSION['role'].")";//." z hasłem: ". $_SESSION['password'];
        echo "<table class='tabl_time'  >";
        echo "<tr><td><span>".t('Zalogowany jako')."</span>: </td><td><span>".$_SESSION['user']." (".$_SESSION['role'].")</span></td></tr>";
        echo "<tr><td><span id=zegarText1>".t('obecny czas')."</span>: </td><td><span id=zegar></span></td></tr>";
        echo "<tr><td><span id=zegarText2>".t('do wylogowania zostało')."</span>: </td><td><span id=zegar_log style='visibility: block'></span></td></tr>";
        echo "</table>";
        
        
        if($_MOBILE){
            echo "<span class='red small'>".t("WERSJA MOBILNA W BUDOWIE")."</span><br>";
        }else{
            echo "<span class='red small'>".t("WERSJA PC")."</span><br>";
        }
        
        echo "<button class='loggOutBtn' onclick=\"window.location.href='logerMOD.php?action=logout'\">".t("Wyloguj")."</button>";
        
        $tim = '';
//        if(isset($_COOKIE['log'])){
        if(isset($_SESSION['APPTIME'])){
            
            if(time()<$_SESSION['APPTIME'][0]){
//              $tim = $_COOKIE['log'];      // PROBLEM Z KASOWANIEM TEGO COOKI PRZY LOGOUT!
                $tim = $_SESSION['APPTIME'][0];
            }else{
                $tim = 'ERROR';             // to ustawia NIE LICZBĘ w polu <span id="log_time" style="visibility: hidden;">xxxx</span> co powoduje że Skrypty.js wylogowuje
            }
//           $tim = time()+60*60-8;        // FAKTYCZNY CZAS PRACY BEZ DZIAŁANIA!!!
//           $tim = time()+60*0.5;        // FAKTYCZNY CZAS PRACY BEZ DZIAŁANIA!!!
            ?>
            <!--<script>alert ("isset($_SESSION['APPTIME']): <?php echo($_SESSION['APPTIME'][0]) ?> ||");</script>-->
            <?php 
        }else{
            $tim = time()+60*20-8;        // FAKTYCZNY CZAS PRACY BEZ DZIAŁANIA!!! 20min
            $tim = time()+60*5;        // FAKTYCZNY CZAS PRACY BEZ DZIAŁANIA!!!
            ?>
            <!--<script>alert ("NIE!! isset($_SESSION['APPTIME']])");</script>-->
            <?php 
        }
        echo "<span id='log_time' style='visibility: hidden;'>".$tim."</span>";      
        echo "</div>";
    }else{
        echo "<div class=divLog>".t("NIE ZALOGOWANY")."</div>";
    }
}
else{
//    echo "<br>Brak SESS[log]!!!"."| File:".__FILE__.", line:".__LINE__;
//    if(!isset($_SESSION['log']))
//        echo "ERROR: Brak sesji użytkownika. Prosze wcisnąć F5";
}
