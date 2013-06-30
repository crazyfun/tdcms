<div class="nav_bg">
	<div class="nav">
<ul id="nav"><!-- 有二级菜单的，给li加class="menu" 没有的不用加 -->
	
	 <!-- 一级菜单循环开始-->
	<?php foreach((array)$content as $key => $value){ ?>
		<li class="mainlevel">
			<a href="<?php echo $value['link_href'];?>" class="title <?php echo $value['select'];?>" title="<?php echo $value['name'];?>"><?php echo $value['name']; ?></a>
			<!-- 二级菜单循环开始 -->
			<ul>
				    <?php foreach((array)$value['children'] as $key1 => $value1){ ?>
               <li><a title="<?php echo $value1['name'];?>" href="<?php echo $value1['link_href'];?>"><?php echo $value1['name']; ?></a></li>
            <?php } ?>
       </ul>
			
	  </li>
	<?php } ?>
	 <!-- 一级菜单循环结束-->
 </ul>
</div>
</div>

<script language="javascript">
	jQuery(function(){
		var nav=jQuery("#nav>li").each(function(i){
			    var slide_flag=false;
          jQuery(this).hover(
              function(){
              	if(!slide_flag){
              		jQuery(this).find("ul").slideDown("fast",function(){ slide_flag=true; });
              	}
              },
              function(){
              		jQuery(this).find("ul").slideUp("fast",function(){ slide_flag=false; });
              }
          ); 
     });
	
	});
</script>