<?php
class CV {
	//qa unlogin
	const SUCCESS_ADMIN_OPERATE=1;
	const FAILED_ADMIN_OPERATE=2;
	const ERROR_ADMIN_DATABASE=3;
	const SUCCESS=1;
	const FAIL=2;
	const TIP=3;
	const REFRASH=20;
	const PAYVALIDATE=4;
	const PAYSUCCESS=5;
	const PAYFAILED=6;
	const MESSAGE_SUCCESS=4;
	public static $config_value_type=array('1'=>'文档属性','2'=>'模块视图','3'=>'文档来源','4'=>'文档排序','5'=>'栏目列表视图','6'=>'留言类别','10'=>'服务支持');
	public static $template_type=array('1'=>'邮件模板','2'=>'消费模板','3'=>'短信模板');
	public static $model_type=array('help'=>'1');
	public static $input_type=array('text'=>'text','number'=>'number','hidden'=>'hidden','password'=>'password','file'=>'file','image'=>'image','textarea'=>'textarea','select'=>'select','multi'=>'multi','check'=>'check','checkbox'=>'checkbox','radio'=>'radio','date'=>'date','multitext'=>'multitext','auto'=>'auto','multiauto'=>'multiauto');
	public static $charaters=array('1'=>'A','2'=>'B','3'=>'C','4'=>'D','5'=>'E','6'=>'F','7'=>'G','8'=>'H','9'=>'I','10'=>'J','11'=>'K','12'=>'L','13'=>'M','14'=>'N','15'=>'O','16'=>'P','17'=>'Q','18'=>'R','19'=>'S','20'=>'T','21'=>'U','22'=>'V','23'=>'W','24'=>'X','25'=>'Y','26'=>'Z');
	public static $admin_status=array('1'=>'不是','2'=>'是');
	public static $sex=array('1'=>'男','2'=>'女');
	public static $channels_permission=array('1'=>'开放浏览','2'=>'普通会员');
	public static $channels_link_type=array('1'=>'列表页','2'=>'封面','3'=>'外链');
	public static $channels_is_hidden=array('1'=>'显示','2'=>'隐藏');
	public static $archives_status=array('1'=>'未审核','2'=>'已审核','3'=>'回收站');
	public static $archives_permission=array('1'=>'允许','2'=>'禁止');
	public static $archives_addition_select=array('1'=>'提取第一个图片为缩略图','2'=>'下载远程图片和资源');
	public static $block_sort_type=array('1'=>'DESC','2'=>'ASC');
	public static $block_dott=array('Y'=>'显示','N'=>'不显示');
	public static $list_sort_type=array('1'=>'DESC','2'=>'ASC');
	public static $message_status=array('1'=>'未审核','2'=>'已审核');
	public static $advertising_type=array('1'=>'图片','2'=>'文字','3'=>'flash','4'=>'模块');
	
	
	public static $consume_type=array('1'=>'增加','2'=>'减少');
	public static $alipay_pay_method=array('0'=>'使用标准双接口','1'=>'使用担保交易接口','2'=>'使用即时到帐接口');
  public static $payment_type=array('alipay'=>array('name'=>'支付宝','image'=>'/bank_zfb3.gif'),'kuaiqian'=>array('name'=>'快钱','image'=>'bank_kq.gif'),'kuaiqian_abc'=>array('name'=>'中国农业银行','image'=>'bank_nyyh3.gif'),'kuaiqian_bcom'=>array('name'=>'交通银行','image'=>'bank_jtyh3.gif'),'kuaiqian_boc'=>array('name'=>'中国银行','image'=>'bank_zgyh3.gif'),'kuaiqian_ccb'=>array('name'=>'中国建设银行','image'=>'bank_jsyh3.gif'),'kuaiqian_cmb'=>array('name'=>'招商银行','image'=>'bank_zsyh3.gif'),'kuaiqian_cmbc'=>array('name'=>'中国民生银行','image'=>'bank_msyh3.gif'),'kuaiqian_icbc'=>array('name'=>'中国工商银行','image'=>'bank_gsyh3.gif'),'kuaiqian_sdb'=>array('name'=>'深圳发展银行','image'=>'bank_szfz3.gif'));
  public static $pay_status=array('1'=>'未购买','2'=>'已购买');
	public static $support_status=array('1'=>'未解决','2'=>'解决中','3'=>'已回复','4'=>'已解决');
  public static $service_type=array('7'=>'定制服务','8'=>'diy定制','9'=>'服务套餐','10'=>'网站套餐');
  public static $gongyi_sex=array('1'=>'先生','2'=>'女士');
  public static $gongyi_status=array('1'=>'未处理','2'=>'已处理');
  
  //搜索的选择项
  public static $search_published_time=array(''=>'不限','7'=>'一周以内','31'=>'一月以内','93'=>'三月以内','186'=>'半年以内');
  
	
}
?>
