<?php

/**
 * This is the model class for table "services".
 *
 * The followings are the available columns in table 'services':
 * @property integer $id
 * @property string $name
 * @property integer $host_id
 * @property integer $shard_id
 * @property integer $replica_id
 * @property integer $service_type_id
 * @property integer $enable
 * @property string $install_path
 * @property integer $from_id
 * @property string $mtime
 * @property string $last_change_author
 */
class Services extends MyActiveRecord
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
		return 'services';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('host_id, service_type_id, mtime', 'required'),
			array('host_id, shard_id, replica_id, service_type_id, enable, from_id', 'numerical', 'integerOnly'=>true),
			array('name, install_path, last_change_author', 'length', 'max'=>255),
			array('name, replica_id, shard_id', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, host_id, shard_id, replica_id, service_type_id, enable, install_path, from_id, mtime, last_change_author', 'safe', 'on'=>'search'),
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
			'service_operations' => array(self::HAS_MANY, 'ServiceOperation', 'service_id'),
			'host' => array(self::BELONGS_TO, 'Gardener.hosts', 'host_id'),
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
			'name' => 'Name',
			'host_id' => 'Host',
			'shard_id' => 'Shard',
			'replica_id' => 'Replica',
			'service_type_id' => 'Service Type',
			'enable' => 'Enable',
			'install_path' => 'Install Path',
			'from_id' => 'From',
			'mtime' => 'Mtime',
			'last_change_author' => 'Last Change Author',
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

		$criteria->compare('name',$this->name,true);

		$criteria->compare('host_id',$this->host_id);

		$criteria->compare('shard_id',$this->shard_id);

		$criteria->compare('replica_id',$this->replica_id);

		$criteria->compare('service_type_id',$this->service_type_id);

		$criteria->compare('enable',$this->enable);

		$criteria->compare('install_path',$this->install_path,true);

		$criteria->compare('from_id',$this->from_id);

		$criteria->compare('mtime',$this->mtime,true);

		$criteria->compare('last_change_author',$this->last_change_author,true);

		return new CActiveDataProvider('Services', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Services the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
