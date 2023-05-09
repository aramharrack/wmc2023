-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 05:36 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wmc2023db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) COLLATE utf8_bin NOT NULL,
  `emailaddress` varchar(30) COLLATE utf8_bin NOT NULL,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(30) COLLATE utf8_bin NOT NULL,
  `classicalusertype` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `emailaddress`, `username`, `password`, `classicalusertype`) VALUES
(1, 'John Doe', 'john.doe@gmail.com', 'JohnA', 'wmtaiWSh.VmrI', 'Administrator'),
(2, 'Jane Smith', 'jane.smith@yahoo.com', 'Jane', 'wmtaiWSh.VmrI', 'Administrator'),
(3, 'Michael Johnson', 'michael.johnson@hotmail.com', 'Michael', 'wmtaiWSh.VmrI', 'Administrator'),
(4, 'Sarah Lee', 'sarah.lee@gmail.com', 'Sarah', 'wmtaiWSh.VmrI', 'Administrator'),
(5, 'David Wilson', 'david.wilson@yahoo.com', 'David', 'wmtaiWSh.VmrI', 'Administrator'),
(7, 'update admin', 'updateadmin@test.com', 'tadmin', 'wmtaiWSh.VmrI', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `assettypes`
--

CREATE TABLE `assettypes` (
  `assetid` varchar(30) COLLATE utf8_bin NOT NULL,
  `assetshort` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `assetdesc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `assetlevel` int(11) DEFAULT NULL,
  `parentid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assettypes`
--

INSERT INTO `assettypes` (`assetid`, `assetshort`, `assetdesc`, `assetlevel`, `parentid`) VALUES
('1', 'BASIC', 'Basic-Instrument', 1, NULL),
('110', 'BASIC-SEC', 'Basic Securities', 2, 1),
('11010', 'BOND', 'Bonds', 3, 2),
('11010001', 'FIX-RATE-BOND', 'Fixed Rate Bond', 4, 3),
('11010002', 'FLT-RATE-BOND', 'Floating Rate Bond', 4, 3),
('11010003', 'ZC-BOND', 'Zero Coupon Bond', 4, 3),
('11010004', 'PP-BOND', 'Perpetual Bond', 4, 3),
('11010005', 'MUNICIPAL', 'Municipal Bond', 4, 3),
('11010006', 'CONVT-BOND', 'Convertible Bond', 4, 3),
('11010008', 'INFLATION-BOND', 'Index/Inflation Linked Bond', 4, 3),
('11010010', 'T-BOND', 'Treasury Bond', 4, 3),
('11010015', 'TERM-NOTE', 'Term Note', 4, 3),
('11010016', 'ACCR-NOTE', 'Accrual Note', 4, 3),
('11010099', 'BOND-GEN', 'Bond - General', 4, 3),
('11010301', 'Z_TERM-NOTE', 'Generic Term Note', 4, 3),
('11010303', 'Z_ACCR-NOTE', 'Generic Accrual Note', 4, 3),
('11030', 'EQUITY', 'Equities', 3, 2),
('11030001', 'SHARES', 'Share', 4, 17),
('11030002', 'PREFER-SHARES', 'Preferred Share', 4, 17),
('11030003', 'CONVT-SHARES', 'Convertible Share', 4, 17),
('11030031', 'ETF', 'Exchange-Traded Fund', 4, 17),
('11030051', 'EQUITY-WRNT', 'Equity Warrant', 4, 17),
('11030099', 'EQUITY-GEN', 'Equity - General', 4, 17),
('130', 'BASIC-FXMM', 'Basic FX and Money Market', 2, 1),
('13010', 'FX', 'FX', 3, 24),
('13010001', 'FXSP', 'FX Spot', 4, 25),
('13050', 'MM', 'Money Market', 3, 24),
('13050001', 'TERM-DEPO', 'Term Deposit', 4, 27),
('13050002', 'CALL-DEPO', 'Call Deposit', 4, 27),
('13050003', 'FD-DEPO', 'Fiduciary Deposit', 4, 27),
('13050005', 'CD', 'Certificate of Deposit', 4, 27),
('13050006', 'CP', 'Commercial Paper', 4, 27),
('13050099', 'DEPO-GEN', 'Deposit - General', 4, 27),
('13050101', 'TERM-LOAN', 'Term Loan', 4, 27),
('13050102', 'CALL-LOAN', 'Call Loan', 4, 27),
('13050103', 'FD-LOAN', 'Fiduciary Loan', 4, 27),
('13050199', 'LOAN-GEN', 'Loan - General', 4, 27),
('13050399', 'MM-GEN', 'Money Market - General', 4, 27),
('13060', 'LOAN', 'Loan', 3, 24),
('170', 'BASIC-CMD', 'Basic Commodities', 2, 1),
('17010', 'COMMODITY', 'Commodities', 3, 40),
('17010001', 'CMD-MT', 'Metal', 4, 41),
('17010031', 'CMD-EG', 'Energy', 4, 41),
('17010061', 'CMD-AR', 'Agriculture', 4, 41),
('17010081', 'CMD-LS', 'Livestock', 4, 41),
('17010099', 'CMD-GEN', 'Commodity - General', 4, 41),
('175', 'BASIC-IDX', 'Index', 2, 1),
('17510', 'INDEX', 'Index', 3, 47),
('17510001', 'EQT-IDX', 'Equity Index', 4, 48),
('17510003', 'BOND-IDX', 'Bond Index', 4, 48),
('17510005', 'FUND-IDX', 'Fund Index', 4, 48),
('17510010', 'IR-IDX', 'Interest Rate Index', 4, 48),
('17510099', 'IDX-GEN', 'Index - General', 4, 48),
('180', 'BASIC-FUND', 'Fund', 2, 1),
('18010', 'GENERAL-FUND', 'General Fund', 3, 54),
('18010001', 'UNIT-TRUST', 'Unit Trust', 4, 55),
('18010003', 'MUTUAL-FUND', 'Mutual Fund', 4, 55),
('18010020', 'BOND-FUND', 'Bond Fund', 4, 55),
('18010025', 'REAL-EST-FUND', 'Real Estate Fund', 4, 55),
('18010035', 'MM-FUND', 'Money Market Fund', 4, 55),
('18010040', 'DIGITAL-FUND', 'Digital Fund', 4, 55),
('18010050', 'FOF', 'Fund of Funds', 4, 55),
('18010099', 'FUND-GEN', 'Fund - General', 4, 55),
('18030', 'HEDGE-FUND', 'Hedge Fund', 3, 54),
('18030001', 'HEDGE-FUND', 'Hedge Fund', 4, 64),
('182', 'PRIVATE-EQUITY', 'Private Equity', 2, 1),
('18210', 'PRIVATE-EQUITY', 'Private Equity', 3, 66),
('18210001', 'PE-GEN', 'Private Equity - General', 4, 67),
('18210005', 'PE-FUND', 'Private Equity Fund', 4, 67),
('18210008', 'PE-FIN-FUND', 'Private Equity Finance Fund', 4, 67),
('18210010', 'PE-REAL-EST-FUND', 'Private Equity Real Estate Fund', 4, 67),
('18210015', 'VC-FUND', 'Venture Capital Fund', 4, 67),
('183', 'BASIC-INSUR', 'Traditional Insurance', 2, 1),
('18310', 'INSUR', 'Insurance', 3, 73),
('18310099', 'INSUR-GEN', 'Insurance - General', 4, 74),
('185', 'BASIC-COLLECTINVT', 'Collective Investment', 2, 1),
('18510', 'COLLECT-INVT', 'Collective Investment', 3, 76),
('18510099', 'INVT-PORTF', 'Investment Portfolio', 4, 77),
('18510199', 'COLLECT-INVT-GEN', 'Collective Investment - General', 4, 77),
('190', 'DIGITAL-ASSET', 'Digital Asset', 2, 1),
('19010', 'DIGITAL-ASSET', 'Digital Asset', 3, 80),
('19010099', 'DIGITAL-ASSET-GEN', 'Digital Asset - General', 4, 81),
('5', 'DERIV', 'Derivatives', 1, NULL),
('510', 'SEC-DERIV', 'Security Derivatives', 2, 83),
('51010', 'SP', 'Structured Product', 3, 84),
('51010001', 'ELN', 'Equity Linked Note', 4, 85),
('51010002', 'KOELN', 'Knock-out Equity Linked Note', 4, 85),
('51010003', 'FCN', 'Fixed Coupon Note', 4, 85),
('51010004', 'DRAN', 'Daily Range Accrual Note', 4, 85),
('51010005', 'DDK', 'Double Decker', 4, 85),
('51010006', 'ERCN', 'Equity Reverse Convertible Note', 4, 85),
('51010007', 'ERCN-KI', 'Equity Reverse Convertible Note - KI', 4, 85),
('51010008', 'CRAN', 'Callable Range Accrual Note', 4, 85),
('51010009', 'EMACFCN', 'Equity Memory Autocallable Fixed Coupon Note', 4, 85),
('51010020', 'DISCRT', 'Discount Certificate', 4, 85),
('51010021', 'EDIGIN-KI', 'Equity Digital Coupon Note', 4, 85),
('51010022', 'EBSTRN', 'Equity Booster Note', 4, 85),
('51010023', 'EPHXCN-KI', 'Equity Phoenix Callable Note', 4, 85),
('51010024', 'ESDACN', 'Equity Stepdown Autocallable Note', 4, 85),
('51010025', 'ESDACN-KI', 'Equity Stepdown Autocallable Note - KI', 4, 85),
('51010026', 'ELC', 'Equity Leveraged Certificate', 4, 85),
('51010027', 'ETC', 'Equity Tracker Certificate', 4, 85),
('51010028', 'ETW', 'Equity Twin Win', 4, 85),
('51010030', 'DAC', 'Equity Accumulator / Decumulator', 4, 85),
('51010051', 'EBEN', 'Equity Bonus Enhanced Note', 4, 85),
('51010060', 'BLC', 'Bond Leveraged Certificate', 4, 85),
('51010061', 'BTC', 'Bond Tracker Certificate', 4, 85),
('51010080', 'AMC', 'Actively Managed Certificate', 4, 85),
('51010085', 'FLN', 'Fund Linked Note', 4, 85),
('51010086', 'FLN-KI', 'Fund Linked Note - KI', 4, 85),
('51010088', 'FLC', 'Fund Leveraged Certificate', 4, 85),
('51010090', 'FTC', 'Fund Tracker Certificate', 4, 85),
('510100A1', 'CSDACN', 'Commodity Stepdown Autocallable Note', 4, 85),
('510100A2', 'CSDACN-KI', 'Commodity Stepdown Autocallable Note - KI', 4, 85),
('510100A3', 'OTW', 'Oil Twin Win', 4, 85),
('51010100', 'SN', 'Structured Note - General', 4, 85),
('51010111', 'SP-CAPPRO-GEN', 'Structured Product Capital Protection - General', 4, 85),
('51010112', 'SP-YLDENH-GEN', 'Structured Product Yield Enhancement - General', 4, 85),
('51010113', 'SP-PARTI-GEN', 'Structured Product Participation - General', 4, 85),
('51010121', 'SP-LVRG-GEN', 'Structured Product Leveraged - General', 4, 85),
('51010302', 'Z_BEN', 'Generic Bonus Enhanced Note', 4, 85),
('51010303', 'Z_BEN-KI', 'Generic Bonus Enhanced Note - KI', 4, 85),
('51010304', 'Z_EDIGIN-KI', 'Generic Equity Digital Coupon Note', 4, 85),
('51010305', 'Z_EBSTRN', 'Generic Equity Booster Note', 4, 85),
('51010306', 'Z_EPHXCN-KI', 'Generic Equity Phoenix Callable Note', 4, 85),
('51010307', 'Z_ESDACN', 'Generic Equity Stepdown Autocallable Note', 4, 85),
('51010308', 'Z_ESDACN-KI', 'Generic Equity Stepdown Autocallable Note - KI', 4, 85),
('51010309', 'Z_ELC', 'Generic Equity Leveraged Certificate', 4, 85),
('5101030A', 'Z_ETC', 'Generic Equity Tracker Certificate', 4, 85),
('5101030B', 'Z_ETW', 'Generic Equity Twin Win', 4, 85),
('5101030C', 'Z_EQTW', 'Generic Equity Warrant', 4, 85),
('5101030D', 'Z_ERCN', 'Generic Equity Reverse Convertible Note', 4, 85),
('5101030E', 'Z_ERCN-KI', 'Generic Equity Reverse Convertible Note - KI', 4, 85),
('51010351', 'Z_BLC', 'Generic Bond Leveraged Certificate', 4, 85),
('51010352', 'Z_BTC', 'Generic Bond Tracker Certificate', 4, 85),
('51010381', 'Z_CSDACN', 'Generic Commodity Stepdown Autocallable Note', 4, 85),
('51010382', 'Z_CSDACN-KI', 'Generic Commodity Stepdown Autocallable Note - KI', 4, 85),
('51010383', 'Z_OTW', 'Generic Oil Twin Win', 4, 85),
('510103A1', 'Z_FLN', 'Generic Fund Linked Note', 4, 85),
('510103A2', 'Z_FLC', 'Generic Fund Leveraged Certificate', 4, 85),
('510103A3', 'Z_FTC', 'Generic Fund Tracker Certificate', 4, 85),
('510103A4', 'Z_FLN-PHY', 'Generic Fund Linked Note Physical - KI', 4, 85),
('510103C1', 'Z_TCAM', 'Generic Actively Managed Tracker Certificate', 4, 85),
('51020', 'SO', 'Security Option', 3, 84),
('51020001', 'EQO-OTC', 'Equity Option - OTC', 4, 144),
('51020002', 'EQO-LST', 'Equity Option - Listed', 4, 144),
('51020003', 'EQO-OTC-BARRIER', 'Equity Option - OTC Barrier', 4, 144),
('51020004', 'EQO-LST-BARRIER', 'Equity Option - Listed Barrier', 4, 144),
('51020006', 'EQO-OTC-BARRIER-IN', 'Equity Option - OTC Barrier In', 4, 144),
('51020008', 'EQO-OTC-BARRIER-OUT', 'Equity Option - OTC Barrier Out', 4, 144),
('51020011', 'EQO-OTC-CALL-SPREAD', 'Equity Option - OTC Call Spread', 4, 144),
('51020012', 'EQO-OTC-PUT-SPREAD', 'Equity Option - OTC Put Spread', 4, 144),
('51020015', 'EQO-STRATEGY-GEN', 'Equity Option Strategy', 4, 144),
('51020019', 'EQO-GEN', 'Equity Option - General', 4, 144),
('51020211', 'BDO-OTC', 'Bond Option - OTC', 4, 144),
('51020212', 'BDO-LST', 'Bond Option - Listed', 4, 144),
('51020213', 'BDO-OTC-BARRIER', 'Bond Option - OTC Barrier', 4, 144),
('51020214', 'BDO-LST-BARRIER', 'Bond Option - Listed Barrier', 4, 144),
('51020215', 'BDO-STRATEGY-GEN', 'Bond Option Strategy', 4, 144),
('51020219', 'BDO-GEN', 'Bond Option - General', 4, 144),
('51020303', 'Z_EQO-OTC-BARRIER', 'Generic Equity Option - OTC Barrier', 4, 144),
('51020306', 'Z_EQO-OTC-BARRIER-IN', 'Generic Equity Option - OTC Barrier In', 4, 144),
('51020308', 'Z_EQO-OTC-BARRIER-OUT', 'Generic Equity Option - OTC Barrier Out', 4, 144),
('51020311', 'Z_BDO-OTC', 'Generic Bond Option - Vanilla', 4, 144),
('51020331', 'Z_EQO-OTC-CALL-SPREAD', 'Generic Equity Option - OTC Call Spread', 4, 144),
('51020332', 'Z_EQO-OTC-PUT-SPREAD', 'Generic Equity Option - OTC Put Spread', 4, 144),
('51030', 'SEC-FUTFWD', 'Security Futures and Forward', 3, 84),
('51030001', 'BD-FUTURE', 'Bond Futures', 4, 167),
('51030002', 'EQT-FUTURE', 'Equity Futures', 4, 167),
('51030010', 'IDX-FUTURE', 'Index Futures', 4, 167),
('51030099', 'SEC-FUTURE-GEN', 'Security Futures - General', 4, 167),
('51030101', 'BD-FWD', 'Bond Forward', 4, 167),
('51030199', 'SEC-FWD-GEN', 'Security Forward - General', 4, 167),
('530', 'FXMM-DERIV', 'FX and Money Market Derivatives', 2, 83),
('53010', 'FXMM-FUTFWD', 'FX and Money Market Futures and Forward', 3, 174),
('53010001', 'FWD', 'FX Forward', 4, 175),
('53010002', 'NDF', 'FX Non-Deliverable Forward', 4, 175),
('53020', 'FXMM-SWAP', 'FX and Money Market Swap', 3, 174),
('53020001', 'FXSWAP', 'FX Swap', 4, 178),
('53020011', 'IRS', 'Interest Rate Swap', 4, 178),
('53020012', 'CCS', 'Cross Currency Swap', 4, 178),
('53020013', 'NDS', 'Non-Deliverable Swap', 4, 178),
('53020016', 'BASISWAP', 'Basis Swap', 4, 178),
('53020099', 'MMSWAP-GEN', 'MM Swap - General', 4, 178),
('53030', 'FXO', 'FX Option', 3, 174),
('53030001', 'FXO-OTC', 'FX Option - OTC Barrier', 4, 185),
('53030002', 'FXO-LST', 'FX Option - Listed Barrier', 4, 185),
('53030003', 'FXO-OTC-VANILLA', 'FX Option - OTC Vanilla', 4, 185),
('53030004', 'FXO-LST-VANILLA', 'FX Option - Listed Vanilla', 4, 185),
('53030005', 'NDO', 'Non-Deliverable Option', 4, 185),
('53030008', 'SWAPTION', 'Swaption', 4, 185),
('53030099', 'FXO-GEN', 'FX Option - General', 4, 185),
('53050', 'CLSP', 'Currency-linked Structured Product', 3, 174),
('53050001', 'DCI', 'Dual Currency Investment', 4, 193),
('53050002', 'TCI', 'Triple Currency Investment', 4, 193),
('53050010', 'STRUSWAP', 'Structured Swap', 4, 193),
('53050020', 'FXDISCRT', 'FX Discount Certificate', 4, 193),
('53050030', 'FXDAC', 'FX Accumulator / Decumulator', 4, 193),
('53050033', 'FXRA', 'FX Range Accrual', 4, 193),
('53050035', 'RLN', 'Rate Linked Note', 4, 193),
('53050051', 'FLOOR-FLOATER', 'Floored Floater', 4, 193),
('53050052', 'IRDIGIN-KI', 'Interest Rate Digital Coupon Note', 4, 193),
('53050053', 'IRSDACN', 'Interest Rate Index Stepdown Autocallable Note', 4, 193),
('53050054', 'IRSDACN-KI', 'Interest Rate Index Stepdown Autocallable Note - KI', 4, 193),
('53050055', 'IRLC', 'Interest Rate Leveraged Certificate', 4, 193),
('53050056', 'IRTC', 'Interest Rate Tracker Certificate', 4, 193),
('53050061', 'LBCRAN', 'LIBOR CRAN', 4, 193),
('53050062', 'DCRAN', 'Dual Range CRAN', 4, 193),
('53050063', 'CMSRCN', 'CMS Reverse Convertible Note', 4, 193),
('53050064', 'CMSCRAN', 'CMS Callable Range Accrual Note', 4, 193),
('53050071', 'STEEPENER', 'Steepener', 4, 193),
('53050072', 'FLATTENER', 'Flattener', 4, 193),
('53050100', 'CLSP-SP-GEN', 'Currency Linked Structured Product - General', 4, 193),
('53050111', 'CLSP-CAPPRO-GEN', 'Currency-Linked Structured Product Capital Protection - General', 4, 193),
('53050112', 'CLSP-YLDENH-GEN', 'Currency-Linked Structured Product Yield Enhancement - General', 4, 193),
('53050113', 'CLSP-PARTI-GEN', 'Currency-Linked Structured Product Participation - General', 4, 193),
('53050121', 'CLSP-LVRG-GEN', 'Currency-Linked Structured Product Leveraged - General', 4, 193),
('53050301', 'Z_FLOOR-FLOATER', 'Generic Floored Floaters', 4, 193),
('53050302', 'Z_IRDIGIN-KI', 'Generic Interest Rate Digital Coupon Note', 4, 193),
('53050303', 'Z_IRSDACN', 'Generic Interest Rate Index Stepdown Autocallable Note', 4, 193),
('53050304', 'Z_IRSDACN-KI', 'Generic Interest Rate Index Stepdown Autocallable Note - KI', 4, 193),
('53050310', 'Z_IRTC', 'Generic Interest Rate Tracker Certificate', 4, 193),
('53050311', 'Z_LBCRAN', 'Generic LIBOR CRAN', 4, 193),
('53050312', 'Z_DCRAN', 'Generic Dual Range CRAN', 4, 193),
('53050313', 'Z_CMSRCN', 'Generic CMS Reverse Convertible Note', 4, 193),
('53050314', 'Z_CMSCRAN', 'Generic CMS Callable Range Accrual Note', 4, 193),
('53050321', 'Z_STEEPENER', 'Generic Steepener', 4, 193),
('53050322', 'Z_FLATTENER', 'Generic Flattener', 4, 193),
('550', 'CREDIT-DERIV', 'Credit Derivatives', 2, 83),
('55010', 'CRSP', 'Credit Structured Product', 3, 229),
('55010001', 'CDS', 'Credit Default Swap', 4, 230),
('55010002', 'CLN', 'Credit Linked Note', 4, 230),
('55010003', 'TRS', 'Total Return Swap', 4, 230),
('55010005', 'CDO', 'Collateralized Debt Obligation', 4, 230),
('55010006', 'ABS', 'Asset Backed Security', 4, 230),
('55010010', 'CDSW', 'Credit Default Swap Warrant', 4, 230),
('55010099', 'CRD-GEN', 'Credit Instrument - General', 4, 230),
('55010100', 'CRSP-GEN', 'Credit-Linked Structured Product - General', 4, 230),
('55010302', 'Z_CLN', 'Generic Credit Linked Note', 4, 230),
('55010303', 'Z_CDSW', 'Generic Credit Default Swap Warrant', 4, 230),
('570', 'INSUR-DERIV', 'Insurance Derivatives', 2, 83),
('57010', 'INSUR-DERIV', 'Insurance Derivatives', 3, 241),
('57010099', 'INSUR-DERIV-GEN', 'Insurance Derivative - General', 4, 242);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) COLLATE utf8_bin NOT NULL,
  `emailaddress` varchar(30) COLLATE utf8_bin NOT NULL,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(30) COLLATE utf8_bin NOT NULL,
  `classicalusertype` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fullname`, `emailaddress`, `username`, `password`, `classicalusertype`) VALUES
(1, 'John Smith', 'john.smith@gmail.com', 'JohnC', 'wmtaiWSh.VmrI', 'Client'),
(2, 'Sarah Johnson', 'sarah.johnson@yahoo.com', 'Sarah', 'wmtaiWSh.VmrI', 'Client'),
(3, 'Michael Lee', 'michael.lee@hotmail.com', 'Michael', 'wmtaiWSh.VmrI', 'Client'),
(4, 'Lisa Davis', 'lisa.davis@gmail.com', 'Lisa', 'wmtaiWSh.VmrI', 'Client'),
(5, 'James Rodriguez', 'james.rodriguez@gmail.com', 'James', 'wmtaiWSh.VmrI', 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `countrycode` varchar(3) COLLATE utf8_bin NOT NULL,
  `countryname` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `regionid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countrycode`, `countryname`, `regionid`) VALUES
('ABW', 'Aruba', 7),
('AFG', 'Afganistan', 29),
('AGO', 'Angola', 28),
('AIA', 'Anguilla', 7),
('ALA', 'Aland Islands', 24),
('ALB', 'Albania', 30),
('AND', 'Andorra', 30),
('ARE', 'United Arab Emirates', 20),
('ARG', 'Argentina', 26),
('ARM', 'Armenia', 20),
('ASM', 'American Samoa', 25),
('ATA', 'Antarctica', 3),
('ATG', 'Antigua and Barbuda', 7),
('AUS', 'Australia', 25),
('AUT', 'Austria', 11),
('AZE', 'Azerbaijan', 20),
('BDI', 'Burundi', 8),
('BEL', 'Belgium', 32),
('BEN', 'Benin', 31),
('BES', 'Bonaire,  Saint Eustatius and Saba', 7),
('BFA', 'Burkina Faso', 31),
('BGD', 'Bangladesh', 29),
('BGR', 'Bulgaria', 30),
('BHR', 'Bahrain', 20),
('BHS', 'Bahamas', 7),
('BIH', 'Bosnia and Herzegovina', 30),
('BLM', 'Saint-Barthélemy', 7),
('BLR', 'Belarus', 15),
('BLZ', 'Belize', 9),
('BMU', 'Bermuda', 22),
('BOL', 'Bolivia', 26),
('BRA', 'Brazil', 26),
('BRB', 'Barbados', 7),
('BRN', 'Brunei Darussalam', 27),
('BTN', 'Bhutan', 29),
('BWA', 'Botswana', 28),
('CAF', 'Central African Republic', 8),
('CAN', 'Canada', 22),
('CCK', 'Cocos Islands', 25),
('CHE', 'Switzerland', 11),
('CHL', 'Chile', 26),
('CHN', 'China', 14),
('CIV', 'Ivory Coast', 31),
('CMR', 'Cameroon', 31),
('COD', 'Congo, Democratic Republic of the', 8),
('COG', 'Congo', 8),
('COK', 'Cook Islands', 25),
('COL', 'Colombia', 26),
('COM', 'Comoros', 13),
('CPV', 'Cabo Verde', 31),
('CRI', 'Costa Rica', 9),
('CUB', 'Cuba', 7),
('CUW', 'Curaçao', 7),
('CXR', 'Christmas Island', 25),
('CYM', 'Cayman Islands', 7),
('CYP', 'Cyprus', 30),
('CZE', 'Czech Republic', 11),
('DEU', 'Germany', 11),
('DJI', 'Djibouti', 13),
('DMA', 'Dominica', 7),
('DNK', 'Denmark', 24),
('DOM', 'Dominican Republic', 7),
('DZA', 'Algeria', 23),
('ECU', 'Ecuador', 26),
('EGY', 'Egypt', 23),
('ERI', 'Eritrea', 13),
('ESH', 'Western Sahara', 23),
('ESP', 'Spain', 30),
('EST', 'Estonia', 15),
('ETH', 'Ethiopia', 13),
('FIN', 'Finland', 24),
('FJI', 'Fiji', 25),
('FLK', 'Falkland Islands (Malvinas)', 26),
('FRA', 'France', 32),
('FRO', 'Faroe Islands', 24),
('FSM', 'Micronesia', 25),
('GAB', 'Gabon', 8),
('GBR', 'United Kingdom', 24),
('GEO', 'Georgia', 15),
('GGY', 'Guersney', 24),
('GHA', 'Ghana', 31),
('GIB', 'Gibraltar', 30),
('GIN', 'Guinea', 31),
('GLP', 'Guadeloupe', 7),
('GMB', 'Gambia', 31),
('GNB', 'Guinea-Bissau', 31),
('GNQ', 'Equatorial Guinea', 31),
('GRC', 'Greece', 30),
('GRD', 'Grenada', 7),
('GRL', 'Greenland', 22),
('GTM', 'Guatemala', 9),
('GUF', 'French Guiana', 26),
('GUM', 'Guam', 25),
('GUY', 'Guyana', 26),
('HKG', 'Hong Kong', 14),
('HND', 'Honduras', 9),
('HRV', 'Croatia', 30),
('HTI', 'Haiti', 7),
('HUN', 'Hungary', 11),
('IDN', 'Indonesia', 27),
('IMN', 'Isle of Man', 24),
('IND', 'India', 29),
('IOT', 'British Indian Ocean Territory', 29),
('IRL', 'Ireland', 24),
('IRN', 'Iran', 20),
('IRQ', 'Iraq', 20),
('ISL', 'Iceland', 24),
('ISR', 'Israel', 20),
('ITA', 'Italy', 30),
('JAM', 'Jamaica', 7),
('JEY', 'Jersey', 24),
('JOR', 'Jordan', 20),
('JPN', 'Japan', 14),
('KAZ', 'Kazakhstan', 10),
('KEN', 'Kenya', 13),
('KGZ', 'Kyrgyzstan', 10),
('KHM', 'Cambodia', 27),
('KIR', 'Kiribati', 25),
('KNA', 'St. Kitts and Nevis', 7),
('KOR', 'South Korea', 14),
('KWT', 'Kuwait', 20),
('LAO', 'Lao', 14),
('LBN', 'Lebanon', 20),
('LBR', 'Liberia', 31),
('LBY', 'Libya', 23),
('LCA', 'Saint Lucia', 7),
('LIE', 'Liechtenstein', 11),
('LKA', 'Sri Lanka', 29),
('LSO', 'Lesotho', 28),
('LTU', 'Lithuania', 15),
('LUX', 'Luxembourg', 32),
('LVA', 'Latvia', 15),
('MAC', 'Macao', 14),
('MAF', 'Saint Martin', 7),
('MAR', 'Morroco', 23),
('MCO', 'Monaco', 32),
('MDA', 'Moldova', 15),
('MDG', 'Madagascar', 13),
('MDV', 'Maldives', 29),
('MEX', 'Mexico', 9),
('MHL', 'Marshall Islands', 25),
('MKD', 'Macedonia', 30),
('MLI', 'Mali', 31),
('MLT', 'Malta', 30),
('MMR', 'Myanmar', 27),
('MNE', 'Montenegro', 30),
('MNG', 'Mongolia', 14),
('MNP', 'Northern Mariana Islands', 25),
('MOZ', 'Mozambique', 28),
('MRT', 'Mauritania', 31),
('MSR', 'Montserrat', 7),
('MTQ', 'Martinique', 7),
('MUS', 'Mauritius', 13),
('MWI', 'Malawi', 13),
('MYS', 'Malaysia', 27),
('MYT', 'Mayotte', 13),
('NAM', 'Namibia', 28),
('NCL', 'New Caledonia', 25),
('NER', 'Niger', 31),
('NFK', 'Norfolk Island', 25),
('NGA', 'Nigeria', 31),
('NIC', 'Nicaragua', 9),
('NIU', 'Niue', 25),
('NLD', 'Netherlands', 32),
('NOR', 'Norway', 24),
('NPL', 'Nepal', 29),
('NRU', 'Nauru', 25),
('NZL', 'New Zealand', 25),
('OMN', 'Oman', 20),
('PAK', 'Pakistan', 29),
('PAN', 'Panama', 9),
('PCN', 'Pitcairn Islands', 25),
('PER', 'Peru', 26),
('PHL', 'Philippines', 27),
('PLW', 'Palau', 25),
('PNG', 'Papua New Guinea', 25),
('POL', 'Poland', 11),
('PRI', 'Puerto Rico', 7),
('PRK', 'North Korea', 14),
('PRT', 'Portugal', 30),
('PRY', 'Paraguay', 26),
('PSE', 'Palestine', 20),
('PYF', 'French Polynesia', 25),
('QAT', 'Qatar', 20),
('REU', 'Reunion', 13),
('ROU', 'Romania', 15),
('RUS', 'Russian Federation', 15),
('RWA', 'Rwanda', 13),
('SAU', 'Saudi Arabia', 20),
('SDN', 'Sudan', 23),
('SEN', 'Senegal', 31),
('SGP', 'Singapore', 27),
('SGS', 'South Georgia and the South Sandwich Islands', 3),
('SHN', 'Saint Helena', 28),
('SJM', 'Svalbard and Jan Mayen', 24),
('SLB', 'Solomon Islands', 25),
('SLE', 'Sierra Leone', 31),
('SLV', 'El Salvador', 9),
('SMR', 'San Marino', 30),
('SOM', 'Somalia', 13),
('SPM', 'Saint Pierre and Miquelon', 22),
('SRB', 'Serbia', 15),
('SSD', 'South Sudan', 13),
('STP', 'Sao Tome and Principe', 8),
('SUR', 'Suriname', 26),
('SVK', 'Slovakia', 11),
('SVN', 'Slovenia', 11),
('SWE', 'Sweden', 24),
('SWZ', 'Swaziland (Eswatini)', 28),
('SXM', 'Sint Maarten (Dutch part)', 22),
('SYC', 'Seychelles', 13),
('SYR', 'Syrian Arab Republic', 20),
('TCA', 'Turks and Caicos Islands', 7),
('TCD', 'Chad', 8),
('TGO', 'Togo', 31),
('THA', 'Thailand', 27),
('TJK', 'Tajikistan', 10),
('TKL', 'Tokelau', 25),
('TKM', 'Turkmenistan', 10),
('TLS', 'Timor-Leste', 27),
('TON', 'Tonga', 25),
('TTO', 'Trinidad and Tobago', 7),
('TUN', 'Tunisia', 23),
('TUR', 'Turkey', 30),
('TUV', 'Tuvalu', 25),
('TWN', 'Taiwan', 14),
('TZA', 'Tanzania', 13),
('UGA', 'Uganda', 13),
('UKR', 'Ukraine', 15),
('UMI', 'United States Minor Outlying Islands', 22),
('URY', 'Uruguay', 26),
('USA', 'United States of America', 22),
('UZB', 'Uzbekistan', 10),
('VAT', 'Vatican City', 30),
('VCT', 'Saint Vincent and the Grenadines', 7),
('VEN', 'Venezuela', 26),
('VGB', 'Virgin Islands (British)', 7),
('VIR', 'Virgin Islands (US)', 7),
('VNM', 'Vietnam', 27),
('VUT', 'Vanuatu', 25),
('WLF', 'Wallis and Futuna', 25),
('WSM', 'Samoa', 25),
('YEM', 'Yemen', 20),
('ZAF', 'South Africa', 28),
('ZMB', 'Zambia', 28),
('ZWE', 'Zimbabwe', 28);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `ccycode` varchar(3) COLLATE utf8_bin NOT NULL,
  `ccyname` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`ccycode`, `ccyname`) VALUES
