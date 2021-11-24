<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function soal_1()
    {
    	$nilai = "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";

    	$explode = explode(' ', $nilai);

    	$jml_nilai = count($explode);
    	$sum_nilai = array_sum($explode);
    	$temp_high = [];
    	$max = max($explode);
    	$min = min($explode);

    	for ($i=0; $i <=$jml_nilai ; $i++) { 
    		if (in_array($max, $explode)) {
    			array_push($temp_high, $max);

    		}
       	}

    	$rata_rata = $sum_nilai/$jml_nilai;


    	echo 'Nilai Rata-rata = '.$rata_rata."</br>"."Nilai Tertingi = ".$max."</br>"."Nilai Terendah = ".$min;
    }

    public function soal_2()
    {

    	$string = 'TranSISI';

    	$explode = str_split($string);
    	$jumlah = count($explode);
    	$huruf = 0;
    	for ($i=0; $i <$jumlah ; $i++) {

    		if (ctype_lower($explode[$i])) {
    			$huruf++;
    		}
    	}
    	return 'Jumlah Huruf Kecil Di '.$string.' adalah = '.$huruf;
    }

    public function soal_3()
    {
    	$string = 'Jakarta adalah ibukota negara Republik Indonesia';

    	$explode = explode(' ', $string);
    	$jumlah = count($explode);
    	$j = 0;
    	$k = 0;

    	for ($i=0; $i < 3 ; $i++) {
    		$gabung =  $explode[$j].' '.$explode[$j+1];
    		$bigram[$i] = $gabung;
    		$j++;
    		$j++;
    	}

    	for ($i=0; $i < 2 ; $i++) {
    		$gabung =  $explode[$k].' '.$explode[$k+1].' '.$explode[$k+2];
    		$trigram[$i] = $gabung;
    		$k++;
    		$k++;
    		$k++;
    	}

    	$unigram = join(',', $explode);
    	$gabung_bigram = join(',', $bigram);
    	$gabung_trigram = join(',', $trigram);

    	 echo"Unigram = ".$unigram."</br>"."Bigram = ".$gabung_bigram."</br>"."Trigram = ".$gabung_trigram;
    }
}
