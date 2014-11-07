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
        
        switch ($user){
            case 'Bartek':
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
                <?php
                break;
            case 'Anetka':
                ?>
                    <a href="../../" class="myButton">localhost</a>
                    <a href="../" class="myButton"><?php echo t("Do"); ?> ParentDir</a>
                    ====================
                    <a href="index.php" class="myButton"><?php echo t("Do"); ?> Insertera</a>
                    <a href="test.php" class="myButton"><?php echo t("Do"); ?> testu</a>
                    <a href="Edit.php" class="myButton"><?php echo t("Do"); ?> Edycji</a>
                    <a href="show.php" class="myButton"><?php echo t("Do"); ?> Show/Printer</a>
                <?php
                break;
            
            default:
                ?>
                    <a href="test.php" class="myButton"><?php echo t("Do"); ?> testu</a>
                    <a href="show.php" class="myButton"><?php echo t("Do"); ?> Show/Printer</a>
                <?php
                break;
        }
//        echo "<br>guziki władowane!"
        ?>
</div>