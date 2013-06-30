<?php
  		 $gongyi_status=Util::com_search_item(array(''=>'处理状态'),CV::$gongyi_status);
       $this->widget('SearchItems', array( 
          'model_name'=>'ServiceCustom', 
          'user_operate'=>array(
              array(
               
              ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
             'company'=>array(
               'name'=>'机构名称',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['company'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             
              'contacter'=>array(
               'name'=>'联系人',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['contacter'],
               'value'=>$type,
               'htmlOptions'=>array(),
             ),
             
             'status'=>array(
               'name'=>'回复状态',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['status'],
               'value'=>$gongyi_status,
               'htmlOptions'=>array(),
             ),
             
              'start_time'=>array(
               'name'=>'提交开始时间',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['start_time'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'end_time'=>array(
               'name'=>'提交结束时间',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['end_time'],
               'value'=>'',
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
							'name'=>'company',
							'type'=>'raw',
							'value'=>'$data->company',
						 ),
						array(
							'name'=>'contacter',
							'type'=>'raw',
							'value'=>'$data->show_attribute("contacter")',
						 ),
         
             array(
                'name'=>'sex',
                'type'=>'raw',
                'value'=>'$data->show_attribute("sex")',
             ),
             
              array(
                'name'=>'contacter_phone',
                'type'=>'raw',
                'value'=>'$data->show_attribute("contacter_phone")',
             ),
             
             array(
                'name'=>'contacter_cellphone',
                'type'=>'raw',
                'value'=>'$data->show_attribute("contacter_cellphone")',
             ),
             
              array(
                'name'=>'position',
                'type'=>'raw',
                'value'=>'$data->show_attribute("position")',
             ),
             
             array(
                'name'=>'status',
                'type'=>'raw',
                'value'=>'$data->show_attribute("status")',
             ),
			  
             array(
                'name'=>'operate_time',
                'type'=>'raw',
                'value'=>'$data->show_attribute("operate_time");',
             ),
             
             array(
                'name'=>'create_time',
                'type'=>'raw',
                'value'=>'$data->show_attribute("create_time");',
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