<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>CVomg _ Beautifully Simple Online Resume Builder _ Maker _ Generator</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		<link rel="icon" href="<?php echo BASE_URL; ?>app/webroot/favicon.ico" type="image/x-icon" />

      <?php	
		echo $this->html->css(array('user/normalize.min','user/bootstrap','user/datepicker','user/bootstrapSwitch','user/compassCV','user/compassCVEdit')); 
		echo $this->html->script(array('jquery','user/vendor/modernizr-2.6.2-respond-1.1.0.min','user/uploadimg'));
		 
?>
<style>
    .body-bg1
		{
			position:relative;
			top:4px;
			background: url(img/red/bg.png) repeat-x ;
			height: 200px;
			z-index:
		}
		.imgalert
		{
			font-size:11px;
			padding-left:50px;
		}
		.imgalert1 {
			bottom: 50px;
			float: left;
			font-size: 11px;
			padding-left: 170px;
			position: relative;
		}
    
    </style>

	<?php 
	
	$template=ClassRegistry::init('User')->find(array('username'=>Configure::read('userpage'))); 
	
	
	switch ($template['User']['template']) {
		case 'red':
			echo $this->html->css(array('user/red')); 
			break;
		case 'blue':
			echo $this->html->css(array('user/blue')); 
			break;
		case 'black':
			echo $this->html->css(array('user/black')); 
			break;
		default:
       		echo $this->html->css(array('user/resume')); 
	}
	
	
	?>
    
    
    </head>
   <!--<body class="imgalert1">-->
    <body>
    
     <div class="helpfade"></div>
    <div class="helptips" style="display:none"><div class="loader_block"><div class="loader_block_inner"></div><div class="loader_text">Please wait...</div></div></div>
<?php if($this->Session->read('User.uid')) {
 $recload=ClassRegistry::init('Recomment')->find('first',array('conditions'=>array('skill_user'=>$this->Session->read('User.uid'),'status'=>"Waiting")));
 if(!empty($recload)) { ?>  
      <script type="text/javascript">
    $(window).load(function(){
        $('#myModal').modal('show');
    });
</script>
	<?php } } ?>
 	
<?php echo $this->fetch('content'); ?>
    
<div id="#ver_content23"><div></div></div>

 <?php	echo $this->html->script(array('page/vendor/jquery-1.8.1.min','user/bootstrap','user/plugins','user/main','user/bootstrap-datepicker','bootbox','user/bootstrapSwitch'));?>
<?php echo $this->html->script(array('jquery.filestyle','ajaxfileupload'));?> 
<!--[if IE 9]>
 <?php  echo $this->html->script(array('ajaxfileupload1'));?> 
<![endif]--> 
<script>


<?php
$msg = $this->Session->flash();
if(!empty($msg)){?>
	
	<?php 
	if(isset($_REQUEST['successrec'])) { ?>
	$(document).ready(function(){
		    $('#addcon').css('display','block');
			$("#add-content").css('display','none');
			$("#design").css('display','none');
			$("#settings").css('display','none');
			$("#share").css('display','none');
			$("#recommend").css('display','block');
			$("#menu_recom").addClass('active');
			$('.helpfade').hide();
			$('.helptips').hide();
			
bootbox.alert('<?php echo $msg;?>');	
});	
	<?php
	} else {
	?>

$(document).ready(function(){
	
			/*$('#addcon').css('display','block');
			$("#menu_share_out").css('display','block');
			$("#menu_share").css('display','none');
			$("#menu_design_out").css('display','none');
			$("#menu_design").css('display','block');
			$("#addin").css('display','block');
			$("#addout").css('display','none');
			$("#menu_recom").css('display','block');
		    $("#menu_recom_out").css('display','none');
			$("#menu_setting").css('display','block');
			$("#menu_setting_out").css('display','none');
			$("#addin").addClass('active');*/
			
//bootbox.alert('<?php echo $msg;?>');	
           
});	
<?php } } ?>
</script>


     <script type="text/javascript">
$(document).ready(function(){
	

	// edit--hover
	
	$("#info").mouseover(function(){
		$("#edit_in").show();
	});
	$("#info").mouseout(function(){
		$("#edit_in").hide();
	});
	
	
	$("#edit_cont1").mouseover(function(){
		$("#edit_cont_in").show();
	});
	$("#edit_cont1").mouseout(function(){
		$("#edit_cont_in").hide();
	});
	
	$("#about").mouseover(function(){
		$("#about_in").show();
	});
	$("#about").mouseout(function(){
		$("#about_in").hide();
	});
	$("#pro").mouseover(function(){
		$("#pro_in").show();
	});
	$("#pro").mouseout(function(){
		$("#pro_in").hide();
	});
	
	$("#link").mouseover(function(){
		$("#link_in").show();
	});
	$("#link").mouseout(function(){
		$("#link_in").hide();
	});
		
		
		
		$("#addin").click(function(){
			
			$("#addin").css('display','none');
			$("#addout").css('display','block');
			$('#addcon').css('display','block');
			
			$("#menu_design_out").css('display','none');
			$("#menu_design").css('display','block');
			$("#menu_share").css('display','block');
		    $("#menu_share_out").css('display','none');
			$("#menu_recom").css('display','block');
		    $("#menu_recom_out").css('display','none');
			$("#menu_setting").css('display','block');
			$("#menu_setting_out").css('display','none');
			$("#addout").addClass('active');
		});
		
		$("#addout").click(function(){
			
			$("#addout").css('display','none');
			$("#addin").css('display','block');
			$('#addcon').css('display','none');
			$("#addin").removeClass('active');
		});
		/*$(".open_menu").live('click',function(){
			$('#addcon').css('display','block');
			//$(".open_menu").removeClass('open_menu').addClass('close_menu');
			
		});
	    $(".close_menu").live('click',function(){
			$('#addcon').css('display','none');
			$(".close_menu").removeClass('active');
			$(".close_menu").removeClass('close_menu').addClass('open_menu');
		});*/
		
		$("#menu_design").click(function(){
		$('#addcon').css('display','block');
		$("#menu_design_out").css('display','block');
		$("#menu_design").css('display','none');
		
		$("#addin").css('display','block');
		$("#addout").css('display','none');
		$("#menu_share").css('display','block');
		$("#menu_share_out").css('display','none');
		$("#menu_recom").css('display','block');
		$("#menu_recom_out").css('display','none');
		$("#menu_setting").css('display','block');
		$("#menu_setting_out").css('display','none');
		
		$("#menu_design_out").addClass('active');
		$("#addout").removeClass('active');
		});
		
		$("#menu_design_out").click(function(){
		$('#addcon').css('display','none');
		$("#menu_design_out").css('display','none');
		$("#menu_design").css('display','block');
		
		$("#menu_design").removeClass('active');
		});
		
		
		$("#menu_share").click(function(){
			
			$('#addcon').css('display','block');
			$("#menu_share_out").css('display','block');
			$("#menu_share").css('display','none');
			
			$("#menu_design_out").css('display','none');
			$("#menu_design").css('display','block');
			$("#addin").css('display','block');
			$("#addout").css('display','none');
			$("#menu_recom").css('display','block');
		    $("#menu_recom_out").css('display','none');
			$("#menu_setting").css('display','block');
			$("#menu_setting_out").css('display','none');
			
			$("#menu_share_out").addClass('active');
		});
		
		
		$("#menu_share_out").click(function(){
		$('#addcon').css('display','none');
		$("#menu_share_out").css('display','none');
		$("#menu_share").css('display','block');
		
		$("#menu_share").removeClass('active');
		});
		
		
		$("#menu_recom").click(function(){
			
			$('#addcon').css('display','block');
			$("#menu_recom").css('display','none');
		    $("#menu_recom_out").css('display','block');
			
			$("#menu_share_out").css('display','none');
			$("#menu_share").css('display','block');
			$("#menu_design_out").css('display','none');
			$("#menu_design").css('display','block');
			$("#addin").css('display','block');
			$("#addout").css('display','none');
			$("#menu_setting").css('display','block');
			$("#menu_setting_out").css('display','none');
			
			$("#menu_recom_out").addClass('active');
		});
		
		$("#menu_recom_out").click(function(){
		$('#addcon').css('display','none');
		$("#menu_recom_out").css('display','none');
		$("#menu_recom").css('display','block');
		
		$("#menu_recom").removeClass('active');
		});
		
		
		$("#menu_setting").click(function(){
			
			
			$('#addcon').css('display','block');
			$("#menu_setting").css('display','none');
		    $("#menu_setting_out").css('display','block');
			$("#menu_share_out").css('display','none');
			$("#menu_share").css('display','block');
			$("#menu_design_out").css('display','none');
			$("#menu_design").css('display','block');
			$("#addin").css('display','block');
			$("#addout").css('display','none');
			$("#menu_recom").css('display','block');
		    $("#menu_recom_out").css('display','none');
			$("#menu_setting_out").addClass('active');
		});
		$("#menu_setting_out").click(function(){
		$('#addcon').css('display','none');
		$("#menu_setting_out").css('display','none');
		$("#menu_setting").css('display','block');
		
		$("#menu_setting").removeClass('active');
		});
		
		/*$("#addin").click(function(){
			$("#addin").addClass('active');
			$(this).removeAttr("id");
			$(this).attr("id","addout");
			$('.tab-content').css('display','block');
		});
		
		$("#addout").click(function(){
			$("#addout").removeClass('active');
			$(this).removeAttr("id");
			$(this).attr("id","addin");
			$('.tab-content').css('display','none');
		});*/
		
		

 });
