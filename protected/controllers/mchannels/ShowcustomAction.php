<?php
class ShowcustomAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_page();
        return true;
    }
   protected function do_action(){
   	$cssPath=$this->controller->get_css_path();
    $jsPath=$this->controller->get_js_path();
    $id=$_REQUEST['id'];
    $service_custom=ServiceCustom::model();
    $service_custom_data=$service_custom->findByPk($id);
    $content=$service_custom_data->sdescribe;
		$this->display("show_custom",array('cssPath'=>$cssPath,'jsPath'=>$jsPath,'content'=>$content));
   }
  
}
?>