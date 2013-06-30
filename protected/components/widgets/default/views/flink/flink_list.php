      <ul>
            <li>友情链接： </li>  
            <?php foreach($content as $key => $value){?>
               <li><a href="<?php echo $value['friendlink_href'];?>" title="<?php echo $value['friendlink_name'] ;?>"><?php echo $value['friendlink_name'] ;?></a></li>
            
            <?php } ?>

        </ul>