</script> 

     <script>
        //Photo and country 
		$("#edit_in").click(function(){
		$('#edit_info').css('display','block');
		$('#info').css('display','none');
		});
		$("#edit_out").click(function(){
		$('#edit_info').css('display','none');
		$('#info').css('display','block');
		});
		
		//Contact
		$("#edit_cont_out").click(function(){
		$('#edit_cont1').css('display','block');
		$('#edit_cont').css('display','none');
		});
		$("#edit_cont_in").click(function(){
		$('#edit_cont').css('display','block');
		$('#edit_cont1').css('display','none');
		});
		
		//About me
		$("#about_out").click(function(){
		$('#about1').css('display','none');
		$('#about').css('display','block');
		});
		$("#about_in").click(function(){
		$('#about').css('display','none');
		$('#about1').css('display','block');
		});
		
		//Proffessional
		$("#pro_out").click(function(){
		$('#pro1').css('display','none');
		$('#pro').css('display','block');
		});
		$("#pro_in").click(function(){
		$('#pro').css('display','none');
		$('#pro1').css('display','block');
		$('#set_oro').focus();
		});
		
		//My links
		$("#link_out").click(function(){
		$('#link1').css('display','none');
		$('#link').css('display','block');
		});
		$("#link_in").click(function(){
		$('#link').css('display','none');
		$('#link1').css('display','block');
		});
		
		//Edit Proffessional
		$("#proffessional_out").click(function(){
		$('#Professional_edit1').css('display','none');
		$('#Professional_edit').css('display','block');
		});
		$("#proffessional_in").click(function(){
		$('#Professional_edit').css('display','none');
		$('#Professional_edit1').css('display','block');
		});
		
		
</script>

<script>
$('.exptab').click(function(){
		//var news = $(this).parents('table').attr('class');
		$('.miletab').append('<tr class="myne"><td><input type="text"  class="team validate[required] text" name="resp[]"  placeholder="Responsibilities" style="width:425px;padding:2px; margin-bottom:10px;" ></td><td><span class="exptd btn btn-mini btn-primary" id="delmy">Delete</span></td></tr>');
	});
	
	$('span.exptd').live('click',function(){
	$(this).parents('tr.myne').remove();
});
</script>


	<!--for Exp-->
    
<script type="text/javascript">
$("#start_date").datepicker();
$("#end_date").datepicker();
		$("#exp_btn").click(function(){
			var job_title = $("#job_title_new").val();
			var company_val = $("#company_val").val();
			var city = $("#city").val();
			//var state = $("#state").val();
			var country = $("#country").val();
			var start_date = $("#start_date").val();
			var end_date = $("#end_date").val();
			
			if(job_title == ''){
				$("#job_title_new_div").addClass("error");
				$("#job_title_new_div_error").html("<?php echo __("Job Title required");?>");
				return false;
			} else {
				$("#job_title_new_div").removeClass("error");
				$("#job_title_new_div_error").html("");
			}
			if(company_val == ''){
				$("#company_val_div").addClass("error");
				$("#company_val_div_error").html("<?php echo __("Company Details required");?>");
				return false;
			} else {
				$("#company_val_div").removeClass("error");
				$("#company_val_div_error").html("");
			}
			if(city == '' || country == ''){
				$("#city_div").addClass("error");
				$("#city_div_error").html("<?php echo __("City/Country required");?>");
				return false;
			} else {
				$("#city_div").removeClass("error");
				$("#city_div_error").html("");
			}
			if(start_date == '' || end_date == '' ){
				$("#date_div").addClass("error");
				$("#date_div_error").html("<?php echo __("Date Field required");?>");
				return false;
			} else {
				$("#date_div").removeClass("error");
				$("#date_div_error").html("");
			}
			
		});
			
</script>

	<!--for skills-->					
<script type="text/javascript">
		$(".skill_btn").click(function(){
			var skill_area = $(".skill_area").val();
			var skill = $(".skill_val").val();
			
			if(skill_area == ''){
				$(".skill_area_div").addClass("error");
				$(".skill_area_error").html("<?php echo __("Skill area required");?>");
				return false;
			} else {
				$("skill_area_div").removeClass("error");
				$(".skill_area_error").html("");
			}
			if(skill ==''){
				$(".skill_val_div").addClass("error");
				$(".skill_val_error").html("<?php echo __("Atleast one skill required");?>");
				return false;
			} else {
				$(".skill_val_div").removeClass("error");
				$(".skill_val_error").html("");
			}
		});
			$(".skill_add_btn").click(function(){			
							$("#for_count div:last").parent().before('<div class="control-group"><label class="control-label" for="inputInfo"><?php echo __("Skill");?></label><div class="controls"><input type="text" id="signup_email" name="data[skill][]"><span class="help-inline" id="skills_error"></span></div></div>');
							return false;
					});
</script>

<!--edit_skill-->

