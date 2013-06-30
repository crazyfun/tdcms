<?php
class WcustomAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->user_tag="wcustom";
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
		   array_push($conditions,"ServiceCustom.title LIKE :title");
		   $params[':title']="%".$title."%";
		   $page_params['title']=$title;
		}
		$status=$_REQUEST['status'];
		if(!empty($status)){
		   array_push($conditions,"t.status = :status");
		   $params[':status']=$status;
		   $page_params['status']=$status;
		}
		
		$type=$_REQUEST['type'];
		if(!empty($type)){
			 $service_category=ServiceCategory::model();
			 $child_datas =$service_category->get_descendant($type);
		   array_push($conditions," ServiceCustom.type ".Util::db_create_in($child_datas));
		   $page_params['type']=$type;
		}else{
			 $service_category=ServiceCategory::model();
			 $child_datas =$service_category->get_descendant("23");
		   array_push($conditions," ServiceCustom.type ".Util::db_create_in($child_datas));
		}
		
	 	 $conditions[]=" t.service_type=:service_type";
	 	 $params[':service_type']='7';
	 	 $page_params['service_type']='7';
	 	 
	 	 $conditions[]=" t.create_id=:create_id";
	 	 $params[':create_id']=$user_id;
	 	 $page_params['create_id']=$user_id;
	 	 $model=ServicePay::model();
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
			'with'=>array("User","ServiceCustom"),
			),
			'pagination'=>array(
			'pageSize' => '20',
			'params' => $page_params,
			),
			'sort'=>$sort,
	 	));
		$this->display("w_custom",array('model'=>$model,'dataProvider'=>$dataProvider,'page_params'=>$page_params,'cssPath'=>$cssPath,'jsPath'=>$jsPath));
  }

}
?>