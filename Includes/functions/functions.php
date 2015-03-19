<?php

/****************************************************
 * Project:     Svenska
 * Filename:    functions.php
 * Encoding:    UTF-8
 * Created:     2014-07-16
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/

function trans($var){       // działa w test.php do tłumaczenia pytań -dlatego musi być szerzej ujęte~!
    switch($var){
        case 'id_ord':
            return "słowo PL";
            break;
        case 'typ':
            return "typ";
            break;
        case 'trans':
            return "słowo SE";
            break;
        case 'rodzaj':
            return "rodzajnik";
            break;
        case 'infinitive':
            return "bezokolicznik";
            break;
        case 'presens':
            return "cz.teraźniejszy";
            break;
        case 'past':
            return "cz.przeszły";
            break;
        case 'supine':
            return "supine(perfect), dokonany";
            break;
        case 'imperative':
            return "tryb rozkazujący";
            break;
        case 'pas_infinitive':
            return "bezokolicznik s.bierna";
            break;
        case 'pas_presens':
            return "cz.teraźniejszy s.bierna";
            break;
        case 'pas_past':
            return "cz.przeszły s.bierna";
            break;
        case 'pas_supine':
            return "supine(perfect), dokonany s.bierna";
            break;
        case 'pas_imperative':
            return "tryb rozkazujący s.bierna";
            break;
        case 'present_participle':
            return "imiesłów czynny(teraźniejszy)";
            break;
        case 'past_participle':
            return "imiesłów bierny(przeszły)";
            break;
        case 'S_indefinite':
            return "l.pojedyncza, r.nieokreślony";
            break;
        case 'S_definite':
            return "l.pojedyncza, r.określony";
            break;
        case 'P_indefinite':
            return "l.mnoga, r.nieokreślony";
            break;
        case 'P_definite':
            return "l.mnoga, r.określony";
            break;
        case 'neuter':
            return "rodzaj neutralny";
            break;
        case 'masculin':
            return "rodzaj męski";
            break;
        case 'plural':
            return "rodzaj ogólny, l.mnoga";
            break;
        case 'st_rowny':
            return "stopień równy";
            break;
        case 'st_wyzszy':
            return "stopień wyższy";
            break;
        case 'st_najwyzszy':
            return "stopień najwyższy";
            break;
        case 'noun':
            return "rzeczownik";
            break;
        case 'verb':
            return "czasownik";
            break;
        case 'hjalp_verb':
            return "czas. posiłkowy";
            break;
        case 'modal_verb':
            return "czas. modalny";
            break;
        case 'partikelverb':
            return "fraza czasownikowa";
            break;
        case 'reflexivaverb':
            return "czas. zwrotny";
            break;
        case 'adjective':
            return "przymiotnik";
            break;
        case 'adverb':
            return "przysłówek";
            break;
        case 'preposition':
            return "przyimek";
            break;
        case 'pronoun':
            return "zaimek";
            break;
        case 'conjunction':
            return "spójnik";
            break;
        case 'interjection':
            return "wykrzyknik";
            break;
        case 'numeral':
            return "liczebnik";
            break;
        case 'particle':
            return "partykuła";
            break;
        case 'glowny':
            return "liczebnik główny";
            break;
        case 'porzadkowy':
            return "liczebnik porządkowy";
            break;
        case 'wyrazenie':
            return "wyrażenie";
            break;
        case 'grupa':
            return "grupę";
            break;
        case '???':
            return "???";
            break;
        
        default:
            return "Brak słowa \"".$var."\" w słowniku!!!";
            break;
    }
}

function db_query($sql)
{
	$ret = @mysql_query($sql);
	
	if (!$ret)
		die('MySQL query failed: '.$sql.' Error message: '.mysql_error());//,$sql,mysql_error());
	return $ret;
}

function triTrim($text){
    $text_fin = trim(trim(trim($text),","));
    $text_fin = str_replace("'"     ,"\"" , $text_fin);
    return $text_fin;
}


//function recursiveDelete($handle, $directory){   
//    echo $handle;
//    # here we attempt to delete the file/directory
//    if( !(@ftp_rmdir($handle, $directory) || @ftp_delete($handle, $directory)) )
//    {            
//        # if the attempt to delete fails, get the file listing
//        $filelist = @ftp_nlist($handle, $directory);
//        // var_dump($filelist);exit;
//        # loop through the file list and recursively delete the FILE in the list
//        foreach($filelist as $file) {            
//            recursiveDelete($handle, $file);            
//        }
//        recursiveDelete($handle, $directory);
//    }
//}