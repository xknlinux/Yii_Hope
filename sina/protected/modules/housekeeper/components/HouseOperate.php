<?php

class HouseOperate
{
	public function DelTree($id)
	{
		//if(ServiceTree::model()->findByPk($id)->node_type == 'type')
		//{
			//HouseOperate::DelAll($id);
			return 'y';
		//}

	}

	public function DelAll($id)
	{
		$types = ServiceTree::model()->findByPk($id)->service_type_id;
	//	$b = Services::model()->find('service_type_id = :service_type_id', array(':service_type_id'=>$types))->id
		if(($a = AlarmRule::model()->find('service_type_id = :service_type_id', array(':service_type_id'=>$types))) != null);
			$a->delete();
		if(($a = MonitorRule::model()->find('service_type_id = :service_type_id', array(':service_type_id'=>"$types"))) != null);
			$a->delete();
		//	Services::model()->findAllBySql("select * from services where id = :id", array(':id'=>1))->delete();
		//if(($a = ServiceOperation::model()->find('service_id = :service_id', array(':service_id' => $b))) != null);
		//	$a->delete();
		//if(($a = Services::model()->find('service_type_id = :service_type_id', array(':service_type_id'=>$types))) != null);
		//	$a->delete();
		//if(($a = ServiceTypes::model()->findByPk($types)) != null);
		//	$a->delete();
		//MonitorRule::model()->find('service_type_id = :service_type_id', array(':service_type_id'=>"$types"))->delete();
	//	ServiceOperation::model()->find('service_id = :service_id', array(':service_id'=>ServiceTree::model()->findByPk($types)->id))->delete();
		//Services::model()->findAll('service_type_id = :service_type_id', array(':service_type_id'=>$types))->delete();
	//	ServiceTypes::model()->findByPk($types)->delete();
	}
}
?>
