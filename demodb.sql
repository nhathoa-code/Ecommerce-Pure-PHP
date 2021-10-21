-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2021 at 03:01 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demodb`
--
CREATE DATABASE IF NOT EXISTS `demodb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `demodb`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `parent_categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `category_name`, `parent_categoryid`) VALUES
(55, 'Polo Shirts', 39),
(56, 'Bags', 40),
(57, 'Shorts', 39),
(58, 'Shoes', 40),
(59, 'Others', 40);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `commentDate` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `userid`, `productid`, `commentDate`, `message`) VALUES
(34, 19, 62, '2021-07-31 23:55:46', 'Hello world');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(10) NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `productid`, `productname`, `price`, `quantity`, `size`, `orderid`) VALUES
(69, 65, 'Purple Label', 995, 4, 'M', 47),
(70, 59, 'Platsfield Plaid Throw Blanket', 499.99, 1, 'One size', 47),
(71, 62, 'Classic Fit Chambray Western Shirt', 98.5, 3, 'M', 47),
(72, 62, 'Classic Fit Chambray Western Shirt', 98.5, 4, 'L', 47),
(78, 57, 'Burnished Calfskin Voyager Backpack', 2500, 2, 'One size', 53);

-- --------------------------------------------------------

--
-- Table structure for table `parent_category`
--

DROP TABLE IF EXISTS `parent_category`;
CREATE TABLE `parent_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parent_category`
--

INSERT INTO `parent_category` (`id`, `name`) VALUES
(39, 'Clothing'),
(40, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brandname` varchar(255) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `parent_category` int(11) NOT NULL,
  `description` text NOT NULL,
  `details` text NOT NULL,
  `price` double NOT NULL,
  `sizetype` varchar(20) NOT NULL,
  `images` varchar(300) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `name`, `brandname`, `category`, `parent_category`, `description`, `details`, `price`, `sizetype`, `images`, `views`) VALUES
