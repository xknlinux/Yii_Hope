yii_hope
======

数据库 名字为root, 密码是kenan<br/>

Hosts 表增加两个字段并设置为外键：<br/>

CONSTRAINT `fk_hosts_1` FOREIGN KEY (`datacenter_id`) REFERENCES `datacenter` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,<br/>
CONSTRAINT `fk_hosts_2` FOREIGN KEY (`device_type_id`) REFERENCES `device_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,<br/>

sina是HOPE项目代码， yii是框架源代码是v1.1.15版本<br/>
