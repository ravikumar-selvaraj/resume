<style>
.class
{
	position:relative;
	top:15px;
}
</style>
 <div id="prof_exp" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="form-inline" name="update" action="<?php echo Router::url('/'); ?>users/exp" method="post" style="margin-bottom:0px;" enctype="multipart/form-data">
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <input type="hidden" name="data[responsibility]"  value="" />
      <h2 id="myModalLabel" class="forh2"><?php echo __("Professional Experience");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;" >
    
      <div class="control-group" id="job_title_new_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:310px; font-size:14px;font-family:arial;font-weight: bold;"><?php echo __("Job Title");?></label>       
        <div class="controls">
          <input type="text" id="job_title_new" name="data[job_title]" style="padding:2px; margin-right:25px;">
          <div id="ploading" style="display:none; float:right; width:100px;"><?php echo $this->html->image('loading.gif',array());?>Loading....</div>
        <div class="cp-bl" id="mylogo2">
        <input name="userlogofile" type="file" id="userlogofile" value="" class="box upload hai"  onchange="return ajaxFile();"  >
        
        <input type="submit" id="submiti" name="upload" value="upload" class="cp-bl-bu" style="display:none;float:right;cursor:pointer;" >  
       
        </div>
        
        
        <div id="mylogo">
        <input type="hidden" name="data[logo]" id="mylogos" value=""  />
        </div>
        
          <span class="help-inline" id="job_title_new_div_error"></span> </div>
      </div>
	  
	  
      
      <div class="control-group" id="company_val_div">
        <label class="control-label" for="inputInfo" id="prof"><?php echo __("Company");?></label>
        <label class="control-label" for="inputInfo" id="prof"><?php echo __("Contract Type(Optional)");?></label>
        <div class="controls">
          <input type="text"  id="company_val" name="data[company]" style="padding:2px; margin-right:25px;">
        
          <select name="data[contract_type]" id="" style="height:26px;">
            <option value=""><?php echo __("Contract Type(Optional)");?></option>
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
          <input type="text"  id="city" name="data[city]" style="padding:2px; margin-right:25px;">
          
          <select name="data[country]" id="country" style="width:225px;height:26px;">
             <option value="" ><?php echo __("Country");?></option>  
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
          <input type="text"  id="start_date" name="data[start_date]" style="padding:2px; margin-right:25px;">
          <input type="text"  id="end_date" name="data[end_date]" style="padding:2px; margin-right:25px;">
          <span class="help-inline" id="date_div_error"></span> </div>
      </div>
      
      <div class="control-group">
        <label class="control-label" for="inputInfo" id="prof"><?php echo __("Responsibilities");?></label>
        <div class="controls">
          <table border="0" align="left" cellpadding="0" cellspacing="0" id="myTable" width="100%" class="miletab" >
            <tr>
              <td align="left" valign="middle" width="1%"><input type="text" id="resp" name="resp[]" class="team"  style="width:425px;padding:2px; margin-bottom:10px;"  >
                
                <input name="team1[]" maxlength="30" type="hidden" id="name23" value="fds" class="team" /></td>
              <td align="left" valign="top" width="1%">
              <a onclick="insRow()" style="cursor:pointer;" class="btn btn-mini btn-primary" id="delmy">
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
     
     <!-- <label class="checkbox" style="display:block;">-->
        <input type="hidden" name="data[display_home]" value="1">
        <!--<span style="margin-left:5px; float:left; font-size:12px;"><?php //echo __("Display on home page");?></span>--> </label>
      <button type="submit" id="exp_btn" class="btn btn-primary "><?php echo __("Submit");?></button>
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
			 top : 20
		 });
		 $(".display").css({'width' : '150px', 'padding-top' : '0px','top':'2px','left':'390px'});
		  });
		 
		
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
			a.innerHTML='<input type="text"  class="team'+ax+' validate[required] text" name="resp[]"  style="width:425px;padding:2px; margin-bottom:10px;" >';
		w.innerHTML='<?php  echo $this->html->link('Delete',array('onclick'=>'deleteRow(this.parentNode.parentNode.rowIndex)','style'=>'cursor:pointer;','class'=>'btn btn-mini btn-primary','id'=>'delmy')); ?>';
		w.innerHTML='<a onClick="deleteRow(this.parentNode.parentNode.rowIndex)" style="cursor:pointer;" class="btn btn-mini btn-primary" id="delmy"> <?php echo __("Delete");?></a>';
			var comvalue=parseInt(ax)+1;
			document.getElementById('name23').value=comvalue;
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
	
 function ajaxFile(){
	var fileextension=/(\.jpg|\.gif|\.png|\.JPG|\.GIF|\.PNG|\.jpeg|\.JPEG)$/;	
	$('#ploading').show();
	$('#mylogo2').hide();
	if($('#userlogofile').val().match(fileextension)){		
	$.ajaxFileUpload
	(
		{
			url:'<?php echo BASE_URL;?>users/uploadexpimage',
			secureuri:false,
			fileElementId:'userlogofile',
			dataType: 'json',
			success: function (data, status)
			{
				if(typeof(data.error) != 'undefined') {
					if(data.error != '')
						alert(data.error);
				} else {										
					if(data.msg=='success'){
						$('#mylogo2').html('<img src="<?php echo BASE_URL;?>img/users/small/'+data.image+'" style="width:40px;height:50px"/><span id="delme1"><a id="deluploadlogo" style="cursor:pointer; color:#f00;margin:0 0 0 10px;"><?php echo $this->Html->image('delete.png',array('width'=>'16','height'=>'12'));?></a></span>');
						$('#mylogos').val(data.image);
						$('#ploading').hide();
						$('#mylogo2').show();
						$('#mylogo2').css({'width':'80px', 'position':'relative', 'float':'right','bottom':'25px'});
						//$('#makeheight').css({'height':'25px'});
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
	 
	 $('#deluploadlogo').live('click',function(){
		 $.ajax({
		type: "POST",
		url: "<?php echo BASE_URL; ?>users/deluploadlogo",
		success: function(msg){
			$('#makeheight').css({'height':'70px'});
			$('#mylogo2').html(msg);
			 $("input.upload").filestyle({ 	
			 image: "<?php echo BASE_URL; ?>img/cp.png",
			 imageheight : 50,
			 imagewidth : 146,
			 width : 150,
			 top : 20
		 });
			 $(".display").css({'width' : '150px', 'padding-top' : '0px','text-align':'none'});	
			  $("#mylogo2").css({'width' : '150px'});	
		}});
	 });
	</script>
    
<script type="text/javascript">


function scat(){
	var logodel=$('#user_logo').val();
	
		$.ajax({
		type: "POST",
		data: "imgval="+logodel,
		url: "<?php echo BASE_URL; ?>users/delimage",
		success: function(msg){
			$('#mylogo').hide();
			$('#mylogo2').show();
			//$(".hai").css({'width' : '140px', 'padding-top' : '0px','top' :'15px'})
			$("#delme").hide();
			$('.display').show();
			//$(".display").css({'width' : '150px', 'padding-top' : '0px','top' :'2px'})
				
		}});
	}
		
</script>    
    
