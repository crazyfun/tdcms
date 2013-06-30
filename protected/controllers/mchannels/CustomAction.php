<?php
class CustomAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_main_page();
        return true;
    }
   protected function do_action(){
   	$cssPath=$this->controller->get_css_path();
    $jsPath=$this->controller->get_js_path();
		$channel=$_REQUEST['channel'];
		$cateogry=$_REQUEST['cateogry'];
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
    	$service_custom=ServiceCustom::model();
    	$service_custom_datas=$service_custom->get_custom_datas($cateogry);
    	$service_custom_html=$this->rend_service_custom($service_custom_datas);
			$this->display($cover_template,array('cssPath'=>$cssPath,'jsPath'=>$jsPath,'name'=>$name,'content'=>$channels_data->content,'channel'=>$channel,'channel_parent'=>$parent_id,'service_custom_html'=>$service_custom_html));
    }
   }
   
   function rend_service_custom($datas){
   	  $cssPath=$this->controller->get_css_path();
      $jsPath=$this->controller->get_js_path();
      $return_str="";
   	  foreach($datas as $key => $value){
   	  	$return_str.='<h3 class="dz_title"><img class="constom_img_click" index="'.$value['id'].'" flag="open" src="'.$cssPath.'/images/ico_close.gif"/>'.$value['name'].'</h3>';
   	  	$return_str.='<div class="dzbox" id="children_'.$value['id'].'">';
   	  	$children=$value['children'];
   	  	$items=$value['items'];
   	  	if(!empty($children)){
   	  		$return_str.=$this->rend_service_custom($children);
   	  	}
   	  	if(!empty($items)){
   	  		foreach($items as $key1 => $value1){
   	  				      $return_str.='<div class="dzli">';
                    $return_str.='<div class="dzt1">'.$value1['title'].'</div>';
                    $return_str.='<div class="dzt4">'.CHtml::checkBox("id[]",false,array('value'=>$value1['id'],'price'=>$value1['bargain_price'],'class'=>'check_price')).'</div>';
                    $return_str.='<div class="dzt3">'.$value1['bargain_price'].'&nbsp;'.$value1['unit'].'</div>';
                    $return_str.='<div class="dzt2">'.$value1['describe'];
                    if(!empty($value1['sdescribe'])){
                    	$return_str.="&nbsp;<a href=\"javascript:show_custom_describe('".$value1['id']."')\">".CHtml::image($cssPath."/images/faqsmall.jpg",$value1['title'],array())."</a>";
                    }
                    $return_str.='</div>'; 
                    $return_str.='</div>';
   	  		}
   	  	}
   	  	$return_str.='</div>';
   	  }
   	  return $return_str;
   	
   }

}
?>