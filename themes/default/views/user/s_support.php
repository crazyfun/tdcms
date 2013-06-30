<?php 
  $config_values=ConfigValues::model();
  $type=$config_values->get_ralation_values(10);
  $type=Util::com_search_item(array(''=>'类型'),$type);
  $support_status=Util::com_search_item(array(''=>'回复状态'),CV::$support_status);

?>
<div class="memright">
	                  <div class="memnotice"><span class="memtitle">【通知】</span>您有<font color="#ff0000"><?php $messages=Messages::model(); echo $messages->get_unread_message();?></font>条未读消息<a href="<?php echo $this->createUrl("user/message");?>" class="memnoa">查看详情</a></div>
                    <div class="memrmian">
                        <div class="memhy">
                        <div class="memoperatenotice"><a href="<?php echo $this->createUrl("user/addsupport");?>"><font color="#FF6633"><strong>我要提交新问题</strong></font></a></div>
                        	
  <?php
	  $form=$this->beginWidget('EActiveForm', array(
	        'id'=>'search_form',
          'action'=>"",
	        'enableAjaxValidation'=>false,
	        'htmlOptions'=>array('id'=>'search_form','enctype'=>'multipart/form-data'),
         ));
   ?>
                        	<div class="memhy_title">
                       	        <div class="memhy_list">标题：<?php echo EHtml::createText("title",$page_params['title'],array());?></div>
                                <div class="memhy_list">类型：<?php echo EHtml::createSelect("type",$page_params['type'],$type,array());?></div>
                                <div class="memhy_list">回复状态：<?php echo EHtml::createSelect("status",$page_params['status'],$support_status,array());?></div>
                                <div class="memhy_list">开始时间：<?php echo EHtml::createDate("start_time",$page_params['start_time'],array());?></div>
                                <div class="memhy_list">结束时间：<?php echo EHtml::createDate("end_time",$page_params['end_time'],array());?></div>
                                <div class="memhy_list"><?php echo CHtml::imageButton($cssPath."/images/bnt_ss.gif");?></div>
                            </div>
  <?php $this->endWidget(); ?>                           
                            
                            <div class="memhy_box">
                            	  <?php 
  $this->widget('zii.widgets.grid.CGridView',array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
            array(
                'name'=>'编号',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->show_attribute("id")',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            array(
                'name'=>'标题',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->title',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            
            array(
                'name'=>'type',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->show_attribute("type")',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
            
            
            array(
                'name'=>'create_time',
                'type'=>'raw',
                'value'=>'$data->show_attribute("create_time")',
             
            ),
          
           array(
                'name'=>'status',
                'type'=>'raw',
                'value'=>'$data->show_attribute("status")',
             
            ),
            array(
                'name'=>'操作',
                'type'=>'raw',//字段的属性 参考yii
                'value'=>'$data->get_web_operate()',//如果为空则以$data->id为值 如果有值则 已$data->func()填充
            ),
           
            
         
    ),
    'ajaxUpdate'=>true,
    )); 
?>     	
                          </div>
                        </div>
                    
                    
                    </div>
                 
                 </div>        