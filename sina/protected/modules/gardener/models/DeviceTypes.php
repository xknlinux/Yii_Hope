<?php

/**
 * This is the model class for table "device_types".
 *
 * The followings are the available columns in table 'device_types':
 * @property integer $id
 * @property string $type_name
 * @property string $cpu_cnt
 * @property string $cpu_info
 * @property string $disk_cnt
 * @property string $disk_info
 * @property string $mem_info
 * @property string $chassis
 * @property string $raid
 * @property string $producer
 * @property string $raidcard
 * @property string $networkcard
 */
class DeviceTypes extends MyActiveRecord
{

	protected function setDatabase()
	{
		self::$db = Yii::app()->gardener_db;
	}


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'device_types';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_name, cpu_cnt, cpu_info, disk_cnt, disk_info, mem_info, chassis, raid, producer, raidcard', 'length', 'max'=>255),
			array('networkcard', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type_name, cpu_cnt, cpu_info, disk_cnt, disk_info, mem_info, chassis, raid, producer, raidcard, networkcard', 'safe', 'on'=>'search'),
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
			'devices' => array(self::HAS_MANY, 'Devices', 'type_id'),
			'hosts' => array(self::HAS_MANY, 'Hosts', 'device_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'type_name' => 'Type Name',
			'cpu_cnt' => 'Cpu Cnt',
			'cpu_info' => 'Cpu Info',
			'disk_cnt' => 'Disk Cnt',
			'disk_info' => 'Disk Info',
			'mem_info' => 'Mem Info',
			'chassis' => 'Chassis',
			'raid' => 'Raid',
			'producer' => 'Producer',
			'raidcard' => 'Raidcard',
			'networkcard' => 'Networkcard',
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

		$criteria->compare('type_name',$this->type_name,true);

		$criteria->compare('cpu_cnt',$this->cpu_cnt,true);

		$criteria->compare('cpu_info',$this->cpu_info,true);

		$criteria->compare('disk_cnt',$this->disk_cnt,true);

		$criteria->compare('disk_info',$this->disk_info,true);

		$criteria->compare('mem_info',$this->mem_info,true);

		$criteria->compare('chassis',$this->chassis,true);

		$criteria->compare('raid',$this->raid,true);

		$criteria->compare('producer',$this->producer,true);

		$criteria->compare('raidcard',$this->raidcard,true);

		$criteria->compare('networkcard',$this->networkcard,true);

		return new CActiveDataProvider('DeviceTypes', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return DeviceTypes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getOptions($model)
	{
		if($model == 'device_types')
			return  CHtml::listData($this->model()->findAll(), 'id', 'type_name');
	}
}
