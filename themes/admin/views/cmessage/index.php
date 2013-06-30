<?php
       $config_values=ConfigValues::model();
	     $message_type=$config_values->get_ralation_values("6");
	     $message_type=Util::com_search_item(array(''=>'选择类别'),$message_type);
	     $message_status=Util::com_search_item(array(''=>'审核状态'),CV::$message_status);
       $this->widget('SearchItems', array( 
          'model_name'=>'ContacterMessage', 
          'user_operate'=>array(
             
          ),
          //搜索的内容字段
      'search_datas'=>array(
         'title'=>array(
               'name'=>'标题',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['title'],
               'value'=>'',
               'htmlOptions'=>array(),
         ),
           
        'contacter'=>array(
						'name'=>'联系人',
						'type'=>'text',
						'select'=>$page_params['contacter'],
						'value'=>'',
						'htmlOptions'=>array(),
			 	 ),

			 	'message_type'=>array(
						'name'=>'类型',
						'type'=>'select',
						'select'=>$page_params['message_type'],
						'value'=>$message_type,
						'htmlOptions'=>array(),
			 	 ),
			 	 'status'=>array(
						'name'=>'审核状态',
						'type'=>'select',
						'select'=>$page_params['status'],
						'value'=>$message_status,
						'htmlOptions'=>array(),
			 	 ),
			 	 
      ), 
     'dataprovider'=>$dataProvider,
          //列表显示的字段
      'attributes'=>array(
        array(
         'name'=>'id',
         'type'=>'raw',//字段的属性 参考yii
         'value'=>'$data->id',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
        ),
			 array(
				'name'=>'title',
				'type'=>'raw',
				'value'=>'$data->title',
			 ),
    	 array(
         'name'=>'message_type',
         'type'=>'raw',
         'value'=>'$data->show_attribute("message_type")',
     	), 
			array(
				'name'=>'contacter',
				'type'=>'raw',
				'value'=>'$data->show_attribute("contacter")',
			),
			array(
				'name'=>'contacter_sex',
				'type'=>'raw',
				'value'=>'$data->show_attribute("contacter_sex")',
			),
			array(
				'name'=>'contacter_phone',
				'type'=>'raw',
				'value'=>'$data->show_attribute("contacter_phone")',
			),
			array(
				'name'=>'contacter_email',
				'type'=>'raw',
				'value'=>'$data->show_attribute("contacter_email")',
			),
			array(
				'name'=>'contacter_msn',
				'type'=>'raw',
				'value'=>'$data->show_attribute("contacter_msn")',
			),
			array(
				'name'=>'contacter_qq',
				'type'=>'raw',
				'value'=>'$data->show_attribute("contacter_qq")',
			),
			array(
				'name'=>'contacter_address',
				'type'=>'raw',
				'value'=>'$data->show_attribute("contacter_address")',
			),
			array(
				'name'=>'contacter_web',
				'type'=>'raw',
				'value'=>'$data->show_attribute("contacter_web")',
			),
			array(
				'name'=>'comment',
				'type'=>'raw',
				'value'=>'$data->show_attribute("comment")',
			),
			array(
				'name'=>'replay',
				'type'=>'raw',
				'value'=>'$data->show_attribute("replay")',
			),
			array(
				'name'=>'replay_id',
				'type'=>'raw',
				'value'=>'$data->show_attribute("replay_id")',
			),
			array(
				'name'=>'status',
				'type'=>'raw',
				'value'=>'$data->show_attribute("status")',
			),
      array(
				'name'=>'replay_time',
				'type'=>'raw',
				'value'=>'$data->show_attribute("replay_time")',
			),
     array(
				'name'=>'create_time',
				'type'=>'raw',
				'value'=>'$data->show_attribute("create_time")',
			),
    	array(
         'name'=>'操作',
         'type'=>'raw',
          'value'=>'$data->get_operate()',
      ),    
     ),
      //批量操作按钮
      'operates'=>array(
         array(
               'name'=>'删除所有',
               'value'=>'javascript:batch_operate(\''.$this->createUrl("delete",array()).'\');'
             ),
          ),
         //是否需要全选列
       'checked_all'=>true,
        //是否使用ajax翻页
        'ajax'=>false,    
    ));
?>