<?php
class Menus extends CWidget
{
	  public $view="";
	  public $select="";
    public function run(){
    	 $channel=$_REQUEST['channel'];
    	 $user_id=Yii::app()->user->id;
    	 $channels=Channels::model();
    	 $menus=$channels->get_channel_menus("0","1");
    	 $channel_model=Channels::model();
       $channel_parents=$channel_model->get_parents($channel);
       $cur_url=Util::curPageURL();
       $cur_url=rtrim($cur_url,"/");
    	 foreach($menus as $key => $value){
    	 	  if(in_array($value['id'],$channel_parents)){
    	 	  	 $value['select']=$this->select;
    	 	  }
    	 	  if($value['link_href']==$cur_url){
    	 	  	$value['select']=$this->select;
    	 	  }
    	 	  $menus[$key]=$value;
    	 }

       $this->render("/menus/".$this->view,array('content'=>$menus));
    }
}
