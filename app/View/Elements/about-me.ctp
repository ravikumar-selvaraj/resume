<div id="aboutme" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 id="myModalLabel"><?php echo __("Add about me section");?></h2>
                            </div>

                            <div class="modal-body">
                                <form class="form-horizontal" name="login" action="<?php echo BASE_URL;?>users/aboutme" method="post">
								
                                    <div class="control-group" id="about_me_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Content");?></label>
                                        <div class="controls">
                                            <textarea rows="4" id="about_me" name="data[about_me]"></textarea>
											<span class="help-inline" id="about_me_error"></span>
                                        </div>
                                    </div>
									
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" id="about_me_btn" class="btn btn-primary "><?php echo __("Submit");?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>