<?php 
 $portvid=ClassRegistry::init('Portfolio')->find('first',array('conditions'=>array('pid'=>$pid))); 
 //pr($portimg);	?>
 
<div id="editportvideo<?php echo $pid; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:440px;">
    <form class="form-inline" name="Add-Education" action="<?php echo BASE_URL; ?>portfolio/edit_portfolios" method="post" enctype="multipart/form-data">
    <input type="hidden" name="data[pid]" value="<?php echo $pid;?>"  />
    
        <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h2 id="myModalLabel"  style="background:#fff; color:#000; font-size:24px;"><?php echo __("Portfolio update Video");?></h2>
    </div>
            <div class="modal-body" style="padding-top:0px;width:440px;" >
            
            <div class="control-group" id="edit_video_title_div">
            <label class="control-label" for="inputInfo" id="prof" style="width:440px; font-size:14px;font-family: arial; font-size: 14px;font-weight: bold;"><?php echo __("Video Title");?></label>
            <div class="controls">
            <input type="text" placeholder="Video Title" id="edit_video_title" name="data[title]" style="padding:2px; margin-right:25px; width:345px;" value="<?php echo $portvid['Portfolio']['title'];?>">
            </div>
            <span class="help-inline" id="edit_video_title_div_error"></span> </div>
            
            <div class="control-group" id="edit_video_code_div">
            <label class="control-label" for="inputInfo" id="prof" style="width:440px; font-size:12px;font-family: arial; font-size:10px;"><?php echo __("Insert Embed Code");?></label>
            <div class="controls">
            <textarea rows="2" cols="5" name="data[video]" id="edit_video_code" style="width:340px;"><?php echo $portvid['Portfolio']['video'];?></textarea>
            <p style="width:300px;"> To insert a video, copy the &quot;embed&quot; code from one of the following services and paste it above.</p>
            </div>
            <span class="help-inline" id="edit_video_code_div_error"></span> </div>
            
            <div class="control-group" id="edit_size_div">
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
            
            <div class="control-group" id="edit_job_title_div">
            
            </div>
            
            </div>
        <div class="modal-footer">
        <button type="submit" id="edit_video_btn" class="btn btn-primary" name="video"><?php echo __("Save");?></button>
        <a 	href="<?php echo BASE_URL.$new['User']['username']?>">
        <input class="btn btn-inverse" type="button" id="edit_cont_out" value="Cancel" />
        </a>
        </div>
    
   
    </form>
</div>
