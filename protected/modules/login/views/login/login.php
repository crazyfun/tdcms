

        <?php $cssPath=$this->get_css_path(); ?>
        <div class="login_web_con">
        	<h2 class="welcome_h2">欢迎来到立火旅行网</h2>
            <div class="pop" ><!--登录框开始-->
				<div class="dl_conbor">
					<div class="con">
							<div class="dl_left">
								<?php $form=$this->beginWidget('EActiveForm', array(
        					'id'=>'login-form',
        					'action'=>$this->createUrl('/login/login/index'),
       						 'enableAjaxValidation'=>true,
   							)); ?>
								<table cellpadding="0" cellspacing="0" class="login_table">
									<tr><td><div class="prompt_se"><?php echo $model_errors; ?></div></td></tr>
									<tr><td><div class="usename"><span>用户名</span><?php echo $form->createText($model,"user_login",array());?></div></td></tr>
									<tr><td><div class="usename"><span>密&nbsp;&nbsp;码</span><?php echo $form->createPassword($model,"user_password",array());?></div></td></tr>
									<tr><td><div class="usename" style="float:left;"><span>验证码</span><?php echo $form->createText($model,"imagecode",array());?></div><span class="get_imagecode"><a onclick="document.getElementById('__code__').src = '<?php echo Yii::app()->homeUrl;?>/imagesecurity/code.php?id=' + ++ts; return false"><img id="__code__" src="<?php echo Yii::app()->homeUrl;?>/imagesecurity/code.php?id=<?php echo $ts; ?>" /></a></span></td></tr>
									<tr><td><div class="forget_w"><span><?php echo $form->createCheck($model,'rememberme',array());?>&nbsp;两周内不再登录</span><a href="<?php echo $this->createUrl("/site/forgotpassword");?>">忘记密码?</a></div></td></tr>
									<tr><td><div class="login_sub" style="border-bottom:none;"><?php echo CHtml::submitButton("",array());?></div></td></tr>
								</table> 
								<?php $this->endWidget(); ?> 
							</div>
							<div class="dl_right">
                            	  <p class="web_infor_p">
                                	全国最大的导游计调网，给各大旅行社，导游，酒店，景区提供在线交流的平台。给旅游行业的各个公司，个人，部门提供便捷快速的服务。
                                </p>
								<div class="txt">还没有账号？</div>
								<div class="pop_ljzc"><a href="<?php echo $this->createUrl("/registe/registe");?>"><img src="<?php echo $cssPath;?>/images/pop_ljzc.gif"></a></div>																
							</div>
							<div class="clear_both"></div>
					</div>	
				</div>
			</div>
        </div>
        <script language="javascript">
					ts = "<?= $ts ?>";
					
				</script>
 