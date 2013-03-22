<?php

$htm='
<style>

.name
{
	font-size:23px;
	text-align:center
}
.abttd
{
}
.abtme
{
	color:#000;
	font-family:arial;
	font-size:17px;
	text-align:left;
	
}
.abtmecon
{
	color:#000;
	font-size:16px;
	font-family:arial;
	
}
.jobcon
{
	color:#000;
	font-size:16px;
	text-algn:left;
	width:200px;
	font-family:arial;
}
.exp
{
   line-height:3px;
}
   
.exp ul li 
{
  color:#000;
  font-family:arial;
  font-size:23px;   
}
th
{
	color:#000;
	font-family:arial;
	font-size:16px;
	border:1px solid #dcddd9;
	text-indent:5px;
	background-color:#e0e0e0;
}
</style>';
 $htm.='
 <table width="70%" cellpadding="0" cellspacing="0" border="1" align="center"   > 
 <tr><td colspan="5" class="name" align="center"><p>'.Configure::read('userpage').'</p></td></tr>
 
<!--About me-->
<tr style="height:60px;">
<td colspan="5" align="center" class="abttd">
<table width="100%" cellpadding="0" cellspacing="0" align="center" border="none">
<tr><td class="abtme"><p style="background-color:#e8e8e8;">About Me</p></td></tr>
<tr><td class="abtmecon"><p class="jobcon"  align="left" style="text-indent:5px;">'.$new['User']['about_me'].'</p></td></tr>
</table>
</td>
</tr>

<!--About Education-->

<tr>
<td colspan="5" align="right" class="abttd">
<table width="100%" cellpadding="0" cellspacing="0"   align="center">
<tr><td class="abtme"><p style="background-color:#e8e8e8;">Education Information</p></td></tr><br>
<tr><td class="abtmecon" valign="middle" style="padding:10px">
<table cellpadding="0" cellspacing="0"  style="border:1px solid #ccc" width="90%" align="center" >
<tr>	
<th align="center">No</th>
<th align="center">Course</th>
<th align="center">Organization</th>
<th align="center">Start date</th>
<th align="center">End date</th>
</tr>';
if(empty($edu))
{
	echo'<tr><th colspan="4">No Records Found</th></tr>';
}
else{

$i=1; foreach($edu as $edu):
$htm.='<tr>
<td align="center">'.$i.'</td>
<td align="center">'.$edu['Education']['course'].'</td>
<td align="center">'.$edu['Education']['organization'].'</td>
<td align="center">'.$edu['Education']['start_date'].'</td>
<td align="center">'.$edu['Education']['end_date'].'</td>
</tr align="center">'; $i++; endforeach; }
$htm.='</table>
</td></tr>
</table>
</td>
</tr>';

/*About Experience*/


$htm.='<tr>
<td colspan="5" align="right" class="abttd">
<table width="100%" cellpadding="5" cellspacing="0"  align="center">
<tr><td class="abtme"><p style="background-color:#e8e8e8;height:90px;">Work Experience</p></td></tr>';
if(empty($exp))
{
	echo'<tr><th colspan="4">No Records Found</th></tr>';
}
else{
foreach($exp as $exp){
$htm.='<tr>
<td width="50%" class="exp">
            
            <p class="jobcon"  align="left" style="text-indent:5px;"><u>'.$exp['Experience']['job_title'].'</u> :</p>';
            $cou=ClassRegistry::init('Country')->find('first',array('conditions'=>array('iso_code2'=>$exp['Experience']['country'])));
           $htm.='<p class="abtmecon"> '.$exp['Experience']['company'].'-'."\t".$exp['Experience']['city'].'-'."\t".$cou['Country']['country_name']."\t".'('.$exp['Experience']['contract_type']."\t".'-'."\t".
            date("M Y", strtotime($exp['Experience']['start_date']))."\t".'-'."\t".date("M Y", strtotime($exp['Experience']['end_date'])).  ')'.'
			</p>';
            $htm.='<p class="abtmecon" align="left"  style="text-indent:25px;">Responisibily : </p>
            <ul>';
            $sp=explode(',',$exp['Experience']['responsibility']) ;
            $k=1;
            foreach($sp as $sp1):
			if(!empty($sp1)){
            $htm.='<li class="abtmecon" style="font-size:14px;text-indent:5px;">'.$sp1.'</li>';
            $k++; } endforeach;
            $htm.='</ul>';
           if(!empty( $exp['Experience']['comapny_desc'])){
           $htm.='<p class="abtmecon" align="left"  style="text-indent:25px;"> Company Description : </p>
            <ul>
            <li class="abtmecon">'.$exp['Experience']['comapny_desc'].'</li>
            </ul>';
             }
           if(!empty( $exp['Experience']['website'])){
            $htm.='
            <ul><span class="abtmecon">Website : </span>
            <li class="abtmecon">'.$exp['Experience']['website'].'</li>
            </ul>'; 
		   }
			
			
           $htm.='
            
           </td>
</tr>';
 }	 }
$htm.='</table>
</td>
</tr>';


$htm.='<tr>
<td colspan="5" align="right" class="abttd">
<table width="100%" cellpadding="5" cellspacing="0"  align="center">
<tr><td class="abtme"><p style="background-color:#e8e8e8;">Skill Information</p></td></tr>
<tr><td class="abtmecon" width="50%">

                    ';
                   
                    if(empty($skill))
						{
							echo'<tr><th colspan="4">No Records Found</th></tr>';
						}
						else{
				    foreach($skill as $skill) { 
					
                    $htm.='<p class="abtmecon" align="left"  style="text-indent:25px;"><u>'.$skill['Skill']['skill_area'].' : </u></p>
                   <ul class="">';	
                    $sp=explode(',',$skill['Skill']['skills']) ;
                    $i=0;
                    foreach($sp as $sp1) {
						if(!empty($sp1)){
                    $htm.='<li class="abtmecon">'.$sp1.'</li>';
                     $i++;} }
                    $htm.='</ul>';
                    
                     } }
                    $htm.='
</td></tr>
</table>
</td>
</tr>';

 $htm.='<tr>
<td colspan="5" align="right" class="abttd">
<table width="100%" cellpadding="5" cellspacing="0"  border="0"   align="center">
<tr><td class="abtme"><p style="background-color:#e8e8e8;">Interest</p></td></tr>
<tr><td class="abtmecon" width="50%">

                        
                        ';
                        if(empty($int))
							{
								echo'<tr><th colspan="4">No Records Found</th></tr>';
							}
							else{  
                        foreach($int as $int) { 
                        
                            $htm.='<p class="abtmecon" align="left"  style="text-indent:25px;"><u>'.$int['Interest']['interest_type'].' : </u></p>
                           <ul class="">';
                               $sp=explode(',',$int['Interest']['interest']) ;
                        $i=0;
                        foreach($sp as $sp1) {
							if(!empty($sp1)){
                       $htm.=' <li class="abtmecon">'.$sp1.'</li>';
                        $i++;} }
						
                            $htm.='</ul>';
                             } }
                       $htm.=' 
                
</td></tr>
</table>
</td>
</tr>';
 

					

$htm.='</table>';
/*print_r($htm);exit;*/
$filename="Cvomg.doc";
header("Content-type: application/msword"); // add here more headers for diff. extensions
header("Content-Disposition: attachment; filename=\"".$filename."\"");

 echo $htm;


?>

