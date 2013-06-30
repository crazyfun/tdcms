<div class="content">
	<div class="submember">
		<!--login-->
    	<div class="login_bg">
        	<div class="loginbox">
           	   <p><img src="<?php echo $cssPath;?>/images/me_bg.gif" /></p>
           	   <?php $form=$this->beginWidget('EActiveForm', array(
        					'id'=>'login-form',
        					'action'=>$this->createUrl('login/index'),
       						 'enableAjaxValidation'=>true,
   							)); ?>
                <div class="logli"><div class="name">用户名：</div>
                   <div class="inputbox"><?php echo $form->createText($model,"user_login",array('class'=>"input02"));?></div>
                   <div class="ts"></div>
                   <div class="cw"><?php echo $form->error($model,"user_login");?></div>
                </div>
                <div class="logli"><div class="name">密&nbsp;&nbsp;&nbsp;&nbsp;码：</div>
                   <div class="inputbox"><?php echo $form->createPassword($model,"user_password",array('class'=>"input02"));?></div>
                   <div class="ts"></div>
                   <div class="cw"><?php echo $form->error($model,"user_password");?></div>
                </div>
                <div class="logli"><div class="name">验证码：</div><div class="inputbox"><?php echo $form->createText($model,"imagecode",array('class'=>"input03"));?><a onclick="document.getElementById('__code__').src = '<?php echo Yii::app()->homeUrl;?>/imagesecurity/code.php?id=' + ++ts; return false"><img id="__code__" src="<?php echo Yii::app()->homeUrl;?>/imagesecurity/code.php?id=<?php echo $ts; ?>" /></a></div><div class="cw"><?php echo $form->error($model,"imagecode");?></div></div>
                <div class="logli"><a href="<?php echo $this->createUrl("site/forgotpassword");?>" class="loga">忘记密码？</a></div>
                <div class="login_bnt"><?php echo CHtml::imageButton($cssPath."/images/btn_login.gif",array());?></div>
                <div class="zc_bnt"><a href="<?php echo $this->createUrl("registe/index");?>"><img src="<?php echo $cssPath;?>/images/btn_zhuche.gif" width="152" height="35" /></a></div>
                <?php $this->endWidget(); ?> 
           </div>
                
        </div><!--end login-->
    </div>
</div>

 <script language="javascript">
					var ts = "<?= $ts ?>";
					
</script>