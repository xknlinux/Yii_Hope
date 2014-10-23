<?php

class Alarm_ruleController extends Controller
{
	public $layout='/layouts/tree';

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionCreate($id)
	{
		$model=new AlarmRule;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AlarmRule']))
		{
			$_POST['AlarmRule']['service_type_id'] = $id;
			$model->attributes=$_POST['AlarmRule'];
			if($model->save())
				$this->redirect(array('service_types/view','id'=>$id));
		}

		$this->render('create',array(
					'model'=>$model,
					));
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
