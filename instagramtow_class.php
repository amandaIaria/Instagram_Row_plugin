<?php

class Instagram_Row {


	public $apiKey ;
	public $apiSecret ;
	public $userName ;
	public $css;
	public $accessToken;
	public $userID;
	private $connectUrl;
  	

  	function __construct($x,$y,$z,$a,$b, $c){
    	$this->apiKey = $x;
    	$this->apiSecret = $y;
    	$this->userName = $z;
    	$this->css = $a;
    	$this->accessToken = $b;
    	$this->userID = $c;
    	$this->connectUrl = "https://api.instagram.com/v1/users/".$this->userID."/media/recent/?access_token=" .$this->accessToken;
  	}
  	

  	public function connect_insta(){
  		try{
			iConnect($this->connectUrl);
			$ch = curl_init();

  			curl_setopt($ch, CURLOPT_URL,	$this->connectUrl );
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
  		
  			$result = curl_exec($ch);
  		
  			curl_close($ch);
  		
  			return $result;
  		}
  		catch(Exception $e){
  			echo $e->getMessage();
  		}
  	}
}

//https://api.instagram.com/v1/users/1437000186/media/recent/?access_token=1437000186.1677ed0.308b4ebec9f24d20afb8743400b76948

