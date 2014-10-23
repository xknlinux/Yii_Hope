<?php

class Service_typesController extends Controller
{

	public $layout='/layouts/tree';

	public function actionView($id)
	{
		$criteria = new CDbCriteria;
		$criteria->compare('service_type_id', $id);
		$alarm_rule_provider = new CActiveDataProvider('AlarmRule', array(
					'criteria' => $criteria,
					));
		$criteria1 = new CDbCriteria;
		$criteria1->compare('service_type_id', $id);
		$monitor_rule_provider = new CActiveDataProvider('MonitorRule', array(
					'criteria' => $criteria1,
					));

		$this->render('view', array(
					'model'=>$this->loadModel($id),
					'alarm_rule_provider'=>$alarm_rule_provider,
					'monitor_rule_provider'=>$monitor_rule_provider,
					'id'=>$id,
					));
	}

	public function actionCreate($id)
	{
		$model = new ServiceTypes();

		if(isset($_POST['ServiceTypes']))
		{
			$model->attributes = $_POST['ServiceTypes'];
			if($model->save())
			{
				$model->saveNodeTree($id);
				$this->redirect(array('service_tree/index', 'id'=>$id));
			}
		}

		$this->render('create', array(
					'model'=>$model,
					'id'=>$model->id,
					));

	}

	public function actionIndex()
	{
		$this->render('index');
	}


	public function loadModel($id)
	{
		$model = ServiceTypes::model()->findByPk($id);
		if($model == NULL)
			throw new CHttpException(404,'The requested page does not exist.');

		return $model;
	}

	// -----------------------------------------------------------
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
