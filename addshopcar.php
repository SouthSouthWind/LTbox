<?php
require'./common/admin.common.php';

//require './header.php';

?>
<?php
	
	if($_GET){
		$data=$_GET;
	//echo $_GET;	
	$getgood=$db->getOneData('goods','*','goods_id="'.$_GET['goods_id'].'"');
	//echo $SESSION['id'];
	$data['user_id']=$_SESSION['id'];
	$data['img']=$getgood['img'];
	$data['model']=$getgood['model'];
	$data['color']=$getgood['color'];
	$data['goods_name']=$getgood['goods_name'];
	$data['goods_price']=$getgood['goods_price'];
	$shopcar=$db->addData('shopcar',$data);
	//header('Location:shopcar.php');
	if($shopcar){
		$r['result']='success';
		echo json_encode($r);
	}else{
		$r['result']='fail';
		echo json_encode($r);
	}
	}
	else if($_POST['del']){
		$delshopcar=$db->delData('shopcar','shopcar_id="'.$_POST['shopcar_id'].'"');
	}
	else{
		$data=$_POST;
		unset($data['shopcar_id']);
	$addshopcar=$db->updateData('shopcar',$data,'shopcar_id="'.$_POST['shopcar_id'].'"');	
	}
		
	
	
?>