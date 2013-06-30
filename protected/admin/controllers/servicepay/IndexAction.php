<?php
class IndexAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){
   $model=ServicePay::model();
  	  //定义搜索条件组合的array
	 $conditions=array();
	 $params=array();
	 $page_params=array();
	   //组合搜索条件
		$title=$_REQUEST['title'];
		if(!empty($title)){
		   array_push($conditions,"ServiceCustom.title LIKE :title");
		   $params[':title']="%$title%";
		   $page_params['title']=$title;
		}
		
		$status=$_REQUEST['status'];
		if(!empty($status)){
		   array_push($conditions,"t.status = :status");
		   $params[':status']=$status;
		   $page_params['status']=$status;
		}
		
		$service_type=$_REQUEST['service_type'];
		if(!empty($service_type)){
		   array_push($conditions,"t.service_type = :service_type");
		   $params[':service_type']=$service_type;
		   $page_params['service_type']=$service_type;
		}

	 $type=$_REQUEST['type'];
		if(!empty($type)){
			 $service_category=ServiceCategory::model();
			 $child_datas =$service_category->get_descendant($type);
		   array_push($conditions," ServiceCustom.type ".Util::db_create_in($child_datas));
		   $page_params['type']=$type;
		}
  
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
	 
	 $this->display('index',array('model'=>$model,'page_params'=>$page_params,'dataProvider'=>$dataProvider));
  } 
}
?>
