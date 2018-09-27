<?php
namespace juanmicl\igcreator;

function randstring($lenght){
	return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lenght);
}

function curl_request($request, $url, $payload, $header){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		//CURLOPT_PROXY => $proxy,
		CURLOPT_URL => $url,
		CURLOPT_CUSTOMREQUEST => $request,
		CURLOPT_POSTFIELDS => http_build_query($payload),
		CURLOPT_HTTPHEADER => $header,
	));
	return curl_exec($curl);
}

class create {

	public function register($username, $password, $email, $firstname){

		$csfrtoken = randstring('32');

		$url = 'https://www.instagram.com/accounts/web_create_ajax/';
		$payload = array(
			'email' => $email,
			'password' => $password,
			'username' => $username,
			'first_name' => $firstname,
			'client_id' => randstring('28'),
			'seamless_login_enabled' => '1',
			'gdpr_s' => '%5B0%2C2%2C0%2Cnull%5D',
			'tos_version' => 'eu',
			'opt_into_one_tap' => 'false',
		);
		$header = array(
			'Cache-Control: no-cache',
			'Content-Type: application/x-www-form-urlencoded',
			'Referer: https://www.instagram.com/',
			'User-Agent: Mozilla/5.0 (Linux; Android 6.0.1; SM-G935T Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/51.0.2704.81 Mobile Safari/537.36',
			'X-CSRFToken: $csfrtoken',
		);

		$res = curl_request('POST', $url, $payload, $header);
		$contenido = json_decode($res, true);
		echo $contenido;
	}

	public function register_rand($domain){
		//api https://randomuser.me/api/?nat=es&password=number,lower,10
		$url = 'https://randomuser.me/api/?nat=es&password=number,lower,10';
		$res = curl_request('POST', $url, $payload, $header);

	}

	public function test(){

		$url = 'https://randomuser.me/api/?nat=es&password=number,lower,10';
		$payload = array();
		$header = array();
		$res = curl_request('GET', $url, $payload, $header);
		echo $res;
	}
}