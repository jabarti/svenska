<?php

/****************************************************
 * Project:     Svenska
 * Filename:    mul.php
 * Encoding:    UTF-8
 * Created:     2015-02-11
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
function Mul($Num1='0',$Num2='0') {
  // check if they're both plain numbers
  if(!preg_match("/^\d+$/",$Num1)||!preg_match("/^\d+$/",$Num2)) return(0);

  // remove zeroes from beginning of numbers
  for($i=0;$i<strlen($Num1);$i++) if(@$Num1{$i}!='0') {$Num1=substr($Num1,$i);break;}
  for($i=0;$i<strlen($Num2);$i++) if(@$Num2{$i}!='0') {$Num2=substr($Num2,$i);break;}

  // get both number lengths
  $Len1=strlen($Num1);
  $Len2=strlen($Num2);

  // $Rema is for storing the calculated numbers and $Rema2 is for carrying the remainders
  $Rema=$Rema2=array();

  // we start by making a $Len1 by $Len2 table (array)
  for($y=$i=0;$y<$Len1;$y++)
    for($x=0;$x<$Len2;$x++)
      // we use the classic lattice method for calculating the multiplication..
      // this will multiply each number in $Num1 with each number in $Num2 and store it accordingly
      @$Rema[$i++%$Len2].=sprintf('%02d',(int)$Num1{$y}*(int)$Num2{$x});

  // cycle through each stored number
  for($y=0;$y<$Len2;$y++)
    for($x=0;$x<$Len1*2;$x++)
      // add up the numbers in the diagonal fashion the lattice method uses
      @$Rema2[Floor(($x-1)/2)+1+$y]+=(int)$Rema[$y]{$x};

  // reverse the results around
  $Rema2=array_reverse($Rema2);

  // cycle through all the results again
  for($i=0;$i<count($Rema2);$i++) {
    // reverse this item, split, keep the first digit, spread the other digits down the array
    $Rema3=str_split(strrev($Rema2[$i]));
    for($o=0;$o<count($Rema3);$o++)
      if($o==0) @$Rema2[$i+$o]=$Rema3[$o];
      else @$Rema2[$i+$o]+=$Rema3[$o];
  }
  // implode $Rema2 so it's a string and reverse it, this is the result!
  $Rema2=strrev(implode($Rema2));

  // just to make sure, we delete the zeros from the beginning of the result and return
  while(strlen($Rema2)>1&&$Rema2{0}=='0') $Rema2=substr($Rema2,1);

  return($Rema2);
}



$A = 3685510180489787613330897129196648673136562595116403565598510264452947329395566014593900654304434204675719223639815061169485536596213350216174882533583191677823202859;
$B = 4252559861131278413101318902724387236419611435494817758067199739656050616979213934321920197357363365574308669117916630967924430715760203709065260443589;

$l5 = 15672852661341564052829416370793720779723874718852982674083397100929128783187176869620842991445883811495383605375697769546690535387794706307971938463810511569515551393626275478364907856998555575650395435348634225758917688608540678052011620243046147885322765308508554181590835696855128966016153323200359423495073020951;


echo "<br>iloczyn:".Mul($l1, $l2);
printf("  Mul(%s,%s); // %s\r\n",$A,$B,  Mul($A,$B));
printf("BCMul(%s,%s); // %s\r\n",$A,$B,BCMul($A,$B)); // build-in function

function terminal_mul($a, $b){
//    return (int) shell_exec('echo "'.$a.'*'.$b.'"|bc');
}

echo "<br> Mull=".terminal_mul($A, $B);

// $r    = mysql_query("Select @sum:=$A * $B");
// $sumR = mysql_fetch_row($r);
// $sum  = $sumR[0];
 
 echo "<br> SumMSQL=".$sum;

 $x = $A*$B;
 
 echo "<br>BIG=";var_dump($x);
 
//$abs1 = gmp_abs("274982683358");
//$abs2 = gmp_abs("-274982683358");
//
//echo gmp_strval($abs1) . "\n";
//echo gmp_strval($abs2) . "\n";
//
//$mul = gmp_mul($A, $B);
//echo gmp_strval($mul) . "\n";

//$path = "http://www.bartilevi.pl/Svenska/Includes/cpp/try1.exe";

$str = "nic";
try{
//  $str = shell_exec($path);    
} catch (Exception $ex) {
    echo "<br>EXCEPTION: ".$ex;
}
//try{
//  $str = system($str);    
//} catch (Exception $ex) {
//    echo "<br>EXCEPTION: ".$ex;
//}

echo "<br>STR form cpp file = $str";

//$WshShell = new COM("WScript.Shell"); 
//$oExec = $WshShell->Run("notepad.exe", 7, true); 

        function exec_enabled() {
            $disabled = explode(', ', ini_get('disable_functions'));
            return !in_array('exec', $disabled);
        }
        echo "<br>IS EXEC ENABLED?: ".exec_enabled();
        
//     $computername = "176.119.33.160";
//        $ip = gethostbyname($computername);
//        exec("ping ".$ip." -n 1 -w 90 && exit", $output);
//        echo "<br>Output:";
//        print_r($output);
//        
//        
////     $output = exec("www.bartilevi.pl/Svenska/Includes/cpp/try1");
//     $output = exec("Includes/cpp/try1.exe");
////     $output = exec("Includes\\cpp\\try1.exe");");
//     $path1 = 'find /usr -name "try1"';
//     $output2 = exec($path2);
//     echo "<br>OUTPUT (DZIAŁA???):".$output;
//     echo "<br>OUTPUT2 (DZIAŁA???):".$output2;
