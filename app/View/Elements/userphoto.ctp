 
 <div id="basic" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:440px;">
<form class="form-inline" name="update" action="<?php echo Router::url('/'); ?>users/userphoto" method="post" enctype="multipart/form-data" style="margin-bottom:0px;width:440px;">
<input type="hidden" name="data[uid]" value="<?php echo $this->Session->read('User.uid'); ?>" />
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h2 id="myModalLabel"  class="forh2"><?php echo __("Add Basic Information Section");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;width:500px;" >
  
      <div class="control-group" id="users_image_div" style="height:135px;">
                  <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:14px;font-family: arial; font-size: 14px;font-weight: bold;"><?php echo __("Upload Photo");?></label>
                    <div class="controls">
                    <div class="seelogo" style="float:left; width:100px;">
					<?php echo $this->Html->image('profile_pic.jpg',array('border'=>0,'alt'=>'Resume','width'=>'100','height'=>'70','class'=>'profile-photo','style'=>'border:1px solid #ccc')); ?> </div>
                    <input type="file" id="portimage" name="image" style="padding:2px; margin: 15px 0px 0px 50px; height:26px;" onchange="return userajaxFile();"> <br />
                    <span class="imgalert">(Image size 250 X 250 as jpeg,png format)</span>
                      <span class="help-inline" id="users_image_div_error"></span> </div>
                  </div>
                  
      <div class="control-group" id="user_city_div">
        <label class="control-label" for="inputInfo" id="prof1"><?php echo __("City");?></label>
        <label class="control-label" for="inputInfo" id="prof1" style="float:left"><?php echo __("Country");?></label>
        <label class="control-label" for="inputInfo" id="prof1"><?php echo __("Zipcode");?></label>
        <div class="controls">
          <input type="text" id="user_city" name="data[city]" style="padding:2px; margin-right:3px; width:125px;">
          
          <select name="data[country]" id="user_country" style="width:140px;height:26px;">
             <option value="" ><?php echo __("Country");?></option>  
                        <?php 
						  $i=1;
						  foreach ($catlist as $coun): ?>
                        <option value="<?php echo $coun['Country']['iso_code2']?>"><?php echo $coun['Country']['country_name']?></option>   
                        <?php $i++; endforeach; ?>
          </select>
          <input type="text" id="user_zip" name="data[zipcode]" style="padding:2px; margin-right:15px; width:125px;">
          <span class="help-inline" id="user_city_div_error"></span> </div>
      </div>            
                  
    </div>
    <div class="modal-footer">
     
     <!-- <label class="checkbox" style="display:block;">-->
        <input type="hidden" value="1" name="data[display]">
         <input type="hidden" value="0" name="data[image]" id="myimg">
       <!-- <span style="margin-left:15px; float:left"><?php //echo __("Display on Homepage");?></span> </label>-->
      <button type="submit" id="user_basic_btn" class="btn btn-primary "><?php echo __("Submit");?></button>
    </div>
    
    <!--</div>-->
  </form>
   </div>
   
   <div id="basic_msg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:350px;">
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
   
<script type="text/javascript">


	
	
	 function userajaxFile(){
	var fileextension=/(\.jpg|\.gif|\.png|\.JPG|\.GIF|\.PNG|\.jpeg|\.JPEG)$/;	
	
	if($('#portimage').val().match(fileextension)){		
	$.ajaxFileUpload
	(
		{
			url:'<?php echo BASE_URL;?>users/userportimage',
			secureuri:false,
			fileElementId:'portimage',
			dataType: 'json',
			success: function (data, status)
			{
				if(typeof(data.error) != 'undefined') {
					if(data.error != '')
						alert(data.error);
				} else {										
					if(data.msg=='success'){
						$('.seelogo').html('<img src="<?php echo BASE_URL.'img/user-images/small/'; ?>'+data.image+'" height="70" width="70" >');
						$('#myimg').val(data.image);
					}
				
				}
			}			
		}
	)}else{
		$("#error").html("Oops..Please upload profile image").show(500);
		setTimeout(function(){  $('.error').hide(500); }, 5000); 
		$('#image').focus();
	}
	return false;
	 }	
		
</script>    