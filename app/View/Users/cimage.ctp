<?php 
if($exp['Experience']['logo']!=''){
	echo $this->Html->image('users/small/'.$exp['Experience']['logo'],array('height'=>'30','width'=>'50','style'=>'float:left'));
	?>
    <div id="delme1"><a id="delimg<?php echo $exp['Experience']['eid'];?>" rel="<?php echo $exp['Experience']['eid'];?>" style="cursor:pointer; color:#f00;float:left;margin:0 0 0 10px;"><?php echo $this->Html->image('delete.png',array('width'=>'18','height'=>'18'));?></a></div>
    <script type="text/javascript">
	$('#delimg<?php echo $exp['Experience']['eid'];?>').click(function(){
		$.ajax({
			type: "POST",
			data: "id=<?php echo $exp['Experience']['eid'];?>",
			url: "<?php echo BASE_URL;?>users/delimage",
			success: function(msg){
				$.ajax({
					type: "POST",
					data: "eid=<?php echo $exp['Experience']['eid'];?>",
					url: "<?php echo BASE_URL;?>users/cimage",
					success: function(msg){
						$('#editexp<?php echo $exp['Experience']['eid'];?>').children().find('.exp_image').html(msg);
					}
				});
			}
		});
	});
	</script>
    <?php
}else{
	?>
    <div id="ploading" style="display:none;"><?php echo $this->html->image('loading.gif',array());?>Loading....</div>
    <input name="file" type="file" id="file2" class="box" onchange="return ajaxFileUpload();"/>
    <!--<input name="upid" type="hidden" value="<?php //echo $exp['Experience']['eid'];?>" id="upid"/>-->
    <script type="text/javascript">
	$(function() {
		$("input#file2").filestyle({ 	
			 image: "<?php echo BASE_URL;?>/img/cp.png",
			 imageheight : 50,
			 imagewidth : 146,
			 width : 150
		 });
	 });
	 function ajaxFileUpload(){
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
			url:'<?php echo BASE_URL;?>users/uploadimage/<?php echo $exp['Experience']['eid'];?>',
			secureuri:false,
			fileElementId:'file2',
			dataType: 'json',
			success: function (data, status)
			{
				if(typeof(data.error) != 'undefined') {
					if(data.error != '')
						alert(data.error);
				} else {					
					if(data.msg=='success'){
						$.ajax({
						type: "POST",
						data: "eid="+data.id,
						url: "<?php echo BASE_URL;?>users/cimage",
						success: function(msg){
							$('#editexp'+data.id).children().find('.exp_image').html(msg);
						}
					});
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
    <?php
}
?>