<?php

class ManageUser{
 private static $static_class=null;
 public static function get()
 {
   if (self::$static_class == null){
      self::$static_class =  new ManageUser();
   }
    return self::$static_class;
  }
  public  function __construct()
  {
    
  }
  
  public function get_menus(){
  	$menus=array(
  	'default'=>array('name'=>'用户中心','class'=>'user_default','url'=>'','menus'=>array(
  	'index'=>array(
  	   'name'=>'个人资料',
  	   'url'=>'user/index',
  	   'class'=>'user_index',
  	  ),
  	  'editprofile'=>array(
  	    'name'=>'修改资料',
  	    'url'=>'user/editprofile',
  	    'class'=>'user_editprofile',
  	  ),
  	  'editemail'=>array(
  	  	'name'=>'修改邮箱',
  	  	'url'=>'user/editemail',
  	  	'class'=>'user_editemail'
  	  ),
  	  'editpassword'=>array(
  	    'name'=>'修改密码',
  	    'url'=>'user/editpassword',
  	    'class'=>'user_editpassword'
  	  ),
  	  
  	 'coupon'=>array(
  	    'name'=>'账户明细',
  	    'url'=>'user/coupon',
  	    'class'=>'user_coupon'
  	  ),
  	  
  	  'message'=>array(
  	    'name'=>'站内消息',
  	    'url'=>'user/message',
  	    'class'=>'user_message'
  	  ),
  	   
  	 'ssupport'=>array(
  	   	'name'=>'服务支持',
  	   	'url'=>'user/ssupport',
  	   	'class'=>'user_ssupport',
  	  ),

  	)),
  	
  	
  	'service'=>array('name'=>'业务管理','class'=>'user_service','url'=>'','menus'=>array(
  	 'wpackage'=>array(
  	   'name'=>'网站套餐',
  	   'url'=>'user/wpackage',
  	   'class'=>'user_wpackage',
  	  ),
  	  
  	  'spackage'=>array(
  	   	'name'=>'服务套餐',
  	   	'url'=>'user/spackage',
  	   	'class'=>'user_spackage',
  	  ),
  	  
  	  
  	  'scustom'=>array(
  	   	'name'=>'服务定制',
  	   	'url'=>'user/scustom',
  	   	'class'=>'user_scustom',
  	  ),
  	  
  	  'wcustom'=>array(
  	   	'name'=>'网站定制',
  	   	'url'=>'user/wcustom',
  	   	'class'=>'user_wcustom',
  	  ),
  	 

  	)),
  	
  	
  	'diy'=>array('name'=>'定制业务','class'=>'user_diy','url'=>'','menus'=>array(
  	 'diycustom'=>array(
  	   'name'=>'定制业务',
  	   'url'=>'user/diycustom',
  	   'class'=>'user_diycustom',
  	  ),
  	)),


  	);
  	return $menus;
  }
  
  public function get_user_menus($user_id=""){
  	$user_id=empty($user_id)?Yii::app()->user->id:$user_id;
  	$user_type=UserType::model();
  	$type=$user_type->get_user_type($user_id);
  	$menus=$this->get_menus();
  	$return_menus=array();
  	switch($type){
  		case '1':
  		    $return_menus['default']=$menus['default'];
  		    $return_menus['service']=$menus['service'];
  		    $return_menus['diy']=$menus['diy'];
  				break;
  		default:
  		    break;
  	}
  	return $return_menus;
  }

}
?>
