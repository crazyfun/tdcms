<?php
class IndexAction extends BaseAction{
	  protected function beforeAction(){
        $this->controller->init_main_page();
        $sys_config=SysConfig::model();
		    $all_syscfg_values=$sys_config->get_all_syscfg();
        WebConfig::set_seo_content(array('seo_title'=>$all_syscfg_values['sfc_home_title']),array(),array());
        WebConfig::set_breadcrumbs();
        return true;
    }
   protected function do_action(){
   	$cssPath=$this->controller->get_css_path();
    $jsPath=$this->controller->get_js_path();
    $model=Archives::model();
  	//定义搜索条件组合的array
	 	$conditions=array();
	 	$params=array();
	 	$page_params=array();
	 	$order_condition=" t.create_time DESC ";
	 	$order_numbers="20";
	  //组合搜索条件
	  $advanced_flag=$_REQUEST['advanced_flag'];
	  $page_params['advanced_flag']=$advanced_flag;
	  
	  $action=$_REQUEST['action'];
	  if(empty($action)){
	  	$action="like";
	  }

	  $keywords=$_REQUEST['keywords'];
	  if(!empty($keywords)){
	  	 	if($action=="title"){
	  	 		$conditions[]=" t.title LIKE :title";
	  	 		$params[':title']="%".$keywords."%";
			 		$page_params['keywords']=$keywords;
			 }
			 if($action=="like"){
			 		$conditions[]=" (t.title LIKE :keywords) OR (t.archive_tags LIKE :keywords) OR (t.content LIKE :keywords) OR (t.scontent LIKE :keywords) OR (Channels.name LIKE :keywords)";
	  	 		$params[':keywords']="%".$keywords."%";
			 		$page_params['keywords']=$keywords;$conditions[]=" (t.title LIKE :keywords) OR (t.archive_tags LIKE :keywords) OR (t.content LIKE :keywords) OR (t.scontent LIKE :keywords) OR (Channels.name LIKE :keywords)";
	  	 		$params[':keywords']="%".$keywords."%";
			 		$page_params['keywords']=$keywords;
			}
			$search_keywords=SearchKeywords::model();
			$search_keywords->insert_keywords($keywords);
			
	}
	$page_params['action']=$action;
	  $channel=$_REQUEST['channel'];
		if(!empty($channel)){
		   $channels=Channels::model();
		   $channels_data=$channels->get_descendant($channel);
		   $conditions[]=" t.channel_id ".Util::db_create_in($channels_data);
			 $page_params['channel']=$channel;
		}  
		
		$published_time=$_REQUEST['published_time'];
		if(!empty($published_time)){
			$diff_time=60*60*24*$published_time;
			$conditions[]="UNIX_TIMESTAMP()-".$diff_time."<=t.create_time";
			$page_params['published_time']=$published_time;
		}
		$sort_select=$_REQUEST['sort_select'];
		if(!empty($sort_select)){
			 $config_values=ConfigValues::model();
			 $config_values_data=$config_values->findByPk($sort_select);
			 $order_condition="t.".$config_values_data->value." DESC ";
			 $page_params['sort_select']=$sort_select;
		}  
		$numbers=$_REQUEST['numbers'];
		if(!empty($numbers)){
			$order_numbers=$numbers;
			$page_params['numbers']=$numbers;
		}
		
	$conditions[]="t.status=:status";
	$params[':status']="2";
	$page_params['status']='2';
	 //定义排序类
	 $sort=new CSort();
   $sort->attributes=array();
   $sort->defaultOrder=$order_condition;
   $sort->params=$page_params;
  	 //生成ActiveDataProvider对象
	 $criteria=new CDbCriteria;
	 $dataProvider=new CActiveDataProvider($model, array(
		'criteria'=>array(
			'condition'=>implode(' AND ',$conditions),
			'params'=>$params,
			'with'=>array('Channels','User','ChannelCategory'),
		),
		'pagination'=>array(
			'pageSize' => $order_numbers,
			'params' => $page_params,
		),
		'sort'=>$sort,
	 ));
	 $this->display('index',array('model'=>$model,'page_params'=>$page_params,'dataProvider'=>$dataProvider,'cssPath'=>$cssPath,'jsPath'=>$jsPath,'advanced_flag'=>$advanced_flag));
 }

}
?>