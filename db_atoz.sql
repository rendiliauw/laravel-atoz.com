# Host: localhost  (Version 5.5.5-10.1.35-MariaDB)
# Date: 2019-02-19 19:42:07
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (5,'2014_10_12_000000_create_users_table',1),(6,'2014_10_12_100000_create_password_resets_table',1),(7,'2019_02_17_022537_create_prepaids',1),(8,'2019_02_17_050821_create_products',1),(9,'2019_02_17_081123_create_orders',1),(10,'2019_02_19_104301_create_order_prepaid',2),(11,'2019_02_19_104340_create_order_product',2);

#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "password_resets"
#


#
# Structure for table "prepaids"
#

DROP TABLE IF EXISTS `prepaids`;
CREATE TABLE `prepaids` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "prepaids"
#

INSERT INTO `prepaids` VALUES (1,'10.000',10000.00,NULL,'2019-02-19 10:24:51','2019-02-19 10:24:51'),(2,'50.000',50000.00,NULL,'2019-02-19 10:25:00','2019-02-19 10:25:00'),(3,'100.000',100000.00,NULL,'2019-02-19 10:25:08','2019-02-19 10:25:08');

#
# Structure for table "products"
#

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "products"
#

INSERT INTO `products` VALUES (1,'KexTech Wireless-N WiFi Repeater 300Mbps - WL0189 - White','Lorem ipsum dolor sit, amet consectetur adipisicing elit. A cumque, hic rerum nobis enim nulla iusto eos deserunt officiis tempore!','foto_produk/a1vnyz1a6BoO5EM4V42yOR8FTWxRfm3EZnMvE33A.jpeg',150000.00,'2019-02-19 10:25:51','2019-02-19 15:20:54',NULL),(2,'Strontium Ammo USB 3.0 Flash Drive 16GB - SR16G-AMMOZ - Silver','Lorem ipsum dolor sit, amet consectetur adipisicing elit. A cumque, hic rerum nobis enim nulla iusto eos deserunt officiis tempore!','foto_produk/6xX0Kg0BlPlOvMAvEy1eAHH2Eepy9aF5uuhG9eJn.jpeg',200000.00,'2019-02-19 10:26:08','2019-02-19 10:26:08',NULL),(3,'TaffWare E17 Senter LED Cree XM-L T6 2000 Lumens - Black','Lorem ipsum dolor sit, amet consectetur adipisicing elit. A cumque, hic rerum nobis enim nulla iusto eos deserunt officiis tempore!','foto_produk/Q6se3nNbcGV8aKqoZR493q5IvqRQmb6NQXjvxTIr.jpeg',120000.00,'2019-02-19 10:26:22','2019-02-19 10:26:22',NULL),(4,'SanDisk Cruzer Blade USB Flash Drive 8GB (SDCZ50-008G-E11)','Lorem ipsum dolor sit, amet consectetur adipisicing elit. A cumque, hic rerum nobis enim nulla iusto eos deserunt officiis tempore!','foto_produk/8v6V0yqs0Fl4QBRTgZtI2rjK6034DR3QvmmqQqeB.jpeg',50000.00,'2019-02-19 10:27:08','2019-02-19 10:27:08',NULL),(5,'Sony MicroVault Entry USB 3.1 Flash Drive 32GB - USM32X - Black','Lorem ipsum dolor sit, amet consectetur adipisicing elit. A cumque, hic rerum nobis enim nulla iusto eos deserunt officiis tempore!','foto_produk/TtFWJnywao4uR7KKjzMimDDqPi8kVMtHG080xTv0.jpeg',100000.00,'2019-02-19 10:27:31','2019-02-19 10:27:31',NULL);

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('ADMIN','USER') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USER',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'Admin1','admin1@gmail.com',NULL,'$2y$10$VzDgYDD9xglsBVOvlUhYj.B/qd7FgU2lMF3rQUnS2dnT54m9iOOSW','ADMIN','Id3DIzYThejLTjLh5xNklBsU2OyJQnREZHhIUuInZ2i40r6ThpmHfViUVm3b','2019-02-19 10:24:05','2019-02-19 10:24:05'),(2,'Customer1','customer1@gmail.com',NULL,'$2y$10$yMla/Xds4/tZHP.rzG8PkO4og3P8AqpFgVrhlOKAbZA5Nc8vQbvrG','USER','2W7CUL6yI3tk2eRDKsb46W1aFT6D1fyWlV33hFMYLmda9qJuVcbErREC5X3a','2019-02-19 10:28:01','2019-02-19 10:28:01'),(3,'customer2','customer2@gmail.com',NULL,'$2y$10$rnVi6A/neSJinwVOZ7DKhuAxC8Sof2zB8njzozcse5MOCiF3NYNne','USER','FhSzfQV2RteDLOJTz6kocblAM8KqAhx654ABUNKTx7R1j0kMTb9PuaeqGstk','2019-02-19 15:12:33','2019-02-19 15:12:33');

