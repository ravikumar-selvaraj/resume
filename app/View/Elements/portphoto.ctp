<div id="port_photo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:440px;">
<form class="form-inline" name="update" action="<?php echo Router::url('/'); ?>portfolio/portfolios" method="post" enctype="multipart/form-data" style="margin-bottom:0px;width:440px;">
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h2 id="myModalLabel"  class="forh2"><?php echo __("Portfolio Photo");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;width:500px;" >
    
      <div class="control-group" id="image_title_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:14px;font-family: arial; font-size: 16px;font-weight: bold;"><?php echo __("Image Title");?></label>
        <div class="controls">
          <input type="text" id="image_title" name="data[title]" style="padding:2px; margin-right:25px; width:345px;">          
           
		</div><span class="help-inline" id="image_title_div_error"></span>
      </div>
      
      <div class="control-group" id="port_image_div">
                   <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:12px;font-family: arial; font-size: 12px;font-weight: bold;"><?php echo __("Upload Photo");?></label>
                    <div class="controls">
                    <?php //echo $this->Html->image('avatar_cp.jpg',array('border'=>0,'alt'=>'Resume','width'=>'70','height'=>'70','class'=>'profile-photo','style'=>'border:1px solid #ccc')); ?> 
                    <input type="file" id="portfolio_image" name="data[image]"> <br  />
                    <span class="imgalert" style="padding-left:1px;">(Image size 250 X 250 as jpeg,png format)</span>
                      <span class="help-inline" id="port_image_div_error"></span> </div>
                  </div>
    </div>
    <div class="modal-footer">
     
      <label class="checkbox" style="display:block;">
        <input type="hidden" value="1" name="data[display]">
        <!--<span style="margin-left:5px; float:left; font-size:12px;"><?php echo __("Display on Homepage");?></span>--> </label>
      <button type="submit" id="port_photo_btn23" class="btn btn-primary " name="submit"><?php echo __("Submit");?></button>
    </div>
    <!--</div>-->
  </form>
   </div>