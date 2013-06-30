<?php 
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'网站套餐',
          //用户操作
          'user_operate'=>array(
              array(
               'name'=>'返回到网站套餐列表',
               'value'=>$this->createUrl("index",array()),
             ),
             array(
				       'name'=>'新增网站套餐',
				       'value'=>$this->createUrl("add",array())
				     ),
          ),
          //增加的内容字段
     'add_datas'=>array(
         'title'=>array(
					'name'=>'标题',
					'type'=>'text',//搜索框的类型
					'value'=>'',
					'htmlOptions'=>array(),
         ), 
         'image'=>array(
					 'name'=>'缩略图',
					 'type'=>'file',
					 'value'=>'',
					 'htmlOptions'=>array(),
			  ),

			 'describe'=>array(
					'name'=>'描述',
					'type'=>'multitext',
					'value'=>'',
					'htmlOptions'=>array(),
			 ),
			 
			 'sdescribe'=>array(
					'name'=>'简短描述',
					'type'=>'multitext',
					'value'=>'',
					'htmlOptions'=>array(),
			 ),

			 'price'=>array(
					'name'=>'价钱',
					'type'=>'number',
					'value'=>'',
					'htmlOptions'=>array(),
			 ), 
			 
			 'bargain_price'=>array(
					'name'=>'优惠价',
					'type'=>'number',
					'value'=>'',
					'htmlOptions'=>array(),
			 ), 
			 
			 'sort'=>array(
					'name'=>'排序',
					'type'=>'number',
					'value'=>'',
					'htmlOptions'=>array(),
			  ),    
    
			),

			 //最下面操作按钮
			'operates'=>array(
				array(
				   
				),
			),
       ));
?>