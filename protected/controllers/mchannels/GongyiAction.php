<?php
class GongyiAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_main_page();
        return true;
    }
   protected function do_action(){
   	$cssPath=$this->controller->get_css_path();
    $jsPath=$this->controller->get_js_path();
    
    
    $model=new Gongyi();
  	$model_name=get_class($model);
  	if(isset($_POST[$model_name])){
  		$model=!empty($_POST[$model_name]['id'])?$model->get_table_datas($_POST[$model_name]['id']):$model;
      $model->attributes=$_POST[$model_name];
      $model->status='1';
			if($model->validate()){
			  $model->insert_datas();
			  $model->refresh();
			  $this->controller->f(CV::SUCCESS_ADMIN_OPERATE);
		  }else{
			  $this->controller->f(CV::FAILED_ADMIN_OPERATE);
		  }
		}

		$channel=$_REQUEST['channel'];
		if(empty($channel)){
			$this->controller->redirect("/error/error404");
		}
    $channels=Channels::model();
    $channels_data=$channels->findByPk($channel);
    $parent_id=$channels_data->parent_id;
    $permission=$channels_data->permission;
    if(Util::view_permission($permission)){
      $name=$channels_data->name;
    	WebConfig::set_breadcrumbs(array($name));
    	$seo_title=$channels_data->seo_title;
    	$seo_keywords=$channels_data->seo_keywords;
    	$seo_describe=$channels_data->seo_describe;
   		WebConfig::set_seo_content(array('seo_title'=>$seo_title),array('seo_keywords'=>$seo_keywords),array('seo_description'=>$seo_describe));
    	$cover_template=$channels_data->cover_template;
    	$cover_template=Util::get_file_name($cover_template);
			$this->display($cover_template,array('cssPath'=>$cssPath,'jsPath'=>$jsPath,'name'=>$name,'content'=>$channels_data->content,'channel'=>$channel,'channel_parent'=>$parent_id,'model'=>$model));
    }
    
   }

}
?>