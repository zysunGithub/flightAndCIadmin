<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class RestApi {
	private $CI;

	public function __construct()
	{
		$this->CI = & get_instance();
		$this->CI->load->library('session');
	}

	/**
	 * $method : get | post | put | delete
	 * $path : /Vainity/ikenie
	 * $fields : Array('KEY'=>'VALUE')
	 **/
     public function call($method, $path, $fields=array(), $url_domain='api_url')
    {

		$access_token=$this->CI->session->userdata('token');

    	$url = $this->CI->config->item($url_domain).$path;
    	if(strtolower($method)=='get'){
    		return $this->queryFieldsToURL($access_token, $url,$fields);
    	}
    	elseif(strtolower($method)=='post'){
    		return $this->postJsonToURL($access_token, $url,$fields);
    		// return $CI->curl->simple_post($url, $fields);
    	}
    	elseif(strtolower($method)=='put'){
    		//$fields['_method']='PUT';
    		return $this->postJsonToURL($access_token, $url,$fields,'PUT');
    		// return $CI->curl->simple_post($url, $fields);
    	}
    	elseif(strtolower($method)=='delete'){
    		//$fields['_method']='DELETE';
    		return $this->postJsonToURL($access_token, $url,$fields,'DELETE');
    		// return $CI->curl->simple_post($url, $fields);
    	}
    }
    
    

	private function postJsonToURL($access_token, $url, $fields=array(),$method='POST'){ 
		$cookies_items=array();
		$cookies=array(
			'token'=>$access_token,
			);
	    foreach ($cookies as $key => $value) {
	    	$cookies_items[]=urlencode($key)."=".urlencode($value);
	    }

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    	'Content-Type: application/json'
	    ));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	    curl_setopt($ch, CURLOPT_COOKIE, implode(';', $cookies_items));

	    if($method=='PUT'){
	    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	    }elseif($method=='DELETE'){
	    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	    }

	    $data = curl_exec($ch);
	    curl_close($ch);
	    return $data;
	}
	private function queryFieldsToURL($access_token, $url, $fields=array()){
		$cookies_items=array();
		$cookies=array(
			'token'=>$access_token,
			);
	    foreach ($cookies as $key => $value) {
	    	$cookies_items[]=urlencode($key)."=".urlencode($value);
	    }

	    $curlFields=array();
	    if($fields && count($fields)>0){
	    	foreach ($fields as $key => $value) {
	    		$curlFields[]=urlencode($key)."=".urlencode($value);
	    	}
	    }
	    $curlPost=implode('&', $curlFields);
	    if(strlen($curlPost)>0){
	    	$curlPost="?".$curlPost;
	    }else{
	    	$curlPost="";
	    }
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url.$curlPost);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array());
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_COOKIE, implode(';', $cookies_items));
	    $data = curl_exec($ch);
	    curl_close($ch);
	    return $data;
	}
}
