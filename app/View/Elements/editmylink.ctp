<div id="editmylink" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 id="myModalLabel"  class="forh2"><?php echo __("My Links");?></h2>
                            </div>

                            <div class="modal-body" id="for_social_links">
                                <form class="form-inline" name="my-links" action="<?php echo BASE_URL;?>users/editmylinks" method="post">
                                
                                   <?php $i=0; 
								   foreach($editlinks as $editlinks) { ?>
                                   <input type="hidden" name="data[mlid][]" value="<?php echo $editlinks['Mylink']['mlid'];?>"  />
								   <input type="hidden" name="data[key][]" value="<?php echo $editlinks['Mylink']['key'];?>" />
                                     <div class="control-group" id="social_links">
                                        <label class="control-label" for="inputInfo"><?php echo __("Links");?></label>
                                      
                                        <div class="controls">
											<select  id="im_type" name="data[im_type][]">
												<option value="">Select</option>
												<option value="Facebook" <?php if($editlinks['Mylink']['im_type']=='Facebook')echo 'selected="selected"'; ?>>Facebook</option>
												<option value="Twitter" <?php if($editlinks['Mylink']['im_type']=='Twitter')echo 'selected="selected"'; ?>>Twitter</option>
												<option value="Linkedin"  <?php if($editlinks['Mylink']['im_type']=='Linkedin')echo 'selected="selected"'; ?>>Linkedin</option>
											</select>
                                            <input type="text" id="im_link" name="data[im_link][]" value="<?php echo $editlinks['Mylink']['im_link'] ?>">
											<?php if($i==0) { ?><a id="delmy" class="mylinkbt btn btn-mini btn-primary"><?php echo __("Add");?></a> <?php } else { ?>
                                            <a id="delmy" class="linktd btn btn-mini btn-primary"><?php echo __("Delete");?></a>
                                            <?php } ?>
											<span class="help-inline" id="social_links_error"></span>
                                        </div>
                                        
                                    </div>
									<?php $i++;} ?>
                                    <div class="news_link"> </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" id="social_btn" class="btn btn-primary "><?php echo __("Submit");?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>