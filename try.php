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
$title = 'Svenska | '.t('Try');
include 'title.php';
include 'header.php';
include 'buttons.php';
include 'divLog.php';
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

<script>
    
function escapeRegExp(string){
//  return string.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
}

function tryMe(){
    var text = document.getElementById("input_01").value
    
//    var regExPattern = /[a-z,A-Z]*([a|e][n|m|l|k|p]|[e])/g
    var regExPattern = /(?:ett|en)/
    var regExPattern2 = /([a-z,A-Z,ö,å,ä,Ö,Ä,Å]*)([e(?=l|r)|o(?=r)|?e])/

    pat = new RegExp(regExPattern)
    pat2 = new RegExp(regExPattern2)
    
    rodz = pat.exec(text)
    
    kon = 'et'
//    text = pat.exec(text)
    text = text.replace(pat2,("$2"+kon))
    
 
//    alert("text: "+text)
    document.getElementById("input_02").value = (rodz + text)
}    
    
    
</script>

<input type="text" id="input_01" value="abborre upp sig"></input>
<input type="text" id="input_02"></input>

<button id='button_01' type="button" onclick="tryMe();">KLIK!!!</button>
