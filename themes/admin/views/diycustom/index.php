<?php
   		 $service_category=new ServiceCategory();
       $type=$service_category->get_select('0');
       $type=Util::com_search_item(array(''=>'分类'),$type);
       $this->widget('SearchItems', array( 
          'model_name'=>'ServiceCustom', 
          'user_operate'=>array(
              array(
               'name'=>'增加diy定制',
               'value'=>$this->createUrl("add",array()),
              ),
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
             
             'type'=>array(
               'name'=>'服务分类',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['type'],
               'value'=>$type,
               'htmlOptions'=>array(),
             ),	
             
             'start_date'=>array(
               'name'=>'开始时间',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['start_date'],
               'htmlOptions'=>array(),
             ),
             
             'end_date'=>array(
               'name'=>'结束时间',
               'type'=>'date',//搜索框的类型
               'select'=>$page_params['end_date'],
               'htmlOptions'=>array(),
             ),		
             'user_id'=>array(
               'name'=>'定制用户',
               'type'=>'auto',//搜索框的类型
               'value'=>$search_user,
               'htmlOptions'=>array('serviceUrl'=>$this->createUrl('/main/searchuser')),
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
							'name'=>'type',
							'type'=>'raw',
							'value'=>'$data->show_attribute("type")',
						 ),
						 array(
							'name'=>'user_ids',
							'type'=>'raw',
							'value'=>'$data->show_attribute("user_ids")',
						 ),
						array(
							'name'=>'start_date',
							'type'=>'raw',
							'value'=>'$data->show_attribute("start_date")',
							
						 ),
						array(
							'name'=>'end_date',
							'type'=>'raw',
							'value'=>'$data->show_attribute("end_date")',
							
						 ),
             array(
                'name'=>'describe',
                'type'=>'raw',
                'value'=>'$data->show_attribute("describe")',
             ),
			  
             array(
                'name'=>'price',
                'type'=>'raw',
                'value'=>'$data->show_attribute("price");',
             ),
             array(
                'name'=>'bargain_price',
                'type'=>'raw',
                'value'=>'$data->show_attribute("bargain_price");',
             ),

             array(
                'name'=>'sort',
                'type'=>'raw',
                'value'=>'$data->show_attribute("sort");',
             ),
             array(
                'name'=>'create_id',
                'type'=>'raw',
                'value'=>'$data->show_attribute("create_id")',
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