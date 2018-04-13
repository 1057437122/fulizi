<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

if( !function_exists('get_cache')){
	function get_cache($cache_name){
		switch($cache_name){
			case 'wechat_key':
				break;
			default:
				return Cache::get($cache_name);
		}
	}
}
if( !function_exists('set_cache')){
	function set_cache($cache_name,$data,$forever = 1){
		Cache::forever($cache_name,$data);
	}
}

if( !function_exists('http_get') ){
	function http_get($url){
		$curl      = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, FALSE);
		curl_setopt($curl, CURLOPT_NOBODY, FALSE);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, FALSE);
		$data = curl_exec($curl);
		// curl_exec($curl);
		$httpCode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
		curl_close($curl);
	    return $httpCode;
	}
}
if( !function_exists('http_post') ){
	function http_post($url,$data){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close ( $ch );
		return $result;
	}
}
if( ! function_exists('timestamp_date') ){
	function timestamp_date($date,$flag='start'){
		$split_date = explode('-',$date);
		if($flag=='start'){
			$date= mktime(0,0,0,$split_date[1],$split_date[2],$split_date[0]);
		}else{
			$date= mktime(23,59,59,$split_date[1],$split_date[2],$split_date[0]);
		}
		return $date;
	}
}

if( ! function_exists('mylog') ){
	function mylog($data_str_to_log){
		if(is_array($data_str_to_log)) $data_str_to_log = 'ARRAY:'.json_encode($data_str_to_log);
		if(is_object($data_str_to_log)) $data_str_to_log = 'OBJECT:'.json_encode($data_str_to_log);
		Log::debug(date('H:i:s',time()).' --- '.$data_str_to_log);
	}
}