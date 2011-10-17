<div id="frame">
<div class="white-box">
<h2>注册用户</h2>
<div style="margin:auto">
<?=validation_errors()?>
<?php
$attributes = array('id' => 'customForm');
echo form_open('form',$attributes);
?>
<div>
<?php
echo form_label('用户名','name');
$attributes = array(
              'name'        => 'name',
              'id'          => 'name'
            );
echo form_input($attributes);
?>
<span id="nameInfo">您理想的用户名，最少需要3个字符。</span>
</div>
<div>
<?php
echo form_label('电子邮箱','email');
$attributes = array(
              'name'        => 'email',
              'id'          => 'email'
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
<span id="pass1Info">您的密码。最少需要6位。</span>  
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
<span id="pass2Info">为确保您没有错误输入密码，请您再输入一次。</span>  
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
<!--
<form method="post" id="customForm" action="">  
            <div>  
                <label for="name">用户名</label>  
                <input id="name" name="name" type="text" />  
                <span id="nameInfo">您理想的用户名，最少需要3个字符。</span>  
            </div>  
            <div>  
                <label for="email">电子邮箱</label>  
                <input id="email" name="email" type="text" />  
                <span id="emailInfo">您的电子邮箱，您将依靠它找回密码。</span>  
            </div>  
            <div>  
                <label for="pass1">密码</label>  
                <input id="pass1" name="pass1" type="password" />  
                <span id="pass1Info">您的密码。最少需要6位。</span>  
            </div>  
            <div>  
                <label for="pass2">密码确认</label>  
                <input id="pass2" name="pass2" type="password" />  
                <span id="pass2Info">为确保您没有错误输入密码，请您再输入一次。</span>  
            </div>
            <div>  
                <input id="send" name="send" type="submit" value="注册" />  
            </div>  
</form>
-->  
</div>
</div>
</div>