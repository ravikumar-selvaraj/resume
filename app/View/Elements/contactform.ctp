
 <div id="contact_form" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="form-inline" name="update" action="<?php echo Router::url('/'); ?>users/contactform" method="post" style="margin-bottom:0px;" enctype="multipart/form-data">
<input type="hidden" name="data[uid]" value="<?php if(isset($_SESSION['User']['uid'])) echo $_SESSION['User']['uid']; ?>" />
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px;"><?php echo __("Contact User");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;" >
    
      
      
      <div class="control-group" id="mail_from_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:500px;font-family: arial;font-weight: bold;"><?php echo __("From");?></label>
        <div class="controls">
        <?php if(isset($_SESSION['User']['uid'])) {
			$myuser=ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$_SESSION['User']['uid']))); ?>
           <input type="text" id="mail_from" name="data[from]" class="team" placeholder="Email" style="width:425px;padding:2px;"  value="<?php echo $myuser['User']['email'];?>" readonly / >
           <?php } else { ?>
           <input type="text" id="mail_from" name="data[from]" class="team" placeholder="Email" style="width:425px;padding:2px;"  >
           <?php } ?>
          <span class="help-inline" id="mail_from_div_error"></span> </div>
      </div>
     
  	 <div class="control-group" id="mail_to_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-family: arial;font-weight: bold;"><?php echo __("To");?></label>
        <div class="controls">
           <input type="text" id="mail_to" name="data[to]" class="team" placeholder="Email" style="width:425px;padding:2px;"  >
          <span class="help-inline" id="mail_to_div_error"></span> </div>
      </div>
      <div class="control-group" id="mail_sub_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-family: arial;font-weight: bold;"><?php echo __("Subject");?></label>
        <div class="controls">
           <input type="text" id="mail_sub" name="data[sub]" class="team" placeholder="Subject" style="width:425px;padding:2px;"  >
          <span class="help-inline" id="mail_sub_div_error"></span> </div>
      </div>
       <div class="control-group" id="mail_im_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-family: arial;font-weight: bold;"><?php echo __("Message");?></label>
        <div class="controls">
           <textarea rows="8" cols="5" name="data[msg]" id="mail_msg" style="width:425px;"></textarea>
          <span class="help-inline" id="mail_im_div_error"></span> </div>
      </div>
      
      
       
      
      
      
    </div>
    <div class="modal-footer">
     
      <!--<label class="checkbox" style="display:block;">
        <input type="checkbox" name="data[newsletter]">
        <span style="margin-left:15px; float:left"><?php echo __("Display on Home page");?></span> </label>-->
      <button type="submit" id="mail_contact_btn" class="btn btn-primary "><?php echo __("Send");?></button>
    </div>
    
    <!--</div>-->
  </form>
   </div>
   
   