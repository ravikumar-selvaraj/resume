<?php echo $this->Element('side1');?>
<!-- <div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="prof_exp" style="display:block ;">-->

<div id="prof_exp" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form class="form-inline" name="update" action="<?php echo BASE_URL;?>/pages/slide" method="post">
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px;"><?php echo __("Professional Experience");?></h2>
    </div>
    <div class="modal-body" style="max-height:none; padding-top:0px;" >
      <div class="control-group" id="whoru">
        <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:14px;font-family: arial; font-size: 16px;font-weight: bold;"><?php echo __("Job Title");?></label>
        <div class="controls">
          <input type="text" placeholder="Job Title" id="user_first_name" name="data[job_title]" style="padding:2px; margin-right:25px;">
          <button type="submit" id="signup_btn" class="btn btn-primary " style="margin-left:120px;"><?php echo __("Insert Logo");?></button>
          <span class="help-inline" id="whoru_error"></span> </div>
      </div>
      <div class="control-group" id="whoru">
        <label class="control-label" for="inputInfo" id="prof"><?php echo __("Company");?></label>
        <label class="control-label" for="inputInfo" id="prof"><?php echo __("Contract Type(Optional)");?></label>
        <div class="controls">
          <input type="text" placeholder="Company" id="company" name="data[company]" style="padding:2px; margin-right:25px;">
          <select name="data[contract_type]" id="contract_type" style="height:26px;">
            <option value="Mr."><?php echo __("Mr.");?></option>
            <option value="Miss."><?php echo __("Miss.");?></option>
            <option value="Mrs."><?php echo __("Mrs.");?></option>
          </select>
          <span class="help-inline" id="whoru_error"></span> </div>
      </div>
      <div class="control-group" id="whoru">
        <label class="control-label" for="inputInfo" id="prof1"><?php echo __("City");?></label>
        <label class="control-label" for="inputInfo" id="prof1" style="float:right"><?php echo __("State");?></label>
        <label class="control-label" for="inputInfo" id="prof1" style="float:right"><?php echo __("Country");?></label>
        <div class="controls">
          <input type="text" placeholder="City" id="user_first_name" name="data[firstname]" style="padding:2px; margin-right:25px;">
          <select name="data[website]" id="user_gender" style="width:125px;height:26px;">
            <option value="Mr."><?php echo __("Mr.");?></option>
            <option value="Miss."><?php echo __("Miss.");?></option>
            <option value="Mrs."><?php echo __("Mrs.");?></option>
          </select>
          <select name="data[country]" id="user_gender" style="width:125px;height:26px;">
            <option value="Mr."><?php echo __("Mr.");?></option>
            <option value="Miss."><?php echo __("Miss.");?></option>
            <option value="Mrs."><?php echo __("Mrs.");?></option>
          </select>
          <span class="help-inline" id="whoru_error"></span> </div>
      </div>
      <div class="control-group" id="whoru">
        <label class="control-label" for="inputInfo" id="prof"><?php echo __("Start Date");?></label>
        <label class="control-label" for="inputInfo" id="prof"><?php echo __("End Date");?></label>
        <div class="controls">
          <input type="text" placeholder="Start Date" id="user_first_name" name="data[start_date]" style="padding:2px; margin-right:25px;">
          <input type="text" placeholder="End Date" id="user_first_name" name="data[end_date]" style="padding:2px; margin-right:25px;">
          <span class="help-inline" id="whoru_error"></span> </div>
      </div>
      <div class="control-group" id="whoru">
        <label class="control-label" for="inputInfo" id="prof"><?php echo __("Responsibilities");?></label>
        <div class="controls">
          <table border="0" align="left" cellpadding="0" cellspacing="0" id="myTable" width="100%" class="miletab" >
            <tr>
              <td align="left" valign="middle" width="1%"><input type="text" id="resp" name="resp[]" class="team" placeholder="Responsibilities" style="width:425px;padding:2px; margin-bottom:10px;"  >
                
                <!--<input name="team1[]" maxlength="30" type="hidden" id="" value="fds" class="team" />--></td>
              <td align="left" valign="top" width="1%"><a onClick="insRow()" style="cursor:pointer;"> <?php echo $this->html->image('add.png'); ?> </a><br /></td>
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
      <label class="checkbox" style="display:block;padding-bottom:5px;">
        <input type="checkbox" id="terms">
        I have read and I accept the <a href="">Terms of Service</a> and the <a href="">Privacy Policy</a> <span class="help-inline" id="terms_error"></span> </label>
      <label class="checkbox" style="display:block;">
        <input type="checkbox" name="data[newsletter]">
        <?php echo __("I'd like to subscribe to CVomg newsletter");?> </label>
      <button type="submit" id="useractive_btn" class="btn btn-primary "><?php echo __("Submit resume");?></button>
    </div>
    
    <!--</div>-->
  </form>
</div>
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
			w.innerHTML='<?php echo $this->html->image('bullet_delete.png',array('onclick'=>'deleteRow(this.parentNode.parentNode.rowIndex)','style'=>'cursor:pointer;')); ?>';
			var comvalue=parseInt(ax)+1;
			document.getElementById('name').value=comvalue;
		}else{
			alert("you can add only 5 keywords.");
		}
	}
	function deleteRow(w){							
				document.getElementById('myTable').deleteRow(w);
	}
	</script>