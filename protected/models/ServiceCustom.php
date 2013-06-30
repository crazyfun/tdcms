<?php

/**
 * This is the model class for table "{{service_custom}}".
 *
 * The followings are the available columns in table '{{service_custom}}':
 * @property string $id
 * @property string $type
 * @property string $title
 * @property string $describe
 * @property string $price
 * @property string $create_id
 * @property string $create_time
 */
class ServiceCustom extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ServiceCustom the static model class
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
		return '{{service_custom}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('service_type,type,title,describe,price','required','message'=>'{attribute}不能为空'),
			array('service_type,type, price, bargain_price,sort,create_id, create_time', 'length', 'max'=>11),
			array('image,user_ids','length','max'=>100),
			array('start_date,end_date,title,unit', 'length', 'max'=>30),
			array('sdescribe,describe', 'safe'),
			array('id, service_type,type, title,image, sdescribe,describe, price, sort,create_id, create_time', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'service_type'=>'类型',
			'type' => '分类',
			'user_ids'=>'定制用户',
			'title' => '标题',
			'image'=>'缩略图',
			'start_date'=>'开始时间',
			'end_date'=>'结束时间',
			'sdescribe'=>'简短描述',
			'describe' => '描述',
			'price' => '价钱',
			'bargain_price'=>'优惠价',
			'unit'=>'单位',
			'sort'=>'排序',
			'create_id' => '创建人',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('user_ids',$this->user_ids,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('sdescribe',$this->sdescribe,true);
		$criteria->compare('describe',$this->describe,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('bargain_price',$this->bargain_price,true);
		$criteria->compare('unit',$this->unit,true);
		$criteria->compare('sort',$this->sort,true);
		$criteria->compare('create_id',$this->create_id,true);
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
			   return $this->service_type;
			   break;
			case 'type':
			   $service_category=ServiceCategory::model();
			   $service_category_data=$service_category->findByPk($this->type);
			   return $service_category_data->name;

				break;
		  case 'user_ids':
		     $user_ids=$this->user_ids?explode(",",$this->user_ids):array();
		     $user_name=array();
		     if(!empty($user_ids)){
		 			$user=User::model();
	 	 			
	 	 			foreach($user_ids as $key => $value){
	 	 				$user_data=$user->findByPk($value);
	 	 				$user_name[]=$user_data->user_login;
	 				}
	 			}
		    return implode(",",$user_name);
		    break;
			case 'image':
			  return CHtml::image("/".$this->image,$this->title,array());
			  break;
			case 'bargain_price':
			  if(!empty($this->unit)){
			  	return $this->bargain_price."&nbsp;".$this->unit;
			  }else{
			  	return $this->bargain_price."&nbsp;元";
			  }
			  break;
		   case 'create_id':
				 return $this->User->user_login;
				break;
			case 'create_time':
				 return date("Y-m-d H:i:s",$this->create_time);
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
function get_diy_operate(){
	   $return_str="<div class='operate_button'>";
	   $service_pay=ServicePay::model();
		 $service_pay_data=$service_pay->find('service_id=:service_id',array(':service_id'=>$this->id));
		 $status=$service_pay_data->status;
		 if(empty($service_pay_data)){
		    $return_str.=CHtml::link('购买',array("user/packagebuy","id"=>$this->id),array('class'=>'operate_green'));
		 }else{
		 	if($status!='2'){
		 		$return_str.=CHtml::link('购买',array("user/packagebuy","pay_id"=>$service_pay_data->id),array('class'=>'operate_green'));
		 	}
		}
		 $return_str.="</div>";
		 return $return_str;
}
	function get_custom_datas($parent_id,$service_type="",$ids=""){
		if(empty($service_type)){
			$service_type="7";
		}
		$service_category=new ServiceCategory();
    $child_datas=$service_category->get_childs($parent_id,$ids);
    
		$attributes=array();
		foreach($child_datas as $key => $value){
			$attributes[]=$value->attributes;
		}
		foreach((array)$attributes as $key => $value){
		  $tem_child_datas=$this->get_custom_datas($value['id'],$service_type,$ids);
		  if(!empty($tem_child_datas)){
		  	$value['children']=$tem_child_datas;
		  }
		  $service_custom_datas=$this->findAll(array('condition'=>'t.type=:type AND t.service_type=:service_type','params'=>array(':type'=>$value['id'],':service_type'=>$service_type),'order'=>'t.sort ASC'));
		  if(!empty($service_custom_datas)){
		  	$service_custom_attributes=array();
		  	foreach($service_custom_datas as $key1 => $value1){
						$service_custom_attributes[]=$value1->attributes;
				}
				$value['items']=$service_custom_attributes;
		  }
		  $attributes[$key]=$value;
		}
		return $attributes;
	}
	
	function get_diy_status(){
		$service_pay=ServicePay::model();
		$service_pay_data=$service_pay->find('service_id=:service_id',array(':service_id'=>$this->id));
		$status=$service_pay_data->status;
		if($status=='2'){
			return "已购买";
		}else{
			return "未购买";
		}
	}
	function get_diy_pay_time(){
		$service_pay=ServicePay::model();
		$service_pay_data=$service_pay->find('service_id=:service_id',array(':service_id'=>$this->id));
		$status=$service_pay_data->status;
		$pay_time=$service_pay_data->pay_time;
		if($status=='2'){
			return date("Y-m-d H:m:s",$pay_time);
		}else{
			return "未购买";
		}
	}
}