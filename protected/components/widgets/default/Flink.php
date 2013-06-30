<?php
class Flink extends CWidget
{
	  public $type="";
    public $view=""; 
    public $limit="";
    public function run(){
    	  //初始化页面需要的全局变量
   	   $cssPath=$this->controller->get_css_path();
       $jsPath=$this->controller->get_js_path(); 
       $friend_link=Friendlink::model();
       $condition=array();
       $params=array();
       if(!empty($this->type)){
         $condition[]="t.friendlink_type=:friendlink_type";
         $params[':friendlink_type']=$this->type;
       }
       $friend_link_datas=$friend_link->findAll(array('condition'=>implode(" AND ",$condition),'params'=>$params,'limit'=>$this->limit,'order'=>'t.friendlink_sort ASC'));
       	$attributes=array();
    	foreach($friend_link_datas as $key => $value){
			  $attributes[]=$value->attributes;
		  }
		  foreach($attributes as $key => $value){
        $value['friendlink_img']="/".Util::rename_thumb_file('15','15',"",$value['friendlink_img']);
        $attributes[$key]=$value;
    	}
      $this->render("/flink/".$this->view,array('content'=>$attributes,'cssPath'=>$cssPath,'jsPath'=>$jsPath));
    }    
}
