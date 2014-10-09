<?php

class TagsController extends Controller
{
	public function actionIndex()
	{
		$model = new Tags('search');
		$model->unsetAttributes();
		if(isset($_GET['Tags']))
			$model->attributes=$_GET['Tags'];
		$this->render('index', array('model'=>$model,));
	}

	public function actionView($id)
	{
		$this->render('view', array(
					'model'=>$this->loadModel($id),
					));
	}

	public function actionCreate($id)
	{
		$model = new Tags();

		if(isset($_POST['Tags']))
		{
			$model->attributes = $_POST['Tags'];
			SimpleOperate::tags_save($_POST['Tags']['tagname'], $id);
			if($model->save())
			{
				SimpleOperate::BitTag($model->id, $id);
				//$this->redirect(array('view', 'id'=>$model->id));
				$this->redirect(array('hosts/index'));
			}
		}

		$this->render('create', array(
					'model'=>$model,
					));
	}

	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		if(isset($_POST['Tags']))
		{
			$model->attributes=$_POST['Tags'];
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
		$model = Tags::model()->findByPk($id);
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
