<?
	class PrintEmployeeLabor extends FPDF{
		public function setEmpLaborMaster($empLaborMst){
			$this->empLaborMst = $empLaborMst;
		}
		public function setEmpLaborDetail($empLaborDtl){
			$this->empLaborDtl = $empLaborDtl;
		}
		public function setLaborCostMaster($laborCostMst){
			$this->laborCostMst = $laborCostMst;
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
			$this->Cell(190,10,'WORK DETAILS REPORT',0,0,'C');
			$this->Ln(12);

			$this->SetFont('helvetica','B',10);
			$this->Cell(25,4,'Job Order No',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(80,4,$this->empLaborMst['jobOrderReferenceNo'],'B',0,'L');
			$this->Ln(8);

			$this->SetFont('helvetica','B',10);
			$this->Cell(25,4,'Customer',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(80,4,$this->empLaborMst['customerName'],'B',0,'L');
			$this->Ln(8);

			$this->SetFont('helvetica','B',10);
			$this->Cell(25,4,'Description',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(80,4,$this->empLaborMst['jobDescription'],'B',0,'L');
			$this->Ln(8);

			$this->SetFont('helvetica','B',10);
			$this->Cell(25,4,'Employee',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(80,4,$this->empLaborMst['employeeName'],'B',0,'L');
			$this->Ln(8);
		}

		public function ImprovedTable(){
			$this->SetFont('helvetica','B',10);
			$this->Cell(5,6,'#','LTB',0,'C');
			$this->Cell(90,6,'OPERATIONS','LTB',0,'C');
			$this->Cell(30,6,'QTY','LTB',0,'C');
			$this->Cell(30,6,'COST','LTB',0,'C');
			$this->Cell(35,6,'AMOUNT','LTRB',0,'C');
			$this->Ln(6);

			$this->Cell(5,2,'','L',0,'C');
			$this->Cell(90,2,'','L',0,'C');
			$this->Cell(30,2,'','L',0,'C');
			$this->Cell(30,2,'','L',0,'C');
			$this->Cell(35,2,'','LR',0,'C');
			$this->Ln(2);

			$cnt = 1;
			$totalqty = 0;
			$totalamount = 0;
			for($i=0;$i<count($this->laborCostMst);$i++){
				$exist = 0;
				for($a=0;$a<count($this->empLaborDtl);$a++){
					if($this->laborCostMst[$i]['laborCostsCode'] == $this->empLaborDtl[$a]['laborCostsCode']){
						$this->SetFont('helvetica','',9);
						$this->Cell(5,6,$cnt,'L',0,'C');
						$this->Cell(90,6,$this->laborCostMst[$i]['description'],'L',0,'L');
						$this->Cell(30,6,$this->empLaborDtl[$a]['quantity'],'L',0,'C');
						$this->Cell(30,6,$this->empLaborDtl[$a]['amount'],'L',0,'R');
						$this->Cell(35,6,$this->empLaborDtl[$a]['total'],'LR',0,'R');
						$this->Ln(6);
						$exist++;

						$totalqty += $this->empLaborDtl[$a]['quantity'];
						$totalamount += $this->empLaborDtl[$a]['total'];
					}
				}
				if($exists == 0){
					$this->SetFont('helvetica','',9);
					$this->Cell(5,6,$cnt,'L',0,'C');
					$this->Cell(90,6,$this->laborCostMst[$i]['description'],'L',0,'L');
					$this->Cell(30,6,'','L',0,'C');
					$this->Cell(30,6,'','L',0,'C');
					$this->Cell(35,6,'-','LR',0,'C');
					$this->Ln(6);
				}
				$cnt++;
			}

			$this->Cell(5,2,'','LB',0,'C');
			$this->Cell(90,2,'','LB',0,'C');
			$this->Cell(30,2,'','LB',0,'C');
			$this->Cell(30,2,'','LB',0,'C');
			$this->Cell(35,2,'','LRB',0,'C');
			$this->Ln(2);

			$this->SetFont('helvetica','B',10);
			$this->Cell(5,6,'','LB',0,'C');
			$this->Cell(90,6,'TOTAL >>>>>','LB',0,'R');
			$this->Cell(30,6,$totalqty,'LB',0,'C');
			$this->Cell(30,6,'','LB',0,'C');
			$this->Cell(35,6,number_format($totalamount,2),'LRB',0,'R');
			$this->Ln(6);

			// $this->SetFont('helvetica','B',10);
			// $this->Cell(20,5,'Remarks',0,0,'L');
			// $this->Cell(2,5,'',0,0,'C');
			// $this->SetFont('helvetica','',9);
			// $this->Cell(168,5,'','B',0,'C');
			// $this->Ln(5);
		}

		public function Footer(){
			// $this->SetY(-28);
			
			// $this->SetFont('Courier','B',9);
			// $this->Cell(190,4,'I agree that the above specifications/descriptions are my request upon order.',0,0,'L');
			// $this->Ln(10);

			// $this->Cell(10,4,null,0,0,'L');
			// $this->Cell(80,4,$this->empLaborMst['userName'],'B',0,'C');
			// $this->Cell(10,4,null,0,0,'L');
			// $this->Cell(80,4,$this->empLaborMst['acknowledgeBy'],'B',0,'C');
			// $this->Cell(10,4,null,0,0,'L');
			// $this->Ln();
			// $this->Cell(10,4,null,0,0,'L');
			// $this->Cell(80,4,"Order Taken By",0,0,'C');
			// $this->Cell(10,4,null,0,0,'L');
			// $this->Cell(80,4,"Acknowledge By",0,0,'C');
			// $this->Cell(10,4,null,0,0,'L');
			// $this->Ln();
		}
	}
?>