(56, 'Alton Belted Wool Gabardine Short', 'Ralph Lauren Collection', 57, 39, 'The Alton\'s gabardine fabrication, produced in an Italian mill, is woven from very fine combed wool yarns to create its smooth hand and beautiful drape. These above-the-knee shorts are distinguished by a high-rise fit, front pleats, crisp leg creases, and engineered buckled belts at each side of the waistband that recall side adjusters found on traditional menswear trousers.', 'High rise. Straight-leg silhouette. Intended to hit above the knee.|\r\nUS size 8 has an 11\" rise and a 26¼\" leg opening. All sizes have a 9¼\" inseam.|\r\nZip fly with an engineered buckled belt.|\r\nTwo front angled pockets. Front pleats. Creases run down the front of each leg.| Back waist darts.|\r\nFully lined with script–\"Ralph Lauren\" jacquard.|\r\nShell and belt: wool. Lining: cupro.|\r\nDry clean.|\r\nMade in Italy.|\r\nModel is 5\'10\"/178 cm and wears a US size 2.', 480, 'multiple', '1627100659', 21),
(57, 'Burnished Calfskin Voyager Backpack', 'Purple Label', 56, 40, 'This elegant Italian-made backpack is crafted from full-grain calfskin that has been burnished for a beautiful depth of color. Zip pockets at the back provide easy access to your essentials.', 'Leather top handle with a 3½\" drop. Two adjustable buckled leather shoulder straps.|\r\nTop buckled flap closure.|\r\nTwo zip pockets at the exterior. One zip pocket at the interior.|\r\n\"Ralph Lauren\" debossed at the front.|\r\nReinforced base. Leather trim.|\r\nLined with cotton gabardine. Flap lined with suede.|\r\n15\" H x 11½\" L x 5½\" D.|\r\nShell, trim, flap lining: leather. Shell lining: cotton.|\r\nMade in Italy.', 2500, 'one', '1627100835', 41),
(58, 'Bowsworth Cotton Espadrille', 'Purple Label', 58, 40, 'This refined take on the espadrille features a cotton-and-linen upper hand-stitched to a coiled jute-and-rubber sole. This warm-weather essential is finished with supple leather lining and a nappa leather pull tab.', 'Rounded toe.|\r\nSlip-on styling.|\r\nJute insole. Leather pull tab at the heel.|\r\n\"RL\" brass plaque at the outer heel.|\r\nLined with leather.|\r\nJute-and-rubber outsole.|\r\nUpper: 75% cotton, 25% linen. Lining and trim: 100% leather.|\r\nMade in Spain.', 275, 'one', '1627101401', 18),
(59, 'Platsfield Plaid Throw Blanket', 'Ralph Lauren Home', 59, 40, 'Impeccably woven in Scotland from responsible lambswool, this soft throw blanket is crafted with a double-face construction and is detailed with delicate fringe. The traditional plaid pattern recalls classic tailored menswear in a nod to Ralph Lauren\'s iconic and enduring style.', '3\" self-twisted fringe at the top and the bottom.|\r\nSelvage edges.|\r\n54\" W x 72\" L.|\r\n100% wool.|\r\nDry clean.|\r\nMade in Scotland.', 499.99, 'one', '1627102675', 31),
(62, 'Classic Fit Chambray Western Shirt', ' Polo Ralph Lauren', 55, 39, 'Crafted from a more sustainable cotton, this indigo-dyed Western shirt is specially washed to give the lightweight fabric a weathered, lived-in look.', 'Classic Fit: our roomiest silhouette. Cut for a lower armhole and a fuller sleeve.|\r\nSize medium has a 30½\" back body length, an 18¼\" shoulder, a 45\" chest, and a 34½\" sleeve length. Sleeve length is taken from the center back of the neck and changes 1\" between sizes.|\r\nPoint collar. Snapped placket.|\r\nLong sleeves with snapped barrel cuffs. Western-style front and back yoke.|\r\nTwo chest snapped pockets.|\r\nCotton. Machine washable. Imported.|\r\nWe source a portion of our cotton through the Better Cotton Initiative. By buying cotton products from us, you\'re supporting more sustainable cotton farming. Learn more at BetterCotton.org/massbalance.', 98.5, 'multiple', '1627123233', 369),
(63, 'Relaxed Monogram Poplin Shirt', 'Purple Label', 55, 39, 'This Italian-crafted shirt features a relaxed, oversize fit and an Art Deco–inspired \"RL\" monogram, both of which are new for Spring 2021.', 'Relaxed, oversize fit. Larger at the chest than our standard Purple Label woven shirts.|\r\nSize medium 31½\" back body length, a 21\" shoulder, a 49\" chest, and a 34½\" sleeve length. Sleeve length is taken from the center back of the neck and changes 1\" between sizes.|\r\nPoint collar.|\r\nButtoned placket.|\r\nLong sleeves with buttoned barrel cuffs.|\r\nPleated back yoke ensures smooth, contoured shoulders.|\r\nLeft chest patch pocket. \"RL\" monogram embroidered at the pocket.|\r\nCotton. Machine washable. Made in Italy.|\r\nModel is 6\'1\"/185 cm and wears a size medium.', 450, 'multiple', '1627306295', 38),
(64, 'Ricky Sunglasses', 'Ralph Lauren Stirrup Collection', 59, 40, 'Our Ricky sunglasses, part of the Ralph Lauren Stirrup Collection, masterfully pair exquisite, classic detailing with a modern aesthetic. Referencing traditional saddlery, the collection boasts contoured frames and equestrian-inspired hardware, including Ralph Lauren\'s signature stirrup accented by a studded leather strap at each temple. This timeless butterfly-shaped silhouette is sculpted from polished acetate and styled with tinted lenses offering 100% UV protection.', 'Acetate frame. Acetate and metal temples.|\r\nTinted lenses with 100% UV protection.|\r\nSignature \"Ralph Lauren\" printed at the left lens. Signature \"RL\" logo at each temple.|\r\nPresented in a \"Ralph Lauren\"–debossed leather case.|\r\n55 mm eye size.|\r\n17 mm bridge size.|\r\n140 mm temple size.|\r\nAcetate, metal, leather.|\r\nImported.', 210, 'one', '1627306366', 6),
(65, 'Cable-Knit Cashmere Sweater', 'Purple Label', 55, 39, 'To craft this sweater, cashmere is meticulously combed from goats raised in the mountains of Mongolia, where the high altitude and cold climate result in a fine, soft underfleece. Only the best fibers are used, which ensures perfectly even coloration when dyed, as well as exceptional warmth and incredible softness. After this precise sourcing process, they\'re spun by artisans in a century-old Italian mill and washed using pure water from the Swiss Alps. This style is available in additional colo', 'Size medium has a 26\" body length (front and back), a 16\" shoulder, a 38\" chest, and a 25\" sleeve length. Sleeve length changes ½\" between sizes.|\r\nCrewneck.|\r\nLong sleeves with rib-knit cuffs.|\r\nRib-knit hem.|\r\nCashmere.|\r\nDry clean.|\r\nMade in Italy.|\r\nModel is 6\'1\"/185 cm and wears a size medium.', 995, 'multiple', '1627307496', 58),
(66, 'Romance Eau de Parfum', 'Romance', 59, 40, 'The women\'s fragrance that evokes the timeless essence of falling in love. Discover the sensual essence of velvety woods, extravagant florals, and seductive musk.', 'Top notes: mandarin essence, pink pepper, white violet leaves.|\r\nMiddle notes: rose, jasmine, marigold, geranium.|\r\nBase notes: patchouli, oakmoss, musk.|\r\nThis item is not eligible for promotional discounts.', 58, 'one', '1627306551', 9),
(67, 'Halle Calfskin Loafer', 'Ralph Lauren Collection', 58, 40, 'The Halle takes its design codes from traditional menswear penny loafers but is updated with a spectator sensibility. Sculpted on a last to form an almond-shaped toe, this two-tone style is created by skilled artisans in Italy utilizing a footwear construction known as Bologna, which allows for more flexibility and comfort. It\'s crafted from full-grain calfskin and beautifully finished with a penny tab at the vamp.', '½\"/15 mm heel height.|\r\nAlmond-shaped toe.|\r\nSlip-on styling. Penny tab at the vamp.|\r\nCalfskin insole. Calfskin and goatskin lining.|\r\nLeather outsole.|\r\nPresented in a \"Ralph Lauren\"–embossed box with a dust bag.|\r\nCalfskin.|\r\nOne size 39.|\r\nMade in Italy.', 415, 'one', '1627306642', 11),
(68, 'Garden Vine Espresso Cup', 'Ralph Lauren Home', 59, 40, 'To create our newest tableware collection, Ralph Lauren has partnered with Burleigh, the storied, 160-year-old English pottery maker in a first-ever collaboration that celebrates the best of modern American style and fine English tradition. Inspired by an East Asian block-printed batik fabric, Garden Vine\'s large-scale florals easily mix and match with Ralph Lauren x Burleigh\'s custom Midnight Sky and Faded Peony patterns to create an eclectic and personal combination that is perfect for everyda', 'Espresso cup: 3\" W x 2 1/5\" H x 2 3/8\" D.|\r\nSaucer: 5 7/8\" diam.|\r\nCapacity: 2 1/3 oz.|\r\nBurleigh is the last pottery maker in the world to practice tissue transfer printing, a 250-year-old technique that has been skillfully applied to this custom Ralph Lauren design.|\r\nTissue transfer printing allows for one color to be used in each piece, with a gradation of density that creates a richly textural appearance.|\r\nDishwasher and microwave safe.|\r\nEarthenware, natural clay.|\r\nMade in England.', 65, 'one', '1627306704', 21),
(69, 'Wilshire Dinner Plate', 'Ralph Lauren Home', 59, 40, 'This fine porcelain plate is hand-painted with matte and polished bands of 24K gold, and will effortlessly complement our timeless dinnerware patterns.', '11\" diam.|\r\nHand-painted 24K gold trim.|\r\nElegantly presented in our \"Ralph Lauren\"–embossed box.|\r\nHand wash.|\r\nPorcelain.|\r\nMade in Portugal.', 55, 'one', '1627306803', 12);

