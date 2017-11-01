<?php
    require './common/common.php';

    //判断session里存的验证码是否和获取的验证码相同
    if($_POST['code'] != $_SESSION['code']){
        $r['res'] = 'invail_code';
        echo json_encode($r);
        exit;
    }
	   unset($_POST['code']);
    $data =$_POST;
	//在数据库查找是否存在该账号
	$row= $db->getOneData($data['obj'], '*', $data['obj'].'_id = "' . $_POST['user_id'].'"');
	if($row){//存在
		$r['result']='id_exist';
		echo json_encode($r);
	}else{//不存在则创建账号
		//密码加密
		$data['passwd']=md5($data['passwd']);
		if($data['obj']=='admin'){
			//管理员注册
		unset($data['obj']);
		$data['admin_id']=$data['user_id'];
		unset($data['user_id']);
		$row=$db->addData('admin', $data);
		}else{
			//用户注册
			unset($data['obj']);
			
			$data['userpic']='./img/1.jpg';
			$data['username']=$data['user_id'];
			$row=$db->addData('user', $data);
			
		}
		if($row){
			$r['result']='success';
			echo json_encode($r);
		}else{
			$r['result']='fail';
			
			echo json_encode($r);
		}
	}




?>