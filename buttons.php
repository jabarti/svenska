<div class="guziki">
<!--	<a href="../../" class="myButton">localhost</a>
	<a href='../' class="myButton">Do ParentDir</a>
	====================
	<a href="index.php" class="myButton">Do Insertera.php</a>
	<a href="test.php" class="myButton">Do testu</a>
	<a href="Edit.php" class="myButton">Do Edycji</a>
	<a href="show.php" class="myButton">Do Show/Printer.php</a>-->
        <?php
        switch ($_SESSION['user']){ 
            case 'Bartek':
                ?>
                    <a href="../../" class="myButton">localhost</a><br>
                    <a href="../" class="myButton">Do ParentDir</a><br>
                    =================
                    <a href="index.php" class="myButton">Do Insertera.php</a><br>
                    <a href="test.php" class="myButton">Do testu</a><br>
                    <a href="Edit.php" class="myButton">Do Edycji</a><br>
                    <a href="show.php" class="myButton">Do Show/Printer.php</a><br>
                    <a href="help_test_admin.php" class="myButton">Do help_test_admin.php</a><br>
                <?php
                break;
            case 'Anetka':
                ?>
                    <a href="../../" class="myButton">localhost</a>
                    <a href="../" class="myButton">Do ParentDir</a>
                    ====================
                    <a href="index.php" class="myButton">Do Insertera.php</a>
                    <a href="test.php" class="myButton">Do testu</a>
                    <a href="Edit.php" class="myButton">Do Edycji</a>
                    <a href="show.php" class="myButton">Do Show/Printer.php</a>
                <?php
                break;
            
            default:
                ?>
                    <a href="test.php" class="myButton">Do testu</a>
                    <a href="show.php" class="myButton">Do Show/Printer.php</a>
                <?php
                break;
        }
        ?>
</div>