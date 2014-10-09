<?php

/**
 * This is the model class for table "reports".
 *
 * The followings are the available columns in table 'reports':
 * @property integer $id
 * @property integer $bug_id
 * @property integer $host_id
 * @property integer $device_id
 * @property string $reason
 * @property string $report_time
 * @property string $fix_time
 * @property string $reportor
 * @property string $processor
 * @property integer $problem_type
 */
class Reports extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reports';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('host_id, device_id', 'required'),
			array('bug_id, host_id, device_id, problem_type', 'numerical', 'integerOnly'=>true),
			array('reportor, processor', 'length', 'max'=>255),
			array('reason, report_time, fix_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bug_id, host_id, device_id, reason, report_time, fix_time, reportor, processor, problem_type', 'safe', 'on'=>'search'),
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
			'host' => array(self::BELONGS_TO, 'Hosts', 'host_id'),
			'problem_type0' => array(self::BELONGS_TO, 'RepairReason', 'problem_type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'bug_id' => 'Bug',
			'host_id' => 'Host',
			'device_id' => 'Device',
			'reason' => 'Reason',
			'report_time' => 'Report Time',
			'fix_time' => 'Fix Time',
			'reportor' => 'Reportor',
			'processor' => 'Processor',
			'problem_type' => 'Problem Type',
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

		$criteria->compare('bug_id',$this->bug_id);

		$criteria->compare('host_id',$this->host_id);

		$criteria->compare('device_id',$this->device_id);

		$criteria->compare('reason',$this->reason,true);

		$criteria->compare('report_time',$this->report_time,true);

		$criteria->compare('fix_time',$this->fix_time,true);

		$criteria->compare('reportor',$this->reportor,true);

		$criteria->compare('processor',$this->processor,true);

		$criteria->compare('problem_type',$this->problem_type);

		return new CActiveDataProvider('Reports', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Reports the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}