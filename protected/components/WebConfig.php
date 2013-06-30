<?php
class WebConfig {
	
	
	public static $breadcrumbs=array(
	   ''=>array(
	  	 'site'=>array(
	      	'index'=>array('首页'),
	      	'forgotpassword'=>array('找回密码'),
	      	'validatepassword'=>array('找回密码'),
	   	 ),
	   	 'mchannels'=>array(
	         'index'=>array(''),
	         'list'=>array(''),
	         'archive'=>array(''),
	         'custom'=>array(''),
	         'package'=>array(''),
	         'parchive'=>array(''),
	      
	     ),
	     'help'=>array(
	     
	     ),
	     'registe'=>array(
	     	  'index'=>array('注册会员'),
	     	  'registe2'=>array('注册会员'),
	     	  'registe3'=>array('注册会员')
	     	),
	     	
	     	'login'=>array(
	     	  'index'=>array('会员登录'),
	     	  'logout'=>array('会员退出'),
	     	),
	     	
	     	'error'=>array(
	     	  'error404'=>array('页面错误'),
	     	  
	     	),
	     	
	     	'user'=>array(
	     		 'index'=>array('用户中心'=>"user/index",'个人资料'),	
	     		 'editprofile'=>array('用户中心'=>"user/index",'修改资料'),
	     		 'editemail'=>array('用户中心'=>"user/index",'修改邮箱'),
	     		 'editpassword'=>array('用户中心'=>"user/index",'修改密码'),
	     		 'pay'=>array('用户中心'=>"user/index",'在线支付'),
	     		 'pay2'=>array('用户中心'=>"user/index",'在线支付'),
	     		 'returnurl'=>array('用户中心'=>"user/index",'支付状态'),
	     		 'coupon'=>array('用户中心'=>"user/index",'账户明细'),
	     		 'ssupport'=>array('用户中心'=>"user/index",'服务支持'),
	     		 'wpackage'=>array('用户中心'=>"user/index",'网站套餐'),
	     		 'spackage'=>array('用户中心'=>"user/index",'服务套餐'),
	     		 'scustom'=>array('用户中心'=>"user/index",'服务定制'),
	     		 'wcustom'=>array('用户中心'=>"user/index",'网站定制'),
	     		 'diycustom'=>array('用户中心'=>"user/index",'定制业务'),
	     	),
	     	'help'=>array(
	     	   'index'=>array('帮助中心'),	
	     	),
	     	
	     	
	   ),
	   

	);
	public static $webseo=array(
	   ''=>array(
	     'site'=>array(
         'index'=>array(
            'title'=>'{$seo_title}',
            'keywords'=>'',
            'description'=>'',
         ),
         
         'forgotpassword'=>array(
            'title'=>'找回密码',
            'keywords'=>'',
            'description'=>'',
         ),
         
         'validatepassword'=>array(
            'title'=>'找回密码',
            'keywords'=>'',
            'description'=>'',
         ),
         
         
	     ),
	    
	    'mchannels'=>array(
	          'index'=>array(
	             'title'=>'{$seo_title}',
               'keywords'=>'{$seo_keywords}',
               'description'=>'{$seo_description}',
	          ),
	          
	          'list'=>array(
	             'title'=>'{$seo_title}',
               'keywords'=>'{$seo_keywords}',
               'description'=>'{$seo_description}',
	          ),
	          
	          'archive'=>array(
	             'title'=>'{$seo_title}',
               'keywords'=>'{$seo_keywords}',
               'description'=>'{$seo_description}',
	          ),
	          
	          
	          'custom'=>array(
	             'title'=>'{$seo_title}',
               'keywords'=>'{$seo_keywords}',
               'description'=>'{$seo_description}',
	          ),
	         'package'=>array(
	             'title'=>'{$seo_title}',
               'keywords'=>'{$seo_keywords}',
               'description'=>'{$seo_description}',
	          ),
	         'parchive'=>array(
	             'title'=>'{$seo_title}',
               'keywords'=>'{$seo_keywords}',
               'description'=>'{$seo_description}',
	         ),
	         
	         
	         
	      ),
	     'registe'=>array(
	     	  'index'=>array(
	     	       'title'=>'注册会员',
               'keywords'=>'',
               'description'=>'',
	     	  ),
	     	  'registe2'=>array(
	     	       'title'=>'注册会员',
               'keywords'=>'',
               'description'=>'',
	     	  
	     	  ),
	     	  'registe3'=>array(
	     	       'title'=>'注册会员',
               'keywords'=>'',
               'description'=>'',
	     	  )
	     	),
	     	
	     	'login'=>array(
	     	  'index'=>array(
	     	       'title'=>'会员登录',
               'keywords'=>'',
               'description'=>'',
	     	  ),
	     	  'logout'=>array(
	     	       'title'=>'会员退出',
               'keywords'=>'',
               'description'=>'',
	     	  
	     	  ),
	     	),
	     	
	     'error'=>array(
	     	  'error404'=>array(
	     	       'title'=>'页面错误',
               'keywords'=>'',
               'description'=>'',
	     	  ),
	     	
	     	),
	     	
	     	
	      'user'=>array(
	     	  'index'=>array(
	     	       'title'=>'个人资料',
               'keywords'=>'',
               'description'=>'',
	     	  ),
	     	  'editprofile'=>array(
	     	       'title'=>'修改资料',
               'keywords'=>'',
               'description'=>'',
	     	  
	     	  ),
	     	  'editemail'=>array(
	     	       'title'=>'修改邮箱',
               'keywords'=>'',
               'description'=>'',
	     	  ),
	     	  
	     	  'editpassword'=>array(
	     	       'title'=>'修改密码',
               'keywords'=>'',
               'description'=>'',
	     	  ),
	     	  
	     	  'pay'=>array(
	     	       'title'=>'在线支付',
               'keywords'=>'',
               'description'=>'',
	     	  ),
	     	  
	     	  'pay2'=>array(
	     	       'title'=>'在线支付',
               'keywords'=>'',
               'description'=>'',
	     	  ),
	     	  
	     	  'returnurl'=>array(
	     	       'title'=>'支付状态',
               'keywords'=>'',
               'description'=>'',
	     	  ),
	     	  
	     	   'coupon'=>array(
	     	       'title'=>'账户明细',
               'keywords'=>'',
               'description'=>'',
	     	  ),
	     	  
	     	   'ssupport'=>array(
	     	       'title'=>'服务支持',
               'keywords'=>'',
               'description'=>'',
	     	  ),
	     	  'wpackage'=>array(
	     	       'title'=>'网站套餐',
               'keywords'=>'',
               'description'=>'',
	     	  ),
	     	  
	     	  'spackage'=>array(
	     	       'title'=>'服务套餐',
               'keywords'=>'',
               'description'=>'',
	     	  ),
	     	  
	     	   'scustom'=>array(
	     	       'title'=>'服务定制',
               'keywords'=>'',
               'description'=>'',
	     	  ),
	     	  
	     	   'wcustom'=>array(
	     	       'title'=>'网站定制',
               'keywords'=>'',
               'description'=>'',
	     	  ),
	     	  
	     	  'diycustom'=>array(
	     	       'title'=>'定制业务',
               'keywords'=>'',
               'description'=>'',
	     	  )
	     		 
	     	),
	     	
	     	 'help'=>array(
	     	   'index'=>array( 
	     	       'title'=>'帮助中心',
               'keywords'=>'',
               'description'=>'',),	
	     	),
	
	  ),
	);
	
