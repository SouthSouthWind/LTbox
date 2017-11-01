<?php 
require'./common/admin.common.php';
require'./header.php';
require  './beside.php';

  $a=$db->getDatas('address','*','user_id="'.$_SESSION['id'].'"');

 ?>
<link rel="stylesheet" href="css/goods_place.css" type="text/css">
<div class="manage_place">
<div class="dose_have">
	<ul id="placeul">
		<?php
			foreach($a as $key=>$value){
				
			
			?>
		<li >
		<div>
			<span class="showusername"><?=$value['receiver']?></span>
			<span class="dose_have_left telshow"><?=$value['receivetel']?></span>
			<p class="showaddress"><?=$value['address']?></p>
			
			<button class="dose_have_left changeplace"  address_id=<?=$value['address_id']?> edit=true>编辑</button>
			<button class="delplace"  address_id=<?=$value['address_id']?> del=true > 删除</button>
		</div>
		</li>
		
		<?php
		}
			?>
		
	</ul>
</div>

<div class="goods_place">
	<p>新增收货地址:</p>
	<form id="changeaddress">
		<lable>
			姓名：<input type="text" class="place_inputbox" name="receiver" id='receiver'>
		</lable>
		<lable>
			电话：<input type="num" class="place_inputbox" name="receivetel" id="receivetel">
		</lable>
			
		<lable>
			地址：<input type="text" class="place_inputbox" name="address" id="address">
		</lable>
				
		
			<input type="button" class="place_save" value="保存"  id="saveplace">
		
	</form>
</div>
</div>
<?php
require './footer.php';	
?>