<?php
require'./common/common.php';

if($_POST){
	//var_dump($_POST);
	$data=$_POST;
	$order=$db->getOneData('orderform','*','order_id="'.$data['comment_order_id'].'"');
	$good=$db->getOneData('goods','*','goods_id="'.$order['goods_id'].'"');
    
	unset($data['comment_order_id']);
	$data['comments_time ']=date('Y-m-d H:i:s');
	$data['user_id']=$_SESSION['id'];
	$data['goods_id']=$order['goods_id'];
	$comment_id=$db->addData('comment',$data,1);
	//echo $comment_id;
	$orderdata['comment_id']=$comment_id;
	$orderdata['comment_status']=true;
	
	//echo '666';
	//var_dump($orderdata);
	$order=$db->updateData('orderform',$orderdata,'order_id="'.$order['order_id'].'"');
	$commentnum=$good['commentnum']+1;
	$gooddata['commentnum']=$commentnum;
	$good=$db->updateData('goods',$gooddata,'goods_id="'.$data['goods_id'].'"');
	header('Location: showorder.php?aim=5');
}
?>