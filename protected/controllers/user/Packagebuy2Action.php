<?php
class Packagebuy2Action extends BaseAction{
	 protected function beforeAction(){
        $this->controller->init_user_page();
        $this->controller->user_tag="index";
        WebConfig::set_seo_content(array(),array(),array());
        WebConfig::set_breadcrumbs();
        return true;
    }
   protected function do_action(){
   	      $cssPath=$this->controller->get_css_path();
     			$jsPath=$this->controller->get_js_path();
   	  		$user_id=Yii::app()->user->id;
   	  		$id=$_REQUEST['id'];
   	  		$id=explode(",",$id);
   	  		$service_pay=ServicePay::model();
   	  		$consume=new CouponResume();
   	  		$user=User::model();
   	  		$transaction = Yii::app()->db->beginTransaction();
          try {
          foreach((array)$id as $key => $value){
          	 $service_pay_data=$service_pay->with("ServiceCustom")->findByPk($value);
          	 $bargain_price=$service_pay_data->ServiceCustom->bargain_price;
          	 $user_data=$user->findByPk($user_id);
          	 $coupon=$user_data->conpon;
          	 if($coupon>=$bargain_price){
          	 	  	$consume->consume($user_id,'2',$bargain_price,"购买服务和套餐");
          	 	  	$service_pay->updateByPk($service_pay_data->id,array('status'=>'2','pay_time'=>time()));
          	 	  	$this->controller->f(CV::SUCCESS);
          	 	  
          	 }else{
          	 	$this->controller->f(CV::FAIL);
          	 }
          }
         }catch(Exception $e){
          	 	   	  $this->controller->f(CV::FAIL);
                    $transaction->rollBack();  
         } 
        	$this->display("packagebuy2",array('cssPath'=>$cssPath,'jsPath'=>$jsPath));
  }

}
?>