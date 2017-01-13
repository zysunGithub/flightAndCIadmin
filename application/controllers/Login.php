<?php
require_once 'mycontroller.php';

class Login extends MyController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library(['session', 'helper', 'restApi', 'form_validation']);
        $this->load->helper(['url', 'form']);

    }

    public function index()
    {
        $this->form_validation->set_rules([
            ['field' => 'username', 'rules' => 'required', 'errors' => ['required' => '登录名称不能为空']],
            ['field' => 'password', 'rules' => 'required', 'errors' => ['required' => '登录密码不能为空']],
        ]);

        $action = $this->helper->getInput('act');

        if($action == 'sign_in'){//登录界面上的登录操作

            if($this->form_validation->run() == false){
                $this->load->view('login');
            }else{
                $user_name = $this->helper->getInput('username');
                $pass_word = $this->helper->getInput('password');


                $check_result = $this->checkLogin($user_name, md5($pass_word));

                if($check_result){
                    //判断是否指定回调url,如果指定了return_url则重定向指定的控制器中，否则进入首页
                    $return_url = $this->helper->getInput('return_url');
                    if(!empty($return_url) && $return_url != '/' && $return_url != '/index.php'){//进入首页
                        redirect('..'.$return_url);
                    }else{
                        redirect('../facade');
                    }
                }else{
                    //输出错误信息，加载登录页面
                    $view_data = $this->helper->merge(array('info' => '登录名或密码错误'));
                    $this->load->view('login',$view_data);
                }
            }
        }else{
            //进行到此有两种情况：
            //1、通过调用其他控制器然后重定向login控制器
            //2、直接调用login控制器

            //获取url中的return_url
            $url_request = $_SERVER['REQUEST_URI'];//获取请求页面的Url
            $return_url = self::getStrAfterMatchStr($url_request,'return_url=');

            $view_data = $this->helper->merge(array('return_url' => $return_url));
            $this->load->view('login',$view_data);
        }
    }

    /**
     * #根据用户名称和密码进行登录验证，验证成功设置session和cookies
     * @param $user_name 登录用户名
     * @param $pass_word 登录密码
     * @return bool 返回是否登录成功
     */
    public function checkLogin($user_name,$pass_word)
    {
        $result = $this->restapi->call(
            "post", '/admin/login',
            array(
                'user_name' => $user_name,
                'pass_word' => $pass_word
            ));

        $this->helper->log($result);
        $result = json_decode($result,true);

        $this->helper->log($result);
        $this->helper->log(base_url());

        if($result['result'] == 'ok' ) {
            $session_data = array(
                'user_name'  => $user_name,
                'pass_word'  => $pass_word,
                'token' => $result['token'],
            );

            $this->session->set_userdata($session_data);
            setcookie('token', $result['token'], $time = time() + 3600 * 5, 'fc.com');

            return true;
        }
        else {
            return false;
        }
    }

    /**
     * 退出登录清楚cookies
     */
    public function logout()
    {
        foreach ($_COOKIE as $k => $v) {
            if ($k != 'OKTID')  	setcookie($k, '', 1, '/', "");
        }
        $this->session->sess_destroy();

        redirect('../login');
    }

    /**
     * @param $origin_str
     * @param $match_str
     * @return string 返回$match_str在$origin_str首次出现的位置之后的字符串，查找不到返回空
     */
    static public function getStrAfterMatchStr($origin_str,$match_str)
    {
        $return_url = '';

        $position = strpos($origin_str,$match_str);
        if($position !== false && ($position + strlen($match_str) < strlen($origin_str) - 1)){
            $return_url = substr($origin_str, $position + strlen($match_str));
        }

        return $return_url;
    }
}