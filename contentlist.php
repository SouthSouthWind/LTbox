<?php 
require'./common/admin.common.php';
	
    require './head.php';
    //获取全部的一级内容:左连接查询
    $goodslist = $db->getDatas('goods', '*');
?>
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme Color:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     内容列表
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">首页</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">内容管理</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           内容列表
                       </li>
                       <li class="pull-right search-wrap">
                           <form action="search_result.html" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text">
                                   <button class="btn" type="button"><i class="icon-search"></i> </button>
                               </div>
                           </form>
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

            <div id="page-wraper">
                <div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN BASIC PORTLET-->
                        <div class="widget grey">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> 内容列表</h4>
                            </div>
                            <div class="widget-body">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                    <tr>
                                        <th><i class="icon-bullhorn"></i> 品名</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> id</th>
                                    <!-- <th class="hidden-phone"><i class="icon-question-sign"></i> 一级分类</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 二级分类</th>-->
                                        <th><i class="icon-bookmark"></i> 添加时间</th>
                                        <!--<th><i class="icon-bookmark"></i> 操作人</th>-->
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                        foreach ($goodslist as $key =>$value){
                                    ?>
                                        <tr id="tr_<?=$value['goods_id'];?>">
                                            <td class="hidden-phone"><?=$value['goods_name'];?></td>
                                            <td><a href="#"><?=$value['goods_id'];?></a></td>
                                            <td><?=$value['addtimes'];?></td>
                                            <td>
                                                <a href="goodschange.php?goods_id=<?=$value['goods_id'];?>" class="btn btn-primary"><i class="icon-pencil"></i></a>
                                                <button type="button" goods=true cate_id="<?=$value['goods_id'];?>" class="btn btn-danger delcate"><i class="icon-trash "></i></button>
                                            </td>
                                        </tr>
                                         <?php
                                        }
                                    ?>
                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END BASIC PORTLET-->
                    </div>
                </div>

            </div>

            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
    <?php 
        require './foot.php';
    ?>