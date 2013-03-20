<?php 
	 $portaud=ClassRegistry::init('Portfolio')->find('first',array('conditions'=>array('pid'=>$pid))); 
	?>
    
    
   <div id="editportaudio<?php echo $pid; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:440px;">

    <form class="form-inline" name="Add-Education" action="<?php echo BASE_URL; ?>portfolio/edit_portfolios" method="post" enctype="multipart/form-data">
    <input type="hidden" name="data[pid]" value="<?php echo $portaud['Portfolio']['pid'];?>"  />
    
        <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h2 id="myModalLabel" style="background:none; color:#000; font-size:24px;"><?php echo __("Portfolio Update Audio");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;width:500px;" >
    
      <div class="control-group" id="edit_audio_title_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:14px;font-family: arial; font-size: 14px;font-weight: bold;"><?php echo __("Audio Title");?></label>
        <div class="controls">
          <input type="text" placeholder="Audio Title" id="edit_audio_title" name="data[title]" style="padding:2px; margin-right:25px; width:345px;" value="<?php echo $portaud['Portfolio']['title'];?>">
           </div><span class="help-inline" id="edit_audio_title_div_error"></span>
      </div>
      <div class="control-group" id="edit_audio_title_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:14px;font-family: arial; font-size: 14px;font-weight: bold;"><?php echo __("Current Audio");?></label>
        <div class="controls">
<object height="20" width="200" data="<?php echo $this->Html->webroot('player_mp3_maxi.swf'); ?>" type="application/x-shockwave-flash">
<param value="<?php echo $this->Html->webroot('player_mp3_maxi.swf'); ?>" name="movie"> <param value="mp3=<?php echo $this->Html->webroot('files/portfolio-audios/'.$portaud['Portfolio']['audio'].''); ?>&amp;showstop=1&amp;showvolume=1&amp;bgcolor1=ffa50b&amp;bgcolor2=d07600" name="FlashVars">
</object>           </div><span class="help-inline" id="edit_audio_title_div_error"></span>
      </div>
      <div class="control-group" id="edit_audio_file_div">
                   <label class="control-label" for="inputInfo" id="edit_prof" style="width:500px; font-size:12px;font-family: arial; font-size: 12px;font-weight: bold;"><?php echo __("Upload Audio File");?></label>
                    <div class="controls">
                    <?php //echo $this->Html->image('avatar_cp.jpg',array('border'=>0,'alt'=>'Resume','width'=>'70','height'=>'70','class'=>'profile-photo','style'=>'border:1px solid #ccc')); ?> 
                    <input type="file"  id="edit_audio_file" name="data[audio]" style="padding:2px; margin: 5px 0px 0px 0px; height:26px;"> 
                       </div><span class="help-inline" id="audio_file_div_error"></span>
                  </div>
    </div>
            
        <div class="modal-footer">
        <button type="submit" id="edit_port_audio_btn" class="btn btn-primary" name="audio"><?php echo __("Save");?></button>
        <a 	href="<?php echo BASE_URL.$new['User']['username']?>">
        <input class="btn btn-inverse" type="button" id="" value="Cancel" />
        </a>
        </div>
    
   
    </form>
    
</div>
 