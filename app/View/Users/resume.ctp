<?php echo $this->Element('side'); ?>
<div id="content" class="hresume">
		<div id="components">
				<div class="middle dyb_componentsview">
					<?php $class_array = array('col-2','col-3');
							foreach($class_array as $class_arr){
								if($this->Session->read('User.uid')) {
									if(($this->Session->read('User.username')==Configure::read('userpage'))) {
										$user_dashboard = ClassRegistry::init('Userdashboard')->find('all',array('conditions'=>array('column_name'=>$class_arr,'uid'=>$this->Session->read('User.uid')),'order'=>'order ASC'));
										} else {
											$user_name = Configure::read('userpage'); 
											$for_find_uid = ClassRegistry::init('User')->find('first',array('conditions'=>array('username'=>$user_name)));
											$user_dashboard = ClassRegistry::init('Userdashboard')->find('all',array('conditions'=>array('column_name'=>$class_arr,'uid'=>$for_find_uid['User']['uid']),'order'=>'order ASC'));
											}
									} else {
										$user_name = Configure::read('userpage'); 
										$for_find_uid = ClassRegistry::init('User')->find('first',array('conditions'=>array('username'=>$user_name)));
										$user_dashboard = ClassRegistry::init('Userdashboard')->find('all',array('conditions'=>array('column_name'=>$class_arr,'uid'=>$for_find_uid['User']['uid']),'order'=>'order ASC'));
					 			}
							
					?>
				
						<div id="<?php echo $class_arr;?>" class="span5 middle-col">
							<?php foreach($user_dashboard as $dashboard) {
										if($dashboard['Userdashboard']['widget'] == 'experience'){
											if(!empty($exp)){
											  ?>
											<div id="portlet_<?php echo $dashboard['Userdashboard']['widget'].'-'.$dashboard['Userdashboard']['udid'];?>" class="portlet proff-exp resume-box-cont">
										<h2 class="h2 move"> <?php echo ucfirst($dashboard['Userdashboard']['widget']);?> </h2>
										<div class="widgets">
											<?php 
											$r=1;
											foreach($exp as $exp) { 
													$user_de = ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$exp['Experience']['uid'])));
										if($user_de['User']['template'] == 'yellow'){
											$template = '';
											$style = 'style="border:none;"';
										}else {
											$template = 'well';
											$style = '';
										}
											?>
											
												<div name="widget_<?php echo $dashboard['Userdashboard']['widget'];?>" class="widget widget_view widget_<?php echo $dashboard['Userdashboard']['widget'];?> ">
														<div id="<?php echo $dashboard['Userdashboard']['widget'];?>_<?php echo $exp['Experience']['eid'];?>" class="view widget-middle">
																<div class="exp-box <?php echo $template;?> clearfix dragexp" id="<?php echo $exp['Experience']['eid'];?>"  onmouseover="exp_div_show('p_exp_edit_<?php echo $r;?>','p_exp_del_<?php echo $r;?>')" onmouseout="exp_div_hide('p_exp_edit_<?php echo $r;?>','p_exp_del_<?php echo $r;?>')" <?php echo $style;?>>
													<div class="options" style="overflow:hidden">			
									  <h3><a class="move" href="<?php echo BASE_URL;?>pages/update_overall"><?php echo $exp['Experience']['job_title'];?></a>
										<div class="pull-right pimg" style="width:38px; height:none; position:relative; bottom:45px;">
										  <?php if(!empty($exp['Experience']['logo'])) { ?>
														 <a  href=""  class="pull-right thumbnail">
														<?php 	echo $this->Html->image('users/small/'.$exp['Experience']['logo'],array('border'=>0,'width'=>'50','height'=>'50','alt'=>'Logo','class'=>'','style'=>'height:33px;width:45px;')); ?></a>
															
														<?php }	?>
										</div>
									  </h3> </div>
                                      <div class="blog_date" style="margin-top:1px;">
            <?php 
            	if($exp['Experience']['country'] !=''){
            $coun=ClassRegistry::init('Country')->find('first',array('conditions'=>array('iso_code2'=>$exp['Experience']['country'])));
            echo $exp['Experience']['company'].'-'."\t".$exp['Experience']['city'].'-'."\t".$coun['Country']['country_name']."\t".'('.$exp['Experience']['contract_type']."\t".'-'."\t".
            date("M Y", strtotime($exp['Experience']['start_date']))."\t".'-'."\t".date("M Y", strtotime($exp['Experience']['end_date'])).  ')'; }?>
            </div>
             <?php echo __("Responsibility");?>
									  <ul>
										<?php $sp=explode(',',$exp['Experience']['responsibility']) ;
															$i=0;
															foreach($sp as $sp1) {
																if(trim($sp1) !='') {?>
										<li>
										  <?php  echo $sp1; ?>
										</li>
										<?php }$i++;}?>
									  </ul>
									  <ul  class="edith unstyled" style="margin:0;" >
										<li><i class="icon-white"></i>
										  <?php  if($this->Session->read('User.uid')) { if(($this->Session->read('User.username')==Configure::read('userpage'))) { ?>
										  <div class="editdelete"> 
										  <a  href=""  class="pull-right"   data-toggle="modal" style="display:none;" data-target="#delete_Experience<?php echo $exp['Experience']['eid']; ?>" id="p_exp_del_<?php echo $r;?>" > &nbsp;<?php echo __("Delete");?></a> 
										   <a  href=""  class="pull-right exp" rel="<?php echo $exp['Experience']['eid']; ?>" style="display:none;"   data-toggle="modal" data-target="#editexp<?php echo $exp['Experience']['eid']; ?>" id="p_exp_edit_<?php echo $r;?>" ><?php echo __("Edit");?> |&nbsp; </a> 
											</div>
										   
										  <?php echo $this->Element('editexp',array('edid'=>$exp['Experience']['eid'])); ?>
										  <?php echo $this->Element('delete',array('did'=>$exp['Experience']['eid'],'model'=>'Experience','wid'=>'eid','rid'=>Configure::read('userpage'))); ?>
										  <?php } } ?>
										</li>
									  </ul>
                                       <?php if(!empty( $exp['Experience']['comapny_desc'])){?>
                                        <?php echo __("Company Description");?>
                                        <ul>
                                        <li> <?php echo $exp['Experience']['comapny_desc']?></li>
                                        </ul>
                                        <?php }?>
                                        <?php if(!empty( $exp['Experience']['website'])){?>
                                        <?php __("Website");?>
                                        <ul>
                                        <li><?php echo $exp['Experience']['website']?></li>
                                        </ul> 
                                        <?php
                                         //echo $this->Html->link('Enter', 'http://www.google.com', array('class' => 'button', 'target' => '_blank'));
                                        // echo $this->Html->link($exp['Experience']['website'],$exp['Experience']['website'], array('target'=>'_blank'));?>
                                        <?php }?>
									</div>																																
														</div>
												</div>
												<?php $r++;} ?>
												
										</div>
								</div>
										<?php } } if($dashboard['Userdashboard']['widget'] == 'education'){ 
											 if(!empty($edu)){  ?>
											 		<div id="portlet_<?php echo $dashboard['Userdashboard']['widget'].'-'.$dashboard['Userdashboard']['udid'];?>" class="portlet proff-exp resume-box-cont">
										<h2 class="h2 move"> <?php echo ucfirst($dashboard['Userdashboard']['widget']);?> </h2>
										<div class="widgets">
											<?php  
											$ed = 1;   
											foreach($edu as $edu) { 
											$user_de = ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$edu['Education']['uid'])));
										if($user_de['User']['template'] == 'yellow'){
											$template = '';
											$style = 'style="border:none;"';
										}else {
											$template = 'well';
											$style = '';
										}
																	?>
												<div name="widget_<?php echo $dashboard['Userdashboard']['widget'];?>" class="widget widget_view widget_<?php echo $dashboard['Userdashboard']['widget'];?> ">
														<div id="<?php echo $dashboard['Userdashboard']['widget'];?>_<?php echo $edu['Education']['eid'];?>" class="view widget-middle">
																<div class="exp-box <?php echo $template;?> clearfix dragexp" id="<?php echo $edu['Education']['eid'];?>"  onmouseover="exp_div_show('p_edu_edit_<?php echo $ed;?>','p_edu_del_<?php echo $ed;?>')" onmouseout="exp_div_hide('p_edu_edit_<?php echo $ed;?>','p_edu_del_<?php echo $ed;?>')" <?php echo $style;?>>
													<div class="options">			
									  <h3><a class="move" href="<?php echo BASE_URL;?>pages/update_overall"><?php echo $edu['Education']['course']?></a></h3> </div>
									  
									  <div class="blog_date"><?php echo $edu['Education']['organization'].'-'."\t".'('.date("M Y", strtotime($edu['Education']['start_date']))."\t".'-'."\t".date("M Y", strtotime($edu['Education']['end_date'])).  ')';?>
												  </div>
												  <ul class="edith unstyled" style="margin:0;">
													<li><i class="icon-white"></i>
													  <?php  if($this->Session->read('User.uid')) { if(($this->Session->read('User.username')== Configure::read('userpage'))) { ?>
													  <div class="editdelete">
													  <a  href="" class="pull-right" style="display:none;"   data-toggle="modal" data-target="#delete_Education<?php echo $edu['Education']['eid']; ?>" id="p_edu_del_<?php echo $ed;?>" > &nbsp;<?php echo __("Delete");?></a>
													  <a  href=""  class="pull-right" style="display:none;"   data-toggle="modal" data-target="#editedu<?php echo $edu['Education']['eid']; ?>" id="p_edu_edit_<?php echo $ed;?>" ><?php echo __("Edit");?> |&nbsp; </a> </div>
													  <?php echo $this->Element('editedu',array('uid'=>$edu['Education']['eid'])); ?> 
													  <?php echo $this->Element('delete',array('did'=>$edu['Education']['eid'],'model'=>'Education','wid'=>'eid','rid'=>Configure::read('userpage'))); ?>
													  <?php } } ?>
													</li>
												  </ul>
                                      
            
									</div>																																
														</div>
												</div>
												<?php $ed++;} ?>
												
										</div>
								</div>
											 
											 
									<?php }} if($dashboard['Userdashboard']['widget'] == 'skills'){
										if(!empty($skill)){ ?>
										
												<div id="portlet_<?php echo $dashboard['Userdashboard']['widget'].'-'.$dashboard['Userdashboard']['udid'];?>" class="portlet proff-exp resume-box-cont">
										<h2 class="h2 move"> <?php echo ucfirst($dashboard['Userdashboard']['widget']);?> </h2>
										<div class="widgets">
											<?php  
											$sk = 1;     
															foreach($skill as $skill) { 
															$user_de = ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$skill['Skill']['uid'])));
										if($user_de['User']['template'] == 'yellow'){
											$template = '';
											$style = 'style="border:none;"';
										}else {
											$template = 'well';
											$style = '';
										}
																	?>
												<div name="widget_<?php echo $dashboard['Userdashboard']['widget'];?>" class="widget widget_view widget_<?php echo $dashboard['Userdashboard']['widget'];?> ">
														<div id="<?php echo $dashboard['Userdashboard']['widget'];?>_<?php echo $skill['Skill']['sid'];?>" class="view widget-middle">
																<div class="exp-box <?php echo $template;?> clearfix dragexp" id="<?php echo $skill['Skill']['sid']?>"  onmouseover="exp_div_show('p_skil_edit_<?php echo $sk;?>','p_skil_del_<?php echo $sk;?>')" onmouseout="exp_div_hide('p_skil_edit_<?php echo $sk;?>','p_skil_del_<?php echo $sk;?>')" <?php echo $style;?>>
													<div class="options">			
									  <h3><a class="move" href="<?php echo BASE_URL;?>pages/update_overall"><?php echo $skill['Skill']['skill_area']?></a></h3> </div>
									  
									  <ul class="">
												<?php $sp=explode(',',$skill['Skill']['skills']) ;
															$i=0;
															foreach($sp as $sp1) {if(trim($sp1) !='') {?>
												<li>
												  <?php  echo $sp1; ?>
												</li>
												<?php }$i++;}?>
											  </ul>
											  <ul class="edith unstyled" >
												<li><i class="icon-white"></i>
												  <?php  if($this->Session->read('User.uid')) { if(($this->Session->read('User.username')==Configure::read('userpage'))) { ?>
												  <?php // echo BASE_URL.'users/edit_resume/'.$exp['Experience']['eid'];?>
												  <?php /*?><a  href="<?php echo BASE_URL.'users/edit_skills/'.$skill['Skill']['key'];?>" style="display:none"  class="pull-right" id="p_skil_edit_<?php echo $sk;?>" >
																Edit</a> <?php */?>
												  <div class="editdelete"> <a  href=""  class="pull-right" style="display:none;"   data-toggle="modal" data-target="#delete_Skill<?php echo $skill['Skill']['sid']; ?>" id="p_skil_del_<?php echo $sk;?>" > &nbsp;<?php echo __("Delete");?></a> <a  href=""  class="pull-right"   data-toggle="modal" style="display:none;" data-target="#editskills<?php echo $skill['Skill']['sid']; ?>" id="p_skil_edit_<?php echo $sk;?>" ><?php echo __("Edit");?> | </a> </div>
												  <?php echo $this->Element('editskills',array('sk'=>$skill['Skill']['sid'])); ?> <?php echo $this->Element('delete',array('did'=>$skill['Skill']['sid'],'model'=>'Skill','wid'=>'sid','rid'=>Configure::read('userpage'))); ?>
												  <?php } } ?>
												</li>
											  </ul>
                                      
            
									</div>																																
														</div>
												</div>
												<?php $sk++;} ?>
												
										</div>
								</div>
									
									<?php } }  if($dashboard['Userdashboard']['widget'] == 'interest'){										
														if(!empty($int)){ ?>
														<div id="portlet_<?php echo $dashboard['Userdashboard']['widget'].'-'.$dashboard['Userdashboard']['udid'];?>" class="portlet proff-exp resume-box-cont">
										<h2 class="h2 move"> <?php echo ucfirst($dashboard['Userdashboard']['widget']);?> </h2>
										<div class="widgets">
											<?php  
											$est = 1;
														foreach($int as $int) { 
														
														$user_de = ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$int['Interest']['uid'])));
										if($user_de['User']['template'] == 'yellow'){
											$template = '';
											$style = 'style="border:none;"';
										}else {
											$template = 'well';
											$style = '';
										}
																	?>
												<div name="widget_<?php echo $dashboard['Userdashboard']['widget'];?>" class="widget widget_view widget_<?php echo $dashboard['Userdashboard']['widget'];?> ">
														<div id="<?php echo $dashboard['Userdashboard']['widget'];?>_<?php echo $int['Interest']['iid'];?>" class="view widget-middle">
																<div class="exp-box <?php echo $template;?> clearfix dragint" id="<?php echo $int['Interest']['iid']?>" onmouseover="exp_div_show('p_int_edit_<?php echo $est;?>','p_int_del_<?php echo $est;?>')" onmouseout="exp_div_hide('p_int_edit_<?php echo $est;?>','p_int_del_<?php echo $est;?>')" <?php echo $style;?>>
																<div class="options">
										  <h3><a class="move" href="<?php echo BASE_URL;?>pages/update_overall"><?php echo $int['Interest']['interest_type']?></a></h3> </div>
										  <ul class="">
											<?php $sp=explode(',',$int['Interest']['interest']) ;
														$i=0;
														foreach($sp as $sp1) {
															if(trim($sp1) !='') {?>
											<li>
											  <?php  echo $sp1; ?>
											</li>
											<?php  } $i++;}?>
										  </ul>
										  <ul class="edith unstyled" >
											<li><i class="icon-white"></i>
											  <?php  if($this->Session->read('User.uid')) { if(($this->Session->read('User.username')==Configure::read('userpage'))) { ?>
											  <?php // echo BASE_URL.'users/edit_resume/'.$exp['Experience']['eid'];?>
											  <?php /*?><a  href="<?php echo BASE_URL.'users/edit_interests/'.$int['Interest']['key'];?>" style="display:none" class="pull-right" id="p_int_edit_<?php echo $est;?>" >
														Edit</a> <?php */?>
											  <div class="editdelete"> <a  href=""  class="pull-right" style="display:none;"   data-toggle="modal" data-target="#delete_Interest<?php echo $int['Interest']['iid']; ?>" id="p_int_del_<?php echo $est;?>" > &nbsp;<?php echo __("Delete");?></a> <a  href=""  style="display:none;" class="pull-right"   data-toggle="modal" data-target="#editinterest<?php echo $int['Interest']['iid']; ?>" id="p_int_edit_<?php echo $est;?>" ><?php echo __("Edit");?> | </a> </div>
											  <?php echo $this->Element('editinterest',array('in'=>$int['Interest']['iid'])); ?> <?php echo $this->Element('delete',array('did'=>$int['Interest']['iid'],'model'=>'Interest','wid'=>'iid','rid'=>Configure::read('userpage'))); ?>
											  <?php } } ?>
											</li>
										  </ul>
										</div>																																
														</div>
												</div>
												<?php $est++;} ?>
												
										</div>
								</div>
										  <?php } } if($dashboard['Userdashboard']['widget'] == 'portfolio'){
											  
											  		if(!empty($portfolios)){
														 ?>
														 <div id="portlet_<?php echo $dashboard['Userdashboard']['widget'].'-'.$dashboard['Userdashboard']['udid'];?>" class="portlet proff-exp resume-box-cont">
										<h2 class="h2 move"> <?php echo ucfirst($dashboard['Userdashboard']['widget']);?> </h2>
										<div class="widgets">
											<?php  
											$ports = 1;
														foreach($portfolios as $portfolios) { 
														
														$user_de = ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$portfolios['Portfolio']['uid'])));
										if($user_de['User']['template'] == 'yellow'){
											$template = '';
											$style = 'style="border:none;"';
										}else {
											$template = 'well';
											$style = '';
										}
																	?>
												<div name="widget_<?php echo $dashboard['Userdashboard']['widget'];?>" class="widget widget_view widget_<?php echo $dashboard['Userdashboard']['widget'];?> ">
														<div id="<?php echo $dashboard['Userdashboard']['widget'];?>_<?php echo $portfolios['Portfolio']['pid'];?>" class="view widget-middle">
																<div class="exp-box <?php echo $template;?> clearfix dragint" id="<?php echo $portfolios['Portfolio']['pid']?>" onmouseover="exp_div_show('p_port_edit_<?php echo $ports;?>','p_port_del_<?php echo $ports;?>')" onmouseout="exp_div_hide('p_port_edit_<?php echo $ports;?>','p_port_del_<?php echo $ports;?>')" <?php echo $style;?>>
																<div class="options">
										  <h3><a class="move" href="<?php echo BASE_URL;?>pages/update_overall"><?php echo $portfolios['Portfolio']['title']?></a></h3> </div>
										  <?php if($portfolios['Portfolio']['image'] != '') { ?>
										  	<ul class="thumbnails" >
														  <li class="span"> <a href="#" class="thumbnail">
															<?php  echo  $this->html->image('portfolio-images/small/'.$portfolios['Portfolio']['image'],array('border'=>0,'alt'=>'pic'),array('class'=>'thumbnail')); ?>
															</a> </li>
														</ul>
														<ul class="edith unstyled" >
											<li><i class="icon-white"></i>
											  <?php  if($this->Session->read('User.uid')) { if(($this->Session->read('User.username')==Configure::read('userpage'))) { ?>
											    <div class="editdelete"> <a  href=""  class="pull-right" style="display:none;"   data-toggle="modal" data-target="#delete_Portfolio<?php echo $portfolios['Portfolio']['pid']; ?>" id="p_port_del_<?php echo $ports;?>" > &nbsp;<?php echo __("Delete");?></a> <a  href=""  style="display:none;" class="pull-right"   data-toggle="modal" data-target="#editportimg<?php echo $portfolios['Portfolio']['pid']; ?>" id="p_port_edit_<?php echo $ports;?>" ><?php echo __("Edit");?> | </a> </div>
											  <?php 
											  echo $this->Element('editportimage',array('pid'=>$portfolios['Portfolio']['pid']));
											   ?> <?php echo $this->Element('delete',array('did'=>$portfolios['Portfolio']['pid'],'model'=>'Portfolio','wid'=>'pid','rid'=>Configure::read('userpage'))); ?>
											  <?php } } ?>
											</li>
										  </ul>
										  <?php } if($portfolios['Portfolio']['document'] != '') {?>
										  			<table cellpadding="0" cellspacing="5" width="100%">
															<tr>
															  <td align="right"><?php $ex=explode('.',$portfolios['Portfolio']['document']);
																		if($ex[1]=='pdf') 
																		echo  $this->html->image('PDFicon.png',array('border'=>0,'alt'=>'pic','width'=>'50','height'=>'50'),array('class'=>''));
																		else
																		echo  $this->html->image('microsoft-word.jpeg',array('border'=>0,'alt'=>'pic','width'=>'50','height'=>'50'),array('class'=>''));
																		?></td>
															</tr>
															<tr>
															  <td align="right"><?php echo '<a href="'.BASE_URL.'files/portfolio-documents/'.$portfolios['Portfolio']['document'].'" target="_blank">'."Download".'<a>';?></td>
															</tr>
														  </table>
														  <ul class="edith unstyled" >
											<li><i class="icon-white"></i>
											  <?php  if($this->Session->read('User.uid')) { if(($this->Session->read('User.username')==Configure::read('userpage'))) { ?>
											    <div class="editdelete"> <a  href=""  class="pull-right" style="display:none;"   data-toggle="modal" data-target="#delete_Portfolio<?php echo $portfolios['Portfolio']['pid']; ?>" id="p_port_del_<?php echo $ports;?>" > &nbsp;<?php echo __("Delete");?></a> <a  href=""  style="display:none;" class="pull-right"   data-toggle="modal" data-target="#editportdoc<?php echo $portfolios['Portfolio']['pid']; ?>" id="p_port_edit_<?php echo $ports;?>" ><?php echo __("Edit");?> | </a> </div>
											  <?php 
											  echo $this->Element('editportdocu',array('pid'=>$portfolios['Portfolio']['pid']));
											   ?> <?php echo $this->Element('delete',array('did'=>$portfolios['Portfolio']['pid'],'model'=>'Portfolio','wid'=>'pid','rid'=>Configure::read('userpage'))); ?>
											  <?php } } ?>
											</li>
										  </ul>
										  <?php } if($portfolios['Portfolio']['video'] != ''){ ?>
										  
										  <ul class="thumbnails" >
														  <li class="span"> <a href="#" class="thumbnail">
															<?php echo $portfolios['Portfolio']['video']; ?>
															</a> </li>
														</ul>
														
														<ul class="edith unstyled" >
											<li><i class="icon-white"></i>
											  <?php  if($this->Session->read('User.uid')) { if(($this->Session->read('User.username')==Configure::read('userpage'))) { ?>
											    <div class="editdelete"> <a  href=""  class="pull-right" style="display:none;"   data-toggle="modal" data-target="#delete_Portfolio<?php echo $portfolios['Portfolio']['pid']; ?>" id="p_port_del_<?php echo $ports;?>" > &nbsp;<?php echo __("Delete");?></a> <a  href=""  style="display:none;" class="pull-right"   data-toggle="modal" data-target="#editportvideo<?php echo $portfolios['Portfolio']['pid']; ?>" id="p_port_edit_<?php echo $ports;?>" ><?php echo __("Edit");?> | </a> </div>
											  <?php 
											  echo $this->Element('editportvideo',array('pid'=>$portfolios['Portfolio']['pid']));
											   ?> <?php echo $this->Element('delete',array('did'=>$portfolios['Portfolio']['pid'],'model'=>'Portfolio','wid'=>'pid','rid'=>Configure::read('userpage'))); ?>
											  <?php } } ?>
											</li>
										  </ul>
										  				
										  <?php } if($portfolios['Portfolio']['audio'] != ''){ ?>
										  
										  		<table cellpadding="0" cellspacing="5" width="100%">
															<tr>
															  <td><object height="20" width="200" data="<?php echo $this->Html->webroot('player_mp3_maxi.swf'); ?>" type="application/x-shockwave-flash">
																  <param value="<?php echo $this->Html->webroot('player_mp3_maxi.swf'); ?>" name="movie">
                                                                    <param value="transparent" name="wmode">
																  <param value="mp3=<?php echo $this->Html->webroot('files/portfolio-audios/'.$portfolios['Portfolio']['audio'].''); ?>&amp;showstop=1&amp;showvolume=1&amp;bgcolor1=ffa50b&amp;bgcolor2=d07600" name="FlashVars">
																</object>
																<?php 	
																			
																			//echo $portaud['Portaudio']['audio_file'];?></td>
															</tr>
														  </table>
														  
														  <ul class="edith unstyled" >
											<li><i class="icon-white"></i>
											  <?php  if($this->Session->read('User.uid')) { if(($this->Session->read('User.username')==Configure::read('userpage'))) { ?>
											    <div class="editdelete"> <a  href=""  class="pull-right" style="display:none;"   data-toggle="modal" data-target="#delete_Portfolio<?php echo $portfolios['Portfolio']['pid']; ?>" id="p_port_del_<?php echo $ports;?>" > &nbsp;<?php echo __("Delete");?></a> <a  href=""  style="display:none;" class="pull-right"   data-toggle="modal" data-target="#editportaudio<?php echo $portfolios['Portfolio']['pid']; ?>" id="p_port_edit_<?php echo $ports;?>" ><?php echo __("Edit");?> | </a> </div>
											  <?php 
											  echo $this->Element('editportaudio',array('pid'=>$portfolios['Portfolio']['pid']));
											   ?> <?php echo $this->Element('delete',array('did'=>$portfolios['Portfolio']['pid'],'model'=>'Portfolio','wid'=>'pid','rid'=>Configure::read('userpage'))); ?>
											  <?php } } ?>
											</li>
										  </ul>
										  
										  <?php } if($portfolios['Portfolio']['presentation'] != ''){?>
										  				<table cellpadding="0" cellspacing="5" width="100%">
															<tr>
															  <td><?php
																							 $var = $portfolios['Portfolio']['presentation'];
																							 preg_match('/src="(.*?)"/', $var, $src);
																							 $src = $src[1];
																							  ?>
																<iframe src="<?php echo $src; ?>" width="250" height="200" frameborder="0" 	marginwidth="0" marginheight="0" scrolling="no" 
																					style="border:1px solid #CCC;border-width:1px 1px 0;margin-bottom:5px" allowfullscreen> </iframe>
																<?php 	
																			
																			//echo $portaud['Portaudio']['audio_file'];?></td>
															</tr>
														  </table>
														  <ul class="edith unstyled" >
											<li><i class="icon-white"></i>
											  <?php  if($this->Session->read('User.uid')) { if(($this->Session->read('User.username')==Configure::read('userpage'))) { ?>
											    <div class="editdelete"> <a  href=""  class="pull-right" style="display:none;"   data-toggle="modal" data-target="#delete_Portfolio<?php echo $portfolios['Portfolio']['pid']; ?>" id="p_port_del_<?php echo $ports;?>" > &nbsp;<?php echo __("Delete");?></a> <a  href=""  style="display:none;" class="pull-right"   data-toggle="modal" data-target="#editportpres<?php echo $portfolios['Portfolio']['pid']; ?>" id="p_port_edit_<?php echo $ports;?>" ><?php echo __("Edit");?> | </a> </div>
											  <?php 
											  echo $this->Element('editportpres',array('pid'=>$portfolios['Portfolio']['pid']));
											   ?> <?php echo $this->Element('delete',array('did'=>$portfolios['Portfolio']['pid'],'model'=>'Portfolio','wid'=>'pid','rid'=>Configure::read('userpage'))); ?>
											  <?php } } ?>
											</li>
										  </ul>
										  <?php } ?>
										  											  
										</div>																																
														</div>
												</div>
												<?php $ports++;} ?>
												
										</div>
								</div>
													<?php }
											  
											  } }?>
								
								
						</div>
					<?php  } ?>
				</div>
		</div>
</div>
</div>
</div>


