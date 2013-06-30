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
		  $image=$model->image;
		  $model->attributes=$_POST[$model_name];
		  $model->service_type="10";
		    //ÅÐ¶ÏÊÇ·ñÊÇÐÞ¸ÄÍ¼Æ¬
		  $select_image=$_REQUEST['select_image'];
		  if(!$select_image){
		     $upload_file=CUploadedFile::getInstance($model, 'image');
		     if(!empty($upload_file->name)){
					  $model->image=Util::rename_file($upload_file->name);
			   }
			}else{
				 $model->image=$image;
			}
			if($model->validate()){
					//ÉÏ´«Í¼Æ¬
				if(($upload_file!=null)&&!empty($model->image)){
				  $save_path="upload/package";
			    Util::makeDirectory($save_path);
				  $upload_file->saveAs($save_path."/".$model->image);
				  Util::cut_image(133,149,$save_path,$model->image);
				  $model->image=$save_path."/".$model->image;
			  }
			  $model->insert_datas();
			  $this->controller->f(CV::SUCCESS_ADMIN_OPERATE);
		  }else{
			  $this->controller->f(CV::FAILED_ADMIN_OPERATE);
		  }
	 }else{
		  $id=$_REQUEST['id'];
		  $model=!empty($id)?$model->get_table_datas($id,array()):$model;
	 }
	 $this->display('add',array('model'=>$model));
  } 
}
?>
