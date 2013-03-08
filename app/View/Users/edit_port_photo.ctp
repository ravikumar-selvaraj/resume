 <?php 
 $portimg=ClassRegistry::init('Portimage')->find('first',array('conditions'=>array('key'=>$this->params['pass'][0]))); 
 //pr($portimg);
 ?>

<div data-backdrop="static" data-keyboard="false" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="update-resume" style="display:block ;">
    <form class="form-inline" name="Add-Education" action="" method="post" enctype="multipart/form-data">
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
