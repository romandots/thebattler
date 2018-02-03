<?php

if ( ! function_exists('mb_ucfirst'))
{
	function mb_ucfirst($string, $encoding = 'utf-8')
	{
		$strlen = mb_strlen($string, $encoding);
		$firstChar = mb_substr($string, 0, 1, $encoding);
		$then = mb_substr($string, 1, $strlen - 1, $encoding);
		return mb_strtoupper($firstChar, $encoding) . $then;
	}
}

// падеж
if ( ! function_exists('pad'))
{
	function pad($string, $pad = 'именительный', $sex = null )
	{
		return \morphos\Russian\name($string, $pad, $sex);
	}
}

if ( ! function_exists('phone_format'))
{
	function valid_phone($number = '')
	{
		return (bool) preg_match("/(\d)(\d{3})(\d{3})(\d{2})(\d{2})/", $number);
	}
	function phone_format($number = '')
	{
		if($formatted = phone_unformat($number)){
			$formatted = preg_replace("/(\d)(\d{3})(\d{3})(\d{2})(\d{2})/", "+7-\\2-\\3-\\4-\\5", $formatted);
			return $formatted;
		} else {
			return $number;
		}
	}
	function phone_unformat($number = '')
	{
		$number = '7' . substr(  preg_replace("/\D/", "", $number) , 1, 11);
		if(strlen($number) < 11){
			return '';
		} else {
			return ($number != 0 ? $number : '');
		}
	}
}

if ( ! function_exists('declension'))
{
	function declension($int, $expressions, $showint = true) {
		settype($int, "integer");
		$count = $int % 100;
		if ($count >= 5 && $count <= 20) {
			$result = ($showint? $int." ":"").$expressions['2'];
		} else {
			$count = $count % 10;
			if ($count == 1) {
				$result = ($showint? num_for($int)." ":"").$expressions['0'];
			} elseif ($count >= 2 && $count <= 4) {
				$result = ($showint? num_for($int)." ":"").$expressions['1'];
			} else {
				$result = ($showint? num_for($int)." ":"").$expressions['2'];
			}
		}
		return $result;
	}
}

if ( ! function_exists('rub') && function_exists('declension'))
{
	function rub($int) {
		return num_for($int).' '.declension($int, ['рубль','рубля','рублей'], false);
	}
}

if ( ! function_exists('auto_asset') && function_exists('asset'))
{
	function auto_asset($asset) {
		return env('APP_SECURE') ? secure_asset($asset) : asset($asset);
	}
}

if ( ! function_exists('auto_url') && function_exists('secure_url'))
{
	function auto_url($asset) {
		return env('APP_SECURE') ? secure_url($asset) : url($asset);
	}
}

