<?php

/* * **************************************************
 * Project:     ZZZProba
 * Filename:    show.php
 * Encoding:    UTF-8
 * Created:     2014-06-26
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
require_once 'common.inc.php';
include 'DB_Connection.php';
$title = 'Svenska | '.t("Show/printer");
include 'title.php';
include 'header.php';
include 'buttons.php';
include 'divLog.php'; 

// Do pracy: search
//include 'Search.php';
//
//echo "rola: ";var_dump($allowPages);
//var_dump($_SESSION);
if(isset($_SESSION['role']) && ($_SESSION['role']=='visitor' or $_SESSION['role']=='user')){
    $gosc = true;
//    echo $_SESSION['user']." / $gosc";
}else{
    $gosc = false;
}

//if($_SESSION['log'] == true && isset($_COOKIE['log'])){
if($_SESSION['log'] == true ){
    
$word = new Ord();
$czek ='';
$irreg = '';

if(isset($_POST['cz_mov'])){
//    echo "SET POST"; echo " / POST cz_mov = ".$_POST['cz_mov'];
//    echo "_POST['cz_mov']:".$_POST['cz_mov'];
    if($_POST['cz_mov']=='cz_mov'){
        $_SESSION['cz_mov'] = true;
    }
}else{
        $_SESSION['cz_mov'] = false;
}

if(isset($_POST['irreg'])){
//    echo "SET POST"; echo " / POST irreg = ".$_POST['irreg'];
//    echo "_POST['irreg']:".$_POST['irreg'];
    if($_POST['irreg']=='irreg'){
        $_SESSION['irreg'] = true;
    }
}else{
        $_SESSION['irreg'] = false;
}

if (isset($_SESSION['irreg']) && $_SESSION['irreg'] == true){
    ?><script>//alert("SESSION NOT SET!");</script><?php
//    if($_SESSION['irreg'] == true){
    $mr = $word->getDBAll();
//    $SQL = sprintf("SELECT * FROM `ord` WHERE (`grupa` = 'irregular' OR `grupa` = 'modal_verb') AND `typ` != 'noun';");
    $SQL = sprintf("SELECT * FROM `ord` WHERE (`grupa` = 'irregular' "
            . "OR `grupa`='verb:g4_starka' "
            . "OR `grupa`='verb:gr4_starka' "
            . "OR `grupa`='verb:gr4_oregel' "
            . "OR `typ` = 'modal_verb') AND `typ` != 'noun';");
    $irreg = 'checked';
//    }
}else{
    
    if(isset($_SESSION['cz_mov'])){
        ?><script>//alert("SESSION SET!");</script><?php
        if($_SESSION['cz_mov'] == true){
            ?><script>//alert("SESSION SET == TRUE!");</script><?php
            $mr = $word->getDBAllOrdByTyp();
            $SQL = sprintf("SELECT * FROM `ord` ORDER BY `typ`, `id_ord`;");
            $czek = 'checked';
        }else{
            ?><script>//alert("SESSION SET == FALSE!");</script><?php
            $mr = $word->getDBAll();

            // Tworzenie obsługi sortowania
            $DESC = "";
            if(isset($_GET['PLOrd_DIR']) AND $_GET['PLOrd_DIR'] !='' ){
                    ?><script> //alert ("<?php //echo $_GET['PLOrd_DIR'];?>") </script><?php
                    if ($_GET['PLOrd_DIR'] == "up"){
                        $DESC = "ORDER BY `id_ord` DESC";
                    }else{
                        $DESC = "ORDER BY `id_ord` ASC";
                    }
            }else 
            if(isset($_GET['TYP_DIR']) AND $_GET['TYP_DIR'] !='' ){
                    if ($_GET['TYP_DIR'] == "up"){
                        $DESC = "ORDER BY `typ` DESC";
                    }else{
                        $DESC = "ORDER BY `typ` ASC";
                    }        
            }else 
            if(isset($_GET['GRUP_DIR']) AND $_GET['GRUP_DIR'] !='' ){
                    if ($_GET['GRUP_DIR'] == "up"){
                        $DESC = "ORDER BY `grupa` DESC";
                    }else{
                        $DESC = "ORDER BY `grupa` ASC";
                    }        
            }else 
            if(isset($_GET['SEOrd_DIR']) AND $_GET['SEOrd_DIR'] !='' ){
                    if ($_GET['SEOrd_DIR'] == "up"){
                        $DESC = "ORDER BY `trans` DESC";
                    }else{
                        $DESC = "ORDER BY `trans` ASC";
                    }        
            }else 
            if(isset($_GET['ID_DIR']) AND $_GET['ID_DIR'] !='' ){
                    if ($_GET['ID_DIR'] == "up"){
                        $DESC = "ORDER BY `id` DESC";
                    }else{
                        $DESC = "ORDER BY `id` ASC";
                    }        
            }else 
            if(isset($_GET['SortKat']) AND $_GET['SortKat'] !='' ){

                        $DESC = "WHERE `kategoria` LIKE '%".$_GET['SortKat']."%';";
 
            }else{
                    ?><script> //alert ("<?php //echo "ERRR";?>") </script><?php
            }
            
            unset($_GET);

    
            // Główny SQL dla SHOW!!!
//            $SQL = sprintf("SELECT * FROM `ord` $DESC;");
            $SQL = "SELECT * FROM `ord` $DESC;";
//            $SQL = sprintf("SELECT * FROM `ord` WHERE `id` BETWEEN 10 AND 19 $DESC LIMIT 0 , 30;");
            ?><script> //alert ("<?php //echo $SQL;?>") </script><?php
    //        $czek ='';
        }
    }else{
        ?><script>//alert("SESSION NOT SET!");</script><?php
        $mr = $word->getDBAll();
        $SQL = sprintf("SELECT * FROM `ord`;");
    //    $czek ='';
    }

} // end of if (SESSION[irreg] -> else

//$mr = $word->getDBAll();
//$mr = $word->getAllArr();

//$SQL = sprintf("SELECT * FROM `ord`;");
//echo "<br>SQL: $SQL";
$mq = mysql_query($SQL);

$flat = false;
$cz_mov = false;

//if(isset($_POST['sub_flat'])){
if(isset($_POST['sub_flat_plaskie']) || isset($_POST['sub_flat_pelne'])){
//    echo "SET POST"; echo " / POST flat = ".$_POST['sub_flat_plaskie'];
//    echo "SET POST"; echo " / POST flat = ".$_POST['sub_flat_pelne'];
    if($_POST['sub_flat_plaskie']){
        $flat = true;
//        $flat_checked = "checked";
        $_SESSION['flat'] = true;
    }else if($_POST['sub_flat_pelne']){
        $flat = false;
//        $flat_checked = "";
        $_SESSION['flat'] = false;
    }
}else if($_SESSION['flat'] == true){
    $flat = true;
//    $flat_checked = "checked";
}else{
    $flat = false;
    $flat_checked = "";    
}

?>
<a name='first_th' /></a>
    
<form action="" method="post">
    <!--<input type="checkbox" name="flat" value="flat" <?php //echo $flat_checked; ?>><?php //echo t("płaskie").$flat; ?>?-->
    <br><?php
    ?>
    <!--<input type="submit" name=sub_flat value="<?php echo t("zobacz"); ?>">-->
    <?php
    if(!$flat){
        echo "<input type='submit' name='sub_flat_plaskie' value='".t("Zobacz płaskie")."'>";
    }else{
        echo "<input type='submit' name='sub_flat_pelne' value='".t("Zobacz pełne")."'>";
    }
    ?>
    

</form>    
<?php
//$flat = false;
//$cz_mov = false;
//
//if(isset($_POST['sub_flat'])){
////    echo "SET POST"; echo " / POST flat = ".$_POST['flat'];
//    if($_POST['flat']=='flat'){
//        $flat = true;
//    }
//}

echo "<a href='#first_th' class='ButtonShowUpToTop' style='position:fixed; top:15.5%; right:17%'><button >".t("up")."</button></a>";

//echo '<div id="dialogoverlay"></div>
//<div id="dialogbox">
//  <div>
//    <div id="dialogboxhead"></div>
//    <div id="dialogboxbody"></div>
//    <div id="dialogboxfoot"></div>
//  </div>
//</div>';

//echo "<button style='position:fixed; top:19.5%; right:17%' onclick=\"Confirm.render('Delete Post?','delete_post','post_1')\">Delete</button>";


echo "<table class='print' >";
echo "<thead>";
echo "  <tr>";

$sum = (!$flat and !$gosc);     // ograniczenie: jak jest gość nie ma linków!!!

echo "<form id='form_up_down' name='form_up_down'>";      // początek formy do góra, dół - przyciski w nagłówku tabeli

if($sum){
    echo "  <th>".t("Link")."</th>";  // <button name='".$v."_DIR' value='up' >&#8657;</button>
}
    echo "  <th style='min-width:45px;'>".t("L.p.")." 
                    <br><button type='submit' name='ID_DIR' value='down' class='narrow_button'>
                        <img src='Resources/img/arrow_down.png'  alt='&#8659;' />
                    </button>
                    <button type='submit' name='ID_DIR' value='up' class='narrow_button'>
                        <img src='Resources/img/arrow_up.png'  alt='&#8657;' />
                    </button>
            </th>
            <th >".t("Słowo PL")." 
                    <br><button type='submit' name='PLOrd_DIR' value='down' class='narrow_button'>
                        <img src='Resources/img/arrow_down.png'  alt='&#8659;' />
                    </button>
                    <button type='submit' name='PLOrd_DIR' value='up' class='narrow_button'>
                        <img src='Resources/img/arrow_up.png'  alt='&#8657;' />
                    </button>                    
                </th>
            <th style='/*min-width:105px;*/'>".t("Część mowy")." 
                    <br><button type='submit' name='TYP_DIR' value='down' class='narrow_button'>
                        <img src='Resources/img/arrow_down.png'  alt='&#8659;' />
                    </button>   
                    <button type='submit' name='TYP_DIR' value='up' class='narrow_button'>
                        <img src='Resources/img/arrow_up.png'  alt='&#8657;' />
                    </button>                    
                </th>
            <th >".t("Rodz.")."
                </th>
            <th >".t("Grupa")."
                    <br><button type='submit' name='GRUP_DIR' value='down' class='narrow_button'>
                        <img src='Resources/img/arrow_down.png'  alt='&#8659;' />
                    </button> 
                    <button type='submit' name='GRUP_DIR' value='up' class='narrow_button'>
                        <img src='Resources/img/arrow_up.png'  alt='&#8657;' />
                    </button>                    
                </th>
            <th style='/*min-width:95px;*/'>".t("Słowo SE")."
                    <br><button type='submit' name='SEOrd_DIR' value='down' class='narrow_button'>
                        <img src='Resources/img/arrow_down.png'  alt='&#8659;' />
                    </button>      
                    <button type='submit' name='SEOrd_DIR' value='up' class='narrow_button'>
                        <img src='Resources/img/arrow_up.png'  alt='&#8657;' />
                    </button>
                </th>
            <th >".t("Formy");
                if(!$flat){
                    echo "<br><button type='submit' class='btnKategory' name='SortKat' value=''>".t('Clean Categories')."</button>";
                }
           echo " </th>
        </tr>" ; 
