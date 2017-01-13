<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Helper {

	 
    private $CI  ;
    private $restApi;
    private $systemParams;

    function __construct(){
        if(!isset($this->CI)){
            $this->CI = & get_instance();
        }
        if(!isset($this->restApi)){
           $this->CI->load->library('RestApi'); 
           $this->restApi = $this->CI->restapi;
        }

        if(!isset($this->systemParams)){
             $this->systemParams = array(
                 "API_URL"=>$this->CI->config->item('api_url'),
                 "WEB_ROOT" =>$this->getWebRoot()
             );
        }

        
     }
    
    public function getSystemParams(){
        return $this->systemParams; 
    }

    /**
     * #判断调用 restApi 是否返回正确的结果
     * @param $out  调用restApi获取的数据数组
     * @param string $name 数据的索引
     * @return bool 返回值$out["result"] == "ok" 时返回true
     */
    public function isRestOk($out,$name = ""){
      if( !isset($name) || $name ==""){
        return $out["result"] == "ok";
      }else{
        return  $out["result"] == "ok" && isset($name);
      }
    }

    /**
     * #往传进来的数组中添加一些系统变量信息
     * @param $data 传进来的数据
     * @return array 返回合并后的数据
     */
    public function merge($data){
        return array_merge($this->getSystemParams(), $data);
    }
    
    // 打印日志 
    public function log($data){
        log_message('info', var_export($data,true));
    }

    public function get($path,$fields=array()){
       return json_decode( $this->restApi->call("get",$path,$fields), true  );
    }

    public function getJson($path,$fields=array()){
       return json_decode( $this->restApi->call("get",$path,$fields), true  );
    }

    
    public function post($path,$fields=array()){
       return json_decode( $this->restApi->call("post",$path,$fields), true  );
    }

    public function delete($path,$fields=array()){
       return json_decode( $this->restApi->call("delete",$path,$fields), true  );
    }

    public function put($path,$fields=array()){
       return json_decode( $this->restApi->call("put",$path,$fields), true  );
    }
    
	public function getWebRoot(){
        $WEB_ROOT = substr(realpath(dirname(__FILE__).'/../../'), strlen(realpath($_SERVER['DOCUMENT_ROOT'])));
        if (trim($WEB_ROOT, '/\\')) {
            $WEB_ROOT = '/'.trim($WEB_ROOT, '/\\').'/';
        } else {
            $WEB_ROOT = '/';
        }
        $WEB_ROOT = str_replace("\\", "/", $WEB_ROOT);
        return $WEB_ROOT; 
    } 
    
    
    public function getUrl(){
    	return "http://" . $_SERVER['SERVER_NAME'] . "/";
    }

    /**
     * @param $params 想要获取的参数
     * @return mixed  返回请求中的参数值
     */
    public function getInput($params)
    {
        $return_value = $this->CI->input->post($params);
        if(empty($return_value)){
            $return_value = $this->CI->input->get($params);
        }

        return $return_value;
    }

}

 