('AED', 'United Arab Emirates Dirham'),
('AFA', 'Afghan Afghani'),
('ALL', 'Albanian Lek'),
('AMD', 'Armenian Dram'),
('ANG', 'Netherlands Antillean Guilder'),
('AOA', 'Angolan Kwanza'),
('ARS', 'Argentine Peso'),
('AUD', 'Australian Dollar'),
('AWG', 'Aruban Florin'),
('AZN', 'Azerbaijani Manat'),
('BAM', 'Bosnia-Herzegovina Convertible Mark'),
('BBD', 'Barbadian Dollar'),
('BDT', 'Bangladeshi Taka'),
('BEF', 'Belgian Franc'),
('BGN', 'Bulgarian Lev'),
('BHD', 'Bahraini Dinar'),
('BIF', 'Burundian Franc'),
('BMD', 'Bermudan Dollar'),
('BND', 'Brunei Dollar'),
('BOB', 'Bolivian Boliviano'),
('BRL', 'Brazilian Real'),
('BSD', 'Bahamian Dollar'),
('BTC', 'Bitcoin'),
('BTN', 'Bhutanese Ngultrum'),
('BWP', 'Botswanan Pula'),
('BYR', 'Belarusian Ruble'),
('BZD', 'Belize Dollar'),
('CAD', 'Canadian Dollar'),
('CDF', 'Congolese Franc'),
('CHF', 'Swiss Franc'),
('CLP', 'Chilean Peso'),
('CNY', 'Chinese Yuan'),
('COP', 'Colombian Peso'),
('CRC', 'Costa Rican ColÃ³n'),
('CUC', 'Cuban Convertible Peso'),
('CVE', 'Cape Verdean Escudo'),
('CZK', 'Czech Republic Koruna'),
('DEM', 'German Mark'),
('DJF', 'Djiboutian Franc'),
('DKK', 'Danish Krone'),
('DOP', 'Dominican Peso'),
('DZD', 'Algerian Dinar'),
('EEK', 'Estonian Kroon'),
('EGP', 'Egyptian Pound'),
('ERN', 'Eritrean Nakfa'),
('ETB', 'Ethiopian Birr'),
('EUR', 'Euro'),
('FJD', 'Fijian Dollar'),
('FKP', 'Falkland Islands Pound'),
('GBP', 'British Pound Sterling'),
('GEL', 'Georgian Lari'),
('GHS', 'Ghanaian Cedi'),
('GIP', 'Gibraltar Pound'),
('GMD', 'Gambian Dalasi'),
('GNF', 'Guinean Franc'),
('GRD', 'Greek Drachma'),
('GTQ', 'Guatemalan Quetzal'),
('GYD', 'Guyanaese Dollar'),
('HKD', 'Hong Kong Dollar'),
('HNL', 'Honduran Lempira'),
('HRK', 'Croatian Kuna'),
('HTG', 'Haitian Gourde'),
('HUF', 'Hungarian Forint'),
('IDR', 'Indonesian Rupiah'),
('ILS', 'Israeli New Sheqel'),
('INR', 'Indian Rupee'),
('IQD', 'Iraqi Dinar'),
('IRR', 'Iranian Rial'),
('ISK', 'Icelandic KrÃ³na'),
('ITL', 'Italian Lira'),
('JMD', 'Jamaican Dollar'),
('JOD', 'Jordanian Dinar'),
('JPY', 'Japanese Yen'),
('KES', 'Kenyan Shilling'),
('KGS', 'Kyrgystani Som'),
('KHR', 'Cambodian Riel'),
('KMF', 'Comorian Franc'),
('KPW', 'North Korean Won'),
('KRW', 'South Korean Won'),
('KWD', 'Kuwaiti Dinar'),
('KYD', 'Cayman Islands Dollar'),
('KZT', 'Kazakhstani Tenge'),
('LAK', 'Laotian Kip'),
('LBP', 'Lebanese Pound'),
('LKR', 'Sri Lankan Rupee'),
('LRD', 'Liberian Dollar'),
('LSL', 'Lesotho Loti'),
('LTL', 'Lithuanian Litas'),
('LVL', 'Latvian Lats'),
('LYD', 'Libyan Dinar'),
('MAD', 'Moroccan Dirham'),
('MDL', 'Moldovan Leu'),
('MGA', 'Malagasy Ariary'),
('MKD', 'Macedonian Denar'),
('MMK', 'Myanmar Kyat'),
('MNT', 'Mongolian Tugrik'),
('MOP', 'Macanese Pataca'),
('MRO', 'Mauritanian Ouguiya'),
('MUR', 'Mauritian Rupee'),
('MVR', 'Maldivian Rufiyaa'),
('MWK', 'Malawian Kwacha'),
('MXN', 'Mexican Peso'),
('MYR', 'Malaysian Ringgit'),
('MZM', 'Mozambican Metical'),
('NAD', 'Namibian Dollar'),
('NGN', 'Nigerian Naira'),
('NIO', 'Nicaraguan CÃ³rdoba'),
('NOK', 'Norwegian Krone'),
('NPR', 'Nepalese Rupee'),
('NZD', 'New Zealand Dollar'),
('OMR', 'Omani Rial'),
('PAB', 'Panamanian Balboa'),
('PEN', 'Peruvian Nuevo Sol'),
('PGK', 'Papua New Guinean Kina'),
('PHP', 'Philippine Peso'),
('PKR', 'Pakistani Rupee'),
('PLN', 'Polish Zloty'),
('PYG', 'Paraguayan Guarani'),
('QAR', 'Qatari Rial'),
('RON', 'Romanian Leu'),
('RSD', 'Serbian Dinar'),
('RUB', 'Russian Ruble'),
('RWF', 'Rwandan Franc'),
('SAR', 'Saudi Riyal'),
('SBD', 'Solomon Islands Dollar'),
('SCR', 'Seychellois Rupee'),
('SDG', 'Sudanese Pound'),
('SEK', 'Swedish Krona'),
('SGD', 'Singapore Dollar'),
('SHP', 'St. Helena Pound'),
('SKK', 'Slovak Koruna'),
('SLL', 'Sierra Leonean Leone'),
('SOS', 'Somali Shilling'),
('SRD', 'Surinamese Dollar'),
('STD', 'São Tomé and Príncipe Dobra'),
('SVC', 'Salvadoran ColÃ³n'),
('SYP', 'Syrian Pound'),
('SZL', 'Swazi Lilangeni'),
('THB', 'Thai Baht'),
('TJS', 'Tajikistani Somoni'),
('TMT', 'Turkmenistani Manat'),
('TND', 'Tunisian Dinar'),
('TOP', 'Tongan pa/anga'),
('TRY', 'Turkish Lira'),
('TTD', 'Trinidad & Tobago Dollar'),
('TWD', 'New Taiwan Dollar'),
('TZS', 'Tanzanian Shilling'),
('UAH', 'Ukrainian Hryvnia'),
('UGX', 'Ugandan Shilling'),
('USD', 'US Dollar'),
('UYU', 'Uruguayan Peso'),
('UZS', 'Uzbekistan Som'),
('VEF', 'Venezuelan BolÃ­var'),
('VND', 'Vietnamese Dong'),
('VUV', 'Vanuatu Vatu'),
('WST', 'Samoan Tala'),
('XAF', 'CFA Franc BEAC'),
('XCD', 'East Caribbean Dollar'),
('XDR', 'Special Drawing Rights'),
('XOF', 'CFA Franc BCEAO'),
('XPF', 'CFP Franc'),
('YER', 'Yemeni Rial'),
('ZAR', 'South African Rand'),
('ZMK', 'Zambian Kwacha');

