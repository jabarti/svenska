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
                    <a href="../../" class="myButton">localhost</a><br>
                    <a href="../" class="myButton"><?php echo t("Do"); ?> ParentDir</a><br>
                    =================
                    <a href="index.php" class="myButton"><?php echo t("Do"); ?> Insertera</a><br>
                    <a href="Edit.php" class="myButton"><?php echo t("Do"); ?> Edycji</a><br>
                    <a href="help_test_admin.php" class="myButton"><?php echo t("Do"); ?> help_test_admin</a><br>
                    <a href="ShowRandomStats.php" class="myButton"><?php echo t("Do"); ?> ShowRandomStats</a><br>
                    <a href="UserAdmin.php" class="myButton"><?php echo t("Do")." ".t("UserAdmin"); ?></a><br>
                    <a href="motsatsen.php" class="myButton"><?php echo t("Do")." ".t("Przeciwieństw"); ?> </a><br>
                    <a href="synonymer.php" class="myButton"><?php echo t("Do")." ".t("Synonimów"); ?> </a><br>                    
                    <a href="test.php" class="myButton"><?php echo t("Do"); ?> testu</a><br>
                    <a href="show.php" class="myButton"><?php echo t("Do"); ?> Show/Printer</a>
                    <a href="EditUserByUser.php" class="myButton"><?php echo t("Do")." ".t("Edycja danych użytkownika"); ?></a><br>
                    <a href="mail.php" class="myButton"><?php echo t("Mail do Admina"); ?> </a><br>
                    <a href="LogShow.php" class="myButton"><?php echo t("Do")." ".t("Show Logs"); ?> </a><br>
                    <a href="http://www.bartilevi.pl/translation_interface.php" class="myButton"><?php echo t("Do")." Translation"; ?> </a><br>
                    =================
                    <a href="try.php" class="myButton"><?php echo t("Do")." Try"; ?> </a><br>
                    =================
                    <a href="check_php_inf.php" class="myButton"><?php echo t("Do")." check_php_inf.php"; ?> </a><br>
                    
                <?php
                break;
            case 'user_plus':
                ?>
                    <a href="../../" class="myButton">localhost</a>
                    <a href="../" class="myButton"><?php echo t("Do"); ?> ParentDir</a>
                    ====================
                    <a href="index.php" class="myButton"><?php echo t("Do"); ?> Insertera</a>
                    <a href="Edit.php" class="myButton"><?php echo t("Do"); ?> Edycji</a>
                    <a href="motsatsen.php" class="myButton"><?php echo t("Do")." ".t("Przeciwieństw"); ?> </a><br>
                    <a href="synonymer.php" class="myButton"><?php echo t("Do")." ".t("Synonimów"); ?> </a><br>
                    <a href="test.php" class="myButton"><?php echo t("Do"); ?> testu</a><br>
                    <a href="show.php" class="myButton"><?php echo t("Do"); ?> Show/Printer</a>
                    <a href="EditUserByUser.php" class="myButton"><?php echo t("Do")." ".t("Edycja danych użytkownika"); ?></a><br>
                    <a href="mail.php" class="myButton"><?php echo t("Mail do Admina"); ?> </a><br>
                    <a href="LogShow.php" class="myButton"><?php echo t("Do")." ".t("Show Logs"); ?> </a><br>
                    <a href="try.php" class="myButton"><?php echo t("Do")." Try"; ?> </a><br>
                <?php
                break;
            case 'user':
                ?>
                    <a href="../../" class="myButton">localhost</a>
                    <a href="../" class="myButton"><?php echo t("Do"); ?> ParentDir</a>
                    ====================
                    <a href="index.php" class="myButton"><?php echo t("Do"); ?> Insertera</a>
                    <a href="Edit.php" class="myButton"><?php echo t("Do"); ?> Edycji</a>
                    <a href="test.php" class="myButton"><?php echo t("Do"); ?> testu</a><br>
                    <a href="show.php" class="myButton"><?php echo t("Do"); ?> Show/Printer</a>
                    <a href="EditUserByUser.php" class="myButton"><?php echo t("Do")." ".t("Edycja danych użytkownika"); ?></a><br>
                    <a href="mail.php" class="myButton"><?php echo t("Mail do Admina"); ?> </a><br>
                <?php
                break;
            
            case 'visitor':
                ?>
                    <a href="test.php" class="myButton"><?php echo t("Do"); ?> testu</a>
                    <a href="show.php" class="myButton"><?php echo t("Do"); ?> Show/Printer</a>
                    <!--<a href="EditUserByUser.php" class="myButton"><?php echo t("Do")." ".t("Edycja danych użytkownika"); ?></a><br>-->
                    <a href="mail.php" class="myButton"><?php echo t("Mail do Admina"); ?> </a><br>
                <?php
                break;
        }
//        echo "<br>guziki władowane!"

if(isset($_SESSION['role'])){      
?>
</div>
<?php
}
include 'rozdzielacz.php';
?>