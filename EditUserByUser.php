<?php

/****************************************************
 * Project:     Svenska
 * Filename:    EditUserByUser.php
 * Encoding:    UTF-8
 * Created:     2015-02-21
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
require_once 'common.inc.php';
include 'DB_Connection.php';
include 'divLog.php';
$title = 'Svenska | Edit User Data';
include 'header.php';
include 'buttons.php';

//foreach ($_SESSION as $k => $v){
//    echo "<br>$k => $v";
//}

$User = new User();
$dataRow = $User->getUsersDataForEditByUser($_SESSION['user']);

//var_dump($dataRow);
?>
<form id="EditUserForm" action="EditUserByUserMOD.php" method="post">
    <table class='table_log'>
<?php
    $i=0;
    $n = 4;
        foreach($dataRow as $k => $v){
            $j=$i%$n;
            if($j == 0){         // 4 kolumny w tabeli EDIT
                echo "<tr>";
            }
            
            switch($k){
                case 'id':
                case 'user':
                case 'rola':
                    echo "<td>".t($k)."</td><td ><input type='text' class='UsrAdm_grey' name='$k' value='$v' readonly></td>";  
                    break;
                case 'data':
                    
                    continue;
//                    echo "<td>".t($k)."</td><td><input type='text' name='$k' value='$v' readonly></td>";  
                    break;
                default:
                    echo "<td>".t($k)."</td><td><input type='text' name='$k' value='$v'></td>";  
                    break;
            }
            
            if($j == ($n-1)){
                echo "</tr>";
            }
            $i++;
        }
        echo "<tr><td colspan='".(2*$n-1)."'></td><td><input type='submit' value='".t("Edytuj dane")."'></td></tr>";
?>          
  <tr>
      <td colspan=4><u><b><?php echo t("Download files");?>:</b></u></td>
      <td colspan=4></td>
  </tr>
    <tr>
      <td colspan=4><span class='fileldDescrBlu'>(<?php echo t("Potrzebne do szyfrowania algorytmem RSA");?>)</span></td>
      <td colspan=4></td>
  </tr>
  <tr>
      <td colspan=4><a href="Resources/Pari/RSAPassword/RSAPassword.zip" download>RSAPassword</a></td>
  </tr>
  <tr>
      <td colspan=4><a href="Resources/Pari/Pari-2-7-2.exe" download>Pari-2-7-2.exe</a></td>
  </tr>
  <tr>
      <td colspan=4></td>
      <?php if(isset($_GET['comm'])){ ?>
      <td colspan=4><span class='green'><?php echo t($_GET['comm']); ?></span></td>
      <?php } ?>
  </tr>
    </table>
</form>
<?php