//echo "</form>";
echo "</thead>";
          
while ($row = mysql_fetch_array($mq, MYSQL_ASSOC)){
//     echo "<tr><td colspan=6>";var_dump($row);echo "</td></tr>";
       echo "<tr>";
       $attr = 0;
       $ile_Liter = 8;
       foreach($row as $k => $v){
           if($attr < 6){
               if($attr == 0){
                   $id = $v;
//                   if(!$flat)
                   if($sum){
                        echo "<td><a name='ordAnchor_".$id."' href='Edit.php?sercz_id=".$id."' target=\"_blank\">=></a></td>";
                   }
                   echo "<td id=norm>".$v."</td>";         // wypełnia kolumny L.p., słowoPL itd
               }else{
                   echo "<td id=norm>".$v."</td>";         // wypełnia kolumny L.p., słowoPL itd
               }
           }else{
                if($attr==6 && $v!=''){
                    if(!$flat)
                        echo "<td id=szesc>".substr($k,0,$ile_Liter).": <span class=red>$v</span>,<br>";  // kolumna z info w trybie bez flat, pierwszy wiersz!!
                    else
                        echo "<td id=szesc>$v, ";   // kolumna z info Z FLATEM, 1-szy wyraz
                    }
                elseif($attr==6 && $v==''){
                    echo "<td id=szesc>";           // puste albo 1szy wyraz
                }
                elseif($attr==(count($row))){
                    echo "</td>";
                }
                elseif($v!='' && $k !='wymowa'){
                    if(!$flat){
                        if ( $k == "kategoria"){
                            
                            echo substr(t($k),0,$ile_Liter).": ";
                            $arrKat = explode(';', $v);
                            foreach($arrKat as $kat){
                                // wyświetla w SHOW, buttony kategorii do sortowania w kolumnie FORMY/FORMARNA
                                echo "<button type='submit' class='btnKategory' name='SortKat' value='".$kat."'>".t($kat)."</button>";  
                            }
                            echo "<br>";
//                            echo ": <span class=blue>$v</span>,<br>";
                            
                            continue;
                            
                        }else if ($k == "linki"){           // Tworzenie linków w uwagach;
                            echo substr(t($k."_ShKat"),0,$ile_Liter).": <span class=red>";
                            echo $word->MakeLinks($v, "#ordAnchor_");                       
                        }else{
                            echo substr(t($k."_ShKat"),0,$ile_Liter).": <span class=red>$v</span>,<br>";
                        }
                        
//                        if ( $k = "linki"){
//                            
//                        }
                    }else{
//                        if($k == "uwagi" || $k == "kategoria" ){
                        if($k == "uwagi" ){
                            echo "<br><span class=blue><b>".t($k)."</b></span>: $v, ";
                        }elseif ( $k != "kategoria"){
                            echo "$v, ";
                        }else{
                            continue;
                        }
                    }
                }else {
                    
                    continue;
                }
            }
            $attr++;  
       }
       echo "</tr>" ;
}
echo "</table>";

} else {
    require 'loger.php';
}