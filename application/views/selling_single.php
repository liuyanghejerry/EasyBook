<div class="frame">
<div class="white-box" id="selling-nav">
<h2>同专业其它书籍</h2>
<ul>
<?php 
	if(isset($subjects)) {
		foreach($subjects as $one){
			echo "<li>+ <a href='".site_url("/selling/single/".$one['selling_id'])."'>".$one['book_name']."</a></li>";
		}
	}else{
		echo "<li>+ <b>全部</b></li>";
	} 
?>
</ul>
</div>
<div class="white-box" id="selling-box">
<h2><?=$item['book_name']?></h2>
	<div class="st-content">
		<div class="boxart-slot">
			<!--boxart of book -->
			<!-- TODO: only when photo big enough to use enlarge functions -->
			<a class="zoom-img" title="<?=$item['book_name']?>" href="<?=base_url($item['book_boxart'])?>">
				<img title="<?=$item['book_name']?>" src="<?=base_url($item['book_boxart_thumb'])?>"/>
			</a>
		</div>
		<div>
			<div class="info-slot">
			<h2>书籍信息</h2>
			<div class="slot"><span class="left-slot">书名：<?=$item['book_name']?></span><span class="right-slot">ISBN：<?=$item['book_isbn']?></span></div>
			<div class="slot"><span class="left-slot">出版社：<?=$item['book_publisher']?></span><span class="right-slot">作者：<?=$item['book_author']?></span></div>
			<div class="slot"><span class="left-slot">适用学院：<?=$item['book_collage']?></span><span class="right-slot">适用专业：<?=$item['book_subject']?></span></div>
			<div class="slot"><span class="left-slot">原价：￥<?=$item['book_oprice']?></span><span class="right-slot">现价：￥<?=$item['book_nprice']?></span></div>
			</div>
			<div class="info-slot">
			<h2>发布信息</h2>
			<?php
				if($item['book_status']!=1){
					echo '<h3>该书籍已被关闭或售出。</h3>';
					goto close;
				}
			?>
			<div class="slot"><span class="left-slot">发布时间：<?=$item['selling_start']?></span><span class="right-slot">过期时间：<?=$item['selling_end']?></span></div>
			<div class="slot"><span class="left-slot">联系人：<?=$item['book_owner']?></span><span class="right-slot">联系方式：<?=$item['book_contact']?></span></div>
			<div class="slot"><span class="left-slot">推荐次数：<?=$item['book_suggest']?></span></div>
			<div class="slot"><span class="left-slot">备注：<?=$item['book_note']?></span></div>
			<?php
				close:
			?>
			</div>
		</div>
	</div>
</div>
<div class="white-box" id="selling-nav2">
<h2>同学院其它书籍</h2>
<ul>
<!--
<li>+ <a href='<?=site_url("/selling")?>'>全部</a></li>
-->
<?php 
	if(isset($collages)){
		foreach($collages as $one){
			//echo "<li>+ <a href='".site_url()."/selling/page/".$item['collage_id']."/".$item['collage_firstsub']."'>".$item['collage_name']."</a></li>";
			echo "<li>+ <a href='".site_url("/selling/single/".$one['selling_id'])."'>".$one['book_name']."</a></li>";
		}
	}
?>	
</ul>
</div>
</div>

<script>
$(document).ready(function(){  
    $('.zoom-img').jqzoom({  
            zoomType: 'standard',  
            lens:true,  
            preloadImages: true,  
            alwaysOn:false,
            position:'right'  
    });  
});  
</script>