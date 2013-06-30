<?php 
   $pay_status=CV::$pay_status;
   $pay_status=Util::com_search_item(array(''=>'支付状态'),$pay_status);
   $service_category=new ServiceCategory();
   $type=$service_category->get_select('23');
   $type=Util::com_search_item(array(''=>'服务分类'),$type);
?>
<div class="memright">
                 	<div class="memnotice"><span class="memtitle">【通知】</span>您有<font color="#ff0000"><?php $messages=Messages::model(); echo $messages->get_unread_message();?></font>条未读消息<a href="<?php echo $this->createUrl("user/message");?>" class="memnoa">查看详情</a></div>
                    <div class="memrmian">
                        <div class="memhy">
                        	
  <?php
	  $form=$this->beginWidget('EActiveForm', array(
	        'id'=>'search_form',
          'action'=>"",
	        'enableAjaxValidation'=>false,
	        'htmlOptions'=>array('id'=>'search_form','enctype'=>'multipart/form-data'),
         ));
   ?>
                        	<div class="memhy_title">
                       	        <div class="memhy_list">服务名称：<?php echo EHtml::createText("title",$page_params['title'],array());?></div>
                                <div class="memhy_list">支付状态：<?php echo EHtml::createSelect("status",$page_params['status'],$pay_status,array());?></div>
                                <div class="memhy_list">服务分类：<?php echo EHtml::createSelect("type",$page_params['type'],$type,array());?></div>
                                <div class="memhy_list"><?php echo CHtml::imageButton($cssPath."/images/bnt_ss.gif");?></div>
                            </div>
  <?php $this->endWidget(); ?>                           
                            
                            <div class="memhy_box">
                            	  <?php 
  $this->widget('zii.widgets.grid.CGridView',array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
            array(
                'name'=>'服务名称',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->show_attribute("service_id")',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
                'name'=>'服务分类',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->ServiceCustom->show_attribute("type")',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
                'name'=>'服务价钱',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->ServiceCustom->show_attribute("bargain_price")',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            
             array(
                'name'=>'描述',
                'type'=>'raw',
                'value'=>'$data->ServiceCustom->describe',
             
            ),
            array(
                'name'=>'支付状态',
                'type'=>'raw',
                'value'=>'$data->show_attribute("status")',
             
            ),
            
            array(
                'name'=>'支付时间',
                'type'=>'raw',
                'value'=>'$data->show_attribute("pay_time")',
             
            ),
            
            array(
                'name'=>'操作',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->get_service_operate()',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
           
            
         
    ),
    'ajaxUpdate'=>true,
    )); 
?>     	
                          </div>
                        </div>
                    
                    
                    </div>
                 
                 </div>        