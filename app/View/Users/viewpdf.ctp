<?php
App::import('Vendor','xtcpdf'); 
$tcpdf = new XTCPDF();
$textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans'
$bMargin = $tcpdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $tcpdf->getAutoPageBreak();
// disable auto-page-break
$tcpdf->SetAutoPageBreak(false, 0);
// set bacground image

// restore auto-page-break status
$tcpdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content

//}
//$tcpdf->xheaderimage  $html->image('logo.png',array('alt'=>'dmnlogo','title'=>'dmnlogo'))
//$tcpdf->setHeaderFont(array($textfont,'',18));
//$tcpdf->SetMargins(10, $heit, 10);
//$tcpdf->SetMargins(10, $heit, 10);
//$tcpdf->SetHeaderMargin(10);
//$tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);
//$tcpdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_width, PDF_HEADER_TITLE.' 029', PDF_HEADER_STRING);
//$tcpdf->xfootertext = 'Copyright © '.date('Y').' '.$pro['Project']['projectname'].'. All rights reserved.';
//$tcpdf->SetAutopageBreak(TRUE, PDF_MARGIN_BOTTOM);
// add a page (required with recent versions of tcpdf
$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$tcpdf->AddPage();
$htm='
<style>


body
{
	margin:0px;
	padding:0px;
	background-color:#f9f9f7;
}

.name
{
	background-color:#ccc;
	font-size:40px;
	text-align:center
}
.abttd
{
	height:110px;
}
.abtme
{
	color:#000;
	 font-family:arial;
	font-size:35px;
	border:1px solid #dcddd9;
	text-indent:5px;
	background-color:#fcfcfc;
	text-align:left;
}
.abtmecon
{
	color:#000;
	font-size:28px;
}
.jobcon
{
	color:#000;
	font-size:28px;
	text-algn:left;
	border:1px solid #ccc;
	width:200px;
}
.exp
{
   line-height:3px;
}
   
.exp ul li 
{
  color:#000;
  font-family:arial;
  font-size:33px;   
}
</style>';
 $htm.='
 <table width="100%" cellpadding="0" cellspacing="0" border="" > 
 <tr><td colspan="5" class="name">'.Configure::read('userpage').'</td></tr>
 
<!--About me-->
<tr>
<td colspan="5" align="right" class="abttd">
<table width="90%" cellpadding="" cellspacing="0"   align="center">
<tr><td class="abtme">About Me</td></tr>
<tr><td class="abtmecon">'.$new['User']['about_me'].'</td></tr>
</table>
</td>
</tr>

<!--About Education-->

<tr>
<td colspan="5" align="right" class="abttd">
<table width="90%" cellpadding="" cellspacing="0"   align="center">
<tr><td class="abtme">Education Information</td></tr>
<tr><td class="abtmecon">
<table border="1">
<tr>	
<th>No</th>
<th>Course</th>
<th>Organization</th>
<th>Start date</th>
<th>End date</th>
</tr>';
$i=1; foreach($edu as $edu):
$htm.='<tr>
<td>'.$i.'</td>
<td>'.$edu['Education']['course'].'</td>
<td>'.$edu['Education']['organization'].'</td>
<td>'.$edu['Education']['start_date'].'</td>
<td>'.$edu['Education']['end_date'].'</td>
</tr>'; endforeach;
$htm.='</table>
</td></tr>
</table>
</td>
</tr>';

/*About Experience*/


$htm.='<tr>
<td colspan="5" align="right" class="abttd">
<table width="90%" cellpadding="" cellspacing="0"  border="1"  align="center">
<tr><td class="abtme">Work Experience</td></tr>';

foreach($exp as $exp){
$htm.='<tr>
<td width="50%" class="exp">
            
            <p class="jobcon"  align="left">'.$exp['Experience']['job_title'].'</p>';
            $cou=ClassRegistry::init('Country')->find('first',array('conditions'=>array('iso_code2'=>$exp['Experience']['country'])));
           $htm.='<p class="abtmecon"> '.$exp['Experience']['company'].'-'."\t".$exp['Experience']['city'].'-'."\t".$cou['Country']['country_name']."\t".'('.$exp['Experience']['contract_type']."\t".'-'."\t".
            date("M Y", strtotime($exp['Experience']['start_date']))."\t".'-'."\t".date("M Y", strtotime($exp['Experience']['end_date'])).  ')'.'
			</p>';
            $htm.='<p class="abtmecon">
			Responisibily :</p>
            <ul>';
            $sp=explode(',',$exp['Experience']['responsibility']) ;
            $k=1;
            foreach($sp as $sp1):
            $htm.='<li class="abtmecon">'.$sp1.'</li>';
            $k++; endforeach;
            $htm.='</ul>';
           if(!empty( $exp['Experience']['comapny_desc'])){
           $htm.='<span class="abtmecon">Company Description : 	</span>
            <ul>
            <li class="abtmecon">'.$exp['Experience']['comapny_desc'].'</li>
            </ul>';
             }
           if(!empty( $exp['Experience']['website'])){
            $htm.='<span class="abtmecon">Website : </span>
            <ul>
            <li class="abtmecon">'.$exp['Experience']['website'].'</li>
            </ul>'; 
		   }
			
			
           $htm.='
            
           </td>
</tr>';
 }	
$htm.='</table>
</td>
</tr>';


$htm.='<tr>
<td colspan="5" align="right" class="abttd">
<table width="90%" cellpadding="" cellspacing="0"  border="1"   align="center">
<tr><td class="abtme">Skill Information</td></tr>
<tr><td class="abtmecon" width="50%">

                    <h2 class="abtmecon">Skills</h2>
                    ';
                   
                    foreach($skill as $skill) { 
					
                    $htm.='<h3 class="abtmecon">'.$skill['Skill']['skill_area'].'</h3>
                   <ul class="">';	
                    $sp=explode(',',$skill['Skill']['skills']) ;
                    $i=0;
                    foreach($sp as $sp1) {
                    $htm.='<li class="abtmecon">'.$sp1.'</li>';
                     $i++;}
                    $htm.='</ul>';
                    
                     }
                    $htm.='
</td></tr>
</table>
</td>
</tr>';

 $htm.='<tr>
<td colspan="5" align="right" class="abttd">
<table width="90%" cellpadding="" cellspacing="0"  border="1"   align="center">
<tr><td class="abtme">Interest</td></tr>
<tr><td class="abtmecon" width="50%">

                        <h2 class="abtmecon">Interest</h2>
                        ';
                          
                        foreach($int as $int) { 
                        
                            $htm.='<h3 class="abtmecon">'.$int['Interest']['interest_type'].'</h3>
                           <ul class="">';
                               $sp=explode(',',$int['Interest']['interest']) ;
                        $i=0;
                        foreach($sp as $sp1) {
                       $htm.=' <li class="abtmecon">'.$sp1.'</li>';
                        $i++;}
                            $htm.='</ul>';
                             }
                       $htm.=' 
                
</td></tr>
</table>
</td>
</tr>';
 

					

$htm.='</table>';
/*print_r($htm);exit;*/


$tcpdf->writeHTML($htm, true, false, true, false, '');


// output the HTML content
$tcpdf->lastPage();
$filename="Cvomg.pdf";
 $tcpdf->Output($filename, 'D');


?>

