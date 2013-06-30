<?php
class WList extends CWidget
{ 
	  public $list_view="";
    public $channel="";
    public $category="";
    public $list_limit="";
    public $list_sort="";
    public $list_sort_type="";
    public $size="";
    public $ajaxUpdate="";  
    public function run(){
    	  //初始化页面需要的全局变量
   	$cssPath=$this->controller->get_css_path();
    $jsPath=$this->controller->get_js_path(); 
    $condition=array();
		$params=array();
		$page_params=array(); 
		
		if(!empty($this->channel)){
			$channel_model=Channels::model();
      $channel_childrens=$channel_model->get_descendant($this->channel);
			$condition[]="t.channel_id ".Util::db_create_in($channel_childrens);
			$page_params['channel']=$this->channel;
		}
		if(!empty($this->category)){
			$channel_category=ChannelCategory::model();
    	$category_childrens=$channel_category->get_descendant($this->category);
    	$condition[]="t.category_id ".Util::db_create_in($category_childrens);
			$page_params['category']=$this->category;
		}
		   if(!empty($this->list_sort)){
    		$list_sort="t.".$this->list_sort;
    	}else{
    		$list_sort="t.create_time";
    	}
    	
    	if(!empty($this->list_sort_type)){
    		$list_sort_type=$this->list_sort_type;
    	}else{
    		$list_sort_type="DESC";
    	}
    	
    	if(!empty($this->list_limit)){
    		$list_limit=$this->list_limit;
    	}else{
    		$list_limit="20";
    	}
    	
    if(!empty($this->list_view)){
    		$list_view=$this->list_view;
    	}else{
    		$list_view="title_date_list";
    	}
		$condition[]=" t.status=:status ";
    $params[':status']='2';
    //定义排序类
		$sort=new CSort();
  	$sort->attributes=array();
  	$sort->defaultOrder=$list_sort." ".$list_sort_type;
  	$sort->params=$page_params;
  	$model=new Archives();
  	//生成ActiveDataProvider对象
  	$dataProvider=new CActiveDataProvider($model, array(
				'criteria'=>array(
			  	'condition'=>implode(' AND ',$condition),
			 	 	'params'=>$params,
			  	'with'=>array('Channels','User',"ChannelCategory"),
			  	'together'=>true,
		    ),
				'pagination'=>array(
          'pageSize' => $list_limit,
          'params' => $page_params,
      	),
      	'sort'=>$sort,
		));
		$explode_size=explode("*",$this->size);
		$width=$explode_size[0];
		$height=$explode_size[1];
		$dataProvide_data=$dataProvider->getData();
		foreach($dataProvide_data as $key => $value){
			$value['image']="/".Util::rename_thumb_file($width,$height,"",$value['image']);
			$value['stitle']=empty($value['stitle'])?$value['title']:$value['stitle'];
      $value['scontent']=empty($value['scontent'])?$value['content']:$value['scontent'];
      $value['modify_time']=($this->list_sort=="modify_time")?date('Y-m-d',strtotime($value['modify_time'])):($this->list_sort=="create_time")?date('Y-m-d',$value['create_time']):date('Y-m-d',$value['update_time']);
      $value['channel_name']=$value->show_attribute("channel_id");
      $value['category_name']=$value->show_attribute("category_id");
      $value['create_name']=$value->show_attribute("create_id");
      $value['href']=$this->controller->createUrl("mchannels/archive",array('archive'=>$value['id']));
      $dataProvide_data[$key]=$value;
		}
		$dataProvider->data=$dataProvide_data;
    $this->render("wlist",array('dataProvider'=>$dataProvider,'list_view'=>$list_view,'ajaxUpdate'=>$this->ajaxUpdate,'page_params'=>$page_params,'cssPath'=>$cssPath,'jsPath'=>$jsPath));
  }    
   
}
