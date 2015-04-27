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
$title = 'Svenska | '.t('Edit User Data');
include 'title.php';
include 'header.php';
include 'buttons.php';
include 'divLog.php';

//foreach ($_SESSION as $k => $v){
//    echo "<br>$k => $v";
//}

$UserED = new User();
$dataRow = $UserED->getUsersDataForEditByUser($_SESSION['user']);

//var_dump($dataRow);
?>
<form id="EditUserForm" action="EditUserByUserMOD.php" method="post" enctype="multipart/form-data">
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
    echo "          <tr><td colspan=8></td></tr>";
                    echo "<td>".t($k)."</td><td ><input type='text' class='UsrAdm_grey' name='$k' value='$v' readonly></td></tr>";
                    break;
                case 'user':
                case 'rola':
                    echo "<td>".t($k)."</td><td ><input type='text' class='UsrAdm_grey' name='$k' value='$v' readonly></td>";  
                    break;
                case 'PublicKey':
    echo "          <tr><td colspan=8>================</td></tr>";
                case 'PassCrypt':

    
    echo "          <tr>"
                    . "<td>".t('Old').": ".t($k)."<span class='fileldDescrBlu'>(".t('obecnie funkcjonujący').")</span></td>"
                    . "<td colspan=2><input size='40' class='UsrAdm_grey' value='".substr($v,0,35)."...' readonly></td>"
                        ."<td colspan=1></td>"
                    . "<td>".t($k)."<span class='fileldDescrBlu'>(".t('wygenerowany algorytmem RSA').")</span></td>"
                    . "<td colspan='3'><input name='file[]' type='file' value='".$v."' /><br></td></td>"
                ."</tr>";
                    
                    break;
                case 'data':
echo "          <tr><td colspan=8>================</td></tr>";
                    continue;
//                    echo "<td>".t($k)."</td><td><input type='text' name='$k' value='$v' readonly></td>";  
                    break;
                case 'password':
//                    echo "<td>".t($k)."</td><td><input type='text' name='$k' value='$v'>passs</td>";
                    continue;
//                    break;
                case 'email':
                    echo "<tr></tr>";
                default:
                    echo "<td>".t($k)."</td><td><input type='text' id='$k' name='$k' value='$v'></td>"; 
                    echo '<tr>
                            <td colspan="1"></td>
                            <td colspan="1"><div id="error'.$k.'" class="error"></div></td>
                          </tr>';
                    break;
            }
            
            if($j == ($n-1)){
                echo "</tr>";
            }
            $i++;
        }
        ?>
        <tr>
            <td><u><b><?php echo t('CHANGE_PASSWORD') ?></b></u></td>
            <td colspan ="5"></td>
        </tr>

        <tr>
            <td></td>
            <td><?php echo t('OLD_PASSWORD') ?></td>
            <!--<td><input type='password' id='pass_old' name='pass_old' value='<?php echo $dataRow['password'] /*Do usunięcia!!!!*/?>'></td>-->
            <td><input type='password' id='pass_old' name='pass_old' value=''></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="1"><div id="errorpass_old" class="error"></div></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo t('NEW_PASSWORD_1') ?></td>
            <td><input type='password' id='pass_new_1' name='pass_new_1' value=''></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="1"><div id="errorpass_new_1" class="error"></div></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo t('NEW_PASSWORD_2') ?></td>
            <td><input type='password' id='pass_new_2' name='pass_new_2' value=''></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="1"><div id="errorpass_new_2" class="error"></div></td>
        </tr>
        <tr><td colspan=8>================</td></tr>
        <?php
        echo "<tr><td colspan=3 ></td>";
            if(isset($_GET['comm'])){ ?>
                <td colspan="2"><span class='red'><b><?php echo t($_GET['comm']); ?></b></span></td>
        <?php }else{ ?>
                <!--<td colspan=4><span class='red'><b><?php //echo t($_GET['comm']); ?></b></span></td>-->
        <?php }
//        echo "<td colspan='".(2*$n-)."'></td><td><input type='submit' value='".t("Edytuj dane")."'></td></tr>";
        echo "<td></td><td><input type='submit' value='".t("Edytuj dane")."'></td></tr>";
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
      <td colspan=4><a href="Resources/Pari/RSAPassword/RSAPassword.zip" download>RSAPassword.zip</a></td>
  </tr>
  <tr>
      <td colspan=4><a href="Resources/Pari/Pari-2-7-2.exe" download>Pari-2-7-2.exe</a></td>
  </tr>
<!--  <tr>
      <td colspan=4></td>
      <?php if(isset($_GET['comm'])){ ?>
                <td colspan=4><span class='red'><b><?php //echo t($_GET['comm']); ?></b></span></td>
      <?php }else{ ?>
                <td colspan=4><span class='red'><b><?php //echo t($_GET['comm']); ?></b></span></td>
      <?php } ?>
  </tr>-->
    </table>
</form>
<?php
