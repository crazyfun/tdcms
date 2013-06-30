
<?php echo $ucsynlogin;?>
<div class="content">
	<div class="submember"><!--zc-->
    	<div class="zc_box">
            <div class="zc_top"><img src="<?php echo $cssPath;?>/images/page_top.gif" /></div>
            <div class="zc_main">
        	     <div class="zc_pic"><img src="<?php echo $cssPath;?>/images/re_step2.gif" /></div>
        <?php 
    	    $cssPath=$this->get_css_path(); 
    		  $form=$this->beginWidget('EActiveForm', array(
	        'id'=>'',
          'action'=>$this->createUrl("registe/registe2"),
	        'enableAjaxValidation'=>false,
	        'htmlOptions'=>array('id'=>'registe_from'),
         ));
         echo $form->createHidden($model,"id",array());

        ?>
            	 <div class="zc_lbox">
                        <div>
                             <div class="name">设置头像：</div>
                             <div><?php echo $uc_avatarflash; ?></div>
                        </div>
                 		  <div class="logli">
                             <div class="name">真实姓名：</div>
                             <div class="inputbox"><?php echo $form->createText($model,"real_name",array('class'=>'input02'));?></div>
                             <div class="ts"></div>
                             <div class="cw"><?php echo $form->error($model,"real_name");?></div> 
                        </div>
                        <div class="logli">
                             <div class="name">性别：</div>
                             <div class="inputbox"><?php echo $form->createSelect($model,"genter",CV::$sex,array());?></div>
                             <div class="ts"></div>
                             <div class="cw"><?php echo $form->error($model,"genter");?></div> 
                        </div>
                        <div class="logli">
                             <div class="name">生日：</div>
                             <div class="inputbox"><?php echo $form->createDate($model,"birthday",array('class'=>'input02'));?></div>
                             <div class="ts"></div>
                             <div class="cw"><?php echo $form->error($model,"birthday");?></div> 
                        </div>
                        <div class="logli">
                              <div class="name">手机号码：</div>
                              <div class="inputbox"><?php echo $form->createText($model,"cell_phone",array('class'=>'input02'));?></div>
                              <div class="ts"></div>
                              <div class="cw"><?php echo $form->error($model,"cell_phone");?></div> 
                        </div>
                        
                        <div class="logli">
                              <div class="name">身份证号码：</div>
                              <div class="inputbox"><?php echo $form->createText($model,"code",array('class'=>'input02'));?></div>
                              <div class="ts"></div>
                              <div class="cw"><?php echo $form->error($model,"code");?></div> 
                        </div>
                        
                        <div class="logli">
                              <div class="name">地址：</div>
                              <div class="inputbox"><?php echo $form->createText($model,"address",array('class'=>'input02'));?></div>
                              <div class="ts"></div>
                              <div class="cw"><?php echo $form->error($model,"address");?></div> 
                        </div>
                        
                        <div class="zc_bnt2"><?php echo CHtml::imageButton($cssPath."/images/btn_zhuche3.gif",array());?>&nbsp;&nbsp;<a href="<?php echo $this->createUrl("registe/registe3"); ?>">跳过此步</a></a></div>
              
              </div>
               <?php $this->endWidget(); ?>
            </div>
            <div class="zc_bottom"><img src="<?php echo $cssPath;?>/images/page_bot.gif" /></div>  
        </div>
        <!--end zc-->
    </div>
</div>
    
    



    
    
    
    
    



