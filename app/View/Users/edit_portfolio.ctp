<?php 
 if($this->params['pass'][0]=='photo')
  { 
 $portimg=ClassRegistry::init('Portimage')->find('first',array('conditions'=>array('key'=>$this->params['pass'][1]))); 
 //pr($portimg);
 ?>

<div data-backdrop="static" data-keyboard="false" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="update-resume" style="display:block ;">
    <form class="form-inline" name="Add-Education" action="<?php echo BASE_URL;?>users/edit_portfolio/<?php echo $this->params['pass'][0]?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="data[piid]" value="<?php echo $portimg['Portimage']['piid'];?>"  />
    
        <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
        
        <input type="hidden" name="data[responsibility]"  value="" />
        <h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px;"><?php echo __("Photo Update");?></h2>
        </div>
        <div class="modal-body" style="padding-top:0px;" >
        <div class="control-group" id="school_div">
				<label class="control-label" for="inputInfo"><?php echo __("Title");?></label>
				<div class="controls">
				<input type="text" id="organization" name="data[image_title]" value="<?php echo $portimg['Portimage']['image_title'];?>">
				<span class="help-inline" id="school_error"></span>
				</div>
				</div>
        <div class="control-group" id="job_title_div">
        <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:14px;font-family: arial; font-size: 16px;font-weight: bold;"><?php echo __("Replace Photo");?></label>
        <div class="controls">
        <?php 
        echo  $this->html->image('portfolio-images/small/'.$portimg['Portimage']['image'],array('border'=>0,'alt'=>'pic'),array('class'=>'thumbnail')); ?>
        <input type="file" placeholder="First Name" id="image_edit" name="data[image]" style="padding:2px; margin: 15px 0px 0px 50px; height:26px;"> 
        <span class="help-inline" id="job_title_div_error"></span> </div>
        </div>
        
        </div>
        <div class="modal-footer">
        <button type="submit" id="exp_btn" class="btn btn-primary" name="photo"><?php echo __("Save");?></button>
        <a 	href="<?php echo BASE_URL.$new['User']['username']?>">
        <input class="btn btn-inverse" type="button" id="edit_cont_out" value="Cancel" />
        </a>
        </div>
    
    <!--</div>-->
    </form>
</div>
<?php } else  if($this->params['pass'][0]=='video') {
 $portvid=ClassRegistry::init('Portvideo')->find('first',array('conditions'=>array('key'=>$this->params['pass'][1]))); 
 //pr($portimg);	?>
 
<div data-backdrop="static" data-keyboard="false" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="update-resume" style="display:block ;">
    <form class="form-inline" name="Add-Education" action="<?php echo BASE_URL;?>users/edit_portfolio/<?php echo $this->params['pass'][0]?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="data[pvid]" value="<?php echo $portvid['Portvideo']['pvid'];?>"  />
    
        <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h2 id="myModalLabel" style="font-size:16px; padding:0px; margin:0px;"><?php echo __("Portfolio update Video");?></h2>
    </div>
            <div class="modal-body" style="padding-top:0px;width:440px;" >
            
            <div class="control-group" id="video_title_div">
            <label class="control-label" for="inputInfo" id="prof" style="width:440px; font-size:14px;font-family: arial; font-size: 14px;font-weight: bold;"><?php echo __("Video Title");?></label>
            <div class="controls">
            <input type="text" placeholder="Video Title" id="video_title" name="data[video_title]" style="padding:2px; margin-right:25px; width:345px;" value="<?php echo $portvid['Portvideo']['video_title'];?>">
            </div>
            <span class="help-inline" id="video_title_div_error"></span> </div>
            
            <div class="control-group" id="video_code_div">
            <label class="control-label" for="inputInfo" id="prof" style="width:440px; font-size:12px;font-family: arial; font-size:10px;"><?php echo __("Insert Embed Code");?></label>
            <div class="controls">
            <textarea rows="2" cols="5" name="data[video_code]" id="video_code" style="width:340px;"><?php echo $portvid['Portvideo']['video_code'];?></textarea>
            <p style="width:300px;"> To insert a video, copy the &quot;embed&quot; code from one of the following services and paste it above.</p>
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
            
            </div>
            
            </div>
        <div class="modal-footer">
        <button type="submit" id="exp_btn" class="btn btn-primary" name="video"><?php echo __("Save");?></button>
        <a 	href="<?php echo BASE_URL.$new['User']['username']?>">
        <input class="btn btn-inverse" type="button" id="edit_cont_out" value="Cancel" />
        </a>
        </div>
    
   
    </form>
</div>
<?php }

else if($this->params['pass'][0]=='audio') {
	 $portaud=ClassRegistry::init('Portaudio')->find('first',array('conditions'=>array('key'=>$this->params['pass'][1]))); 
	?>
    <div data-backdrop="static" data-keyboard="false" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="update-resume" style="display:block ;">

    <form class="form-inline" name="Add-Education" action="<?php echo BASE_URL;?>users/edit_portfolio/<?php echo $this->params['pass'][0]?>" method="post" enctype="multipart/form-data">
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
<?php }?>