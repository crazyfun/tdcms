<div class="ban_bg">
  <div class="subban">
  	<?php
         		BZ::ad("id/26/cacheid/advertise_26/cache/86400");
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
				
       
      	<div class="n_text">
      		
            	<h3><?php echo $content['title'];?></h3>
            	<h4>发表时间:<?php echo $content['modify_time'];?> 作者:<?php echo $content['auther'];?></h4> 
              <p style="text-align:center">
                	<?php echo $content['content'];?>
              </p>  
                
      </div>
        <div class="next">
           <?php BZ::relation("archive/".$archive."/show/v"); ?>
        </div>  
        
        <div class="next">
           <?php BZ::comment("model/1/archive/".$archive."/type/textarea/level/1");?>
        </div>  
   </div>
<div style="clear:both;"></div>
  </div>
</div>