<script type="text/javascript">
		$(".edit_skill_btn").click(function(){
			var skill_area = $(".edit_skill_area").val();
			var editskill = $(".edit_skill_val1").val();
			
			if(skill_area == ''){
				$(".edit_skill_area_div").addClass("error");
				$(".edit_skill_area_error").html("<?php echo __("Skill area required");?>");
				return false;
			} else {
				$(".edit_skill_area_div").removeClass("error");
				$(".edit_skill_area_error").html("");
			}
			if(editskill == ''){
				$(".edit_skill_val_div1").addClass("error");
				$(".edit_skill_val_error1").html("<?php echo __("Atleast one skill required");?>");
				return false;
			} else {
				$(".edit_skill_val_div1").removeClass("error");
				$(".edit_skill_val_error1").html("");
			}
		});
			
</script>


<!--for- education-->

<script type="text/javascript">
$("#edu_start_date").datepicker();
$("#edu_end_date").datepicker();

	$("#education_btn").click(function(){
		var course = $("#course").val();
		var organization = $("#organization").val();
		if(course == ''){
			$("#degree_program_div").addClass("error");
			$("#degree_program_error").html("<?php echo __("Degree program required");?>");
			return false;
		} else {
			$("#degree_program_div").removeClass("error");
			$("#degree_program_error").html("");
		}
		if(organization == ''){
			$("#school_div").addClass("error");
			$("#school_error").html("<?php echo __("School required");?>");
			return false;
		} else {
			$("#school_div").removeClass("error");
			$("#school_error").html("");
		}
	});
	
	$("#extra_add_btn").click(function(){			
							$("#for_education div:last").parent().before('<div class="control-group" id="detais_div"><label class="control-label" for="inputInfo"><?php echo __("Details");?></label><div class="controls"><input type="text" id="extra_curricular" name="data[extra_curricular][]"><span class="help-inline" id="details_error"></span></div></div>');
							return false;
					});
</script>

<!--For Edit Education-->

<script type="text/javascript">
$("#edit_edu_start_date").datepicker();
$("#edit_edu_end_date").datepicker();

	$("#edit_education_btn").click(function(){
		var course = $("#edit_course").val();
		var organization = $("#edit_organization").val();
		if(course == ''){
			$("#edit_degree_program_div").addClass("error");
			$("#edit_degree_program_error").html("<?php echo __("Degree program required");?>");
			return false;
		} else {
			$("#edit_degree_program_div").removeClass("error");
			$("#edit_degree_program_error").html("");
		}
		if(organization == ''){
			$("#edit_school_div").addClass("error");
			$("#edit_school_error").html("<?php echo __("School required");?>");
			return false;
		} else {
			$("#edit_school_div").removeClass("error");
			$("#edit_school_error").html("");
		}
	});
	
	$("#edit_extra_add_btn").click(function(){			
							$("#edit_for_education div:last").parent().before('<div class="control-group" id="edit_detais_div"><label class="control-label" for="inputInfo"><?php echo __("Details");?></label><div class="controls"><input type="text" id="edit_extra_curricular" name="data[extra_curricular][]"><span class="help-inline" id="edit_details_error"></span></div></div>');
							return false;
					});
</script>


<!--for interests-->					
<script type="text/javascript">
		$("#interest_btn").click(function(){
			var interest_type = $("#interest_type").val();
			var interest = $("#interest").val();
			if(interest_type == ''){
				$("#int_type_div").addClass("error");
				$("#int_type_error").html("<?php echo __("Type of interest required");?>");
				return false;
			} else {
				$("#int_type_div").removeClass("error");
				$("#int_type_error").html("");
			}
			if(interest ==''){
				$("#interest_div").addClass("error");
				$("#interest_error").html("<?php echo __("Atleast one interest required");?>");
				return false;
			} else {
				$("#interest_div").removeClass("error");
				$("#interest_error").html("");
			}
		});
			$("#interest_add_btn").click(function(){			
							$("#for_interest div:last").parent().before('<div class="control-group"><label class="control-label" for="inputInfo"><?php echo __("Interest");?></label><div class="controls"><input type="text" id="interest" name="data[interest][]"><span class="help-inline" id="interest_error"></span></div></div>');
							return false;
					});
</script>

<script type="text/javascript">
		$("#edit_interest_btn").click(function(){
			var edit_interest_type = $("#edit_interest_type").val();
			var interest = $("#edit_interest1").val();
			if(edit_interest_type == ''){
				$("#edit_int_type_div").addClass("error");
				$("#edit_int_type_error").html("<?php echo __("Type of interest required");?>");
				return false;
			} else {
				$("#edit_int_type_div").removeClass("error");
				$("#edit_int_type_error").html("");
			}
			if(interest == ''){
				$("#edit_interest_div1").addClass("error");
				$("#edit_interest_error1").html("<?php echo __("Atleast one interest required");?>");
				return false;
			} else {
				$("#edit_interest_div1").removeClass("error");
				$("#edit_interest_error1").html("");
			}
		});
			
</script>


<!--for photo & basic info-->
<script type="text/javascript">
		$("#user_basic_btn").click(function(){
			var users_image = $("#users_image").val();
			var user_city = $("#user_city").val();
			var user_country = $("#user_country").val();
			var user_zip = $("#user_zip").val();
			
			if(users_image == ''){
				$("#users_image_div").addClass("error");
				$("#users_image_div_error").html("<?php echo __("Job image required");?>");
				return false;
			} else if(!users_image.match(/(?:gif|jpg|png|bmp)$/)) {
				$("#users_image_div").addClass("error");
				$("#users_image_div_error").html("<?php echo __("Please select valid image (Format : gif | jpg | png | bmp )");?>");
				return false;
			} else {
				$("#users_image_div").removeClass("error");
				$("#users_image_div_error").html("");
			}
			
			if(user_city == '' || user_zip == '' || user_country == ''){
				$("#user_city_div").addClass("error");
				$("#user_city_div_error").html("<?php echo __("City/State/Country required");?>");
				return false;
			} else {
				$("#user_city_div").removeClass("error");
				$("#user_city_div_error").html("");
			}
		});
			
</script>
<!--for Contact-->	

