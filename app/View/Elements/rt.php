<div id="editexp<?php echo $edid; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >

<form class="form-inline" name="update" action="users/edit_experiance" method="post" enctype="multipart/form-data">
	<input type="hidden" value="<?php echo $exp['Experience']['key'];?>" name="data[key]" id="user_id" />
	<input type="hidden" name="data[eid]"  value="<?php echo $exp['Experience']['eid'];?>" />
	<div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px; background:none"><?php echo __("Professional Experience");?></h2>
</div>
		<div class="modal-body" style="padding-top:0px;" >
        <?php if($exp['Experience']['logo']!=0) { ?>
			<div class="pull-right" id="edit_old-img">
				<?php 
					if(!empty($exp['Experience']['logo']))
					echo $this->Html->image('users/small/'.$exp['Experience']['logo'],array('border'=>0,'width'=>'50','height'=>'50','alt'=>'Logo','class'=>''));
					else
					echo $this->Html->image('avatar_cp.jpg',array('border'=>0,'width'=>'50','height'=>'50','alt'=>'Logo','class'=>''));
				?>
			</div>
			<?php  } ?>
			<div class="control-group" id="edit_job_title_div">
            
			<label class="control-label" for="inputInfo" id="prof" style="width:310px; font-size:14px;font-family:arial;font-weight: bold;"><?php echo __("Job Title");?></label>
				<div id="edit_delme" style=" float:left; width:50px;<?php if($exp['Experience']['logo']==0) { ?>display:none<?php  } ?>">
					<a id="edit_delimg" onclick="return scat1();" style="cursor:pointer; color:#foo; <?php if($exp['Experience']['logo']=='') { ?>display:none<?php  } ?>"><img src="<?php echo Router::url('/'); ?>img/delete.png" height="18" width="18" /></a>
				</div>
				
				<div class="controls">
				<input type="text" placeholder="Job Title" id="edit_job_title" name="data[job_title]" value="<?php echo $exp['Experience']['job_title'];?>" style="padding:2px; margin-right:25px;"> 
					<div class="cp-bl" style="width:150px; float:right;<?php if($exp['Experience']['logo']!=0) { ?>display:none<?php  } ?>" id="edit_mylogo2">
						<input name="file" type="file" id="ditfile" value="" class="box upload"  onchange="return ajaxFileUpload1();"  >
						<input type="submit" id="submitie" name="upload" value="upload" class="cp-bl-bu" style="display:none;float:right;cursor:pointer;" >
						<input type="hidden" name="data[logo]" value="<?php echo $exp['Experience']['logo'];?>" id="edit_user_logo" />
					</div>

						<div class="ploading" style="display:none;"><?php echo $this->html->image('loading.gif',array());?>Loading....</div>
							<div style="width:150px; float:right; height:50px; display:none; text-align:center; position:relative; bottom:25px;" id="edit_mylogo"></div>
							<span class="help-inline" id="edit_job_title_div_error"></span>
						 </div>
				</div>
				<div class="control-group" id="edit_company_val_div">
					<label class="control-label" for="inputInfo" id="prof"><?php echo __("Company");?></label>
					<label class="control-label" for="inputInfo" id="prof"><?php echo __("Contract Type(Optional)");?></label>
					<div class="controls">
					<input type="text" placeholder="Company" id="edit_company_val" name="data[company]" style="padding:2px; margin-right:25px;" value="<?php echo $exp['Experience']['company'];?>">
					<select name="data[contract_type]" id="" style="height:26px;">
					<option value="Employed" <?php if($exp['Experience']['contract_type']=='Employed')echo 'selected="selected"'; ?>><?php echo __("Employed");?></option>
					<option value="Full-time" <?php if($exp['Experience']['contract_type']=='Full-time')echo 'selected="selected"'; ?>><?php echo __("Full-time");?></option>
					<option value="Part-time" <?php if($exp['Experience']['contract_type']=='Part-time')echo 'selected="selected"'; ?>><?php echo __("Part-time");?></option>
					<option value="Internship" <?php if($exp['Experience']['contract_type']=='Internship')echo 'selected="selected"'; ?>><?php echo __("Internship");?></option>
					<option value="Temporary Work" <?php if($exp['Experience']['contract_type']=='Temporary Work')echo 'selected="selected"'; ?>><?php echo __("Temporary Work");?></option>
					<option value="Apprenticeship" <?php if($exp['Experience']['contract_type']=='Apprenticeship')echo 'selected="selected"'; ?>><?php echo __("Apprenticeship");?></option>
					<option value="Cooperative Education Work" <?php if($exp['Experience']['contract_type']=='Cooperative Education Work')echo 'selected="selected"'; ?>><?php echo __("Cooperative Education Work");?>  </option>
					<option value="Consultant" <?php if($exp['Experience']['contract_type']=='Consultant')echo 'selected="selected"'; ?>><?php echo __("Consultant");?></option>
					<option value="Student Project" <?php if($exp['Experience']['contract_type']=='Student Project')echo 'selected="selected"'; ?>><?php echo __("Student Project");?></option>
					<option value="Volunteer Work" <?php if($exp['Experience']['contract_type']=='Volunteer Work')echo 'selected="selected"'; ?>><?php echo __("Volunteer Work");?></option>
					<option value="Freelancer" <?php if($exp['Experience']['contract_type']=='Freelancer')echo 'selected="selected"'; ?>><?php echo __("Freelancer");?></option>
					<option value="Temporary Replacement" <?php if($exp['Experience']['contract_type']=='Temporary Replacement')echo 'selected="selected"'; ?>><?php echo __("Temporary Replacement");?></option>
					<option value="OTHER" <?php if($exp['Experience']['contract_type']=='OTHER')echo 'selected="selected"'; ?>><?php echo __("Other");?></option>
					</select>
					<span class="help-inline" id="edit_company_val_div_error"></span> </div>
				</div>	

				<div class="control-group" id="edit_city_div">
					<label class="control-label" for="inputInfo" id="prof"><?php echo __("City");?></label>
					<label class="control-label" for="inputInfo" id="prof" style="float:left"><?php echo __("Country");?></label>
					<div class="controls">
					<input type="text" placeholder="City" id="edit_city" name="data[city]" style="padding:2px; margin-right:25px;" value="<?php echo $exp['Experience']['city'];?>">
					<select name="data[country]" id="edit_country" style="width:225px;height:26px;">
						<option value="">[-- <?php echo __("Select",true);?> --]</option>
						<?php 
						foreach($catlist as $cat):
						if($cat['Country']['iso_code2']==$exp['Experience']['country']){ $sel = ' selected="selected"'; $couid = $cat['Country']['country_id'];} else { $sel = ''; $couid ='';}
						echo '<option value="'.$cat['Country']['iso_code2'].'" '.$sel.'>'.$cat['Country']['country_name'].'</option>';
						endforeach;
						?>
					</select>
						<span class="help-inline" id="edit_city_div_error"></span> </div>
					</div>

			<div class="control-group" id="edit_date_div">
				<label class="control-label datepicker" for="inputInfo" id="prof"><?php echo __("Start Date");?></label>
				<label class="control-label datepicker" for="inputInfo" id="prof"><?php echo __("End Date");?></label>
				<div class="controls">
				<input type="text" placeholder="Start Date" id="edit_start_date" name="data[start_date]" style="padding:2px; margin-right:25px;" value="<?php echo $exp['Experience']['start_date'];?>">
				<input type="text" placeholder="End Date" id="edit_end_date" name="data[end_date]" style="padding:2px; margin-right:25px;" value="<?php echo $exp['Experience']['end_date'];?>">
				<span class="help-inline" id="edit_date_div_error"></span> </div>
			</div>

			<div class="control-group">
			<label class="control-label" for="inputInfo" id="prof"><?php echo __("Responsibilities");?></label>
			<div class="controls">
			<table border="0" align="left" cellpadding="0" cellspacing="0" id="myTable" width="100%" class="miletab<?php echo $edid; ?>" >
			<tr>
             <input value="1" name="com" id="com" type="hidden">
			<td align="left" valign="middle" width="1%">
			<?php $sp=explode(',',$exp['Experience']['responsibility']) ;
			$i=0;
			foreach($sp as $sp1) {?>
			<?php //echo $sp1; ?>
			
			<input type="text" id="resp" name="resp[]" class="team" placeholder="Responsibilities" style="width:425px;padding:2px; margin-bottom:10px;" value=" <?php echo $sp1; ?>" >
			
			<?php $i++;}?>        
			
			
			<!--<input name="team1[]" maxlength="30" type="hidden" id="" value="fds" class="team" />--></td>
			<td align="left" valign="top" width="1%"><a onclick="insRow()" style="cursor:pointer;" class="btn btn-mini btn-primary exptab">
			<?php echo __("Add");?></a><br /></td>
			</tr>
			<tr id="add_rows">
			<td align="left"></td>
			<td align="left" valign="top"></td>
			</tr>
			</tbody>
			</table>
			<span class="help-inline" id="whoru_error"></span> </div>
			</div>
</div>
<div class="modal-footer">


<button type="submit" id="exp_btn" class="btn btn-primary" name="save"><?php echo __("Save");?></button>
<a href="<?php echo BASE_URL.$new['User']['username']?>" class="btn btn-inverse"><?php echo __("Cancel");?></a>
</div>

<!--</div>-->
</form>
   </div>