  public static function set_seo_content($title=array(),$keywords=array(),$description=array()){
  	$controller_id=Yii::app()->getController()->id;
  	$action_id=Yii::app()->getController()->getAction()->id;
  	$module_id=Yii::app()->getController()->getModule()->id;
  	$controller_id=strtolower($controller_id);
  	$action_id=strtolower($action_id);
  	$module_id=strtolower($module_id);
  	$webseo=self::$webseo;
  	$seo_title=$webseo[$module_id][$controller_id][$action_id]['title'];
  	$seo_keywords=$webseo[$module_id][$controller_id][$action_id]['keywords'];
  	$seo_description=$webseo[$module_id][$controller_id][$action_id]['description'];
  	if(!empty($title)){
  		$seo_title=self::replace_variable($title,$seo_title);
  	}
  	if(!empty($keywords)){

  		$seo_keywords=self::replace_variable($keywords,$seo_keywords);
  	}
  	if(!empty($description)){
  		$seo_description=self::replace_variable($description,$seo_description);
  	}
    $sys_config=SysConfig::model();
		$all_syscfg_values=$sys_config->get_all_syscfg();
		Yii::app()->getController()->pageTitle=empty($seo_title)?($all_syscfg_values['sfc_home_title']."-".$all_syscfg_values['sfc_web_title']):($seo_title."-".$all_syscfg_values['sfc_web_title']);
		Yii::app()->getController()->seo_description=empty($seo_description)?$all_syscfg_values['sfc_web_description']:$seo_description;
		Yii::app()->getController()->seo_keywords=empty($seo_keywords)?$all_syscfg_values['sfc_web_keywords']:$seo_keywords;

  }

 public static function set_breadcrumbs($sbreadcrumbs=array()){
    $controller_id=Yii::app()->getController()->id;
  	$action_id=Yii::app()->getController()->getAction()->id;
  	$module_id=Yii::app()->getController()->getModule()->id;
  	$controller_id=strtolower($controller_id);
  	$action_id=strtolower($action_id);
  	$module_id=strtolower($module_id);
  	$breadcrumbs=self::$breadcrumbs;   
  	$content=$breadcrumbs[$module_id][$controller_id][$action_id];
  	if(!empty($sbreadcrumbs)){
  		Yii::app()->getController()->breadcrumbs=$sbreadcrumbs;
  	}else{
  		
  		Yii::app()->getController()->breadcrumbs=$content;
  	}
 }
  
  
 public static function replace_variable($replace=array(),$content){
	 if(!empty($replace)){
	 	$tem_key=array();
	 	$tem_value=array();
	 	foreach((array)$replace as $key => $value){
	 		$key_name="{"."$".$key."}";
	 		array_push($tem_key,$key_name);
	 		array_push($tem_value,$value);
	 	}
	 	$content=str_replace($tem_key, $tem_value, $content);
	 }
 	 return $content;
 }
}
?>
