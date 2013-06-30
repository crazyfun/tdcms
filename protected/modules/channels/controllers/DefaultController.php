<?php

class DefaultController extends Controller
{
	public $tag="channels";
	public $breadcrumbs=array();
	public function actionIndex()
	{
		$this->render('index',array());
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