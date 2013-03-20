<div id="mylink" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 id="myModalLabel"  class="forh2"><?php echo __("My Links");?></h2>
                            </div>

                            <div class="modal-body" id="for_social_links">
                                <form class="form-inline" name="my-links" action="<?php echo BASE_URL;?>users/mylinks" method="post">
                                    <div class="control-group" id="social_links">
                                        <label class="control-label" for="inputInfo"><?php echo __("Links");?></label>
                                        <div class="controls">
											<select  id="im_type" name="data[im_type][]">
												<option value="">Select</option>
												<option value="Facebook">Facebook</option>
												<option value="Twitter">Twitter</option>
												<option value="Linkedin">Linkedin</option>
											</select>
                                            <input type="text" id="im_link" name="data[im_link][]">
											<a id="delmy" class="mylinkbt btn btn-mini btn-primary"><?php echo __("Add");?></a>
											<span class="help-inline" id="social_links_error"></span>
                                        </div>
                                    </div>
                                    <div class="news_link"> </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" id="social_btn" class="btn btn-primary "><?php echo __("Submit");?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>