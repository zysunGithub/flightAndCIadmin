<?php
require_once 'mycontroller.php';

class Login extends MyController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library(['session', 'helper', 'restApi', 'form_validation', 'email']);
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

                    $this->helper->log("登录url：".$return_url);

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
        $result = $this->helper->post('/admin/login',
            array(
                'user_name' => $user_name,
                'pass_word' => $pass_word
            ));

        $this->helper->log($result);
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
     * 退出登录清除cookies
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

    public function seek()
    {
        $method = $this->helper->getMethod();
        $data_view = array();

        if($method == 'post'){

            $this->form_validation->set_rules([
                ['field' => 'username', 'rules' => 'required', 'errors' => ['required' => '登录名称不能为空']],
                ['field' => 'email', 'rules' => 'required|valid_email', 'errors' => ['required' => '登录邮箱不能为空', 'valid_email' => '邮箱格式不正确']],
            ]);

            if($this->form_validation->run()){

                $user_name = $this->helper->getInput('username');
                $email = $this->helper->getInput('email');

                //验证用户名和邮箱是否匹配
                //若匹配则转到重置密码的界面，否则显示错误提示信息
                $check_result = $this->helper->post('/admin/checkEmail', ['user_name' => $user_name, 'email' => $email]);

                $this->helper->log($check_result);

                if ($check_result['result'] == 'ok'){

                    $token = isset($check_result['token']) ? $check_result['token'] : '';
                    $timestamp = isset($check_result['timestamp']) ? $check_result['timestamp'] : 0;

                    $send_result = $this->sendEmail($user_name, $token, $timestamp);
                    if($send_result){

                        $info = '重置密码邮件已发送';

                    }else{

                        $info = '重置密码邮件发送失败';

                    }

                    $data_view = array('info' => $info);

                }else {

                    $info = isset($check_result['error_info']) ? $check_result['error_info'] : '后台验证错误';
                    $data_view = array('info' => $info);

                }
            }
        }

        $this->load->view('seekpassword', $data_view);
    }

    /**
     * @param string $user_name 登录用户名
     * @param string $token 根据用户名和email获取的用户token信息
     * @param int $timestamp 用户进行密码找回时的时间戳
     * @return bool 是否成功发送邮件
     */
    public function sendEmail($user_name, $token, $timestamp)
    {

        $this->email->set_newline("\r\n");
        $this->email->from('m1173216325@163.com', 'zysun');
        $this->email->to('m1173216325@163.com');

        $this->email->subject('密码找回');

        $email_message = $this->load->view('email', ['user_name' => $user_name, 'timestamp' => $timestamp, 'token' => $token] ,true);
        $this->email->message($email_message);
        $this->email->set_alt_message('This is the alternative message');
//        $this->email->print_debugger();
        return $this->email->send();

    }

    public function resetPassWord($token = '', $timestamp = 0)
    {

        $method = $this->helper->getMethod();

        if($method == 'post'){

            //1、设置验证规则，获取新密码,根据token重置密码
            $this->form_validation->set_rules([
                ['field' => 'token', 'rules' => 'required', 'errors' => ['required' => 'token不能为空']],
                ['field' => 'password', 'rules' => 'required', 'errors' => ['required' => '密码不能为空']],
                ['field' => 'passwordconfirm', 'rules' => 'required|matches[password]', 'errors' => ['required' => '确认密码不能为空', 'matches' => '密码不一致']],
            ]);


            $data_view = array();

            if($this->form_validation->run()){

                $token = $this->helper->getInput('token');
                $password = $this->helper->getInput('password');

                $result = $this->helper->post('/admin/resetPassword', array('token' => $token, 'pass_word' => md5($password)));

                $data_view = array('info' => '密码重置失败');

                if($result['result'] == 'ok'){

                    $data_view = array('info' => '密码重置成功，请重新登录');

                }elseif($result['error_info']){

                    $data_view = array('info' => $result['error_info']);

                }

            }

            $this->load->view('changepass', $data_view);
        }else{

            //验证重置密码链接是否过期，加载重置重置密码视图文件
            $time = time();
            if($time - $timestamp > 3000){

                $this->load->view('seekpassword', array('info' => '重置密码链接已过期'));

            }else{

//                var_dump($token);die();
                $this->load->view('changepass', array('token' => $token));

            }

        }
    }

}