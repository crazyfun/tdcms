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
        	
        	
        	

            	<div class="fw_box">
            	<h3>网站套餐</h3>
            	<?php foreach($service_custom_datas as $key => $value){ ?>
                <div class="fw_main">
                	<div class="fw_pic"><a href="<?php echo $this->createUrl("mchannels/parchive/channel/".$channel."/id/".$value['id']);?>"><img src="<?php echo "/".Util::rename_thumb_file(133,149,"",$value['image']); ?>" width="133" height="149" alt="" /></a></div>
                    <div class="fw_right">
                   	  <div class="fw_prices"><div class="fw_prbox">原价：<span><?php echo $value['price'];?></span>优惠价：<?php echo $value['bargain_price'];?></div><a href="<?php echo $this->createUrl("mchannels/parchive/channel/".$channel."/id/".$value['id']);?>"><?php echo $value['title'];?></a></div>
                        <div class="fw_text">
                        	 <?php echo $value['sdescribe'];?>                      
                        </div>
                        <div class="fw_bnt"><a target="_blank" href="<?php echo $this->createUrl("user/packagebuy",array("id"=>$value['id']));?>">保存项目</a><a href="<?php echo $this->createUrl("mchannels/parchive/channel/".$channel."/id/".$value['id']);?>">详细信息</a></div>
                  </div>
                 <div style="clear:both"></div>
                </div>
               <?php } ?> 
            </div>
   
          
          
           
        </div>  
   </div>
     <div style="clear:both"></div>
  </div>
</div>