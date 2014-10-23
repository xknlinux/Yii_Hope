<?php

class ServicesController extends Controller
{

	public $layout='/layouts/tree';

	public function actionView($id)
	{
		$this->render('view',array(
					'model'=>$this->loadModel($id),
					));
	}

	public function actionIndex()
	{
		$model = new Services;
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Services']))
			$model->attributes=$_GET['Services'];


		$this->render('index', array(
					'model'=>$model,
					));
	}

	public function actionCreate($id)
	{
		$model=new Services;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Services']))
		{
			$_POST['Services']['service_type_id'] = $id;
			$model->attributes=$_POST['Services'];
			if($model->save())
				$this->redirect(array('service_types/view','id'=>$id));
		}

		$this->render('create',array(
					'model'=>$model,
					));
	}

	public function actionDd()
	{
		$this->render('dd');
	}

	public function actionDel($id)
	{
		if(SimpleOperate::NoLive($id, 'ServiceOperation', 'service_id') == 'n')
			$this->loadModel($id)->delete();
		else
			$this->redirect(array('/housekeeper/services/dd'));

		$this->redirect(array('/housekeeper/services/index'));
	}

	public function loadModel($id)
	{
		$model = Services::model()->findByPk($id);
		if($model == null)
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
