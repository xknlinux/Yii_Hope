<?php

/**
 * This is the model class for table "monitor_rule".
 *
 * The followings are the available columns in table 'monitor_rule':
 * @property integer $id
 * @property integer $service_type_id
 * @property string $monitor_sys
 * @property string $check_key
 * @property integer $warning_event_id
 * @property string $warning_param
 * @property integer $critical_event_id
 * @property string $critical_param
 */
class MonitorRule extends MyActiveRecord
{

	protected function setDatabase()
	{   
		self::$db = Yii::app()->housekeeper_db;
	}  

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'monitor_rule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('monitor_sys', 'required'),
			array('service_type_id, warning_event_id, critical_event_id', 'numerical', 'integerOnly'=>true),
			array('monitor_sys', 'length', 'max'=>45),
			array('check_key, warning_param, critical_param', 'length', 'max'=>192),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, service_type_id, monitor_sys, check_key, warning_event_id, warning_param, critical_event_id, critical_param', 'safe', 'on'=>'search'),
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
			'service_type' => array(self::BELONGS_TO, 'ServiceTypes', 'service_type_id'),
			'warning_event' => array(self::BELONGS_TO, 'CheckEvent', 'warning_event_id'),
			'critical_event' => array(self::BELONGS_TO, 'CheckEvent', 'critical_event_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'service_type_id' => 'Service Type',
			'monitor_sys' => 'Monitor Sys',
			'check_key' => 'Check Key',
			'warning_event_id' => 'Warning Event',
			'warning_param' => 'Warning Param',
			'critical_event_id' => 'Critical Event',
			'critical_param' => 'Critical Param',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('service_type_id',$this->service_type_id);

		$criteria->compare('monitor_sys',$this->monitor_sys,true);

		$criteria->compare('check_key',$this->check_key,true);

		$criteria->compare('warning_event_id',$this->warning_event_id);

		$criteria->compare('warning_param',$this->warning_param,true);

		$criteria->compare('critical_event_id',$this->critical_event_id);

		$criteria->compare('critical_param',$this->critical_param,true);

		return new CActiveDataProvider('MonitorRule', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return MonitorRule the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
