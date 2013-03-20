<div id="port_video" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:440px;">
  <form class="form-inline" name="update" action="<?php echo Router::url('/'); ?>portfolio/portfolios" method="post" style="margin-bottom:0px;width:440px;">
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h2 id="myModalLabel" class="forh2"><?php echo __("Portfolio Add Video");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;width:440px;" >
    
      <div class="control-group" id="video_title_div">
        <label class="control-label" for="inputInfo" id="prof" style="width:440px; font-size:14px;font-family: arial; font-size: 14px;font-weight: bold;"><?php echo __("Video Title");?></label>
        <div class="controls">
          <input type="text" id="video_title" name="data[title]" style="padding:2px; margin-right:25px; width:345px;">
        </div>
        <span class="help-inline" id="video_title_div_error"></span> </div>
        
      <div class="control-group" id="video_code_div">
        <label class="control-label" for="inputInfo" id="prof" style="width:440px; font-size:12px;font-family: arial; font-size:10px;"><?php echo __("Insert Embed Code");?></label>
        <div class="controls">
          <textarea rows="2" cols="5" name="data[video]" id="video_code" style="width:340px;"></textarea>
          <p style="width:300px;"> <?php echo __("To insert a video, copy the embed code from one of the following services and paste it above.");?></p>
        </div>
        <span class="help-inline" id="video_code_div_error"></span> </div>
        
        <div class="control-group" id="size_div">
        <div class="controls">
         <a href='http://www.dailymotion.com' target="_blank" style="margin-left:20px;"><img src="<?php echo Router::url('/'); ?>img/dailymotion.png"  style="border:0;"/></a>
       <a href="http://www.vimeo.com" target="_blank" style="margin-left:20px;"><img src="<?php echo Router::url('/'); ?>img/vimeo.png"  style="border:0;"/></a>
        <a href="http://www.youtube.com" target="_blank" style="margin-left:20px;"><img src="<?php echo Router::url('/'); ?>img/youtube.png"  style="border:0;"/></a>
          <?php /*?> <?php echo $this->html->image('dailymotion.png',array('url'=>array('action'=>"www.dailymotion.com"),'border'=>0,'alt'=>'Delete','style'=>'margin-left:20px') );?>
           <?php echo $this->html->image('vimeo.png',array('url'=>array('action'=>'www.vimeo.com'),'border'=>0,'alt'=>'Delete','style'=>'margin-left:20px') );?>
           <?php echo $this->html->image('youtube.png',array('url'=>array('action'=>'www.youtube.com'),'border'=>0,'alt'=>'Delete','style'=>'margin-left:20px') );?><?php */?>
          <br />
          
          <span class="info"></span> </div>
      </div>
        
      <div class="control-group" id="job_title_div">
        <div class="controls">
          <label style="margin-left:5px; font-size:12px;"><?php echo __("Choose the aspect ratio for your player");?>:</label>
          <br />
          <p style="margin-left:5px; font-size:12px;">
            <input 	id="4-3" type="radio" name="data[video_ratio]"	value="0.75"  />
            <label for="4-3" >3:4 format</label>
            &nbsp;&nbsp;
            <input 	id="16-9" type="radio"	name="data[video_ratio]"	value="0.5625" checked="checked" />
            <label for="16-9" >16:9 format</label>
          </p>
        
          <span class="info"></span> </div>
      </div>
      
    </div>
    <div class="modal-footer">
      <label class="checkbox" style="display:block;">
        <input type="hidden" name="data[display]" value="1">
        <!--<span style="margin-left:5px; float:left; font-size:12px;"><?php echo __("Display on Homepage");?></span>--> </label>
      <button type="submit" id="port_video_btn" class="btn btn-primary "><?php echo __("Submit");?></button>
    </div>
    
    <!--</div>-->
  </form>
</div>
