
 <div id="recommendmy" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="form-inline" name="update" action="<?php echo Router::url('/'); ?>pages/addrec" method="post" style="margin-bottom:0px;" enctype="multipart/form-data">
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <input type="hidden" name="data[responsibility]"  value="" />
      <h2 id="myModalLabel" style="font-size:16px; padding:0px; margin:0px;"><?php echo __("Update the keyworks on which you wish to be recommended");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;" >
      <div class="control-group">
        <div class="controls" style="padding-left:15px; padding-top:25px;">
          <table border="0" align="left" cellpadding="0" cellspacing="0" id="myTable" width="100%" class="miletab" >
            <tr>
              <td align="left" valign="middle" width="1%">
              <input type="text" id="resp" name="resp[]" class="team" placeholder="Type a key skill, position, keyword" style="width:425px;padding:10px; margin-bottom:10px;"  >
              <td align="left" valign="top" width="1%"><a onClick="insRow()" style="cursor:pointer;" class="btn btn-mini btn-primary">
              <?php echo __("Add");?></a><br /></td>
            </tr>
             <tr>
              <td align="left" valign="middle" width="1%">
              <input type="text" id="resp" name="resp[]" class="team" placeholder="Type a key skill, position, keyword" style="width:425px;padding:10px; margin-bottom:10px;"  >
              <td align="left" valign="top" width="1%"><a onClick="insRow()" style="cursor:pointer;" class="btn btn-mini btn-primary">
              <?php echo __("Add");?></a><br /></td>
            </tr>
             <tr>
              <td align="left" valign="middle" width="1%">
              <input type="text" id="resp" name="resp[]" class="team" placeholder="Type a key skill, position, keyword" style="width:425px;padding:10px; margin-bottom:10px;"  >
              <td align="left" valign="top" width="1%"><a onClick="insRow()" style="cursor:pointer;" class="btn btn-mini btn-primary">
              <?php echo __("Add");?></a><br /></td>
            </tr>
             <tr>
              <td align="left" valign="middle" width="1%">
              <input type="text" id="resp" name="resp[]" class="team" placeholder="Type a key skill, position, keyword" style="width:425px;padding:10px; margin-bottom:10px;"  >
              <td align="left" valign="top" width="1%"><a onClick="insRow()" style="cursor:pointer;" class="btn btn-mini btn-primary">
              <?php echo __("Add");?></a><br /></td>
            </tr>
             <tr>
              <td align="left" valign="middle" width="1%">
              <input type="text" id="resp" name="resp[]" class="team" placeholder="Type a key skill, position, keyword" style="width:425px;padding:10px; margin-bottom:10px;"  >
              <td align="left" valign="top" width="1%"><a onClick="insRow()" style="cursor:pointer;" class="btn btn-mini btn-primary">
              <?php echo __("Add");?></a><br /></td>
            </tr>
            </tbody>
          </table>
          <span class="help-inline" id="whoru_error"></span> </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" id="exp_btn" class="btn btn-primary "><?php echo __("Save");?></button>
       <button type="reset" id="exp_btn1" class="btn btn-primary "><?php echo __("Cancel");?></button>
    </div>
    
  </form>
   </div>
 