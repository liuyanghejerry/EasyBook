<div id="frame">
<div class="white-box">
<h2>注册用户</h2>
<div style="margin:auto">
<?=validation_errors()?>
<?php
$attributes = array('id' => 'customForm');
echo form_open('register/validate',$attributes);
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
<span id="nameInfo">您的用户名，需要3-20个字符且仅支持字母/数字/下划线。</span>
</div>
<div>
<?php
echo form_label('电子邮箱','email');
$attributes = array(
              'name'        => 'email',
              'id'          => 'email',
			  'value' => set_value('email')
            );
echo form_input($attributes);
?>
<span id="emailInfo">您的电子邮箱，您将依靠它找回密码。</span>  
</div>  
<div>
<?php
echo form_label('密码','pass1');
$attributes = array(
              'name'        => 'pass1',
              'id'          => 'pass1'
            );
echo form_password($attributes);
?>
<span id="pass1Info">您的密码。最少需要6位，最长为20位。</span>  
</div>  
<div>
<?php
echo form_label('密码确认','pass2');
$attributes = array(
              'name'        => 'pass2',
              'id'          => 'pass2'
            );
echo form_password($attributes);
?>
<span id="pass2Info">请您再输入一次密码。</span>  
</div>
<div>
<?php
echo form_label('验证码','capcha');
$attributes = array(
              'name'        => 'capchaPic',
              'id'          => 'capchaPic',
			  'src'			=> base_url().'resource/capcha/'.$capTime.'.jpg'
            );

echo form_input(array('name'=>'capcha','id'=>'capcha'));
//echo img($attributes);
?>
<span id="capchaInfo">请您输入图中的文字:</span>
<?=img($attributes)?>
</div>
<div>  
<?php
$attributes = array(
              'name'        => 'send',
              'id'          => 'send',
			  'value'		=> '注册'
            );
echo form_submit($attributes);
?>
</div> 
</div>
</div>
</div>