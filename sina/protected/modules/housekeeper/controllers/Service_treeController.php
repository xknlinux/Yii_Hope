<?php
class Service_treeController extends Controller
{
	public $layout='/layouts/tree';

	public function actionIndex($id)
	{
		//$model = $this->loadModel($id);
		$model = new ServiceTree;
		if(isset($_GET['ServiceTree']))
			$model->attributes=$_GET['ServiceTree'];

		$this->render('index',array(
					'model'=>$model,
					'id'=>$id,
					));
	}

	public function actionCreate($id)
	{
		$model = new ServiceTree();
		$model->parent_path = $this->loadModel($id)->path;

		if(isset($_POST['ServiceTree']))
		{
			$model->attributes = $_POST['ServiceTree'];
			if($model->saveNode())
				$this->redirect(array('index', 'id'=>$id));
		}

		$this->render('create', array(
					'model'=>$model,
					'id'=>$id,
					));
	}

	public function actionView($id)
	{
		$this->render('view', array('model'=>$this->loadModel($id), 'id'=>$this->loadModel($id)->parent_id));
	}

	public function actionDd()
	{
		$this->render('dd');
	}


	public function actionDel($id)
	{
		$parent_id = $this->loadModel($id)->parent_id;
		if(HouseOperate::DelTree($id) == 'y' && SimpleOperate::NoLive($id, 'ServiceTree', 'parent_id') == 'n')
			$this->loadModel($id)->delete();
		else
			 $this->redirect(array('/housekeeper/service_tree/dd'));

		$this->redirect(array('/housekeeper/service_tree/index', 'id'=>$parent_id));
	}

	public function loadModel($id)
	{
		$model = ServiceTree::model()->findByPk($id);
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
