<?php 
require'./common/admin.common.php';
	
    require './header.php';
   
    $data=$_GET;
    	
   // var_dump($data);


?>
 
<link rel="stylesheet" href="css/tasp.css" />
<link href="css/orderconfirm.css" rel="stylesheet" />
<script>
	 	var price=0;
</script>

<div id="page">

 <div id="content" class="grid-c">

  <div id="address" class="address" style="margin-top: 20px;" data-spm="2">
<form name="addrForm" id="addrForm" action="#">

<ul id="address-list" class="address-list">
	<?php
		$address=$db->getDatas('address','*','user_id="'.$_SESSION['id'].'"');
		foreach($address as $key=>$value){
			
		
		?>
     <li>

 <span class="marker-tip">寄送至</span>
   <div class="address-info">


 <label class="user-address">
 	<?if($key==0){?>
 <input type="radio" name="address" class="J_MakePoint radiotype" checked="checked" value=<?=$value['address_id']?> />
 		
 	<?}else{?>
 <input name="address" class="J_MakePoint radiotype" type="radio" value=<?=$value['address_id']?> />
 	<?}?>
         <?=$value['address']?> (<?=$value['receiver']?> 收) <em><?=$value['receivetel']?></em>
  </label>
 </div>
    </li>
    <?php
    }
    	?>
    </ul>
<div class="address-bar">
 <a href="goods_place.php" class="new">使用新地址</a>
 </div>

</form>
</div>

  <div>
 <h3 class="dib">确认订单信息</h3>
 <table cellspacing="0" cellpadding="0" class="order-table" id="J_OrderTable" summary="统一下单订单信息区域">
 <caption style="display: none">统一下单订单信息区域</caption>
 <thead>
 <tr>
 <th class="s-title">商品<hr/></th>
 <th class="s-price">单价(元)<hr/></th>
 <th class="s-amount">数量<hr/></th>

 <th class="s-total">小计(元)<hr/></th>
 </tr>
 </thead>
     


<tbody data-spm="3" class="J_Shop">
<tr class="first"><td colspan="5"></td></tr>
<?php
	foreach($data as $value){
		if(is_numeric($value)){
			
                    $value = '"' . addslashes($value) . '"';
                
			
		}
		
		$order=$db->getOneData('orderform','*','order_id='.$value);
		$goods=$db->getOneData('goods','*','goods_id="'.$order['goods_id'].'"');
		
	?>
 
   <input type="hidden" name="order_id"  value=<?=$value?> /> 	

    
<tr class="item">	 
 <td class="s-title">
   <a href="#" target="_blank" >
     <img src=<?=$goods['img']?> class="itempic"><span class="title J_MakePoint" data-point-url="http://log.mmstat.com/buy.1.5"><?=$goods['goods_name']?></span></a>

   <div class="props">
     <span>颜色:<?=$goods['color']?> </span>
   
         </div>

 </div>
     </td>
 <td class="s-price">
   
  <span class='price '>
  <?=$goods['goods_price']?>
  </span>

</td>
 <td class="s-amount" >
 <?=$order['count']?>
 
 </td>

 <td class="s-total">
   
   <span class='price '>
 <em class="style-normal-bold-red J_ItemTotal " id='goodprice'><?=$goods['goods_price']*$order['count']?></em>
 
  </span>

 </td>
	</tr>	
<?php
  }
	?>

</tbody>
  <tfoot>
 <tr>
 <td colspan="5">

<div class="order-go" data-spm="4">
<div class="J_AddressConfirm address-confirm">
 <div class="kd-popup pop-back" style="margin-bottom: 40px;width: 200px;border: 0;">
 
         <a href="shopcar.php" class="back" >返回购物车</a>
       <span  class=" btn-go" id="submitform" >提交订单</span>
  </div>
 </div>

 </div>
 </td>
 </tr>
 </tfoot>
 </table>
</div>
  

</div>


</div>

