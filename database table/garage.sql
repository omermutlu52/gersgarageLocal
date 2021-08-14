-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2021 at 06:02 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garage`
--

-- --------------------------------------------------------

--
-- Table structure for table `gp_admin`
--

CREATE TABLE `gp_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(18) NOT NULL,
  `fullname` varchar(55) NOT NULL,
  `post` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bio` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gp_admin`
--

INSERT INTO `gp_admin` (`id`, `username`, `password`, `fullname`, `post`, `email`, `bio`) VALUES
(1, 'Omer', '12345', 'Omer Mutlu', 'CEO / Co-Founder', 'admin@admin.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,');

-- --------------------------------------------------------

--
-- Table structure for table `gp_booking`
--

CREATE TABLE `gp_booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_make` varchar(255) NOT NULL,
  `vehicle_name` varchar(255) NOT NULL,
  `vehicle_model` varchar(255) NOT NULL,
  `vehicle_lesNumber` varchar(255) NOT NULL,
  `vehicle_engineType` varchar(255) NOT NULL,
  `vehicle_bookingType` varchar(255) NOT NULL,
  `price` int(55) NOT NULL,
  `spare_part` varchar(260) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(260) NOT NULL,
  `status` varchar(55) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `employee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gp_booking`
--

INSERT INTO `gp_booking` (`id`, `user_id`, `vehicle_make`, `vehicle_name`, `vehicle_model`, `vehicle_lesNumber`, `vehicle_engineType`, `vehicle_bookingType`, `price`, `spare_part`, `description`, `date`, `status`, `vehicle_type`, `employee`) VALUES
(107, 48, 'Jaguar', 'XR', '2018', 'A123-456-789', 'Petrol', 'Annual Service', 200, '37', '2 October  Jaguar XR Annual Service', '2021-10-02', 'In Service', 'Car', '7'),
(108, 48, 'Jaguar', 'XR', '2018', 'A123-456-789', 'Petrol', 'Major Service', 600, '', '4 October   Major Service  Jaguar XR', '2021-10-04', 'Collected', 'Car', '6'),
(109, 49, 'Lexus', 'UX 300e', '2020', 'B123-456-789', 'Electric', 'Major Service', 600, '', '2 oct MAjor SErvice', '2021-10-02', 'Unrepairable', 'Car', '7'),
(110, 49, 'Lexus', 'UX 300e', '2020', 'B123-456-789', 'Electric', 'Repair / Fault', 150, '', 'Minor problem', '2021-10-04', 'Fixed', 'Car', '8'),
(111, 50, 'Alfa Romeo', ' 8C Competizione', '2020', 'C123-456-789', 'Petrol', 'Repair / Fault', 150, '', 'minor problem  Left mirror 2 Oct  Repair/Fault', '2021-10-02', 'Booked', 'Car', ''),
(112, 50, 'Alfa Romeo', ' 8C Competizione', '2020', 'C123-456-789', 'Petrol', 'Annual Service', 200, '', 'minor mirror problem', '2021-10-04', 'Booked', 'Car', ''),
(113, 51, 'Bentley', 'Continental GT', '2020', 'D123-456-789', 'Petrol', 'Major Service', 600, '', 'I have engine problem ', '2021-10-02', 'Booked', 'Car', ''),
(114, 51, 'Bentley', 'Continental GT', '2020', 'D123-456-789', 'Petrol', 'Major Repair', 400, '', 'Major engine problem', '2021-10-04', 'Booked', 'Car', ''),
(115, 52, 'McLaren', 'P1 GTR', '2021', 'E123-456-789', 'Petrol', 'Major Repair', 400, '', 'Major problem with brake', '2021-10-02', 'Booked', 'Car', ''),
(116, 52, 'McLaren', 'P1 GTR', '2021', 'E123-456-789', 'Petrol', 'Annual Service', 200, '67', 'Minor mirror problem', '2021-10-29', 'Booked', 'Car', ''),
(117, 53, 'BMW', 'BMW 1 Series M Coupe.', '2011', 'F123-456-789', 'Petrol', 'Annual Service', 200, '', 'Annual Check', '2021-10-02', 'Booked', 'Car', ''),
(118, 53, 'BMW', 'BMW 1 Series M Coupe.', '2011', 'F123-456-789', 'Petrol', 'Major Service', 600, '', 'Major problem with ligt', '2021-10-19', 'Booked', 'Car', ''),
(119, 54, 'Chevrolet', 'Bolt EV', '2021', 'G123-456-789', 'Electric', 'Major Repair', 400, '', 'major repair problem ', '2021-10-02', 'Booked', 'Car', ''),
(120, 54, 'Chevrolet', 'Bolt EV', '2021', 'G123-456-789', 'Electric', 'Repair / Fault', 150, '', 'minor repair', '2021-11-26', 'Booked', 'Car', ''),
(121, 55, 'HSV', 'Gen-F2 GTSR', '2021', 'J123-456-789', 'Petrol', 'Repair / Fault', 150, '', 'Last booking available on 2 Oct', '2021-10-02', 'Booked', 'Car', ''),
(122, 55, 'HSV', 'Gen-F2 GTSR', '2021', 'J123-456-789', 'Petrol', 'Annual Service', 200, '', 'Annual Repair I need', '2021-10-27', 'Booked', 'Car', ''),
(123, 56, 'Jeep', 'Grand Cherokee', '2021', 'D123-456-789', 'Petrol', 'Major Service', 600, '', 'Major engine problem', '2021-10-11', 'Booked', 'Car', ''),
(124, 56, 'Jeep', 'Grand Cherokee', '2021', 'D123-456-789', 'Petrol', 'Repair / Fault', 150, '', 'no major service at this day example', '2021-10-15', 'Booked', 'Car', ''),
(125, 57, 'Mercedes', 'AMG GT 63 S', '2021', 'M123-456-789', 'Petrol', 'Major Service', 600, '', 'only Major service on this day', '2021-10-11', 'Booked', 'Car', ''),
(126, 57, 'Mercedes', 'AMG GT 63 S', '2021', 'M123-456-789', 'Petrol', 'Major Repair', 400, '', 'No major service', '2021-10-15', 'Booked', 'Car', ''),
(127, 58, 'Kia', 'K900', '2020', 'M123-456-789', 'Petrol', 'Major Service', 600, '', 'only major servce', '2021-10-11', 'Booked', 'Car', ''),
(128, 58, 'Kia', 'K900', '2020', 'M123-456-789', 'Petrol', 'Repair / Fault', 150, '', 'no major service', '2021-10-15', 'Booked', 'Car', ''),
(129, 59, 'Volvo', 'S90', '2020', 'D123-456-789', 'Petrol', 'Major Service', 600, '', 'Major problem in engine', '2021-10-11', 'Booked', 'Car', ''),
(130, 59, 'Volvo', 'S90', '2020', 'D123-456-789', 'Petrol', 'Annual Service', 200, '', 'no major service', '2021-10-15', 'Booked', 'Car', ''),
(131, 60, 'Volkswagen', 'Caddy Cargo', '2019', 'B123-456-789', 'Diesel', 'Major Service', 600, '', 'Major Service booking  test', '2021-10-11', 'Booked', 'Small Van', ''),
(132, 60, 'Volkswagen', 'Caddy Cargo', '2018', 'B123-456-789', 'Diesel', 'Annual Service', 200, '', 'No message asdasda', '2021-10-15', 'Booked', 'Small Van', ''),
(133, 61, 'Mini', 'Cooper', '2020', 'E123-456-789', 'Petrol', 'Annual Service', 200, '', 'no major service booking test', '2021-10-15', 'Booked', 'Car', ''),
(134, 61, 'Mini', 'Cooper', '2020', 'E123-456-789', 'Petrol', 'Annual Service', 200, '', 'test', '2021-10-15', 'Booked', 'Car', ''),
(135, 62, 'Suzuki', 'Hayabusa', '2020', 'G123-456-789', 'Petrol', 'Annual Service', 200, '', 'test', '2021-10-15', 'Booked', 'Motorbike', ''),
(136, 63, 'Suzuki', 'GSX-R1100', '2020', 'K123-456-789', 'Petrol', 'Repair / Fault', 150, '', 'test', '2021-10-15', 'Booked', 'Motorbike', ''),
(137, 64, 'Toyota', 'Crown', '2021', 'T123-456-789', 'Hybrid', 'Repair / Fault', 150, '', 'test', '2021-10-15', 'Booked', 'Car', ''),
(138, 66, 'Lexus', 'ES 350', '2021', 'O123-456-789', 'Hybrid', 'Major Service', 600, '', 'asd', '2021-10-27', 'Collected', 'Car', ''),
(139, 65, 'Lexus', 'ES 350', '2021', 'M123-456-789', 'Diesel', 'Major Repair', 400, '61', 'qwe', '2021-10-26', 'Collected', 'Car', '7'),
(140, 65, 'Lexus', 'ES 350', '2021', '0000000', 'Diesel', 'Annual Service', 200, '', 'asd', '2021-08-28', 'Booked', 'Car', ''),
(141, 65, 'Lada', 'Civic', '2021', 'M123-456-789', 'Diesel', 'Major Service', 600, '', 'asd', '2021-10-23', 'Booked', 'Small Van', '');

