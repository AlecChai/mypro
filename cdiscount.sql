-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';

DROP TABLE IF EXISTS `cd_product`;
CREATE TABLE `cd_product` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `en` char(15) NOT NULL,
  `keyword` varchar(30) NOT NULL COMMENT '搜索的关键词',
  `cd_id` varchar(40) NOT NULL COMMENT 'cd的产品ID',
  `store` varchar(50) NOT NULL COMMENT '店铺名',
  `store_url` varchar(50) NOT NULL,
  `reviews` smallint(5) unsigned NOT NULL COMMENT '评论数量',
  `stars` float(2,1) NOT NULL COMMENT '评分',
  `price` decimal(9,2) NOT NULL,
  `gm_num` smallint(5) unsigned NOT NULL COMMENT '跟卖数量',
  `gm_price` decimal(6,2) NOT NULL COMMENT '跟卖最低价',
  `color` varchar(10) NOT NULL COMMENT '颜色',
  `shipfee` decimal(7,2) NOT NULL DEFAULT '0.00' COMMENT '运费',
  `navs` varchar(60) NOT NULL COMMENT '分类导航',
  `title1` varchar(50) NOT NULL COMMENT '短标题',
  `title` varchar(100) NOT NULL COMMENT '长标题',
  `simg` varchar(150) NOT NULL COMMENT '小图片',
  `imgs` text NOT NULL COMMENT '产品图片',
  `maidian` varchar(255) NOT NULL COMMENT '卖点',
  `desc` text NOT NULL COMMENT '产品描述',
  `sizes` varchar(50) NOT NULL COMMENT '尺寸',
  `colors` varchar(50) NOT NULL COMMENT '同款的全部颜色',
  `addtime` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `cd_id` (`cd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品采集表';


DROP TABLE IF EXISTS `cd_store`;
CREATE TABLE `cd_store` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `store` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL COMMENT '国家',
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `store` (`store`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `store`;
CREATE TABLE `store` (
  `id` mediumint(7) unsigned NOT NULL AUTO_INCREMENT,
  `store_name` varchar(20) NOT NULL COMMENT '店铺名',
  `store_id` varchar(50) NOT NULL,
  `sellerID` varchar(50) NOT NULL COMMENT '负责人',
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `t_auth`;
CREATE TABLE `t_auth` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(20) NOT NULL COMMENT '权限名称',
  `pid` smallint(6) unsigned NOT NULL COMMENT '父id',
  `auth_c` varchar(32) NOT NULL DEFAULT '' COMMENT '控制器',
  `auth_a` varchar(32) NOT NULL DEFAULT '' COMMENT '操作方法',
  `is_nav` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否作为菜单显示 1是 0否',
  `icon` varchar(255) NOT NULL DEFAULT '&#xe60d' COMMENT '一级菜单头像',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `t_category`;
CREATE TABLE `t_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) DEFAULT NULL COMMENT '商品id',
  `name` varchar(500) NOT NULL DEFAULT '' COMMENT '类目名称',
  `cat_1` varchar(500) NOT NULL DEFAULT '' COMMENT '一级类目',
  `cat_2` varchar(500) NOT NULL DEFAULT '' COMMENT '二级类目',
  `cat_3` varchar(500) NOT NULL DEFAULT '' COMMENT '三级类目',
  `cat_4` varchar(500) NOT NULL DEFAULT '' COMMENT '四级类目',
  `cat_1_cn` varchar(500) NOT NULL DEFAULT '' COMMENT '一级类目中文名称',
  `cat_2_cn` varchar(500) NOT NULL DEFAULT '' COMMENT '二级类目中文名称',
  `cat_3_cn` varchar(500) NOT NULL DEFAULT '' COMMENT '三级类目中文名称',
  `cat_4_cn` varchar(500) NOT NULL DEFAULT '' COMMENT '四级类目中文名称',
  `name_cn` varchar(500) NOT NULL DEFAULT '' COMMENT '类目中文名称',
  `is_ean` int(4) NOT NULL DEFAULT '1' COMMENT '是否EAN',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `created_man` varchar(500) DEFAULT NULL COMMENT '创建人',
  `code` varchar(500) NOT NULL DEFAULT '' COMMENT '编码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='类别表';


DROP TABLE IF EXISTS `t_plat`;
CREATE TABLE `t_plat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plat` varchar(64) NOT NULL COMMENT '平台',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='平台表';


DROP TABLE IF EXISTS `t_role`;
CREATE TABLE `t_role` (
  `role_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL COMMENT '角色/用户组名称',
  `role_auth_ids` varchar(128) NOT NULL DEFAULT '' COMMENT '权限ids,1,2,5，权限表中的主键集合',
  `role_auth_ac` text COMMENT 'Goods-showlist,Goods-add,控制器-操作,控制器-操作,控制器-操作',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `realname` varchar(255) DEFAULT NULL COMMENT '用户昵称',
  `email` varchar(255) DEFAULT NULL COMMENT 'email',
  `qq` varchar(255) DEFAULT NULL COMMENT 'QQ',
  `phone` varchar(13) DEFAULT NULL COMMENT '手机号',
  `user_group_id` int(11) DEFAULT NULL COMMENT '角色ID',
  `login_count` varchar(255) NOT NULL DEFAULT '0' COMMENT 'login''s count',
  `status` tinyint(3) NOT NULL DEFAULT '1',
  `update_time` datetime DEFAULT NULL COMMENT 'updatetime',
  `create_man` varchar(500) DEFAULT NULL COMMENT 'creator',
  `create_time` datetime DEFAULT NULL COMMENT 'creattime',
  `last_time` datetime DEFAULT NULL COMMENT '上次登录时间',
  `usertype` varchar(255) NOT NULL DEFAULT '1' COMMENT '用户类型',
  `role_id` int(11) NOT NULL DEFAULT '10' COMMENT '角色id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE,
  KEY `fk_user_user_group1_idx` (`user_group_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';


-- 2018-06-04 03:29:27
