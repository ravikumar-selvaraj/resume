<?php
 $skill=ClassRegistry::init('Skill')->find('first',array('conditions'=>array('sid'=>$sk))); 
 ?>
<div id="editskills<?php echo $sk; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:530px;">
	<div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h2 id="myModalLabel" style="font-size:24px; color:#000; background:none;"><?php echo __("Skills");?></h2>
	</div>
        <form class="form-horizontal" name="Add-Education" action="<?php echo BASE_URL; ?>users/edit_skills" method="post">
        <input type="hidden" name="data[sid]" value="<?php echo $skill['Skill']['sid'];?>"  />
		<input type="hidden" name="data[key]" value="<?php echo $skill['Skill']['key'];?>" />
		<div class="modal-body" id="for_skills_edit">
         							<div class="control-group edit_skill_area_div" id="">
                                        <label class="control-label" for="inputInfo"><?php echo __("Skill Area");?></label>
                                        <div class="controls">
                                            <input type="text" id="" name="data[skill_area]" class="edit_skill_area" value="<?php echo $skill['Skill']['skill_area']?>">                              
											 <span class="help-inline edit_skill_area_error" id=""></span>
                                        </div>
                                    </div>
									
									<?php $sp=explode(',',$skill['Skill']['skills']) ;
                                            $i=1;
                                            foreach($sp as $sp1) {?>
									<div class="edit_skill_val_div<?php echo $i; ?> control-group" id="">
                                        <label class="control-label" for="inputInfo" ><?php echo __("Skill");?></label>
                                        <div class="controls">
                                          
                                           <input type="text" class="edit_skill_val<?php echo $i; ?>" id="" name="data[skill][]" value=" <?php echo $sp1; ?>"  />
											 <?php if($i==1) { ?>  
                                              <a id="delmy" class="btn btn-mini btn-primary skitab"><?php echo __("Add");?></a>
											 <?php } else { ?>
                                            <a id="delmy" class="skilltd btn btn-mini btn-primary"><?php echo __("Delete");?></a> 
                                            <?php } ?>
											 <span class="help-inline edit_skill_val_error<?php echo $i; ?>" id=""></span>
                                        </div>
                                    </div> 
									<?php $i++;}?> 
                                     
                                   <div class="news_skill"> </div>
       							 
       </div><div class="modal-footer">
									 <button type="submit" id="skill_btn" class="edit_skill_btn btn btn-primary" name="skill"><?php echo __("Save");?></button>
									 <a 	href="<?php echo BASE_URL.$new['User']['username']?>">
									 <input class="btn btn-inverse" type="button" id="edit_cont_out" value="Cancel" />
									 </a>
								 </div>
        </form>
</div>

