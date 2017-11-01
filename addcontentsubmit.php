<?php
    require './common/common.php';
 /*$filename = time() . '_' . rand(1000, 2000) . '_' . urlencode($_Post['img']);
    $a = move_uploaded_file($_Post['img'], './goodspic/' . $filename);*/
   // var_dump($a);
   
    $data                   = $_POST;
    //echo  $filename;
    
    $data['admin_id']       = $_SESSION['id'];
  //  $data['realname']       = $_SESSION['realname'];
    $data['updatetimes']    = date('Y-m-d H:i:s');
    
    //在修改信息的时候，会收到$_POST['cate_id']
    if($_POST['cate_id']){
        //修改信息
       // 删除多余的信息
       unset($data['cate_id']);
       $r = $db->updateData('goods', $data, 'goods_id = ' . $_POST['cate_id']);
    }else{
        $data['addtimes']       = date('Y-m-d H:i:s');
        $r = $db->addData('goods', $data);
    }
   if($r){
        echo json_encode(array('result'=>'success'));
    }else{
        echo json_encode(array('result'=>'fail'));
    }

