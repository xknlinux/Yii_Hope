<?php

/**
 * This is the model class for table "host_groups".
 *
 * The followings are the available columns in table 'host_groups':
 * @property integer $id
 * @property string $group_name
 * @property string $manager
 * @property string $description
 */
class HostGroups extends MyActiveRecord
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
		return 'host_groups';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_name, manager', 'length', 'max'=>255),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, group_name, manager, description', 'safe', 'on'=>'search'),
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
			'hosts' => array(self::HAS_MANY, 'Hosts', 'host_group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'group_name' => 'Group Name',
			'manager' => 'Manager',
			'description' => 'Description',
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

		$criteria->compare('group_name',$this->group_name,true);

		$criteria->compare('manager',$this->manager,true);

		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider('HostGroups', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return HostGroups the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getOptions($model)
	{
		if($model == 'hosts')
			return  CHtml::listData($this->model()->findAll(), 'id', 'group_name');
	}
}
