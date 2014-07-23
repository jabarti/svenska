<?php

/****************************************************
 * Project:     Svenska
 * Filename:    functions.php
 * Encoding:    UTF-8
 * Created:     2014-07-16
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/

function trans($var){
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
            return "stopień rowny";
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
        case 'wyrazenie':
            return "wyrażenie";
            break;
        case '???':
            return "???";
            break;
        
        default:
            return "Brak słowa '".$var."' w słowniku!!!";
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