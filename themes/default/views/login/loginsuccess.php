<div class="content">
	<div class="submember">
			<?php echo $ucsynlogin; ?>
			<div class="suc-dl"><div>成功登录<?php echo Yii::app()->name;?>！<span class="text-tz"><span>5</span>秒钟后自动跳转到首页</div></span></div>
  </div>
</div>
<script language="javascript">
	jQuery(function(){
		window.setTimeout(function(){window.location.href="/site/index";},5000);
	});
</script>