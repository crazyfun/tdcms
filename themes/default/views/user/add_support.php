<?php 
  $config_values=ConfigValues::model();
  $type=$config_values->get_ralation_values(10);

?>
<div class="memright">
                    <div class="memrmian">
                         
                         	
                   <?php 
    		 							$form=$this->beginWidget('EActiveForm', array(
	        								'id'=>'',
          								'action'=>"",
	        								'enableAjaxValidation'=>false,
	        								'htmlOptions'=>array('id'=>'registe_from','enctype'=>'multipart/form-data'),
         							));
        					?>
        					         <div class="logli"><?php $this->widget("FlashInfo");?></div>
                         	<div class="logli">
                                <div class="name"><span>*</span>标题：</div>
                                <div class="inputbox"><?php echo $form->createText($model,"title",array('class'=>'input02'));?></div>
                         	    	<div class="ts"></div>
                                <div class="cw"><?php echo $form->error($model,"title");?></div>
                         	</div>
                            <div class="logli">
                                 <div class="name"><span>*</span>类型：</div>
                                 <div class="inputbox"><?php echo $form->createSelect($model,"type",$type,array('class'=>'input02'));?></div>
                                 <div class="ts">问题类型请正确选择，这将直接影响处理程度</div>
                                 <div class="cw"><?php echo $form->error($model,"type");?></div> 
                            </div>
                            <div class="logli">
                                   <div class="name"><span></span>相关链接：</div>
                                   <div class="inputbox"><?php echo $form->createText($content_model,"href",array('class'=>'input02'));?></div>
                                   <div class="ts"></div>
                                   <div class="cw"><?php echo $form->error($content_model,"href");?></div> 
                            </div>
                            <div class="logli">
                                  <div class="name"><span>*</span>详细内容：</div>
                                  <div class="inputbox"><?php echo $form->createTextarea($content_model,"content",array('class'=>'input02','style'=>'width:200px;height:100px;'));?></div>
                                  <div class="ts"></div>
                                  <div class="cw"><?php echo $form->error($content_model,"content");?></div> 
                            </div>
                            
                            <div class="logli">
                                  <div class="name"><span></span>图片附件：</div>
                                  <div class="inputbox"><?php echo $form->createFile($content_model,"image",array('class'=>'input02'));?></div>
                                  <div class="ts"></div>
                                  <div class="cw"><?php echo $form->error($content_model,"image");?></div> 
                            </div>
                            

                         <div class="xgbnt">
                            <div class="bnt_xg"><?php echo CHtml::submitButton("",array('class'=>'save_bt'));?></div>
                            <div class="bnt_xg" style="margin-left:20px;"><?php echo CHtml::resetButton("",array('class'=>'reset_bt'));?></div>
                         </div> 
                  <?php $this->endWidget(); ?>
                         </div>
                    
                 </div>
                 