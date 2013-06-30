<?php
class SiteController extends AController
{
  public function filters() {
		return array(
		  //'accessControl', // perform access control for CRUD operations
		  'LoginFilter + login,index,welcome',
		);
	}
	public function FilterLoginFilter($filterChain) {
	   $filterChain->run();
	}
 public function actions(){
 	  $controller_path="application.admin.controllers.site.";
		return array(
		  'index'=>$controller_path."IndexAction",
		  'login'=>$controller_path."LoginAction",
		  'logout'=>$controller_path."LogoutAction",
		  'welcome'=>$controller_path."WelcomeAction",
		  
		);
	}
	
}
