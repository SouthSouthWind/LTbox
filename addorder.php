<?php
require'./common/admin.common.php';
if($_POST){
	

 $data=$_POST;

// var_dump($data);
 $arr=array();
 
 foreach($data as $key=>$value){
 	//echo $value;
 	$shopcar=$db->getOneData('shopcar','*','shopcar_id="'.$value.'"');
 	//var_dump($shopcar);
 	$goods=$db->getOneData('goods','*','goods_id="'.$shopcar['goods_id'].'"');
 	//var_dump($goods);
 	
 	$user=$db->getOneData('user','*','user_id="'.$_SESSION['id'].'"');
 	$userorder['order_form']=$user['order_form']+1;
 	
 	
 	$addorder['user_id']=$_SESSION['id'];
 	$addorder['admin_id']=$goods['admin_id'];
 	$addorder['goods_id']=$goods['goods_id'];
 	$addorder['count']=$shopcar['count'];
 	$addorder['ordertime']=date('Y-m-d H:i:s');
 	//添加订单
 	$order_id=$db->addData('orderform',$addorder, 1);
 	
 	//增加用户订单数
 	$goods=$db->updateData('goods',$data,'goods_id="'.$shopcar['goods_id'].'"');
 	
 	$count=$goods['goods_total']-$addorder['count'];
 	$selling=$goods['selling']+$addorder['count'];
 	//减少库存
 	$data['count']=$count;
 	$data['selling']=$selling;
 	$user=$db->updateData('user',$userorder,'user_id="'.$_SESSION['id'].'"');
 	
 //删除购物车
 	$shopcar=$db->delData('shopcar','shopcar_id="'.$value.'"');
 	$arr[]=$order_id;
 	
 }

 echo json_encode($arr);
 }else{
 	if($_GET['delorder']){
 		$data['order_id']=$_GET['order_id'];
 		$delorder=$db->delData('orderform',$data);
 	}else if($_GET['cancelorder']){
 		//取消订单
 		
 		
 		$order=$db->getOneData('orderform',"*",'order_id="'.$_GET['order_id'].'"');
 		//获取商品id和数量
 		$goods_id=$order['goods_id'];
 		$count=$order['count'];
 		//删除订单

 		$delorder=$db->delData('orderform','order_id="'.$_GET['order_id'].'"');
 		//减少用户订单数
 		$user=$db->getOneData('user','*','user_id="'.$_SESSION['id'].'"');
 	      $userorder['order_form']=$user['order_form']-1;
 	$user=$db->updateData('user',$userorder,'user_id="'.$_SESSION['id'].'"');
 	      
 		//增加商品库存
 		$goods=$db->getOneData('goods','*','goods_id="'.$goods_id.'"');
 		$count=$goods['goods_total']+$count;
 	   //  $selling=$goods['selling']-$count;
 		$data['goods_total']=$count;
 	 
 		$goods=$db->updateData('goods',$data,'goods_id="'.$goods_id.'"');
	  header('Location: showorder.php?aim='.$_GET['aim']);
 		
 	}else if($_GET['delorder']){
 		
 		
 		
 		//删除订单
 		$data['order_id']=$_GET['order_id'];
 		$delorder=$db->delData('orderform',$data);
 		
	header('Location: showorder.php?aim='.$_GET['aim']);
 		
 	}else if($_GET['receivegoods']){
 		
 		$order=$db->getOneData('orderform',"*",'order_id="'.$_GET['order_id'].'"');
 		//获取商品id和数量
 		$goods_id=$order['goods_id'];
 		$goods=$db->getOneData('goods','*','goods_id="'.$goods_id.'"');
 		
 		//确认收货之后销量增加
 		
 		$data['get_status']=true;
 		$data['selling']=$goods['selling']+$order['count'];
 		$receivegoods=$db->updateData('orderform',$data,'order_id="'.$_GET['order_id'].'"');
 		//echo $_GET['aim'];
	    header('Location: showorder.php?aim='.$_GET['aim']);
 		
 	}
 	

 	
 }	
 
?>