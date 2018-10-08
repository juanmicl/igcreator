<?php
namespace juanmicl\igcreator;

function randstring($lenght){
	return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lenght);
}

function curl_request($request, $url, $payload, $header){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_HEADER => 1,
		CURLOPT_CUSTOMREQUEST => $request,
		CURLOPT_POSTFIELDS => http_build_query($payload),
		CURLOPT_HTTPHEADER => $header,
		CURLOPT_COOKIEJAR => realpath('cookies222222222.txt'),
	));
	return curl_exec($curl);
	curl_close($curl);
}

function curl_request_ToFile($request, $url, $payload, $header, $username, $dir){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_HEADER => 1,
		CURLOPT_CUSTOMREQUEST => $request,
		CURLOPT_POSTFIELDS => http_build_query($payload),
		CURLOPT_HTTPHEADER => $header,
		CURLOPT_COOKIEJAR => $dir.'/'.$username.'.txt',
	));
	return curl_exec($curl);
	curl_close($curl);
}

class getCookies {

	public function login($username, $password){

		$url = 'https://www.instagram.com/accounts/login/ajax/';
		$payload = array(
			'username' => $username,
			'password' => $password,
		);
		$header = array(
			'Cache-Control: no-cache',
			'Content-Type: application/x-www-form-urlencoded',
			'Referer: https://www.instagram.com/',
			'User-Agent: Mozilla/5.0 (Linux; Android 6.0.1; SM-G935T Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/51.0.2704.81 Mobile Safari/537.36',
			'X-CSRFToken: '.randstring('32'),
		);

		$curl_output = curl_request('POST', $url, $payload, $header);
		//extract json
		preg_match('~\{(?:[^{}]|(?R))*\}~', $curl_output, $ig_response);
		$ig_response = json_decode($ig_response[0], true);
		//extract cookies
		preg_match_all('/^Set-Cookie:\s*([^\r\n]*)/mi', $curl_output, $ms);
		$ig_cookies = array();
		foreach ($ms[1] as $m) {
		    list($name, $value) = explode('=', $m, 2);
		    $ig_cookies[$name] = $value;
		}

		$array = array(
			'igcreator' => array(
				'authenticated' => $ig_response['authenticated'],
				'userId' => $ig_response['userId'],
				'username' => $username,
				'password' => $password,
			),
			'cookies' => $ig_cookies,
		);

		echo json_encode($array);
	}

	public function loginToFile($username, $password, $dir){

		$url = 'https://www.instagram.com/accounts/login/ajax/';
		$payload = array(
			'username' => $username,
			'password' => $password,
		);
		$header = array(
			'Cache-Control: no-cache',
			'Content-Type: application/x-www-form-urlencoded',
			'Referer: https://www.instagram.com/',
			'User-Agent: Mozilla/5.0 (Linux; Android 6.0.1; SM-G935T Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/51.0.2704.81 Mobile Safari/537.36',
			'X-CSRFToken: '.randstring('32'),
		);

		$curl_output = curl_request_ToFile('POST', $url, $payload, $header, $username, $dir);
		//extract json
		preg_match('~\{(?:[^{}]|(?R))*\}~', $curl_output, $ig_response);
		$ig_response = json_decode($ig_response[0], true);
		if ($ig_response['authenticated'] == true){

		}
		//extract cookies
		preg_match_all('/^Set-Cookie:\s*([^\r\n]*)/mi', $curl_output, $ms);
		$ig_cookies = array();
		foreach ($ms[1] as $m) {
		    list($name, $value) = explode('=', $m, 2);
		    $ig_cookies[$name] = $value;
		}

		$array = array(
			'igcreator' => array(
				'authenticated' => $ig_response['authenticated'],
				'userId' => $ig_response['userId'],
				'username' => $username,
				'password' => $password,
			),
			'cookies' => $ig_cookies,
		);

		echo json_encode($array);
	}
}