<?php 
require'./common/admin.common.php';
require './header.php';
$good=$db->getOneData('goods','*','goods_id='.$_GET['goods_id']);

 ?>
<link rel="stylesheet" href="css/shouye.css">

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr-custom-v2.7.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var $miaobian=$('.Xcontent08>div');
	var $huantu=$('.Xcontent06>img');
	var $miaobian1=$('.Xcontent26>div');
	$miaobian.mousemove(function(){miaobian(this);});
	$miaobian1.click(function(){miaobian1(this);});
	function miaobian(thisMb){
		for(var i=0; i<$miaobian.length; i++){
			$miaobian[i].style.borderColor = '#dedede';
		}
		thisMb.style.borderColor = '#cd2426';

		$huantu[0].src = thisMb.children[0].src;
	}
	function miaobian1(thisMb1){
		for(var i=0; i<$miaobian1.length; i++){
			$miaobian1[i].style.borderColor = '#dedede';
		}
//		thisMb.style.borderColor = '#cd2426';
		$miaobian.css('border-color','#dedede');
		thisMb1.style.borderColor = '#cd2426';
		$huantu[0].src = thisMb1.children[0].src;
	}
			$(".Xcontent33").click(function(){
			var value=parseInt($('.input').val())+1;
			console.log($('#goods_total').val());
			if(value >$('#goods_total').val() ){
				value=$('#goods_total').val();
				alert('已达到最大数量');
			}
       		$('.input').val(value);
		})

	$(".Xcontent32").click(function(){	
		var num = $(".input").val()
		if(num>0){
			$(".input").val(num-1);
		}			
		
	})

})
</script>
	

</head>

<body>
<div class="Xcontent" style="position: absolute; top:50px;">
	<input type="hidden" name="goods_total" id="goods_total" value=<?=$good['goods_total']?>  />
	<input type="hidden" name="goods_id" id="goods_id" value=<?=$good['goods_id']?>  />
		<ul class="Xcontent01">
			
				<div class="Xcontent06" ><img  src=<?=$good['img']?> /></div>
				<ol class="Xcontent08">
					<div class="Xcontent07" ><img src="images/shangpinxiangqing/x11.jpg"/></div>
					<div class="Xcontent09"><img src="images/shangpinxiangqing/x22.jpg"/></div>
					<div class="Xcontent10"><img src="images/shangpinxiangqing/x33.jpg"/></div>
					<div class="Xcontent11"><img src="images/shangpinxiangqing/x44.jpg"/></div>
					<div class="Xcontent12"><img src=<?=$good['img']?> /></div>
				</ol>
				<ol class="Xcontent13">
					<div class="Xcontent14"><a href="#"><p><?=$good['goods_name']?></p></a></div>
					<div class="Xcontent15"><img src="images/shangpinxiangqing/X11.png"></div>

					<div class="Xcontent17">
						<p class="Xcontent18">售价</p>
						<p class="Xcontent19">￥<span><?=$good['goods_price']?></span></p>
						<div class="Xcontent20">
							<p class="Xcontent21">促销</p>
							<img src="images/shangpinxiangqing/X12.png">
							<p class="Xcontent22">领610元新年礼券，满再赠好礼</p>
						</div>
						<div class="Xcontent23">
							<p class="Xcontent24">服务</p>
							<p class="Xcontent25">30天无忧退货&nbsp;&nbsp;&nbsp;&nbsp;       48小时快速退款 &nbsp;&nbsp;&nbsp;&nbsp;        满88元免邮</p>
						</div>
						
					</div>
					<div class="Xcontent26">
						<p class="Xcontent27">颜色</p>
						<div class="Xcontent28"><img  src="images/shangpinxiangqing/x22.jpg"></div>
							<div class="Xcontent29"><img  src="images/shangpinxiangqing/x33.jpg"></div>
					</div>
					<div class="Xcontent30">
						<p class="Xcontent31">数量</p>
						<div class="Xcontent32"><img src="images/shangpinxiangqing/X15.png"></div>
						<form>	
            <input class="input" id='count' value="1"></form>
						<div class="Xcontent33"><img src="images/shangpinxiangqing/16.png"></div>
					</div>
					<div class="Xcontent34"><a id='toorderform' ><img src="images/shangpinxiangqing/X17.png" /></a></div>
					<div class="Xcontent35"><a  id='toshopcar' ><img src="images/shangpinxiangqing/X18.png"/></a></div>
				
			</ol>
		
			
			
		</ul>
		
	</div>
</body>
<script>

//$('#toshopcar').attr("href","addshopcar.php?goods_id="+$('#goods_id').val()+"&count="+$('#count').val());

</script>
</html>
