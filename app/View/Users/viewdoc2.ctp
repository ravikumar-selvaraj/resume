
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
	height:60px;
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
 <table width="100%" cellpadding="0" cellspacing="5"  style="border:1px solid #ccc;" > 
 <tr><td colspan="5" class="name">'.Configure::read('userpage').'</td></tr>
 
<!--About me-->
<tr>
<td width="70%"> 
<table width="70%" cellpadding="0" cellspacing="5" >
<tr style="height:60px;">
<td colspan="5" align="center" class="abttd">
<table width="100%" cellpadding="3" cellspacing="3" align="center">
<tr><td class="abtme"><p style="background-color:#e8e8e8;">About Me</p></td></tr>
<tr><td class="abtmecon"><p class="jobcon"  align="left" style="text-indent:5px;">'.$new['User']['about_me'].'</p></td></tr>
</table>

</td>



</tr>



<!--About Education-->

<tr>
<td colspan="5" align="right" class="abttd">
<table width="100%" cellpadding="3" cellspacing="3"   align="center">
<tr><td class="abtme"><p style="background-color:#e8e8e8;">Education Information</p></td></tr>
<tr><td class="abtmecon">
<table border="0"  cellpadding="3" cellspacing="0"  style="border:1px solid #ccc;" >
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
<table width="100%" cellpadding="3" cellspacing="3"  border="0"  align="center">
<tr><td class="abtme"><p style="background-color:#e8e8e8;">Work Experience</p></td></tr>';

foreach($exp as $exp){
$htm.='<tr>
<td width="80%" class="exp">
            
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
            $htm.='<li class="abtmecon">'.$sp1.'</li>';
            $k++; endforeach;
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
 }	
$htm.='</table>
</td>
</tr>';


$htm.='<tr>
<td colspan="5" align="right" class="abttd">
<table width="100%" cellpadding="3" cellspacing="3"  border="0"   align="center">
<tr><td class="abtme"><p style="background-color:#e8e8e8;">Skill Information</p></td></tr>
<tr><td class="abtmecon" width="80%">   ';
                   
                    foreach($skill as $skill) { 
					
                    $htm.='<p class="abtmecon" align="left"  style="text-indent:25px;"><u>'.$skill['Skill']['skill_area'].' : </u></p>
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

 
 $htm.='
 </table>
 </td>

<td width="30%" colspan="2">
<table width="100%" cellpadding="3" cellspacing="3"  border="0"   align="center">
<tr><td class="abtme"><p style="background-color:#e8e8e8;">Contact Me</p></td></tr>
<tr><td>
<p class="jobcon"  align="left" style="text-indent:5px;">'.$new['User']['username'].'</p>
<p class="jobcon"  align="left" style="text-indent:5px;">'.$new['User']['email'].'</p>
<p class="jobcon"  align="left" style="text-indent:5px;">'.$new['User']['skype'].'</p>
<p class="jobcon"  align="left" style="text-indent:5px;">'.$new['User']['yahoo'].'</p>
</td></tr></table>

<table width="100%" cellpadding="3" cellspacing="3"  border="0"   align="center">
<tr><td class="abtme"><p style="background-color:#e8e8e8;">Interest</p></td></tr>
<tr><td class="abtmecon" width="80%">';
                          
                        foreach($int as $int) { 
                        
                            $htm.='<p class="abtmecon" align="left"  style="text-indent:25px;"><u>'.$int['Interest']['interest_type'].' : </u></p>
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
 
</tr>					

</table>';
/*print_r($htm);exit;*/

$filename="Cvomg.doc";
header("Content-type: application/msword"); // add here more headers for diff. extensions
header("Content-Disposition: attachment; filename=\"".$filename."\"");

 echo $htm;




?>