<script type="text/javascript">
		$("#user_contact_btn").click(function(){
			var validEmail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var user_phone = $("#user_phone").val();
			var user_email = $("#user_email").val();
			var user_im = $("#user_im").val();
			if(user_phone == ''){
				$("#user_phone_div").addClass("error");
				$("#user_phone_div_error").html("<?php echo __("Contact Number required");?>");
				return false;
			} else if(!user_phone.match(/^([\+][0-9]{1,3}[ \.\-])?([\(]{1}[0-9]{2,6}[\)])?([0-9 \.\-\/]{3,20})((x|ext|extension)[ ]?[0-9]{1,4})?$/)) {
				$("#user_phone_div").addClass("error");
				$("#user_phone_div_error").html("<?php echo __("Please select valid number");?>");
				return false;
			} else {
				$("#user_phone_div").removeClass("error");
				$("#user_phone_div_error").html("");
			}
			if(user_email ==''){
				$("#user_email_div").addClass("error");
				$("#user_email_div_error").html("<?php echo __("Contact Address required");?>");
				return false;
			}else if(!validEmail.test(user_email)){
			$("#user_email_div").addClass("error");
			$("#user_email_div_error").html("<?php echo __("Invalid email");?>");
			return false;
		} else {
				$("#user_email_div").removeClass("error");
				$("#user_email_div_error").html("");
			}
			/*if(user_im ==''){
				$("#user_im_div").addClass("error");
				$("#user_im_div_error").html("<?php echo __("Instant messanger required");?>");
				return false;
			} else {
				$("#user_im_div").removeClass("error");
				$("#user_im_div_error").html("");
			}*/
		});
		
		$("#mail_contact_btn").click(function(){
			var validEmail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var mail_from = $("#mail_from").val();
			var mail_to = $("#mail_to").val();
			var mail_sub = $("#mail_sub").val();
			var mail_msg = $("#mail_msg").val();
			
			if(mail_from ==''){
				$("#mail_from_div").addClass("error");
				$("#mail_from_div_error").html("<?php echo __("From mail required");?>");
				return false;
			} 
			else if(!validEmail.test(mail_from)){
			$("#mail_from_div").addClass("error");
			$("#mail_from_div_error").html("<?php echo __("Invalid email");?>");
			return false;
		}else {
				$("#mail_from_div").removeClass("error");
				$("#mail_from_div_error").html("");
			}
				if(mail_to ==''){
				$("#mail_to_div").addClass("error");
				$("#mail_to_div_error").html("<?php echo __("To mail required");?>");
				return false;
			} else {
				$("#mail_to_div").removeClass("error");
				$("#mail_to_div_error").html("");
			}
			if(mail_sub ==''){
				$("#mail_sub_div").addClass("error");
				$("#mail_sub_div_error").html("<?php echo __("Subject required");?>");
				return false;
			} else {
				$("#mail_sub_div").removeClass("error");
				$("#mail_sub_div_error").html("");
			}
			if(mail_msg ==''){
				$("#mail_msg_div").addClass("error");
				$("#mail_msg_div_error").html("<?php echo __("Message required");?>");
				return false;
			} else {
				$("#mail_msg_div").removeClass("error");
				$("#mail_msg_div_error").html("");
			}
			/*if(user_im ==''){
				$("#user_im_div").addClass("error");
				$("#user_im_div_error").html("<?php echo __("Instant messanger required");?>");
				return false;
			} else {
				$("#user_im_div").removeClass("error");
				$("#user_im_div_error").html("");
			}*/
		});
		
			
</script>

<script type="text/javascript">

			$("#social_btn").click(function(){
				var im_type = $("#im_type").val();
				var im_link = $("#im_link").val();				
				var validate_url = /^(http|https|ftp):\/\/[a-z0-9]+([-.]{1}[a-z0-9]+)*.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;				
				if(im_type == '' || im_link == ''){
					$("#social_links").addClass("error");
					$("#social_links_error").html("<?php echo __("Select both fields");?>");
					return false;
				} else if(!validate_url.test(im_link)) {
					$("#social_links").addClass("error");
					$("#social_links_error").html("<?php echo __("Please enter a valid URL.");?>");
					return false;
				}
				
			});
		
			$("#mylink_add_btn").click(function(){			
							$("#for_social_links div:last").parent().before('<div class="control-group" id="social_links"><label class="control-label" for="inputInfo"><?php echo __("Links");?></label>          <div class="controls"><select  id="im_type" name="data[im_type][]"><option value="">Select</option><option value="Facebook">Facebook</option><option value="Twitter">Twitter</option><option value="Linkedin">Linkedin</option></select><input type="text" id="im_link" name="data[im_link][]"></div></div>');
							return false;
					});
</script>

<script type="text/javascript">
$("#rss_feed_btn").click(function(){
	var feed = $("#rss_feed").val();
	var validate_url = /^(http|https|ftp):\/\/[a-z0-9]+([-.]{1}[a-z0-9]+)*.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
	if(feed == ''){
		$("#user_blog").addClass("error");
		$("#rss_feed_error").html("<?php echo __("Rss feed required");?>");
		return false;
	}  else if(!validate_url.test(feed)) {
		$("#user_blog").addClass("error");
		$("#rss_feed_error").html("<?php echo __("Please enter a valid RSS FEER URL.");?>");
		return false;
	} else {
		$.ajax({
					type: "POST",
					url: "<?php echo BASE_URL?>pages/check_rss",
					data: "rss_feed="+feed,
					success: function(msg){
						if(msg == 'success'){
							$("#user_blog").removeClass("error");
							$("#rss_feed_error").html("");
							$("#rss_form").submit();
						} else {
							 $("#user_blog").addClass("error");
							$("#rss_feed_error").html("<?php echo __("Please enter a valid RSS FEER URL.");?>");
						}
					}
					});
					return false;
	}
});
</script>

<script type="text/javascript">
$("#port_photo_btn23").click(function(){
	
	var image_title = $("#image_title").val();
	var port_image = $("#portfolio_image").val();
	
	//alert(port_image);
	
	if(image_title == ''){
		$("#image_title_div").addClass("error");
		$("#image_title_div_error").html("<?php echo __("Portfolio title required");?>");
		return false;
	}  else {
		$("#image_title_div").removeClass("error");
		$("#image_title_div_error").html("");
	}
	if(port_image == ''){
		$("#port_image_div").addClass("error");
		$("#port_image_div_error").html("<?php echo __("Portfolio image required");?>");
		return false;
	} else if(!port_image.match(/(?:gif|jpg|png|bmp)$/)) {
		$("#port_image_div").addClass("error");
		$("#port_image_div_error").html("<?php echo __("Please select valid image (Format : gif | jpg | png | bmp )");?>");
		return false;
	} else {
		$("#port_image_div").removeClass("error");
		$("#port_image_div_error").html("");
	}
});
</script>

<!--Edit port image-->

<script type="text/javascript">
$("#edit_port_photo_btn23").click(function(){
	
	var image_title = $("#edit_image_title").val();
	var port_image = $("#edit_portfolio_image").val();
	
	//alert(port_image);
	
	if(image_title == ''){
		$("#edit_image_title_div").addClass("error");
		$("#edit_image_title_div_error").html("<?php echo __("Portfolio title required");?>");
		return false;
	}  else {
		$("#edit_image_title_div").removeClass("error");
		$("#edit_image_title_div_error").html("");
	}
	if(port_image == ''){
		$("#edit_port_image_div").addClass("error");
		$("#edit_port_image_div_error").html("<?php echo __("Portfolio image required");?>");
		return false;
	} else if(!port_image.match(/(?:gif|jpg|png|bmp)$/)) {
		$("#edit_port_image_div").addClass("error");
		$("#edit_port_image_div_error").html("<?php echo __("Please select valid image (Format : gif | jpg | png | bmp )");?>");
		return false;
	} else {
		$("#edit_port_image_div").removeClass("error");
		$("#edit_port_image_div_error").html("");
	}
});
</script>


<script type="text/javascript">
$("#port_video_btn").click(function(){
	var video_title = $("#video_title").val();
	var video_code = $("#video_code").val();
	
	if(video_title == ''){
		$("#video_title_div").addClass("error");
		$("#video_title_div_error").html("<?php echo __("Video title required");?>");
		return false;
	}  else {
		$("#video_title_div").removeClass("error");
		$("#video_title_div_error").html("");
	}
	
	if(video_code == ''){
		$("#video_code_div").addClass("error");
		$("#video_code_div_error").html("<?php echo __("Video embed code required");?>");
		return false;
	}  else {
		$("#video_code_div").removeClass("error");
		$("#video_code_div_error").html("");
	}
});
</script>
<!--Edit video-->
<script type="text/javascript">
$("#edit_video_btn").click(function(){
	var edit_video_title = $("#edit_video_title").val();
	var edit_video_code = $("#edit_video_code").val();
	
	if(edit_video_title == ''){
		$("#edit_video_title_div").addClass("error");
		$("#edit_video_title_div_error").html("<?php echo __("Video title required");?>");
		return false;
	}  else {
		$("#edit_video_title_div").removeClass("error");
		$("#edit_video_title_div_error").html("");
	}
	
	if(edit_video_code == ''){
		$("#edit_video_code_div").addClass("error");
		$("#edit_video_code_div_error").html("<?php echo __("Video embed code required");?>");
		return false;
	}  else {
		$("#edit_video_code_div").removeClass("error");
		$("#edit_video_code_div_error").html("");
	}
});
</script>