#
# Structure for table "orders"
#

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `prepaid_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `invoice_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8_unicode_ci,
  `shipping_code` text COLLATE utf8_unicode_ci,
  `total_price` double(8,2) unsigned NOT NULL DEFAULT '0.00',
  `status` enum('SUCCESS','FAILED','CANCELED','UNPAID') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'UNPAID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "orders"
#

INSERT INTO `orders` VALUES (1,2,NULL,NULL,'203-1902-951','085883539077',NULL,NULL,10500.00,'SUCCESS','2019-02-19 10:59:34','2019-02-19 14:41:22'),(2,2,NULL,NULL,'446-1902-961','085883539077',NULL,NULL,10500.00,'SUCCESS','2019-02-19 11:00:36','2019-02-19 14:40:43'),(3,2,NULL,NULL,'164-1902-631','085883539077',NULL,NULL,10500.00,'SUCCESS','2019-02-19 11:02:01','2019-02-19 11:02:15'),(4,2,NULL,NULL,'385-1902-741','082311458012',NULL,NULL,1.05,'SUCCESS','2019-02-19 11:03:08','2019-02-19 11:03:14'),(5,2,NULL,NULL,'424-1902-421','085883539077',NULL,NULL,2.10,'SUCCESS','2019-02-19 11:03:57','2019-02-19 14:42:33'),(6,2,NULL,NULL,'459-1902-211','085883539077',NULL,NULL,1.05,'SUCCESS','2019-02-19 11:06:06','2019-02-19 11:06:13'),(7,2,NULL,NULL,'317-1902-361','082311458012',NULL,NULL,10500.00,'SUCCESS','2019-02-19 11:09:12','2019-02-19 14:42:44'),(8,2,NULL,NULL,'219-1902-761','085883539077',NULL,NULL,0.00,'SUCCESS','2019-02-19 11:10:51','2019-02-19 11:10:58'),(9,2,NULL,NULL,'385-1902-201','082311458012',NULL,NULL,0.00,'SUCCESS','2019-02-19 11:11:43','2019-02-19 11:11:52'),(10,2,NULL,NULL,'191-1902-801','085883539077',NULL,NULL,0.00,'SUCCESS','2019-02-19 11:12:10','2019-02-19 11:12:16'),(11,2,NULL,NULL,'242-1902-341','085883539077',NULL,NULL,2.10,'SUCCESS','2019-02-19 11:16:12','2019-02-19 11:16:15'),(12,2,NULL,NULL,'179-1902-291','085883539077',NULL,NULL,0.00,'SUCCESS','2019-02-19 11:26:42','2019-02-19 11:26:48'),(13,2,NULL,NULL,'421-1902-811','085883539077',NULL,NULL,10500.00,'SUCCESS','2019-02-19 11:28:17','2019-02-19 14:40:24'),(14,2,NULL,NULL,'367-1902-901','085883539077',NULL,NULL,10500.00,'SUCCESS','2019-02-19 11:28:39','2019-02-19 14:40:19'),(15,2,NULL,NULL,'270-1902-161',NULL,'Test','TUO95DHQJT',210000.00,'SUCCESS','2019-02-19 11:42:08','2019-02-19 11:43:16'),(16,2,NULL,NULL,'448-1902-801',NULL,'dd','OH0RRJ0ITA',210000.00,'SUCCESS','2019-02-19 11:43:51','2019-02-19 12:00:35'),(17,2,NULL,NULL,'298-1902-181',NULL,'Test','04UOO8E6KT',210000.00,'SUCCESS','2019-02-19 11:45:28','2019-02-19 11:58:03'),(18,2,NULL,NULL,'125-1902-371',NULL,'Test','AOEUDHPTEH',210000.00,'SUCCESS','2019-02-19 11:46:54','2019-02-19 11:57:52'),(19,2,NULL,NULL,'430-1902-371',NULL,'jl. manga','81OF9UIEJL',210000.00,'SUCCESS','2019-02-19 11:55:28','2019-02-19 11:55:33'),(20,2,NULL,NULL,'323-1902-301',NULL,'test','0CPUOLKO30',210000.00,'SUCCESS','2019-02-19 11:56:15','2019-02-19 11:56:30'),(21,2,NULL,NULL,'236-1902-611',NULL,'Test','RHT7AAREKS',210000.00,'SUCCESS','2019-02-19 11:58:16','2019-02-19 11:58:21'),(22,2,NULL,NULL,'128-1902-871','082311458012',NULL,NULL,10500.00,'SUCCESS','2019-02-19 13:12:24','2019-02-19 14:40:11'),(23,2,NULL,NULL,'428-1902-671','081345679999',NULL,NULL,10500.00,'SUCCESS','2019-02-19 13:17:47','2019-02-19 13:17:53'),(24,2,NULL,NULL,'356-1902-111',NULL,'Test','2PDFONO9NI',130000.00,'SUCCESS','2019-02-19 13:18:14','2019-02-19 13:18:19'),(25,2,NULL,NULL,'339-1902-961','085883539077',NULL,NULL,52500.00,'SUCCESS','2019-02-19 14:18:53','2019-02-19 14:18:58'),(26,2,NULL,NULL,'168-1902-571','085883539077',NULL,NULL,105000.00,'SUCCESS','2019-02-19 14:19:08','2019-02-19 14:39:24'),(27,2,NULL,NULL,'334-1902-551',NULL,'Jl. tanjung duren','5RODLBIJLK',210000.00,'SUCCESS','2019-02-19 14:19:20','2019-02-19 14:39:29'),(28,2,NULL,NULL,'476-1902-991','085883539077',NULL,NULL,10500.00,'SUCCESS','2019-02-19 14:38:18','2019-02-19 14:40:50'),(29,2,NULL,NULL,'108-1902-351',NULL,'Tanjung duren utara 9 No. 501 Grogol petamburan - jakarta barat','1LNSO43PC5',130000.00,'SUCCESS','2019-02-19 14:39:04','2019-02-19 15:40:31'),(30,3,NULL,NULL,'209-1902-701','085883539077',NULL,NULL,52500.00,'SUCCESS','2019-02-19 15:12:49','2019-02-19 15:12:55'),(31,3,NULL,NULL,'166-1902-341',NULL,'Jl. mangga 2 B 39 greenville - jakarta barat','ELU6CAKHTQ',130000.00,'SUCCESS','2019-02-19 15:13:14','2019-02-19 15:13:19'),(32,2,NULL,NULL,'280-1902-841','082311458012',NULL,NULL,10500.00,'SUCCESS','2019-02-19 15:31:12','2019-02-19 15:40:26'),(33,2,NULL,NULL,'488-1902-671','081345679999',NULL,NULL,52500.00,'SUCCESS','2019-02-19 15:38:13','2019-02-19 15:40:19'),(34,2,NULL,NULL,'494-1902-941','085883539077',NULL,NULL,10500.00,'SUCCESS','2019-02-19 15:41:38','2019-02-19 15:43:05'),(35,2,NULL,NULL,'135-1902-361','081345679999',NULL,NULL,52500.00,'CANCELED','2019-02-19 15:56:28','2019-02-19 16:00:21'),(36,2,NULL,NULL,'336-1902-391','081345679999',NULL,NULL,10500.00,'SUCCESS','2019-02-19 15:57:39','2019-02-19 15:59:33'),(37,2,NULL,NULL,'420-1902-711','085883539077',NULL,NULL,52500.00,'SUCCESS','2019-02-19 16:00:45','2019-02-19 16:00:49'),(38,2,NULL,NULL,'164-1902-231',NULL,'JL. tanjung duren utara 9 No 13','L3A6L25N2U',210000.00,'SUCCESS','2019-02-19 16:01:12','2019-02-19 16:01:16'),(39,2,NULL,NULL,'401-1902-421',NULL,'Jl. jend sudirman no 41 Toboali - bangka selatan','4CL5HJL9AG',210000.00,'SUCCESS','2019-02-19 16:01:48','2019-02-19 16:10:13'),(40,2,NULL,NULL,'215-1902-161',NULL,'Jl. jend sudirman no 41 Toboali - bangka selatan','S8HACMNBB7',60000.00,'SUCCESS','2019-02-19 16:01:56','2019-02-19 16:02:01'),(41,2,NULL,NULL,'163-1902-821',NULL,'Jl. jend sudirman no 41 Toboali - bangka selatan','8O2K5J610T',110000.00,'SUCCESS','2019-02-19 16:02:12','2019-02-19 16:09:47'),(42,2,NULL,NULL,'261-1902-681','081345679999',NULL,NULL,52500.00,'SUCCESS','2019-02-19 16:11:20','2019-02-19 16:12:44'),(43,2,NULL,NULL,'364-1902-741','081345679999',NULL,NULL,10500.00,'SUCCESS','2019-02-19 16:14:53','2019-02-19 16:16:27'),(44,2,NULL,NULL,'382-1902-241',NULL,'Jl. jend sudirman no 41 Toboali - bangka selatan',NULL,210000.00,'CANCELED','2019-02-19 16:17:21','2019-02-19 16:21:07'),(45,2,NULL,NULL,'163-1902-751','085883539077',NULL,NULL,52500.00,'SUCCESS','2019-02-19 16:19:44','2019-02-19 16:21:13'),(46,2,NULL,NULL,'143-1902-261','085883539077',NULL,NULL,52500.00,'SUCCESS','2019-02-19 16:21:35','2019-02-19 16:22:51'),(47,2,NULL,NULL,'373-1902-691','085883539077',NULL,NULL,10500.00,'CANCELED','2019-02-19 16:23:16','2019-02-19 19:40:02'),(48,2,NULL,NULL,'117-1902-351','085883539077',NULL,NULL,10500.00,'CANCELED','2019-02-19 16:23:50','2019-02-19 19:39:54'),(49,2,NULL,NULL,'423-1902-871',NULL,'Jl. jend sudirman no 41 Toboali - bangka selatan',NULL,130000.00,'CANCELED','2019-02-19 16:23:59','2019-02-19 19:39:41'),(50,2,NULL,NULL,'281-1902-581','085883539077',NULL,NULL,10500.00,'FAILED','2019-02-19 19:40:13','2019-02-19 19:40:18');

