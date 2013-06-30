<?php $cssPath=$this->get_css_path();?>
<div class="top">
	<div class="topbg">  
   		 <div class="topbox">
            <div class="topr">
              <a href="<?php echo $this->createUrl("user/index");?>">个人中心</a>|<a href="javascript:addCookie('<?php echo Yii::app()->homeUrl;?>','<?php echo Yii::app()->name;?>');">加入收藏</a>|<a href="javascript:setHomepage('<?php echo Yii::app()->homeUrl;?>');">设为首页</a>|<a href="<?php echo $this->createUrl("help/index");?>">在线帮助</a>|<a href="<?php echo $this->createUrl("webmap/index");?>">网站地图</a>
            </div>
         	<div class="hyname"><?php if(Yii::app()->user->isGuest) echo "游客，欢迎<a href=".$this->createUrl("login/index").">[登录]</a>"; else echo "你好：".Yii::app()->user->name."<a href=".$this->createUrl("login/logout").">[退出]</a>"; ?><a href="<?php echo $this->createUrl("registe/index");?>" class="t_zc" style="color:#fff">免费注册</a>
          </div> 
	 		 </div>
    </div>
	<div class="header">
		  
    	<div class="tell">
    		 <div class="logo"><a href="/"><img src="<?php echo $cssPath;?>/images/logo.jpg"/></a></div></a>
		      <p class="Blue">
		      	<?php
         				BZ::ad("id/16/cacheid/header_advisory/cache/86400");
  					?>
		      	</p>
          <p class="tell_box"></p>
       </div>
  </div>
  
  <?php
         BZ::menus("view/menus");
  ?>
</div><!--end top-->
<div class="sy_ban">
<div class="searchbox_bg"><!--searchbox-->
	<?php
		  	 	   	 	    	$form=$this->beginWidget('EActiveForm', array(
	        								'id'=>'header_search',
          								'action'=>$this->createUrl("search/index"),
	        								'enableAjaxValidation'=>false,
	        								'htmlOptions'=>array('enctype'=>'multipart/form-data'),
         								));
  ?>
  <div class="searchbox">
  	  <?php Yii::app()->clientScript->registerScriptFile('/js/select.js'); ?>
      <div class="sinputbox">
        <div class="sselect select_js">
       	   <p>标题</p>
           <ul class="search_ul">
           	<li ectype="title">标题</li>
           	<li ectype="like">智能模糊 </li>
           </ul>
           <input type="hidden" name="action" value="title" />
        </div>
      <input name="keywords" type="text" class="sinput" id="header_search_keywords"/>
      <input name="" type="submit"  class="sbutton" value=""/>
      </div>
  </div>
   <?php $this->endWidget(); ?>
</div>
</div>

<script language="javascript">

		  	  jQuery(function(){
		  	  	  
		  	  	  show_keywords_describe("header_search_keywords","请输入搜索内容...","header_search");
   	  				
					});
	
</script>







