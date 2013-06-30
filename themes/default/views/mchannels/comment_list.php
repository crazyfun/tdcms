<div class="ban_bg">
  <div class="subban">
  	<?php
         		BZ::ad("id/29/cacheid/advertise_29/cache/86400");
    ?>
  </div>
</div>

<div class="content">
  <div class="submian">
  	<div class="subleft">
    	
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
             <ul>
            		<?php BZ::lists("id/".$channel."/category/".$category); ?>	
             </ul>   
        </div> 
         
   </div>
     <div style="clear:both"></div>
  </div>
</div>