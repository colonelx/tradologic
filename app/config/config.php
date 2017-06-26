<?php

$config = [
    'tl_api_uri' => getenv('API_URL') ?  getenv('API_URL') : 
	(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/api",
    
    'base_path' => realpath(__DIR__ . '/../../')
];

return $config;
