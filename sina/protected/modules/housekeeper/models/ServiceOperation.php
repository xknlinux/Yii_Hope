<?php

/**
 * This is the model class for table "service_operation".
 *
 * The followings are the available columns in table 'service_operation':
 * @property integer $id
 * @property integer $service_id
 * @property integer $operation_id
 * @property string $operater
 * @property string $command
 * @property string $mtime
 */
class ServiceOperation extends MyActiveRecord
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
		return 'service_operation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, service_id, operation_id, mtime', 'required'),
			array('id, service_id, operation_id', 'numerical', 'integerOnly'=>true),
			array('operater, command', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, service_id, operation_id, operater, command, mtime', 'safe', 'on'=>'search'),
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
			'service' => array(self::BELONGS_TO, 'Services', 'service_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'service_id' => 'Service',
			'operation_id' => 'Operation',
			'operater' => 'Operater',
			'command' => 'Command',
			'mtime' => 'Mtime',
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

		$criteria->compare('service_id',$this->service_id);

		$criteria->compare('operation_id',$this->operation_id);

		$criteria->compare('operater',$this->operater,true);

		$criteria->compare('command',$this->command,true);

		$criteria->compare('mtime',$this->mtime,true);

		return new CActiveDataProvider('ServiceOperation', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return ServiceOperation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
