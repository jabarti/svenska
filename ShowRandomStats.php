<?php

/****************************************************
 * Project:     Svenska
 * Filename:    ShowRandomStats.php
 * Encoding:    UTF-8
 * Created:     2014-08-02
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | ShowRandomStats';
include 'header.php';
include 'buttons.php';
include 'rozdzielacz.php';
?>
<button id="del_rand_stats">Usuń WSZYSTKIE rekordy z Random!</button>
<?php
$Rand = new Random();
$Rand->getAllToTable();
$Rand->getCountWordToTable();
$Rand->getMaxWordToTable();


