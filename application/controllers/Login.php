<?php
class Login extends MyController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->library('helper');
        $this->load->library('RestApi');
        $this->load->helper('url');

    }

    public function index()
    {
        $action = $this->helper->getInput('action');
        $user_name = $this->helper->getInput('user_name');
        $pass_word = $this->helper->getInput('pass_word');

        if($action == 'sign_in'){//登录界面上的登录操作
            $check_result = $this->checkLogin([//验证数据的合法性
                'user_name' => $user_name,
                'pass_word' => $pass_word
            ]);
            if($check_result){
               //判断是否指定回调url,如果指定了return_url则重定向指定的控制器中，否则进入首页
                $return_url = $this->helper->getInput('return_url');

                if(empty($return_url)){//进入首页
                    $return_url = '';
                }

                redirect($return_url);
            }else{
                //输出错误信息，加载登录页面
                $this->load->view('login',array('info' => '登录名或密码错误'));
            }
        }else{
            //进行到此有两种情况：
            //1、通过调用其他控制器然后重定向login控制器
            //2、直接调用login控制器

            //判断session数据是否过期
            $is_login = $this->session->userdata('username');

            $url_request = $_SERVER['REQUEST_URI'];//获取请求页面的Url

            if(is_null($is_login)){
                //session数据已过期，重定向到登录页面
                $this->load->view('login',array('return_url' => $url_request));
            }else{
                rediret("/login?return_url={$url_request}");
            }
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

        $result=$this->restapi->call("post", '/admin/login',
            array('user_name' => $user_name, 'pass_word' => $pass_word));

        $result = json_decode($result,true);
        $this->helper->log($result);
        $this->helper->log(base_url());

        if($result['result'] == 'ok' ) {
            $session_data = array(
                'username'  => $user_name,
                'password'  => md5($pass_word),
                'AccessToken' => $result['token'],
            );

            $this->session->set_userdata($session_data);
            setcookie('token', $result['token'], $time = time() + 3600 * 5, 'example.com');

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
}