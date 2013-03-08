
<?php $edu=ClassRegistry::init('Education')->find(array('eid'=>$uid)); ?>


<div id="editedu<?php echo $uid; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                               
                                <h2 id="myModalLabel" style="background:none"><?php echo __("Edit Education");?></h2>
                            </div>

                            <div class="modal-body" id="for_education_edit12">
                                <form class="form-horizontal" name="Add-Education" action="<?php echo BASE_URL;?>users/education" method="post">
                                <input type="hidden" name="data[eid]" value="<?php echo $edu['Education']['eid'];?>"  />
                                    <div class="control-group" id="degree_program_divtr">
                                        <label class="control-label" for="inputInfo"><?php echo __("Degree Program");?></label>
                                        <div class="controls">
                                           <input type="text" id="course" name="data[course]" value="<?php echo $edu['Education']['course'];?>">
                                             <span class="help-inline" id="degree_program_error"></span>
                                        </div>
                                    </div>
									
                                    <div class="control-group" id="school_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("School");?></label>
                                        <div class="controls">
                                            <input type="text" id="organization" name="data[organization]" value="<?php echo $edu['Education']['organization'];?>">
											<span class="help-inline" id="school_error"></span>
                                        </div>
                                    </div>
									
									<div class="control-group" id="edu_start_date_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Start Date");?></label>
                                        <div class="controls">
                                            <input type="text" id="edu_start_date" name="data[start_date]" value="<?php echo $edu['Education']['start_date'];?>">
											<span class="help-inline" id="edu_start_date_error"></span>
                                        </div>
                                    </div>
									
									<div class="control-group" id="edu_end_date_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("End Date");?></label>
                                        <div class="controls">
                                           <input type="text" id="edu_end_date" name="data[end_date]" value="<?php echo $edu['Education']['end_date'];?>">
											<span class="help-inline" id="edu_end_date_error"></span>
                                        </div>
                                    </div>
									
									<div class="control-group" id="edu_desc_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Short Description");?></label>
                                        <div class="controls">
                                           <textarea id="edu_desc" name="data[edu_desc]"><?php echo $edu['Education']['desc'];?></textarea>
											<span class="help-inline" id="edu_desc_error"></span>
                                        </div>
                                    </div>
									
									<?php $sp=explode(',',$edu['Education']['extra_curricular']) ;
										$i=0;
										foreach($sp as $sp1) {?>
										<div class="control-group" id="detais_div2">
										<label class="control-label" for="inputInfo"><?php echo __("Details");?></label>
										<div class="controls">				
										<input type="text" id="extra_curricular" name="data[extra_curricular][]" value=" <?php echo $sp1; ?>"  />
										<?php //if($i!=0) {?> <!--<a id="extra_delete_btn" class="btn btn-mini btn-primary extra_delete_btn"><?php echo __("Delete");?></a>--><?php  //}   ?>
										<?php if($i==0) {?><a id="extra_edit_btn2" class="btn btn-mini btn-primary edutab"><?php echo __("Add");?></a><?php  }   ?>
											<span class="help-inline" id="details_error"></span>
										</div>
										</div>
								   <?php $i++;}?>
									  <div class="news"></div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" id="education_btn" class="btn btn-primary"><?php echo __("Submit");?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


