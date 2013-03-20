<div id="skills" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 id="myModalLabel" class="forh2"><?php echo __("Add Skill");?></h2>
                            </div>

                            <div class="modal-body" id="for_count">
                                <form class="form-horizontal" name="login" action="<?php echo BASE_URL;?>users/skills" method="post">
                                    <div class="control-group skill_area_div" id="">
                                        <label class="control-label" for="inputInfo"><?php echo __("Skill Area");?></label>
                                        <div class="controls">
                                            <input type="text" id="skill_area" class="skill_area" name="data[skill_area]">                                             
											 <span class="skill_area_error help-inline" id=""></span>
                                        </div>
                                    </div>
									
									<div class="control-group skill_val_div" id="">
                                        <label class="control-label" for="inputInfo"><?php echo __("Skill");?></label>
                                        <div class="controls">
                                            <input type="text" id="" class="skill_val" name="data[skill][]">                                             
											 <a id="delmy" class="skitab btn btn-mini btn-primary"><?php echo __("Add");?></a>
											 <span class="skill_val_error help-inline " id=""></span>
                                        </div>
                                    </div>
                                    
                                    <div class="news_skill"> </div>
                                    
                                    
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" id="" class="skill_btn btn btn-primary "><?php echo __("Submit");?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
						
						