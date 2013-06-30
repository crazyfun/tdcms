<?php
class ParchiveAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_main_page();
        return true;
    }
   protected function do_action(){
   	$cssPath=$this->controller->get_css_path();
    $jsPath=$this->controller->get_js_path();
    $id=$_REQUEST['id'];
    $channel=$_REQUEST['channel'];
    if(empty($id)){
    	$this->controller->redirect("/error/error404");
    }
    $channels=Channels::model();
    $channels_data=$channels->findByPk($channel);
    $parent_id=$channels_data->parent_id;
    $permission=$channels_data->permission;
    if(Util::view_permission($permission)){
    	$channel_name=$channels_data->name;
    	WebConfig::set_breadcrumbs(array($channel_name=>$this->controller->createUrl("mchannels/list",array('channel'=>$channel,'category'=>'')),$archive_data->title));
    	$seo_title=$archive_data->title;
    	$seo_keywords=$archive_data->seo_keywords;
    	$seo_describe=$archive_data->seo_describe;
   		WebConfig::set_seo_content(array('seo_title'=>$seo_title),array('seo_keywords'=>$seo_keywords),array('seo_description'=>$seo_describe));
    	$archive_template=$channels_data->archive_template;
    	$archive_template=Util::get_file_name($archive_template);
    	$service_custom=ServiceCustom::model();
    	$service_custom_data=$service_custom->findByPk($id);
    	if($this->controller->beginCache($id, array('dependency'=>array(
        'class'=>'system.caching.dependencies.CDbCacheDependency',
        'sql'=>'SELECT MAX(update_time) FROM tr_archives')))){ 
            $this->display($archive_template,array('cssPath'=>$cssPath,'jsPath'=>$jsPath,'channel_name'=>$channel_name,'channel'=>$channel,'channel_parent'=>$parent_id,'service_custom_data'=>$service_custom_data));
        $this->controller->endCache();
      }
			
	  }
   }

}
?>