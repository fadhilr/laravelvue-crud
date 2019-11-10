<?php
namespace App\Helpers;

class Rupiah {
    public static function getRupiah($value) {
        $format = "Rp " . number_format($value,2,',','.');
        return $format;
    }
    public static function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = \App\Helpers\Rupiah::penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = \App\Helpers\Rupiah::penyebut($nilai/10)." puluh". \App\Helpers\Rupiah::penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . \App\Helpers\Rupiah::penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = \App\Helpers\Rupiah::penyebut($nilai/100) . " ratus" . \App\Helpers\Rupiah::penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . \App\Helpers\Rupiah::penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = \App\Helpers\Rupiah::penyebut($nilai/1000) . " ribu" . \App\Helpers\Rupiah::penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = \App\Helpers\Rupiah::penyebut($nilai/1000000) . " juta" . \App\Helpers\Rupiah::penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = \App\Helpers\Rupiah::penyebut($nilai/1000000000) . " milyar" . \App\Helpers\Rupiah::penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = \App\Helpers\Rupiah::penyebut($nilai/1000000000000) . " trilyun" . \App\Helpers\Rupiah::penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
		}
    public static function terbilang($nilai) {
			if($nilai<0) {
				$hasil = "minus ". trim(\App\Helpers\Rupiah::penyebut($nilai));
			} else {
				$hasil = trim(\App\Helpers\Rupiah::penyebut($nilai));
			}     		
			return $hasil;
		}
}