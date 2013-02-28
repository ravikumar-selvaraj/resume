<div id="interests" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 id="myModalLabel"><?php echo __("Add Interest");?></h2>
                            </div>

                            <div class="modal-body" id="for_interest">
                                <form class="form-horizontal" name="login" action="<?php echo BASE_URL;?>users/interests" method="post">
                                    <div class="control-group" id="int_type_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Type of interest");?></label>
                                        <div class="controls">
                                            <select  id="interest_type" name="data[interest_type]" >
												<option value="">Select</option>
												<option value="Travel">Travel</option>
												<option value="Music">Music</option>
												<option value="Sports">Sports</option>
												<option value="Literature">Literature</option>
												<option value="Film">Film</option>
												<option value="Art">Art</option>
												<option value="Around Town">Around Town</option>
												<option value="Other">Other</option>
											</select>
                                             <span class="help-inline" id="int_type_error"></span>
                                        </div>
                                    </div>
									
									<div class="control-group" id="interest_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Interest");?></label>
                                        <div class="controls">
                                            <input type="text" id="interest" name="data[interest][]">                                             
											 <a id="interest_add_btn" class="btn btn-mini btn-primary"><?php echo __("Add");?></a>
											 <span class="help-inline" id="interest_error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" id="interest_btn" class="btn btn-primary "><?php echo __("Submit");?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
						
