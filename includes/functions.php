<?php


	function requestApi($token,$url,$dizi,$method)
	{
		$response = \Httpful\Request::$method($url)
		->addHeaders(array(
            'Authorization' => 'Token '.$token,            
            'Content-Type' => 'application/json'
		))
		->body(json_encode($dizi))
		->sendsJson()
		->send();
		return json_decode($response,true);
	}

	
 
	function registerNotVarMi($user_token,$register_id)
	{
		$register_notes = getApi($user_token,'http://127.0.0.1:8000/register_notes/?format=json');
		for ($i=0; $i < count($register_notes["results"]); $i++) { 
			if($register_notes["results"][$i]["register"]==$register_id)
				return 1;
		}
		return 0;
	}
?>