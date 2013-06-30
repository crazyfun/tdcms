<?php
class Flash extends CWidget
{
	  public $view="";
    public function run(){
    	 $flash_ad=FlashAd::model();
    	 $content=$flash_ad->get_content();
    	 $number=count($content);
       $this->render("/flash/".$this->view,array('content'=>$content,'number'=>$number));
    }
}
