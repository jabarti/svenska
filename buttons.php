<div class="guziki">
<!--	<a href="../../" class="myButton">localhost</a>
	<a href='../' class="myButton">Do ParentDir</a>
	====================
	<a href="index.php" class="myButton">Do Insertera.php</a>
	<a href="test.php" class="myButton">Do testu</a>
	<a href="Edit.php" class="myButton">Do Edycji</a>
	<a href="show.php" class="myButton">Do Show/Printer.php</a>-->
        <?php
//        echo "test1";
//        echo "<br>".t("jestem tu").": ".__LINE__;
//        echo "test2";
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
        }else{
            $user = "nouser";
        }
        
        if(isset($_SESSION['role'])){
            $usr_role = $_SESSION['role'];
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
                    <a href="test.php" class="myButton"><?php echo t("Do"); ?> testu</a><br>
                    <a href="Edit.php" class="myButton"><?php echo t("Do"); ?> Edycji</a><br>
                    <a href="show.php" class="myButton"><?php echo t("Do"); ?> Show/Printer</a><br>
                    <a href="motsatsen.php" class="myButton"><?php echo t("Do")." ".t("Przeciwieństw"); ?> </a><br>
                    <a href="synonymer.php" class="myButton"><?php echo t("Do")." ".t("Synonimów"); ?> </a><br>
                    <a href="help_test_admin.php" class="myButton"><?php echo t("Do"); ?> help_test_admin</a><br>
                    <a href="ShowRandomStats.php" class="myButton"><?php echo t("Do"); ?> ShowRandomStats</a><br>
                    <a href="UserAdmin.php" class="myButton"><?php echo t("Do")." ".t("UserAdmin"); ?></a><br>
                    <a href="mail.php" class="myButton"><?php echo t("Mail do Admina"); ?> </a><br>
                <?php
                break;
            case 'user_plus':
                ?>
                    <a href="../../" class="myButton">localhost</a>
                    <a href="../" class="myButton"><?php echo t("Do"); ?> ParentDir</a>
                    ====================
                    <a href="index.php" class="myButton"><?php echo t("Do"); ?> Insertera</a>
                    <a href="test.php" class="myButton"><?php echo t("Do"); ?> testu</a><br>
                    <a href="Edit.php" class="myButton"><?php echo t("Do"); ?> Edycji</a>
                    <a href="show.php" class="myButton"><?php echo t("Do"); ?> Show/Printer</a>
                    <a href="motsatsen.php" class="myButton"><?php echo t("Do")." ".t("Przeciwieństw"); ?> </a><br>
                    <a href="synonymer.php" class="myButton"><?php echo t("Do")." ".t("Synonimów"); ?> </a><br>
                    <a href="mail.php" class="myButton"><?php echo t("Mail do Admina"); ?> </a><br>
                <?php
                break;
            case 'user':
                ?>
                    <a href="../../" class="myButton">localhost</a>
                    <a href="../" class="myButton"><?php echo t("Do"); ?> ParentDir</a>
                    ====================
                    <a href="index.php" class="myButton"><?php echo t("Do"); ?> Insertera</a>
                    <a href="test.php" class="myButton"><?php echo t("Do"); ?> testu</a><br>
                    <a href="Edit.php" class="myButton"><?php echo t("Do"); ?> Edycji</a>
                    <a href="show.php" class="myButton"><?php echo t("Do"); ?> Show/Printer</a>
                    <a href="mail.php" class="myButton"><?php echo t("Mail do Admina"); ?> </a><br>
                <?php
                break;
            
            default:
                ?>
                    <a href="test.php" class="myButton"><?php echo t("Do"); ?> testu</a>
                    <a href="show.php" class="myButton"><?php echo t("Do"); ?> Show/Printer</a>
                    <a href="mail.php" class="myButton"><?php echo t("Mail do Admina"); ?> </a><br>
                <?php
                break;
        }
//        echo "<br>guziki władowane!"
        ?>
</div>

<?php
include 'rozdzielacz.php';
?>