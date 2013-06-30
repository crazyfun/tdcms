<div class="ban_bg">
  <div class="subban"><img src="<?php echo $cssPath;?>/images/about_ban.jpg" width="1000" height="150" alt="" /></div>
</div>
<div class="content">
	<div class="submian">
    	<div class="subleft">
    		
    		<?php BZ::helpcategory("view/help_category"); ?>
    	
    </div>
    
       <div class="sburight">
         <h2>
        	<div class="breadcrumbs_name">帮助中心</div>
        	<div class="breadcrumbs_wrapper">
        		     您当前位置：<?php $this->widget('zii.widgets.CBreadcrumbs', array(
								     'links'=>$this->breadcrumbs,
							    )); ?></div>
							    
				</h2>
        <div class="dz_text">
          <div class="help_main" id="page_content">
          		<?php BZ::helpcontent("view/help_content/cid/".$cid); ?>
          </div>
      </div>
   </div>
 </div>
</div>


