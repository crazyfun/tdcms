<?php
class IndexAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){
   $model=ServiceCustom::model();
  	  //定义搜索条件组合的array
	 $conditions=array();
	 $params=array();
	 $page_params=array();
	   //组合搜索条件
		$title=$_REQUEST['title'];
		if(!empty($title)){
		   array_push($conditions,"t.title LIKE :title");
		   $params[':title']="%$title%";
		   $page_params['title']=$title;
		}
	  array_push($conditions,"t.service_type = :service_type");
		$params[':service_type']='10';
		$page_params['service_type']='10';   
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
	 
	 $this->display('index',array('model'=>$model,'page_params'=>$page_params,'dataProvider'=>$dataProvider));
  } 
}
?>
