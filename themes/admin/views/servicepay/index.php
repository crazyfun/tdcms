<?php
       $service_category=new ServiceCategory();
       $type=$service_category->get_select('0');
       $type=Util::com_search_item(array(''=>'分类'),$type);
       $service_type=CV::$service_type;
       $service_type=Util::com_search_item(array(''=>'服务类型'),$service_type);
       
       $pay_status=CV::$pay_status;
       $pay_status=Util::com_search_item(array(''=>'支付状态'),$pay_status);
       
       $this->widget('SearchItems', array( 
          'model_name'=>'ServicePay', 
          'user_operate'=>array(
              array(
              
              ),
          ),
          //搜索的内容字段
          'search_datas'=>array(
             'title'=>array(
               'name'=>'服务标题',
               'type'=>'text',//搜索框的类型
               'select'=>$page_params['title'],
               'value'=>'',
               'htmlOptions'=>array(),
             ),
             
             'service_type'=>array(
               'name'=>'服务类型',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['service_type'],
               'value'=>$service_type,
               'htmlOptions'=>array(),
             ),
             
             'type'=>array(
               'name'=>'服务分类',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['type'],
               'value'=>$type,
               'htmlOptions'=>array(),
             ),	
             
             'status'=>array(
               'name'=>'支付状态',
               'type'=>'select',//搜索框的类型
               'select'=>$page_params['status'],
               'value'=>$pay_status,
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
							'name'=>'服务名称',
							'type'=>'raw',
							'value'=>'$data->ServiceCustom->show_attribute("title")',
						 ),
						 
						array(
							'name'=>'服务类型',
							'type'=>'raw',
							'value'=>'$data->show_attribute("service_type")',
						 ),
           	array(
							'name'=>'服务分类',
							'type'=>'raw',
							'value'=>'$data->ServiceCustom->show_attribute("type")',
						 ),
						 
						 array(
						   'name'=>'定制用户',
							 'type'=>'raw',
							 'value'=>'$data->ServiceCustom->show_attribute("user_ids")',
						 ),
						 
						 array(
						   'name'=>'开始时间',
							 'type'=>'raw',
							 'value'=>'$data->ServiceCustom->show_attribute("start_date")',
						 ),
						 
						 array(
						   'name'=>'结束时间',
							 'type'=>'raw',
							 'value'=>'$data->ServiceCustom->show_attribute("end_date")',
						 ),
						 
						 
             array(
                'name'=>'服务描述',
                'type'=>'raw',
                'value'=>'$data->ServiceCustom->show_attribute("describe")',
             ),
			  
             array(
                'name'=>'价钱',
                'type'=>'raw',
                'value'=>'$data->ServiceCustom->show_attribute("price")',
             ),
             array(
                'name'=>'优惠价',
                'type'=>'raw',
                'value'=>'$data->ServiceCustom->show_attribute("bargain_price")',
             ),

            
             array(
							'name'=>'付款状态',
							'type'=>'raw',
							'value'=>'$data->show_attribute("status")',
						 ),
						 
						 array(
							'name'=>'付款人',
							'type'=>'raw',
							'value'=>'$data->show_attribute("create_id")',
						 ),
             array(
							'name'=>'付款时间',
							'type'=>'raw',
							'value'=>'$data->show_attribute("pay_time")',
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