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

      <?php	
		echo $this->html->css(array('user/normalize.min','user/bootstrap','user/resume','user/datepicker')); 
		echo $this->html->script(array('jquery','jquery.min','jquery-ui-min','jquery-ui-1.8.16.custom.min','user/vendor/modernizr-2.6.2-respond-1.1.0.min','jquery.validationEngine'));
		 
?>
    </head>
    <body>
		

 	
<?php echo $this->fetch('content'); ?>
    


 <?php	
		echo $this->html->script(array('page/vendor/jquery-1.9.1.min','user/bootstrap','user/plugins','user/main','user/bootstrap-datepicker','bootbox'));
?>
<?php echo $this->html->script(array('jquery.filestyle','ajaxfileupload'));?> 
<!--[if IE 9]>
 <?php  echo $this->html->script(array('ajaxfileupload1'));?> 
<![endif]--> 

<script>
<?php
$msg = $this->Session->flash();
if(!empty($msg)){ ?>
	bootbox.alert(<?php echo $msg;?>);	
<?php }?>
</script>


     <script type="text/javascript">
$(document).ready(function(){
		/*$(".open").click(function(){
			$(this).removeClass('open');
			$(this).addClass('closed active');	
		$('.tab-content').css('display','block');
		//alert('hi');
		});
		$(".close").click(function(){
			$(this).removeClass('closed active');
			$(this).addClass('open');
			$('.tab-content').css('display','none');
		});*/
		
		$("#addin").click(function(){
			
			$("#addin").css('display','none');
			$("#addout").css('display','block');
			$("#addout").addClass('closed active');	
			$('#addcon').css('display','block');
		});
		
		$("#addout").click(function(){
			
			$("#addout").css('display','none');
			$("#addin").css('display','block');
			$('#addcon').css('display','none');
			//$(this).addClass('closed active');	
			//$('.tab-content').css('display','none');
		});
		
		$(".menu-on").click(function(){
			
			$(this).removeClass('menu-on').addClass('menu-off');
			/*$("#addin").css('display','none');
			$("#addout").css('display','block');
			$("#addout").addClass('closed active');	*/
			$('#addcon').css('display','block');
		});
		$("#resume-config-tabs li.active").click(function(){
			alert('');
			$(this).removeClass('active');
			$(this).removeClass('menu-off').addClass('menu-on');
			/*$("#addin").css('display','none');
			$("#addout").css('display','block');
			$("#addout").addClass('closed active');	*/
			$('#addcon').css('display','none');
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
		
		
		function mousein()
		{
		 $('.edith').css('display','block');
		}
		function mouseout()
		{
		 $('.edith').css('display','none');
		}
		
		
</script>
	<!--for Exp-->

<script type="text/javascript">
$("#start_date").datepicker();
$("#end_date").datepicker();
		$("#exp_btn").click(function(){
			var job_title = $("#job_title").val();
			var company_val = $("#company_val").val();
			var city = $("#city").val();
			var state = $("#state").val();
			var country = $("#country").val();
			var start_date = $("#start_date").val();
			var end_date = $("#end_date").val();
			
			if(job_title == ''){
				$("#job_title_div").addClass("error");
				$("#job_title_div_error").html("<?php echo __("Job Title required");?>");
				return false;
			} else {
				$("#job_title_div").removeClass("error");
				$("#job_title_div_error").html("");
			}
			if(company_val == ''){
				$("#company_val_div").addClass("error");
				$("#company_val_div_error").html("<?php echo __("Company Details required");?>");
				return false;
			} else {
				$("#company_val_div").removeClass("error");
				$("#company_val_div_error").html("");
			}
			if(city == '' || state == '' || country == ''){
				$("#city_div").addClass("error");
				$("#city_div_error").html("<?php echo __("City/State/Country required");?>");
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
		$("#skill_btn").click(function(){
			var skill_area = $("#skill_area").val();
			var skill = $("#skill_val").val();
			if(skill_area == ''){
				$("#skill_area_div").addClass("error");
				$("#skill_area_error").html("<?php echo __("Skill area required");?>");
				return false;
			} else {
				$("#skill_area_div").removeClass("error");
				$("#skill_area_error").html("");
			}
			if(skill ==''){
				$("#skill_val_div").addClass("error");
				$("#skill_val_error").html("<?php echo __("Atleast one skill required");?>");
				return false;
			} else {
				$("#skill_val_div").removeClass("error");
				$("#skill_val_error").html("");
			}
		});
			$("#skill_add_btn").click(function(){			
							$("#for_count div:last").parent().before('<div class="control-group"><label class="control-label" for="inputInfo"><?php echo __("Skill");?></label><div class="controls"><input type="text" id="signup_email" name="data[skill][]"><span class="help-inline" id="skills_error"></span></div></div>');
							return false;
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
	var port_image = $("#port_image").val();
	
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
<script>
$('.edit_proffessional').click(function(){
	var exp_id = $(this).attr('rel');
	$.ajax({
					type: "POST",
					url: "<?php echo BASE_URL?>pages/session_set",
					data: "exp_id="+exp_id,
					success: function(msg){
						}
					});
	
});
</script>


     </body>
</html>