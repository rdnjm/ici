<?php
	session_start();
	require '../needs/fpdf.php';
	include '../needs/connString.php';
	$pdf = new FPDF();
	$empNum = $_SESSION['empNum'];	
	$payrollstart = $_SESSION['viewpaystart'];
	$payrollend = $_SESSION['viewpayend'];
	//echo $payrollstart;
	if($_SESSION['type'] == "single"){
		$start = $payrollstart;
		$end = $payrollend;

		$query = "SELECT payslip.*, employee.LastName, employee.Firstname FROM payslip INNER JOIN employee ON employee.empNum = payslip.empNum WHERE payslip.empNum='" . $empNum . "' AND payrollstart='" . $_SESSION['date'] . "' AND payrollend='" . $_SESSION['end'] . "';" or die(mysqli_error($link));
		$result = conString($query);
		$rows = mysqli_fetch_array($result);
		//echo "SELECT * FROM employeemasterfile.payslip WHERE empNum='$empNum' AND payrollstart='$start' AND payrollend='$end'";
		//echo "<br> $query";
		$basic = $rows[3];
		$ot = $rows[4];
		$ut = $rows[5];
		$late = $rows[6];
		$tax = $rows[7];
		$sss = $rows[8];
		$philhealth = $rows[9];
		$pagibig = $rows[10];
		$grossEarnings = $rows[11];
		$grossDeductions = $rows[12];	
		$takehome = $rows[13];
		$lName = $rows[14];
		$fName = $rows[15];
/*
		echo $basic;
		echo $ot;
		echo $ut;
		echo $late;
		echo $tax;
		echo $sss;
		echo $philhealth;
		echo $pagibig;
		echo $grossEarnings;
		echo $grossDeductions;
		echo $takehome;
*/
		$pdf->AddPage();
		$pdf->SetFont('Arial', '', 12);
		//$pdf->Image('images/logo.png', 75, 8, 10, 13, 'PNG');
		$pdf->Cell(75, 10, '', 0);
		$pdf->Cell(0, 10, 'ICI MINISTRIES PHILIPPINES', 0);
		$pdf->SetFont('Arial', '', 9);
		$pdf->Ln(10);	

		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(93, 8, '', 0);
		$pdf->Cell(100, 8, "Payslip");
		$pdf->Ln(5);

		$pdf->SetFont('Arial', '', 11);
		$pdf->Cell(60, 10, "", 0);
		$pdf->Cell(0, 10, 'Payroll Period Ending ' . $start . ' - ' . $end, 0);
		$pdf->Ln(8);

		$pdf->Cell(67, 8, '', 0);
		$pdf->Cell(0, 8, 'Statement of Earnings and Deductions', 0);
		$pdf->Ln(8);

		$pdf->Cell(80, 8, '', 0);
		$pdf->Cell(0, 8, $lName . ', ' . $fName , 0);
		$pdf->Ln(15);
		
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(40, 8, '', 0);
		$pdf->Cell(40, 8, 'Earnings', 0);
		$pdf->Cell(45, 8, '', 0);	
		$pdf->Cell(40, 8, 'Deductions', 0);
		$pdf->Ln(8);	

		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell(22, 8, '', 0);
		$pdf->Cell(20, 8, 'Title', 0);
		$pdf->Cell(23, 8, '', 0);
		$pdf->Cell(20, 8, 'Amount', 0);
		$pdf->Cell(18, 8, '', 0);
		$pdf->Cell(30, 8, 'Deductions', 0);
		$pdf->Cell(15, 8, '', 0);
		$pdf->Cell(20, 8, 'Amount', 0);
		$pdf->Ln(5);	

		$pdf->Cell(22, 8, '', 0);
		$pdf->Cell(20, 8, 'Basic', 0);
		$pdf->Cell(23, 8, '', 0);
		$pdf->Cell(20, 8, number_format($rows[3],2), 0);
		$pdf->Cell(18, 8, '', 0);
		$pdf->Cell(30, 8, 'Tax Withheld', 0);
		$pdf->Cell(15, 8, '', 0);
		$pdf->Cell(20, 8, '(' . number_format($rows[7],2) . ')', 0);
		$pdf->Ln(5);

		$pdf->Cell(22, 8, '', 0);
		$pdf->Cell(20, 8, 'OT', 0);
		$pdf->Cell(23, 8, '', 0);
		$pdf->Cell(20, 8, number_format($rows[4],2), 0);
		$pdf->Cell(18, 8, '', 0);
		$pdf->Cell(30, 8, 'SSS', 0);
		$pdf->Cell(15, 8, '', 0);
		$pdf->Cell(20, 8, '(' . number_format($rows[8],2) . ')', 0);
		$pdf->Ln(5);

		$pdf->Cell(22, 8, '', 0);
		$pdf->Cell(20, 8, 'UT', 0);
		$pdf->Cell(23, 8, '', 0);
		$pdf->Cell(20, 8, '(' . number_format($rows[5],2) . ')', 0);
		$pdf->Cell(18, 8, '', 0);
		$pdf->Cell(30, 8, 'PhilHealth', 0);
		$pdf->Cell(15, 8, '', 0);
		$pdf->Cell(20, 8, '(' . number_format($rows[9],2) . ')', 0);
		$pdf->Ln(5);

		$pdf->Cell(22, 8, '', 0);
		$pdf->Cell(20, 8, 'Late', 0);
		$pdf->Cell(23, 8, '', 0);
		$pdf->Cell(20, 8, '(' . number_format($rows[6],2) . ')', 0);
		$pdf->Cell(18, 8, '', 0);
		$pdf->Cell(30, 8, 'Pag-IBIG', 0);
		$pdf->Cell(15, 8, '', 0);
		$pdf->Cell(20, 8, '(' . number_format($rows[10],2) . ')', 0);
		$pdf->Ln(5);	

		$pdf->Cell(22, 8, '', 0);
		$pdf->Cell(20, 8, 'Gross Earnings', 0);
		$pdf->Cell(23, 8, '', 0);
		$pdf->Cell(20, 8, number_format($rows[11],2), 0);
		$pdf->Cell(18, 8, '', 0);	
		$pdf->Cell(30, 8, 'Gross Deductions', 0);
		$pdf->Cell(15, 8, '', 0);	
		$pdf->Cell(20, 8, '(' . number_format($rows[12],2) . ')', 0);
		$pdf->Ln(10);

		$pdf->Cell(60, 8, '', 0);
		$pdf->Cell(30, 8, 'Total Take Home Pay', 0);
		$pdf->Cell(15, 8, '', 0);
		$pdf->Cell(20, 8, number_format($rows[13],2), 0);
	}
	$pdf->Output();
?>