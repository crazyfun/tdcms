<div class="ban_bg">
  <div class="subban">
  	<?php
         		BZ::ad("id/31/cacheid/advertise_31/cache/86400");
    ?>
  </div>
</div>
<div class="content">
  <div class="submian">
  	<div class="subleft">
    	<div class="sublist">
        	<h2><?php echo $channel_name; ?></h2>
          <?php BZ::channels("view/children_list/parent/".$channel_parent); ?>
        </div>
       <div class="hotmenu">
        	<h2>热点推荐</h2>
           <?php BZ::channels("view/children_list/ids/46,47,84,57,66,67,63,64"); ?>
        </div>
   	</div>
    
  	<div class="sburight">
  		  <h2>
        	<div class="breadcrumbs_name"><?php echo $channel_name; ?></div>
        	<div class="breadcrumbs_wrapper">
        		     您当前位置：<?php $this->widget('zii.widgets.CBreadcrumbs', array(
								     'links'=>$this->breadcrumbs,
							    )); ?></div>
							    
				</h2>
       
      	<div class="dz_text">
      		   <div class="fw_box">
      		   	  
                <div class="d_fw_main">
                	<div class="fw_pic"><img src="<?php echo "/".Util::rename_thumb_file(133,149,"",$service_custom_data['image']); ?>" width="133" height="149" alt="" /></div>
                    <div class="fw_right">
                   	  <div class="fw_prices"><div class="fw_prbox">原价：<span><?php echo $service_custom_data['price'];?></span>优惠价：<?php echo $service_custom_data['bargain_price'];?></div><a href="<?php echo $this->createUrl("mchannels/parchive/channel/".$channel."/id/".$service_custom_data['id']);?>"><?php echo $service_custom_data['title'];?></a></div>
                        <div class="fw_text">
                        	 <?php echo $service_custom_data['sdescribe'];?>                      
                        </div>
                        <div class="fw_bnt"><a target="_blank" href="<?php echo $this->createUrl("user/packagebuy/id/".$service_custom_data['id']);?>">保存项目</a></div>
                  </div>
                 <div style="clear:both"></div>
                </div>
            </div>
            
            <div class="fw_menu">
            	  <?php echo $service_custom_data['describe'];?>
            </div>
            
                
      </div> 
   </div>
<div style="clear:both;"></div>
  </div>
</div>
