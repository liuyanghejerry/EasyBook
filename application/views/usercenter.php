<div id="main-box"><div class="white-box" id="usercenter-box"><div class="usual">   <ul class="idTabs">     <li><a href="#idTab1" class="selected">您的售出</a></li>     <li><a href="#idTab2">您的求购</a></li>     <li><a href="#idTab3">您的资料</a></li>   </ul>   <div id="idTab1" style="display: block; ">	<table>	<tr>		<td class="item-cell-header">书名</td>		<td class="item-cell-header">ISBN</td>		<td class="item-cell-header">发布时间</td>		<td class="item-cell-header">推荐次数</td>		<td class="item-cell-header">状态</td>		<td class="item-cell-header">动作</td>	</tr>	<?php foreach($selling as $item):?>	<tr>		<td class="item-cell"><a href='<?=site_url()?>/selling/single/<?=$item['selling_id']?>'><?=$item['book_name']?></a></td>		<td class="item-cell"><?=$item['book_isbn']?></td>		<td class="item-cell"><?=$item['selling_start']?></td>		<td class="item-cell"><?=$item['book_suggest']?></td>		<td class="item-cell"><?php if (!$item['book_status']): ?>关闭<?php elseif ($item['book_status'] == 1): ?>开启<?php else: ?>其它<?php endif; ?></td>		<td class="item-cell"><a href='<?=site_url()?>/selling/single/<?=$item['selling_id']?>/close'>关闭</a></td>	</tr>	<?php endforeach;?>		</table>  </div>   <div id="idTab2" style="display: none; ">  <table>	<tr>		<td class="item-cell-header">书名</td>		<td class="item-cell-header">ISBN</td>		<td class="item-cell-header">发布时间</td>		<td class="item-cell-header">状态</td>		<td class="item-cell-header">动作</td>	</tr>	<?php foreach($requesting as $item):?>	<tr>		<td class="item-cell"><a href='<?=site_url()?>/requesting/single/<?=$item['requesting_id']?>'><?=$item['book_name']?></a></td>		<td class="item-cell"><?=$item['book_isbn']?></td>		<td class="item-cell"><?=$item['requesting_start']?></td>		<td class="item-cell"><?php if (!$item['book_status']): ?>关闭<?php elseif ($item['book_status'] == 1): ?>开启<?php else: ?>其它<?php endif; ?></td>		<td class="item-cell"><a href='<?=site_url()?>/requesting/single/<?=$item['requesting_id']?>/close'>关闭</a></td>	</tr>	<?php endforeach;?>		</table>  </div>   <div id="idTab3" style="display: none; ">	<div><span class="item-cell">用户名：<?=$userinfo['user_name']?></span><span class="item-cell">性别：<?=($userinfo['user_gender']?'男':'女')?></span></div>	<div><span class="item-cell">电子邮箱：<?=$userinfo['user_email']?></span><span class="item-cell">学号：<?=$userinfo['user_studentid']?></span></div>	<div><span class="item-cell">联系电话：<?=$userinfo['user_cellphone']?></span><span class="item-cell">QQ号码：<?=$userinfo['user_qq']?$userinfo['user_qq']:'没有填写'?></span></div>	<div><span class="item-cell">所在学院：<?=$userinfo['user_collage']?></span><span class="item-cell">所在专业：<?=$userinfo['user_subject']?></span></div>  </div> </div></div></div>