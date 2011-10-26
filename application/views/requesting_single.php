<div class="frame">
<div class="white-box" id="requesting-nav">
<h2>同专业其它书籍</h2>
<ul>
<?php if(isset($subjects)) {
foreach($subjects as $item){
echo "<li>+ <a href='".site_url()."/requesting/single/".$item['requesting_id']."'>".$item['book_name']."</a></li>";
}
//if(isset($subjects[0]['collage_id']))echo "<li>+ <a href='".site_url()."/selling/page/".$subjects[0]['collage_id']."/0'>全部</a></li>";
}else{
echo "<li>+ <b>全部</b></li>";
} ?>
</ul>
</div>
<div class="white-box" id="requesting-box">
<h2><?=$item['book_name']?></h2>
	<div class="st-content">
	<div>
		<div class="info-slot">
		<h2>书籍信息</h2>
		<div class="slot"><span class="left-slot">书名：<?=$item['book_name']?></span><span class="right-slot">ISBN：<?=$item['book_isbn']?></span></div>
		<div class="slot"><span class="left-slot">出版社：<?=$item['book_publisher']?></span><span class="right-slot">作者：<?=$item['book_author']?></span></div>
		<div class="slot"><span class="left-slot">适用学院：<?=$item['book_collage']?></span><span class="right-slot">适用专业：<?=$item['book_subject']?></span></div>
		</div>
		<div class="info-slot">
		<h2>发布信息</h2>
		<div class="slot"><span class="left-slot">发布时间：<?=$item['requesting_start']?></span><span class="right-slot">过期时间：<?=$item['requesting_end']?></span></div>
		<div class="slot"><span class="left-slot">联系人：<?=$item['book_owner']?></span><span class="right-slot">联系方式：<?=$item['book_contact']?></span></div>
		<div class="slot"><span class="left-slot">备注：<?=$item['book_note']?></span></div>
		</div>
	</div>
	</div>
</div>
<div class="white-box" id="requesting-nav2">
<h2>同学院其它书籍</h2>
<ul>
<!--
<li>+ <a href='<?=site_url()."/requesting"?>'>全部</a></li>
-->
<?php 
if(isset($collages)){
foreach($collages as $item){
//echo "<li>+ <a href='".site_url()."/selling/page/".$item['collage_id']."/".$item['collage_firstsub']."'>".$item['collage_name']."</a></li>";
echo "<li>+ <a href='".site_url()."/requesting/single/".$item['requesting_id']."'>".$item['book_name']."</a></li>";
}
}
?>	
</ul>
</div>
</div>