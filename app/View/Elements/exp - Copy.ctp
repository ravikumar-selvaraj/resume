
 <div id="prof_exp" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="form-inline" name="update" action="<?php echo Router::url('/'); ?>users/exp" method="post" style="margin-bottom:0px;" enctype="multipart/form-data">
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <input type="hidden" name="data[responsibility]"  value="" />
      <h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px;"><?php echo __("Professional Experience");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;" >
    
      <div class="control-group" id="job_title_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:310px; font-size:14px;font-family:arial;font-weight: bold;"><?php echo __("Job Title");?></label>
       <div id="delme" style="display:none; float:left; width:50px;">
       <a id="delimg" onclick="return scat();" style="cursor:pointer; color:#foo"><img src="<?php echo Router::url('/'); ?>img/delete.png" width="18" height="18" /></a></div>
        <div class="controls">
          <input type="text" placeholder="Job Title" id="job_title" name="data[job_title]" style="padding:2px; margin-right:25px;">
        <div class="cp-bl" style="width:150px; float:right;" id="mylogo2">
        <input name="file" type="file" id="file" value="" class="box upload"  onchange="return ajaxFileUpload();"  >
        <input type="submit" id="submiti" name="upload" value="upload" class="cp-bl-bu" style="display:none;float:right;cursor:pointer;" >
        <input type="hidden" name="data[logo]" value="0" id="user_logo" />
        </div>
        <div id="ploading" style="display:none;"><?php echo $this->html->image('loading.gif',array());?>Loading....</div>
        
        <div style="width:150px; float:right; height:50px; display:none; text-align:center; position:relative; bottom:25px;" id="mylogo">
        
        </div>
        
          <span class="help-inline" id="job_title_div_error"></span> </div>
      </div>
      
      <div class="control-group" id="company_val_div">
        <label class="control-label" for="inputInfo" id="prof"><?php echo __("Company");?></label>
        <label class="control-label" for="inputInfo" id="prof"><?php echo __("Contract Type(Optional)");?></label>
        <div class="controls">
          <input type="text" placeholder="Company" id="company_val" name="data[company]" style="padding:2px; margin-right:25px;">
        
          <select name="data[contract_type]" id="" style="height:26px;">
            <option value="">Contract Type (optional)</option>
            <option value="Full-time"><?php echo __("Full-time");?></option>
            <option value="Part-time"><?php echo __("Part-time");?></option>
            <option value="Internship"><?php echo __("Internship");?></option>
            <option value="Temporary Work"><?php echo __("Temporary Work");?></option>
            <option value="Apprenticeship"><?php echo __("Apprenticeship");?></option>
            <option value="Cooperative Education Work"><?php echo __("Cooperative Education Work");?>  </option>
            <option value="Consultant"><?php echo __("Consultant");?></option>
            <option value="Student Project"><?php echo __("Student Project");?></option>
            <option value="Volunteer Work"><?php echo __("Volunteer Work");?></option>
            <option value="Freelancer"><?php echo __("Freelancer");?></option>
            <option value="Temporary Replacement"><?php echo __("Temporary Replacement");?></option>
            <option value="OTHER"><?php echo __("Other");?></option>
          </select>
          <span class="help-inline" id="company_val_div_error"></span> </div>
      </div>
     
      <div class="control-group" id="city_div">
        <label class="control-label" for="inputInfo" id="prof"><?php echo __("City");?></label>
        <label class="control-label" for="inputInfo" id="prof" style="float:left"><?php echo __("Country");?></label>
       
        <div class="controls">
          <input type="text" placeholder="City" id="city" name="data[city]" style="padding:2px; margin-right:25px;">
          
          <select name="data[country]" id="country" style="width:225px;height:26px;">
             <option value="" >[-Select country-]</option>  
                        <?php 
						  $i=1;
						  foreach ($catlist as $coun): ?>
                        <option value="<?php echo $coun['Country']['iso_code2']?>"><?php echo $coun['Country']['country_name']?></option>   
                        <?php $i++; endforeach; ?>
          </select>
          <span class="help-inline" id="city_div_error"></span> </div>
      </div>
       
      <div class="control-group" id="date_div">
        <label class="control-label datepicker" for="inputInfo" id="prof"><?php echo __("Start Date");?></label>
        <label class="control-label datepicker" for="inputInfo" id="prof"><?php echo __("End Date");?></label>
        <div class="controls">
          <input type="text" placeholder="Start Date" id="start_date" name="data[start_date]" style="padding:2px; margin-right:25px;">
          <input type="text" placeholder="End Date" id="end_date" name="data[end_date]" style="padding:2px; margin-right:25px;">
          <span class="help-inline" id="date_div_error"></span> </div>
      </div>
      
      <div class="control-group">
        <label class="control-label" for="inputInfo" id="prof"><?php echo __("Responsibilities");?></label>
        <div class="controls">
          <table border="0" align="left" cellpadding="0" cellspacing="0" id="myTable" width="100%" class="miletab" >
            <tr>
              <td align="left" valign="middle" width="1%"><input type="text" id="resp" name="resp[]" class="team" placeholder="Responsibilities" style="width:425px;padding:2px; margin-bottom:10px;"  >
                
                <!--<input name="team1[]" maxlength="30" type="hidden" id="" value="fds" class="team" />--></td>
              <td align="left" valign="top" width="1%"><a onClick="insRow()" style="cursor:pointer;" class="btn btn-mini btn-primary">
              <?php echo __("Add");?></a><br /></td>
            </tr>
            <tr id="add_rows">
              <td align="left"></td>
              <td align="left" valign="top"></td>
            </tr>
            </tbody>
          </table>
          <span class="help-inline" id="whoru_error"></span> </div>
      </div>
    </div>
    <div class="modal-footer">
     
      <label class="checkbox" style="display:block;">
        <input type="checkbox" name="data[display_home]" value="0">
        <span style="margin-left:5px; float:left; font-size:12px;"><?php echo __("Display on home page");?></span> </label>
      <button type="submit" id="exp_btn" class="btn btn-primary "><?php echo __("Submit resume");?></button>
    </div>
    
    <!--</div>-->
  </form>
   </div>
   
   <style>
   #display
   {
	   top:10px;
   }
   #delme
   {
	   width:110px;
	   float:left;
	   text-align:right;
	   font-family:Verdana, Geneva, sans-serif;
	   color:#F00;
   }
   </style>
    <script type="text/javascript">
	$(document).ready(function(){
		 $("input.upload").filestyle({ 	
			 image: "<?php echo BASE_URL; ?>img/cp.png",
			 imageheight : 50,
			 imagewidth : 146,
			 width : 150,
			 top : 10
		 }); });
		 
		
