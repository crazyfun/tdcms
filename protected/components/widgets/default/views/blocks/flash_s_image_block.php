        <?php 
           Yii::app()->clientScript->registerScriptFile('/js/jcarousel/jquery.jcarousel.min.js');
           Yii::app()->clientScript->registerCssFile('/js/jcarousel/skins/tango/skin.css');
        ?>
        <ul id="mycarousel" class="jcarousel-skin-tango">
        	<?php foreach($content as $key => $value){ ?>
        	   	<li>
        	   	  <div class="flash_img_wrapper"><a href="<?php echo $value['href'];?>" title="<?php echo $value['title'];?>"><p><img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>"></p></a></div>
        	   	  <p class="flash_title"><a href="<?php echo $value['href'];?>" title="<?php echo $value['title'];?>"/><?php echo $value['title'];?></a></p>
        	   	</li>
         <?php } ?>
         </ul> 
    <script type="text/javascript">  
        jQuery(function(){  
            //ÎªulÉèÖÃjCarousel²å¼þ  
            jQuery("#mycarousel").jcarousel({
            	'auto':5,
            	'wrap':'circular'
            });  
        });  
    </script>  