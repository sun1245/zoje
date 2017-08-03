/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.30 : Database - xjw_bocweb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `boc_acount` */

DROP TABLE IF EXISTS `boc_acount`;

CREATE TABLE `boc_acount` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL COMMENT 'Mail作为帐号',
  `uname` varchar(50) NOT NULL COMMENT '帐号',
  `nickname` varchar(50) NOT NULL COMMENT '显示名称',
  `pwd` varchar(64) NOT NULL COMMENT '密码',
  `tel` varchar(30) DEFAULT NULL COMMENT '电话',
  `phone` varchar(30) DEFAULT NULL COMMENT '手机',
  `addr` varchar(100) DEFAULT NULL COMMENT '地址',
  `photo` varchar(100) DEFAULT NULL COMMENT '头像',
  `thumb` varchar(100) DEFAULT NULL COMMENT '缩略图',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '用户状态，0 禁用',
  `login_today` int(11) NOT NULL COMMENT '今日登录次数',
  `pwd_errors` int(1) NOT NULL DEFAULT '0' COMMENT '密码错误次数',
  `login_ip` varchar(25) NOT NULL COMMENT '最后登录的IP',
  `reg_time` int(11) NOT NULL COMMENT '添加时间',
  `login_time` int(11) NOT NULL COMMENT '最后一次登录时间',
  `ga` varchar(20) NOT NULL COMMENT 'GA 两部验证密钥 开启与否',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='前端会员帐号';

/*Data for the table `boc_acount` */

/*Table structure for table `boc_adminmodels` */

DROP TABLE IF EXISTS `boc_adminmodels`;

CREATE TABLE `boc_adminmodels` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一编号',
  `cid` int(11) NOT NULL DEFAULT '0' COMMENT '所属栏目',
  `ccid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `mid` int(10) DEFAULT '1' COMMENT '1:新闻模块',
  `sort_id` int(11) DEFAULT '0' COMMENT '排序编号',
  `audit` int(1) NOT NULL DEFAULT '1' COMMENT '0:1审核',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐',
  `ctype` int(4) NOT NULL DEFAULT '0' COMMENT '默认分类',
  `type_id` int(4) DEFAULT NULL COMMENT '模块标识',
  `title` varchar(200) DEFAULT NULL COMMENT '标题',
  `link` text COMMENT '外链',
  `title_seo` tinytext,
  `intro` varchar(500) DEFAULT NULL COMMENT '简介(200汉字)',
  `tags` tinytext COMMENT '标签',
  `content` text COMMENT '内容',
  `timeline` int(11) DEFAULT NULL COMMENT '发布/修改时间',
  `photo` varchar(200) DEFAULT NULL COMMENT '图片',
  `thumb` varchar(200) DEFAULT NULL COMMENT '图片缩略图',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='模块列表';

/*Data for the table `boc_adminmodels` */

insert  into `boc_adminmodels`(`id`,`cid`,`ccid`,`mid`,`sort_id`,`audit`,`flag`,`ctype`,`type_id`,`title`,`link`,`title_seo`,`intro`,`tags`,`content`,`timeline`,`photo`,`thumb`) values (17,0,0,2,6,1,0,0,1,'模块1',NULL,NULL,NULL,NULL,NULL,1492415573,'13','2017/04/17/thumbnail/14924159147287ins5x.jpg'),(16,0,0,1,5,1,0,0,5,'模块5',NULL,NULL,NULL,NULL,NULL,1489377405,'6','2017/03/13/thumbnail/14893892559326x71d4.jpg'),(15,0,0,1,4,1,0,0,4,'模块4',NULL,NULL,NULL,NULL,NULL,1489377393,'5','2017/03/13/thumbnail/14893892411976clryg.jpg'),(14,0,0,1,3,1,0,0,3,'模块3',NULL,NULL,NULL,NULL,NULL,1489377383,'4','2017/03/13/thumbnail/14893892305067qloi4.jpg'),(12,0,0,1,1,1,0,0,1,'模块1',NULL,NULL,NULL,NULL,NULL,1489116282,'2','2017/03/13/thumbnail/14893892035051vvu0w.jpg'),(13,0,0,1,2,1,0,0,2,'模块2',NULL,NULL,NULL,NULL,NULL,1489116466,'3','2017/03/13/thumbnail/14893892187479s1vqp.jpg'),(18,0,0,2,7,1,0,0,2,'模块2',NULL,NULL,NULL,NULL,NULL,1492415589,'14','2017/04/17/thumbnail/14924159235296dxq84.jpg'),(19,0,0,2,8,1,0,0,3,'模块3',NULL,NULL,NULL,NULL,NULL,1492415601,'15','2017/04/17/thumbnail/14924159336625fonvz.jpg'),(20,0,0,2,9,1,0,0,4,'模块4',NULL,NULL,NULL,NULL,NULL,1492415611,'16','2017/04/17/thumbnail/14924159404476vzltt.jpg'),(21,0,0,1,10,1,0,0,6,'模版6',NULL,NULL,NULL,NULL,NULL,1492568126,'17','2017/04/19/thumbnail/149256812539143bm7h.jpg'),(22,0,0,1,11,1,0,0,7,'模版7',NULL,NULL,NULL,NULL,NULL,1492568139,'18','2017/04/19/thumbnail/14925681384586shijf.jpg');

/*Table structure for table `boc_advert` */

DROP TABLE IF EXISTS `boc_advert`;

CREATE TABLE `boc_advert` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一编号',
  `cid` int(11) DEFAULT NULL COMMENT '所属栏目',
  `ccid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `sort_id` int(11) DEFAULT '0' COMMENT '排序编号',
  `audit` int(1) NOT NULL DEFAULT '0' COMMENT '0:1审核',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐',
  `ctype` int(4) NOT NULL DEFAULT '0' COMMENT '默认分类',
  `type_id` int(4) DEFAULT NULL COMMENT '类型',
  `title` tinytext COMMENT '标题',
  `link` text COMMENT '外链',
  `title_seo` tinytext,
  `intro` varchar(500) DEFAULT NULL COMMENT '简介(200汉字)',
  `tags` tinytext COMMENT '标签',
  `content` text COMMENT '内容',
  `timeline` int(11) DEFAULT NULL COMMENT '发布/修改时间',
  `expiretime` int(10) DEFAULT NULL COMMENT '公告过期时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0:1状态,1 发布，0 草稿',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `photo` varchar(200) DEFAULT NULL COMMENT '图片',
  `thumb` varchar(200) DEFAULT NULL COMMENT '图片缩略图',
  `attachment` tinytext COMMENT '附件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='广告';

/*Data for the table `boc_advert` */

insert  into `boc_advert`(`id`,`cid`,`ccid`,`sort_id`,`audit`,`flag`,`ctype`,`type_id`,`title`,`link`,`title_seo`,`intro`,`tags`,`content`,`timeline`,`expiretime`,`status`,`click`,`photo`,`thumb`,`attachment`) values (2,0,0,1,1,0,0,NULL,'首页漂浮广告','http://www.bocweb.cn','','  ','',NULL,1487917385,NULL,0,0,'1','2017/03/13/thumbnail/14893891775331cprts.jpg',NULL);

/*Table structure for table `boc_article` */

DROP TABLE IF EXISTS `boc_article`;

CREATE TABLE `boc_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一编号',
  `cid` int(11) NOT NULL COMMENT '所属栏目',
  `ccid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `sort_id` int(11) DEFAULT '0' COMMENT '排序编号',
  `audit` int(1) NOT NULL DEFAULT '0' COMMENT '0:1审核',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐',
  `ctype` int(4) NOT NULL DEFAULT '0' COMMENT '默认分类',
  `type_id` int(4) DEFAULT NULL COMMENT '类型',
  `title` varchar(200) NOT NULL COMMENT '标题',
  `title_seo` tinytext,
  `intro` varchar(500) DEFAULT NULL COMMENT '简介(200汉字)',
  `tags` tinytext COMMENT '标签',
  `content` text COMMENT '内容',
  `timeline` int(11) DEFAULT NULL COMMENT '发布/修改时间',
  `expiretime` int(10) DEFAULT NULL COMMENT '公告过期时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0:1状态,1 发布，0 草稿',
  `author` varchar(50) DEFAULT NULL COMMENT '消息作者',
  `source` varchar(50) DEFAULT NULL COMMENT '消息来源',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `recommend` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐到分类门户的页面显示',
  `photo` varchar(200) DEFAULT NULL COMMENT '相关图片',
  `thumb` varchar(200) DEFAULT NULL COMMENT '图片缩略图',
  `attachment` tinytext COMMENT '附件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='信息表';

/*Data for the table `boc_article` */

insert  into `boc_article`(`id`,`cid`,`ccid`,`sort_id`,`audit`,`flag`,`ctype`,`type_id`,`title`,`title_seo`,`intro`,`tags`,`content`,`timeline`,`expiretime`,`status`,`author`,`source`,`click`,`recommend`,`photo`,`thumb`,`attachment`) values (1,8,0,1,1,0,2,NULL,'测试11','','  ','','<p style=\"margin-top: 26px; margin-bottom: 26px; padding: 0px; color: rgb(51, 51, 51); font-family: sinmsun; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp; &nbsp;12月17日，由国家科技部现代服务产业联盟主办，功虎社区联合主办，中英HiTECH创新创业协会、杭州市移动互联网技术学会、杭州市计算机学会、浙江大学创新创业中心联合承办，博采网络全程战略支持的第三届中国(杭州)移动互联网大会在浙江杭州举行。中国工程院院士、联想集团首任总工程师倪光南教授出席会议并致辞。国内移动互联网领域大咖、资深投资人、知名企业家、创业者及相关协会代表等千余人参加会议。</p><p style=\"margin-top: 26px; margin-bottom: 26px; padding: 0px; color: rgb(51, 51, 51); font-family: sinmsun; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);\">　　近年来，作为战略支持方的博采网络在移动互联网营销及开发领域的突出优势获得市场及客户的广泛认可，在移动大数据领域也拥有自主知识产权的平台级产品，在移动营销领域的综合能力方面在国内居于领先位置。</p><div class=\"img_wrapper\" style=\"margin: 0px 0px 10px; padding: 0px; font-size: 12px; position: relative; text-align: center; color: rgb(51, 51, 51); font-family: sinmsun; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"http://localhost/bocweb/web/upload/148775661822781.jpg\" alt=\"278103075.jpg\" style=\"border: 1px solid black; vertical-align: top; display: inline; margin: 0px auto; z-index: 1; position: relative;\" width=\"500\" height=\"332\"/><span class=\"img_descr\" style=\"display: block; margin: 5px auto; z-index: 1;\"></span></div><div class=\"img_wrapper\" style=\"margin: 0px 0px 10px; padding: 0px; font-size: 12px; position: relative; text-align: center; color: rgb(51, 51, 51); font-family: sinmsun; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"http://localhost/bocweb/web/upload/14877566186278.jpg\" alt=\"994788439.jpg\" style=\"border: 1px solid black; vertical-align: top; display: inline; margin: 0px auto; z-index: 1; position: relative;\" width=\"500\" height=\"332\"/><span class=\"img_descr\" style=\"display: block; margin: 5px auto; z-index: 1;\"></span></div><div class=\"img_wrapper\" style=\"margin: 0px 0px 10px; padding: 0px; font-size: 12px; position: relative; text-align: center; color: rgb(51, 51, 51); font-family: sinmsun; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"http://localhost/bocweb/web/upload/14877566185180.jpg\" alt=\"webwxgetmsgimg.jpg\" style=\"border: 1px solid black; vertical-align: top; display: inline; margin: 0px auto; z-index: 1; position: relative;\" width=\"500\" height=\"333\"/></div><p><br/></p>',1487142495,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL),(2,8,0,2,1,0,2,NULL,'测试2','','  ','','<p style=\"margin-top: 0px; margin-bottom: 10px; padding: 0px; vertical-align: baseline; border: none; color: rgb(68, 68, 68); text-indent: 2em;\">近日，西湖区人民政府副区长陈玮，在区政府办公室罗主任、文新街道郎主任和张科长的陪同下，莅临杭州博采网络科技股份有限公司考察指导工作。</p><p style=\"margin-top: 0px; margin-bottom: 10px; padding: 0px; vertical-align: baseline; border: none; color: rgb(68, 68, 68); text-align: center;\"><img src=\"http://localhost/bocweb/web/upload/148775705412514.png\" title=\"1480308314381844.png\" alt=\"图片1.png\" style=\"margin: 0px; padding: 0px; vertical-align: baseline; border: none; max-width: 100%;\"/></p><p style=\"margin-top: 0px; margin-bottom: 10px; padding: 0px; vertical-align: baseline; border: none; color: rgb(68, 68, 68); text-indent: 2em;\">&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 10px; padding: 0px; vertical-align: baseline; border: none; color: rgb(68, 68, 68); text-align: center;\"><img src=\"http://localhost/bocweb/web/upload/148775705711176.png\" title=\"1480308327994856.png\" alt=\"图片2.png\" style=\"margin: 0px; padding: 0px; vertical-align: baseline; border: none; max-width: 100%;\"/></p><p style=\"margin-top: 0px; margin-bottom: 10px; padding: 0px; vertical-align: baseline; border: none; color: rgb(68, 68, 68); text-indent: 2em;\">&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 10px; padding: 0px; vertical-align: baseline; border: medium none; color: rgb(68, 68, 68); text-indent: 2em;\">博采网络董事长叶栋栋、董秘兼总经理祝珍来，董事胡小飞在司陪同接待，对来访的西湖区政府领导关于博采网络的成长历程及相关业务情况进行了汇报，陈玮副区长对博采网络取得的成绩给予了充分肯定，并鼓励公司要走出去，多互动多交流，以进一步发展壮大，区政府和有关部门、街道将一如既往地做好服务工作，帮助公司排忧解难，让公司把更多精力放到做大、做强、做精上。</p>',1487757041,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL),(3,8,0,3,1,0,2,NULL,'测试33','','  ','','<p><span style=\"white-space: normal;\">&nbsp; &nbsp; &nbsp; &nbsp;测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span>测试3<span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span>测试3<span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span>测试3<span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span>测试3<span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span>测试3<span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span>测试3<span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span>测试3<span style=\"white-space: normal;\">测试3</span><span style=\"white-space: normal;\">测试3</span></p>',1487817805,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL),(4,8,0,4,1,0,2,NULL,'测试4','','  ','','<p style=\"text-align: center;\"><img src=\"http://localhost/bocweb/web/upload/148792296124561.png\" title=\"14847963917932761Kdb.png\" alt=\"201612191127322628.png\" style=\"-webkit-font-smoothing: antialiased; border: 0px; vertical-align: middle; max-width: 100%;\"/></p><p></p>',1487922891,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL),(5,8,0,5,1,0,2,NULL,'测试5','','  ','','<p>&nbsp; &nbsp; &nbsp; &nbsp; 测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5测试5</p>',1489975974,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL),(6,8,0,6,1,0,2,NULL,'测试6','','  ','','<p>&nbsp; &nbsp; &nbsp; &nbsp; 测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6测试6</p>',1490667472,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL),(7,8,0,7,1,0,2,NULL,'测试7','','  ','','<p>&nbsp; &nbsp; &nbsp; &nbsp; 测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7测试7</p>',1490667473,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL),(8,8,0,8,1,0,2,NULL,'测试8','','  ','','<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8测试8</p>',1490667474,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL),(9,8,0,9,1,0,2,NULL,'测试9','','  ','','<p>&nbsp; &nbsp; &nbsp; &nbsp; 测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9测试9</p>',1490667474,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL),(10,8,0,10,1,0,1,NULL,'测试10','','  ','','<p>&nbsp; &nbsp; &nbsp; &nbsp; 测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10测试10</p>',1490667475,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL),(11,8,0,11,1,0,1,NULL,'测试11','','  ','','<p>&nbsp; &nbsp; &nbsp; &nbsp; 测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11测试11</p>',1490667476,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL),(12,8,0,12,1,0,1,NULL,'测试12','','  ','','<p>&nbsp; &nbsp; &nbsp; &nbsp; 测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12测试12</p>',1490667476,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL),(13,8,0,13,1,0,1,NULL,'测试13','','  ','','<p>&nbsp; &nbsp; &nbsp; &nbsp; 测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13测试13</p>',1490667477,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL),(14,8,0,14,1,0,1,NULL,'测试14','','  ','','<p>&nbsp; &nbsp; &nbsp; &nbsp; 测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14测试14</p>',1490667477,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL),(15,8,0,15,1,1,1,NULL,'测试15','','  ','','<p>&nbsp; &nbsp; &nbsp; &nbsp; 测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15测试15</p>',1490667478,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL),(16,8,0,16,1,1,1,NULL,'测试16','','  ','','<p>&nbsp; &nbsp; &nbsp; &nbsp; 测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16测试16</p>',1490667479,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL),(17,8,0,17,1,1,1,NULL,'测试17','','  ','','<p>&nbsp; &nbsp; &nbsp; 测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17测试17</p>',1490667479,NULL,0,NULL,NULL,0,0,'12','2017/03/28/thumbnail/14906677005732nrqc9.jpg',NULL);

/*Table structure for table `boc_article_tag` */

DROP TABLE IF EXISTS `boc_article_tag`;

CREATE TABLE `boc_article_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(30) NOT NULL COMMENT '标签',
  `record` int(11) DEFAULT NULL COMMENT '使用的 article id',
  `count` int(11) DEFAULT NULL COMMENT '计数',
  PRIMARY KEY (`id`),
  KEY `record_index` (`id`,`tag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='标签表';

/*Data for the table `boc_article_tag` */

/*Table structure for table `boc_banners` */

DROP TABLE IF EXISTS `boc_banners`;

CREATE TABLE `boc_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一编号',
  `cid` int(11) NOT NULL COMMENT '所属栏目',
  `ccid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `sort_id` int(11) DEFAULT '0' COMMENT '排序编号',
  `audit` int(1) NOT NULL DEFAULT '0' COMMENT '0:1审核',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐',
  `ctype` int(4) NOT NULL DEFAULT '0' COMMENT '默认分类',
  `type_id` int(4) DEFAULT NULL COMMENT '类型',
  `title` tinytext NOT NULL COMMENT '标题',
  `link` text COMMENT '外链',
  `title_seo` tinytext,
  `intro` varchar(500) DEFAULT NULL COMMENT '简介(200汉字)',
  `tags` tinytext COMMENT '标签',
  `content` text COMMENT '内容',
  `timeline` int(11) DEFAULT NULL COMMENT '发布/修改时间',
  `expiretime` int(10) DEFAULT NULL COMMENT '公告过期时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0:1状态,1 发布，0 草稿',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `photo` varchar(200) DEFAULT NULL COMMENT '图片',
  `thumb` varchar(200) DEFAULT NULL COMMENT '图片缩略图',
  `attachment` tinytext COMMENT '附件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='导航';

/*Data for the table `boc_banners` */

insert  into `boc_banners`(`id`,`cid`,`ccid`,`sort_id`,`audit`,`flag`,`ctype`,`type_id`,`title`,`link`,`title_seo`,`intro`,`tags`,`content`,`timeline`,`expiretime`,`status`,`click`,`photo`,`thumb`,`attachment`) values (1,3,0,1,1,0,0,NULL,'1','1','','  ','',NULL,2015,NULL,0,0,'','',NULL);

