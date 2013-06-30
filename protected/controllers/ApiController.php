<?php
class ApiController extends Controller
{

  public function filters() {
		
	}

 public function actions(){
 	  $controller_path="application.controllers.api.";
		return array(
		  'clearflush'=>$controller_path."ClearflushAction",
		  'crop'=>$controller_path.'CropAction',
		  'searchuser'=>$controller_path.'SearchuserAction',
		);
	}
}
