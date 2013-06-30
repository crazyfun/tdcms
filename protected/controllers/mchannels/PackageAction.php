<?php
class PackageAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_main_page();
        return true;
    }
   protected function do_action(){
   	$cssPath=$this->controller->get_css_path();
    $jsPath=$this->controller->get_js_path();
		$channel=$_REQUEST['channel'];
		$type=$_REQUEST['type'];
		if(empty($channel)){
			$this->controller->redirect("/error/error404");
		}
		$category=$_REQUEST['category'];
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
    	$lists_template=$channels_data->lists_template;
    	$lists_template=Util::get_file_name($lists_template);
    	
    	$service_custom=ServiceCustom::model();
    	if($type=='3'){
    		$service_type="9";
    		$service_custom_datas=$service_custom->get_custom_datas("25",$service_type);
   
    	}
    	if($type=='4'){
    		  $service_type="10";
    			$service_custom_datas=$service_custom->findAll(array('condition'=>'service_type=:service_type','params'=>array(':service_type'=>$service_type),'order'=>'sort ASC'));
			
    	}
			$this->display($lists_template,array('cssPath'=>$cssPath,'jsPath'=>$jsPath,'name'=>$name,'channel'=>$channel,'channel_parent'=>$parent_id,'category'=>$category,'service_custom_datas'=>$service_custom_datas,'type'=>$type));
	  }
	 
  }

}
?>