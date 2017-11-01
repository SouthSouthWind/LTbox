<?php 
require './common/common.php';
require './header.php';

 $detail=$db->getOneData('goods',"*",'goods_id="'.$_GET['goods_id'].'"');
 //增加浏览量
 $goods=$db->updateData('goods','views="'.$detail['views'].'"','goods_id="'.$_GET['goods_id'].'"');

 
 $comment=$db->getDatas('comment','*','goods_id="'.$_GET['goods_id'].'"');
 ?>
<link rel="stylesheet" href="css/detail.css" type="text/css">
<div id="detail">
    <div id="img">
    	<img src=<?=$detail['img']?> alt="">
    </div>
    <div id="introduce">
        <div class="introduce" id="up_introduce" >
			<span class="span1"><?=$detail['goods_name']?></span><br><br>
			<span class="span2">MATTE&nbsp;&nbsp;LIPSTICK</span>
			
        </div>
        <hr>
        <div class="introduce" id="middle_introduce">
			<span>完整描述</span>
			<p><?=$detail['detail']?></p>
        </div>
        <div class="introduce" id="enter_introduce">
        	<span class="span3">CHILI</span><br>
        	<span class="span4"><?=$detail['color']?></span><br>
        	<span class="span4">[柔感哑光]</span>
        </div>
        <div class="introduce" id="mac_price">
        	<span class="span4"><?=$detail['model']?>克</span>
        	<span class="price_num">￥<?=$detail['goods_price']?></span>
        </div>
        <div id="in_shopcar">
        	<a href="addshopcar.php?good_id=<?=$detail['goods_id']?>"><span>加入购物车</span></a>
        </div>
    </div> 
    <div id	="mac_color">
    	<div>
    		所有评论:
    	</div>
    	<?php
    		foreach($comment as $key=>$value){
    			//var_dump($value);
    		?>
    	<ul >
    		<li>
       			<p class="comments_tiptle"><?=$value['comments_title']?></p>
    			<p class="comments_content"><?=$value['content']?></p>
    			<p class="comments_time"><?=$value['comments_time']?></p>
       		</li>
    	</ul>
    	<?php
    	}
    		?>
    </div>   
</div>


<?php 
    require './footer.php';
?>