-- --------------------------------------------------------

--
-- Table structure for table `gp_customers`
--

CREATE TABLE `gp_customers` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(55) NOT NULL,
  `number` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date` varchar(260) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gp_customers`
--

INSERT INTO `gp_customers` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `number`, `address`, `date`, `status`) VALUES
(47, 'tsubasa1907', '123', 'Tsubasa', 'Ozora', 'tsubasa@gmail.com', 90813955, 'Tokyo', '06/08/2021', '0'),
(48, 'altay1', '123', 'Altay', 'Bayindir', 'altaybayindir@gmail.com', 2147483647, 'Dublin', '06/08/2021', '1'),
(49, 'atilla41', '123', 'Atilla ', 'Szalai', 'atilla@gmail.com', 123456798, 'Dublin', '06/08/2021', '1'),
(50, 'berke35', '123', 'Berke ', 'Ozer', 'berke@gmail.com', 132456789, 'Dublin', '06/08/2021', '0'),
(51, 'gustavo20', '123', 'Luiz', 'Gustavo Diaz', 'luizgustavo@gmail.com', 123465798, 'Dublin', '06/08/2021', '0'),
(52, 'ozan7', '123', 'Ozan', 'Tufan', 'ozan@gmail.com', 123456789, 'Dublin', '06/08/2021', '0'),
(53, 'irfan17', '123', 'Irfan Can', 'Kahveci', 'irfan@gmail.com', 123456798, 'Dublin', '06/08/2021', '1'),
(54, 'miha20', '123', 'Miha ', 'Zajc', 'miha@gmail.com', 123456798, 'Dublin', '06/08/2021', '1'),
(55, 'Jose5', '123', 'Jose ', 'Sosa', 'jose@gmail.com', 123456897, 'Dublin', '06/08/2021', '0'),
(56, 'dimitros14', '123', 'Dimitros', 'Pelkas', 'dimitros@gmail.com', 123456789, 'Dublin', '06/08/2021', '0'),
(57, 'M10', '123', 'Mesut ', 'Ozil', 'mesutozil@gmail.com', 123456789, 'London', '06/08/2021', '0'),
(58, 'MHY8', '123', 'Mert Hakan ', 'Yandas', 'mert@gmail.com', 123456789, 'Dublin', '06/08/2021', '0'),
(59, 'diego11', '123', 'Diego', 'Perotti', 'diego@gmail.com', 12346978, 'Dublin', '07/08/2021', '0'),
(60, 'BOS', '123', 'Bright Osai', 'Samuel', 'bright@gmail.com', 12364848, 'Dublin', '07/08/2021', '0'),
(61, 'Enner13', '123', 'Enner ', 'Valencia', 'enner@gmail.com', 222222222, 'Dublin', '07/08/2021', '0'),
(62, 'Genzo', '123', 'Genzo', 'Wakabayashi', 'genzo@gmail.com', 1234589, 'Tokyo', '07/08/2021', '0'),
(63, 'Kojiro', '123', 'Kojiro', 'Hyuga', 'kojiro@gmail.com', 12345689, 'Okinawa', '07/08/2021', '0'),
(64, 'Kentaro', '123', 'Taro', 'Misaki', 'taro@gmail.com', 12354897, 'Osaka', '07/08/2021', '0'),
(65, 'omerMutlu', '123', 'Omer', 'Mutlu', 'omermutlu52@icloud.com', 123456789, 'Dublin', '08/08/2021', '0'),
(66, 'osmnmtl', '123', 'Osman', 'Mutlu', 'osmanmutlu@gmail.com', 123456879, 'Istanbul', '10/08/2021', '0'),
(67, 'omerMutlu11', '123', 'Omer', 'Mutlu', 'akifkirca_271@hotmail.com', 123456789, 'Dublin', '13/08/2021', '0'),
(68, 'omerMutlu1', '123', 'Omer', 'Mutlu', 'akifkirca_271@hotmail.com', 0, 'Dublin', '13/08/2021', '0');

