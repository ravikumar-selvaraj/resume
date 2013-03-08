<div data-backdrop="static" data-keyboard="false" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="update-resume" style="display:block ;">
<div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
<h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px;"><?php echo __("Education");?></h2>
</div>
		
		
			<form class="form-horizontal" name="Add-Education" action="" method="post">
			
				<?php $edu=ClassRegistry::init('Education')->find('first',array('conditions'=>array('key'=>$this->params['pass'][0]))); ?>
				<input type="hidden" name="data[eid]" value="<?php echo $edu['Education']['eid'];?>"  />
			<div class="modal-body" id="for_education_edit">
				<div class="control-group" id="degree_program_div">
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
				<div class="control-group" id="detais_div">
				<label class="control-label" for="inputInfo"><?php echo __("Details");?></label>
				<div class="controls">				
				<input type="text" id="extra_curricular" name="data[extra_curricular][]" value=" <?php echo $sp1; ?>"  />
				<?php //if($i!=0) {?> <!--<a id="extra_delete_btn" class="btn btn-mini btn-primary extra_delete_btn"><?php echo __("Delete");?></a>--><?php  //}   ?>
				<?php if($i==0) {?><a id="extra_edit_btn" class="btn btn-mini btn-primary"><?php echo __("Add");?></a><?php  }   ?>
														  
				
				<span class="help-inline" id="details_error"></span>
				</div>
				
				</div>
				<?php $i++;}?>
				
				
				<div class="modal-footer">
					<button type="submit" id="education_btn" class="btn btn-primary" name="edu"><?php echo __("Save");?></button>
					<a 	href="<?php echo BASE_URL.$new['User']['username']?>"><input class="btn btn-inverse" type="button" id="edit_cont_out" value="Cancel" /></a>
				</div> 
				 </div>     
        </form>
		
</div>
<script type="text/javascript">
$("#extra_edit_btn").click(function(){			
							$("#for_education_edit div:last").before('<div class="control-group" id="detais_div"><label class="control-label" for="inputInfo"><?php echo __("Details");?></label><div class="controls"><input type="text" id="extra_curricular" name="data[extra_curricular][]" /><span class="help-inline" id="details_error"></span></div></div>');
							return false;
					});
					
$(".extra_delete_btn").click(function(){
	$(this).find("#extra_curricular").attr('disabled','disabled');
	$(this).parent().parent().hide();
	
});
</script>

