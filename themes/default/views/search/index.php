<div class="content">
  <div class="submian" style="background-image:none">
      <!--搜索结果显示-->
        <div class="sbox">
            <div class="searchbox3"><!--搜索-->
            	 <?php 
            	 		$channels=Channels::model();
       						$channels_select=$channels->get_search_channel('0');
       						$channels_select=Util::com_search_item(array(''=>'不限栏目'),$channels_select);
       						$config_values=ConfigValues::model();
       						$sort_select=$config_values->get_ralation_values('4');
       						$sort_select=Util::com_search_item(array(''=>'不限'),$sort_select);
    		 							$form=$this->beginWidget('EActiveForm', array(
	        								'id'=>'',
	        								'method'=>'GET',
          								'action'=>"",
	        								'enableAjaxValidation'=>false,
	        								'htmlOptions'=>array('id'=>'registe_from'),
         							));
         							echo EHtml::createHidden("action",$page_params['action'],array());
         							echo EHtml::createHidden("advanced_flag",$advanced_flag,array('id'=>"advanced_flag"));
        					?>
   	          <span>关键字：</span><?php echo EHtml::createText("keywords",$page_params['keywords'],array('class'=>'sinput2'));?><input name="搜索" type="submit" class="sbutton2" id="搜索" value="搜索"/>
              <a class="<?php if(!$advanced_flag){ echo "gjs"; }else{ echo "gjs_hover"; }?>" id="show_advanced" href="javascript:void(0);" onclick="javascript:show_advanced();">高级搜索</a><!--搜索按钮-->
            <div class="gjsbox" id="pop"  style="<?php if(!$advanced_flag){ echo "display:none;"; }else{ echo "display:block;"; }?>">
                <div class="pop_body">  
                	<span>网站栏目：<?php echo EHtml::createSelect("channel",$page_params['channel'],$channels_select,array());?></span>
                	<span>发布时间：<?php echo EHtml::createSelect("published_time",$page_params['published_time'],CV::$search_published_time,array());?></span>
                	<span>排序方式：<?php echo EHtml::createSelect("sort_select",$page_params['sort_select'],$sort_select,array());?></span> 
                	<span>显示条数：<?php echo EHtml::createNumber("numbers",$page_params['numbers'],array());?></span>
                </div>
           </div>
           <?php $this->endWidget(); ?>
            </div>   
   	    <ul>
   	    	    		<?php   

    									$this->widget('zii.widgets.CListView',array(
													'dataProvider'=>$dataProvider,
													'itemView'=>"search_list",
													'ajaxUpdate'=>false,
													'viewData'=>array('cssPath'=>$cssPath,'jsPath'=>$jsPath),
												));
									?>
          </ul>
        </div>
    <div style="clear:both;"></div>
  </div>
</div>
<script language="javascript">
	function show_advanced(){
			var show_advanced=jQuery("#show_advanced");
			var pop=jQuery("#pop");
			if(pop.css("display")=="block"){
				pop.fadeOut("fast");
				show_advanced.attr("class","gjs");
				jQuery("#advanced_flag").val("");
			}else{
				pop.fadeIn("fast");
				show_advanced.attr("class","gjs_hover");
				jQuery("#advanced_flag").val(1);
			}
			
		}
</script>