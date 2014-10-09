<?php

class Host_tagsController extends Controller
{
	public function actionIndex()
	{
		$model = new HostTags('search');
		$model->unsetAttributes();
		if(isset($_GET['HostTags']))
			$model->attributes=$_GET['HostTags'];
		$this->render('index', array('model'=>$model,));
	}

	public function actionView($id)
	{
		$this->render('view', array(
					'model'=>$this->loadModel($id),
					));
	}

	public function actionCreate()
	{
		$model = new HostTags();

		if(isset($_POST['HostTags']))
		{
			$model->attributes = $_POST['HostTags'];
			if($model->save())
				$this->redirect(array('view', 'id'=>$model->id));
		}

		$this->render('create', array(
					'model'=>$model,
					));
	}

	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		if(isset($_POST['HostTags']))
		{
			$model->attributes=$_POST['HostTags'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
					'model'=>$model,
					));

	}

	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}


	public function loadModel($id)
	{
		$model = HostTags::model()->findByPk($id);
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
