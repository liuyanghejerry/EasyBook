<div id="frame">
<div class="white-box" id="login-box">
<h2>登录</h2>
<div style="margin:auto">
<?=validation_errors()?>
<?php
$attributes = array('id' => 'customForm');
echo form_open('login/validate',$attributes);
?>
<div>
<?php
echo form_label('用户名','name');
$attributes = array(
              'name'        => 'name',
              'id'          => 'name',
			  'value' => set_value('name')
            );
echo form_input($attributes);
?>
<span id="nameInfo">您的用户名</span>
</div> 
<div>
<?php
echo form_label('密码','pass');
$attributes = array(
              'name'        => 'pass',
              'id'          => 'pass'
            );
echo form_password($attributes);
?>
<span id="pass1Info">您的密码</span>  
</div>  
<div>  
<?php
$attributes = array(
              'name'        => 'send',
              'id'          => 'send',
			  'value'		=> '登录'
            );
echo form_submit($attributes);
?>
</div> 
</div>
</div>
</div>