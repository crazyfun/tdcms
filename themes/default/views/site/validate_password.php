
 <div class="content">
			<div class="submember">
 		<!--zc-->
    	<div class="zc_box">
            <div class="zc_top"><img src="<?php echo $cssPath;?>/images/page_top.gif" /></div>
            <div class="zc_main">
        	     
        <?php 
    		  $form=$this->beginWidget('EActiveForm', array(
	        	'id'=>'',
          	'action'=>"",
	        	'enableAjaxValidation'=>false,
	        	'htmlOptions'=>array('id'=>'registe_from'),
         ));
       
				?>
            	 <div class="zc_lbox">
            	 	        <div class="logli">
            	 	        	  <?php $this->widget("FlashInfo");?>
            	 	        </div>
                 				<div class="logli">
                              <div class="name"><span>*</span>新密码：</div>
                              <div class="inputbox"><?php echo $form->createText($model,"new_password",array('class'=>"input02"));?></div>
                              <div class="ts"></div>
                              <div class="cw"><?php echo $form->error($model,"new_password");?></div> 
                        </div>
                        <div class="logli">
                             <div class="name"><span>*</span>确认新密码：</div>
                             <div class="inputbox"><?php echo $form->createText($model,"con_new_password",array('class'=>"input02"));?></div>
                             <div class="ts"></div>
                             <div class="cw"><?php echo $form->error($model,"con_new_password");?></div> 
                        </div>               
                        <div class="zc_bnt2"><?php echo CHtml::imageButton($cssPath."/images/btn_zhuche3.gif",array());?></div>
                 </div>
         <?php $this->endWidget(); ?>
            </div>
            <div class="zc_bottom"><img src="<?php echo $cssPath;?>/images/page_bot.gif" /></div>  
        </div>
       
        <!--end zc-->   
   		 </div>
		</div>
		 <script language="javascript">
       	   jQuery(function(){
       	   	   var validate_flag="<?= $validate_flag ?>";
       	   	   if(validate_flag){
       	   	   	 window.setTimeout(function(){window.location.href="login/index";},2000);
       	   	   }
       	   	
       	  });
       </script>