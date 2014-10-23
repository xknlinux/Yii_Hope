<?php

/**
 * This is the model class for table "hosts".
 *
 * The followings are the available columns in table 'hosts':
 * @property integer $id
 * @property string $host_name
 * @property string $host_ip_0
 * @property string $host_ip_1
 * @property string $description
 * @property integer $host_group_id
 * @property integer $device_id
 * @property integer $bond
 * @property string $alias
 * @property string $product
 * @property integer $status
 * @property string $os_type
 * @property string $os_version
 * @property integer $datacenter_id
 * @property integer $device_type_id
 */
class Hosts extends MyActiveRecord
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
		return 'hosts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('datacenter_id, device_type_id', 'required'),
			array('host_group_id, device_id, bond, status, datacenter_id, device_type_id', 'numerical', 'integerOnly'=>true),
			array('host_name, host_ip_0, host_ip_1, alias, product, os_type, os_version', 'length', 'max'=>255),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, host_name, host_ip_0, host_ip_1, description, host_group_id, device_id, bond, alias, product, status, os_type, os_version, datacenter_id, device_type_id', 'safe', 'on'=>'search'),
			array('host_name, host_ip_0, host_ip_1', 'unique'),
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
			'host_tags' => array(self::HAS_MANY, 'HostTags', 'host_id'),
			'datacenter' => array(self::BELONGS_TO, 'Datacenter', 'datacenter_id'),
			'device_type' => array(self::BELONGS_TO, 'DeviceTypes', 'device_type_id'),
			'host_group' => array(self::BELONGS_TO, 'HostGroups', 'host_group_id'),
			'device' => array(self::BELONGS_TO, 'Devices', 'device_id'),
			'reports' => array(self::HAS_MANY, 'Reports', 'host_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'host_name' => 'Host Name',
			'host_ip_0' => 'Host Ip 0',
			'host_ip_1' => 'Host Ip 1',
			'description' => 'Description',
			'host_group_id' => 'Host Group',
			'device_id' => 'Device',
			'bond' => 'Bond',
			'alias' => 'Alias',
			'product' => 'Product',
			'status' => 'Status',
			'os_type' => 'Os Type',
			'os_version' => 'Os Version',
			'datacenter_id' => 'Datacenter',
			'device_type_id' => 'Device Type',
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

		$criteria->compare('host_name',$this->host_name,true);

		$criteria->compare('host_ip_0',$this->host_ip_0,true);

		$criteria->compare('host_ip_1',$this->host_ip_1,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('host_group_id',$this->host_group_id);

		$criteria->compare('device_id',$this->device_id);

		$criteria->compare('bond',$this->bond);

		$criteria->compare('alias',$this->alias,true);

		$criteria->compare('product',$this->product,true);

		$criteria->compare('status',$this->status);

		$criteria->compare('os_type',$this->os_type,true);

		$criteria->compare('os_version',$this->os_version,true);

		$criteria->compare('datacenter_id',$this->datacenter_id);

		$criteria->compare('device_type_id',$this->device_type_id);

		return new CActiveDataProvider('Hosts', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Hosts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getOptions($model)
	{
		if($model == 'reports')
			return   CHtml::listData($this->model()->findAll(), 'id', 'host_name');
		else if($model == 'services')
			return  CHtml::listData($this->model()->findAll(), 'id', 'host_name');

	}

}
