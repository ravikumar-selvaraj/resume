<div id="education" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 id="myModalLabel"><?php echo __("Add Education");?></h2>
                            </div>

                            <div class="modal-body" id="for_education">
                                <form class="form-horizontal" name="Add-Education" action="<?php echo BASE_URL;?>users/education" method="post">
                                    <div class="control-group" id="degree_program_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Degree Program");?></label>
                                        <div class="controls">
                                            <input type="text" id="course" name="data[course]">
                                             <span class="help-inline" id="degree_program_error"></span>
                                        </div>
                                    </div>
									
                                    <div class="control-group" id="school_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("School");?></label>
                                        <div class="controls">
                                            <input type="text" id="organization" name="data[organization]">
											<span class="help-inline" id="school_error"></span>
                                        </div>
                                    </div>
									
									<div class="control-group" id="edu_start_date_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Start Date");?></label>
                                        <div class="controls">
                                            <input type="text" id="edu_start_date" name="data[start_date]">
											<span class="help-inline" id="edu_start_date_error"></span>
                                        </div>
                                    </div>
									
									<div class="control-group" id="edu_end_date_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("End Date");?></label>
                                        <div class="controls">
                                            <input type="text" id="edu_end_date" name="data[end_date]">
											<span class="help-inline" id="edu_end_date_error"></span>
                                        </div>
                                    </div>
									
									<div class="control-group" id="edu_desc_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Short Description");?></label>
                                        <div class="controls">
                                            <textarea id="edu_desc" name="data[edu_desc]"></textarea>
											<span class="help-inline" id="edu_desc_error"></span>
                                        </div>
                                    </div>
									
									<div class="control-group" id="detais_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Details");?></label>
                                        <div class="controls">
                                            <input type="text" id="extra_curricular" name="data[extra_curricular][]">                                             
											 <a id="extra_add_btn" class="btn btn-mini btn-primary"><?php echo __("Add");?></a>
											 <span class="help-inline" id="details_error"></span>
                                        </div>
                                    </div>
									
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" id="education_btn" class="btn btn-primary "><?php echo __("Submit");?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>