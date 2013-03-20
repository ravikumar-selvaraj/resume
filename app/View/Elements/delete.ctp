<?php $exp=ClassRegistry::init('Education')->find(array('eid'=>$did));  ?>

<div id="delete_<?php echo $model; ?><?php echo $did; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:350px;">
  <form class="form-inline" name="update" action="<?php echo Router::url('/'); ?>users/resumedelete" method="post" style="margin-bottom:0px;width:350px;" enctype="multipart/form-data" >
  <input type="hidden" name="data[model]" value="<?php echo $model; ?>" >
  <input type="hidden" name="data[did]" value="<?php echo $did; ?>" >
  <input type="hidden" name="data[wid]" value="<?php echo $wid; ?>" >
  <input type="hidden" name="data[rid]" value="<?php echo $rid; ?>" >
  
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px; background:#fff;"><?php echo __("Confirm Delete");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;" >
      <div class="control-group" id="job_title_div">
        <div class="controls"> <?php echo __("Your About to delete the");?> <?php echo $model; ?> <?php echo __("details");?>. <br> <?php echo __("Are you sure want to delete the details?");?> </div>
      </div>
    </div>
    <div class="modal-footer">
    <button type="submit" id="exp_btn" class="btn btn-primary  "><?php echo __("Yes");?></button>
    <button type="submit" class="btn btn-primary"  data-dismiss="modal" aria-hidden="true"><?php echo __("No");?></button>
    </div>
    
    <!--</div>-->
  </form>
</div>
