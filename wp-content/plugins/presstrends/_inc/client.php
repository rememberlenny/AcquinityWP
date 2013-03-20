<?php
/**
 * This class represents the client ---> provider communication for requesting access tokens
 */
class PressTrendsClient
{
 
	public $token;
	public $current_url;
	public $redirect_uri;
 	public $secret;
	
	/**
	 * Redirects user to provider
	 * @return void
	 */
	public function askForIt()
	{
		  wp_redirect($this->redirect_uri);
		  exit;
	}
	
	/**
	 * Sends refresh token to provider to recieve access token
	 * @return string
	 */
	function refreshToken($token)
	{
 
 		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt_array($ch, array(
			CURLOPT_POST => 1, 
			CURLOPT_URL => PRESSTRENDS_PROVIDER_URL,
	        CURLOPT_HEADER => 0, 
	        CURLOPT_FRESH_CONNECT => 1, 
	        CURLOPT_RETURNTRANSFER => 1, 
	        CURLOPT_FORBID_REUSE => 1, 
	        CURLOPT_TIMEOUT => 40, 
	        CURLOPT_POSTFIELDS => http_build_query(array('refresh_token' => $token))
		));
		
	    if( ! $result = curl_exec($ch)) 
	    { 
	        trigger_error(curl_error($ch)); 
	    } 
		
	    curl_close($ch); 
		
		return $result;
		
	}
  
    /**
	 * Checks all posibilities getting the access token. Either from refresh_token or redirecting the user to the api
	 * if needed
	 * @return string access token
	 */
	public function getAccessToken()
	{
		$a = FALSE;
		
		if ( ! $this->token)
		{
			$a = TRUE;
		}
		
  
		if ($this->token['access_token'])
		{
			if (($this->token['expires_in'] < (time() - $this->token['created'])))
			{
				
				if ($this->token['refresh_token'])
				{
					 try { 
						 $token = $this->refreshToken($this->token['refresh_token']);
		 
						 if ($token)
						 {
						 	$this->token = json_decode($token, TRUE);
							$this->saveData($token);
						 }
					 }
					 catch (Exception $e)
					 {
 
					 	$a = TRUE;
					 }
				}
				else 
				{
				   $a = TRUE;
				}
			
			}

			
		} else { $a = TRUE; }
 
		if ($a AND  ! isset($_REQUEST['presstrends_api']))
		{
			$this->askForIt();
		}
		
		return $this->token;
	}
	
	/**
	 * Gets current url
	 * @return string
	 */
	public function getCurrentURL()
	{
		/**
		 * Ref. http://stackoverflow.com/a/1229924/376238
		 */
		$pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
		if ($_SERVER["SERVER_PORT"] != "80")
		{
		    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} 
		else 
		{
		    $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		
		return $pageURL;
		
	}
	
	/**
	 * Collects access token if was submitted by the provider trough network HTTP POST
	 * @return $this
	 */
	public function parseAccessToken()
	{
 		/*
		 * Implement more security here, allow only IP from provider servers or some hashing algo
		 */
		if ($data = $_REQUEST)
		{
 
			if (@$data['presstrends_secret'] == $this->secret)
			{
	
				$expected = array('access_token', 'expires_in', 'created', 'refresh_token');
				
				$store = array();
				foreach ($expected as $k)
				{
					$mk = 'presstrends_'.$k;
					if (isset($_REQUEST[$mk]))
					{
						$store[$k] = $_REQUEST[$mk];
					}
				}
	 
				
				if (count($store) == count($expected))
				{
					$this->saveData(json_encode($store));
				  
				}
			
				 
			}
			
			
		}
		
		
		return $this;
	}
	
	/**
	 * Saves access token data to options
	 */
	public function saveData($store)
	{
		$this->token = json_decode($store, TRUE);
		update_option(PRESSTRENDS_GA_SK, $store);
	}
	
	public function __construct()
	{
		$this->token = json_decode(get_option(PRESSTRENDS_GA_SK), TRUE);
		$secret = get_option(PRESSTRENDS_GA_SECRET);
		if ( ! $secret)
		{
			$secret = (string) mt_rand(mt_rand(442466, 25253325), mt_rand(51005, 626373473));
			update_option(PRESSTRENDS_GA_SECRET, $secret);
		}
		
		$this->secret = $secret;
		$this->current_url = $this->getCurrentURL();
  
		$this->redirect_uri = PRESSTRENDS_PROVIDER_URL.'?'.http_build_query(array('identity' => $this->secret, 'consumer' => $this->current_url));
		$this->parseAccessToken();
 
	}
}