</script>
<script type="text/javascript">
	function ajaxFileUpload()
{
	var fileextension=/(\.jpg|\.gif|\.png|\.JPG|\.GIF|\.PNG|\.jpeg|\.JPEG)$/;
	$("#ploading").ajaxStart(function(){
			$(this).show();
		}).ajaxComplete(function(){
			$(this).hide();
		});
		alert($('#image').val(''));
	$('#image').val('');	
	if($('#file').val().match(fileextension)){
		alert("sdf");
	$.ajaxFileUpload
	(
		{
			url:'users/uploadimage',
			secureuri:false,
			fileElementId:'file',
			dataType: 'json',
			success: function (data, status)
			{
				if(typeof(data.error) != 'undefined') {
					if(data.error != '')
						alert(data.error);
				} else {
					$('#user_logo').val(data.msg);
					$('#mylogo').show();
					$('#delme').show();
					$('#mylogo2').hide();
					$('#mylogo').html('<img src="<?php echo BASE_URL.'img/users/small/'; ?>'+data.msg+'" height="30" width="50" >');
					
					//window.location="newuploadimage";	
					/*$.fancybox({ 
					 'width'    : '9',
					 'height'   : '6',
					 'autoScale'   : false,
					 'href'    : 'newuploadimage',					
					 'type'    : 'iframe',					 
					 'centerOnScroll' : true,
					 'onClosed'   : function() {changeimg();}
					});	*/
									
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

function scat(){
	var logodel=$('#user_logo').val()
		$.ajax({
		type: "POST",
		data: "imgval="+logodel,
		url: "users/delimage",
		success: function(msg){
			$('#mylogo').hide();
			$('#mylogo2').show();
			$("#hai").css({'width' : '140px', 'padding-top' : '0px'})
			$("#delme").hide();
			$('#display').show();
				
		}});
	}
		
</script>
   
  <script>
	 function insRow(){
		var last_row=document.getElementById("add_rows").rowIndex;
		if(last_row < 150){		
			var x=document.getElementById('myTable').insertRow(last_row);
			var ax=document.getElementById('resp').value ;
			var a=x.insertCell(0);	
			var w=x.insertCell(1);
			a.align='left';
			w.align='left';	
			a.innerHTML='<input type="text"  class="team'+ax+' validate[required] text" name="resp[]"  placeholder="Responsibilities" style="width:425px;padding:2px; margin-bottom:10px;" >';
		//w.innerHTML='<?php // echo $this->html->link('Delete',array('onclick'=>'deleteRow(this.parentNode.parentNode.rowIndex)','style'=>'cursor:pointer;','class'=>'btn btn-mini btn-primary')); ?>';
		w.innerHTML='<!--<a onClick="deleteRow(this.parentNode.parentNode.rowIndex)" style="cursor:pointer;" class="btn btn-mini btn-primary"> <?php //echo __("Delete");?></a>-->';
			var comvalue=parseInt(ax)+1;
			document.getElementById('name').value=comvalue;
		}else{
			alert("you can add only 5 keywords.");
		}
	}
	function deleteRow(w){							
				document.getElementById('myTable').deleteRow(w);
	}
	
	/*$('.resume-config-tabs a').click(function (e) {
  if($(this).attr("id")=='o')
  e.preventDefault();
  $(this).tab('show');
  elseif($(this).attr("id")=='c')
})

$('.sub-config a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})*/
	
	
	</script>
    
    
