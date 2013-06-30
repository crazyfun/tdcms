<?php
class PackagebuyAction extends BaseAction{
	protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->user_tag="index";
        WebConfig::set_seo_content(array(),array(),array());
        WebConfig::set_breadcrumbs();
        return true;
    }
   protected function do_action(){
   	      $pay_flag=true;
   	      $cssPath=$this->controller->get_css_path();
     			$jsPath=$this->controller->get_js_path();
   	  		$user_id=Yii::app()->user->id;
   	  		$id=$_REQUEST['id'];
   	  		$pay_id=$_REQUEST['pay_id'];
   	  	  if(empty($id)&&empty($pay_id)){
   	  		   $pay_flag=false;
   	  		   $this->controller->f(CV::FAIL);
   	  	  }
   	  		$service_pay=ServicePay::model();
   	  		$implode_id=array();
   	  		$total_price=0;
   	  		if(empty($pay_id)){
   	  	
   	  		$service_custom=ServiceCustom::model();
   	  		if(is_array($id)){
   	  			
   	  			 foreach($id as $key => $value){
   	  			   $service_custom_data=$service_custom->findByPk($value);
   	  			   $total_price+=$service_custom_data->bargain_price;
   	  			   $service_pay->id=null;
   	  			 	 $service_pay->setIsNewRecord(true);
   	  			   $service_pay->service_type=$service_custom_data->service_type;
   	  			   $service_pay->service_id=$service_custom_data->id;
   	  			   $service_pay->status='1';
   	  			   if($service_pay->validate()){
			  					$service_pay->insert_datas();
			  					$implode_id[]=$service_pay->id;
			  		   }
   	  			 }
   	  		}else{
   	  			 	 $service_custom_data=$service_custom->findByPk($id);
   	  			 	 $total_price+=$service_custom_data->bargain_price;
   	  			 	 $service_pay->id=null;
   	  			 	 $service_pay->setIsNewRecord(true);
   	  			   $service_pay->service_type=$service_custom_data->service_type;
   	  			   $service_pay->service_id=$service_custom_data->id;
   	  			   $service_pay->status='1';
   	  			   $service_pay->validate();
   	  			   if($service_pay->validate()){
			  				   $service_pay->insert_datas();
			  				   $implode_id[]=$service_pay->id;
			  		   }
   	  		}
   
   	  	 }else{
   	  	 	  $service_pay_data=$service_pay->with("ServiceCustom")->findByPk($pay_id);
   	  	 	  $total_price=$service_pay_data->ServiceCustom->bargain_price;
   	  	 	  $implode_id[]=$service_pay_data->id;
   	  	 }
   	  		$user=User::model();
   	  		$user_data=$user->findByPk($user_id);
        	$this->display("packagebuy",array('cssPath'=>$cssPath,'jsPath'=>$jsPath,'user_data'=>$user_data,'total_price'=>$total_price,'implode_id'=>implode(",",$implode_id),'pay_flag'=>$pay_flag));
  }

}
?>