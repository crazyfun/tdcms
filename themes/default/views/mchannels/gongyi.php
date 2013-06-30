<div class="ban_bg">
	<div class="subban">
  	<?php
         		BZ::ad("id/32/cacheid/advertise_32/cache/86400");
    ?>
   </div>
</div>

<div class="content">
  <div class="submian">
  	<div class="subleft">
    	<?php
         		BZ::ad("id/33/cacheid/advertise_33/cache/86400");
    	?>
    </div>
   <div class="sburight">
   	    <h2>
        	<div class="breadcrumbs_name"><?php echo $name; ?></div>
        	<div class="breadcrumbs_wrapper">
        		     您当前位置：<?php $this->widget('zii.widgets.CBreadcrumbs', array(
								     'links'=>$this->breadcrumbs,
							    )); ?></div>
							    
				</h2>
        
        <div class="gy_text" >
          <p style="font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;汤迪科技自成立来在努力做好自己的同时从未忘记逗号网络作为社会单元应有的责任，也同时被很多的公益
组织和公益志愿者所感动着，公益行动有太多的表现形式，我们一直在考虑我们能做些什么，沉淀后的认真决策最
终选择了利用自己的专业优势和特长，长期的帮助公益组织和慈善机构免费建立网站，让他们在网络上能被更多人
了解，最大速度和规模的发挥公益的影响和作用。</p>
        <p style="font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;鉴于我公司团队人力有限，暂先为无建站能力的如光爱学校这类的民间公益组织提供免费建站服务。</p>
        <p style="font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;愿我们的行动能协同您有爱的心，如果您的组织需要逗号的协助请致电 ，或填写留言，我们将在2个工作日内
联系您。</p>
                     <!--table -->
          <div class="gy_table">
          	<h2>免费申请公益网站</h2>
 								<?php 
    		 							$form=$this->beginWidget('EActiveForm', array(
	        								'id'=>'',
          								'action'=>"",
	        								'enableAjaxValidation'=>false,
	        								'htmlOptions'=>array('id'=>'registe_from'),
         							));
         							echo CHtml::hiddenField("channel",$channel,array());
        					?>
            <table width="100%" border="0">
   <tr>
    <td colspan="6"><?php $this->widget("FlashInfo");?></td>
  </tr>
  <tr>
    <td width="80">*机构名称：</td>
    <td width="140"><label>
      <?php echo $form->createText($model,"company",array());?>
    </label></td>
    <td width="100"><?php echo $form->error($model,"company");?></td>
    <td width="80">*联系人</td>
    <td width="140"><label>
    	<?php echo $form->createText($model,"contacter",array());?>
    </label></td>
   <td width="100"><?php echo $form->error($model,"contacter");?></td>
  </tr>
  <tr>
    <td>*性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</td>
    <td><label>
    	<?php echo $form->createRadio($model,"sex",CV::$gongyi_sex,array('separator'=>'&nbsp;'));?>
     
    </label></td>
    <td><?php echo $form->error($model,"sex");?></td>
    <td>*办公室联系电话：</td>
    <td><label>
      <?php echo $form->createText($model,"contacter_phone",array());?>
    </label></td>
    <td><?php echo $form->error($model,"contacter_phone");?></td>
  </tr>
  <tr>
    <td>*手机号码：</td>
    <td><label>
     <?php echo $form->createText($model,"contacter_cellphone",array());?>
    </label></td>
    <td><?php echo $form->error($model,"contacter_cellphone");?></td>
    <td>*您的职务：</td>
    <td><label>
      <?php echo $form->createText($model,"position",array());?>
    </label></td>
    <td><?php echo $form->error($model,"position");?></td>
  </tr>
  <tr>
    <td>*需求说明：</td>
    <td colspan="4"><label>
      <?php echo $form->createTextarea($model,"describe",array('style'=>'width:400px; height:70px;'));?>
    </label></td>
    <td><?php echo $form->error($model,"describe");?></td>
    </tr>
  <tr>

    <td colspan="6" align="center"><?php echo CHtml::submitButton("立即提交信息",array('style'=>'width:150px; height:33px'));?></td>

  </tr>
</table>
<?php $this->endWidget(); ?>
          </div>
              
              
                 
        </div> 
   </div>
     <div style="clear:both"></div>
  </div>
</div>