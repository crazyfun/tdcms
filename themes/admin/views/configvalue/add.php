 <?php 
	   $config_value_type=Util::com_search_item(array(''=>'变量类型'),CV::$config_value_type);
       $this->widget('AddItems', array( 
          'model'=>$model, 
          'name'=>'增加变量',
          //用户操作
          'user_operate'=>array(
             array(
               'name'=>'返回到变量管理',
               'value'=>$this->createUrl("index",array()),
             ),
             array(
				       'name'=>'新增变量',
				       'value'=>$this->createUrl("add",array())
				     ),
          ),
          //增加的内容字段
      'add_datas'=>array(
		    
		    'type'=>array(
					'name'=>'类型',
					'type'=>'select',
					'value'=>$config_value_type,
					'htmlOptions'=>array(),
     		 ),  
      'name'=>array(
					'name'=>'变量名称',
					'type'=>'text',
					'value'=>'',
					'htmlOptions'=>array(),
     	), 
     	'value'=>array(
        'name'=>'变量值',
        'type'=>'text',
        'value'=>'',
        'htmlOptions'=>array(),
       ),     
      'extern_value'=>array(
        'name'=>'附加值',
        'type'=>'text',
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