<?php

/**
 * This is the model class for table "service_tree".
 *
 * The followings are the available columns in table 'service_tree':
 * @property integer $id
 * @property string $name
 * @property string $path
 * @property integer $parent_id
 * @property string $owners
 * @property integer $service_type_id
 * @property string $node_type
 * @property string $description
 */
class ServiceTree extends MyActiveRecord
{
	public static $parent_path;

	protected function setDatabase()
	{   
		self::$db = Yii::app()->housekeeper_db;
	} 

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'service_tree';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, service_type_id', 'numerical', 'integerOnly'=>true),
			array('name, node_type', 'length', 'max'=>135),
			array('path, owners, description', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, path, parent_id, owners, service_type_id, node_type, description', 'safe', 'on'=>'search'),
			array('name', 'unique'),
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
			//'parent' => array(self::BELONGS_TO, 'ServiceTree', 'parent_id'),
			//'service_trees' => array(self::HAS_MANY, 'ServiceTree', 'parent_id'),
				'parent' => array(self::BELONGS_TO, 'ServiceTree', 'parent_id'),
				'children' => array(self::HAS_MANY, 'ServiceTree', 'parent_id'),
				'childCount' => array(self::STAT, 'ServiceTree', 'parent_id'),
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
			'path' => 'Path',
			'parent_id' => 'Parent',
			'owners' => 'Owners',
			'service_type_id' => 'Service Type',
			'node_type' => 'Node Type',
			'description' => 'Description',
			'parent_path' => 'Parent Path',
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
	public function search($id) //god!
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('path',$this->path,true);

		//$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('parent_id',$id); //display the child

		$criteria->compare('owners',$this->owners,true);

		$criteria->compare('service_type_id',$this->service_type_id);

		$criteria->compare('node_type',$this->node_type,true);

		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider('ServiceTree', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return ServiceTree the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function behaviors()
	{
		//merge parent behaviors
		return array_merge(parent::behaviors(), array(
					'TreeBehavior' => array(
						'class' => 'ext.XTree.XTreeBehavior',
						'treeLabelMethod' => 'getTreeLabel',
						'treeUrlMethod' => 'getTreeUrl',
						'treeExpandedMethod' => 'getExpanded',
						),
					));
	}

	public function getExpanded() //是否展开展开
	{
		return $this->node_type !== 'group';
	}

	public function getTreeUrl() //according to the url insert different page
	{
		if ($this->node_type === 'type') {
			return array(
					'Service_types/view',
					'id' => $this->service_type_id
					);
		}
		return array(
				'Service_tree/index',
				'id' => $this->id
				);
	}

	public function getTreeLabel() //tree display the designation
	{
		return $this->name;
	}

	public function listNodeData() //list data
	{
		return array_values(CHtml::listData(ServiceTree::model()->findAll('node_type =? or node_type =?', array('company', 'departm    ent')), 'id', 'path'));
	}

	public function saveNode()//beforesave save data
	{
		//set parent_id
		if(!empty($this->parent_path))
		{
			$parent = ServiceTree::model()->find("path=?", array($this->parent_path));
			$this->parent_id = $parent->id;
		}

		//set path
		$this->path = $this->parent->path . "/" . $this->name;

		//set node_type
		switch($this->parent->node_type)
		{
			case  'company':
				$this->node_type = 'department';
				break;
			case 'department':
				$this->node_type = 'group';
				break;
			default:
				throw new CException('no such node type :' . $this->parent->node_type);
		}

		$this->service_type_id = 0;
		Yii::log(Yii::app()->user->name . " create service tree: " . $this->name, 'info');

		return $this->save();
	}
}
