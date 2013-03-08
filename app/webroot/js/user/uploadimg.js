	 
	 function exp_div_show(i,j){
		 $("#"+i).show();
		 $("#"+j).show();
	 }
	 function exp_div_hide(i,j){
		 $("#"+i).hide();
		 $("#"+j).hide();
	 }
	 
	/*$('.exptab').live('click',function(){
		var news = $(this).parents('table').attr('class');
		$('.'+news+' tr:last').after('<tr><td><input type="text"  class="team validate[required] text" name="resp[]"  placeholder="Responsibilities" style="width:425px;padding:2px; margin-bottom:10px;" ></td><td><!--<span class="exptd">Delete</span>--></td></tr>');
	});
	
	$('.exptd').live('click',function(){
	$(this).parents('tr').remove();
});*/

	/*$('.exptab').click(function(){
		var news = $(this).parents('table').attr('class');
		$('.'+news+' tr:last').after('<tr><td><input type="text"  class="team validate[required] text" name="resp[]"  placeholder="Responsibilities" style="width:425px;padding:2px; margin-bottom:10px;" ></td><td><!--<span class="exptd">Delete</span>--></td></tr>');
	});
	
	$('.exptd').click(function(){
	$(this).parents('tr').remove();
});*/

/*function ajaxFileUpload()
{
	var fileextension=/(\.jpg|\.gif|\.png|\.JPG|\.GIF|\.PNG|\.jpeg|\.JPEG)$/;
	$(".ploading").ajaxStart(function(){
			$(this).show();
		}).ajaxComplete(function(){
			$(this).hide();
		});
		alert($('#image').val(''));
	$('#image').val('');	
	if($('#ditfile').val().match(fileextension)){
		alert("sdf");
	$.ajaxFileUpload
	(
		{
			url:'users/uploadimage',
			secureuri:false,
			fileElementId:'ditfile',
			dataType: 'json',
			success: function (data, status)
			{
				if(typeof(data.error) != 'undefined') {
					if(data.error != '')
						alert(data.error);
				} else {
					$('#edit_user_logo').val(data.msg);
					$('#edit_mylogo').show();
					$('#edit_delme').show();
					$('#edit_mylogo2').hide();
					$('#edit_mylogo').html('<img src="img/users/small/'+data.msg+'" height="30" width="50" >');
				
				}
			}			
		}
	)}else{
		$("#error").html("Oops..Please upload profile image").show(500);
	setTimeout(function(){  $('.error').hide(500); }, 5000); 
	$('#image').focus();
	}
	return false;
}*/


 
	function ajaxFileUpload1()
{
	alert("123456");
	var fileextension=/(\.jpg|\.gif|\.png|\.JPG|\.GIF|\.PNG|\.jpeg|\.JPEG)$/;
	$("#ploading1").ajaxStart(function(){
			$(this).show();
		}).ajaxComplete(function(){
			$(this).hide();
		});
	if($('#file2').val().match(fileextension)){
		alert("fds");
	$.ajaxFileUpload1
	(
		{	url:'users/uploadimage',
			secureuri:false,
			fileElementId:'file2',
			dataType: 'json',
			success: function (data, status)
			{
				if(typeof(data.error) != 'undefined') {
					if(data.error != '')
						alert(data.error);
				} else {
					$('#user_logoedit').val(data.msg);
					$('#mylogoedit').show();
					$('#delme1').show();
					$('#mylogo2edit').hide();
					$('#mylogoedit').html('<img src="img/users/small/'+data.msg+'" height="30" width="50" >');
					
					
									
				}
			}			
		}
	)}else{
		$("#edit_error").html("Oops..Please upload profile image").show(500);
	setTimeout(function(){  $('.error').hide(500); }, 5000); 
	$('#image').focus();
	}
	return false;
}

function scat1(){
	var logodel=$('#user_logoedit').val()
		$.ajax({
		type: "POST",
		data: "imgval="+logodel,
		url: "users/delimage",
		success: function(msg){
			$('#mylogoedit').hide();
			$('#mylogo2edit').show();
			$(".hai").css({'width' : '140px', 'padding-top' : '0px'})
			$("#delme1").hide();
			$('.display').show();
				
		}});
	}
	
/*function ajaxFileUpload()
{
	alert('test');
	var fileextension=/(\.jpg|\.gif|\.png|\.JPG|\.GIF|\.PNG|\.jpeg|\.JPEG)$/;	
	$(".ploading").ajaxStart(function(){
		$(this).show();
	}).ajaxComplete(function(){
		$(this).hide();
	});	
	if($('#file2').val().match(fileextension)){		
	$.ajaxFileUpload
	(
		{
			url:'users/uploadimage',
			secureuri:false,
			fileElementId:'ditfile',
			dataType: 'json',
			success: function (data, status)
			{
				if(typeof(data.error) != 'undefined') {
					if(data.error != '')
						alert(data.error);
				} else {
					$('#edit_user_logo').val(data.msg);
					$('#edit_mylogo').show();
					$('#edit_delme').show();
					$('#edit_mylogo2').hide();
					$('#edit_mylogo').html('<img src="img/users/small/'+data.msg+'" height="30" width="50" >');
				
				}
			}			
		}
	)}else{
		$("#error").html("Oops..Please upload profile image").show(500);
	setTimeout(function(){  $('.error').hide(500); }, 5000); 
	$('#image').focus();
	}
	return false;
}*/
		
