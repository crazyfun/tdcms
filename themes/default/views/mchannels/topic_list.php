<div class="ban_bg">
  <div class="subban">
  <?php
         		BZ::ad("id/25/cacheid/advertise_25/cache/86400");
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
       
        <div class="n_text" >
        	<div class="news_text n_text2">
            <ul>
            		<?php BZ::lists("id/".$channel."/category/".$category); ?>	
            </ul>     
          </div> 
        </div> 
         
   </div>
     <div style="clear:both"></div>
  </div>
</div>