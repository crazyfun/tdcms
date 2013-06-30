	   <div id="Marquee">
	    <ul>
	    	<?php foreach($content as $key => $value){ ?>
        	  <li><span><?php echo $value['modify_time'];?></span><a href="<?php echo $value['href'];?>" title="<?php echo $value['title'];?>"><?php echo $value['stitle'];?></a></li>
        <?php } ?>   
      </ul>
     </div>
      <script language="javascript">
					var Mar = document.getElementById("Marquee");
					var child_div=Mar.getElementsByTagName("li");
					var picH = 16;
					var scrollstep=3;
					var scrolltime=50;
					var stoptime=5000;
					var tmpH = 0;
					Mar.innerHTML += Mar.innerHTML;
					function start(){
						if(tmpH < picH){
							tmpH += scrollstep;
							if(tmpH > picH )tmpH = picH ;
									Mar.scrollTop = tmpH;
									setTimeout(start,scrolltime);
							}else{
									tmpH = 0;
									Mar.appendChild(child_div[0]);
									Mar.scrollTop = 0;
									setTimeout(start,stoptime);
							}
						}
				  jQuery(function(){
				  	 setTimeout(start,stoptime)
				  });
					
			</script>