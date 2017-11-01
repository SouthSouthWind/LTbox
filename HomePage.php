<?php 
    require './common/common.php';
	
	require './header.php';
	$goods=$db->getDatas('goods',"*",'goods_total!="0"');
	//var_dump($goods);
	$arr=array();
	function myrandom($min,$max){
		global $arr;
		$ran=rand($min,$max);
		while(in_array($ran, $arr)){
			$ran=rand($min,$max);
		}
		$arr[]=$ran;
	    return $ran;
}
 ?>
<link rel="stylesheet" href="css/HomePage.css" type="text/css">
<link rel="stylesheet" href="fonts/fontCss.css">
<link rel="stylesheet" href="css/jquery.slider.css">

<div class="con">
	<div class="con_top">
		<span class="testSlider3" style="margin-top: 40px;margin-left:40px;display: inline-block;position: absolute; left:-50px; top:-71px; "></span>
		<script src="js/jquery.min3.js"></script>
        <script src="js/jquery.slider3.js"></script>
        <script>
window.onload = function(){
	var currentIndex = 0;
	

	$('.testSlider3').slider({
		width:1021,//852
		height:600,//300
		originPosition:'center'
	});
}
</script>
		<div class="clarity" style="width:1011px; height:600px;position: absolute; top:-30px;">
			<div class="log">

			</div>
			<div class="text">
				打破色彩界限，非凡唇膏配方
			</div>
			<a href="allproducts.php">立即购买</a>
		</div>
		<div class="aside">
			<div class="email">
				<span>邮件订阅</span>
				<input type="email" placeholder="电子邮件地址" />
				<input type="button" value="立即订阅" />
			</div>
			<div class="MCode">
				<span>微信订阅</span>

				<div>
					
				</div>

			</div>
			<div class="block">
				<p>全场任意购物<br />免运费。</p>

				<a href="#">详细说明</a>
				<div class="guarantee">

				</div>

			</div>
		</div>
	</div>
	<div class="con_left">
		<div class="first">
			<div class="red">
				<?php
					
					$ran=myrandom(0,count($goods)-1);
					
					?>
					<a href="detail.php?goods_id=<?=$goods[$ran]['goods_id']?>" class="none">
				
					<img src=<?=$goods[$ran]['img']?> />
				
					<span>经典畅销</span>
					
						<p><?=$goods[$ran]['goods_name']?></p>
				</a>
		
					<a href="goumai.php?goods_id=<?=$goods[$ran]['goods_id']?>" class="more"><span >立即购买</span></a>
					
				
			</div>
			<div class="pink">
				
				<?php
					$ran=myrandom(0,count($goods)-1);
					
					//$ran=rand(0,count($goods)-1);
					
					?>
					<a href="detail.php?goods_id=<?=$goods[$ran]['goods_id']?>" class="none">
				
					<img src=<?=$goods[$ran]['img']?> />
				
					<span>经典畅销</span>
					
						<p><?=$goods[$ran]['goods_name']?></p>
				</a>
		
					<a href="goumai.php?goods_id=<?=$goods[$ran]['goods_id']?>" class="more"><span >立即购买</span></a>
			</div>
		</div>
		<div class="second">
			<div class="second_left">
				<a href="#" class="none">
					<img src="img/LD_HOMEPAGE_667X761.jpg" />
				
					
						<span>文化 / 我们迷恋</span>

						<p>窦靖童</p>
						<span>与古灵精怪的音乐天才窦靖童一起燃爆西方音乐世界</span>
					</a>

					<a href="#" class="more"><span >阅读更多</span></a>
				
			</div>
			<div class="second_right">
				<a href="#" class="none">
					<p>支持多样性</p>
					<p>与爱同在</p>
					<p>与魅可同在</p>
					<p>#保护跨性别者</p>
					<p>#魅可关怀</p>
				</a>
			</div>
		</div>
		<div class="third">
			<a href="#" class="none">
				<img src="img/brandstory.jpg" />
				<p>品牌故事</p>
				<span>我们是领军全球彩妆的权威，但我们不仅如此。了解更多我们是谁和我们代表什么</span>
				<br />
				
			</a>
			<a href="#" class="more"><span >了解更多</span></a>

		</div>
	</div>
	<div class="con_right">
		<div class="first">
			<a href="#"><img src="img/brow_sculpt_collection_carousel_640x540.jpg" /></a>
			<div class="clarity">
				<div class="log">

				</div>
				<div class="text">
					打破色彩界限，非凡唇膏配方
				</div>
				<a href="allproducts.php" class="more">立即购买</a>
			</div>
		</div>
		<div class="second">
			<div class="left">
				<a href="#">
					<img src="img/HOMEPAGE_IG_METALLIC_2.jpg" />
					<img src="img/HOMEPAGE_IG_METALLIC_11.jpg" />
				</a>
			</div>
			<div class="right">
				<a href="#" class="none">
					<img src="img/videos_homepage_bucket_tout.jpg" />
					<p>彩妆视频</p>
					<span>让这些充满灵感的视频来启发你，善用你的美妆产品，从卢爱苏简单的建议到复杂精致的技巧。</span>
					<br />
					
				</a>
				<a href="#" class="more"><span >观赏视频</span></a>
			</div>
		</div>
		<div class="third">
			<div class="left">
				
					<?php
					$ran=myrandom(0,count($goods)-1);
					
					//$ran=rand(0,count($goods)-1);
					
					?>
					<a href="detail.php?goods_id=<?=$goods[$ran]['goods_id']?>" class="none">
				
					<img src=<?=$goods[$ran]['img']?> />
				
					<span>经典畅销</span>
					
						<p><?=$goods[$ran]['goods_name']?></p>
				</a>
		
					<a href="goumai.php?goods_id=<?=$goods[$ran]['goods_id']?>" class="more"><span >立即购买</span></a>
					
				
			</div>
			<div class="right">
					<?php
					$ran=myrandom(0,count($goods)-1);
					
					//$ran=rand(0,count($goods)-1);
					
					?>
					<a href="detail.php?goods_id=<?=$goods[$ran]['goods_id']?>" class="none">
				
					<img src=<?=$goods[$ran]['img']?> />
				
					<span>经典畅销</span>
					
						<p><?=$goods[$ran]['goods_name']?></p>
				</a>
		
					<a href="goumai.php?goods_id=<?=$goods[$ran]['goods_id']?>" class="more"><span >立即购买</span></a>
					
				
			</div>

		</div>

	</div>

</div>


<?php 
require './footer.php'
 ?>

























