<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\bootstrap\ActiveForm;
?>
<!DOCTYPE html>
<html class="login-bg">

<head>
    <title>CI AND FLIGHT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- bootstrap -->
    <link href="<?php echo base_url("assets/css/bootstrap/bootstrap.css"); ?>" rel="stylesheet" />
    <link href="<?php echo base_url("assets/css/bootstrap/bootstrap-responsive.css"); ?>" rel="stylesheet" />
    <link href="<?php echo base_url("assets/css/bootstrap/bootstrap-overrides.css"); ?>" type="text/css" rel="stylesheet" />
    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/layout.css"); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/elements.css"); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/icons.css"); ?>" />
    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/lib/font-awesome.css"); ?>" />
    <!-- this page specific styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/compiled/signin.css"); ?>" type="text/css" media="screen" />
    <!-- open sans font -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
<div class="row-fluid login-wrapper">
    <p></p>
    <div class="span4 box">
        <?php echo form_open('../login/seek'); ?>
            <div class="content-wrap">
                <h6>CI AND FLIGHT - 找回密码</h6>
                <?php if(isset($info)) echo $info; ?>

                <p><?php echo form_error('username'); ?></p>
                <?php echo form_input(['id' => 'username', 'class' => 'span12', 'name' => 'username', 'value' => set_value('username'), 'placeholder' => '管理员账号']); ?>

                <p><?php echo form_error('email'); ?></p>
                <?php echo form_input(['id' => 'email', 'class' => 'span12', 'name' => 'email', 'value' => set_value('email'), 'placeholder' => '管理员电子邮箱']); ?>

                <?php echo anchor('../login', '返回登录', ['class' => 'forgot']) ;?>

                <?php echo form_submit(['class' => 'btn-glow primary login', 'value' => '找回密码']); ?>
            </div>
        </form>
    </div>
</div>
<!-- scripts -->
<script src="<?php echo base_url("assets/js/jquery-latest.js") ; ?>"</script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="<?php echo base_url("assets/js/theme.js") ; ?>"</script>
<!-- pre load bg imgs -->
<script type="text/javascript">

    $(function() {
        // bg switcher
        var $btns = $(".bg-switch .bg");
        $btns.click(function(e) {
            e.preventDefault();
            $btns.removeClass("active");
            $(this).addClass("active");
            var bg = $(this).data("img");

            $("html").css("background-image", "url('img/bgs/" + bg + "')");
        });
    });
</script>
</body>

</html>
