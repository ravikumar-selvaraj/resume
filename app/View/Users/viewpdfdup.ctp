<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<tr><td colspan="5">Personel Information</td></tr>

<tr>
<td>
<p>Address</p>
<p>Phone</p>
<p>E-mail</p>
</td>
<td colspan="4">
<p>Address</p>
<p>Phone</p>
<p>E-mail</p>
</td>
</tr>
<style>
.blog_date
	{
		margin-top:-14px;
		color:#7e7e7e;
		color:#000;
	}
	.blog_desc
	{
		margin-top:15px;
		background:#fdfdfd
	}
</style>
<body>

<table border="1" cellpadding="2" cellspacing="">

<tr><td colspan="2">Jhon Doe</td></tr>

<tr><td colspan="2">Dentist</td></tr>

<tr><td colspan="2">Personel Information</td></tr>

<tr>
<td>
<p>Address</p>
<p>Phone</p>
<p>E-mail</p>
</td>
<td>
<p>Address</p>
<p>Phone</p>
<p>E-mail</p>
</td>
</tr>

<tr><td colspan="5">Education Information</td></tr>

<tr>	
<th>No</th>
<th>Course</th>
<th>Organization</th>
<th>Start date</th>
<th>End date</th>
<tr>
<?php if(empty($edu)) { ?>
<tr><td>No records has found</td></tr>
<?php } else { $i=1;

foreach($edu as $edu) { ?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $edu['Education']['course']; ?></td>
<td><?php echo $edu['Education']['organization']; ?></td>
<td><?php echo $edu['Education']['start_date']; ?></td>
<td><?php echo $edu['Education']['end_date']; ?></td>
</tr>
<?php $i++; } } ?>

<tr><td colspan="5">Work Experience</td></tr>


<?php if(empty($exp)) { ?>
<tr><td>No records has found</td></tr>
<?php } else { 
 
            foreach($exp as $exp) { 
            ?>
            <tr>
            <td>
            <div class="exp-box clearfix">
            <h3><a href=""><?php echo $exp['Experience']['job_title'];?></a></h3>
            <div class="blog_date">
            <?php 
            
            $cou=ClassRegistry::init('Country')->find('first',array('conditions'=>array('iso_code2'=>$exp['Experience']['country'])));
            echo $exp['Experience']['company'].'-'."\t".$exp['Experience']['city'].'-'."\t".$cou['Country']['country_name']."\t".'('.$exp['Experience']['contract_type']."\t".'-'."\t".
            date("M Y", strtotime($exp['Experience']['start_date']))."\t".'-'."\t".date("M Y", strtotime($exp['Experience']['end_date'])).  ')';?>
            </div> 
            Responisibily
            <ul>
            <?php $sp=explode(',',$exp['Experience']['responsibility']) ;
            $i=0;
            foreach($sp as $sp1) {?>
            <li><?php echo $sp1; ?></li>
            <?php $i++;}?>
            </ul>
            <?php if(!empty( $exp['Experience']['comapny_desc'])){?>
            Company Description
            <ul>
            <li> <?php echo $exp['Experience']['comapny_desc']?></li>
            </ul>
            <?php }?>
            <?php if(!empty( $exp['Experience']['website'])){?>
            Website
            <ul>
            <li><?php echo $exp['Experience']['website']?></li>
            </ul> 
           
            <?php }?>
            
            
            </div></td></tr>
            <?php  }}?> 
   <tr><td colspan="5">Skill Experience</td></tr>         
            
                
</table>

</body>
</html>