#
# Structure for table "order_prepaid"
#

DROP TABLE IF EXISTS `order_prepaid`;
CREATE TABLE `order_prepaid` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `prepaid_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_prepaid_prepaid_id_foreign` (`prepaid_id`),
  KEY `order_prepaid_order_id_foreign` (`order_id`),
  CONSTRAINT `order_prepaid_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `order_prepaid_prepaid_id_foreign` FOREIGN KEY (`prepaid_id`) REFERENCES `prepaids` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "order_prepaid"
#

INSERT INTO `order_prepaid` VALUES (3,8,1,NULL,NULL),(4,9,1,NULL,NULL),(5,10,2,NULL,NULL),(6,11,2,NULL,NULL),(7,12,1,NULL,NULL);

#
# Structure for table "order_product"
#

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE `order_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_product_product_id_foreign` (`product_id`),
  KEY `order_product_order_id_foreign` (`order_id`),
  CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "order_product"
#

INSERT INTO `order_product` VALUES (1,19,2,NULL,NULL),(2,20,2,NULL,NULL),(3,21,2,NULL,NULL),(4,24,3,NULL,NULL),(5,27,2,NULL,NULL),(6,29,3,NULL,NULL),(7,31,3,NULL,NULL),(8,38,2,NULL,NULL),(9,39,2,NULL,NULL),(10,40,4,NULL,NULL),(11,41,5,NULL,NULL),(12,44,2,NULL,NULL),(13,49,3,NULL,NULL);
