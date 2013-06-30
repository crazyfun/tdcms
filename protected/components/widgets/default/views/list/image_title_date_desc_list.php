<li>
	     <div class="case_pic"><a href="<?php echo $data->href;?>"><p><img src="<?php echo $data->image;?>"  alt="<?php echo $data->title;?>" /></p></a></div>
       <p><a href="<?php echo $data->href;?>" title="<?php echo $data->title;?>"><?php echo $data->title;?></a></p>
       <p>发布时间：<?php echo $data->modify_time;?></p>
       <p><?php echo $data->scontent;?></p>
</li>