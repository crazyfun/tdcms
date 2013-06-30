							 <li>
                		<h5><span><a title="<?php echo $data->Channels->name;?>" href="<?php echo $this->createUrl("mchannels/list",array('channel'=>$data->channel_id)); ?>">[<?php echo $data->Channels->name;?>]</a></span><a href="<?php echo $this->createUrl("mchannels/archive",array('archive'=>$data->id)); ?>" title="<?php echo $data->title;?>"><?php echo $data->title;?></a></h5>
                    <p><?php echo $data->scontent;?></p>
                    <div class="sxx">
                    	<span class="sxx_wz"><a title="<?php echo $data->title;?>" href="<?php echo $this->createUrl("mchannels/archive",array('archive'=>$data->id)); ?>"><?php echo Yii::app()->homeUrl.$this->createUrl("mchannels/archive",array('archive'=>$data->id)); ?></a></span><span></span><span><small>点击：</small><?php echo $data->views;?></span><span><small>日期：</small><?php echo date("Y-m-d",$data->create_time);?></span>
                    </div>
                </li>