-- --------------------------------------------------------

--
-- Table structure for table `gp_spareparts`
--

CREATE TABLE `gp_spareparts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(999) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gp_spareparts`
--

INSERT INTO `gp_spareparts` (`id`, `name`, `description`, `stock`, `price`) VALUES
(20, 'Shell Helix 5W-30 OIL', 'Shell Helix 5W-30 Ultra Professional AG C3 - 5Ltr', 49, 80),
(21, 'Castrol Magnatec 5W-30  OIL', 'Castrol Magnatec 5W-30  Stop-Start C3 - 4Ltr', 50, 70),
(22, 'TRIPLE QX OIL', 'TRIPLE QX Fully Syn 5W-40 A3/B4 - 1Ltr', 50, 12),
(23, 'Bosch Retrofit Flat Wiper ', 'Bosch Retrofit Flat Wiper Blade Single Ar24U', 10, 22),
(24, 'Blue Print Oil Filter', 'Blue Print Oil Filter', 9, 13),
(25, 'Mintex Front Brake Pads', 'Mintex Front Brake Pads (Full set for Front Axle) for Audi 100 C1 1968 To 1976 - 1.9 GL [112hp. 1871cc.]', 20, 23),
(26, 'Right Rear Lamp', 'Right Rear Lamp (Outer, On Quarter Panel) for BMW 2 Series Active Tourer 2014 on', 5, 95),
(27, 'PHILIPS - 11972XUWX2', 'Philips XtremeUltinon LED gen2 LED H7 250% Brighter - Premium LED Conversion Kit\r\n', 4, 143),
(28, 'PHILIPS - 12972XVPS2', 'H7 Philips XtremeVision Pro150 55W Bulbs +150% Brightness, Longer Life - Pair, x2 H7 Upgrade Bulbs\r\n', 6, 32),
(29, 'DENSO - DU-040R', 'DENSO Hybrid Blade 400mm 16inch\r\n', 6, 16),
(30, 'PHILIPS - 12972PRC1', 'Philips H7 12V 55W +30% Vision Single Halogen Bulb (Boxed)\r\n', 9, 5),
(31, 'M-TECH - MTLB010W', 'M-Tech Pair White W5W/501 Led (1Xflux 8Mm/Round)\r\n', 3, 3),
(32, 'M-TECH - MTGN006', 'M-Tech Hb4/9006 Replacement Bulb Socket/Connector\r\n', 4, 4),
(33, 'Intermotor 76055 Ignition Lead', 'Intermotor 76055 Ignition Lead', 20, 11),
(34, 'NGK 4415 DCPR7E Spark Plug', 'NGK 4415 DCPR7E Spark Plug 8pcs', 10, 35),
(35, 'Heater Glow Plugs', 'Heater Glow Plugs,4pcs Diesel Heater Glow Plugs for Chrysler Seat', 20, 21),
(36, 'Bosch P7157 Oil Filter', 'Bosch P7157 Oil Filter', 12, 8),
(37, 'EGR Solenoid Valve', 'Car Exhaust Gas Recirculation EGR Solenoid Valve Vacuum Control Switch, Original Engine Management EGR Valve for Maz-da 626 Protege KL0118741, K5T49090, 911707,K5T49099, K5T49091, K5T490', 9, 15),
(38, 'Amrxuts 7700108027 Oxygen Sensor', 'Amrxuts 7700108027 Lambda Probe O2 Oxygen Sensor Fit for RENAULT CLIO TRAFIC ESPACE GRAND SCÉNIC KANGOO MEGANE LAGUNA MODUS THALIA TWINGO 1.2 1.4 1.6 1.8 2.0 mk2 3 4 5', 25, 20),
(39, 'Air Pressure Boost Sensor', 'Air Pressure Boost Sensor, Map Manifold Air Pressure Turbo Boost Sensor For Fia t Ope l Zafira and Bosch 0281002437', 22, 15),
(40, '38MM Engine Motor Cylinder Piston Crankshaft ', '38MM Engine Motor Cylinder Piston Crankshaft Engine Gardening Machine Chainsaw Motor Cylinder Piston Replacement Kit for STIHL MS170 MS180 018 Chainsaw', 17, 80),
(41, 'Electric Fuel Pump', 'Electric Fuel Pump 12V Universal Metal 4-7 PSI Low Pressure Inline Fuel Pump Diesel Petrol HEP02A', 25, 16),
(42, 'Emergency Fuel Cap ', 'Emergency Fuel Cap Sumex 4002081 Emergency Fuel Cap', 20, 4),
(43, 'Fuel Pressure Regulator', 'KIMISS Universal Adjustable Fuel Pressure Regulator Kit Oil 0-100psi Gauge AN 6 Fitting End', 22, 35),
(44, 'ACROPIX 2N1U9F593KA IWP119', 'ACROPIX 2N1U9F593KA IWP119 Oil Petrol Fuel Injector for Car Vehicle', 28, 13),
(45, 'Clutch Kit', 'BluePrint ADT330246 Clutch Kit with clutch release bearing, pack of one', 29, 50),
(46, 'Self Drive/Clutch Cable', 'Genuine Castel Garden Self Drive/Clutch Cable 381000668/1 For Models Listed', 27, 18),
(47, 'STP R134A AIR CON', 'STP R134A AIR CON GAS LARGE 510G REFILL CAN & TRIGGER DISPENSER KIT', 28, 120),
(48, 'FIRST LINE - FEM3193 - ENGINE MOUNTING ', 'FIRST LINE - FEM3193 - ENGINE MOUNTING (ENGINE MOUNTING) - BMW Z4 ROADSTER (E85) M', 29, 15),
(49, 'MANNOL - MN9672 BRAKE CLEANER 600ML', 'MANNOL - MN9672 BRAKE CLEANER 600ML', 31, 5),
(50, 'TURTLE WAX - FG7610', 'TURTLE WAX - FG7610', 55, 14),
(51, 'CARPLAN - POL103', 'CARPLAN - POL103\r\n', 15, 3),
(52, 'LIQUI MOLY - 1549', 'LIQUI MOLY - 1549', 55, 3),
(53, 'CARPLAN - SWS525', 'CARPLAN - SWS525\r\n', 40, 40),
(54, 'T-CUT - CSB150', 'T-Cut Csb150 Black Color FAST Scratch Remover 150g\r\n', 55, 10),
(55, 'CARPLAN - ECL005', 'Carplan Ecl005 Engine Cleaner And Degreaser 5L\r\n', 25, 30),
(56, 'CARPLAN - DVC600', 'CARPLAN DASH VALET 600ML CarPlan Dash Valet effortlessly removes ingrained dirt and grime from dashboards & interior plastic trim leaving a natural finish particularly suitable for modern vehicles.\r\n', 10, 12),
(57, 'CARPLAN - BTW375', 'Carplan Btw375 Black Trim Wax 375ml\r\n', 9, 9),
(58, 'CARPLAN - CTS500', 'Carplan Tyre Shine 500ml\r\n', 22, 6),
(59, 'BETA - 017500500', 'Beta 1750 500-LEVER OPERATED GREASE GUN\r\n', 5, 32),
(60, 'AST - AST6036', 'AST Brake Caliper Piston Wind Back Tool\r\n', 17, 71),
(61, 'AST - AST5053', 'AST Oil Drain Funnel\r\n', 54, 33),
(62, 'AST - AST3246', 'AST Injector Removal Slide Hammer\r\n', 5, 148),
(63, 'BETA - 015290100', 'Beta 1529/C7-7 PULLEY PULLERS IN CASE\r\n', 7, 115),
(64, 'BETA - 018780011', 'Beta 11L Oil Drain Pain Fuid Colle\r\n', 30, 30),
(65, 'JEFFERSON - JEFAXSTD03', 'Jefferson Ratchet Type 3 Ton Axle\r\n', 9, 53),
(66, 'AST SUSPENSION ', 'AST Suspension Bush Rem/Inst Kit - Fiesta/Puma/Ka\r\n', 3, 355),
(67, 'Pirelli P-ZERO (PZ4)* XL', 'Pirelli P-ZERO (PZ4)* XL - 235/35R19 91Y - Summer Tyres [Energy Class B]\r\n', 14, 150),
(68, 'Pirelli Moto', 'Pirelli Moto – Diablo Supercorsa BSB 180/55ZR17 73 W\r\n', 20, 120),
(69, 'PIRELLI PZERO NERO GT XL', 'PIRELLI PZERO NERO GT XL - 225/40R18 92Y - E/B/72dB - Summer Tyres [Energy Class E]\r\n', 5, 100),
(70, 'Bridgestone TURANZA ', 'Bridgestone TURANZA T005 DRIVEGUARD - 225/40 R18 92Y XL - C/A/72 - Summer tyres (Car & SUV) [Energy Class C]\r\n', 10, 120),
(71, 'Bridgestone BLIZZAK ', 'Bridgestone BLIZZAK LM005 DRIVEGUARD - 205/60 R16 96H XL - E/A/71 - Winter tyres (Car & SUV) [Energy Class E]\r\n', 7, 120);

