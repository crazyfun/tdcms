<?php
class BZ {
	static function  menus($params=""){
		
		$params=self::splite_params($params);
		$view=$params['view'];
		$select=$params['select'];
		if(empty($select)){
			$select="menu_select";
		}
	   Yii::app()->getController()->widget('Menus', array( 
           'view'=>$view, 
           'select'=>$select,           
     )); 
 
	}
 //BZ::blocks("channel/9/category/4/archive/5/view/title_date_block/sort/modify_time/sort_type/DESC/limit/10/attr/f/tlen/12/dlen/12/size/400*200/cacheid/home_copanynews/cache/86400");
 static function blocks($params=""){
		$sys_config=SysConfig::model();
		$sys_config_values=$sys_config->get_all_syscfg();
		$sfc_cache=$sys_config_values['sfc_cache'];
		$params=self::splite_params($params);
	  $id=$params['id'];
	  if(!empty($id)){
	  	  $blocks=Blocks::model();
	  	  $block_data=$blocks->findByPk($id);
	  	  $channel=$block_data['channel'];
				$category=$block_data['category'];
				$archive=$block_data['archive_ids'];
				$config_values=ConfigValues::model();
				$block_view=$config_values->findByPk($block_data['view']);
        $sort_select=$config_values->findByPk($block_data['sort']);
				$view=$block_view->value;
				$sort=$sort_select->value;
				$block_sort_type=CV::$block_sort_type;
				$sort_type=$block_sort_type[$block_data['sort_type']];
				$limit=$block_data['limit'];
				$attr=$block_data['attr'];
				$tlen=$block_data['tlen'];
				$dott=$block_data['dott'];
				$dlen=$block_data['dlen'];
				$size=$block_data['size'];
				$cacheid=$block_data['identification'];
				$cache=$block_data['cache'];
	  }else{
	  	  $channel=$params['channel'];
				$category=$params['category'];
				$archive=$params['archive'];
				$view=$params['view'];
				$sort=$params['sort'];
				$sort_type=$params['sort_type'];
				$limit=$params['limit'];
				$attr=$params['attr'];
				$tlen=$params['tlen'];
				$dott=$params['dott'];
				$dlen=$params['dlen'];
				$size=$params['size'];
				$cacheid=$params['cacheid'];
				$cache=$params['cache'];
	  }
		if($sfc_cache=="N"){
			$cache=0;
		}
		if(empty($cacheid)){
			$cacheid="blocks";
		}
	  if(Yii::app()->getController()->beginCache($cacheid, array('duration'=>$cache))){
            Yii::app()->getController()->widget('WBlocks', array( 
                     'archive'=>$archive,
                     'channel'=>$channel,
                     'category'=>$category,
                     'archive'=>$archive,
                     'view'=>$view,
                     'sort'=>$sort,
                     'sort_type'=>$sort_type,
                     'limit'=>$limit,  
                     'attr'=>$attr,   
                     'tlen'=>$tlen,
                     'dott'=>$dott,
                     'dlen'=>$dlen, 
                     'size'=>$size,      
            )); 
            Yii::app()->getController()->endCache(); 
     }  
	}
	
	static function more($params=""){
		 $params=self::splite_params($params);
		 $channel=$params['channel'];
		 $category=$params['category'];
		 echo  CHtml::link("more",Yii::app()->getController()->createUrl("mchannels/list",array('channel'=>$channel,'category'=>$category)),array('title'=>'查看更多'));
	}
	
	static function lists($params=""){
		$params=self::splite_params($params);
		if(!empty($params['id'])){
			$channels_model=Channels::model();
			$channel_data=$channels_model->findByPk($params['id']);
			$channel=$channel_data->id;
			$category=$params['category']; 
			$config_values=ConfigValues::model();
			$archive_view=$config_values->findByPk($channel_data->list_view);
      $archive_sort=$config_values->findByPk($channel_data->list_sort);
			$list_view=$archive_view->value;
			$list_sort=$archive_sort->value;
			$archive_sort_type=CV::$list_sort_type;
			$list_sort_type=$archive_sort_type[$channel_data->list_sort_type];
			$list_limit=$channel_data->list_limit;
			if(!empty($params['size'])){
				$size=$params['size'];
			}else{
				$explode_size=explode(",",$channel_data->image_size);
				$size=$explode_size[0];
		  }
			$ajaxUpdate=$params['ajaxUpdate']?true:false;
		}else{
			$list_view=$params['list_view'];
			$channel=$params['channel'];
			$category=$params['category'];
			$list_limit=$params['list_limit'];
			$list_sort=$params['list_sort'];
			$list_sort_type=$params['list_sort_type'];
			$size=$params['size'];
			$ajaxUpdate=$params['ajaxUpdate']?true:false;
	  }
    Yii::app()->getController()->widget('WList', array( 
          'list_view'=>$list_view,
          'channel'=>$channel,
          'category'=>$category,
          'list_limit'=>$list_limit,
          'list_sort'=>$list_sort,
          'list_sort_type'=>$list_sort_type,
          'size'=>$size,
          'ajaxUpdate'=>$ajaxUpdate,
    ));       
	}
	
