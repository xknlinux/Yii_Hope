<?php
class SimpleOperate
{
	public function DisplayTags($id) //显示host对应的所有日志
	{
		$tags = array();
		$criteria = new CDbCriteria();
		$criteria->select = array('tag_id');
		$criteria->condition = 'host_id = :host_id';
		$criteria->params = array(':host_id'=>$id);
		$model = HostTags::model()->findAll($criteria);
		foreach($model as $pre)
		{
			$mm = Tags::model()->find('id = :id', array(':id'=>$pre['tag_id']));
			$tags[] = $mm->tagname;
		}

		return $tags;
	}

	public function BitTag($tag_id, $host_id) //自动存储host_tags
	{
		$model = new HostTags();
		$model->setAttributes(array('tag_id'=>$tag_id, 'host_id'=>$host_id));

		$model->save();
	}

	public function GetTags($pp) //获取标签 记录用户已选择的标签
	{
		$i = 0;
		$model = Tags::model()->findAll();

		if(!isset($pp['tags_all'])) //第一次进入打标签
		{
			$Tag = array();

			foreach($model as $a)
			{
				$Tag[$i]['id'] = $a->id;
				$Tag[$i]['tagname'] = $a->tagname;
				$Tag[$i]['flags'] = 0;

				if(isset($pp['id'])) //判断是否点击按钮
				{
					if($Tag[$i]['id'] == $pp['id'])
					{
						if($Tag[$i]['flags'] == 0)
							$Tag[$i]['flags'] = 1;
						else
							$Tag[$i]['flags'] = 0;
					}
				}
				$i ++;
			}
		}
		else 					//继续选择标签
		{
			$Tag = $pp['tags_all'];

			for($i=0; $i<count($Tag); $i++)
			{
				if($Tag[$i]['id'] == $pp['id'])
				{
					if($Tag[$i]['flags'] == 0)
						$Tag[$i]['flags'] = 1;
					else
						$Tag[$i]['flags'] = 0;
				}
			}
		}
		return $Tag;
	}

	public function tag_model($tags_all)
	{
		$i = 0;
		$final_array = array();
		for($i=0; $i<count($tags_all); $i++)
		{
			if($tags_all[$i]['flags'] == 1)
			{
				array_push($final_array, $tags_all[$i]['id']);
			}
		}
		if($final_array == null)
		{
			return null;
		}
		else
		{
			$str =implode(',', $final_array); 

			$criteria =new CDbCriteria;
			$criteria->select = '*';
			$criteria->join = 'left join host_tags on host_tags.host_id = t.id ';
			$criteria->condition = "host_tags.tag_id in ($str) group by t.id";

			$model = new Hosts();
			$model = Hosts::model()->find($criteria);

			$data = new CActiveDataProvider($model, array(
						'criteria'=>$criteria,
						'pagination' => array(
							'pageSize' =>50,
							),
						));
			return $data;

		}
	}

	public function tags_save($model, $id)
	{
		$tt = 0;
		$a = Tags::model()->find('tagname=:tagname', array(":tagname"=>$model));
		$pre = $a;
		if($a != null)
		{
			$a = $a->host_tags;
			foreach($a as $b)
			{
				if($b->host_id == $id)
				{
					$tt = 1;
				}
			}
			if($tt != 1)
			{
				$model1 = new HostTags;
				$model1->setAttributes(array('tag_id'=>$pre->id, 'host_id'=>$id));

				$model1->save();
				$this->redirect(array('hosts/index'));
			}
		}
		return true;
	}

	public function NoLive($id, $str1, $str2)
	{
		$model = new $str1;
		foreach($model->findAll() as $a)
		{
			if($id == $a->$str2)
				return 'y';
		}

		return 'n';
	}
}
?>