-- --------------------------------------------------------

--
-- Table structure for table `gp_staff`
--

CREATE TABLE `gp_staff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `joining_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gp_staff`
--

INSERT INTO `gp_staff` (`id`, `name`, `post`, `email`, `number`, `address`, `joining_date`) VALUES
(6, 'OMER MUTLU', 'Menager/Mecanic', 'omermutlu52@icloud.com', 1234456789, 'Dublin', '2021-08-04'),
(7, 'John Doe', 'Mecanic', 'johndoe@gmail.com', 0, 'Dublin', '2021-08-04'),
(8, 'Jane Doe', 'Mecanic', 'janedoe@gmail.com', 0, 'Dublin', '2021-08-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gp_admin`
--
ALTER TABLE `gp_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gp_booking`
--
ALTER TABLE `gp_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gp_customers`
--
ALTER TABLE `gp_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `gp_spareparts`
--
ALTER TABLE `gp_spareparts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gp_staff`
--
ALTER TABLE `gp_staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gp_admin`
--
ALTER TABLE `gp_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gp_booking`
--
ALTER TABLE `gp_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `gp_customers`
--
ALTER TABLE `gp_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `gp_spareparts`
--
ALTER TABLE `gp_spareparts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `gp_staff`
--
ALTER TABLE `gp_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
