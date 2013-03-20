  <?php echo $this->Element('side');?>
  
  <div id="content" class="span9 viewmore middle-col hresume">
	<div id="components">
	<div class="middle dyb_componentsview" style="width:700px;">
     <?php if(!isset($this->params['pass'][0])){?>
    
    
    
            <div class="proff-exp resume-box-cont">
                        <h2 ><?php echo __("Portfolio");?></h2>
                    <div class="widgets">
											  
											  		<?php if(!empty($portfolios)){
														 ?>
														 
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
																	<div name="widget_portfolio" class="widget widget_view widget_portfolio ">
														<div id="portfolio_<?php echo $portfolios['Portfolio']['pid'];?>" class="view widget-middle">
																<div class="exp-box <?php echo $template;?> clearfix dragint" id="<?php echo $portfolios['Portfolio']['pid']?>" onmouseover="exp_div_show('p_port_edit_<?php echo $ports;?>','p_port_del_<?php echo $ports;?>')" onmouseout="exp_div_hide('p_port_edit_<?php echo $ports;?>','p_port_del_<?php echo $ports;?>')" <?php echo $style;?>>
																<div class="options">
										  <h3><a class="move" href="<?php echo BASE_URL;?>pages/update_overall"><?php echo $portfolios['Portfolio']['title']?></a></h3> </div>
										  <?php if($portfolios['Portfolio']['image'] != '') { ?>
										  	<ul class="thumbnails" >
														  <li class="span3"> <a href="#" class="thumbnail">
															<?php  echo  $this->html->image('portfolio-images/big/'.$portfolios['Portfolio']['image'],array('border'=>0,'alt'=>'pic'),array('class'=>'thumbnail')); ?>
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
																<iframe src="<?php echo $src; ?>" width="100%" height="300" frameborder="0" 	marginwidth="0" marginheight="0" scrolling="no" 
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
												
										
													<?php } ?>
											  
											  
                    </div>
                    </div>
    
   
      <?php } ?>
   </div>
   </div>
    </div>
    
</div>
</div>