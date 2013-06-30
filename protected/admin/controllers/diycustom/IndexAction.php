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
		
		$type=$_REQUEST['type'];
		if(!empty($type)){
		   array_push($conditions,"t.type = :type");
		   $params[':type']=$type;
		   $page_params['type']=$type;
		}
		
			$start_date=$_REQUEST['start_date'];
		if(!empty($start_date)){
		   array_push($conditions,"t.start_date >= :start_date");
		   $params[':start_date']=$start_date;
		   $page_params['start_date']=$start_date;
		}
		
		$end_date=$_REQUEST['end_date'];
		if(!empty($end_date)){
		   array_push($conditions,"t.end_date <= :end_date");
		   $params[':end_date']=$end_date;
		   $page_params['end_date']=$end_date;
		}
   $user_id=$_REQUEST['user_id'];
		if(!empty($user_id)){
		   array_push($conditions,"FIND_IN_SET('".$user_id."',t.user_ids)>0");
		   $page_params['user_id']=$user_id;
		   $user=User::model();
		   $user_data=$user->findByPk($user_id);
		   $search_user=$user_data->user_login;
		}
	  array_push($conditions,"t.service_type = :service_type");
		$params[':service_type']='8';
		$page_params['service_type']='8';   
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
	 
	 $this->display('index',array('model'=>$model,'page_params'=>$page_params,'dataProvider'=>$dataProvider,'search_user'=>$search_user));
  } 
}
?>
