<?php
 $int=ClassRegistry::init('Interest')->find('first',array('conditions'=>array('iid'=>$in))); 
 ?>
 <div id="editinterest<?php echo $in; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:530px;">
 
<div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h2 id="myModalLabel" style="font-size:24px; color:#000; background:none"><?php echo __("Interest");?></h2>
</div>
        <form class="form-horizontal" name="Add-Education" action="<?php echo BASE_URL; ?>users/edit_interests" method="post">
        <input type="hidden" name="data[iid]" value="<?php echo $int['Interest']['iid'];?>"  />
		<input type="hidden" name="data[key]" value="<?php echo $int['Interest']['key']?>" />
		<div class="modal-body" id="for_interest_edit">
         <div class="control-group" id="edit_int_type_div">
            <label class="control-label" for="inputInfo"><?php echo __("Type of interest");?></label>
            <div class="controls">
            <select  id="edit_interest_type" name="data[interest_type]" >
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
                 <span class="help-inline" id="edit_int_type_error"></span>
            </div>
           </div>
	      <?php $sp=explode(',',$int['Interest']['interest']) ;
			$i=1;
			foreach($sp as $sp1) {?>
			 <div class="control-group" id="edit_interest_div<?php echo $i; ?>">
			 <label class="control-label" for="inputInfo" ><?php echo __("Interest");?></label>
			 <div class="controls">                            
				<input type="text" id="edit_interest<?php echo $i; ?>" name="data[interest][]" value="<?php echo $sp1; ?>" > 
				<?php if($i==1){?>
			 <a id="delmy" class="btn btn-mini btn-primary instab"><?php echo __("Add");?></a>
			 <?php } else { ?>
              <a id="delmy" class="instd btn btn-mini btn-primary"><?php echo __("Delete");?></a> 
                     <?php } ?>
			 <span class="help-inline" id="edit_interest_error<?php echo $i; ?>"></span>
		     </div>
	         </div>		
            <?php $i++;}?> 
        <div class="news_ins"></div>
       </div><div class="modal-footer">


<button type="submit" id="edit_interest_btn" class="btn btn-primary"><?php echo __("Save");?></button>
<a 	href="<?php echo BASE_URL.$new['User']['username']?>">

<input class="btn btn-inverse" type="button" id="edit_cont_out" value="Cancel" />
</a>
</div>
        </form>
		
</div>

