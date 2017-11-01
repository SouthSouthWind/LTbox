<?php
require './common/common.php';
require './header.php';

?>

<?php
 $data=$_GET;
$pagenum=8;
 //求总页数
 $sql='SELECT count(goods_id) AS total FROM goods WHERE goods_name LIKE "%'.$data['txt'].'%"';
//echo $sql;
		    $r= $db->dblink->query($sql);
		    $total=$r->fetch_array(MYSQLI_ASSOC)['total'];
	 if($total==0){
?>

	 	<div class="nosearch"> 对不起，没找到哦~~</div>
	 		
	 	</div>
<?php	 	
	 	exit;
	 }else{
	 	
	    	
		    $totalpage=ceil($total/$pagenum);
		    
 $page=$_GET['page']?$_GET['page']:1;

//判断页数
//小于1则等于1
if($page<1){
	$page=1;
}

if($page>$totalpage){
	$page=$totalpage;
}

 //$sql='SELECT count(goods_id) AS total FROM goods WHERE goods_name LIKE "%'.$data['txt'].'%"';
$sql = 'SELECT * FROM goods WHERE goods_name LIKE "%'.$data['txt'].'%" LIMIT '.($page-1)*$pagenum.','.$pagenum;
$r=$db->dblink->query($sql);

?>
<div class="searchbody">
		<a href="searchgoods.php?page=<?=($page-1)?>&txt=<?=$data['txt']?>" class="prePage"> < </a>	
<table >
<?php

foreach($r as $key=>$value){
	
	if($key%4==0){
		
		echo '<tr>';
	}
	
 ?>
	<td class="showgoods">
		<img src="<?=$value['img']?>" class='searchimg'/>
		<span class="goods_name"><?=$value['goods_name']?></span>
		<span class="goods_price">价格：<?=$value['goods_price']?>元</span>
	</td>
<?php	
	if(($key+1)%4==0){
		echo '</tr>';
	}
}
 ?>
</table>
   <a  href="searchgoods.php?page=<?=($page+1)?>&txt=<?=$data['txt']?>" class="nextPage">></a>
   
</div>

<?php
}
		require './footer.php';	
?>