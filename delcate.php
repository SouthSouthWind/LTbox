<?php
require'./common/admin.common.php';
    // $sql = 'DELETE FROM cate WHERE cate_id=' . $_POST['cate_id'];
    // 删除当前分类
   
    if($_POST['goods']){
    	$r1 = $db->delData('goods', 'goods_id=' . $_POST['cate_id']);
    	if($r1){
    		
        echo json_encode(array('result'=>'ok'));
    }else{
        echo json_encode(array('result'=>'fail'));
    }
    }else{
    	$r1 = $db->delData('cate', 'cate_id=' . $_POST['cate_id']);
    //把子分类也删除
    $r2 = $db->delData('cate', 'parent_cate_id=' . $_POST['cate_id']);
    if($r1 && $r2){
        echo json_encode(array('result'=>'ok'));
    }else{
        echo json_encode(array('result'=>'fail'));
    }
    }
    