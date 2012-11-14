/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50522
Source Host           : localhost:3306
Source Database       : order

Target Server Type    : MYSQL
Target Server Version : 50522
File Encoding         : 65001

Date: 2012-11-14 13:39:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `acknowledgeable`
-- ----------------------------
DROP TABLE IF EXISTS `acknowledgeable`;
CREATE TABLE `acknowledgeable` (
  `acknowledgeable_id` int(11) NOT NULL AUTO_INCREMENT,
  `acknowledgeable` varchar(500) NOT NULL,
  `order_my_id` int(11) NOT NULL,
  PRIMARY KEY (`acknowledgeable_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of acknowledgeable
-- ----------------------------
INSERT INTO `acknowledgeable` VALUES ('1', 'Google', '0');
INSERT INTO `acknowledgeable` VALUES ('2', 'Facebook', '0');
INSERT INTO `acknowledgeable` VALUES ('3', 'Friends', '0');
INSERT INTO `acknowledgeable` VALUES ('4', 'Relatives', '0');

-- ----------------------------
-- Table structure for `bank`
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank` varchar(500) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bank
-- ----------------------------
INSERT INTO `bank` VALUES ('1', 'Maybank');
INSERT INTO `bank` VALUES ('2', 'CIMB');
INSERT INTO `bank` VALUES ('3', 'Paypal');
INSERT INTO `bank` VALUES ('4', 'Cash');

-- ----------------------------
-- Table structure for `client`
-- ----------------------------
DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client` varchar(500) NOT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `address_client` varchar(500) NOT NULL,
  `phone_client` varchar(10) NOT NULL,
  `email_client` varchar(100) DEFAULT NULL,
  `facebook_id_client` varchar(5000) DEFAULT NULL,
  `twitter_id_client` varchar(5000) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of client
-- ----------------------------
INSERT INTO `client` VALUES ('1', 'Khairatul Nainey Bt Kamaruddin', '', '', 'JKR-1655-DA1, Kuarters Klinik Kesihatan Teluk Intan, Jalan Bandar, 36000 Teluk Intan, Perak.', '0193363671', 'nicknacks82@yahoo.com', null, null, '2');
INSERT INTO `client` VALUES ('2', 'Nazirah Bt Mohamad Sham', '', '', 'No 1487, Jalan Bangau Kampung Dato Ahmad Said Tambatan 2, 30020 Ipoh, Perak.', '0174050876', 'arexy_24@yahoo.com', null, null, '2');
INSERT INTO `client` VALUES ('3', 'Aina Edura Bt Abdul Shukor', '', '', '268, Jalan F2, Fasa 5, Taman Melewati 53100, Kuala Lumpur.', '0193713150', 'fienaedura@gmail.com', null, null, '2');
INSERT INTO `client` VALUES ('4', 'Norshafiqah Bt Mohamad', '', '', 'No 7, Jalan PUJ 2/51 Taman Puncak Jalil, Bandar Putra Permai, Seri Kembangan, 43300 Selangor.', '', '', null, null, '2');
INSERT INTO `client` VALUES ('5', 'Marhayati Bt Yusoff', '', '', 'Kejuruteraan QKS SDN BHD, Block Camilia, 10 Boulevard, Lebuhraya Sprint PJU 6A, 47400 Petaling Jaya, Selangor.', '0133394851', '', null, null, '2');
INSERT INTO `client` VALUES ('6', 'Rosmawati Bt Zakaria', '', '', 'Richbill Freight SVS SDN BHD, Lot 834 Jalan Subang 7, Kawasan Perindustrian Subang, OFF Persiaran Subang, 47500 Subang Jaya, Selangor.', '0126045260', '', null, null, '2');
INSERT INTO `client` VALUES ('7', 'Haniza Bt Rahmat', '', '', '4-394, Jalan Canggang, Taman Ria Jaya, 08000 Sungai Petani, Kedah.', '0173122539', '', null, null, '2');
INSERT INTO `client` VALUES ('8', 'Amalina Bt Abdul Razak', '', '', 'No 12, Jalan Sembilang 2, Taman Teluk Pulai, 41100 Klang, Selangor.', '0164032036', 'babytomeimall@gmail.com', null, null, '2');
INSERT INTO `client` VALUES ('9', 'Hazianura Bt Haron', '', '', 'Pejabat Imigresen KUKUP, 82300 Kukup, Pontian, Johor.', '0127004200', '', null, null, '2');
INSERT INTO `client` VALUES ('10', 'Nazreen Nadia Bt Mat Isa', '', '', 'F422, Kampung Pulau Sepom, Tikam Batu, 08600 Sungai Petani, Kedah.', '0139339905', 'nad_bab87@yahoo.com', null, null, '2');
INSERT INTO `client` VALUES ('11', 'Nur Azmina Bt Paslan', '', '', '47, Solok Kampung Jawa 7, 11900 Bayan Lepas, Pulau Pinang.', '0134522903', '', null, null, '2');
INSERT INTO `client` VALUES ('12', 'Nor Ain Bt Hamzah', '', '', 'Kedai Ayam Hamzah, MR II, KM 5, Jalan Maran, Sebelah BHP Paya Pulai, 28000, Temerloh, Pahang.', '0179060809', 'rieyn_pinky@yahoo.com', null, null, '2');
INSERT INTO `client` VALUES ('13', 'Khairunnisa Bt Zulhairi', '', '', 'Institut Pendidikan Guru, Kampus Sultan Mizan, 22200 Besut, Terengganu.', '0177989083', 'khai_nisa18@yahoo.com', null, null, '2');
INSERT INTO `client` VALUES ('14', 'Jamaliah Bt Md Saad', '', '', 'Jabatan Perhilitan Daerah Sabak Bernam,Jalan Lama, Sungai Haji Dorani,45300, Sungai Besar, Selangor.', '0193893811', '', null, null, '2');
INSERT INTO `client` VALUES ('15', 'Norliza Bt Romizi', '', '', 'Advance Touch Sdn Bhd, Lot 18, Jalan T1AJ 2/5, Taman Industri Alam Jaya, 42300 Puncak Alam, Selangor.', '0193006195', '', null, null, '2');
INSERT INTO `client` VALUES ('16', 'Muneerah Bt Rohaizat', '', '', '208B, Mahallah Zainab Jahsy, Centre for Foundation Studies IIUM, Jalan Universiti 46350 Petaling Jaya, Selangor.', '0172431083', 'hanxia93@gmail.com', null, null, '2');
INSERT INTO `client` VALUES ('17', 'Shahrina Bt Jaies', '', '', 'Siacon Technology Sdn Bhd, 27B, Jalan Canggih 2, Taman Perindustrian Cemerlang, 81700 Ulu Tiram, Johor.', '0127927911', 'nurulshahrinajais@yahoo.com.my', null, null, '2');
INSERT INTO `client` VALUES ('18', 'Norhafizaton Bt Halaluddin', '', '', '693-5, Jalan Pejabat Hutan, Kampung Baru Kerteh, 24300, Terengganu.', '0199086382', '', null, null, '2');
INSERT INTO `client` VALUES ('19', 'DK Siti Rohana Pg Rajudin', '', '', 'No 7302, Jalan Seligi 5, Bandar Baru Kerteh, 24300 Kemaman Terengganu.', '0197447818', '', null, null, '2');
INSERT INTO `client` VALUES ('20', 'Noni Bt Salim', '', '', '121, Simpang 3, Teluk Kumbar, 11920, Bayan Lepas, Pulau Pinang.', '0196401662', '', null, null, '2');
INSERT INTO `client` VALUES ('21', 'Nik Aida Fazila Bt Nik Abdul Majid', '', '', 'Lot 3251, Batu 6 1/2, Jalan Puchong, 58200 Petaling, Kuala Lumpur.', '0123461592', 'wsc8454@gmail.com', null, null, '2');
INSERT INTO `client` VALUES ('22', 'Najmi B Mohamad', '', '', 'Bank Kerjasama Rakyat Malaysia Bhd, Cawangan Jerantut, 27000 Jerantut, Pahang.', '0129619282', 'najmi1978@yahoo.com', null, null, '2');
INSERT INTO `client` VALUES ('23', 'Liza Bt Sait', '', '', 'Ajinomoto (M) Bhd, No 39 Jalan Rosmerah 3/1, Taman Johor Jaya, 81100 Johor.', '0127567027', 'irliza@hotmail.com', null, null, '2');
INSERT INTO `client` VALUES ('24', 'Nur Salsabila Bt Kamarul Ariffin', '', '', 'No 7, Taman Jaya 3, 28000 Temerloh, Pahang.', '0139162432', 'ustazah_sal@yahoo.com', null, null, '2');
INSERT INTO `client` VALUES ('25', 'Norliza Bt Abu Baker', '', '', 'No 61, Jalan Muhibbah 4, Taman Muhibbah, 43000, Kajang, Selangor.', '0125048769', '', null, null, '2');
INSERT INTO `client` VALUES ('26', 'Wanis Anis', '', '', 'No 568-9-14B, Mutiara Kompleks, Batu 3 1/2, Jalan Ipoh, 05200 Kuala Lumpur.', '0174190884', '', null, null, '2');
INSERT INTO `client` VALUES ('27', 'Suhaila Bt Idris', '', '', 'Institut Pendidikan Guru Kampus Perempuan Melayu, 75400, Durian Daun, Melaka.', '0177306687', '', null, null, '2');
INSERT INTO `client` VALUES ('28', 'Melisa Bt A. Rahman', '', '', 'No 8, Jalan Ros 3, Taman Ros, Jalan Kampung Parit Haji Sidek, 83000 Batu Pahat, Johor.', '0197700901', 'omey_lisa@yahoo.com', null, null, '2');
INSERT INTO `client` VALUES ('29', 'Aida Bt Aziz', '', '', 'Matrix Flavours & Fragrances Sdn Bhd, Lot 2944, Jalan Enggang, 42500 Telok Panglima Garang, Selangor.', '0126608004', 'daniazidane@yahoo.com', null, null, '2');
INSERT INTO `client` VALUES ('30', 'Ratnawati Bt Abd Razak', '', '', 'Lot 1250, Jalan Piasau Jaya 2F, 98000 Miri, Sarawak.', '0146808480', '', null, null, '2');
INSERT INTO `client` VALUES ('31', 'Rose Marina Bt Md Zin', '', '', 'No 13, Jalan F/J2, Taman Flora Jaya PT Besar, 83000 Batu Pahat, Johor.', '0137303430', '', null, null, '2');
INSERT INTO `client` VALUES ('32', 'Sarimah Bt Mohd Don', '', '', '462, Jalan Cekal 9, Taman Sri Lambak, 86000 Kluang, Johor.', '0197966397', '', null, null, '2');
INSERT INTO `client` VALUES ('33', 'Fatin Nur Alia Bt Mohammad Sazali', '', '', 'No 161 Kampung Parit Pulai, 84400 Serom Ledang, Johor.', '0167016370', 'aliasazali_92@ymail.com', null, null, '2');
INSERT INTO `client` VALUES ('35', 'Haslinda Adila', '', '', '3-2, Jalan PJU 7/7A, Mutiara Damansara, 47810 Petaling Jaya, Selangor.', '0192289291', '', null, null, '2');
INSERT INTO `client` VALUES ('36', 'Nor Afifah Bt Mohd Baharuddin', '', '', 'No 1, Jalan 7A, Taman Bayu, 45000 Kuala Selangor, Selangor.', '0199099220', '', null, null, '2');
INSERT INTO `client` VALUES ('37', 'Norfadila Bt Kasim', '', '', 'Perpustakaan Utama Universiti Malaya, Lembah Pantai, 50603 Kuala Lumpur.', '0123591432', 'puteri_nooradiella@yahoo.com', null, null, '2');
INSERT INTO `client` VALUES ('38', 'Nursafiah Bt Yahya', '', '', 'Lot 17, Senawang Commercial Park, Phase 1 Pekan Senawang, 70450 Seremban, Negeri Sembilan.', '0136421337', '', null, null, '2');
INSERT INTO `client` VALUES ('39', 'Farah Leeza', '', '', 'No 21, Jalan Prima 7/11, Taman Puchong Prima, 47150 Puchong, Selangor.', '0196661769', '', null, null, '2');
INSERT INTO `client` VALUES ('40', 'Nor \'Aqilah Bt Abd Manas', '', '', 'Felcra Berhad Sungai Ling, Kampung Sungai Ling Baru, 28100 Chenor, Pahang.', '0147945147', '', null, null, '2');
INSERT INTO `client` VALUES ('41', 'Puteri Farihah Bt Megat Husin', '', '', 'Dell Asia Pasific Bayan Lepas, Plot P27 Bayan Lepas Industrial Zone Phase IV, 11900 Bayan Lepas, Penang.', '0124906401', 'put3farihah@yahoo.com', null, null, '2');
INSERT INTO `client` VALUES ('42', 'Muniroh Bt Abu Bakar', '', '', 'Pejabat Belia Dan Sukan Daerah Langkawi, Tingkat 1, Kompleks Sukan Perahu Layar Kebangsaan, Pokok Asam, Kuah 07000 Langkawi, Kedah.', '0194308523', 'munie_sagitterius83@yahoo.com', null, null, '2');
INSERT INTO `client` VALUES ('43', 'Linda Bt Hamzah', '', '', 'Ibu Pejabat Polis Daerah Kerian, 34300 Bagan Serai, Perak.', '0194277789', '', null, null, '2');
INSERT INTO `client` VALUES ('44', 'Maizatul Haniza Bt Ismail', '', '', '604, Blok 58, Apartment Alunan Bayu, Jalan Timun 24/1, Section 24, Shah Alam, Selangor.', '0194744182', '', null, null, '2');
INSERT INTO `client` VALUES ('45', 'Siti Nuradzra Bt Zulkafli', '', '', 'A-G-16, Alpine Village Apartment, Persiaran Lagun Sunway, Sunway City Ipoh, 31150, Ipoh, Perak.', '0129458973', 'eastkiev@gmail.com', null, null, '2');
INSERT INTO `client` VALUES ('46', 'Mariana Bt Jumari', '', '', 'Agensi Anti Dadah Kebangsaan, Jalan Maktab Perguruan Islam, 43000 Kajang, Selangor.', '0122163100', '', null, null, '2');
INSERT INTO `client` VALUES ('47', 'Hidayatul Atiqah Bt Mohd Sabri', '', '', 'No 5, Jalan Jelok Impian 6, Taman Jelok Impian, 43000 Kajang, Selangor.', '0163744203', 'atiqah_najah@yahoo.com', null, null, '2');
INSERT INTO `client` VALUES ('48', 'Nooruldila Bt Jamaludin', '', '', 'Hospital Tanjong Karang, 45500 Tanjong Karang, Selangor.', '0172114674', '', null, null, '2');
INSERT INTO `client` VALUES ('49', 'Murnie Shakilla Bt Shidan', '', '', 'B1-5A-2-A, Kolej Kediaman UTeM Bunga Raya, Pangsapuri Bunga Raya, 75450 Bukit Beruang, Melaka.', '0146383042', '', null, null, '2');
INSERT INTO `client` VALUES ('50', 'Suzana Bt Saad', '', '', 'No 15, Lorong 11/4, Taman Desa Rhu, 70490 Sikamat, Seremban, Negeri Sembilan.', '0176778915', '', null, null, '2');
INSERT INTO `client` VALUES ('51', 'Faizatul Bt Ja\'afar Sidek', '', '', 'Lot 2242 Jalan Rajawali, BT 9 Kebun Bahru, 42500 Telok Panglima Garang, Selangor.', '0126421203', '', null, null, '2');
INSERT INTO `client` VALUES ('52', 'Norazimah Bt Ismail @ Mat Daud', '', '', 'PT 477 Jalan 5 Desa Darulnaim, Pasir Tumbuh, 16150 Kota Bharu, Kelantan.', '0129906011', '', null, null, '2');
INSERT INTO `client` VALUES ('53', 'Safiah Bt Ahmad Sukri', '', '', 'Syarikat Takaful Malaysia, No 28, Jalan Perda Barat 1, Bandar Baru Perda, 14000 Bukit Mertajam, Pulau Pinang.', '0194299801', 'safiah.ahmadsukri@yahoo.com', null, null, '2');
INSERT INTO `client` VALUES ('54', 'Azaliha Abdullah', 'azaliha', '123123', 'No. 72, Jalan Keranji 11, Taman Keranji, 05400, Alor Setar, Kedah', '0162052420', 'azaliha@gmail.com', null, null, '1');
INSERT INTO `client` VALUES ('55', 'Zahirah Shadin', 'zahirah', '123123', '8, Taman Desa Pulai, Jalan Padang Behor, 01000 Kangar, Perlis.', '0195711909', 'zahirah@gmail.com', null, null, '1');
INSERT INTO `client` VALUES ('58', 'Nur Idayu Bt mohd safie', null, null, 'smk telupid, peti surat 02, telupid,89300 sabah.', '0129159392', 'xx@gmail.com', '', '', '2');
INSERT INTO `client` VALUES ('59', 'Noorazura Binti Asnawi', null, null, 'No 37, Jalan SP 4/11, Bandar Saujana Putra, 42610 Jenjarom, Selangor.', '0196081502', 'xx1@gmail.com', '', '', '2');
INSERT INTO `client` VALUES ('60', 'Maryani Bt Haron', null, null, '4355, Jalan Samarinda 9, Taman Samarinda, Pengkalan,78000 Alor Gajah, Melaka.', '0197741810', 'xx2@gmail.com', '', '', '2');
INSERT INTO `client` VALUES ('61', 'Nor Asfazilah Binti Abdullah', null, null, '8914 Jln Kiri 2, Kg Nakhoda, 68100, Batu Caves, Selangor', '0133470988', 'asfazilah@yahoo.com', '', '', '2');
INSERT INTO `client` VALUES ('62', 'Norazliah Bt Ani', null, null, 'SMK Ringlet, 39200 Ringlet, Cameron Highlands, Pahang.', '0125507095', 'xx3@gmail.com', '', '', '2');
INSERT INTO `client` VALUES ('63', 'Anis Fairuznajua Bt Mohamad', null, null, 'No 318, Jalan Desa Aman S8/8, Taman Desa Aman, 09410 Padang Serai, Kulim, Kedah.', '0174554820', 'xx4@gmail.com', '', '', '2');
INSERT INTO `client` VALUES ('64', 'Maslinda Binti Mohamad', null, null, 'No 21, Jalan 15, Taman Berlian, Sungai Jelok, 43000 Kajang, Selangor.', '0123414162', 'xx5@gmail.com', '', '', '2');
INSERT INTO `client` VALUES ('65', 'Dahniar Bt Hussain', null, null, 'Lot 2027 D, 47000 Sungai Buloh, Selangor.', '0162128490', 'dahniarfamily@yahoo.com', '', '', '2');
INSERT INTO `client` VALUES ('66', 'Rozita Bt Sahir', null, null, 'LOT 1044 KG BARU ASSAM JAWA\r\n45700 BUKIT ROTAN\r\nSELANGOR.', '0147162393', 'daniashop@yahoo.com', '', '', '2');

-- ----------------------------
-- Table structure for `color`
-- ----------------------------
DROP TABLE IF EXISTS `color`;
CREATE TABLE `color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(255) NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of color
-- ----------------------------
INSERT INTO `color` VALUES ('1', 'Nude');
INSERT INTO `color` VALUES ('2', 'Grey');
INSERT INTO `color` VALUES ('3', 'Coffee');
INSERT INTO `color` VALUES ('4', 'Black');
INSERT INTO `color` VALUES ('6', 'None');

-- ----------------------------
-- Table structure for `delivery_address`
-- ----------------------------
DROP TABLE IF EXISTS `delivery_address`;
CREATE TABLE `delivery_address` (
  `delivery_address_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_my_id` int(11) NOT NULL,
  `delivery_info_id` int(11) DEFAULT NULL,
  `name_delivery` varchar(500) DEFAULT NULL,
  `address_delivery` varchar(500) NOT NULL,
  `phone_delivery` int(11) DEFAULT NULL,
  `email_delivery` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`delivery_address_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of delivery_address
-- ----------------------------

-- ----------------------------
-- Table structure for `delivery_info`
-- ----------------------------
DROP TABLE IF EXISTS `delivery_info`;
CREATE TABLE `delivery_info` (
  `delivery_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_my_id` int(11) NOT NULL,
  `delivery_type_id` int(11) NOT NULL,
  `delivery_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tracking_no` varchar(20) DEFAULT NULL,
  `delivered_by` varchar(500) NOT NULL,
  PRIMARY KEY (`delivery_info_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of delivery_info
-- ----------------------------

-- ----------------------------
-- Table structure for `delivery_type`
-- ----------------------------
DROP TABLE IF EXISTS `delivery_type`;
CREATE TABLE `delivery_type` (
  `delivery_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_type` varchar(500) NOT NULL,
  PRIMARY KEY (`delivery_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of delivery_type
-- ----------------------------
INSERT INTO `delivery_type` VALUES ('1', 'Poslaju');
INSERT INTO `delivery_type` VALUES ('2', 'By Hand');
INSERT INTO `delivery_type` VALUES ('3', 'AirMail');
INSERT INTO `delivery_type` VALUES ('6', 'Pos Daftar');

-- ----------------------------
-- Table structure for `exchange`
-- ----------------------------
DROP TABLE IF EXISTS `exchange`;
CREATE TABLE `exchange` (
  `exchange_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `exchange_approve` decimal(1,0) NOT NULL DEFAULT '0',
  `return_tracking_no` varchar(255) NOT NULL,
  `date_exchange` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `size_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`exchange_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of exchange
-- ----------------------------

-- ----------------------------
-- Table structure for `feedback`
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_my_id` int(11) NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feedback
-- ----------------------------

-- ----------------------------
-- Table structure for `group`
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(500) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of group
-- ----------------------------
INSERT INTO `group` VALUES ('1', 'Admin');
INSERT INTO `group` VALUES ('2', 'Client');
INSERT INTO `group` VALUES ('3', 'Agent');

-- ----------------------------
-- Table structure for `item`
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(500) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO `item` VALUES ('6', 'Xtraslim', '169.00');
INSERT INTO `item` VALUES ('7', 'Magnetik', '159.00');
INSERT INTO `item` VALUES ('8', 'Ultraslim', '230.00');
INSERT INTO `item` VALUES ('9', 'Losyen', '10.00');
INSERT INTO `item` VALUES ('10', 'Bengkung Lengan', '15.00');
INSERT INTO `item` VALUES ('11', 'Losyen (100ml X 24)', '356.00');

-- ----------------------------
-- Table structure for `method_order`
-- ----------------------------
DROP TABLE IF EXISTS `method_order`;
CREATE TABLE `method_order` (
  `method_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `method_order` varchar(255) NOT NULL,
  PRIMARY KEY (`method_order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of method_order
-- ----------------------------
INSERT INTO `method_order` VALUES ('1', 'SMS');
INSERT INTO `method_order` VALUES ('2', 'Email');
INSERT INTO `method_order` VALUES ('3', 'Facebook');
INSERT INTO `method_order` VALUES ('4', 'Phone Call');
INSERT INTO `method_order` VALUES ('5', 'Website');

-- ----------------------------
-- Table structure for `mode_payment`
-- ----------------------------
DROP TABLE IF EXISTS `mode_payment`;
CREATE TABLE `mode_payment` (
  `mode_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `mode_payment` varchar(255) NOT NULL,
  PRIMARY KEY (`mode_payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mode_payment
-- ----------------------------
INSERT INTO `mode_payment` VALUES ('1', 'Online Banking');
INSERT INTO `mode_payment` VALUES ('2', 'Interbank Transfer');
INSERT INTO `mode_payment` VALUES ('3', 'Cash Deposit Machine');
INSERT INTO `mode_payment` VALUES ('4', 'Cheque Deposit Machine');
INSERT INTO `mode_payment` VALUES ('5', 'COD');
INSERT INTO `mode_payment` VALUES ('7', 'TT Transfer');

-- ----------------------------
-- Table structure for `order_item`
-- ----------------------------
DROP TABLE IF EXISTS `order_item`;
CREATE TABLE `order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_my_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` decimal(15,2) NOT NULL,
  `total_price` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_item
-- ----------------------------

-- ----------------------------
-- Table structure for `order_my`
-- ----------------------------
DROP TABLE IF EXISTS `order_my`;
CREATE TABLE `order_my` (
  `order_my_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_order` datetime NOT NULL,
  `method_order_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `order_type_id` int(11) NOT NULL,
  `order_status` int(1) NOT NULL,
  PRIMARY KEY (`order_my_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_my
-- ----------------------------

-- ----------------------------
-- Table structure for `order_type`
-- ----------------------------
DROP TABLE IF EXISTS `order_type`;
CREATE TABLE `order_type` (
  `order_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(500) NOT NULL,
  PRIMARY KEY (`order_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_type
-- ----------------------------
INSERT INTO `order_type` VALUES ('1', 'Retail');
INSERT INTO `order_type` VALUES ('2', 'Dropshipping');
INSERT INTO `order_type` VALUES ('3', 'Affiliate');
INSERT INTO `order_type` VALUES ('4', 'Wholesale');

-- ----------------------------
-- Table structure for `payment_info`
-- ----------------------------
DROP TABLE IF EXISTS `payment_info`;
CREATE TABLE `payment_info` (
  `payment_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_my_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `total_payment` int(11) NOT NULL,
  `mode_payment_id` int(11) NOT NULL,
  `date_payment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ref_no` varchar(500) NOT NULL,
  PRIMARY KEY (`payment_info_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of payment_info
-- ----------------------------

-- ----------------------------
-- Table structure for `size`
-- ----------------------------
DROP TABLE IF EXISTS `size`;
CREATE TABLE `size` (
  `size_id` int(11) NOT NULL AUTO_INCREMENT,
  `size` varchar(500) NOT NULL,
  PRIMARY KEY (`size_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of size
-- ----------------------------
INSERT INTO `size` VALUES ('4', 'XL');
INSERT INTO `size` VALUES ('2', 'M');
INSERT INTO `size` VALUES ('3', 'L');
INSERT INTO `size` VALUES ('5', '2XL');
INSERT INTO `size` VALUES ('6', '3XL');
INSERT INTO `size` VALUES ('7', '4XL');
INSERT INTO `size` VALUES ('8', '5XL');
INSERT INTO `size` VALUES ('9', '6XL');
INSERT INTO `size` VALUES ('12', '100ml');
INSERT INTO `size` VALUES ('13', 'None');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `agent_id` int(12) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `agent` varchar(500) NOT NULL,
  `address_agent` varchar(5000) NOT NULL,
  `phone_agent` varchar(11) NOT NULL,
  `email_agent` varchar(500) NOT NULL,
  `facebook_id_agent` varchar(500) DEFAULT NULL,
  `twitter_id_agent` varchar(500) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`agent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '', '', 'Azaliha Abdullah', '72, Jalan Keranji 11, Taman Keranji, Alor Mengkudu, 05400, Alor Setar, Kedah', '0162052420', 'azaliha@gmail.com', 'facebook.com/azaliha', null, '1');

-- ----------------------------
-- View structure for `client_list`
-- ----------------------------
DROP VIEW IF EXISTS `client_list`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `client_list` AS select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status` from (((`order_my` join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`))) join `client` on((`client`.`client_id` = `order_my`.`client_id`))) join `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`))) order by `client`.`client` ;

-- ----------------------------
-- View structure for `delivery_info_view`
-- ----------------------------
DROP VIEW IF EXISTS `delivery_info_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `delivery_info_view` AS select `delivery_info`.`delivery_info_id` AS `delivery_info_id`,`delivery_info`.`order_my_id` AS `order_my_id`,`delivery_type`.`delivery_type` AS `delivery_type`,`delivery_info`.`delivery_date` AS `delivery_date`,`delivery_info`.`tracking_no` AS `tracking_no`,`delivery_info`.`delivered_by` AS `delivered_by`,`delivery_address`.`name_delivery` AS `name_delivery`,`delivery_address`.`address_delivery` AS `address_delivery`,`delivery_address`.`phone_delivery` AS `phone_delivery`,`delivery_address`.`email_delivery` AS `email_delivery`,`delivery_address`.`delivery_address_id` AS `delivery_address_id` from ((`delivery_info` join `delivery_type` on((`delivery_type`.`delivery_type_id` = `delivery_info`.`delivery_type_id`))) left join `delivery_address` on((`delivery_info`.`delivery_info_id` = `delivery_address`.`delivery_info_id`))) where (`delivery_info`.`order_my_id` = 13) order by `delivery_info`.`delivery_info_id` ;

-- ----------------------------
-- View structure for `exchange_view`
-- ----------------------------
DROP VIEW IF EXISTS `exchange_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `exchange_view` AS select `exchange`.`exchange_id` AS `exchange_id`,`exchange`.`id` AS `id`,`exchange`.`exchange_approve` AS `exchange_approve`,`exchange`.`return_tracking_no` AS `return_tracking_no`,`exchange`.`date_exchange` AS `date_exchange`,`size`.`size` AS `size`,`exchange`.`remarks` AS `remarks` from (`exchange` join `size` on((`size`.`size_id` = `exchange`.`size_id`))) where (`exchange`.`id` = 18) ;

-- ----------------------------
-- View structure for `item_view`
-- ----------------------------
DROP VIEW IF EXISTS `item_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `item_view` AS select `order_item`.`order_my_id` AS `order_my_id`,`item`.`item` AS `item`,`item`.`price` AS `price`,`size`.`size` AS `size`,`color`.`color` AS `color`,`order_item`.`quantity` AS `quantity`,`order_item`.`discount` AS `discount`,`order_item`.`total_price` AS `total_price`,`order_item`.`id` AS `id` from (((`order_item` join `item` on((`item`.`item_id` = `order_item`.`item_id`))) join `size` on((`size`.`size_id` = `order_item`.`size_id`))) join `color` on((`color`.`color_id` = `order_item`.`color_id`))) ;

-- ----------------------------
-- View structure for `item_where_view`
-- ----------------------------
DROP VIEW IF EXISTS `item_where_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `item_where_view` AS select `order_item`.`order_my_id` AS `order_my_id`,`item`.`item` AS `item`,`item`.`price` AS `price`,`size`.`size` AS `size`,`color`.`color` AS `color`,`order_item`.`quantity` AS `quantity`,`order_item`.`discount` AS `discount`,`order_item`.`total_price` AS `total_price`,`order_item`.`id` AS `id` from (((`order_item` join `item` on((`item`.`item_id` = `order_item`.`item_id`))) join `size` on((`size`.`size_id` = `order_item`.`size_id`))) join `color` on((`color`.`color_id` = `order_item`.`color_id`))) where (`order_item`.`order_my_id` = 5) order by `order_item`.`id` ;

-- ----------------------------
-- View structure for `order_item_view`
-- ----------------------------
DROP VIEW IF EXISTS `order_item_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `order_item_view` AS select `order_item`.`id` AS `id`,`order_item`.`order_my_id` AS `order_my_id`,`order_item`.`quantity` AS `quantity`,`order_item`.`discount` AS `discount`,`order_item`.`total_price` AS `total_price`,`item`.`item` AS `item`,`item`.`price` AS `price`,`size`.`size` AS `size`,`color`.`color` AS `color` from (((`order_item` join `item` on((`item`.`item_id` = `order_item`.`item_id`))) join `size` on((`size`.`size_id` = `order_item`.`size_id`))) join `color` on((`color`.`color_id` = `order_item`.`color_id`))) where (`order_item`.`order_my_id` = 1) order by `order_item`.`id` ;

-- ----------------------------
-- View structure for `order_summary_view`
-- ----------------------------
DROP VIEW IF EXISTS `order_summary_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `order_summary_view` AS select `order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`bank`.`bank` AS `bank`,`payment_info`.`total_payment` AS `total_payment`,`payment_info`.`date_payment` AS `date_payment`,`delivery_type`.`delivery_type` AS `delivery_type`,`delivery_info`.`delivery_date` AS `delivery_date`,`delivery_info`.`tracking_no` AS `tracking_no`,`delivery_info`.`delivered_by` AS `delivered_by` from (((((`order_my` left join `payment_info` on((`payment_info`.`order_my_id` = `order_my`.`order_my_id`))) left join `delivery_info` on((`delivery_info`.`order_my_id` = `order_my`.`order_my_id`))) left join `delivery_type` on((`delivery_type`.`delivery_type_id` = `delivery_info`.`delivery_type_id`))) left join `bank` on((`bank`.`bank_id` = `payment_info`.`bank_id`))) left join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`))) where (`order_my`.`order_my_id` = 5) ;

-- ----------------------------
-- View structure for `order_view`
-- ----------------------------
DROP VIEW IF EXISTS `order_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `order_view` AS select `order_my`.`order_my_id` AS `order_my_id` from ((((((((((((((((((`order_my` join `client` on((`client`.`client_id` = `order_my`.`client_id`))) join `delivery_info` on((`delivery_info`.`order_my_id` = `order_my`.`order_my_id`))) join `order_item` on((`order_item`.`order_my_id` = `order_my`.`order_my_id`))) join `payment_info` on((`order_my`.`order_my_id` = `payment_info`.`order_my_id`))) join `order_type` on((`order_my`.`order_type_id` = `order_type`.`order_type_id`))) join `bank` on((`bank`.`bank_id` = `payment_info`.`bank_id`))) join `mode_payment` on((`mode_payment`.`mode_payment_id` = `payment_info`.`mode_payment_id`))) join `delivery_type` on((`delivery_type`.`delivery_type_id` = `delivery_info`.`delivery_type_id`))) join `item` on((`item`.`item_id` = `order_item`.`item_id`))) join `color` on((`color`.`color_id` = `order_item`.`color_id`))) join `size` on((`order_item`.`size_id` = `size`.`size_id`))) join `delivery_address` on((`delivery_address`.`delivery_info_id` = `delivery_info`.`delivery_info_id`))) join `acknowledgeable` on((`acknowledgeable`.`order_my_id` = `order_my`.`order_my_id`))) join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`))) join `feedback` on((`feedback`.`order_my_id` = `order_my`.`order_my_id`))) join `group` on((`client`.`group_id` = `group`.`group_id`))) join `user` on((`group`.`group_id` = `user`.`group_id`))) join `exchange` on(((`exchange`.`size_id` = `size`.`size_id`) and (`order_item`.`id` = `exchange`.`id`)))) ;

-- ----------------------------
-- View structure for `order_where_summary_view`
-- ----------------------------
DROP VIEW IF EXISTS `order_where_summary_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `order_where_summary_view` AS select `order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`bank`.`bank` AS `bank`,`payment_info`.`total_payment` AS `total_payment`,`payment_info`.`date_payment` AS `date_payment`,`delivery_type`.`delivery_type` AS `delivery_type`,`delivery_info`.`delivery_date` AS `delivery_date`,`delivery_info`.`tracking_no` AS `tracking_no`,`delivery_info`.`delivered_by` AS `delivered_by` from (((((`order_my` left join `payment_info` on((`payment_info`.`order_my_id` = `order_my`.`order_my_id`))) left join `delivery_info` on((`delivery_info`.`order_my_id` = `order_my`.`order_my_id`))) left join `delivery_type` on((`delivery_type`.`delivery_type_id` = `delivery_info`.`delivery_type_id`))) left join `bank` on((`bank`.`bank_id` = `payment_info`.`bank_id`))) left join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`))) where (`order_my`.`order_my_id` = 5) ;
