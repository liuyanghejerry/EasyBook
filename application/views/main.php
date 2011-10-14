<div id="main-box">
<div class="white-box">
<?=$hello;?>

<ul id="slideshow">
		<li>
			<h3>TinySlideshow v1</h3>
			<span>resource/main/orange-fish.jpg</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut urna. Mauris nulla. Donec nec mauris. Proin nulla dolor, bibendum et, dapibus in, euismod ut, felis.</p>
			<a href="#"><img src="resource/main/orange-fish-thumb.jpg" alt="Orange Fish" /></a>
		</li>
		<li>
			<h3>Sea Turtle</h3>
			<span>resource/main/sea-turtle.jpg</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut urna. Mauris nulla. Donec nec mauris. Proin nulla dolor, bibendum et, dapibus in, euismod ut, felis.</p>
			<img src="resource/main/sea-turtle-thumb.jpg" alt="Sea Turtle" />
		</li>
		<li>
			<h3>Red Coral</h3>
			<span>resource/main/red-coral.jpg</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut urna. Mauris nulla. Donec nec mauris. Proin nulla dolor, bibendum et, dapibus in, euismod ut, felis.</p>
			<a href="#"><img src="resource/main/red-coral-thumb.jpg" alt="Red Coral" /></a>
		</li>
		<li>
			<h3>Coral Reef</h3>
			<span>resource/main/coral-reef.jpg</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut urna. Mauris nulla. Donec nec mauris. Proin nulla dolor, bibendum et, dapibus in, euismod ut, felis.</p>
			<a href="#"><img src="resource/main/coral-reef-thumb.jpg" alt="Coral Reef" /></a>
		</li>
		<li>
			<h3>Blue Fish</h3>
			<span>resource/main/blue-fish.jpg</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut urna. Mauris nulla. Donec nec mauris. Proin nulla dolor, bibendum et, dapibus in, euismod ut, felis.</p>
			<img src="resource/main/blue-fish-thumb.jpg" alt="Blue Fish" />
		</li>
		<li>
			<h3>TinySlideshow v.2</h3>
			<span>resource/main/yellow-fish.jpg</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut urna. Mauris nulla. Donec nec mauris. Proin nulla dolor, bibendum et, dapibus in, euismod ut, felis.</p>
			<a href="#"><img src="resource/main/yellow-fish-thumb.jpg" alt="Yellow Fish" /></a>
		</li>
		<li>
			<h3>Squid</h3>
			<span>resource/main/squid.jpg</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut urna. Mauris nulla. Donec nec mauris. Proin nulla dolor, bibendum et, dapibus in, euismod ut, felis.</p>
			<a href="#"><img src="resource/main/squid-thumb.jpg" alt="Squid" /></a>
		</li>
		<li>
			<h3>Small Fish</h3>
			<span>resource/main/small-fish.jpg</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut urna. Mauris nulla. Donec nec mauris. Proin nulla dolor, bibendum et, dapibus in, euismod ut, felis.</p>
			<a href="#"><img src="resource/main/small-fish-thumb.jpg" alt="Small Fish" /></a>
		</li>
	</ul>
	<div id="wrapper">
		<div id="fullsize">
			<div id="imgprev" class="imgnav" title="Previous Image"></div>
			<div id="imglink"></div>
			<div id="imgnext" class="imgnav" title="Next Image"></div>
			<div id="image"></div>
			<div id="information">
				<h3></h3>
				<p></p>
			</div>
		</div>
		<div id="thumbnails">
			<div id="slideleft" title="Slide Left"></div>
			<div id="slidearea">
				<div id="slider"></div>
			</div>
			<div id="slideright" title="Slide Right"></div>
		</div>
	</div>
	<script type="text/javascript" src="resource/main/slide.js"></script>
	<script type="text/javascript">
	$('slideshow').style.display='none';
	$('wrapper').style.display='block';
	var slideshow=new TINY.slideshow("slideshow");
	window.onload=function(){
		slideshow.auto=true;
		slideshow.speed=5;
		slideshow.link="linkhover";
		slideshow.info="information";
		slideshow.thumbs="slider";
		slideshow.left="slideleft";
		slideshow.right="slideright";
		slideshow.scrollSpeed=4;
		slideshow.spacing=5;
		slideshow.active="#fff";
		slideshow.init("slideshow","image","imgprev","imgnext","imglink");
	}
</script>
</div>

</div>

</body>
</html>