-- --------------------------------------------------------

--
-- Table structure for table `industrysectors`
--

CREATE TABLE `industrysectors` (
  `parmcode` int(8) NOT NULL,
  `sectordesc` varchar(50) COLLATE utf8_bin NOT NULL,
  `parentid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `industrysectors`
--

INSERT INTO `industrysectors` (`parmcode`, `sectordesc`, `parentid`) VALUES
(50, 'Energy', NULL),
(51, 'Basic Materials', NULL),
(52, 'Industrials', NULL),
(53, 'Consumer Cyclicals', NULL),
(54, 'Consumer Non-cyclicals', NULL),
(55, 'Financials', NULL),
(56, 'Healthcare', NULL),
(57, 'Technology', NULL),
(58, 'Telecommunication Services', NULL),
(59, 'Utilities', NULL),
(5010, 'Energy', 50),
(5020, 'Renewable Energy', 50),
(5030, 'Uranium', 50),
(5110, 'Chemicals', 51),
(5120, 'Mineral Resources', 51),
(5130, 'Applied Resources', 51),
(5210, 'Industrial Goods', 52),
(5220, 'Industrial Services', 52),
(5230, 'Industrial Conglomerates', 52),
(5240, 'Transportation', 52),
(5310, 'Automobiles & Auto Parts', 53),
(5320, 'Cyclical Consumer Products', 53),
(5330, 'Cyclical Consumer Services', 53),
(5340, 'Retailers', 53),
(5410, 'Food & Beverages', 54),
(5420, 'Personal & Household', 54),
(5430, 'Food & Drug Retailing', 54),
(5510, 'Banking & Investment Services', 55),
(5530, 'Insurance', 55),
(5540, 'Real Estate', 55),
(5550, 'Collective Investments', 55),
(5560, 'Holding Companies', 55),
(5610, 'Healthcare Services', 56),
(5620, 'Pharma & Medical Research', 56),
(5710, 'Technology Equipment', 57),
(5720, 'Software & IT Services', 57),
(5810, 'Telecommunications Services', 58),
(5910, 'Utilities', 59),
(50101010, 'Coal', 5010),
(50102010, 'Integrated Oil & Gas', 5010),
(50102020, 'Oil & Gas Exploration & Production', 5010),
(50102030, 'Oil & Gas Refining and Marketing', 5010),
(50103010, 'Oil & Gas Drilling', 5010),
(50103020, 'Oil Related Services and Equipment', 5010),
(50103030, 'Oil & Gas Transportation Services', 5010),
(50201010, 'Renewable Energy Equip & Services', 5020),
(50201020, 'Renewable Fuels', 5020),
(50301010, 'Uranium', 5030),
(51101010, 'Commodity Chemicals', 5110),
(51101020, 'Agricultural Chemicals', 5110),
(51101030, 'Specialty Chemicals', 5110),
(51101090, 'Diversified Chemicals', 5110),
(51201010, 'Precious Metals & Minerals', 5120),
(51201020, 'Steel', 5120),
(51201030, 'Aluminum', 5120),
(51201050, 'Specialty Mining & Metals', 5120),
(51201060, 'Gold', 5120),
(51201070, 'Mining Support Services & Equipment', 5120),
(51201080, 'Integrated Mining', 5120),
(51202010, 'Construction Materials', 51202010),
(51301010, 'Forest & Wood Products', 51301010),
(51301020, 'Paper Products', 51301020),
(51302010, 'Non-Paper Containers & Packaging', 51302010),
(51302020, 'Paper Packaging', 51302020),
(52101010, 'Aerospace & Defense', 52101010),
(52102010, 'Industrial Machinery & Equipment', 52102010),
(52102020, 'Heavy Machinery & Vehicles', 52102020),
(52102030, 'Electrical Components & Equipment', 52102030),
(52102040, 'Heavy Electrical Equipment', 52102040),
(52102050, 'Shipbuilding', 52102050),
(52201020, 'Construction & Engineering', 52201020),
(52202010, 'Diversified Trading & Distributing', 52202010),
(52203010, 'Environmental Services & Equipment', 52203010),
(52203020, 'Commercial Printing Services', 52203020),
(52203030, 'Employment Services', 52203030),
(52203040, 'Business Support Services', 52203040),
(52203060, 'Business Support Supplies', 52203060),
(52203070, 'Professional Information Services', 52203070),
(52301010, 'Industrial Conglomerates', 52301010),
(52405010, 'Air Freight & Logistics', 52405010),
(52405020, 'Marine Freight & Logistics', 5240),
(52405030, 'Ground Freight & Logistics', 5240),
(52406010, 'Airlines', 5240),
(52406020, 'Passenger Transport, Ground & Sea', 5240),
(52407010, 'Airport Services', 5240),
(52407020, 'Marine Port Services', 5240),
(52407030, 'Highways & Rail Tracks', 5240),
(53101010, 'Auto & Truck Manufacturers', 5310),
(53101020, 'Auto, Truck & Motorcycle Parts', 5310),
(53101030, 'Tires & Rubber Products', 5310),
(53202010, 'Textiles & Leather Goods', 5320),
(53202020, 'Apparel & Accessories', 5320),
(53202030, 'Footwear', 5320),
(53203010, 'Homebuilding', 5320),
(53203020, 'Construction Supplies & Fixtures', 5320),
(53204030, 'Appliances, Tools & Housewares', 5320),
(53204040, 'Home Furnishings', 5320),
(53205010, 'Toys & Juvenile Products', 5320),
(53205020, 'Recreational Products', 5320),
(53301010, 'Hotels, Motels & Cruise Lines', 5330),
(53301020, 'Restaurants & Bars', 5330),
(53301030, 'Casinos & Gaming', 5330),
(53301040, 'Leisure & Recreation', 5330),
(53302010, 'Advertising & Marketing', 5330),
(53302020, 'Broadcasting', 5330),
(53302030, 'Entertainment Production', 5330),
(53302040, 'Consumer Publishing', 5330),
(53402010, 'Department Stores', 5340),
(53402020, 'Discount Stores', 5340),
(53403010, 'Auto, Parts & Service Retailers', 5340),
(53403020, 'Home Improve Product & Srv Retailer', 5340),
(53403030, 'Home Furnishings Retailers', 5340),
(53403040, 'Apparel & Accessories Retailers', 5340),
(53403050, 'Computer & Electronics Retailers', 5340),
(53403090, 'Other Specialty Retailers', 5340),
(54101010, 'Brewers', 5410),
(54101020, 'Distillers & Wineries', 5410),
(54101030, 'Non-Alcoholic Beverages', 5410),
(54102010, 'Fishing & Farming', 5410),
(54102020, 'Food Processing', 5410),
(54102030, 'Tobacco', 5410),
(54201010, 'Household Products', 5420),
(54201020, 'Personal Products', 5420),
(54201030, 'Personal Services', 5420),
(54301010, 'Drug Retailers', 5430),
(54301020, 'Food Retail & Distribution', 5430),
(55101010, 'Banks', 5510),
(55101030, 'Consumer Lending', 5510),
(55101050, 'Corporate Financial Services', 5510),
(55102010, 'Invt. Banking & Brokerage Services', 5510),
(55102020, 'Invt. Management & Fund Operators', 5510),
(55102030, 'Diversified Investment Services', 5510),
(55102050, 'Financial & Commodity Mkt Operators', 5510),
(55301010, 'Multiline Insurance & Brokers', 5530),
(55301020, 'Property & Casualty Insurance', 5530),
(55301030, 'Life & Health Insurance', 5530),
(55301050, 'Reinsurance', 5530),
(55402010, 'Real Estate Development & Operation', 5540),
(55402020, 'Real Estate Services', 5540),
(55403010, 'Diversified REITs', 5540),
(55403020, 'Commercial REITs', 5540),
(55403030, 'Residential REITs', 5540),
(55403040, 'Specialized REITs', 5540),
(55501010, 'Investment Trusts', 5550),
(55501020, 'Mutual Funds', 5550),
(55501030, 'Closed End Funds', 5550),
(55501040, 'Exchange Traded Funds', 5550),
(55501050, 'Pension Funds', 5550),
(55501060, 'Insurance Funds', 5550),
(55601010, 'Holding Companies', 5560),
(56101010, 'Advanced Medical Equip & Technology', 5610),
(56101020, 'Medical Equip, Supplies & Distrib.', 5610),
(56102010, 'Healthcare Facilities & Services', 5610),
(56102020, 'Managed Healthcare', 5610),
(56201040, 'Pharmaceuticals', 5620),
(56202010, 'Biotechnology & Medical Research', 5620),
(57101010, 'Semiconductors', 5710),
(57101020, 'Semiconductor Equipment & Testing', 5710),
(57102010, 'Communications & Networking', 5710),
(57104010, 'Electronic Equipment & Parts', 5710),
(57105010, 'Office Equipment', 5710),
(57106010, 'Computer Hardware', 5710),
(57106020, 'Phones & Handheld Devices', 5710),
(57106030, 'Household Electronics', 5710),
(57201010, 'IT Services & Consulting', 5720),
(57201020, 'Software', 5720),
(57201030, 'Internet Services', 5720),
(58101010, 'Integrated Telecom. Services', 5810),
(58101020, 'Wireless Telecom. Services', 5810),
(59101010, 'Electric Utilities', 5910),
(59101020, 'Independent Power Producers', 5910),
(59102010, 'Natural Gas Utilities', 5910),
(59103010, 'Water Utilities', 5910),
(59104010, 'Multiline Utilities', 5910);

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE `instruments` (
  `datesubmitted` date NOT NULL,
  `instrumentid` int(11) NOT NULL,
  `shortname` varchar(50) COLLATE utf8_bin NOT NULL,
  `instrumentname` varchar(100) COLLATE utf8_bin NOT NULL,
  `assetid` varchar(8) COLLATE utf8_bin NOT NULL,
  `parmcode` int(11) NOT NULL,
  `countrycode` varchar(3) COLLATE utf8_bin NOT NULL,
  `ticker` varchar(50) COLLATE utf8_bin NOT NULL,
  `isin` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `issuer` varchar(100) COLLATE utf8_bin NOT NULL,
  `stockexchange` varchar(50) COLLATE utf8_bin NOT NULL,
  `currency` varchar(3) COLLATE utf8_bin NOT NULL,
  `denomination` int(11) NOT NULL,
  `closingprice` float NOT NULL,
  `priceclosingdate` date NOT NULL,
  `issuedate` date DEFAULT NULL,
  `maturitydate` date DEFAULT NULL,
  `coupon` int(11) DEFAULT NULL,
  `riskrating` int(11) NOT NULL,
  `staffid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`datesubmitted`, `instrumentid`, `shortname`, `instrumentname`, `assetid`, `parmcode`, `countrycode`, `ticker`, `isin`, `issuer`, `stockexchange`, `currency`, `denomination`, `closingprice`, `priceclosingdate`, `issuedate`, `maturitydate`, `coupon`, `riskrating`, `staffid`) VALUES
