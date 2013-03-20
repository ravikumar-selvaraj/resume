       
       
        <div class="row app-header">
        <div class="container ">
        <h1> <?php echo $this->html->link(__("Dashboard"),array('action'=>'dashboard'));?> / <?php echo __("Settings");?></h1>
        </div>
        </div>
        
        <div class="container">
        <div class="row dashboard">
        <div class="well">
        <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab"><?php echo __("Profile");?></a></li>
        <li><a href="#profile" data-toggle="tab"><?php echo __("Change Password");?></a></li>
      <!--  <li><a href="#email-alerts" data-toggle="tab"><?php echo __("Email Alerts");?></a></li>-->
        </ul>
        <div id="myTabContent" class="tab-content">
            
        <div class="tab-pane active in" id="home">
        <form id="tab users" class="" name="login" action="<?php echo BASE_URL;?>pages/setting" method="post">
		<input type="hidden" value="0" name="test_set_email" id="test_set_email" />
		<input type="hidden" value="<?php echo $user['User']['user_key'];?>" name="uid" id="set_uid" />
		
      	<div class="control-group" id="set_email_div">
        <label><?php echo __("Email");?></label>
		<div class="controls">
        <input type="text" value="<?php echo $user['User']['email'];?>" class="input-xlarge" id="set_email" name="data[email]">
		<span class="help-inline" id="set_email_error"></span>
		</div>
		</div>
		
        <div class="control-group" id="set_fname_div">
        <label><?php echo __("First Name");?></label>
		<div class="controls">
        <input type="text" value="<?php echo $user['User']['firstname'];?>" class="input-xlarge" id="set_fname" name="data[firstname]">
        <span class="help-inline" id="set_fname_error"></span>
		</div>
		</div>
		
		<div class="control-group" id="set_lname_div">
        <label><?php echo __("Last Name");?></label>
		<div class="controls">
        <input type="text" value="<?php echo $user['User']['lastname'];?>" class="input-xlarge" id="set_lname" name="data[lastname]">
        <span class="help-inline" id="set_lname_error"></span>
		</div>
		</div>
		
		<div class="control-group" id="set_gender_div">
        <label><?php echo __("Gender");?></label>
        <div class="controls">
         <select name="data[gender]" class="input-xlarge" id="set_gender">
            <option value="Mr." <?php if($user['User']['gender']=='Mr.')echo 'selected="selected"'; ?>><?php echo __("Mr.");?></option>   
            <option value="Mrs." <?php if($user['User']['gender']=='Mrs.')echo 'selected="selected"'; ?>><?php echo __("Mrs.");?></option>
            <option value="Ms." <?php if($user['User']['gender']=='Ms.')echo 'selected="selected"'; ?>><?php echo __("Ms.");?></option>
        </select>
		<span class="help-inline" id="set_gender_error"></span>
		</div>
		</div>
		
        <div>
        <button class="btn btn-primary" id="set_user_btn" name="update" type="submit"><?php echo __("Update");?></button>
        </div>
        </form>
        <div class="alert alert-error">
        <h4><?php echo __("Delete my account");?></h4>
        <p><?php echo __("If you delete your account, all your information will be erased and your resume will no longer be accessible!");?> 
        <?php echo $this->Html->link(__("Delete my account"),'#',array('class'=>'question_link', 'onClick'=>'trash11(\'User\',\'uid\',\''.$user['User']['uid'].'\',\'logout\');return false;')); ?>
</p>
        </div>
        </div>
        <div class="tab-pane fade" id="profile">
  
       <form id="tab2" class="" name="login" action="<?php echo BASE_URL;?>pages/setting" method="post">
	   <input type="hidden" value="0" name="chk_pwd" id="chk_pwd" />
	   <input type="hidden" value="<?php echo $user['User']['user_key'];?>" name="user_key" id="set_user_key" />
	   	<div class="control-group" id="set_cur_pwd_div">
        <label><?php echo __("Current Password");?></label>
		<div class="controls">
        <input type="password" name="data[old]" id="set_cur_pwd" value="<?php echo $this->request->data('old');?>" class="input-xlarge">
		<span class="help-inline" id="set_cur_pwd_error"></span>
		</div>
		</div>
		
		<div class="control-group" id="set_new_pwd_div">
        <label><?php echo __("New Password");?></label>
		<div class="controls">
      	<input type="password" name="data[password]" id="set_new_pwd" value="<?php echo $this->request->data('password');?>" class="input-xlarge">
        <span class="help-inline" id="set_new_pwd_error"></span>
		</div>
		</div>
		
		<div class="control-group" id="set_con_pwd_div">
        <label><?php echo __("Confirm New Password");?></label>
		<div class="controls">
     	 <input type="password" name="data[cpassword]" id="set_con_pwd" value="<?php echo $this->request->data('cpassword');?>" class="input-xlarge" />
	  	<span class="help-inline" id="set_con_pwd_error"></span>
		</div>
		</div>
		
		
        <div>
        <button class="btn btn-primary" name="password" id="set_pwd_button" type="submit"><?php echo __("Update");?></button>
        </div>
        </form>
        </div>
        <div class="tab-pane fade" id="email-alerts">
        <form id="tab2">
        <label class="checkbox">
        <input type="checkbox" value="">
        <?php echo __("I'd like to receive updates from Cvomg by email");?>
        </label>
        <span class="muted"> <?php echo __("(We promise not to share your email address. 1 email per week max.)");?></span>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
        
        
<script>
function trash11(table,field,value,page){
	
	var result = confirm('<?php echo __("Are you sure you want to cancel your account?");?>');  
	if(result){
		$.ajax({
		type: "POST",
		url: "<?php echo BASE_URL?>pages/deleteaccount",
		data: "table="+table+"&field="+field+"&value="+value+"&page="+page,
		success: function(msg){ 
		
		if(msg=='yes')
		{
		//alert(msg);
			window.location='<?php echo BASE_URL?>pages/logout';
		}
		
		}
		});
	}
}
</script>    

   