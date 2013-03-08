<div id="port_audio" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:440px;">
<form class="form-inline" name="update" action="<?php echo Router::url('/'); ?>portfolio/portaudio" enctype="multipart/form-data" method="post" style="margin-bottom:0px;width:440px;">
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h2 id="myModalLabel" style="font-size:16px; padding:0px; margin:0px;"><?php echo __("Portfolio Add Audio");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;width:500px;" >
    
      <div class="control-group" id="audio_title_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:14px;font-family: arial; font-size: 14px;font-weight: bold;"><?php echo __("Audio Title");?></label>
        <div class="controls">
          <input type="text" placeholder="Audio Title" id="audio_title" name="data[audio_title]" style="padding:2px; margin-right:25px; width:345px;">
           </div><span class="help-inline" id="audio_title_div_error"></span>
      </div>
      
      <div class="control-group" id="audio_file_div">
                   <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:12px;font-family: arial; font-size: 12px;font-weight: bold;"><?php echo __("Upload Audio File");?></label>
                    <div class="controls">
                    <?php //echo $this->Html->image('avatar_cp.jpg',array('border'=>0,'alt'=>'Resume','width'=>'70','height'=>'70','class'=>'profile-photo','style'=>'border:1px solid #ccc')); ?> 
                    <input type="file"  id="audio_file" name="data[audio_file]" style="padding:2px; margin: 5px 0px 0px 0px; height:26px;"> 
                       </div><span class="help-inline" id="audio_file_div_error"></span>
                  </div>
    </div>
    <div class="modal-footer">
     
      <label class="checkbox" style="display:block;">
        <input type="hidden" name="data[display]" value="1">
       <!-- <span style="margin-left:5px; float:left; font-size:12px;"><?php echo __("Display on home page");?></span>--> </label>
      <button type="submit" id="port_audio_btn" class="btn btn-primary "><?php echo __("Submit resume");?></button>
    </div>
    
    <!--</div>-->
  </form>
   </div>