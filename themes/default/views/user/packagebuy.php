<div class="memright">
                 <div class="memrmian">
                         <div class="memgr">
                         	
                 <?php if($pay_flag){ ?>
                  <?php 
    		 							$form=$this->beginWidget('EActiveForm', array(
	        								'id'=>'',
	        								'action'=>$this->createUrl("user/packagebuy2"),
	        								'enableAjaxValidation'=>false,
	        								'htmlOptions'=>array('id'=>'pay_form'),
         							));
         							echo CHtml::hiddenField('id',$implode_id,array());
         							
         							
        					?>
                  <table width="100%" border="0">
                  	 <tr>
                  	 	  <td colspan="2"><div class="flash_info"><?php $this->widget("FlashInfo");?></div></td>
                  	 </tr>
                  	 <tr>
    										<td width="22%" height="50" align="right">余额：</td>
    										<td width="78%" height="50"><?php echo $user_data->conpon;?></td>
    									</tr>
  		
  										<tr>
    										<td align="right">支付金额：</td>
    										<td><span class="zf_m"><?php echo $total_price;?></span>元（人民币）</td>
    									</tr>
    									
  										<tr>
   											 <td align="right" height="50">&nbsp;</td>
   											 <td height="50">
   											 	   <?php if($user_data->conpon>=$total_price){ 
   											 	        echo CHtml::submitButton("确认付款",array('class'=>'tj_bt'));
   											 	       
   											 	     }else{
   											 	     	  echo "<font color='#ff0000'>您的余额不足，请<a  href='".$this->createUrl("user/pay",array('price'=>($total_price-$user_data->conpon)))."' class='chongzhi_button'>充值</a>后再行购买。</font>";
   											 	     }	
   											 	   ?>
   											 	</td>
 											 </tr>
										</table>
										<?php $this->endWidget(); ?>
									<?php }else{ ?>
									   <div class="flash_info"><?php $this->widget("FlashInfo");?></div>
								  <?php } ?>
							</div>
 </div>
</div>           