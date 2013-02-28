<?php
App::import('Vendor','tcpdf/tcpdf');

class XTCPDF  extends TCPDF
{

  	var $xheadertext  = '';
	var $xheadertext1  = '';
	var $xheadertext2  = '';

    var $xheadercolor = array(255,255,255);
    var $xfootertext  = '';
    var $xfooterfont  = PDF_FONT_NAME_MAIN ;
    var $xfooterfontsize = 8 ;
	var $xheaderimage  = '';

  
	public function Header() {/*
		// Logo
		$this->Line(10,8,200,8);
		$image_file = $this->xheaderimage;
		if($image_file!=''){
		$this->Image($image_file, '', '', '', '15', $this->xheadertype, '', 'T', false, '', '', false, false, 0, false, false, false);
		$this->Image( $this->xheaderimage1, '160', '', '38', '15', $this->xheadertype1, '', 'R', false, '', '', false, false, 0, false, false, false);

		$heit=($this->xheaderheight-8)/2;
		if($heit<35){
			$heit='30';
		}
		else
		{
			$heit='30';
		}
		$this->Line(10,$heit,200,$heit);
		}else{
			$this->Line(10,30,200,30);
		}
		// Set font
		$this->SetFont('helvetica', 'B', 18);
		// Title		
		$this->SetY(14);
		$this->Cell(0, 190,$this->xheadertext, 0, false, 'R', 0, '', 0, false, 'M', 'M');
		$this->SetY(20);
		$this->SetFont('helvetica', 'I', 10);
		$this->Cell(0, 190,$this->xheadertext1, 0, false, 'R', 0, '', 0, false, 'M', 'M');
		$this->SetY(25);
		//$this->Cell(0, 190,$this->xheadertext2, 0, false, 'R', 0, '', 0, false, 'M', 'M');
		
	*/}


    /**
    * Overwrites the default footer
    * set the text in the view using
    * $fpdf->xfootertext = 'Copyright Â© %d YOUR ORGANIZATION. All rights reserved.';
    */
    function Footer()
    {
       /* $year = date('Y');
        $footertext = sprintf($this->xfootertext, $year);
        $this->SetY(-20);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize);
        $this->Cell(0,8, $footertext,'T',1,'C');
		$this->SetY(-20);
		$this->Cell(0, 8, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');*/
    }
}
?> 