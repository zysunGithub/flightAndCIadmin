<!DOCTYPE html>
<html class="login-bg">

<head>
    <title>Flight and CodeIgnite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/bootstrap/bootstrap-responsive.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/bootstrap/bootstrap-overrides.css'); ?> " type="text/css" rel="stylesheet" />
    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/layout.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/elements.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/icons.css'); ?>" />
    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/lib/font-awesome.css'); ?>" />
    <!-- this page specific styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/compiled/signin.css'); ?>" type="text/css" media="screen" />
    <!-- open sans font -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
<div class="row-fluid login-wrapper">
    <p></p>
    <div class="span4 box">
        <?php echo form_open('../login/resetPassword'); ?>
            <div class="content-wrap">
                <h6>Fight and CodeIgnite - 密码重置</h6>

                <?php if(isset($info)) echo $info; ?>

                <?php echo form_error('token'); ?>
                <?php echo form_input(['id' => 'token', 'type' => 'hidden', 'name' => 'token', 'value' => set_value('token', (isset($token) ? $token : ''))]); ?>

                <?php echo form_error('password'); ?>
                <?php echo form_input(['id' => 'password', 'type' => 'password', 'name' => 'password', 'class' => 'span12', 'value' => set_value('password'), 'placeholder' => '新密码']); ?>

                <?php echo form_error('passwordconfirm'); ?>
                <?php echo form_input(['id' => 'passwordconfirm', 'type' => 'password', 'name' => 'passwordconfirm', 'class' => 'span12', 'value' => set_value('passwordconfirm'), 'placeholder' => '确认密码']); ?>

                <?php echo anchor('../login', '返回登录', ['class' => 'forgot']) ;?>
            </div>
            <?php echo form_submit(['class' => 'btn-glow primary login', 'value' => '重置密码']); ?>
        </form>
    </div>
</div>
<!-- scripts -->
<script src="<?php echo base_url('assets/js/jquery-latest.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/theme.js'); ?>"></script>
<!-- pre load bg imgs -->
<script type="text/javascript">$(function() {
        // bg switcher
        var $btns = $(".bg-switch .bg");
        $btns.click(function(e) {
            e.preventDefault();
            $btns.removeClass("active");
            $(this).addClass("active");
            var bg = $(this).data("img");

            $("html").css("background-image", "url('img/bgs/" + bg + "')");
        });

    });</script>
</body>

</html>