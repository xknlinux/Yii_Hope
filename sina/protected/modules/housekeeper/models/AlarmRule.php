<?php

/**
 * This is the model class for table "alarm_rule".
 *
 * The followings are the available columns in table 'alarm_rule':
 * @property integer $id
 * @property integer $service_type_id
 * @property integer $mobile
 * @property integer $alarm_after_normal
 * @property integer $max_check_times
 * @property integer $replica_threshold
 * @property integer $shard_threshold
 * @property string $valid_start_time
 * @property string $valid_end_time
 */
class AlarmRule extends MyActiveRecord
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
		return 'alarm_rule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('service_type_id', 'required'),
			array('service_type_id, mobile, alarm_after_normal, max_check_times, replica_threshold, shard_threshold', 'numerical', 'integerOnly'=>true),
			array('valid_start_time, valid_end_time', 'length', 'max'=>57),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, service_type_id, mobile, alarm_after_normal, max_check_times, replica_threshold, shard_threshold, valid_start_time, valid_end_time', 'safe', 'on'=>'search'),
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
			'mobile' => 'Mobile',
			'alarm_after_normal' => 'Alarm After Normal',
			'max_check_times' => 'Max Check Times',
			'replica_threshold' => 'Replica Threshold',
			'shard_threshold' => 'Shard Threshold',
			'valid_start_time' => 'Valid Start Time',
			'valid_end_time' => 'Valid End Time',
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

		$criteria->compare('mobile',$this->mobile);

		$criteria->compare('alarm_after_normal',$this->alarm_after_normal);

		$criteria->compare('max_check_times',$this->max_check_times);

		$criteria->compare('replica_threshold',$this->replica_threshold);

		$criteria->compare('shard_threshold',$this->shard_threshold);

		$criteria->compare('valid_start_time',$this->valid_start_time,true);

		$criteria->compare('valid_end_time',$this->valid_end_time,true);

		return new CActiveDataProvider('AlarmRule', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return AlarmRule the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
