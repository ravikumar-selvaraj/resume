<?php
 $skill=ClassRegistry::init('Skill')->find('first',array('conditions'=>array('key'=>$this->params['pass'][0]))); 
 ?>
<div data-backdrop="static" data-keyboard="false" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="update-resume" style="display:block ;">
	<div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
	<h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px;"><?php echo __("Skills");?></h2>
	</div>
        <form class="form-horizontal" name="Add-Education" action="" method="post">
        <input type="hidden" name="data[sid]" value="<?php echo $skill['Skill']['sid'];?>"  />
		<input type="hidden" name="data[key]" value="<?php echo $this->params['pass'][0];?>" />
		<div class="modal-body" id="for_skills_edit">
         							<div class="control-group" id="skill_area_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Skill Area");?></label>
                                        <div class="controls">
                                            <input type="text" id="skill_area" name="data[skill_area]" value="<?php echo $skill['Skill']['skill_area']?>">                                             
											 <span class="help-inline" id="skill_area_error"></span>
                                        </div>
                                    </div>
									
									<?php $sp=explode(',',$skill['Skill']['skills']) ;
                                            $i=0;
                                            foreach($sp as $sp1) {?>
									<div class="control-group" id="skill_val_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Skill");?></label>
                                        <div class="controls">
											
                                            <input type="text" id="skill_val" name="data[skill][]" value=" <?php echo $sp1; ?>"  />
											       <?php if($i==0) { ?>                                
											 <a id="skill_edit_btn" class="btn btn-mini btn-primary"><?php echo __("Add");?></a>
											 <?php } ?>
											 <span class="help-inline" id="skill_val_error"></span>
                                        </div>
                                    </div> 
									<?php $i++;}?>  
       							 <div class="modal-footer">
									 <button type="submit" id="skill_btn" class="btn btn-primary" name="skill"><?php echo __("Save");?></button>
									 <a 	href="<?php echo BASE_URL.$new['User']['username']?>">
									 <input class="btn btn-inverse" type="button" id="edit_cont_out" value="Cancel" />
									 </a>
								 </div>
       </div>
        </form>
</div>

<script type="text/javascript">
$("#skill_edit_btn").click(function(){			
							$("#for_skills_edit div:last").before('<div class="control-group"><label class="control-label" for="inputInfo"><?php echo __("Skill");?></label><div class="controls"><input type="text" id="signup_email" name="data[skill][]"><span class="help-inline" id="skills_error"></span></div></div>');
							return false;
					});
</script>