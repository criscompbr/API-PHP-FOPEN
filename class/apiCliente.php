<?php

class cliente {

	public $host = 'https://api.sistemafidelidade.com.br';
	public $auth = [
	    'token_api' => '',
	    'id_senha' => ''
	];

	public function getAuth($host = null, $auth = null){
		$headers = [
			'http' => [
				'method' => 'POST',
				'ignore_errors' => true,
				'header' => "Content-Type: application/json\r\n",
				'content' => http_build_query($this->auth),
			]
		];
		$contexto = stream_context_create($headers);
		$fp = fopen($this->host, 'rb', false, $contexto);
		return ($fp) ? json_decode(stream_get_contents($fp)) : false;
	}

	public function API_Download($method, $path, $params = null){
		 $auth = $this->getAuth();
		 if($auth->code == 200){
		 	$headers = [
		 		'http' => [
					'method' => $method,
					'ignore_errors' => true,
					'header' => "Content-Type: application/json\r\n".
                    			"Assign: " . $auth->data->assign,
				],
	     	];
		  	if($params){
		  		$headers['http']['content'] = http_build_query($params);
	  		}
		 	$contexto = stream_context_create($headers);
		 	$fp = fopen($this->host . '/' . $path . '/', 'rb', false, $contexto);
		 	return ($fp) ? json_decode(stream_get_contents($fp)) : false;
		}
		return $auth;
	}

}
