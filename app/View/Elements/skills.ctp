<div id="skills" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 id="myModalLabel"><?php echo __("Add Skill");?></h2>
                            </div>

                            <div class="modal-body" id="for_count">
                                <form class="form-horizontal" name="login" action="<?php echo BASE_URL;?>users/skills" method="post">
                                    <div class="control-group" id="skill_area_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Skill Area");?></label>
                                        <div class="controls">
                                            <input type="text" id="skill_area" name="data[skill_area]">                                             
											 <span class="help-inline" id="skill_area_error"></span>
                                        </div>
                                    </div>
									
									<div class="control-group" id="skill_val_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Skill");?></label>
                                        <div class="controls">
                                            <input type="text" id="skill_val" name="data[skill][]">                                             
											 <a id="skill_add_btn" class="btn btn-mini btn-primary"><?php echo __("Add");?></a>
											 <span class="help-inline" id="skill_val_error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" id="skill_btn" class="btn btn-primary "><?php echo __("Submit");?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
						
						