('2023-05-07', 1, 'IBM', 'IBM Common Stock', '11030', 57, 'USA', 'IBM', NULL, 'International Business Machines Corporation', 'NYSE', 'USD', 1, 127.57, '2022-09-07', NULL, NULL, NULL, 1, 1),
('2023-05-08', 2, 'AWS', 'Amazon.com, Inc', '11030', 57, 'USA', 'AMZN', NULL, 'Amazon Web Services, Inc.', 'NASDAQ', 'USD', 1, 128.72, '2022-09-07', NULL, NULL, NULL, 1, 1),
('2023-05-09', 3, 'SAP SE', 'SAP SE Common Stock', '11030', 57, 'DEU', 'SAP', NULL, 'SAP SE', 'ETR', 'EUR', 1, 85.3, '2022-09-07', NULL, NULL, NULL, 1, 1),
('2023-05-10', 4, 'Oracle', 'Oracle Common Stock', '11030', 57, 'USA', 'ORCL', NULL, 'Oracle Corporation', 'NYSE', 'USD', 1, 74.36, '2022-09-07', NULL, NULL, NULL, 1, 1),
('2023-05-11', 5, 'Infosys', 'Infosys Common Stock', '11030', 57, 'IND', 'Infy', NULL, 'Infosys Ltd', 'NSE', 'INR', 1, 1462, '2022-09-07', NULL, NULL, NULL, 1, 1),
('2023-05-12', 6, 'Intellia', 'Intellia Common Stock', '11030', 56, 'USA', 'NTLA', NULL, 'Intellia Therapeutics Inc', 'NASDAQ', 'USD', 1, 57.53, '2022-09-07', NULL, NULL, NULL, 3, 1),
('2023-05-13', 7, 'Regeneron', 'Regeneron Common Stock', '11030', 56, 'USA', 'REGN', NULL, 'Regeneron Pharmaceuticals Inc', 'NASDAQ', 'USD', 1, 597.76, '2022-09-07', NULL, NULL, NULL, 3, 1),
('2023-05-14', 8, 'Kiniksa', 'Kiniksa Common Stock', '11030', 56, 'BMU', 'KNSA', NULL, 'Kiniksa Pharmaceuticals Ltd', 'NASDAQ', 'USD', 1, 11.46, '2022-09-07', NULL, NULL, NULL, 3, 1),
('2023-05-15', 9, 'Huadong Medicine', 'Huadong Medicine Common Stock', '11030', 56, 'CHN', '000963:CH', NULL, 'Huadong Medicine Co Ltd', 'SHE', 'CNY', 1, 41.21, '2022-09-07', NULL, NULL, NULL, 3, 1),
('2023-05-16', 10, 'Renaissance IPO', 'Renaissance IPO ETF', '11030', 55, 'USA', 'IPO', NULL, 'Renaissance IPO ETF', 'NYSEARCA', 'USD', 1, 30.48, '2022-09-07', NULL, NULL, NULL, 5, 1),
('2023-05-17', 11, 'Natixis Green Note', 'Natixis Structured Green Note', '5', 55, 'FIN', 'KNFP 0 08/25/32', 'FR001400AHR8', 'Natixis Structured Issuance SA', 'OMXH', 'EUR', 1000, 30000, '2022-09-07', '2022-01-17', '2032-08-15', 0, 5, 1),
('2023-05-18', 12, 'Atlantica', 'Atlantica Sustainable Green Notes', '11030', 5020, 'GBR', 'AY', NULL, 'Atlantica Sustainable Infrastructure PLC', 'NASDAQ', 'USD', 1, 32.96, '2022-09-07', NULL, NULL, NULL, 2, 1),
('2023-05-19', 13, 'ChargePoint', 'ChargePoint Holdings Common Stock', '11030', 5020, 'USA', 'CHPT', NULL, 'ChargePoint Holdings Inc', 'NYSE', 'USD', 1, 16.08, '2022-09-07', NULL, NULL, NULL, 2, 1),
('2023-05-20', 14, 'SunPower', 'SunPower Common Stock', '11030', 5020, 'USA', 'SPWR', NULL, 'SunPower Corporation', 'NASDAQ', 'USD', 1, 23.96, '2022-09-07', NULL, NULL, NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `investmentid` int(11) NOT NULL,
  `investmentdate` date NOT NULL,
  `instrumentid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `comments` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`investmentid`, `investmentdate`, `instrumentid`, `clientid`, `comments`) VALUES
(2, '2023-05-07', 1, 1, 'A great opportunity to invest in that meets my portfolio!');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) COLLATE utf8_bin NOT NULL,
  `emailaddress` varchar(30) COLLATE utf8_bin NOT NULL,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(30) COLLATE utf8_bin NOT NULL,
  `classicalusertype` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `fullname`, `emailaddress`, `username`, `password`, `classicalusertype`) VALUES
(1, 'Emily Wilson', 'emily.wilson@gmail.com', 'EmilyM', 'wmtaiWSh.VmrI', 'Relationship Manager'),
(2, 'Thomas Anderson', 'thomas.anderson@yahoo.com', 'Thomas', 'wmtaiWSh.VmrI', 'Relationship Manager'),
(3, 'Samantha Brown', 'samantha.brown@hotmail.com', 'Samantha', 'wmtaiWSh.VmrI', 'Relationship Manager'),
(4, 'Andrew Peterson', 'andrew.peterson@gmail.com', 'Andrew', 'wmtaiWSh.VmrI', 'Relationship Manager'),
(5, 'Victoria Martinez', 'victoria.martinez@gmail.com', 'Victoria', 'wmtaiWSh.VmrI', 'Relationship Manager');

-- --------------------------------------------------------

--
-- Table structure for table `opportunities`
--

CREATE TABLE `opportunities` (
  `datesubmitted` date NOT NULL,
  `oppid` int(11) NOT NULL,
  `oppname` varchar(50) COLLATE utf8_bin NOT NULL,
  `instrumentid` int(11) NOT NULL,
  `availabledate` date NOT NULL,
  `closingdate` date NOT NULL,
  `oppdetails` text COLLATE utf8_bin NOT NULL,
  `staffid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `opportunities`
--

INSERT INTO `opportunities` (`datesubmitted`, `oppid`, `oppname`, `instrumentid`, `availabledate`, `closingdate`, `oppdetails`, `staffid`) VALUES
('2023-05-07', 1, 'Common Stock', 1, '2023-05-01', '2023-05-31', 'A great opportunity for investment!', 1),
('2023-05-07', 2, 'Green Note', 11, '2023-05-01', '2023-05-31', 'A good opportunity with low risk.', 1),
('2023-05-07', 3, 'IPO', 10, '2023-05-01', '2023-05-31', 'A high-risk investment!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `preferenceopportunities`
--

CREATE TABLE `preferenceopportunities` (
  `prefid` int(11) NOT NULL,
  `oppid` int(11) NOT NULL,
  `status` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `preferenceopportunities`
--

INSERT INTO `preferenceopportunities` (`prefid`, `oppid`, `status`) VALUES
(1, 1, 'Invested'),
(1, 2, 'Assigned'),
(1, 3, 'Assigned'),
(2, 1, 'Assigned');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `prefid` int(11) NOT NULL,
  `datesubmitted` date NOT NULL,
  `prefdetails` text COLLATE utf8_bin NOT NULL,
  `clientid` int(11) NOT NULL,
  `assetid` varchar(8) COLLATE utf8_bin NOT NULL,
  `parmcode` int(8) NOT NULL,
  `countrycode` varchar(3) COLLATE utf8_bin NOT NULL,
  `regionid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`prefid`, `datesubmitted`, `prefdetails`, `clientid`, `assetid`, `parmcode`, `countrycode`, `regionid`) VALUES
(1, '2023-05-07', 'Interest in common stock from USA!', 1, '11030', 5110, 'BGD', 18),
(2, '2023-05-08', 'Interested in common stocks from the UK!', 1, '11030', 5720, 'GBR', 18);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `regionid` int(11) NOT NULL,
  `regionname` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`regionid`, `regionname`) VALUES
(1, 'Africa'),
(2, 'Americas'),
(3, 'Antarctica'),
(4, 'Asia'),
(5, 'Asia ex-Japan'),
(6, 'BRIC'),
(7, 'Carribbean'),
(8, 'Central Africa'),
(9, 'Central America'),
(10, 'Central Asia'),
(11, 'Central Europe'),
(12, 'EAFE'),
(13, 'Eastern Africa'),
(14, 'Eastern Asia'),
(15, 'Eastern Europe'),
(16, 'Emerging Markets (EM) Asia'),
(17, 'Emerging Markets (EM) Europe'),
(18, 'Europe'),
(19, 'European Union'),
(20, 'Middle East'),
(21, 'NAFTA'),
(22, 'North America'),
(23, 'Northern Africa'),
(24, 'Northern Europe'),
(25, 'Oceania'),
(26, 'South America'),
(27, 'South-Eastern Asia'),
(28, 'Southern Africa'),
(29, 'Southern Asia'),
(30, 'Southern Europe'),
(31, 'Western Africa'),
(32, 'Western Europe');

-- --------------------------------------------------------

--
-- Table structure for table `risklevels`
--

CREATE TABLE `risklevels` (
  `risklvlid` int(11) NOT NULL,
  `riskdesc` varchar(255) COLLATE utf8_bin NOT NULL,
  `riskdefinition` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `risklevels`
--

INSERT INTO `risklevels` (`risklvlid`, `riskdesc`, `riskdefinition`) VALUES
(1, 'Suitable for very conservative investors', 'Investors who hope to experience minimal fluctuations in portfolio value over a rolling one-year period and are generally only willing to buy investments that are priced frequently and have a high certainty of being able to sell quickly (less than a week) at a price close to the recently observed market value.'),
(2, 'Suitable for conservative investors', 'Investors who hope to experience no more than small portfolio losses over a rolling one-year period and are generally only willing to buy investments that are priced frequently and have a high certainty of being able to sell quickly (less than a week) although the investor may at times buy individual investments that entail greater risk.'),
(3, 'Suitable for moderate investors', 'Investors who hope to experience no more than moderate portfolio losses over a rolling one-year period in attempting to enhance longer-term performance and are generally willing to buy investments that are priced frequently and have a high certainty of being able to sell quickly (less than a week) in stable markets although the investor may at times buy individual investments that entail greater risk and are less liquid.'),
(4, 'Suitable for aggressive investors		', 'Investors who are prepared to accept greater portfolio losses over a rolling one-year period while attempting to enhance longer-term performance and are willing to buy investments or enter into contracts that may be difficult to sell or close within a short timeframe or have an uncertain realizable value at any given time.'),
(5, 'Suitable for very aggressive investors', 'Investors who are prepared to accept large portfolio losses up to the value of their entire portfolio over a one-year period and are generally willing to buy investments or enter into contracts that may be difficult to sell or close for an extended period or have an uncertain realizable value at any given time.');

-- --------------------------------------------------------

--
-- Table structure for table `typelevels`
--

CREATE TABLE `typelevels` (
  `typeid` int(11) NOT NULL,
  `typedesc` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `typelevels`
--

INSERT INTO `typelevels` (`typeid`, `typedesc`) VALUES
(1, 'category'),
(2, 'class'),
(3, 'group'),
(4, 'type');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assettypes`
--
ALTER TABLE `assettypes`
  ADD PRIMARY KEY (`assetid`),
  ADD KEY `assetlevel` (`assetlevel`),
  ADD KEY `parentid` (`parentid`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`countrycode`),
  ADD KEY `regionid` (`regionid`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`ccycode`);

--
-- Indexes for table `industrysectors`
--
ALTER TABLE `industrysectors`
  ADD PRIMARY KEY (`parmcode`);

--
-- Indexes for table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`instrumentid`),
  ADD KEY `parmcode` (`parmcode`),
  ADD KEY `countrycode` (`countrycode`),
  ADD KEY `riskrating` (`riskrating`),
  ADD KEY `currency` (`currency`),
  ADD KEY `staffid` (`staffid`),
  ADD KEY `instruments_ibfk_1` (`assetid`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`investmentid`),
  ADD KEY `instrumentid` (`instrumentid`),
  ADD KEY `clientid` (`clientid`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opportunities`
--
ALTER TABLE `opportunities`
  ADD PRIMARY KEY (`oppid`),
  ADD KEY `staffid` (`staffid`),
  ADD KEY `instrumentid` (`instrumentid`);

--
-- Indexes for table `preferenceopportunities`
--
ALTER TABLE `preferenceopportunities`
  ADD PRIMARY KEY (`prefid`,`oppid`),
  ADD KEY `oppid` (`oppid`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`prefid`),
  ADD KEY `staffid` (`clientid`),
  ADD KEY `regionid` (`regionid`),
  ADD KEY `countrycode` (`countrycode`),
  ADD KEY `parmcode` (`parmcode`),
  ADD KEY `assetid` (`assetid`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`regionid`);

--
-- Indexes for table `risklevels`
--
ALTER TABLE `risklevels`
  ADD PRIMARY KEY (`risklvlid`);

--
-- Indexes for table `typelevels`
--
ALTER TABLE `typelevels`
  ADD PRIMARY KEY (`typeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `instruments`
--
ALTER TABLE `instruments`
  MODIFY `instrumentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `investmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `opportunities`
--
ALTER TABLE `opportunities`
  MODIFY `oppid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `prefid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `risklevels`
--
ALTER TABLE `risklevels`
  MODIFY `risklvlid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assettypes`
--
ALTER TABLE `assettypes`
  ADD CONSTRAINT `assettypes_ibfk_1` FOREIGN KEY (`assetlevel`) REFERENCES `typelevels` (`typeid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instruments`
--
ALTER TABLE `instruments`
  ADD CONSTRAINT `instruments_ibfk_1` FOREIGN KEY (`assetid`) REFERENCES `assettypes` (`assetid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instruments_ibfk_2` FOREIGN KEY (`parmcode`) REFERENCES `industrysectors` (`parmcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instruments_ibfk_3` FOREIGN KEY (`countrycode`) REFERENCES `countries` (`countrycode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instruments_ibfk_4` FOREIGN KEY (`currency`) REFERENCES `currencies` (`ccycode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instruments_ibfk_5` FOREIGN KEY (`riskrating`) REFERENCES `risklevels` (`risklvlid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instruments_ibfk_6` FOREIGN KEY (`staffid`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `investments`
--
ALTER TABLE `investments`
  ADD CONSTRAINT `investments_ibfk_1` FOREIGN KEY (`instrumentid`) REFERENCES `instruments` (`instrumentid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `investments_ibfk_2` FOREIGN KEY (`clientid`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opportunities`
--
ALTER TABLE `opportunities`
  ADD CONSTRAINT `opportunities_ibfk_1` FOREIGN KEY (`staffid`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opportunities_ibfk_2` FOREIGN KEY (`instrumentid`) REFERENCES `instruments` (`instrumentid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `preferenceopportunities`
--
ALTER TABLE `preferenceopportunities`
  ADD CONSTRAINT `preferenceopportunities_ibfk_1` FOREIGN KEY (`prefid`) REFERENCES `preferences` (`prefid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preferenceopportunities_ibfk_2` FOREIGN KEY (`oppid`) REFERENCES `opportunities` (`oppid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `preferences`
--
ALTER TABLE `preferences`
  ADD CONSTRAINT `preferences_ibfk_1` FOREIGN KEY (`clientid`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preferences_ibfk_2` FOREIGN KEY (`regionid`) REFERENCES `regions` (`regionid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preferences_ibfk_3` FOREIGN KEY (`countrycode`) REFERENCES `countries` (`countrycode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preferences_ibfk_4` FOREIGN KEY (`parmcode`) REFERENCES `industrysectors` (`parmcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preferences_ibfk_5` FOREIGN KEY (`assetid`) REFERENCES `assettypes` (`assetid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
