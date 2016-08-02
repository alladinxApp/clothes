<?
	class PrintDelivery extends FPDF{
		public function setDelMaster($delMst){
			$this->delMst = $delMst;
		}
		public function setDelDetail($delDtl){
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
			$this->Cell(190,10,'DELIVERY RECEIPT',0,0,'C');
			$this->Ln(12);

			$this->SetFont('helvetica','B',10);
			$this->Cell(20,4,'Customer',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(83,4,$this->delMst['customerName'],'B',0,'L');
			$this->Cell(4,4,'',0,0,'C');
			$this->SetFont('helvetica','B',10);
			$this->Cell(30,4,'Delivery No',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(43,4,$this->delMst['deliveryCode'],'B',0,'L');
			$this->Ln(8);

			$this->SetFont('helvetica','B',10);
			$this->Cell(20,4,'Address',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(83,4,$this->delMst['address'],'B',0,'L');
			$this->Cell(4,4,'',0,0,'C');
			$this->SetFont('helvetica','B',10);
			$this->Cell(30,4,'Date',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(43,4,dateFormat($this->delMst['createdDate'],"M d, Y"),'B',0,'L');
			$this->Ln(8);

			$this->SetFont('helvetica','B',10);
			$this->Cell(20,4,'Contact No',0,0,'L');
			$this->Cell(2,4,':',0,0,'C');
			$this->Cell(3,4,'',0,0,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(83,4,$this->delMst['customerTelNo'],'B',0,'L');
			// $this->Cell(4,4,'',0,0,'C');
			// $this->SetFont('helvetica','B',10);
			// $this->Cell(30,4,'Due Date',0,0,'L');
			// $this->Cell(2,4,':',0,0,'C');
			// $this->Cell(3,4,'',0,0,'C');
			// $this->SetFont('helvetica','',10);
			// $this->Cell(43,4,dateFormat($this->delMst['dueDate'],"M d, Y"),'B',0,'L');
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
				$total = ($this->delDtl[$i]['price'] * $this->delDtl[$i]['quantity']);
				$totalamnt += $total;
				$totalqty += $this->delDtl[$i]['quantity'];

				$this->SetFont('helvetica','',9);
				$this->Cell(5,4,$cnt,'L',0,'C');
				$this->Cell(35,4,$this->delDtl[$i]['sizeDesc'],'L',0,'L');
				$this->Cell(70,4,$this->delDtl[$i]['specification'],'L',0,'L');
				$this->Cell(20,4,$this->delDtl[$i]['quantity'],'L',0,'C');
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

			if($this->delMst['discount'] > 0){
				$this->Cell(170,4,'Discount: ',0,0,'R');
				$this->Cell(20,4,$this->delMst['discount'],0,0,'R');
				$this->Ln(4);
			}

			$this->Cell(170,4,'Sub-Total: ',0,0,'R');
			$this->Cell(20,4,$this->delMst['subTotal'],0,0,'R');
			$this->Ln(4);

			$this->Cell(170,4,'Vat 12%: ',0,0,'R');
			$this->Cell(20,4,$this->delMst['vat'],0,0,'R');
			$this->Ln(4);

			$this->SetFont('helvetica','B',9);
			$this->Cell(170,6,'Grand Total: ',0,0,'R');
			$this->Cell(20,6,$this->delMst['totalAmount'],'T',0,'R');
			$this->Ln(8);

			$this->SetFont('helvetica','B',10);
			$this->Cell(20,5,'Remarks',0,0,'L');
			$this->Cell(2,5,'',0,0,'C');
			$this->SetFont('helvetica','',9);
			$this->Cell(168,5,'','B',0,'C');
			$this->Ln(6);
		}

		public function Footer(){
			$this->SetY(-28);
			
			$this->SetFont('Courier','B',9);
			$this->Cell(190,4,'Received the above goods and services in good order and conditions.',0,0,'L');
			$this->Ln(10);

			$this->Cell(10,4,null,0,0,'L');
			$this->Cell(80,4,$this->delMst['userName'],'B',0,'C');
			$this->Cell(10,4,null,0,0,'L');
			$this->Cell(80,4,$this->delMst['acknowledgeBy'],'B',0,'C');
			$this->Cell(10,4,null,0,0,'L');
			$this->Ln();
			$this->Cell(10,4,null,0,0,'L');
			$this->Cell(80,4,"Prepared By",0,0,'C');
			$this->Cell(10,4,null,0,0,'L');
			$this->Cell(80,4,"Received By",0,0,'C');
			$this->Cell(10,4,null,0,0,'L');
			$this->Ln();
		}
	}
?>