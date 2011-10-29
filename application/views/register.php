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
echo form_label('性别选择','gender');
$attributes = array(
              'name'        => 'gender',
              'id'          => 'gender',
			  'value'       => '1',
			  'checked'     => TRUE,
            );
echo form_radio($attributes).'男';
$attributes = array(
              'name'        => 'gender',
              'id'          => 'gender',
			  'value'       => '0',
			  'checked'     => FALSE,
            );
echo form_radio($attributes).'女';
?>
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

<ul id="categorymenu" class="mcdropdown_menu">
<?php foreach($collages as $item): ?>
	<li>
		<?=$item['name']?>
		<ul>
		<?php foreach($item['subjects'] as $cell): ?>
			<li rel="<?=$cell['subject_id']?>">
				<?=$cell['subject_name']?>
			</li>
		<?php endforeach; ?>
		</ul>
	</li>
<?php endforeach; ?>
</ul>

<div>
<?php
echo form_label('专业','subject');
$attributes = array(
              'name'        => 'subject',
              'id'          => 'subject',
			  'value' => set_value('subject')
            );
echo form_input($attributes);
?>
<span id="subjectInfo">您所在的专业。</span>  
</div>
<script type="text/javascript">
$(document).ready(function (){
	var dd = $("#subject").mcDropdown("#categorymenu",{'delim': " - "});
});
</script>

<div>
<?php
echo form_label('学号','studentid');
$attributes = array(
              'name'        => 'studentid',
              'id'          => 'studentid'
            );
echo form_input($attributes);
?>
<span id="studentidInfo">您的学号。本站仅允许江南大学学生注册。</span>  
</div>

<div>
<?php
echo form_label('联系电话','cellphone');
$attributes = array(
              'name'        => 'cellphone',
              'id'          => 'cellphone'
            );
echo form_input($attributes);
?>
<span id="cellphoneInfo">您的联系电话，以便买家或卖家联系您。</span>  
</div>

<div>
<?php
echo form_label('QQ','qq');
$attributes = array(
              'name'        => 'qq',
              'id'          => 'qq'
            );
echo form_input($attributes);
?>
<span id="qqInfo">您的QQ号码。本项为选填信息。</span>  
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