<?php
class WpackageAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->user_tag="wpackage";
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

	 	 $conditions[]=" t.service_type=:service_type";
	 	 $params[':service_type']='10';
	 	 $page_params['service_type']='10';
	 	 
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
		$this->display("wpackage",array('model'=>$model,'dataProvider'=>$dataProvider,'page_params'=>$page_params,'cssPath'=>$cssPath,'jsPath'=>$jsPath));
  }

}
?>