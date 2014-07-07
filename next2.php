<?php

/* * **************************************************
 * Project:     ZZZProba
 * Filename:    next2.php
 * Encoding:    UTF-8
 * Created:     2014-06-25
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
require_once "common.inc.php";
include 'DB_Connection.php';
$title = 'next2';
include 'header.php';
//include 'flag.php';
include 'buttons.php';

$array= array ( 'value1', 'value2');  
$serializedArray= serialize($array); #serializacja tablicy  
$unserializedArray= unserialize($serializedArray); #deserializaja  
print_r($serializedArray); 
echo '<br>';

print_r($unserializedArray); 

echo '<br>=========================================<br>';

class Serialization {  
    private $field;  
  
    /** 
     * Zapisuje zmienna 
     */  
    public function setField($value) {  
        $this->field= $value;  
    }  
  
    /** 
     * Zwraca zmienna 
     */  
    public function getField() {  
        return $this->field;  
    }  
}  
  
$serialization= new Serialization(); #tworzymy obiekt  
$serialization->setField('value'); #przypisujemy polu wartość value  
$serializedObject= serialize($serialization); #serializujemy  
$unserializedObject= unserialize($serializedObject); #deserializujemy  
  
echo $serializedObject; #wyswietlamy objekt serializowany  
echo '<br>';
echo $unserializedObject->getField(); #wyswietlamy pole deserializowanego obiektu  

echo '<br>=========================================<br>';

$result = mysql_query("SHOW COLUMNS FROM `ord`");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
if (mysql_num_rows($result) > 0) {
    $i=0;
    $d=4;
    echo '<table>';
    echo '<form action=next2.php method=get>';
    while ($row = mysql_fetch_assoc($result)) {
        print_r($row); echo '<br>';
//        echo "(".$i."%".$d."=".($i%$d).")".$row['Field'].', ';
        if($i%$d==0){
            echo '<tr>';
//            echo "<td>".$row['Field']."</td>";
//            echo "<td><input name='".$row['Field']."'></td>";
        }
            echo "<td>".$row['Field']."</td>";
            echo "<td><input name='".$row['Field']."'></td>";

        
        if($i%($d)==3){
            echo '</tr>';
        }
        
//        echo $row['Field'].', ';
//        echo $row['Field']."<input name='".$row['Field']."'><br>";
        $i++;
    }
    echo '</table>';
    echo '<input type=submit>';
    
}

