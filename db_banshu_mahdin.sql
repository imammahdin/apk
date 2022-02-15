/*
 Navicat Premium Data Transfer

 Source Server         : PgSql
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : db_banshu_mahdin

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 15/02/2022 13:48:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_customer
-- ----------------------------
DROP TABLE IF EXISTS `tb_customer`;
CREATE TABLE `tb_customer`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `customer_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `customer_address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `customer_phone` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_customer
-- ----------------------------
INSERT INTO `tb_customer` VALUES (1, 'CUS-0001', 'Pecel Lele', 'Jakarta Barat', '085546982020');
INSERT INTO `tb_customer` VALUES (2, 'CUS-0002', 'Hamba Allah', 'Surga', '09128380192');
INSERT INTO `tb_customer` VALUES (3, 'CUS-0003', 'A', 'Rancaekek', '1133313');

-- ----------------------------
-- Table structure for tb_item
-- ----------------------------
DROP TABLE IF EXISTS `tb_item`;
CREATE TABLE `tb_item`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `item_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `price_sell` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `price_buy` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `customer_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `vendor_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_item
-- ----------------------------
INSERT INTO `tb_item` VALUES (1, 'ITM-001', 'Buku', '1500', '1000', '0', 'CUS-0002', 'VEN-0003');
INSERT INTO `tb_item` VALUES (2, 'ITM-002', 'Nabati', '4000', '3000', '0', 'CUS-0001', 'VEN-0002');
INSERT INTO `tb_item` VALUES (4, 'ITM-004', 'Tutut', '6000', '5000', '0', 'CUS-0002', 'VEN-0005');
INSERT INTO `tb_item` VALUES (5, 'ITM-005', 'Telor Gulung', '6000', '5000', '0', 'CUS-0001', 'VEN-0006');
INSERT INTO `tb_item` VALUES (6, 'ITM-006', 'Cuanki', '5000', '3000', '0', 'CUS-0002', 'VEN-0002');
INSERT INTO `tb_item` VALUES (7, 'ITM-007', 'Odading', '50000', '40000', '0', 'CUS-0001', 'VEN-0005');
INSERT INTO `tb_item` VALUES (8, 'ITM-008', 'Comro', '3000', '2000', '', 'CUS-0001', 'VEN-0007');

-- ----------------------------
-- Table structure for tb_transaction
-- ----------------------------
DROP TABLE IF EXISTS `tb_transaction`;
CREATE TABLE `tb_transaction`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `transaction_type` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `item_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 75 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_transaction
-- ----------------------------
INSERT INTO `tb_transaction` VALUES (62, 'IN', 'ITM-001', '40', '2022-01-20');
INSERT INTO `tb_transaction` VALUES (63, 'IN', 'ITM-001', '50', '2022-01-21');
INSERT INTO `tb_transaction` VALUES (64, 'OUT', 'ITM-001', '20', '2022-01-21');
INSERT INTO `tb_transaction` VALUES (65, 'IN', 'ITM-001', '20', '2022-01-22');
INSERT INTO `tb_transaction` VALUES (67, 'OUT', 'ITM-001', '10', '2022-01-22');
INSERT INTO `tb_transaction` VALUES (68, 'IN', 'ITM-001', '20', '2022-01-23');
INSERT INTO `tb_transaction` VALUES (69, 'OUT', 'ITM-001', '90', '2022-01-24');
INSERT INTO `tb_transaction` VALUES (70, 'IN', 'ITM-002', '50', '2022-01-21');
INSERT INTO `tb_transaction` VALUES (71, 'OUT', 'ITM-002', '20', '2022-01-22');
INSERT INTO `tb_transaction` VALUES (72, 'IN', 'ITM-001', '20', '2022-01-25');
INSERT INTO `tb_transaction` VALUES (74, 'OUT', 'ITM-001', '30', '2022-01-26');

-- ----------------------------
-- Table structure for tb_vendor
-- ----------------------------
DROP TABLE IF EXISTS `tb_vendor`;
CREATE TABLE `tb_vendor`  (
  `vendor_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `vendor_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `vendor_address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `vendor_phone` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_vendor
-- ----------------------------
INSERT INTO `tb_vendor` VALUES ('VEN-0001', 'PT Sahabat Utama', 'Jakarta Barat', '085546982020');
INSERT INTO `tb_vendor` VALUES ('VEN-0002', 'PT Surya Makmur', 'Tangerang', '081986700103');
INSERT INTO `tb_vendor` VALUES ('VEN-0003', 'PT Gading Murni', 'Bandung', '082146982011');
INSERT INTO `tb_vendor` VALUES ('VEN-0004', 'PT Pupuk Kujang', 'Cikampek', '0812773666');
INSERT INTO `tb_vendor` VALUES ('VEN-0005', 'PT Yakjin', 'Sumedang', '2002938');
INSERT INTO `tb_vendor` VALUES ('VEN-0006', 'PT Kahatex', 'Rancaekek', '1133313');
INSERT INTO `tb_vendor` VALUES ('VEN-0007', 'PT.Pupuk Indonesia', 'CIKAMPEK', '0812773666');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telepon` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'member',
  `foto` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (18, '1900120001', 'admin', '', '0811228890', 'admin', 'e39622164d485c2dc8970f518b0189cd', 'superadmin', 'banshu.png');

SET FOREIGN_KEY_CHECKS = 1;
