<div class="memright">
                 	<div class="memnotice"><span class="memtitle">【通知】</span>您有<font color="#ff0000"><?php $messages=Messages::model(); echo $messages->get_unread_message();?></font>条未读消息<a href="<?php echo $this->createUrl("user/message");?>" class="memnoa">查看详情</a></div>
                    <div class="memrmian">
                         <div class="memgr">
                         	
                   <?php 
    		 							$form=$this->beginWidget('EActiveForm', array(
	        								'id'=>'',
          								'action'=>"",
	        								'enableAjaxValidation'=>false,
	        								'htmlOptions'=>array('id'=>'registe_from'),
         							));
         							echo $form->createHidden($model,"id",array());
        					?>
        					         <div class="logli"><?php $this->widget("FlashInfo");?></div>
  
                         	<div class="logli">
                                <div class="name"><span>*</span>旧密码：</div>
                                <div class="inputbox"><?php echo $form->createPassword($model,"check_password",array('class'=>'input02','value'=>'')); ?></div>
                         	    	<div class="ts"></div>
                                <div class="cw"><?php echo $form->error($model,'check_password'); ?></div>
                         	</div>
                          
                          
                            <div class="logli">
                                  <div class="name"><span>*</span>新密码：</div>
                                  <div class="inputbox"><?php echo $form->createPassword($model,"new_password",array('class'=>'input02')); ?></div>
                                  <div class="ts"></div>
                                  <div class="cw"><?php echo $form->error($model,"new_password");?></div> 
                            </div>
                            
                             <div class="logli">
                                  <div class="name"><span>*</span>确认新密码：</div>
                                  <div class="inputbox"><?php echo $form->createPassword($model,"con_new_password",array('class'=>'input02')); ?></div>
                                  <div class="ts"></div>
                                  <div class="cw"><?php echo $form->error($model,"con_new_password");?></div> 
                            </div>
                            
                            
                         <div class="xgbnt">
                            <div class="bnt_xg"><?php echo CHtml::submitButton("",array('class'=>'save_bt'));?></div>
                            <div class="bnt_xg"><?php echo CHtml::resetButton("",array('class'=>'reset_bt'));?></div>
                         </div> 
                         
                         
                  <?php $this->endWidget(); ?>
                  
                  
                         </div>
                    </div>
                 </div>



    
    



    
    
    
    
    



