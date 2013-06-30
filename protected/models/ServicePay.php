<?php

/**
 * This is the model class for table "{{service_pay}}".
 *
 * The followings are the available columns in table '{{service_pay}}':
 * @property string $id
 * @property string $service_type
 * @property string $service_id
 * @property string $create_id
 * @property string $status
 * @property string $pay_time
 * @property string $create_time
 */
class ServicePay extends BaseActive{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ServicePay the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{service_pay}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('service_type,service_id,status','required','message'=>'{attribute}不能为空'),
			array('service_type, service_id, create_id, status, pay_time, create_time', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, service_type, service_id, create_id, status, pay_time, create_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'User'=>array(self::BELONGS_TO,'User','create_id'),
			'ServiceCustom'=>array(self::BELONGS_TO,'ServiceCustom','service_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'service_type' => '服务类型',
			'service_id' => '服务名称',
			'create_id' => '付款人',
			'status' => '付款状态',
			'pay_time' => '付款时间',
			'create_time' => '创建时间',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id,true);
		$criteria->compare('service_type',$this->service_type,true);
		$criteria->compare('service_id',$this->service_id,true);
		$criteria->compare('create_id',$this->create_id,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('pay_time',$this->pay_time,true);
		$criteria->compare('create_time',$this->create_time,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function insert_datas(){
		if(!$this->hasErrors()){
				$datas=$this->save();
			  return $datas;
		}
	}
	function beforeSave(){
	  if(parent::beforeSave()){
			if($this->isNewRecord){
			   $this->create_id=Yii::app()->user->id;
			   $this->create_time=time();
			}else{
			
			}
			return true;
		}else{
			return false;
		}
	}
	
	
	function show_attribute($attribute_name){
		switch($attribute_name){
			case 'service_type':
			   $service_type=CV::$service_type;
			   return $service_type[$this->service_type];
			   break;
			case 'service_id':
				 return $this->ServiceCustom->title;
				 break;
		   case 'create_id':
				 return $this->User->user_login;
				 break;
		
			case 'status':
			   $pay_status=CV::$pay_status;
			   return $pay_status[$this->status];
			   break;
			case 'create_time':
				 return date("Y-m-d H:i:s",$this->create_time);
				 break;
			case 'pay_time':
			   if(empty($this->pay_time)){
			   	return "未购买";
			   }else{
				   return date("Y-m-d H:i:s",$this->pay_time);
				 }
				 break;
			default:
			  return $this->$attribute_name;
			  break;
		}
	}
	
	function get_operate(){
		  $user=new User();
		  $user_permission_name=$user->get_permissions_name();
		  $controller_id=Yii::app()->getController()->getId();
		  $return_str="<div class='operate_button'>";
		  if(Util::is_permission($user_permission_name,"edit"))
		  	$return_str.=CHtml::link('修改',array($controller_id."/edit","id"=>$this->id),array('class'=>'operate_green'));
		  if(Util::is_permission($user_permission_name,"delete")) 	
		   	$return_str.=CHtml::link('删除','javascript:void(0);',array('id'=>'delete_'.$this->id,'class'=>'operate_red','onclick'=>"javascript:ajax_delete('".Yii::app()->getController()->createUrl('main/delete')."','".get_class($this)."','".$this->id."');"));
		  $return_str.="</div>";
		  return $return_str;
	}
	
	function get_wpackage_operate(){
		  $return_str="<div class='operate_button'>";
		  if($this->status=='1')
		    $return_str.=CHtml::link('购买',array($controller_id."user/packagebuy","pay_id"=>$this->id),array('class'=>'operate_green'));
		  $return_str.=CHtml::link('查看',array("mchannels/parchive","id"=>$this->service_id,'channel'=>'46'),array('class'=>'operate_green'));
		  $return_str.="</div>";
		  return $return_str;
	}
	
	function get_spackage_operate(){
		  $return_str="<div class='operate_button'>";
		  if($this->status=='1')
		    $return_str.=CHtml::link('购买',array("user/packagebuy","pay_id"=>$this->id),array('class'=>'operate_green'));
		  $return_str.=CHtml::link('查看',array("mchannels/parchive","id"=>$this->service_id,'channel'=>'66'),array('class'=>'operate_green'));
		  $return_str.="</div>";
		  return $return_str;
	}
	
	function get_service_operate(){
	     $return_str="<div class='operate_button'>";
		  if($this->status=='1')
		    $return_str.=CHtml::link('购买',array("user/packagebuy","pay_id"=>$this->id),array('class'=>'operate_green'));
		  $return_str.="</div>";
		  return $return_str;
	}
}