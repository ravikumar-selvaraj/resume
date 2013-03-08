<?php
$exp=ClassRegistry::init('Experience')->find(array('eid'=>$edid));
$catlist=ClassRegistry::init('Country')->find('all',array('conditions'=>array('')));
?>
<div id="editexp<?php echo $edid; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form class="form-inline" name="update" action="<?php echo Router::url('/'); ?>users/exp" method="post" style="margin-bottom:0px;" enctype="multipart/form-data">
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <input type="hidden" value="<?php echo $exp['Experience']['key'];?>" name="data[key]" id="user_id" />
      <input type="hidden" name="data[eid]"  value="<?php echo $exp['Experience']['eid'];?>" />
      <button type="button" rel="<?php echo $exp['Experience']['eid'];?>" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <input type="hidden" name="data[responsibility]"  value="" />
      <h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px; background:none"><?php echo __("Professional Experience");?></h2>
    </div>
    
    <div class="modal-body" style="padding-top:0px;" ><!--<div class="pull-right" id="old-img" style="padding-right:35px;">
				<?php 
					/*if(!empty($exp['Experience']['logo']))
					echo $this->Html->image('users/small/'.$exp['Experience']['logo'],array('border'=>0,'width'=>'50','height'=>'50','alt'=>'Logo','class'=>''));
					else
					echo '';*/
				?>
			</div>-->
      <div class="control-group" id="job_title_div">
        <label class="control-label" for="inputInfo" id="prof" style="width:310px; font-size:14px;font-family:arial;font-weight: bold;"><?php echo __("Job Title");?></label>
        <div id="delme1" style="display:none; float:left; width:50px;"> <a id="delimg1" onclick="return scat();" style="cursor:pointer; color:#foo"><img src="<?php echo Router::url('/'); ?>img/delete.png" width="18" height="18" /></a></div>
        <div class="controls exp_control">
        
          <input type="text"  id="job_title" name="data[job_title]" style="padding:2px; margin-right:25px;" value="<?php echo $exp['Experience']['job_title'];?>">
          <div class="exp_image"></div>
       <!--<div class="exp_image"> asd  <div class="cp-bl" style="width:150px; float:right;" id="mylogo2edit">
            <input name="file" type="file" id="file2"  value="" class="box upload"  onchange="return ajaxFileUpload1();"  >
            <input type="submit" id="submiti" name="upload" value="upload" class="cp-bl-bu" style="display:none;float:right;cursor:pointer;" >
            <input type="hidden" name="data[logo]" value="0" id="user_logoedit" />
          </div>
          <div id="ploading1" style="display:none;"><?php echo $this->html->image('loading.gif',array());?>Loading....</div>
          <div style="width:150px; float:right; height:50px; display:none; text-align:center; position:relative; bottom:25px;" id="mylogoedit"> </div>
          </div>-->
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
            <option value="Cooperative Education Work" <?php if($exp['Experience']['contract_type']=='Cooperative Education Work')echo 'selected="selected"'; ?>><?php echo __("Cooperative Education Work");?> </option>
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
          <table border="0" align="left" cellpadding="0" cellspacing="0" id="myTable" width="100%" class="miletab" >
            <tr>
              <input value="1" name="com" id="com" type="hidden">
              <td align="left" valign="middle" width="1%"><?php $sp=explode(',',$exp['Experience']['responsibility']) ;
			$i=0;
			foreach($sp as $sp1) {?>
                <?php //echo $sp1; ?>
                <input type="text" id="resp" name="resp[]" class="team" placeholder="Responsibilities" style="width:425px;padding:2px; margin-bottom:10px;" value=" <?php echo $sp1; ?>" >
                <?php $i++;}?>
                
                <!--<input name="team1[]" maxlength="30" type="hidden" id="" value="fds" class="team" />--></td>
              <td align="left" valign="top" width="1%"><a onclick="insRow()" style="cursor:pointer;" class="btn btn-mini btn-primary exptab"> <?php echo __("Add");?></a><br /></td>
            </tr>
            <tr id="add_rows" class="fell">
            <!--  <td align="left"></td>
              <td align="left" valign="top"></td>-->
            </tr>
              </tbody>
            
          </table>
          <span class="help-inline" id="whoru_error"></span> </div>
      </div>
    </div>
    <div class="modal-footer">
      <label class="checkbox" style="display:block;">
        <input type="hidden" name="data[display_home]" value="1">
        <!--<span style="margin-left:5px; float:left; font-size:12px;"><?php echo __("Display on home page");?></span>--> </label>
      <button type="submit" id="exp_btn" class="btn btn-primary "><?php echo __("Submit resume");?></button>
    </div>
    
    <!--</div>-->
  </form>
</div>
<style>
   #display
   {
	   top:10px;
   }
   #delme
   {
	   width:110px;
	   float:left;
	   text-align:right;
	   font-family:Verdana, Geneva, sans-serif;
	   color:#F00;
   }
   </style>
   
