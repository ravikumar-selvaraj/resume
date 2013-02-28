 
 <div id="basic" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:440px;">
<form class="form-inline" name="update" action="<?php echo Router::url('/'); ?>users/userphoto" method="post" enctype="multipart/form-data" style="margin-bottom:0px;width:440px;">
<input type="hidden" name="data[uid]" value="<?php echo $_SESSION['User']['uid']; ?>" />
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h2 id="myModalLabel" style="font-size:16px; padding:0px; margin:0px;"><?php echo __("Add Basic Information Section");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;width:500px;" >
  
      <div class="control-group" id="users_image_div" style="height:110px;">
                  <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:14px;font-family: arial; font-size: 14px;font-weight: bold;"><?php echo __("Upload Photo");?></label>
                    <div class="controls">
                    <?php echo $this->Html->image('avatar_cp.jpg',array('border'=>0,'alt'=>'Resume','width'=>'70','height'=>'70','class'=>'profile-photo','style'=>'border:1px solid #ccc')); ?> 
                    <input type="file" placeholder="First Name" id="users_image" name="data[image]" style="padding:2px; margin: 15px 0px 0px 50px; height:26px;"> <br />
                      <span class="help-inline" id="users_image_div_error"></span> </div>
                  </div>
                  
      <div class="control-group" id="user_city_div">
        <label class="control-label" for="inputInfo" id="prof1"><?php echo __("City");?></label>
        <label class="control-label" for="inputInfo" id="prof1" style="float:left"><?php echo __("Country");?></label>
        <label class="control-label" for="inputInfo" id="prof1"><?php echo __("Zipcode");?></label>
        <div class="controls">
          <input type="text" placeholder="City" id="user_city" name="data[city]" style="padding:2px; margin-right:3px; width:125px;">
          
          <select name="data[country]" id="user_country" style="width:140px;height:26px;">
             <option value="" >[-Select country-]</option>  
                        <?php 
						  $i=1;
						  foreach ($catlist as $coun): ?>
                        <option value="<?php echo $coun['Country']['iso_code2']?>"><?php echo $coun['Country']['country_name']?></option>   
                        <?php $i++; endforeach; ?>
          </select>
          <input type="text" placeholder="Zip Code" id="user_zip" name="data[zip]" style="padding:2px; margin-right:15px; width:125px;">
          <span class="help-inline" id="user_city_div_error"></span> </div>
      </div>            
                  
    </div>
    <div class="modal-footer">
     
      <label class="checkbox" style="display:block;">
        <input type="checkbox" value="1" name="data[display]">
        <span style="margin-left:15px; float:left"><?php echo __("Display on Home page");?></span> </label>
      <button type="submit" id="user_basic_btn" class="btn btn-primary "><?php echo __("Submit");?></button>
    </div>
    
    <!--</div>-->
  </form>
   </div>