<script type="text/javascript">
$("#port_audio_btn").click(function(){
	var audio_title = $("#audio_title").val();
	var audio_file = $("#audio_file").val();
	
	if(audio_title == ''){
		$("#audio_title_div").addClass("error");
		$("#audio_title_div_error").html("<?php echo __("Audio title required");?>");
		return false;
	}  else {
		$("#audio_title_div").removeClass("error");
		$("#audio_title_div_error").html("");
	}
	
	if(audio_file == ''){
		$("#audio_file_div").addClass("error");
		$("#audio_file_div_error").html("<?php echo __("Portfolio audio required");?>");
		return false;
	} else if(!audio_file.match(/(?:mp3)$/)) {
		$("#audio_file_div").addClass("error");
		$("#audio_file_div_error").html("<?php echo __("Please select valid mp3 file");?>");
		return false;
	} else {
		$("#audio_file_div").removeClass("error");
		$("#audio_file_div_error").html("");
	}
});
</script>

<!--Edit Audio-->

<script type="text/javascript">
$("#edit_port_audio_btn").click(function(){
	var edit_audio_title = $("#edit_audio_title").val();
	//var edit_audio_file = $("#edit_audio_file").val();
	
	if(edit_audio_title == ''){
		$("#edit_audio_title_div").addClass("error");
		$("#edit_audio_title_div_error").html("<?php echo __("Audio title required");?>");
		return false;
	}  else {
		$("#edit_audio_title_div").removeClass("error");
		$("#edit_audio_title_div_error").html("");
	}
	
	if(edit_audio_file == ''){
		$("#edit_audio_file_div").addClass("error");
		$("#edit_audio_file_div_error").html("<?php echo __("Portfolio audio required");?>");
		return false;
	} else if(!audio_file.match(/(?:mp3)$/)) {
		$("#edit_audio_file_div").addClass("error");
		$("#edit_audio_file_div_error").html("<?php echo __("Please select valid mp3 file");?>");
		return false;
	} else {
		$("#edit_audio_file_div").removeClass("error");
		$("#edit_audio_file_div_error").html("");
	}
});
</script>


<script type="text/javascript">
$("#port_document_btn").click(function(){
	var document_title = $("#document_title").val();
	var document_file = $("#document_file").val();
	
	if(document_title == ''){
		$("#document_title_div").addClass("error");
		$("#document_title_div_error").html("<?php echo __("Document title required");?>");
		return false;
	}  else {
		$("#document_title_div").removeClass("error");
		$("#document_title_div_error").html("");
	}
	
	if(document_file == ''){
		$("#document_file_div").addClass("error");
		$("#document_file_div_error").html("<?php echo __("Portfolio document required");?>");
		return false;
	} else if(!document_file.match(/(?:pdf|doc|docx)$/)) {
		$("#document_file_div").addClass("error");
		$("#document_file_div_error").html("<?php echo __("Please select valid PDF / DOC / DOCX  file");?>");
		return false;
	} else {
		$("#document_file_div").removeClass("error");
		$("#document_file_div_error").html("");
	}
});
</script>

<!--Edit port Document-->

<script type="text/javascript">
$("#edit_port_document_btn").click(function(){
	var document_title = $("#edit_document_title").val();
	//var document_file = $("#document_file").val();
	
	if(document_title == ''){
		$("#edit_document_title_div").addClass("error");
		$("#edit_document_title_div_error").html("<?php echo __("Document title required");?>");
		return false;
	}  else {
		$("#edit_document_title_div").removeClass("error");
		$("#edit_document_title_div_error").html("");
	}
	
	
});
</script>


<script type="text/javascript">
$("#port_present_btn").click(function(){
	var present_title = $("#present_title").val();
	var present_code = $("#present_code").val();
	
	if(present_title == ''){
		$("#present_title_div").addClass("error");
		$("#present_title_div_error").html("<?php echo __("Presentation title required");?>");
		return false;
	}  else {
		$("#present_title_div").removeClass("error");
		$("#present_title_div_error").html("");
	}
	
	if(present_code == ''){
		$("#present_code_div").addClass("error");
		$("#present_code_div_error").html("<?php echo __("Presentation embed code required");?>");
		return false;
	}  else {
		$("#present_code_div").removeClass("error");
		$("#present_code_div_error").html("");
	}
});
</script>

<script type="text/javascript">
$("#edit_port_present_btn").click(function(){
	var edit_present_title = $("#edit_present_title").val();
	var edit_present_code = $("#edit_present_code").val();
	
	if(edit_present_title == ''){
		$("#edit_present_title_div").addClass("error");
		$("#edit_present_title_div_error").html("<?php echo __("Presentation title required");?>");
		return false;
	}  else {
		$("#edit_present_title_div").removeClass("error");
		$("#edit_present_title_div_error").html("");
	}
	
	if(edit_present_code == ''){
		$("#edit_present_code_div").addClass("error");
		$("#edit_present_code_div_error").html("<?php echo __("Presentation embed code required");?>");
		return false;
	}  else {
		$("#edit_present_code_div").removeClass("error");
		$("#edit_present_code_div_error").html("");
	}
});
</script>


<script>
$('.edit_proffessional').click(function(){
	var exp_id = $(this).attr('rel');
	$.ajax({
					type: "POST",
					url : "<?php echo BASE_URL?>pages/session_set",
					data: "exp_id="+exp_id,
					success: function(msg){
						}
					});
	
});
</script>

