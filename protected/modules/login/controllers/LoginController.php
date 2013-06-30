<?php

class LoginController extends Controller
{
	public $tag="login";
	public $breadcrumbs=array();
	 public function filters() {
		return array(
			
		);
	}
	
	public function actionIndex()
	{ 
		    Util::reset_vars();
		    require_once('config.inc.php');
  	    require_once('uc_client/client.php');
		    $ts = time();
	      $model=new User('Login');
	      $model_name=ucfirst(get_class($model));
	      $model_errors="";
        if(isset($_POST[$model_name])){
            $model->attributes=$_POST[$model_name];
            $ucenter_class=UcenterClass::get();
            $uc_result=$ucenter_class->register_ucenter_user($_POST[$model_name]['user_login'],$_POST[$model_name]['user_password']);
            if($uc_result<=0){
						  if($uc_result == -1) {
							   $model->addError('user_login','用户名不存在');
              } elseif($uc_result == -2) {
	               $model->addError('user_password','密码不正确');
              } else {
	               $model->addError('user_login','登录错误');
              }
					  }
					 $get_errors=$model->getErrors();
           if(empty($get_errors)&&$model->validate()&&$model->login()){
					      if($uc_result > 0) {
				          $ucsynlogin = uc_user_synlogin($uc_result);
				        }
				        
				        $this->render('loginsuccess',array('ucsynlogin'=>$ucsynlogin));
				        exit();
            }else{
            	$errors=$model->getErrors();
            	foreach($errors as $key => $value){
            		foreach($value as $key1 => $value1){
            			$model_errors.="&nbsp;&nbsp;".$value1;
            		}
            	}
            	
            }
        }
       
  	    $this->render("login",array('model'=>$model,'ts'=>$ts,'model_errors'=>$model_errors));
	}
	
	
	public function actionPoplogin()
	{ 
		    $this->layout="none";
		    Util::reset_vars();
		    require_once('config.inc.php');
  	    require_once('uc_client/client.php');
		    $ts = time();
	      $model=new User('Login');
	      $model_name=ucfirst(get_class($model));
        if(isset($_POST[$model_name])){
            $model->attributes=$_POST[$model_name];
            $ucenter_class=UcenterClass::get();
            $uc_result=$ucenter_class->register_ucenter_user($_POST[$model_name]['user_login'],$_POST[$model_name]['user_password']);
            if($uc_result<=0){
						  if($uc_result == -1) {
							   $model->addError('user_login','用户名不存在');
              } elseif($uc_result == -2) {
	               $model->addError('user_password','密码不正确');
              } else {
	               $model->addError('user_login','登录错误');
              }
					  }
					 $get_errors=$model->getErrors();
           if(empty($get_errors)&&$model->validate()&&$model->login()){
					      if($uc_result > 0) {
				          $ucsynlogin = uc_user_synlogin($uc_result);
				        }
				        $this->render('poploginsuccess',array('ucsynlogin'=>$ucsynlogin));
				        exit();
            }else{
            	
            	$errors=$model->getErrors();
            	foreach($errors as $key => $value){
            		foreach($value as $key1 => $value1){
            			$model_errors.="&nbsp;&nbsp;".$value1;
            		}
            	}
            }
        }
       
  	    $this->render("poplogin",array('model'=>$model,'ts'=>$ts,'model_errors'=>$model_errors));
	}
	
	public function actionHomelogin(){
		    Util::reset_vars();
		    require_once('config.inc.php');
  	    require_once('uc_client/client.php');
		    $ts = time();
	      $model=new User('Homelogin');
	      $model_name=ucfirst(get_class($model));
        if(isset($_POST['login'])){
            $model->user_login=$_POST['user_login'];
            $model->user_password=$_POST['user_password'];
            $model->rememberme=$_POST['rememberme'];
            $ucenter_class=UcenterClass::get();
            $uc_result=$ucenter_class->register_ucenter_user($_POST['user_login'],$_POST['user_password']);
            if($uc_result<=0){
						  if($uc_result == -1) {
							   $model->addError('user_login','用户名不存在');
              } elseif($uc_result == -2) {
	               $model->addError('user_password','密码不正确');
              } else {
	               $model->addError('user_login','登录错误');
              }
					  }
					 $get_errors=$model->getErrors();
           if(empty($get_errors)&&$model->validate()&&$model->login()){
					      if($uc_result > 0) {
				          $ucsynlogin = uc_user_synlogin($uc_result);
				        }
				        $this->render('homeloginsuccess',array('ucsynlogin'=>$ucsynlogin));
				        exit();
            }else{
            	$errors=$model->getErrors();
            	foreach($errors as $key => $value){
            		foreach($value as $key1 => $value1){
            			$model_errors.="&nbsp;&nbsp;".$value1;
            		}
            	}
            	$this->render("login",array('model'=>$model,'ts'=>$ts,'model_errors'=>$model_errors));
            }
        }
  	    
	}
	
	
	public function actionLogout(){
		 require_once('config.inc.php');
  	 require_once('uc_client/client.php');
     Yii::app()->user->logout();
     $ucsynlogout = uc_user_synlogout();
     $this->render('loginoutsuccess',array('ucsynlogout'=>$ucsynlogout));
		
	}
		public function f($msg_code){ 
	 	
     if($msg_code == CV::SUCCESS){
       $this->set_flash("操作成功",$msg_code);
     }
     if($msg_code == CV::FAIL){
     	 $this->set_flash("操作失败",$msg_code);
     }
     
   }
	

}