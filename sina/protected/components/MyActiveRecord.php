<?php
abstract class MyActiveRecord extends CActiveRecord
{
	public static $db;
	abstract protected function setDatabase();
	public function getDbConnection()
	{
		$this->setDatabase();
		if (self::$db !== null) {
			return self::$db;
		} else {
			throw new CDbException(Yii::t('yii', 'Active Record requires a "db" CDbConnection application component.'));
		}
	}
}
