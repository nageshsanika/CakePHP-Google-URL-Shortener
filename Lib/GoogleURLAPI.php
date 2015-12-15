<?php
class GoogleURLAPI { 

	//this method generates the short url from long url
	//ex: http://something.xyz/about => goo.gl/nkjlfa 
	public function generateShortURL($url){
		$key=Configure::read('GoogleURLAPIServerKey'); //read google server API key from CakeConfiguration file
		$curlObj = curl_init(); //initailize curl 
		$jsonData = json_encode($url);
		//set curl post and headers
		curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key='.$key);
		curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlObj, CURLOPT_HEADER, 0);
		curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
		curl_setopt($curlObj, CURLOPT_POST, 1);
		curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
		 
		$response = curl_exec($curlObj);
		 
		//change the response json string to object

		$json = json_decode($response);
		curl_close($curlObj);
		 
		return $json; //json object which contains the short url.
	}

	//this method generates the long url from existing google short url
	//ex: goo.gl/nkjlfa => http://something.xyz/about
	
	public function getLongURLfromShortURL($url){
		$key=Configure::read('GoogleURLAPIServerKey'); //read google server API key from CakeConfiguration file
		$curlObj = curl_init(); //initailize curl 
		curl_setopt($ch,CURLOPT_URL,'https://www.googleapis.com/urlshortener/v1/url?key='.$key.'&shortUrl='.$url);
		$response = curl_exec($curlObj); 
		//change the response json string to object 
		$json = json_decode($response);
		curl_close($curlObj); 

		return $json;//json object which contains the long url.
	}
}