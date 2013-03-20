  <?php echo $this->Element('side');?>
    <div id="content" class="span9 viewmore middle-col hresume">
	<div id="components">
	<div class="middle dyb_componentsview" style="width:700px;">
     <?php if(!isset($this->params['pass'][0])){?>
    
            <div class="proff-exp resume-box-cont">
            <h2 ><?php echo __("Professional Experience");?></h2>
			<div class="widgets">
            <?php  $r=1;
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
			
			<div name="widget_experience" class="widget widget_view widget_experience ">
														<div id="experience_<?php echo $exp['Experience']['eid'];?>" class="view widget-middle">
					<div class="exp-box <?php echo $template;?> clearfix" id="profile_experiance_<?php echo $r;?>" onmouseover="exp_div_show('p_exp_edit_<?php echo $r;?>','p_exp_del_<?php echo $r;?>')" onmouseout="exp_div_hide('p_exp_edit_<?php echo $r;?>','p_exp_del_<?php echo $r;?>')" <?php echo $style;?>>
					<div class="options">
					<h3><a class="move" href="<?php echo BASE_URL;?>pages/update_overall"><?php echo $exp['Experience']['job_title'];?></a>
					
					<div class="pull-right">
					<?php if(!empty($exp['Experience']['logo']))echo $this->Html->image('users/small/'.$exp['Experience']['logo'],array('border'=>0,'width'=>'50','height'=>'50','alt'=>'Logo','class'=>'')); ?>
					</div>
					</h3>
					</div>
					<div class="blog_date">
					<?php 
					if($exp['Experience']['country'] != '') {
					$coun=ClassRegistry::init('Country')->find('first',array('conditions'=>array('iso_code2'=>$exp['Experience']['country'])));
					
					echo $exp['Experience']['company'].'-'."\t".$exp['Experience']['city'].'-'."\t".$coun['Country']['country_name']."\t".'('.$exp['Experience']['contract_type']."\t".'-'."\t".date("M Y", strtotime($exp['Experience']['start_date']))."\t".'-'."\t".date("M Y", strtotime($exp['Experience']['end_date'])).  ')';
					
					}?>
					</div> 
				  <?php echo __("Responsibility");?>
					<ul>
					<?php $sp=explode(',',$exp['Experience']['responsibility']) ;
					$i=0;
					foreach($sp as $sp1) {
						if(trim($sp1)) { 
						?>
					<li><?php echo $sp1; ?></li>
					<?php } $i++;}?>
					
					
					<?php  if($this->Session->read('User.uid')) { if(($this->Session->read('User.username')==Configure::read('userpage'))) { ?>
					  <div class="editdelete">
					   <a  href=""  class="pull-right delexp"   data-toggle="modal"  rel="<?php echo $exp['Experience']['eid']; ?>"   data-target="#delete_Experience<?php echo $exp['Experience']['eid']; ?>" id="p_exp_del_<?php echo $r;?>"  style="padding-left:3px;display:none;" >   <?php echo __("Delete");?></a>
					   <a  href=""  class="pull-right exp" rel="<?php echo $exp['Experience']['eid']; ?>"  data-toggle="modal" style="display:none;" data-target="#editexp<?php echo $exp['Experience']['eid']; ?>" id="p_exp_edit_<?php echo $r;?>" ><?php echo __("Edit");?>  |  </a>  
					 </div>
						   <?php echo $this->Element('editexp',array('edid'=>$exp['Experience']['eid'])); ?>
						  <?php echo $this->Element('delete',array('did'=>$exp['Experience']['eid'],'model'=>'Experience','wid'=>'eid','rid'=>Configure::read('userpage').'/experience')); ?>
					
					<?php } } ?>
					
					
					
					</ul>
					<?php if(!empty( $exp['Experience']['comapny_desc'])){?>
					<?php echo __("Company Description");?>
					<ul>
					<li> <?php echo $exp['Experience']['comapny_desc']?></li>
					</ul>
					<?php }?>
					<?php if(!empty( $exp['Experience']['website'])){?>
					<?php echo __("Website");?>
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
			
            <?php $r++;}?>     
            </div></div>
    
      <?php } ?>
	  </div>
    </div>
    </div>
    
</div>
</div>

<script>
/*$('.exptab').click(function(){
		//var news = $(this).parents('table').attr('class');
		$('.miletab').append('<tr class="myne"><td><input type="text"  class="team validate[required] text" name="resp[]"  placeholder="Responsibilities" style="width:425px;padding:2px; margin-bottom:10px;" ></td><td><span class="exptd btn btn-mini btn-primary" id="delmy">Delete</span></td></tr>');
	});
	
	$('span.exptd').live('click',function(){
	$(this).parents('tr.myne').remove();
});*/
</script>


 

