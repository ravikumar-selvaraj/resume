<div id="contacts" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form class="form-inline" name="update" action="<?php echo Router::url('/'); ?>users/usercontact" method="post" style="margin-bottom:0px;" enctype="multipart/form-data">
    <input type="hidden" name="data[uid]" value="<?php echo $this->Session->read('User.uid'); ?>" />
        <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h2 id="myModalLabel" class="forh2"><?php echo __("Add Contact Method");?></h2>
        </div>
        <div class="modal-body" style="padding-top:0px;" >
        
        <div class="control-group" id="user_phone_div">
        <label class="control-label" for="inputInfo" id="prof" style="width:500px;font-family: arial;font-weight: bold;"><?php echo __("Cell phone");?></label>
        <div class="controls">
        <input type="text" id="user_phone" name="data[phone]" class="team" placeholder="Contact No" style="width:425px;padding:2px;"  >
        <span class="help-inline" id="user_phone_div_error"></span> </div>
        </div>
        
        <div class="control-group" id="user_email_div">
        <label class="control-label" for="inputInfo" id="prof" style="width:500px;font-family: arial;font-weight: bold;"><?php echo __("Email");?></label>
        <div class="controls">
        <input type="text" id="user_email" name="data[contact_email]" class="team" placeholder="Email" style="width:425px;padding:2px;"  >
        <span class="help-inline" id="user_email_div_error"></span> </div>
        </div>
        
        <div class="control-group" id="user_ims_div">
        <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-family: arial;font-weight: bold;"><?php echo __("Skype");?></label>
        <div class="controls">
        <input type="text" id="user_im_skype" name="data[skype]" class="team" placeholder="Skype" style="width:425px;padding:2px;"  >
        <span class="help-inline" id="user_ims_div_error"></span> </div>
        </div>
        <!--<div class="control-group" id="user_im_div">
        <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-family: arial;font-weight: bold;"><?php echo __("MSN");?></label>
        <div class="controls">
        <input type="text" id="user_im" name="data[im]" class="team" placeholder="MSN" style="width:425px;padding:2px;"  >
        <span class="help-inline" id="user_im_div_error"></span> </div>
        </div>-->
        <div class="control-group" id="user_imy_div">
        <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-family: arial;font-weight: bold;"><?php echo __("yahoo Messanger");?></label>
        <div class="controls">
        <input type="text" id="user_imy_yahoo" name="data[yahoo]" class="team" placeholder="Yahoo Messanger" style="width:425px;padding:2px;"  >
        <span class="help-inline" id="user_imy_div_error"></span> </div>
        </div>
        
        
        
        
        
        </div>
        <div class="modal-footer">
        
        <label class="checkbox" style="display:block;">
        <input type="hidden" name="data[newsletter]" value="1">
        <!-- <span style="margin-left:5px; float:left; font-size:12px;"><?php echo __("Display on home page");?></span>--> </label>
        <button type="submit" id="user_contact_btn" class="btn btn-primary "><?php echo __("Submit resume");?></button>
        </div>
    </form>
</div>
   
   <div id="contacts_msg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:350px;">
  <form class="form-inline" name="update" action="" method="post" style="margin-bottom:0px;width:350px;" enctype="multipart/form-data" >
 
  
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px; background:#fff;"><?php echo __("");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;" >
      <div class="control-group" id="job_title_div">
        <div class="controls"> To edit this widget, hover over the element in your resume .</div>
      </div>
    </div>
    <div class="modal-footer">
   
    <button type="submit" class="btn btn-primary"  data-dismiss="modal" aria-hidden="true"><?php echo __("ok");?></button>
    </div>
    
  
  </form>
</div>