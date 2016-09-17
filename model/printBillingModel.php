<?
	class PrintBilling extends FPDF{
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
			$this->Cell(43,4,dateFormat($this->billMst['billedDate'],"M d, Y"),'B',0,'L');
			$this->Ln(8);

			$this->SetFont('helvetica','B',10);
			$this->Cell(20,4,'Contact No',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(83,4,$this->billMst['customerTelNo'],'B',0,'L');
			$this->Ln(8);
		}

		public function ImprovedTable(){
			$this->SetFont('helvetica','B',10);
			$this->Cell(5,6,'#','LTB',0,'C');
			$this->Cell(35,6,'ARTICLES','LTB',0,'C');
			$this->Cell(70,6,'SPECIFICATIONS','LTB',0,'C');
			$this->Cell(20,6,'QTY','LTB',0,'C');
			$this->Cell(20,6,'UOM','LTB',0,'C');
			$this->Cell(20,6,'PRICE','LTB',0,'C');
			$this->Cell(20,6,'TOTAL','LTRB',0,'C');
			$this->Ln(6);

			$this->Cell(5,2,'','L',0,'C');
			$this->Cell(35,2,'','L',0,'C');
			$this->Cell(70,2,'','L',0,'C');
			$this->Cell(20,2,'','L',0,'C');
			$this->Cell(20,2,'','L',0,'C');
			$this->Cell(20,2,'','L',0,'C');
			$this->Cell(20,2,'','LR',0,'C');
			$this->Ln(2);

			$cnt = 1;
			$totalamnt = 0;
			$totalqty = 0;
			for($i=0;$i<count($this->delDtl);$i++){
				$total = 0;
				$total = ($this->delDtl[$i]['price'] * $this->delDtl[$i]['actual']);
				$totalamnt += $total;
				$totalqty += $this->delDtl[$i]['actual'];

				$this->SetFont('helvetica','',9);
				$this->Cell(5,4,$cnt,'L',0,'C');
				$this->Cell(35,4,$this->delDtl[$i]['sizeDesc'],'L',0,'L');
				$this->Cell(70,4,$this->delDtl[$i]['specification'],'L',0,'L');
				$this->Cell(20,4,$this->delDtl[$i]['actual'],'L',0,'C');
				$this->Cell(20,4,$this->delDtl[$i]['uomDesc'],'L',0,'L');
				$this->Cell(20,4,number_format($this->delDtl[$i]['price'],2),'L',0,'R');
				$this->Cell(20,4,number_format($total,2),'LR',0,'R');
				$this->Ln(4);
				$cnt++;
			}

			$this->Cell(5,2,'','LB',0,'C');
			$this->Cell(35,2,'','LB',0,'C');
			$this->Cell(70,2,'','LB',0,'C');
			$this->Cell(20,2,'','LB',0,'C');
			$this->Cell(20,2,'','LB',0,'C');
			$this->Cell(20,2,'','LB',0,'C');
			$this->Cell(20,2,'','LRB',0,'C');
			$this->Ln(2);

			$this->SetFont('helvetica','B',9);
			$this->Cell(110,6,'TOTAL >>>>>','LB',0,'R');
			$this->SetFont('helvetica','',9);
			$this->Cell(20,6,$totalqty,'LB',0,'C');
			$this->Cell(20,6,'','LB',0,'C');
			$this->Cell(20,6,'','LB',0,'C');
			$this->Cell(20,6,number_format($totalamnt,2),'LRB',0,'R');
			$this->Ln(8);

			if($this->billMst['downPayment'] > 0){
				$this->Cell(170,4,'Down Payment: ',0,0,'R');
				$this->Cell(20,4,$this->billMst['downPayment'],0,0,'R');
				$this->Ln(4);
			}

			if($this->billMst['discount'] > 0){
				$this->Cell(170,4,'Discount: ',0,0,'R');
				$this->Cell(20,4,$this->billMst['discount'],0,0,'R');
				$this->Ln(4);

				// $this->Cell(170,4,'Sub-Total: ',0,0,'R');
				// $this->Cell(20,4,$this->billMst['subTotal'],0,0,'R');
				// $this->Ln(4);
			}

			$this->Cell(170,4,'Vat 12%: ',0,0,'R');
			$this->Cell(20,4,$this->billMst['vat'],0,0,'R');
			$this->Ln(4);

			$this->SetFont('helvetica','B',9);
			$this->Cell(170,6,'Grand Total: ',0,0,'R');
			$this->Cell(20,6,$this->billMst['totalAmount'],'T',0,'R');
			$this->Ln(8);

			// $this->SetFont('helvetica','B',10);
			// $this->Cell(20,5,'Remarks',0,0,'L');
			// $this->Cell(2,5,'',0,0,'C');
			// $this->SetFont('helvetica','',9);
			// $this->Cell(168,5,'','B',0,'C');
			// $this->Ln(6);
		}

		public function Footer(){
			$this->SetY(-50);

			$this->SetFont('helvetica','B',9);
			$this->Cell(80,4,'ANNABELLE BALBOA',0,0,'C');
			$this->Cell(30,4,null,0,0,'L');
			$this->Cell(80,4,'',0,0,'C');
			$this->Ln();
			$this->SetFont('helvetica','',9);
			$this->Cell(80,4,'OPERATIONS MANAGER','B',0,'C');
			$this->Cell(30,4,null,0,0,'L');
			$this->Cell(80,4,'','B',0,'C');
			$this->Ln();
			$this->Cell(80,4,"Prepared By",0,0,'C');
			$this->Cell(30,4,null,0,0,'L');
			$this->Cell(80,4,"Received By",0,0,'C');
			$this->Ln();

			$this->SetFont('helvetica','B',9);
			$this->Cell(50,4,null,0,0,'L');
			$this->Cell(90,4,"BEATRICE NOEL GENSON",0,0,'C');
			$this->Cell(50,4,null,0,0,'L');
			$this->Ln();
			$this->SetFont('helvetica','',9);
			$this->Cell(50,4,null,0,0,'L');
			$this->Cell(90,4,"CHIEF EXECUTIVE OFFICER",'B',0,'C');
			$this->Cell(50,4,null,0,0,'L');
			$this->Ln();
			$this->Cell(50,4,'',0,0,'C');
			$this->Cell(90,4,'Approved By',0,0,'C');
			$this->Cell(50,4,'',0,0,'C');
			$this->Ln(8);

			$this->SetFont('helvetica','B',9);
			$this->Cell(35,4,'For Check Payments: ',0,0,'L');
			$this->SetFont('helvetica','',9);
			$this->Cell(155,4,"BPI Current Account (AIVEE'S CLOTHES STATION INC. | 1335-1209-29)",0,0,'L');
			$this->Ln();
			$this->SetFont('helvetica','B',9);
			$this->Cell(40,4,'Western Union Payment: ',0,0,'L');
			$this->SetFont('helvetica','',9);
			$this->Cell(150,4,"Lloyd Ballena (Ledesco Village Block 1 Lots 2,3,4 La Paz, Iloilo City)",0,0,'L');
			$this->Ln();
		}
	}
?>