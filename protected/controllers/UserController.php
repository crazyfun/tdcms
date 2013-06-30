<?php
class UserController extends Controller
{
	public $breadcrumbs=array();
	public $user_tag="";
  public function filters() {
		return array(
			'LoginFilter-notifyurl',
		);
	}
	public function FilterLoginFilter($filterChain) {
		if(Yii::app()->user->isGuest){
			$this->redirect($this->createUrl("login/index"));
	  }
		$filterChain->run();
	}
 public function actions(){
 	  $controller_path="application.controllers.user.";
		return array(
		  'index'=>$controller_path."IndexAction",
		  'editprofile'=>$controller_path."EditprofileAction",
		  'editemail'=>$controller_path."EditemailAction",
		  'editpassword'=>$controller_path."EditpasswordAction",
		  'coupon'=>$controller_path.'CouponAction',
		  'message'=>$controller_path.'MessageAction',
		  'messageshow'=>$controller_path.'MessageshowAction',
		  'returnurl'=>$controller_path.'ReturnurlAction',
		  'notifyurl'=>$controller_path.'NotifyurlAction',
		  'pay'=>$controller_path.'PayAction',
		  'pay2'=>$controller_path.'Pay2Action',
		  'packagebuy'=>$controller_path.'PackagebuyAction',
		  'packagebuy2'=>$controller_path.'Packagebuy2Action',
		  'wpackage'=>$controller_path.'WpackageAction',
		  'spackage'=>$controller_path.'SpackageAction',
		  'scustom'=>$controller_path.'ScustomAction',
		  'wcustom'=>$controller_path.'WcustomAction',
		  'ssupport'=>$controller_path."SsupportAction",
		  'addsupport'=>$controller_path."AddsupportAction",
		  'supportview'=>$controller_path."SupportviewAction",
		  'diycustom'=>$controller_path."DiycustomAction",
		);
	}
	
	public function f($msg_code){ 
     if($msg_code == CV::SUCCESS){
       $this->set_flash("操作成功",$msg_code);
     }
     if($msg_code == CV::FAIL){
     	 $this->set_flash("操作失败",$msg_code);
     }
     if($msg_code == CV::REFRASH){
     	$this->set_flash("请勿刷新页面",CV::FAIL);
    }
      if($msg_code == CV::PAYVALIDATE){
     	 $this->set_flash("您支付的数据错了，请重新支付或联系我们。",CV::FAIL);
     }
     
     if($msg_code == CV::PAYSUCCESS){
     	 $this->set_flash("充值成功",CV::FAIL);
     }
     
     if($msg_code == CV::PAYFAILED){
     	 $this->set_flash("充值失败",CV::FAIL);
     }
     
     
     
   }
}
