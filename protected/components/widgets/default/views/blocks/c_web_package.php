       <ul>
      	  <?php foreach($content as $key => $value){ ?>
        	  <li>
        	  	<?php if($key==0){ ?>
        	  	    <a href="<?php echo $value['href'];?>"><img src="<?php echo $cssPath;?>/images/sp1.jpg" width="175" height="91" alt="" /></a>
        	  	<?php }else if($key==1){ ?>
        	  	    <a href="<?php echo $value['href'];?>"><img src="<?php echo $cssPath;?>/images/sp2.jpg" width="175" height="91" alt="" /></a>
        	  	<?php }else{ ?>
        	  		 <a href="<?php echo $value['href'];?>"><img src="<?php echo $cssPath;?>/images/sp3.jpg" width="175" height="91" alt="" /></a>
        	  	<?php } ?>
 
                <div class="sy_stitle"><?php echo $value['stitle'];?></div>
                <p><?php echo $value['scontent'];?></p>
                <div class="sy_bt"><a href="<?php echo $value['href'];?>" title="<?php echo $value['title'];?>"><img src="<?php echo $cssPath;?>/images/sy_bt.jpg" /></a></div>
            </li>
         <?php } ?> 
        </ul>   
        
        