<script type="text/javascript">
$("#general_settings_edit").click(function(){
	var general_uid = $("#general_uid").val();
	var general_resume_title = $("#general_resume_title").val();
	var general_resume_desc = $("#general_resume_desc").val();
		$.ajax({
					type: "POST",
					url: "<?php echo BASE_URL?>users/general_settings",
					data: "uid="+general_uid+"&resume_title="+general_resume_title+"&resume_desc="+general_resume_desc,
					success: function(msg){
						if(msg == "success"){
							$("#general_success").html("<font color='#006633'><?php echo __('Your changes have been saved!!');?></font>").fadeIn('slow');
							setTimeout(function(){  $('#general_success').fadeOut(); }, 2000);
						}
					}
				});
});
</script>

  
  <script type="text/javascript">
  $('#publish_resume').on('switch-change', function (e, data) { 
  	var value = data.value;
	var uid = $("#publish_uid").val();
		if(value == true)
		var cval = 1;
		else
		var cval = 0;
			$.ajax({
					type: "POST",
					url: "<?php echo BASE_URL?>pages/publish_resume",
					data: "uid="+uid+"&webpage_view="+cval,
					success: function(msg){
						if(msg == "success")
							$("#publish_resume_box_success").html("<font color='#006633'><?php echo __('Your changes have been saved!!');?></font>").fadeIn('slow');
							setTimeout(function(){  $('#publish_resume_box_success').fadeOut(); }, 2000);
						}
					});
		
  });
  </script>
  
  <script type="text/javascript">
  $('#broadcast_resume').on('switch-change', function (e, data) { 
  	var value = data.value;
	var uid = $("#broadcast_uid").val();
		if(value == true)
		var cval = 1;
		else
		var cval = 0;
			$.ajax({
					type: "POST",
					url: "<?php echo BASE_URL?>pages/broadcast_resume",
					data: "uid="+uid+"&broad_resume="+cval,
					success: function(msg){
						if(msg == "success")
							$("#broadcast_resume_success").html("<font color='#006633'><?php echo __('Your changes have been saved!!');?></font>").fadeIn('slow');
							setTimeout(function(){  $('#broadcast_resume_success').fadeOut(); }, 2000);
						}
					});
		
  });
  </script>
  
  <script type="text/javascript">
  $('#protect_resume').on('switch-change', function (e, data) { 
  	var value = data.value;
	var uid = $("#protect_uid").val();
		if(value == true){
			var cval = 1;
			$("#password_block").show();
			$("#protect_pwd").val('');
		}
		else{
			var cval = 0;
			$("#password_block").hide();
			var pwd = '';
		}
			$.ajax({
					type: "POST",
					url: "<?php echo BASE_URL?>pages/protect_resume",
					data: "uid="+uid+"&set_password="+cval+"&resume_password="+pwd,
					success: function(msg){
						if(msg == "success")
							$("#password_block_success").html("<font color='#006633'><?php echo __('Your changes have been saved!!');?></font>").fadeIn('slow');
							setTimeout(function(){  $('#password_block_success').fadeOut(); }, 2000);
						}
					});
		
  });
  
  $("#password_block_btn").click(function(){
	 	var uid = $("#protect_uid").val();
		var pwd = $("#protect_pwd").val();
		$.ajax({
					type: "POST",
					url: "<?php echo BASE_URL?>pages/protect_resume",
					data: "uid="+uid+"&set_password=1"+"&resume_password="+pwd,
					success: function(msg){
						if(msg == "success")
							$("#password_block_success").html("<font color='#006633'><?php echo __('Your resume is now password protected!!');?></font>").fadeIn('slow');
							setTimeout(function(){  $('#password_block_success').fadeOut(); }, 2000);
						}
					});	
  });
  </script>
 
 <!-- Recommend --> 
  
  <div  class="modal hide fade recommendtr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="recommend">
                                    <div class="resume-cont clearfix">
                                      <?php   	$recuser=ClassRegistry::init('User')->find('first',array('conditions'=>array('username'=>Configure::read('userpage'))));
									if(empty($recuser['User']['image']) && $recuser['User']['username']==Configure::read('userpage')) { ?>
									<img src="<?php echo Router::url('/'); ?>img/profile_pic_default.jpg" alt="CVomg - The best way to show yourself" height="" width="" class="pull-left img-polaroid" style="height:120px; width:120px">
                                     <?php } else { ?>
									 <img src="<?php echo Router::url('/'); ?>img/user-images/big/<?php echo $recuser['User']['image']; ?>" height="" width="" class="pull-left img-polaroid" style="height:120px; width:120px">
									<?php } ?> 
                                        <div class="span5 resume_head">
                                            <h3><a href=""><?php echo Configure::read('userpage'); ?></a></h3>
                                            <small class="muted"><?php echo $recuser['User']['resume_title']; ?></small>  
                                        </div>
                                    </div>
                                    
                                    <div class="recommend-skills">
                                        <p><?php echo __('Recommand '.Configure::read('userpage').'on one of his key-skills'); ?></p>
                                         <?php  $i=1; foreach($recskill as $recskill) { 
										 if(!empty($recskill['Recommentation']['skills'])) {
										  $rec1_for_first=count(ClassRegistry::init('Recomment')->find('all',array('conditions'=>array('rid'=>$recskill['Recommentation']['rid'],'status'=>'Approved'))));?>
                                         <a href="#" class="my2" rel="<?php echo $recskill['Recommentation']['rid'];?>" data-placement="top">
                                         <button class="btn btn-info"><?php echo $recskill['Recommentation']['skills']; ?>
                                         <span class="badge badge-success" style="padding:2px; margin-left:5px;"><?php if($rec1_for_first!=0) echo $rec1_for_first; ?></span>
                                         </button></a>
                                        <?php $i++; } } ?>
                                    </div>

                                    <ul class="nav nav-tabs" id="recommend-tab">
                                        <li class="active"><a href="#approval" class="waiting"><?php echo __('Waiting for approval ('.$recount.')'); ?></a></li>
                                        <li><a href="#my-recommend" class="allcount"><?php echo __('All my recommendations ('.$recount1.')'); ?></a></li>
                                    </ul>
 
                                    <div class="tab-content" style=" max-height:300px">
                                     
                                        <div class="tab-pane active" id="approval">
						              <?php 
									  if(empty($recomment))
									  echo "<div class='nowaiting'>There is no recommendation on queue</div>";
									  else {
									   $j=1;
									   foreach($recomment as $recomment) { 
									   
									        $user_send_rec=ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$recomment['Recomment']['uid'])));?>
                                           <div style="float:left; width:535px; padding-left:10px; padding-bottom:5px;" id="approve<?php echo $recomment['Recomment']['recid']; ?>"> 
                                           <?php   
												if(empty($user_send_rec['User']['image'])) { ?>
                                           <img src="<?php echo BASE_URL; ?>img/profile_pic_mini.jpg" alt="" class="pull-left img-polaroid">
                                           <?php } else { ?>
									       <img src="<?php echo Router::url('/'); ?>img/user-images/small/<?php echo $user_send_rec['User']['image']; ?>" height="20" width="20" class="pull-left img-polaroid">
									<?php } ?> 
                                            <div class="resume-cont recommend-list clearfix pull-left span6">
                                               <?php /*?> <span><?php if($_SESSION['User']['username']==Configure::read('userpage')) { ?><a href=""><i class="icon-remove pull-right"></i></a><?php } ?></span><?php */?>
                                                <div class=" resume_head">
                                                    <h5><a href=""><?php echo $user_send_rec['User']['username']; ?></a>
                                                   <?php if($this->Session->read('User.username')==Configure::read('userpage')) { ?>
                                                   
                                                    <div class="" id="broadcast_resume" style="float:right">
                                                    <a onClick="acknowledge(this.id,this.rel)" id="ok" rel="<?php echo $recomment['Recomment']['recid']; ?>" style="cursor:pointer"><span class="label label-success"><?php echo __('Ok') ?></span></a>
                                                    <a onClick="acknowledge(this.id,this.rel)" id="refuse" rel="<?php echo $recomment['Recomment']['recid']; ?>" style="cursor:pointer"><span class="label label-important"><?php echo __('Refuse')?></span></a>
                                                    </div>
                                                    <?php } ?>
                                                    </h5>
                                                    <small class="muted"><?php echo $user_send_rec['User']['resume_title']; ?></small>
                                                    <!--<span class="label label-info">Php</span>-->
                                                </div>

                                                <input type="text" placeholder="<?php echo $recomment['Recomment']['recommend']; ?>" class="span6" disabled="">
                                                <small class="muted"><?php echo date("j / n / Y",strtotime($recomment['Recomment']['createdate'])); ?></small>
                                            </div></div>
											<?php $j++;}  } ?>
                                        </div>
                                         
                                        <div class="tab-pane savings" id="my-recommend"style="max-height:300px">
                                        <?php  
										 if(empty($recommentmy1))
									  echo "<div class='nowaiting'>There is no recommendation on queue</div>";
									  else {
										$k=1;
									   foreach($recommentmy1 as $recomment1) {
										  
									        $user_send_rec1=ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$recomment1['Recomment']['uid'],'status'=>'Active')));
											?>
                                           <div style="float:left; width:510px; padding-left:10px; padding-bottom:5px;">
                                           <?php   
												if(empty($user_send_rec1['User']['image'])) { ?>
                                           <img src="<?php echo BASE_URL; ?>img/profile_pic_mini.jpg" alt="" class="pull-left img-polaroid">
                                           <?php } else { ?>
									       <img src="<?php echo Router::url('/'); ?>img/user-images/small/<?php echo $user_send_rec1['User']['image']; ?>" height="20" width="20" class="pull-left img-polaroid">
									<?php } ?> 
                                           
                                            <div class="resume-cont recommend-list clearfix pull-left span6">
                                               <?php  //echo  $user_send_rec1;
											   /*?> <span><?php if($_SESSION['User']['username']==Configure::read('userpage')) { ?><a href=""><i class="icon-remove pull-right"></i></a><?php } ?></span><?php */?>
                                                <div class=" resume_head">
                                               
                                                    <h5><a href=""><?php echo $user_send_rec1['User']['username']; ?></a></h5>
                                                    <small class="muted"><?php echo $user_send_rec1['User']['resume_title']; ?></small>
                                                    <span class="label label-info"></span>
                                                </div>

                                                <input type="text" placeholder="<?php echo $recomment1['Recomment']['recommend']; ?>" class="span6" disabled="">
                                                <small class="muted"><?php echo date("j / n / Y",strtotime($recomment1['Recomment']['createdate'])); ?></small>
                                            </div></div>
											<?php $k++;} } ?>
                                        
                                        </div>

                                      <a href="" class="btn" type="button" style="padding-left:196px; padding-right:170px;"><?php echo __('Go back to '.Configure::read('userpage').' resume'); ?></a>
                                    </div>
                                
                                </div>
  
