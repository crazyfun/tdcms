       	
  <div class="memright">
                 
                    <div class="memrmian">
                         
                         	<div class="memoperatenotice"><font color="#FF6633"><strong>问题详情：</strong></font></div>
                          <div class="ms_tw">
                          	
                             <div class="ms_li">
                              	<div class="ms_lil">标题：</div>
                                <div class="ms_lir">
                                  <?php echo $model->title;?>
                                </div>
                              </div>
                              
                              <div class="ms_li">
                              	<div class="ms_lil">类型：</div>
                                <div class="ms_lir">
                                  <label>
                                   <?php echo $model->ConfigValues->name;?>
                                  </label>
                                </div>
                              </div>
                              
                         
                              
                              
                              <div class="ms_nr">
                              	
       <?php foreach($support_content_data as $key => $value){ ?>               
        <div class="submess_text">
           
            <div class="message_comment"><?php echo $value->content;?></div>
            <div class="m_time"><?php if(!empty($value->href)){?><a href="<?php echo $value->href;?>" title="<?php echo $value->href;?>" target="_blank">查看链接</a><?php } ?><?php if(!empty($value->image)){?>&nbsp;&nbsp;<a title="<?php echo $value->image;?>" href="<?php echo "/".$value->image;?>" target="_blank">查看附件</a><?php } ?>&nbsp;&nbsp;提交时间：<?php echo date("Y-m-d H:i:s",$value->create_time);?></div>
           <?php if(!empty($value->reply_content)){ ?>
            <div class="support_messbg">
                	<div class="messtext">
                		  <div><font color="#ff0000"><?php echo $value->ReplyUser->user_login;?>回复：</font></div>
                    	<?php echo $value->reply_content;?>
                    	<div class="m_time">回复时间：<?php echo date("Y-m-d H:i:s",$value->reply_time);?></div>
                    </div>
                  
            </div>
          <?php } ?>
          </div>
      <?php } ?>
                </div>
                              
                              <div class="memoperatenotice"><font color="#FF6633"><strong>附加问题：</strong></font></div>
                              <div class="ms_box">
                              	
                 <?php 
    		 							$form=$this->beginWidget('EActiveForm', array(
	        								'id'=>'',
          								'action'=>"",
	        								'enableAjaxValidation'=>false,
	        								'htmlOptions'=>array('id'=>'registe_from','enctype'=>'multipart/form-data'),
         							));
         							echo CHtml::hiddenField("id",$model->id,array());
        					?>
        					        <div class="logli"><?php $this->widget("FlashInfo");?></div>
                          <div class="logli">
                                   <div class="name"><span></span>相关链接：</div>
                                   <div class="inputbox"><?php echo $form->createText($content_model,"href",array('class'=>'input02'));?></div>
                                   <div class="ts"></div>
                                   <div class="cw"><?php echo $form->error($content_model,"href");?></div> 
                            </div>
                            <div class="logli">
                                  <div class="name"><span>*</span>详细内容：</div>
                                  <div class="inputbox"><?php echo $form->createTextarea($content_model,"content",array('class'=>''));?></div>
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
                         </div>
                    
                 </div>          