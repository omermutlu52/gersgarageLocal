<?php
//============================================================+
// File name   : invoice.php
// Begin       : 2009-04-16
// Last Update : 2013-05-14
//
// Description : Example 051 for TCPDF class
//               Full page background
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Full page background
 * @author Nicola Asuni
 * @since 2009-04-16
 */


$conn = mysqli_connect("localhost", "root", "", "garage");

// //Get Heroku ClearDB connection information
// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"],1);
// $active_group = 'default';
// $query_builder = TRUE;
// // Connect to DB
// $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);


$id = $_GET["id"];
$bookingSQL = "SELECT * FROM gp_booking WHERE id = '$id'";
$bookingResult = $conn->query($bookingSQL);
$bookingData = $bookingResult->fetch_assoc();

$vehicle_make = $bookingData["vehicle_make"];
$vehicle_name = $bookingData["vehicle_name"];
$vehicle_model = $bookingData["vehicle_model"];
$vehicle = $vehicle_make . " " . $vehicle_name . " " . $vehicle_model;
$vehicle_lesNumber = $bookingData["vehicle_lesNumber"];
$vehicle_engineType = $bookingData["vehicle_engineType"];
$vehicle_bookingType = $bookingData["vehicle_bookingType"];
$spareParts = $bookingData["spare_part"];
$price = $bookingData["price"];
$vehicle_bookingDate = $bookingData["date"];
$vehicle_type=$bookingData["vehicle_type"];
$userID = $bookingData["user_id"];

$userSQL = "SELECT * FROM gp_customers WHERE id = '$userID'";
$userResult = $conn->query($userSQL);
$userData = $userResult->fetch_assoc();
$customerName = $userData["firstname"] . ' ' . $userData["lastname"];


if (!empty($spareParts)) {
$SQL = "SELECT * FROM gp_spareparts WHERE id = '$spareParts'";
$result = $conn->query($SQL);
$data = $result->fetch_assoc();

$sparePart = $data["name"];
$sparePartPrice = $data["price"];
}
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{
	//Page header
	public function Header()
	{
		// get the current page break margin
		$bMargin = $this->getBreakMargin();
		// get current auto-page-break mode
		$auto_page_break = $this->AutoPageBreak;
		// disable auto-page-break
		$this->SetAutoPageBreak(false, 0);
		// set bacground image
		$img_file = K_PATH_IMAGES . 'letterHead.jpg';
		$this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
		// restore auto-page-break status
		$this->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$this->setPageMark();
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ger-Garage');
$pdf->SetTitle('' . $vehicle . ' - Invoice');

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$lg = array();
$lg['a_meta_charset'] = 'UTF-8';
$lg['a_meta_dir'] = 'ltr';
$lg['a_meta_language'] = 'en';
$lg['w_page'] = 'page';

// set some language-dependent strings (optional)
$pdf->setLanguageArray($lg);
// set font
$pdf->SetFont('helvetica', '', 12);

$pdf->Image('images/letterHead.jpg', 15, 140, 75, 113, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);

// ---------------------------------------------------------


// add a page
$pdf->AddPage();



 if (!empty($spareParts)) { 
	
	$html = '
	<div>
		<div style="font-size: 18px;">
			<b>GER\'S GARAGE INVOICE</b>
		<div style="font-size: 16px;">
			<b style="text-align: left;">' . strtoupper($vehicle) . '</b>
		</div>
		<div style="font-size: 14px;">
			<b style="text-align: left;">' . strtoupper($vehicle_bookingDate) . '</b>
		</div>
	</div>
	<br>
	<table cellspacing="0" cellpadding="8" style="font-size: 12px;">
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">CUSTOMERS NAME:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($customerName) . '</td>
		</tr>
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">VEHICLE NAME:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($vehicle) . '</td>
		</tr>
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">VEHICLE TYPE:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($vehicle_type) . '</td>
		</tr>
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">LICENSE #:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($vehicle_lesNumber) . '</td>
		</tr>
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">ENGINE TYPE:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($vehicle_engineType) . '</td>
		</tr>
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">SERVICE TYPE:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($vehicle_bookingType) . '</td>
		</tr>
		
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">SPARE PART USED:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($sparePart) . '</td>
		</tr>
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">SERVICE PRICE:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($price) . ' EUROS</td>
		</tr>
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">SPARE PARTS PRICE:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($sparePartPrice) . ' EUROS</td>
		</tr>
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">TOTAL PRICE:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($price + $sparePartPrice) . ' EUROS</td>
		</tr>
	</table>
';


   }else{
	$html = '
	<div>
		<div style="font-size: 18px;">
			<b>GER\'S GARAGE INVOICE</b>
		<div style="font-size: 16px;">
			<b style="text-align: left;">' . strtoupper($vehicle) . '</b>
		</div>
	
		<div style="font-size: 14px;">
			<b style="text-align: left;">' . strtoupper($vehicle_bookingDate) . '</b>
		</div>
		
	</div>
	<br>
	<table cellspacing="0" cellpadding="8" style="font-size: 12px;">
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">CUSTOMERS NAME:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($customerName) . '</td>
		</tr>
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">VEHICLE NAME:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($vehicle) . '</td>
		</tr>
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">VEHICLE TYPE:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($vehicle_type) . '</td>
		</tr>
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">LICENSE #:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($vehicle_lesNumber) . '</td>
		</tr>
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">ENGINE TYPE:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($vehicle_engineType) . '</td>
		</tr>
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">SERVICE TYPE:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($vehicle_bookingType) . '</td>
		</tr>

		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">SERVICE PRICE:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($price) . ' EUROS</td>
		</tr>
	
		<tr>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">TOTAL PRICE:</td>
			<td style="background-color: #d1e7dd; color: #000000; border-bottom: 1px solid #4f695d;">' . strtoupper($price ) . ' EUROS</td>
		</tr>
	</table>
';

   } 

// Print a text


$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('' . $vehicle . 'invoice.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

