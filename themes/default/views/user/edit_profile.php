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
        					        	<div>
                                <div class="name">头像:</div>
                                <div><?php echo $uc_avatarflash; ?></div>
                         	</div>
                         	
                         	
                         	<div class="logli">
                                <div class="name"><span></span>真实姓名：</div>
                                <div class="inputbox"><?php echo $form->createText($model,"real_name",array('class'=>'input02'));?></div>
                         	    	<div class="ts"></div>
                                <div class="cw"><?php echo $form->error($model,"real_name");?></div>
                         	</div>
                            <div class="logli">
                                 <div class="name"><span></span>性别：</div>
                                 <div class="inputbox"><?php echo $form->createSelect($model,"genter",CV::$sex,array('class'=>'input02'));?></div>
                                 <div class="ts"></div>
                                 <div class="cw"><?php echo $form->error($model,"genter");?></div> 
                            </div>
                            <div class="logli">
                                   <div class="name"><span></span>生日：</div>
                                   <div class="inputbox"><?php echo $form->createDate($model,"birthday",array('class'=>'input02'));?></div>
                                   <div class="ts"></div>
                                   <div class="cw"><?php echo $form->error($model,"birthday");?></div> 
                            </div>
                            <div class="logli">
                                  <div class="name"><span></span>手机号码：</div>
                                  <div class="inputbox"><?php echo $form->createText($model,"cell_phone",array('class'=>'input02'));?></div>
                                  <div class="ts"></div>
                                  <div class="cw"><?php echo $form->error($model,"cell_phone");?></div> 
                            </div>
                            
                            <div class="logli">
                                  <div class="name"><span></span>身份证号码：</div>
                                  <div class="inputbox"><?php echo $form->createText($model,"code",array('class'=>'input02'));?></div>
                                  <div class="ts"></div>
                                  <div class="cw"><?php echo $form->error($model,"code");?></div> 
                            </div>
                            
                            
                            <div class="logli">
                                  <div class="name"><span></span>地址：</div>
                                  <div class="inputbox"><?php echo $form->createText($model,"address",array('class'=>'input02'));?></div>
                                  <div class="ts"></div>
                                  <div class="cw"><?php echo $form->error($model,"address");?></div> 
                            </div>
                            
                            
                         <div class="xgbnt">
                            <div class="bnt_xg"><?php echo CHtml::submitButton("",array('class'=>'save_bt'));?></div>
                            <div class="bnt_xg"><?php echo CHtml::resetButton("",array('class'=>'reset_bt'));?></div>
                         </div> 
                  <?php $this->endWidget(); ?>
                         </div>
                    </div>
                 </div>
                 