/*Table structure for table `boc_city` */

DROP TABLE IF EXISTS `boc_city`;

CREATE TABLE `boc_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yid` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `sort_id` int(11) DEFAULT NULL,
  `depth` tinyint(4) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `timeline` int(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=430 DEFAULT CHARSET=utf8;

/*Data for the table `boc_city` */

insert  into `boc_city`(`id`,`yid`,`type_id`,`sort_id`,`depth`,`path`,`title`,`parent_id`,`photo`,`thumb`,`timeline`) values (1,110000,0,0,0,'','北京市',0,'','',1368120198),(2,120000,0,0,0,'','天津市',0,'','',1368120198),(3,130000,0,0,0,'','河北省',0,'','',1368120198),(4,140000,0,0,0,'','山西省',0,'','',1368120198),(5,150000,0,0,0,'','内蒙自治区',0,'','',1368120198),(6,210000,0,0,0,'','辽宁省',0,'','',1368120198),(7,220000,0,0,0,'','吉林市',0,'','',1368120198),(8,230000,0,0,0,'','黑龙江省',0,'','',1368120198),(9,310000,0,0,0,'','上海市',0,'','',1368120198),(10,320000,0,0,0,'','江苏省',0,'','',1368120198),(11,330000,0,0,0,'','浙江省',0,'','',1368120198),(12,340000,0,0,0,'','安徽省',0,'','',1368120198),(13,350000,0,0,0,'','福建省',0,'','',1368120198),(14,360000,0,0,0,'','江西省',0,'','',1368120198),(15,370000,0,0,0,'','山东省',0,'','',1368120198),(16,410000,0,0,0,'','河南省',0,'','',1368120198),(17,420000,0,0,0,'','湖北省',0,'','',1368120198),(18,430000,0,0,0,'','湖南省',0,'','',1368120198),(19,440000,0,0,0,'','广东省',0,'','',1368120198),(20,450000,0,0,0,'','广西自治区',0,'','',1368120198),(21,460000,0,0,0,'','海南省',0,'','',1368120198),(22,500000,0,0,0,'','重庆市',0,'','',1368120198),(23,510000,0,0,0,'','四川省',0,'','',1368120198),(24,520000,0,0,0,'','贵州省',0,'','',1368120198),(25,530000,0,0,0,'','云南省',0,'','',1368120198),(26,540000,0,0,0,'','西藏自治区',0,'','',1368120198),(27,610000,0,0,0,'','陕西省',0,'','',1368120198),(28,620000,0,0,0,'','甘肃省',0,'','',1368120198),(29,630000,0,0,0,'','青海省',0,'','',1368120198),(30,640000,0,0,0,'','宁夏自治区',0,'','',1368120198),(31,650000,0,0,0,'','新疆自治区',0,'','',1368120198),(32,710000,0,0,0,'','台湾省',0,'','',1368120198),(33,810000,0,0,0,'','香港特区',0,'','',1368120198),(34,820000,0,0,0,'','澳门特区',0,'','',1368120198),(35,110100,0,0,1,'','北京市',110000,'','',1368120199),(36,120100,0,0,1,'','天津市',120000,'','',1368120199),(37,130100,0,0,1,'','石家庄市',130000,'','',1368120199),(38,130200,0,0,1,'','唐山市',130000,'','',1368120199),(39,130300,0,0,1,'','秦皇岛市',130000,'','',1368120199),(40,130400,0,0,1,'','邯郸市',130000,'','',1368120199),(41,130500,0,0,1,'','邢台市',130000,'','',1368120199),(42,130600,0,0,1,'','保定市',130000,'','',1368120199),(43,130700,0,0,1,'','张家口市',130000,'','',1368120199),(44,130800,0,0,1,'','承德市',130000,'','',1368120199),(45,130900,0,0,1,'','沧州市',130000,'','',1368120199),(46,131000,0,0,1,'','廊坊市',130000,'','',1368120199),(47,131100,0,0,1,'','衡水市',130000,'','',1368120199),(48,140100,0,0,1,'','太原市',140000,'','',1368120199),(49,140200,0,0,1,'','大同市',140000,'','',1368120199),(50,140300,0,0,1,'','阳泉市',140000,'','',1368120199),(51,140400,0,0,1,'','长治市',140000,'','',1368120199),(52,140500,0,0,1,'','晋城市',140000,'','',1368120199),(53,140600,0,0,1,'','朔州市',140000,'','',1368120199),(54,140700,0,0,1,'','晋中市',140000,'','',1368120199),(55,140800,0,0,1,'','运城市',140000,'','',1368120199),(56,140900,0,0,1,'','忻州市',140000,'','',1368120199),(57,141000,0,0,1,'','临汾市',140000,'','',1368120199),(58,141100,0,0,1,'','吕梁市',140000,'','',1368120199),(59,150100,0,0,1,'','呼和浩特市',150000,'','',1368120199),(60,150200,0,0,1,'','包头市',150000,'','',1368120199),(61,150300,0,0,1,'','乌海市',150000,'','',1368120199),(62,150400,0,0,1,'','赤峰市',150000,'','',1368120199),(63,150500,0,0,1,'','通辽市',150000,'','',1368120199),(64,150600,0,0,1,'','鄂尔多斯市',150000,'','',1368120199),(65,150700,0,0,1,'','呼伦贝尔市',150000,'','',1368120199),(66,150800,0,0,1,'','巴彦淖尔市',150000,'','',1368120199),(67,150900,0,0,1,'','乌兰察布市',150000,'','',1368120199),(68,151000,0,0,1,'','东胜',150000,'','',1368120199),(69,152200,0,0,1,'','兴安盟',150000,'','',1368120199),(70,152500,0,0,1,'','锡林郭勒盟',150000,'','',1368120199),(71,152900,0,0,1,'','阿拉善盟',150000,'','',1368120199),(72,210100,0,0,1,'','沈阳市',210000,'','',1368120199),(73,210200,0,0,1,'','大连市',210000,'','',1368120199),(74,210300,0,0,1,'','鞍山市',210000,'','',1368120199),(75,210400,0,0,1,'','抚顺市',210000,'','',1368120199),(76,210500,0,0,1,'','本溪市',210000,'','',1368120199),(77,210600,0,0,1,'','丹东市',210000,'','',1368120199),(78,210700,0,0,1,'','锦州市',210000,'','',1368120199),(79,210800,0,0,1,'','营口市',210000,'','',1368120199),(80,210900,0,0,1,'','阜新市',210000,'','',1368120199),(81,211000,0,0,1,'','辽阳市',210000,'','',1368120199),(82,211100,0,0,1,'','盘锦市',210000,'','',1368120199),(83,211200,0,0,1,'','铁岭市',210000,'','',1368120199),(84,211300,0,0,1,'','朝阳市',210000,'','',1368120199),(85,211400,0,0,1,'','葫芦岛市',210000,'','',1368120199),(86,211500,0,0,1,'','北宁',210000,'','',1368120199),(87,220100,0,0,1,'','长春市',220000,'','',1368120199),(88,220200,0,0,1,'','吉林市',220000,'','',1368120199),(89,220300,0,0,1,'','四平市',220000,'','',1368120199),(90,220400,0,0,1,'','辽源市',220000,'','',1368120199),(91,220500,0,0,1,'','通化市',220000,'','',1368120199),(92,220600,0,0,1,'','白山市',220000,'','',1368120199),(93,220700,0,0,1,'','松原市',220000,'','',1368120199),(94,220800,0,0,1,'','白城市',220000,'','',1368120199),(95,222400,0,0,1,'','延边州',220000,'','',1368120199),(96,230100,0,0,1,'','哈尔滨市',230000,'','',1368120199),(97,230200,0,0,1,'','齐齐哈尔市',230000,'','',1368120199),(98,230300,0,0,1,'','鸡西市',230000,'','',1368120199),(99,230400,0,0,1,'','鹤岗市',230000,'','',1368120199),(100,230500,0,0,1,'','双鸭山市',230000,'','',1368120199),(101,230600,0,0,1,'','大庆市',230000,'','',1368120199),(102,230700,0,0,1,'','伊春市',230000,'','',1368120199),(103,230800,0,0,1,'','佳木斯市',230000,'','',1368120199),(104,230900,0,0,1,'','七台河市',230000,'','',1368120199),(105,231000,0,0,1,'','牡丹江市',230000,'','',1368120199),(106,231100,0,0,1,'','黑河市',230000,'','',1368120199),(107,231200,0,0,1,'','绥化市',230000,'','',1368120199),(108,232700,0,0,1,'','大兴安岭',230000,'','',1368120199),(109,310100,0,0,1,'','上海市',310000,'','',1368120199),(110,320100,0,0,1,'','南京市',320000,'','',1368120199),(111,320200,0,0,1,'','无锡市',320000,'','',1368120199),(112,320300,0,0,1,'','徐州市',320000,'','',1368120199),(113,320400,0,0,1,'','常州市',320000,'','',1368120199),(114,320500,0,0,1,'','苏州市',320000,'','',1368120199),(115,320600,0,0,1,'','南通市',320000,'','',1368120199),(116,320700,0,0,1,'','连云港市',320000,'','',1368120199),(117,320800,0,0,1,'','淮安市',320000,'','',1368120199),(118,320900,0,0,1,'','盐城市',320000,'','',1368120199),(119,321000,0,0,1,'','扬州市',320000,'','',1368120199),(120,321100,0,0,1,'','镇江市',320000,'','',1368120199),(121,321200,0,0,1,'','泰州市',320000,'','',1368120199),(122,321300,0,0,1,'','宿迁市',320000,'','',1368120199),(123,330100,0,0,1,'','杭州市',330000,'','',1368120199),(124,330200,0,0,1,'','宁波市',330000,'','',1368120199),(125,330300,0,0,1,'','温州市',330000,'','',1368120199),(126,330400,0,0,1,'','嘉兴市',330000,'','',1368120199),(127,330500,0,0,1,'','湖州市',330000,'','',1368120199),(128,330600,0,0,1,'','绍兴市',330000,'','',1368120199),(129,330700,0,0,1,'','金华市',330000,'','',1368120200),(130,330800,0,0,1,'','衢州市',330000,'','',1368120200),(131,330900,0,0,1,'','舟山市',330000,'','',1368120200),(132,331000,0,0,1,'','台州市',330000,'','',1368120200),(133,331100,0,0,1,'','丽水市',330000,'','',1368120200),(134,340100,0,0,1,'','合肥市',340000,'','',1368120200),(135,340200,0,0,1,'','芜湖市',340000,'','',1368120200),(136,340300,0,0,1,'','蚌埠市',340000,'','',1368120200),(137,340400,0,0,1,'','淮南市',340000,'','',1368120200),(138,340500,0,0,1,'','马鞍山市',340000,'','',1368120200),(139,340600,0,0,1,'','淮北市',340000,'','',1368120200),(140,340700,0,0,1,'','铜陵市',340000,'','',1368120200),(141,340800,0,0,1,'','安庆市',340000,'','',1368120200),(142,341000,0,0,1,'','黄山市',340000,'','',1368120200),(143,341100,0,0,1,'','滁州市',340000,'','',1368120200),(144,341200,0,0,1,'','阜阳市',340000,'','',1368120200),(145,341300,0,0,1,'','宿州市',340000,'','',1368120200),(146,341400,0,0,1,'','巢湖',340000,'','',1368120200),(147,341500,0,0,1,'','六安市',340000,'','',1368120200),(148,341600,0,0,1,'','亳州市',340000,'','',1368120200),(149,341700,0,0,1,'','池州市',340000,'','',1368120200),(150,341800,0,0,1,'','宣城市',340000,'','',1368120200),(151,350100,0,0,1,'','福州市',350000,'','',1368120200),(152,350200,0,0,1,'','厦门市',350000,'','',1368120200),(153,350300,0,0,1,'','莆田市',350000,'','',1368120200),(154,350400,0,0,1,'','三明市',350000,'','',1368120200),(155,350500,0,0,1,'','泉州市',350000,'','',1368120200),(156,350600,0,0,1,'','漳州市',350000,'','',1368120200),(157,350700,0,0,1,'','南平市',350000,'','',1368120200),(158,350800,0,0,1,'','龙岩市',350000,'','',1368120200),(159,350900,0,0,1,'','宁德市',350000,'','',1368120200),(160,360100,0,0,1,'','南昌市',360000,'','',1368120200),(161,360200,0,0,1,'','景德镇市',360000,'','',1368120200),(162,360300,0,0,1,'','萍乡市',360000,'','',1368120200),(163,360400,0,0,1,'','九江市',360000,'','',1368120200),(164,360500,0,0,1,'','新余市',360000,'','',1368120200),(165,360600,0,0,1,'','鹰潭市',360000,'','',1368120200),(166,360700,0,0,1,'','赣州市',360000,'','',1368120200),(167,360800,0,0,1,'','吉安市',360000,'','',1368120200),(168,360900,0,0,1,'','宜春市',360000,'','',1368120200),(169,361000,0,0,1,'','抚州市',360000,'','',1368120200),(170,361100,0,0,1,'','上饶市',360000,'','',1368120200),(171,370100,0,0,1,'','济南市',370000,'','',1368120200),(172,370200,0,0,1,'','青岛市',370000,'','',1368120200),(173,370300,0,0,1,'','淄博市',370000,'','',1368120200),(174,370400,0,0,1,'','枣庄市',370000,'','',1368120200),(175,370500,0,0,1,'','东营市',370000,'','',1368120200),(176,370600,0,0,1,'','烟台市',370000,'','',1368120200),(177,370700,0,0,1,'','潍坊市',370000,'','',1368120200),(178,370800,0,0,1,'','济宁市',370000,'','',1368120200),(179,370900,0,0,1,'','泰安市',370000,'','',1368120200),(180,371000,0,0,1,'','威海市',370000,'','',1368120200),(181,371100,0,0,1,'','日照市',370000,'','',1368120200),(182,371200,0,0,1,'','莱芜市',370000,'','',1368120200),(183,371300,0,0,1,'','临沂市',370000,'','',1368120200),(184,371400,0,0,1,'','德州市',370000,'','',1368120200),(185,371500,0,0,1,'','聊城市',370000,'','',1368120200),(186,371600,0,0,1,'','滨州市',370000,'','',1368120200),(187,371700,0,0,1,'','菏泽市',370000,'','',1368120200),(188,411600,0,0,1,'','周口市',410000,'','',1368120200),(189,411700,0,0,1,'','驻马店市',410000,'','',1368120200),(190,419000,0,0,1,'','济源市',410000,'','',1368120200),(191,410100,0,0,1,'','郑州市',410000,'','',1368120200),(192,410200,0,0,1,'','开封市',410000,'','',1368120200),(193,410300,0,0,1,'','洛阳市',410000,'','',1368120200),(194,410400,0,0,1,'','平顶山市',410000,'','',1368120200),(195,410500,0,0,1,'','安阳市',410000,'','',1368120200),(196,410600,0,0,1,'','鹤壁市',410000,'','',1368120200),(197,410700,0,0,1,'','新乡市',410000,'','',1368120200),(198,410800,0,0,1,'','焦作市',410000,'','',1368120200),(199,410900,0,0,1,'','濮阳市',410000,'','',1368120200),(200,411000,0,0,1,'','许昌市',410000,'','',1368120200),(201,411100,0,0,1,'','漯河市',410000,'','',1368120200),(202,411200,0,0,1,'','三门峡市',410000,'','',1368120200),(203,411300,0,0,1,'','南阳市',410000,'','',1368120200),(204,411400,0,0,1,'','商丘市',410000,'','',1368120200),(205,411500,0,0,1,'','信阳市',410000,'','',1368120200),(206,420100,0,0,1,'','武汉市',420000,'','',1368120200),(207,420200,0,0,1,'','黄石市',420000,'','',1368120200),(208,420300,0,0,1,'','十堰市',420000,'','',1368120200),(209,420500,0,0,1,'','宜昌市',420000,'','',1368120200),(210,420600,0,0,1,'','襄阳',420000,'','',1368120200),(211,420700,0,0,1,'','鄂州市',420000,'','',1368120200),(212,420800,0,0,1,'','荆门市',420000,'','',1368120200),(213,420900,0,0,1,'','孝感市',420000,'','',1368120200),(214,421000,0,0,1,'','荆州市',420000,'','',1368120200),(215,421100,0,0,1,'','黄冈市',420000,'','',1368120200),(216,421200,0,0,1,'','咸宁市',420000,'','',1368120200),(217,421300,0,0,1,'','随州市',420000,'','',1368120200),(218,422800,0,0,1,'','恩施州',420000,'','',1368120200),(219,423100,0,0,1,'','仙桃市',420000,'','',1368120200),(220,423200,0,0,1,'','潜江市',420000,'','',1368120200),(221,423300,0,0,1,'','天门市',420000,'','',1368120200),(222,423400,0,0,1,'','神农架林区',420000,'','',1368120200),(223,430100,0,0,1,'','长沙市',430000,'','',1368120200),(224,430200,0,0,1,'','株洲市',430000,'','',1368120200),(225,430300,0,0,1,'','湘潭市',430000,'','',1368120200),(226,430400,0,0,1,'','衡阳市',430000,'','',1368120200),(227,430500,0,0,1,'','邵阳市',430000,'','',1368120200),(228,430600,0,0,1,'','岳阳市',430000,'','',1368120200),(229,430700,0,0,1,'','常德市',430000,'','',1368120200),(230,430800,0,0,1,'','张家界市',430000,'','',1368120200),(231,430900,0,0,1,'','益阳市',430000,'','',1368120200),(232,431000,0,0,1,'','郴州市',430000,'','',1368120200),(233,431100,0,0,1,'','永州市',430000,'','',1368120200),(234,431200,0,0,1,'','怀化市',430000,'','',1368120200),(235,431300,0,0,1,'','娄底市',430000,'','',1368120200),(236,433100,0,0,1,'','湘西州',430000,'','',1368120200),(237,440100,0,0,1,'','广州市',440000,'','',1368120200),(238,440200,0,0,1,'','韶关市',440000,'','',1368120200),(239,440300,0,0,1,'','深圳市',440000,'','',1368120200),(240,440400,0,0,1,'','珠海市',440000,'','',1368120200),(241,440500,0,0,1,'','汕头市',440000,'','',1368120200),(242,440600,0,0,1,'','佛山市',440000,'','',1368120200),(243,440700,0,0,1,'','江门市',440000,'','',1368120200),(244,440800,0,0,1,'','湛江市',440000,'','',1368120200),(245,440900,0,0,1,'','茂名市',440000,'','',1368120200),(246,441200,0,0,1,'','肇庆市',440000,'','',1368120200),(247,441300,0,0,1,'','惠州市',440000,'','',1368120200),(248,441400,0,0,1,'','梅州市',440000,'','',1368120200),(249,441500,0,0,1,'','汕尾市',440000,'','',1368120200),(250,441600,0,0,1,'','河源市',440000,'','',1368120200),(251,441700,0,0,1,'','阳江市',440000,'','',1368120200),(252,441800,0,0,1,'','清远市',440000,'','',1368120200),(253,441900,0,0,1,'','东莞市',440000,'','',1368120200),(254,442000,0,0,1,'','中山市',440000,'','',1368120200),(255,445100,0,0,1,'','潮州市',440000,'','',1368120200),(256,445200,0,0,1,'','揭阳市',440000,'','',1368120200),(257,445300,0,0,1,'','云浮市',440000,'','',1368120200),(258,450100,0,0,1,'','南宁市',450000,'','',1368120201),(259,450200,0,0,1,'','柳州市',450000,'','',1368120201),(260,450300,0,0,1,'','桂林市',450000,'','',1368120201),(261,450400,0,0,1,'','梧州市',450000,'','',1368120201),(262,450500,0,0,1,'','北海市',450000,'','',1368120201),(263,450600,0,0,1,'','防城港市',450000,'','',1368120201),(264,450700,0,0,1,'','钦州市',450000,'','',1368120201),(265,450800,0,0,1,'','贵港市',450000,'','',1368120201),(266,450900,0,0,1,'','玉林市',450000,'','',1368120201),(267,451000,0,0,1,'','百色市',450000,'','',1368120201),(268,451100,0,0,1,'','贺州市',450000,'','',1368120201),(269,451200,0,0,1,'','河池市',450000,'','',1368120201),(270,451300,0,0,1,'','来宾市',450000,'','',1368120201),(271,451400,0,0,1,'','崇左市',450000,'','',1368120201),(272,462800,0,0,1,'','南沙群岛',460000,'','',1368120201),(273,462900,0,0,1,'','中沙群岛的岛礁及其海域',460000,'','',1368120201),(274,460100,0,0,1,'','海口市',460000,'','',1368120201),(275,460200,0,0,1,'','三亚市',460000,'','',1368120201),(276,461100,0,0,1,'','五指山',460000,'','',1368120201),(277,461200,0,0,1,'','琼海',460000,'','',1368120201),(278,461300,0,0,1,'','儋州',460000,'','',1368120201),(279,461400,0,0,1,'','文昌市',460000,'','',1368120201),(280,461500,0,0,1,'','万宁市',460000,'','',1368120201),(281,461600,0,0,1,'','东方市',460000,'','',1368120201),(282,461700,0,0,1,'','定安',460000,'','',1368120201),(283,461800,0,0,1,'','屯昌',460000,'','',1368120201),(284,461900,0,0,1,'','澄迈',460000,'','',1368120201),(285,462000,0,0,1,'','临高',460000,'','',1368120201),(286,462100,0,0,1,'','白沙',460000,'','',1368120201),(287,462200,0,0,1,'','昌江',460000,'','',1368120201),(288,462300,0,0,1,'','乐东',460000,'','',1368120201),(289,462400,0,0,1,'','陵水',460000,'','',1368120201),(290,462500,0,0,1,'','保亭',460000,'','',1368120201),(291,462600,0,0,1,'','琼中',460000,'','',1368120201),(292,462700,0,0,1,'','西沙群岛',460000,'','',1368120201),(293,500100,0,0,1,'','重庆市',500000,'','',1368120201),(294,510100,0,0,1,'','成都市',510000,'','',1368120201),(295,510300,0,0,1,'','自贡市',510000,'','',1368120201),(296,510400,0,0,1,'','攀枝花市',510000,'','',1368120201),(297,510500,0,0,1,'','泸州市',510000,'','',1368120201),(298,510600,0,0,1,'','德阳市',510000,'','',1368120201),(299,510700,0,0,1,'','绵阳市',510000,'','',1368120201),(300,510800,0,0,1,'','广元市',510000,'','',1368120201),(301,510900,0,0,1,'','遂宁市',510000,'','',1368120201),(302,511000,0,0,1,'','内江市',510000,'','',1368120201),(303,511100,0,0,1,'','乐山市',510000,'','',1368120201),(304,511300,0,0,1,'','南充市',510000,'','',1368120201),(305,511400,0,0,1,'','眉山市',510000,'','',1368120201),(306,511500,0,0,1,'','宜宾市',510000,'','',1368120201),(307,511600,0,0,1,'','广安市',510000,'','',1368120201),(308,511700,0,0,1,'','达州市',510000,'','',1368120201),(309,511800,0,0,1,'','雅安市',510000,'','',1368120201),(310,511900,0,0,1,'','巴中市',510000,'','',1368120201),(311,512000,0,0,1,'','资阳市',510000,'','',1368120201),(312,513200,0,0,1,'','阿坝州',510000,'','',1368120201),(313,513300,0,0,1,'','甘孜州',510000,'','',1368120201),(314,513400,0,0,1,'','凉山州',510000,'','',1368120201),(315,520100,0,0,1,'','贵阳市',520000,'','',1368120201),(316,520200,0,0,1,'','六盘水市',520000,'','',1368120201),(317,520300,0,0,1,'','遵义市',520000,'','',1368120201),(318,520400,0,0,1,'','安顺市',520000,'','',1368120201),(319,522200,0,0,1,'','铜仁市',520000,'','',1368120201),(320,522300,0,0,1,'','黔西南州',520000,'','',1368120201),(321,522400,0,0,1,'','毕节市',520000,'','',1368120201),(322,522600,0,0,1,'','黔东南州',520000,'','',1368120201),(323,522700,0,0,1,'','黔南州',520000,'','',1368120201),(324,530100,0,0,1,'','昆明市',530000,'','',1368120201),(325,530300,0,0,1,'','曲靖市',530000,'','',1368120201),(326,530400,0,0,1,'','玉溪市',530000,'','',1368120201),(327,530500,0,0,1,'','保山市',530000,'','',1368120201),(328,530600,0,0,1,'','昭通市',530000,'','',1368120201),(329,530700,0,0,1,'','丽江市',530000,'','',1368120201),(330,530800,0,0,1,'','普洱市',530000,'','',1368120201),(331,530900,0,0,1,'','临沧市',530000,'','',1368120201),(332,532300,0,0,1,'','楚雄州',530000,'','',1368120201),(333,532500,0,0,1,'','红河州',530000,'','',1368120201),(334,532600,0,0,1,'','文山州',530000,'','',1368120201),(335,532800,0,0,1,'','西双版纳州',530000,'','',1368120201),(336,532900,0,0,1,'','大理州',530000,'','',1368120201),(337,533100,0,0,1,'','德宏州',530000,'','',1368120201),(338,533300,0,0,1,'','怒江州',530000,'','',1368120201),(339,533400,0,0,1,'','迪庆州',530000,'','',1368120201),(340,540100,0,0,1,'','拉萨市',540000,'','',1368120201),(341,542100,0,0,1,'','昌都地区',540000,'','',1368120201),(342,542200,0,0,1,'','山南地区',540000,'','',1368120201),(343,542300,0,0,1,'','日喀则地区',540000,'','',1368120201),(344,542400,0,0,1,'','那曲地区',540000,'','',1368120201),(345,542500,0,0,1,'','阿里地区',540000,'','',1368120201),(346,542600,0,0,1,'','林芝地区',540000,'','',1368120201),(347,610100,0,0,1,'','西安市',610000,'','',1368120201),(348,610200,0,0,1,'','铜川市',610000,'','',1368120201),(349,610300,0,0,1,'','宝鸡市',610000,'','',1368120201),(350,610400,0,0,1,'','咸阳市',610000,'','',1368120201),(351,610500,0,0,1,'','渭南市',610000,'','',1368120201),(352,610600,0,0,1,'','延安市',610000,'','',1368120201),(353,610700,0,0,1,'','汉中市',610000,'','',1368120201),(354,610800,0,0,1,'','榆林市',610000,'','',1368120201),(355,610900,0,0,1,'','安康市',610000,'','',1368120201),(356,611000,0,0,1,'','商洛市',610000,'','',1368120201),(357,620100,0,0,1,'','兰州市',620000,'','',1368120201),(358,620200,0,0,1,'','嘉峪关市',620000,'','',1368120201),(359,620300,0,0,1,'','金昌市',620000,'','',1368120201),(360,620400,0,0,1,'','白银市',620000,'','',1368120201),(361,620500,0,0,1,'','天水市',620000,'','',1368120201),(362,620600,0,0,1,'','武威市',620000,'','',1368120201),(363,620700,0,0,1,'','张掖市',620000,'','',1368120201),(364,620800,0,0,1,'','平凉市',620000,'','',1368120201),(365,620900,0,0,1,'','酒泉市',620000,'','',1368120201),(366,621000,0,0,1,'','庆阳市',620000,'','',1368120201),(367,621100,0,0,1,'','定西市',620000,'','',1368120201),(368,621200,0,0,1,'','陇南市',620000,'','',1368120201),(369,622900,0,0,1,'','临夏州',620000,'','',1368120201),(370,623000,0,0,1,'','甘南州',620000,'','',1368120201),(371,630100,0,0,1,'','西宁市',630000,'','',1368120201),(372,632100,0,0,1,'','海东地区',630000,'','',1368120201),(373,632200,0,0,1,'','海北州',630000,'','',1368120201),(374,632300,0,0,1,'','黄南州',630000,'','',1368120201),(375,632500,0,0,1,'','海南州',630000,'','',1368120201),(376,632600,0,0,1,'','果洛州',630000,'','',1368120201),(377,632700,0,0,1,'','玉树州',630000,'','',1368120201),(378,632800,0,0,1,'','海西州',630000,'','',1368120201),(379,640100,0,0,1,'','银川市',640000,'','',1368120202),(380,640200,0,0,1,'','石嘴山市',640000,'','',1368120202),(381,640300,0,0,1,'','吴忠市',640000,'','',1368120202),(382,640400,0,0,1,'','固原市',640000,'','',1368120202),(383,640500,0,0,1,'','中卫市',640000,'','',1368120202),(384,650100,0,0,1,'','乌鲁木齐市',650000,'','',1368120202),(385,650200,0,0,1,'','克拉玛依市',650000,'','',1368120202),(386,650300,0,0,1,'','米泉',650000,'','',1368120202),(387,652100,0,0,1,'','吐鲁番地区',650000,'','',1368120202),(388,652200,0,0,1,'','哈密地区',650000,'','',1368120202),(389,652300,0,0,1,'','昌吉州',650000,'','',1368120202),(390,652700,0,0,1,'','博尔塔拉州',650000,'','',1368120202),(391,652800,0,0,1,'','巴音郭楞州',650000,'','',1368120202),(392,652900,0,0,1,'','阿克苏地区',650000,'','',1368120202),(393,653000,0,0,1,'','克孜勒苏州',650000,'','',1368120202),(394,653100,0,0,1,'','喀什地区',650000,'','',1368120202),(395,653200,0,0,1,'','和田地区',650000,'','',1368120202),(396,654000,0,0,1,'','伊犁州',650000,'','',1368120202),(397,654200,0,0,1,'','塔城地区',650000,'','',1368120202),(398,654300,0,0,1,'','阿勒泰地区',650000,'','',1368120202),(399,655100,0,0,1,'','石河子市',650000,'','',1368120202),(400,655200,0,0,1,'','阿拉尔市',650000,'','',1368120202),(401,655300,0,0,1,'','图木舒克市',650000,'','',1368120202),(402,655400,0,0,1,'','五家渠市',650000,'','',1368120202),(403,710100,0,0,1,'','台湾省',710000,'','',1368120202),(404,810100,0,0,1,'','香港特区',810000,'','',1368120202),(405,820100,0,0,1,'','澳门特区',820000,'','',1368120202),(406,530901,0,0,1,'','临沧地区',530000,'','',0),(407,423401,0,0,1,'','襄樊市',420000,'','',0),(408,423402,0,0,1,'','钟祥市',420000,'','',1368120200),(409,321301,0,0,1,'','张家港',320000,'','',1368120199),(410,371701,0,0,1,'','莱阳市',370000,'','',1368120200),(411,152901,0,0,1,'','霍林郭勒市',150000,'','',1368120199),(412,222401,0,0,1,'','延吉市',220000,'','',1368120199),(413,632801,0,0,1,'','格尔木市',630000,'','',1368120201),(414,131101,0,0,1,'','任丘市',130000,'','',1368120199),(415,655401,0,0,1,'','奎屯市',650000,'','',1368120202),(416,655402,0,0,1,'','伊宁市',650000,'','',1368120202),(417,655403,0,0,1,'','博乐市',650000,'','',1368120202),(418,655404,0,0,1,'','库尔勒市',650000,'','',1368120202),(419,522701,0,0,1,'','清镇市',520000,'','',1368120201),(420,632802,0,0,1,'','德令哈市',630000,'','',1368120201),(421,530902,0,0,1,'','景洪市',530000,'','',1368120201),(422,530903,0,0,1,'','开远市',530000,'','',1368120201),(423,433101,0,0,1,'','耒阳市',430000,'','',1368120200),(424,433102,0,0,1,'','吉首市',430000,'','',1368120200),(425,350901,0,0,1,'','永安市',350000,'','',1368120200),(426,350902,0,0,1,'','晋江市',350000,'','',1368120200),(427,433102,0,0,1,'','常德市',430000,'','',1368120200),(428,522701,0,0,1,'','都匀',520000,'','',1368120201),(429,522702,0,0,1,'','凯里市',520000,'','',1368120201);

/*Table structure for table `boc_coltypes` */

DROP TABLE IF EXISTS `boc_coltypes`;

CREATE TABLE `boc_coltypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '标识',
  `sort_id` int(11) NOT NULL COMMENT '排序id',
  `fid` int(11) NOT NULL COMMENT '父类型',
  `depth` int(3) NOT NULL COMMENT '深度',
  `cid` int(4) NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `name` varchar(30) NOT NULL DEFAULT 'ctype' COMMENT '表单名称，分类标志，单个栏目多个类型时',
  `title` varchar(30) NOT NULL COMMENT '标题类型',
  `identify` varchar(30) NOT NULL COMMENT '标记',
  `photo` varchar(30) NOT NULL COMMENT '图片',
  `thumb` varchar(200) NOT NULL COMMENT '缩略图',
  `show` int(1) NOT NULL DEFAULT '1' COMMENT '显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `boc_coltypes` */

insert  into `boc_coltypes`(`id`,`sort_id`,`fid`,`depth`,`cid`,`name`,`title`,`identify`,`photo`,`thumb`,`show`) values (1,5,0,0,8,'ctype','新闻分类一','','','',1),(2,2,0,0,8,'ctype','新闻分类二','','','',1),(3,3,0,0,9,'ctype','产品分类1','','','',1),(4,4,0,0,9,'ctype','产品分类2','','','',1),(5,1,0,0,8,'ctype','新闻分类三','','','',1);

/*Table structure for table `boc_columns` */

DROP TABLE IF EXISTS `boc_columns`;

CREATE TABLE `boc_columns` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '标识',
  `sort_id` int(4) DEFAULT NULL COMMENT '排序',
  `parent_id` int(4) NOT NULL DEFAULT '0' COMMENT '父标识(col id)',
  `depth` int(4) NOT NULL DEFAULT '1' COMMENT '深度',
  `identify` tinytext NOT NULL COMMENT 'url唯一标记(word or link)',
  `path` tinytext NOT NULL COMMENT 'urlpath',
  `title` tinytext NOT NULL COMMENT '标题',
  `title_seo` tinytext COMMENT '优化标题',
  `tags` tinytext COMMENT '标签',
  `intro` text COMMENT '简介',
  `mid` int(2) NOT NULL COMMENT '模型标识(Model id)',
  `temp_index` varchar(50) DEFAULT NULL COMMENT '前台模板栏目index',
  `temp_show` varchar(50) DEFAULT NULL COMMENT '内容展示模板show',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0删除 1正常',
  `show` int(1) NOT NULL DEFAULT '1' COMMENT '0隐藏 1正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='栏目';

/*Data for the table `boc_columns` */

insert  into `boc_columns`(`id`,`sort_id`,`parent_id`,`depth`,`identify`,`path`,`title`,`title_seo`,`tags`,`intro`,`mid`,`temp_index`,`temp_show`,`status`,`show`) values (1,1,0,0,'videos','/videos','视频','','','',11,'','',1,1),(2,2,0,0,'infos','/infos','信息','','','',12,'','',1,1),(3,3,0,0,'banners','/banners','导航','','','',13,'','',1,1),(4,4,0,0,'honor','/honor','荣誉','','','',14,'','',1,1),(5,5,0,0,'download','/download','下载','','','',15,'','',1,1),(6,6,0,0,'dealer','/dealer','门店','','','',16,'','',1,1),(7,7,0,0,'single','/single','单页','','','',8,'','',1,1),(8,8,0,0,'news','/news','新闻','新闻中心','新闻，资讯，公告','',3,'','',1,1),(9,9,0,0,'product','/product','产品','','','',9,'','',1,1),(10,10,0,0,'recruit','/recruit','招聘','','','',10,'','',1,1),(11,11,0,0,'gallery','/gallery','期刊','','','',7,'','',1,1),(12,12,0,0,'links','/links','链接','','','',1,'','',1,1),(13,13,0,0,'irregular','/irregular','综合','','','',17,'','',1,1);

/*Table structure for table `boc_configs` */

DROP TABLE IF EXISTS `boc_configs`;

CREATE TABLE `boc_configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL COMMENT '分类',
  `key` varchar(30) NOT NULL COMMENT '键值',
  `value` text NOT NULL COMMENT '值',
  `label` varchar(100) NOT NULL COMMENT '标题',
  `intor` tinytext COMMENT '简介',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='配置';

/*Data for the table `boc_configs` */

insert  into `boc_configs`(`id`,`sort_id`,`category`,`key`,`value`,`label`,`intor`) values (1,1,'adminer','title_suffix','杭州博采网络科技股份有限公司','标题后缀','后端标题栏显示内容的后缀.'),(2,9,'site','copyright','© 2017','CopyRight',''),(3,8,'site','email','','联系邮箱',''),(4,4,'site','title_suffix','公司名称','公司名称|品牌名称','前台站点标题的后缀优化'),(5,5,'site','title_seo','首页标题','首页标题[Title]','网站优化标题'),(6,6,'site','tags','关键字','关键词[Keywords]','网站关键词设定，使用`,`来间隔标签.'),(7,7,'site','intro','描述','站点描述[Description]','网站描述'),(8,10,'site','icp','ICP','ICP编号',''),(9,9,'adminer_x','rember_hours','72','记住登录','记住登录的时间，默认单位为小时。'),(15,10,'adminer','nopurview','login,welcome,manager,ajax','权限过滤',''),(10,11,'adminer_x','forbidden_hours','2','登录禁用','账户登录错误超过6次时的禁用时间[小时]。'),(11,12,'email','stmp','smtp.126.com','STMP服务器',''),(12,13,'email','account','hzbocweb@126.com','帐号','发送帐号'),(13,14,'email','pwd','bocweb123456','密码',''),(14,15,'email','port','25','端口','STMP端口[25]'),(22,12,'email','name','电邮名称','电邮名称','邮件地址显示的名称'),(16,3,'site','title','前端标题 ss','网站标题','用于保存前台站点的默认首页标题'),(17,1,'upload_x','upload_size','120m','上传大小限制','默认上传权限大小'),(18,2,'upload','inline_file_types','gif|jpe?g|png|doc?|mp?|zip|pdf|mp4|flv','上传后缀过滤','文件类型的上传'),(19,3,'upload_x','memory_limit','120m','内存限制',''),(20,4,'upload_x','max_file_uploads','10','上传文件个数','个数限制'),(21,5,'upload','scale_width','0','上传图片默认宽度','主要为编辑器上传图片设定'),(23,7,'upload','watermark','0','图片水印','图片使用背景为透明的PNG格式'),(24,0,'html','html','0','开启静态','是否使用静态生成'),(25,0,'html','token','','验证密码','对生成页面操作进行验证,用于第三方触发'),(26,0,'html','urlmodel','0','路由模式','0:ID;1:标题,2:拼音'),(27,6,'upload','scale_height','0','上传图片高度','主要为编辑器上传图片压缩高度'),(28,11,'site_tj','tongji','CNZZ','统计代码（CNZZ,百度）',NULL),(29,12,'site','qq','0','在线客服',NULL),(30,13,'site','ad','0','漂浮广告',NULL),(31,14,'site_x','mqq','4','在线客服模版',NULL);

/*Table structure for table `boc_dealer` */

DROP TABLE IF EXISTS `boc_dealer`;

CREATE TABLE `boc_dealer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `ccid` int(11) DEFAULT '0',
  `type_id` int(11) DEFAULT NULL,
  `sort_id` int(11) NOT NULL DEFAULT '0',
  `audit` int(1) NOT NULL DEFAULT '0',
  `flag` int(1) NOT NULL DEFAULT '0',
  `show` int(1) NOT NULL DEFAULT '1',
  `status` int(1) NOT NULL DEFAULT '0',
  `title_seo` tinytext,
  `intro` varchar(250) DEFAULT NULL,
  `tags` tinytext,
  `content` mediumtext,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `provinceid` int(12) DEFAULT NULL,
  `cityid` int(250) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `address` tinytext,
  `lal` varchar(250) DEFAULT NULL,
  `timeline` int(11) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `thumb` varchar(250) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `telphone` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='门店';

/*Data for the table `boc_dealer` */

insert  into `boc_dealer`(`id`,`cid`,`ccid`,`type_id`,`sort_id`,`audit`,`flag`,`show`,`status`,`title_seo`,`intro`,`tags`,`content`,`username`,`password`,`provinceid`,`cityid`,`title`,`address`,`lal`,`timeline`,`photo`,`thumb`,`mobile`,`telphone`) values (1,6,0,NULL,1,1,0,1,0,'','','',NULL,'测试信息',NULL,330000,330100,'测试信息','测试信息','120.136922,30.277973',1450616562,NULL,NULL,'测试信息','测试信息');

/*Table structure for table `boc_download` */

DROP TABLE IF EXISTS `boc_download`;

CREATE TABLE `boc_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一编号',
  `cid` int(11) NOT NULL COMMENT '所属栏目',
  `ccid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `sort_id` int(11) DEFAULT '0' COMMENT '排序编号',
  `audit` int(1) NOT NULL DEFAULT '0' COMMENT '0:1审核',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐',
  `ctype` int(4) NOT NULL DEFAULT '0' COMMENT '默认分类',
  `type_id` int(4) DEFAULT NULL COMMENT '类型',
  `title` tinytext NOT NULL COMMENT '标题',
  `link` tinytext NOT NULL COMMENT '外链',
  `title_seo` tinytext,
  `intro` varchar(500) DEFAULT NULL COMMENT '简介(200汉字)',
  `tags` tinytext COMMENT '标签',
  `content` text COMMENT '内容',
  `timeline` int(11) DEFAULT NULL COMMENT '发布/修改时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0:1状态,1 发布，0 草稿',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `photo` varchar(200) DEFAULT NULL COMMENT '图片',
  `thumb` varchar(200) DEFAULT NULL COMMENT '图片缩略图',
  `files` tinytext COMMENT '附件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='资料下载';

/*Data for the table `boc_download` */

insert  into `boc_download`(`id`,`cid`,`ccid`,`sort_id`,`audit`,`flag`,`ctype`,`type_id`,`title`,`link`,`title_seo`,`intro`,`tags`,`content`,`timeline`,`status`,`click`,`photo`,`thumb`,`files`) values (1,5,0,2,1,0,0,NULL,'测试','','','  ','',NULL,1450615352,0,0,'','','7'),(2,5,0,1,1,0,0,NULL,'测试','','','  ','',NULL,1450615368,0,0,'','','7');

/*Table structure for table `boc_feedback` */

DROP TABLE IF EXISTS `boc_feedback`;

CREATE TABLE `boc_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_id` int(11) DEFAULT NULL COMMENT '排序编号',
  `audit` int(1) NOT NULL DEFAULT '0' COMMENT '0:1审核',
  `type_id` int(11) DEFAULT NULL COMMENT '分类',
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `content` text COMMENT '详细内容',
  `answer` text COMMENT '回答问题',
  `username` varchar(50) DEFAULT NULL COMMENT '用户名',
  `telphone` varchar(50) DEFAULT NULL COMMENT '电话',
  `fax` varchar(50) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL COMMENT '传真',
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `address` varchar(100) DEFAULT NULL COMMENT '地址',
  `solve` int(1) DEFAULT '0' COMMENT '解决',
  `show` int(1) DEFAULT NULL COMMENT '是否显示',
  `timeline` int(11) DEFAULT NULL COMMENT '发布时间',
  `timeline_answer` int(11) DEFAULT NULL COMMENT '回复时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='反馈';

/*Data for the table `boc_feedback` */

/*Table structure for table `boc_gallery` */

DROP TABLE IF EXISTS `boc_gallery`;

CREATE TABLE `boc_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '标识',
  `cid` int(4) NOT NULL COMMENT '栏目标识',
  `ccid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `sort_id` int(11) NOT NULL COMMENT '排序',
  `audit` int(1) NOT NULL DEFAULT '0' COMMENT '0:1审核',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐',
  `ctype` int(4) NOT NULL DEFAULT '0' COMMENT '默认分类',
  `title` tinytext COMMENT '标题',
  `title_seo` tinytext COMMENT '优化标题',
  `tags` tinytext COMMENT '标签',
  `intro` varbinary(500) DEFAULT NULL COMMENT '简介',
  `photo` text COMMENT '图片列表',
  `thumb` text COMMENT '对应压缩图',
  `timeline` int(11) NOT NULL COMMENT '时间线',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='画廊';

/*Data for the table `boc_gallery` */

/*Table structure for table `boc_honor` */

DROP TABLE IF EXISTS `boc_honor`;

CREATE TABLE `boc_honor` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一编号',
  `cid` int(11) NOT NULL COMMENT '所属栏目',
  `ccid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `sort_id` int(11) DEFAULT '0' COMMENT '排序编号',
  `audit` int(1) NOT NULL DEFAULT '0' COMMENT '0:1审核',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐',
  `ctype` int(4) NOT NULL DEFAULT '0' COMMENT '默认分类',
  `type_id` int(4) DEFAULT NULL COMMENT '类型',
  `title` tinytext NOT NULL COMMENT '标题',
  `link` text COMMENT '外链',
  `title_seo` tinytext,
  `intro` varchar(500) DEFAULT NULL COMMENT '简介(200汉字)',
  `tags` tinytext COMMENT '标签',
  `content` text COMMENT '内容',
  `timeline` int(11) DEFAULT NULL COMMENT '发布/修改时间',
  `expiretime` int(10) DEFAULT NULL COMMENT '公告过期时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0:1状态,1 发布，0 草稿',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `photo` varchar(200) DEFAULT NULL COMMENT '图片',
  `thumb` varchar(200) DEFAULT NULL COMMENT '图片缩略图',
  `attachment` tinytext COMMENT '附件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='荣誉';

/*Data for the table `boc_honor` */

insert  into `boc_honor`(`id`,`cid`,`ccid`,`sort_id`,`audit`,`flag`,`ctype`,`type_id`,`title`,`link`,`title_seo`,`intro`,`tags`,`content`,`timeline`,`expiretime`,`status`,`click`,`photo`,`thumb`,`attachment`) values (2,4,0,1,1,0,0,NULL,'1','1','','  ','',NULL,1450615346,NULL,0,0,'','',NULL);

/*Table structure for table `boc_infos` */

DROP TABLE IF EXISTS `boc_infos`;

CREATE TABLE `boc_infos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一编号',
  `cid` int(11) NOT NULL COMMENT '所属栏目',
  `ccid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `sort_id` int(11) DEFAULT '0' COMMENT '排序编号',
  `audit` int(1) NOT NULL DEFAULT '0' COMMENT '0:1审核',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐',
  `ctype` int(4) NOT NULL DEFAULT '0' COMMENT '默认分类',
  `type_id` int(4) DEFAULT NULL COMMENT '类型',
  `title` tinytext NOT NULL COMMENT '标题',
  `title_seo` tinytext,
  `intro` varchar(500) DEFAULT NULL COMMENT '简介(200汉字)',
  `tags` tinytext COMMENT '标签',
  `content` text COMMENT '内容',
  `timeline` int(11) DEFAULT NULL COMMENT '发布/修改时间',
  `expiretime` int(10) DEFAULT NULL COMMENT '公告过期时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0:1状态,1 发布，0 草稿',
  `author` varchar(50) DEFAULT NULL COMMENT '消息作者',
  `source` varchar(50) DEFAULT NULL COMMENT '消息来源',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `photo` varchar(200) DEFAULT NULL COMMENT '相关图片',
  `thumb` varchar(200) DEFAULT NULL COMMENT '图片缩略图',
  `files` tinytext COMMENT '附件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='信息表';

/*Data for the table `boc_infos` */

insert  into `boc_infos`(`id`,`cid`,`ccid`,`sort_id`,`audit`,`flag`,`ctype`,`type_id`,`title`,`title_seo`,`intro`,`tags`,`content`,`timeline`,`expiretime`,`status`,`author`,`source`,`click`,`photo`,`thumb`,`files`) values (11,2,0,5,0,0,0,NULL,'测试信息','','  ','','<p>测试信息</p>',1492154774,NULL,0,NULL,NULL,0,'','',NULL),(12,2,0,6,0,0,0,NULL,'测试信息','','  ','','<p>测试信息</p>',1492154782,NULL,0,NULL,NULL,0,'','',NULL),(13,2,0,7,0,0,0,NULL,'测试信息','','  ','','<p>测试信息</p>',1492154976,NULL,0,NULL,NULL,0,'','',NULL),(7,2,0,1,0,0,0,NULL,'测试信息','','  ','','<p>测试信息</p>',1492152833,NULL,0,NULL,NULL,0,'','',NULL),(8,2,0,2,0,0,0,NULL,'测试测试','','  ','','<p>测试测试</p>',1492154239,NULL,0,NULL,NULL,0,'','',NULL),(9,2,0,3,0,0,0,NULL,'测试测试','','  ','','<p>测试测试</p>',1492154253,NULL,0,NULL,NULL,0,'','',NULL),(10,2,0,4,0,0,0,NULL,'测试信息','','  ','','<p>测试信息</p>',1492154759,NULL,0,NULL,NULL,0,'','',NULL);

/*Table structure for table `boc_irregular` */

DROP TABLE IF EXISTS `boc_irregular`;

CREATE TABLE `boc_irregular` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一编号',
  `cid` int(11) NOT NULL COMMENT '所属栏目',
  `ccid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `sort_id` int(11) DEFAULT '0' COMMENT '排序编号',
  `audit` int(1) NOT NULL DEFAULT '0' COMMENT '0:1审核',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐',
  `ctype` int(4) NOT NULL DEFAULT '0' COMMENT '默认分类',
  `type_id` int(4) DEFAULT NULL COMMENT '类型',
  `title` varchar(200) NOT NULL COMMENT '标题',
  `tagtitle` varchar(200) DEFAULT NULL,
  `entitle` varchar(200) DEFAULT NULL,
  `title_seo` tinytext,
  `intro` varchar(250) DEFAULT NULL COMMENT '简介(200汉字)',
  `tagintro` varchar(200) DEFAULT NULL,
  `tags` tinytext COMMENT '标签',
  `content` text COMMENT '内容',
  `timeline` int(11) DEFAULT NULL COMMENT '发布/修改时间',
  `expiretime` int(10) DEFAULT NULL COMMENT '公告过期时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0:1状态,1 发布，0 草稿',
  `author` varchar(50) DEFAULT NULL COMMENT '消息作者',
  `source` varchar(50) DEFAULT NULL COMMENT '消息来源',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `photo` varchar(200) DEFAULT NULL COMMENT '相关图片',
  `thumb` varchar(200) DEFAULT NULL COMMENT '图片缩略图',
  `files` tinytext COMMENT '附件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='针对不规则页面的模块表';

/*Data for the table `boc_irregular` */

/*Table structure for table `boc_links` */

DROP TABLE IF EXISTS `boc_links`;

CREATE TABLE `boc_links` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `cid` int(4) NOT NULL COMMENT '栏目 id',
  `ccid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `sort_id` int(11) DEFAULT NULL COMMENT '排序编号',
  `audit` int(1) NOT NULL DEFAULT '0' COMMENT '0:1审核',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐',
  `ctype` int(4) NOT NULL DEFAULT '0' COMMENT '默认分类',
  `title` tinytext NOT NULL COMMENT '标题',
  `content` text COMMENT '详细内容',
  `tip` tinytext COMMENT '鼠标悬停提示',
  `link` tinytext COMMENT 'URL地址',
  `photo` tinytext COMMENT '图片',
  `thumb` tinytext COMMENT '缩略图',
  `show` int(1) DEFAULT '1' COMMENT '是否显示',
  `timeline` int(11) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='友情链接';

/*Data for the table `boc_links` */

insert  into `boc_links`(`id`,`cid`,`ccid`,`sort_id`,`audit`,`flag`,`ctype`,`title`,`content`,`tip`,`link`,`photo`,`thumb`,`show`,`timeline`) values (1,12,0,1,1,0,0,'测试信息','',NULL,'http://www.baidu.com','>','',1,1487208169);

/*Table structure for table `boc_lists` */

DROP TABLE IF EXISTS `boc_lists`;

CREATE TABLE `boc_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '标识',
  `cid` int(4) NOT NULL COMMENT '栏目 id',
  `ccid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `sort_id` int(11) NOT NULL COMMENT '排序',
  `audit` int(1) NOT NULL DEFAULT '0' COMMENT '0:1审核',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐',
  `ctype` int(4) NOT NULL DEFAULT '0' COMMENT '默认分类',
  `title` tinytext COMMENT '小标题',
  `content` text COMMENT '内容',
  `timeline` int(11) NOT NULL COMMENT '时间线',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='小列表';

/*Data for the table `boc_lists` */

/*Table structure for table `boc_log` */

DROP TABLE IF EXISTS `boc_log`;

CREATE TABLE `boc_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(50) DEFAULT NULL,
  `url` mediumtext COMMENT '控制器',
  `category` varchar(50) DEFAULT '' COMMENT '级别: 1 view,2update,add,3,del',
  `message` tinytext COMMENT '备注',
  `mid` int(6) DEFAULT NULL COMMENT '操作人',
  `ip` varchar(20) DEFAULT NULL COMMENT 'IP地址',
  `timeline` int(11) DEFAULT NULL COMMENT '时间线',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=567 DEFAULT CHARSET=utf8 COMMENT='操作日志';

/*Data for the table `boc_log` */

insert  into `boc_log`(`id`,`controller`,`url`,`category`,`message`,`mid`,`ip`,`timeline`) values (526,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1492655082),(525,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1492598570),(524,'feedback','/bocweb/web/admin/index.php/feedback/delete?ids=2','delete','删除数据id:2',1,'0.0.0.0',1492597586),(523,'recruit_apply','/bocweb/web/admin/index.php/recruit_apply/delete?ids=6%2C2%2C1','delete','删除数据id:6,2,1',1,'0.0.0.0',1492597063),(522,'recruit_apply','/bocweb/web/admin/index.php/recruit_apply/delete?ids=5%2C4','delete','删除数据id:5,4',1,'0.0.0.0',1492596613),(521,'recruit_apply','/bocweb/web/admin/index.php/recruit_apply/delete?ids=3','delete','删除数据id:3',1,'0.0.0.0',1492596252),(520,'upload','/bocweb/web/index.php/upload/delete','delete','删除文件ID:24',NULL,'0.0.0.0',1492596178),(527,'login','/bocweb/web/admin/index.php/login','login','manager ID 1: 登录成功！',1,'0.0.0.0',1492655126),(528,'login','/bocweb/web/admin/index.php/login','login','manager ID 1: 登录成功！',1,'0.0.0.0',1492655138),(529,'modules','/bocweb/web/admin/index.php/modules/edit/17','update','更新数据id:17',1,'0.0.0.0',1492660118),(530,'pageirregular','/bocweb/web/admin/index.php/pageirregular/edit?c=13','update','更新数据id:1',1,'0.0.0.0',1492660460),(531,'pageirregular','/bocweb/web/admin/index.php/pageirregular/edit?c=13','update','更新数据id:1',1,'0.0.0.0',1492660568),(532,'pageirregular','/bocweb/web/admin/index.php/pageirregular/edit?c=13','update','更新数据id:1',1,'0.0.0.0',1492660595),(533,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493005023),(534,'login','/bocweb/web/admin/index.php/login?url=http://localhost:8080/bocweb/web/admin/index.php?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493006402),(535,'infos','/bocweb/web/admin/index.php/infos/audit?c=2','audit','审核数据ID：13为1',1,'0.0.0.0',1493006604),(536,'infos','/bocweb/web/admin/index.php/infos/audit?c=2','audit','审核数据ID：13为0',1,'0.0.0.0',1493006605),(537,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493081667),(538,'login','/bocweb/web/admin/index.php/login','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493081681),(539,'login','/bocweb/web/admin/index.php/login','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493081701),(540,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493091725),(541,'pageirregular','/bocweb/web/admin/index.php/pageirregular/edit?c=13','update','更新数据id:1',1,'0.0.0.0',1493091736),(542,'pageirregular','/bocweb/web/admin/index.php/pageirregular/edit?c=13','update','更新数据id:1',1,'0.0.0.0',1493091995),(543,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493168926),(544,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493171846),(545,'product','/bocweb/web/admin/index.php/product/edit/1?c=9','update','更新数据id:1',1,'0.0.0.0',1493191757),(546,'product','/bocweb/web/admin/index.php/product/edit/1?c=9','update','更新数据id:1',1,'0.0.0.0',1493191765),(547,'product','/bocweb/web/admin/index.php/product/edit/2?c=9','update','更新数据id:2',1,'0.0.0.0',1493191771),(548,'product','/bocweb/web/admin/index.php/product/create?c=9','create','添加数据id:3',1,'0.0.0.0',1493191778),(549,'product','/bocweb/web/admin/index.php/product/create?c=9','create','添加数据id:4',1,'0.0.0.0',1493191787),(550,'product','/bocweb/web/admin/index.php/product/audit?c=9','audit','审核数据ID：4,3,2,1为1',1,'0.0.0.0',1493191795),(551,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493275640),(552,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493694758),(553,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php/help?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493710147),(554,'login','/bocweb/web/admin/index.php/login','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493710180),(555,'login','/bocweb/web/admin/index.php/login','login','manager ID 1: 登录成功！',1,'192.168.0.145',1493712097),(556,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493780277),(557,'login','/bocweb/web/admin/index.php/login','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493780444),(558,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php/banners/index/3?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493793387),(559,'configs','/bocweb/web/admin/index.php/configs/set','edit','修改配置adminer.title_suffix:博采网络科技',1,'0.0.0.0',1493793411),(560,'configs','/bocweb/web/admin/index.php/configs/set','edit','修改配置adminer.title_suffix:杭州博采网络科技股份有限个公司',1,'0.0.0.0',1493793444),(561,'configs','/bocweb/web/admin/index.php/configs/set','edit','修改配置adminer.title_suffix:杭州博采网络科技股份有限公司',1,'0.0.0.0',1493793448),(562,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493800661),(563,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php/banners/index/3?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493861382),(564,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493881710),(565,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php?','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493956387),(566,'login','/bocweb/web/admin/index.php/login?url=http://localhost/bocweb/web/admin/index.php/article/create?c=8','login','manager ID 1: 登录成功！',1,'0.0.0.0',1493967377);

/*Table structure for table `boc_manager` */

DROP TABLE IF EXISTS `boc_manager`;

CREATE TABLE `boc_manager` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL COMMENT '用户名',
  `nickname` varchar(50) DEFAULT NULL COMMENT '显示名称',
  `pwd` varchar(64) NOT NULL COMMENT '密码',
  `gid` varchar(64) NOT NULL DEFAULT '2' COMMENT '用户组ID',
  `email` varchar(100) NOT NULL COMMENT 'email',
  `tel` varchar(30) DEFAULT NULL COMMENT '电话',
  `phone` varchar(30) DEFAULT NULL COMMENT '手机',
  `addr` varchar(100) DEFAULT NULL COMMENT '地址',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '用户状态，0 禁用',
  `login_today` int(11) DEFAULT NULL COMMENT '今日登录次数',
  `pwd_errors` int(1) NOT NULL DEFAULT '0' COMMENT '密码错误次数',
  `login_ip` varchar(25) DEFAULT NULL COMMENT '最后登录的IP',
  `reg_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `login_time` int(11) DEFAULT NULL COMMENT '最后一次登录时间',
  `ga` int(1) DEFAULT '0' COMMENT 'GA 两部验证密钥 开启与否',
  `getpass` int(11) DEFAULT NULL COMMENT '获取密码时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='后端管理帐号';

/*Data for the table `boc_manager` */

insert  into `boc_manager`(`id`,`uname`,`nickname`,`pwd`,`gid`,`email`,`tel`,`phone`,`addr`,`status`,`login_today`,`pwd_errors`,`login_ip`,`reg_time`,`login_time`,`ga`,`getpass`) values (1,'bocadmin','超级用户','11372a6e7343831f12352cfd049ff59c','1','customservice@bocweb.cn','','','',1,0,0,'0.0.0.0',1376471117,1493967377,1,1389317880),(2,'testadmin','testadmin','eb15fe3fe753fd02d6ba21208430df0c','3','','','','',1,NULL,0,'127.0.0.1',1487214605,1487922425,0,NULL);

/*Table structure for table `boc_manager_group` */

DROP TABLE IF EXISTS `boc_manager_group`;

CREATE TABLE `boc_manager_group` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `purview` text NOT NULL COMMENT '权限id序列',
  `title` varchar(50) NOT NULL COMMENT '用户组名称',
  `title_en` varchar(50) NOT NULL COMMENT '用户组名称en',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='权限组';

/*Data for the table `boc_manager_group` */

insert  into `boc_manager_group`(`id`,`purview`,`title`,`title_en`) values (2,'7afb566e83d3dca2d8a47c8cc29e7e36,ff2fa0336fe8fbc6a51c4707aa47c3e3,a155574e57e9a8a0d0c6ecb1c511da68,fddc215a132fa97ca3c193f1cae5cf9f,c54e594684ebf2862c75ba29d83f71be,2ebbbd65b4e2fc52a3ce44de2160e8d2,12fb6543af2e5541b0fc4f8fdd950be0,8d2159c1e0cf70473e66866eb026e80f,c166381208e23d3f4d65dec1231ccf76,a87d77b65f6d1e8380b3d05290a994d0,430f99bc176c67ec705091d6a5da07d4,d230f6a24270b02237beb82a23e2742f,54b064097df1ab924354f87efcdc4ea0,2338d4221db8f9c52bcc2d64ee436b23,70fc54e47310e38ef19160c17ecd91af,ad92c9d2ad1d512ea852e8ae88f762ff,d0101b9aa277c72e45d078dd8369fc65','用户','users'),(3,'c867ca63fa6504097128acd1ec81cc1a,8402f762da81b63635478f2d63f2fdb0,83b8b31e64c2f941330581de0015f701,5afe031774d80619f5274fa8468c75ed,dbc863e8a21931db8c1d01bc3db3243a,c1799ca1ca659969ec9a0c8dc3a0883b,690c2a41b4cad051baa6666408bc1bd4,10722981017d6155f9ae2fb1da613169,bf2578f224f9e3097c5e47592ca6f9eb,246ef4ba4849e248bc2b4aa8a25c77a5,b5203f7798cc1d9a3db648385cf92f6f,e365835bb5497e8ecf9ce3e18c81d98b,ff5661ddcf33bab40779b62dd0650519,86a69d1e6fd165d5e5d68a78d8ba620e,92c6849f707eeb59b63e8ae9d142ab5c,473697975e44f6fe35c50508a46eea70,89fde7c17a019a877557924256dbed9d,9b1481c45390195bbc93617657f26aa0,34dfc17876c55eb53e8851438b7eefea,229ceb68059d9d878fd635aa22afa6f7,0b044f0efa50f5d997e64dc511d3153d,15c1d3cc59e786989d3bb025b22bb059,e7d2a3d3c4112dc5845fb09e9ce70201,6917a6f69a3b783d8b2cc9a15f93e0c7,9bb626496f5cae83b00ffb481552432b,705f22cbd86ba40041442191cfabff47,9ad49ff8a09aa1e19238211ff2629aac,a56c0dea5c958f74a88b69840d6b3c3d,9e9c3a8d1b84258f622647dce7e268f9,084ab0d1170972947c92ae901f98b6ec,58b7e1346b741399a048d3a032a72002,2383aecac653eb271fca9de8637fc7f5,9041544f46b0f9e0c861c986e5eb563f,6f767735a4bb03e2dde41f2f81984b18,7882e0b46d58b78d70bee525b2404cb8,5cc8d8792c0074efa30bab193e894cd4,119fbe7447f2b8a4bb9708deed2c34fb,0c34b5dc5c2500e604d64e72b1ca8ed7,5b390301d76c5c95f5daa412234203b1,288a975e28e1fe0d9cb74c19e3b64e0f,72661d180ca59ca2cb509ec2082e3444,605adc5504fb08d17f408bf29231bda0,07e763bc0c7ba75e74499bf434897b93,149566ebf75c0fd85bf05d4d606bb7e5,31548dfbf3b9ca570224047bfe5ee488,033c9db19f4046ee16de3b46ca93d018,f6981606398d069ca744323a7ad0a930,4580445d40923410547b6d2b081afbea,a31ff67bb89565c3b51cfd2515d4c7be,461eafbe71ce986a610eb620bd45fa05,3001d259f201972106029780c96db4cf,416fb1a88f1705bb8a4557e412b60dc1,41f132358455d0f99b45487adc377fe8,06b456c04c97ec1590478e00075811fa,796ffd1e3cf12d51f680f45214dc4510,c17650e5017646ad8d61f6e2ed539634,3f1ae82ea3049ebd146fe83c74732b9a,f866443ba073a8e6c1389b7f0fc8d8bd,46abef163a89d173c91a6f541fe7da11,47403e5600a782bca793c7ed2e088cdc','测试管理员','guest'),(1,'a634cc19664a4f86577556784da60940,7afb566e83d3dca2d8a47c8cc29e7e36,ff2fa0336fe8fbc6a51c4707aa47c3e3,bfc0ef3829e8d84dfc8d31e5edc26d0f,a155574e57e9a8a0d0c6ecb1c511da68,fddc215a132fa97ca3c193f1cae5cf9f,52b7869014f743535798ba509432feb1,a2756c433a39a2319e61bcd68a758265,5341fd0c5de128ab7979a7414b2e586a,e537f9c0308cbfeb6ee40b4e4c344947,c2bc4d65c38311ab74b9dc39680d82df,efdb91a0f150375b423d8361d254241f,a3c8c3d444880bda2a553b8f3eb6695b,4141c0f8e6a977cd7048cd9d751af350,3045880458ee8b8734bf6b3307acd0d5,dbc10e6bbc54c0ea6f49e604839f5526,048c50d364a23dfcec0a87aa49e19eb8,c54e594684ebf2862c75ba29d83f71be,3345e3e48188396dc21242fb119ba6b1,2ebbbd65b4e2fc52a3ce44de2160e8d2,12fb6543af2e5541b0fc4f8fdd950be0,8d2159c1e0cf70473e66866eb026e80f,c166381208e23d3f4d65dec1231ccf76,3025704bb00b809798194964bccb8d3d,60decd16ccd83e013261697b7cc93bc6,7847598074d20e5abc220cb05a606213,afef320193ab13431e6b085c847b8094,9b4b25e0ea18183e9b085cc116246220,2e0115348725a3f383d8daa4354c7c3a,524c66aa98b226bd78bc7e7ad0423de7,66bfe11515e892dbf8bb4a5a92792e8b,50b03d671787f35800682c10c90a75bf,a1873764d0aa66fa9c6d34e16dcc86c2,0e69c6f28f25c24fe241da13093f9b12,6d119f7ae0c3c090ed51e672203c000f,7ff25ae6e8120b5ae5b5fb7b86a11641,53a396649c27c4e0dbd96fe57c2377e9,f59d0f67b7223a083e4449d583e90307,a41e16b61dd21e98c8143409d807890b,e44bd2f89f2820521a93c981c8af920d,f729102b0a0a547d20a4322e2d12cf71,7cf04cb70fa2f26d449acfb7974fd417,a7cd680c1676df4fdb93e7bdd83d6b3c,5f667ab7322f039e4e7e0ba8b04edf2f,6470d2304686b20640688c6d9dc44b46,df53f98d0b09ef3173cc8d594671fa6f,051071e245077a8126a4607e2148f327,224a58fde770d8718f7c06ac852fd9ae,0309718bf1a4785dcbf1e34461213c3e,d174c0a461db66945abcd861216dd94a,494b71b75af1e63c628544872f3c54d4,454f6e4ce4e57bd58eefda7d3fea1fa5,a87d77b65f6d1e8380b3d05290a994d0,430f99bc176c67ec705091d6a5da07d4,d230f6a24270b02237beb82a23e2742f,e5ba15d009798276692f84b4e0c9c1e9,026e09db119a340d72c2d5a611dfedb1,33a3ca4433131ad797eb4a7ff8bdb40b,87f64ed3bd52c1d6396fcb9908cb7fdf','管理员','root');

/*Table structure for table `boc_manager_purview` */

DROP TABLE IF EXISTS `boc_manager_purview`;

CREATE TABLE `boc_manager_purview` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `model` varchar(30) NOT NULL COMMENT '控制模型',
  `method` varchar(30) NOT NULL COMMENT '控制函数',
  `cid` varchar(30) DEFAULT NULL COMMENT 'column id 参数',
  `uri` varchar(64) NOT NULL COMMENT '权限地址md5(model/method)',
  `title` varchar(50) NOT NULL COMMENT '权限名称',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '是否使用权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=540 DEFAULT CHARSET=utf8 COMMENT='用户组权限';

/*Data for the table `boc_manager_purview` */

insert  into `boc_manager_purview`(`id`,`model`,`method`,`cid`,`uri`,`title`,`status`) values (313,'configs','index','','fddc215a132fa97ca3c193f1cae5cf9f','配置查看',1),(314,'configs','set','','a155574e57e9a8a0d0c6ecb1c511da68','配置修改',1),(315,'columns','index','','bfc0ef3829e8d84dfc8d31e5edc26d0f','栏目列表',1),(316,'columns','create','','ff2fa0336fe8fbc6a51c4707aa47c3e3','栏目添加',1),(317,'columns','edit','','7afb566e83d3dca2d8a47c8cc29e7e36','栏目修改',1),(318,'columns','delete','','4115dd2b6affc9e3626c695e398f335a','栏目删除',1),(319,'modules','index','','c54e594684ebf2862c75ba29d83f71be','模型查看',1),(320,'modules','create','','048c50d364a23dfcec0a87aa49e19eb8','模型添加',1),(321,'modules','edit','','dbc10e6bbc54c0ea6f49e604839f5526','模型修改',1),(322,'modules','delete','','bbff3957029793ef5163df61fbe018a5','删除模型',1),(323,'manager_purview','index','','4141c0f8e6a977cd7048cd9d751af350','权限管理',1),(324,'manager_purview','create','','a3c8c3d444880bda2a553b8f3eb6695b','权限添加',1),(325,'manager_purview','edit','','efdb91a0f150375b423d8361d254241f','权限修改',1),(326,'manager_purview','delete','','35845fea21044129353364ba21f144a0','权限删除',1),(327,'manager_group','index','','e537f9c0308cbfeb6ee40b4e4c344947','用户组查看',1),(328,'manager_group','create','','5341fd0c5de128ab7979a7414b2e586a','用户组添加',1),(329,'manager_group','edit','','a2756c433a39a2319e61bcd68a758265','用户组修改',1),(330,'manager_group','delete','','7d5101dc315695e13463ffdf708b5865','用户组删除',1),(334,'upload','uploado','','3345e3e48188396dc21242fb119ba6b1','上传',0),(475,'links','index','12','47403e5600a782bca793c7ed2e088cdc','查看',0),(476,'links','create','12','46abef163a89d173c91a6f541fe7da11','创建',1),(477,'links','edit','12','f866443ba073a8e6c1389b7f0fc8d8bd','编辑',1),(478,'links','delete','12','3f1ae82ea3049ebd146fe83c74732b9a','删除',1),(479,'links','audit','12','c17650e5017646ad8d61f6e2ed539634','审核',1),(480,'gallery','index','11','796ffd1e3cf12d51f680f45214dc4510','查看',0),(481,'gallery','create','11','06b456c04c97ec1590478e00075811fa','创建',1),(482,'gallery','edit','11','41f132358455d0f99b45487adc377fe8','编辑',1),(483,'gallery','delete','11','416fb1a88f1705bb8a4557e412b60dc1','删除',1),(484,'gallery','audit','11','3001d259f201972106029780c96db4cf','审核',1),(485,'recruit','index','10','461eafbe71ce986a610eb620bd45fa05','查看',0),(486,'recruit','create','10','a31ff67bb89565c3b51cfd2515d4c7be','创建',1),(487,'recruit','edit','10','4580445d40923410547b6d2b081afbea','编辑',1),(488,'recruit','delete','10','f6981606398d069ca744323a7ad0a930','删除',1),(489,'recruit','audit','10','033c9db19f4046ee16de3b46ca93d018','审核',1),(490,'product','index','9','31548dfbf3b9ca570224047bfe5ee488','查看',0),(491,'product','create','9','149566ebf75c0fd85bf05d4d606bb7e5','创建',1),(492,'product','edit','9','07e763bc0c7ba75e74499bf434897b93','编辑',1),(493,'product','delete','9','605adc5504fb08d17f408bf29231bda0','删除',1),(494,'product','audit','9','72661d180ca59ca2cb509ec2082e3444','审核',1),(495,'article','index','8','288a975e28e1fe0d9cb74c19e3b64e0f','查看',0),(496,'article','create','8','5b390301d76c5c95f5daa412234203b1','创建',1),(497,'article','edit','8','0c34b5dc5c2500e604d64e72b1ca8ed7','编辑',1),(498,'article','delete','8','119fbe7447f2b8a4bb9708deed2c34fb','删除',1),(499,'article','audit','8','5cc8d8792c0074efa30bab193e894cd4','审核',1),(500,'page','index','7','7882e0b46d58b78d70bee525b2404cb8','查看',0),(501,'page','create','7','6f767735a4bb03e2dde41f2f81984b18','创建',1),(502,'page','edit','7','9041544f46b0f9e0c861c986e5eb563f','编辑',1),(503,'page','delete','7','2383aecac653eb271fca9de8637fc7f5','删除',1),(504,'page','audit','7','58b7e1346b741399a048d3a032a72002','审核',1),(505,'dealer','index','6','084ab0d1170972947c92ae901f98b6ec','查看',0),(506,'dealer','create','6','9e9c3a8d1b84258f622647dce7e268f9','创建',1),(507,'dealer','edit','6','a56c0dea5c958f74a88b69840d6b3c3d','编辑',1),(508,'dealer','delete','6','9ad49ff8a09aa1e19238211ff2629aac','删除',1),(509,'dealer','audit','6','705f22cbd86ba40041442191cfabff47','审核',1),(510,'download','index','5','9bb626496f5cae83b00ffb481552432b','查看',0),(511,'download','create','5','6917a6f69a3b783d8b2cc9a15f93e0c7','创建',1),(512,'download','edit','5','e7d2a3d3c4112dc5845fb09e9ce70201','编辑',1),(513,'download','delete','5','15c1d3cc59e786989d3bb025b22bb059','删除',1),(514,'download','audit','5','0b044f0efa50f5d997e64dc511d3153d','审核',1),(515,'honor','index','4','229ceb68059d9d878fd635aa22afa6f7','查看',0),(516,'honor','create','4','34dfc17876c55eb53e8851438b7eefea','创建',1),(517,'honor','edit','4','9b1481c45390195bbc93617657f26aa0','编辑',1),(518,'honor','delete','4','89fde7c17a019a877557924256dbed9d','删除',1),(519,'honor','audit','4','473697975e44f6fe35c50508a46eea70','审核',1),(520,'banners','index','3','92c6849f707eeb59b63e8ae9d142ab5c','查看',0),(521,'banners','create','3','86a69d1e6fd165d5e5d68a78d8ba620e','创建',1),(522,'banners','edit','3','ff5661ddcf33bab40779b62dd0650519','编辑',1),(523,'banners','delete','3','e365835bb5497e8ecf9ce3e18c81d98b','删除',1),(524,'banners','audit','3','b5203f7798cc1d9a3db648385cf92f6f','审核',1),(525,'infos','index','2','246ef4ba4849e248bc2b4aa8a25c77a5','查看',0),(526,'infos','create','2','bf2578f224f9e3097c5e47592ca6f9eb','创建',1),(527,'infos','edit','2','10722981017d6155f9ae2fb1da613169','编辑',1),(528,'infos','delete','2','690c2a41b4cad051baa6666408bc1bd4','删除',1),(529,'infos','audit','2','c1799ca1ca659969ec9a0c8dc3a0883b','审核',1),(530,'videos','index','1','dbc863e8a21931db8c1d01bc3db3243a','查看',0),(531,'videos','create','1','5afe031774d80619f5274fa8468c75ed','创建',1),(532,'videos','edit','1','83b8b31e64c2f941330581de0015f701','编辑',1),(533,'videos','delete','1','8402f762da81b63635478f2d63f2fdb0','删除',1),(534,'videos','audit','1','c867ca63fa6504097128acd1ec81cc1a','审核',1),(535,'irregular','index','13','e9b1068435512c9818927811ebc97066','查看',0),(536,'irregular','create','13','236d0f81f5fe0584f3122f44f4d41811','创建',1),(537,'irregular','edit','13','1623d76f346676f7923301dfd04a0326','编辑',1),(538,'irregular','delete','13','365baab58e103a304f6c07a36b912a6e','删除',1),(539,'irregular','audit','13','93ca83a8ca8676a71a1603a81e8d6298','审核',1);

/*Table structure for table `boc_modules` */

DROP TABLE IF EXISTS `boc_modules`;

CREATE TABLE `boc_modules` (
  `id` int(2) NOT NULL AUTO_INCREMENT COMMENT '模型标识',
  `sort_id` int(2) NOT NULL,
  `title` varchar(50) NOT NULL COMMENT '显示名称',
  `controller` varchar(50) NOT NULL COMMENT '控制器名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='栏目模型';

/*Data for the table `boc_modules` */

insert  into `boc_modules`(`id`,`sort_id`,`title`,`controller`) values (1,0,'链接','links'),(3,0,'文章','article'),(6,0,'清单','lists'),(7,3,'期刊','gallery'),(8,1,'单页','page'),(9,4,'产品','product'),(10,0,'招聘','recruit'),(11,5,'视频','videos'),(12,6,'信息','infos'),(13,7,'导航','banners'),(14,8,'荣誉','honor'),(15,9,'下载','download'),(16,10,'门店','dealer'),(17,11,'综合','pageirregular');

/*Table structure for table `boc_msgs` */

DROP TABLE IF EXISTS `boc_msgs`;

CREATE TABLE `boc_msgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '标识',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `msg` tinytext COMMENT '提示消息',
  `level` int(1) DEFAULT '1' COMMENT '类型: 1notie 2info 3 success 4error',
  `timeline` int(11) NOT NULL COMMENT '时间',
  `markread` int(1) NOT NULL COMMENT '是否阅读',
  `notify` int(1) DEFAULT '0' COMMENT '是否提示过',
  `byer` int(6) NOT NULL DEFAULT '0' COMMENT '发送者 mid system is 0',
  `toer` int(6) NOT NULL COMMENT '接受者 mid',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='消息提示';

/*Data for the table `boc_msgs` */

/*Table structure for table `boc_onlineservice` */

DROP TABLE IF EXISTS `boc_onlineservice`;

CREATE TABLE `boc_onlineservice` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `cid` int(4) DEFAULT NULL COMMENT '栏目 id',
  `ccid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `sort_id` int(11) DEFAULT NULL COMMENT '排序编号',
  `audit` int(1) NOT NULL DEFAULT '0' COMMENT '0:1审核',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐',
  `ctype` int(4) NOT NULL DEFAULT '0' COMMENT '默认分类',
  `title` varchar(200) DEFAULT NULL COMMENT '标题',
  `number` varchar(20) DEFAULT NULL,
  `content` text COMMENT '详细内容',
  `tip` tinytext COMMENT '鼠标悬停提示',
  `link` varchar(250) DEFAULT NULL COMMENT 'URL地址',
  `photo` tinytext COMMENT '图片',
  `thumb` tinytext COMMENT '缩略图',
  `show` int(1) DEFAULT '1' COMMENT '是否显示',
  `timeline` int(11) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='在线客服';

/*Data for the table `boc_onlineservice` */

insert  into `boc_onlineservice`(`id`,`cid`,`ccid`,`sort_id`,`audit`,`flag`,`ctype`,`title`,`number`,`content`,`tip`,`link`,`photo`,`thumb`,`show`,`timeline`) values (4,0,0,2,1,0,0,'业务咨询','',NULL,NULL,'http://wpa.b.qq.com/cgi/wpa.php?ln=1&key=XzkzODAyNTk2Nl8yOTI4MzhfNDAwODAwNTc5MF8yXw','','',1,1487649576),(3,0,0,1,1,0,0,'售后咨询','',NULL,NULL,'http://wpa.b.qq.com/cgi/wpa.php?ln=1&key=XzkzODAyNTk2Nl8yOTI4MzhfNDAwODAwNTc5MF8yXw','','',1,1487649559),(5,0,0,3,1,0,0,'在线咨询','',NULL,NULL,'http://wpa.b.qq.com/cgi/wpa.php?ln=1&key=XzkzODAyNTk2Nl8yOTI4MzhfNDAwODAwNTc5MF8yXw','','',1,1490335947);

/*Table structure for table `boc_page` */

DROP TABLE IF EXISTS `boc_page`;

CREATE TABLE `boc_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一编号',
  `cid` int(4) DEFAULT NULL COMMENT '栏目id',
  `ccid` int(11) DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `sort_id` int(11) DEFAULT '0' COMMENT '排序编号',
  `audit` int(1) DEFAULT '0' COMMENT '审核',
  `title` tinytext COMMENT '标题',
  `title_seo` tinytext,
  `intro` varchar(500) DEFAULT NULL COMMENT '简介(200汉字)',
  `tags` tinytext COMMENT '标签',
  `content` text COMMENT '内容',
  `photo` varchar(200) DEFAULT NULL COMMENT '图片组',
  `thumb` varchar(200) DEFAULT NULL COMMENT '缩略图',
  `template` varchar(200) DEFAULT NULL COMMENT '模板',
  `timeline` int(10) DEFAULT NULL COMMENT '发布/修改时间',
  `attachment` tinytext COMMENT '附件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='单页表';

/*Data for the table `boc_page` */

insert  into `boc_page`(`id`,`cid`,`ccid`,`sort_id`,`audit`,`title`,`title_seo`,`intro`,`tags`,`content`,`photo`,`thumb`,`template`,`timeline`,`attachment`) values (1,7,0,1,0,'单页','','','','<p>测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息</p><p style=\"text-align:center\"><img src=\"http://localhost/bocweb/web/upload/148781714626451.jpg\"/></p><p>测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息</p><p>测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息</p>','','',NULL,1468750490,NULL);

/*Table structure for table `boc_pageirregular` */

DROP TABLE IF EXISTS `boc_pageirregular`;

CREATE TABLE `boc_pageirregular` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一编号',
  `cid` int(4) DEFAULT NULL COMMENT '栏目id',
  `ccid` int(11) DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `sort_id` int(11) DEFAULT '0' COMMENT '排序编号',
  `audit` int(1) DEFAULT '0' COMMENT '审核',
  `title` tinytext COMMENT '标题',
  `title_seo` tinytext,
  `intro` varchar(500) DEFAULT NULL COMMENT '简介(200汉字)',
  `tags` tinytext COMMENT '标签',
  `content` text COMMENT '内容',
  `photo` varchar(200) DEFAULT NULL COMMENT '图片组',
  `thumb` varchar(200) DEFAULT NULL COMMENT '缩略图',
  `template` varchar(200) DEFAULT NULL COMMENT '模板',
  `timeline` int(10) DEFAULT NULL COMMENT '发布/修改时间',
  `attachment` tinytext COMMENT '附件',
  `tagtitle` varchar(200) DEFAULT NULL,
  `entitle` varchar(200) DEFAULT NULL,
  `tagintro` varchar(200) DEFAULT NULL,
  `url` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='不规则单页表';

/*Data for the table `boc_pageirregular` */

insert  into `boc_pageirregular`(`id`,`cid`,`ccid`,`sort_id`,`audit`,`title`,`title_seo`,`intro`,`tags`,`content`,`photo`,`thumb`,`template`,`timeline`,`attachment`,`tagtitle`,`entitle`,`tagintro`,`url`) values (1,13,0,1,0,'标题','','','','','','',NULL,1492660146,NULL,'副标题','英文标题','概述','http://www.bocweb.cn');

/*Table structure for table `boc_product` */

DROP TABLE IF EXISTS `boc_product`;

CREATE TABLE `boc_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL COMMENT '栏目id',
  `sort_id` int(11) DEFAULT '1' COMMENT '排序编号',
  `ccid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `audit` int(1) DEFAULT '0' COMMENT '0/1审核',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐',
  `ctype` int(4) NOT NULL DEFAULT '0' COMMENT '默认分类',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `title_seo` varchar(255) DEFAULT NULL COMMENT '优化标题',
  `intro` varchar(500) DEFAULT NULL COMMENT '简介',
  `tags` varchar(255) DEFAULT NULL COMMENT '标签',
  `content` mediumtext COMMENT '内容',
  `photo` varchar(255) DEFAULT NULL COMMENT '图片',
  `thumb` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `show` tinyint(1) DEFAULT '1' COMMENT '是否显示',
  `click` int(11) DEFAULT '0' COMMENT '点击量',
  `timeline` int(11) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='产品';

/*Data for the table `boc_product` */

insert  into `boc_product`(`id`,`cid`,`sort_id`,`ccid`,`audit`,`flag`,`ctype`,`title`,`title_seo`,`intro`,`tags`,`content`,`photo`,`thumb`,`show`,`click`,`timeline`) values (1,9,1,0,1,0,3,'测试产品信息1','','','','<p>测试产品信息1</p>','','',1,0,1487142465),(2,9,2,0,1,0,3,'测试产品信息2','','','','<p>测试产品信息2</p>','','',1,0,1487142993),(3,9,3,0,1,0,3,'测试产品信息3','','','','<p>测试产品信息3</p>','','',1,0,1493191774),(4,9,4,0,1,0,3,'测试产品信息4','','','','<p>测试产品信息4</p>','','',1,0,1493191782);

/*Table structure for table `boc_product_child` */

DROP TABLE IF EXISTS `boc_product_child`;

CREATE TABLE `boc_product_child` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_id` int(11) DEFAULT NULL COMMENT '排序编号',
  `type_id` int(11) DEFAULT NULL COMMENT '分类',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `photo` varchar(255) DEFAULT NULL COMMENT '图片',
  `thumb` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `show` int(11) DEFAULT '1' COMMENT '是否显示',
  `timeline` int(11) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `boc_product_child` */

/*Table structure for table `boc_product_type` */

DROP TABLE IF EXISTS `boc_product_type`;

CREATE TABLE `boc_product_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT '1',
  `parent_id` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT '0',
  `path` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `intro` varchar(1000) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `order_id` int(11) DEFAULT '0',
  `timeline` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `path_index` (`path`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `boc_product_type` */

/*Table structure for table `boc_province` */

DROP TABLE IF EXISTS `boc_province`;

CREATE TABLE `boc_province` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '标识',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `entitle` varchar(50) DEFAULT NULL COMMENT '英文标题',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='省级列表';

/*Data for the table `boc_province` */

insert  into `boc_province`(`id`,`title`,`entitle`) values (1,'北京市','BeiJing'),(2,'天津市','Tianjin'),(3,'河北省','Hebei'),(4,'山西省','Shanxi'),(5,'辽宁省','Liaoning'),(6,'吉林省','Jilin'),(7,'上海市','Shanghai'),(8,'江苏省','Jiangsu'),(9,'浙江省','Zhejiang'),(10,'安徽省','Anhui'),(11,'福建省','Fujian'),(12,'江西省','Jiangxi'),(13,'山东省','Shandong'),(14,'河南省','Henan'),(15,'内蒙古','Neimenggu'),(16,'黑龙江省','Heilongjiang'),(17,'湖北省','Hubei'),(18,'湖南省','Hunan'),(19,'广东省','Guangdong'),(20,'广西省','Guangxi'),(21,'海南省','Hainan'),(22,'四川省','Sichuan'),(23,'重庆市','Chongqing'),(24,'台湾省','Taiwan'),(25,'贵州省','Guizhou'),(26,'云南省','Yunnan'),(27,'西藏','Xizang'),(28,'陕西省','Shanxi'),(29,'甘肃省','Gansu'),(30,'青海省','Qinghai'),(31,'宁夏','Ningxia'),(32,'新疆','Xinjiang'),(33,'香港','xianggang'),(34,'澳门','aomen'),(35,'钓鱼岛','Diaoyudao');

/*Table structure for table `boc_province_city` */

DROP TABLE IF EXISTS `boc_province_city`;

CREATE TABLE `boc_province_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL DEFAULT '0' COMMENT '省级id',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `entitle` varchar(50) DEFAULT NULL COMMENT '英文标题',
  `weather` varchar(11) DEFAULT NULL COMMENT '国家天气ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=384 DEFAULT CHARSET=utf8 COMMENT='城市列表';

/*Data for the table `boc_province_city` */

insert  into `boc_province_city`(`id`,`province_id`,`title`,`entitle`,`weather`) values (1,1,'北京',NULL,'101010100'),(2,2,'天津',NULL,'101030100'),(3,3,'石家庄',NULL,'101090101'),(4,3,'保定',NULL,'101090201'),(5,3,'沧州',NULL,'101090701'),(6,3,'承德',NULL,'101090402'),(7,3,'邯郸',NULL,'101091001'),(8,3,'衡水',NULL,'101090801'),(9,3,'廊坊',NULL,'101090601'),(10,3,'秦皇岛',NULL,'101091101'),(11,3,'唐山',NULL,'101090501'),(12,3,'邢台',NULL,'101090901'),(13,3,'张家口',NULL,'101090301'),(14,4,'太原',NULL,'101100101'),(15,4,'长治',NULL,'101100501'),(16,4,'大同',NULL,'101100201'),(17,4,'晋城',NULL,'101100601'),(18,4,'晋中',NULL,'101100401'),(19,4,'临汾',NULL,'101100701'),(20,4,'吕梁',NULL,'101101101'),(21,4,'朔州',NULL,'101100901'),(22,4,'忻州',NULL,'101101001'),(23,4,'阳泉',NULL,'101100301'),(24,4,'运城',NULL,'101100801'),(25,5,'沈阳',NULL,'101070101'),(26,5,'大连',NULL,'101070201'),(27,5,'鞍山',NULL,'101070301'),(28,5,'本溪',NULL,'101070501'),(29,5,'朝阳',NULL,'101071201'),(30,5,'丹东',NULL,'101070601'),(31,5,'抚顺',NULL,'101070401'),(32,5,'阜新',NULL,'101070901'),(33,5,'葫芦岛',NULL,'101071401'),(34,5,'锦州',NULL,'101070701'),(35,5,'辽阳',NULL,'101071001'),(36,5,'盘锦',NULL,'101071301'),(37,5,'铁岭',NULL,'101071101'),(38,5,'营口',NULL,'101070801'),(39,6,'长春',NULL,'101060101'),(40,6,'吉林',NULL,'101060201'),(41,6,'白城',NULL,'101060601'),(42,6,'白山',NULL,'101060901'),(43,6,'辽源',NULL,'101060701'),(44,6,'四平',NULL,'101060401'),(45,6,'松原',NULL,'101060801'),(46,6,'通化',NULL,'101060501'),(47,6,'延边朝鲜族自治州',NULL,NULL),(48,7,'上海',NULL,'101020100'),(49,8,'南京',NULL,'101190101'),(50,8,'常州',NULL,'101191101'),(51,8,'淮安',NULL,'101190901'),(52,8,'连云港',NULL,'101191001'),(53,8,'南通',NULL,'101190501'),(54,8,'苏州',NULL,'101190401'),(55,8,'宿迁',NULL,'101191301'),(56,8,'泰州',NULL,'101191201'),(57,8,'无锡',NULL,'101190201'),(58,8,'徐州',NULL,'101190801'),(59,8,'盐城',NULL,'101190701'),(60,8,'扬州',NULL,'101190601'),(61,8,'镇江',NULL,'101190301'),(62,9,'杭州',NULL,'101210101'),(63,9,'湖州',NULL,'101210201'),(64,9,'嘉兴',NULL,'101210301'),(65,9,'金华',NULL,'101210901'),(66,9,'丽水',NULL,'101210801'),(67,9,'宁波',NULL,'101210401'),(68,9,'绍兴',NULL,'101210501'),(69,9,'台州',NULL,'101210601'),(70,9,'温州',NULL,'101210701'),(71,9,'舟山',NULL,'101211101'),(72,9,'衢州',NULL,'101211001'),(73,10,'合肥',NULL,'101220101'),(74,10,'安庆',NULL,'101220601'),(75,10,'蚌埠',NULL,'101220201'),(76,10,'巢湖',NULL,'101221601'),(77,10,'池州',NULL,'101221701'),(78,10,'滁州',NULL,'101221101'),(79,10,'阜阳',NULL,'101220801'),(80,10,'淮北',NULL,'101221201'),(81,10,'淮南',NULL,'101220401'),(82,10,'黄山',NULL,NULL),(83,10,'六安',NULL,'101221501'),(84,10,'马鞍山',NULL,'101220501'),(85,10,'宿州',NULL,'101220701'),(86,10,'铜陵',NULL,'101221301'),(87,10,'芜湖',NULL,'101220301'),(88,10,'宣城',NULL,'101221401'),(89,10,'亳州',NULL,NULL),(90,11,'福州',NULL,'101230101'),(91,11,'厦门',NULL,'101230201'),(92,11,'龙岩',NULL,'101230701'),(93,11,'南平',NULL,'101230901'),(94,11,'宁德',NULL,'101230301'),(95,11,'莆田',NULL,'101230401'),(96,11,'泉州',NULL,'101230501'),(97,11,'三明',NULL,'101230801'),(98,11,'漳州',NULL,'101230601'),(99,12,'南昌',NULL,'101240101'),(100,12,'抚州',NULL,'101240401'),(101,12,'赣州',NULL,'101240701'),(102,12,'吉安',NULL,'101240601'),(103,12,'景德镇',NULL,'101240801'),(104,12,'九江',NULL,'101240201'),(105,12,'萍乡',NULL,'101240901'),(106,12,'上饶',NULL,'101240301'),(107,12,'新余',NULL,'101241001'),(108,12,'宜春',NULL,'101240501'),(109,12,'鹰潭',NULL,'101241101'),(110,13,'济南',NULL,'101120101'),(111,13,'青岛',NULL,'101120201'),(112,13,'烟台',NULL,'101120501'),(113,13,'滨州',NULL,'101121101'),(114,13,'德州',NULL,'101120401'),(115,13,'东营',NULL,'101121201'),(116,13,'菏泽',NULL,'101121001'),(117,13,'济宁',NULL,'101120701'),(118,13,'莱芜',NULL,'101121601'),(119,13,'聊城',NULL,'101121701'),(120,13,'临沂',NULL,'101120901'),(121,13,'日照',NULL,'101121501'),(122,13,'泰安',NULL,'101120801'),(123,13,'威海',NULL,'101121301'),(124,13,'潍坊',NULL,'101120601'),(125,13,'枣庄',NULL,'101121401'),(126,13,'淄博',NULL,'101120301'),(127,14,'郑州',NULL,'101180101'),(128,14,'洛阳',NULL,'101180901'),(129,14,'开封',NULL,'101180801'),(130,14,'安阳',NULL,'101180201'),(131,14,'鹤壁',NULL,'101181201'),(132,14,'济源',NULL,NULL),(133,14,'焦作',NULL,'101181101'),(134,14,'南阳',NULL,'101180701'),(135,14,'平顶山',NULL,'101180501'),(136,14,'三门峡',NULL,'101181701'),(137,14,'商丘',NULL,'101181001'),(138,14,'新乡',NULL,'101180301'),(139,14,'信阳',NULL,'101180601'),(140,14,'许昌',NULL,'101180401'),(141,14,'周口',NULL,'101181401'),(142,14,'驻马店',NULL,'101181601'),(143,14,'漯河',NULL,'101181501'),(144,14,'濮阳',NULL,'101181301'),(145,15,'呼和浩特',NULL,'101080101'),(146,15,'包头',NULL,'101080201'),(147,15,'赤峰',NULL,'101080601'),(148,15,'鄂尔多斯',NULL,'101080701'),(149,15,'呼伦贝尔',NULL,'101081001'),(150,15,'阿拉善盟',NULL,NULL),(151,15,'巴彦淖尔盟',NULL,NULL),(152,15,'通辽',NULL,'101080501'),(153,15,'乌海',NULL,'101080301'),(154,15,'乌兰察布盟',NULL,NULL),(155,15,'锡林郭勒盟',NULL,NULL),(156,15,'兴安盟',NULL,NULL),(157,16,'哈尔滨',NULL,'101050101'),(158,16,'大庆',NULL,'101050901'),(159,16,'大兴安岭',NULL,'101050701'),(160,16,'鹤岗',NULL,'101051201'),(161,16,'黑河',NULL,'101050601'),(162,16,'鸡西',NULL,'101051101'),(163,16,'佳木斯',NULL,'101050401'),(164,16,'牡丹江',NULL,'101050301'),(165,16,'七台河',NULL,'101051002'),(166,16,'齐齐哈尔',NULL,'101050201'),(167,16,'双鸭山',NULL,'101051301'),(168,16,'绥化',NULL,'101050501'),(169,16,'伊春',NULL,'101050801'),(170,17,'武汉',NULL,'101200101'),(171,17,'鄂州',NULL,'101200301'),(172,17,'黄冈',NULL,'101200501'),(173,17,'黄石',NULL,'101200601'),(174,17,'荆门',NULL,'101201401'),(175,17,'荆州',NULL,'101200801'),(176,17,'潜江',NULL,NULL),(177,17,'十堰',NULL,'101201101'),(178,17,'随州',NULL,'101201301'),(179,17,'天门',NULL,NULL),(180,17,'仙桃',NULL,NULL),(181,17,'咸宁',NULL,'101200701'),(182,17,'襄樊',NULL,NULL),(183,17,'孝感',NULL,'101200401'),(184,17,'宜昌',NULL,'101200901'),(185,17,'恩施土家族苗族自治州',NULL,NULL),(186,17,'神农架林区',NULL,NULL),(187,18,'长沙',NULL,'101250101'),(188,18,'益阳',NULL,'101250701'),(189,18,'湘潭',NULL,'101250201'),(190,18,'常德',NULL,'101250601'),(191,18,'郴州',NULL,'101250501'),(192,18,'衡阳',NULL,'101250401'),(193,18,'怀化',NULL,'101251201'),(194,18,'娄底',NULL,'101250801'),(195,18,'邵阳',NULL,'101250901'),(196,18,'永州',NULL,'101251401'),(197,18,'岳阳',NULL,'101251001'),(198,18,'张家界',NULL,'101251101'),(199,18,'株洲',NULL,'101250301'),(200,18,'湘西土家族苗族自治州',NULL,NULL),(201,19,'广州',NULL,'101280101'),(202,19,'深圳',NULL,'101280601'),(203,19,'珠海',NULL,'101280701'),(204,19,'湛江',NULL,'101281001'),(205,19,'惠州',NULL,'101280301'),(206,19,'江门',NULL,'101281101'),(207,19,'潮州',NULL,'101281501'),(208,19,'汕头',NULL,'101280501'),(209,19,'东莞',NULL,'101281601'),(210,19,'佛山',NULL,'101280800'),(211,19,'河源',NULL,'101281201'),(212,19,'揭阳',NULL,'101281901'),(213,19,'茂名',NULL,'101282001'),(214,19,'梅州',NULL,'101280401'),(215,19,'清远',NULL,'101281301'),(216,19,'汕尾',NULL,'101282101'),(217,19,'韶关',NULL,'101280201'),(218,19,'阳江',NULL,'101281801'),(219,19,'云浮',NULL,'101281401'),(220,19,'肇庆',NULL,'101280901'),(221,19,'中山',NULL,'101281701'),(222,20,'南宁',NULL,'101300101'),(223,20,'桂林',NULL,'101300501'),(224,20,'北海',NULL,'101301301'),(225,20,'百色',NULL,'101301001'),(226,20,'崇左',NULL,'101300201'),(227,20,'防城港',NULL,'101301401'),(228,20,'贵港',NULL,'101300801'),(229,20,'河池',NULL,'101301201'),(230,20,'贺州',NULL,'101300701'),(231,20,'来宾',NULL,'101300401'),(232,20,'柳州',NULL,'101300301'),(233,20,'钦州',NULL,'101301101'),(234,20,'梧州',NULL,'101300601'),(235,20,'玉林',NULL,'101300901'),(236,21,'海口',NULL,'101310101'),(237,21,'三亚',NULL,'101310201'),(238,21,'白沙黎族自治县',NULL,NULL),(239,21,'保亭黎族苗族自治县',NULL,NULL),(240,21,'昌江黎族自治县',NULL,NULL),(241,21,'澄迈县',NULL,NULL),(242,21,'定安县',NULL,NULL),(243,21,'东方',NULL,NULL),(244,21,'乐东黎族自治县',NULL,NULL),(245,21,'临高县',NULL,NULL),(246,21,'陵水黎族自治县',NULL,NULL),(247,21,'琼海',NULL,NULL),(248,21,'琼中黎族苗族自治县',NULL,NULL),(249,21,'屯昌县',NULL,NULL),(250,21,'万宁',NULL,NULL),(251,21,'文昌',NULL,'101310212'),(252,21,'五指山',NULL,NULL),(253,21,'儋州',NULL,'101310205'),(254,22,'成都',NULL,'101270101'),(255,22,'绵阳',NULL,'101270401'),(256,22,'巴中',NULL,'101270901'),(257,22,'达州',NULL,'101270601'),(258,22,'德阳',NULL,'101272001'),(259,22,'广安',NULL,'101270801'),(260,22,'广元',NULL,'101272101'),(261,22,'乐山',NULL,'101271401'),(262,22,'眉山',NULL,'101271501'),(263,22,'南充',NULL,'101270501'),(264,22,'内江',NULL,'101271201'),(265,22,'攀枝花',NULL,'101270201'),(266,22,'遂宁',NULL,'101270701'),(267,22,'雅安',NULL,'101271701'),(268,22,'宜宾',NULL,'101271101'),(269,22,'资阳',NULL,'101271301'),(270,22,'自贡',NULL,'101270301'),(271,22,'泸州',NULL,'101271001'),(272,22,'甘孜藏族自治州',NULL,NULL),(273,22,'阿坝藏族羌族自治州',NULL,NULL),(274,22,'凉山彝族自治州',NULL,NULL),(275,23,'重庆',NULL,'101040100'),(276,24,'台北',NULL,'101340102'),(277,24,'高雄',NULL,'101340201'),(278,24,'台中',NULL,NULL),(279,24,'台南',NULL,NULL),(280,24,'新北',NULL,NULL),(281,24,'基隆',NULL,NULL),(282,24,'新竹',NULL,NULL),(283,24,'嘉义',NULL,NULL),(284,24,'桃园县',NULL,NULL),(285,24,'新竹县',NULL,NULL),(286,24,'苗栗县',NULL,NULL),(287,24,'彰化县',NULL,NULL),(288,24,'南投县',NULL,NULL),(289,24,'云林县',NULL,NULL),(290,24,'嘉义县',NULL,NULL),(291,24,'屏东县',NULL,NULL),(292,24,'宜兰县',NULL,NULL),(293,24,'花莲县',NULL,NULL),(294,24,'台东县',NULL,NULL),(295,24,'澎湖县',NULL,NULL),(296,24,'金门县',NULL,NULL),(297,24,'连江县',NULL,NULL),(298,25,'贵阳',NULL,'101260101'),(299,25,'六盘水',NULL,'101260801'),(300,25,'遵义',NULL,'101260201'),(301,25,'安顺',NULL,'101260301'),(302,25,'毕节',NULL,'101260701'),(303,25,'铜仁',NULL,'101260601'),(304,25,'黔东南苗族侗族自治州',NULL,NULL),(305,25,'黔南布依族苗族自治州',NULL,NULL),(306,25,'黔西南布依族苗族自治州',NULL,NULL),(307,26,'昆明',NULL,'101290101'),(308,26,'丽江',NULL,'101291401'),(309,26,'保山',NULL,'101290501'),(310,26,'楚雄彝族自治州',NULL,NULL),(311,26,'大理白族自治州',NULL,NULL),(312,26,'德宏傣族景颇族自治州',NULL,NULL),(313,26,'迪庆藏族自治州',NULL,NULL),(314,26,'红河哈尼族彝族自治州',NULL,NULL),(315,26,'临沧',NULL,'101291101'),(316,26,'怒江傈傈族自治州',NULL,NULL),(317,26,'曲靖',NULL,'101290401'),(318,26,'思茅',NULL,'101290901'),(319,26,'文山壮族苗族自治州',NULL,NULL),(320,26,'西双版纳傣族自治州',NULL,NULL),(321,26,'玉溪',NULL,'101290701'),(322,26,'昭通',NULL,'101291001'),(323,27,'拉萨',NULL,'101140101'),(324,27,'日喀则',NULL,'101140201'),(325,27,'阿里',NULL,'101140701'),(326,27,'昌都',NULL,'101140501'),(327,27,'林芝',NULL,'101140401'),(328,27,'那曲',NULL,'101140601'),(329,27,'山南',NULL,'101140301'),(330,28,'西安',NULL,'101110101'),(331,28,'宝鸡',NULL,'101110901'),(332,28,'咸阳',NULL,'101110200'),(333,28,'延安',NULL,'101110300'),(334,28,'榆林',NULL,'101110401'),(335,28,'安康',NULL,'101110701'),(336,28,'汉中',NULL,'101110801'),(337,28,'商洛',NULL,'101110601'),(338,28,'铜川',NULL,'101111001'),(339,28,'渭南',NULL,'101110501'),(340,29,'兰州',NULL,'101160101'),(341,29,'白银',NULL,'101161301'),(342,29,'定西',NULL,'101160201'),(343,29,'嘉峪关',NULL,NULL),(344,29,'金昌',NULL,'101160601'),(345,29,'酒泉',NULL,'101160801'),(346,29,'陇南',NULL,NULL),(347,29,'平凉',NULL,'101160301'),(348,29,'庆阳',NULL,'101160401'),(349,29,'天水',NULL,'101160901'),(350,29,'武威',NULL,'101160501'),(351,29,'张掖',NULL,'101160701'),(352,29,'临夏回族自治州',NULL,NULL),(353,29,'甘南藏族自治州',NULL,NULL),(354,30,'西宁',NULL,'101150101'),(355,30,'果洛藏族自治州',NULL,NULL),(356,30,'海北藏族自治州',NULL,NULL),(357,30,'海东',NULL,'101150201'),(358,30,'海南藏族自治州',NULL,NULL),(359,30,'海西蒙古族藏族自治州',NULL,NULL),(360,30,'黄南藏族自治州',NULL,NULL),(361,30,'玉树藏族自治州',NULL,NULL),(362,31,'银川',NULL,'101170101'),(363,31,'固原',NULL,'101170401'),(364,31,'石嘴山',NULL,'101170201'),(365,31,'吴忠',NULL,'101170301'),(366,32,'乌鲁木齐',NULL,'101130101'),(367,32,'吐鲁番',NULL,'101130501'),(368,32,'阿克苏',NULL,'101130801'),(369,32,'阿拉尔',NULL,NULL),(370,32,'巴音郭楞蒙古自治州',NULL,NULL),(371,32,'博尔塔拉蒙古自治州',NULL,NULL),(372,32,'昌吉回族自治州',NULL,NULL),(373,32,'哈密',NULL,'101131201'),(374,32,'和田',NULL,'101131301'),(375,32,'喀什',NULL,'101130901'),(376,32,'克拉玛依',NULL,'101130201'),(377,32,'克孜勒苏柯尔克孜自治州',NULL,NULL),(378,32,'石河子',NULL,'101130301'),(379,32,'图木舒克',NULL,NULL),(380,32,'五家渠',NULL,NULL),(381,32,'伊犁哈萨克自治州',NULL,NULL),(382,33,'香港',NULL,'101320101'),(383,34,'澳门',NULL,'101330101');

/*Table structure for table `boc_recruit` */

DROP TABLE IF EXISTS `boc_recruit`;

CREATE TABLE `boc_recruit` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一编号',
  `sort_id` int(11) DEFAULT '1' COMMENT '排序编号',
  `cid` int(11) DEFAULT NULL COMMENT '类型',
  `ccid` int(11) DEFAULT '0',
  `title` varchar(250) NOT NULL COMMENT '标题',
  `title_seo` tinytext,
  `intro` tinytext COMMENT '简介',
  `tags` tinytext,
  `content` mediumtext COMMENT '内容',
  `timeline` int(11) DEFAULT NULL COMMENT '发布/修改时间',
  `expiretime` int(11) DEFAULT NULL COMMENT '公告过期时间',
  `click` int(11) DEFAULT '0' COMMENT '浏览次数',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显隐状态',
  `flag` tinyint(1) NOT NULL DEFAULT '0' COMMENT '推荐到分类门户的页面显示',
  `audit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '突显状态/颜色',
  `show` tinyint(1) NOT NULL DEFAULT '1',
  `photo` varchar(255) DEFAULT NULL COMMENT '相关图片',
  `thumb` varchar(255) DEFAULT NULL COMMENT '图片缩略图',
  `attachment` varchar(255) DEFAULT NULL COMMENT '相关文件',
  `country` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `county` varchar(50) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `require` varchar(50) DEFAULT NULL COMMENT '职称要求',
  `amount` int(11) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `age` smallint(6) DEFAULT NULL,
  `age_max` smallint(6) DEFAULT NULL,
  `edu` varchar(50) DEFAULT NULL,
  `major` varchar(50) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `requirement` text,
  `telphone` varchar(20) DEFAULT NULL,
  `person` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='人才招聘';

/*Data for the table `boc_recruit` */

insert  into `boc_recruit`(`id`,`sort_id`,`cid`,`ccid`,`title`,`title_seo`,`intro`,`tags`,`content`,`timeline`,`expiretime`,`click`,`status`,`flag`,`audit`,`show`,`photo`,`thumb`,`attachment`,`country`,`province`,`city`,`county`,`place`,`require`,`amount`,`department`,`gender`,`age`,`age_max`,`edu`,`major`,`experience`,`requirement`,`telphone`,`person`,`email`) values (1,1,10,0,'岗位名称1',NULL,NULL,NULL,'<p>详细说明<br/></p>',1487088000,1500220800,0,1,0,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'工作地区','职称要求',0,'部门信息',0,18,35,'本科','专业要求','2年以上','<p>能力要求<br/></p>','0571-87651828','赵小姐','zhaochongxu@bocweb.cn'),(2,2,10,0,'岗位名称2',NULL,NULL,NULL,'<p>&nbsp; &nbsp; &nbsp; &nbsp; 详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span></p>',1492444800,1500220800,0,1,0,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'杭州','职称信息',0,'部门信息',0,18,35,'本科','专业要求','2年以上','<p>&nbsp; &nbsp; &nbsp; 能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span>能力要求能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span></p>','0571-87651828','赵小姐','zhaochongxu@bocweb.cn'),(3,3,10,0,'岗位名称3',NULL,NULL,NULL,'<p>&nbsp; &nbsp; &nbsp; &nbsp; 详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span></p>',1492496598,1500220800,0,1,0,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'杭州','职称信息',0,'部门信息',0,18,35,'本科','专业要求','2年以上','<p>&nbsp; &nbsp; &nbsp; 能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span>能力要求能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span></p>','0571-87651828','赵小姐','zhaochongxu@bocweb.cn'),(4,4,10,0,'岗位名称4',NULL,NULL,NULL,'<p>&nbsp; &nbsp; &nbsp; &nbsp; 详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span></p>',1492496600,1500220800,0,1,0,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'杭州','职称信息',0,'部门信息',0,18,35,'本科','专业要求','2年以上','<p>&nbsp; &nbsp; &nbsp; 能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span>能力要求能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span></p>','0571-87651828','赵小姐','zhaochongxu@bocweb.cn'),(5,5,10,0,'岗位名称5',NULL,NULL,NULL,'<p>&nbsp; &nbsp; &nbsp; &nbsp; 详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span></p>',1492496601,1500220800,0,1,0,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'杭州','职称信息',0,'部门信息',0,18,35,'本科','专业要求','2年以上','<p>&nbsp; &nbsp; &nbsp; 能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span>能力要求能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span></p>','0571-87651828','赵小姐','zhaochongxu@bocweb.cn'),(6,6,10,0,'岗位名称6',NULL,NULL,NULL,'<p>&nbsp; &nbsp; &nbsp; &nbsp; 详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span></p>',1492496602,1500220800,0,1,0,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'杭州','职称信息',0,'部门信息',0,18,35,'本科','专业要求','2年以上','<p>&nbsp; &nbsp; &nbsp; 能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span>能力要求能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span></p>','0571-87651828','赵小姐','zhaochongxu@bocweb.cn'),(7,7,10,0,'岗位名称7',NULL,NULL,NULL,'<p>&nbsp; &nbsp; &nbsp; &nbsp; 详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span></p>',1492496603,1500220800,0,1,0,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'杭州','职称信息',0,'部门信息',0,18,35,'本科','专业要求','2年以上','<p>&nbsp; &nbsp; &nbsp; 能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span>能力要求能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span></p>','0571-87651828','赵小姐','zhaochongxu@bocweb.cn'),(8,8,10,0,'岗位名称8',NULL,NULL,NULL,'<p>&nbsp; &nbsp; &nbsp; &nbsp; 详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span></p>',1492496604,1500220800,0,1,0,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'杭州','职称信息',0,'部门信息',0,18,35,'本科','专业要求','2年以上','<p>&nbsp; &nbsp; &nbsp; 能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span>能力要求能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span></p>','0571-87651828','赵小姐','zhaochongxu@bocweb.cn'),(9,9,10,0,'岗位名称9',NULL,NULL,NULL,'<p>&nbsp; &nbsp; &nbsp; &nbsp; 详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span></p>',1492496605,1500220800,0,1,0,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'杭州','职称信息',0,'部门信息',0,18,35,'本科','专业要求','2年以上','<p>&nbsp; &nbsp; &nbsp; 能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span>能力要求能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span></p>','0571-87651828','赵小姐','zhaochongxu@bocweb.cn'),(10,10,10,0,'岗位名称10',NULL,NULL,NULL,'<p>&nbsp; &nbsp; &nbsp; &nbsp; 详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span></p>',1492496605,1500220800,0,1,0,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'杭州','职称信息',0,'部门信息',0,18,35,'本科','专业要求','2年以上','<p>&nbsp; &nbsp; &nbsp; 能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span>能力要求能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span></p>','0571-87651828','赵小姐','zhaochongxu@bocweb.cn'),(11,11,10,0,'岗位名称11',NULL,NULL,NULL,'<p>&nbsp; &nbsp; &nbsp; &nbsp; 详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span></p>',1492496607,1500220800,0,1,0,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'杭州','职称信息',0,'部门信息',0,18,35,'本科','专业要求','2年以上','<p>&nbsp; &nbsp; &nbsp; 能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span>能力要求能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span></p>','0571-87651828','赵小姐','zhaochongxu@bocweb.cn'),(12,12,10,0,'岗位名称12',NULL,NULL,NULL,'<p>&nbsp; &nbsp; &nbsp; &nbsp; 详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明详细说明<span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span>详细说明<span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span><span style=\"white-space: normal;\">详细说明</span></p>',1492496608,1500220800,0,1,0,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'杭州','职称信息',0,'部门信息',0,18,35,'本科','专业要求','2年以上','<p>&nbsp; &nbsp; &nbsp; 能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span>能力要求能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span>能力要求<span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span><span style=\"white-space: normal;\">能力要求</span></p>','0571-87651828','赵小姐','zhaochongxu@bocweb.cn');

/*Table structure for table `boc_recruit_apply` */

DROP TABLE IF EXISTS `boc_recruit_apply`;

CREATE TABLE `boc_recruit_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一编号',
  `sort_id` int(11) DEFAULT '1' COMMENT '排序编号',
  `type_id` int(11) DEFAULT NULL COMMENT '类型',
  `rid` int(10) DEFAULT '0',
  `recruit_id` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT NULL COMMENT '应聘标题',
  `intro` varchar(1000) DEFAULT NULL COMMENT '简介',
  `content` mediumtext COMMENT '内容',
  `answer` mediumtext,
  `timeline_answer` int(11) DEFAULT NULL,
  `timeline` int(11) DEFAULT NULL COMMENT '发布/修改时间',
  `expire` int(11) DEFAULT NULL COMMENT '公告过期时间',
  `solve` int(1) DEFAULT '0',
  `click` int(11) DEFAULT '0' COMMENT '浏览次数',
  `show` tinyint(4) DEFAULT '1' COMMENT '显隐状态',
  `recommend` tinyint(4) DEFAULT '0' COMMENT '推荐到分类门户的页面显示',
  `audit` tinyint(1) DEFAULT '0' COMMENT '审核状态',
  `photo` varchar(255) DEFAULT NULL COMMENT '相关图片',
  `thumb` varchar(255) DEFAULT NULL COMMENT '图片缩略图',
  `files` varchar(255) DEFAULT NULL COMMENT '相关文件',
  `ip` varchar(100) DEFAULT NULL,
  `ex1` varchar(255) DEFAULT '' COMMENT '其他标签（预留）',
  `ex2` varchar(255) DEFAULT '',
  `ex3` varchar(255) DEFAULT '',
  `ex4` varchar(255) DEFAULT '',
  `x` varchar(255) DEFAULT '',
  `y` varchar(255) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `county` varchar(50) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL COMMENT '部门',
  `name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `marriage` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `qq` varchar(100) DEFAULT NULL,
  `msn` varchar(100) DEFAULT NULL,
  `wangwang` varchar(100) DEFAULT NULL,
  `nation` varchar(50) DEFAULT NULL COMMENT '民族',
  `birthday` varchar(20) DEFAULT NULL,
  `politic` varchar(50) DEFAULT NULL COMMENT '政治面貌',
  `birthplace` varchar(50) DEFAULT NULL COMMENT '籍贯',
  `school` varchar(100) DEFAULT NULL,
  `major` varchar(50) DEFAULT NULL COMMENT '专业',
  `graduation` varchar(20) DEFAULT NULL COMMENT '毕业时间',
  `language` varchar(50) DEFAULT NULL COMMENT '外语水平',
  `position` varchar(100) DEFAULT NULL COMMENT '应聘职位',
  `age` smallint(6) DEFAULT NULL,
  `edu` varchar(50) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='在线应聘';

/*Data for the table `boc_recruit_apply` */

insert  into `boc_recruit_apply`(`id`,`sort_id`,`type_id`,`rid`,`recruit_id`,`title`,`intro`,`content`,`answer`,`timeline_answer`,`timeline`,`expire`,`solve`,`click`,`show`,`recommend`,`audit`,`photo`,`thumb`,`files`,`ip`,`ex1`,`ex2`,`ex3`,`ex4`,`x`,`y`,`country`,`province`,`city`,`county`,`place`,`department`,`name`,`gender`,`marriage`,`email`,`tel`,`mobile`,`qq`,`msn`,`wangwang`,`nation`,`birthday`,`politic`,`birthplace`,`school`,`major`,`graduation`,`language`,`position`,`age`,`edu`,`experience`) values (7,1,NULL,11,10,NULL,NULL,'个人简历个人简历个人简历个人简历个人简历个人简历个人简历个人简历',NULL,NULL,1492597120,NULL,0,0,1,0,0,NULL,NULL,'19',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'测试信息','男','未婚','test@126.com','13512345678',NULL,NULL,NULL,NULL,'汉族',NULL,'党员','中国','浙大','计算机','2009','good','岗位名称11',29,'本科',NULL);

/*Table structure for table `boc_sessions_adminer` */

DROP TABLE IF EXISTS `boc_sessions_adminer`;

CREATE TABLE `boc_sessions_adminer` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会话保存';

/*Data for the table `boc_sessions_adminer` */

insert  into `boc_sessions_adminer`(`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) values ('5866218b67b43b875459daf569e94d4f','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.96 Safari/537.36 FireP',1493977238,'a:5:{s:3:\"mid\";s:1:\"1\";s:5:\"uname\";s:8:\"bocadmin\";s:8:\"nickname\";s:12:\"超级用户\";s:8:\"login_ip\";s:7:\"0.0.0.0\";s:3:\"gid\";s:1:\"1\";}');

/*Table structure for table `boc_sessions_site` */

DROP TABLE IF EXISTS `boc_sessions_site`;

CREATE TABLE `boc_sessions_site` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会话保存';

/*Data for the table `boc_sessions_site` */

/*Table structure for table `boc_tags` */

DROP TABLE IF EXISTS `boc_tags`;

CREATE TABLE `boc_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(30) NOT NULL COMMENT '标签',
  `en` varchar(60) DEFAULT NULL COMMENT '拼音|英语',
  `len` int(3) DEFAULT '0' COMMENT '长度',
  `count` int(11) DEFAULT '0' COMMENT '计数',
  `type` int(1) DEFAULT '0' COMMENT '分类,0:tags,1:title,2:intro,3:content',
  PRIMARY KEY (`id`),
  KEY `record_index` (`id`,`tag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='标签表';

/*Data for the table `boc_tags` */

/*Table structure for table `boc_tags_list` */

DROP TABLE IF EXISTS `boc_tags_list`;

CREATE TABLE `boc_tags_list` (
  `tid` int(11) NOT NULL DEFAULT '0' COMMENT 'tag id',
  `cid` int(11) NOT NULL DEFAULT '0' COMMENT 'col id',
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT 'col''s aritcle id',
  `type` int(1) NOT NULL DEFAULT '0' COMMENT '分类,0:tags,1:title,2:intro,3:content',
  `timeline` int(11) NOT NULL COMMENT '时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='标签使用表';

/*Data for the table `boc_tags_list` */

/*Table structure for table `boc_upload` */

DROP TABLE IF EXISTS `boc_upload`;

CREATE TABLE `boc_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '文件名',
  `size` int(11) DEFAULT NULL COMMENT '大小',
  `type` varchar(255) DEFAULT NULL COMMENT '类型',
  `url` varchar(100) DEFAULT NULL COMMENT '地址',
  `thumb` varchar(100) DEFAULT NULL COMMENT '缩略图',
  `deleteUrl` varchar(150) DEFAULT NULL COMMENT '删除',
  `alt` varbinary(30) DEFAULT NULL COMMENT '提示',
  `title` varbinary(100) DEFAULT NULL COMMENT '标题',
  `text` tinytext COMMENT '简介内容',
  `timeline` int(11) DEFAULT NULL COMMENT '时间线',
  `origin_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='文件上传';

/*Data for the table `boc_upload` */

insert  into `boc_upload`(`id`,`name`,`size`,`type`,`url`,`thumb`,`deleteUrl`,`alt`,`title`,`text`,`timeline`,`origin_name`) values (1,'14893891775331cprts.jpg',34769,'image/jpeg','2017/03/13/14893891775331cprts.jpg','2017/03/13/thumbnail/14893891775331cprts.jpg','?file=14893891775331cprts.jpg&dt=2017/03/13',NULL,NULL,NULL,1489389177,'20151103104740.jpg'),(2,'14893892035051vvu0w.jpg',101669,'image/jpeg','2017/03/13/14893892035051vvu0w.jpg','2017/03/13/thumbnail/14893892035051vvu0w.jpg','?file=14893892035051vvu0w.jpg&dt=2017/03/13',NULL,NULL,NULL,1489389203,'1.jpg'),(3,'14893892187479s1vqp.jpg',134686,'image/jpeg','2017/03/13/14893892187479s1vqp.jpg','2017/03/13/thumbnail/14893892187479s1vqp.jpg','?file=14893892187479s1vqp.jpg&dt=2017/03/13',NULL,NULL,NULL,1489389218,'2.jpg'),(4,'14893892305067qloi4.jpg',71853,'image/jpeg','2017/03/13/14893892305067qloi4.jpg','2017/03/13/thumbnail/14893892305067qloi4.jpg','?file=14893892305067qloi4.jpg&dt=2017/03/13',NULL,NULL,NULL,1489389230,'3.jpg'),(5,'14893892411976clryg.jpg',132359,'image/jpeg','2017/03/13/14893892411976clryg.jpg','2017/03/13/thumbnail/14893892411976clryg.jpg','?file=14893892411976clryg.jpg&dt=2017/03/13',NULL,NULL,NULL,1489389241,'4.jpg'),(6,'14893892559326x71d4.jpg',112969,'image/jpeg','2017/03/13/14893892559326x71d4.jpg','2017/03/13/thumbnail/14893892559326x71d4.jpg','?file=14893892559326x71d4.jpg&dt=2017/03/13',NULL,NULL,NULL,1489389255,'5.jpg'),(12,'14906677005732nrqc9.jpg',76651,'image/jpeg','2017/03/28/14906677005732nrqc9.jpg','2017/03/28/thumbnail/14906677005732nrqc9.jpg','?file=14906677005732nrqc9.jpg&dt=2017/03/28',NULL,NULL,NULL,1490667700,'mb-img.jpg'),(13,'14924159147287ins5x.jpg',94464,'image/jpeg','2017/04/17/14924159147287ins5x.jpg','2017/04/17/thumbnail/14924159147287ins5x.jpg','?file=14924159147287ins5x.jpg&dt=2017/04/17',NULL,NULL,NULL,1492415914,'1.jpg'),(14,'14924159235296dxq84.jpg',28929,'image/jpeg','2017/04/17/14924159235296dxq84.jpg','2017/04/17/thumbnail/14924159235296dxq84.jpg','?file=14924159235296dxq84.jpg&dt=2017/04/17',NULL,NULL,NULL,1492415923,'2.jpg'),(15,'14924159336625fonvz.jpg',55381,'image/jpeg','2017/04/17/14924159336625fonvz.jpg','2017/04/17/thumbnail/14924159336625fonvz.jpg','?file=14924159336625fonvz.jpg&dt=2017/04/17',NULL,NULL,NULL,1492415933,'3.jpg'),(16,'14924159404476vzltt.jpg',40536,'image/jpeg','2017/04/17/14924159404476vzltt.jpg','2017/04/17/thumbnail/14924159404476vzltt.jpg','?file=14924159404476vzltt.jpg&dt=2017/04/17',NULL,NULL,NULL,1492415940,'4.jpg'),(17,'149256812539143bm7h.jpg',101604,'image/jpeg','2017/04/19/149256812539143bm7h.jpg','2017/04/19/thumbnail/149256812539143bm7h.jpg','?file=149256812539143bm7h.jpg&dt=2017/04/19',NULL,NULL,NULL,1492568125,'6.jpg'),(18,'14925681384586shijf.jpg',121373,'image/jpeg','2017/04/19/14925681384586shijf.jpg','2017/04/19/thumbnail/14925681384586shijf.jpg','?file=14925681384586shijf.jpg&dt=2017/04/19',NULL,NULL,NULL,1492568138,'7.jpg'),(19,'149259711243383tyi0.doc',11264,'application/msword','2017/04/19/149259711243383tyi0.doc',NULL,'?file=149259711243383tyi0.doc&dt=2017/04/19',NULL,NULL,NULL,1492597112,'test.doc');

/*Table structure for table `boc_users` */

DROP TABLE IF EXISTS `boc_users`;

CREATE TABLE `boc_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一编号',
  `cid` int(11) DEFAULT '0' COMMENT '所属栏目',
  `ccid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `sort_id` int(11) DEFAULT '0' COMMENT '排序编号',
  `audit` int(1) NOT NULL DEFAULT '0' COMMENT '0:1审核',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐',
  `ctype` int(4) NOT NULL DEFAULT '0' COMMENT '默认分类',
  `type_id` int(4) DEFAULT NULL COMMENT '类型',
  `title` tinytext COMMENT '标题',
  `link` text COMMENT '外链',
  `title_seo` tinytext,
  `intro` varchar(500) DEFAULT NULL COMMENT '简介(200汉字)',
  `tags` tinytext COMMENT '标签',
  `content` text COMMENT '内容',
  `timeline` int(11) DEFAULT NULL COMMENT '发布/修改时间',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `photo` varchar(10) DEFAULT NULL COMMENT '图片',
  `thumb` varchar(50) DEFAULT NULL COMMENT '图片缩略图',
  `username` varchar(20) DEFAULT NULL COMMENT '用户名',
  `nickname` varchar(20) DEFAULT NULL COMMENT '昵称',
  `password` varchar(50) DEFAULT NULL COMMENT '密码',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='会员中心';

/*Data for the table `boc_users` */

insert  into `boc_users`(`id`,`cid`,`ccid`,`sort_id`,`audit`,`flag`,`ctype`,`type_id`,`title`,`link`,`title_seo`,`intro`,`tags`,`content`,`timeline`,`click`,`photo`,`thumb`,`username`,`nickname`,`password`,`email`) values (10,0,0,1,1,0,0,NULL,NULL,NULL,'','  ','',NULL,1488792742,0,'','','xiejianwei',NULL,'e10adc3949ba59abbe56e057f20f883e','xiejianwei@126.com'),(32,0,0,8,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1489649107,0,NULL,NULL,'xiejianwei7','小谢','e10adc3949ba59abbe56e057f20f883e','xiejianwei@126.com'),(31,0,0,7,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1489649107,0,NULL,NULL,'xiejianwei6','小谢','e10adc3949ba59abbe56e057f20f883e','xiejianwei@126.com'),(30,0,0,6,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1489649107,0,NULL,NULL,'xiejianwei5','小谢','e10adc3949ba59abbe56e057f20f883e','xiejianwei@126.com'),(29,0,0,5,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1489649107,0,NULL,NULL,'xiejianwei4','小谢','e10adc3949ba59abbe56e057f20f883e','xiejianwei@126.com'),(27,0,0,3,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1489649107,0,NULL,NULL,'xiejianwei2','小谢','e10adc3949ba59abbe56e057f20f883e','xiejianwei@126.com'),(28,0,0,4,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1489649107,0,NULL,NULL,'xiejianwei3','小谢','e10adc3949ba59abbe56e057f20f883e','xiejianwei@126.com'),(26,0,0,2,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1489649107,0,NULL,NULL,'xiejianwei1','小谢','e10adc3949ba59abbe56e057f20f883e','xiejianwei@126.com');

/*Table structure for table `boc_videos` */

DROP TABLE IF EXISTS `boc_videos`;

CREATE TABLE `boc_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一编号',
  `cid` int(11) NOT NULL COMMENT '所属栏目',
  `ccid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `sort_id` int(11) DEFAULT '0' COMMENT '排序编号',
  `audit` int(1) NOT NULL DEFAULT '0' COMMENT '0:1审核',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐',
  `ctype` int(4) NOT NULL DEFAULT '0' COMMENT '默认分类',
  `type_id` int(4) DEFAULT NULL COMMENT '类型',
  `entitle` varchar(50) DEFAULT NULL,
  `title` varchar(250) NOT NULL COMMENT '标题',
  `title_seo` varchar(250) DEFAULT NULL,
  `intro` varchar(250) DEFAULT NULL COMMENT '简介(200汉字)',
  `tags` tinytext COMMENT '标签',
  `videourl` text,
  `content` text COMMENT '内容',
  `timeline` int(11) DEFAULT NULL COMMENT '发布/修改时间',
  `expiretime` int(10) DEFAULT NULL COMMENT '公告过期时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0:1状态,1 发布，0 草稿',
  `author` varchar(50) DEFAULT NULL COMMENT '消息作者',
  `source` varchar(50) DEFAULT NULL COMMENT '消息来源',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `color` int(1) NOT NULL DEFAULT '0' COMMENT '突显状态/颜色',
  `photo` varchar(200) DEFAULT NULL COMMENT '相关图片',
  `thumb` varchar(200) DEFAULT NULL COMMENT '图片缩略图',
  `files` tinytext COMMENT '附件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='视频';

/*Data for the table `boc_videos` */

insert  into `boc_videos`(`id`,`cid`,`ccid`,`sort_id`,`audit`,`flag`,`ctype`,`type_id`,`entitle`,`title`,`title_seo`,`intro`,`tags`,`videourl`,`content`,`timeline`,`expiretime`,`status`,`author`,`source`,`click`,`color`,`photo`,`thumb`,`files`) values (1,1,0,1,1,0,0,NULL,NULL,'测试信息','','  ','','',NULL,1487208079,NULL,0,NULL,NULL,0,0,'','',''),(2,1,0,2,1,0,0,NULL,NULL,'测试信息','','  ','','',NULL,1489659424,NULL,0,NULL,NULL,0,0,'','','');

/*Table structure for table `boc_webmodels` */

DROP TABLE IF EXISTS `boc_webmodels`;

CREATE TABLE `boc_webmodels` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一编号',
  `cid` int(11) NOT NULL DEFAULT '0' COMMENT '所属栏目',
  `ccid` int(11) NOT NULL DEFAULT '0' COMMENT '栏目条目ID伪栏目',
  `mid` int(10) DEFAULT '1' COMMENT '1:新闻模块',
  `sort_id` int(11) DEFAULT '0' COMMENT '排序编号',
  `audit` int(1) NOT NULL DEFAULT '0' COMMENT '0:1审核',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0:1推荐',
  `ctype` int(4) NOT NULL DEFAULT '0' COMMENT '默认分类',
  `type_id` int(4) DEFAULT NULL COMMENT '类型',
  `title` tinytext COMMENT '标题',
  `link` text COMMENT '外链',
  `title_seo` tinytext,
  `intro` varchar(500) DEFAULT NULL COMMENT '简介(200汉字)',
  `tags` tinytext COMMENT '标签',
  `content` text COMMENT '内容',
  `timeline` int(11) DEFAULT NULL COMMENT '发布/修改时间',
  `photo` varchar(200) DEFAULT NULL COMMENT '图片',
  `thumb` varchar(200) DEFAULT NULL COMMENT '图片缩略图',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='新闻模块';

/*Data for the table `boc_webmodels` */

insert  into `boc_webmodels`(`id`,`cid`,`ccid`,`mid`,`sort_id`,`audit`,`flag`,`ctype`,`type_id`,`title`,`link`,`title_seo`,`intro`,`tags`,`content`,`timeline`,`photo`,`thumb`) values (21,0,0,2,2,0,0,0,4,NULL,NULL,NULL,NULL,NULL,NULL,1492415649,NULL,NULL),(20,0,0,1,1,0,0,0,7,NULL,NULL,NULL,NULL,NULL,NULL,1489116841,NULL,'');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