	static function channels($params){
		$params=self::splite_params($params);
		$view=$params['view'];
		$ids=$params['ids'];
		$parent=$params['parent'];
		$show=$params['show'];

	  if(empty($view)){
	  	$view="children_list";
	  }
	  $select=$params['select'];
		if(empty($select)){
			$select="channel_select";
		}
    Yii::app()->getController()->widget('WChannel', array( 
          'view'=>$view,
          'ids'=>$ids,
          'parent'=>$parent,
          'show'=>$show,
          'select'=>$select,
                    
    )); 
	}
	
	static function category($params){
		$params=self::splite_params($params);
		$view=$params['view'];
		$channel=$params['channel'];
		$ids=$params['ids'];
		$parent=$params['parent'];
	  if(empty($view)){
	  	$view="children_list";
	  }

	  $select=$params['select'];
		if(empty($select)){
			$select="category_select";
		}
    Yii::app()->getController()->widget('WCategory', array( 
          'view'=>$view,
          'channel'=>$channel,
          'ids'=>$ids,
          'parent'=>$parent,  
          'select'=>$select,        
    ));
	}
	
	static function relation($params=""){
		$params=self::splite_params($params);
		$archive=$params['archive']; 
		$show=$params['show'];
		if(empty($show)){
			$show="v";
		}
		$archives=Archives::model();
		$archive_data=$archives->findByPk($archive);
		$channel=$archive_data->channel_id;
		$is_relation=$archive_data->is_relation;
		if($is_relation=='1'){
			$first_data=$archives->find(array('condition'=>'t.id<:archive AND t.channel_id=:channel_id','params'=>array(':archive'=>$archive,':channel_id'=>$channel),'order'=>'t.id DESC'));
			$next_data=$archives->find(array('condition'=>'t.id>:archive AND t.channel_id=:channel_id','params'=>array(':archive'=>$archive,':channel_id'=>$channel),'order'=>'t.id ASC'));
	  	$first_href="";
	 		$next_href="";
	 	 	if(empty($first_data)){
	  		$first_href="没有了";
	  	}else{
	  		$first_href=CHtml::link($first_data->title,Yii::app()->getController()->createUrl('mchannels/archive',array('archive'=>$first_data->id)),array('title'=>$first_data->title));
	  	}
	  	if(empty($next_data)){
	  		 $next_href="没有了";
	  	}else{
	  		 $next_href=CHtml::link($next_data->title,Yii::app()->getController()->createUrl('mchannels/archive',array('archive'=>$next_data->id)),array('title'=>$next_data->title));
	 	  }
	 	 	if($show=="v"){
	  	    echo "<p>上一篇：".$first_href."</p><p>下一篇：".$next_href."</p>";

	  	}else{
	  	    echo  "<span>上一篇：".$first_href."</span>&nbsp;&nbsp;<span>下一篇：".$next_href."</span>";
	  	}
		}

	}
	
	static function flink($params=""){
		$sys_config=SysConfig::model();
		$sys_config_values=$sys_config->get_all_syscfg();
		$sfc_cache=$sys_config_values['sfc_cache'];
		$params=self::splite_params($params);
		$type=$params['type'];
		$view=$params['view'];
		if(empty($view)){
			$view="flink_list";
		}
		$limit=$params['limit'];
		if($sfc_cache=="N"){
			$cache=0;
		}
		if(empty($cacheid)){
			$cacheid="flink";
		}
		if(Yii::app()->getController()->beginCache($cacheid, array('duration'=>$cache))){
            Yii::app()->getController()->widget('Flink', array( 
                 'type'=>$type,
                 'view'=>$view,  
                 'limit'=>$limit,    
            )); 
            Yii::app()->getController()->endCache(); 
     }  
	}
	
	
	static function comment($params=""){
		$params=self::splite_params($params);
		$model=$params['model'];
		$content_id=$params['archive'];
		$user_flag=$params['user'];
		$input_type=$params['type'];
		$level=$params['level'];
		$archives=Archives::model();
		$archive_data=$archives->findByPk($content_id);
		$is_comment=$archive_data->is_comment;
		if($is_comment=='1'){
				Yii::app()->getController()->widget('WebComment', array(      
                   'model_id'=>$model,
                   'user_flag'=>$user_flag,
                   'content_id'=>$content_id,
                   'input_type'=>$input_type,
                   'level'=>$level,             
    		)); 
    }       
	}
	static function ad($params=""){
		$sys_config=SysConfig::model();
		$sys_config_values=$sys_config->get_all_syscfg();
		$sfc_cache=$sys_config_values['sfc_cache'];
		$params=self::splite_params($params);
		$id=$params['id'];
		$cacheid=$params['cacheid'];
		$cache=$params['cache'];
		if($sfc_cache=="N"){
			$cache=0;
		}
		if($cacheid){
			$cacheid="ad_".$id;
		}
	  if(Yii::app()->getController()->beginCache($cacheid, array('duration'=>$cache))){
			$advertising=Advertising::model();
			$advertising_data=$advertising->findByPk($id);
		  echo $advertising_data->content;
		  Yii::app()->getController()->endCache();
    }  
	}
	
