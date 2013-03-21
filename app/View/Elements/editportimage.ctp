
<?php $portimg=ClassRegistry::init('Portfolio')->find('first',array('conditions'=>array('pid'=>$pid))); ?>

<div id="editportimg<?php echo $pid; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:440px;">
<form class="form-inline" name="update" action="<?php echo BASE_URL; ?>portfolio/edit_portfolios" method="post" enctype="multipart/form-data" style="margin-bottom:0px;width:440px;">
 <input type="hidden" name="data[pid]" value="<?php echo $portimg['Portfolio']['pid'];?>"  />
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h2 id="myModalLabel"  style="background:#fff; color:#000; font-size:24px;"><?php echo __("Portfolio Photo");?></h2>
    </div>
    
    <div class="modal-body" style="padding-top:0px;width:500px;" >
    
      <div class="control-group" id="edit_image_title_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:14px;font-family: arial; font-size: 14px;font-weight: bold; background:none"><?php echo __("Image Title");?></label>
        <div class="controls">
          <input type="text" placeholder="Portfolio Title" id="edit_image_title" name="data[title]" style="padding:2px; margin-right:25px; width:345px;" value="<?php echo $portimg['Portfolio']['title'];?>">          
           
		</div><span class="help-inline" id="edit_image_title_div_error"></span>
      </div>
      
      <div class="control-group" id="edit_port_image_div">
                   <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:12px;font-family: arial; font-size: 12px;font-weight: bold;"><?php echo __("Upload Photo");?></label>
                    <div class="controls">
                     <?php 
        echo  $this->html->image('portfolio-images/small/'.$portimg['Portfolio']['image'],array('border'=>0,'alt'=>'pic','style'=>'height:70px;width:70px'),array('class'=>'thumbnail')); ?>
                    <?php //echo $this->Html->image('avatar_cp.jpg',array('border'=>0,'alt'=>'Resume','width'=>'70','height'=>'70','class'=>'profile-photo','style'=>'border:1px solid #ccc')); ?> 
                    <input type="file" placeholder="First Name" id="edit_port_image" name="data[image]" style="padding:2px; margin: 15px 0px 0px 50px; height:26px;" > <br />
                    <span class="imgalert1" style="bottom:10px; padding-left:120px;">(Image size 250 X 250 as jpeg,png format)</span>
                      <span class="help-inline" id="port_image_div_error"></span> </div>
                  </div>
    </div>
    <div class="modal-footer">
     
     <!-- <label class="checkbox" style="display:block;">-->
        <input type="hidden" value="1" name="data[display]">
       <!-- <span style="margin-left:5px; float:left; font-size:12px;"><?php echo __("Display on home page");?></span>--> </label>
      <button type="submit" id="edit_port_photo_btn23" class="btn btn-primary " name="submit"><?php echo __("Submit");?></button>
    </div>
    <!--</div>-->
  </form>
   </div>