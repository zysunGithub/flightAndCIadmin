<!doctype html>
<html lang="zh-CN">
<head>
    <title>flight and codeIgnite </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- bootstrap -->
    <link href="assets/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="assets/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />
    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/icons.css" />
    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="assets/css/lib/font-awesome.css" />
    <!-- this page specific styles -->
    <link rel="stylesheet" href="assets/css/compiled/signin.css" type="text/css" media="screen" />
    <!-- open sans font -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body id="body-login" background="assets/img/bgs/11.jpg">

    <div class="row-fluid login-wrapper">

        <?php echo form_open('login');?>
            <p></p>
            <div class="span4 box">
                <div class="content-wrap">
                    <h6> Flight and CodeIgnite </h6>
                    <p><?php if(isset($info)) echo $info ?></p>
                    <p><?php echo form_error('username');?></p>
                    <input type="text" class="span12" name="username" id='username' value="<?php echo set_value('username'); ?>" placeholder="用户名"/>
                    <p><?php echo form_error('password');?></p>
                    <input type="password" class="span12" name="password" id="password" placeholder="用户名密码"/>
                    <div class="remember">
                        <?php echo form_checkbox(['id' => 'remember-me'], 'accept', TRUE);?>
                        <label for="remember-me">记住我</label>
                        <?php echo anchor('../login/seek', '忘记密码', 'class="forgot"') ;?>
                    </div>
                </div>
                <input type="hidden" name="return_url" value="<?php if(isset($return_url)) echo "{$return_url}"; ?>" />
                <input type="hidden" name="act" value="sign_in" />
                <input type="submit" class="btn-glow primary login" value="登录" />
            </div>
        </form>
    </div>
    <!-- scripts -->
    <script src="assets/js/jquery-latest.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <!-- pre load bg imgs -->
    <script type="text/javascript">$(function() {
            // bg switcher
            var $btns = $(".bg-switch .bg");
            $btns.click(function(e) {
                e.preventDefault();
                $btns.removeClass("active");
                $(this).addClass("active");
                var bg = $(this).data("img");
                $("html").css("background-image", "url('assets/img/bgs/" + bg + "')");
            });

        });
    </script>
</body>
</html>