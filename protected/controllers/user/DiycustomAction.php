<?php
class DiycustomAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->user_tag="diycustom";
        WebConfig::set_seo_content(array(),array(),array());
        WebConfig::set_breadcrumbs();
        return true;
    }
   protected function do_action(){
   	  $cssPath=$this->controller->get_css_path();
     	$jsPath=$this->controller->get_js_path();
   	  $user_id=Yii::app()->user->id;
   	  $conditions=array();
	 		$params=array();
	 		$page_params=array();
	 		
	 		  //组合搜索条件
		$title=$_REQUEST['title'];
		if(!empty($title)){
		   array_push($conditions,"t.title LIKE :title");
		   $params[':title']="%".$title."%";
		   $page_params['title']=$title;
		}
		
		
			  //组合搜索条件
		$start_time=$_REQUEST['start_time'];
		if(!empty($start_time)){
		   array_push($conditions,"t.start_date>=:start_time");
		   $params[':start_time']=$start_time;
		   $page_params['start_time']=$start_time;
		}
		
		
				  //组合搜索条件
		$end_time=$_REQUEST['end_time'];
		if(!empty($end_time)){
		   array_push($conditions,"t.end_date<=:end_time");
		   $params[':end_time']=$end_time;
		   $page_params['end_time']=$end_time;
		}
		

		
	 	 $conditions[]=" t.service_type=:service_type";
	 	 $params[':service_type']='8';
	 	 $page_params['service_type']='8';
	 	 
	 	 $conditions[]=" ((FIND_IN_SET('".$user_id."',t.user_ids)>0) OR t.user_ids='') ";
	 	 $model=ServiceCustom::model();
			 //定义排序类
		 $sort=new CSort();
  	 $sort->attributes=array();
  	 $sort->defaultOrder="t.create_time DESC";
  	 $sort->params=$page_params;
  	 //生成ActiveDataProvider对象
	 	$criteria=new CDbCriteria;
	 	$dataProvider=new CActiveDataProvider($model, array(
			'criteria'=>array(
			'condition'=>implode(' AND ',$conditions),
			'params'=>$params,
			'with'=>array("User"),
			),
			'pagination'=>array(
			'pageSize' => '20',
			'params' => $page_params,
			),
			'sort'=>$sort,
	 	));
		$this->display("diy_custom",array('model'=>$model,'dataProvider'=>$dataProvider,'page_params'=>$page_params,'cssPath'=>$cssPath,'jsPath'=>$jsPath));
  }

}
?>