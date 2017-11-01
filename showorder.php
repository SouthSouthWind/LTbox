<?php
require'./common/admin.common.php';
require './header.php';
require './beside.php';

$data=$_GET;
$pagenum=4;
	
 if($_GET['aim']==1){
          
          	$sql='SELECT count(order_id) AS total FROM orderform WHERE get_status=true AND user_id="'.$_SESSION['id'].'"';
          
	}else if($_GET['aim']==2){
		
          	$sql='SELECT count(order_id) AS total FROM orderform WHERE isPay=false AND user_id="'.$_SESSION['id'].'"';
		
		
	}else if($_GET['aim']==3){
          	$sql='SELECT count(order_id) AS total FROM orderform WHERE isPay=true AND send_status=false AND user_id="'.$_SESSION['id'].'"';
		
		
	}
	else if($_GET['aim']==4){
          	$sql='SELECT count(order_id) AS total FROM orderform WHERE isPay=true AND send_status=true AND get_status=false AND user_id="'.$_SESSION['id'].'"';
		//echo $sql;
		
	}else if($_GET['aim']==5){
          	$sql='SELECT count(order_id) AS total FROM orderform WHERE isPay=true AND send_status=true AND get_status=true AND comment_status=false AND user_id="'.$_SESSION['id'].'"';
		
	}
	    
	    $r= $db->dblink->query($sql);
		 $total=$r->fetch_array(MYSQLI_ASSOC)['total'];
	   $totalpage=ceil($total/$pagenum);

	   $page=$_GET['page']?$_GET['page']:1;
if($page<1){
	$page=1;

}
if($page>$totalpage){
	$page=$totalpage;
	
}
if($_GET['aim']==1){
       $sql='SELECT * FROM orderform WHERE get_status=true AND user_id="'.$_SESSION['id'].'" ORDER By ordertime DESC LIMIT '.($page-1)*$pagenum.','.$pagenum; 
	
}else if($_GET['aim']==2){
		
       $sql='SELECT * FROM orderform WHERE isPay=false AND user_id="'.$_SESSION['id'].'" ORDER By ordertime DESC LIMIT '.($page-1)*$pagenum.','.$pagenum; 
        // echo $sql;
	}else if($_GET['aim']==3){
       $sql='SELECT * FROM orderform WHERE isPay=true AND send_status=false AND user_id="'.$_SESSION['id'].'" ORDER By ordertime DESC LIMIT '.($page-1)*$pagenum.','.$pagenum; 
         
	}else if($_GET['aim']==4){
       $sql='SELECT * FROM orderform WHERE isPay=true AND send_status=true AND get_status=false AND user_id="'.$_SESSION['id'].'" ORDER By ordertime DESC LIMIT '.($page-1)*$pagenum.','.$pagenum; 
        
		
	}else if($_GET['aim']==5){
       $sql='SELECT * FROM orderform WHERE isPay=true AND send_status=true AND get_status=true AND comment_status=false  AND user_id="'.$_SESSION['id'].'" ORDER By ordertime DESC LIMIT '.($page-1)*$pagenum.','.$pagenum; 
         
	}

	//echo $sql;
	$order= $db->dblink->query($sql);	   	
          
          
?>
   
<div class="showorder">
	<?php
		if($order){
			
		
	foreach($order as $key=>$value)
	{
		
		$goods=$db->getOneData('goods','*','goods_id="'.$value['goods_id'].'"');
		//var_dump($goods) ;
	?>	
	
	 <ul class="order" >
                    <li class="time">
                      
                      <?=$value['odertime']?>
                    </li>
                    <li class="show_img">
                        <div class="list_img"><a href="detail.php?goods_id=<?=$goods['goods_id']?>"><img  src=<?=$goods['img']?> /></a></div>
                        <div class="show_name"><a href="detail.php?goods_id=<?=$goods['goods_id']?>"><?=$goods['goods_name']?></a></div>
                    </li>
                    <li class="show_model">
                        <p>规格：<?=$goods['model']?></p>
                        <p>尺寸：16*16*3(cm)</p>
                    </li>
                    <li class="show_price">
                        <p class="price">￥<?=$goods['goods_price']?></p>
                    </li>
                    <li class="show_count">
                        
                           
                            <p><?=$goods['count']?></p>
                            
                       
                    </li>
                    <li class="show_allprice">
                        <p >￥<?=$goods['goods_price']*$value['count']?></p>
                    </li>
                    <?php
                    	
                    	if($_GET['aim']==1){
                   ?>
                     <li class="delorder" order_id='<?=$value['order_id']?>' >
                        <p class="del"><a href="addorder.php?order_id=<?=$value['order_id']?>&delorder=true&aim=1" class="delBtn "  >删除订单</a></p>
                     </li>
                  <?php
     				}
     				else if($_GET['aim']==2){
       				?>
       				<li class="delorder" order_id='<?=$value['order_id']?>' >
                        <p class="del"><a href="addorder.php?order_id=<?=$value['order_id']?>&cancelorder=truee&aim=2" class="delBtn"  >取消订单</a></p>
        			</li>
        			<li >
        	
               		 <p class="del"><a href="pay.php?order_id='<?=$value['order_id']?>'" class="delBtn" order_id=<?=$value['order_id']?> >前往付款</a></p>
          			</li>
       				<?php
       	}
					else if($_GET['aim']==3){

       				 ?> 
        			<li class="delorder">
                    <p class="del"><a href="addorder.php?order_id=<?=$value['order_id']?>&cancelorder=truee&aim=3" class="delBtn"  >申请退款</a></p>
         			 </li>
				<?php
					}
					else if($_GET['aim']==4){

       				 ?> 
        			<li class="receivegoods">
                    <p class="del"><a href="addorder.php?order_id=<?=$value['order_id']?>&receivegoods=truee&aim=4" class="delBtn">确认收货</a></p>
         			 </li>
				<?php
				}else if($_GET['aim']==5){
  			?>
       <li class="comments" order_id='<?=$value['order_id']?>'>
        <p class="del"><a  class="delBtn"  >立即评价</a></p>
          </li>
         
  <?php				
	}
		?>
	 </ul> 
	<?php
	}
	}
	
		?>
		 <ul class="changeorderpage">

          	<li class='preorder'>
        <a href="showorder.php?page=<?=($page-1)?>&aim=<?=$_GET['aim']?>" class='preshopcar'>上一页</a>
          		
          	</li>
          	<li class='nextorder'>
        <a href="showorder.php?page=<?=($page+1)?>&aim=<?=$_GET['aim']?>" >下一页</a>
          		
          	</li>
          </ul>  
      <div class="inputcomment">
      	<form action="comment.php" method="post">
      		
      		
      	
        <div class="titlediv"> 
        	标题：
           <input type="text" id="model" name="comments_title" class="comments_title" />
        </div> 
      <div class="contentdiv"> 
        	内容：
        	<textarea name="content" class="content"></textarea>
           
        </div> 
        <div class="commetnbtn">
        	<input type="hidden" name="comment_order_id" id="comment_order_id" value="" />
        <input type="submit"  id="submitcomment" value="提交" />
        <input type="button"  id="cancelsubmit" value="取消" />
        
        </form>
       </div>
                                        
          </div>
 </div>
          	
