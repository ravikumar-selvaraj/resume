<?php 
	 $portaud=ClassRegistry::init('Portaudio')->find('first',array('conditions'=>array('paid'=>$pa))); 
	?>
    <div data-backdrop="static" data-keyboard="false" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="update-resume" style="display:block ;">

    <form class="form-inline" name="Add-Education" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="data[paid]" value="<?php echo $portaud['Portaudio']['paid'];?>"  />
    
        <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <h2 id="myModalLabel" style="font-size:16px; padding:0px; margin:0px;"><?php echo __("Portfolio Update Audio");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;width:500px;" >
    
      <div class="control-group" id="audio_title_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:14px;font-family: arial; font-size: 14px;font-weight: bold;"><?php echo __("Audio Title");?></label>
        <div class="controls">
          <input type="text" placeholder="Audio Title" id="audio_title" name="data[audio_title]" style="padding:2px; margin-right:25px; width:345px;" value="<?php echo $portaud['Portaudio']['audio_title'];?>">
           </div><span class="help-inline" id="audio_title_div_error"></span>
      </div>
      <div class="control-group" id="audio_title_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:14px;font-family: arial; font-size: 14px;font-weight: bold;"><?php echo __("Current Audio");?></label>
        <div class="controls">
<object height="20" width="200" data="<?php echo $this->Html->webroot('player_mp3_maxi.swf'); ?>" type="application/x-shockwave-flash">
<param value="<?php echo $this->Html->webroot('player_mp3_maxi.swf'); ?>" name="movie"> <param value="mp3=<?php echo $this->Html->webroot('files/portfolio-audios/'.$portaud['Portaudio']['audio_file'].''); ?>&amp;showstop=1&amp;showvolume=1&amp;bgcolor1=ffa50b&amp;bgcolor2=d07600" name="FlashVars">
</object>           </div><span class="help-inline" id="audio_title_div_error"></span>
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
        <button type="submit" id="exp_btn" class="btn btn-primary" name="audio"><?php echo __("Save");?></button>
        <a 	href="<?php echo BASE_URL.$new['User']['username']?>">
        <input class="btn btn-inverse" type="button" id="" value="Cancel" />
        </a>
        </div>
    
   
    </form>
    
</div>
 