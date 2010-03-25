<?php

class YQL {
	
	const YQLURL = 'http://query.yahooapis.com/v1/public/yql?q=';
	
	protected $query, $env = null;
	
	public function __construct($query, $env = null){ 
		if($env){
			$this->env = $env;
		}
		
		$this->query = $query;
	}
	
	public function execute(){
		$ch = curl_init(); 
		
		$url = self::YQLURL . urlencode($this->query) . '&format=json';
		
		if($this->env){
			$url .= '&env=' . urlencode($this->env);
		}
		
	    curl_setopt($ch, CURLOPT_URL, $url); 
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		
		$res = json_decode($result);
		return $res->query;
	}
	
}