	static function flash($params=""){
		$sys_config=SysConfig::model();
		$sys_config_values=$sys_config->get_all_syscfg();
		$sfc_cache=$sys_config_values['sfc_cache'];
		$params=self::splite_params($params);
		$view=$params['view'];
		$cacheid=$params['cacheid'];
		$cache=$params['cache'];
		$view=$params['view'];
		if($sfc_cache=="N"){
			$cache=0;
		}
		if($cacheid){
			$cacheid="flash";
		}
	  if(Yii::app()->getController()->beginCache($cacheid, array('duration'=>$cache))){
            Yii::app()->getController()->widget('Flash', array( 
                     'view'=>$view,            
            )); 
            Yii::app()->getController()->endCache(); 
     }  
	}
	
	static function message($params=""){
		$params=self::splite_params($params);
		$view=$params['view'];
		$code=$params['code'];
		if(empty($view)){
			$view="message";
		}
    Yii::app()->getController()->widget('Wmessage', array( 
           'code'=>$code,
           'view'=>$view,        
    )); 
	}
	
	static function reply($params=""){
		$params=self::splite_params($params);
		$view=$params['view'];
		$limit=$params['limit'];
		if(empty($limit)){
			$limit='10';
		}
		if(empty($view)){
			$view="reply_item";
		}
    Yii::app()->getController()->widget('Wreply', array( 
           'view'=>$view,
           'limit'=>$limit,        
    )); 
	}
	
	static function webmap($params=""){
		$params=self::splite_params($params);
		$view=$params['view'];
		$cacheid=$params['cacheid'];
		$cache=$params['cache'];
		if($sfc_cache=="N"){
			$cache=0;
		}
		if($cacheid){
			$cacheid="webmap";
		}
	  if(Yii::app()->getController()->beginCache($cacheid, array('duration'=>$cache))){
            Yii::app()->getController()->widget('Wwebmap', array( 
                     'view'=>$view,            
            )); 
            Yii::app()->getController()->endCache(); 
     }   
	}
	
	static function helpcategory($params=""){
		$params=self::splite_params($params);
		$view=$params['view'];
		$cacheid=$params['cacheid'];
		$cache=$params['cache'];
		if($sfc_cache=="N"){
			$cache=0;
		}
		if($cacheid){
			$cacheid="helpcategory";
		}
	  if(Yii::app()->getController()->beginCache($cacheid, array('duration'=>$cache))){
            Yii::app()->getController()->widget('Whelpcategory', array( 
                     'view'=>$view,            
            )); 
            Yii::app()->getController()->endCache(); 
     }   
		
	}
	
	static function helpcontent($params=""){
		$params=self::splite_params($params);
		$view=$params['view'];
		$cid=$param['cid'];
		$cacheid=$params['cacheid'];
		$cache=$params['cache'];
		if($sfc_cache=="N"){
			$cache=0;
		}
		if($cacheid){
			$cacheid="helpcontent";
		}
	  if(Yii::app()->getController()->beginCache($cacheid, array('duration'=>$cache))){
            Yii::app()->getController()->widget('Whelpcontent', array( 
                     'view'=>$view,   
                     'cid'=>$cid,         
            )); 
            Yii::app()->getController()->endCache(); 
     }   
	}
	static function  splite_params($params=""){
		if(empty($params)){
			return null;
		}
		$params = str_replace("//", "/",$params);
		$params_explode=explode("/",$params);
	  $params_count=count($params_explode);
	 
	  if($params_count%2){
	  	return null;
	  }	
	  $return_params=array();
	  for($ii=0; $ii< $params_count; $ii=$ii+2){
	  	$key=$params_explode[$ii];
	  	$return_params[$key]=$params_explode[$ii+1];
	  }
	  return $return_params;
	}
}
?>
