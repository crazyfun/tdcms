<?php

/**
 * This is the model class for table "{{gongyi}}".
 *
 * The followings are the available columns in table '{{gongyi}}':
 * @property string $id
 * @property string $company
 * @property string $contacter
 * @property integer $sex
 * @property string $contacter_phone
 * @property string $contacter_cellphone
 * @property string $position
 * @property string $describe
 * @property integer $status
 * @property string $operate_time
 * @property string $create_time
 */
class Gongyi extends BaseActive
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Gongyi the static model class
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
		return '{{gongyi}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company,sex,contacter,contacter_phone,contacter_cellphone,position,describe,status','required','message'=>'{attribute}不能为空'),
			array('sex, status', 'numerical', 'integerOnly'=>true),
			array('company, contacter, contacter_phone, contacter_cellphone, position', 'length', 'max'=>30),
			array('operate_time, create_time', 'length', 'max'=>11),
			array('describe', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company, contacter, sex, contacter_phone, contacter_cellphone, position, describe, status, operate_time, create_time', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'company' => '机构名称',
			'contacter' => '联系人',
			'sex' => '性别',
			'contacter_phone' => '联系电话',
			'contacter_cellphone' => '手机号码',
			'position' => '职务',
			'describe' => '需求说明',
			'status' => '处理状态',
			'operate_time' => '处理时间',
			'create_time' => '提交时间',
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
		$criteria->compare('company',$this->company,true);
		$criteria->compare('contacter',$this->contacter,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('contacter_phone',$this->contacter_phone,true);
		$criteria->compare('contacter_cellphone',$this->contacter_cellphone,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('describe',$this->describe,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('operate_time',$this->operate_time,true);
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

   public function beforeSave(){
	  if(parent::beforeSave()){
			if($this->isNewRecord){
				$this->create_time=time();
			}else{
			
			}
			return true;
		}else{
			return false;
		}
	}
	public function show_attribute($attribute_name){
		switch($attribute_name){
			case 'sex':
				$gongyi_sex=CV::$gongyi_sex;
			    return $gongyi_sex[$this->sex];
				break;
			case 'status':
				$gongyi_status=CV::$gongyi_status;
			    return $gongyi_status[$this->status];
			case 'create_time':
			  return date("Y-m-d H:i:s",$this->create_time);
			  break;
			case 'operate_time':
			  return empty($this->operate_time)?"未处理":date("Y-m-d H:i:s",$this->operate_time);
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
		  if(Util::is_permission($user_permission_name,"view"))
		  		$return_str.=CHtml::link('查看','javascript:void(0);',array('class'=>'operate_green','onclick'=>"javascript:frame_view('".Yii::app()->getController()->createUrl('view')."','".get_class($this)."','".$this->id."');"));
		   if(Util::is_permission($user_permission_name,"status")){
		  	if($this->status=='1'){
		  	   $return_str.=CHtml::link('处理',array($controller_id."/status","id"=>$this->id,'status'=>'2'),array('class'=>'operate_green'));
		    }
		  }
		  if(Util::is_permission($user_permission_name,"delete")) 
		 		$return_str.=CHtml::link('删除','javascript:void(0);',array('id'=>'delete_'.$this->id,'class'=>'operate_red','onclick'=>"javascript:ajax_delete('".Yii::app()->getController()->createUrl('main/delete')."','".get_class($this)."','".$this->id."');"));
		  $return_str.="</div>";
		  return $return_str;
	}
}