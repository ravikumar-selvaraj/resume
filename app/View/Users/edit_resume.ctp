
<?php if($this->params['pass'][0]=='experience') {?>
<div data-backdrop="static" data-keyboard="false" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="update-resume" style="display:block ;">




<?php 	$exp=ClassRegistry::init('Experience')->find('first',array('conditions'=>array('key'=>$this->params['pass'][1]))); 
$catlist=ClassRegistry::init('Country')->find('all',array('conditions'=>array(''))); 	
//pr($new);
?>
<form class="form-inline" name="update" action="<?php echo BASE_URL;?>users/edit_resume/<?php echo $this->params['pass'][0]?>" method="post">
<div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">

<input type="hidden" name="data[responsibility]"  value="" />
<h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px;"><?php echo __("Professional Experience");?></h2>
</div>

<div class="modal-body" style="padding-top:0px;" >
<div class="pull-right">
<?php 
if(!empty($exp['Experience']['logo']))
echo $this->Html->image('users/small/'.$exp['Experience']['logo'],array('border'=>0,'width'=>'50','height'=>'50','alt'=>'Logo','class'=>''));
?>
</div>
<div class="control-group" id="job_title_div">
<label class="control-label" for="inputInfo" id="prof" style="width:310px; font-size:14px;font-family:arial;font-weight: bold;"><?php echo __("Job Title");?></label>
<div id="delme" style="display:none; float:left; width:50px;"><a id="delimg" onclick="return scat();" style="cursor:pointer; color:#foo"><img src="<?php echo Router::url('/'); ?>img/delete.png" /></a></div>
<div class="controls">
<input type="text" placeholder="Job Title" id="job_title" name="data[job_title]" value="<?php echo $exp['Experience']['job_title'];?>" style="padding:2px; margin-right:25px;">
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
<input type="text" placeholder="Company" id="company_val" name="data[company]" style="padding:2px; margin-right:25px;" value="<?php echo $exp['Experience']['company'];?>">

<select name="data[contract_type]" id="" style="height:26px;">
<option value="Employed" <?php if($exp['Experience']['contract_type']=='Employed')echo 'selected="selected"'; ?>><?php echo __("Employed");?></option>
<option value="Full-time" <?php if($exp['Experience']['contract_type']=='Full-time')echo 'selected="selected"'; ?>><?php echo __("Full-time");?></option>
<option value="Part-time" <?php if($exp['Experience']['contract_type']=='Part-time')echo 'selected="selected"'; ?>><?php echo __("Part-time");?></option>
<option value="Internship" <?php if($exp['Experience']['contract_type']=='Internship')echo 'selected="selected"'; ?>><?php echo __("Internship");?></option>
<option value="Temporary Work" <?php if($exp['Experience']['contract_type']=='Temporary Work')echo 'selected="selected"'; ?>><?php echo __("Temporary Work");?></option>
<option value="Apprenticeship" <?php if($exp['Experience']['contract_type']=='Apprenticeship')echo 'selected="selected"'; ?>><?php echo __("Apprenticeship");?></option>
<option value="Cooperative Education Work" <?php if($exp['Experience']['contract_type']=='Cooperative Education Work')echo 'selected="selected"'; ?>><?php echo __("Cooperative Education Work");?>  </option>
<option value="Consultant" <?php if($exp['Experience']['contract_type']=='Consultant')echo 'selected="selected"'; ?>><?php echo __("Consultant");?></option>
<option value="Student Project" <?php if($exp['Experience']['contract_type']=='Student Project')echo 'selected="selected"'; ?>><?php echo __("Student Project");?></option>
<option value="Volunteer Work" <?php if($exp['Experience']['contract_type']=='Volunteer Work')echo 'selected="selected"'; ?>><?php echo __("Volunteer Work");?></option>
<option value="Freelancer" <?php if($exp['Experience']['contract_type']=='Freelancer')echo 'selected="selected"'; ?>><?php echo __("Freelancer");?></option>
<option value="Temporary Replacement" <?php if($exp['Experience']['contract_type']=='Temporary Replacement')echo 'selected="selected"'; ?>><?php echo __("Temporary Replacement");?></option>
<option value="OTHER" <?php if($exp['Experience']['contract_type']=='OTHER')echo 'selected="selected"'; ?>><?php echo __("Other");?></option>
</select>
<span class="help-inline" id="company_val_div_error"></span> </div>
</div>

<div class="control-group" id="city_div">
<label class="control-label" for="inputInfo" id="prof"><?php echo __("City");?></label>
<label class="control-label" for="inputInfo" id="prof" style="float:left"><?php echo __("Country");?></label>

<div class="controls">
<input type="text" placeholder="City" id="city" name="data[city]" style="padding:2px; margin-right:25px;" value="<?php echo $exp['Experience']['city'];?>">


<select name="data[country]" id="country" style="width:225px;height:26px;">
<option value="">[-- <?php echo __("Select",true);?> --]</option>
<?php 
foreach($catlist as $cat):
if($cat['Country']['iso_code2']==$exp['Experience']['country']){ $sel = ' selected="selected"'; $couid = $cat['Country']['country_id'];} else { $sel = ''; $couid ='';}
echo '<option value="'.$cat['Country']['iso_code2'].'" '.$sel.'>'.$cat['Country']['country_name'].'</option>';			
endforeach;
?>
</select>
<span class="help-inline" id="city_div_error"></span> </div>
</div>

<div class="control-group" id="date_div">
<label class="control-label datepicker" for="inputInfo" id="prof"><?php echo __("Start Date");?></label>
<label class="control-label datepicker" for="inputInfo" id="prof"><?php echo __("End Date");?></label>
<div class="controls">
<input type="text" placeholder="Start Date" id="start_date" name="data[start_date]" style="padding:2px; margin-right:25px;" value="<?php echo $exp['Experience']['start_date'];?>">
<input type="text" placeholder="End Date" id="end_date" name="data[end_date]" style="padding:2px; margin-right:25px;" value="<?php echo $exp['Experience']['end_date'];?>">
<span class="help-inline" id="date_div_error"></span> </div>
</div>

<div class="control-group">
<label class="control-label" for="inputInfo" id="prof"><?php echo __("Responsibilities");?></label>
<div class="controls">
<table border="0" align="left" cellpadding="0" cellspacing="0" id="myTable" width="100%" class="miletab" >
<tr>
<td align="left" valign="middle" width="1%">
<?php $sp=explode(',',$exp['Experience']['responsibility']) ;
$i=0;
foreach($sp as $sp1) {?>
<?php //echo $sp1; ?>

<input type="text" id="resp" name="resp[]" class="team" placeholder="Responsibilities" style="width:425px;padding:2px; margin-bottom:10px;" value=" <?php echo $sp1; ?>" >

<?php $i++;}?>        


<!--<input name="team1[]" maxlength="30" type="hidden" id="" value="fds" class="team" />--></td>
<td align="left" valign="top" width="1%"><a onclick="insRow()" style="cursor:pointer;" class="btn btn-mini btn-primary">
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


<button type="submit" id="exp_btn" class="btn btn-primary" name="exp"><?php echo __("Save");?></button>
<a 	href="<?php echo BASE_URL.$new['User']['username']?>">
<input class="btn btn-inverse" type="button" id="edit_cont_out" value="Cancel" />
</a>
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
$('#image').val('');	
if($('#file').val().match(fileextension)){
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
w.innerHTML='<a onClick="deleteRow(this.parentNode.parentNode.rowIndex)" style="cursor:pointer;" class="btn btn-mini btn-primary"> <?php echo __("Delete");?></a>';
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


<?php } else if($this->params['pass'][0]=='education')
 { ?>
<div data-backdrop="static" data-keyboard="false" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="update-resume" style="display:block ;">
<div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
<h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px;"><?php echo __("Education");?></h2>
</div>
		
		
			<form class="form-horizontal" name="Add-Education" action="<?php echo BASE_URL;?>users/edit_resume/<?php echo $this->params['pass'][0]?>" method="post">
			
				<?php $edu=ClassRegistry::init('Education')->find('first',array('conditions'=>array('key'=>$this->params['pass'][1]))); ?>
				<input type="hidden" name="data[eid]" value="<?php echo $edu['Education']['eid'];?>"  />
			<div class="modal-body" id="for_education_edit">
				<div class="control-group" id="degree_program_div">
				<label class="control-label" for="inputInfo"><?php echo __("Degree Program");?></label>
				<div class="controls">
				<input type="text" id="course" name="data[course]" value="<?php echo $edu['Education']['course'];?>">
				<span class="help-inline" id="degree_program_error"></span>
				</div>
				</div>
				
				<div class="control-group" id="school_div">
				<label class="control-label" for="inputInfo"><?php echo __("School");?></label>
				<div class="controls">
				<input type="text" id="organization" name="data[organization]" value="<?php echo $edu['Education']['organization'];?>">
				<span class="help-inline" id="school_error"></span>
				</div>
				</div>
				
				<div class="control-group" id="edu_start_date_div">
				<label class="control-label" for="inputInfo"><?php echo __("Start Date");?></label>
				<div class="controls">
				<input type="text" id="edu_start_date" name="data[start_date]" value="<?php echo $edu['Education']['start_date'];?>">
				<span class="help-inline" id="edu_start_date_error"></span>
				</div>
				</div>
				
				<div class="control-group" id="edu_end_date_div">
				<label class="control-label" for="inputInfo"><?php echo __("End Date");?></label>
				<div class="controls">
				<input type="text" id="edu_end_date" name="data[end_date]" value="<?php echo $edu['Education']['end_date'];?>">
				<span class="help-inline" id="edu_end_date_error"></span>
				</div>
				</div>
				
				<div class="control-group" id="edu_desc_div">
				<label class="control-label" for="inputInfo"><?php echo __("Short Description");?></label>
				<div class="controls">
				<textarea id="edu_desc" name="data[edu_desc]"><?php echo $edu['Education']['desc'];?></textarea>
				<span class="help-inline" id="edu_desc_error"></span>
				</div>
				</div>
				
				<?php $sp=explode(',',$edu['Education']['extra_curricular']) ;
				$i=0;
				foreach($sp as $sp1) {?>
				<div class="control-group" id="detais_div_<?php echo $i;?>">
				<label class="control-label" for="inputInfo"><?php echo __("Details");?></label>
				<div class="controls">				
				<input type="text" id="extra_curricular" name="data[extra_curricular][]" value=" <?php echo $sp1; ?>"  />
				<a id="extra_delete_btn_<?php echo $i;?>" class="btn btn-mini btn-primary"><?php echo __("Delete");?></a>
				<?php if($i==0) {?>
				
				<a id="extra_edit_btn" class="btn btn-mini btn-primary"><?php echo __("Add");?></a>
				<?php  }   ?>
														  
				
				<span class="help-inline" id="details_error"></span>
				</div>
				
				</div>
				<?php $i++;}?>
				
				
				<div class="modal-footer">
					<button type="submit" id="exp_btn" class="btn btn-primary" name="edu"><?php echo __("Save");?></button>
					<a 	href="<?php echo BASE_URL.$new['User']['username']?>"><input class="btn btn-inverse" type="button" id="edit_cont_out" value="Cancel" /></a>
				</div> 
				 </div>     
        </form>
		
</div>
<script type="text/javascript">
$("#extra_edit_btn").click(function(){			
							$("#for_education_edit div:last").before('<div class="control-group" id="detais_div"><label class="control-label" for="inputInfo"><?php echo __("Details");?></label><div class="controls"><input type="text" id="extra_curricular" name="data[extra_curricular][]" /><span class="help-inline" id="details_error"></span><a id="extra_delete_btn" class="btn btn-mini btn-primary"><?php echo __("Delete");?></a></div></div>');
							return false;
					});
</script>
<?php }
 else if($this->params['pass'][0]=='skills')
  { 
 $skill=ClassRegistry::init('Skill')->find('first',array('conditions'=>array('key'=>$this->params['pass'][1]))); 
 //pr($skill);
 ?>
<div data-backdrop="static" data-keyboard="false" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="update-resume" style="display:block ;">
<div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
<h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px;"><?php echo __("Skills");?></h2>
</div>
        <form class="form-horizontal" name="Add-Education" action="<?php echo BASE_URL;?>users/edit_resume/<?php echo $this->params['pass'][0]?>" method="post">
        <input type="hidden" name="data[sid]" value="<?php echo $skill['Skill']['sid'];?>"  />
         <div class="control-group" id="skill_area_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Skill Area");?></label>
                                        <div class="controls">
                                            <input type="text" id="skill_area" name="data[skill_area]" value="<?php echo $skill['Skill']['skill_area']?>">                                             
											 <span class="help-inline" id="skill_area_error"></span>
                                        </div>
                                    </div>
									
									<div class="control-group" id="skill_val_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Skill");?></label>
                                        <div class="controls">
											<?php $sp=explode(',',$skill['Skill']['skills']) ;
                                            $i=0;
                                            foreach($sp as $sp1) {?>
                                            <?php //echo $sp1; ?>
                                            
                                            <input type="text" id="skill_val" name="data[skill][]" value=" <?php echo $sp1; ?>" >
                                            
                                            <?php $i++;}?>  
                                                                               
											 <a id="skill_add_btn" class="btn btn-mini btn-primary"><?php echo __("Add");?></a>
											 <span class="help-inline" id="skill_val_error"></span>
                                        </div>
                                    </div>
        <div class="control-group"> </div>
        <div class="modal-footer">


