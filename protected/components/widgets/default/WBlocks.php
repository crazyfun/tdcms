<?php
class WBlocks extends CWidget
{
	  public $archive="";
	  public $view="";
	  public $channel="";
	  public $category="";
	  public $sort="";
	  public $sort_type="";
	  public $limit="";
	  public $attr="";
	  public $tlen="";
	  public $dott="";
	  public $dlen="";
	  public $size="";
    public function run(){
    	  //初始化页面需要的全局变量
   	   $cssPath=$this->controller->get_css_path();
       $jsPath=$this->controller->get_js_path(); 
    	 $flash_ad=FlashAd::model();
    	 $content=$this->get_archive_content();
       $this->render("/blocks/".$this->view,array('content'=>$content,'cssPath'=>$cssPath,'jsPath'=>$jsPath));
    }    
    function get_archive_content(){
    	$archives=Archives::model();
    	$conditions=array();
    	$params=array();
    	$sort="";
    	$sort_type="";
    	$tlen="";
	    $dott="";
	    $dlen="";
	    $size="";
    	$limit="";
    	if(!empty($this->archive)){
    		$conditions[]=" FIND_IN_SET(t.id,'".$this->archive."')>0 ";
    	}
    	if(!empty($this->channel)){
    		$channel_model=Channels::model();
    		$channel_childrens=$channel_model->get_descendant($this->channel);
    		$conditions[]="t.channel_id ".Util::db_create_in($channel_childrens);
    	}
    	if(!empty($this->category)){
    		$channel_category=ChannelCategory::model();
    		$category_childrens=$channel_category->get_descendant($this->category);
    		$conditions[]="t.category_id ".Util::db_create_in($category_childrens);
    	}
    	
    	if(!empty($this->attr)){
    		$conditions[]=" FIND_IN_SET('".$this->attr."',t.attr)>0 ";
    	}
    	$conditions[]=" t.status=:status ";
    	$params[':status']='2';
    	if(!empty($this->sort)){
    		$sort="t.".$this->sort;
    	}else{
    		$sort="t.create_time";
    	}
    	
    	if(!empty($this->sort_type)){
    		$sort_type=$this->sort_type;
    	}else{
    		$sort_type="DESC";
    	}
    	if(!empty($this->limit)){
    		$limit=$this->limit;
    	}else{
    		$limit="10";
    	}
    	if(!empty($this->tlen)){
    		$tlen=$this->tlen;
    	}else{
    	  $tlen="20";
      }
      if($this->dott=="Y"){
      	$dott=true;
      }else{
      	$dott=false;
      }
      if(!empty($this->dlen)){
      	$dlen=$this->dlen;
      }else{
      	$dlen="20";
      }
      if(!empty($this->size)){
      	$size=$this->size;
      }

    	$archives_datas=$archives->findAll(array('condition'=>implode(" AND ",$conditions),'params'=>$params,'order'=>$sort." ".$sort_type,'limit'=>$limit));
    	$attributes=array();
    	foreach($archives_datas as $key => $value){
			  $attributes[]=$value->attributes;
		  }
    	foreach($attributes as $key => $value){
        $value['stitle']=Util::cutstr(empty($value['stitle'])?$value['title']:$value['stitle'],$tlen,$dott);
        $value['scontent']=Util::cutstr(empty($value['scontent'])?$value['content']:$value['scontent'],$dlen,$dott);
        if($size){
        	$explode_size=explode("*",$size);
        	$width=$explode_size[0];
        	$height=$explode_size[1];
        	$value['image']="/".Util::rename_thumb_file($width,$height,"",$value['image']);
        }
        $value['channel_name']=$archives->show_channel($value['id']);
        $value['category_name']=$archives->show_category($value['id']);
      	$value['create_name']=$archives->show_create_id($value['id']);
        $value['modify_time']=($this->sort=="modify_time")?date('Y-m-d',strtotime($value['modify_time'])):($this->sort=="create_time")?date('Y-m-d',$value['create_time']):date('Y-m-d',$value['update_time']);
        $value['href']=$this->controller->createUrl("mchannels/archive",array('archive'=>$value['id']));
        $attributes[$key]=$value;
    	}
    	return $attributes;
    }
}
