<?php

class HostsController extends Controller
{
	public function actionIndex()
	{
		$model = new Hosts('search');
		$model->unsetAttributes();
		$tags_all = SimpleOperate::GetTags($_GET);
		$model1 = SimpleOperate::tag_model($tags_all);
		if(isset($_GET['Hosts']))
			$model->attributes=$_GET['Hosts'];
		$this->render('index', array(
					'model'=>$model,
					'model1'=>$model1,
					'tags_all'=>$tags_all,
					));
	}

	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$model_tag = SimpleOperate::DisplayTags($model->id);
		$this->render('view', array(
					'model'=>$model,
					'model_tag'=>$model_tag,
					'datacenter'=>$model->datacenter,
					'device_types'=>$model->device_type,
					));
	}

	public function actionCreate()
	{
		$model = new Hosts();

		if(isset($_POST['Hosts']))
		{
			$model->attributes = $_POST['Hosts'];
			{
				if($model->attributes['host_ip_1'] === "")
				{
					$model->setAttributes(array('host_ip_1'=>$model->attributes['host_ip_0']));
				}

				$pre = $model->attributes['device_id'];
				$totle = Devices::model()->find('id=:id', array(':id'=>$pre));
				$model->setAttributes(array('datacenter_id'=>$totle->datacenter_id, 'device_type_id'=>$totle->type_id));
			}
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

		if(isset($_POST['Hosts']))
		{
			$model->attributes=$_POST['Hosts'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
					'model'=>$model,
					));

	}

	public function actionDel($id)
	{
		//if(SimpleOperate::NoLive($id, 'HostTags', 'host_id') == 'n' && SimpleOperate::NoLive($id, 'Reports', 'host_id') == 'n')
		$this->loadModel($id)->delete();

		$this->redirect(array('/gardener/Hosts/index'));
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
		$model = Hosts::model()->findByPk($id);
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
