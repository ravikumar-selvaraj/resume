
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js" type="text/javascript"></script>
 <script type="text/javascript">
$(function() {
$( "#tabslu" ).tabs();
});
</script>
<style>
#con
{
	margin:0px;
	padding:0px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
}
#con1
{
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	font-weight:lighter;
}
#leg
{
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	background:#dcdcdc;
	padding:10px;
}
</style>
<div class="content">        
        <div class="header">            
            <h1 class="page-title">View User Management </h1>
        </div>        
                <ul class="breadcrumb">
					<li><a href="#">Home</a> <span class="divider">/</span></li>
					<li><a href="<?php echo BASE_URL;?>admin/users">Users</a> <span class="divider">/</span></li>
					<li class="active">View User Management </li>
				</ul>

        <div class="container-fluid">
            <div class="row-fluid">
			
			<div class="well">
				
					  <div class="tab-pane active in" id="home">
					  <div class="widget-box">
							<div class="widget-title">
							</div>
                            <div id="tabslu">
                                <ul>
                                <li><a href="#tabs-1">Personel Details</a></li>
                                <li><a href="#tabs-2">Education</a></li>
                                <li><a href="#tabs-3">Experience</a></li>
                                <li><a href="#tabs-4">Portfolio</a></li>
                                <li><a href="#tabs-5">Interests</a></li>
                                </ul>
                                
                                <!--Personal Details-->
                                <?php 
								$coun= ClassRegistry::init('Country')->find('first',array('conditions'=>array('iso_code2'=>$users['User']['country'])));
								//$exp_coun= ClassRegistry::init('Country')->find('first',array('conditions'=>array('iso_code2'=>$exp['Experience']['country'])));
							
								?>
                                <div id="tabs-1">
                                <p>
                                <div class="widget-content nopadding">
                                
								<form id="form-wizard" class="form-horizontal ui-formwizard" method="post" novalidate="novalidate" _lpchecked="1">
									<div id="form-wizard-1" class="step ui-formwizard-content" style="display: block;">
										<div class="control-group" id="con">
											<label class="control-label">First Name :</label>
											<div class="controls"> <?php echo h($users['User']['firstname']); ?></div>
										</div>
										<div class="control-group" id="con">
											<label class="control-label">Last Name :</label>
											<div class="controls"> <?php echo h($users['User']['lastname']); ?>	</div>
										</div>
                                        <div class="control-group" id="con">
											<label class="control-label">User Name :</label>
											<div class="controls"> <?php echo h($users['User']['username']); ?>	</div>
										</div>
                                         <div class="control-group" id="con">
											<label class="control-label">E-mail :</label>
											<div class="controls"> <?php echo h($users['User']['email']); ?>	</div>
										</div>
                                         <div class="control-group" id="con">
											<label class="control-label">Gender :</label>
											<div class="controls"> <?php echo h($users['User']['gender']); ?>	</div>
										</div>
										<div class="control-group" id="con">
											<label class="control-label">Phone :</label>
											<div class="controls"><?php echo h($users['User']['phone']); ?></div>
										</div>
                                        <?php if(!empty($users['User']['skype'])) {?>
                                        <div class="control-group" id="con">
											<label class="control-label">Skype :</label>
											<div class="controls"><?php echo h($users['User']['skype']); ?></div>
										</div>
                                        <?php }?>
                                         <?php if(!empty($users['User']['yahoo'])) {?>
                                         <div class="control-group" id="con">
											<label class="control-label">Yahoo :</label>
											<div class="controls"> <?php echo h($users['User']['yahoo']); ?>	</div>
										</div>
                                         <?php }?>
										<div class="control-group" id="con">
											<label class="control-label">City :</label>
											<div class="controls"><?php echo h($users['User']['city']); ?></div>
										</div>
                                        <div class="control-group" id="con">
											<label class="control-label">Country :</label>
											<div class="controls"><?php echo h($coun['Country']['country_name']); ?></div>
										</div>
                                        <div class="control-group" id="con">
											<label class="control-label">Zipcode</label>
											<div class="controls"><?php echo h($users['User']['zipcode']); ?></div>
										</div>
                                        
                                        
										<div class="control-group" id="con">
											<label class="control-label">Status :</label>
											<div class="controls"><?php echo h($users['User']['status']); ?></div>
										</div>
									</div>
									
								</form>
							</div>
                            </p>
                                </div>
                                
                                <!--Education Details-->
                                
                                <div id="tabs-2">
                                <p>
                                 <?php 
									  $i=1;
									  if(empty($edu))
									  echo "No Records Found";
									  else{
									  foreach ($edu as $edu): ?>
                               <form id="form-edu" class="form-horizontal ui-formwizard" method="post" novalidate="novalidate" _lpchecked="1">
                                <fieldset style=" border: 1px solid #BBBBBB;">	
              						<p id="leg"><b><?php echo h($edu['Education']['course']); ?> Course Detail</b></p>
									<div id="form-wizard-1" class="step ui-formwizard-content" style="display: block;">
										<div class="control-group" id="con">
											<label class="control-label" id="con1">Course :</label>
											<div class="controls"> <?php echo h($edu['Education']['course']); ?></div>
										</div>
										<div class="control-group" id="con">
											<label class="control-label" id="con1">Organization :</label>
											<div class="controls"> <?php echo h($edu['Education']['organization']); ?>	</div>
										</div>
                                        <div class="control-group" id="con">
											<label class="control-label" id="con1">Start Date :</label>
											<div class="controls"> <?php echo h($edu['Education']['start_date']); ?>	</div>
										</div>
                                         <div class="control-group" id="con">
											<label class="control-label" id="con1">End Date :</label>
											<div class="controls"> <?php echo h($edu['Education']['end_date']); ?>	</div>
										</div>
                                         <div class="control-group" id="con">
											<label class="control-label" id="con1">Description :</label>
											<div class="controls"> <?php echo h($edu['Education']['desc']); ?>	</div>
										</div>
										<div class="control-group" id="con">
											<label class="control-label" id="con1">Extra Curricular Activities :</label>
											<div class="controls"><?php echo h($edu['Education']['extra_curricular']); ?></div>
										</div>
                                       
									</div>
								</fieldset>	
								</form> 
                                 <?php $i++; endforeach;  } ?>
                                </p>
                                </div>
                                
                                 <!--Experience Details-->
                                
                                <div id="tabs-3">
                                <p>
                                 <?php 
								 	//echo 'hi'.$exp['Experience']['city'];
								  if(empty($exp))
									  echo "No Records Found";
									  else{ 
									  $i=1;
									  foreach ($exp as $exp): ?>
                               <form id="form-exp" class="form-horizontal ui-formwizard" method="post" novalidate="novalidate" _lpchecked="1">
                                <fieldset style=" border: 1px solid #BBBBBB;">	
              						<p id="leg"><b> <?php echo h($exp['Experience']['job_title']); ?> Experience </b></p>
									<div id="form-wizard-1" class="step ui-formwizard-content" style="display: block;">
										<div class="control-group" id="con">
											<label class="control-label" id="con1">Company :</label>
											<div class="controls"> <?php echo h($exp['Experience']['company']); ?></div>
										</div>
                                        <div class="control-group" id="con">
											<label class="control-label" id="con1">Company Description :</label>
											<div class="controls"> <?php echo h($exp['Experience']['comapny_desc']); ?></div>
										</div>
                                         <div class="control-group" id="con">
											<label class="control-label" id="con1">Company Website :</label>
											<div class="controls"> <?php echo h($exp['Experience']['website']); ?></div>
										</div>
										<div class="control-group" id="con">
											<label class="control-label" id="con1">Contract Type :</label>
											<div class="controls"> <?php echo h($exp['Experience']['contract_type']); ?>	</div>
										</div>
                                        	<div class="control-group" id="con">
											<label class="control-label" id="con1">Responsibilities :</label>
											<div class="controls"> <?php echo h($exp['Experience']['responsibility']); ?>	</div>
										</div>
                                        <div class="control-group" id="con">
											<label class="control-label" id="con1">Start Date :</label>
											<div class="controls"> <?php echo h($exp['Experience']['start_date']); ?>	</div>
										</div>
                                         <div class="control-group" id="con">
											<label class="control-label" id="con1">End Date :</label>
											<div class="controls"> <?php echo h($exp['Experience']['end_date']); ?>	</div>
										</div>
                                         <div class="control-group" id="con">
											<label class="control-label" id="con1">City :</label>
											<div class="controls"> <?php echo h($exp['Experience']['city']); ?>	</div>
										</div>
                                          <div class="control-group" id="con">
											<label class="control-label" id="con1">Country :</label>
											<div class="controls"> <?php
											$exp_coun= ClassRegistry::init('Country')->find('first',array('conditions'=>array('iso_code2'=>$exp['Experience']['country'])));
											//echo $exp['Experience']['country']
											 echo h($exp_coun['Country']['country_name']); ?>	</div>
										</div>
										
									</div>
								</fieldset>	
								</form> 
                                 <?php $i++; endforeach; } ?>
                                
                                </p>
                                </div>
                                
                                <!--Portfolios Details-->
                                
                                <div id="tabs-4">
                                <p>
                                
                                 <!--Photos-->
                                  
                                  <form id="form-photo" class="form-horizontal ui-formwizard" method="post" novalidate="novalidate" _lpchecked="1" style="width:900px; margin-left:200px;">
                                <fieldset style=" border: 1px solid #BBBBBB;">	
              						<p id="leg"><b> Portfolio Photo </b></p> 
									<?php 
									  $i=1;
									   if(empty($portimage))
									  echo "No Records Found";
									  else{
									  foreach ($portimage as $port): ?>
									<div id="form-wizard-1" class="step ui-formwizard-content" style="display: block; width:150px; float:left; padding:20px;">
										<div class="control-group" id="con">
											 <?php echo $port['Portimage']['image_title']; ?><br /> 
											 <?php 
												if(empty($port['Portimage']['image']))
												echo $this->Html->image('profile_pic_default.jpg',array('border'=>0,'width'=>'','height'=>'','alt'=>'Resume','class'=>'pull-left img-polaroid'));
												else
												echo $this->Html->image('portfolio-images/big/'.$port['Portimage']['image'],array('border'=>0,'alt'=>'Resume','width'=>'70','height'=>'70','class'=>'profile-photo','style'=>'border:1px solid #ccc')); ?> 
                                               
										</div>
                                       
										
									</div>
									<?php $i++; endforeach; } ?>
								</fieldset>	
								</form>
                                
                                <!--videos-->
                                
                                  <form id="form-vid" class="form-horizontal ui-formwizard" method="post" novalidate="novalidate" _lpchecked="1" style="width:900px; margin-left:200px;">
                                <fieldset style=" border: 1px solid #BBBBBB;">	
              						<p id="leg"><b> Portfolio Video </b></p> 
									<?php 
									  $i=1;
									   if(empty($portvideo))
									  echo "No Records Found";
									  else{
									  foreach ($portvideo as $portv): ?>
									<div id="form-wizard-1" class="step ui-formwizard-content" style="display: block; padding:20px;">
										<div class="control-group" id="con">
											 <?php echo $portv['Portvideo']['video_title']; ?><br /> 
											<p align="center"><?php echo $portv['Portvideo']['video_code']; ?></p>
                                               
										</div>
                                       
										
									</div>
									<?php $i++; endforeach; } ?>
								</fieldset>	
								</form>
                                
                                <!-- Audio-->
                               
                                  <form id="form-aud" class="form-horizontal ui-formwizard" method="post" novalidate="novalidate" _lpchecked="1" style="width:900px; margin-left:200px;">
                                <fieldset style=" border: 1px solid #BBBBBB;">	
              						<p id="leg"><b> Portfolio Audio </b></p> 
									<?php 
									
									  $i=1;
									   if(empty($portaudio))
									  echo "No Records Found";
									  else{
										  
									  foreach ($portaudio as $porta): ?>
									<div id="form-wizard-1" class="step ui-formwizard-content" style="display: block; padding:20px;">
										<div class="control-group" id="con">
											 <?php echo $porta['Portaudio']['audio_title']; ?><br /> 
											<p align="center">
                                            <object height="20" width="200" data="<?php echo $this->Html->webroot('player_mp3_maxi.swf'); ?>" type="application/x-shockwave-flash">
                <param value="<?php echo $this->Html->webroot('player_mp3_maxi.swf'); ?>" name="movie">       <param value="mp3=<?php echo $this->Html->webroot('files/portfolio-audios/'.$porta['Portaudio']['audio_file'].''); ?>&amp;showstop=1&amp;showvolume=1&amp;bgcolor1=ffa50b&amp;bgcolor2=d07600" name="FlashVars">
            </object></p>
                                               
										</div>
                                       
										
									</div>
									<?php $i++; endforeach; } ?>
								</fieldset>	
								</form>
                                
                                <!-- Word/Pdf-->
                               
                                  
                                
                                 <!--Presentation-->
                                
                                <form id="form-pres" class="form-horizontal ui-formwizard" method="post" novalidate="novalidate" _lpchecked="1" style="width:900px;margin:20px 0 0 200px">
                                <fieldset style=" border: 1px solid #BBBBBB;">	
              						<p id="leg"><b> Portfolio Presentation </b></p> 
									<?php 
									  $i=1;
									   if(empty($portpresent))
									  echo "No Records Found";
									  else{
									  foreach ($portpresent as $portp): ?>
								  <div id="form-wizard-1" class="step ui-formwizard-content" style="display: block; width:700px; float:left; padding:20px;">
										<div class="control-group" id="con">
											 <?php echo $portp['Portpresent']['present_title']; ?><br /> 
                                             <?php
											 $var = $portp['Portpresent']['present_code'];
											 preg_match('/src="(.*?)"/', $var, $src);
											 $src = $src[1];
											  ?>
                                              
                                         <iframe src="<?php echo $src; ?>" width="70%" height="250" frameborder="0" 	marginwidth="0" marginheight="0" scrolling="no" 
                                    style="border:1px solid #CCC;border-width:1px 1px 0;margin-bottom:5px" allowfullscreen> </iframe>
                                             
										</div>
									</div>
									<?php $i++; endforeach; } ?>
								</fieldset>	
								</form>
                                
                                <form id="form-word" class="form-horizontal ui-formwizard" method="post" novalidate="novalidate" _lpchecked="1" style="width:900px; margin:20px 0 0 200px;">
                                <fieldset style=" border: 1px solid #BBBBBB;">	
              						<p id="leg"><b> Portfolio Documents </b></p> 
									<?php 
									
									  $i=1;
									   if(empty($portdocument))
									  echo "No Records Found";
									  else{
									  foreach ($portdocument as $portd): 
									  $ex=explode('.',$portd['Portdocument']['document_file']); ?>
                                      <div id="form-wizard-1" class="step ui-formwizard-content" style="display: block; width:150px; float:left; padding:20px;">
										<div class="control-group" id="con">
											 <?php echo $portd['Portdocument']['document_title']; ?><br /> 
											 <?php 
												if($ex[1]=='pdf'){
												echo $this->Html->image('PDFicon.png',array('border'=>0,'width'=>'','height'=>'','alt'=>'Resume','class'=>'pull-left img-polaroid'));
												echo '<a href="'.BASE_URL.'files/portfolio-documents/'.$portd['Portdocument']['document_file'].'" target="_blank">'."Download".'<a>';
												}
												else{
												echo $this->Html->image('microsoft-word.jpg',array('border'=>0,'alt'=>'Resume','width'=>'','height'=>'','class'=>'profile-photo','style'=>'border:1px solid #ccc')); 
												echo '<a href="'.BASE_URL.'files/portfolio-documents/'.$portd['Portdocument']['document_file'].'" target="_blank">'."Download".'<a>';} ?> 
										</div>
									</div>
									<div id="form-wizard-1" class="step ui-formwizard-content" style="display: block; padding:20px;">
										<div class="control-group" id="con">
											 <?php //echo $portd['Portdocument']['audio_title']; ?><br /> 
										</div>
									</div>
									<?php $i++; endforeach; } ?>
								</fieldset>	
								</form>
                                </p>
                                
                                </div>
                                
                               <!-- My interest details-->
                                
                                <div id="tabs-5">
                                <p>
                                <?php 
									  $i=1;
									   if(empty($interests))
									  echo "No Records Found";
									  else{
									  foreach ($interests as $interest): ?>
                                <form id="form-edu" class="form-horizontal ui-formwizard" method="post" novalidate="novalidate" _lpchecked="1" style="width:500px; margin-left:200px;">
                                <fieldset style=" border: 1px solid #BBBBBB;">	
              						<p id="leg"><b> <?php echo h($interest['Interest']['interest_type']); ?> Experience </b></p>
									<div id="form-wizard-1" class="step ui-formwizard-content" style="display: block;">
										<div class="control-group" id="con">
											<ul>
												<?php $sp=explode(',',$interest['Interest']['interest']) ;
                                                $i=0;
                                                foreach($sp as $sp1) {?>
                                                <li><?php echo $sp1; ?></li>
                                                <?php $i++;}?>
                                            </ul>
											
										</div>
                                       
										
									</div>
								</fieldset>	
								</form> <?php $i++; endforeach; } ?></p>
                                </div>
                                
                                
                            </div>
                            
                            
							
						</div>
					  </div>
					  
				  </div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>
                    
                    <footer>
                        <hr>
                        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                        <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                        

                        <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>


