
<?php $edu=ClassRegistry::init('Education')->find(array('eid'=>$uid)); ?>


<div id="editedu<?php echo $uid; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                               
                                <h2 id="myModalLabel" style="background:#fff; color:#000; font-size:24px;"><?php echo __("Edit Education");?></h2>
                            </div>

                            <div class="modal-body" id="for_education_edit12">
                                <form class="form-horizontal" name="Add-Education" action="<?php echo BASE_URL;?>users/education" method="post">
                                <input type="hidden" name="data[eid]" value="<?php echo $edu['Education']['eid'];?>"  />
                                    <div class="control-group" id="edit_degree_program_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Degree Program");?></label>
                                        <div class="controls">
                                           <input type="text" id="edit_course" name="data[course]" value="<?php echo $edu['Education']['course'];?>">
                                             <span class="help-inline" id="edit_degree_program_error"></span>
                                        </div>
                                    </div>
									
                                    <div class="control-group" id="edit_school_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("School");?></label>
                                        <div class="controls">
                                            <input type="text" id="edit_organization" name="data[organization]" value="<?php echo $edu['Education']['organization'];?>">
											<span class="help-inline" id="edit_school_error"></span>
                                        </div>
                                    </div>
									
									<div class="control-group" id="edit_edu_start_date_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Start Date");?></label>
                                        <div class="controls">
                                            <input type="text" id="edit_edu_start_date" name="data[start_date]" value="<?php echo $edu['Education']['start_date'];?>">
											<span class="help-inline" id="edit_edu_start_date_error"></span>
                                        </div>
                                    </div>
									
									<div class="control-group" id="edit_edu_end_date_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("End Date");?></label>
                                        <div class="controls">
                                           <input type="text" id="edit_edu_end_date" name="data[end_date]" value="<?php echo $edu['Education']['end_date'];?>">
											<span class="help-inline" id="edit_edu_end_date_error"></span>
                                        </div>
                                    </div>
									
									<div class="control-group" id="edit_edu_desc_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Short Description");?></label>
                                        <div class="controls">
                                           <textarea id="edit_edu_desc" name="data[edu_desc]"><?php echo $edu['Education']['desc'];?></textarea>
											<span class="help-inline" id="edit_edu_desc_error"></span>
                                        </div>
                                    </div>
									
									<?php $sp=explode(',',$edu['Education']['extra_curricular']) ;
										$i=0;
										foreach($sp as $sp1) {?>
										<div class="control-group" id="edit_detais_div<?php echo $i; ?>">
										<label class="control-label" for="inputInfo"><?php echo __("Details");?></label>
										<div class="controls">				
										<input type="text" id="edit_extra_curricular<?php echo $i; ?>" name="data[extra_curricular][]" value=" <?php echo $sp1; ?>"  />
										<?php if($i==0) {?>
                                        <a id="delmy" class="edutab btn btn-mini btn-primary"><?php echo __("Add");?></a>
										<?php  }  else { ?>
                                         <a id="delmy" class="edutd btn btn-mini btn-primary"><?php echo __("Delete");?></a> 
                                        <?php } ?>
											<span class="help-inline" id="edit_details_error<?php echo $i; ?>"></span>
										</div>
										</div>
								   <?php $i++;}?>
									  <div class="edunews"></div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" id="edit_education_btn" class="btn btn-primary"><?php echo __("Submit");?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


