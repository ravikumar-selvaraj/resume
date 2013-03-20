  <?php echo $this->Element('side');?>
<div id="content" class="span9 viewmore middle-col hresume">
	<div id="components">
	<div class="middle dyb_componentsview" style="width:700px;">
	     <?php if(!isset($this->params['pass'][0])){?>
           <div class="proff-exp resume-box-cont">
                    <h2 >Skills</h2>
                    <div class="widgets">
                    <?php  $sk = 1;      
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
					<div name="widget_skills" class="widget widget_view widget_skills ">
														<div id="skills_<?php echo $skill['Skill']['sid'];?>" class="view widget-middle">
					<div class="exp-box <?php echo $template;?> clearfix" onmouseover="exp_div_show('p_skil_edit_<?php echo $sk;?>','p_skil_del_<?php echo $sk;?>')" onmouseout="exp_div_hide('p_skil_edit_<?php echo $sk;?>','p_skil_del_<?php echo $sk;?>')" <?php echo $style;?>>
					<div class="options">
                    <h3><a class="move" href="<?php echo BASE_URL;?>pages/update_overall"><?php echo $skill['Skill']['skill_area']?></a></h3>
					</div>
                    <ul class="">
                    <?php $sp=explode(',',$skill['Skill']['skills']) ;
                    $i=0;
                    foreach($sp as $sp1) {
						if(trim($sp1) !='') {
						?>
                    <li><?php echo $sp1; ?></li>
                    <?php } $i++;}?>
                    <?php /*?> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editskills<?php echo $skill['Skill']['sid']; ?>" >Edit</a> 
                  <?php echo $this->Element('editskills',array('sk'=>$skill['Skill']['sid'])); ?><?php */?>
                  
                  <?php  if($this->Session->read('User.uid')) { if(($this->Session->read('User.username')==Configure::read('userpage'))) { ?>
                  
                  <div class="editdelete">  <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Skill<?php echo $skill['Skill']['sid']; ?>" id="p_skil_del_<?php echo $sk;?>"  style="margin-left:3px;" ><?php echo __("Delete");?></a>
                 <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editskills<?php echo $skill['Skill']['sid']; ?>" id="p_skil_edit_<?php echo $sk;?>" ><?php echo __("Edit");?> |  </a> 
              
                 </div>
                 
                  <?php echo $this->Element('editskills',array('sk'=>$skill['Skill']['sid'])); ?>
                  <?php echo $this->Element('delete',array('did'=>$skill['Skill']['sid'],'model'=>'Skill','wid'=>'sid','rid'=>Configure::read('userpage').'/skill')); ?>
                  
                <?php } } ?>  
                  
                    </ul>
                    
                   <!-- <a href="" class="pull-right" id="sdsd">view all</a>-->
                   
                    </div>
					
					</div>
					</div>
					
					<?php $sk++;  }?>
					</div>
                    </div>
    
   
      <?php } ?>
   </div>
   </div>
   
    
    </div>
    
</div>
</div>
<script type="text/javascript">

/*$(".skitab").click(function(){	
$(this).parents('div.modal-body').find("div.news_skill").append('<div class="control-group" id="skill_val_div"><label class="control-label" for="inputInfo" ><?php echo __("Skill");?></label><div class="controls"><input type="text" id="signup_email" name="data[skill][]"><a class="skilltd btn btn-mini btn-primary" id="delmy">Del</a><span class="" id="skills_error"></span></div></div>');return false;
});

$('a.skilltd').live('click',function(){
	$(this).parents('div.control-group').remove();
});
*/


</script>