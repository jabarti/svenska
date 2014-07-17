<div class="guziki">
	<a href="../../" class="myButton">localhost</a>
	<a href='../' class="myButton">Do ParentDir</a>
	====================
	<a href="index.php" class="myButton">Do Insertera.php</a>
	<a href="test.php" class="myButton">Do testu</a>
	<a href="Edit.php" class="myButton">Do Edycji</a>
	<a href="show.php" class="myButton">Do Show/Printer.php</a>
        <?php
        if($_SESSION['log'] == true && $_SESSION['user'] == 'Bartek'){ 
            echo '<a href="help_test_admin.php" class="myButton">Do help_test_admin.php</a>';
        }
        ?>
</div>