<!--Footer recommend-->
 <span style="display:none" class="myrecval">edit</span>
<div class="recommend-fix" style="display:none" id="refoot">
            <a href="" class="add-recommend pull-left" data-toggle="modal" data-target=".recommendtr" onMouseOver="rec_div_show('rec_edu_edit')" onMouseOut="rec_div_hide('rec_edu_edit')" ><img src="<?php echo BASE_URL; ?>img/hand_pro_icon.png" alt="" ><?php echo __('Recommendation'); ?></a>
            <div class="recommend-skillsfix span5 offset7" style="margin-left:500px; width:480px;">
            <?php  $i=1; $j=1;
			if(empty($recedu))
			{
			}
			else{
			foreach($recedu as $recedu)
			 {  
			 if(!empty($recedu['Recommentation']['skills'])) 
			 { $recbtn1_for_first=count(ClassRegistry::init('Recomment')->find('all',array('conditions'=>array('rid'=>$recedu['Recommentation']['rid'],'status'=>'Approved')))); ?>
                <a href="#" class="ex2" rel="<?php echo $recedu['Recommentation']['rid'];?>" data-placement="top"><button class="btn">
				<?php $strlen=strlen($recedu['Recommentation']['skills']); 
				if($strlen >= 6) echo substr($recedu['Recommentation']['skills'],0,5)."..." ; else echo substr($recedu['Recommentation']['skills'],0,5); ?>
                <?php if($recbtn1_for_first==0) echo ''; 
				else{
				  ?>
				<span class="badge badge-success" style="padding:2px; margin-left:5px;"><?php echo $recbtn1_for_first; ?>
				</span><?php } ?></button></a>
                
                <?php $j++; }
				 $i++; } 
				 }
				 if($j!=6) { ?>
                  <a href="" class="" data-toggle="modal" data-target=".recommendtr" style="color:#fff; cursor:pointer"><?php echo __('More'); ?></a>
                   <a  class="onloadpop1"  href="#myModal" data-placement="top" style="color:#fff; cursor:pointer"></a>
                  
                  <?php } ?>
            </div>
            <a href="#" class="pull-right span1" onClick="changefoot1()" style="cursor:pointer;"><img src="<?php echo BASE_URL; ?>img/rnd_br_down_icon.png" alt=""></a>
        </div>
        
        <div class="modal hide fade" id="myModal" style="width:15%;margin-left:-100px;">
 <div class="modal-header" style="border:none; padding:1px 8px;">
    <a class="close" data-dismiss="modal">×</a>
  </div>
  <div class="modal-body">
    <p style="font-size:16px; line-height:26px;">Your Having New Recommendation</p>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".recommendtr" style="color:#fff; cursor:pointer" onClick="recclose()">View</a>
  </div>
</div>
   
        
        
  <?php 
   $user_send=ClassRegistry::init('User')->find('first',array('conditions'=>array('username'=>Configure::read('userpage'))));
   $user_sendid=ClassRegistry::init('Recommentation')->find('all',array('conditions'=>array('uid'=>$user_send['User']['uid'],'skills !='=>''))); 
   if(!empty($user_sendid)) { ?>      
<div class="resume_footer1" id="refoot1">
<a onClick="changefoot()" style="padding-left:15px;cursor:pointer;"><img src="<?php echo BASE_URL; ?>img/hand_pro_icon.png" alt="" style="padding-top:7px"></a>
</div>
<?php } ?>

<div id="ver_content" style="display:none; background:#fff">
  
  <!--if you can recomment-->
  
  <div class="showing">
  dfhs hg f
   </div>
   
   
</div>
 
 <!--Footer recommend end-->
      
<style>
.myrecval
{
	position:relative;
	bottom:20px;
}
#delmy
{
	margin-left:5px;
	color:#fff;
}
</style>

<!--Add text box for menus-->

	<script type="text/javascript">

$(".edutab").click(function(){	
	$(this).parents('div.modal-body').find("div.edunews").append('<div class="control-group" id="detais_div2"><label class="control-label" for="inputInfo"><?php echo __("Details");?></label><div class="controls"><input type="text" id="extra_curricular1" name="data[extra_curricular][]" /><a class="btn btn-mini btn-primary edutd" id="delmy">Delete</a><span class="help-inline" id="details_error"></span></div></div>');
	return false;
});

$('a.edutd').live('click',function(){
	$(this).parents('div.control-group').remove();
});

$(".skitab").click(function(){	
$(this).parents('div.modal-body').find("div.news_skill").append('<div class="control-group" id="skill_val_div"><label class="control-label" for="inputInfo" ><?php echo __("Skill");?></label><div class="controls"><input type="text" id="signup_email" name="data[skill][]"><a class="skilltd btn btn-mini btn-primary" id="delmy">Delete</a><span class="" id="skills_error"></span></div></div>');return false;
});

$('a.skilltd').live('click',function(){
	$(this).parents('div.control-group').remove();
});

$(".instab").click(function(){
$(this).parents('div.modal-body').find("div.news_ins").append('<div id="interest_div" class="control-group"><label class="control-label" for="inputInfo"><?php echo __("Interest");?></label><div class="controls"><input type="text" id="interest1" name="data[interest][]"><a class="instd btn btn-mini btn-primary" id="delmy">Delete</a><span class="help-inline" id="interest_error"></span></div></div>');		
	return true;
					});
					
