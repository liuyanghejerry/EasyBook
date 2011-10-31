<div id="main-box">
<div class="white-box" id="new-selling">
<div id="extruderLeft" class="a {title:'图书分类', url:'<?=base_url()?>static/categories.html'}"></div>
<a class ="more" href="<?=site_url().'/selling'?>">更多-></a>
<h2>最新售出</h2>
<div id="ps_slider" class="ps_slider">
			<a class="prev disabled"></a>
			<a class="next disabled"></a>
			<div id="ps_albums">
			<?php foreach($selling as $item):?>
				<div class="ps_album" style="opacity:0;">
				<a href="<?=site_url().'/selling/single/'.$item['selling_id']?>"><img src="<?=base_url().$item['book_boxart']?>" alt=""/></a>
				<div class="ps_desc">
				<h2><a href="<?=site_url().'/selling/single/'.$item['selling_id']?>"><?=$item['book_name']?></a></h2>
				<span>ISBN：<?=$item['book_isbn']?></span>
				<span>作者：<?=$item['book_author']?></span>
				<span>原价：<?=$item['book_oprice']?></span>
				<span>现价：<?=$item['book_nprice']?></span>
				</div>
				</div>
			<?php endforeach;?>	
			</div>	
</div>
</div>
<script type="text/javascript">
$(function() {
    $("#extruderLeft").buildMbExtruder({
        position:"left",
        width:1000,
		top:200,
		positionFixed:true,
        extruderOpacity:.8,
        onExtOpen:function(){},
        onExtContentLoad:function(){},
        onExtClose:function(){}
      });
});
</script>
<div id="center-two">
<div class="white-box" id="left-box">
<h2>最新求购</h2>
<ul class="hot-list">
<?php foreach($requesting as $item):?>
<li>
<h3><a href="<?=site_url().'/requesting/single/'.$item['requesting_id']?>"><?=$item['book_name']?></a></h3>
<div>
<span class="li-left">出版社</span><span class="li-right"><?=$item['book_publisher']?></span>
</div>
<div>
<span class="li-left">ISBN</span><span class="li-right"><?=$item['book_isbn']?></span>
</div>
</li>
<?php endforeach;?>	
</ul>
<a href="<?=site_url().'/requesting'?>" class="more">完整榜单-></a>
</div>
<div class="white-box" id="right-box">
<h2>火热推荐</h2>
<div class="cover_box">
    <div class="cover_item_box">
        <div class="cover_item_imgbox"><a href="#" target="_blank">
            <img id="CoverList2_RepeaterUp_ctl00_Image1" src="<?=base_url()?>resource/main/1.jpg">
        </a></div>
        <div class="cover_item_name">
            <a href="/BookBook/ShowBook.aspx?BookID=73" target="_blank">计算机算法设计与分析（第三版）</a>
        </div>
        <div class="cover_item_price">
            <i><span id="CoverList2_RepeaterUp_ctl00_lblrec">推荐31次</span></i>
            <span id="CoverList2_RepeaterUp_ctl00_lblprice">现价:￥10</span>
        </div>
    </div>
    

    <div class="cover_item_box">
        <div class="cover_item_imgbox"><a href="#" target="_blank">
            <img id="CoverList2_RepeaterUp_ctl01_Image1" src="<?=base_url()?>resource/main/2.jpg">
        </a></div>
        <div class="cover_item_name">
            <a href="/BookBook/ShowBook.aspx?BookID=69" target="_blank">模拟CMOS集成电路设计</a>
        </div>
        <div class="cover_item_price">
            <i><span id="CoverList2_RepeaterUp_ctl01_lblrec">推荐21次</span></i>
            <span id="CoverList2_RepeaterUp_ctl01_lblprice">现价:￥30</span>
        </div>
    </div>
    

    <div class="cover_item_box">
        <div class="cover_item_imgbox"><a href="#" target="_blank">
            <img id="CoverList2_RepeaterUp_ctl02_Image1" src="<?=base_url()?>resource/main/3.jpg">
        </a></div>
        <div class="cover_item_name">
            <a href="/BookBook/ShowBook.aspx?BookID=133" target="_blank">当代世界经济与政治</a>
        </div>
        <div class="cover_item_price">
            <i><span id="CoverList2_RepeaterUp_ctl02_lblrec">推荐14次</span></i>
            <span id="CoverList2_RepeaterUp_ctl02_lblprice">现价:￥5</span>
        </div>
    </div>
	
	
	<div class="cover_item_box">
        <div class="cover_item_imgbox"><a href="#" target="_blank">
            <img id="CoverList2_RepeaterUp_ctl02_Image1" src="<?=base_url()?>resource/main/4.jpg">
        </a></div>
        <div class="cover_item_name">
            <a href="/BookBook/ShowBook.aspx?BookID=133" target="_blank">当代世界经济与政治</a>
        </div>
        <div class="cover_item_price">
            <i><span id="CoverList2_RepeaterUp_ctl02_lblrec">推荐14次</span></i>
            <span id="CoverList2_RepeaterUp_ctl02_lblprice">现价:￥5</span>
        </div>
    </div>
