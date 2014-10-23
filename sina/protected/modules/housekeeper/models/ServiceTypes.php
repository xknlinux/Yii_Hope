<?php

/**
 * This is the model class for table "service_types".
 *
 * The followings are the available columns in table 'service_types':
 * @property integer $id
 * @property string $name
 * @property string $service_class
 * @property string $service_group
 * @property string $owners
 * @property string $install_path
 * @property string $trace_log_path
 * @property string $script
 * @property string $commands
 * @property integer $commands_timeout
 * @property integer $priority
 * @property string $mtime
 * @property string $last_change_author
 * @property string $ports_mon
 * @property string $processes_mon
 * @property integer $perf_mon
 */
class ServiceTypes extends MyActiveRecord
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
		return 'service_types';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('service_group, owners', 'required'),
			array('commands_timeout, priority, perf_mon', 'numerical', 'integerOnly'=>true),
			array('name, owners, install_path, trace_log_path, script, commands, ports_mon, processes_mon', 'length', 'max'=>255),
			array('service_class', 'length', 'max'=>20),
			array('service_group, last_change_author', 'length', 'max'=>45),
			array('mtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, service_class, service_group, owners, install_path, trace_log_path, script, commands, commands_timeout, priority, mtime, last_change_author, ports_mon, processes_mon, perf_mon', 'safe', 'on'=>'search'),
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
			'alarm_rules' => array(self::HAS_MANY, 'AlarmRule', 'service_type_id'),
			'monitor_rules' => array(self::HAS_MANY, 'MonitorRule', 'service_type_id'),
			'services' => array(self::HAS_MANY, 'Services', 'service_type_id'),
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
			'service_class' => 'Service Class',
			'service_group' => 'Service Group',
			'owners' => 'Owners',
			'install_path' => 'Install Path',
			'trace_log_path' => 'Trace Log Path',
			'script' => 'Script',
			'commands' => 'Commands',
			'commands_timeout' => 'Commands Timeout',
			'priority' => 'Priority',
			'mtime' => 'Mtime',
			'last_change_author' => 'Last Change Author',
			'ports_mon' => 'Ports Mon',
			'processes_mon' => 'Processes Mon',
			'perf_mon' => 'Perf Mon',
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

		$criteria->compare('service_class',$this->service_class,true);

		$criteria->compare('service_group',$this->service_group,true);

		$criteria->compare('owners',$this->owners,true);

		$criteria->compare('install_path',$this->install_path,true);

		$criteria->compare('trace_log_path',$this->trace_log_path,true);

		$criteria->compare('script',$this->script,true);

		$criteria->compare('commands',$this->commands,true);

		$criteria->compare('commands_timeout',$this->commands_timeout);

		$criteria->compare('priority',$this->priority);

		$criteria->compare('mtime',$this->mtime,true);

		$criteria->compare('last_change_author',$this->last_change_author,true);

		$criteria->compare('ports_mon',$this->ports_mon,true);

		$criteria->compare('processes_mon',$this->processes_mon,true);

		$criteria->compare('perf_mon',$this->perf_mon);

		return new CActiveDataProvider('ServiceTypes', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return ServiceTypes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function saveNodeTree($id)
	{
		$serviceTree = new ServiceTree();
		$parent = ServiceTree::model()->findByPk($id);

		$serviceTree->parent_id = $parent->id;
		$serviceTree->name = $this->name;
		$serviceTree->path = $parent->path . '/' . $this->name;
		$serviceTree->node_type = 'type';
		$serviceTree->service_type_id = $this->id;
		$serviceTree->parent_path = $parent->path;
		if(!$serviceTree->save())
			throw new CException('Save service tree failed');
	}
}
