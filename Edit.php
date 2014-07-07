<?php

/* * **************************************************
 * Project:     ZZZProba
 * Filename:    Edit.php
 * Encoding:    UTF-8
 * Created:     2014-06-26
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
ob_start(); // żeby sie dało reloadeować

require_once "common.inc.php";
include 'DB_Connection.php';
$title = 'Edit';
include 'header.php';
//include 'flag.php';
include 'buttons.php';
?>
<script>
function Menu(){
    location.href="#menu";
}
</script>    
    
<?php

$SQL = sprintf("SELECT * FROM `ord`;");
$mq = mysql_query($SQL);
$mq2 = mysql_query($SQL);
$i=0;
$li=0;

echo "<div id=menu>";
echo "<table>";
while($row2 = mysql_fetch_assoc($mq2)){
    if($li%5==0){
            echo "<tr>";
    }
    echo "<td><a href='#ord_".$li."'>".$row2['id_ord']."=>".$row2['trans']."</a></td>";
//    if ($li == 40) break;
    if($li%5==4){
            echo "</tr>";
    }
    $li++;
}
echo "</table>";
echo "</div>";

echo "<br>DUPA<br>";
$method='post';
$id = 0;

while($row = mysql_fetch_assoc($mq)){
    
    echo "<table id ='ord_".$id."'>";
    echo "<form method=".$method." action=Edit.php >";
    $j=0;
    foreach($row as $k=>$v){

        if($j%4==0){
            echo "<tr>";
        }
        
        echo "<td>".$k."</td><td><input name=".$k." value='".$v."'></td>";
        
        if($j%4==3){
            echo "</tr>";
        }     
    $j++;    
    }
        echo "<tr> <td colspan=6></td>
                    <td>
                        <button onclick='Menu();'>Menu</button>
                        <input type=submit name=edit value=Edit>
                        <input type=submit name=delete value=DELETE>
                    </td>
              </tr>
        </form>
        </table>";    
        
    $i++; $id++;
}

if(isset($_POST)){
    ?><script>//alert("w isset $_POST");</script><?php
    if(isset($_POST['edit'])){
//        ?><script>alert("w $_POST['edit']!=null");</script><?php
        $serial = serialize($_POST);
        print_r($serial);
        $serial=  unserialize($serial);
        print_r($serial);
    
        $sql_text = "UPDATE `ord` SET ";
        $id = '';
        $id_ord = '';
//        echo  '<br>1) '.$sql_text;
        foreach ($serial as $k=>$v){
//        echo "<br>".$k."=>".$v;
            switch($k){
                case 'edit':
                    break;
                case 'id':
                    $id = $v;
                    break;
                case 'id_ord':
                    $id_ord = $v;
                    break;
                case 'wymowa':
                    $sql_text .= "`".$k."`='".$v."'";
                    break;
                default:
                    $sql_text .= "`".$k."`='".$v."',";
                    break;
            }
        }
        $sql_text .= " WHERE id='".$id."' AND id_ord='".$id_ord."';";
        echo '<br>SQL: '.$sql_text;

        if( mysql_query($sql_text)){
            ?><script>//alert("WESZŁO");</script><?php
            header("Location: Edit.php");
        }else{
            ?><script>//alert("NIE WESZŁO");</script><?php
        }
    
//    $Word = new Ord();
//    $Word->setData($id_ord, $typ, $rodzaj, $trans, $infinitive, $presens, $past, $supine, $imperative, $present_participle, $past_participle, $S_indefinite, $S_definite, $P_indefinite, $P_definite, $wymowa);
    
    }
    elseif(isset($_POST['delete'])){
//        ?><script>alert("w $_POST['delete']!=null");</script><?php
        $serial = serialize($_POST);
        print_r($serial);
        $serial=  unserialize($serial);
        print_r($serial);
    
        $sql_text = "DELETE FROM `ord` ";
        $id = '';
        $id_ord = '';
//        echo  '<br>1) '.$sql_text;
        foreach ($serial as $k=>$v){
//        echo "<br>".$k."=>".$v;
            switch($k){
                case 'edit':
                    break;
                case 'id':
                    $id = $v;
                    break;
                case 'id_ord':
                    $id_ord = $v;
                    break;
                case 'wymowa':
//                    $sql_text .= "`".$k."`='".$v."'";
                    break;
                default:
//                    $sql_text .= "`".$k."`='".$v."',";
                    break;
            }
        }
        $sql_text .= " WHERE `ord`.`id` ='".$id."' AND id_ord='".$id_ord."';";
        echo '<br>SQL: '.$sql_text;

        if( mysql_query($sql_text)){
            ?><script>//alert("Skasowało");</script><?php
            header("Location: Edit.php");
        }else{
            ?><script>//alert("NIE skasowało");</script><?php
        }
    
//    $Word = new Ord();
//    $Word->setData($id_ord, $typ, $rodzaj, $trans, $infinitive, $presens, $past, $supine, $imperative, $present_participle, $past_participle, $S_indefinite, $S_definite, $P_indefinite, $P_definite, $wymowa);
    
    }
}
ob_end_flush();  // żeby sie dało reloadeować