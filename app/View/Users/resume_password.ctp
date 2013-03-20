<div class="span3 pull-right ">


<!-- Login -->
<!--  <div id="login" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">-->
	<div class="modal-backdrop fade in"></div>
    <div data-backdrop="static" data-keyboard="false" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="update-resume" style="display:block ;">
    <div class="modal-header">
    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
    <h2 id="myModalLabel"><? echo __("Resume password");?></h2>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" name="resume_password" id="resume_password_form" action="<?php echo BASE_URL.Configure::read('userpage');?>/resume_password" method="post">
        <!--  <form class="form-horizontal" name="resume_password" id="resume_password_form" action="users/resume_password" method="post">-->
        <input type="hidden" value="<?php echo Configure::read('userpage');?>" name="data[user]" />
        <div class="control-group" id="resume_password_div">
        <label class="control-label" for="inputInfo"><?php echo __("Password");?></label>
        <div class="controls">
        <input type="text" id="resume_password" value="" name="data[resume_password]" placeholder="<?php echo __("Password");?>">
        <span class="help-inline" id="resume_password_error"></span>
        </div>
        </div>
        
        <div class="control-group">
        <div class="controls">
        <button type="submit" class="btn btn-primary" id="resume_password_btn"><?php echo __("Submit");?></button>
        <a href="<?php echo BASE_URL;?>" style="cursor:pointer;"><?php echo __("Home");?></a>
        </div>
        </div>
        
        <div class="control-group">
        <div>
        <a href="" type="button" data-toggle="modal" data-target="#passreq" class=""><span><?php echo __("Request password");?></span></a>
    
        </div>
        </div>
        </form>
    </div>
    </div>
</div>

<!--Request Password-->
<div id="passreq" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
<?php  $pass=ClassRegistry::init('User')->find('first',array('conditions'=>array('username'=>Configure::read('userpage')))); 

?>

    <form class="form-inline" name="update" action="<?php echo Router::url('/'); ?>users/passreq" method="post" enctype="multipart/form-data" style="margin-bottom:0px;">
    <input type="hidden" name="data[email_to]" value="<?php echo $pass['User']['email']; ?>" />
     <input type="hidden" name="data[f_name]" value="<?php echo $pass['User']['firstname']; ?>" />
      <input type="hidden" name="data[l_name]" value="<?php echo $pass['User']['lastname']; ?>" />
      <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h2 id="myModalLabel" class="forh2"><?php echo __("Request Password");?></h2>
        </div>
        <div class="modal-body" style="padding-top:0px;" >
        
        <div class="control-group" id="fname_div">
        <label class="control-label" for="inputInfo" id="f_name" style="width:500px;font-family: arial;font-weight: bold;"><?php echo __("First name");?></label>
        <div class="controls">
        <input type="text" id="fname" name="data[fname]" class="team" placeholder="First name" style="width:425px;padding:2px;"  >
        <span class="help-inline" id="fname_div_error"></span> </div>
        </div>
        
        <div class="control-group" id="lname_div">
        <label class="control-label" for="inputInfo" id="prof" style="width:500px;font-family: arial;font-weight: bold;"><?php echo __("Last name");?></label>
        <div class="controls">
        <input type="text" id="lname" name="data[lname]" class="team" placeholder="Last name" style="width:425px;padding:2px;"  >
        <span class="help-inline" id="lname_div_error"></span> </div>
        </div>
        
       <div class="control-group" id="user_email_div">
        <label class="control-label" for="inputInfo" id="prof" style="width:500px;font-family: arial;font-weight: bold;"><?php echo __("Email");?></label>
        <div class="controls">
        <input type="text" id="user_email" name="data[email_from]" class="team" placeholder="Email" style="width:425px;padding:2px;"  >
        <span class="help-inline" id="user_email_div_error"></span> </div>
        </div>
       
        <div class="control-group" id="msg_div">
        <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-family: arial;font-weight: bold;"><?php echo __("Message");?></label>
        <div class="controls">
        <textarea type="text" id="msg" name="data[msg]" class="team" placeholder="Message" rows="5" style="width:425px;padding:2px;"  ></textarea>
        
        <span class="help-inline" id="msg_div_error"></span> </div>
        </div>
    <div class="modal-footer">
    
    <!-- <label class="checkbox" style="display:block;">
    <input type="hidden" value="1" name="data[display]">
    <input type="hidden" value="0" name="data[image]" id="myimg">-->
    <!-- <span style="margin-left:15px; float:left"><?php //echo __("Display on Homepage");?></span> </label>-->
    <button type="submit" id="pass_req_btn" class="btn btn-primary "><?php echo __("Submit");?></button>
    </div>
    
    <!--</div>-->
    </form>
</div>
<script type="text/javascript">

$('#resume_password_btn').click(function(){
	var val = $('#resume_password').val();
	var user = '<?php echo Configure::read('userpage');?>';
	if(val == ''){
		$("#resume_password_div").addClass("error");
		$("#resume_password_error").html("<?php echo __("Password required");?>");
		return false;
	} else {
		$.ajax({
			type: "POST",
			url: "<?php echo BASE_URL;?>users/check_rp",
			data: "resume_password="+val+"&user="+user,
			success: function(msg){ 
					if(msg == 'success'){
							$("#resume_password_div").removeClass("error");
							$("#resume_password_error").html("");
							$("#resume_password_form").submit();
						} else {
							 $("#resume_password_div").addClass("error");
							$("#resume_password_error").html("<?php echo __("Invalid password");?>");
						}
			}
				
		});
		return false;
	}
	});
	
		$("#pass_req_btn").click(function(){
			//alert('hi');
			var validEmail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var fname = $("#fname").val();
			var lname = $("#lname").val();
			var user_email = $("#user_email").val();
			var msg = $("#msg").val();
			if(fname == ''){
				$("#fname_div").addClass("error");
				$("#fname_div_error").html("<?php echo __("First name required");?>");
				return false;
			} else {
				$("#fname_div").removeClass("error");
				$("#fname_div_error").html("");
			}
			if(lname == ''){
				$("#lname_div").addClass("error");
				$("#lname_div_error").html("<?php echo __("Last name required");?>");
				return false;
			} else {
				$("#lname_div").removeClass("error");
				$("#lname_div_error").html("");
			}
			if(user_email ==''){
				$("#user_email_div").addClass("error");
				$("#user_email_div_error").html("<?php echo __("email required");?>");
				return false;
			}else if(!validEmail.test(user_email)){
			$("#user_email_div").addClass("error");
			$("#user_email_div_error").html("<?php echo __("Invalid email");?>");
			return false;
		} else {
				$("#user_email_div").removeClass("error");
				$("#user_email_div_error").html("");
			}
			if(msg ==''){
				$("#msg_div").addClass("error");
				$("#msg_div_error").html("<?php echo __("Message required");?>");
				return false;
			} else {
				$("#msg_div").removeClass("error");
				$("#msg_div_error").html("");
			}
		});
</script>