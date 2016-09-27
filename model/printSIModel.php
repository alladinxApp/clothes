<?
	class PrintSalesInvoice extends FPDF{
		public function setARMst($arMst){
			$this->arMst = $arMst;
		}
		public function setBillingMst($billMst){
			$this->billMst = $billMst;
		}
		public function setDeliveryDtl($delDtl){
			$this->delDtl = $delDtl;
		}
		
		public function Header(){
			$this->Image('img/logo.png', 80, 5, 50);
			$this->Ln(10);
			$this->SetFont('helvetica','B',10);
			$this->Cell(190,5,'Block 1, Lots 2,3 and 4. Ledesco Village, La Paz, Iloilo City, 5000 Iloilo',0,0,'C');
			$this->Ln(5);

			$this->Cell(190,5,'Phone: (033) 320 6616',0,0,'C');
			$this->Ln(5);

			$this->SetFont('helvetica','B',20);
			$this->Cell(190,10,'SALES INVOICE',0,0,'C');
			$this->Ln(12);

			$this->SetFont('helvetica','B',10);
			$this->Cell(20,4,'Customer',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(83,4,$this->billMst['customerName'],'B',0,'L');
			$this->Cell(4,4,'',0,0,'C');
			$this->SetFont('helvetica','B',10);
			$this->Cell(30,4,'Billing Ref No',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(43,4,$this->billMst['billingReferenceNo'],'B',0,'L');
			$this->Ln(8);

			$this->SetFont('helvetica','B',10);
			$this->Cell(20,4,'Address',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(83,4,$this->billMst['customerAddress'],'B',0,'L');
			$this->Cell(4,4,'',0,0,'C');
			$this->SetFont('helvetica','B',10);
			$this->Cell(30,4,'Date',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(43,4,dateFormat($this->arMst['createdDate'],"M d, Y"),'B',0,'L');
			$this->Ln(8);

			$this->SetFont('helvetica','B',10);
			$this->Cell(20,4,'Contact No',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(83,4,$this->billMst['customerTelNo'],'B',0,'L');
			$this->Cell(4,4,'',0,0,'C');
			// $this->SetFont('helvetica','B',10);
			// $this->Cell(30,4,'AR No',0,0,'L');
			// $this->Cell(2,4,':',0,0,'C');
			// $this->Cell(3,4,'',0,0,'C');
			// $this->SetFont('helvetica','',10);
			// $this->Cell(43,4,$this->arMst['ARNo'],'B',0,'L');
			$this->Ln(8);
		}

		public function ImprovedTable(){
			$this->SetFont('helvetica','B',10);
			$this->Cell(100,6,'DESCRIPTION','LTB',0,'C');
			$this->Cell(50,6,'','LTB',0,'C');
			$this->Cell(40,6,'AMOUNT','LTBR',0,'C');
			$this->Ln(6);

			$this->SetFont('helvetica','',9);
			$this->Cell(100,6,'Payments for ' . $this->billMst['jobOrderReferenceNo'],'L',0,'L');
			$this->SetFont('helvetica','B',9);
			$this->Cell(50,6,'SUB-TOTAL','L',0,'L');
			$this->Cell(40,6,number_format($this->arMst['tender'],2),'LR',0,'R');
			$this->Ln(6);

			$this->SetFont('helvetica','',9);
			$this->Cell(100,6,$this->arMst['remarks'],'L',0,'L');
			$this->SetFont('helvetica','B',9);
			$this->Cell(50,6,'VAT 12%','L',0,'L');
			$this->Cell(40,6,'0.00','LR',0,'R');
			$this->Ln(6);

			$this->Cell(100,6,'','L',0,'C');
			$this->Cell(50,6,'TOTAL AMOUNT','L',0,'L');
			$this->Cell(40,6,number_format($this->arMst['tender'],2),'LR',0,'R');
			$this->Ln(6);

			$this->Cell(100,2,'','LB',0,'C');
			$this->Cell(50,2,'','LB',0,'C');
			$this->Cell(40,2,'','LBR',0,'C');
			$this->Ln(2);

			$this->Ln(10);

			$this->SetFont('helvetica','B',9);
			$this->Cell(80,6,$this->arMst['userName'],'B',0,'C');
			$this->Cell(30,6,null,0,0,'L');
			$this->Cell(80,6,'','B',0,'C');
			$this->Ln();

			$this->Cell(80,6,"Prepared By",0,0,'C');
			$this->Cell(30,6,null,0,0,'L');
			$this->Cell(80,6,"Received By",0,0,'C');
			$this->Ln();
		}

		public function Footer(){
			$this->SetY(-38);

			
		}
	}
?>