</div>
<div class="cover_box">
    <div class="cover_item_box">
        <div class="cover_item_imgbox"><a href="#" target="_blank">
            <img id="CoverList2_RepeaterUp_ctl00_Image1" src="<?=base_url()?>resource/main/5.jpg">
        </a></div>
        <div class="cover_item_name">
            <a href="/BookBook/ShowBook.aspx?BookID=73" target="_blank">计算机算法设计与分析（第三版）</a>
        </div>
        <div class="cover_item_price">
            <i><span id="CoverList2_RepeaterUp_ctl00_lblrec">推荐31次</span></i>
            <span id="CoverList2_RepeaterUp_ctl00_lblprice">现价:￥10</span>
        </div>
    </div>
    

    <div class="cover_item_box">
        <div class="cover_item_imgbox"><a href="#" target="_blank">
            <img id="CoverList2_RepeaterUp_ctl01_Image1" src="<?=base_url()?>resource/main/6.jpg">
        </a></div>
        <div class="cover_item_name">
            <a href="/BookBook/ShowBook.aspx?BookID=69" target="_blank">模拟CMOS集成电路设计</a>
        </div>
        <div class="cover_item_price">
            <i><span id="CoverList2_RepeaterUp_ctl01_lblrec">推荐21次</span></i>
            <span id="CoverList2_RepeaterUp_ctl01_lblprice">现价:￥30</span>
        </div>
    </div>
    

    <div class="cover_item_box">
        <div class="cover_item_imgbox"><a href="#" target="_blank">
            <img id="CoverList2_RepeaterUp_ctl02_Image1" src="<?=base_url()?>resource/main/7.jpg">
        </a></div>
        <div class="cover_item_name">
            <a href="/BookBook/ShowBook.aspx?BookID=133" target="_blank">当代世界经济与政治</a>
        </div>
        <div class="cover_item_price">
            <i><span id="CoverList2_RepeaterUp_ctl02_lblrec">推荐14次</span></i>
            <span id="CoverList2_RepeaterUp_ctl02_lblprice">现价:￥5</span>
        </div>
    </div>
	
	
	<div class="cover_item_box">
        <div class="cover_item_imgbox"><a href="#" target="_blank">
            <img id="CoverList2_RepeaterUp_ctl02_Image1" src="<?=base_url()?>resource/main/8.jpg">
        </a></div>
        <div class="cover_item_name">
            <a href="/BookBook/ShowBook.aspx?BookID=133" target="_blank">当代世界经济与政治</a>
        </div>
        <div class="cover_item_price">
            <i><span id="CoverList2_RepeaterUp_ctl02_lblrec">推荐14次</span></i>
            <span id="CoverList2_RepeaterUp_ctl02_lblprice">现价:￥5</span>
        </div>
    </div>
</div>
<a href="#" class="more">全部推荐-></a>
</div>
</div>
</div>