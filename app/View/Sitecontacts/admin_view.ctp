<div class="content">
  <div class="header">
    <h1 class="page-title">View Contact pages</h1>
  </div>
<!--  <ul class="breadcrumb">
    <li><a href="<?php echo BASE_URL;?>admin/sitecontacts">Home</a> <span class="divider">/</span></li>
    <li><a href="<?php echo BASE_URL;?>admin/sitecontacts">Contact pages</a> <span class="divider"></span></li>
  </ul>-->
   <ul class="breadcrumb">
					<li><a href="#">Home</a> <span class="divider">/</span></li>
					<li><a href="<?php echo BASE_URL;?>admin/sitecontacts">Contact page</a> <span class="divider">/</span></li>
					<li class="active">View Contact page</li>
				</ul>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="well">
        <div class="tab-pane active in" id="home">
          <div class="widget-box">
            <div class="widget-title"> </div>
            <div class="widget-content nopadding">
              <form id="form-wizard" class="form-horizontal ui-formwizard" method="post" novalidate="novalidate" _lpchecked="1">
                <h2>
                  <?php  echo __('Contact us Management'); ?>
                </h2>
                <div class="control-group">
                  <label class="control-label"><?php echo __('Name'); ?> :</label>
                  <div class="controls"> <?php echo h($sitecontact['Sitecontact']['name']); ?></div>
                </div>
                <div class="control-group">
                  <label class="control-label"><?php echo __('Email'); ?> :</label>
                  <div class="controls"> <?php echo h($sitecontact['Sitecontact']['email']); ?></div>
                </div>
                <div class="control-group">
                  <label class="control-label"><?php echo __('Phone number'); ?>:</label>
                  <div class="controls"> <?php echo h($sitecontact['Sitecontact']['phone']); ?></div>
                </div>
                 <div class="control-group">
                  <label class="control-label"><?php echo __('Subject'); ?>:</label>
                  <div class="controls"> <?php echo h($sitecontact['Sitecontact']['subject']); ?></div>
                </div>
                <div class="control-group">
                  <label class="control-label"><?php echo __('Message'); ?>:</label>
                  <div class="controls"> <?php echo h(strip_tags($sitecontact['Sitecontact']['message'])); ?></div>
                </div>
                
                <div class="control-group">
                  <label class="control-label"><?php echo __('Post date'); ?>:</label>
                  <div class="controls"> <?php echo h($sitecontact['Sitecontact']['date']); ?></div>
                </div>
                 <div class="control-group">
                  <label class="control-label"><?php echo __('Reply Message'); ?>:</label>
                  <?php if(!empty($sitecontact['Sitecontact']['replymessage'])) { ?>
                  <div class="controls"> <?php if(!empty($sitecontact['Sitecontact']['replymessage'])) echo h($sitecontact['Sitecontact']['replymessage']);  ?></div>
                  <?php } else { ?>
                  <form class="form-horizontal" name="reply" action="" id="reply" method="post">
                                <input type="hidden" name="cid" value="<?php echo $sitecontact['Sitecontact']['cid']; ?>">
                                <input type="hidden" name="reply" value="1">
                                 <input type="hidden" name="rlysubject " value="<?php echo $sitecontact['Sitecontact']['subject']; ?>">
                                    
                                 <div class="controls">
                                           <textarea name="data[replymessage]" id="replymessage" cols="10" class="validate[required] input"></textarea>
											<span class="help-inline" id="sign_up_pwd_error"></span>
                                        </div>   
                                 <div class="controls">
                                            <button type="submit" id="replymail" class="btn btn-primary" name="">Reply</button>
                                        </div>   
                                </form>
                  
                
                   
                  <?php }?>
                </div>
                <?php if(!empty($sitecontact['Sitecontact']['reply_date'])){ ?>
                <div class="control-group">
                  <label class="control-label"><?php echo __('Reply date'); ?>:</label>
                  <div class="controls"> <?php echo h($sitecontact['Sitecontact']['reply_date']); ?></div>
                </div>
                <?php }?>
                <!--<div class="control-group">
                  <label class="control-label"><a href="" type="button" data-toggle="modal" data-target="#basic" class=""> <?php if(!empty($sitecontact['Sitecontact']['reply'])) echo __('Reply again'); else echo __('Reply'); ?></a> </label>
                </div>-->
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 id="myModalLabel">Delete Confirmation</h3>
        </div>
        <div class="modal-body">
          <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
          <button class="btn btn-danger" data-dismiss="modal">Delete</button>
        </div>
      </div>
      <footer>
        <hr>
        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
        <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
        <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
      </footer>
    </div>
  </div>
</div>


<div id="basic"  class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:440px;">
<div class="modal-body">
                                <form class="form-horizontal" name="reply" action="" id="reply" method="post">
                                <input type="hidden" name="cid" value="<?php echo $sitecontact['Sitecontact']['cid']; ?>">
                                <input type="hidden" name="reply" value="1">
                                    <div class="control-group" id="contact_name" style="margin-bottom:0;">
                                        <label class="control-label" for="inputInfo">Reply subject</label>
                                        <div class="controls">
                                            <input type="text" id="rlysub" name="data[rlysubject]" placeholder="subject" class="validate[required] input">
                                                <span id="contact_name_error" style="color:#B94A48"></span>
                                        </div>
                                    </div>
                                    <div class="control-group" id="sign_up_pwd">
                                        <label class="control-label" for="inputPassword">Reply message</label>
                                        <div class="controls">
                                           <textarea name="data[replymessage]" id="replymessage" cols="10" class="validate[required] input"></textarea>
											<span class="help-inline" id="sign_up_pwd_error"></span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" id="replymail" class="btn btn-primary ">Reply</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#contact').click(function(){
	var name = $("#name").val();
	if(name == ''){
			$("#contact_phone_error").html("");
			$("#contact_phone").removeClass("error");
			$("#contact_name").addClass("error");
			$("#contact_name_error").html("<?php echo __("Name required");?>");
			return false;
		} 

	});
})
</script>