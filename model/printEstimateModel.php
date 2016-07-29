<?
	class PrintEstimate extends FPDF{
		public function setEstMaster($estMst){
			$this->estMst = $estMst;
		}
		public function setEstDetail($estDtl){
			$this->estDtl = $estDtl;
		}
		public function setAttachment($attachment){
			$this->attachment = $attachment;
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
			$this->Cell(190,10,'JOB ESTIMATE',0,0,'C');
			$this->Ln(12);

			$this->SetFont('helvetica','B',10);
			$this->Cell(20,4,'Customer',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(83,4,$this->estMst['customerName'],'B',0,'L');
			$this->Cell(4,4,'',0,0,'C');
			$this->SetFont('helvetica','B',10);
			$this->Cell(30,4,'Estimate No',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(43,4,$this->estMst['quoteReferenceNo'],'B',0,'L');
			$this->Ln(8);

			$this->SetFont('helvetica','B',10);
			$this->Cell(20,4,'Address',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(83,4,$this->estMst['address'],'B',0,'L');
			$this->Cell(4,4,'',0,0,'C');
			$this->SetFont('helvetica','B',10);
			$this->Cell(30,4,'Date',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(43,4,dateFormat($this->estMst['transactionDate'],"M d, Y"),'B',0,'L');
			$this->Ln(8);

			$this->SetFont('helvetica','B',10);
			$this->Cell(20,4,'Contact No',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(83,4,$this->estMst['customerTelNo'],'B',0,'L');
			$this->Cell(4,4,'',0,0,'C');
			$this->SetFont('helvetica','B',10);
			$this->Cell(30,4,'Due Date',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(43,4,dateFormat($this->estMst['dueDate'],"M d, Y"),'B',0,'L');
			$this->Ln(8);

			// $this->Image($this->attachment, 80, 70, 100);
			// $this->Cell(190,50,, 80, 5, 50);,'TLBR',0,'C');
			// $this->Ln(55);
		}

		public function ImprovedTable(){
			$this->SetFont('helvetica','B',10);
			$this->Cell(5,6,'#','LTB',0,'C');
			$this->Cell(20,6,'SIZES','LTB',0,'C');
			$this->Cell(20,6,'# PCS','LTB',0,'C');
			$this->Cell(40,6,'COLOR','LTB',0,'C');
			$this->Cell(105,6,'MATERIALS','LTRB',0,'C');
			$this->Ln(6);

			$this->Cell(5,2,'','L',0,'C');
			$this->Cell(20,2,'','L',0,'C');
			$this->Cell(20,2,'','L',0,'C');
			$this->Cell(40,2,'','L',0,'C');
			$this->Cell(105,2,'','LR',0,'C');
			$this->Ln(2);

			$cnt = 1;
			for($i=0;$i<count($this->estDtl);$i++){
				$this->SetFont('helvetica','',9);
				$this->Cell(5,4,$cnt,'L',0,'C');
				$this->Cell(20,4,$this->estDtl[$i]['sizeDesc'],'L',0,'C');
				$this->Cell(20,4,$this->estDtl[$i]['quantity'],'L',0,'C');
				$this->Cell(40,4,$this->estDtl[$i]['color'],'L',0,'C');
				$this->Cell(105,4,$this->estDtl[$i]['material'],'LR',0,'C');
				$this->Ln(4);
				$cnt++;
			}

			$this->Cell(5,2,'','LB',0,'C');
			$this->Cell(20,2,'','LB',0,'C');
			$this->Cell(20,2,'','LB',0,'C');
			$this->Cell(40,2,'','LB',0,'C');
			$this->Cell(105,2,'','LRB',0,'C');
			$this->Ln(4);

			$this->SetFont('helvetica','B',10);
			$this->Cell(20,5,'Remarks',0,0,'L');
			$this->Cell(2,5,'',0,0,'C');
			$this->SetFont('helvetica','',9);
			$this->Cell(168,5,'','B',0,'C');
			$this->Ln(5);
		}

		public function Footer(){
			$this->SetY(-30);
			
			$this->SetFont('Courier','B',9);
			$this->Cell(190,4,'I agree that the above specifications/descriptions are my request upon order.',0,0,'L');
			$this->Ln(10);

			$this->Cell(10,4,null,0,0,'L');
			$this->Cell(80,4,$this->estMst['userName'],'B',0,'C');
			$this->Cell(10,4,null,0,0,'L');
			$this->Cell(80,4,$this->estMst['acknowledgeBy'],'B',0,'C');
			$this->Cell(10,4,null,0,0,'L');
			$this->Ln();
			$this->Cell(10,4,null,0,0,'L');
			$this->Cell(80,4,"Order Taken By",0,0,'C');
			$this->Cell(10,4,null,0,0,'L');
			$this->Cell(80,4,"Acknowledge By",0,0,'C');
			$this->Cell(10,4,null,0,0,'L');
			$this->Ln();
		}
	}
?>