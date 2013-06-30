<?php
class EditAction extends BaseAction{
  protected function beforeAction(){
     $this->controller->init_page();
     return true;
  }
  protected function do_action(){ 
  	$model=new ServiceCustom();
  	$model_name=get_class($model);
  	if(isset($_POST[$model_name])){
  		$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
		  $model->attributes=$_POST[$model_name];
		  $user_ids=$_REQUEST['user_ids'];
		  if(!empty($user_ids)){
		  	$model->user_ids=implode(",",$user_ids);
		  }else{
		  	$model->user_ids='';
		  }
		  $model->service_type="8";
			if($model->validate()){
			  $model->insert_datas();
			  $this->controller->f(CV::SUCCESS_ADMIN_OPERATE);
		  }else{
			  $this->controller->f(CV::FAILED_ADMIN_OPERATE);
		  }
	 }else{
		  $id=$_REQUEST['id'];
		  $model=!empty($id)?$model->get_table_datas($id,array()):$model;
		  $user_ids=$model->user_ids?explode(",",$model->user_ids):array();
	 }
	 if(!empty($user_ids)){
		 $user=User::model();
	 	 $user_ids_data="";
	 	 foreach($user_ids as $key => $value){
	 	 	$user_data=$user->findByPk($value);
	 	 	$user_ids_data.="<div class='multiname'><a href='javascript:void();' onclick='javascript:this.parentNode.parentNode.removeChild(this.parentNode);'>".$user_data->user_login."</a><input type='hidden' id='' name='user_ids[]' value='".$user_data->id."'/></div>";
	 	}
	 }
	 $this->display('add',array('model'=>$model,'user_ids_data'=>$user_ids_data));
  } 
}
?>
