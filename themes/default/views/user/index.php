       	
  <div class="memright">
                 	<div class="memnotice"><span class="memtitle">【通知】</span>您有<font color="#ff0000"><?php $messages=Messages::model(); echo $messages->get_unread_message();?></font>条未读消息<a href="<?php echo $this->createUrl("user/message");?>" class="memnoa">查看详情</a></div>
                    <div class="memrmian">
                         <div class="memgr">
                         	<div class="grzl">
                            	<ul>
                                <li><span>用户名：</span><?php echo $model->user_login;?></li>
                                <li><span>用户邮箱：</span><?php echo $model->user_email;?><a class="xiugai" href="<?php echo $this->createUrl("user/editemail");?>">修改</a></li>
                                <li><span>真实姓名:</span><?php echo $model->real_name;?></li>
                                <li><span>抵用劵:</span><?php echo $model->conpon;?><a class="xiugai" href="<?php echo $this->createUrl("user/pay");?>">在线充值</a></li>
                                <li><span>性别:</span><?php echo CV::$sex[$model->genter];?></li>
                                <li><span>生日:</span><?php echo $model->birthday;?></li>
                                <li><span>手机号码:</span><?php echo $model->cell_phone;?></li>
                                <li><span>身份证号码:</span><?php echo $model->code;?></li>
                                <li><span>地址:</span><?php echo $model->address;?></li>
                            </ul>
                            </div>
                         </div>
                    </div>
                 </div>          