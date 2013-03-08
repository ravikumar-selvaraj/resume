<?php
 $skill=ClassRegistry::init('Skill')->find('first',array('conditions'=>array('sid'=>$sk))); 
 ?>
<div id="editskills<?php echo $sk; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:440px;">
	<div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px; background:none;"><?php echo __("Skills");?></h2>
	</div>
        <form class="form-horizontal" name="Add-Education" action="<?php echo BASE_URL; ?>users/edit_skills" method="post">
        <input type="hidden" name="data[sid]" value="<?php echo $skill['Skill']['sid'];?>"  />
		<input type="hidden" name="data[key]" value="<?php echo $skill['Skill']['key'];?>" />
		<div class="modal-body" id="for_skills_edit">
         							<div class="control-group" id="skill_area_div">
                                        <label class="control-label" for="inputInfo" style="width:110px;"><?php echo __("Skill Area");?></label>
                                        <div class="controls" style="margin-left:140px">
                                            <input type="text" id="skill_area" name="data[skill_area]" value="<?php echo $skill['Skill']['skill_area']?>">                              
											 <span class="help-inline" id="skill_area_error"></span>
                                        </div>
                                    </div>
									
									<?php $sp=explode(',',$skill['Skill']['skills']) ;
                                            $i=0;
                                            foreach($sp as $sp1) {?>
									<div class="control-group" id="skill_val_div">
                                        <label class="control-label" for="inputInfo" style="width:110px;"><?php echo __("Skill");?></label>
                                        <div class="controls" style="margin-left:140px">
											
                                            <input type="text" id="skill_val" name="data[skill][]" value=" <?php echo $sp1; ?>"  />
											       <?php if($i==0) { ?>                                
											 <a id="skill_edit_btn2" class="btn btn-mini btn-primary skitab"><?php echo __("Add");?></a>
											 <?php } ?>
											 <span class="help-inline" id="skill_val_error"></span>
                                        </div>
                                    </div> 
									<?php $i++;}?> 
                                     
                                   <div class="news_skill"> </div>
       							 
       </div><div class="modal-footer">
									 <button type="submit" id="skill_btn" class="btn btn-primary" name="skill"><?php echo __("Save");?></button>
									 <a 	href="<?php echo BASE_URL.$new['User']['username']?>">
									 <input class="btn btn-inverse" type="button" id="edit_cont_out" value="Cancel" />
									 </a>
								 </div>
        </form>
</div>

