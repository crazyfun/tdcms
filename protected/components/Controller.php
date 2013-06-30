<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	public $pageTitle="";
	public $seo_description="";
	public $seo_keywords="";
	public $breadcrumbs=array();
	public $token="";
	/*
	  设置成功信息
	*/
	public function set_flash($msg,$flash){
		 switch($flash){
		 		case CV::SUCCESS:
		 		     Yii::app()->user->setFlash(CV::SUCCESS,$msg);
		 				break;
		 		case CV::FAIL:
		 		    Yii::app()->user->setFlash(CV::FAIL,$msg);
		 				break;
		 		case CV::TIP:
		 		    Yii::app()->user->setFlash(CV::TIP,$msg);
		 		    break;
		 		default:
		 				break;	
		 	
		 }
	}
function get_token($form_name){
		if(empty($this->token))
	    $this->token=new Token();		
	 $token_key=$this->token->granteToken($form_name);
	 return $token_key;
	}
	
	function is_token($token_key,$form_name,$fromCheck){
		if(empty($this->token))
	    $this->token=new Token();
		$isToken=$this->token->isToken($token_key,$form_name,$fromCheck);
		$this->token->dropToken($_REQUEST['token_key']);
		return $isToken;
	}
    	//初始化需要的数据
	function init_main_page(){
		$this->layout="main";
		Util::reset_vars();
	}
	function init_page(){
		$this->layout="none";
		Util::reset_vars();
	}
	
	  	//初始化需要的数据
	function init_user_page(){
		$this->layout="user";
		Util::reset_vars();
	}
	
	
	function init_baidumaps_page(){
		$this->layout="baidumaps";
		Util::reset_vars();
	}
	

	/*
	* 根据themes名称获得css的路径
	* @return string css的路径
	* @auther lxf
	* @version 1.0.0
	*/
	function get_css_path(){
		return Yii::app()->getTheme()->baseUrl."/css";
	}
	/*
	* 根据themes名称获得js的路径
	* @return string css的路径
	* @auther lxf
	* @version 1.0.0
	*/

	function get_js_path(){
		return Yii::app()->getTheme()->baseUrl."/js";
	}
	
}
