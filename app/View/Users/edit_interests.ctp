<?php
 $int=ClassRegistry::init('Interest')->find('first',array('conditions'=>array('key'=>$this->params['pass'][0]))); 
 //pr($int);
 ?>
<div data-backdrop="static" data-keyboard="false" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="update-resume" style="display:block ;">
<div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
<h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px;"><?php echo __("Interest");?></h2>
</div>
        <form class="form-horizontal" name="Add-Education" action="" method="post">
        <input type="hidden" name="data[iid]" value="<?php echo $int['Interest']['iid'];?>"  />
		<input type="hidden" name="data[key]" value="<?php echo $this->params['pass'][0];?>" />
		<div class="modal-body" id="for_interest_edit">
         <div class="control-group" id="int_type_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Type of interest");?></label>
                                        <div class="controls">
                                        <select  id="interest_type" name="data[interest_type]" >
                                        <option value=""><?php echo __("Select");?></option>
                                        <option value="Travel" <?php if($int['Interest']['interest_type']=='Travel')echo 'selected="selected"'; ?>><?php echo __("Travel");?></option>
                                        <option value="Music" <?php if($int['Interest']['interest_type']=='Music')echo 'selected="selected"'; ?>><?php echo __("Music");?></option>
                                        <option value="Sports"<?php if($int['Interest']['interest_type']=='Sports')echo 'selected="selected"'; ?>><?php echo __("Sports");?></option>
                                        <option value="Literature" <?php if($int['Interest']['interest_type']=='Literature')echo 'selected="selected"'; ?>><?php echo __("Literature");?></option>
                                        <option value="Film" <?php if($int['Interest']['interest_type']=='Film')echo 'selected="selected"'; ?>><?php echo __("Film");?></option>
                                        <option value="Art" <?php if($int['Interest']['interest_type']=='Art')echo 'selected="selected"'; ?>><?php echo __("Art");?></option>
                                        <option value="Around Town" <?php if($int['Interest']['interest_type']=='Around Town')echo 'selected="selected"'; ?>><?php echo __("Around Town");?></option>
                                        <option value="Other"<?php if($int['Interest']['interest_type']=='Other')echo 'selected="selected"'; ?>><?php echo __("Other");?></option>
                                        </select>
                                             <span class="help-inline" id="int_type_error"></span>
                                        </div>
                                    </div>
							<?php $sp=explode(',',$int['Interest']['interest']) ;
                                            $i=0;
                                            foreach($sp as $sp1) {?>
											 <div class="control-group" id="interest_div">
											 <label class="control-label" for="inputInfo"><?php echo __("Interest");?></label>
											 <div class="controls">                            
                                            	<input type="text" id="interest" name="data[interest][]" value=" <?php echo $sp1; ?>" > 
												<?php if($i==0){?>
											 <a id="interest_edit_btn" class="btn btn-mini btn-primary"><?php echo __("Add");?></a>
											 <?php } ?>
											 <span class="help-inline" id="interest_error"></span>
                                        </div>
                                    </div>		
									<?php $i++;}?> 
        <div class="modal-footer">


<button type="submit" id="interest_btn" class="btn btn-primary"><?php echo __("Save");?></button>
<a 	href="<?php echo BASE_URL.$new['User']['username']?>">
<input class="btn btn-inverse" type="button" id="edit_cont_out" value="Cancel" />
</a>
</div>
       </div>
        </form>
		
</div>

<script type="text/javascript">
$("#interest_edit_btn").click(function(){			
							$("#for_interest_edit div:last").before('<div class="control-group"><label class="control-label" for="inputInfo"><?php echo __("Interest");?></label><div class="controls"><input type="text" id="interest" name="data[interest][]"><span class="help-inline" id="interest_error"></span></div></div>');
							return false;
					});
</script>