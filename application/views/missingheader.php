
<html>
<head>
<meta http-equiv="content-Type" content="text/html" charset="utf-8">
<meta name ="keywords" content="<?=$keywords?>">
<meta name="description" content="<?=$description?>">
<meta name="robots" content="<?=$robots?>">
<link rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>resource/header/header.css">
<?php foreach($css as $cssitem):?>
<link rel="stylesheet" type="text/css" media="all" href="<?=$cssitem?>">
<?php endforeach;?>
<script type="text/javascript" src="<?=base_url()?>resource/jquery.min.js"></script>
<?php foreach($javascript as $jsitem):?>
<script type="text/javascript" src="<?=$jsitem;?>"></script>
<?php endforeach;?>
</head>
<body>

<div class="page-top-holder">
<div class="page-head-holder">
<div class="search">
<form action="#" method="get" id="search-sug">
<fieldset>
<div class="search-input">
<input accesskey="s" size="24" class="sug-input" autocomplete="off" name="key" value="搜索框预置内容" id="search-sug-input">
</div>
<button type="submit"></button>
<script>
    (function(){
        document.getElementById('search-sug-input').onfocus = function(e){
            this.style.color = "#666";
            if(this.value ==this.defaultValue){
                this.value = '';
            } 
        };
    })();   
</script>	
</fieldset>
</form>
</div>
<ul class="main-nav nav-plaza">
<li><a href="<?=site_url()?>">首页</a></li>
<li><a href="#">排行榜</a></li>
<li><a href="#">留言板</a></li>
<li><a href="#">我的账户</a></li>
</ul>
<div class="logo"> 
<a href="<?=site_url()?>"><img src="<?=base_url()?>resource/header/logo.png" width="159" height="67"></a> 
</div>
</div>
</div> 