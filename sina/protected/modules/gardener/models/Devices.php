<?php

/**
 * This is the model class for table "devices".
 *
 * The followings are the available columns in table 'devices':
 * @property integer $id
 * @property string $device_name
 * @property string $mac
 * @property integer $switch_id
 * @property integer $switch_interface
 * @property string $mac_out
 * @property integer $switch_id_out
 * @property integer $switch_interface_out
 * @property string $mac_manage
 * @property integer $switch_id_manage
 * @property integer $switch_interface_manage
 * @property integer $type_id
 * @property string $device_sn
 * @property string $purchase_date
 * @property integer $datacenter_id
 * @property string $zid
 * @property string $rack
 * @property string $guarantee_expiration
 */
class Devices extends MyActiveRecord
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
		return 'devices';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id', 'required'),
			array('switch_id, switch_interface, switch_id_out, switch_interface_out, switch_id_manage, switch_interface_manage, type_id, datacenter_id', 'numerical', 'integerOnly'=>true),
			array('device_name, device_sn, zid, rack', 'length', 'max'=>255),
			array('mac, mac_out, mac_manage', 'length', 'max'=>51),
			array('purchase_date, guarantee_expiration', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, device_name, mac, switch_id, switch_interface, mac_out, switch_id_out, switch_interface_out, mac_manage, switch_id_manage, switch_interface_manage, type_id, device_sn, purchase_date, datacenter_id, zid, rack, guarantee_expiration', 'safe', 'on'=>'search'),
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
			'datacenter' => array(self::BELONGS_TO, 'Datacenter', 'datacenter_id'),
			'type' => array(self::BELONGS_TO, 'DeviceTypes', 'type_id'),
			'hosts' => array(self::HAS_MANY, 'Hosts', 'device_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'device_name' => 'Device Name',
			'mac' => 'Mac',
			'switch_id' => 'Switch',
			'switch_interface' => 'Switch Interface',
			'mac_out' => 'Mac Out',
			'switch_id_out' => 'Switch Id Out',
			'switch_interface_out' => 'Switch Interface Out',
			'mac_manage' => 'Mac Manage',
			'switch_id_manage' => 'Switch Id Manage',
			'switch_interface_manage' => 'Switch Interface Manage',
			'type_id' => 'Type',
			'device_sn' => 'Device Sn',
			'purchase_date' => 'Purchase Date',
			'datacenter_id' => 'Datacenter',
			'zid' => 'Zid',
			'rack' => 'Rack',
			'guarantee_expiration' => 'Guarantee Expiration',
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

		$criteria->compare('device_name',$this->device_name,true);

		$criteria->compare('mac',$this->mac,true);

		$criteria->compare('switch_id',$this->switch_id);

		$criteria->compare('switch_interface',$this->switch_interface);

		$criteria->compare('mac_out',$this->mac_out,true);

		$criteria->compare('switch_id_out',$this->switch_id_out);

		$criteria->compare('switch_interface_out',$this->switch_interface_out);

		$criteria->compare('mac_manage',$this->mac_manage,true);

		$criteria->compare('switch_id_manage',$this->switch_id_manage);

		$criteria->compare('switch_interface_manage',$this->switch_interface_manage);

		$criteria->compare('type_id',$this->type_id);

		$criteria->compare('device_sn',$this->device_sn,true);

		$criteria->compare('purchase_date',$this->purchase_date,true);

		$criteria->compare('datacenter_id',$this->datacenter_id);

		$criteria->compare('zid',$this->zid,true);

		$criteria->compare('rack',$this->rack,true);

		$criteria->compare('guarantee_expiration',$this->guarantee_expiration,true);

		return new CActiveDataProvider('Devices', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Devices the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getOptions($model)
	{
		if($model == 'hosts')
			return   CHtml::listData($this->model()->findAll(), 'id', 'device_name');
	}
}
