<?php

// berfungsi untuk mengenkripsi teks yang diberikan
function encrypt($pswd, $text)
{
	// ubah kunci menjadi huruf kecil untuk kesederhanaan
	$pswd = strtolower($pswd);
	
	// inisialisasi variabel
	$code = "";
	$ki = 0;
	$kl = strlen($pswd);
	$length = strlen($text);
	
	// ulangi setiap baris dalam teks
	for ($i = 0; $i < $length; $i++)
	{
		// jika hurufnya alfa, enkripsilah
		if (ctype_alpha($text[$i]))
		{
			// huruf besar
			if (ctype_upper($text[$i]))
			{
				$text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("A")) % 26) + ord("A"));
			}
			
			// huruf kecil
			else
			{
				$text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("a")) % 26) + ord("a"));
			}
			
			// perbarui indeks kunci
			$ki++;
			if ($ki >= $kl)
			{
				$ki = 0;
			}
		}
	}
	
	// kembalikan kode terenkripsi
	return $text;
}

// berfungsi untuk mendekripsi teks yang diberikan
function decrypt($pswd, $text)
{
	// ubah kunci menjadi huruf kecil untuk kesederhanaan
	$pswd = strtolower($pswd);
	
	// inisialisasi variabel
	$code = "";
	$ki = 0;
	$kl = strlen($pswd);
	$length = strlen($text);
	
	// ulangi setiap baris dalam teks
	for ($i = 0; $i < $length; $i++)
	{
		// jika hurufnya alfa, dekripsi
		if (ctype_alpha($text[$i]))
		{
			// huruf besar
			if (ctype_upper($text[$i]))
			{
				$x = (ord($text[$i]) - ord("A")) - (ord($pswd[$ki]) - ord("a"));
				
				if ($x < 0)
				{
					$x += 26;
				}
				
				$x = $x + ord("A");
				
				$text[$i] = chr($x);
			}
			
			// huruf kecil
			else
			{
				$x = (ord($text[$i]) - ord("a")) - (ord($pswd[$ki]) - ord("a"));
				
				if ($x < 0)
				{
					$x += 26;
				}
				
				$x = $x + ord("a");
				
				$text[$i] = chr($x);
			}
			
			// perbarui indeks kunci
			$ki++;
			if ($ki >= $kl)
			{
				$ki = 0;
			}
		}
	}
	
	// kembalikan teks yang didekripsi
	return $text;
}

?>