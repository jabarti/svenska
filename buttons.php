<!--﻿<div class="guziki"> -->
<?php
if(isset($_SESSION['role'])){
    $usr_role = $_SESSION['role'];
    echo '<div class="guziki">';
}else{
    $usr_role = '';
}
        
//        echo "<br>".__FILE__.__LINE__." ROLE:".$_SESSION['role'];
//        echo "<br>user:".$_SESSION['user'];
//        echo "<br>userRole:".$usr_role;
        
switch ($usr_role){
    case 'admin':
?>                 
        <a href="../" class="myButton"><?php echo t("Do")." ".t("StronyGłownej_btn");; ?></a><br>
<!--        =================-->
        <a href="#" class="myButton2" id="coreButt"><?php echo t("coreButton");; ?></a><br>
        <div id="core">
            <a href="index.php" class="myButton"><?php echo t("Do")." ".t("Insertera_btn"); ?></a><br>
            <a href="Edit.php" class="myButton"><?php echo t("Do")." ".t("Edycji_btn"); ?></a><br>
            <a href="motsatsen.php" class="myButton"><?php echo t("Do")." ".t("Przeciwienstw_btn"); ?></a><br>
            <a href="synonymer.php" class="myButton"><?php echo t("Do")." ".t("Synonimow_btn"); ?></a><br>                    
            <a href="test.php" class="myButton"><?php echo t("Do")." ".t("testu_btn"); ?></a><br>
            <a href="show.php" class="myButton"><?php echo t("Do")." ".t("Show/Printer_btn"); ?></a>
        </div>

        <a href="#" class="myButton2" id="admButt"><?php echo t("admButton");; ?></a><br>
        <div id="admin">                    
            <a href="help_test_admin.php" class="myButton"><?php echo t("Do")." ".t("help_test_admin_btn"); ?></a><br>
            <a href="ShowRandomStats.php" class="myButton"><?php echo t("Do")." ".t("ShowRandomStats_btn"); ?></a><br>
            <a href="UserAdmin.php" class="myButton"><?php echo t("Do")." ".t("UserAdmin_btn"); ?></a><br>
            <a href="LogShow.php" class="myButton"><?php echo t("Do")." ".t("ShowLogs_btn"); ?></a><br>
            <a href="http://www.bartilevi.pl/translation_interface.php" class="myButton"><?php echo t("Do")." ".t("Translation_btn"); ?></a><br>
        =================
            <a href="try.php" class="myButton"><?php echo t("Do")." ".t("Try_btn"); ?> </a><br>
        =================
            <a href="check_php_inf.php" class="myButton"><?php echo t("Do")." ".t("check_php_inf_btn"); ?></a><br>            
        </div>

        <a href="#" class="myButton2" id="usrAdmButt"><?php echo t("usrAdmButton");; ?></a><br>
        <div id="usrAdmin">  
            <a href="EditUserByUser.php" class="myButton"><?php echo t("Do")." ".t("Edycja danych użytkownika"); ?></a><br>
            <a href="mail.php" class="myButton"><?php echo t("Mail do Admina"); ?></a><br>
        </div>
<?php
    break;
    case 'user_plus':
?>                 
        <a href="../" class="myButton"><?php echo t("Do")." ".t("StronyGłownej_btn");; ?></a><br>
<!--        =================-->
        <a href="#" class="myButton2" id="coreButt"><?php echo t("coreButton");; ?></a><br>
        <div id="core">
            <a href="index.php" class="myButton"><?php echo t("Do")." ".t("Insertera_btn"); ?></a><br>
            <a href="Edit.php" class="myButton"><?php echo t("Do")." ".t("Edycji_btn"); ?></a><br>
            <a href="motsatsen.php" class="myButton"><?php echo t("Do")." ".t("Przeciwienstw_btn"); ?></a><br>
            <a href="synonymer.php" class="myButton"><?php echo t("Do")." ".t("Synonimow_btn"); ?></a><br>                    
            <a href="test.php" class="myButton"><?php echo t("Do")." ".t("testu_btn"); ?></a><br>
            <a href="show.php" class="myButton"><?php echo t("Do")." ".t("Show/Printer_btn"); ?></a>
        </div>

        <a href="#" class="myButton2" id="admButt"><?php echo t("admButton");; ?></a><br>
        <div id="admin">                    
            <a href="LogShow.php" class="myButton"><?php echo t("Do")." ".t("ShowLogs_btn"); ?></a><br>
            <a href="http://www.bartilevi.pl/translation_interface.php" class="myButton"><?php echo t("Do")." ".t("Translation_btn"); ?></a><br>       
        </div>

        <a href="#" class="myButton2" id="usrAdmButt"><?php echo t("usrAdmButton");; ?></a><br>
        <div id="usrAdmin">  
            <a href="EditUserByUser.php" class="myButton"><?php echo t("Do")." ".t("Edycja danych użytkownika"); ?></a><br>
            <a href="mail.php" class="myButton"><?php echo t("Mail do Admina"); ?></a><br>
        </div>
<?php        
    break;
    case 'user':
?>                 
        <a href="../" class="myButton"><?php echo t("Do")." ".t("StronyGłownej_btn");; ?></a><br>
<!--        =================-->
        <a href="#" class="myButton2" id="coreButt"><?php echo t("coreButton")."&#8628;"; ?></a><br>
        <div id="core">
            <a href="index.php" class="myButton"><?php echo t("Do")." ".t("Insertera_btn"); ?></a><br>
            <a href="Edit.php" class="myButton"><?php echo t("Do")." ".t("Edycji_btn"); ?></a><br>
<!--            <a href="motsatsen.php" class="myButton"><?php echo t("Do")." ".t("Przeciwienstw_btn"); ?></a><br>-->
            <a href="synonymer.php" class="myButton"><?php echo t("Do")." ".t("Synonimow_btn"); ?></a><br>                    
            <a href="test.php" class="myButton"><?php echo t("Do")." ".t("testu_btn"); ?></a><br>
            <a href="show.php" class="myButton"><?php echo t("Do")." ".t("Show/Printer_btn"); ?></a>
        </div>

        <a href="#" class="myButton2" id="usrAdmButt"><?php echo t("usrAdmButton");; ?></a><br>
        <div id="usrAdmin">  
            <a href="EditUserByUser.php" class="myButton"><?php echo t("Do")." ".t("Edycja danych użytkownika"); ?></a><br>
            <a href="mail.php" class="myButton"><?php echo t("Mail do Admina"); ?></a><br>
        </div>
<?php            
    break;
            
    case 'visitor':
?>                 
        <a href="../" class="myButton"><?php echo t("Do")." ".t("StronyGłownej_btn");; ?></a><br>
<!--        =================-->
        <a href="#" class="myButton2" id="coreButt"><?php echo t("coreButton");; ?></a><br>
        <div id="core">               
            <a href="test.php" class="myButton"><?php echo t("Do")." ".t("testu_btn"); ?></a><br>
            <a href="show.php" class="myButton"><?php echo t("Do")." ".t("Show/Printer_btn"); ?></a>
        </div>

        <a href="#" class="myButton2" id="usrAdmButt"><?php echo t("usrAdmButton");; ?></a><br>
        <div id="usrAdmin">  
            <a href="mail.php" class="myButton"><?php echo t("Mail do Admina"); ?></a><br>
        </div>
<?php          
    break;
} // END switch
if($REMOTE_ADDR){
    echo "<br><span style='font-size:10px'>mobile useragent1: ".$useragent."</span>";
}

if(isset($_SESSION['role'])){      
?>
</div>
<?php
}
include 'rozdzielacz.php';
