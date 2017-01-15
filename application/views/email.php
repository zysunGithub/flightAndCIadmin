<p>尊敬的<?php echo $user_name;?>:</p>

<p>您的密码找回链接为：</p>

<?php $url = base_url("/login/resetPassWord/{$token}/{$timestamp}"); ?>

<p><a href=<?php echo $url;?> ><?php echo $url;?></a></p>

<p>链接5分钟内有效，请勿转发给别人</p>

<p>此邮件是系统自动发送请勿回复</p>