-- --------------------------------------------------------

--
-- Table structure for table `product_hot`
--

DROP TABLE IF EXISTS `product_hot`;
CREATE TABLE `product_hot` (
  `productid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_hot`
--

INSERT INTO `product_hot` (`productid`, `orderid`, `quantity`) VALUES
(65, 47, 4),
(59, 47, 1),
(62, 47, 3),
(62, 47, 4),
(57, 53, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_quantity`
--

DROP TABLE IF EXISTS `product_quantity`;
CREATE TABLE `product_quantity` (
  `productid` int(11) NOT NULL,
  `XS` int(20) NOT NULL DEFAULT 0,
  `S` int(20) NOT NULL DEFAULT 0,
  `M` int(20) NOT NULL DEFAULT 0,
  `L` int(20) NOT NULL DEFAULT 0,
  `XL` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_quantity`
--

INSERT INTO `product_quantity` (`productid`, `XS`, `S`, `M`, `L`, `XL`) VALUES
(56, 0, 0, 50, 100, 0),
(62, 0, 0, 2, 0, 0),
(63, 0, 100, 200, 100, 0),
(65, 0, 0, 196, 150, 50);

-- --------------------------------------------------------

--
-- Table structure for table `quantity`
--

DROP TABLE IF EXISTS `quantity`;
CREATE TABLE `quantity` (
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quantity`
--

INSERT INTO `quantity` (`productid`, `quantity`) VALUES
(57, 1),
(58, 0),
(59, 1),
(64, 150),
(66, 50),
(67, 150),
(68, 30),
(69, 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(2255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `name`, `email`) VALUES
(19, 'Corona', '123', 'Vòng Nhật Hòa', 'nhathoa@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

DROP TABLE IF EXISTS `user_order`;
CREATE TABLE `user_order` (
  `orderid` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `order_status` varchar(35) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`orderid`, `order_date`, `userid`, `username`, `order_status`, `address`, `phone_number`, `email`, `payment_method`, `subtotal`) VALUES
(47, '2021-07-26', 19, 'Vòng Nhật Hòa', 'Paid', '123 obama , newyork', '09123', 'nhathoa@gmail.com', 'cash', 5169.49),
(53, '2021-07-31', 19, 'Vòng Nhật Hòa', 'Paid', '123 obama , newyork', '09123', 'nhathoa@gmail.com', 'cash', 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`),
  ADD KEY `parent_categoryid` (`parent_categoryid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_comment` (`userid`),
  ADD KEY `product_comment` (`productid`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `parent_category`
--
ALTER TABLE `parent_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `category` (`category`),
  ADD KEY `parent_category` (`parent_category`);

--
-- Indexes for table `product_hot`
--
ALTER TABLE `product_hot`
  ADD KEY `productid` (`productid`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `product_quantity`
--
ALTER TABLE `product_quantity`
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `quantity`
--
ALTER TABLE `quantity`
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `parent_category`
--
ALTER TABLE `parent_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_categoryid`) REFERENCES `parent_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `product_comment` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_comment` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `user_order_details` FOREIGN KEY (`orderid`) REFERENCES `user_order` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`categoryid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`parent_category`) REFERENCES `parent_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_hot`
--
ALTER TABLE `product_hot`
  ADD CONSTRAINT `product_hot` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producthot_order` FOREIGN KEY (`orderid`) REFERENCES `user_order` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_quantity`
--
ALTER TABLE `product_quantity`
  ADD CONSTRAINT `product_quantity_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quantity`
--
ALTER TABLE `quantity`
  ADD CONSTRAINT `quantity_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `user_order` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
