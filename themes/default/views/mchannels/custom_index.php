<div class="ban_bg">
  <div class="subban">
  	<?php
         		BZ::ad("id/30/cacheid/advertise_30/cache/86400");
    ?>
  </div>
</div>

<div class="content">
  <div class="submian">
  	<div class="subleft">
    	<div class="sublist">
        	 <h2><?php echo $name; ?></h2>
        	   <?php BZ::channels("view/children_list/parent/".$channel_parent); ?>
        </div>
    	<div class="hotmenu">
        	<h2>热点推荐</h2>
           <?php BZ::channels("view/children_list/ids/46,47,84,57,66,67,63,64"); ?>
        </div>
    </div>
   <div class="sburight">
   	     <h2>
        	<div class="breadcrumbs_name"><?php echo $name; ?></div>
        	<div class="breadcrumbs_wrapper">
        		     您当前位置：<?php $this->widget('zii.widgets.CBreadcrumbs', array(
								     'links'=>$this->breadcrumbs,
							    )); ?></div>
							    
				</h2>
        
        <div class="dz_text" >

        
        
         <?php 
    		 							$form=$this->beginWidget('EActiveForm', array(
	        								'id'=>'',
	        								'action'=>$this->createUrl("user/packagebuy"),
	        								'enableAjaxValidation'=>false,
	        								'htmlOptions'=>array('id'=>'pay_form'),
         							));
         							
         							
        ?>
        
        
         <?php echo $service_custom_html;?>
        
        
        <div class="dz_bj">方案报价：<span id="total_price">0</span></div>
        <div class="dz_b5"><?php echo CHtml::submitButton("保存项目",array('class'=>'pay_button'));?></div>
       <?php $this->endWidget(); ?>       
        
        
        
        
       </div>
          
   </div>
     <div style="clear:both"></div>
  </div>
</div>

<script language="javascript">
	 jQuery(function(){
	 	  jQuery(".check_price").bind("click",function(){
	 	  	  var total_price=jQuery("#total_price").html();
	 	  	  var check=jQuery(this).attr("checked");
	 	  	  var check_value=jQuery(this).attr("price");
	 	  	  if(check){
	 	  	  	  var total_price=parseFloat(total_price)+parseFloat(check_value);
	 	  	  	  jQuery("#total_price").html(total_price);
	 	  	  }else{
	 	  	  	 var total_price=parseFloat(total_price)-parseFloat(check_value);
	 	  	  	 jQuery("#total_price").html(total_price);
	 	  	  }
	 	  });
	 	  
	 	  jQuery(".constom_img_click").bind("click",function(){
	 	  	 var cssPath="<?= $cssPath ?>";
	 	  	 var index=jQuery(this).attr("index");
	 	  	 var flag=jQuery(this).attr("flag");
	 	  	 if(flag=="open"){
	 	  	 	jQuery("#children_"+index).hide();
	 	  	 	jQuery(this).attr("flag","close");
	 	  	 	jQuery(this).attr("src",cssPath+"/images/ico_open.gif");
	 	  	 }else{
	 	  	 	jQuery("#children_"+index).show();
	 	  	 	jQuery(this).attr("flag","open");
	 	  	 	jQuery(this).attr("src",cssPath+"/images/ico_close.gif");
	 	  	 }
	 	  	
	 	  });
	 	  
	 	  jQuery(".dz_title").bind("click",function(){
	 	  	 var cssPath="<?= $cssPath ?>";
	 	  	 var index=jQuery(this).find("img").attr("index");
	 	  	 var flag=jQuery(this).find("img").attr("flag");
	 	  	 if(flag=="open"){
	 	  	 	jQuery("#children_"+index).hide();
	 	  	 	jQuery(this).find("img").attr("flag","close");
	 	  	 	jQuery(this).find("img").attr("src",cssPath+"/images/ico_open.gif");
	 	  	 }else{
	 	  	 	jQuery("#children_"+index).show();
	 	  	 	jQuery(this).find("img").attr("flag","open");
	 	  	 	jQuery(this).find("img").attr("src",cssPath+"/images/ico_close.gif");
	 	  	 }
	 	  });
	 	  
	 });
	 
	 function show_custom_describe(custom_id){
	 	jQuery.jBox("iframe:/mchannels/showcustom/id/"+custom_id, {
    	title: "详细信息",
    	width: 800,
    	height: 500,
    	buttons: { '关闭': true }
 		});	
	 }
</script>