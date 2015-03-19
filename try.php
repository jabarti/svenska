<?php
/****************************************************
 * Project:     Svenska
 * Filename:    try.php
 * Encoding:    UTF-8
 * Created:     2015-02-23
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | '.t('Try');
include 'header.php';
include 'buttons.php';
?>

<!--<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>-->

<!--if($_POST['file_title'] && $_POST['define_type_id'] && $_POST['connection_type_id'])-->

<h2>Please provide the following information:</h2>
<form action='upload.php' enctype="multipart/form-data" method="post">
<input name="MAX_FILE_SIZE" type="hidden" value="5000000" />

File 
<input name="file" type="file" /><br>
<input name="submit" type="submit" value="Upload File" /><br>
</form>