$('a.instd').live('click',function(){
	$(this).parents('div.control-group').remove();
});


$(".mylinkbt").click(function(){	
$(this).parents('div.modal-body').find("div.news_link").append('<div class="control-group" id="skill_val_div"><label class="control-label" for="inputInfo" ><?php echo __("Links");?></label><div class="controls"><select  id="im_type" name="data[im_type][]"><option value="">Select</option><option value="Facebook">Facebook</option><option value="Twitter">Twitter</option><option value="Linkedin">Linkedin</option></select><input type="text" id="signup_email" name="data[im_link][]"><a class="linktd btn btn-mini btn-primary" id="delmy">Delete</a><span class="" id="link_error"></span></div></div>');return false;
});

$('a.linktd').live('click',function(){
	$(this).parents('div.control-group').remove();
});

					
	/*	$('.extra_delete_btn').live('click',function(){
	    $(this).closest('.news').remove();
		});
					
$(".extra_delete_btn").click(function(){
	$(this).find("#extra_curricular").attr('disabled','disabled');
	$(this).parent().parent().hide();
	
});*/
</script>
<?php  if($this->Session->read('User.uid') && $this->Session->read('User.username')==Configure::read('userpage')) { ?>
 <script type="text/javascript">
	$('.exp').click(function(){
		var expid=$(this).attr('rel');
		//alert($('#editexp'+expid).children().find('.exp_image').html());
		$.ajax({
			type: "POST",
			data: "eid="+expid,
			url: "<?php echo BASE_URL;?>users/cimage",
			success: function(msg){
				$('#editexp'+expid).children().find('.exp_image').html(msg);
			}
		});
		
	});
	$('.close').click(function(){
		var cid=$(this).attr('rel');
		$.ajax({
			type: "POST",
			data: "eid="+cid,
			url: "<?php echo BASE_URL;?>users/imgcheck",
			success: function(msg){
				if(msg==''){
					var inmsg='';
				}else{
					var inmsg='<img src="<?php echo BASE_URL;?>img/users/small/'+msg+'" width="50" height="30" />';
				}
				$('#'+cid).children().find('.pimg').html(inmsg);
			}
		});
	});
	$('.delexp').live('click',function(){
		var delid=$(this).attr('rel');
		$.ajax({
			type: "POST",
			data: "id="+delid,
			url: "<?php echo BASE_URL;?>users/delimage",
			success: function(msg){
				$.ajax({
					type: "POST",
					data: "eid="+delid,
					url: "<?php echo BASE_URL;?>users/cimage",
					success: function(msg){
						$('#editexp'+delid).children().find('.exp_image').html(msg);
					}
				});
			}
		});
	});
</script>
<?php 
echo $this->html->script(array('user/common','user/home_widget','user/home_portlet'));
//echo $this->html->script(array('user/jquery-ui'));

?> 


<?php  } ?>


<!--Footer recommend script-->

<script>
$(document).ready(function(){
	$('.ex2').click(function(){
		$('.popover').hide();
		})
$('.ex2').popover({
	html:true,
	content: function() {
		var rel = $(this).attr('rel');
		$.ajax({
		type: "POST",
		data: "recid="+<?php if($this->Session->read('User.uid')) echo $this->Session->read('User.uid'); else echo "'nologin'" ?>+"&skill="+rel,
		url: "<?php echo BASE_URL; ?>users/recommentme",
		success: function(msg){
		$('.popover').css({'top':'-240px'});
		$('.showing').html(msg);
		}});
      return $('#ver_content').html();
    }
	
});

$(".my").popover({
					title: "Hello",
					content: "Finally, I can speak!"
				});
	

});
$('.butrec_m').live('click',function(){
	var recskil=$('#fetchid').val();
	var recval=$(this).parent().prev('div').find('textarea').val();
	if(recval!=''){
		$.ajax({
		type: "POST",
		data: "content="+recval+"&user_id="+<?php  if($this->Session->read('User.uid')) echo $this->Session->read('User.uid'); else echo "nologin"  ?>+"&skill_id="+recskil,
		url: "<?php echo BASE_URL; ?>users/sentrecomment",
		success: function(msg){
			$('.showing').html(msg);
		}});
	}else{
		alert('Please enter the value');
	}
});

function sentrecomment(but){
	
	var recskil=$('#fetchid').val();
	var recval=$(this).attr('id');
	alert(recval);
		$.ajax({
		type: "POST",
		data: "content="+recval+"&user_id="+<?php  if($this->Session->read('User.uid')) echo $this->Session->read('User.uid'); else echo "nologin"  ?>+"&skill_id="+recskil,
		url: "<?php echo BASE_URL; ?>users/sentrecomment",
		success: function(msg){
			$('.showing').html(msg);
			//$('.myreccont').val("cxvbcxv");
			//$('#resumebtn').load();
		}});
	}


function poprec() {	 
	$('#refoot').show();
	$('#refoot1').hide();
 }
 $('.ex2').click(function(){
		$('.popover').hide();
		})
 function recclose() {	 
	$('#myModal').modal('hide');
 }
function changefoot(id) {
	$('#refoot').show();
	$('#refoot1').hide();
 }
 function changefoot1(id) {
	$('#refoot').hide();
	$('#refoot1').show();
 }
  function recommentme(id) {
	var rel = $(this).attr('rel');
	$('.recme').hide();
	$('.recmme').hide();
	$('.recm_code').show();
	$('#recmbtn').show()
	$('.popover').css({'top':'-240px'});
 }
 function closepopup() {	 
	$('.popover').hide();
 }
 
 function acknowledge(ids,rel){
	$.ajax({
		type: "POST",
		data: "msgk="+ids+"&rid="+rel,
		url: "<?php echo BASE_URL; ?>users/acknowledge",
		success: function(msg){
			if(msg=='cancel')
			{
				$('#approve'+rel).html('<div class="nowaiting">Recommendation canceled successfully</div>');
			}
			else{
			var client=msg.split('::');
	        $('#approve'+rel).hide();
			$('.savings').append(client[0]);
			$('.allcount').html(client[1]);
			$('.waiting').html(client[2]);
			$('.nowaiting').hide();
			}
		}});
		
	}
	
	function scatgf(){
	var logodel=$('#user_logo').val()
		$.ajax({
		type: "POST",
		data: "imgval="+logodel+"&new="+fygf,
		url: "<?php echo BASE_URL; ?>users/delimage",
		success: function(msg){
			$('#mylogo').hide();
			$('#mylogo2').show();
			$(".hai").css({'width' : '140px', 'padding-top' : '0px','top' :'15px'})
			$("#delme").hide();
			$('.display').show();
			$(".display").css({'width' : '150px', 'padding-top' : '0px','top' :'15px'})
				
		}});
	}

  $('#recommend-tab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
   })
 
 
    </script>
	
	
	
<!--Footer recommend script end-->
 <style>
.norecm
{
	width:255px;
	background:#FFF;
	float:left;
	padding:20px;
	padding-top:1px;
	margin:2px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:17px;
	/*color:#333;*/
	color:#f00;
	line-height:25px;
}
.resumebtn
{
	width:254px;
	background:#eaeaea;
	float:left;
	padding:23px;
	font-size:12px;
	color:#39F;
	text-align:center;
}
.resa
{
	padding:10px;
	font-size:12px;
	color:#39F;
}
</style>
 </body>
</html>
