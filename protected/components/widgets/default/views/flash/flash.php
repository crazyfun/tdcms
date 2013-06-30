         <?php    
		         Yii::app()->clientScript->registerScriptFile('/js/flash_slide.js');  
         ?>
             <div class="scroll_imgs"><!--scroll_imgs--> 
                <div id="idContainer2" class=conflash>
                        <table id=idSlider2 border=0 cellSpacing=0 cellPadding=0>
                            <tbody>
                                <tr>
                                	<?php foreach($content as $key => $value){?>
                                    <td class=td_f><a href="<?php echo $value['img_href'];?>"><img src="<?php echo $value['flash_img'];?>" alt="<?php echo $value['describe'];?>"/></a></td>
                                  <?php } ?>
                                </tr>
                            </tbody>
                         </table>
                        <ul id=idNum class=num>
                        	
                        </ul>
                    </div>
                </div>
                <!--scroll_pic end--> 

<script language="javascript">
 jQuery(function(){
	var forEach = function(array, callback, thisObject){
 		if(array.forEach){
  			array.forEach(callback, thisObject);
 		}else{
  			for (var i = 0, len = array.length; i < len; i++) { callback.call(thisObject, array[i], i, array); }
   	}
	}
	var st = new SlideTrans("idContainer2","idSlider2","<?= $number ?>",{Vertical: false});
	var nums = [];
	//插入数字
	for(var i = 0, n = st._count - 1; i <= n;){
 		(nums[i] = document.getElementById("idNum").appendChild(document.createElement("li"))).innerHTML = ++i;
	}
	forEach(nums, function(o, i){
 		o.onmouseover = function(){ o.className = "on"; st.Auto = false; st.Run(i); }
 		o.onmouseout = function(){ o.className = ""; st.Auto = true; st.Run(); }
	})
	//设置按钮样式
	st.onStart = function(){
 		forEach(nums, function(o, i){ o.className = st.Index == i ? "on" : ""; })
	}
	st.Run();
 });
</script> 