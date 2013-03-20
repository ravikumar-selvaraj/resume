
 <div id="recommendmy" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="form-inline" name="update" action="<?php echo Router::url('/'); ?>users/addrec" method="post" style="margin-bottom:0px;" enctype="multipart/form-data">
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <input type="hidden" name="data[responsibility]"  value="" />
      <h2 id="myModalLabel" style="font-size:16px; padding:0px; margin:0px;"><?php echo __("Update the keyworks on which you wish to be recommended");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;" >
      <div class="control-group">
        <div class="controls" style="padding-left:15px; padding-top:25px;">
          <table border="0" align="left" cellpadding="0" cellspacing="0" id="myTable" width="100%" class="miletab" >
          <?php $fnds1=ClassRegistry::init('Recommentation')->find('all',array('conditions'=>array('uid'=>$this->Session->read('User.uid'))));
		  
		if(!empty($fnds1)){
			  $new=count($fnds1); 
		  $i=1;
		  foreach($fnds1 as $fnds1) { ?>
           <tr>
              <td align="left" valign="middle" width="1%">
              <input type="text" id="fname<?php echo $i; ?>" name="resp[]" class="team" placeholder="Type a key skill, position, keyword" style="width:425px;padding:10px; margin-bottom:10px;"  value="<?php echo $fnds1['Recommentation']['skills']; ?>"  >
              <input type="hidden" name="rid[]" value="<?php echo $fnds1['Recommentation']['rid']; ?>" />
              <td align="left" valign="top" width="1%">
              <a  style="cursor:pointer;" class="btn btn-mini btn-primary del" rel="<?php echo $i; ?>" id="delmy">
              <?php echo __("Delete");?></a><br /></td>
            </tr>
		<?php 	
		$i++; } 
			$d=5-$new;
		}else{
			$d=5;
		}
		   ?>	
         <?php  for($c=1; $c<=$d; $c++){ ?>
            <tr>
              <td align="left" valign="middle" width="1%">
              <input type="text" id="fname<?php echo $c; ?>" name="resp[]" class="team" placeholder="<?php echo __('Type a key skill, position, keyword'); ?>" style="width:425px;padding:10px; margin-bottom:10px;"  value=""  >
              <td align="left" valign="top" width="1%">
              <a  style="cursor:pointer;" class="btn btn-mini btn-primary del" rel="<?php echo $c; ?>" id="delmy">
              <?php echo __("Delete");?></a><br /></td>
            </tr>
            <?php } ?>
             
            </tbody>
          </table>
          <span class="help-inline" id="whoru_error"></span> </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" name="recommentsubmit" id="exp_btn" class="btn btn-primary "><?php echo __("Save");?></button>
       <button type="reset" id="exp_btn1" class="btn btn-primary "><?php echo __("Cancel");?></button>
    </div>
    
  </form>
   </div>
 <script type="text/javascript">
 $(document).ready(function(){
 $(".del").click(function(){
	 var rel = $(this).attr('rel');
  $('#fname'+rel).val('');
 });
 
 });
 </script>