<button type="submit" id="exp_btn" class="btn btn-primary" name="skill"><?php echo __("Save");?></button>
<a 	href="<?php echo BASE_URL.$new['User']['username']?>">
<input class="btn btn-inverse" type="button" id="edit_cont_out" value="Cancel" />
</a>
</div>
       
        </form>
</div>
<?php }
 else if($this->params['pass'][0]=='interest'){

 
 $int=ClassRegistry::init('Interest')->find('first',array('conditions'=>array('key'=>$this->params['pass'][1]))); 
 //pr($int);
 ?>
<div data-backdrop="static" data-keyboard="false" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="update-resume" style="display:block ;">
<div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
<h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px;"><?php echo __("Interest");?></h2>
</div>
        <form class="form-horizontal" name="Add-Education" action="<?php echo BASE_URL;?>users/edit_resume/<?php echo $this->params['pass'][0]?>" method="post">
        <input type="hidden" name="data[iid]" value="<?php echo $int['Interest']['iid'];?>"  />
         <div class="control-group" id="int_type_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Type of interest");?></label>
                                        <div class="controls">
                                        <select  id="interest_type" name="data[interest_type]" >
                                        
                                        <option value="Travel" <?php if($int['Interest']['interest_type']=='Travel')echo 'selected="selected"'; ?>><?php echo __("Travel");?></option>
                                        <option value="Music" <?php if($int['Interest']['interest_type']=='Music')echo 'selected="selected"'; ?>><?php echo __("Music");?></option>
                                        <option value="Sports"<?php if($int['Interest']['interest_type']=='Sports')echo 'selected="selected"'; ?>><?php echo __("Sports");?></option>
                                        <option value="Literature" <?php if($int['Interest']['interest_type']=='Literature')echo 'selected="selected"'; ?>><?php echo __("Literature");?></option>
                                        <option value="Film" <?php if($int['Interest']['interest_type']=='Film')echo 'selected="selected"'; ?>><?php echo __("Film");?></option>
                                        <option value="Art" <?php if($int['Interest']['interest_type']=='Art')echo 'selected="selected"'; ?>><?php echo __("Art");?></option>
                                        <option value="Around Town" <?php if($int['Interest']['interest_type']=='Around Town')echo 'selected="selected"'; ?>><?php echo __("Around Town");?></option>
                                        <option value="Other"<?php if($int['Interest']['interest_type']=='Other')echo 'selected="selected"'; ?>><?php echo __("Other");?></option>
                                        </select>
                                             <span class="help-inline" id="int_type_error"></span>
                                        </div>
                                    </div>
							
                            <div class="control-group" id="interest_div">
                                        <label class="control-label" for="inputInfo"><?php echo __("Interest");?></label>
                                        <div class="controls">
                                        <?php $sp=explode(',',$int['Interest']['interest']) ;
                                            $i=0;
                                            foreach($sp as $sp1) {?>
                                            <?php //echo $sp1; ?>
                                            
                                            <input type="text" id="interest" name="data[interest][]" value=" <?php echo $sp1; ?>" >
                                            
                                            <?php $i++;}?> 
                                                                                    
											 <a id="interest_add_btn" class="btn btn-mini btn-primary"><?php echo __("Add");?></a>
											 <span class="help-inline" id="interest_error"></span>
                                        </div>
                                    </div>		
									
        <div class="control-group"> </div>
        <div class="modal-footer">


<button type="submit" id="exp_btn" class="btn btn-primary" name="int"><?php echo __("Save");?></button>
<a 	href="<?php echo BASE_URL.$new['User']['username']?>">
<input class="btn btn-inverse" type="button" id="edit_cont_out" value="Cancel" />
</a>
</div>
       
        </form>
</div>

<?php }?>



